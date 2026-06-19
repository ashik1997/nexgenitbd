<section class="premium-page-hero">
    <div class="premium-page-hero-glow premium-page-hero-glow-one"></div>
    <div class="premium-page-hero-glow premium-page-hero-glow-two"></div>
    <div class="container">
        <div class="premium-page-hero-content">
            <nav class="premium-breadcrumbs" aria-label="Breadcrumb">
                <a href="{{ route('frontend.home') }}">Home</a>
                <span>/</span>
                <span>{{ $breadcrumb ?? $title }}</span>
            </nav>
            <span class="premium-page-kicker">{{ $kicker ?? 'NexGen IT' }}</span>
            <h1>{{ $title }}</h1>
            @if(!empty($description))
                <p>{{ $description }}</p>
            @endif
            @if(!empty($primaryUrl) || !empty($secondaryUrl))
                <div class="premium-page-actions">
                    @if(!empty($primaryUrl))
                        <a href="{{ $primaryUrl }}" class="crumina-button button--dark">{{ $primaryLabel ?? 'Start a conversation' }}</a>
                    @endif
                    @if(!empty($secondaryUrl))
                        <a href="{{ $secondaryUrl }}" class="premium-text-link">{{ $secondaryLabel ?? 'Explore our work' }} <span>&nearr;</span></a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
