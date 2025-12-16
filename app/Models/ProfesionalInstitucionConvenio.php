<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesionalInstitucionConvenio extends Model
{
    use HasFactory;
    protected $table = 'profesional_institucion_convenio';

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }

    public function Institucion()
    {
        return $this->hasOne(Instituciones::class, 'id', 'id_institucion');
    }

    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function TipoConvenioInstitucion()
    {
        return $this->hasOne(TipoConvenioInstitucion::class, 'id', 'id_tipo_convenio_institucion');
    }
}
