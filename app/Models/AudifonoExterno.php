<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AudifonoExterno extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nombre de la tabla en la base de datos
     */
    protected $table = 'audifonos_externos';

    /**
     * Los atributos que son asignables en masa
     */
    protected $fillable = [
        'id_paciente',
        'procedencia_laboratorio',
        'fecha_adquisicion',
        // Audífono izquierdo
        'n_serie_izquierdo',
        'marca_izquierdo',
        'modelo_izquierdo',
        'tipo_izquierdo',
        // Audífono derecho
        'n_serie_derecho',
        'marca_derecho',
        'modelo_derecho',
        'tipo_derecho',
        // Información adicional
        'estado_audifono',
        'motivo_control',
        'observaciones',
        // Datos del control
        'fecha_control',
        'examinador',
        'examen_cae',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos
     */
    protected $casts = [
        'fecha_adquisicion' => 'date',
        'fecha_control' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Los atributos que deben ocultarse en arrays
     */
    protected $hidden = [];

    /**
     * Relación: Un audífono externo pertenece a un paciente
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    /**
     * Scope: Filtrar por paciente
     */
    public function scopePorPaciente($query, $idPaciente)
    {
        return $query->where('id_paciente', $idPaciente);
    }

    /**
     * Scope: Filtrar por procedencia/laboratorio
     */
    public function scopePorLaboratorio($query, $laboratorio)
    {
        return $query->where('procedencia_laboratorio', 'like', "%{$laboratorio}%");
    }

    /**
     * Scope: Filtrar por fecha de adquisición
     */
    public function scopePorFechaAdquisicion($query, $fechaInicio, $fechaFin = null)
    {
        if ($fechaFin) {
            return $query->whereBetween('fecha_adquisicion', [$fechaInicio, $fechaFin]);
        }
        return $query->whereDate('fecha_adquisicion', $fechaInicio);
    }

    /**
     * Scope: Filtrar por estado del audífono
     */
    public function scopePorEstado($query, $estado)
    {
        return $query->where('estado_audifono', $estado);
    }

    /**
     * Accessor: Obtener descripción completa del audífono izquierdo
     */
    public function getAudifonoIzquierdoAttribute()
    {
        return "{$this->marca_izquierdo} {$this->modelo_izquierdo}" .
               ($this->tipo_izquierdo ? " ({$this->tipo_izquierdo})" : '');
    }

    /**
     * Accessor: Obtener descripción completa del audífono derecho
     */
    public function getAudifonoDerechoAttribute()
    {
        return "{$this->marca_derecho} {$this->modelo_derecho}" .
               ($this->tipo_derecho ? " ({$this->tipo_derecho})" : '');
    }

    /**
     * Accessor: Verificar si requiere atención
     */
    public function getRequiereAtencionAttribute()
    {
        return in_array($this->estado_audifono, ['Malo', 'Requiere reparación']);
    }

    /**
     * Validar que ambos audífonos tengan información completa
     */
    public static function validarAudifonos($data)
    {
        $errores = [];

        // Validar audífono izquierdo
        if (empty($data['marca_izquierdo'])) {
            $errores[] = 'La marca del audífono izquierdo es obligatoria';
        }
        if (empty($data['modelo_izquierdo'])) {
            $errores[] = 'El modelo del audífono izquierdo es obligatorio';
        }

        // Validar audífono derecho
        if (empty($data['marca_derecho'])) {
            $errores[] = 'La marca del audífono derecho es obligatoria';
        }
        if (empty($data['modelo_derecho'])) {
            $errores[] = 'El modelo del audífono derecho es obligatorio';
        }

        // Validar procedencia
        if (empty($data['procedencia_laboratorio'])) {
            $errores[] = 'La procedencia/laboratorio es obligatoria';
        }

        // Validar fecha de adquisición
        if (empty($data['fecha_adquisicion'])) {
            $errores[] = 'La fecha de adquisición es obligatoria';
        }

        return $errores;
    }
}
