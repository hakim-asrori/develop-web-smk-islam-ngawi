<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::post('blog/update-status/{blog}', [BlogController::class, 'updateStatus'])->name('web.blog.update.status');
    Route::get('blog/delete-document/{document}/{id}', [BlogController::class, 'deleteDocument'])->name('web.blog.delete.document');
    Route::resource('blog', BlogController::class, [
        'as' => 'web'
    ]);
});
