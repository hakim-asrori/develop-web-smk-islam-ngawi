<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'can:admin'])->prefix('app/contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('web.contact.index');
    Route::get('/{id}', [ContactController::class, 'show'])->name('web.contact.show');
    Route::delete('/{id}', [ContactController::class, 'destroy'])->name('web.contact.destroy');
});
