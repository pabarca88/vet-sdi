<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TomaMuestra extends Model
{
    use HasFactory;
    protected $table = 'toma_muestra';

    public function TomaMuestraDetalle()
    {
        return $this->hasMany(TomaMuestraDetalle::class, 'id', 'id_toma_muestra');
    }
}
