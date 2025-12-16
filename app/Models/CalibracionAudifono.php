<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CalibracionAudifono extends Model
{
    use HasFactory;

    protected $table = 'calibraciones_audifono';

    protected $fillable = [
        'id_producto',
        'id_lugar_atencion',
        'id_paciente',
        'id_profesional',
        'id_hora_medica',
        'motivo_control',
        'motivo_control_text',
        'estado_audifono',
        'estado_audifono_text',
        'marca',
        'modelo',
        'numero_serie',
        'fecha_entrega',
        'acciones_calibrado',
        'opinion_paciente',
        'estado'
    ];

    protected $casts = [
        'fecha_entrega' => 'date',
        'estado' => 'integer'
    ];

    // Relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function horaMedica()
    {
        return $this->belongsTo(HoraMedica::class, 'id_hora_medica');
    }

    // Scopes para queries comunes
    public function scopeActivos($query)
    {
        return $query->where('estado', 1);
    }

    public function scopePorPaciente($query, $idPaciente)
    {
        return $query->where('id_paciente', $idPaciente);
    }

    public function scopePorProfesional($query, $idProfesional)
    {
        return $query->where('id_profesional', $idProfesional);
    }

    public function scopePorLugarAtencion($query, $idLugarAtencion)
    {
        return $query->where('id_lugar_atencion', $idLugarAtencion);
    }

    // Accessors
    public function getFechaEntregaFormateadaAttribute()
    {
        return $this->fecha_entrega ? $this->fecha_entrega->format('d/m/Y') : null;
    }

    public function getEstadoTextoAttribute()
    {
        return $this->estado ? 'Activo' : 'Inactivo';
    }

    // Mutators
    public function setFechaEntregaAttribute($value)
    {
        if ($value) {
            $this->attributes['fecha_entrega'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
    }
}
