<?php
/**
 * UseCaseController
 * Handles all training use-case pages.
 * Each method passes its own SEO + pageHero data.
 */

namespace App\Http\Controllers;

use Illuminate\View\View;

class UseCaseController extends Controller
{
    /**
     * Shared integration logos — reused across use-case pages.
     */
    private function integrationLogos(): array
    {
        return [
            ['src' => asset('assets/images/integrations/zoom.png'),         'alt' => 'Zoom',            'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/ms-teams.png'),     'alt' => 'Microsoft Teams', 'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/bamboohr.png'),     'alt' => 'BambooHR',        'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/salesforce.png'),   'alt' => 'Salesforce',      'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/okta.png'),         'alt' => 'Okta OneLogin',   'width' => 186, 'height' => 95],
        ];
    }

    /**
     * Shared sample testimonials.
     */
    private function testimonials(): array
    {
        return [
            [
                'quote'   => 'We launched training for 200+ employees in just one day. The system created the courses, assigned the teams, and even chased the reminders for us.',
                'name'    => 'Aditya',
                'role'    => 'AI-Based Recruiter',
                'company' => 'Contrario',
                'rating'  => 5,
            ],
            [
                'quote'   => 'MyPass LMS scaled with us quickly. The branded portals helped deliver training to clients and partners globally.',
                'name'    => 'Deepak',
                'role'    => 'AI Workflow Industry',
                'company' => 'Adopt AI',
                'rating'  => 5,
            ],
        ];
    }

    // ----------------------------------------------------------------
    // Onboarding Training
    // ----------------------------------------------------------------
    public function onboarding(): View
    {
        return view('pages.use-cases.onboarding', [
            'seo' => [
                'title'       => 'Onboarding Training LMS — Automate New Hire Training | MyPass LMS',
                'description' => 'Automate employee onboarding with AI-powered learning paths, role-based assignments, and real-time compliance tracking. Get new hires productive from day one.',
                'canonical'   => route('use-cases.onboarding'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home',      'url' => route('home')],
                ['label' => 'Use Cases', 'url' => null],
                ['label' => 'Onboarding Training'],
            ],
            'pageHero' => [
                'label'     => 'Use Case',
                'heading'   => 'Onboarding Training',
                'subtext'   => 'Automate new hire onboarding from day one — courses, reminders, compliance sign-offs, and manager dashboards, all on autopilot.',
                'ctaLabel'  => 'See it in Action',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'testimonials'     => $this->testimonials(),
            'integrationLogos' => $this->integrationLogos(),
        ]);
    }

    // ----------------------------------------------------------------
    // Sales Training
    // ----------------------------------------------------------------
    public function sales(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'Sales Training LMS — Ramp Reps Faster | MyPass LMS',
                'description' => 'Build, deliver, and track sales training programs at scale. Cut ramp time, improve win rates, and keep your team sharp with AI-powered sales enablement.',
                'canonical'   => route('use-cases.sales'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home',      'url' => route('home')],
                ['label' => 'Use Cases', 'url' => null],
                ['label' => 'Sales Training'],
            ],
            'pageHero' => [
                'label'   => 'Use Case',
                'heading' => 'Sales Training',
                'subtext' => 'Get reps up to speed faster. Keep them sharp with AI-curated content and automated reinforcement training.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Product knowledge courses',   'body' => 'Turn sales decks and battle cards into polished SCORM courses in minutes.'],
                ['title' => 'Scenario-based assessments',  'body' => 'Test real-world objection handling with branching scenario quizzes.'],
                ['title' => 'Rep performance tracking',    'body' => 'See which reps completed training and correlate it with pipeline data.'],
                ['title' => 'Automated role-out',          'body' => 'Push new product training to reps the moment it\'s published.'],
                ['title' => 'Certification paths',         'body' => 'Issue digital certificates to reps who complete training milestones.'],
                ['title' => 'CRM integrations',            'body' => 'Connect with Salesforce to tie training completion to rep activity.'],
            ],
            'testimonials'     => $this->testimonials(),
            'integrationLogos' => $this->integrationLogos(),
        ]);
    }

    // ----------------------------------------------------------------
    // Employee Training
    // ----------------------------------------------------------------
    public function employee(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'Employee Training LMS — Upskill Your Workforce | MyPass LMS',
                'description' => 'Deliver engaging employee training at any scale. AI-powered course creation, automated assignments, and real-time completion tracking.',
                'canonical'   => route('use-cases.employee'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Use Cases', 'url' => null],
                ['label' => 'Employee Training'],
            ],
            'pageHero' => [
                'label'     => 'Use Case',
                'heading'   => 'Employee Training',
                'subtext'   => 'Upskill your workforce without overwhelming your L&D team. MyPass LMS handles course creation, scheduling, and tracking — automatically.',
                'ctaLabel'  => 'Start Free Trial',
                'ctaUrl'    => config('services.lms_register_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'AI course builder',          'body' => 'Turn any document or topic into a polished interactive course in minutes.'],
                ['title' => 'Department-based paths',     'body' => 'Assign the right training to the right team automatically.'],
                ['title' => 'Skills gap analysis',        'body' => 'Identify and fill knowledge gaps with targeted learning content.'],
                ['title' => 'Mobile learning',            'body' => 'Employees can train on any device, anytime — online or offline.'],
                ['title' => 'Progress dashboards',        'body' => 'Real-time visibility into completion rates across every department.'],
                ['title' => 'Blended learning support',   'body' => 'Mix self-paced e-learning with live virtual or in-person sessions.'],
            ],
            'testimonials'     => $this->testimonials(),
            'integrationLogos' => $this->integrationLogos(),
        ]);
    }

    // ----------------------------------------------------------------
    // Cybersecurity Training
    // ----------------------------------------------------------------
    public function cybersecurity(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'Cybersecurity Awareness Training LMS | MyPass LMS',
                'description' => 'Reduce your organisation\'s security risk with automated cybersecurity awareness training. Track compliance, send reminders, and report instantly.',
                'canonical'   => route('use-cases.cybersecurity'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Use Cases', 'url' => null],
                ['label' => 'Cybersecurity Training'],
            ],
            'pageHero' => [
                'label'     => 'Use Case',
                'heading'   => 'Cybersecurity Training',
                'subtext'   => 'Make your team your strongest line of defence. Automate security awareness training, track completion, and prove compliance — without the admin grind.',
                'ctaLabel'  => 'See it in Action',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Phishing awareness modules',  'body' => 'Pre-built and AI-generated modules covering the latest threat vectors.'],
                ['title' => 'Mandatory completion tracking','body' => 'Know exactly who has and hasn\'t completed security training.'],
                ['title' => 'Automated deadline alerts',   'body' => 'Automatic reminders escalate until every employee is compliant.'],
                ['title' => 'Audit-ready reports',         'body' => 'Generate compliance reports instantly for audits and regulators.'],
                ['title' => 'Annual recertification',      'body' => 'Auto-re-enroll employees on a schedule to keep training current.'],
                ['title' => 'SSO & LDAP support',          'body' => 'Seamless login with Okta, Azure AD, and other identity providers.'],
            ],
            'testimonials'     => $this->testimonials(),
            'integrationLogos' => $this->integrationLogos(),
        ]);
    }

    // ----------------------------------------------------------------
    // Partner Training
    // ----------------------------------------------------------------
    public function partner(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'Partner & Channel Training LMS | MyPass LMS',
                'description' => 'Train your partners, resellers, and channel teams with branded learning portals, automated onboarding, and real-time certification tracking.',
                'canonical'   => route('use-cases.partner'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Use Cases', 'url' => null],
                ['label' => 'Partner Training'],
            ],
            'pageHero' => [
                'label'     => 'Use Case',
                'heading'   => 'Partner Training',
                'subtext'   => 'Extend your training programs beyond your walls. Deliver branded learning experiences to partners, resellers, and channel teams at any scale.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Branded partner portals',   'body' => 'Give each partner their own white-labelled learning environment.'],
                ['title' => 'Multi-tenant management',   'body' => 'Manage all partner groups from one admin dashboard.'],
                ['title' => 'Partner certification',      'body' => 'Issue co-branded certificates that validate partner expertise.'],
                ['title' => 'Self-service enrolment',    'body' => 'Partners can register and begin training without admin intervention.'],
                ['title' => 'Content access control',    'body' => 'Share only the content each partner tier is authorised to see.'],
                ['title' => 'Engagement analytics',      'body' => 'Track which partners are engaging with training and which need follow-up.'],
            ],
            'testimonials'     => $this->testimonials(),
            'integrationLogos' => $this->integrationLogos(),
        ]);
    }

    // ----------------------------------------------------------------
    // Compliance Training
    // ----------------------------------------------------------------
    public function compliance(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'Compliance Training LMS — Automate & Track | MyPass LMS',
                'description' => 'Stay audit-ready with automated compliance training. Track completions, send deadline reminders, and generate reports instantly — no spreadsheets needed.',
                'canonical'   => route('use-cases.compliance'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Use Cases', 'url' => null],
                ['label' => 'Compliance Training'],
            ],
            'pageHero' => [
                'label'     => 'Use Case',
                'heading'   => 'Compliance Training',
                'subtext'   => 'Never miss a compliance deadline again. MyPass LMS automates enrolment, reminders, and reporting so you stay audit-ready year-round.',
                'ctaLabel'  => 'Start Free Trial',
                'ctaUrl'    => config('services.lms_register_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Automated enrolment',       'body' => 'Auto-assign mandatory training based on role, location, or start date.'],
                ['title' => 'Deadline tracking',          'body' => 'Visual dashboards show who is on track and who is at risk of missing a deadline.'],
                ['title' => 'Escalating reminders',       'body' => 'Automated emails escalate frequency as deadlines approach.'],
                ['title' => 'Audit-ready reporting',      'body' => 'One-click compliance reports formatted for auditors and regulators.'],
                ['title' => 'Policy acknowledgement',     'body' => 'Capture digital signatures on policies and store them securely.'],
                ['title' => 'Annual recertification',     'body' => 'Automatically re-open training when certifications are due for renewal.'],
            ],
            'testimonials'     => $this->testimonials(),
            'integrationLogos' => $this->integrationLogos(),
        ]);
    }
}
