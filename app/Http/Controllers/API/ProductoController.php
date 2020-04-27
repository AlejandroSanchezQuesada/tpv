<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoResource;
use App\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct()
    {
       // $this->authorizeResource(Producto::class, 'producto');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductoResource::collection(Producto::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = json_decode($request->getContent(), true);

        return new ProductoResource(Producto::create($producto));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return new ProductoResource($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->update(json_decode($request->getContent(),true));
        return new ProductoResource($producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        if($producto->delete()){
            echo "Se ha borrado el Producto con éxito";
        }
    }


    //Encontrar productos por nombre

    public function findbyNombre(Request $request){
        $productos = DB::table('productos')
                ->where('nombre', 'like', '%'.$request->nombre.'%')
                ->get();
        return $productos;
    }
}
