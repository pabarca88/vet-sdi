<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodegasSucursal extends Model
{
    use HasFactory;
    protected $table = 'bodegas_sucursal';
    protected $fillable = [
        'id_sucursal',
        'id_bodega',
        'estado'
    ];
    protected $casts = [
        'id_sucursal' => 'integer',
        'id_bodega' => 'integer',
        'estado' => 'integer'
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'id_bodega');
    }
}
