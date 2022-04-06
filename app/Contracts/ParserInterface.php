<?php

namespace App\Contracts;

interface ParserInterface
{
    public function parseUrl();

    public function store();
}
