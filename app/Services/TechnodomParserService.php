<?php

namespace App\Services;

use App\Entities\ParseProduct;
use App\Enums\TechnodomCategory;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TechnodomParserService extends ParserService
{
    private string $url;
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
        foreach (TechnodomCategory::cases() as $categoryEnum) {
            $this->url = $categoryEnum->value;

            $request = Http::withoutVerifying()
                ->withHeaders($this->headers)
                ->get($this->url);

            $response = $request?->object();
            $status = $request ? $request->status() : 500;
            $category = Category::whereAlias(Str::lower($categoryEnum->name))->firstOrFail();

            if ($response && $status === 200) {
                foreach ($response->payload as $data) {
                    $parseProduct = new ParseProduct(
                        $data->title,
                        $data->price,
                        sprintf('https://api.technodom.kz/f3/api/v1/images/800/800/%s', Arr::first($data->images)),
                        $category->id);

                    $this->addProduct($parseProduct);
                }
            }
        }
    }
}
