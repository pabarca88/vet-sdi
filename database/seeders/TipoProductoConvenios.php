<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProductoConvenios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        DB::table('tipoproducto_convenios')->insert([
            ['descripcion' => 'Descuento a las consultas','estado' => 1],
            ['descripcion' => 'Descuento en laboratorios','estado' => 1],
            ['descripcion' => 'Descuento en farmacias','estado' => 1],
            ['descripcion' => 'Descuento en farmacias y laboratorios','estado' => 1],
            ['descripcion' => 'Descuento en farmacias y consultas','estado' => 1],
            ['descripcion' => 'Descuento en consultas y laboratorios','estado' => 1],
            ['descripcion' => 'Descuento en consultas, laboratorios y farmacias','estado' => 1],
        ]);
    }
}
