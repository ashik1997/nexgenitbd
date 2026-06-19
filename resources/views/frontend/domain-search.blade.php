@extends('layouts.frontend.app')
@push('title')
    Domain search
@endpush
@section('content')

    <!-- STUNNING HEADER -->
    <section class="crumina-stunning-header section-image-bg-black">
        <div class="container">
            <!-- STUNNING HEADER CONTENT -->
            <div class="stunning-header-content align-center">
                <!-- PAGE TITLE -->
                <h1 class="page-title text-white">Domain search</h1>
                <!-- /PAGE TITLE -->
                <!-- BREADCRUMBS -->
                <div class="crumina-breadcrumbs">
                    <!-- BREADCRUMBS LIST -->
                    <ul class="breadcrumbs">
                        <!-- BREADCRUMBS ITEM -->
                        <li class="breadcrumbs-item">
                            <a href="{{ route('frontend.home') }}">Home</a>
                        </li>
                        <!-- /BREADCRUMBS ITEM -->

                        <!-- BREADCRUMBS ITEM -->
                        <li class="breadcrumbs-item trail-end">
                            <span class="crumina-icon">»</span>
                            <span>Domain search</span>
                        </li>
                        <!-- /BREADCRUMBS ITEM -->
                    </ul>
                    <!-- /BREADCRUMBS LIST -->
                </div>
                <!-- /BREADCRUMBS -->
            </div>
            <!-- /STUNNING HEADER CONTENT -->
        </div>
    </section>
    <!-- /STUNNING HEADER -->

    <section class="large-padding section-image-bg-grey">
        <div class="container">
            <div class="row" id="domain-search-div">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading text-center">
                        <div class="title-text-wrap">
                            <!-- CRUMINA HEADING TITLE -->
                            <h2 class="heading-title">Search your domain</h2>
                            <!-- /CRUMINA HEADING TITLE -->
                        </div>
                        <!-- CRUMINA HEADING DECORATION -->
                        <div class="heading-decoration"></div>
                        <!-- /CRUMINA HEADING DECORATION  -->
                        <br>
                      <div class="row text-center">
                          <div class="form-item col-12">
                              <input class="input--white  mt-3" id="domain" name="domain" type="text" placeholder="Your domain" required>
                              <button id="domain-search-btn" type="button" class="crumina-button button--green button--l mt-3">Search now</button>
                          </div>
                      </div>
                    </header>
                </div>
            </div>
            <div  class="row" id="domain-available-div">
                <div class="col text-center">
                    <header class="crumina-module crumina-heading  mt-5">
                        <div class="title-text-wrap">
                            <!-- CRUMINA HEADING TITLE -->
                            <h2 class="heading-title">Order for <i class="text-danger" id="searched-domain"></i></h2>
                            <!-- /CRUMINA HEADING TITLE -->
                        </div>
                        <!-- CRUMINA HEADING DECORATION -->
                        <div class="heading-decoration"></div>
                        <!-- /CRUMINA HEADING DECORATION  -->
                        <!-- CRUMINA HEADING TEXT -->
                        <div class="heading-text">Please contact us using the form and we’ll get back to you as soon as possible.</div>
                        <!-- /CRUMINA HEADING TEXT -->
                    </header>

                    <form class="domain-order-form crumina-submit mt-5 justify-content-center" >
                        <div class="row text-center">
                            <div class="col-3"></div>
                        <div class="col-6">
                            <div class="col">
                                <div class="form-item">
                                    <input value="{{ old('name') }}" class="input--white shadow-lg p-3 mb-5 bg-white rounded"  id="name" name="name" type="text" placeholder="Full Name" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-item">
                                    <input value="{{ old('phone') }}" class="input--white shadow-lg p-3 mb-5 bg-white rounded" id="phone" name="phone" type="text" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-item">
                                    <input value="{{ old('email') }}" class="input--white shadow-lg p-3 mb-5 bg-white rounded" id="email" name="email" type="email" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col">
                                <button type="button" class="crumina-button button--green button--l order-now-btn">Send Now</button>
                            </div>

                        </div>
                            <div class="col-3"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    @include('frontend.partials.back-to-top')

    @include('frontend.partials.subscribe')
    <script>
        $(document).ready(function(){
            $('#domain-search-btn').click(function (){

                var formData = new FormData();
                formData.append('domain', $('#domain').val())

                $.ajax({
                    method: 'POST',
                    url: "{{ route('frontend.domainSearchPost') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        $("#domain-search-btn").html('Searching ---- ');
                        $("#domain-search-btn").prop("disabled",true);
                    },
                    complete: function (){
                        $("#domain-search-btn").html('Search again');
                        $("#domain-search-btn").prop("disabled",false);
                    },
                    success: function (data) {
                        if (data.type == 'success'){
                            $('#searched-domain').text(data.domain)
                            // $('#domain-available-div').style('display:visible');
                            Swal.fire({
                                position: 'top-end',
                                icon: data.type,
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }else{
                            Swal.fire({
                                icon: data.type,
                                title: 'Oops...',
                                text: data.message,
                                footer: 'Something went wrong!'
                            });
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
                        });
                    },
                });
            });
            $('.order-now-btn').click(function (){
                var formData = new FormData();

                formData.append('domain', $('#searched-domain').text())
                formData.append('name', $('#domain-available-div').find('#name').val())
                formData.append('phone', $('#domain-available-div').find('#phone').val())
                formData.append('email', $('#domain-available-div').find('#email').val())

                $.ajax({
                    method: 'POST',
                    url: "{{ route('frontend.domainOrderStore') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        $(".order-now-btn").html('Ordering ---- ');
                        $(".order-now-btn").prop("disabled",true);
                    },
                    complete: function (){
                        $(".order-now-btn").html('Send now');
                        $(".order-now-btn").prop("disabled",false);
                    },
                    success: function (data) {
                        if (data.type == 'success'){
                            Swal.fire({
                                position: 'top-end',
                                icon: data.type,
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }else{
                            Swal.fire({
                                icon: data.type,
                                title: 'Oops...',
                                text: data.message,
                                footer: 'Something went wrong!'
                            });
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
                        });
                    },
                });
            });
        });
    </script>
@endsection
