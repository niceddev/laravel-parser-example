<?php

namespace App\Http\Controllers\Api;

use App\Enums\ServiceEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::filter($request->all())
            ->paginate(24);

        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        if (is_null($product->description)){
            $parseService = app(ServiceEnum::from($product->service)->services()[$product->service]);
            dd($parseService->parseDescription($product->original_id));
            Product::update([
               'description' => 'test',
            ]);
        }

        return ProductResource::make($product);
    }
}
