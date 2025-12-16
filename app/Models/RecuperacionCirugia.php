<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleReceta;

class RecuperacionCirugia extends Model
{
    use HasFactory;
    protected $table = 'recuperaciones_cirugias';
    public function Medicamento()
    {
        return $this->belongsToMany(DetalleReceta::class, 'id_recuperacion');
    }
}