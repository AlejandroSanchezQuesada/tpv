<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $attributes = [
        'nombre' => "Sin Categoria",
    ];


    public function productosObject()
    {
        return $this->hasMany('App\Producto', 'producto');
    }

}
