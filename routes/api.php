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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'Auth\LoginController@login');

Route::group(['namespace' => 'API', 'middleware' => 'auth:api'], function () {

    Route::resource('outlets', 'OutletController')->except(['show']);

    Route::resource('couriers', 'UserController')->except(['create', 'show', 'update']);
    Route::post('couriers/{id}', 'UserController@update')->name('couriers.update');

    Route::resource('product', 'ProductController')->except(['create', 'show']);
    Route::get('product/laundry-type', 'ProductController@getLaundryType');
    Route::post('product/laundry-type', 'ProductController@storeLaundryType');
});
