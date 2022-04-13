<?php

namespace App\Services;

use App\Entities\ParseProduct;
use App\Enums\JmartCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class JmartParserService extends ParserService
{
    private array $headers;

    public function __construct()
    {
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ];
    }

    public function parseUrl()
    {
        foreach (JmartCategory::cases() as $categoryEnum) {
            $this->parsePages($categoryEnum);
        }
    }

    public function parsePages($categoryEnum, int $page = 1)
    {
        $request = Http::withoutVerifying()
            ->withHeaders($this->headers)
            ->get(sprintf('%s&page=%s', $categoryEnum->value, $page));

        $response = $request?->object();
        $status = $request ? $request->status() : 500;
        $category = Category::whereAlias(Str::lower($categoryEnum->name))->firstOrFail();

        if ($response && $status === 200) {
            $totalPage = (int) ceil($response->data->total_pages / $response->data->items_per_page);

            foreach ($response->data->products as $data) {
                $parseProduct = new ParseProduct(
                    $data->product,
                    $data->base_price,
                    $data->image_url,
                    $category->id
                );

                $this->addProduct($parseProduct);

                if ($totalPage >= $page) {
                    $this->parsePages($categoryEnum, $page + 1);
                }
            }
        }
    }
}
