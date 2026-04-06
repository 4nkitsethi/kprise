<?php
/**
 * HomeController
 * Supplies all homepage data: SEO, testimonials, logos, integrations, awards.
 */

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $seo = [
            'title'       => 'MyPass LMS — AI-Powered, Credit-Based Learning Platform | Kprise',
            'description' => 'MyPass LMS is an Agentic AI LMS that cuts admin work by 70% and replaces per-user pricing with flexible credits. Get 5,000 free credits + 90-day full access.',
            'keywords'    => 'LMS, AI LMS, learning management system, employee training, compliance training, SCORM, agentic AI, online training platform',
            'og_title'    => 'MyPass LMS — Stop Wasting Time on Training That Doesn\'t Get Done',
            'canonical'   => url('/'),
        ];

        $testimonials = [
            [
                'quote'   => 'We have been a Kprise client for over four years and Kprise has constantly been there to support our needs. I would highly recommend the LMS for smaller organisations.',
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
            [
                'quote'   => 'I\'m wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark.',
                'name'    => 'Raghu Nath',
                'role'    => 'President',
                'company' => 'E-Learning',
                'rating'  => 5,
            ],
            [
                'quote'   => 'Training 200 people used to feel impossible — so many moving parts, spreadsheets, emails, reminders. With MyPass, we launched training for 200+ employees in just one day.',
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
            [
                'quote'   => 'MyPass LMS is extremely customizable, and the team are very supportive in making the LMS your own. The system is very easy to navigate and complete the training.',
                'name'    => 'Ashleigh',
                'role'    => 'Senior Career and Learning Partner',
                'company' => 'United Arab Emirates',
                'rating'  => 5,
            ],
        ];

        $trustedLogos = [
            ['src' => asset('assets/images/logos/icf.png'),        'alt' => 'ICF',                      'width' => 198, 'height' => 100],
            ['src' => asset('assets/images/logos/pdk.png'),        'alt' => 'Phi Delta Kappan',          'width' => 197, 'height' => 100],
            ['src' => asset('assets/images/logos/sbca.png'),       'alt' => 'SBCA',                     'width' => 198, 'height' => 100],
            ['src' => asset('assets/images/logos/american-board.png'), 'alt' => 'American Board',       'width' => 199, 'height' => 100],
            ['src' => asset('assets/images/logos/pdk-intl.png'),   'alt' => 'PDK International',        'width' => 198, 'height' => 99],
            ['src' => asset('assets/images/logos/yfu.png'),        'alt' => 'Youth for Understanding',  'width' => 197, 'height' => 100],
            ['src' => asset('assets/images/logos/sia.png'),        'alt' => 'SIA',                      'width' => 199, 'height' => 99],
        ];

        $integrationLogos = [
            ['src' => asset('assets/images/integrations/zoom.png'),        'alt' => 'Zoom',           'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/ms-teams.png'),    'alt' => 'Microsoft Teams','width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/gotomeeting.png'), 'alt' => 'GoToMeeting',    'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/bamboohr.png'),    'alt' => 'BambooHR',       'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/talenthr.png'),    'alt' => 'TalentHR',       'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/bigbluebutton.png'),'alt' => 'BigBlueButton', 'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/salesforce.png'),  'alt' => 'Salesforce',     'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/okta.png'),        'alt' => 'Okta OneLogin',  'width' => 186, 'height' => 95],
            ['src' => asset('assets/images/integrations/google-cal.png'),  'alt' => 'Google Calendar','width' => 186, 'height' => 95],
        ];

        $awardBadges = [
            ['src' => asset('assets/images/awards/capterra.webp'),       'alt' => 'Capterra Best Value 2024',       'url' => 'https://www.capterra.com/'],
            ['src' => asset('assets/images/awards/getapp.webp'),         'alt' => 'GetApp Leaders 2024',            'url' => 'https://www.getapp.com/'],
            ['src' => asset('assets/images/awards/software-advice.webp'),'alt' => 'Software Advice Front Runners',  'url' => 'https://www.softwareadvice.com/'],
            ['src' => asset('assets/images/awards/best-lms.png'),        'alt' => 'Best LMS 2024',                  'url' => null],
            ['src' => asset('assets/images/awards/softwaresuggest.png'), 'alt' => 'SoftwareSuggest Highly Recommended', 'url' => 'https://www.softwaresuggest.com/'],
        ];

        return view('pages.home', compact(
            'seo',
            'testimonials',
            'trustedLogos',
            'integrationLogos',
            'awardBadges'
        ));
    }
}
