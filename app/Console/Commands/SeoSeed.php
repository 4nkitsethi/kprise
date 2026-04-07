<?php

namespace App\Console\Commands;

use App\Models\SeoSetting;
use Illuminate\Console\Command;

/**
 * php artisan seo:seed
 *
 * Seeds all known routes into the seo_settings table.
 * Safe to run multiple times — uses firstOrCreate (no duplicates).
 */
class SeoSeed extends Command
{
    protected $signature   = 'seo:seed {--force : Overwrite existing records}';
    protected $description = 'Seed all known pages into the SEO settings table';

    /**
     * Master list of all pages.
     * Add new routes here whenever you create a new page.
     */
    private array $pages = [
        // ── Main ─────────────────────────────────────────────────
        'home'                      => 'Homepage',
        'pricing'                   => 'Pricing',

        // ── About ─────────────────────────────────────────────────
        'about.company'             => 'About — Company Overview',
        'about.platform'            => 'About — Platform',
        'contact'                   => 'Contact Us',

        // ── Use Cases ─────────────────────────────────────────────
        'use-cases.onboarding'      => 'Use Case — Onboarding Training',
        'use-cases.sales'           => 'Use Case — Sales Training',
        'use-cases.employee'        => 'Use Case — Employee Training',
        'use-cases.cybersecurity'   => 'Use Case — Cybersecurity Training',
        'use-cases.partner'         => 'Use Case — Partner Training',
        'use-cases.compliance'      => 'Use Case — Compliance Training',

        // ── Solutions ─────────────────────────────────────────────
        'solutions.enterprise'      => 'Solution — Enterprise',
        'solutions.education'       => 'Solution — Educational Institutions',

        // ── Industries ────────────────────────────────────────────
        'industries.software'       => 'Industry — Software',
        'industries.manufacturing'  => 'Industry — Manufacturing',
        'industries.healthcare'     => 'Industry — Healthcare',
        'industries.financial'      => 'Industry — Financial Services',
        'industries.consulting'     => 'Industry — Consulting',
        'industries.nonprofit'      => 'Industry — Non-Profit',
        'industries.retail'         => 'Industry — Retail',

        // ── Resources ─────────────────────────────────────────────
        'blog.index'                => 'Blog — Listing',
        'resources.lms-comparisons' => 'Resources — LMS Comparisons',
        'resources.insights'        => 'Resources — Learning Insights Hub',
        'resources.calculator'      => 'Resources — Admin Burnout Calculator',
        'resources.case-study'      => 'Resources — Case Studies',

        // ── Legal ─────────────────────────────────────────────────
        'legal.terms'               => 'Legal — Terms & Conditions',
        'legal.privacy'             => 'Legal — Privacy Policy',
        'sitemap'                   => 'Sitemap (HTML)',
    ];

    public function handle(): int
    {
        $force   = $this->option('force');
        $created = 0;
        $skipped = 0;

        $this->info('Seeding SEO settings...');
        $this->newLine();

        foreach ($this->pages as $routeName => $label) {
            if ($force) {
                SeoSetting::updateOrCreate(
                    ['route_name' => $routeName],
                    ['page_label' => $label, 'is_active' => true]
                );
                $created++;
                $this->line("  <info>✓</info> {$label} ({$routeName})");
            } else {
                $record = SeoSetting::firstOrCreate(
                    ['route_name' => $routeName],
                    ['page_label' => $label, 'is_active' => true]
                );
                if ($record->wasRecentlyCreated) {
                    $created++;
                    $this->line("  <info>✓ Created:</info> {$label}");
                } else {
                    $skipped++;
                    $this->line("  <comment>– Skipped (exists):</comment> {$label}");
                }
            }
        }

        SeoSetting::clearAllCache();

        $this->newLine();
        $this->info("Done! Created: {$created} | Skipped: {$skipped}");
        $this->line('Visit <comment>/admin/seo</comment> to fill in meta tags for each page.');

        return self::SUCCESS;
    }
}
