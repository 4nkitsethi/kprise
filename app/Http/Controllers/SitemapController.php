<?php
/**
 * XML Sitemap Controller
 * Add this route to web.php:
 *   Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.xml');
 */

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            // Priority 1.0
            ['loc' => route('home'),               'changefreq' => 'weekly',  'priority' => '1.0', 'lastmod' => now()->toDateString()],
            ['loc' => route('pricing'),            'changefreq' => 'monthly', 'priority' => '0.9', 'lastmod' => now()->toDateString()],

            // About
            ['loc' => route('about.company'),      'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('about.platform'),     'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('contact'),            'changefreq' => 'yearly',  'priority' => '0.6'],

            // Use Cases
            ['loc' => route('use-cases.onboarding'),   'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('use-cases.sales'),        'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('use-cases.employee'),     'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('use-cases.cybersecurity'),'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('use-cases.partner'),      'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('use-cases.compliance'),   'changefreq' => 'monthly', 'priority' => '0.8'],

            // Industries
            ['loc' => route('industries.software'),     'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('industries.manufacturing'),'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('industries.healthcare'),   'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('industries.financial'),    'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('industries.consulting'),   'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('industries.nonprofit'),    'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('industries.retail'),       'changefreq' => 'monthly', 'priority' => '0.7'],

            // Solutions
            ['loc' => route('solutions.enterprise'), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('solutions.education'),  'changefreq' => 'monthly', 'priority' => '0.8'],

            // Resources
            ['loc' => route('blog.index'),              'changefreq' => 'daily',   'priority' => '0.8'],
            ['loc' => route('resources.lms-comparisons'),'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('resources.insights'),       'changefreq' => 'monthly', 'priority' => '0.6'],
            ['loc' => route('resources.case-study'),     'changefreq' => 'monthly', 'priority' => '0.7'],
        ];

        // TODO: Add dynamic blog post URLs from DB:
        // Post::published()->each(fn($p) => $urls[] = ['loc' => route('blog.show', $p->slug), ...]);

        $content = view('sitemap.xml', compact('urls'))->render();

        return response($content, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
        ]);
    }
}
