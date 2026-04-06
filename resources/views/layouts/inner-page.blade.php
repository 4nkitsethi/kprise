{{--
    Page Template: Inner Page (Use Cases, Industries, Solutions, About)
    Usage: @extends('layouts.inner-page')

    Available sections:
    @section('page-hero')   — override the hero
    @section('content')     — main body content
    @section('sidebar')     — optional right sidebar (not rendered by default)

    Available variables (pass from controller):
    $seo         — SEO meta array
    $breadcrumbs — [['label' => 'Home', 'url' => '/'], ['label' => 'Current Page']]
    $pageHero    — ['label', 'heading', 'subtext', 'ctaLabel', 'ctaUrl']
--}}

@extends('layouts.app')


@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/inner-pages.css') }}">
@endpush


@section('content')

    {{-- Page Hero --}}
    @hasSection('page-hero')
        @yield('page-hero')
    @else
        <section class="inner-hero" aria-labelledby="inner-hero-heading">
            <div class="container inner-hero__inner">

                {{-- Breadcrumbs --}}
                @if (!empty($breadcrumbs))
                    <nav class="breadcrumbs" aria-label="Breadcrumb">
                        <ol class="breadcrumbs__list" role="list">
                            @foreach ($breadcrumbs as $crumb)
                                <li class="breadcrumbs__item">
                                    @if (!empty($crumb['url']))
                                        <a href="{{ $crumb['url'] }}" class="breadcrumbs__link">{{ $crumb['label'] }}</a>
                                        <span class="breadcrumbs__sep" aria-hidden="true">/</span>
                                    @else
                                        <span class="breadcrumbs__current" aria-current="page">{{ $crumb['label'] }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                @endif

                <div class="inner-hero__copy">
                    @if (!empty($pageHero['label']))
                        <span class="section-label">{{ $pageHero['label'] }}</span>
                    @endif

                    <h1 class="inner-hero__heading" id="inner-hero-heading">
                        {{ $pageHero['heading'] ?? ($seo['title'] ?? 'Page Heading') }}
                    </h1>

                    @if (!empty($pageHero['subtext']))
                        <p class="inner-hero__subtext">{{ $pageHero['subtext'] }}</p>
                    @endif

                    @if (!empty($pageHero['ctaLabel']) && !empty($pageHero['ctaUrl']))
                        <a
                            href="{{ $pageHero['ctaUrl'] }}"
                            class="btn btn--primary btn--lg"
                            @if (!empty($pageHero['ctaTarget'])) target="{{ $pageHero['ctaTarget'] }}" rel="noopener" @endif
                        >
                            {{ $pageHero['ctaLabel'] }}
                        </a>
                    @endif
                </div>

            </div>
        </section>
    @endif

    {{-- Main Content --}}
    <div class="inner-page">
        <div class="container">
            @yield('inner-content')
        </div>
    </div>

    {{-- Bottom CTA --}}
    @unless($hideCta ?? false)
        <x-cta-band
            heading="Ready to Transform Your Training?"
            subtext="Start free for 90 days. No credit card. No contracts."
            :cta="['label' => 'Book a Demo', 'url' => config('services.demo_url', '#'), 'target' => '_blank']"
            variant="dark"
        />
    @endunless

@endsection
