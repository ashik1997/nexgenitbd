@extends('layouts.frontend.app')
@push('title')
    Contact Our Software Team
@endpush
@section('meta-description', 'Contact NexGen IT to discuss mobile apps, web platforms, custom software, UI/UX design, cloud solutions, automation, and technology consulting.')
@section('content')

@include('frontend.partials.inner-hero', [
    'kicker' => 'Start a conversation',
    'title' => 'Let’s talk about what you want to build',
    'breadcrumb' => 'Contact',
    'description' => 'Tell us about your business challenge, product idea, or technical goal. We’ll respond with thoughtful questions and a practical next step.',
])

<section class="contact-page-section">
    <div class="container">
        <div class="contact-page-layout">
            <div class="contact-information-panel">
                <span class="section-kicker">Contact NexGen IT</span>
                <h2>Good software starts with a clear conversation.</h2>
                <p>Whether you are planning a new product, modernizing an existing system, or need a dependable engineering partner, we’re ready to listen.</p>

                <div class="contact-method-list">
                    @if(frontend_phone_href())
                        <a href="{{ frontend_phone_href() }}" class="contact-method-card">
                            <span class="contact-method-icon">P</span>
                            <span><small>Call us</small><strong>{{ get_static_option('company_phone') }}</strong></span>
                        </a>
                    @endif
                    @if(get_static_option('company_email'))
                        <a href="mailto:{{ get_static_option('company_email') }}" class="contact-method-card">
                            <span class="contact-method-icon">E</span>
                            <span><small>Email us</small><strong>{{ get_static_option('company_email') }}</strong></span>
                        </a>
                    @endif
                    @if(frontend_whatsapp_url())
                        <a href="{{ frontend_whatsapp_url() }}" target="_blank" rel="noopener" class="contact-method-card">
                            <span class="contact-method-icon">W</span>
                            <span><small>WhatsApp</small><strong>Chat with our team</strong></span>
                        </a>
                    @endif
                </div>

                <div class="contact-availability">
                    <span>Office hours</span>
                    <strong>{{ get_static_option('company_office_hour') }}</strong>
                    <p>Messages sent outside office hours will be answered on the next working day.</p>
                </div>
            </div>

            <form class="send-message-form crumina-submit premium-contact-form contact-page-form" method="post" data-nonce="crumina-submit-form-nonce" data-type="standard" action="{{ route('frontend.contact.message') }}">
                @csrf
                <div class="contact-form-heading">
                    <span>Project inquiry</span>
                    <h3>How can we help?</h3>
                    <p>Complete the form and we’ll get back to you as soon as possible.</p>
                </div>
                <div class="premium-form-grid">
                    <div class="form-item">
                        <label for="contact-name">Full name</label>
                        <input id="contact-name" value="{{ old('name') }}" class="input--white" name="name" type="text" placeholder="Your name" required>
                    </div>
                    <div class="form-item">
                        <label for="contact-phone">Phone number</label>
                        <input id="contact-phone" value="{{ old('phone') }}" class="input--white" name="phone" type="text" placeholder="+880..." required>
                    </div>
                    <div class="form-item premium-form-wide">
                        <label for="contact-email">Work email</label>
                        <input id="contact-email" value="{{ old('email') }}" class="input--white" name="email" type="email" placeholder="name@company.com" required>
                    </div>
                    <div class="form-item premium-form-wide">
                        <label for="contact-message">Tell us about your requirements</label>
                        <textarea id="contact-message" class="input--white" name="message" placeholder="What are you planning, and what would a successful outcome look like?" rows="6" required>{{ old('message') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="crumina-button button--green button--l">Send project inquiry</button>
                <small class="contact-form-note">Your information is used only to respond to this inquiry.</small>
            </form>
        </div>
    </div>
</section>

<section class="contact-next-step-section">
    <div class="container">
        <div class="contact-next-step-grid">
            <div><span>01</span><strong>You share the context</strong><p>Tell us what you need, where you are today, and what success means.</p></div>
            <div><span>02</span><strong>We review and respond</strong><p>Our team considers the right expertise, questions, and practical options.</p></div>
            <div><span>03</span><strong>We define next steps</strong><p>If there is a good fit, we outline the discovery or delivery path together.</p></div>
        </div>
    </div>
</section>

@include('frontend.partials.subscribe')

@endsection
