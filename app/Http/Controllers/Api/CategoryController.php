<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('subCategories')
            ->whereNull('parent_id')
            ->get();

        return CategoryResource::collection($categories);
    }
}
