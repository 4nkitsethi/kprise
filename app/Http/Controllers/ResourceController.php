<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * ResourceController
 * Handles LMS comparisons, insights hub, calculator, and case study pages.
 */
class ResourceController extends Controller
{
    public function lmsComparisons(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'LMS Comparisons — MyPass LMS vs Competitors | Kprise',
                'description' => 'See how MyPass LMS compares to TalentLMS, Docebo, Cornerstone, and other leading LMS platforms on pricing, AI features, and ease of use.',
                'canonical'   => route('resources.lms-comparisons'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home',      'url' => route('home')],
                ['label' => 'Resources', 'url' => null],
                ['label' => 'LMS Comparisons'],
            ],
            'pageHero' => [
                'label'     => 'LMS Comparisons',
                'heading'   => 'How Does MyPass LMS Stack Up?',
                'subtext'   => 'Unbiased side-by-side comparisons of the leading LMS platforms — features, pricing, AI capabilities, and support.',
                'ctaLabel'  => 'See it Live',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [
                ['title' => 'vs TalentLMS',      'body' => 'See how MyPass LMS compares on AI features, pricing model, and administrative overhead.'],
                ['title' => 'vs Docebo',          'body' => 'Compare enterprise capabilities, credit-based vs seat-based pricing, and automation depth.'],
                ['title' => 'vs Cornerstone',     'body' => 'How does MyPass LMS measure up on ease of use, implementation speed, and cost?'],
                ['title' => 'vs Absorb LMS',      'body' => 'Side-by-side comparison of course creation, AI tools, and reporting features.'],
                ['title' => 'vs Litmos',           'body' => 'Compare compliance automation, SCORM support, and customer satisfaction scores.'],
                ['title' => 'vs 360Learning',      'body' => 'Peer learning vs AI-powered admin automation — which approach fits your team?'],
            ],
        ]);
    }

    public function insights(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'Learning Insights Hub — L&D Research & Data | MyPass LMS',
                'description' => 'Data-backed insights on corporate learning, LMS adoption, compliance trends, and the ROI of effective employee training.',
                'canonical'   => route('resources.insights'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home',      'url' => route('home')],
                ['label' => 'Resources', 'url' => null],
                ['label' => 'Learning Insights Hub'],
            ],
            'pageHero' => [
                'label'   => 'Learning Insights Hub',
                'heading' => 'Data-Driven L&D Intelligence',
                'subtext' => 'Research, benchmarks, and actionable insights to help you build a better training programme.',
                'ctaLabel'  => 'Explore Resources',
                'ctaUrl'    => route('blog.index'),
            ],
            'features' => [],
        ]);
    }

    public function calculator(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'LMS Admin Burnout Diagnostic Calculator | MyPass LMS',
                'description' => 'Find out how many hours your team is losing to LMS admin work each week — and how much time MyPass LMS Agentic AI could give back.',
                'canonical'   => route('resources.calculator'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home',      'url' => route('home')],
                ['label' => 'Resources', 'url' => null],
                ['label' => 'Admin Burnout Calculator'],
            ],
            'pageHero' => [
                'label'   => 'Free Tool',
                'heading' => 'How Much Time Are You Wasting on LMS Admin?',
                'subtext' => 'Answer 5 quick questions and get a personalised estimate of how many hours per week MyPass LMS Agentic AI could save your team.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [],
        ]);
    }

    public function caseStudy(): View
    {
        return view('pages.use-cases.generic', [
            'seo' => [
                'title'       => 'Customer Case Studies — Real Results with MyPass LMS | Kprise',
                'description' => 'See how organisations across industries use MyPass LMS to automate training, cut admin time, and improve compliance completion rates.',
                'canonical'   => route('resources.case-study'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home',      'url' => route('home')],
                ['label' => 'Resources', 'url' => null],
                ['label' => 'Case Studies'],
            ],
            'pageHero' => [
                'label'   => 'Case Studies',
                'heading' => 'Real Teams. Real Results.',
                'subtext' => 'See how organisations across industries use MyPass LMS to transform their training programmes.',
                'ctaLabel'  => 'Book a Demo',
                'ctaUrl'    => config('services.demo_url', '#'),
                'ctaTarget' => '_blank',
            ],
            'features' => [],
        ]);
    }
}
