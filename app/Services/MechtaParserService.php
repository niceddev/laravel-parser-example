<?php

namespace App\Services;

use App\Entities\ParseProduct;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MechtaParserService extends ParserService
{
    public function parsePages($categoryEnum, int $page = 1)
    {
        $request = Http::withoutVerifying()
                ->withHeaders($this->headers)
                ->get(sprintf('%s&page=%s', $categoryEnum->value, $page));

        $response = $request?->object();
        $status = $request ? $request->status() : 500;
        $category = Category::whereAlias(Str::lower($categoryEnum->name))->firstOrFail();

        if ($response && $status === 200) {
            $totalPage = (int) ceil($response->data->all_items_count / $response->data->page_items_count);
            $ids = [];
            foreach ($response->data->items as $item){
                $ids[] = $item->id;
            }
            $ids = implode(',', $ids);

            $priceRequest = Http::withoutVerifying()
                ->post('https://www.mechta.kz/api/new/mindbox/actions/catalog', [
                'product_ids' => $ids
            ]);
            $priceResponce = $priceRequest?->object();

            foreach ($response->data->items as $data) {
                $id = $data->id;
                $discountedPrice = $priceResponce->data->$id->prices->discounted_price;

                $parseProduct = new ParseProduct(
                    $data->title,
                    $discountedPrice,
                    $data->photos[0],
                    $category->id
                );

                $this->addProduct($parseProduct);
            }

            if ($totalPage > $page) {
                $this->parsePages($categoryEnum, $page + 1);
            }
        }

    }
}
