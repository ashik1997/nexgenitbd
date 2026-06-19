<section class="premium-page-cta-section">
    <div class="container">
        <div class="premium-page-cta">
            <div>
                <span class="section-kicker">{{ $kicker ?? 'Let’s build something useful' }}</span>
                <h2>{{ $title ?? 'Have a digital product in mind?' }}</h2>
                <p>{{ $description ?? 'Share your goals with our team and get a practical next-step recommendation.' }}</p>
            </div>
            <div class="premium-page-cta-actions">
                <a href="{{ route('frontend.contact') }}" class="crumina-button button--dark">{{ $buttonLabel ?? 'Discuss your project' }}</a>
                @if(frontend_phone_href())
                    <a href="{{ frontend_phone_href() }}" class="premium-cta-phone">Call {{ get_static_option('company_phone') }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
