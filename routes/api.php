<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items','ItemController@index');
Route::get('/items/{id}','ItemController@findItem');
Route::post('/items/addItem','ItemController@addItem');
Route::put('/items/{id}','ItemController@updateItem');
Route::delete('/items/{id}','ItemController@deleteItem');