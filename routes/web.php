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

Route::get('/', 'UsuarioController@index')->name('usuarios');
Route::get('/usuario/create', 'UsuarioController@new')->name('usuario.new');
Route::post('/usuario/create','UsuarioController@store')->name('usuarios.store');
Route::get('/usuario/{id}/edit','UsuarioController@edit')->name('usuarios.edit');
Route::get('/usuario/{id}/delete','UsuarioController@destroy')->name('usuarios.delete');

