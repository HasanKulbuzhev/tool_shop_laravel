<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', '\App\Http\Controllers\MainController@index')->name('index');
Route::get('/shop', '\App\Http\Controllers\MainController@shop')->name('shop');
Route::get('/blog', '\App\Http\Controllers\MainController@blog')->name('blog');
Route::get('/product/{product_code}', '\App\Http\Controllers\MainController@product')->name('product');
Route::get('/blog', '\App\Http\Controllers\MainController@blog')->name('blog');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout-get');
Route::group([
    'middleware' => 'auth',
],function (){
    Route::get('/cart','App\Http\Controllers\HomeController@cart')->name('cart');
    Route::get('/add-to-cart/{product_id}','App\Http\Controllers\HomeController@add_to_cart')->name('add-to-cart');
    Route::get('/remove-from-cart/{product_id}','App\Http\Controllers\HomeController@remove_from_cart')->name('remove-from-cart');
    Route::get('/cart-update/','App\Http\Controllers\HomeController@cart_update')->name('cart-update');
    Route::get('/account', 'App\Http\Controllers\HomeController@account')->name('account')->middleware('auth');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
