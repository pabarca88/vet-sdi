<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazaMascota extends Model
{
    use HasFactory;

    protected $table = 'razas_mascotas';

    protected $fillable = [
        'especie_id',
        'nombre',
    ];

    public function especie()
    {
        return $this->belongsTo(EspecieMascota::class, 'especie_id');
    }
}
