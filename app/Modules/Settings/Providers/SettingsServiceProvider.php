<?php

namespace App\Modules\Settings\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Settings\Models\Setting;
use Illuminate\Support\Facades\Config;

class SettingsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $moduleName = 'Settings';

        // Load Routes
        if (file_exists(__DIR__ . '/../Routes/web.php')) {
            Route::middleware(['web', 'auth'])->group(__DIR__ . '/../Routes/web.php');
        }

        // Load Views
        if (is_dir(__DIR__ . '/../Views')) {
            $this->loadViewsFrom(__DIR__ . '/../Views', $moduleName);
        }

        // Override Mail Config from Database if available
        $this->overrideMailConfig();
    }

    public function register(): void
    {
        // Register Global Helper
        require_once __DIR__ . '/../Helpers/settings_helper.php';
    }

    protected function overrideMailConfig()
    {
        try {
            if ($this->app->runningInConsole() || !Schema::hasTable('settings')) {
                return;
            }

            $mailSettings = Setting::where('group', 'email')->get();
            if ($mailSettings->isNotEmpty()) {
                $config = [
                    'transport' => Setting::get('mail_mailer', config('mail.default')),
                    'host'      => Setting::get('mail_host', config('mail.mailers.smtp.host')),
                    'port'      => Setting::get('mail_port', config('mail.mailers.smtp.port')),
                    'username'  => Setting::get('mail_username', config('mail.mailers.smtp.username')),
                    'password'  => Setting::get('mail_password', config('mail.mailers.smtp.password')),
                    'from'      => [
                        'address' => Setting::get('mail_from_address', config('mail.from.address')),
                        'name'    => Setting::get('mail_from_name', config('mail.from.name')),
                    ],
                ];
                Config::set('mail.mailers.smtp', array_merge(config('mail.mailers.smtp'), $config));
                Config::set('mail.from', $config['from']);
            }
        } catch (\Exception $e) {
            // Table might not exist yet during migration
        }
    }
}
