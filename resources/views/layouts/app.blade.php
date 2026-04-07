<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- {{-- SEO Meta Tags --}}
    <title>{{ $seo['title'] ?? config('app.name') . ' | AI-Powered LMS Platform' }}</title>
    <meta name="description" content="{{ $seo['description'] ?? 'MyPass LMS is an Agentic AI-powered, credit-based learning platform that cuts admin work by 70%. No per-user pricing. Free 90-day trial.' }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? 'LMS, learning management system, AI LMS, online training, employee training, compliance training' }}">
    <meta name="robots" content="{{ $seo['robots'] ?? 'index, follow' }}">
    <link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo['canonical'] ?? url()->current() }}">
    <meta property="og:title" content="{{ $seo['og_title'] ?? $seo['title'] ?? config('app.name') }}">
    <meta property="og:description" content="{{ $seo['og_description'] ?? $seo['description'] ?? '' }}">
    <meta property="og:image" content="{{ $seo['og_image'] ?? asset('assets/images/og-default.png') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ $seo['description'] ?? '' }}">
    <meta name="twitter:image" content="{{ $seo['og_image'] ?? asset('assets/images/og-default.png') }}"> -->

    
    {{--
    ┌─────────────────────────────────────────────────────────────┐
    │  SEO HEAD COMPONENT                                         │
    │  Reads from DB via SeoService → falls back to $seo array   │
    │  from the controller → falls back to hard-coded defaults   │
    │                                                             │
    │  BEFORE: dozens of hardcoded meta tag lines                 │
    │  AFTER:  one line — everything managed from admin panel     │
    └─────────────────────────────────────────────────────────────┘
    --}}
    <x-seo-head :seo="$seo ?? []" />
    
    {{-- Schema.org Structured Data --}}
    @stack('schema')

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">


    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @stack('styles')
</head>
<body class="{{ $bodyClass ?? '' }}">

    {{-- Skip to content for accessibility --}}
    <a href="#main-content" class="skip-link">Skip to main content</a>

    {{-- Header --}}
    @include('partials.header')

    {{-- Main Content --}}
    <main id="main-content">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
    @stack('scripts')

</body>
</html>
