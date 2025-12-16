<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteContactoEmergencia extends Model
{
    use HasFactory;

    protected $table = 'pacientes_contacto_emergencia';

    public function ContactoEmergencia()
    {
        return $this->hasOne(ContactoEmergencia::class, 'id', 'id_contacto');
    }
}
