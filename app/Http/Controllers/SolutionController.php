<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SolutionController extends Controller
{
    private function sharedTestimonials(): array
    {
        return [
            [
                'quote'   => 'MyPass LMS scaled with us quickly. The branded portals helped deliver training to clients and partners globally.',
                'name'    => 'Deepak',
                'role'    => 'AI Workflow Industry',
                'company' => 'Adopt AI',
                'rating'  => 5,
            ],
            [
                'quote'   => 'MyPass LMS streamlined client onboarding with custom branding, multilingual support, and integrations — backed by a skilled team for smooth implementation.',
                'name'    => 'Kiran H.',
                'role'    => 'Training Manager',
                'company' => 'E-Learning',
                'rating'  => 5,
            ],
        ];
    }

    public function enterprise(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'Enterprise LMS — Scalable AI-Powered Training | MyPass LMS',
                'description' => 'MyPass LMS enterprise plan delivers unlimited credits, custom branding, white-label portals, dedicated support, and FedRAMP-authorized infrastructure for large organisations.',
                'canonical'   => route('solutions.enterprise'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home',               'url' => route('home')],
                ['label' => 'Corporate Solutions', 'url' => null],
                ['label' => 'Enterprise'],
            ],
            'pageHero' => [
                'label'     => 'Enterprise',
                'heading'   => 'Enterprise Training at Any Scale',
                'subtext'   => 'From 500 to 500,000 learners — MyPass LMS grows with you. Dedicated infrastructure, unlimited credits, and a team that\'s invested in your success.',
                'ctaLabel'  => 'Talk to Sales',
                'ctaUrl'    => route('contact'),
            ],
            'features' => [
                ['title' => 'Unlimited learning credits',   'body' => 'No per-seat caps, no overage surprises. Scale learner numbers without scaling your invoice.'],
                ['title' => 'White-label & multi-tenant',   'body' => 'Deploy branded portals for each department, subsidiary, or partner organisation.'],
                ['title' => 'FedRAMP-authorized infra',     'body' => 'Enterprise-grade security and compliance — trusted by government-adjacent organisations.'],
                ['title' => 'Dedicated success manager',    'body' => 'A named CSM who knows your programme, your goals, and your team.'],
                ['title' => 'SLA & uptime guarantee',       'body' => '99.9% uptime SLA with priority incident response and dedicated support queue.'],
                ['title' => 'Custom integrations',          'body' => 'Connect to your HRIS, SSO, CRM, and data warehouse via API or pre-built connectors.'],
            ],
            'testimonials'     => $this->sharedTestimonials(),
            'integrationLogos' => [],
        ]);
    }

    public function education(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'LMS for Educational Institutions — Student & Staff Training | MyPass LMS',
                'description' => 'MyPass LMS helps universities, colleges, and training organisations deliver blended learning, manage accreditation, and automate administrative tasks.',
                'canonical'   => route('solutions.education'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home',               'url' => route('home')],
                ['label' => 'Corporate Solutions', 'url' => null],
                ['label' => 'Educational Institutions'],
            ],
            'pageHero' => [
                'label'     => 'Education',
                'heading'   => 'Modern Learning Infrastructure for Educational Institutions',
                'subtext'   => 'From staff professional development to student-facing course delivery, MyPass LMS gives educational institutions the flexibility and automation they need.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'Student & staff portals',     'body' => 'Separate branded environments for learners and administrators — all managed from one dashboard.'],
                ['title' => 'Blended learning support',    'body' => 'Mix self-paced e-learning with instructor-led sessions, webinars, and in-person classes.'],
                ['title' => 'Accreditation tracking',      'body' => 'Issue certificates, track CPD credits, and manage accreditation records in one place.'],
                ['title' => 'AI course creation',          'body' => 'Turn syllabi, slide decks, and lecture notes into interactive courses in minutes.'],
                ['title' => 'Student progress analytics',  'body' => 'Real-time dashboards showing engagement, completion, and assessment performance.'],
                ['title' => 'FERPA-aligned security',      'body' => 'Role-based access controls and data security policies aligned with education regulations.'],
            ],
            'testimonials'     => $this->sharedTestimonials(),
            'integrationLogos' => [],
        ]);
    }


    public function customerTrainingEducation(): View
    {
        return view('pages.solutions.customer_training_education', [
            'seo' => [
                'title'       => 'Customer Training & Education — MyPass LMS',
                'description' => 'Deliver engaging customer training and education programs with MyPass LMS. Custom branding, interactive content, and seamless integrations to drive adoption and success.',
                'canonical'   => route('solutions.customer-training-education'),
            ],                  

            'breadcrumbs' => [
                ['label' => 'Home',               'url' => route('home')],
                ['label' => 'Corporate Solutions', 'url' => null],
                ['label' => 'Customer Training & Education'],
            ],      

        ]); 
    }


    public function employeeOnboarding(): View
    {
        return view('pages.solutions.employee_onboarding', [
            'seo' => [
                'title'       => 'Employee Onboarding Solution — MyPass LMS',
                'description' => 'Streamline employee onboarding with MyPass LMS. Custom branding, interactive content, and seamless integrations to get new hires up to speed and productive faster.',
                'canonical'   => route('solutions.employee-onboarding'),
            ],   
        ]);
    }   
    
    public function academicEducationInstitutions(): View
    {
        return view('pages.solutions.academic_education_institutions', [
            'seo' => [
                'title'       => 'LMS for Academic & Education Institutions — MyPass LMS',
                'description' => 'MyPass LMS helps academic institutions deliver engaging courses, manage accreditation, and automate administrative tasks with custom branding and AI-powered content creation.',
                'canonical'   => route('solutions.academic-education-institutions'),
            ],   
        ]);
    }

    public function continuousLearningUpskilling(): View
    {
        return view('pages.solutions.continuous_learning_upskilling', [
            'seo' => [
                'title'       => 'Continuous Learning & Upskilling — MyPass LMS',
                'description' => 'Empower continuous learning and upskilling with MyPass LMS. Custom branding, interactive content, and seamless integrations to drive employee development and retention.',
                'canonical'   => route('solutions.continuous-learning-upskilling'),
            ],   
        ]);
    }


    public function extendedEnterpriseTraining(): View
    {
        return view('pages.solutions.extended_enterprise_training', [
            'seo' => [
                'title'       => 'Extended Enterprise Training — MyPass LMS',
                'description' => 'Deliver training to customers, partners, and external stakeholders with MyPass LMS. Custom branding, multi-tenant portals, and seamless integrations to drive adoption and success.',
                'canonical'   => route('solutions.extended-enterprise-training'),
            ],   
        ]);
    }

    public function operationalProcessTraining(): View
    {
        return view('pages.solutions.operational_process_training', [
            'seo' => [
                'title'       => 'Operational Process Training — MyPass LMS',
                'description' => 'Streamline operational process training with MyPass LMS. Custom branding, interactive content, and seamless integrations to drive employee proficiency and operational excellence.',
                'canonical'   => route('solutions.operational-process-training'),
            ],   
        ]);
    }

    public function partnerChannelTraining(): View
    {
        return view('pages.solutions.partner_channel_training', [
            'seo' => [
                'title'       => 'Partner & Channel Training — MyPass LMS',
                'description' => 'Empower your partners and channel teams with MyPass LMS. Custom branding, multi-tenant portals, and seamless integrations to drive partner engagement and success.',
                'canonical'   => route('solutions.partner-channel-training'),
            ],   
        ]);
    }

    public function salesEnablement(): View
    {
        return view('pages.solutions.sales_enablement', [
            'seo' => [
                'title'       => 'Sales Enablement Training — MyPass LMS',
                'description' => 'Equip your sales teams with the knowledge and skills they need to succeed with MyPass LMS. Custom branding, interactive content, and seamless integrations to drive sales performance and revenue growth.',
                'canonical'   => route('solutions.sales-enablement'),
            ],   
        ]);     
    }

    public function complianceTraining(): View
    {
        return view('pages.solutions.compliance_training', [
            'seo' => [
                'title'       => 'Compliance Training — MyPass LMS',
                'description' => 'Ensure regulatory compliance and mitigate risk with MyPass LMS. Custom branding, interactive content, and seamless integrations to drive employee engagement and adherence to compliance requirements.',
                'canonical'   => route('solutions.compliance-training'),
            ],   
        ]);     
    }

    public function nonprofitVolunteerTraining(): View
    {
        return view('pages.solutions.nonprofit_volunteer_training', [
            'seo' => [
                'title'       => 'Nonprofit & Volunteer Training — MyPass LMS',
                'description' => 'Empower your nonprofit staff and volunteers with MyPass LMS. Custom branding, interactive content, and seamless integrations to drive engagement and impact.',
                'canonical'   => route('solutions.nonprofit-volunteer-training'),
            ],   
        ]);     
    }

}
