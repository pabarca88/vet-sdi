<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPresentacion extends Model
{
    use HasFactory;

    protected $table = 'productos_presentacion';
    protected $primaryKey = 'id';
}
