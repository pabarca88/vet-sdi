<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoExamen;

class SubTipoExamen extends Model
{
    use HasFactory;
    protected $table = 'sub_tipos_examen';

    public function TipoExamen()
    {
        return $this->hasOne(TipoExamen::class,'id_tipo_examen');
    }
}
