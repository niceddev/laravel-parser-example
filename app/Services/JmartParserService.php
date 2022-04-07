<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use App\Models\Product;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class JmartParserService implements ParserInterface
{
    private string $url;
    private array $headers;

    public function __construct()
    {
        $this->url = 'https://jmart.kz/gw/catalog/v1/products?category_id=2879';
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

        $response = $request?->object()->data->products;
        $status = $request ? $request->status() : 500;

        if ($response && $status === 200){
            return collect($response);
        }

        return null;
    }

    public function addProduct(Product $product)
    {
//        try {
////            Product::create([
////                'name' => $product->name;
////            ]);
//            return dd($product);
//
//        } catch (RequestException $exception) {
//            return $exception;
//        }
    }
}
