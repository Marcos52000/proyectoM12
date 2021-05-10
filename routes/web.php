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

//Ruta home
Route::get('/','MenuController@getMenu')->name('index');

//Ruta home admin
Route::get('/admin', function(){
    return view('admin.adminHome');
})->name('admin')->middleware('auth');

//Rutes login/logout
Route::get('/logout', function(){
    auth()->logout();
    return redirect('/');
});
Route::get('/login','Auth\LoginController@inici');
Route::post('/login','Auth\LoginController@login')->name("login");

// Password Reset Routes...
Route::get('/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//Rutes pagament
Route::get('/pagament/{id}','PagamentsController@getPagament')->name("pagament");

//Rutes gestio categorias
Route::get('/categoria', 'CategoriasController@index')->name("categoria.index")->middleware('auth');
Route::get('/categoria/create', 'CategoriasController@create')->name("categoria.create")->middleware('auth');
Route::post('/categoria/create', 'CategoriasController@store')->name("categoria.store")->middleware('auth');
Route::get('/categoria/edit/{id}', 'CategoriasController@edit')->name("categoria.edit")->middleware('auth');
Route::post('/categoria/edit/{id}', 'CategoriasController@update')->name("categoria.update")->middleware('auth');
Route::delete('/categoria/delete/{id}', 'CategoriasController@destroy')->name("categoria.delete")->middleware('auth');
Route::get('/categoria/export/', 'CategoriasController@export')->name("categoria.export")->middleware('auth');
Route::get('/categoria/export2/', 'CategoriasController@download')->name("categoria.export")->middleware('auth');
//Rutes gestio cursos
Route::get('/curs', 'CursosController@index')->name("curs.index")->middleware('auth');
Route::get('/curs/create', 'CursosController@create')->name("curs.create")->middleware('auth');
Route::post('/curs/create', 'CursosController@store')->name("curs.store")->middleware('auth');
Route::get('/curs/edit/{id}', 'CursosController@edit')->name("curs.edit")->middleware('auth');
Route::post('/curs/edit/{id}', 'CursosController@update')->name("curs.update")->middleware('auth');
Route::delete('/curs/delete/{id}', 'CursosController@destroy')->name("curs.delete")->middleware('auth');
Route::get('/curs/export/', 'CursosController@export')->name("curs.export")->middleware('auth');
Route::get('/curs/export2/', 'CursosController@export2')->name("curs.export")->middleware('auth');

//Rutes gestio pagaments
Route::get('/pagament', 'PagamentsController@index')->name("pagament.index")->middleware('auth');
Route::get('/gpagament/create', 'PagamentsController@create')->name("pagament.create")->middleware('auth');
Route::post('/pagament/create', 'PagamentsController@store')->name("pagament.store")->middleware('auth');
Route::get('/pagament/edit/{id}', 'PagamentsController@edit')->name("pagament.edit")->middleware('auth');
Route::post('/pagament/edit/{id}', 'PagamentsController@update')->name("pagament.update")->middleware('auth');
Route::delete('/pagament/delete/{id}', 'PagamentsController@destroy')->name("pagament.delete")->middleware('auth');
Route::get('/gpagament/export/', 'PagamentsController@export')->name("pagament.export")->middleware('auth');
Route::get('/gpagament/export2/', 'PagamentsController@export2')->name("pagament.export2")->middleware('auth');

//Rutes gesto usuaris
Route::get('/user', 'UsersController@index')->name("user.index")->middleware('auth');
Route::get('/user/create', 'UsersController@create')->name("user.create")->middleware('auth');
Route::post('/user/create', 'UsersController@store')->name("user.store")->middleware('auth');
Route::get('/user/edit/{id}', 'UsersController@edit')->name("user.edit")->middleware('auth');
Route::post('/user/edit/{id}', 'UsersController@update')->name("user.update")->middleware('auth');
Route::delete('/user/delete/{id}', 'UsersController@destroy')->name("user.delete")->middleware('auth');
Route::get('/user/export/', 'UsersController@export')->name("user.export")->middleware('auth');
Route::get('/user/export2/', 'UsersController@export2')->name("user.export")->middleware('auth');

//Rutes gestio comptes
Route::get('/compte', 'ComptesController@index')->name("compte.index")->middleware('auth');
Route::get('/compte/create', 'ComptesController@create')->name("compte.create")->middleware('auth');
Route::post('/compte/create', 'ComptesController@store')->name("compte.store")->middleware('auth');
Route::get('/compte/edit/{id}', 'ComptesController@edit')->name("compte.edit")->middleware('auth');
Route::post('/compte/edit/{id}', 'ComptesController@update')->name("compte.update")->middleware('auth');
Route::delete('/compte/delete/{id}', 'ComptesController@destroy')->name("compte.delete")->middleware('auth');
Route::get('/compte/export/', 'ComptesController@export')->name("compte.export")->middleware('auth');
Route::get('/compte/export2/', 'ComptesController@export2')->name("compte.export")->middleware('auth');