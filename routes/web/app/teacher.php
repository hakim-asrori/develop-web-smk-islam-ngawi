<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'can:admin'])->prefix('app')->group(function () {
    Route::resource('teacher', TeacherController::class, [
        'as' => 'web'
    ]);
});
