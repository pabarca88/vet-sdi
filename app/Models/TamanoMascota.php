<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TamanoMascota extends Model
{
    use HasFactory;

    protected $table = 'tamanos_mascotas';

    protected $fillable = [
        'nombre',
        'slug',
    ];

    public function especies()
    {
        return $this->belongsToMany(EspecieMascota::class, 'especie_tamano_mascota', 'tamano_id', 'especie_id');
    }
}
