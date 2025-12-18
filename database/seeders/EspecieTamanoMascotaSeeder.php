<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecieTamanoMascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especies = DB::table('especies_mascotas')->pluck('id');
        $tamanos = DB::table('tamanos_mascotas')->pluck('id');

        $pivot = [];
        $now = now();

        foreach ($especies as $especieId) {
            foreach ($tamanos as $tamanoId) {
                $pivot[] = [
                    'especie_id' => $especieId,
                    'tamano_id' => $tamanoId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        if (!empty($pivot)) {
            DB::table('especie_tamano_mascota')->upsert(
                $pivot,
                ['especie_id', 'tamano_id'],
                ['updated_at']
            );
        }
    }
}
