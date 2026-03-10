<?php

namespace App\Modules\Notifications\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class NotificationPreference extends Model
{
    protected $fillable = [
        'user_id',
        'notification_type',
        'channel',
        'is_enabled',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    /**
     * Get the user that owns the preference.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
