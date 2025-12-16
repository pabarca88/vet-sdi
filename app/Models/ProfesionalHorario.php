<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class ProfesionalHorario extends Model

{

    use HasFactory;

    protected $table = 'profesional_horarios';

    public function LugaresAtencion()
    {
        return $this->belongsToMany(LugarAtencion::class, 'profesionales_lugares_atencion', 'id_profesional', 'id_lugar_atencion')
            ->withPivot('estado');
    }

    public function scopeTipoAgenda($query, $tipo_agenda)
    {
        // 1 -> Atención General
        // 2 -> Atención Dental
        // 3 -> Atención Telemedicina
        // 4 -> Examene
        if(!empty($tipo_agenda))
        {
            return $query->whereIn('tipo_agenda', explode(",", $tipo_agenda));
        }
    }

}
