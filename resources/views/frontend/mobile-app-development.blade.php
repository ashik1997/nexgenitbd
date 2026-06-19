@extends('layouts.frontend.app')
@push('title')
    Mobile App Development
@endpush
@section('meta-description', 'Professional Android, iOS, and cross-platform mobile app development services from product strategy and UI/UX design to launch and ongoing support.')
@section('content')

@include('frontend.partials.inner-hero', [
    'kicker' => 'Mobile product engineering',
    'title' => 'Mobile apps designed for real business growth',
    'breadcrumb' => 'Mobile App Development',
    'description' => 'We design and build secure, intuitive Android, iOS, and cross-platform applications—from product discovery to launch and long-term improvement.',
    'primaryUrl' => '#mobile-app-inquiry',
    'primaryLabel' => 'Plan your mobile app',
    'secondaryUrl' => route('frontend.projects'),
    'secondaryLabel' => 'View our projects',
])

<section class="service-overview-section">
    <div class="container">
        <div class="service-overview-grid">
            <div class="service-overview-copy">
                <span class="section-kicker">End-to-end mobile delivery</span>
                <h2>One experienced team from idea to App Store.</h2>
                <p>We combine product strategy, UI/UX design, engineering, quality assurance, and release support to create mobile experiences people enjoy using.</p>
                <div class="service-feature-grid">
                    <div><span>01</span><strong>Native & cross-platform</strong><small>Android, iOS, Flutter, and API-connected applications.</small></div>
                    <div><span>02</span><strong>Product-first UX</strong><small>Clear journeys, accessible interfaces, and conversion-focused design.</small></div>
                    <div><span>03</span><strong>Secure architecture</strong><small>Reliable authentication, data protection, and scalable backends.</small></div>
                    <div><span>04</span><strong>Launch & support</strong><small>Store submission, monitoring, maintenance, and future improvements.</small></div>
                </div>
            </div>
            <div class="service-overview-visual">
                <div class="service-visual-badge">Android · iOS · Cross-platform</div>
                <img src="{{ asset('assets/frontend/img/services/mobile-app.jpg') }}" alt="Professional mobile app development" loading="lazy">
                <div class="service-visual-stat"><strong>Full cycle</strong><span>Strategy to support</span></div>
            </div>
        </div>
    </div>
</section>

@if($website_voip_dialers->isNotEmpty())
<section class="service-detail-section">
    <div class="container">
        <div class="premium-section-heading">
            <span class="section-kicker">Mobile app capabilities</span>
            <h2>Built around your users, workflow, and growth plan.</h2>
            <p>Our service content remains manageable from your existing admin panel and is presented in a clearer, more engaging format.</p>
        </div>
        <div class="service-detail-list">
            @foreach ($website_voip_dialers as $website_voip_dialer)
                <article class="service-detail-card {{ $loop->even ? 'service-detail-card-reverse' : '' }}">
                    <div class="service-detail-content">
                        <span class="service-detail-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3>{{ $website_voip_dialer->title }}</h3>
                        <div class="premium-rich-text">{!! $website_voip_dialer->description !!}</div>
                    </div>
                    <div class="service-detail-image">
                        <img loading="lazy" src="{{ asset($website_voip_dialer->image ?: 'assets/frontend/img/services/mobile-app.jpg') }}" alt="{{ $website_voip_dialer->title }}">
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<section id="mobile-app-inquiry" class="premium-form-section">
    <div class="container">
        <div class="premium-form-layout">
            <div class="premium-form-intro">
                <span class="section-kicker">Start with a conversation</span>
                <h2>Tell us about your mobile app idea.</h2>
                <p>Share the product goal, target users, and the challenge you want to solve. Our team will respond with practical next steps.</p>
                <ul class="premium-check-list">
                    <li>Clear scope and technology guidance</li>
                    <li>Transparent delivery roadmap</li>
                    <li>No-obligation initial consultation</li>
                </ul>
            </div>
            <form class="send-message-form crumina-submit premium-contact-form" method="post" data-nonce="crumina-submit-form-nonce" data-type="standard" action="{{ route('frontend.mobileApp.inquiry') }}" enctype="multipart/form-data">
                @csrf
                <div class="premium-form-grid">
                    <div class="form-item">
                        <label for="mobile-name">Full name</label>
                        <input id="mobile-name" value="{{ old('name') }}" class="input--white" name="name" type="text" placeholder="Your name" required>
                    </div>
                    <div class="form-item">
                        <label for="mobile-phone">Phone number</label>
                        <input id="mobile-phone" value="{{ old('phone') }}" class="input--white" name="phone" type="text" placeholder="+880..." required>
                    </div>
                    <div class="form-item premium-form-wide">
                        <label for="mobile-email">Work email</label>
                        <input id="mobile-email" value="{{ old('email') }}" class="input--white" name="email" type="email" placeholder="name@company.com" required>
                    </div>
                    <div class="form-item premium-form-wide">
                        <label for="mobile-message">Project brief</label>
                        <textarea id="mobile-message" class="input--white" name="message" placeholder="What would you like the app to do?" rows="5" required>{{ old('message') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="crumina-button button--green button--l">Request a consultation</button>
            </form>
        </div>
    </div>
</section>

@include('frontend.partials.page-cta', [
    'kicker' => 'Ready when you are',
    'title' => 'Turn your mobile product idea into a reliable application.',
    'description' => 'Work with a product team that can design, build, launch, and improve your app.',
    'buttonLabel' => 'Talk to our app team',
])
@include('frontend.partials.back-to-top')
@include('frontend.partials.subscribe')

@endsection
