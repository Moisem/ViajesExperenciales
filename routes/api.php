<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('Domicilio','controllerDomicilio');
Route::apiResource('Reservaciones','controllerReservaciones');
Route::apiResource('Detalle_reservacion','controllerDetalle_reservacion');
Route::apiResource('Usuario','controllerUsuarios');
Route::apiResource('Vuelos','controllerVuelos');