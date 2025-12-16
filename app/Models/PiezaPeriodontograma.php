<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiezaPeriodontograma extends Model
{
    use HasFactory;
    protected $table = 'piezas_periodontograma';
    protected $fillable = [
        'id_ficha_atencion',
        'pieza',
        'cuerpo'
    ];

    protected $casts = [
        'cuerpo' => 'array',
    ];
}
