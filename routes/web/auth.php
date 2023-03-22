<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::get('/logout', LogoutController::class)->name('web.auth.logout')->middleware('auth');

    Route::middleware(['guest'])->group(function () {
        Route::get('/', [LoginController::class, 'index'])->name('web.auth');
        Route::get('/login', [LoginController::class, 'index'])->name('web.auth.login');
        Route::post('/login', [LoginController::class, 'login'])->name('web.auth.login.process');
    });
});
