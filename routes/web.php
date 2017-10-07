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
/*
Route::get('/', function () {
    return view('welcome');
});
/
Auth::routes();*/

//Route::get('/home', 'HomeController@index')->name('home');



//Route::resource('processo', 'ProcessosController');



Route::get('/processos/', function () {
    return view('processos.index');
});

Route::get('/processos/{create}', function () {
    return view('processos.create');
});

Route::get('/etapas/{create}', function () {
    return view('etapas.create');
});


//Route::resource('Teste','TestesController');