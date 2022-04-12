<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use App\Enums\JmartCategory;
use Illuminate\Support\Facades\Http;

class JmartParserService implements ParserInterface
{
    private string $url;
    private array $headers;

    public function __construct()
    {
//        $this->url = 'https://jmart.kz/gw/catalog/v1/products?category_id='.JmartCategory::LAPTOPS;
        $this->url = 'https://jmart.kz/gw/catalog/v1/products?category_id=597';
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ];
    }

    public function parseUrl()
    {
        $request = Http::withoutVerifying()
            ->withHeaders($this->headers)
            ->get($this->url);
//                'category_id' => JmartCategory::LAPTOPS,
//                'page' => 1
//            ]);

        $response = $request?->object();
        $status = $request ? $request->status() : 500;

        if ($response && $status === 200){
            $this->addProduct($response->data);
        }

        return null;
    }

    public function addProduct($data)
    {
        try {
            dd($data->products[0]->product);
        } catch (RequestException $exception) {
            return $exception;
        }
    }
}
