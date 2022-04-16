<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(string $categoryAlias = null)
    {
        if (!isset($categoryAlias)){
            return Product::paginate(24);
        }

        $category = Category::whereAlias($categoryAlias)->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(24);

        return ProductResource::collection($products);
    }

    public function show()
    {

    }
}
