<?php

namespace App\Modules\Settings\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Settings\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of site settings.
     */
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('Settings::admin.index', compact('settings'));
    }

    /**
     * Update settings.
     */
    public function update(Request $request)
    {
        $settings = $request->except('_token');
        $group = $request->input('group', 'general');

        foreach ($settings as $key => $value) {
            if ($key === 'group') continue;
            Setting::set($key, $value, $group);
        }

        return back()->with('success', 'Settings updated successfully!');
    }
}
