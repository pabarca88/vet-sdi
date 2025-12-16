<?php

namespace App\Http\Controllers;

use App\Models\HoraMedica;
use App\Models\Bono;
use Illuminate\Http\Request;

class HoraMedicaController extends Controller
{
    function verHorasMedicas(Request $request)
    {
        $datos = array();
        $filtro= array();

        if(!empty($request->fecha_consulta))
        {
            $filtro[] = array('fecha_consulta',$request->fecha_consulta);
        }
        if(!empty($request->id_ficha_atencion))
        {
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        }
        if(!empty($request->id_profesional))
        {
            $filtro[] = array('id_profesional',$request->id_profesional);
        }
        if(!empty($request->id_lugar_atencion))
        {
            $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
        }
        if(!empty($request->id_asistente))
        {
            $filtro[] = array('id_asistente',$request->id_asistente);
        }
        if(!empty($request->id_paciente))
        {
            $filtro[] = array('id_paciente',$request->id_paciente);
        }
        if(!empty($request->id_estado))
        {
            $filtro[] = array('id_estado',$request->id_estado);
        }
		if(!empty($request->id_box))
        {
            $filtro[] = array('id_box',$request->id_box);
        }

        // # ESTADO HORA ATENCION
        // 1. RESERVADA
        // 2. CONFIRMADO
        // 3. RECHAZADA
        // 4. ESPERA
        // 5. REALIZANDO
        // 6. REALIZADA
        // 7. INASISTIDA
        // 8. LLAMANDO
        // 9. EXAMEN REALIZADO SIN CARGA DE RESULTADO
        // 10. EXAMEN REALIZADO CON CARGA DE RESULTADO
        // 11. EXAMEN TRANSCRITO
        // 12. EXAMEN FINALIZADO
        // 13. BLOQUEO POR PROFESIONAL.
        // 14. ANULADA POR PROFESIONAL
        // 15. HORA ANULADA POR PROFESIONAL
        // 16. PRE RESERVA
        $registros = HoraMedica::where($filtro)
                                ->whereIn('id_estado',[1,2,4,5,6,7,8,9,10,11,12,13,16])
                                ->with('Estado')
                                ->with(['Paciente'=> function($query){
                                    $query->select('id','id_prevision','rut')
                                            ->with(['Prevision'=>function($query2){
                                                        $query2->select('id','nombre');
                                    }]);
                                }])
                                ->get();
        if(count($registros)>0)
        {
            $datos['estado'] = 1;
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    function verRegistrosDia(Request $request)
    {

        $datos = array();
        $filtro= array();

        if(!empty($request->fecha_consulta))
        {
            $filtro[] = array('fecha_consulta',$request->fecha_consulta);
        }
        if(!empty($request->id_ficha_atencion))
        {
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        }
        if(!empty($request->id_profesional))
        {
            $filtro[] = array('id_profesional',$request->id_profesional);
        }
        if(!empty($request->id_lugar_atencion))
        {
            $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
        }

        // # ESTADO HORA ATENCION
        // 1. RESERVADA
        // 2. CONFIRMADO
        // 4. ESPERA
        // 5. REALIZANDO
        // 8. LLAMANDO
        // 16. PRERESERVA

        $registros = HoraMedica::where($filtro)
                                ->whereIn('id_estado',[1,2,4,5,8,16])
                                ->with('Estado')
                                ->with(['Paciente'=> function($query){
                                    $query->select('id','nombres', 'apellido_uno', 'apellido_dos', 'rut')
                                            ->with(['Prevision'=>function($query2){
                                                        $query2->select('id','nombre');
                                    }]);
                                }])
                                ->get();
        if(count($registros)>0)
        {
            try {
                foreach($registros as $r){
                    if($r->estado->id !== 2){
                        $bono = Bono::where('id_referencia',$r->id)->first();
                        $r->dato = $bono ? $bono : null;
                    }
                }
            } catch (\Exception $e) {
                //throw $th;
                return $e->getMessage();
            }

            $datos['estado'] = 1;
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

}
