<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use App\Models\Product;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class JmartParserService implements ParserInterface
{
    protected $url;

    public function __construct()
    {
        $this->url = 'https://jmart.kz/gw/catalog/v1/products?category_id=2879';
    }

    public function parseUrl()
    {
        $request = Http::withoutVerifying()->get($this->url);

        $response = $request?->body();
        $status = $request ? $request->status() : 500;

        if ($response && $status === 200){
            return $response;
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
