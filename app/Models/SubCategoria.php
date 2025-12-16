<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;
    protected $table = 'sub_categoria';

    public function Bodega()
    {
        return $this->hasOne(Bodega::class, 'id', 'id_bodega');
    }

    public function Categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }
}
