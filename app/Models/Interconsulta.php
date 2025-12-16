<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interconsulta extends Model
{
    use HasFactory;
    protected $table = 'interconsultas';

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional_soli');
    }

    public function ProfesionalInter()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional_inter');
    }

    public function ProfesionalResp()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional_resp');
    }
}
