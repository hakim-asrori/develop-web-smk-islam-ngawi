<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::resource('blog', BlogController::class, [
        'as' => 'web'
    ]);
});
