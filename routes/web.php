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

// Index
Route::get('/', 'HomeController@index');

// Categorías
Route::get('/actualidad', 'HomeController@index');
Route::get('/sociedad', 'HomeController@index');
Route::get('/cultura', 'HomeController@index');
Route::get('/tecnologia', 'HomeController@index');

// Footer
Route::get('/quienes-somos', 'FooterController@aboutus');
Route::get('/publicita-con-nosotros', 'FooterController@adversting');
Route::get('/terminos-y-condiciones', 'FooterController@termsandcond');
Route::get('/contacto', 'FooterController@contact');

Route::get('/noticia', 'NoticiaController@index');

//Panel de administración
Route::get('/admin', 'AdminController@index')
 -> name('admin');

//Posts
Route::get('/admin/posts', 'PostController@index')
 -> name('posts');

Route::get('/admin/posts/nuevo', 'PostController@create')
 -> name('posts.nuevo');

Route::post('/admin/posts/crear', 'PostController@store');

Route::get('/admin/posts/editar/{post}', 'PostController@edit')
-> where('post', '[0-9]+')
-> name('posts.editar');

Route::delete('/admin/posts/{post}', 'PostController@destroy')
-> name('posts.eliminar');

Route::put('/admin/posts/detalles/{post}', 'PostController@update');

Route::get('/admin/posts/detalles/{post}', 'PostController@details')
-> where('post', '[0-9]+')
-> name('posts.mostrar');

//Categorías
Route::get('/admin/categorias', 'CategoriaController@index')
 -> name('categorias');

Route::get('/admin/categorias/nuevo', 'CategoriaController@create')
 -> name('categorias.nuevo');

Route::post('/admin/categorias/crear', 'CategoriaController@store');

Route::get('/admin/categorias/editar/{category}', 'CategoriaController@edit')
 -> where('category', '[0-9]+')
 -> name('categorias.editar');

 Route::put('/admin/categorias/detalles/{category}', 'CategoriaController@update');

 Route::get('/admin/categorias/detalles/{category}', 'CategoriaController@details')
 -> where('category', '[0-9]+')
 -> name('categorias.mostrar');

//Usuarios
Route::get('/admin/usuarios', 'UsuarioController@index')
 -> name('usuarios');

Route::get('/admin/usuarios/nuevo', 'UsuarioController@create')
 -> name('usuarios.nuevo');

Route::post('/admin/usuarios/crear', 'UsuarioController@store');

Route::get('/admin/usuarios/editar/{user}', 'UsuarioController@edit')
-> where('user', '[0-9]+')
-> name('usuarios.editar');

Route::delete('/admin/usuarios/{user}', 'UsuarioController@destroy')
-> name('usuarios.eliminar');

Route::put('/admin/usuarios/detalles/{user}', 'UsuarioController@update');

Route::get('/admin/usuarios/detalles/{user}', 'UsuarioController@details')
-> where('user', '[0-9]+')
-> name('usuarios.mostrar');
