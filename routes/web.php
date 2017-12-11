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
Route::middleware(['auth'])->group(function () {
    Route::resource('categorias', 'CategoriasController');
    Route::resource('etapas', 'EtapasController');
    Route::resource('processos', 'ProcessosController');
    Route::resource('anexos', 'AnexosController');
    Route::get('/finalizar', 'EtapasController@finalizar');
    Route::get('/download/{arquivo}/{nome}', "AnexosController@download")->name("download");
    Route::get('inicio', 'ProcessosController@start')->name('inicio');
    Route::get('/home', 'ProcessosController@finish')->name('finish');
});
