<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ReparacionAudifono extends Model
{
    use HasFactory;

    protected $table = 'reparaciones_audifono';

    protected $fillable = [
        'id_producto',
        'id_lugar_atencion',
        'id_paciente',
        'id_profesional',
        'id_hora_medica',
        'motivo_reparacion',
        'motivo_reparacion_text',
        'estado_audifono',
        'estado_audifono_text',
        'marca',
        'modelo',
        'numero_serie',
        'fecha_recepcion',
        'fecha_entrega',
        'acciones_reparacion',
        'diagnostico_tecnico',
        'opinion_paciente',
        'costo_reparacion',
        'estado_reparacion',
        'estado'
    ];

    protected $casts = [
        'fecha_recepcion' => 'date',
        'fecha_entrega' => 'date',
        'costo_reparacion' => 'decimal:2',
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

    // Accesor para fecha formateada
    public function getFechaRecepcionFormateadaAttribute()
    {
        return $this->fecha_recepcion ? $this->fecha_recepcion->format('d/m/Y') : null;
    }

    public function getFechaEntregaFormateadaAttribute()
    {
        return $this->fecha_entrega ? $this->fecha_entrega->format('d/m/Y') : null;
    }

    // Accesor para costo formateado
    public function getCostoReparacionFormateadoAttribute()
    {
        return $this->costo_reparacion ? '$' . number_format($this->costo_reparacion, 0, ',', '.') : null;
    }

    // Scope para filtrar por estado de reparación
    public function scopePorEstadoReparacion($query, $estado)
    {
        return $query->where('estado_reparacion', $estado);
    }

    // Scope para filtrar por fecha de recepción
    public function scopePorFechaRecepcion($query, $fecha_inicio, $fecha_fin = null)
    {
        if ($fecha_fin) {
            return $query->whereBetween('fecha_recepcion', [$fecha_inicio, $fecha_fin]);
        }
        return $query->whereDate('fecha_recepcion', $fecha_inicio);
    }

    // Método para obtener el nombre del estado de reparación
    public function getEstadoReparacionNombreAttribute()
    {
        $estados = [
            'recibido' => 'Recibido',
            'en_proceso' => 'En Proceso',
            'completado' => 'Completado',
            'entregado' => 'Entregado',
            'cancelado' => 'Cancelado'
        ];

        return $estados[$this->estado_reparacion] ?? 'Desconocido';
    }

    // Método para verificar si la reparación está en progreso
    public function enProgreso()
    {
        return in_array($this->estado_reparacion, ['recibido', 'en_proceso']);
    }

    // Método para verificar si la reparación está finalizada
    public function finalizada()
    {
        return in_array($this->estado_reparacion, ['completado', 'entregado', 'cancelado']);
    }
}
