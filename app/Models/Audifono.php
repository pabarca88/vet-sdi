<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audifono extends Model
{
    use HasFactory;

    protected $table = 'audifonos';

    protected $fillable = [
        'id_ficha_atencion',
        'lado',
        'numero_serie',
        'marca',
        'modelo',
        'fecha_entrega',
        'nivel_satisfaccion',
        'observaciones'
    ];

    /**
     * Relación con la ficha del paciente
     */
    // public function ficha()
    // {
    //     return $this->belongsTo(FichaOtrosProfesionales::class, 'id_ficha_atencion');
    // }
}
