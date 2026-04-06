{{--
    Component: Stats Bar
    Displays key metrics in a horizontal strip.

    Usage:
    <x-stats-bar
        :stats="[
            ['value' => '70%',    'label' => 'Reduction in admin work'],
            ['value' => '5–10hrs','label' => 'Saved per week, per team'],
            ['value' => '200+',   'label' => 'Organisations trust us'],
            ['value' => '90 days','label' => 'Free trial, no card needed'],
        ]"
    />
--}}

@props([
    'stats'   => [],
    'variant' => 'light',   {{-- light | dark | purple --}}
    'id'      => null,
])

<section
    class="stats-bar stats-bar--{{ $variant }}"
    @if ($id) id="{{ $id }}" @endif
    aria-label="Key statistics"
>
    <div class="container stats-bar__inner">
        @foreach ($stats as $stat)
            <div class="stats-bar__item">
                <span class="stats-bar__value">{{ $stat['value'] }}</span>
                <span class="stats-bar__label">{{ $stat['label'] }}</span>
            </div>
            @if (!$loop->last)
                <div class="stats-bar__sep" aria-hidden="true"></div>
            @endif
        @endforeach
    </div>
</section>
