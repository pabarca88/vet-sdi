<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticuloFaltante extends Model
{
    use HasFactory;
    protected $table = 'articulo_faltante';

    protected $fillable = [
        'nombre'
    ];
}
