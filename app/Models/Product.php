<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'price',
        'image_url',
        'brand',
        'category_id',
        'original_id',
        'service'
    ];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function description()
    {
        return $this->hasOne(ProductDescription::class);
    }

    public function scopeWithCategory($query, $id)
    {
        return $query->where('category_id', $id);
    }
}
