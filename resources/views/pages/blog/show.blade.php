{{--
    Page: Blog Single Post
    Route: blog.show
    Controller: BlogController@show
--}}

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/inner-pages.css') }}">
@endpush

@section('content')

<article class="blog-post" itemscope itemtype="https://schema.org/BlogPosting">

    {{-- Post Hero --}}
    <header class="blog-post__hero">
        <div class="container blog-post__hero-inner">

            <nav class="breadcrumbs" aria-label="Breadcrumb">
                <ol class="breadcrumbs__list" role="list">
                    <li class="breadcrumbs__item">
                        <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
                        <span class="breadcrumbs__sep" aria-hidden="true">/</span>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="{{ route('blog.index') }}" class="breadcrumbs__link">Blog</a>
                        <span class="breadcrumbs__sep" aria-hidden="true">/</span>
                    </li>
                    <li class="breadcrumbs__item">
                        <span class="breadcrumbs__current" aria-current="page">{{ Str::limit($post['title'], 50) }}</span>
                    </li>
                </ol>
            </nav>

            @if (!empty($post['category']))
                <span class="section-label" itemprop="articleSection">{{ $post['category'] }}</span>
            @endif

            <h1 class="blog-post__title" itemprop="headline">{{ $post['title'] }}</h1>

            <div class="blog-post__meta">
                @if (!empty($post['author']))
                    <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                        <span itemprop="name">{{ $post['author'] }}</span>
                    </span>
                @endif
                @if (!empty($post['published_at']))
                    <span class="blog-post__sep" aria-hidden="true">·</span>
                    <time itemprop="datePublished" datetime="{{ $post['published_at'] }}">
                        {{ \Carbon\Carbon::parse($post['published_at'])->format('F j, Y') }}
                    </time>
                @endif
                @if (!empty($post['read_time']))
                    <span class="blog-post__sep" aria-hidden="true">·</span>
                    <span>{{ $post['read_time'] }} min read</span>
                @endif
            </div>

        </div>
    </header>

    {{-- Featured Image --}}
    @if (!empty($post['image']))
        <div class="container blog-post__featured-image-wrap">
            <img
                src="{{ $post['image'] }}"
                alt="{{ $post['image_alt'] ?? $post['title'] }}"
                class="blog-post__featured-image"
                itemprop="image"
                loading="eager"
                decoding="async"
            >
        </div>
    @endif

    {{-- Post Body + Sidebar --}}
    <div class="container blog-post__layout">

        {{-- Content --}}
        <div class="blog-post__content" itemprop="articleBody">
            {!! $post['content'] !!}
        </div>

        {{-- Sidebar --}}
        <aside class="blog-post__sidebar" aria-label="Related content">

            {{-- CTA Card --}}
            <div class="sidebar-card sidebar-card--cta">
                <p class="sidebar-card__eyebrow">Free for 90 days</p>
                <h3 class="sidebar-card__heading">Try MyPass LMS</h3>
                <p class="sidebar-card__body">5,000 free credits. No credit card. No contracts.</p>
                <a href="{{ config('services.lms_register_url', '#') }}"
                   class="btn btn--primary"
                   target="_blank"
                   rel="noopener">
                    Start Free Trial
                </a>
            </div>

            {{-- Related Posts --}}
            @if (!empty($relatedPosts))
                <div class="sidebar-related">
                    <h3 class="sidebar-related__heading">Related articles</h3>
                    @foreach ($relatedPosts as $related)
                        <a href="{{ route('blog.show', $related['slug']) }}" class="sidebar-related__item">
                            @if (!empty($related['image']))
                                <img
                                    src="{{ $related['image'] }}"
                                    alt="{{ $related['title'] }}"
                                    class="sidebar-related__thumb"
                                    loading="lazy"
                                    width="64"
                                    height="64"
                                >
                            @endif
                            <div>
                                <p class="sidebar-related__title">{{ $related['title'] }}</p>
                                @if (!empty($related['published_at']))
                                    <time class="sidebar-related__date" datetime="{{ $related['published_at'] }}">
                                        {{ \Carbon\Carbon::parse($related['published_at'])->format('M j, Y') }}
                                    </time>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

        </aside>

    </div>

</article>

<x-cta-band
    heading="Ready to Transform Your Training?"
    subtext="See why teams choose MyPass LMS over traditional platforms."
    :cta="['label' => 'Book a Demo', 'url' => config('services.demo_url', '#'), 'target' => '_blank']"
    variant="dark"
/>

@endsection

@push('schema')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "{{ $post['title'] }}",
    "image": "{{ $post['image'] ?? asset('assets/images/og-default.png') }}",
    "author": {
        "@type": "Person",
        "name": "{{ $post['author'] ?? 'Kprise Team' }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Kprise",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('assets/images/logo-color.png') }}"
        }
    },
    "datePublished": "{{ $post['published_at'] ?? '' }}",
    "dateModified":  "{{ $post['updated_at'] ?? $post['published_at'] ?? '' }}",
    "description": "{{ $post['excerpt'] ?? '' }}",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ url()->current() }}"
    }
}
</script>
@endverbatim
@endpush

@push('styles')
<style>
.blog-post__hero {
    padding: var(--space-12) 0 var(--space-8);
    background: linear-gradient(135deg, #F8F6FF 0%, #FFFFFF 70%);
    border-bottom: 1px solid var(--color-gray-100);
}
.blog-post__hero-inner { max-width: 800px; }
.blog-post__title {
    font-family: var(--font-display);
    font-size: clamp(var(--text-2xl), 4vw, var(--text-4xl));
    font-weight: var(--weight-bold);
    line-height: var(--leading-tight);
    color: var(--color-gray-900);
    margin-bottom: var(--space-4);
    margin-top: var(--space-3);
}
.blog-post__meta {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    font-size: var(--text-sm);
    color: var(--color-text-muted);
    flex-wrap: wrap;
}
.blog-post__sep { color: var(--color-gray-200); }

.blog-post__featured-image-wrap {
    margin: var(--space-8) auto;
    max-width: 900px;
}
.blog-post__featured-image {
    width: 100%;
    border-radius: var(--radius-xl);
    aspect-ratio: 16/9;
    object-fit: cover;
}

.blog-post__layout {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: var(--space-12);
    align-items: start;
    padding-bottom: var(--space-16);
    padding-top: var(--space-4);
}

.blog-post__content {
    font-size: var(--text-lg);
    line-height: var(--leading-relaxed);
    color: var(--color-text-secondary);
}
.blog-post__content h2 {
    font-family: var(--font-display);
    font-size: var(--text-2xl);
    font-weight: var(--weight-bold);
    color: var(--color-gray-900);
    margin: var(--space-10) 0 var(--space-4);
    line-height: var(--leading-snug);
}
.blog-post__content h3 {
    font-family: var(--font-display);
    font-size: var(--text-xl);
    font-weight: var(--weight-semibold);
    color: var(--color-gray-900);
    margin: var(--space-8) 0 var(--space-3);
}
.blog-post__content p { margin-bottom: var(--space-5); }
.blog-post__content ul, .blog-post__content ol {
    padding-left: var(--space-6);
    margin-bottom: var(--space-5);
    list-style: disc;
}
.blog-post__content ol { list-style: decimal; }
.blog-post__content li { margin-bottom: var(--space-2); }
.blog-post__content a { color: var(--color-primary); text-decoration: underline; }
.blog-post__content strong { font-weight: var(--weight-semibold); color: var(--color-gray-900); }
.blog-post__content img {
    width: 100%;
    border-radius: var(--radius-lg);
    margin: var(--space-6) 0;
}
.blog-post__content blockquote {
    border-left: 3px solid var(--color-primary);
    padding: var(--space-4) var(--space-6);
    margin: var(--space-6) 0;
    background: var(--color-primary-light);
    border-radius: 0 var(--radius-md) var(--radius-md) 0;
    font-style: italic;
    color: var(--color-gray-800);
}

/* Sidebar */
.blog-post__sidebar {
    position: sticky;
    top: calc(var(--header-height) + var(--space-6));
    display: flex;
    flex-direction: column;
    gap: var(--space-5);
}
.sidebar-card {
    padding: var(--space-6);
    border-radius: var(--radius-xl);
    border: 1px solid var(--color-border);
}
.sidebar-card--cta {
    background: var(--color-primary);
    border-color: var(--color-primary);
}
.sidebar-card__eyebrow {
    font-size: var(--text-xs);
    font-weight: var(--weight-semibold);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: rgba(255,255,255,0.7);
    margin-bottom: var(--space-2);
}
.sidebar-card__heading {
    font-family: var(--font-display);
    font-size: var(--text-xl);
    font-weight: var(--weight-bold);
    color: var(--color-white);
    margin-bottom: var(--space-2);
}
.sidebar-card__body {
    font-size: var(--text-sm);
    color: rgba(255,255,255,0.75);
    margin-bottom: var(--space-5);
    line-height: var(--leading-relaxed);
}

.sidebar-related__heading {
    font-family: var(--font-display);
    font-size: var(--text-base);
    font-weight: var(--weight-semibold);
    margin-bottom: var(--space-4);
    color: var(--color-gray-900);
}
.sidebar-related__item {
    display: flex;
    gap: var(--space-3);
    align-items: flex-start;
    padding: var(--space-3) 0;
    border-top: 1px solid var(--color-gray-100);
    transition: color var(--transition-fast);
    color: inherit;
}
.sidebar-related__item:hover .sidebar-related__title { color: var(--color-primary); }
.sidebar-related__thumb {
    width: 60px;
    height: 60px;
    border-radius: var(--radius-md);
    object-fit: cover;
    flex-shrink: 0;
}
.sidebar-related__title {
    font-size: var(--text-sm);
    font-weight: var(--weight-medium);
    color: var(--color-gray-900);
    line-height: var(--leading-snug);
    margin-bottom: var(--space-1);
    transition: color var(--transition-fast);
}
.sidebar-related__date { font-size: var(--text-xs); color: var(--color-text-muted); }

@media (max-width: 900px) {
    .blog-post__layout { grid-template-columns: 1fr; }
    .blog-post__sidebar { position: static; }
}
</style>
@endpush
