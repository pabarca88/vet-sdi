<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajoMenor extends Model
{
    use HasFactory;
    protected $table = 'ordenes_trabajos_menores';

    public function Laboratorio()
    {
        return $this->hasOne(Laboratorio::class, 'id', 'id_laboratorio');
    }
}
