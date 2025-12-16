<?php

namespace Database\Seeders;

use App\Models\ExamenMedico;
use Illuminate\Database\Seeder;

class examenes_medicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(public_path("carga_masiva/ExamenesMedicos.csv"), 'r');
        while ($data = fgetcsv($file, 1000, "|")) {
            if ($data[1] != 'cod_parent') {
                ExamenMedico::create([
                    'cod_examen' => $data[0],
                    'cod_parent' => $data[1],
                    'nombre_examen' => $data[2],
                    'tipo_examen' => $data[3],
                    'habilitado' => $data[4],
                    'sub_tipo'  => $data[5],
                    'codigo'  => $data[6],
                    'algo' => $data[7],

                ]);
            }
        }
    }
}