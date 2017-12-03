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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::resource('categorias', 'CategoriasController');
Route::resource('etapas', 'EtapasController');
Route::get('zetapas/finalizar','EtapasController@finalizar');
Route::resource('processos', 'ProcessosController');
