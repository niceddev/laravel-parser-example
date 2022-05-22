<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Product::select('service')
            ->groupBy('service')
            ->selectRaw('SUM(bought) as bought')
            ->orderByDesc('bought')
            ->get();

        return response()->json($services);
    }
}
