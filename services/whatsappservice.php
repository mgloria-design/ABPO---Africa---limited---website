<?php

class WhatsAppService
{
    private string $apiVersion;
    private string $phoneNumberId;
    private string $accessToken;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/whatsapp.php';

        $this->apiVersion = $config['api_version'];
        $this->phoneNumberId = $config['phone_number_id'];
        $this->accessToken = $config['access_token'];
    }

    /**
     * Send a WhatsApp text message
     */
    public function sendTextMessage(
        string $recipient,
        string $message
    ): array {

        $url = sprintf(
            'https://graph.facebook.com/%s/%s/messages',
            $this->apiVersion,
            $this->phoneNumberId
        );

        $payload = [
            'messaging_product' => 'whatsapp',

            'to' => $recipient,

            'type' => 'text',

            'text' => [
                'preview_url' => false,
                'body' => $message
            ]
        ];

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_POST => true,

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->accessToken,
                'Content-Type: application/json'
            ],

            CURLOPT_POSTFIELDS => json_encode($payload),

            CURLOPT_TIMEOUT => 30
        ]);

        $response = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $curlError = curl_error($ch);

        curl_close($ch);

        if ($response === false) {
            return [
                'success' => false,
                'error' => $curlError
            ];
        }

        $decoded = json_decode($response, true);

        if ($httpCode >= 200 && $httpCode < 300) {
            return [
                'success' => true,
                'status_code' => $httpCode,
                'response' => $decoded
            ];
        }

        return [
            'success' => false,
            'status_code' => $httpCode,
            'response' => $decoded
        ];
    }
}