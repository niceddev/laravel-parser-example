<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    public $relations = [];

    public function category(int $id)
    {
        return $this->withCategory($id)->get();
    }
}
