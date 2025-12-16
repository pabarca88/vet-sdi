<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Examen;

class examenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Examen::create([
            'nombre'=> 'ACIDO FOLICO O FOLATOS',
            'id_subtipo_examen'=> '1',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> 'AGLUTININAS ANTI RHO',
            'id_subtipo_examen'=> '1',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> 'ADENOGRAMA, MIELOGRAMA',
            'id_subtipo_examen'=> '1',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> 'ACIDO CITRICO',
            'id_subtipo_examen'=> '2',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> 'AMILASA, EN SANGRE',
            'id_subtipo_examen'=> '2',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> 'COBRE EN SANGRE',
            'id_subtipo_examen'=> '2',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> 'TORAX',
            'id_subtipo_examen'=> '7',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> 'CABEZA',
            'id_subtipo_examen'=> '7',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> 'CUELLO',
            'id_subtipo_examen'=> '7',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> 'COLUMNA',
            'id_subtipo_examen'=> '8',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> 'CARDIOVASCULARES',
            'id_subtipo_examen'=> '8',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        /*Examen::create([
            'nombre'=> 'examen 12',
            'id_subtipo_examen'=> '7',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> '13',
            'id_subtipo_examen'=> '7',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);
        Examen::create([
            'nombre'=> '14',
            'id_subtipo_examen'=> '7',
            'cod_examen'=>mt_Rand(1000, 9999999)
        ]);*/
    }
}
