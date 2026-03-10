<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Notifications\Controllers\NotificationSettingsController;

Route::get('settings/notifications', [NotificationSettingsController::class, 'index'])->name('notifications.settings');
Route::post('settings/notifications', [NotificationSettingsController::class, 'update'])->name('notifications.update');
