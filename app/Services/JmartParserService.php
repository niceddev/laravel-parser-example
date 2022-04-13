<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use App\Enums\JmartCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class JmartParserService implements ParserInterface
{
    private string $url;
    private array $headers;

    public function __construct()
    {
        $this->url = 'https://jmart.kz/gw/catalog/v1/products?category_id=597';
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ];
    }

    public function parseUrl()
    {
        foreach (JmartCategory::cases() as $categoryId){
            $request = Http::withoutVerifying()
                ->withHeaders($this->headers)
                ->get($this->url, [
                    'category_id' => $categoryId->value,
//                'page' => 1
                ]);
            $response = $request?->object();
            $status = $request ? $request->status() : 500;

            if ($response && $status === 200){
                $this->addProduct($response->data);
            }
        }
    }

    public function addProduct($dataset)
    {
        $data = $dataset->products[0];
        $product = array($data->product, $data->price, $data->image_url);

//        dd($product);
        Product::create([
            'name' => $data->product,
            'price' => $data->price,
            'image_url' => $data->image_url,
            'category_id' => 1
        ]);
    }
}
