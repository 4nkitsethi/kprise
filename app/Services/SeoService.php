<?php

namespace App\Services;

use App\Models\SeoSetting;
use Illuminate\Support\Facades\Route;

/**
 * SeoService
 *
 * Resolves SEO data for any page from DB → fallback array.
 * Use this in every controller instead of manually building $seo arrays.
 *
 * Usage in controller:
 *   $seo = app(SeoService::class)->forPage('industries.software', [
 *       'title'       => 'LMS for Software Companies | MyPass LMS',
 *       'description' => 'Fallback description if nothing in DB.',
 *       'canonical'   => route('industries.software'),
 *   ]);
 */
class SeoService
{
    /**
     * Resolve SEO for a page.
     *
     * @param  string  $routeName  Laravel route name
     * @param  array   $defaults   Hard-coded fallbacks (your existing $seo arrays)
     * @return array               Ready to pass as $seo to any view
     */
    public function forPage(string $routeName, array $defaults = []): array
    {
        $setting = SeoSetting::forRoute($routeName);

        // If no DB record or inactive → use hard-coded defaults
        if (! $setting) {
            return $defaults;
        }

        return [
            // Core
            'title'       => $setting->title       ?? $defaults['title']       ?? config('app.name'),
            'description' => $setting->description ?? $defaults['description'] ?? '',
            'keywords'    => $setting->keywords     ?? $defaults['keywords']    ?? '',
            'robots'      => $setting->robots       ?? $defaults['robots']      ?? 'index, follow',
            'canonical'   => $setting->resolvedCanonical(),

            // Open Graph
            'og_title'       => $setting->resolvedOgTitle(),
            'og_description' => $setting->resolvedOgDescription(),
            'og_image'       => $setting->resolvedOgImage(),
            'og_type'        => $setting->og_type ?? 'website',

            // Twitter
            'twitter_card'        => $setting->twitter_card        ?? 'summary_large_image',
            'twitter_title'       => $setting->resolvedTwitterTitle(),
            'twitter_description' => $setting->resolvedTwitterDescription(),
            'twitter_image'       => $setting->resolvedTwitterImage(),
            'twitter_site'        => $setting->twitter_site ?? null,

            // Extras
            'published_at'    => $setting->published_at?->toIso8601String() ?? null,
            'custom_head_tags'=> $setting->custom_head_tags ?? null,

            // Pass the model so blade can check is_active etc.
            '_model' => $setting,
        ];
    }

    /**
     * Shortcut: auto-detect current route name.
     */
    public function forCurrentPage(array $defaults = []): array
    {
        return $this->forPage(
            Route::currentRouteName() ?? 'unknown',
            $defaults
        );
    }

    /**
     * Return all pages registered in seo_settings for the admin index.
     */
    public function allPages(): \Illuminate\Database\Eloquent\Collection
    {
        return SeoSetting::orderBy('page_label')->get();
    }

    /**
     * Pre-seed all known routes into seo_settings table.
     * Run once via: php artisan seo:seed
     */
    public function seedRoutes(array $routes): void
    {
        foreach ($routes as $routeName => $label) {
            SeoSetting::firstOrCreate(
                ['route_name' => $routeName],
                ['page_label' => $label, 'is_active' => true]
            );
        }
    }
}
