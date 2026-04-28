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

@foreach (array_merge($logos, $logos) as $logo)
   <img
                src="{{ $logo['src'] }}"
                alt="{{ $logo['alt'] }}"
                class="{{ $logoClass ?? 'logo-img' }}"
                loading="lazy"
                decoding="async"
            />
@endforeach
