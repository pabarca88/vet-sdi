<?php

namespace Database\Seeders;

use App\Models\EspecialidadMedica;
use Illuminate\Database\Seeder;

class especialidades_medicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(public_path("carga_masiva/Especialidades_medicas.csv"), 'r');
        while ($data = fgetcsv($file, 1000, "|")) {
            if ($data[1] != 'cod_prof') {
                EspecialidadMedica::create([
                    'cod_prof' => $data[1],
                    'txt_prof' => $data[2],
                    'cod_spe' => $data[3],
                    'txt_spe' => $data[4],
                    'cod_sub_esp'  => $data[5],
                    'txt_subesp'  => $data[6],
                    'cod_parent_esp' => $data[7],

                ]);
            }
        }
    }
}