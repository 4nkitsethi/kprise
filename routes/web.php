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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;
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
    Route::get('/employee-onboarding',  [SolutionController::class, 'employeeOnboarding'])->name('employee-onboarding');
    Route::get('/academic-education-institutions',  [SolutionController::class, 'academicEducationInstitutions'])->name('academic-education-institutions');
    Route::get('/continuous-learning-upskilling', [SolutionController::class, 'continuousLearningUpskilling'])->name('continuous-learning-upskilling');
    Route::get('/customer-training-education',   [SolutionController::class, 'customerTrainingEducation'])->name('customer-training-education');
    Route::get("/extended-enterprise-training", [SolutionController::class, 'extendedEnterpriseTraining'])->name('extended-enterprise-training'); 
    Route::get('/operational-process-training', [SolutionController::class, 'operationalProcessTraining'])->name('operational-process-training');
    Route::get('/partner-channel-training', [SolutionController::class, 'partnerChannelTraining'])->name('partner-channel-training');
    Route::get('/sales-enablement', [SolutionController::class, 'salesEnablement'])->name('sales-enablement');
    Route::get('/compliance-training', [SolutionController::class, 'complianceTraining'])->name('compliance-training');
    Route::get("/nonprofit-volunteer-training", [SolutionController::class, 'nonprofitVolunteerTraining'])->name('nonprofit-volunteer-training');
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
   Product
---------------------------------------------------------------- */
Route::prefix('product')->name('product.')->group(function () {
    Route::get('/features', [ProductController::class, 'features'])->name('features');
    Route::get('/integrations', [ProductController::class, 'integrations'])->name('integrations');
    Route::get('/ai-capabilities', [ProductController::class, 'aiCapabilities'])->name('ai-capabilities');
});



/* ----------------------------------------------------------------
   Company
---------------------------------------------------------------- */
Route::prefix('company')->name('company.')->group(function () {
    Route::get('/about', [CompanyController::class, 'about'])->name('about');
    Route::get('/contact', [CompanyController::class, 'contact'])->name('contact');
    Route::get('/careers', [CompanyController::class, 'careers'])->name('careers');
});


/**
 * ----------------------------------------------------------------
 * Additional Routes (e.g. contact form submission, sitemap, etc.)
 * Courses
 * 
 */
Route::get('/courses', [ProductController::class, 'courses'])->name('courses');
Route::view('/aws', 'pages.aws')->name('aws');



/* ----------------------------------------------------------------
   Resources
---------------------------------------------------------------- */
Route::prefix('resources')->name('resources.')->group(function () {
    Route::get('/lms-comparisons', [ResourceController::class, 'lmsComparisons'])->name('lms-comparisons');
    Route::get('/insights',        [ResourceController::class, 'insights'])->name('insights');
    Route::get('/calculator',      [ResourceController::class, 'calculator'])->name('calculator');
    Route::get('/case-study',      [ResourceController::class, 'caseStudy'])->name('case-study');
    Route::get('/help-center',      [ResourceController::class, 'helpCenter'])->name('help-center');
    Route::get('/blog',      [BlogController::class, 'index'])->name('blog');
    Route::get('blog/{slug}',  [BlogController::class, 'show'])->name('blog.show');
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
   Clear Caches (for development)
---------------------------------------------------------------- */
   Route::get('/clear-everything', function() {
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "All caches cleared!";
});



/* ----------------------------------------------------------------
   XML Sitemap (for search engines)
---------------------------------------------------------------- */
use App\Http\Controllers\SitemapController;
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.xml');
