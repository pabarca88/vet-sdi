<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerapiaVoz extends Model
{
    use HasFactory;

    protected $table = 'terapia_voz';

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
        'updated_at' => 'datetime',
    ];

    // Relaciones (ajusta según tus modelos existentes)
    public function ficha()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha');
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    // Scopes útiles
    public function scopePorFicha($query, $idFicha)
    {
        return $query->where('id_ficha', $idFicha);
    }

    public function scopePorPaciente($query, $idPaciente)
    {
        return $query->where('id_paciente', $idPaciente);
    }

    public function scopePorProfesional($query, $idProfesional)
    {
        return $query->where('id_profesional', $idProfesional);
    }

    public function scopeOrdenadoPorSesion($query)
    {
        return $query->orderBy('numero_sesion', 'asc');
    }

    // Métodos útiles
    public function getUltimaSesion()
    {
        return static::where('id_ficha', $this->id_ficha)
            ->max('numero_sesion');
    }

    public function getSiguienteNumeroSesion()
    {
        $ultimaSesion = static::where('id_ficha', $this->id_ficha)
            ->max('numero_sesion');

        return ($ultimaSesion ?? 0) + 1;
    }
}
