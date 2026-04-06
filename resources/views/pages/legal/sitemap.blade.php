{{--
    Page: HTML Sitemap
    Route: sitemap
--}}

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/inner-pages.css') }}">
@endpush

@section('content')

<section class="inner-hero">
    <div class="container">
        <h1 class="inner-hero__heading">Site Map</h1>
        <p class="inner-hero__subtext">A complete directory of all pages on the MyPass LMS website.</p>
    </div>
</section>

<div class="container sitemap-content">
    <div class="sitemap-grid">
        @foreach ($sections as $sectionName => $links)
            <div class="sitemap-section">
                <h2 class="sitemap-section__heading">{{ $sectionName }}</h2>
                <ul class="sitemap-section__list" role="list">
                    @foreach ($links as $link)
                        <li class="sitemap-section__item">
                            <a href="{{ $link['url'] }}" class="sitemap-section__link">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                                    <path d="M3 7h8M7 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>

@endsection

@push('styles')
<style>
.sitemap-content { padding: var(--space-12) 0 var(--space-20); }
.sitemap-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: var(--space-8);
}
.sitemap-section__heading {
    font-family: var(--font-display);
    font-size: var(--text-base);
    font-weight: var(--weight-semibold);
    color: var(--color-gray-900);
    margin-bottom: var(--space-4);
    padding-bottom: var(--space-2);
    border-bottom: 2px solid var(--color-primary-light);
}
.sitemap-section__list { display: flex; flex-direction: column; gap: var(--space-2); }
.sitemap-section__link {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    font-size: var(--text-sm);
    color: var(--color-text-secondary);
    transition: color var(--transition-fast);
}
.sitemap-section__link:hover { color: var(--color-primary); }
</style>
@endpush
