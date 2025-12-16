<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaniaPublicitaria extends Model
{
    protected $table = 'campanias_publicitarias';

    protected $fillable = [
        'id_institucion',
        'titulo',
        'remitente',
        'mensaje',
        'destinatarios',
        'destinatarios_custom',
        'fecha_envio',
        'estado',
        'total_enviados',
        'total_errores',
        'log_envio',
        'id_profesional',
        'id_lugar_atencion',
    ];

    protected $casts = [
        'fecha_envio' => 'datetime',
        'log_envio' => 'array',
        'id_lugar_atencion' => 'integer',
    ];

    // Relación con profesional (opcional)
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }
}
