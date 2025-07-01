<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessageNotification extends Notification{
    use Queueable;

    protected mixed $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($message){
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     * For chat messages, do not create database sample, only create push notification
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array{
        // return ['database', 'firebase'];
        return ['firebase'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array{
        return [
            'type' => 'message',
            'notification' => [
                'title' => $this->message->sender->name,
                'body' => substr($this->message->content, 0, 100),
                'content' => $this->message->content,
                'message_id' => $this->message->id,
                'chat' => $this->message->chat
            ],
            'sender_id' => $this->message->sender->id,
            'sender_name' => $this->message->sender->name,
        ];
    }

    /**
     * Get the array representation of the notification; Now we can access message using
     *
     *      - $message = $notification->toFirebase($notifiable);
     *
     * @param object $notifiable
     * @return array<string, mixed>
     */
    public function toFirebase(object $notifiable): array{
        return [
            'title' => $this->message->sender->name,
            'body' => strlen($this->message->content) > 100
                ? substr($this->message->content, 0, 100) . '...'
                : $this->message->content,
            'data' => [
                'type' => 'message',
                'message_id' => (string) ($this->message->id),
                'sender_id' => (string) ($this->message->sender->id),
                'chat' => json_encode($this->message->chat)
            ],
        ];
    }
}
