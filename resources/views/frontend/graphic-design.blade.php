@extends('layouts.frontend.app')
@push('title')
    Graphic Design
@endpush
@section('content')

    <!-- STUNNING HEADER -->
    <section class="crumina-stunning-header section-image-bg-purple">

        <div class="container">
            <!-- STUNNING HEADER CONTENT -->
            <div class="stunning-header-content align-center">

                <!-- PAGE TITLE -->
                <h1 class="page-title text-white">Graphic Design</h1>
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
                            <span>Graphic Design</span>
                        </li>
                        <!-- /BREADCRUMBS ITEM -->

                    </ul>
                    <!-- /BREADCRUMBS LIST -->

                </div>
                <!-- /BREADCRUMBS -->

            </div>
            <!-- /STUNNING HEADER CONTENT -->
        </div>>

    </section>
    <!-- /STUNNING HEADER -->

    <section class="large-padding">
        <div class="container">
            <div class="row">
                @foreach ($website_graphics as $website_graphic)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="crumina-module crumina-product-item">
                            <div class="product-item-content">
                                <a href="#" class="product-item-thumb">
                                    <img loading="lazy" src="{{ asset($website_graphic->image ?? get_static_option('no_image')) }}" alt="product">
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading">

                        <div class="title-text-wrap">

                            <!-- CRUMINA HEADING TITLE -->
                            <h2 class="heading-title">Order for graphics design</h2>
                            <!-- /CRUMINA HEADING TITLE -->

                        </div>

                        <!-- CRUMINA HEADING DECORATION -->
                        <div class="heading-decoration"></div>
                        <!-- /CRUMINA HEADING DECORATION  -->

                        <!-- CRUMINA HEADING TEXT -->
                        <div class="heading-text">Please contact us using the form and we’ll get back to you as soon as possible.</div>
                        <!-- /CRUMINA HEADING TEXT -->

                    </header>

                    <form class="send-message-form crumina-submit mt-5" method="post" data-nonce="crumina-submit-form-nonce" data-type="standard" action="{{ route('frontend.graphicDesignOrderStore') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-item">
                                    <input value="{{ old('name') }}" class="input--white shadow-lg p-3 mb-5 bg-white rounded" name="name" type="text" placeholder="Full Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-item">
                                    <input value="{{ old('phone') }}" class="input--white shadow-lg p-3 mb-5 bg-white rounded" name="phone" type="text" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-item">
                                    <textarea class="input--white shadow-lg p-3 mb-5 bg-white rounded" type="text" name="message" placeholder="Message..." rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-item">
                                    <input value="{{ old('email') }}" class="input--white shadow-lg p-3 mb-5 bg-white rounded" name="email" type="email" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-item">
                                    <input class="input--white shadow-lg p-3 mb-5 bg-white rounded" name="sample_design" type="file" accept="image/*">
                                </div>
                            </div>
                            <div class="inquiry-btn-wrap">
                                <button type="submit" class="crumina-button button--green button--l">Send Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.partials.back-to-top')

@include('frontend.partials.subscribe')

@endsection
