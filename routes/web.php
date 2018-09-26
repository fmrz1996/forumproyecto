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

Route::get('/', 'HomeController@index');

Route::get('/actualidad', 'HomeController@index');
Route::get('/sociedad', 'HomeController@index');
Route::get('/cultura', 'HomeController@index');
Route::get('/tecnologia', 'HomeController@index');

Route::get('/contacto', 'HomeController@contact');

Route::get('/noticia', 'NoticiaController@index');

Route::get('/usuario', 'UsuarioController@index');
Route::get('/usuario/{id}', 'UsuarioController@show') -> where('id', '[0-9]+');
Route::get('/usuario/nuevo', 'UsuarioController@create');
