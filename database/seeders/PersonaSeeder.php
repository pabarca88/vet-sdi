<?php

namespace Database\Seeders;

use App\Models\Personas;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $file = fopen(public_path("carga_masiva/demo carga.csv"), 'r');
        $file = fopen(public_path("carga_masiva/personas.csv"), 'r');
        while ($data = fgetcsv($file, 0, ",")) {
            if ($data[1] != 'cod_parent') {
                Personas::create([
                    'rut' => str_replace('.','',trim($data[0])),
                    'nombre1' => trim($data[1]),
                    'nombre2' => trim($data[2]),
                    'appaterno' => trim($data[3]),
                    'apmaterno' => trim($data[4]),
                    'direccion'  => trim($data[5]),
                    'ciudad'  => trim($data[6]),

                ]);
            }
        }
    }

    public function formatoRut($rut)
    {

    }
}
