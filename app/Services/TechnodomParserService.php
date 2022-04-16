<?php

namespace App\Services;

use App\Entities\ParseProduct;
use App\Enums\ServiceEnum;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class TechnodomParserService extends ParserService
{
    public function parsePages($categoryEnum, int $page = 1)
    {
        do {
            $request = Http::withoutVerifying()
                ->withHeaders($this->headers)
                ->get(sprintf('%s&page=%s', $categoryEnum->value, $page));

            $response = $request?->object();

            if ($request->status() === 200) {
                foreach ($response->payload as $data) {
                    $parseProduct = new ParseProduct(
                        $data->title,
                        $data->price,
                        sprintf('https://api.technodom.kz/f3/api/v1/images/800/800/%s', Arr::first($data->images)),
                        $this->getCategory($categoryEnum),
                        $data->sku,
                        ServiceEnum::TECHNODOM->value
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

        return (int) ceil($response->total / $response->limit);
    }
}
