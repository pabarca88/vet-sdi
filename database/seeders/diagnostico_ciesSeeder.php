<?php

namespace Database\Seeders;

use App\Models\DiagnosticoCie;
use Illuminate\Database\Seeder;

class diagnostico_ciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = fopen(public_path("carga_masiva/diagnosticos_cies.csv"), 'r');

        while ($data = fgetcsv ($file, 1000, "|")) {

           DiagnosticoCie::create([
               'codigo'=>$data[0],
               'descripcion'=>$data[1]
           ]);
        }

        /*while (($line = fgetcsv($file)) !== FALSE) {

            $diagnostico = explode('|',$line);

           DiagnosticoCie::create([
               'codigo'=>$diagnostico[0],
               'descripcion'=>$diagnostico[1]
           ]);
        }*/
        fclose($file);

    }
}