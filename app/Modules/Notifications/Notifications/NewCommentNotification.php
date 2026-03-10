<?php

namespace App\Modules\Notifications\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Modules\Notifications\Models\NotificationPreference;

class NewCommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $comment;

    /**
     * Create a new notification instance.
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     * Use user preferences to determine channels.
     */
    public function via(object $notifiable): array
    {
        $channels = ['database']; // Always store in DB by default
        
        $preferences = NotificationPreference::where('user_id', $notifiable->id)
            ->where('notification_type', 'new_comment')
            ->where('is_enabled', true)
            ->pluck('channel')
            ->toArray();

        return array_unique(array_merge($channels, $preferences));
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New Comment on Abriba')
                    ->line('Someone commented on your post.')
                    ->action('View Comment', url('/'))
                    ->line('Thank you for being part of Abriba!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'comment_id' => $this->comment->id,
            'message' => 'New comment received.',
        ];
    }
}
