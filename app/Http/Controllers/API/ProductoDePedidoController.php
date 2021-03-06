<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoDePedidoResource;
use App\ProductoDePedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductoDePedidoController extends Controller
{

    public function __construct()
    {
        // $this->authorizeResource(ProductoDePedido::class, 'productoDePedido');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductoDePedidoResource::collection(ProductoDePedido::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productoDePedido = json_decode($request->getContent(), true);

        return new ProductoDePedidoResource(ProductoDePedido::create($productoDePedido));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductoDePedido  $productoDePedido
     * @return \Illuminate\Http\Response
     */
    public function show(ProductoDePedido $productoDePedido)
    {
        return new ProductoDePedidoResource($productoDePedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductoDePedido  $productoDePedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductoDePedido $productoDePedido)
    {
        $productoDePedido->update(json_decode($request->getContent(), true));
        return new ProductoDePedidoResource($productoDePedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductoDePedido  $productoDePedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductoDePedido $productoDePedido)
    {
        if ($productoDePedido->delete()) {
            echo "Se han borrado los Productos del Pedido con éxito";
        }
    }


    /* Mostrar los productos mas vendidos de forma descendente */
    /* Lo quiero para la pantalla principal del TPV tener una lista con los mas vendidos */

    public function productosMasVendidos()
    {
        $productosVendidos = DB::table('productos_de_pedidos')
            ->join('productos', 'productos_de_pedidos.producto', '=', 'productos.id')
            ->select(DB::raw('productos.nombre,SUM(cantidad) as unidades_vendidas'))
            ->groupBy('productos.nombre')
            ->orderByRaw('unidades_vendidas DESC')
            ->get();

        return $productosVendidos;
    }
}
