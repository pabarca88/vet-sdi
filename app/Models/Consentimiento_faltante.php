<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsentimientoFaltante extends Model
{
    use HasFactory;
    protected $table = 'consentimiento_faltante';
        public function CertificadosPaciente()
        {
            return $this->hasOne(FichaAtencion::class, 'id', 'id_ficha');
        }

        public function Profesional()
        {
            return $this->hasOne(Profesional::class, 'id', 'id_prof_sol_cons');
        }

}



