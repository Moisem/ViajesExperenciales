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

Route::apiResource('Administradores','controllerAdministradores');
Route::apiResource('Domicilio','controllerDomicilio');
Route::apiResource('Reservaciones','controllerReservacion');
Route::apiResource('Historial','controllerDetalle_reservacion');
Route::apiResource('Usurarios','controllerUsuarios');
Route::apiResource('Vuelos','controllerVuelos');