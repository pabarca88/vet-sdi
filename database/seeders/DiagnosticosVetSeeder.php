<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosticosVetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diagnosticos = [
            'Consulta preventiva',
            'Vacunación al día',
            'Desparasitación interna',
            'Desparasitación externa',
            'Control sano',
            'Fiebre de origen desconocido',
            'Dolor generalizado',
            'Letargo',
        ];

        $now = now();
        $data = array_map(function ($descripcion) use ($now) {
            return [
                'descripcion' => $descripcion,
                'estado' => 1,
                'tipo_especialidad' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $diagnosticos);

        DB::table('diagnosticos_vet')->insert($data);
    }
}
