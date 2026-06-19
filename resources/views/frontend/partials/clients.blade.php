<section class="large-padding client-showcase-section section-anime-js">
    <div class="container">
        <div class="client-showcase-heading">
            <div>
                <div class="section-kicker">Trusted partnerships</div>
                <h2>Chosen by teams building what’s next</h2>
                <p>We work as an extension of our clients’ teams—bringing product thinking, dependable engineering, and long-term support.</p>
            </div>
            <a href="{{ route('frontend.contact') }}" class="client-showcase-link">
                Become a client <span>→</span>
            </a>
        </div>

        @if($website_clients->isNotEmpty())
            <div class="client-logo-grid">
                @foreach ($website_clients as $website_client)
                    <a href="{{ $website_client->url ?: '#' }}"
                       @if($website_client->url && $website_client->url !== '#') target="_blank" rel="noopener" @endif
                       class="client-logo-card">
                        <div class="client-logo-frame">
                            @if($website_client->image)
                                <img loading="lazy" src="{{ asset($website_client->image) }}" alt="{{ $website_client->name ?: 'Client logo' }}">
                            @else
                                <span>{{ Str::upper(Str::substr($website_client->name ?: 'Client', 0, 2)) }}</span>
                            @endif
                        </div>
                        <div class="client-card-meta">
                            <strong>{{ $website_client->name ?: 'Valued Client' }}</strong>
                            <span>{{ $website_client->industry ?: 'Digital Business' }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="client-showcase-empty">Client partnerships will appear here when added from the admin panel.</div>
        @endif

        <div class="client-proof-bar">
            <div><strong>{{ get_static_option('counter_client') }}</strong><span>Clients supported</span></div>
            <div><strong>{{ get_static_option('counter_project') }}</strong><span>Projects delivered</span></div>
            <div><strong>{{ get_static_option('counter_year') }}</strong><span>Years of experience</span></div>
            <div><strong>4.9/5</strong><span>Average satisfaction</span></div>
        </div>
    </div>
</section>
