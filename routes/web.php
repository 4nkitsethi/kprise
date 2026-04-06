<?php
/**
 * MyPass LMS Theme — Web Routes
 * File: routes/web.php
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UseCaseController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LegalController;

/* ----------------------------------------------------------------
   Home
---------------------------------------------------------------- */
Route::get('/', [HomeController::class, 'index'])->name('home');

/* ----------------------------------------------------------------
   Pricing
---------------------------------------------------------------- */
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

/* ----------------------------------------------------------------
   About
---------------------------------------------------------------- */
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/company', [AboutController::class, 'company'])->name('company');
    Route::get('/platform', [AboutController::class, 'platform'])->name('platform');
    Route::get('/contact',  [AboutController::class, 'contact'])->name('contact');
});

// Contact shortcut
Route::get('/contact-us', [AboutController::class, 'contact'])->name('contact');

/* ----------------------------------------------------------------
   Use Cases
---------------------------------------------------------------- */
Route::prefix('use-cases')->name('use-cases.')->group(function () {
    Route::get('/onboarding',     [UseCaseController::class, 'onboarding'])->name('onboarding');
    Route::get('/sales',          [UseCaseController::class, 'sales'])->name('sales');
    Route::get('/employee',       [UseCaseController::class, 'employee'])->name('employee');
    Route::get('/cybersecurity',  [UseCaseController::class, 'cybersecurity'])->name('cybersecurity');
    Route::get('/partner',        [UseCaseController::class, 'partner'])->name('partner');
    Route::get('/compliance',     [UseCaseController::class, 'compliance'])->name('compliance');
});

/* ----------------------------------------------------------------
   Corporate Solutions
---------------------------------------------------------------- */
Route::prefix('solutions')->name('solutions.')->group(function () {
    Route::get('/enterprise',  [SolutionController::class, 'enterprise'])->name('enterprise');
    Route::get('/education',   [SolutionController::class, 'education'])->name('education');
});

/* ----------------------------------------------------------------
   Industries
---------------------------------------------------------------- */
Route::prefix('industries')->name('industries.')->group(function () {
    Route::get('/software',      [IndustryController::class, 'software'])->name('software');
    Route::get('/manufacturing', [IndustryController::class, 'manufacturing'])->name('manufacturing');
    Route::get('/healthcare',    [IndustryController::class, 'healthcare'])->name('healthcare');
    Route::get('/financial',     [IndustryController::class, 'financial'])->name('financial');
    Route::get('/consulting',    [IndustryController::class, 'consulting'])->name('consulting');
    Route::get('/nonprofit',     [IndustryController::class, 'nonprofit'])->name('nonprofit');
    Route::get('/retail',        [IndustryController::class, 'retail'])->name('retail');
});

/* ----------------------------------------------------------------
   Resources
---------------------------------------------------------------- */
Route::prefix('resources')->name('resources.')->group(function () {
    Route::get('/lms-comparisons', [ResourceController::class, 'lmsComparisons'])->name('lms-comparisons');
    Route::get('/insights',        [ResourceController::class, 'insights'])->name('insights');
    Route::get('/calculator',      [ResourceController::class, 'calculator'])->name('calculator');
    Route::get('/case-study',      [ResourceController::class, 'caseStudy'])->name('case-study');
});

/* ----------------------------------------------------------------
   Blog
---------------------------------------------------------------- */
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/',        [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}',  [BlogController::class, 'show'])->name('show');
});

/* ----------------------------------------------------------------
   Legal
---------------------------------------------------------------- */
Route::get('/terms',   [LegalController::class, 'terms'])->name('legal.terms');
Route::get('/privacy', [LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/site-map',[LegalController::class, 'sitemap'])->name('sitemap');

/* ----------------------------------------------------------------
   Contact Form POST
---------------------------------------------------------------- */
Route::post('/contact-us', [AboutController::class, 'submitContact'])->name('contact.submit');

/* ----------------------------------------------------------------
   XML Sitemap (for search engines)
---------------------------------------------------------------- */
use App\Http\Controllers\SitemapController;
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.xml');
