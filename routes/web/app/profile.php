<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('app/profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('web.profile.index');
    Route::put('/change-password/{user}', [ProfileController::class, 'changePassword'])->name('web.profile.change.password');
    Route::put('/{user}', [ProfileController::class, 'update'])->name('web.profile.update');
});
