<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenesDentalOralRx extends Model
{
    use HasFactory;
    protected $table = 'examenes_dental_oral_rx';
    protected $casts = [
        'numero_piezas' => 'array',  // Laravel automáticamente convierte JSON ↔ array
    ];
}
