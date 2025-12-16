<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Bono extends Model
{
    use HasFactory;
    protected $table = 'bonos';

    public function TipoBono()
    {
        // return $this->belongsTo(TipoBono::class, 'id_tipo_bono', 'id');
        return $this->hasOne(TipoBono::class, 'id', 'id_tipo_bono');
    }

    public function Convenio()
    {
        // return $this->belongsTo(Prevision::class, 'convenio', 'id');
        return $this->hasOne(Prevision::class, 'id', 'convenio');
    }

    public function Paciente()
    {
        // return $this->belongsTo(Paciente::class, 'id_paciente', 'id');
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function Parametro()
    {
        // return $this->belongsTo(Parametro::class, 'estado_consulta', 'id');
        return $this->hasOne(Parametro::class, 'id', 'estado_consulta');
    }

    public function Profesional()
    {
        // return $this->belongsTo(Profesional::class, 'id_profesional', 'id');
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }

    public function Asistente()
    {
        return $this->hasOne(Asistente::class, 'id', 'id_asistente');
    }

    public function scopeFiltroRelacion($query, $profesional, $paciente, $asistente)
    {
        if(!empty($profesional->id))
            $query->where('id_profesional',$profesional->id);
        if(!empty($paciente->id))
            $query->orWhere('id_paciente',$paciente->id);
        if(!empty($asistente->id))
            $query->orWhere('id_asistente',$asistente->id);
    }

    public function scopeFiltroFechaAtencion($query, $fecha)
    {
        if(!empty($fecha))
        {
            return $query->whereDate('fecha_atencion', '=', $fecha);
        }
    }
}
