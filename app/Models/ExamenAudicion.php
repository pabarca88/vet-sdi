<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamenAudicion extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos
     */
    protected $table = 'examenes_audicion';

    /**
     * Los campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'id_ficha',
        'id_lugar_atencion',
        'id_profesional',
        'id_paciente',
        'archivo',
        'estado'
    ];

    /**
     * Los campos que deben ser tratados como fechas
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Los campos que deben ser casteados a tipos específicos
     */
    protected $casts = [
        'id_ficha' => 'integer',
        'id_lugar_atencion' => 'integer',
        'id_profesional' => 'integer',
        'id_paciente' => 'integer',
        'estado' => 'integer',
        'archivo' => 'string'
    ];

    /**
     * Valores por defecto para los atributos
     */
    protected $attributes = [
        'estado' => 1
    ];

    /**
     * Relación con la tabla fichas_atencion
     */
    public function ficha()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha', 'id');
    }

    /**
     * Relación con la tabla lugar_atencion
     */
    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion', 'id');
    }

    /**
     * Relación con la tabla profesionales
     */
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional', 'id');
    }

    /**
     * Relación con la tabla pacientes
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id');
    }

    /**
     * Scope para obtener solo registros activos
     */
    public function scopeActivos($query)
    {
        return $query->where('estado', 1);
    }

    /**
     * Scope para obtener registros por ficha
     */
    public function scopePorFicha($query, $idFicha)
    {
        return $query->where('id_ficha', $idFicha);
    }

    /**
     * Scope para obtener registros por paciente
     */
    public function scopePorPaciente($query, $idPaciente)
    {
        return $query->where('id_paciente', $idPaciente);
    }

    /**
     * Scope para obtener registros por profesional
     */
    public function scopePorProfesional($query, $idProfesional)
    {
        return $query->where('id_profesional', $idProfesional);
    }

    /**
     * Accessor para obtener los archivos como array
     * Si el campo archivo contiene JSON, lo decodifica
     */
    public function getArchivosArrayAttribute()
    {
        if (empty($this->archivo)) {
            return [];
        }

        // Si es JSON válido, decodificarlo
        $decoded = json_decode($this->archivo, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $decoded;
        }

        // Si no es JSON, retornar como string simple
        return [$this->archivo];
    }

    /**
     * Mutator para guardar archivos como JSON si es necesario
     */
    public function setArchivoAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['archivo'] = json_encode($value);
        } else {
            $this->attributes['archivo'] = $value;
        }
    }

    /**
     * Obtener información completa del examen con relaciones
     */
    public function getInfoCompletaAttribute()
    {
        return [
            'id' => $this->id,
            'fecha' => $this->created_at->format('d/m/Y H:i'),
            'paciente' => $this->paciente ? $this->paciente->nombre_completo : 'N/A',
            'profesional' => $this->profesional ? $this->profesional->nombre_completo : 'N/A',
            'archivos' => $this->archivos_array,
            'estado' => $this->estado
        ];
    }
}
