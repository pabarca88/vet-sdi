<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendicionCaja extends Model
{
    use HasFactory;
    protected $table = 'rendicion_caja';

    // public function ScopeBonos(){
    //     return $this->hasOne(Prevision::class, 'id', 'id_prevision');
    // }
    public function TipoRendicion(){
        return $this->hasOne(RendicionTipo::class, 'id', 'tipo_rendicion');
    }
    public function Asistente(){
        return $this->hasOne(Asistente::class, 'id', 'id_asistente');
    }
    public function AsistenteReceptor(){
        return $this->hasOne(Asistente::class, 'id', 'id_asistente_receptor');
    }
    public function ProfesionalReceptor(){
        return $this->hasOne(Profesional::class, 'id', 'id_profesional_receptor');
    }

    public function ScopeFiltrofecha($query, $fecha)
    {
        if(!empty($fecha))
        {
            return $query->whereDate('fecha_rendicion', '=', $fecha);
        }
    }
}
