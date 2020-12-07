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
<<<<<<< HEAD
Route::get('/vuelos', function(){
    return view('vuelos.index');
});
Route::get('/domicilio', function(){
    return view('domicilio.index');
});
Route::get('/usuarios', function(){
    return view('usuarios.index');
});
=======
Route::get('/vuelos', function () {
    return view('vuelos.index');
});
Route::get('/usuario', function () {
    return view('usuarios.index');
});
Route::get('/domicilio', function () {
    return view('domicilio.index');
});
>>>>>>> bfead176ad2842b7104f3658e48e3a53c580301c
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
