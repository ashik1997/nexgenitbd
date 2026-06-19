@extends('layouts.frontend.app')
@push('title')
    Project Gallery
@endpush
@section('meta-description', 'Explore selected interfaces, digital product designs, and software project visuals created by the NexGen IT team.')
@section('content')

@include('frontend.partials.inner-hero', [
    'kicker' => 'Selected visual work',
    'title' => 'A closer look at what we create',
    'breadcrumb' => 'Gallery',
    'description' => 'Explore interfaces, product experiences, and digital solutions created for ambitious businesses.',
    'primaryUrl' => route('frontend.projects'),
    'primaryLabel' => 'View case studies',
    'secondaryUrl' => route('frontend.contact'),
    'secondaryLabel' => 'Discuss your project',
])

<section class="gallery-page-section">
    <div class="container">
        <div class="premium-section-heading">
            <span class="section-kicker">Our gallery</span>
            <h2>Design details that support better experiences.</h2>
            <p>Every image is managed dynamically through the existing gallery system.</p>
        </div>

        @if($galleries->isNotEmpty())
            @php
                $galleryFallbacks = [
                    'assets/frontend/img/services/custom-software.jpg',
                    'assets/frontend/img/services/mobile-app.jpg',
                    'assets/frontend/img/services/ui-ux-design.jpg',
                    'assets/frontend/img/services/cloud-devops.jpg',
                    'assets/frontend/img/services/api-integration.jpg',
                    'assets/frontend/img/services/software-consultation.jpg',
                ];
            @endphp
            <div class="premium-gallery-grid">
                @foreach ($galleries as $gallery)
                    @php($galleryImage = $gallery->image ?: $galleryFallbacks[$loop->index % count($galleryFallbacks)])
                    <figure class="premium-gallery-card {{ $loop->iteration % 5 === 1 ? 'premium-gallery-card-featured' : '' }}">
                        <button type="button" class="premium-gallery-trigger" data-gallery-src="{{ asset($galleryImage) }}" aria-label="Open gallery image {{ $loop->iteration }}">
                            <img loading="lazy" src="{{ asset($galleryImage) }}" alt="NexGen IT project gallery image {{ $loop->iteration }}">
                            <span class="premium-gallery-overlay">
                                <small>Project visual</small>
                                <strong>View image <span>&nearr;</span></strong>
                            </span>
                        </button>
                    </figure>
                @endforeach
            </div>
        @else
            <div class="premium-empty-state">Gallery images will appear here once they are added from the admin panel.</div>
        @endif
    </div>
</section>

<div class="premium-gallery-lightbox" id="premium-gallery-lightbox" aria-hidden="true">
    <button type="button" class="premium-gallery-close" aria-label="Close gallery">&times;</button>
    <img src="" alt="Expanded gallery view">
</div>

@include('frontend.partials.page-cta', [
    'kicker' => 'Your product could be next',
    'title' => 'Need a digital experience that looks as strong as it performs?',
    'description' => 'Let’s create a polished product around your users and business goals.',
])
@include('frontend.partials.back-to-top')
@include('frontend.partials.subscribe')

@push('script')
<script>
    (function () {
        var lightbox = document.getElementById('premium-gallery-lightbox');
        if (!lightbox) return;
        var image = lightbox.querySelector('img');
        var close = lightbox.querySelector('.premium-gallery-close');

        document.querySelectorAll('.premium-gallery-trigger').forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                image.src = trigger.getAttribute('data-gallery-src');
                lightbox.classList.add('is-visible');
                lightbox.setAttribute('aria-hidden', 'false');
                document.body.classList.add('gallery-lightbox-open');
            });
        });

        function closeLightbox() {
            lightbox.classList.remove('is-visible');
            lightbox.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('gallery-lightbox-open');
        }

        close.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', function (event) {
            if (event.target === lightbox) closeLightbox();
        });
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeLightbox();
        });
    }());
</script>
@endpush

@endsection
