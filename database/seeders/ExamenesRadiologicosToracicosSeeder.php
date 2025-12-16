<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenesRadiologicosToracicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Exámenes Radiológicos Torácicos con cod_parent = 955
        $examenes = [
            [
                'id' => 950,
                'cod_examen' => 950,
                'cod_parent' => 955,
                'cod_dep' => null,
                'nombre_examen' => '04 01 004 | RADIOGRAFÍA DE TÓRAX, PROYECCIÓN COMPLEMENTARIA (OBLICUAS, SELECTIVAS U OTRAS)',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '04 01 004',
                'algo' => 'RADIOGRAFÍA DE TÓRAX, PROYECCIÓN COMPLEMENTARIA (OBLICUAS, SELECTIVAS U OTRAS)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 951,
                'cod_examen' => 951,
                'cod_parent' => 955,
                'cod_dep' => null,
                'nombre_examen' => '04 01 008 | RADIOGRAFÍA DE TÓRAX FRONTAL O LATERAL CON EQUIPO MÓVIL',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '04 01 008',
                'algo' => 'RADIOGRAFÍA DE TÓRAX FRONTAL O LATERAL CON EQUIPO MÓVIL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 952,
                'cod_examen' => 952,
                'cod_parent' => 955,
                'cod_dep' => null,
                'nombre_examen' => '04 01 009 | RADIOGRAFÍA DE TÓRAX SIMPLE FRONTAL O LATERAL',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '04 01 009',
                'algo' => 'RADIOGRAFÍA DE TÓRAX SIMPLE FRONTAL O LATERAL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 953,
                'cod_examen' => 953,
                'cod_parent' => 955,
                'cod_dep' => null,
                'nombre_examen' => '04 01 070 | RADIOGRAFÍA DE TÓRAX FRONTAL Y LATERAL',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '04 01 070',
                'algo' => 'RADIOGRAFÍA DE TÓRAX FRONTAL Y LATERAL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 954,
                'cod_examen' => 954,
                'cod_parent' => 955,
                'cod_dep' => null,
                'nombre_examen' => '04 05 019 | RESONANCIA MAGNÉTICA ANGIOGRAFÍA DE TÓRAX',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '04 05 019',
                'algo' => 'RESONANCIA MAGNÉTICA ANGIOGRAFÍA DE TÓRAX',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 955,
                'cod_examen' => 955,
                'cod_parent' => 955,
                'cod_dep' => null,
                'nombre_examen' => '04 05 009 | RESONANCIA MAGNÉTICA DE TÓRAX',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '04 05 009',
                'algo' => 'RESONANCIA MAGNÉTICA DE TÓRAX',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 956,
                'cod_examen' => 956,
                'cod_parent' => 955,
                'cod_dep' => null,
                'nombre_examen' => '05 01 122 | CINTIGRAFÍA PULMONAR PERFUSIÓN O VENTILACIÓN O DIFUSIÓN',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '05 01 122',
                'algo' => 'CINTIGRAFÍA PULMONAR PERFUSIÓN O VENTILACIÓN O DIFUSIÓN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 957,
                'cod_examen' => 957,
                'cod_parent' => 955,
                'cod_dep' => null,
                'nombre_examen' => '05 01 123 | CINTIGRAFÍA Y ESTUDIO ASPIRACIÓN PULMONAR',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '05 01 123',
                'algo' => 'CINTIGRAFÍA Y ESTUDIO ASPIRACIÓN PULMONAR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 958,
                'cod_examen' => 958,
                'cod_parent' => 955,
                'cod_dep' => null,
                'nombre_examen' => '04 03 102 | CAPACIDAD FÍSICA DEL TRABAJO',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '04 03 102',
                'algo' => 'CAPACIDAD FÍSICA DEL TRABAJO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 959,
                'cod_examen' => 959,
                'cod_parent' => 955,
                'cod_dep' => null,
                'nombre_examen' => '04 03 013 | TOMOGRAFÍA COMPUTARIZADA DE TÓRAX',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '04 03 013',
                'algo' => 'TOMOGRAFÍA COMPUTARIZADA DE TÓRAX',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Verificar que no existan antes de insertar para evitar duplicados
        foreach ($examenes as $examen) {
            if (!DB::table('examenes_medicos')->where('id', $examen['id'])->exists()) {
                DB::table('examenes_medicos')->insert($examen);
            }
        }
    }
}
