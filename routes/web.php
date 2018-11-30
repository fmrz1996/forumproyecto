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

use App\Post;
use Illuminate\Http\Request;

// Index
Route::get('/', 'HomeController@index');

Route::get('/busqueda', 'SearchController@index')
-> name('busqueda');

// Footer
Route::get('/quienes-somos', 'FooterController@aboutus');
Route::get('/terminos-y-condiciones', 'FooterController@termsandcond');

Route::get('/contacto', 'FooterController@contact');
Route::post('/contacto', 'FooterController@emailStore')
-> name('email');


// ** Panel de administración ** //
Route::group(['middleware' => ['auth']], function() {

    //Dashboard
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

    //Tags
    Route::get('/admin/tags', 'TagController@index')
      -> name('tags');

    Route::get('/admin/tags/nuevo', 'TagController@create')
      -> name('tags.nuevo');

    Route::post('/admin/tags/crear', 'TagController@store');

    Route::get('/admin/tags/editar/{tag}', 'TagController@edit')
     -> where('category', '[0-9]+')
     -> name('tags.editar');

    Route::put('/admin/tags/detalles/{tag}', 'TagController@update');

    Route::delete('/admin/tag/{tag}', 'TagController@destroy')
    -> name('tags.eliminar');

    Route::get('/admin/tags/detalles/{tag}', 'TagController@details')
      -> where('tag', '[0-9]+')
      -> name('tags.mostrar');

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

    Route::get('/admin/gestion/analisis', 'AdminController@analytics')
    -> name('admin.analisis');

    Route::get('/admin/gestion/sugerencias', 'AdminController@suggestions')
    -> name('admin.sugerencias');

    Route::get('/admin/gestion/estadisticas', 'AdminController@statistics')
    -> name('admin.estadisticas');
});

// ** Autentificación ** //
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('logout');

// Reseteo de contraseña
Route::get('/admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/admin/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
if ($options['verify'] ?? false) {
    Route::emailVerification();
}

// ** Slugs ** //

// Tags
Route::get('/tag/{tag}', 'HomeController@tag')
-> where('tag', '[\w\d\-\_]+')
-> name('tag');

// Noticias
Route::get('/{category}/{slug}/{id}', 'NoticiaController@index')
-> where('slug', '[\w\d\-\_]+')
-> where('id', '[0-9]+')
-> name('noticia');

// Categorías
Route::get('/{category}', 'HomeController@category')
-> name('categoria');
