<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspeciesMascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $especies = [
            ['id' => 1, 'nombre' => 'Canina', 'slug' => 'canina', 'requiere_detalle' => false, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'nombre' => 'Felina', 'slug' => 'felina', 'requiere_detalle' => false, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'nombre' => 'Pez', 'slug' => 'pez', 'requiere_detalle' => false, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'nombre' => 'Aves', 'slug' => 'aves', 'requiere_detalle' => false, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'nombre' => 'Reptiles', 'slug' => 'reptiles', 'requiere_detalle' => false, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6, 'nombre' => 'Roedores', 'slug' => 'roedores', 'requiere_detalle' => false, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 7, 'nombre' => 'Hurones', 'slug' => 'hurones', 'requiere_detalle' => false, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8, 'nombre' => 'Otros', 'slug' => 'otros', 'requiere_detalle' => true, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('especies_mascotas')->upsert(
            $especies,
            ['slug'],
            ['nombre', 'requiere_detalle', 'updated_at']
        );
    }
}
