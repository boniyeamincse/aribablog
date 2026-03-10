<?php

namespace App\Modules\UserManagement\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class UserManagementServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $moduleName = 'UserManagement';

        // Load Routes
        if (file_exists(__DIR__ . '/../Routes/web.php')) {
            Route::middleware('web')
                ->group(__DIR__ . '/../Routes/web.php');
        }

        // Load Views
        if (is_dir(__DIR__ . '/../Views')) {
            $this->loadViewsFrom(__DIR__ . '/../Views', $moduleName);
        }
    }
}
