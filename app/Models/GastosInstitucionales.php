<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastosInstitucionales extends Model
{
    use HasFactory;
    protected $table = 'gastos_institucionales';

    public function Institucion()
    {
        return $this->hasOne(Instituciones::class,'id', 'id_institucion');
    }

    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class,'id', 'id_lugar_atencion');
    }

    public function Persona()
    {
        return $this->hasOne(AdminInstServ::class,'id_admin', 'id_adm');
    }

    public function scopeFiltros($query, $mes, $ano, $emisor)
    {
        $filtro = array();
        if(!empty($mes))
            $filtro[] = array('mes_pago', intval($mes));
        if(!empty($ano))
            $filtro[] = array('ano_pago', intval($ano));
        if(!empty($emisor))
            $filtro[] = array('emisor', $emisor);

        return $query->where($filtro);
    }
}
