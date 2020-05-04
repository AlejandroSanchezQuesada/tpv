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
    //Rutas CRUD
    Route::apiResource('productos', 'API\ProductoController');
    Route::apiResource('users', 'API\UserController');
    Route::apiResource('pedidos', 'API\PedidoController');
    Route::apiResource('categorias', 'API\CategoriaController');
    Route::apiResource('puestos', 'API\PuestoController');
    Route::apiResource('productosdepedidos', 'API\ProductoDePedidoController');

    //Rutas personalizadas -----------------------------------------------------------------

    //Rutas de productospedidos
    Route::get('/productosmasvendidos', 'API\ProductoDePedidoController@productosMasVendidos');


    //Rutas de usuarios
    Route::post('finduserbynombre', 'API\UserController@findbyNombre');
    Route::post('finduserbyemail', 'API\UserController@findbyEmail');
    Route::get('finduserisjefe', 'API\UserController@isJefe');
    Route::get('userlogged', 'API\UserController@userlogged');



    //Rutas de categorias
    Route::post('findcategoriabynombre','API\CategoriaController@findbyNombre');

    //Rutas de productos
    Route::post('findproductobynombre','API\ProductoController@findbyNombre');

    //Rutas de puestos
    Route::post('findpuestobynombre','API\PuestoController@findbyNombre');

    //Rutas de pedidos
    Route::post('findpedidosbyfecha','API\PedidoController@findbyFecha');
    Route::post('findpedidosdeusuario','API\PedidoController@findPedidobyUsuario');
    Route::post('findpedidosdepuestos','API\PedidoController@findPedidobyPuesto');


});


Route::post('/registrarse', 'API\AuthController@registrarse');
Route::post('/login', 'API\AuthController@login');
