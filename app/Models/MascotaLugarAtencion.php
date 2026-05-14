<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MascotaLugarAtencion extends Model
{
    use HasFactory;

    protected $table = 'mascotas_lugares_atencion';

    protected $fillable = [
        'id_mascota',
        'id_institucion',
        'id_lugar_atencion',
        'origen',
    ];
}
