<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'usuario' => $this->usuarioObject,
            'puesto' => $this->puestoObject,
            'fecha_pedido' => $this->fecha_pedido,
            'ingreso' => $this->ingreso,
        ];
    }
}
