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

    Route::get('roles', 'RolePermissionController@getAllRole')->name('roles');
    Route::get('permissions', 'RolePermissionController@getAllPermission')->name('permission');
    Route::post('role-permission', 'RolePermissionController@getRolePermission')->name('role_permission');
    Route::post('set-role-permission', 'RolePermissionController@setRolePermission')->name('set_role_permission');
    Route::post('set-role-user', 'RolePermissionController@setRoleUser')->name('user.set_role');

    Route::get('user-authenticated', 'UserController@getUserLogin')->name('user.authenticated');
    Route::get('user-lists', 'UserController@userLists')->name('user.index');

    Route::resource('expenses', 'ExpensesController')->except(['create', 'show']);
    Route::post('expenses/accept', 'ExpensesController@accept')->name('expenses.accept');
    Route::post('expenses/cancel', 'ExpensesController@cancelRequest')->name('expenses.cancel');

    Route::resource('notification', 'NotificationController')->except(['create', 'destroy']);

});
