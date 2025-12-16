<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrgenciaProcedimiento extends Model
{
    use HasFactory;
    protected $table = 'urgencia_procedimiento';

    public function tipo_procedimiento()
    {
        return $this->hasOne(TipoProcedimiento::class,'id', 'id_tipo_procedimiento');
    }

    public function procedimiento()
    {
        return $this->hasOne(Procedimiento::class,'id', 'id_procedimiento');
    }
}
