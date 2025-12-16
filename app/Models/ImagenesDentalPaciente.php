<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenesDentalPaciente extends Model
{
    use HasFactory;
    protected $table = 'imagenes_dental_paciente';

    protected $casts = [
        'paths_imagenes' => 'array',  // Convierte automáticamente JSON ↔ array
    ];
}
