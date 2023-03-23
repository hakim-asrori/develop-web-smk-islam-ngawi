<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::resource('gallery', GalleryController::class, [
        'as' => 'web'
    ]);
});
