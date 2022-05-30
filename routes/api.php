<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/products')
        ->controller(ProductController::class)
        ->name('products')
        ->middleware('guest')
        ->group(function() {
    Route::get('/', 'index')->name('.index');
    Route::post('/', 'store')->name('.store');
    Route::get('/search/{name}', 'search')->name('.search');

    Route::prefix('/{product}')
            ->name('.product')
            ->group(function () {
        Route::get('/', 'show')->name('.show');
        Route::put('/', 'update')->name('.update');
        Route::delete('/', 'destroy')->name('.destroy');
    });
});