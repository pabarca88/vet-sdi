<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TratamientosRehabImplantologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tratamientos = [
            ['descripcion' => 'PRÓTESIS TOTAL O PARCIAL ACRÍLICA', 'valor' => 145000],
            ['descripcion' => 'PRÓTESIS INMEDIATA', 'valor' => 85000],
            ['descripcion' => 'PRÓTESIS PROVISORIA ACRÍLICA', 'valor' => 85000],
            ['descripcion' => 'BASE METÁLICA TERMINADA', 'valor' => 200000],
            ['descripcion' => 'PLANO DE RELAJACIÓN', 'valor' => 77000],
            ['descripcion' => 'PRÓTESIS HIBRIDA TERMINADA', 'valor' => 770000],

            ['descripcion' => 'CORONA CERÁMICA SOBRE METAL', 'valor' => 110000],
            ['descripcion' => 'CORONA LIBRE DE METAL CEMENTADA', 'valor' => 140000],
            ['descripcion' => 'CORONA CERÁMICA SOBRE IMPLANTE', 'valor' => 140000],

            ['descripcion' => 'INCRUSTACIÓN MÉTODO DIRECTO', 'valor' => 50000],
            ['descripcion' => 'INCRUSTACIÓN CROMO NÍQUEL', 'valor' => 50000],
            ['descripcion' => 'CORONA TOTAL METÁLICA', 'valor' => 50000],
            ['descripcion' => 'PERNO MUÑÓN', 'valor' => 50000],
            ['descripcion' => 'PERNO MUÑÓN PASANTE', 'valor' => 60000],
            ['descripcion' => 'PERNO MUÑÓN TRIPARTITO', 'valor' => 70000],
            ['descripcion' => 'PERNO TIPO SANDRI', 'valor' => 77000],
            ['descripcion' => 'SOCHAPA', 'valor' => 55000],

            ['descripcion' => 'CORONA FULL ZIRCONIO', 'valor' => 100000],
            ['descripcion' => 'INCRUSTACIÓN  FULL  ZIRCONIO', 'valor' => 100000],
            ['descripcion' => 'CASQUETE ZIRCONIO + CERÁMICA', 'valor' => 110000],

            ['descripcion' => 'CORONA E-MAX', 'valor' => 120000],
            ['descripcion' => 'INCRUSTACIÓN E-MAX', 'valor' => 120000],

            ['descripcion' => 'INCRUSTACIÓN', 'valor' => 77000], // Signum Art-Glass

            ['descripcion' => 'REPARACIÓN', 'valor' => 40000],
            ['descripcion' => 'REBASADO', 'valor' => 50000],

            ['descripcion' => 'ENCERADO DE DIAGNOSTICO DE 1 A 4 PIEZAS', 'valor' => 33000],
            ['descripcion' => 'CORONA PROVISORIA', 'valor' => 33000],
            ['descripcion' => 'GUÍA QUIRÚRGICA', 'valor' => 66000],
            ['descripcion' => 'MODELOS FUNCIONALES CON ENCÍA', 'valor' => 27000],

            ['descripcion' => 'PLACA DE CONTENCIÓN', 'valor' => 100000],
            ['descripcion' => 'PLACA DE CONTENCIÓN DUAL', 'valor' => 100000],
            ['descripcion' => 'BOTÓN DE NANCE', 'valor' => 66000],
            ['descripcion' => 'BARRA LINGUAL', 'valor' => 66000],
            ['descripcion' => 'APARATO MACNAMARA', 'valor' => 82000],
            ['descripcion' => 'MANTENEDOR DE ESPACIO FIJO', 'valor' => 45000],
            ['descripcion' => 'APARATO HAWLEY SIMPLE', 'valor' => 55000],
            ['descripcion' => 'APARATO HAWLEY CON TORNILLO', 'valor' => 65000],
        ];

        foreach ($tratamientos as $tratamiento) {
            DB::table('tratamientos_implantologia')->insert([
                'descripcion' => $tratamiento['descripcion'],
                'valor' => $tratamiento['valor'],
                'impl_rehab' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
