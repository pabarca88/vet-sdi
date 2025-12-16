<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TratamientoVppb extends Model
{
    use HasFactory;

    protected $table = 'tratamientos_vppb';

    protected $fillable = [
        'id_ficha',
        'id_lugar_atencion',
        'id_profesional',
        'id_paciente',
        'numero_sesion',
        'tipo_terapia',
        'comentarios'
    ];

    protected $casts = [
        'numero_sesion' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relaciones
    public function ficha()
    {
        return $this->belongsTo(FichaOtrosProfesionales::class, 'id_ficha');
    }

    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}
