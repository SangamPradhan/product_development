<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$key = $_ENV['GEMINI_API_KEY'];

$client = new GuzzleHttp\Client();
try {
    $res = $client->request('POST', "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:streamGenerateContent", [
        'headers' => [
            'x-goog-api-key' => $key,
            'Content-Type' => 'application/json'
        ],
        'json' => [
            'contents' => [
                ['role' => 'user', 'parts' => [['text' => 'Hello']]]
            ]
        ]
    ]);
    echo $res->getBody();
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
