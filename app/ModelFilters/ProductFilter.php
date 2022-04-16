<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    protected $drop_id = false;

    public function categoryId(int $category_id)
    {
        return $this->withCategory($category_id);
    }

    public function priceFrom(int $price_from)
    {
        return $this->where('price', '>=', $price_from);
    }

    public function priceTo(int $price_to)
    {
        return $this->where('price', '<=', $price_to);
    }
}
