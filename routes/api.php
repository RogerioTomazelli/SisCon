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

Route::post('/estoque/store', 'Api\EstoqueApiController@store');
Route::put('/estoque/update/{id}', 'Api\EstoqueApiController@update');
Route::get('/estoque', 'Api\EstoqueApiController@index');
Route::get('/estoque/{id}', 'Api\EstoqueApiController@show');
Route::delete('/estoque/{id}', 'Api\EstoqueApiController@destroy');
Route::post('/estoque/search', 'Api\EstoqueApiController@search');