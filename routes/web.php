<?php

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

//Route::get('/test/show/{id}/', 'TestController@show'
//);
//Route::get('/test/city/', 'TestController@city'
//);
//Route::get('/page/show/', 'PageController@showOne' );
Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);
//Person
Route::middleware(['auth'])->group(function (){
    Route::group([
        'prefix' => 'person',
        'namespace' => 'Person',
        'as' => 'person.',
    ],function (){
        Route::get('/orders','OrderController@index')->name('orders');
        Route::get('/orders/show/{order}','OrderController@show')->name('orders.show')->middleware('auth');
    });
});

    //Admin
Route::group([
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'prefix' => 'admin',
    ], function (){
    Route::group([ 'middleware' => 'is_admin' ],function () {
        Route::resource('categories','CategoryController');
        Route::resource('product','ProductController');
        Route::get('/orders','OrderController@index')->name('orders');
        Route::get('/orders/show/{order}','OrderController@show')->name('orders.show')->middleware('auth');
    });
});
//

Route::get('logout','Auth\LoginController@logout')->name('get-logout');

Route::get('/', 'MainController@home' )->name('home');

Route::get('/categories/', 'MainController@categories' )->name('categories');

Route::get('/basket', 'BasketController@basket')->name('basket');

Route::get('/basket/place', 'BasketController@basketPlace')->name('basket-place');

Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');

Route::post('/basket/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');

Route::post('/basket/confirm', 'BasketController@basketConfirm')->name('basket-confirm');

Route::get('/{category}', 'MainController@category' )->name('category');

Route::get('/{category}/{product?}', 'MainController@product' )->name('product');
//Route::get('/about/', 'TestController@about'
//);
//Route::get('/review', 'TestController@review')->name('review');
//Route::post('/review/check', 'TestController@review_check'
//);
