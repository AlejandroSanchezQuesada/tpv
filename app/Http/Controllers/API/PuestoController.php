<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PuestoResource;
use App\Puesto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function __construct()
    {
      //  $this->authorizeResource(Puesto::class, 'puesto');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PuestoResource::collection(Puesto::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $puesto = json_decode($request->getContent(), true);

        return new PuestoResource(Puesto::create($puesto));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        return new PuestoResource($puesto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puesto $puesto)
    {
        $puesto->update(json_decode($request->getContent(),true));
        return new PuestoResource($puesto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puesto $puesto)
    {
        if($puesto->delete()){
            echo "Se ha borrado el Producto con éxito";
        }
    }


    //Encontrar puesto por nombre

    public function findbyNombre(Request $request){
        $puestos = DB::table('puestos')
                ->where('nombre', 'like', '%'.$request->nombre.'%')
                ->get();
        return $puestos;
    }
}
