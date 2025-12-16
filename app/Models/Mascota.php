<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class Mascota extends Model
{
    use HasFactory;

    protected $table = 'mascotas';

    protected $fillable = [
        'id_responsable',
        'chip',
        'tiene_chip',
        'nombre',
        'especie',
        'otra_especie',
        'tamano',
        'fecha_nacimiento',
        'sexo',
        'foto_perfil',
        'galeria',
        'observaciones_fotos',
        'id_user',
        'estado',
    ];

    protected $casts = [
        'galeria' => 'array',
        'fecha_nacimiento' => 'date',
        'tiene_chip' => 'boolean',
    ];

    public function Responsable()
    {
        return $this->belongsTo(Paciente::class, 'id_responsable', 'id');
    }
}
