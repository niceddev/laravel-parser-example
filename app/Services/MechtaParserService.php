<?php

namespace App\Services;

use App\Entities\ParseProduct;
use App\Enums\ServiceEnum;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MechtaParserService extends ParserService
{
    public function parsePages($categoryEnum, int $page = 1)
    {
        do {
            $request = Http::withoutVerifying()
                ->withHeaders($this->headers)
                ->get(sprintf('%s&page=%s', $categoryEnum->value, $page));

            $response = $request?->object();

            if ($request->status() === 200) {
                $ids = [];
                foreach ($response->data->items as $item){
                    $ids[] = $item->id;
                }
                $ids = implode(',', $ids);

                $priceRequest = Http::withoutVerifying()
                    ->post('https://www.mechta.kz/api/new/mindbox/actions/catalog', [
                    'product_ids' => $ids
                ]);
                $priceResponse = $priceRequest?->object();

                foreach ($response->data->items as $data) {
                    $id = $data->id;
                    $discountedPrice = $priceResponse->data->$id->prices->discounted_price;

                    $parseProduct = new ParseProduct(
                        $data->title,
                        $discountedPrice,
                        $data->photos[0],
                        Str::ucfirst(Str::lower($data->metrics->brand)),
                        $this->getCategory($categoryEnum),
                        $data->code,
                        ServiceEnum::MECHTA->value
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

        return (int) ceil($response->data->all_items_count / $response->data->page_items_count);
    }

    public function parseDescription(string $originalId)
    {
        $request = Http::get('https://www.mechta.kz/api/new/product/'.$originalId.'/description');

        $response = $request?->object();

        if ($request->status() === 200){
            dd($response);
        }

        return response()->setStatusCode(500);
    }


}
