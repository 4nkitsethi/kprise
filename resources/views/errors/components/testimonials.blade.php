{{--
    Component: Testimonials Slider
    Usage:
    <x-testimonials
        heading="Why Teams Prefer MyPass LMS"
        :testimonials="$testimonials"
    />

    Each testimonial array item:
    [
        'quote'    => 'Full testimonial text...',
        'name'     => 'Shawn',
        'role'     => 'Founder & Director',
        'company'  => 'American Board for Certification of Teacher Excellence',
        'rating'   => 5,
        'avatar'   => null, // optional image url
    ]
--}}

@props([
    'heading'      => 'Real feedback from our amazing customers.',
    'label'        => null,
    'testimonials' => [],
    'id'           => 'testimonials',
])

<section class="testimonials" id="{{ $id }}" aria-labelledby="testimonials-heading">
    <div class="container">

        @if ($label)
            <span class="section-label" aria-hidden="true">{{ $label }}</span>
        @endif

        <h2 class="section-heading" id="testimonials-heading">{{ $heading }}</h2>

        <div
            class="testimonials__slider"
            role="region"
            aria-label="Customer testimonials"
            aria-roledescription="carousel"
        >
            <div class="testimonials__track" id="testimonials-track">
                @foreach ($testimonials as $index => $item)
                    <article
                        class="testimonial-card"
                        aria-roledescription="slide"
                        aria-label="Testimonial {{ $index + 1 }} of {{ count($testimonials) }}"
                    >
                        <div class="testimonial-card__rating" aria-label="Rating: {{ $item['rating'] ?? 5 }} out of 5 stars">
                            @for ($i = 0; $i < ($item['rating'] ?? 5); $i++)
                                <svg class="testimonial-card__star" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M8 1l1.854 4.016 4.402.64-3.185 3.1.752 4.374L8 11.016l-3.823 2.114.752-4.374L1.744 5.656l4.402-.64L8 1z" fill="#F59E0B"/>
                                </svg>
                            @endfor
                        </div>

                        <blockquote class="testimonial-card__quote">
                            <p>&ldquo;{{ $item['quote'] }}&rdquo;</p>
                        </blockquote>

                        <footer class="testimonial-card__author">
                            @if (!empty($item['avatar']))
                                <img
                                    src="{{ $item['avatar'] }}"
                                    alt="{{ $item['name'] }}"
                                    class="testimonial-card__avatar"
                                    width="44"
                                    height="44"
                                    loading="lazy"
                                >
                            @else
                                <div class="testimonial-card__avatar-placeholder" aria-hidden="true">
                                    {{ strtoupper(substr($item['name'], 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <cite class="testimonial-card__name">{{ $item['name'] }}</cite>
                                <p class="testimonial-card__role">
                                    <strong>{{ $item['role'] }}</strong>
                                    @if (!empty($item['company']))
                                        &ndash; {{ $item['company'] }}
                                    @endif
                                </p>
                            </div>
                        </footer>
                    </article>
                @endforeach
            </div>

            {{-- Slider Controls --}}
            <div class="testimonials__controls" aria-label="Slider navigation">
                <button class="testimonials__btn testimonials__btn--prev" aria-label="Previous testimonial" id="testimonials-prev">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M12.5 15l-5-5 5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="testimonials__dots" id="testimonials-dots" role="tablist" aria-label="Testimonial slides"></div>
                <button class="testimonials__btn testimonials__btn--next" aria-label="Next testimonial" id="testimonials-next">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M7.5 5l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>

    </div>
</section>
