<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FichaAtencion;
use App\Models\UsoPersonal;
use Illuminate\Http\Request;

class UsoPersonalController extends Controller
{
    public function verRegistros(Request $request)
    {
        $datos = array();
        $filtros = array();
        if(!empty($request->dirigido))
            $filtros[] = array('dirigido','like', '%'.$request->dirigido.'%');
        if(!empty($request->cargo))
            $filtros[] = array('cargo','like', '%'.$request->cargo.'%');
        if(!empty($request->mensaje))
            $filtros[] = array('mensaje','like', '%'.$request->mensaje.'%');
        if(!empty($request->id_paciente))
            $filtros[] = array('id_paciente', $request->id_paciente);
        if(!empty($request->id_profesional))
            $filtros[] = array('id_profesional', $request->id_profesional);
        if(!empty($request->id_ficha_atencion))
            $filtros[] = array('id_ficha_atencion', $request->id_ficha_atencion);
        if(!empty($request->id_lugar_atencion))
            $filtros[] = array('id_lugar_atencion', $request->id_lugar_atencion);
        if(!empty($request->created_at))
            $filtros[] = array('created_at','like', $request->created_at.'%');

        $registros = UsoPersonal::where($filtros)->get();

        $nombre_paciente = '';
        $id_paciente = '';

        if(isset($request->id_ficha_atencion))
        {
            $registro_ficha = FichaAtencion::with(['Paciente' => function($query){
                                                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos')->get();
                                                }])
                                                ->where('id',$request->id_ficha_atencion)->first();

            $nombre_paciente = $registro_ficha->Paciente->nombres.' '.$registro_ficha->Paciente->apellido_uno . ' '. $registro_ficha->Paciente->apellido_dos;
            $id_paciente = $registro_ficha->Paciente->id;
        }


        if(count($registros) > 0)
        {
            $datos['estado'] = 1;
            $datos['registros'] = $registros;
            $datos['paciente'] = array(
                'nombre_paciente' => $nombre_paciente,
                'id_paciente' => $id_paciente,
            );
            $datos['msj'] = 'Registros encontrados';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['registros'] = array();
            $datos['msj'] = 'No se han agregado Medicamentos a esta Ficha.';
            $datos['paciente'] = array(
                'nombre_paciente' => $nombre_paciente,
                'id_paciente' => $id_paciente,
            );
        }


        return $datos;
    }
}
