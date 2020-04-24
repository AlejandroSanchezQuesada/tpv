<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:api')->group(function () {
    //Rutas basicas
    Route::apiResource('productos', 'API\ProductoController');
    Route::apiResource('users', 'API\UserController');
    Route::apiResource('pedidos', 'API\PedidoController');
    Route::apiResource('categorias', 'API\CategoriaController');
    Route::apiResource('puestos', 'API\PuestoController');
    Route::apiResource('productosdepedidos', 'API\ProductoDePedidoController');

    //Rutas personalizadas

    Route::get('/productosmasvendidos', 'API\ProductoDePedidoController@productosMasVendidos');
});


Route::post('/registrarse', 'API\AuthController@registrarse');
Route::post('/login', 'API\AuthController@login');
