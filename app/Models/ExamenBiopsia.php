<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenBiopsia extends Model
{
    use HasFactory;

    protected $table = 'examenes_biopsia';

    protected $fillable = [
        'fecha',
        'n_orden',
        'zona1',
        'zona2',
        'zona3',
        'zona4',
        'patologo',
        'observaciones',
        'id_ficha_atencion',
    ];
}

