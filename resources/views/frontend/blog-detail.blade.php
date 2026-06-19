@extends('layouts.frontend.app')
@push('title')
    {{ $blog->title }}
@endpush
@section('content')
    <script>
        $(document).ready(function() {
             $("head").append('<meta name="keywords" content="<?php echo $blog->title; ?>" />');
        });
    </script>
    
    <!-- STUNNING HEADER -->
    <section class="crumina-stunning-header section-image-bg-black">
        <div class="container">
            <!-- STUNNING HEADER CONTENT -->
            <div class="stunning-header-content align-center">
                <!-- PAGE TITLE -->
                <h1 class="page-title text-white">{{ Str::limit($blog->title, 20) }}</h1>
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
                            <span>{{ Str::limit($blog->title, 20) }}</span>
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

    <div class="large-padding">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- POST DETAILS -->
                    <article
                        class="entry post post-standard has-post-thumbnail post-standard-details post-standard-details--wide">
                        <div class="post-details-content">
                            <div class="wp-caption alignnone">
                                <img loading="lazy" height="600px;" width="600px;" class="small" src="{{ asset($blog->image ?? get_static_option('no_image')) }}" alt="Post">
                            </div>
                            <h2>{{ $blog->title }}</h2>

                            <div>
                                {!! $blog->description !!}
                            </div>
                        </div>
                    </article>
                    <!-- /POST DETAILS -->
                </div>
            </div>
        </div>
    </div>
    @include('frontend.partials.back-to-top')

    @include('frontend.partials.subscribe')
    <script>

    </script>
@endsection
