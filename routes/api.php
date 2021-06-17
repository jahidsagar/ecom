<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Size;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('size/{pid}/{cid}', 'App\Http\Controllers\InterfaceController@size_api');
Route::get('quantity/{sid}/{pid}/{cid}', 'App\Http\Controllers\InterfaceController@quantity_api');
Route::get('cart/{pid}/{cid}/{sid}/{quan}', 'App\Http\Controllers\InterfaceController@cart');
Route::get('total', 'App\Http\Controllers\InterfaceController@total_cart');