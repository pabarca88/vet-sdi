<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GrupoSanguineo;
use App\Models\Alergia;
use App\Models\AntecedenteEnferCronica;
use App\Models\Organo;
use App\Models\Cirugia;

class AntecedentesPaciente extends Model
{
    use HasFactory;
    protected $table = 'antecedentes_paciente';

    public function GrupoSanguineo()
    {
        return $this->hasOne(GrupoSanguineo::class,'id','id_grupo_sanguineo');
    }

    public function Alergias()
    {
        return $this->belongsToMany(Alergia::class, 'antecedente_alergias', 'id_antecedentes', 'id_alergia');
    }

    public function EnfermedadesCronicas()
    {
        return $this->belongsToMany(EnfermedadCronica::class, 'antecedente_enfermedades_cronicas', 'id_antecedentes', 'id_enfermedad_cronica');
    }

    public function Productos()
    {
        return $this->belongsToMany(Producto::class, 'antecedente_enfermedades_cronicas', 'id_antecedentes', 'id_producto');
    }

    public function AntecenderEnfermedad()
    {
        return $this->hasMany(AntecedenteEnferCronica::class, 'id_antecedentes');
    }

    public function Organos()
    {
        return $this->belongsToMany(Organo::class, 'organos_antecedentes', 'id_antecedentes', 'id_organo');
    }

    public function Ciruguias()
    {
        return $this->belongsTo(Cirugia::class,'id', 'id_antecedentes');
    }

}
