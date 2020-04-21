<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PedidoResource;
use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Pedido::class, 'pedido');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PedidoResource::collection(Pedido::paginate());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = json_decode($request->getContent(), true);

        return new PedidoResource(Pedido::create($pedido));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return new PedidoResource($pedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $pedido->update(json_decode($request->getContent(),true));
        return new PedidoResource($pedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        if($pedido->delete()){
            echo "Se ha borrado el Pedido con éxito";
        }
    }
}
