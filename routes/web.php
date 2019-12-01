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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('fincas','FincaController');
//DataTable fincas
Route::get('data_fincas','FincaController@registros_finca');

Route::resource('lotes','LoteController');
Route::get('lotes_finca/{id}', ['as'=>'lotes_finca','uses'=>'LoteController@index']);

//DataTable lotes
Route::get('data_lotes','LoteController@registros_lote');

Route::resource('sembrados','SembradosController');

Route::post('ciudadesAjax', ['as'=>'ciudadesAjax','uses'=>'FincaController@ajaxCiudades']);


Route::get('descargar-fincas/{tipo}', 'FincaController@pdf')->name('finca.pdf');

Route::get('sembrados_lote/{id}', ['as'=>'sembrados_lote','uses'=>'SembradosController@index']);
