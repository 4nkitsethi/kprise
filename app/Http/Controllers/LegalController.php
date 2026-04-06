<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LegalController extends Controller
{
    public function terms(): View
    {
        return view('pages.legal.terms', [
            'seo' => [
                'title'    => 'Terms & Conditions | MyPass LMS by Kprise',
                'robots'   => 'noindex, follow',
                'canonical'=> route('legal.terms'),
            ],
        ]);
    }

    public function privacy(): View
    {
        return view('pages.legal.privacy', [
            'seo' => [
                'title'    => 'Privacy Policy | MyPass LMS by Kprise',
                'robots'   => 'noindex, follow',
                'canonical'=> route('legal.privacy'),
            ],
        ]);
    }

    public function sitemap(): View
    {
        return view('pages.legal.sitemap', [
            'seo' => [
                'title'    => 'Site Map | MyPass LMS',
                'canonical'=> route('sitemap'),
            ],
            'sections' => [
                'Main' => [
                    ['label' => 'Home',    'url' => route('home')],
                    ['label' => 'Pricing', 'url' => route('pricing')],
                ],
                'About' => [
                    ['label' => 'Company Overview', 'url' => route('about.company')],
                    ['label' => 'About Platform',   'url' => route('about.platform')],
                    ['label' => 'Contact Us',        'url' => route('contact')],
                ],
                'Use Cases' => [
                    ['label' => 'Onboarding Training',    'url' => route('use-cases.onboarding')],
                    ['label' => 'Sales Training',         'url' => route('use-cases.sales')],
                    ['label' => 'Employee Training',      'url' => route('use-cases.employee')],
                    ['label' => 'Cybersecurity Training', 'url' => route('use-cases.cybersecurity')],
                    ['label' => 'Partner Training',       'url' => route('use-cases.partner')],
                    ['label' => 'Compliance Training',    'url' => route('use-cases.compliance')],
                ],
                'Industries' => [
                    ['label' => 'Software',          'url' => route('industries.software')],
                    ['label' => 'Manufacturing',     'url' => route('industries.manufacturing')],
                    ['label' => 'Healthcare',        'url' => route('industries.healthcare')],
                    ['label' => 'Financial Services','url' => route('industries.financial')],
                    ['label' => 'Consulting',        'url' => route('industries.consulting')],
                    ['label' => 'Non-Profit',        'url' => route('industries.nonprofit')],
                    ['label' => 'Retail',            'url' => route('industries.retail')],
                ],
                'Corporate Solutions' => [
                    ['label' => 'Enterprise',                'url' => route('solutions.enterprise')],
                    ['label' => 'Educational Institutions',  'url' => route('solutions.education')],
                ],
                'Resources' => [
                    ['label' => 'Blog',              'url' => route('blog.index')],
                    ['label' => 'LMS Comparisons',   'url' => route('resources.lms-comparisons')],
                    ['label' => 'Learning Insights',  'url' => route('resources.insights')],
                    ['label' => 'Calculator',         'url' => route('resources.calculator')],
                    ['label' => 'Case Study',         'url' => route('resources.case-study')],
                ],
            ],
        ]);
    }
}
