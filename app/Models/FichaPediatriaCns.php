<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaPediatriaCns extends Model
{
    use HasFactory;
    protected $table = 'ficha_pediatria_cns';

    public function CnsTipo()
    {
        return $this->hasOne(CnsTipo::class, 'id', 'id_cns_tipo');
    }

    public function CnsTipoTemplate()
    {
        return $this->hasOne(CnsTipoTemplate::class, 'id', 'id_cns_template');
    }

    public function FichaAtencion()
    {
        return $this->hasOne(FichaAtencion::class, 'id', 'id_ficha_atencion');
    }

    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function Responsable()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_responsable');
    }

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }

}
