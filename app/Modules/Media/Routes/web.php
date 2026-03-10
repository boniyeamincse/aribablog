<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Media\Controllers\MediaUploadController;

Route::get('media', [MediaUploadController::class, 'index'])->name('media.index');
Route::post('media/upload', [MediaUploadController::class, 'upload'])->name('media.upload');
