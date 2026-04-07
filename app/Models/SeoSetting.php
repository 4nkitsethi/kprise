<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Cache;

/**
 * SeoSetting Model
 *
 * One row per page/route. Cached automatically.
 *
 * @property int         $id
 * @property string      $route_name
 * @property string      $page_label
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 * @property string|null $canonical_url
 * @property string      $robots
 * @property string|null $og_title
 * @property string|null $og_description
 * @property string|null $og_image
 * @property string      $og_type
 * @property string      $twitter_card
 * @property string|null $twitter_title
 * @property string|null $twitter_description
 * @property string|null $twitter_image
 * @property string|null $twitter_site
 * @property string|null $custom_head_tags
 * @property bool        $is_active
 */
class SeoSetting extends Model
{
    protected $fillable = [
        'route_name',
        'page_label',
        'title',
        'description',
        'keywords',
        'canonical_url',
        'robots',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'twitter_site',
        'published_at',
        'custom_head_tags',
        'is_active',
    ];

    protected $casts = [
        'is_active'    => 'boolean',
        'published_at' => 'datetime',
    ];

    /* ──────────────────────────────────────────────────────────────
       Cache helpers
    ────────────────────────────────────────────────────────────── */

    /** Cache TTL in seconds (1 hour) */
    const CACHE_TTL = 3600;

    /** Cache key prefix */
    const CACHE_KEY = 'seo_setting_';

    /**
     * Fetch SEO settings for a route name, with caching.
     * Falls back to null if not found or inactive.
     */
    public static function forRoute(string $routeName): ?self
    {
        return Cache::remember(
            self::CACHE_KEY . $routeName,
            self::CACHE_TTL,
            fn () => self::where('route_name', $routeName)
                         ->where('is_active', true)
                         ->first()
        );
    }

    /**
     * Clear the cache for a specific route.
     * Called automatically on save/delete.
     */
    public static function clearCache(string $routeName): void
    {
        Cache::forget(self::CACHE_KEY . $routeName);
    }

    /**
     * Clear ALL seo caches (useful for bulk operations).
     */
    public static function clearAllCache(): void
    {
        // If using Redis/Memcached with tags:
        // Cache::tags('seo')->flush();
        // For file cache — clear by iterating known routes:
        self::pluck('route_name')->each(fn ($r) => self::clearCache($r));
    }

    /* ──────────────────────────────────────────────────────────────
       Auto-clear cache on model events
    ────────────────────────────────────────────────────────────── */

    protected static function booted(): void
    {
        static::saved(fn (self $m)   => self::clearCache($m->route_name));
        static::deleted(fn (self $m) => self::clearCache($m->route_name));
    }

    /* ──────────────────────────────────────────────────────────────
       Resolved accessors (with fallback chains)
    ────────────────────────────────────────────────────────────── */

    /**
     * Resolved OG title: og_title → title → app name
     */
    public function resolvedOgTitle(): string
    {
        return $this->og_title ?? $this->title ?? config('app.name');
    }

    /**
     * Resolved OG description: og_description → description → ''
     */
    public function resolvedOgDescription(): string
    {
        return $this->og_description ?? $this->description ?? '';
    }

    /**
     * Resolved Twitter title: twitter_title → og_title → title
     */
    public function resolvedTwitterTitle(): string
    {
        return $this->twitter_title ?? $this->resolvedOgTitle();
    }

    /**
     * Resolved Twitter description: twitter_description → og_description → description
     */
    public function resolvedTwitterDescription(): string
    {
        return $this->twitter_description ?? $this->resolvedOgDescription();
    }

    /**
     * Resolved Twitter image: twitter_image → og_image → default OG image
     */
    public function resolvedTwitterImage(): string
    {
        return $this->twitter_image
            ?? $this->og_image
            ?? asset('assets/images/og-default.png');
    }

    /**
     * Resolved OG image with default fallback
     */
    public function resolvedOgImage(): string
    {
        return $this->og_image ?? asset('assets/images/og-default.png');
    }

    /**
     * Resolved canonical URL: canonical_url → current URL
     */
    public function resolvedCanonical(): string
    {
        return $this->canonical_url ?? url()->current();
    }

    /* ──────────────────────────────────────────────────────────────
       Character count helpers (used in admin UI)
    ────────────────────────────────────────────────────────────── */

    public function titleLength(): int
    {
        return mb_strlen($this->title ?? '');
    }

    public function descriptionLength(): int
    {
        return mb_strlen($this->description ?? '');
    }

    /* ──────────────────────────────────────────────────────────────
       Scopes
    ────────────────────────────────────────────────────────────── */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
