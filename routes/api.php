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

Route::post('/turma/store', 'Api\TurmaApiController@store');
Route::put('/turma/update/{id}', 'Api\TurmaApiController@update');
Route::get('/turma', 'Api\TurmaApiController@index');
Route::get('/turma/{id}', 'Api\TurmaApiController@show');
Route::delete('/turma/{id}', 'Api\TurmaApiController@destroy');
Route::post('/turma/search', 'Api\TurmaApiController@search');