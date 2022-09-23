<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Integration
{
    private function getResponseURI($url, $userAgent, $accessKey)
    {
        $response = Http::withHeaders([
            'User-Agent' => $userAgent,
            'AccessKey' => $accessKey
        ])->get($url);
        if ($response->ok()) {
            return $response->json();
        }
        if ($response->failed()) {
            return "failed";
        }
        if ($response->serverError()) {
            return "server error";
        }
        if ($response->clientError()) {
            return "client error";
        }
    }

    private function postResponseURI($url, $userAgent, $accessKey)
    {
        $response = Http::withHeaders([
            'User-Agent' => $userAgent,
            'AccessKey' => $accessKey
        ])->post($url);
        if ($response->ok()) {
            return $response->json();
        }
        if ($response->failed()) {
            return "failed";
        }
        if ($response->serverError()) {
            return "server error";
        }
        if ($response->clientError()) {
            return "client error";
        }
    }

    public function getIntegrating($url, $params, $userAgent, $accessKey)
    {
        $response = $this->getResponseURI(
            $url . $params,
            $userAgent,
            $accessKey
        );
        return $response;
    }

    public function postIntegrating($url, $params, $userAgent, $accessKey)
    {
        $response = $this->postResponseURI(
            $url . $params,
            $userAgent,
            $accessKey
        );
        return $response;
    }
}
