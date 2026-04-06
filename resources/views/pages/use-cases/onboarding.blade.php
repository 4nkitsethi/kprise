{{--
    Page: Onboarding Training — Use Case
    Route: use-cases.onboarding
    Controller: UseCaseController@onboarding
--}}

@extends('layouts.inner-page')

@section('inner-content')

    {{-- Feature: Onboarding overview --}}
    <x-feature-block
        icon="{{ asset('assets/images/icons/featured-icon.png') }}"
        label="Onboarding Training"
        heading="Get New Hires Productive from Day One"
        subtext="Manual onboarding is slow, inconsistent, and hard to track. MyPass LMS automates the entire process — from welcome emails to compliance sign-offs."
        :bullets="[
            'Auto-enroll new hires the moment they\'re added to your HR system.',
            'Build structured onboarding paths for every role in minutes using AI.',
            'Track completion, quiz scores, and time-to-productivity in real time.',
            'Reduce ramp time by up to 50% with guided, self-paced learning journeys.',
        ]"
        imageUrl="{{ asset('assets/images/screens/onboarding.png') }}"
        imageAlt="Onboarding training dashboard"
        id="onboarding-overview"
    />

    {{-- Platform features relevant to onboarding --}}
    <x-platform-features
        label="How It Works"
        heading="Everything you need to onboard at scale."
        subtext="From offer-accepted to fully productive — all in one platform."
        :features="[
            ['title' => 'Role-based learning paths',     'body' => 'Assign the right content automatically based on job title, department, or location.'],
            ['title' => 'AI course creation',            'body' => 'Upload your existing onboarding docs and let AI turn them into interactive courses instantly.'],
            ['title' => 'Automated reminders',           'body' => 'No more chasing new hires. MyPass sends nudges automatically until tasks are complete.'],
            ['title' => 'E-signature & acknowledgement', 'body' => 'Capture digital sign-offs on policies, handbooks, and compliance documents.'],
            ['title' => 'Manager dashboards',            'body' => 'Give managers live visibility into who\'s on track, who\'s behind, and what\'s missing.'],
            ['title' => 'HRIS integration',              'body' => 'Connect with BambooHR, TalentHR, and others to trigger onboarding automatically.'],
        ]"
        :cols="3"
    />

    {{-- Testimonials --}}
    <x-testimonials
        heading="Teams that transformed their onboarding."
        :testimonials="$testimonials ?? []"
    />

    {{-- Integrations --}}
    <x-logo-strip
        label="Integrations"
        heading="Connects with your HR stack"
        :logos="$integrationLogos ?? []"
        :scrolling="false"
        :columns="5"
        id="onboarding-integrations"
    />

@endsection
