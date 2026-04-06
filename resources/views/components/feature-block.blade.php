{{--
    Component: Feature Block (text + image, alternating sides)
    Usage:
    <x-feature-block
        icon="/assets/images/icon-ai.png"
        label="Agentic AI"
        heading="Meet the Agentic AI That Cuts Your LMS Workload by 70%"
        subheading="Talk, It Acts"
        subheadingDetail="Turn Voice or Chat Commands Into Completed Tasks"
        :bullets="[
            'Stop spending hours clicking through menus',
            'Tell MyPass LMS what you want, and it gets done',
        ]"
        imageUrl="/assets/images/agentic-ai-screen.png"
        imageAlt="Agentic AI interface screenshot"
        :reversed="false"
        id="agentic-ai"
    />
--}}

@props([
    'icon'             => null,
    'iconAlt'          => 'Feature icon',
    'label'            => null,
    'heading'          => '',
    'subheading'       => null,
    'subheadingDetail' => null,
    'subtext'          => null,
    'bullets'          => [],
    'imageUrl'         => null,
    'imageAlt'         => '',
    'imageSecondary'   => null,
    'imageSecondaryAlt'=> '',
    'reversed'         => false,
    'id'               => null,
    'stat'             => null,
])

<section
    class="feature-block {{ $reversed ? 'feature-block--reversed' : '' }}"
    @if ($id) id="{{ $id }}" @endif
    aria-labelledby="feat-heading-{{ $id ?? uniqid() }}"
>
    <div class="container feature-block__inner">

        {{-- Copy Side --}}
        <div class="feature-block__copy">

            @if ($icon)
                <div class="feature-block__icon" aria-hidden="true">
                    <img src="{{ $icon }}" alt="{{ $iconAlt }}" width="56" height="56" loading="lazy">
                </div>
            @endif

            @if ($label)
                <span class="feature-block__label">{{ $label }}</span>
            @endif

            <h2 class="feature-block__heading" id="feat-heading-{{ $id ?? 'block' }}">
                {{ $heading }}
            </h2>

            @if ($subheading)
                <div class="feature-block__sub-card">
                    @if ($subheadingDetail)
                        <h3 class="feature-block__subheading">{{ $subheading }}</h3>
                        <p class="feature-block__subheading-detail">{{ $subheadingDetail }}</p>
                    @else
                        <h3 class="feature-block__subheading">{{ $subheading }}</h3>
                    @endif
                </div>
            @endif

            @if ($subtext)
                <p class="feature-block__subtext">{{ $subtext }}</p>
            @endif

            @if (count($bullets))
                <ul class="feature-block__bullets" role="list">
                    @foreach ($bullets as $bullet)
                        <li class="feature-block__bullet">
                            <span class="feature-block__bullet-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <circle cx="9" cy="9" r="9" fill="#5932EA" fill-opacity="0.1"/>
                                    <path d="M5 9l3 3 5-5" stroke="#5932EA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            {{ $bullet }}
                        </li>
                    @endforeach
                </ul>
            @endif

            @if ($stat)
                <p class="feature-block__stat">{{ $stat }}</p>
            @endif

        </div>

        {{-- Image Side --}}
        @if ($imageUrl)
            <div class="feature-block__media">
                <img
                    src="{{ $imageUrl }}"
                    alt="{{ $imageAlt }}"
                    class="feature-block__image"
                    loading="lazy"
                    decoding="async"
                >
                @if ($imageSecondary)
                    <img
                        src="{{ $imageSecondary }}"
                        alt="{{ $imageSecondaryAlt }}"
                        class="feature-block__image feature-block__image--secondary"
                        loading="lazy"
                        decoding="async"
                    >
                @endif
            </div>
        @endif

    </div>
</section>
