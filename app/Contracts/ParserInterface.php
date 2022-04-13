<?php

namespace App\Contracts;

interface ParserInterface
{
    public function parseUrl();
    public function addProduct(mixed $data);
}
