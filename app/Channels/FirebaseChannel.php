<?php
namespace App\Channels;

use App\Traits\Common\LogTrait;
use Illuminate\Notifications\Notification;
use App\Services\FirebaseNotificationService;

class FirebaseChannel{
    use LogTrait;

    public function send($notifiable, Notification $notification): void{
        /* Skip if fcm_token is unknown */
        if (!$notifiable->fcm_token) {
            $this->write('FirebaseChannel::send()', '8001', "No token to sent");
            return;
        }

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
            else $this->write('FirebaseChannel::send()', '8002', json_encode([
                'fcm_token' => $notifiable->fcm_token,
                'title' => $message['title'],
                'body' => $message['body'],
                'data' => $message['data'],
                'response' => $response
            ]));

        } catch (\Throwable $e) {
            $this->write('FirebaseChannel::send()', '8000', $e->getMessage());
        }
    }
}
