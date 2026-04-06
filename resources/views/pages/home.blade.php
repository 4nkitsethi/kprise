{{--
    Page: Homepage
    Route: home
    Controller: HomeController@index
--}}

@extends('layouts.app')

@section('content')

    {{-- ============================================================
         HERO SECTION
    ============================================================ --}}
    <x-hero
        badge="NEW AGENTIC AI"
        heading="Stop Wasting Time and Budget on Training That Doesn't Get Done"
        subtext="Training shouldn't mean chasing people, fixing spreadsheets, or fighting a slow LMS. As your team grows, deadlines and compliance pile up. MyPass LMS is an Agentic AI LMS that cuts admin work by 70% and replaces per-user pricing with flexible credits. Tell it what to do. It executes."
        :ctaPrimary="['label' => 'See it Live', 'url' => config('services.demo_url', '#'), 'target' => '_blank']"
        :ctaSecondary="['label' => 'Launch Your Course', 'url' => config('services.lms_register_url', '#'), 'target' => '_blank']"
        promoText="Get 5,000 Free Credits + 90-Day Full Access"
        promoNote="No credit card • No contracts • Pay only for learning used"
        videoUrl="{{ asset('assets/video/demo.mp4') }}"
        videoTitle="Watch MyPass LMS in action"
    />

    {{-- ============================================================
         FEATURE: AGENTIC AI
    ============================================================ --}}
    <x-feature-block
        icon="{{ asset('assets/images/icons/featured-icon.png') }}"
        iconAlt="Agentic AI"
        label="Agentic AI"
        heading="Meet the Agentic AI That Cuts Your LMS Workload by 70%"
        subheading="Talk, It Acts"
        subheadingDetail="Turn Voice or Chat Commands Into Completed Tasks"
        :bullets="[
            'Stop spending hours clicking through menus',
            'Tell MyPass LMS what you want, and it gets done — user creation, course assignment, email reminders, anything.',
            'MyPass LMS Agentic AI completes workflows in seconds, saving your team 5–10 hours per week',
            'Your workflows run themselves. Your team gets hours back every week.',
        ]"
        imageUrl="{{ asset('assets/images/screens/agentic-ai.png') }}"
        imageAlt="Agentic AI chat interface"
        imageSecondary="{{ asset('assets/images/screens/dashboard.png') }}"
        imageSecondaryAlt="LMS dashboard overview"
        id="agentic-ai"
    />

    {{-- ============================================================
         FEATURE: COURSES ON COMMAND
    ============================================================ --}}
    <x-feature-block
        icon="{{ asset('assets/images/icons/featured-icon-1.png') }}"
        iconAlt="AI course creation"
        heading="Courses on Command"
        subtext="Remember the days when building a course took weeks?"
        :bullets="[
            'Create Fully Ready Courses in Minutes, Not Weeks — MyPass LMS turns a topic or file into a polished course in minutes.',
            'Upload a PPT, PDF, Video or a SCORM file, or give a topic to the AI assistant — MyPass LMS instantly generates content.',
            'Teams go from idea to launch 4× faster and reduce course creation time by 80%.',
        ]"
        imageUrl="{{ asset('assets/images/screens/course-creation.png') }}"
        imageAlt="AI course creation interface"
        stat="80% faster course creation"
        :reversed="true"
        id="courses-on-command"
    />

    {{-- ============================================================
         FEATURE: SMART SCHEDULING
    ============================================================ --}}
    <x-feature-block
        icon="{{ asset('assets/images/icons/featured-icon-2.png') }}"
        iconAlt="Smart scheduling"
        heading="Smart Scheduling & Automation"
        subtext="Agentic AI That Runs Training on Autopilot"
        :bullets="[
            'Training workflows used to take so much effort. Now MyPass LMS assigns, reminds, and tracks everything in the background with minimal admin intervention.',
            'You stay focused. The AI handles the rest.',
            'Teams report 40–60% fewer manual tasks, improving compliance completion rates by up to 35%.',
        ]"
        imageUrl="{{ asset('assets/images/screens/scheduling.png') }}"
        imageAlt="Smart scheduling dashboard"
        id="smart-scheduling"
    />

    {{-- ============================================================
         FEATURE: INSIGHTFUL REPORTS
    ============================================================ --}}
    <x-feature-block
        icon="{{ asset('assets/images/icons/featured-icon-3.png') }}"
        iconAlt="Reporting"
        heading="Insightful Reports, Instantly"
        subtext="Ask a Question. Get the Report — Get instant insights."
        :bullets="[
            'No Filters, No dashboards, No Spreadsheets, No delays.',
            'MyPass LMS delivers real-time insights instantly, helping L&D teams make decisions 2× faster — eliminate reporting bottlenecks and stop wasting hours on reporting.',
            'Receive clear dashboards and compliance insights anytime.',
        ]"
        imageUrl="{{ asset('assets/images/screens/reports.png') }}"
        imageAlt="Reporting dashboard"
        :reversed="true"
        id="reports"
    />

    {{-- ============================================================
         PLATFORM FEATURES GRID
    ============================================================ --}}
    <x-platform-features
        label="Platform"
        heading="One learning platform. Endless possibilities."
        subtext="Design, deliver, and measure impactful training programs from a single, AI-powered LMS."
        :features="[
            ['title' => 'Built-in SCORM authoring',    'body' => 'Turn PPTs, videos, and documents into SCORM courses directly in the platform — no extra tools or exports.'],
            ['title' => 'Learning paths',              'body' => 'Chain courses into guided journeys tailored to each role, skill level, or business unit.'],
            ['title' => 'Full assessment engine',      'body' => 'Build quizzes, exams, and scenario-based assessments — with automated scoring and feedback.'],
            ['title' => 'Custom content with AI',      'body' => 'Use Agentic AI to generate tailored modules, questions, and learning experiences for every learner.'],
            ['title' => 'ILT & class scheduling',      'body' => 'Manage live virtual or classroom sessions, track attendance, and sync with your calendar tools.'],
            ['title' => 'Surveys & feedback',          'body' => 'Launch surveys, session feedback, and pulse checks to continuously improve learning.'],
        ]"
    />

    {{-- Awards --}}
    <x-awards-strip
        heading="Recognized across top software directories for eliminating LMS admin overload"
        :badges="$awardBadges ?? []"
    />

    {{-- ============================================================
         COMPARISON TABLE
    ============================================================ --}}
    <x-comparison-table
        heading="Why Teams Prefer MyPass LMS Over Traditional LMS"
        subtext="Quick comparison — see how MyPass LMS speeds up training & reduces admin effort."
        :rows="[
            ['feature' => 'Course Creation & Assignment',    'colA' => 'Manual — time-consuming',            'colB' => 'Done in minutes — slash admin hours'],
            ['feature' => 'Task Execution',                  'colA' => 'No chat/voice control',              'colB' => 'Natural chat & voice — describe task, MyPass LMS executes'],
            ['feature' => 'Content → Course',               'colA' => 'Upload only — needs external authoring','colB' => 'Upload PPT/PDF/Video — AI auto-creates SCORM'],
            ['feature' => 'Scheduling & Reminders',          'colA' => 'Manual reminders',                   'colB' => 'Automatic scheduling & reminders'],
            ['feature' => 'Compliance & Deadlines',          'colA' => 'Missed alerts; higher risk',          'colB' => 'Alerting & deadline tracking'],
            ['feature' => 'Enrollment',                      'colA' => 'Manual per team',                    'colB' => 'Auto-enroll by roles/groups'],
            ['feature' => 'Toolset',                         'colA' => 'Fragmented tools',                   'colB' => 'All-in-one: SCORM, ILT, assessments, SSO, reporting'],
        ]"
    />

    {{-- ============================================================
         TESTIMONIALS
    ============================================================ --}}
    <x-testimonials
        label="Trusted"
        heading="Chosen by teams who value reliable, results-driven training."
        :testimonials="$testimonials ?? []"
    />

    {{-- ============================================================
         TRUSTED BRANDS LOGO STRIP
    ============================================================ --}}
    <x-logo-strip
        heading="Empowering organizations of every size to automate training, accelerate learning, and scale with ease."
        subtext="Trusted by leading organizations to transform their training programs. Whether you're a growing startup or an enterprise, our SaaS LMS helps you deliver impactful learning at scale."
        :logos="$trustedLogos ?? []"
        :scrolling="true"
        id="trusted-brands"
    />

    {{-- ============================================================
         INTEGRATIONS LOGO STRIP
    ============================================================ --}}
    <x-logo-strip
        label="Integrations"
        heading="Seamless Integration"
        subtext="Connect with HR, CRM, and SSO tools and more effortlessly."
        :logos="$integrationLogos ?? []"
        :scrolling="false"
        :columns="5"
        id="integrations"
    />

    {{-- ============================================================
         BOTTOM CTA BAND
    ============================================================ --}}
    <x-cta-band
        heading="Start Using MyPass LMS Free for 90 or 180 Days"
        subtext="Unlimited features. No restrictions. No credit card."
        :cta="['label' => 'Sign Up For Free', 'url' => config('services.lms_register_url', '#'), 'target' => '_blank']"
        note="Limited Offer: 5,000 Free Credits + 90-Day Access → Start Free"
        variant="dark"
    />

@endsection

@push('schema')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "MyPass LMS",
    "applicationCategory": "BusinessApplication",
    "operatingSystem": "Web",
    "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD",
        "description": "Free 90-day trial with 5,000 credits"
    },
    "description": "MyPass LMS is an Agentic AI-powered, credit-based Learning Management System that cuts admin work by 70%.",
    "url": "{{ url('/') }}",
    "publisher": {
        "@type": "Organization",
        "name": "Kprise",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('assets/images/logo-color.png') }}"
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "reviewCount": "200"
    }
}
</script>
@endverbatim
@endpush
