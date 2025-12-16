<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LlamadoPaciente extends Model
{
    use HasFactory;

    protected $table = 'llamado_paciente';

    // protected $fillable = [
    //     'id_lugar_atencion',
    //     'id_sala_espera',
    //     'id_televisor',
    //     'id_box',
    //     'id_paciente',
    //     'id_profesional',
    //     'id_usuario_llama',
    //     'cantidad_llamados',
    //     'fecha_llamado',
    //     'hora_llamado',
    //     'estado',
    // ];

    public function lugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function salaEspera()
    {
        return $this->hasOne(SalaEspera::class, 'id', 'id_sala_espera');
    }

    public function televisor()
    {
        return $this->hasOne(Televisor::class, 'id', 'id_televisor');
    }

    public function box()
    {
        return $this->hasOne(BoxCm::class, 'id', 'id_box');
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }

    public function usuarioLlama()
    {
        return $this->hasOne(User::class, 'id', 'id_usuario_llama');
    }
}
