<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLugarAtencion extends Model
{
    use HasFactory;
    protected $table = 'lugar_atencion_user';

    public function LugaresAtencion()
    {
        return $this->belongsToMany(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }
}
