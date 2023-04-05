<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'can:admin'])->prefix('app')->group(function () {
    Route::put('user/change-role/{user}', [UserController::class, 'changeRole'])->name('web.user.change.role');
    Route::resource('user', UserController::class, [
        'as' => 'web'
    ]);
});
