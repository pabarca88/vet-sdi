<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RazasMascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = now();

        $razas = [
            // Canina (1)
            ['especie_id' => 1, 'nombre' => 'Labrador Retriever'],
            ['especie_id' => 1, 'nombre' => 'Golden Retriever'],
            ['especie_id' => 1, 'nombre' => 'Pastor Aleman'],
            ['especie_id' => 1, 'nombre' => 'Poodle'],
            ['especie_id' => 1, 'nombre' => 'Bulldog Frances'],
            ['especie_id' => 1, 'nombre' => 'Beagle'],
            // Felina (2)
            ['especie_id' => 2, 'nombre' => 'Siames'],
            ['especie_id' => 2, 'nombre' => 'Persa'],
            ['especie_id' => 2, 'nombre' => 'Maine Coon'],
            ['especie_id' => 2, 'nombre' => 'Bengal'],
            ['especie_id' => 2, 'nombre' => 'Sphynx'],
            // Pez (3)
            ['especie_id' => 3, 'nombre' => 'Goldfish'],
            // Aves (4)
            ['especie_id' => 4, 'nombre' => 'Canario'],
            ['especie_id' => 4, 'nombre' => 'Periquito'],
            // Reptiles (5)
            ['especie_id' => 5, 'nombre' => 'Iguana'],
            // Roedores (6)
            ['especie_id' => 6, 'nombre' => 'Hamster'],
            ['especie_id' => 6, 'nombre' => 'Cuyo'],
            // Hurones (7)
            ['especie_id' => 7, 'nombre' => 'Huron'],
            // Otros (8)
            ['especie_id' => 8, 'nombre' => 'Mestizo'],
        ];

        $razas = array_map(function ($item) use ($timestamp) {
            return $item + ['created_at' => $timestamp, 'updated_at' => $timestamp];
        }, $razas);

        DB::table('razas_mascotas')->insertOrIgnore($razas);
    }
}
