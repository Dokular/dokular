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

Route::get('category', 'CategoryController@get');

Route::post('order', 'OrderController@store');

Route::post('login/attempt', 'Auth\LoginController@attempt');

Route::post('login/verify', 'Auth\LoginController@verify');

Route::post('login/user', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth.jwt'], function () {

    Route::get('/user', 'UserController@user');

    Route::post('logout', 'Auth\LoginController@logout');

});
