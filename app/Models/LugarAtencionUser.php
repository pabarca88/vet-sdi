<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LugarAtencionUser extends Model
{
    use HasFactory;protected $table = 'lugar_atencion_user';

    public function LugaresAtencion()
    {
        return $this->belongsToMany(LugarAtencion::class, 'lugar_atencion_user', 'id', 'id_lugar_atencion');
    }
}

