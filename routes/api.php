<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BasketController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\FavouriteController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['prefix' => 'products'], function(){{
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/search', [ProductController::class, 'search']);
    Route::get('/search/history', [ProductController::class, 'searchHistory']);
    Route::get('/{product}', [ProductController::class, 'show']);
    Route::get('/{product}/popular', [ProductController::class, 'popular']);
    Route::post('/{product}/buy', [ProductController::class, 'buy']);
    Route::post('/{product}/favourite', [ProductController::class, 'addToFavourite']);
}});

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/brands', [BrandController::class, 'index']);
Route::get('/cities', [CityController::class, 'index']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', [UserController::class, 'show'])->name('user');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/basket', [BasketController::class, 'index']);
Route::post('/basket', [BasketController::class, 'destroy']);

Route::get('/favourites', [FavouriteController::class, 'index']);
Route::post('/favourites', [FavouriteController::class, 'destroy']);

Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store']);
