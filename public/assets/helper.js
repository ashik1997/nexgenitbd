
    $(document).ready(function(){
        $(".logout-btn").click(function (){
            Swal.fire({
                title: 'Are you sure?',
                text: "You can login again in this system!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Logout!',
                        'Successfully logout from this system.',
                        'success'
                    )
                    setTimeout(function() {
                        document.getElementById('logout-form').submit();
                    }, 1000);//2 second
                }
            })
        });
        // subscribe now
        $('.subscribe-now-btn').click(function (){
            $.ajax({
                method: 'POST',
                url: "/subscribe/store",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: { email:  $('.subscribe-email').val()},
                data: { email:  $(this).parentsUntil('.main-subscribe-section').find('.subscribe-email').val()},
                dataType: 'JSON',
                beforeSend: function (){
                    $(".subscribe-now-btn").prop("disabled",true);
                },
                complete: function (){
                    $(".subscribe-now-btn").prop("disabled",false);
                },
                success: function (response) {
                    if (response.type == 'success'){
                        $('.subscribe-email').val("")
                        Swal.fire(
                            'Thank you !',
                            response.message,
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Sorry !',
                            response.message,
                            response.type
                        )
                    }
                },
                error: function (xhr) {
                    var errorMessage = '<div class="card bg-danger">\n' +
                        '                        <div class="card-body text-center p-5">\n' +
                        '                            <span class="text-white">';
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        errorMessage +=(''+value+'<br>');
                    });
                    errorMessage +='</span>\n' +
                        '                        </div>\n' +
                        '                    </div>';
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        footer: errorMessage
                    })
                },
            })
        });
    });

    function delete_function(objButton){
        var url = objButton.value;
        // alert(objButton.value)
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: 'DELETE',
                    url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        var message = '';
                        if(data.message){
                            message = data.message
                        }
                        if (data.type == 'success'){
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted. '+message,
                                'success'
                            )
                            setTimeout(function() {
                                location.reload();
                            }, 800);//
                        }else{
                            Swal.fire(
                                'Wrong!',
                                'Something going wrong. '+data.message,
                                'warning'
                            )
                        }
                    },
                })
            }
        })
    }

    function change_category(objButton){
        var formData = new FormData();
        formData.append('lead', objButton.value)
        $.ajax({
            method: 'POST',
            url: "/lead/lead/get/category",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                var modal_body_html='<div class="row">';
                for (i=0; i<data.categories.length; i++){
                    modal_body_html += data.categories[i];
                }
                $('#category').html(modal_body_html);
                $('#hidden-value').val(objButton.value);
                $('#modal').modal('show');
            },

            error: function (xhr) {
                var errorMessage = '<div class="card bg-danger">\n' +
                    '                        <div class="card-body text-center p-5">\n' +
                    '                            <span class="text-white">';
                $.each(xhr.responseJSON.errors, function(key,value) {
                    errorMessage +=(''+value+'<br>');
                });
                errorMessage +='</span>\n' +
                    '                        </div>\n' +
                    '                    </div>';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    footer: errorMessage
                });
            },
        });
    }

    // Listen for click on toggle checkbox
    $('.select-all').click(function(event) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = true;
        }
    });

    $('.un-select-all').click(function(event) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = false;
        }
    });

