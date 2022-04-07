<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use App\Models\Product;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class AnotherParserService2 implements ParserInterface
{
    private string $url = '';

    public function addProduct(Product $product)
    {
        try {
            $response = Http::withoutVerifying()->get($this->url);

            return $response->json();
        } catch (RequestException $exception) {
            return $exception;
        }
    }

    public function parseUrl()
    {
        // TODO: Implement parseUrl() method.
    }
}
