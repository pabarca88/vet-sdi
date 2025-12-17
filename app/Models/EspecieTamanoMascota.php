<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecieTamanoMascota extends Model
{
    use HasFactory;

    protected $table = 'especie_tamano_mascota';

    protected $fillable = [
        'especie_id',
        'tamano_id',
    ];

    public function especie()
    {
        return $this->belongsTo(EspecieMascota::class, 'especie_id');
    }

    public function tamano()
    {
        return $this->belongsTo(TamanoMascota::class, 'tamano_id');
    }
}
