<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamenPlanTratamiento extends Model
{
    protected $table = 'examenes_plan_tratamiento';

    protected $fillable = [
        'id_ficha_atencion',
        'diagnostico',
        'examenes',
        'observaciones',
        'especialidad',
        'tipo_examen',
    ];

    protected $casts = [
        'examenes' => 'array', // Para que Laravel lo trate automáticamente como array
    ];

    // Relaciones (opcional)
    public function fichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha_atencion');
    }
}
