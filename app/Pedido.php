<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    public function usuarioObject() {
        return $this->belongsTo('App\User', 'usuario');
    }
    public function puestoObject() {
        return $this->belongsTo('App\Puesto', 'puesto');
    }

    public function pedidosObject()
    {
        return $this->hasMany('App\ProductoDePedido', 'pedido');
    }
}
