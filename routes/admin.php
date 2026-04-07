<?php

/**
 * routes/admin.php
 *
 * Register this file in bootstrap/app.php (Laravel 11) or RouteServiceProvider (L10):
 *
 * Laravel 11 — in bootstrap/app.php:
 *   ->withRouting(
 *       web: __DIR__.'/../routes/web.php',
 *       then: function () {
 *           Route::middleware(['web', 'auth', 'admin'])
 *                ->prefix('admin')
 *                ->name('admin.')
 *                ->group(base_path('routes/admin.php'));
 *       }
 *   )
 *
 * Laravel 10 — in RouteServiceProvider.php boot():
 *   Route::middleware(['web', 'auth', 'admin'])
 *        ->prefix('admin')
 *        ->name('admin.')
 *        ->group(base_path('routes/admin.php'));
 */

use App\Http\Controllers\Admin\SeoController;
use Illuminate\Support\Facades\Route;

/* ── SEO Manager ───────────────────────────────────────────────── */
Route::prefix('seo')->name('seo.')->group(function () {

    Route::get('/',           [SeoController::class, 'index'])    ->name('index');
    Route::get('/create',     [SeoController::class, 'create'])   ->name('create');
    Route::post('/',          [SeoController::class, 'store'])    ->name('store');
    Route::get('/{seo}/edit', [SeoController::class, 'edit'])     ->name('edit');
    Route::put('/{seo}',      [SeoController::class, 'update'])   ->name('update');
    Route::delete('/{seo}',   [SeoController::class, 'destroy'])  ->name('destroy');

    // Toggle active/inactive
    Route::post('/{seo}/toggle', [SeoController::class, 'toggle'])->name('toggle');

    // Seed all known routes at once
    Route::post('/bulk-seed', [SeoController::class, 'bulkSeed'])->name('bulk-seed');

});
