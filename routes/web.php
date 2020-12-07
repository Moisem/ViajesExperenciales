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
//Route::get('Usuarios','controllerUsuarios@index');

Route::get('/forms', function(){
    return View::make('forms');
});
Route::get('/vuelos', 'controllerVuelos@page')->name('vuelos');
Route::get('/usuarios', 'controllerUsuarios@page')->name('usuarios');
Route::get('/domicilio', 'controllerDomicilio@page')->name('domicilio');
Route::get('/reservaciones', 'controllerReservaciones@page')->name('reservaciones');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
