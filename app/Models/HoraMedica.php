<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parametro;

class HoraMedica extends Model
{
    use HasFactory;
    protected $table = 'horas_medicas';

	 protected $fillable = [
        'id_paciente',
        'descripcion',  // Reemplaza con el nombre real del primer campo
    ];

    public function Estado()
    {
        return $this->hasOne(Parametro::class,'id','id_estado');
    }

    public function Paciente()
    {
        return $this->hasOne(Paciente::class,'id','id_paciente');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class,'id','id_profesional');
    }

    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class,'id','id_lugar_atencion');
    }

    public function scopeIdNotIn($query, $array)
    {
        if(count($array) > 0)
            return $query->whereNotIn('id',$array);
    }

    public function Notificacionesconfirmacion()
    {
        return $this->hasOne(NotificacionConfirmacion::class, 'id_evento', 'id')->where('tipo_notificacion',1);
    }

    public function FichaOtrosProfesionales()
    {
        return $this->hasOne(FichaOtrosProfesionales::class,'id','id_ficha_otros_prof');
    }

    public function ProcedimientoCentro()
    {
        return $this->hasOne(ProcedimientosCentro::class,'id','id_procedimiento');
    }

    public function FichaAtencion()
    {
        return $this->hasOne(FichaAtencion::class,'id','id_ficha_atencion');
    }
}
