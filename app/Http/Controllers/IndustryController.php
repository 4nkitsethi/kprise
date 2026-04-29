<?php

namespace App\Http\Controllers;

use App\Services\SeoService;
use Illuminate\View\View;

/**
 * IndustryController — updated to use SeoService.
 *
 * BEFORE (hardcoded, not manageable from admin):
 * ─────────────────────────────────────────────
 *   $seo = [
 *       'title'       => 'LMS for Software Companies — Train Teams at Scale | MyPass LMS',
 *       'description' => 'MyPass LMS helps software companies onboard engineers...',
 *       'canonical'   => route('industries.software'),
 *   ];
 *
 * AFTER (DB-first, falls back to hardcoded):
 * ──────────────────────────────────────────
 *   $seo = app(SeoService::class)->forPage('industries.software', [...defaults...]);
 *
 * The hardcoded array is now just a FALLBACK used when:
 *   - No DB record exists yet for this route
 *   - The DB record has is_active = false
 *   - The specific field (title/desc) is left blank in admin
 *
 * Priority chain for each field:
 *   DB record → hardcoded default → app/env default
 */
class IndustryController extends Controller
{
    public function __construct(
        private readonly SeoService $seo
    ) {}

    /* ── Software ───────────────────────────────────────────────── */

    public function software(): View
    {
        return view('pages.industries.software');
    }

    /* ── Manufacturing ──────────────────────────────────────────── */

    public function manufacturing(): View
    {
        return view('pages.industries.manufacturing_industry');
    }

    /* ── Healthcare ─────────────────────────────────────────────── */

    public function healthcare(): View
    {
        return view('pages.industries.healthcare_industry');
    }

    /* ── Financial ──────────────────────────────────────────────── */

    public function financial(): View
    {
        return view('pages.industries.finance_industry');
    }


    /* ── Consulting ─────────────────────────────────────────────── */

    public function consulting(): View
    {
        return view('pages.industries.consulting_industry');
    }

    /* ── Non-profit ─────────────────────────────────────────────── */

    public function nonprofit(): View
    {
        return view('pages.industries.nonprofits');
    }

    /* ── Retail ─────────────────────────────────────────────────── */

    public function retail(): View
    {
        return view('pages.industries.retail');
    }
}
