<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index(string $categoryAlias)
    {
        $category = Category::whereAlias($categoryAlias)->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(20);

        return $products;
    }

}
