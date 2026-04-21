{{--
    Blade component: Section divider / visual spacer
    Usage: <x-section-divider /> or <x-section-divider variant="wave" />
    Variants: default (line), wave, dots, gradient
--}}

@props([
    'variant' => 'default',
])

@if ($variant === 'wave')
    <div class="section-divider section-divider--wave" aria-hidden="true">
        <svg viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0 48C240 16 480 0 720 0C960 0 1200 16 1440 48V48H0V48Z" fill="var(--color-gray-50)"/>
        </svg>
    </div>
@elseif ($variant === 'dots')
    <div class="section-divider section-divider--dots" aria-hidden="true">
        <span></span><span></span><span></span>
    </div>
@elseif ($variant === 'gradient')
    <div class="section-divider section-divider--gradient" aria-hidden="true"></div>
@else
    <hr class="section-divider section-divider--line" aria-hidden="true">
@endif
