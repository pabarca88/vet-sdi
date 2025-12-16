<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiagnosticosDental;

class DiagnosticosDentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diagnosticos = [
            'Caries dental',
            'Gingivitis',
            'Periodontitis',
            'Maloclusión',
            'Traumatismos dentales',
            'Erosión dental',
            'Abrasión dental',
            'Aftas bucales',
            'Herpes labial',
            'Halitosis',
            'Anomalías en el número de dientes',
            'Anomalías en el tamaño de los dientes:',
            'Anomalías en la forma de los dientes',
            'Retraso en la erupción dental',
            'Problemas en el desarrollo de los maxilares',
            'Fracturas condilares en niños',
            'Fluorosis dental',
            'Síndrome de Beckwith-Wiedemann',
            'Incisivo retenido',
            'Hipo mineralización incisivo-molar (IMH):',
            'Anquiloglosia',
            'Trastornos temporomandibulares',
            'Síndrome de Gorlin-Goltz',
            'Agenesia de segundos premolares:',
            'Fracturas dentales',
            'Celulitis maxilar',
            'Síndrome de DiGeorge:',
            'Impactación dental'
        ];

        foreach ($diagnosticos as $descripcion) {
            DiagnosticosDental::create([
                'descripcion'       => $descripcion,
                'valor'             => 100000,
                'estado'            => 1,
                'tipo_examen'       => 1,
                'urgencia'          => 0,
                'cantidad_bloques'  => 2,
                'urgencia'          => 1,
            ]);
        }
    }
}
