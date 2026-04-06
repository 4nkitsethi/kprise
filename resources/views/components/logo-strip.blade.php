{{--
    Component: Logo Strip (trusted brands / integrations)
    Usage:
    <x-logo-strip
        heading="Empowering organizations of every size"
        subtext="Trusted by leading organizations to transform their training programs."
        :logos="$trustedLogos"
        :scrolling="true"
    />

    Logo format:
    ['src' => '/assets/images/logos/acme.png', 'alt' => 'ACME Corp', 'width' => 198, 'height' => 100]
--}}

@props([
    'heading'   => null,
    'subtext'   => null,
    'label'     => null,
    'logos'     => [],
    'scrolling' => true,
    'id'        => 'logo-strip',
    'columns'   => null,
])

<section class="logo-strip" id="{{ $id }}">
    <div class="container">

        @if ($label)
            <span class="section-label">{{ $label }}</span>
        @endif

        @if ($heading)
            <h2 class="section-heading">{{ $heading }}</h2>
        @endif

        @if ($subtext)
            <p class="section-subtext">{{ $subtext }}</p>
        @endif

    </div>

    <div class="logo-strip__track-wrap" aria-label="{{ $heading ?? 'Partner logos' }}">
        @if ($scrolling)
            {{-- Auto-scrolling marquee: duplicate logos for seamless loop --}}
            <div class="logo-strip__marquee" aria-hidden="true">
                <ul class="logo-strip__track logo-strip__track--scroll" role="list">
                    @foreach (array_merge($logos, $logos) as $logo)
                        <li class="logo-strip__item">
                            <img
                                src="{{ $logo['src'] }}"
                                alt="{{ $logo['alt'] }}"
                                width="{{ $logo['width'] ?? 160 }}"
                                height="{{ $logo['height'] ?? 80 }}"
                                loading="lazy"
                                decoding="async"
                            >
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- Accessible static list for screen readers --}}
            <ul class="logo-strip__track logo-strip__track--static sr-only" role="list">
                @foreach ($logos as $logo)
                    <li>{{ $logo['alt'] }}</li>
                @endforeach
            </ul>
        @else
            <div class="container">
                <ul
                    class="logo-strip__grid"
                    role="list"
                    @if ($columns) style="--logo-cols: {{ $columns }};" @endif
                >
                    @foreach ($logos as $logo)
                        <li class="logo-strip__item">
                            <img
                                src="{{ $logo['src'] }}"
                                alt="{{ $logo['alt'] }}"
                                width="{{ $logo['width'] ?? 160 }}"
                                height="{{ $logo['height'] ?? 80 }}"
                                loading="lazy"
                                decoding="async"
                            >
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>
