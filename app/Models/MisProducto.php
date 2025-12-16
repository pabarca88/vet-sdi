<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MisProducto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mis_productos';

    protected $fillable = [
        'id_producto',
        'id_paciente',
        'fecha_compra',
        'id_profesional',
        'id_lugar_atencion',
        'observaciones',
        'satisfaccion',
        'estado',
    ];

    protected $casts = [
        'fecha_compra' => 'date',
        'estado' => 'integer',
        'satisfaccion' => 'integer',
    ];

    /**
     * Relación con Producto
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    /**
     * Relación con Paciente
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    /**
     * Relación con Profesional
     */
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    /**
     * Relación con Lugar de Atención
     */
    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    /**
     * Scope para productos activos
     */
    public function scopeActivos($query)
    {
        return $query->where('estado', 1)->orWhere('estado', 2);
    }

    /**
     * Scope para productos prestados
     */
    public function scopePrestados($query)
    {
        return $query->where('estado', 2);
    }

    /**
     * Scope para productos inactivos
     */
    public function scopeInactivos($query)
    {
        return $query->where('estado', 0);
    }

    /**
     * Scope para filtrar por paciente
     */
    public function scopePorPaciente($query, $id_paciente)
    {
        return $query->where('id_paciente', $id_paciente);
    }

    /**
     * Scope para filtrar por profesional
     */
    public function scopePorProfesional($query, $id_profesional)
    {
        return $query->where('id_profesional', $id_profesional);
    }

    /**
     * Scope para filtrar por rango de fechas
     */
    public function scopePorRangoFechas($query, $fecha_inicio, $fecha_fin)
    {
        return $query->whereBetween('fecha_compra', [$fecha_inicio, $fecha_fin]);
    }

    /**
     * Obtener productos comprados en un mes específico
     */
    public function scopePorMes($query, $mes, $anio)
    {
        return $query->whereMonth('fecha_compra', $mes)
                     ->whereYear('fecha_compra', $anio);
    }

    /**
     * Accessor para estado en texto
     */
    public function getEstadoTextoAttribute()
    {
        return $this->estado == 1 ? 'Activo' : 'Inactivo';
    }

    /**
     * Scope para productos con satisfacción específica
     */
    public function scopeConSatisfaccion($query, $nivel)
    {
        return $query->where('satisfaccion', $nivel);
    }

    /**
     * Scope para productos con satisfacción alta (4-5)
     */
    public function scopeSatisfaccionAlta($query)
    {
        return $query->whereIn('satisfaccion', [4, 5]);
    }

    /**
     * Scope para productos con satisfacción baja (1-2)
     */
    public function scopeSatisfaccionBaja($query)
    {
        return $query->whereIn('satisfaccion', [1, 2]);
    }

    /**
     * Scope para productos con satisfacción media (3)
     */
    public function scopeSatisfaccionMedia($query)
    {
        return $query->where('satisfaccion', 3);
    }

    /**
     * Accessor para satisfacción en texto
     */
    public function getSatisfaccionTextoAttribute()
    {
        if (is_null($this->satisfaccion)) {
            return 'Sin calificar';
        }

        $textos = [
            1 => 'Muy insatisfecho',
            2 => 'Insatisfecho',
            3 => 'Neutral',
            4 => 'Satisfecho',
            5 => 'Muy satisfecho'
        ];

        return $textos[$this->satisfaccion] ?? 'Sin calificar';
    }

    /**
     * Accessor para satisfacción en estrellas (HTML)
     */
    public function getSatisfaccionEstrellasAttribute()
    {
        if (is_null($this->satisfaccion)) {
            return '☆☆☆☆☆';
        }

        $llenas = str_repeat('★', $this->satisfaccion);
        $vacias = str_repeat('☆', 5 - $this->satisfaccion);

        return $llenas . $vacias;
    }
}
