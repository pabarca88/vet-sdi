<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAlmacenamientoProductos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_almacenamiento_productos')->insert([
            'nombre' => 'Proteccion parcial de la luz',
        ]);
        DB::table('tipo_almacenamiento_productos')->insert([
            'nombre' => 'Proteccion total de la luz',
        ]);
        DB::table('tipo_almacenamiento_productos')->insert([
            'nombre' => 'Proteccion de la luz y la humedad',
        ]);
        DB::table('tipo_almacenamiento_productos')->insert([
            'nombre' => 'Proteccion de la luz, la humedad y el oxigeno',
        ]);
    }
}
