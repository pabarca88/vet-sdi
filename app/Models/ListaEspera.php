<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaEspera extends Model
{
    use HasFactory;
    protected $table = 'lista_espera';

    public function Institucion()
    {
        return $this->hasOne(Instituciones::class, 'id', 'id_institucion');
    }

    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function Asistente()
    {
        return $this->hasOne(Asistente::class, 'id', 'id_asistente');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }
}
