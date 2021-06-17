<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// frontend view
Route::get('/', 'App\Http\Controllers\InterfaceController@viewproduct');
Route::get('/details/{id}', 'App\Http\Controllers\InterfaceController@detailsPage');
// Route::get('/', function () {
//     return view('index',['cat'=>Category::all()]);
// });
// Route::get('/details', function () {
//     return view('details',['cat'=>Category::all()]);
// });
Route::get('/login', function () {
    return view('login',['cat'=>Category::all()]);
})->name('signin');

// admin panel
Route::get('/dashboard', function () {
    return view('admin');
})->middleware('auth');

Route::get('/color', 'App\Http\Controllers\InterfaceController@colors')->middleware('auth');
Route::get('/size', 'App\Http\Controllers\InterfaceController@sizes')->middleware('auth');
Route::get('/weight', 'App\Http\Controllers\InterfaceController@weights')->middleware('auth');
Route::get('/scale', 'App\Http\Controllers\InterfaceController@scales')->middleware('auth');
Route::get('/brand', 'App\Http\Controllers\InterfaceController@brands')->middleware('auth');
Route::get('/category', 'App\Http\Controllers\InterfaceController@categories')->middleware('auth');
Route::get('/product', 'App\Http\Controllers\InterfaceController@products')->middleware('auth');
Route::get('/modify/{id}', 'App\Http\Controllers\InterfaceController@modify')->middleware('auth');

Route::get('/productDetails/{id}', 'App\Http\Controllers\InterfaceController@productDetails');
Route::get('/allproduct', 'App\Http\Controllers\InterfaceController@allproduct')->middleware('auth');
Route::get('/cart', 'App\Http\Controllers\InterfaceController@cart_details');

Route::post('/interface', 'App\Http\Controllers\InterfaceController@store');
Route::post('/category', 'App\Http\Controllers\InterfaceController@store_category');
Route::post('/product', 'App\Http\Controllers\InterfaceController@store_product');
Route::post('/modify', 'App\Http\Controllers\InterfaceController@store_product_details');
Route::post('/signin', 'App\Http\Controllers\InterfaceController@signinUser');
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});
Route::post('/registration', 'App\Http\Controllers\InterfaceController@registration');
Route::get('/registration',function(){
    return view('registration',['cat'=>Category::all()]);
});