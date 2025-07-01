<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBlogPostNotification extends Notification{
    use Queueable;

    protected mixed $post;

    /**
     * Create a new notification instance.
     */
    public function __construct($post){
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array{
        return ['database', 'firebase'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array{
        return [
            'type' => 'blog',
            'notification' => [
                'title' => $this->post->title,
                'body' => substr($this->post->content, 0, 100),
                'content' => $this->post->content,
                'post_id' => $this->post->id
            ],
            'sender_id' => $this->post->sender->id,
            'sender_name' => $this->post->sender->name,
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
            'title' => $this->post->title,
            'body' => strlen($this->post->content) > 100
                ? substr($this->post->content, 0, 100) . '...'
                : $this->post->content,
            'data' => [
                'type' => 'blog',
                'inbox_to_id' => (string) ($this->post->id),
                'sender_id' => (string) ($this->post->sender->id),
                'post' => json_encode($this->post->post)
            ],
        ];
    }
}
