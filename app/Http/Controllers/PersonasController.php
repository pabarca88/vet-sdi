<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonasController extends Controller
{
    public function get_persona(Request $request){

        $datos = array();
        $filtro = array();
        $rut = '';
        if(!empty($request->rut))
            $rut = $request->rut;
        try {
            $users = DB::connection('sqlsrv')->select('SELECT rut
            ,nombre1
            ,nombre2
            ,appaterno
            ,apmaterno
            ,direccion
            ,ciudad
        FROM personas.dbo.personas
        WHERE rut ='.$rut.'');
		//FROM focus.dbo.vw_personas
        // FROM personas.[dbo].[personas]');
        } catch (\Throwable $th) {
            $datos['msj'] = 'error en consulta base de datos';
            $datos['error'] = $th;
        }

        return $datos;
    }
}
