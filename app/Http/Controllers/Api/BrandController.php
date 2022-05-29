<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\BrandRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class BrandController
{
    public function index(BrandRequest $request)
    {
        $brands = DB::table('products')
            ->where('category_id', ($request->input('category_id')))
            ->where('brand', '!=', '')
            ->select('brand')
            ->groupBy('brand')
            ->selectRaw('brand, SUM(bought) as bought')
            ->orderByDesc('bought')
            ->paginate($request->limit);

        return response()->json($brands);
    }

}
