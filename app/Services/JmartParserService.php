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
        $this->url = 'https://jmart.kz/gw/catalog/v1/products';
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
        $data = $dataset->products;
//        $product = array($data->product, $data->price, $data->image_url);

        foreach($data as $product){
            Product::create([
                'name' => $product->product,
                'price' => $product->base_price,
                'image_url' => $product->image_url,
                'category_id' => 1
            ]);
        }
    }
}
