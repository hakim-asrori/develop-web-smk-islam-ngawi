<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CurriculumController;
use Illuminate\Support\Facades\Route;

includeRouteFiles(__DIR__ . "/app");

Route::get('curriculum/{id}/download', [CurriculumController::class, 'show'])->name('web.curriculum.download');

Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::get('/', AppController::class)->name('web.app.index');

    Route::resource('curriculum', CurriculumController::class, [
        'as' => 'web'
    ]);
});
