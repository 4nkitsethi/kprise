{{--
    Page: Terms & Conditions
    Route: legal.terms
--}}

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/inner-pages.css') }}">
@endpush

@section('content')

<section class="inner-hero">
    <div class="container">
        <h1 class="inner-hero__heading">Terms &amp; Conditions</h1>
        <p class="inner-hero__subtext">Last updated: {{ date('F j, Y') }}</p>
    </div>
</section>

<div class="container legal-content">
    <div class="legal-body">
        @yield('legal-content')
        {{-- Replace this block with your actual T&C content or a CMS field --}}
        <p>Please insert your Terms &amp; Conditions content here. This page uses the shared layout and styling — simply populate it with your legal text, or connect it to a CMS field in the controller.</p>
    </div>
</div>

@endsection

@push('styles')
<style>
.legal-content { padding: var(--space-12) 0 var(--space-20); max-width: 800px; }
.legal-body {
    font-size: var(--text-base);
    line-height: var(--leading-relaxed);
    color: var(--color-text-secondary);
}
.legal-body h2 {
    font-family: var(--font-display);
    font-size: var(--text-xl);
    font-weight: var(--weight-semibold);
    color: var(--color-gray-900);
    margin: var(--space-8) 0 var(--space-3);
}
.legal-body h3 {
    font-size: var(--text-lg);
    font-weight: var(--weight-semibold);
    color: var(--color-gray-800);
    margin: var(--space-6) 0 var(--space-2);
}
.legal-body p { margin-bottom: var(--space-4); }
.legal-body ul { padding-left: var(--space-6); margin-bottom: var(--space-4); list-style: disc; }
.legal-body li { margin-bottom: var(--space-2); }
.legal-body a { color: var(--color-primary); text-decoration: underline; }
</style>
@endpush
