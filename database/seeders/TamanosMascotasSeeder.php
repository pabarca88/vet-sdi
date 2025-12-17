<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TamanosMascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $tamanos = [
            ['id' => 1, 'nombre' => 'Pequeña', 'slug' => 'pequena', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'nombre' => 'Mediana', 'slug' => 'mediana', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'nombre' => 'Grande', 'slug' => 'grande', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('tamanos_mascotas')->upsert(
            $tamanos,
            ['slug'],
            ['nombre', 'updated_at']
        );
    }
}
