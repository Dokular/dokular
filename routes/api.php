<?php

use Illuminate\Http\Request;
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

Route::get('products', 'ProductController@get');

Route::get('categories', 'CategoryController@get');

Route::post('order', 'OrderController@store');

Route::post('login/attempt', 'Auth\LoginController@attempt');

Route::post('login/verify', 'Auth\LoginController@verify');

Route::post('login/user', 'Auth\LoginController@login');

Route::middleware('auth:user')->group(function () {

    Route::get('/order', 'OrderController@getOwnersAndOrders');

    Route::post('logout', 'Auth\LoginController@logout');

});

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('categories', 'CategoryController@get');
    Route::post('category', 'CategoryController@create');
    Route::get('category/{category}', 'CategoryController@getCategory');
    Route::patch('category/{category}', 'CategoryController@update');
    Route::post('activate/{category}', 'CategoryController@active');
    Route::post('product/{category}', 'ProductController@create');
    Route::patch('product/{product}', 'ProductController@update');

    Route::get('orders', 'OrderController@all');
});
