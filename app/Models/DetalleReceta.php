<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*use app\Models\Producto;
use app\Models\Dosis;
use app\Models\Presentacion;
use app\Models\Receta;*/

class DetalleReceta extends Model
{
    use HasFactory;
    protected $table = 'detalles_receta';

    public function RecetasPaciente()
    {
        return $this->hasOne(FichaAtencion::class, 'id', 'id_ficha');
    }

    public function IngresoPacienteCirugia()
    {
        return $this->hasOne(IngresoPacienteCirugia::class, 'id', 'id_ingreso_paciente');
    }

    public function RecuperancionCirugia()
    {
        return $this->hasOne(RecuperacionCirugia::class, 'id', 'id_recuperacion');
    }

    public function SalaCirugia()
    {
        return $this->hasOne(SalaCirugia::class, 'id', 'id_sala');
    }

    public function Producto()
    {
        return $this->hasOne(Articulo::class, 'id', 'id_articulo');
    }


    /*

    public function Dosis()
    {
        return $this->hasOne(Dosis::class,'id_dosis');
    }

    public function Presentacion()
    {
        return $this->hasOne(Presentacion::class,'id_presentacion');
    }

    public function Receta()
    {
        return $this->hasOne(Receta::class,'id_receta');
    }*/
}
