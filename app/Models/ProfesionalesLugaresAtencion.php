<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesionalesLugaresAtencion extends Model
{
    use HasFactory;
    protected $table = 'profesionales_lugares_atencion';

    public function LugaresAtencion()
    {
        return $this->belongsToMany(LugarAtencion::class, 'profesionales_lugares_atencion', 'id_profesional', 'id_lugar_atencion');
    }

    public function Profesionales()
    {
        return $this->hasMany(Profesional::class, 'id', 'id_profesional');
    }
}
