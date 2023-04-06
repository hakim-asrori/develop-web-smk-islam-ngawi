<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'can:admin'])->prefix('app')->group(function () {
    Route::resource('student', StudentController::class, [
        'as' => 'web'
    ]);
});
