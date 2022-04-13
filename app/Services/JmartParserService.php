<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use App\Enums\JmartCategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
        foreach (JmartCategory::cases() as $categoryEnum) {
            $request = Http::withoutVerifying()
                ->withHeaders($this->headers)
                ->get($this->url, [
                    'category_id' => $categoryEnum->value,
                ]);
            $response = $request?->object();
            $status = $request ? $request->status() : 500;

            if ($response && $status === 200) {
                $this->addProduct($response->data, $categoryEnum->name);
            }
        }
    }

    public function addProduct($dataset, string $alias)
    {
        $category = Category::whereAlias(Str::lower($alias))->firstOrFail();

        $data = $dataset->products;

        foreach ($data as $product) {
            Product::create([
                'name'        => $product->product,
                'price'       => $product->base_price,
                'image_url'   => $product->image_url,
                'category_id' => $category->id
            ]);
        }
    }
}
