<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Settings\Controllers\AdminSettingsController;

Route::prefix('admin/settings')->name('admin.settings.')->group(function () {
    Route::get('/', [AdminSettingsController::class, 'index'])->name('index');
    Route::post('/update', [AdminSettingsController::class, 'update'])->name('update');
});
