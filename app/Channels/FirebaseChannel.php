<?php
namespace App\Channels;

use App\Traits\Common\LogTrait;
use Illuminate\Notifications\Notification;
use App\Services\FirebaseNotificationService;

class FirebaseChannel{
    use LogTrait;

    public function send($notifiable, Notification $notification): void{
        /* Skip if fcm_token is unknown */
        if (!$notifiable->fcm_token) { return; }

        $fcm = new FirebaseNotificationService();
        $message = $notification->toFirebase($notifiable);

        try {
            $response = $fcm->sendToDevice(
                $notifiable->fcm_token,
                $message['title'],
                $message['body'],
                $message['data'] ?? []
            );

            if (isset($response['name']))$this->write('Notifications: FirebaseChannel::send()', '0000', json_encode($response));
            else $this->write('FirebaseChannel::send()', '8001', json_encode($response));

        } catch (\Throwable $e) {
            $this->write('FirebaseChannel::send()', '8000', $e->getMessage());
        }
    }
}
