<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'text',
    ];

    protected $casts = [
        'created_at'    => 'string',
    ];
}
