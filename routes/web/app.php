<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

includeRouteFiles(__DIR__ . "/app");

Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::get('/', AppController::class)->name('web.app.index');
});
