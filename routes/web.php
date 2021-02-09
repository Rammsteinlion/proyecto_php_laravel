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

Route::get('/', function () {
    return view('auth.login');
});

//rutas
//Route::get('/clientes', 'ClientesController@index');
//Route::get('/clientes/create', 'ClientesController@create');

//usar todas las rutas juntas y identificar si el usuario esta logueado para poder accerder a las opciones
Route::resource('/clientes', 'ClientesController')->middleware('auth');

//desactivar algunos modulos
Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', 'ClientesController@index')->name('home');
