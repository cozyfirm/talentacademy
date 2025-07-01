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
            $this->write('FirebaseChannel::send()', '8001', json_encode(['message' => "FMC Token unknown", 'receiver_token' => $notifiable->fcm_token, 'receiver_id' => $notifiable->id, 'receiver_name' => $notifiable->name ]));
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

            if (isset($response['name'])) $code = '0000';
            else $code = '8002';

            $this->write('FirebaseChannel::send()', $code, json_encode([
                'fcm_token' => $notifiable->fcm_token,
                'receiver_id' => $notifiable->id,
                'receiver_name' => $notifiable->name,
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
