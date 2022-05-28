<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FavouriteRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavouriteController extends Controller
{
    public function index()
    {
        if (auth()->user()){
            $products = [];
            foreach(auth()->user()->favouriteProducts as $product) {
                $products[] = $product;
            }

            return $products;
        }else{
            $pivotTable = DB::table('favourite_product_user')->where('user_id', null)->get();
            $products = [];
            foreach($pivotTable as $productId) {
                $product = Product::where('id', $productId->product_id)->get();
                $products[] = $product;
            }

            return $products;
        }
    }

    public function destroy(FavouriteRequest $request)
    {
        $product = Product::find($request->id);

        if (auth()->user()){
            $product->favouriteUsers()->detach(auth()->user());
        }else{
            $product->favouriteUsers()->detach(null);
        }

    }
}
