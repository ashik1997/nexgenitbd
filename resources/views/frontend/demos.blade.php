@extends('layouts.frontend.app')

@push('title')
    Software Projects
@endpush

@section('content')
    <section class="crumina-stunning-header section-image-bg-black">
        <div class="container">
            <div class="stunning-header-content align-center">
                <h1 class="page-title text-white">Software Projects</h1>
                <div class="crumina-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item">
                            <a href="{{ route('frontend.home') }}">Home</a>
                        </li>
                        <li class="breadcrumbs-item trail-end">
                            <span class="crumina-icon">»</span>
                            <span>Projects</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="large-padding software-projects-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 m-auto text-center">
                    <header class="crumina-module crumina-heading mb-5 align-center">
                        <div class="hero-eyebrow">Selected work</div>
                        <div class="title-text-wrap">
                            <h2 class="heading-title">Solutions designed around real business workflows</h2>
                        </div>
                        <div class="heading-decoration"></div>
                        <div class="heading-text">Explore examples of SaaS platforms, business systems, customer portals, and team productivity software.</div>
                    </header>
                </div>
            </div>

            <div class="row">
                @foreach($demos as $demo)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <article class="software-project-card">
                            <div class="software-project-thumb">
                                <img loading="lazy" src="{{ asset($demo->image ?: get_static_option('no_image')) }}" alt="{{ $demo->title }}">
                            </div>
                            <div class="software-project-content">
                                <span class="software-project-type">Software solution</span>
                                <h3>{{ $demo->title }}</h3>
                                <p>{!! $demo->description !!}</p>
                                <div class="software-project-actions">
                                    <a href="{{ $demo->url }}" class="crumina-button button--white button--bordered" target="_blank">View Project</a>
                                    <a href="{{ route('frontend.contact') }}" class="crumina-button button--dark">Discuss a Similar Project</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.partials.back-to-top')
    @include('frontend.partials.subscribe')
@endsection
