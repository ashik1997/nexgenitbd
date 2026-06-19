@extends('layouts.frontend.app')
@push('title')
    Frequently Asked Questions
@endpush
@section('meta-description', 'Find answers about NexGen IT software services, project delivery, communication, technology choices, maintenance, and ongoing support.')
@section('content')

@include('frontend.partials.inner-hero', [
    'kicker' => 'Helpful answers',
    'title' => 'Questions before starting a software project',
    'breadcrumb' => 'FAQs',
    'description' => 'Clear answers about our services, delivery process, communication, support, and what it is like to work with NexGen IT.',
    'primaryUrl' => route('frontend.contact'),
    'primaryLabel' => 'Ask a question',
])

<section class="faq-page-section">
    <div class="container">
        <div class="faq-page-layout">
            <aside class="faq-page-intro">
                <span class="section-kicker">Frequently asked</span>
                <h2>Everything you need to move forward with confidence.</h2>
                <p>Can’t find the answer you need? Send us a message and our team will respond directly.</p>
                <div class="faq-help-card">
                    <span>Still have questions?</span>
                    <strong>Talk to a software specialist.</strong>
                    <a href="{{ route('frontend.contact') }}" class="premium-text-link">Contact our team <span>&rarr;</span></a>
                </div>
            </aside>

            <div class="premium-faq-list">
                @forelse($faqs as $faq)
                    <article class="premium-faq-item {{ $loop->first ? 'is-open' : '' }}">
                        <button type="button" class="premium-faq-question" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                            <span class="premium-faq-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <strong>{{ $faq->question }}</strong>
                            <span class="premium-faq-toggle"></span>
                        </button>
                        <div class="premium-faq-answer">
                            <div>{!! $faq->answer !!}</div>
                        </div>
                    </article>
                @empty
                    <div class="premium-empty-state">FAQs will appear here once they are added.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

@include('frontend.partials.page-cta', [
    'kicker' => 'Let’s make it clear',
    'title' => 'Have a question specific to your business or product?',
    'description' => 'Share a little context and we’ll give you a straightforward, practical answer.',
    'buttonLabel' => 'Send your question',
])
@include('frontend.partials.back-to-top')
@include('frontend.partials.subscribe')

@push('script')
<script>
    document.querySelectorAll('.premium-faq-question').forEach(function (button) {
        button.addEventListener('click', function () {
            var item = button.closest('.premium-faq-item');
            var isOpen = item.classList.contains('is-open');

            document.querySelectorAll('.premium-faq-item.is-open').forEach(function (openItem) {
                openItem.classList.remove('is-open');
                openItem.querySelector('.premium-faq-question').setAttribute('aria-expanded', 'false');
            });

            if (!isOpen) {
                item.classList.add('is-open');
                button.setAttribute('aria-expanded', 'true');
            }
        });
    });
</script>
@endpush

@endsection
