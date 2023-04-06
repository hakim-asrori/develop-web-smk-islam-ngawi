<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('web.home');
Route::get('/blog', [LandingController::class, 'blog'])->name('web.blog');
Route::get('/blog/{slug}', [LandingController::class, 'blogDetail'])->name('web.blog.detail');
Route::get('/curriculums', [LandingController::class, 'curriculums'])->name('web.curriculums');
Route::post('/contact', [ContactController::class, 'store'])->name('web.contact.store');
Route::get('/laravel-version', function () {
    return view('welcome');
});

includeRouteFiles(__DIR__ . "/web");
