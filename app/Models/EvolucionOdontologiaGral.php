<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolucionOdontologiaGral extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'evoluciones_odontologia_gral';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pieza',
        'evolucion',
        'obs',
        'id_procedimiento',
        'id_ficha_atencion',
        'id_paciente',
        'id_profesional',
        'id_lugar_atencion',
        'id_presupuesto',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relación con la ficha de atención
     */
    public function fichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha_atencion');
    }

    /**
     * Relación con el paciente
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    /**
     * Relación con el profesional
     */
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    /**
     * Relación con el lugar de atención
     */
    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    /**
     * Relación con el presupuesto
     */
    public function presupuesto()
    {
        return $this->belongsTo(PresupuestosDental::class, 'id_presupuesto');
    }

    /**
     * Si id_procedimiento es realmente un ID que apunta a la tabla odontogramas_pacientes
     * y debe ser de tipo integer, usar esta relación:
     */
    public function procedimiento()
    {
        return $this->belongsTo(OdontogramaPaciente::class, 'id_procedimiento');
    }

    /**
     * Si id_procedimiento es el nombre del procedimiento (string),
     * podrías necesitar una relación diferente o un accessor
     */
    public function getProcedimientoNombreAttribute()
    {
        return $this->id_procedimiento; // Retorna directamente el string
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
    public function scopePorProfesional($query, $idProfesional)
    {
        return $query->where('id_profesional', $idProfesional);
    }

    /**
     * Scope para filtrar por ficha de atención
     */
    public function scopePorFichaAtencion($query, $idFichaAtencion)
    {
        return $query->where('id_ficha_atencion', $idFichaAtencion);
    }

    /**
     * Scope para filtrar por pieza dental
     */
    public function scopePorPieza($query, $pieza)
    {
        return $query->where('pieza', $pieza);
    }

    public function scopePorLugarAtencion($query, $idLugarAtencion)
    {
        return $query->where('id_lugar_atencion', $idLugarAtencion);
    }

    public function scopePorProcedimiento($query, $idProcedimiento)
    {
        return $query->where('id_procedimiento', $idProcedimiento);
    }
}
