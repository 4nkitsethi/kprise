<?php
/**
 * IndustryController
 * Renders all 7 industry-specific pages using the shared generic template.
 * Each page gets unique SEO meta, hero copy, and feature cards.
 */

namespace App\Http\Controllers;

use Illuminate\View\View;

class IndustryController extends Controller
{
    private function sharedTestimonials(): array
    {
        return [
            [
                'quote'   => 'We have been a Kprise client for over four years and Kprise has constantly been there to support our needs.',
                'name'    => 'Shawn',
                'role'    => 'Founder & Director',
                'company' => 'American Board for Certification of Teacher Excellence',
                'rating'  => 5,
            ],
            [
                'quote'   => 'MyPass LMS integrated smoothly, offering deep customization, CRM, and easy lead management to streamline training and learner tracking.',
                'name'    => 'Varun S.',
                'role'    => 'CEO',
                'company' => 'Information Technology and Services',
                'rating'  => 5,
            ],
        ];
    }

    private function sharedIntegrations(): array
    {
        return [
            ['src' => asset('assets/images/integrations/zoom.png'),       'alt' => 'Zoom',            'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/ms-teams.png'),   'alt' => 'Microsoft Teams', 'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/bamboohr.png'),   'alt' => 'BambooHR',        'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/salesforce.png'), 'alt' => 'Salesforce',      'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/okta.png'),       'alt' => 'Okta OneLogin',   'width' => 186, 'height' => 95],
        ];
    }

    private function breadcrumbs(string $label): array
    {
        return [
            ['label' => 'Home',       'url' => route('home')],
            ['label' => 'Industries', 'url' => null],
            ['label' => $label],
        ];
    }

    // ----------------------------------------------------------------

    public function software(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'LMS for Software Companies — Train Teams at Scale | MyPass LMS',
                'description' => 'MyPass LMS helps software companies onboard engineers, train customer success teams, and keep product knowledge up to date — all with AI-powered automation.',
                'canonical'   => route('industries.software'),
            ],
            'breadcrumbs' => $this->breadcrumbs('Software'),
            'pageHero' => [
                'label'     => 'Industry',
                'heading'   => 'Built for Software Companies',
                'subtext'   => 'Move fast without breaking your training program. MyPass LMS scales with your team from Series A to enterprise — no extra headcount required.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Engineering onboarding',    'body' => 'Get engineers productive faster with structured, role-specific learning paths.'],
                ['title' => 'Product training at launch', 'body' => 'Push product update training to every team the moment a release ships.'],
                ['title' => 'CS & support enablement',   'body' => 'Ensure your support team always knows the product inside out.'],
                ['title' => 'SCORM & API support',       'body' => 'Embed training in your product or connect via API to your existing stack.'],
                ['title' => 'SSO & Okta integration',    'body' => 'One-click sign-in with the identity provider your engineering team already uses.'],
                ['title' => 'Usage analytics',           'body' => 'Track training engagement alongside product metrics in real time.'],
            ],
            'testimonials'     => $this->sharedTestimonials(),
            'integrationLogos' => $this->sharedIntegrations(),
        ]);
    }

    public function manufacturing(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'LMS for Manufacturing — Safety & Skills Training | MyPass LMS',
                'description' => 'Deliver safety compliance, equipment training, and skills development across your manufacturing workforce. Automated tracking, multilingual support, mobile-ready.',
                'canonical'   => route('industries.manufacturing'),
            ],
            'breadcrumbs' => $this->breadcrumbs('Manufacturing'),
            'pageHero' => [
                'label'     => 'Industry',
                'heading'   => 'Training Built for the Plant Floor',
                'subtext'   => 'Keep your workforce safe, skilled, and compliant — even across multiple shifts and sites. MyPass LMS works on any device, no desk required.',
                'ctaLabel'  => 'Start Free Trial',
                'ctaUrl'    => config('services.lms_register_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Safety & OSHA compliance',   'body' => 'Automate mandatory safety training and track certifications to stay audit-ready.'],
                ['title' => 'Equipment operation courses', 'body' => 'Create rich, visual training for equipment use — no authoring expertise needed.'],
                ['title' => 'Multi-site management',       'body' => 'Centrally manage training across every facility from one admin panel.'],
                ['title' => 'Multilingual content',        'body' => 'Deliver training in the language of each worker — auto-translation supported.'],
                ['title' => 'Mobile & offline access',     'body' => 'Workers can train on tablets or phones, even without a stable internet connection.'],
                ['title' => 'Certification renewals',      'body' => 'Automatically re-enrol workers when certifications are due to expire.'],
            ],
            'testimonials'     => $this->sharedTestimonials(),
            'integrationLogos' => $this->sharedIntegrations(),
        ]);
    }

    public function healthcare(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'LMS for Healthcare — Compliance & Clinical Training | MyPass LMS',
                'description' => 'Keep clinical and administrative staff compliant with automated training, audit-ready reports, and AI-powered course creation. Trusted by healthcare organisations.',
                'canonical'   => route('industries.healthcare'),
            ],
            'breadcrumbs' => $this->breadcrumbs('Healthcare'),
            'pageHero' => [
                'label'     => 'Industry',
                'heading'   => 'Healthcare Training That Meets the Standard',
                'subtext'   => 'From new hire orientation to mandatory annual compliance — MyPass LMS keeps your clinical and administrative staff ready, certified, and on track.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'HIPAA & compliance training', 'body' => 'Automate mandatory compliance training with one-click audit-ready reports.'],
                ['title' => 'Clinical skills modules',      'body' => 'Build and deliver procedural training with video, quizzes, and assessments.'],
                ['title' => 'Role-based assignments',       'body' => 'Assign the right training to nurses, physicians, admin staff, and contractors automatically.'],
                ['title' => 'Policy acknowledgement',       'body' => 'Capture digital sign-offs on updated policies and store them securely.'],
                ['title' => 'Credentialing support',        'body' => 'Track CE credits, certifications, and licence renewals in one place.'],
                ['title' => 'Secure, FERPA-aligned platform','body' => 'Enterprise-grade security with role-based permissions and SSO support.'],
            ],
            'testimonials'     => $this->sharedTestimonials(),
            'integrationLogos' => $this->sharedIntegrations(),
        ]);
    }

    public function financial(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'LMS for Financial Services — Compliance & Regulatory Training | MyPass LMS',
                'description' => 'Automate regulatory compliance training, track certifications, and stay audit-ready across your financial services organisation with MyPass LMS.',
                'canonical'   => route('industries.financial'),
            ],
            'breadcrumbs' => $this->breadcrumbs('Financial Services'),
            'pageHero' => [
                'label'     => 'Industry',
                'heading'   => 'Stay Compliant. Stay Competitive.',
                'subtext'   => 'Regulatory requirements change fast. MyPass LMS keeps your advisors, analysts, and operations teams up to date — automatically.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Regulatory compliance',    'body' => 'Automate AML, KYC, FINRA, and FCA training with deadline tracking and reminders.'],
                ['title' => 'Audit trail & reporting',  'body' => 'Instant compliance reports formatted for regulators and internal audits.'],
                ['title' => 'Adviser onboarding',       'body' => 'Get new financial advisers licensed and productive faster with structured paths.'],
                ['title' => 'Annual recertification',   'body' => 'Automatically re-open training each year — no manual admin required.'],
                ['title' => 'Product knowledge',        'body' => 'Keep frontline staff informed on new products, rates, and regulatory changes.'],
                ['title' => 'Enterprise SSO',           'body' => 'Secure access with Okta, Azure AD, or your existing identity provider.'],
            ],
            'testimonials'     => $this->sharedTestimonials(),
            'integrationLogos' => $this->sharedIntegrations(),
        ]);
    }

    public function consulting(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'LMS for Consulting Firms — Client & Staff Training | MyPass LMS',
                'description' => 'Train consultants, deliver client-facing learning programs, and manage knowledge transfer at scale with MyPass LMS. Branded portals. AI-powered content.',
                'canonical'   => route('industries.consulting'),
            ],
            'breadcrumbs' => $this->breadcrumbs('Consulting'),
            'pageHero' => [
                'label'     => 'Industry',
                'heading'   => 'Training That Scales With Your Practice',
                'subtext'   => 'Whether you\'re upskilling your consultants or delivering training to clients, MyPass LMS gives you the tools to do both — from one platform.',
                'ctaLabel'  => 'Start Free Trial',
                'ctaUrl'    => config('services.lms_register_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Client training portals',   'body' => 'Deliver branded learning programs to each client from their own portal.'],
                ['title' => 'Consultant onboarding',      'body' => 'Get new hires up to speed on methodologies, tools, and client standards fast.'],
                ['title' => 'Knowledge management',       'body' => 'Capture and distribute institutional knowledge before it walks out the door.'],
                ['title' => 'AI content creation',        'body' => 'Turn slide decks and frameworks into interactive courses instantly.'],
                ['title' => 'Billable training tracking', 'body' => 'Track client training hours for billing and engagement reporting.'],
                ['title' => 'Multi-client management',    'body' => 'Manage every client training program from one unified admin dashboard.'],
            ],
            'testimonials'     => $this->sharedTestimonials(),
            'integrationLogos' => $this->sharedIntegrations(),
        ]);
    }

    public function nonprofit(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'LMS for Non-Profits — Volunteer & Staff Training | MyPass LMS',
                'description' => 'Train volunteers, staff, and board members affordably with MyPass LMS. Credit-based pricing means you only pay for what you use — no per-seat fees.',
                'canonical'   => route('industries.nonprofit'),
            ],
            'breadcrumbs' => $this->breadcrumbs('Non-Profit'),
            'pageHero' => [
                'label'     => 'Industry',
                'heading'   => 'Do More Good With Less Admin',
                'subtext'   => 'Non-profits deserve enterprise-grade training tools without enterprise price tags. MyPass LMS credits-based model means you only pay for learning that actually happens.',
                'ctaLabel'  => 'Start Free Trial',
                'ctaUrl'    => config('services.lms_register_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Volunteer onboarding',     'body' => 'Get volunteers trained and ready quickly — even seasonal or one-time cohorts.'],
                ['title' => 'Credit-based pricing',     'body' => 'No per-seat fees. Pay only for the learning that\'s actually completed.'],
                ['title' => 'Board & staff training',   'body' => 'Deliver governance, compliance, and role-specific training in one place.'],
                ['title' => 'Grant reporting support',  'body' => 'Track and export training data for grant compliance and impact reporting.'],
                ['title' => 'Multilingual support',     'body' => 'Serve diverse communities with content in multiple languages.'],
                ['title' => 'Simple admin tools',       'body' => 'Built for lean teams — powerful features without a steep learning curve.'],
            ],
            'testimonials'     => $this->sharedTestimonials(),
            'integrationLogos' => $this->sharedIntegrations(),
        ]);
    }

    public function retail(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'LMS for Retail — Store Staff & Product Training | MyPass LMS',
                'description' => 'Train frontline retail staff at scale across multiple locations. AI-powered product knowledge, compliance training, and automated onboarding for high-turnover teams.',
                'canonical'   => route('industries.retail'),
            ],
            'breadcrumbs' => $this->breadcrumbs('Retail'),
            'pageHero' => [
                'label'     => 'Industry',
                'heading'   => 'Train Every Associate. In Every Store. Every Day.',
                'subtext'   => 'High turnover, seasonal hiring, and constant product launches make retail training a constant challenge. MyPass LMS automates it all.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Rapid new-hire onboarding',  'body' => 'Get seasonal and new hires trained and floor-ready in hours, not days.'],
                ['title' => 'Product launch training',     'body' => 'Push product knowledge to every store team the moment a collection launches.'],
                ['title' => 'Mobile-first learning',       'body' => 'Associates train on their phone — no kiosk, no desk, no friction.'],
                ['title' => 'Multi-location management',   'body' => 'Manage training across every region and store from one dashboard.'],
                ['title' => 'Loss prevention & compliance','body' => 'Automate mandatory compliance and loss prevention training across all staff.'],
                ['title' => 'Performance-linked tracking', 'body' => 'Correlate training completion with sales performance data by store or region.'],
            ],
            'testimonials'     => $this->sharedTestimonials(),
            'integrationLogos' => $this->sharedIntegrations(),
        ]);
    }
}
