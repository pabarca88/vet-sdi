<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CierreDiario extends Model
{
    use HasFactory;
    protected $table = 'cierre_diario';

    public function Asistente(){
        return $this->hasOne(Asistente::class, 'id', 'id_asistente_jefe');
    }
    public function AsistenteReceptor(){
        return $this->hasOne(Asistente::class, 'id', 'id_asistente_receptor');
    }

}
