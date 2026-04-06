<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PricingController extends Controller
{
    public function index(): View
    {
        $seo = [
            'title'       => 'Pricing — Credit-Based LMS Pricing | MyPass LMS',
            'description' => 'No per-seat fees. Start with 5,000 free credits and 90-day full access. MyPass LMS credit-based pricing means you only pay for learning that gets done.',
            'canonical'   => route('pricing'),
        ];

        $plans = [
            [
                'name'     => 'Starter',
                'tagline'  => 'Perfect for small teams getting started',
                'price'    => 0,
                'period'   => 'month',
                'credits'  => '5,000 free credits included',
                'featured' => false,
                'ctaLabel' => 'Start Free Trial',
                'ctaUrl'   => config('services.lms_register_url', '#'),
                'ctaTarget'=> '_blank',
                'features' => [
                    'Up to 5,000 learning credits',
                    'AI-powered course creation',
                    'SCORM authoring built-in',
                    'Agentic AI assistant',
                    'Custom branding',
                    'Email support',
                ],
            ],
            [
                'name'     => 'Growth',
                'tagline'  => 'For growing teams with regular training needs',
                'price'    => 299,
                'period'   => 'month',
                'credits'  => '25,000 credits / month',
                'featured' => true,
                'ctaLabel' => 'Get Started',
                'ctaUrl'   => config('services.demo_url', '#'),
                'ctaTarget'=> '_blank',
                'features' => [
                    '25,000 learning credits / month',
                    'Everything in Starter',
                    'SSO / SAML login',
                    'API access',
                    'Advanced analytics',
                    'Chat + email support',
                    'ILT & live session scheduling',
                ],
            ],
            [
                'name'     => 'Enterprise',
                'tagline'  => 'Custom solutions for large organisations',
                'price'    => null,
                'period'   => null,
                'credits'  => 'Unlimited credits — custom volume',
                'featured' => false,
                'ctaLabel' => 'Talk to Sales',
                'ctaUrl'   => route('contact'),
                'ctaTarget'=> null,
                'features' => [
                    'Unlimited learning credits',
                    'Everything in Growth',
                    'Dedicated customer success manager',
                    'SLA guarantee',
                    'Custom integrations',
                    'White-label & multi-tenant',
                    'FedRAMP-authorized infrastructure',
                ],
            ],
        ];

        return view('pages.pricing', compact('seo', 'plans'));
    }
}
