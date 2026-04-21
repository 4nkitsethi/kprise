{{--
    Component: Platform Features Grid
    Usage:
    <x-platform-features
        label="Platform"
        heading="One learning platform. Endless possibilities."
        subtext="Design, deliver, and measure impactful training programs from a single, AI-powered LMS."
        :features="$platformFeatures"
    />

    Feature format:
    ['title' => 'Built-in SCORM authoring', 'body' => 'Turn PPTs, videos...', 'icon' => null]
--}}

@props([
    'label'    => null,
    'heading'  => '',
    'subtext'  => null,
    'features' => [],
    'id'       => 'platform-features',
    'cols'     => 3,
])

<section class="platform-features" id="{{ $id }}" aria-labelledby="pf-heading">
    <div class="container">

        @if ($label)
            <span class="section-label" aria-hidden="true">{{ $label }}</span>
        @endif

        <h2 class="section-heading" id="pf-heading">{{ $heading }}</h2>

        @if ($subtext)
            <p class="section-subtext">{{ $subtext }}</p>
        @endif

        <ul
            class="platform-features__grid"
            role="list"
            style="--pf-cols: {{ $cols }};"
        >
            @foreach ($features as $feature)
                <li class="platform-feature-card">
                    @if (!empty($feature['icon']))
                        <div class="platform-feature-card__icon" aria-hidden="true">
                            <img
                                src="{{ $feature['icon'] }}"
                                alt=""
                                width="32"
                                height="32"
                                loading="lazy"
                            >
                        </div>
                    @else
                        <div class="platform-feature-card__icon platform-feature-card__icon--dot" aria-hidden="true"></div>
                    @endif
                    <h3 class="platform-feature-card__title">{{ $feature['title'] }}</h3>
                    <p class="platform-feature-card__body">{{ $feature['body'] }}</p>
                </li>
            @endforeach
        </ul>

    </div>
</section>
