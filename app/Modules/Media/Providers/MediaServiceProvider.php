<?php

namespace App\Modules\Media\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class MediaServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $moduleName = 'Media';

        // Load Routes
        if (file_exists(__DIR__ . '/../Routes/web.php')) {
            Route::middleware(['web', 'auth'])
                ->prefix('admin')
                ->group(__DIR__ . '/../Routes/web.php');
        }

        // Load Views
        if (is_dir(__DIR__ . '/../Views')) {
            $this->loadViewsFrom(__DIR__ . '/../Views', $moduleName);
        }
    }
}
