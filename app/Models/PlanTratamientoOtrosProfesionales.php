<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTratamientoOtrosProfesionales extends Model
{
    use HasFactory;

    protected $table = 'plan_tratamiento_otros_profesionales';

    protected $fillable = [
        'id_ficha_atencion',
        'id_profesional',
        'id_paciente',
        'id_lugar_atencion',
        'diagnostico',
        'tratamiento',
        'numero_sesiones',
        'sesion_actual',
        'objetivos',
        'estado',
    ];


    public function fichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha_atencion');
    }

    public function planTratamiento()
    {
        return $this->belongsTo(PlanTratamiento::class, 'id_plan_tratamiento');
    }

}
