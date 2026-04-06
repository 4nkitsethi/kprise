{{--
    Page: Blog Index
    Route: blog.index
    Controller: BlogController@index
--}}

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/inner-pages.css') }}">
@endpush

@section('content')

<section class="inner-hero">
    <div class="container">
        <span class="section-label">Resources</span>
        <h1 class="inner-hero__heading">Blog &amp; Learning Insights</h1>
        <p class="inner-hero__subtext">
            Practical guides, industry insights, and LMS tips from the Kprise team.
        </p>
    </div>
</section>

<section class="blog-section" aria-labelledby="blog-heading">
    <div class="container">
        <h2 class="sr-only" id="blog-heading">Blog posts</h2>

        {{-- Category Filter --}}
        @if (!empty($categories))
            <nav class="blog-filter" aria-label="Filter posts by category">
                <a href="{{ route('blog.index') }}"
                   class="blog-filter__pill {{ !request('category') ? 'blog-filter__pill--active' : '' }}">
                    All
                </a>
                @foreach ($categories as $cat)
                    <a href="{{ route('blog.index', ['category' => $cat['slug']]) }}"
                       class="blog-filter__pill {{ request('category') === $cat['slug'] ? 'blog-filter__pill--active' : '' }}">
                        {{ $cat['name'] }}
                    </a>
                @endforeach
            </nav>
        @endif

        {{-- Post Grid --}}
        <div class="blog-grid">
            @forelse ($posts as $post)
                <article class="blog-card">
                    @if (!empty($post['image']))
                        <a href="{{ route('blog.show', $post['slug']) }}" class="blog-card__image-wrap" tabindex="-1" aria-hidden="true">
                            <img
                                src="{{ $post['image'] }}"
                                alt="{{ $post['image_alt'] ?? $post['title'] }}"
                                class="blog-card__image"
                                loading="lazy"
                                decoding="async"
                            >
                        </a>
                    @endif

                    <div class="blog-card__body">
                        @if (!empty($post['category']))
                            <span class="blog-card__category">{{ $post['category'] }}</span>
                        @endif

                        <h2 class="blog-card__title">
                            <a href="{{ route('blog.show', $post['slug']) }}" style="color: inherit;">
                                {{ $post['title'] }}
                            </a>
                        </h2>

                        @if (!empty($post['excerpt']))
                            <p class="blog-card__excerpt">{{ $post['excerpt'] }}</p>
                        @endif

                        <div class="blog-card__meta">
                            <time class="blog-card__date" datetime="{{ $post['published_at'] ?? '' }}">
                                {{ !empty($post['published_at']) ? \Carbon\Carbon::parse($post['published_at'])->format('M j, Y') : '' }}
                            </time>
                            <a href="{{ route('blog.show', $post['slug']) }}" class="blog-card__read-more" aria-label="Read {{ $post['title'] }}">
                                Read more
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                                    <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <p class="blog-empty">No posts found. Check back soon.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($posts instanceof \Illuminate\Pagination\LengthAwarePaginator && $posts->hasPages())
            <nav class="pagination" aria-label="Blog pagination">
                {{ $posts->links() }}
            </nav>
        @endif

    </div>
</section>

<x-cta-band
    heading="See MyPass LMS in Action"
    subtext="Book a 30-minute live walkthrough with our team."
    :cta="['label' => 'Book a Demo', 'url' => config('services.demo_url', '#'), 'target' => '_blank']"
    variant="dark"
/>

@endsection

@push('styles')
<style>
.blog-section { padding: var(--space-12) 0 var(--space-16); }
.blog-filter {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    margin-bottom: var(--space-8);
}
.blog-filter__pill {
    padding: var(--space-2) var(--space-4);
    font-size: var(--text-sm);
    font-weight: var(--weight-medium);
    color: var(--color-text-secondary);
    background: var(--color-gray-50);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-full);
    transition: background var(--transition-fast), color var(--transition-fast), border-color var(--transition-fast);
}
.blog-filter__pill:hover,
.blog-filter__pill--active {
    background: var(--color-primary);
    color: var(--color-white);
    border-color: var(--color-primary);
}
.blog-empty {
    grid-column: 1/-1;
    text-align: center;
    color: var(--color-text-muted);
    padding: var(--space-16) 0;
}
.pagination {
    display: flex;
    justify-content: center;
    margin-top: var(--space-12);
}
</style>
@endpush
