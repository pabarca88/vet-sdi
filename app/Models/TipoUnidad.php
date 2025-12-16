<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUnidad extends Model
{
    use HasFactory;
    protected $table = 'tipo_unidad';

    public function Bodega()
    {
        return $this->hasOne(Bodega::class, 'id', 'id_bodega');
    }
}
