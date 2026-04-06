{{--
    Component: Hero Section
    Usage:
    <x-hero
        badge="NEW AGENTIC AI"
        heading="Stop Wasting Time and Budget on Training That Doesn't Get Done"
        subtext="Training shouldn't mean chasing people, fixing spreadsheets, or fighting a slow LMS."
        :ctaPrimary="['label' => 'See it Live', 'url' => '#', 'target' => '_blank']"
        :ctaSecondary="['label' => 'Launch Your Course', 'url' => '#', 'target' => '_blank']"
        promoText="Get 5,000 Free Credits + 90-Day Full Access"
        promoNote="No credit card • No contracts • Pay only for learning used"
        videoUrl="/assets/video/demo.mp4"
        videoPoster="/assets/images/video-poster.jpg"
    />
--}}

@props([
    'badge'          => null,
    'heading'        => '',
    'subtext'        => '',
    'ctaPrimary'     => null,
    'ctaSecondary'   => null,
    'promoText'      => null,
    'promoNote'      => null,
    'videoUrl'       => null,
    'videoPoster'    => null,
    'videoTitle'     => 'Watch the product walkthrough',
])

<section class="hero" aria-labelledby="hero-heading">
    <div class="container hero__inner">

        {{-- Left: Copy --}}
        <div class="hero__copy">

            @if ($badge)
                <div class="hero__badge" aria-label="Announcement">
                    <span class="hero__badge-dot" aria-hidden="true"></span>
                    {{ $badge }}
                </div>
            @endif

            <h1 class="hero__heading" id="hero-heading">{{ $heading }}</h1>

            @if ($subtext)
                <p class="hero__subtext">{{ $subtext }}</p>
            @endif

            <div class="hero__actions">
                @if ($ctaPrimary)
                    <a
                        href="{{ $ctaPrimary['url'] }}"
                        class="btn btn--primary btn--lg"
                        @if (!empty($ctaPrimary['target'])) target="{{ $ctaPrimary['target'] }}" rel="noopener" @endif
                    >
                        {{ $ctaPrimary['label'] }}
                    </a>
                @endif

                @if ($ctaSecondary)
                    <a
                        href="{{ $ctaSecondary['url'] }}"
                        class="btn btn--outline btn--lg"
                        @if (!empty($ctaSecondary['target'])) target="{{ $ctaSecondary['target'] }}" rel="noopener" @endif
                    >
                        {{ $ctaSecondary['label'] }}
                    </a>
                @endif
            </div>

            @if ($promoText)
                <p class="hero__promo">
                    <strong>{{ $promoText }}</strong>
                    @if ($promoNote)
                        <br><span class="hero__promo-note">{{ $promoNote }}</span>
                    @endif
                </p>
            @endif

        </div>

        {{-- Right: Video --}}
        @if ($videoUrl)
            <div class="hero__media">
                <div class="hero__video-wrap">
                    <p class="hero__video-label">{{ $videoTitle }}</p>
                    <video
                        class="hero__video"
                        src="{{ $videoUrl }}"
                        @if ($videoPoster) poster="{{ $videoPoster }}" @endif
                        controls
                        preload="metadata"
                        aria-label="{{ $videoTitle }}"
                    >
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        @endif

    </div>
</section>
