<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificadoReposo extends Model
{
    use HasFactory;
    protected $table = 'certificados_reposos';

    public function CertificadosPaciente()
    {
        return $this->hasOne(FichaAtencion::class, 'id', 'id_ficha');
    }

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }

}
