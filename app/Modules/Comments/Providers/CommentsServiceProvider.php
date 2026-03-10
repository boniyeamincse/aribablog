<?php

namespace App\Modules\Comments\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CommentsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $moduleName = 'Comments';

        // Load Routes
        if (file_exists(__DIR__ . '/../Routes/web.php')) {
            Route::middleware('web')->group(__DIR__ . '/../Routes/web.php');
        }

        // Load Views
        if (is_dir(__DIR__ . '/../Views')) {
            $this->loadViewsFrom(__DIR__ . '/../Views', $moduleName);
        }
    }
}
