<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticoPsicologico extends Model
{
    use HasFactory;
    protected $table = 'diagnosticos_psicologicos';
    protected $fillable = [
        'codigo',
        'f',
        'descripcion'
    ];
}
