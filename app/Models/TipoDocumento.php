<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;
    protected $table = 'tipo_documento';

    public function especialidad ()
    {
        return $this->hasOne(Especialidad::class, 'id', 'id_especialidad');
    }
    public function tipo_especialidad ()
    {
        return $this->hasOne(TipoEspecialidad::class, 'id', 'id_tipo_especialidad');
    }
    public function sub_tipo_especialidad ()
    {
        return $this->hasOne(SubTipoEspecialidad::class, 'id', 'id_sub_tipo_especialidad');
    }
}
