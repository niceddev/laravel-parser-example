<?php

namespace App\Services;

use App\Entities\ParseProduct;
use App\Enums\ServiceEnum;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
                        Str::ucfirst(Str::lower($data?->brand_info?->title)),
                        $this->getCategory($categoryEnum),
                        $data->sku,
                        ServiceEnum::TECHNODOM->value,
                        mt_rand(20,60), //bought
                        mt_rand(5,30), //jmart
                        mt_rand(5,30), //mechta
                        mt_rand(5,30), //technodom
                        mt_rand(10,50)/10, //rating
                        mt_rand(3,13), //astana
                        mt_rand(3,15), //almaty
                        mt_rand(2,14), //shymkent
                        mt_rand(3,12), //karaganda
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

        return (int) ceil($response->total / $response->limit);
    }

    public function parseDescription(string $originalId): string
    {
        $request = Http::withoutVerifying()
            ->withHeaders($this->headers)
            ->get('https://api.technodom.kz/katalog/api/v1/products/'.$originalId.'/about');

        $response = $request?->body();

        return '';
    }
}
