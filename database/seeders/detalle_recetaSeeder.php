<?php

namespace Database\Seeders;

use App\Models\DetalleReceta;
use App\Models\Producto;
use App\Models\Dosis;
use App\Models\Presentacion;
use Illuminate\Database\Seeder;

class detalle_recetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contador = 30;

        for ($i = 0; $i < $contador; $i++) {
            $randomDetalle = mt_Rand(1, 4);

            for ($j = 0; $j < $randomDetalle; $j++) {
                $pre_ramdom = mt_Rand(1, 7);
                $presentacion = Presentacion::where('id', $pre_ramdom)->first();
                $dos_ramdom = mt_Rand(1, 7);
                $dosis = Dosis::where('id', $dos_ramdom)->first();



                DetalleReceta::create([
                    'frecuencia' => mt_Rand(1, 10),
                    'periodo' => mt_Rand(1, 10),
                    'comentario' => mt_Rand(1, 10),
                    'presentacion' => $presentacion->descripcion_presentacion,
                    'dosis' => $dosis->nombre_dosis,
                    'producto' => Producto::where('id', mt_Rand(1, 14))->first()->nombre_medicamento,
                    'id_ficha' => $i + 1,
                    'receta' => $i + 1,
                    'estado' => 1

                ]);
            }
        }
    }
}