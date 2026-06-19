<section class="testimonial-showcase-section">
    <div class="container">
        <div class="testimonial-showcase-layout">
            <div class="testimonial-showcase-intro">
                <span class="section-kicker">Client perspective</span>
                <h2>Trusted for the work that matters.</h2>
                <p>Clear communication, thoughtful execution, and software that delivers measurable value.</p>
                <div class="testimonial-rating">
                    <span aria-label="Five out of five stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    <strong>4.9 average client rating</strong>
                </div>
            </div>

            <div class="crumina-module crumina-module-slider testimonial-premium-slider">
                <div class="swiper-container" data-show-items="1" data-prev-next="1" data-effect="fade" data-loop="false">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <article class="testimonial-premium-card">
                                    <div class="testimonial-quote-mark">&ldquo;</div>
                                    <p>{{ $testimonial->speech }}</p>
                                    <div class="testimonial-premium-author">
                                        <img loading="lazy" src="{{ asset($testimonial->writer_avatar ?: 'assets/frontend/img/demo-content/avatars/author8.png') }}" alt="{{ $testimonial->writer_name }}">
                                        <div>
                                            <strong>{{ $testimonial->writer_name }}</strong>
                                            <span>{{ $testimonial->writer_designation }}</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-pagination swiper-pagination-dark"></div>
            </div>
        </div>
    </div>
</section>
