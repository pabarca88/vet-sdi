<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoBodega extends Model
{
    use HasFactory;
    protected $table = 'producto_bodega';

    public function Bodega()
    {
        return $this->hasOne(Bodega::class, 'id', 'id_bodega');
    }

    public function Categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }

    public function SubCategoria()
    {
        return $this->hasOne(SubCategoria::class, 'id', 'id_sub_categoria');
    }

    public function TipoUnidad()
    {
        return $this->hasOne(TipoUnidad::class, 'id', 'id_tipo_unidad');
    }
}
