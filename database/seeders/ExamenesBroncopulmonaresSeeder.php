<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenesBroncopulmonaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Exámenes Endoscópicos Broncopulmonares con cod_parent = 895
        $examenes = [
            [
                'id' => 950,
                'cod_examen' => 950,
                'cod_parent' => 895,
                'cod_dep' => null,
                'nombre_examen' => '17 07 021 | LARINGOTRAQUEOBRONCOSCOPÍA CON FIBROSCOPIA',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '17 07 021',
                'algo' => 'LARINGOTRAQUEOBRONCOSCOPÍA CON FIBROSCOPIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 951,
                'cod_examen' => 951,
                'cod_parent' => 895,
                'cod_dep' => null,
                'nombre_examen' => '17 07 022 | LARIGOTRAQUEOSCOPÍA CON TUBO RÍGIDO',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '17 07 022',
                'algo' => 'LARIGOTRAQUEOSCOPÍA CON TUBO RÍGIDO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 952,
                'cod_examen' => 952,
                'cod_parent' => 895,
                'cod_dep' => null,
                'nombre_examen' => '17 07 023 | MEDIASTINOSCOPIA C/S BIOPSIA',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '17 07 023',
                'algo' => 'MEDIASTINOSCOPIA C/S BIOPSIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 953,
                'cod_examen' => 953,
                'cod_parent' => 895,
                'cod_dep' => null,
                'nombre_examen' => '17 07 024 | PLEUROSCOPIA (TORACOSCOPIA) C/S BIOPSIA',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '17 07 024',
                'algo' => 'PLEUROSCOPIA (TORACOSCOPIA) C/S BIOPSIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 954,
                'cod_examen' => 954,
                'cod_parent' => 895,
                'cod_dep' => null,
                'nombre_examen' => '17 07 056 | ENDOSONOGRAFÍA BRONQUIAL (EBUS)',
                'tipo_examen' => null,
                'habilitado' => 1,
                'sub_tipo' => 0,
                'codigo' => '17 07 056',
                'algo' => 'ENDOSONOGRAFÍA BRONQUIAL (EBUS)',
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
