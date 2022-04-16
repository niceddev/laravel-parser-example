<?php

namespace App\Services;

use App\Entities\ParseProduct;
use App\Enums\ServiceEnum;
use App\Http\Resources\Api\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class JmartParserService extends ParserService
{
    public function parsePages($categoryEnum, int $page = 1)
    {
        do {
            $request = Http::withoutVerifying()
            ->withHeaders($this->headers)
            ->get(sprintf('%s&page=%s', $categoryEnum->value, $page));

            $response = $request?->object();

            if ($request->status() === 200) {
                foreach ($response->data->products as $data) {
                    $parseProduct = new ParseProduct(
                        $data?->product,
                        $data?->base_price,
                        $data?->image_url,
                        Str::ucfirst(Str::lower($data?->product_features[0]?->variant ?? '')),
                        $this?->getCategory($categoryEnum),
                        $data?->product_id,
                        ServiceEnum::JMART->value,
                    );

                    $this->addProduct($parseProduct);
                }

                $page++;
            }
        } while($page <= $this->getTotalPage($categoryEnum->value));
    }

    public function getTotalPage(string $categoryEnum)
    {
        $request = Http::withoutVerifying()
            ->withHeaders($this->headers)
            ->get($categoryEnum);

        $response = $request?->object();

        return $response->data->total_pages;
    }

    public function parseDescription(string $originalId)
    {
        $request = Http::withoutVerifying()
            ->withHeaders($this->headers)
            ->get('https://jmart.kz/gw/catalog/v1/products/'.$originalId);

        $response = $request?->object();

        if ($request->status() === 200){
            $product = Product::where('original_id', $originalId)->update(['description' => $response->data->full_description]);
            return ProductResource::make($product);
        }

        return response();
    }

}
