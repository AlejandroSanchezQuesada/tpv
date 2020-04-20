<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
        'descripcion' => $faker->bs,
        'precio' => $faker->randomDigitNotNull,
        'foto' => $faker->imageUrl($width = 640, $height = 480),
        'categoria' => $faker->randomDigitNotNull,
    ];


   /*  $table->string('nombre', 30);
    $table->string('descripcion', 200)->nullable();;
    $table->decimal('precio', 8, 2);
    $table->string('foto', 200)->nullable();;
    $table->bigInteger('categoria')->unsigned()->nullable(); */


});
