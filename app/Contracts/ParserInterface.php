<?php

namespace App\Contracts;

use App\Entities\ParseProduct;

interface ParserInterface
{
    public function parseUrl(array $categories);

    public function parsePages($categoryEnum, int $page = 1);

    public function parseDescription(string $originalId): string;

    public function addProduct(ParseProduct $parseProduct);

    public function getTotalPage(string $categoryEnum);
}
