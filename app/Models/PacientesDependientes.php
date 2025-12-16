<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacientesDependientes extends Model
{
    use HasFactory;
    protected $table = 'pacientes_dependientes';

    // id_responsable
    public function Responsable()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_responsable');
    }

    // id_paciente
    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    // id_relacion
    // public function Relacion()
    // {
    //     return $this->hasOne(Relacion::class, 'id', 'id_relacion');
    // }

    // tipo_dependencia
    public function Tipodependencia()
    {
        return $this->hasOne(TipoDependencia::class, 'id', 'tipo_dependencia');
    }

    public function scopeTipoDependencia($query, $lista)
    {
        if(!empty($lista))
        {
            if(gettype($lista) == 'string')
                $lista = explode(',',$lista);
            $query->whereIn('tipo_dependencia', $lista);
        }
    }
}
