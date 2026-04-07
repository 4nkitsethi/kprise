{{--
    Component: seo-head
    Replaces ALL hardcoded meta tags in layouts/app.blade.php.

    Usage in layouts/app.blade.php:
        <x-seo-head :seo="$seo ?? []" />

    Usage in any controller:
        use App\Services\SeoService;

        public function index(): View
        {
            $seo = app(SeoService::class)->forPage('industries.software', [
                'title'       => 'LMS for Software Companies | MyPass LMS',
                'description' => 'Fallback description used if no DB record exists.',
                'canonical'   => route('industries.software'),
            ]);
            return view('pages.industries.software', compact('seo'));
        }
--}}

@props(['seo' => []])

@php
    use App\Models\SeoSetting;

    // Pull DB record if $seo has a route hint from SeoService
    $model = $seo['_model'] ?? null;

    // Resolved values — DB → prop → app default
    $title       = $seo['title']       ?? config('app.name') . ' | AI-Powered LMS Platform';
    $description = $seo['description'] ?? 'MyPass LMS is an Agentic AI-powered, credit-based learning platform that cuts admin work by 70%. No per-user pricing. Free 90-day trial.';
    $keywords    = $seo['keywords']    ?? 'LMS, learning management system, AI LMS, online training, employee training, compliance training';
    $robots      = $seo['robots']      ?? 'index, follow';
    $canonical   = $seo['canonical']   ?? url()->current();

    $ogTitle       = $seo['og_title']       ?? $title;
    $ogDescription = $seo['og_description'] ?? $description;
    $ogImage       = $seo['og_image']       ?? asset('assets/images/og-default.png');
    $ogType        = $seo['og_type']        ?? 'website';

    $twCard        = $seo['twitter_card']        ?? 'summary_large_image';
    $twTitle       = $seo['twitter_title']       ?? $ogTitle;
    $twDescription = $seo['twitter_description'] ?? $ogDescription;
    $twImage       = $seo['twitter_image']       ?? $ogImage;
    $twSite        = $seo['twitter_site']        ?? null;

    $publishedAt     = $seo['published_at']     ?? null;
    $customHeadTags  = $seo['custom_head_tags'] ?? null;
@endphp

{{-- ═══════════════════════════════════════════
     Core SEO
═══════════════════════════════════════════ --}}
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
@if($keywords)
<meta name="keywords" content="{{ $keywords }}">
@endif
<meta name="robots" content="{{ $robots }}">
<link rel="canonical" href="{{ $canonical }}">

{{-- ═══════════════════════════════════════════
     Open Graph
═══════════════════════════════════════════ --}}
<meta property="og:site_name"   content="{{ config('app.name') }}">
<meta property="og:type"        content="{{ $ogType }}">
<meta property="og:url"         content="{{ $canonical }}">
<meta property="og:title"       content="{{ $ogTitle }}">
<meta property="og:description" content="{{ $ogDescription }}">
<meta property="og:image"       content="{{ $ogImage }}">
<meta property="og:image:width"  content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale"      content="{{ str_replace('-', '_', app()->getLocale()) }}">

{{-- Article extras (blog posts) --}}
@if($ogType === 'article' && $publishedAt)
<meta property="article:published_time" content="{{ $publishedAt }}">
<meta property="article:modified_time"  content="{{ $seo['updated_at'] ?? $publishedAt }}">
@endif

{{-- ═══════════════════════════════════════════
     Twitter Card
═══════════════════════════════════════════ --}}
<meta name="twitter:card"        content="{{ $twCard }}">
<meta name="twitter:title"       content="{{ $twTitle }}">
<meta name="twitter:description" content="{{ $twDescription }}">
<meta name="twitter:image"       content="{{ $twImage }}">
@if($twSite)
<meta name="twitter:site" content="{{ $twSite }}">
@endif

{{-- ═══════════════════════════════════════════
     Custom head tags from admin
     (Schema.org JSON-LD, verification codes, etc.)
═══════════════════════════════════════════ --}}
@if($customHeadTags)
{!! $customHeadTags !!}
@endif
