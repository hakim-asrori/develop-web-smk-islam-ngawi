<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::resource('user', UserController::class, [
        'as' => 'web'
    ]);
});
