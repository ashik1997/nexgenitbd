<div class="modal fade media-manager-modal" id="mediaManagerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title">Media Library</h5>
                    <small>Upload once and reuse images across the project.</small>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="media-manager-toolbar">
                    <label class="media-upload-button">
                        <input type="file" id="mediaManagerUpload" accept="image/*" multiple hidden data-no-media-picker>
                        <i class="feather icon-upload-cloud"></i> Upload Images
                    </label>
                    <div class="media-search-box">
                        <i class="feather icon-search"></i>
                        <input type="search" id="mediaManagerSearch" placeholder="Search by file name...">
                    </div>
                    <span id="mediaManagerCount" class="media-result-count"></span>
                </div>
                <div id="mediaManagerProgress" class="media-manager-progress d-none">
                    <div class="spinner-border spinner-border-sm" role="status"></div> Uploading and optimizing...
                </div>
                <div id="mediaManagerGrid" class="media-library-grid"></div>
                <div id="mediaManagerEmpty" class="media-library-empty d-none">
                    <i class="feather icon-image"></i>
                    <h6>No images found</h6>
                    <p>Upload an image or try another search.</p>
                </div>
                <div class="media-manager-pagination">
                    <button type="button" id="mediaManagerPrev" class="btn btn-light btn-sm">Previous</button>
                    <span id="mediaManagerPage"></span>
                    <button type="button" id="mediaManagerNext" class="btn btn-light btn-sm">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
