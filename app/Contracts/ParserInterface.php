<?php

namespace App\Contracts;

use App\Models\Product;

interface ParserInterface
{
    public function parseUrl();
    public function addProduct(mixed $data);
}
