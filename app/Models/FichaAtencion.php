<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\PresupuestoMascota;



class FichaAtencion extends Model

{

    use HasFactory;

    protected $table = 'fichas_atenciones';



    public function Paciente()

    {

        return $this->hasOne(Paciente::class, 'id', 'id_paciente');

    }



    public function Profesional()

    {

        return $this->hasOne(Profesional::class, 'id', 'id_profesional');

    }



    public function Licencias()

    {

        // return $this->belongsToMany(Licencia::class, 'licencias_ppf', 'id_ficha_atencion', 'id_licencia');
        return $this->hasMany(Licencia::class, 'id_ficha_atencion', 'id' );

    }



    public function Recetas()

    {

        //return $this->belongsToMany(DetalleReceta::class, 'id_ficha', 'id');

		return $this->hasMany(DetalleReceta::class, 'id_ficha', 'id');

    }



    public function Examenes()

    {

        return $this->belongsTo(ExamenPPF::class, 'id', 'id_ficha_atencion');

    }

    public function LugarAtencion()

    {

        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');

    }

    public function PresupuestosMascota()
    {
        return $this->hasMany(PresupuestoMascota::class, 'id_ficha_atencion', 'id');
    }

}
