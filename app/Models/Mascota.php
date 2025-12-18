<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\EspecieMascota;
use App\Models\TamanoMascota;

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
        'especie_id',
        'otra_especie',
        'tamano',
        'tamano_id',
        'fecha_nacimiento',
        'sexo',
        'foto_perfil',
        'galeria',
        'observaciones_fotos',
        'esterilizado',
        'fecha_esterilizacion',
        'enfermedad_cronica',
        'id_user',
        'estado',
    ];

    protected $casts = [
        'galeria' => 'array',
        'fecha_nacimiento' => 'date',
        'tiene_chip' => 'boolean',
        'esterilizado' => 'boolean',
        'fecha_esterilizacion' => 'date',
    ];

    public function Responsable()
    {
        return $this->belongsTo(Paciente::class, 'id_responsable', 'id');
    }

    public function especieMascota()
    {
        return $this->belongsTo(EspecieMascota::class, 'especie_id');
    }

    public function tamanoMascota()
    {
        return $this->belongsTo(TamanoMascota::class, 'tamano_id');
    }
}
