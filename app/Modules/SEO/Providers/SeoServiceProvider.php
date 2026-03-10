<?php

namespace App\Modules\SEO\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;

class SeoServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $moduleName = 'SEO';

        // Load Routes
        if (file_exists(__DIR__ . '/../Routes/web.php')) {
            Route::middleware('web')->group(__DIR__ . '/../Routes/web.php');
        }

        // Load Views
        if (is_dir(__DIR__ . '/../Views')) {
            $this->loadViewsFrom(__DIR__ . '/../Views', $moduleName);
        }

        // Register Blade Components
        Blade::component('SEO::components.meta', 'seo-meta');
    }
}
