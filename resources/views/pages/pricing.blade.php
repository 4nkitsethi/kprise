{{--
    Page: Pricing
    Route: pricing
    Controller: PricingController@index
--}}

@extends('layouts.app')

@section('content')

<section class="inner-hero" aria-labelledby="pricing-heading">
    <div class="container inner-hero__inner" style="text-align:center; max-width: 720px; margin-inline: auto;">
        <span class="section-label">Pricing</span>
        <h1 class="inner-hero__heading" id="pricing-heading">Simple, Credit-Based Pricing</h1>
        <p class="inner-hero__subtext">
            No per-user fees. No contracts. Pay only for the learning that gets done.
            Start with 5,000 free credits and 90 days of full access.
        </p>
    </div>
</section>

<section class="pricing-section" aria-labelledby="plans-heading">
    <div class="container">
        <h2 class="sr-only" id="plans-heading">Pricing plans</h2>

        <div class="pricing-grid">

            @foreach ($plans as $plan)
                <article
                    class="pricing-card {{ $plan['featured'] ? 'pricing-card--featured' : '' }}"
                    aria-label="{{ $plan['name'] }} plan"
                >
                    @if ($plan['featured'])
                        <div class="pricing-card__badge">Most Popular</div>
                    @endif

                    <div class="pricing-card__header">
                        <h3 class="pricing-card__name">{{ $plan['name'] }}</h3>
                        <p class="pricing-card__tagline">{{ $plan['tagline'] }}</p>
                    </div>

                    <div class="pricing-card__price">
                        @if ($plan['price'] === 0)
                            <span class="pricing-card__amount">Free</span>
                            <span class="pricing-card__period">90-day trial</span>
                        @else
                            <span class="pricing-card__amount">${{ number_format($plan['price']) }}</span>
                            <span class="pricing-card__period">/ {{ $plan['period'] }}</span>
                        @endif
                    </div>

                    <p class="pricing-card__credits">{{ $plan['credits'] }}</p>

                    <ul class="pricing-card__features" role="list">
                        @foreach ($plan['features'] as $feature)
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
                        href="{{ $plan['ctaUrl'] }}"
                        class="btn {{ $plan['featured'] ? 'btn--primary' : 'btn--outline' }} btn--lg pricing-card__cta"
                        @if (!empty($plan['ctaTarget'])) target="{{ $plan['ctaTarget'] }}" rel="noopener" @endif
                    >
                        {{ $plan['ctaLabel'] }}
                    </a>
                </article>
            @endforeach

        </div>

        <p class="pricing-note">
            All plans include unlimited admins, unlimited courses, SCORM support, and our Agentic AI.
            <a href="{{ route('contact') }}">Talk to us</a> for custom enterprise pricing.
        </p>
    </div>
</section>

<x-comparison-table
    heading="What's included in every plan"
    :rows="[
        ['feature' => 'Agentic AI assistant',      'colA' => 'Not available',   'colB' => 'Included'],
        ['feature' => 'AI course creation',         'colA' => 'Extra cost',      'colB' => 'Included'],
        ['feature' => 'SCORM authoring',            'colA' => 'External tool',   'colB' => 'Built-in'],
        ['feature' => 'ILT & scheduling',           'colA' => 'Add-on',          'colB' => 'Included'],
        ['feature' => 'Custom branding',            'colA' => 'Enterprise only', 'colB' => 'All plans'],
        ['feature' => 'SSO / SAML',                 'colA' => 'Enterprise only', 'colB' => 'All plans'],
        ['feature' => 'API access',                 'colA' => 'Paid tier',       'colB' => 'All plans'],
        ['feature' => 'Support',                    'colA' => 'Email only',      'colB' => 'Chat + email'],
    ]"
    colA="Traditional LMS"
    colB="MyPass LMS"
/>

<x-cta-band
    heading="Start free for 90 days — no credit card needed"
    subtext="5,000 free credits included. Pay only when you scale."
    :cta="['label' => 'Start For Free', 'url' => config('services.lms_register_url', '#'), 'target' => '_blank']"
    variant="dark"
/>

@endsection

@push('styles')
<style>
.pricing-section { padding: var(--space-16) 0; }
.pricing-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--space-6);
    margin-bottom: var(--space-10);
}
.pricing-card {
    position: relative;
    padding: var(--space-8) var(--space-6);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-2xl);
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
    transition: box-shadow var(--transition-base), transform var(--transition-base);
}
.pricing-card:hover { box-shadow: var(--shadow-lg); transform: translateY(-2px); }
.pricing-card--featured {
    border: 2px solid var(--color-primary);
    box-shadow: var(--shadow-lg);
}
.pricing-card__badge {
    position: absolute;
    top: -14px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--color-primary);
    color: var(--color-white);
    font-size: var(--text-xs);
    font-weight: var(--weight-semibold);
    padding: var(--space-1) var(--space-4);
    border-radius: var(--radius-full);
    white-space: nowrap;
}
.pricing-card__name {
    font-family: var(--font-display);
    font-size: var(--text-xl);
    font-weight: var(--weight-bold);
    color: var(--color-gray-900);
}
.pricing-card__tagline { font-size: var(--text-sm); color: var(--color-text-secondary); }
.pricing-card__amount {
    font-family: var(--font-display);
    font-size: var(--text-4xl);
    font-weight: var(--weight-bold);
    color: var(--color-gray-900);
}
.pricing-card__period { font-size: var(--text-sm); color: var(--color-text-muted); margin-left: var(--space-1); }
.pricing-card__credits {
    font-size: var(--text-sm);
    font-weight: var(--weight-medium);
    color: var(--color-primary);
    background: var(--color-primary-light);
    padding: var(--space-2) var(--space-3);
    border-radius: var(--radius-md);
    display: inline-block;
}
.pricing-card__features { display: flex; flex-direction: column; gap: var(--space-3); flex: 1; }
.pricing-card__feature {
    display: flex;
    align-items: flex-start;
    gap: var(--space-2);
    font-size: var(--text-sm);
    color: var(--color-text-secondary);
}
.pricing-card__check { flex-shrink: 0; margin-top: 1px; }
.pricing-card__cta { margin-top: auto; text-align: center; }
.pricing-note {
    text-align: center;
    font-size: var(--text-sm);
    color: var(--color-text-muted);
    margin-top: var(--space-6);
}
.pricing-note a { color: var(--color-primary); text-decoration: underline; }
</style>
@endpush
