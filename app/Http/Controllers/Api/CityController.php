<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        return City::all();
    }
}
