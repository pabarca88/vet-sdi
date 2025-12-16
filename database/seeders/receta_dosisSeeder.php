<?php

namespace Database\Seeders;

use App\Models\RecetaDosis;
use Illuminate\Database\Seeder;

class receta_dosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = fopen(public_path("carga_masiva/dosis.csv"), 'r');
        while ($data = fgetcsv($file, 1000, "|")) {
            if ($data[1] != 'cod_parent') {
                RecetaDosis::create([
                    'cod_parent' => $data[1],
                    'tipo_prod' => $data[2],
                    'indic' => $data[3]

                ]);
            }
        }
    }
}