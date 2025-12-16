<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaAtencionApp extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ficha_atencion_app';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_paciente',
        'rut_profesional',
        'nombre_profesional',
        'correo_profesional',
        'telefono_profesional',
        'especialidad',
        'tipo_especialidad',
        'sub_tipo_especialidad',
        'diagnosticos',
        'examenes',
        'medicamentos',
        'rut_dependiente',
        'token',
        'estado',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'estado' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope para registros activos
     */
    public function scopeActivo($query)
    {
        return $query->where('estado', 1);
    }

    /**
     * Scope para filtrar por paciente
     */
    public function scopePorPaciente($query, $idPaciente)
    {
        return $query->where('id_paciente', $idPaciente);
    }

    /**
     * Scope para filtrar por profesional
     */
    public function scopePorProfesional($query, $rutProfesional)
    {
        return $query->where('rut_profesional', $rutProfesional);
    }

    /**
     * Scope para filtrar por token
     */
    public function scopePorToken($query, $token)
    {
        return $query->where('token', $token);
    }
}
