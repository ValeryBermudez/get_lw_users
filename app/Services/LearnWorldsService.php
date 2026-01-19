<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class LearnWorldsService
{
    protected $client;
    protected $baseUrl;
    protected $token;
    protected $clientId;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = "https://lmsdoctor.learnworlds.com/admin/api/v2";
        $this->token = env('LEARNWORLDS_ACCESS_TOKEN');
        $this->clientId = env('LEARNWORLDS_CLIENT_ID');
    }

    public function getAllUsers($params = [])
    {
        try {
            $response = $this->client->get("{$this->baseUrl}/users", [
                'headers' => [
                    'Authorization' => "Bearer {$this->token}",
                    'Lw-Client' => $this->clientId,
                    'Accept' => 'application/json',
                ],
                'query' => $params,
                'verify' => false,
            ]);

            return json_decode($response->getBody(), true);
            
        } catch (RequestException $e) {
            return ['error' => 'Error al obtener usuarios', 'message' => $e->getMessage()];
        }
    }
}