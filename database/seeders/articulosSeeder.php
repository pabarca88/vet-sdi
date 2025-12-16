<?php

namespace Database\Seeders;

use App\Models\Articulo;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class articulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = fopen(public_path("carga_masiva/productos_nuevo.csv"), 'r');
        while ($data = fgetcsv($file, 1000, "|")) {
            if ($data[1] != 'cod_parent') {
                Articulo::create([
                    'cod_parent' => $data[1],
                    'nombre' => $data[2],
                    'present' => $data[3],
                    'cont-rec' => $data[4],
                    'tipo_cont'  => $data[5],
                    'dosis'  => $data[6],
                    'cant_comp' => $data[7],
                    'cod_isp' => $data[8],
                    'vigencia' => $data[9],
                    'droga' => $data[10],
                    'grupo' => $data[11],
                    'temperatura'  => $data[12]
                ]);
            }
        }
    }
}