<?php

namespace App\Modules\Notifications\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Notifications\Models\NotificationPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationSettingsController extends Controller
{
    /**
     * Display a listing of personal notification settings.
     */
    public function index()
    {
        $user = Auth::user();
        $preferences = NotificationPreference::where('user_id', $user->id)->get();
        
        // Default notification types and channels
        $types = ['new_comment', 'post_published', 'newsletter'];
        $channels = ['mail', 'database', 'broadcast'];

        return view('Notifications::settings', compact('preferences', 'types', 'channels'));
    }

    /**
     * Update user notification preferences.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $prefs = $request->input('prefs', []);

        // Logic to sync preferences
        foreach ($request->input('types', []) as $type) {
            foreach ($request->input('channels', []) as $channel) {
                $isEnabled = isset($prefs[$type][$channel]);
                
                NotificationPreference::updateOrCreate(
                    ['user_id' => $user->id, 'notification_type' => $type, 'channel' => $channel],
                    ['is_enabled' => $isEnabled]
                );
            }
        }

        return back()->with('success', 'Preferences updated successfully!');
    }
}
