<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class SearchHistoryFilter extends ModelFilter
{
    protected $drop_id = false;

    public function sortBy(string $sort_type)
    {
        return $this->orderByDesc('text');
    }
}
