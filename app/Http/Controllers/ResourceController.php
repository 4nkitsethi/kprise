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
        return view('pages.resources.lms_comparisons');
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
        return view('pages.resources.burnout_calculator');
    }

    public function caseStudy(): View
    {
       return view('pages.resources.case_study');
    }
}
