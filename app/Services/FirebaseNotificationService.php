<?php

namespace App\Services;

use App\Traits\Common\LogTrait;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Illuminate\Support\Facades\Http;

class FirebaseNotificationService{
    use LogTrait;

    protected string $credentialsPath;
    protected mixed $projectId;

    /**
     *  Get Auth info from files
     */
    public function __construct(){
        $this->credentialsPath = base_path(env('FIREBASE_CREDENTIALS'));
        $this->projectId = env('FIREBASE_PROJECT_ID');
    }

    /**
     * Get access token
     * @return mixed
     */
    protected function getAccessToken(){
        $scopes = ['https://www.googleapis.com/auth/firebase.messaging'];
        $credentials = new ServiceAccountCredentials($scopes, $this->credentialsPath);

        return $credentials->fetchAuthToken()['access_token'];
    }

    /**
     * Send notification to device
     *
     * @param string $deviceToken
     * @param string $title
     * @param string $body
     * @param array $data
     * @return array|mixed
     */
    public function sendToDevice(string $deviceToken, string $title, string $body, array $data = []): mixed{
        try{
            $accessToken = $this->getAccessToken();

            $url = "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send";

            $payload = [
                'message' => [
                    'token' => $deviceToken,
                    'notification' => [
                        'title' => $title,
                        'body' => $body,
                    ],
                    'data' => $data,
                ]
            ];

            $response = Http::withToken($accessToken)
                ->post($url, $payload);
            return $response->json();
        }catch (\Exception $e){
            $this->write('API: FirebaseNotificationService::sendToDevice()', $e->getCode(), $e->getMessage());
        }
    }
}
