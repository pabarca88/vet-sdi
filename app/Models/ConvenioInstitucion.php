<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvenioInstitucion extends Model
{
    use HasFactory;
    protected $table = 'convenio_institucion';

    protected $casts = [
        'productos_convenio_institucion' => 'array',
        'fecha_inicio_convenio_institucion' => 'date',
        'fecha_fin_convenio_institucion' => 'date',
    ];
}
