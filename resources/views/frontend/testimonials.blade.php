@extends('layouts.frontend.app')
@push('title')
    Client Testimonials
@endpush
@section('meta-description', 'Read client testimonials about working with NexGen IT for software development, product design, technical delivery, and long-term support.')
@section('content')

@include('frontend.partials.inner-hero', [
    'kicker' => 'Client experiences',
    'title' => 'Trusted partnerships, told by our clients',
    'breadcrumb' => 'Testimonials',
    'description' => 'Hear how organizations experience working with NexGen IT—from communication and delivery to long-term product value.',
    'primaryUrl' => route('frontend.contact'),
    'primaryLabel' => 'Work with our team',
    'secondaryUrl' => route('frontend.projects'),
    'secondaryLabel' => 'Explore our projects',
])

<section class="testimonials-page-section">
    <div class="container">
        <div class="testimonial-page-summary">
            <div>
                <span class="section-kicker">Partnership that performs</span>
                <h2>Clear communication. Thoughtful execution. Dependable results.</h2>
            </div>
            <div class="testimonial-score">
                <strong>4.9</strong>
                <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                <small>Average client experience</small>
            </div>
        </div>

        @if($testimonials->isNotEmpty())
            <div class="testimonial-page-grid">
                @foreach ($testimonials as $testimonial)
                    <article class="testimonial-page-card">
                        <div class="testimonial-page-quote">&ldquo;</div>
                        <div class="testimonial-page-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <blockquote>{{ $testimonial->speech }}</blockquote>
                        <footer>
                            <img loading="lazy" src="{{ asset($testimonial->writer_avatar ?: 'assets/frontend/img/demo-content/avatars/author8.png') }}" alt="{{ $testimonial->writer_name }}">
                            <div>
                                <strong>{{ $testimonial->writer_name }}</strong>
                                <span>{{ $testimonial->writer_designation }}</span>
                            </div>
                        </footer>
                    </article>
                @endforeach
            </div>
        @else
            <div class="premium-empty-state">Client testimonials will appear here once they are added.</div>
        @endif
    </div>
</section>

<section class="testimonial-trust-section">
    <div class="container">
        <div class="testimonial-trust-grid">
            <div><span>01</span><strong>Transparent delivery</strong><p>Progress, priorities, and decisions remain visible throughout the project.</p></div>
            <div><span>02</span><strong>Senior-level thinking</strong><p>Practical product and engineering guidance, not just task execution.</p></div>
            <div><span>03</span><strong>Long-term support</strong><p>A dependable technology partner beyond the first successful launch.</p></div>
        </div>
    </div>
</section>

@include('frontend.partials.page-cta', [
    'kicker' => 'Start your success story',
    'title' => 'Looking for a technology team you can rely on?',
    'description' => 'Let’s discuss what you need and how we can create value together.',
])
@include('frontend.partials.back-to-top')
@include('frontend.partials.subscribe')

@endsection
