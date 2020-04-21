<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table = 'puestos';

    protected $fillable = ['nombre'];

    public function pedidosObject()
    {
        return $this->hasMany('App\Pedido', 'pedido');
    }
}
