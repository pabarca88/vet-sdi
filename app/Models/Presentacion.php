<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dosis;
use App\Models\Producto;

class Presentacion extends Model
{
    use HasFactory;
    protected $table = 'presentaciones';

    public function Dosis()
    {
        return $this->belongsToMany(Dosis::class, 'presentaciones_dosis', 'id_presentacion', 'id_dosis');
    }

    public function Productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_presentacion', 'id_presentacion', 'id_producto');
    }
}
