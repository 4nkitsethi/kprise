<?php

namespace App\Http\Controllers;

use App\Services\SeoService;
use Illuminate\View\View;

/**
 * IndustryController — updated to use SeoService.
 *
 * BEFORE (hardcoded, not manageable from admin):
 * ─────────────────────────────────────────────
 *   $seo = [
 *       'title'       => 'LMS for Software Companies — Train Teams at Scale | MyPass LMS',
 *       'description' => 'MyPass LMS helps software companies onboard engineers...',
 *       'canonical'   => route('industries.software'),
 *   ];
 *
 * AFTER (DB-first, falls back to hardcoded):
 * ──────────────────────────────────────────
 *   $seo = app(SeoService::class)->forPage('industries.software', [...defaults...]);
 *
 * The hardcoded array is now just a FALLBACK used when:
 *   - No DB record exists yet for this route
 *   - The DB record has is_active = false
 *   - The specific field (title/desc) is left blank in admin
 *
 * Priority chain for each field:
 *   DB record → hardcoded default → app/env default
 */
class IndustryController extends Controller
{
    public function __construct(
        private readonly SeoService $seo
    ) {}

    /* ── Software ───────────────────────────────────────────────── */

    public function software(): View
    {
        return view('pages.use-cases.generic', [

            // DB-first SEO — editable from /admin/seo
            'seo' => $this->seo->forPage('industries.software', [
                'title'       => 'LMS for Software Companies — Train Teams at Scale | MyPass LMS',
                'description' => 'MyPass LMS helps software companies onboard engineers, train customer success teams, and keep product knowledge up to date — all with AI-powered automation.',
                'canonical'   => route('industries.software'),
            ]),

            // Rest of page data unchanged
            'breadcrumbs' => [
                ['label' => 'Home',       'url' => route('home')],
                ['label' => 'Industries', 'url' => null],
                ['label' => 'Software'],
            ],
            'pageHero' => [
                'label'     => 'Industry',
                'heading'   => 'Built for Software Companies',
                'subtext'   => 'Move fast without breaking your training program.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Engineering onboarding',     'body' => 'Get engineers productive faster with structured, role-specific learning paths.'],
                ['title' => 'Product training at launch', 'body' => 'Push product update training to every team the moment a release ships.'],
                ['title' => 'CS & support enablement',    'body' => 'Ensure your support team always knows the product inside out.'],
                ['title' => 'SCORM & API support',        'body' => 'Embed training in your product or connect via API to your existing stack.'],
                ['title' => 'SSO & Okta integration',     'body' => 'One-click sign-in with the identity provider your engineering team already uses.'],
                ['title' => 'Usage analytics',            'body' => 'Track training engagement alongside product metrics in real time.'],
            ],
        ]);
    }

    /* ── Manufacturing ──────────────────────────────────────────── */

    public function manufacturing(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => $this->seo->forPage('industries.manufacturing', [
                'title'       => 'LMS for Manufacturing — Safety & Skills Training | MyPass LMS',
                'description' => 'Deliver safety compliance, equipment training, and skills development across your manufacturing workforce. Automated tracking, multilingual support, mobile-ready.',
                'canonical'   => route('industries.manufacturing'),
            ]),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Industries', 'url' => null],
                ['label' => 'Manufacturing'],
            ],
            'pageHero' => [
                'label'     => 'Industry',
                'heading'   => 'Training Built for the Plant Floor',
                'subtext'   => 'Keep your workforce safe, skilled, and compliant — even across multiple shifts and sites.',
                'ctaLabel'  => 'Start Free Trial',
                'ctaUrl'    => config('services.lms_register_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Safety & OSHA compliance',    'body' => 'Automate mandatory safety training and track certifications to stay audit-ready.'],
                ['title' => 'Equipment operation courses', 'body' => 'Create rich, visual training for equipment use — no authoring expertise needed.'],
                ['title' => 'Multi-site management',       'body' => 'Centrally manage training across every facility from one admin panel.'],
                ['title' => 'Multilingual content',        'body' => 'Deliver training in the language of each worker — auto-translation supported.'],
                ['title' => 'Mobile & offline access',     'body' => 'Workers can train on tablets or phones, even without a stable internet connection.'],
                ['title' => 'Certification renewals',      'body' => 'Automatically re-enrol workers when certifications are due to expire.'],
            ],
        ]);
    }

    /* ── Healthcare ─────────────────────────────────────────────── */

    public function healthcare(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => $this->seo->forPage('industries.healthcare', [
                'title'       => 'LMS for Healthcare — Compliance & Clinical Training | MyPass LMS',
                'description' => 'Keep clinical and administrative staff compliant with automated training, audit-ready reports, and AI-powered course creation.',
                'canonical'   => route('industries.healthcare'),
            ]),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Industries', 'url' => null],
                ['label' => 'Healthcare'],
            ],
            'pageHero' => [
                'label'     => 'Industry',
                'heading'   => 'Healthcare Training That Meets the Standard',
                'subtext'   => 'From new hire orientation to mandatory annual compliance — MyPass LMS keeps your staff ready, certified, and on track.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'HIPAA & compliance training',  'body' => 'Automate mandatory compliance training with one-click audit-ready reports.'],
                ['title' => 'Clinical skills modules',       'body' => 'Build and deliver procedural training with video, quizzes, and assessments.'],
                ['title' => 'Role-based assignments',        'body' => 'Assign the right training to nurses, physicians, admin staff, and contractors.'],
                ['title' => 'Policy acknowledgement',        'body' => 'Capture digital sign-offs on updated policies and store them securely.'],
                ['title' => 'Credentialing support',         'body' => 'Track CE credits, certifications, and licence renewals in one place.'],
                ['title' => 'Secure, FERPA-aligned platform','body' => 'Enterprise-grade security with role-based permissions and SSO support.'],
            ],
        ]);
    }

    /* ── Financial ──────────────────────────────────────────────── */

    public function financial(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => $this->seo->forPage('industries.financial', [
                'title'       => 'LMS for Financial Services — Compliance & Regulatory Training | MyPass LMS',
                'description' => 'Automate regulatory compliance training, track certifications, and stay audit-ready across your financial services organisation.',
                'canonical'   => route('industries.financial'),
            ]),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Industries', 'url' => null],
                ['label' => 'Financial Services'],
            ],
            'pageHero' => [
                'label'   => 'Industry',
                'heading' => 'Stay Compliant. Stay Competitive.',
                'subtext' => 'Regulatory requirements change fast. MyPass LMS keeps your advisors, analysts, and operations teams up to date — automatically.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Regulatory compliance',    'body' => 'Automate AML, KYC, FINRA, and FCA training with deadline tracking and reminders.'],
                ['title' => 'Audit trail & reporting',  'body' => 'Instant compliance reports formatted for regulators and internal audits.'],
                ['title' => 'Adviser onboarding',       'body' => 'Get new financial advisers licensed and productive faster.'],
                ['title' => 'Annual recertification',   'body' => 'Automatically re-open training each year — no manual admin required.'],
                ['title' => 'Product knowledge',        'body' => 'Keep frontline staff informed on new products, rates, and regulatory changes.'],
                ['title' => 'Enterprise SSO',           'body' => 'Secure access with Okta, Azure AD, or your existing identity provider.'],
            ],
        ]);
    }

    /* ── Consulting ─────────────────────────────────────────────── */

    public function consulting(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => $this->seo->forPage('industries.consulting', [
                'title'       => 'LMS for Consulting Firms — Client & Staff Training | MyPass LMS',
                'description' => 'Train consultants, deliver client-facing learning programs, and manage knowledge transfer at scale.',
                'canonical'   => route('industries.consulting'),
            ]),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Industries', 'url' => null],
                ['label' => 'Consulting'],
            ],
            'pageHero' => [
                'label'   => 'Industry',
                'heading' => 'Training That Scales With Your Practice',
                'subtext' => 'Whether you\'re upskilling your consultants or delivering training to clients, MyPass LMS gives you the tools to do both.',
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
        ]);
    }

    /* ── Non-profit ─────────────────────────────────────────────── */

    public function nonprofit(): View
    {
        return view('pages.industries.nonprofits', [
            'seo' => $this->seo->forPage('industries.nonprofit', [
                'title'       => 'LMS for Non-Profits — Volunteer & Staff Training | MyPass LMS',
                'description' => 'Train volunteers, staff, and board members affordably. Credit-based pricing means you only pay for what you use — no per-seat fees.',
                'canonical'   => route('industries.nonprofit'),
            ]),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Industries', 'url' => null],
                ['label' => 'Non-Profit'],
            ],
            'pageHero' => [
                'label'   => 'Industry',
                'heading' => 'Do More Good With Less Admin',
                'subtext' => 'Non-profits deserve enterprise-grade training tools without enterprise price tags.',
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
        ]);
    }

    /* ── Retail ─────────────────────────────────────────────────── */

    public function retail(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => $this->seo->forPage('industries.retail', [
                'title'       => 'LMS for Retail — Store Staff & Product Training | MyPass LMS',
                'description' => 'Train frontline retail staff at scale across multiple locations. AI-powered product knowledge, compliance training, and automated onboarding.',
                'canonical'   => route('industries.retail'),
            ]),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Industries', 'url' => null],
                ['label' => 'Retail'],
            ],
            'pageHero' => [
                'label'   => 'Industry',
                'heading' => 'Train Every Associate. In Every Store. Every Day.',
                'subtext' => 'High turnover, seasonal hiring, and constant product launches make retail training a constant challenge. MyPass LMS automates it all.',
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
        ]);
    }
}
