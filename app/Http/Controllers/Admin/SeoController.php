<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use App\Http\Requests\Admin\SeoSettingRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Admin\SeoController
 * Full CRUD for SEO settings per page.
 *
 * Routes (in routes/admin.php):
 *   GET    /admin/seo              → index
 *   GET    /admin/seo/create       → create
 *   POST   /admin/seo              → store
 *   GET    /admin/seo/{id}/edit    → edit
 *   PUT    /admin/seo/{id}         → update
 *   DELETE /admin/seo/{id}         → destroy
 *   POST   /admin/seo/{id}/toggle  → toggle active
 *   POST   /admin/seo/bulk-seed    → bulkSeed
 */
class SeoController extends Controller
{
    /**
     * All known routes in your app.
     * This is the master list used for bulk seeding and the "add page" dropdown.
     */
    private array $knownRoutes = [
        'home'                    => 'Homepage',
        'pricing'                 => 'Pricing',
        'about.company'           => 'About — Company Overview',
        'about.platform'          => 'About — Platform',
        'contact'                 => 'Contact Us',
        'use-cases.onboarding'    => 'Use Case — Onboarding Training',
        'use-cases.sales'         => 'Use Case — Sales Training',
        'use-cases.employee'      => 'Use Case — Employee Training',
        'use-cases.cybersecurity' => 'Use Case — Cybersecurity Training',
        'use-cases.partner'       => 'Use Case — Partner Training',
        'use-cases.compliance'    => 'Use Case — Compliance Training',
        'solutions.enterprise'    => 'Solution — Enterprise',
        'solutions.education'     => 'Solution — Educational Institutions',
        'industries.software'     => 'Industry — Software',
        'industries.manufacturing'=> 'Industry — Manufacturing',
        'industries.healthcare'   => 'Industry — Healthcare',
        'industries.financial'    => 'Industry — Financial Services',
        'industries.consulting'   => 'Industry — Consulting',
        'industries.nonprofit'    => 'Industry — Non-Profit',
        'industries.retail'       => 'Industry — Retail',
        'blog.index'              => 'Blog — Listing',
        'resources.lms-comparisons' => 'Resources — LMS Comparisons',
        'resources.insights'      => 'Resources — Learning Insights',
        'resources.calculator'    => 'Resources — Calculator',
        'resources.case-study'    => 'Resources — Case Study',
        'legal.terms'             => 'Legal — Terms & Conditions',
        'legal.privacy'           => 'Legal — Privacy Policy',
    ];

    /* ── Index ──────────────────────────────────────────────────── */

    public function index(Request $request): View
    {
        $query = SeoSetting::query();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('page_label', 'like', "%{$s}%")
                  ->orWhere('route_name', 'like', "%{$s}%")
                  ->orWhere('title', 'like', "%{$s}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $settings = $query->orderBy('page_label')->paginate(20)->withQueryString();

        // Routes not yet in DB — for the "Add missing pages" button
        $existingRoutes  = SeoSetting::pluck('route_name')->toArray();
        $unseededRoutes  = array_diff_key($this->knownRoutes, array_flip($existingRoutes));

        return view('admin.seo.index', compact('settings', 'unseededRoutes'));
    }

    /* ── Create ─────────────────────────────────────────────────── */

    public function create(): View
    {
        $existingRoutes = SeoSetting::pluck('route_name')->toArray();
        $availableRoutes = array_diff_key($this->knownRoutes, array_flip($existingRoutes));
        $setting = new SeoSetting();

        return view('admin.seo.form', compact('setting', 'availableRoutes'));
    }

    /* ── Store ──────────────────────────────────────────────────── */

    public function store(SeoSettingRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Auto-set page_label from known routes if not provided
        if (empty($data['page_label']) && isset($this->knownRoutes[$data['route_name']])) {
            $data['page_label'] = $this->knownRoutes[$data['route_name']];
        }

        SeoSetting::create($data);

        return redirect()
            ->route('admin.seo.index')
            ->with('success', "SEO settings for \"{$data['page_label']}\" created successfully.");
    }

    /* ── Edit ───────────────────────────────────────────────────── */

    public function edit($seo): View
    {
        $availableRoutes = $this->knownRoutes;
        $setting = SeoSetting::findOrFail($seo);
        \Log::info($seo);
        return view('admin.seo.form', compact('setting', 'availableRoutes'));
    }

    /* ── Update ─────────────────────────────────────────────────── */

    public function update(SeoSettingRequest $request, SeoSetting $seo): RedirectResponse
    {
        $seo->update($request->validated());

        return redirect()
            ->route('admin.seo.index')
            ->with('success', "SEO settings for \"{$seo->page_label}\" updated successfully.");
    }

    /* ── Destroy ────────────────────────────────────────────────── */

    public function destroy(SeoSetting $seo): RedirectResponse
    {
        $label = $seo->page_label;
        $seo->delete();

        return redirect()
            ->route('admin.seo.index')
            ->with('success', "SEO settings for \"{$label}\" deleted.");
    }

    /* ── Toggle active ──────────────────────────────────────────── */

    public function toggle(SeoSetting $seo): RedirectResponse
    {
        $seo->update(['is_active' => ! $seo->is_active]);
        $status = $seo->is_active ? 'activated' : 'deactivated';

        return back()->with('success', "\"{$seo->page_label}\" SEO {$status}.");
    }

    /* ── Bulk seed all known routes ─────────────────────────────── */

    public function bulkSeed(): RedirectResponse
    {
        $created = 0;
        foreach ($this->knownRoutes as $routeName => $label) {
            $existed = SeoSetting::firstOrCreate(
                ['route_name' => $routeName],
                ['page_label' => $label, 'is_active' => true]
            );
            if ($existed->wasRecentlyCreated) {
                $created++;
            }
        }

        SeoSetting::clearAllCache();

        return redirect()
            ->route('admin.seo.index')
            ->with('success', "{$created} new page(s) added to SEO manager.");
    }
}
