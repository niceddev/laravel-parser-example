<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'avatar',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function favouriteProducts()
    {
        return $this->belongsToMany(User::class, 'favourite_product_user', 'product_id', 'user_id');
    }

}
