{{--
    Component: Comparison Table
    Usage:
    <x-comparison-table
        heading="Why Teams Prefer MyPass LMS Over Traditional LMS"
        subtext="Quick comparison — see how MyPass LMS speeds up training & reduces admin effort."
        :rows="$comparisonRows"
        colA="Traditional LMS"
        colB="MyPass LMS"
    />

    Row format:
    ['feature' => 'Course Creation', 'colA' => 'Manual — time-consuming', 'colB' => 'Done in minutes', 'highlight' => true]
--}}

@props([
    'heading'  => '',
    'subtext'  => null,
    'rows'     => [],
    'colA'     => 'Traditional LMS',
    'colB'     => 'MyPass LMS',
    'id'       => 'comparison',
])

<section class="comparison" id="{{ $id }}" aria-labelledby="comparison-heading">
    <div class="container">

        <h2 class="section-heading" id="comparison-heading">{{ $heading }}</h2>

        @if ($subtext)
            <p class="section-subtext">{{ $subtext }}</p>
        @endif

        <div class="comparison__table-wrap" role="region" aria-label="Feature comparison table" tabindex="0">
            <table class="comparison__table">
                <caption class="sr-only">{{ $heading }}</caption>
                <thead>
                    <tr>
                        <th scope="col" class="comparison__th comparison__th--feature">Feature</th>
                        <th scope="col" class="comparison__th comparison__th--col-a">{{ $colA }}</th>
                        <th scope="col" class="comparison__th comparison__th--col-b">
                            <span class="comparison__th-badge">{{ $colB }}</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $row)
                        <tr class="comparison__row {{ !empty($row['highlight']) ? 'comparison__row--highlight' : '' }}">
                            <td class="comparison__td comparison__td--feature">{{ $row['feature'] }}</td>
                            <td class="comparison__td comparison__td--col-a">
                                <span class="comparison__neg">{{ $row['colA'] }}</span>
                            </td>
                            <td class="comparison__td comparison__td--col-b">
                                <span class="comparison__pos">
                                    <svg class="comparison__check" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true">
                                        <circle cx="8" cy="8" r="8" fill="#5932EA" fill-opacity="0.1"/>
                                        <path d="M5 8l2 2 4-4" stroke="#5932EA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    {{ $row['colB'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>
