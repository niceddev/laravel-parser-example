<?php

namespace App\Services;

use App\Entities\ParseProduct;
use Illuminate\Support\Facades\Http;

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
                        $data->product,
                        $data->base_price,
                        $data->image_url,
                        $this->getCategory($categoryEnum),
                        $data->product_id,
                        'JMART'
                    );

                    $this->addProduct($parseProduct);
                }

                $page++;
            }
        } while($page <= $this->getTotalPage($categoryEnum->value));
    }

    public function getTotalPage(string $categoryEnum){
        $request = Http::withoutVerifying()
            ->withHeaders($this->headers)
            ->get($categoryEnum);

        $response = $request?->object();

        return $response->data->total_pages;
    }
}
