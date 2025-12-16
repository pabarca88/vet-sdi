<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;

class Direccion extends Model
{
    use HasFactory;
    protected $table = 'direcciones';

    public function Ciudad()
    {
        return $this->hasOne(Ciudad::class,'id', 'id_ciudad');
    }
}
