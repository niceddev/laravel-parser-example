<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use App\Entities\ParseProduct;
use App\Models\Product;

abstract class ParserService implements ParserInterface
{
    protected array $headers;

    public function __construct()
    {
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ];
    }

    public function parseUrl(array $categories)
    {
        foreach ($categories as $categoryEnum) {
            $this->parsePages($categoryEnum);
        }
    }

    public function addProduct(ParseProduct $parseProduct): Product
    {
        return Product::updateOrCreate($parseProduct->toArray());
    }
}
