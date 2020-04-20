<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoDePedido extends Model
{
    protected $table = 'productos_de_pedidos';


    public function pedidoObject() {
        return $this->belongsTo('App\Pedido', 'pedido');
    }

    public function productoObject() {
        return $this->belongsTo('App\Producto', 'producto');
    }
}
