<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestacionesLaboratorioSeeder extends Seeder
{
    public function run(): void
    {
        $prestaciones = [
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Guía quirúrgica acrílica', 'valor' => 60000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Guía quirúrgica estampada', 'valor' => 60000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Cubeta individual para implantes', 'valor' => 15000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Provisorio para implante', 'valor' => 28000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Fresado de pilar', 'valor' => 18000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Corona metal porcelana sobre implante', 'valor' => 160000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Corona metal porcelana atornillada', 'valor' => 150000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Corona Emax sobre implante', 'valor' => 150000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Prótesis sobre implantes', 'valor' => 286000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Barra (metálica) para prótesis sobre implantes', 'valor' => 250000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Prótesis metal porcelana sobre implante', 'valor' => 1440000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Prótesis sobre implante hibrida', 'valor' => 950000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => 'Prótesis sobre', 'nombre' => 'Corona interm. sobre implante', 'valor' => 150000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Corona e intermedi. Porcelana sobre metal', 'valor' => 140000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Corona de sustitución', 'valor' => 140000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Corona porcelana con hombro cerámico', 'valor' => 140000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Corona disilicato de litio Emax', 'valor' => 150000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Carilla disilicato de litio Emax', 'valor' => 120000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Corona e intermediario provisorio', 'valor' => 25000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Corona provisoria con refuerzo', 'valor' => 28000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Provisorio tipo Maryland', 'valor' => 28000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Provisorio con estampado', 'valor' => 60000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Corona de resina signum', 'valor' => 90000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Carilla de resina signum', 'valor' => 90000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Cristalizado e-max +glase y tinción', 'valor' => 50000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Encerado de diagnóstico por pieza', 'valor' => 18000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Pilar sobre implante personalizado Disilicato de litio', 'valor' => 100000],
            ['categoria' => 'PRÓTESIS FIJA', 'subcategoria' => null, 'nombre' => 'Corona de zirconio', 'valor' => 150000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Incrustación de resina signum', 'valor' => 80000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Incrustación disilicato de litio e-max', 'valor' => 98000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Incrustación Metálica', 'valor' => 70000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Incrustación de zirconio', 'valor' => 100000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Opacado de perno muñón metálico', 'valor' => 12000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Perno muñón pasante o bipartito', 'valor' => 45000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Perno muñón tripartito', 'valor' => 50000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Sochapa metálica', 'valor' => 55000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Fresado Palatino', 'valor' => 30000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Patrón en resina de prueba', 'valor' => 12000],
            ['categoria' => 'Incrustaciones y Pernos', 'subcategoria' => null, 'nombre' => 'Perno muñón metálico', 'valor' => 40000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Placa de altura', 'valor' => 15000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Cubeta individual', 'valor' => 15000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Prótesis caracterizada resina ceramage', 'valor' => 168000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Prótesis total acrílica termo-curado', 'valor' => 120000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Prótesis parcial acrílica termo-curado', 'valor' => 120000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Prótesis acrílica provisoria auto-curado', 'valor' => 70000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Prótesis acrílica inmediata termo-curado', 'valor' => 98000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Plano de relajación acrílico termo-curado', 'valor' => 80000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Plano dual estampado', 'valor' => 65000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Contención estampada', 'valor' => 60000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Prótesis flexible Deflex', 'valor' => 140000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Prótesis base metálica', 'valor' => 190000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Rebasado prótesis', 'valor' => 50000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Reparación simple', 'valor' => 38000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Reparación Compuesta', 'valor' => 45000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Placa de blanqueamiento estampado', 'valor' => 40000],
            ['categoria' => 'Prótesis removible', 'subcategoria' => null, 'nombre' => 'Prótesis con refuerzos malla metálica', 'valor' => 140000],
            ['categoria' => 'Aparatos ortodoncia', 'subcategoria' => null, 'nombre' => 'Mantenedor de espacio', 'valor' => 50000],
            ['categoria' => 'Aparatos ortodoncia', 'subcategoria' => null, 'nombre' => 'Contención estampada', 'valor' => 70000],
            ['categoria' => 'Aparatos ortodoncia', 'subcategoria' => null, 'nombre' => 'Mcnamara', 'valor' => 75000],
            ['categoria' => 'Aparatos ortodoncia', 'subcategoria' => null, 'nombre' => 'Botón de nance', 'valor' => 65000],
            ['categoria' => 'Aparatos ortodoncia', 'subcategoria' => null, 'nombre' => 'Barra lingual', 'valor' => 60000],
            ['categoria' => 'Aparatos ortodoncia', 'subcategoria' => null, 'nombre' => 'Placa hawley tornillo expansor', 'valor' => 78000],
            ['categoria' => 'Aparatos ortodoncia', 'subcategoria' => null, 'nombre' => 'Placa hawley simple', 'valor' => 70000],
            ['categoria' => 'Yesos', 'subcategoria' => null, 'nombre' => 'Montajes', 'valor' => 10000],
            ['categoria' => 'Yesos', 'subcategoria' => null, 'nombre' => 'Modelo de estudio en yeso piedra', 'valor' => 12000],
            ['categoria' => 'Yesos', 'subcategoria' => null, 'nombre' => 'Modelo de estudio en yeso extra duro', 'valor' => 15000],
            ['categoria' => 'Yesos', 'subcategoria' => null, 'nombre' => 'Duplicado de modelo en yeso piedra', 'valor' => 15000],
            ['categoria' => 'Yesos', 'subcategoria' => null, 'nombre' => 'Duplicado de modelo en yeso extra duro', 'valor' => 18000],
            ['categoria' => 'Yesos', 'subcategoria' => null, 'nombre' => 'Modelo de yeso con encía artificial', 'valor' => 45000],
            ['categoria' => 'Yesos', 'subcategoria' => null, 'nombre' => 'Modelo en Accutrack', 'valor' => 25000],
            ['categoria' => 'Yesos', 'subcategoria' => null, 'nombre' => 'Modelo en dowellpin', 'valor' => 28000],

        ];

        DB::table('prestaciones_laboratorio')->insert($prestaciones);
    }
}
