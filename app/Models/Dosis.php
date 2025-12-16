<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Presentacion;

class Dosis extends Model
{
    use HasFactory;
    protected $table = 'dosis';

    public function Presentaciones()
    {
        return $this->belongsToMany(Presentacion::class, 'presentaciones_dosis', 'id_dosis', 'id_presentacion');
    }
    
}
