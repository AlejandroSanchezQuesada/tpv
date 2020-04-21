<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = ['nombre','descripcion','precio','foto','categoria'];


    public function categoriaObject() {
        return $this->belongsTo('App\Categoria', 'categoria');
    }


    public function productosObject()
    {
        return $this->hasMany('App\ProductoDePedido', 'producto');
    }
}
