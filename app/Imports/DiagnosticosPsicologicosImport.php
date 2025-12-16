<?php
namespace App\Imports;

use App\Models\DiagnosticoPsicologico;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DiagnosticosPsicologicosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new DiagnosticoPsicologico([
            'codigo'     => $row['codigo'],      // Ejemplo: 315.00
            'f'      => $row['f'],       // Ejemplo: (F81.0)
            'descripcion'=> $row['descripcion'], // Ejemplo: Con dificultades en la lectura
        ]);
    }
}
