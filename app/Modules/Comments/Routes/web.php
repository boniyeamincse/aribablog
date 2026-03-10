<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Comments\Controllers\CommentController;

Route::middleware('auth')->group(function () {
    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
});
