<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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


// Route::get('/hello', [UserController::class, 'hello']);
Route::get('/list', [ProductController::class, 'list']);

Route::group([

    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'UserController@login');
    Route::get('logout', 'UserController@logout');
    Route::post('refresh', 'UserController@refresh');
    Route::get('me', 'UserController@me');
    Route::post('register', 'UserController@register');

    //product area
    Route::post('addProduct', 'ProductController@addProduct');
    Route::get('list-update', 'ProductController@list');
    Route::delete('product-delete/{id}', 'ProductController@delete');
});
