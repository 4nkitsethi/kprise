{{--
    Component: Pricing Card
    Usage:
    <x-pricing-card
        name="Growth"
        tagline="For growing teams"
        price="299"
        period="month"
        credits="25,000 credits / month"
        :features="['Feature one', 'Feature two']"
        ctaLabel="Get Started"
        ctaUrl="#"
        :featured="true"
    />
--}}

@props([
    'name'      => '',
    'tagline'   => '',
    'price'     => null,
    'period'    => 'month',
    'credits'   => null,
    'features'  => [],
    'ctaLabel'  => 'Get Started',
    'ctaUrl'    => '#',
    'ctaTarget' => null,
    'featured'  => false,
])

<article class="pricing-card {{ $featured ? 'pricing-card--featured' : '' }}" aria-label="{{ $name }} plan">

    @if ($featured)
        <div class="pricing-card__badge">Most Popular</div>
    @endif

    <div class="pricing-card__header">
        <h3 class="pricing-card__name">{{ $name }}</h3>
        <p class="pricing-card__tagline">{{ $tagline }}</p>
    </div>

    <div class="pricing-card__price">
        @if ($price === null || $price === 'custom')
            <span class="pricing-card__amount">Custom</span>
            <span class="pricing-card__period">contact us</span>
        @elseif ((int)$price === 0)
            <span class="pricing-card__amount">Free</span>
            <span class="pricing-card__period">90-day trial</span>
        @else
            <span class="pricing-card__amount">${{ number_format((int)$price) }}</span>
            <span class="pricing-card__period">/ {{ $period }}</span>
        @endif
    </div>

    @if ($credits)
        <p class="pricing-card__credits">{{ $credits }}</p>
    @endif

    <ul class="pricing-card__features" role="list">
        @foreach ($features as $feature)
            <li class="pricing-card__feature">
                <svg width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" class="pricing-card__check">
                    <circle cx="8" cy="8" r="8" fill="#5932EA" fill-opacity="0.12"/>
                    <path d="M5 8l2 2 4-4" stroke="#5932EA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                {{ $feature }}
            </li>
        @endforeach
    </ul>

    <a
        href="{{ $ctaUrl }}"
        class="btn {{ $featured ? 'btn--primary' : 'btn--outline' }} btn--lg pricing-card__cta"
        @if ($ctaTarget) target="{{ $ctaTarget }}" rel="noopener" @endif
    >
        {{ $ctaLabel }}
    </a>

</article>
