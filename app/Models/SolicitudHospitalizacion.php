<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudHospitalizacion extends Model
{
    protected $table = 'solicitud_hospitalizacion';

    protected $fillable = [
        'id_ficha_atencion',
        'id_profesional',
        'id_paciente',
        'tipo',
        'hospen',
        'obs_hosp',
        'nom_inst',
        'hosp_enserv',
        'obs_hosp_enserv',
        'motivo_hosp',
        'obs_motivo_hosp',
        'obs_hospitalizar',
        'medicamentos',
        'estado'
    ];

    public function fichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha_atencion');
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}
