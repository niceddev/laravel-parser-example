<?php

namespace App\Services;

use App\Contracts\ParserInterface;
use App\Entities\ParseProduct;
use App\Models\Product;

abstract class ParserService implements ParserInterface
{
    public function addProduct(ParseProduct $parseProduct): Product
    {
        return Product::create($parseProduct->toArray());
    }
}
