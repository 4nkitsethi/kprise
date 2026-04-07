<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration: create_seo_settings_table
 *
 * Run:  php artisan migrate
 * Roll: php artisan migrate:rollback
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();

            // ── Page identifier ───────────────────────────────────────────
            // Unique key per page, e.g. 'home', 'pricing', 'industries.software'
            // Matches your route names so you can look up by route name automatically
            $table->string('route_name')->unique()->index()
                  ->comment('Laravel route name, e.g. home / industries.software');

            $table->string('page_label')
                  ->comment('Human-readable label shown in admin, e.g. Homepage');

            // ── Core SEO ──────────────────────────────────────────────────
            $table->string('title', 70)->nullable()
                  ->comment('Page <title>. Ideal: 50–60 chars');

            $table->string('description', 165)->nullable()
                  ->comment('Meta description. Ideal: 120–155 chars');

            $table->string('keywords', 500)->nullable()
                  ->comment('Comma-separated keywords (minor ranking signal)');

            $table->string('canonical_url', 500)->nullable()
                  ->comment('Override canonical URL. Leave blank to use current URL');

            $table->enum('robots', ['index, follow', 'noindex, follow', 'index, nofollow', 'noindex, nofollow'])
                  ->default('index, follow');

            // ── Open Graph ────────────────────────────────────────────────
            $table->string('og_title', 95)->nullable()
                  ->comment('OG title. Falls back to title if blank');

            $table->string('og_description', 200)->nullable()
                  ->comment('OG description. Falls back to description if blank');

            $table->string('og_image', 500)->nullable()
                  ->comment('Absolute URL or path to OG image (1200×630px recommended)');

            $table->enum('og_type', ['website', 'article', 'product'])
                  ->default('website');

            // ── Twitter Card ──────────────────────────────────────────────
            $table->string('twitter_card', 30)->default('summary_large_image');

            $table->string('twitter_title', 70)->nullable()
                  ->comment('Falls back to og_title → title');

            $table->string('twitter_description', 200)->nullable()
                  ->comment('Falls back to og_description → description');

            $table->string('twitter_image', 500)->nullable()
                  ->comment('Falls back to og_image');

            $table->string('twitter_site', 50)->nullable()
                  ->comment('@handle of the site Twitter account');

            // ── Article / Blog extras ─────────────────────────────────────
            $table->timestamp('published_at')->nullable()
                  ->comment('For article og:type — article:published_time');

            // ── Custom head injection ─────────────────────────────────────
            $table->text('custom_head_tags')->nullable()
                  ->comment('Raw HTML injected inside <head> — schema JSON-LD, etc.');

            // ── Status ────────────────────────────────────────────────────
            $table->boolean('is_active')->default(true)
                  ->comment('If false, layout falls back to hard-coded defaults');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};
