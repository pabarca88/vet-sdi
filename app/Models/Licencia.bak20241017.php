<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesional;
use App\Models\Paciente;
use App\Models\FichaAtencion;

class Licencia extends Model
{
    use HasFactory;
    protected $table = 'licencia';

    public function Paciente()
    {
        return $this->belongsToMany(Paciente::class, 'licencias', 'id_licencia', 'id_paciente');
    }

    public function FichaAtencion()
    {
        return $this->belongsToMany(FichaAtencion::class, 'licencias', 'id_licencia', 'id_ficha_atencion');
    }

    public function Profesional()
    {
        return $this->belongsToMany(Profesional::class, 'licencias', 'id_licencia', 'id_profesional');
    }
}

