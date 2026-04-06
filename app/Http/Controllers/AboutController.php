<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function company(): View
    {
        return view('pages.about.company', [
            'seo' => [
                'title'       => 'About Kprise — Company Overview | MyPass LMS',
                'description' => 'Kprise is the team behind MyPass LMS, an AI-powered, credit-based learning management system trusted by organisations worldwide to automate training.',
                'canonical'   => route('about.company'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home',     'url' => route('home')],
                ['label' => 'About Us', 'url' => null],
                ['label' => 'Company Overview'],
            ],
            'pageHero' => [
                'label'   => 'About Kprise',
                'heading' => 'We Build Training Tools That Actually Get Used',
                'subtext' => 'Kprise was founded on one belief: training software should make your life easier, not harder. MyPass LMS is the result of years of listening to L&D teams, admins, and learners.',
            ],
        ]);
    }

    public function platform(): View
    {
        return view('pages.about.platform', [
            'seo' => [
                'title'       => 'About MyPass LMS Platform — Features & Architecture | Kprise',
                'description' => 'Learn about the MyPass LMS platform: Agentic AI, credit-based model, SCORM authoring, ILT scheduling, and enterprise-grade security.',
                'canonical'   => route('about.platform'),
            ],
            'breadcrumbs' => [
                ['label' => 'Home',     'url' => route('home')],
                ['label' => 'About Us', 'url' => null],
                ['label' => 'About Platform'],
            ],
            'pageHero' => [
                'label'   => 'The Platform',
                'heading' => 'Everything You Need. Nothing You Don\'t.',
                'subtext' => 'MyPass LMS is built around three principles: simplicity, automation, and results. Here\'s what\'s under the hood.',
            ],
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'seo' => [
                'title'       => 'Contact Us — Talk to the MyPass LMS Team | Kprise',
                'description' => 'Get in touch with the Kprise team. Book a demo, request a quote, or ask any question about MyPass LMS.',
                'canonical'   => route('contact'),
            ],
        ]);
    }

    public function submitContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:255',
            'company'    => 'nullable|string|max:255',
            'team_size'  => 'nullable|string|max:50',
            'message'    => 'nullable|string|max:2000',
        ]);

        // TODO: Send email notification (Mail::to(...)->send(new ContactFormMail($validated)))
        // TODO: Store in DB (ContactSubmission::create($validated))

        return redirect()
            ->route('contact')
            ->with('success', 'Thanks for reaching out! We\'ll be in touch within one business day.');
    }
}
