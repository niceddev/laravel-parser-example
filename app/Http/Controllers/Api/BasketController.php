<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BasketRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    public function index()
    {
        if (auth()->user()){
            $products = [];
            foreach(auth()->user()->products as $product) {
                $products[] = $product;
            }

            return $products;
        }else{
            $pivotTable = DB::table('product_user')->where('user_id', null)->get();
            $products = [];
            foreach($pivotTable as $productId) {
                $product = Product::where('id', $productId->product_id)->get();
                $products[] = $product;
            }

            return $products;
        }
    }

    public function destroy(BasketRequest $request)
    {
        $product = Product::find($request->id);

        if (auth()->user()){
            $product->users()->detach(auth()->user());
        }else{
            $product->users()->detach(null);
        }

    }
}
