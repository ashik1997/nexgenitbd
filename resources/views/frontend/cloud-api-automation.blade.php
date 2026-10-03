@extends('layouts.frontend.app')
@push('title')
    Cloud, API & Automation
@endpush
@section('meta-description', 'Cloud infrastructure, DevOps, API integration, and workflow automation services for reliable, scalable digital products.')
@section('content')

@include('frontend.partials.inner-hero', [
    'kicker' => 'Connected, dependable systems',
    'title' => 'Cloud, API, and automation that help your business move faster',
    'breadcrumb' => 'Cloud, API & Automation',
    'description' => 'We build reliable cloud environments, connect business systems, and automate repetitive workflows.',
    'primaryUrl' => route('frontend.contact'),
    'primaryLabel' => 'Discuss your infrastructure',
    'secondaryUrl' => route('frontend.projects'),
    'secondaryLabel' => 'View our projects',
])

<section class="service-detail-section">
    <div class="container">
        <div class="premium-section-heading">
            <span class="section-kicker">Modern infrastructure and integration</span>
            <h2>Practical engineering for scalable operations.</h2>
            <p>Strengthen delivery, reliability, and data flow with solutions designed around your existing business systems.</p>
        </div>
        <div class="service-detail-list">
            <article class="service-detail-card">
                <div class="service-detail-content">
                    <span class="service-detail-number">01</span>
                    <h3>Cloud infrastructure and DevOps</h3>
                    <div class="premium-rich-text"><p>Reliable cloud environments, CI/CD pipelines, monitoring, and deployment automation that improve uptime and delivery speed.</p></div>
                </div>
                <div class="service-detail-image"><img loading="lazy" src="{{ asset('assets/frontend/img/services/cloud-devops.jpg') }}" alt="Cloud infrastructure and DevOps"></div>
            </article>
            <article class="service-detail-card service-detail-card-reverse">
                <div class="service-detail-content">
                    <span class="service-detail-number">02</span>
                    <h3>API and system integration</h3>
                    <div class="premium-rich-text"><p>Connect CRMs, ERPs, payment gateways, applications, and third-party platforms through secure, maintainable APIs.</p></div>
                </div>
                <div class="service-detail-image"><img loading="lazy" src="{{ asset('assets/frontend/img/services/api-integration.jpg') }}" alt="API and system integration"></div>
            </article>
            <article class="service-detail-card">
                <div class="service-detail-content">
                    <span class="service-detail-number">03</span>
                    <h3>Workflow automation</h3>
                    <div class="premium-rich-text"><p>Automate repetitive work, approvals, notifications, and reporting to reduce errors and give your team more time.</p></div>
                </div>
                <div class="service-detail-image"><img loading="lazy" src="{{ asset('assets/frontend/img/services/software-consultation.jpg') }}" alt="Business workflow automation"></div>
            </article>
        </div>
    </div>
</section>

@include('frontend.partials.page-cta', [
    'kicker' => 'Build a stronger foundation',
    'title' => 'Make your infrastructure and workflows easier to operate.',
    'description' => 'Tell us where your systems slow the team down, and we will recommend a practical next step.',
    'buttonLabel' => 'Talk to our engineering team',
])
@include('frontend.partials.back-to-top')
@include('frontend.partials.subscribe')

@endsection
