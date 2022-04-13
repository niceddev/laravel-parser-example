<?php

namespace App\Contracts;

use App\Entities\ParseProduct;

interface ParserInterface
{
    public function parseUrl();

    public function parsePages($categoryEnum, int $page = 1);

    public function addProduct(ParseProduct $parseProduct);
}
