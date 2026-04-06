{{--
    Component: CTA Band
    Usage:
    <x-cta-band
        heading="Start Using MyPass LMS Free for 90 or 180 Days"
        subtext="Unlimited features. No restrictions. No credit card."
        :cta="['label' => 'Sign Up For Free', 'url' => '#', 'target' => '_blank']"
        note="Limited Offer: 5,000 Free Credits + 90-Day Access"
        variant="dark"
    />

    Variants: 'dark' (default), 'light', 'gradient'
--}}

@props([
    'heading' => '',
    'subtext' => null,
    'cta'     => null,
    'note'    => null,
    'variant' => 'dark',
    'id'      => null,
])

<section
    class="cta-band cta-band--{{ $variant }}"
    @if ($id) id="{{ $id }}" @endif
    aria-labelledby="cta-band-heading"
>
    <div class="container cta-band__inner">

        <div class="cta-band__copy">
            <h2 class="cta-band__heading" id="cta-band-heading">{{ $heading }}</h2>
            @if ($subtext)
                <p class="cta-band__subtext">{{ $subtext }}</p>
            @endif
        </div>

        @if ($cta)
            <a
                href="{{ $cta['url'] }}"
                class="btn btn--white btn--lg cta-band__btn"
                @if (!empty($cta['target'])) target="{{ $cta['target'] }}" rel="noopener" @endif
            >
                {{ $cta['label'] }}
            </a>
        @endif

    </div>

    @if ($note)
        <p class="cta-band__note">{{ $note }}</p>
    @endif
</section>
