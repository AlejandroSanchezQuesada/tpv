<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProductoDePedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos_de_pedidos', function (Blueprint $table) {
            $table->foreign('producto')->references('id')->on('productos');
            $table->foreign('pedido')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos_de_pedidos', function (Blueprint $table) {
            $table->dropForeign('productos_de_pedidos_producto_foreign');
            $table->dropForeign('productos_de_pedidos_pedido_foreign');
        });
    }
}
