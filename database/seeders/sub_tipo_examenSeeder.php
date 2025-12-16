<?php

namespace Database\Seeders;

use App\Models\SubTipoExamen;
use Illuminate\Database\Seeder;

class sub_tipo_examenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubTipoExamen::create([
            'nombre'=> 'HEMATOLOGICOS',
            'id_tipo_examen'=> '1'
        ]);

        SubTipoExamen::create([
            'nombre'=> 'BIOQUIMICOS',
            'id_tipo_examen'=> '1'
        ]);
        SubTipoExamen::create([
            'nombre'=> 'HORMONAS  EN SANGRE',
            'id_tipo_examen'=> '1'
        ]);
        SubTipoExamen::create([
            'nombre'=> 'BACTERIAS Y HONGOS',
            'id_tipo_examen'=> '2'
        ]);
        SubTipoExamen::create([
            'nombre'=> 'PARASITOS',
            'id_tipo_examen'=> '2'
        ]);
        SubTipoExamen::create([
            'nombre'=> 'VIRUS',
            'id_tipo_examen'=> '2'
        ]);
        SubTipoExamen::create([
            'nombre'=> 'RADIOLOGIA SIMPLE',
            'id_tipo_examen'=> '5'
        ]);
        SubTipoExamen::create([
            'nombre'=> 'RADIOLOGIA COMPLEJA',
            'id_tipo_examen'=> '5'
        ]);
        SubTipoExamen::create([
            'nombre'=> 'TOMOGRAFIA',
            'id_tipo_examen'=> '5'
        ]);
    }
}
