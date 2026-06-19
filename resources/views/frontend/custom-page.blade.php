@extends('layouts.frontend.app')
@push('title')
    {{ optional($page)->name ?? 'Page' }}
@endpush
@section('meta-description', 'Explore the transparent NexGen IT software delivery process from discovery and product design through development, launch, and continuous improvement.')
@section('content')

@if($page && $page->slug === 'our-process')
    @include('frontend.partials.inner-hero', [
        'kicker' => 'How we work',
        'title' => $page->title,
        'breadcrumb' => $page->name,
        'description' => 'A transparent, collaborative delivery process that keeps your team informed and your product moving forward.',
        'primaryUrl' => route('frontend.contact'),
        'primaryLabel' => 'Plan your project',
        'secondaryUrl' => route('frontend.projects'),
        'secondaryLabel' => 'See delivered work',
    ])

    <section class="process-page-section">
        <div class="container">
            <div class="premium-section-heading premium-section-heading-centered">
                <span class="section-kicker">Structured, not rigid</span>
                <h2>A clear path from business challenge to working software.</h2>
                <p>Every engagement is adapted to your needs, while these four stages keep decisions, quality, and delivery visible.</p>
            </div>
            <div class="process-timeline">
                <article class="process-step">
                    <span class="process-step-number">01</span>
                    <div class="process-step-icon">D</div>
                    <h3>Discover</h3>
                    <p>We align on goals, users, workflows, constraints, and the outcomes that define success.</p>
                    <small>Workshops · Research · Requirements</small>
                </article>
                <article class="process-step">
                    <span class="process-step-number">02</span>
                    <div class="process-step-icon">P</div>
                    <h3>Plan & design</h3>
                    <p>We shape the experience, technical architecture, priorities, milestones, and delivery roadmap.</p>
                    <small>UX/UI · Architecture · Roadmap</small>
                </article>
                <article class="process-step">
                    <span class="process-step-number">03</span>
                    <div class="process-step-icon">B</div>
                    <h3>Build & validate</h3>
                    <p>We develop in focused iterations, demonstrate progress frequently, and test continuously.</p>
                    <small>Engineering · QA · Reviews</small>
                </article>
                <article class="process-step">
                    <span class="process-step-number">04</span>
                    <div class="process-step-icon">L</div>
                    <h3>Launch & improve</h3>
                    <p>We deploy confidently, monitor performance, support users, and improve from real feedback.</p>
                    <small>Deployment · Support · Growth</small>
                </article>
            </div>

            <div class="process-admin-content">
                <div>
                    <span class="section-kicker">Your process content</span>
                    <h2>Collaboration stays visible at every stage.</h2>
                </div>
                <div class="premium-rich-text">{!! $page->description !!}</div>
            </div>
        </div>
    </section>

    <section class="process-principles-section">
        <div class="container">
            <div class="process-principles-grid">
                <div><strong>Frequent communication</strong><p>Regular updates, demonstrations, and direct access to the team.</p></div>
                <div><strong>Measurable progress</strong><p>Clear milestones and working deliverables—not vague status reports.</p></div>
                <div><strong>Quality built in</strong><p>Reviews, testing, security, and maintainability throughout delivery.</p></div>
            </div>
        </div>
    </section>

    @include('frontend.partials.page-cta', [
        'kicker' => 'A practical first step',
        'title' => 'Let’s map the right delivery path for your product.',
        'description' => 'Tell us where you are today, and we’ll help define the clearest way forward.',
        'buttonLabel' => 'Start project discovery',
    ])
@elseif($page)
    @include('frontend.partials.inner-hero', [
        'kicker' => 'About NexGen IT',
        'title' => $page->title,
        'breadcrumb' => $page->name,
        'description' => 'Learn more about our company, capabilities, and approach to delivering dependable digital products.',
    ])
    <section class="generic-content-section">
        <div class="container">
            <article class="generic-content-card premium-rich-text">
                {!! $page->description !!}
            </article>
        </div>
    </section>
@endif

@include('frontend.partials.back-to-top')
@include('frontend.partials.subscribe')

@endsection
