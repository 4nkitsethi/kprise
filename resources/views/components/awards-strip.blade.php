{{--
    Component: Awards Strip
    Usage:
    <x-awards-strip
        heading="Recognized across top software directories"
        :badges="$awardBadges"
    />

    Badge format:
    ['src' => '/assets/images/awards/capterra.png', 'alt' => 'Capterra Best Value 2024', 'url' => 'https://www.capterra.com/...']
--}}

@props([
    'heading' => null,
    'badges'  => [],
    'id'      => 'awards',
])

<div class="awards-strip" id="{{ $id }}">
    <div class="container">
        @if ($heading)
            <p class="awards-strip__heading">{{ $heading }}</p>
        @endif
        <ul class="awards-strip__list" role="list" aria-label="Awards and recognition">
            @foreach ($badges as $badge)
                <li class="awards-strip__item">
                    @if (!empty($badge['url']))
                        <a href="{{ $badge['url'] }}" target="_blank" rel="noopener noreferrer nofollow">
                            <img
                                src="{{ $badge['src'] }}"
                                alt="{{ $badge['alt'] }}"
                                class="awards-strip__badge"
                                width="100"
                                height="56"
                                loading="lazy"
                                decoding="async"
                            >
                        </a>
                    @else
                        <img
                            src="{{ $badge['src'] }}"
                            alt="{{ $badge['alt'] }}"
                            class="awards-strip__badge"
                            width="100"
                            height="56"
                            loading="lazy"
                            decoding="async"
                        >
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
