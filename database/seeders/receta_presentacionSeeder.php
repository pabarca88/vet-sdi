<?php

namespace Database\Seeders;

use App\Models\RecetaPresentacion;
use Illuminate\Database\Seeder;

class receta_presentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(public_path("carga_masiva/receta_presetancion.csv"), 'r');
        while ($data = fgetcsv($file, 1000, "|")) {
            if ($data[1] != 'cantidad') {
                RecetaPresentacion::create([
                    'cantidad' => $data[1],
                    'tipo_presentacion' => $data[2],
                    'cant' => $data[3]

                ]);
            }
        }
    }
}