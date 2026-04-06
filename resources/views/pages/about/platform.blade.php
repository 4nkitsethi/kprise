{{--
    Page: About Platform
    Route: about.platform
--}}

@extends('layouts.inner-page')

@section('inner-content')

    <x-feature-block
        label="Agentic AI"
        heading="The Only LMS Where You Can Just Tell It What to Do"
        subtext="Every other LMS makes you click through menus, fill forms, and chase people. MyPass LMS introduces Agentic AI — you describe what you need, it executes end-to-end."
        :bullets="[
            'Voice and chat interface — no menus, no searching, no manual work.',
            'Executes multi-step workflows: create course → enrol team → set reminders → track completion.',
            'Learns your common tasks and surfaces them proactively.',
            'Saves L&D admins 5–10 hours per week on average.',
        ]"
        imageUrl="{{ asset('assets/images/screens/agentic-ai.png') }}"
        imageAlt="Agentic AI chat interface"
        id="agentic-ai"
    />

    <x-feature-block
        label="Credit-Based Pricing"
        heading="Pay for Learning That Gets Done — Not Seats That Sit Idle"
        subtext="Traditional per-user pricing punishes you for growth. Our credit model means you only pay when a learner actually completes something."
        :bullets="[
            'Credits are consumed only when a module is completed — not when a user logs in.',
            'Roll unused credits forward — no wastage at month end.',
            'Add credits as you scale, remove them when you don\'t need them.',
            'Transparent usage dashboard so you always know where credits are going.',
        ]"
        imageUrl="{{ asset('assets/images/screens/reports.png') }}"
        imageAlt="Credit usage dashboard"
        :reversed="true"
        id="credit-model"
    />

    <x-platform-features
        label="Full Feature Set"
        heading="Everything your L&D team needs in one platform."
        subtext="No duct tape. No external authoring tools. No spreadsheet tracking. Just one system that does it all."
        :features="[
            ['title' => 'Agentic AI assistant',    'body' => 'Describe a task in plain language. MyPass LMS plans, executes, and confirms — end to end.'],
            ['title' => 'Built-in SCORM authoring','body' => 'Create SCORM courses from PPTs, PDFs, videos, or AI-generated content — no third-party tools.'],
            ['title' => 'Learning paths',           'body' => 'Chain courses into role-specific journeys with prerequisites, gates, and completion logic.'],
            ['title' => 'ILT & virtual classroom',  'body' => 'Schedule, manage, and track live sessions — integrated with Zoom, Teams, and GoToMeeting.'],
            ['title' => 'Full assessment engine',   'body' => 'Quizzes, exams, branching scenarios — auto-scored with instant feedback and certificates.'],
            ['title' => 'AI-powered reporting',     'body' => 'Ask a question in plain English, get the report. No filters, no dashboards, no exports.'],
            ['title' => 'Custom branding',          'body' => 'Your logo, your colours, your domain — MyPass LMS looks like your platform.'],
            ['title' => 'SSO & SAML',               'body' => 'One-click sign-in with Okta, Azure AD, Google Workspace, or any SAML 2.0 provider.'],
            ['title' => 'REST API',                 'body' => 'Deep integration with your HRIS, CRM, or data warehouse via our documented REST API.'],
        ]"
        :cols="3"
    />

    <x-comparison-table
        heading="MyPass LMS vs Traditional LMS Platforms"
        subtext="See what you get with MyPass LMS that you simply can't find anywhere else."
        :rows="[
            ['feature' => 'Agentic AI (chat & voice control)',  'colA' => 'Not available',          'colB' => 'Built in, included'],
            ['feature' => 'Credit-based pricing',               'colA' => 'Per-seat fees',           'colB' => 'Pay per completion'],
            ['feature' => 'SCORM authoring',                    'colA' => 'External tool required',  'colB' => 'Native, no extra cost'],
            ['feature' => 'AI course generation',               'colA' => 'Add-on or not available', 'colB' => 'Included'],
            ['feature' => 'Natural language reporting',         'colA' => 'Manual dashboards only',  'colB' => 'Ask & get the report'],
            ['feature' => 'Setup time',                         'colA' => 'Weeks to months',         'colB' => 'Same day go-live'],
            ['feature' => 'Custom branding',                    'colA' => 'Enterprise tier only',    'colB' => 'All plans'],
        ]"
        colA="Traditional LMS"
        colB="MyPass LMS"
    />

@endsection
