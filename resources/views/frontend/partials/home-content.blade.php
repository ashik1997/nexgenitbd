<section class="capabilities-section">
    <div class="container">
        <div class="capabilities-intro">
            <div>
                <span class="section-kicker">How we create value</span>
                <h2>From product thinking to reliable delivery</h2>
            </div>
            <p>One experienced team across strategy, design, engineering, launch, and continuous improvement.</p>
        </div>

        <div class="capability-list">
            @foreach ($home_contents as $home_content)
                <article class="capability-row {{ $loop->even ? 'capability-row-reverse' : '' }}">
                    <div class="capability-copy">
                        <span class="capability-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3>{{ $home_content->title }}</h3>
                        <div class="capability-description">{!! $home_content->description !!}</div>
                        <a href="{{ route('frontend.contact') }}" class="capability-link">Discuss your requirements <span>&rarr;</span></a>
                    </div>
                    <div class="capability-visual">
                        <div class="capability-visual-orbit"></div>
                        <img loading="lazy"
                             src="{{ asset($home_content->image ?: ($loop->odd ? 'assets/frontend/img/services/ui-ux-design.jpg' : 'assets/frontend/img/services/custom-software.jpg')) }}"
                             alt="{{ $home_content->title }}">
                        <span class="capability-visual-label">{{ $loop->last ? 'Support & scale' : ($loop->even ? 'Build & launch' : 'Discover & design') }}</span>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
