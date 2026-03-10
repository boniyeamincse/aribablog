<?php

use App\Modules\Settings\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Get or set setting value.
     */
    function setting($key, $default = null)
    {
        return Setting::get($key, $default);
    }
}
