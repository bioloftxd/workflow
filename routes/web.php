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
<<<<<<< HEAD
/*
Route::get('/', function () {
    return view('welcome');
});
/
Auth::routes();*/

//Route::get('/home', 'HomeController@index')->name('home');

=======
>>>>>>> bf7e2cfeb0b8d7f7a39f3abc1a1f93ecc73573af

Auth::routes();

<<<<<<< HEAD
//Route::resource('processo', 'ProcessosController');



Route::get('/processos/', function () {
    return view('processos.index');
=======
Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'categorias', 'middleware' => 'auth'], function () {
    Route::resource('/', 'CategoriasController');
>>>>>>> bf7e2cfeb0b8d7f7a39f3abc1a1f93ecc73573af
});

Route::group(['prefix' => 'etapas', 'middleware' => 'auth'], function () {
    Route::resource('/', 'EtapasController');
});

Route::group(['prefix' => 'processos', 'middleware' => 'auth'], function () {
    Route::resource('/', 'ProcessosController');
});

<<<<<<< HEAD

//Route::resource('Teste','TestesController');
=======
>>>>>>> bf7e2cfeb0b8d7f7a39f3abc1a1f93ecc73573af
