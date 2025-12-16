<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubTipoExamen;

class Examen extends Model
{
    use HasFactory;
    protected $table = 'examenes';

    public function SubTipoExamen()
    {
        return $this->hasOne(SubTipoExamen::class,'id_subtipo_examen');
    }
}
