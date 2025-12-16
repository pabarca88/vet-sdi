<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Users;
use App\Models\Paciente;
use App\Models\TipoAntecedente;
use App\Models\Profesional;

class Antecedente extends Model
{
    use HasFactory;

    protected $table = 'antecedente';
    protected $hidden = [
        'data'
    ];

    
    public function paciente(){

        return $this->hasOne(Paciente::class,'id','id_paciente');

    }
    public function tipo_antecendente(){

        return $this->hasOne(TipoAntecedente::class,'id','id_tipo_antecedente');

    }
    public function users(){

        return $this->hasOne(User::class,'id','id_users');

    }

    public function profesional(){

        return $this->hasOne(Profesional::class,'id','id_profesional');

    }
}
