<section class="insights-section">
    <div class="container">
        <div class="insights-heading">
            <div>
                <span class="section-kicker">Ideas for better products</span>
                <h2>Latest insights</h2>
                <p>Practical thinking on software, product design, security, cloud, and growth.</p>
            </div>
            <a href="{{ route('frontend.blog.index') }}" class="insights-all-link">View all insights <span>&rarr;</span></a>
        </div>

        <div class="insights-grid">
            @foreach($blogs as $blog)
                <article class="insight-card">
                    <a href="{{ route('frontend.blog.show', $blog->slug) }}" class="insight-card-image">
                        <img loading="lazy" src="{{ asset($blog->image ?: get_static_option('no_image')) }}" alt="{{ $blog->title }}">
                        <span>Read article</span>
                    </a>
                    <div class="insight-card-content">
                        <div class="insight-card-meta">
                            <span>Software insights</span>
                            <time>{{ $blog->created_at->format('M d, Y') }}</time>
                        </div>
                        <h3><a href="{{ route('frontend.blog.show', $blog->slug) }}">{{ Str::limit($blog->title, 72) }}</a></h3>
                        <p>{{ Str::limit(strip_tags($blog->description), 115) }}</p>
                        <a href="{{ route('frontend.blog.show', $blog->slug) }}" class="insight-read-link">Continue reading <span>&nearr;</span></a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
