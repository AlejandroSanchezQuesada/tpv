<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuestosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') != 'production') {
            DB::table('puestos')->truncate();
            $puestos = factory(\App\Puesto::class, 10)->create();
        }
    }
}
