@extends('layouts.frontend.app')
@push('title')
    Web Design
@endpush
@section('content')
    <!-- STUNNING HEADER -->
	<section class="crumina-stunning-header section-image-bg-black">
		<div class="container">
			<!-- STUNNING HEADER CONTENT -->
			<div class="stunning-header-content align-center">
				<!-- PAGE TITLE -->
				<h1 class="page-title text-white">Web Design</h1>
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
							<span>Web Design</span>
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
    @foreach ($website_web_designs as $website_web_design)
        @if ($loop->odd == true)
            <section class="large-padding section-anime-js">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <header class="crumina-module crumina-heading">
                                <!-- CRUMINA HEADING TITLE -->
                                <div class="title-text-wrap">
                                    <h2 class="heading-title element-anime-fadeInUp-js">{{ $website_web_design->title }}</h2>
                                </div>
                                <!-- /CRUMINA HEADING TITLE -->
                                <!-- CRUMINA HEADING DECORATION -->
                                <div class="heading-decoration element-anime-fadeInUp-js"></div>
                                <!-- /CRUMINA HEADING DECORATION  -->
                            </header>
                            <div>
                                {!! $website_web_design->description !!}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-4 mt-md-0">
                            <img loading="lazy"  class="element-anime-opacity-js" src="{{ asset($website_web_design->image ?? get_static_option('no_image')) }}" alt="Case">
                        </div>
                    </div>
                </div>
            </section>
        @else
        <section class="section-image-bg-grey section-anime-js">
            <div class="row no-gutters align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 order-1 order-md-0 element-anime-opacity-js">
                    <div class="post-thumb format-video">
                        <img loading="lazy"  class="element-anime-opacity-js" src="{{ asset($website_web_design->image ?? get_static_option('no_image')) }}" alt="Case">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 order-0 order-md-0">
                    <div class="row justify-content-center align-items-center p-5">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 align-center">
                            <header class="crumina-module crumina-heading mb-4">
                                <!-- CRUMINA HEADING TITLE -->
                                <div class="title-text-wrap">
                                    <h2 class="heading-title element-anime-fadeInUp-js">{{ $website_web_design->title }}</h2>
                                </div>
                                <!-- /CRUMINA HEADING TITLE -->
                                <!-- CRUMINA HEADING DECORATION -->
                                <div class="heading-decoration element-anime-fadeInUp-js"></div>
                                <!-- /CRUMINA HEADING DECORATION  -->
                            </header>
                            <div>
                                {!! $website_web_design->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    @endforeach
    <section class="large-padding">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading">
                        <div class="title-text-wrap">
                            <!-- CRUMINA HEADING TITLE -->
                            <h2 class="heading-title">Order for Web Design</h2>
                            <!-- /CRUMINA HEADING TITLE -->
                        </div>
                        <!-- CRUMINA HEADING DECORATION -->
                        <div class="heading-decoration"></div>
                        <!-- /CRUMINA HEADING DECORATION  -->
                        <!-- CRUMINA HEADING TEXT -->
                        <div class="heading-text">Please contact us using the form and we’ll get back to you as soon as possible.</div>
                        <!-- /CRUMINA HEADING TEXT -->
                    </header>
                    <form class="send-message-form crumina-submit mt-5" method="post" data-nonce="crumina-submit-form-nonce" data-type="standard" action="{{ route('frontend.webDesignOrderStore') }}" enctype="multipart/form-data">
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
                            <div class="inquiry-btn-wrap">
                                <input id="hidden_id" type="hidden" >
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
