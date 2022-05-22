<?php

namespace App\Http\Controllers\Api;

use App\Enums\ServiceEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\IndexRequest;
use App\Http\Requests\Api\Product\SearchHistoryRequest;
use App\Http\Requests\Api\Product\SearchRequest;
use App\Http\Resources\Api\ProductResource;
use App\Http\Resources\Api\SearchHistoryResource;
use App\Models\Product;
use App\Models\SearchHistory;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(IndexRequest $request)
    {
        $products = Product::filter($request->all())
            ->paginate($request->input('limit'));

        return ProductResource::collection($products);
    }

    public function search(SearchRequest $request)
    {
        $text = $request->input('text');
        $products = Product::where('name', 'ILIKE', "%$text%")
            ->paginate($request->input('limit'));

        SearchHistory::create([
            'text' => $text,
        ]);

        return ProductResource::collection($products);
    }

    public function searchHistory(SearchHistoryRequest $request)
    {
        return SearchHistoryResource::collection(
            SearchHistory::filter($request->all())
                ->select('text', DB::raw('count(text) as total'))
                ->orderByDesc('total')
                ->groupBy('text')
                ->paginate()
        );
    }

    public function show(Product $product)
    {
        if (is_null($product->description)) {
            $parseService = app(ServiceEnum::from($product->service)->services()[$product->service]);
            $product->update([
                'description' => $parseService->parseDescription($product->original_id)
            ]);
        }

        return ProductResource::make($product);
    }

    public function popular(Product $product)
    {
        $popular = Product::where('category_id', $product->category_id)
            ->orderByDesc('bought')
            ->get();

        return response()->json($popular);
    }

    public function buy(Product $product)
    {
        Product::whereId($product->id)->increment('bought');

        return 0;
    }
}
