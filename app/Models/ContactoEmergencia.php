<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direccion;
use App\Models\Paciente;

class ContactoEmergencia extends Model
{
    use HasFactory;
    protected $table = 'contactos_emergencia';

    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }

    public function Pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'pacientes_contacto_emergencia', 'id_contacto','id_paciente');
    }
    
}
