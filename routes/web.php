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
Route::get('/vuelos', function(){
    return view('vuelos.index');
})->name("vuelos");
Route::get('/domicilio', function(){
    return view('domicilio.index');
})->name('domicilio');
Route::get('/usuarios', function(){
    return view('usuarios.index');
})->name('usuarios');
Auth::routes();
Route::get('/reservaciones', function(){
    return view('reservaciones.index');
})->name('reservaciones');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
