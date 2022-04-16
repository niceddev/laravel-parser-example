<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::filter($request->all())->paginate(24);

        return ProductResource::collection($products);
    }

    public function show(Request $request)
    {
//        dd(Product::where('original_id', $request)->get());
        dd('asd');
    }
}
