<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'can:admin'])->prefix('app')->group(function () {
    Route::resource('admin', AdminController::class, [
        'as' => 'web'
    ]);
});
