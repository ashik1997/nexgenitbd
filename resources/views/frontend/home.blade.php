@extends('layouts.frontend.app')
@push('title')
    Home
@endpush
@section('content')

    @include('frontend.partials.main-slider')

    @include('frontend.partials.anime-js')

    @include('frontend.partials.seo')

    @include('frontend.partials.home-content')

    @include('frontend.partials.counter')

    @include('frontend.partials.client-says')

    @include('frontend.partials.clients')

    <!-- SUBSCRIBE SECTION -->
    @include('frontend.partials.subscribe')
    <!-- /SUBSCRIBE SECTION -->

    <!-- BACK TO TOP -->
    @include('frontend.partials.back-to-top')
    <!-- /BACK TO TOP -->
@endsection
