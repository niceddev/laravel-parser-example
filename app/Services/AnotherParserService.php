<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class AnotherParserService implements ParserInterface
{
    private string $url = '';

    public function parseUrl()
    {
        try {
            $response = Http::withoutVerifying()->get($this->url);

            return $response->json();
        } catch (RequestException $exception) {
            return $exception;
        }
    }

    public function store()
    {

    }
}
