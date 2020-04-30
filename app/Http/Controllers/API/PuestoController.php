<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PuestoResource;
use App\Puesto;
use Illuminate\Support\Facades\Auth;
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

        if ($user = Auth::user()->jefe == 1) {
            $puesto = json_decode($request->getContent(), true);

            return new PuestoResource(Puesto::create($puesto));
        } else {
            return response('El usuario no es un jefe', 403);
        }
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
        if ($user = Auth::user()->jefe == 1) {

            $puesto->update(json_decode($request->getContent(), true));
            return new PuestoResource($puesto);
        } else {
            return response('El usuario no es un jefe', 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puesto $puesto)
    {
        if ($user = Auth::user()->jefe == 1) {
            if ($puesto->delete()) {
                echo "Se ha borrado el Producto con éxito";
            }
        } else {
            return response('El usuario no es un jefe', 403);
        }
    }


    //Encontrar puesto por nombre

    public function findbyNombre(Request $request)
    {
        $puestos = DB::table('puestos')
            ->where('nombre', 'like', '%' . $request->nombre . '%')
            ->get();
        return $puestos;
    }
}
