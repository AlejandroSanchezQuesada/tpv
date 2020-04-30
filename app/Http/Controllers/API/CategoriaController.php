<?php

namespace App\Http\Controllers\API;

use App\Categoria;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CategoriaResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct()
    {
        // $this->authorizeResource(Categoria::class, 'categoria');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoriaResource::collection(Categoria::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($user = Auth::user()->jefe == 1) {
            $categoria = json_decode($request->getContent(), true);

            return new CategoriaResource(Categoria::create($categoria));
        } else {
            return response('El usuario no es un jefe', 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return new CategoriaResource($categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {


        if ($user = Auth::user()->jefe == 1) {

            $categoria->update(json_decode($request->getContent(), true));
            return new CategoriaResource($categoria);
        } else {
            return response('El usuario no es un jefe', 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {

        if ($user = Auth::user()->jefe == 1) {

            if ($categoria->delete()) {
                echo "Se ha borrado la Categoria con éxito";
            }
        } else {
            return response('El usuario no es un jefe', 403);
        }
    }


    //Encontrar categorias por nombre

    public function findbyNombre(Request $request)
    {

        $categorias = DB::table('categorias')
            ->where('nombre', 'like', '%' . $request->nombre . '%')
            ->get();
        return $categorias;
    }
}
