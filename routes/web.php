<?php

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

Route::get('/', function () {
    return view('welcome');
});


/*Route::get('/fornecedor', function () {
    return view('fornecedor');
});*/



Route::get('/materiais', function () {
    return view('materiais');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/fornecedor', 'FornecedorController@index');
    Route::get('/fornecedor/edit/{id}', 'FornecedorController@edit');
    Route::post('/fornecedor/update/', 'FornecedorController@update');
    Route::post('/fornecedor/search/', 'FornecedorController@search');
    Route::get('/fornecedor/remove/{id}', 'FornecedorController@remove');
    Route::get('/fornecedor/create', 'FornecedorController@create');
    Route::post('/fornecedor/store', 'FornecedorController@store');

    Route::get('/produto', 'ProdutoController@index');
    Route::get('/produto/create', 'ProdutoController@create');
    Route::post('/produto/store', 'ProdutoController@store');
    Route::get('/produto/edit/{id}', 'ProdutoController@edit');
    Route::get('/produto/remove/{id}', 'ProdutoController@remove');
    Route::post('/produto/update/', 'ProdutoController@update');
    Route::post('/produto/search/', 'ProdutoController@search');

    Route::get('/estoque', 'EstoqueController@index');
    Route::get('/estoque/create', 'EstoqueController@create');
    Route::post('/estoque/store', 'EstoqueController@store');
    Route::get('/estoque/edit/{id}', 'EstoqueController@edit');
    Route::get('/estoque/remove/{id}', 'EstoqueController@remove');
    Route::post('/estoque/update/', 'EstoqueController@update');
    Route::post('/estoque/search/', 'EstoqueController@search');

    Route::resource('Estoque', 'EstoqueController');
});
