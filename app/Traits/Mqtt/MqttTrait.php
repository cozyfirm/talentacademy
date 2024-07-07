<?php

namespace App\Traits\Mqtt;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\Facades\MQTT;

trait MqttTrait{

    /**
     * @return void
     * Get an IP ADDR from HTTP Request
     */
    public function publishMessage($topic, $code, $data, $uri = null): void{
        try{
            $message = [
                'code' => $code,
                'data' => $data,
                'uri' => $uri
            ];

            MQTT::publish($topic, json_encode($message, JSON_UNESCAPED_UNICODE ));
        }catch (\Exception $e){ throw $e; }
    }

    /**
     * @param $chat -> Topic
     * @param User | Auth $sender -> User object that sends message
     * @param $message -> Message
     * @return void
     */
    public function publishChatMessage($chat, User | Auth $sender, $message): void{
        try{
            $message = [
                'sender' => $sender,
                'message' => $message
            ];

            MQTT::publish($chat, json_encode($message, JSON_UNESCAPED_UNICODE ));
        }catch (\Exception $e){ throw $e; }
    }
}
