<?php

namespace App\Modules\Notifications\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class NotificationsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $moduleName = 'Notifications';

        // Load Routes
        if (file_exists(__DIR__ . '/../Routes/web.php')) {
            Route::middleware(['web', 'auth'])->group(__DIR__ . '/../Routes/web.php');
        }

        // Load Views
        if (is_dir(__DIR__ . '/../Views')) {
            $this->loadViewsFrom(__DIR__ . '/../Views', $moduleName);
        }
    }
}
