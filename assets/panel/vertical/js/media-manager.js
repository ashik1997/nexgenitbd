(function () {
    'use strict';

    var config = window.NEXGEN_MEDIA || {};
    var state = {
        page: 1,
        lastPage: 1,
        search: '',
        activeInput: null,
        inlineTarget: null,
        searchTimer: null
    };

    var modal = document.getElementById('mediaManagerModal');
    var grid = document.getElementById('mediaManagerGrid');
    var empty = document.getElementById('mediaManagerEmpty');
    var count = document.getElementById('mediaManagerCount');
    var pageLabel = document.getElementById('mediaManagerPage');
    var prev = document.getElementById('mediaManagerPrev');
    var next = document.getElementById('mediaManagerNext');
    var search = document.getElementById('mediaManagerSearch');
    var upload = document.getElementById('mediaManagerUpload');
    var progress = document.getElementById('mediaManagerProgress');

    function formatBytes(bytes) {
        if (!bytes) return '0 KB';
        if (bytes < 1024 * 1024) return Math.max(1, Math.round(bytes / 1024)) + ' KB';
        return (bytes / 1024 / 1024).toFixed(1) + ' MB';
    }

    function escapeHtml(value) {
        var div = document.createElement('div');
        div.textContent = value || '';
        return div.innerHTML;
    }

    function itemMarkup(file) {
        var dimensions = file.width && file.height ? file.width + '×' + file.height + ' · ' : '';
        return '<article class="media-library-item" data-path="' + escapeHtml(file.path) + '" data-url="' + escapeHtml(file.url) + '" data-name="' + escapeHtml(file.name) + '">' +
            (file.deletable ? '<button type="button" class="media-delete-button" title="Delete"><i class="feather icon-trash-2"></i></button>' : '') +
            '<div class="media-library-thumb"><img loading="lazy" src="' + escapeHtml(file.url) + '" alt="' + escapeHtml(file.name) + '"></div>' +
            '<div class="media-library-info"><strong title="' + escapeHtml(file.name) + '">' + escapeHtml(file.name) + '</strong>' +
            '<span>' + dimensions + formatBytes(file.size) + '</span></div></article>';
    }

    function bindGrid(target) {
        target.querySelectorAll('.media-library-item').forEach(function (item) {
            item.addEventListener('click', function (event) {
                if (event.target.closest('.media-delete-button')) return;
                chooseFile(item.dataset.url, item.dataset.name);
            });

            var deleteButton = item.querySelector('.media-delete-button');
            if (deleteButton) {
                deleteButton.addEventListener('click', function (event) {
                    event.stopPropagation();
                    deleteFile(item.dataset.path);
                });
            }
        });
    }

    function loadFiles(target, standalone) {
        if (!config.libraryUrl || !target) return;
        target.innerHTML = '<div class="media-manager-progress"><div class="spinner-border spinner-border-sm"></div> Loading images...</div>';

        var url = config.libraryUrl + '?page=' + state.page + '&per_page=' + (standalone ? 60 : 30) + '&search=' + encodeURIComponent(state.search);
        fetch(url, {headers: {'Accept': 'application/json'}})
            .then(function (response) {
                if (!response.ok) throw new Error('Unable to load media.');
                return response.json();
            })
            .then(function (payload) {
                state.lastPage = payload.meta.last_page;
                target.innerHTML = payload.data.map(itemMarkup).join('');
                bindGrid(target);

                if (!standalone) {
                    empty.classList.toggle('d-none', payload.data.length > 0);
                    count.textContent = payload.meta.total + ' image' + (payload.meta.total === 1 ? '' : 's');
                    pageLabel.textContent = 'Page ' + payload.meta.current_page + ' of ' + payload.meta.last_page;
                    prev.disabled = payload.meta.current_page <= 1;
                    next.disabled = payload.meta.current_page >= payload.meta.last_page;
                }
            })
            .catch(function (error) {
                target.innerHTML = '<div class="alert alert-danger">' + escapeHtml(error.message) + '</div>';
            });
    }

    function chooseFile(url, name) {
        if (!state.activeInput) {
            window.open(url, '_blank');
            return;
        }

        fetch(url)
            .then(function (response) {
                if (!response.ok) throw new Error('Unable to select this image.');
                return response.blob();
            })
            .then(function (blob) {
                var extension = (name.split('.').pop() || 'jpg').toLowerCase();
                var type = blob.type || ('image/' + (extension === 'jpg' ? 'jpeg' : extension));
                var file = new File([blob], name, {type: type});
                var transfer = new DataTransfer();
                transfer.items.add(file);
                state.activeInput.files = transfer.files;
                state.activeInput.dispatchEvent(new Event('change', {bubbles: true}));
                updatePreview(state.activeInput, url);
                window.jQuery(modal).modal('hide');
            })
            .catch(function (error) {
                window.Swal ? Swal.fire('Selection failed', error.message, 'error') : alert(error.message);
            });
    }

    function uploadFiles(files) {
        if (!files || !files.length) return;
        var form = new FormData();
        Array.prototype.forEach.call(files, function (file) {
            form.append('files[]', file);
        });

        progress.classList.remove('d-none');
        fetch(config.uploadUrl, {
            method: 'POST',
            headers: {'X-CSRF-TOKEN': config.csrf, 'Accept': 'application/json'},
            body: form
        })
            .then(function (response) {
                return response.json().then(function (body) {
                    if (!response.ok) throw new Error(body.message || 'Upload failed.');
                    return body;
                });
            })
            .then(function (payload) {
                state.page = 1;
                loadFiles(grid, false);
                if (state.inlineTarget) loadFiles(state.inlineTarget, true);
                if (window.Swal) Swal.fire({icon: 'success', title: payload.message, timer: 1400, showConfirmButton: false});
            })
            .catch(function (error) {
                window.Swal ? Swal.fire('Upload failed', error.message, 'error') : alert(error.message);
            })
            .finally(function () {
                progress.classList.add('d-none');
                upload.value = '';
            });
    }

    function deleteFile(path) {
        var execute = function () {
            fetch(config.deleteUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': config.csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({path: path})
            })
                .then(function (response) {
                    if (!response.ok) throw new Error('Unable to delete this image.');
                    state.page = 1;
                    loadFiles(grid, false);
                    if (state.inlineTarget) loadFiles(state.inlineTarget, true);
                })
                .catch(function (error) {
                    window.Swal ? Swal.fire('Delete failed', error.message, 'error') : alert(error.message);
                });
        };

        if (window.Swal) {
            Swal.fire({
                title: 'Delete this image?',
                text: 'Only Media Library uploads can be deleted.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then(function (result) {
                if (result.isConfirmed) execute();
            });
        } else if (confirm('Delete this image?')) {
            execute();
        }
    }

    function updatePreview(input, url) {
        var tools = input.parentElement.querySelector('.media-field-tools');
        if (!tools) return;
        var image = tools.querySelector('.media-current-preview');
        image.src = url;
        tools.classList.add('has-preview');
    }

    function enhanceImageInputs() {
        document.querySelectorAll('input[type="file"]').forEach(function (input) {
            if (input.hasAttribute('data-no-media-picker')) return;
            var acceptsImage = (input.accept || '').indexOf('image') !== -1;
            var imageName = /image|avatar|logo|icon/i.test(input.name || '');
            if ((!acceptsImage && !imageName) || input.dataset.mediaEnhanced) return;

            input.dataset.mediaEnhanced = '1';
            var tools = document.createElement('div');
            tools.className = 'media-field-tools';
            tools.innerHTML = '<img class="media-current-preview" alt="Selected image preview">' +
                '<button type="button" class="media-picker-button"><i class="feather icon-folder"></i> Choose from Media Library</button>';
            input.insertAdjacentElement('afterend', tools);

            tools.querySelector('.media-picker-button').addEventListener('click', function () {
                state.activeInput = input;
                state.page = 1;
                state.search = '';
                search.value = '';
                loadFiles(grid, false);
                window.jQuery(modal).modal('show');
            });

            input.addEventListener('change', function () {
                if (input.files && input.files[0]) {
                    updatePreview(input, URL.createObjectURL(input.files[0]));
                }
            });
        });
    }

    function openManager() {
        state.activeInput = null;
        state.page = 1;
        state.search = '';
        search.value = '';
        loadFiles(grid, false);
        window.jQuery(modal).modal('show');
    }

    if (prev) prev.addEventListener('click', function () {
        if (state.page > 1) {
            state.page--;
            loadFiles(grid, false);
        }
    });

    if (next) next.addEventListener('click', function () {
        if (state.page < state.lastPage) {
            state.page++;
            loadFiles(grid, false);
        }
    });

    if (search) search.addEventListener('input', function () {
        clearTimeout(state.searchTimer);
        state.searchTimer = setTimeout(function () {
            state.search = search.value.trim();
            state.page = 1;
            loadFiles(grid, false);
        }, 280);
    });

    if (upload) upload.addEventListener('change', function () {
        uploadFiles(upload.files);
    });

    document.addEventListener('DOMContentLoaded', function () {
        enhanceImageInputs();
        document.querySelectorAll('.js-open-media-manager').forEach(function (button) {
            button.addEventListener('click', openManager);
        });
    });

    window.NexgenMediaManager = {
        open: openManager,
        refreshInputs: enhanceImageInputs,
        renderInline: function (target) {
            state.inlineTarget = target;
            state.page = 1;
            state.search = '';
            loadFiles(target, true);
        }
    };
})();
