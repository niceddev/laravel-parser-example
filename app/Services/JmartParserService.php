<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class JmartParserService implements ParserInterface
{
    private string $url = 'https://jmart.kz/gw/catalog/v1/products?category_id=2879';

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
