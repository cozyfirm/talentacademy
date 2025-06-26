<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewInboxNotification extends Notification{
    use Queueable;

    protected mixed $inbox;

    /**
     * Create a new notification instance.
     */
    public function __construct($inbox){
        $this->inbox = $inbox;
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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage{
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array{
        return [
            'type' => 'inbox',
            'notification' => [
                'title' => $this->inbox->title,
                'body' => substr($this->inbox->content, 0, 100),
                'content' => $this->inbox->content,
                'inbox_to_id' => $this->inbox->id,
                'inbox_to' => $this->inbox->inbox_to
            ],
            'sender_id' => $this->inbox->sender->id,
            'sender_name' => $this->inbox->sender->name,
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
            'title' => $this->inbox->title,
            'body' => substr($this->inbox->content, 0, 100),
            'data' => [
                'type' => 'inbox',
                'inbox_to_id' => (string) ($this->inbox->id),
                'sender_id' => (string) ($this->inbox->sender->id),
                'inbox_to' => json_encode($this->inbox->inbox_to)
            ],
        ];
    }
}
