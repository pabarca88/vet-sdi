<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConConsentimientosPcte extends Model
{
    use HasFactory;
    protected $table = 'con_consentimientos_pcte';

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }

    public function Consentimiento()
    {
        return $this->hasOne(ConConsentimientos::class, 'id', 'id_consent');
    }

    public function LogUsersDevices()
    {
        return $this->hasOne(LogUsersDevices::class, 'id', 'id_log_users_devices');
    }

    public function LogUsersDevicesRevocacion()
    {
        return $this->hasOne(LogUsersDevices::class, 'id', 'id_log_user_devices_revocacion');
    }

    public function scopeLugarAtencion($query, $lista)
    {
        if (!empty($lista))
        {
            if(gettype($lista) == 'string')
                $lista = explode(',',$lista);

            $registro  = FichaAtencion::whereIn('id_lugar_atencion', $lista)->get();
            if($registro)
            {
                $lista_fc = array();
                foreach ($registro as $key => $value) {
                    array_push($lista_fc, $value->id);
                }

                if(!empty($lista_fc))
                    return $query->whereIn('id_fc', $lista_fc);
            }

        }

    }
}
