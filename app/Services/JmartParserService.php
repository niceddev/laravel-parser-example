<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use App\Entities\ParseProduct;
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
                foreach ($response->data->products as $data) {
                    $category = Category::whereAlias(Str::lower($categoryEnum->name))->firstOrFail();
                    $parseProduct = new ParseProduct($data->product, $data->base_price, $data->image_url,
                        $category->id);

                    $this->addProduct($parseProduct);
                }
            }
        }
    }

    public function addProduct(ParseProduct $parseProduct): Product
    {
        return Product::create($parseProduct->toArray());
    }
}
