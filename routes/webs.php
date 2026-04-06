<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::view('/', 'pages.index');
Route::view('/pricing', 'pages.pricing');
Route::view('/lms-for-associations', 'pages.associations');
Route::get('/blogs', [PostController::class, 'blogs']);
Route::get('/blog-detail/{slug}', [PostController::class, 'blogDetail'])->name('blog.detail');
Route::view('/lms-comparisons', 'pages.lms-comparisons');
Route::view('/case-study', 'pages.case-study');
 