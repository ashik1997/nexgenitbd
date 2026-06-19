@extends('layouts.frontend.app')
@push('title')
    Software & Product Insights
@endpush
@section('meta-description', 'Read practical NexGen IT insights about software engineering, product design, cybersecurity, cloud technology, automation, and digital growth.')
@section('content')

@include('frontend.partials.inner-hero', [
    'kicker' => 'NexGen IT insights',
    'title' => 'Practical ideas for better digital products',
    'breadcrumb' => 'Blogs',
    'description' => 'Thoughtful guidance on software engineering, product design, security, cloud technology, and digital growth.',
    'primaryUrl' => route('frontend.contact'),
    'primaryLabel' => 'Ask our experts',
])

<section class="blog-index-section">
    <div class="container">
        <div class="premium-section-heading">
            <span class="section-kicker">Latest thinking</span>
            <h2>Insights for teams building and improving software.</h2>
            <p>Browse the latest articles published through your existing blog management system.</p>
        </div>

        @if($blogs->isNotEmpty())
            @php($featuredBlog = $blogs->first())
            <article class="featured-blog-card">
                <a href="{{ route('frontend.blog.show', $featuredBlog->slug) }}" class="featured-blog-image">
                    <img loading="lazy" src="{{ asset($featuredBlog->image ?: get_static_option('no_image')) }}" alt="{{ $featuredBlog->title }}">
                </a>
                <div class="featured-blog-content">
                    <div class="premium-blog-meta">
                        <span>Featured insight</span>
                        <time>{{ $featuredBlog->created_at->format('M d, Y') }}</time>
                    </div>
                    <h2><a href="{{ route('frontend.blog.show', $featuredBlog->slug) }}">{{ $featuredBlog->title }}</a></h2>
                    <p>{{ Str::limit(strip_tags($featuredBlog->description), 190) }}</p>
                    <div class="featured-blog-footer">
                        @if($featuredBlog->writer)
                            <div class="premium-blog-author">
                                <img src="{{ asset($featuredBlog->writer->avatar ?: get_static_option('no_image')) }}" alt="{{ $featuredBlog->writer->name }}">
                                <span><small>Written by</small><strong>{{ $featuredBlog->writer->name }}</strong></span>
                            </div>
                        @endif
                        <a href="{{ route('frontend.blog.show', $featuredBlog->slug) }}" class="premium-text-link">Read article <span>&nearr;</span></a>
                    </div>
                </div>
            </article>

            <div class="blog-index-grid">
                @foreach($blogs->skip(1) as $blog)
                    <article class="blog-index-card">
                        <a href="{{ route('frontend.blog.show', $blog->slug) }}" class="blog-index-image">
                            <img loading="lazy" src="{{ asset($blog->image ?: get_static_option('no_image')) }}" alt="{{ $blog->title }}">
                            <span>Read insight</span>
                        </a>
                        <div class="blog-index-content">
                            <div class="premium-blog-meta">
                                <span>Technology</span>
                                <time>{{ $blog->created_at->format('M d, Y') }}</time>
                            </div>
                            <h3><a href="{{ route('frontend.blog.show', $blog->slug) }}">{{ Str::limit($blog->title, 78) }}</a></h3>
                            <p>{{ Str::limit(strip_tags($blog->description), 120) }}</p>
                            <a href="{{ route('frontend.blog.show', $blog->slug) }}" class="premium-text-link">Continue reading <span>&rarr;</span></a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="premium-empty-state">New insights will appear here once they are published.</div>
        @endif
    </div>
</section>

@include('frontend.partials.page-cta', [
    'kicker' => 'Need advice for your product?',
    'title' => 'Turn the right technical insight into your next business advantage.',
    'description' => 'Talk with our team about architecture, UX, modernization, automation, or a new software product.',
    'buttonLabel' => 'Speak with an expert',
])
@include('frontend.partials.back-to-top')
@include('frontend.partials.subscribe')

@endsection
