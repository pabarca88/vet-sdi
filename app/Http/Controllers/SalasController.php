<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiciosInternosSalas;

class SalasController extends Controller
{
    //
    public function dame_salas_atencion($id){
        $salas = ServiciosInternosSalas::where('id_servicio_interno',$id)->get();
        return $salas;
    }
}
