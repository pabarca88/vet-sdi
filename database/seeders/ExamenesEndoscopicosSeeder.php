<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenesEndoscopicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Solo los nuevos exámenes endoscópicos
        $examenes = [
            [
                'id' => 765,
                'cod_examen' => 765,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 001 3 | GASTRODUODENOSCOPÍA',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 001 3',
                'algo' => 'GASTRODUODENOSCOPÍA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 766,
                'cod_examen' => 766,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 037 | TEST DE UREASA',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 037',
                'algo' => 'TEST DE UREASA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 767,
                'cod_examen' => 767,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 002 3 | ESOFAGOSCOPIA',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 002 3',
                'algo' => 'ESOFAGOSCOPIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 768,
                'cod_examen' => 768,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 003 3 | ENTEROSCOPÍA',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 003 3',
                'algo' => 'ENTEROSCOPÍA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 769,
                'cod_examen' => 769,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 004 2 | ANO-RECTO-SIGMOIDOSCOPIA EN ADULTOS',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 004 2',
                'algo' => 'ANO-RECTO-SIGMOIDOSCOPIA EN ADULTOS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 770,
                'cod_examen' => 770,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 005 2 | ANO-RECTO-SIGMOIDOSCOPÍA EN NIÑOS',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 005 2',
                'algo' => 'ANO-RECTO-SIGMOIDOSCOPÍA EN NIÑOS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 771,
                'cod_examen' => 771,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 006 3 | COLONOSCOPÍA LARGA',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 006 3',
                'algo' => 'COLONOSCOPÍA LARGA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 772,
                'cod_examen' => 772,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 007 3 | SIGMOIDOSCOPÍA Y COLONOSCOPÍA IZQUIERDA CON TUBO FLEXIBLE',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 007 3',
                'algo' => 'SIGMOIDOSCOPÍA Y COLONOSCOPÍA IZQUIERDA CON TUBO FLEXIBLE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 773,
                'cod_examen' => 773,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 008 | COLEDOCOSCOPIA INTRAOPERATORIA C/S EXTRACCIÓN DE CÁLCULOS',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 008',
                'algo' => 'COLEDOCOSCOPIA INTRAOPERATORIA C/S EXTRACCIÓN DE CÁLCULOS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 774,
                'cod_examen' => 774,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 009 4 | PERITONEOSCOPIA TRANSPARIETAL',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 009 4',
                'algo' => 'PERITONEOSCOPIA TRANSPARIETAL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 775,
                'cod_examen' => 775,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 011 | MANOMETRÍA ESOFÁGICA CONVENCIONAL',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 011',
                'algo' => 'MANOMETRÍA ESOFÁGICA CONVENCIONAL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 776,
                'cod_examen' => 776,
                'cod_parent' => 766,
                'cod_dep' => null,
                'nombre_examen' => '18 01 012 | TEST DE REFLUJO ÁCIDO, TEST DE (GROSSMAN O SIMILAR) O REFLUJO ALCALINO',
                'tipo_examen' => null,
                'habilitado' => null,
                'sub_tipo' => 0,
                'codigo' => '18 01 012',
                'algo' => 'TEST DE REFLUJO ÁCIDO, TEST DE (GROSSMAN O SIMILAR) O REFLUJO ALCALINO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Verificar que no existan antes de insertar
        foreach ($examenes as $examen) {
            if (!DB::table('examenes_medicos')->where('id', $examen['id'])->exists()) {
                DB::table('examenes_medicos')->insert($examen);
            }
        }
    }
}
