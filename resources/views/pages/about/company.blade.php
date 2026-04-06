{{--
    Page: Company Overview
    Route: about.company
--}}

@extends('layouts.inner-page')


@section('inner-content')

    <x-feature-block
        label="Our Story"
        heading="Built by Training Practitioners, for Training Practitioners"
        subtext="Kprise was founded after years of watching L&D teams struggle with overcomplicated LMS platforms that created more work than they saved. We built MyPass LMS to fix that."
        :bullets="[
            'Founded with a single mission: make training management effortless.',
            'Serving organisations from fast-growing startups to global enterprises.',
            'Trusted by 200+ organisations across 15+ countries.',
            'Continuously evolving — shaped by customer feedback every sprint.',
        ]"
        imageUrl="{{ asset('assets/images/screens/dashboard.png') }}"
        imageAlt="MyPass LMS dashboard"
        id="our-story"
    />

    <x-platform-features
        label="Our Values"
        heading="What drives everything we build."
        :features="[
            ['title' => 'Simplicity first',      'body' => 'Every feature must make the admin\'s job easier, not harder. Complexity is a bug, not a feature.'],
            ['title' => 'Results over activity',  'body' => 'We measure success by learning outcomes and time saved — not clicks, modules, or logins.'],
            ['title' => 'Customer-led roadmap',   'body' => 'Our product roadmap is shaped by the teams who use MyPass LMS every day.'],
            ['title' => 'Transparent pricing',    'body' => 'No hidden fees. No surprise seat charges. Credits mean you pay for what you actually use.'],
            ['title' => 'Constant innovation',    'body' => 'AI is rewriting what\'s possible in L&D. We ship meaningful improvements every month.'],
            ['title' => 'Human support',          'body' => 'Real people, fast responses. We pick up the phone and reply to chat — always.'],
        ]"
        :cols="3"
    />

    <x-testimonials
        heading="What our customers say about working with us."
        :testimonials="[
            ['quote' => 'We have been a Kprise client for over four years and Kprise has constantly been there to support our needs.', 'name' => 'Shawn', 'role' => 'Founder & Director', 'company' => 'American Board for Certification of Teacher Excellence', 'rating' => 5],
            ['quote' => 'Their customer support is beyond helpful, the team were available at all hours and they were very professional.', 'name' => 'Ashleigh', 'role' => 'Senior Career and Learning Partner', 'company' => 'United Arab Emirates', 'rating' => 5],
            ['quote' => 'I\'m wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields.', 'name' => 'Raghu Nath', 'role' => 'President', 'company' => 'E-Learning', 'rating' => 5],
        ]"
    />

@endsection
