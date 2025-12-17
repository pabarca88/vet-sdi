<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecieMascota extends Model
{
    use HasFactory;

    protected $table = 'especies_mascotas';

    protected $fillable = [
        'nombre',
        'slug',
        'requiere_detalle',
    ];

    protected $casts = [
        'requiere_detalle' => 'boolean',
    ];

    public function tamanos()
    {
        return $this->belongsToMany(TamanoMascota::class, 'especie_tamano_mascota', 'especie_id', 'tamano_id');
    }
}
