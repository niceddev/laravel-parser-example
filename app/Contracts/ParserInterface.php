<?php

namespace App\Contracts;

use App\Entities\ParseProduct;

interface ParserInterface
{
    public function parseUrl();

    public function addProduct(ParseProduct $parseProduct);
}
