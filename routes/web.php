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
Auth::routes();
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
Route::get('/reservaciones', function(){
    return view('reservaciones.index');
})->name('reservaciones');
Route::get('/detalles', function(){
    return view('detalles_reservacion.index');
})->name('detalle');
Route::get('/home', 'HomeController@index')->name('home');
