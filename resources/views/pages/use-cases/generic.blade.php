{{--
    Page Template: Generic Use Case / Industry Page
    Route: any use-case or industry route
    Controller: passes $pageHero, $features, $testimonials, $integrationLogos

    This single template renders Sales, Employee, Cybersecurity,
    Partner, Compliance training pages — and any industry page —
    by just swapping the data from the controller.
--}}

@extends('layouts.inner-page')

@section('inner-content')

    {{-- Feature overview block --}}
    <x-feature-block
        icon="{{ asset('assets/images/icons/featured-icon.png') }}"
        label="{{ $pageHero['label'] ?? '' }}"
        heading="{{ $pageHero['heading'] ?? '' }}"
        subtext="{{ $pageHero['subtext'] ?? '' }}"
        :bullets="$bullets ?? []"
        imageUrl="{{ $screenImage ?? asset('assets/images/screens/dashboard.png') }}"
        imageAlt="{{ $pageHero['heading'] ?? 'Feature' }} screenshot"
        id="page-feature"
    />

    {{-- Features grid --}}
    @if (!empty($features))
        <x-platform-features
            label="How It Works"
            heading="Everything you need, in one platform."
            :features="$features"
            :cols="3"
        />
    @endif

    {{-- Testimonials --}}
    @if (!empty($testimonials))
        <x-testimonials
            heading="Trusted by teams like yours."
            :testimonials="$testimonials"
        />
    @endif

    {{-- Integrations --}}
    @if (!empty($integrationLogos))
        <x-logo-strip
            label="Integrations"
            heading="Connects with your existing tools"
            :logos="$integrationLogos"
            :scrolling="false"
            :columns="5"
        />
    @endif

@endsection
