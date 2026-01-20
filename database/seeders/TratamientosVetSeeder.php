<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TratamientosVetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tratamientos = [
            ['descripcion' => 'Consulta general veterinaria', 'valor' => 15000],
            ['descripcion' => 'Control preventivo', 'valor' => 12000],
            ['descripcion' => 'Vacunacion multiple', 'valor' => 18000],
            ['descripcion' => 'Vacunacion antirrabica', 'valor' => 16000],
            ['descripcion' => 'Desparasitacion interna', 'valor' => 9000],
            ['descripcion' => 'Desparasitacion externa', 'valor' => 9000],
            ['descripcion' => 'Corte de unas', 'valor' => 7000],
            ['descripcion' => 'Limpieza dental basica', 'valor' => 35000],
            ['descripcion' => 'Curacion de heridas', 'valor' => 22000],
            ['descripcion' => 'Toma de muestras', 'valor' => 10000],
        ];

        $now = now();
        $data = array_map(function ($item) use ($now) {
            return [
                'id_profesional' => null,
                'id_especialidad' => null,
                'id_laboratorio' => null,
                'descripcion' => $item['descripcion'],
                'valor' => $item['valor'],
                'estado' => 1,
                'tipo_examen' => 1,
                'id_responsable' => null,
                'cantidad_bloques' => 2,
                'laboratorio' => null,
                'urgencia' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $tratamientos);

        DB::table('tratamientos_vet')->insert($data);
    }
}
