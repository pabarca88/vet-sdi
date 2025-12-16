<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ExamenMedico;
use App\Models\ExamenSolicitudServicio;
use Illuminate\Http\Request;

class ExamenMedicoController extends Controller
{
    public function get_sub_tipo_examen(Request $request)
    {
        $sub_tipo_examen = ExamenMedico::where('cod_parent', $request->tipo_examen)->where('habilitado', 1)->orderBy('nombre_examen','ASC')->get();
        return json_encode($sub_tipo_examen);
    }

    public function get_examen(Request $request)
    {
        $examen = ExamenMedico::where('cod_parent', $request->sub_tipo_examen)->where('habilitado', 1)->orderBy('nombre_examen','ASC')->get();
        return json_encode($examen);
    }

    public function buscar_examen(Request $request)
    {
        $examen = ExamenMedico::where('cod_examen', $request->id)->where('habilitado', 1)->orderBy('nombre_examen','ASC')->first();
        return $examen;
    }

    public function indicar_examen_cirugia(Request $request)
    {
        try {
            $tipo_examen = $request->tipo_examen;
            $sub_tipo_examen = $request->sub_tipo_examen;
            $examen = $request->examen;
            $lado = $request->lado;
            $prioridad = $request->prioridad;
            $imagenologia_con_contraste = $request->imagenologia_con_contraste;

            $nueva_solicitud_examen = new ExamenSolicitudServicio();
            $nueva_solicitud_examen->id_institucion = 1;
            $nueva_solicitud_examen->id_servicio = 1;
            $nueva_solicitud_examen->id_paciente = $request->id_paciente;
            $nueva_solicitud_examen->id_ficha_atencion = $request->id_ficha_atencion;
            $nueva_solicitud_examen->id_responsable = Auth::user()->id;
            // crear un objeto json con los datos del examen
            $datos_examen = array(
                'id_examen' => $request->id_examen,
                'tipo_examen' => $tipo_examen,
                'sub_tipo_examen' => $sub_tipo_examen,
                'examen' => $examen,
                'lado' => $lado,
                'prioridad' => $prioridad,
                'imagenologia_con_contraste' => $imagenologia_con_contraste,
            );
            $nueva_solicitud_examen->datos_examen = json_encode($datos_examen);

            if($nueva_solicitud_examen->save()){
                $examenes_solicitados = $this->dame_examenes_solicitados($request->id_paciente, $request->id_ficha_atencion);

                return response()->json(['estado' => 'success', 'mensaje' => 'Examen solicitado correctamente','examenes' => $examenes_solicitados]);
            }else{
                $examenes_solicitados = $this->dame_examenes_solicitados($request->id_paciente, $request->id_ficha_atencion);
                return response()->json(['estado' => 'error', 'mensaje' => 'Error al solicitar el examen','examenes' => $examenes_solicitados]);
            }
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['estado' => 'error', 'mensaje' => 'Error al solicitar el examen: '.$e->getMessage(),'examenes' => []]);
        }

    }

    public function indicar_examen_hosp(Request $request)
    {
        try {

            $tipo_examen = $request->tipo_examen;
            $sub_tipo_examen = $request->sub_tipo_examen;
            $examen = $request->examen;
            $lado = $request->lado;
            $prioridad = $request->prioridad;
            $imagenologia_con_contraste = $request->imagenologia_con_contraste;

            $nueva_solicitud_examen = new ExamenSolicitudServicio();
            $nueva_solicitud_examen->id_institucion = 1;
            $nueva_solicitud_examen->id_servicio = 1;
            $nueva_solicitud_examen->id_paciente = $request->id_paciente;
            $nueva_solicitud_examen->id_ficha_atencion = $request->id_ficha_atencion;
            $nueva_solicitud_examen->id_responsable = Auth::user()->id;
            $nueva_solicitud_examen->otros = 'hosp';
            // crear un objeto json con los datos del examen
            $datos_examen = array(
                'tipo_examen' => $tipo_examen,
                'sub_tipo_examen' => $sub_tipo_examen,
                'examen' => $examen,
                'lado' => $lado,
                'prioridad' => $prioridad,
                'imagenologia_con_contraste' => $imagenologia_con_contraste,
            );
            $nueva_solicitud_examen->datos_examen = json_encode($datos_examen);

            if($nueva_solicitud_examen->save()){
                $examenes_solicitados = $this->dame_examenes_solicitados($request->id_paciente, $request->id_ficha_atencion);

                return response()->json(['estado' => 'success', 'mensaje' => 'Examen solicitado correctamente','examenes' => $examenes_solicitados]);
            }else{
                $examenes_solicitados = $this->dame_examenes_solicitados($request->id_paciente, $request->id_ficha_atencion);
                return response()->json(['estado' => 'error', 'mensaje' => 'Error al solicitar el examen','examenes' => $examenes_solicitados]);
            }
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['estado' => 'error', 'mensaje' => 'Error al solicitar el examen: '.$e->getMessage(),'examenes' => []]);
        }

    }

    public function dame_examenes_hosp(Request $request){
        $id_ficha_atencion = $request->id_ficha_atencion;
        $id_paciente = $request->id_paciente;
        $examenes_solicitados = ExamenSolicitudServicio::select('examenes_solicitudes_servicio.*', 'users.name as responsable')
                                ->leftJoin('users', 'examenes_solicitudes_servicio.id_responsable', 'users.id')
                                ->where('examenes_solicitudes_servicio.id_paciente', $id_paciente)
                                ->where('examenes_solicitudes_servicio.otros','hosp')
                                ->when($id_ficha_atencion, function ($query, $id_ficha_atencion) {
                                    return $query->where('examenes_solicitudes_servicio.id_ficha_atencion', $id_ficha_atencion);
                                })
                                ->get();
        foreach ($examenes_solicitados as $examen_solicitado) {
            $examen_solicitado->datos_examen = json_decode($examen_solicitado->datos_examen);
            $examen_solicitado->fecha = date('d-m-Y', strtotime($examen_solicitado->created_at));
            $examen_solicitado->hora = date('H:i', strtotime($examen_solicitado->created_at));
        }
        return $examenes_solicitados;
    }

    public function eliminar_examen_hosp(Request $request){
        $examen = ExamenSolicitudServicio::find($request->id);
        if($examen->delete()){
            return ['estado' => 1,',mensaje' => 'Se ha eliminado el examen con éxito'];
        }else{
            return ['estado' => 0,',mensaje' => 'Ha ocurrido un error'];
        }
    }

    public function dame_examenes_solicitados($id_paciente, $id_ficha_atencion = null){
        $examenes_solicitados = ExamenSolicitudServicio::select('examenes_solicitudes_servicio.*', 'users.name as responsable')
                                ->leftJoin('users', 'examenes_solicitudes_servicio.id_responsable', 'users.id')
                                ->where('examenes_solicitudes_servicio.id_paciente', $id_paciente)
                                ->when($id_ficha_atencion, function ($query, $id_ficha_atencion) {
                                    return $query->where('examenes_solicitudes_servicio.id_ficha_atencion', $id_ficha_atencion);
                                })
                                ->get();
        foreach ($examenes_solicitados as $examen_solicitado) {
            $examen_solicitado->datos_examen = json_decode($examen_solicitado->datos_examen);
            $examen_solicitado->fecha = date('d-m-Y', strtotime($examen_solicitado->created_at));
            $examen_solicitado->hora = date('H:i', strtotime($examen_solicitado->created_at));
        }
        return $examenes_solicitados;
    }

    public function eliminar_examen_cirugia(Request $req){
        $examen = ExamenSolicitudServicio::find($req->id);
        if($examen->delete()){
            $examenes_solicitados = $this->dame_examenes_solicitados($req->id_paciente, $req->id_ficha_atencion);
            return response()->json(['estado' => 'success', 'mensaje' => 'Examen eliminado correctamente','examenes' => $examenes_solicitados]);
        }else{
            $examenes_solicitados = $this->dame_examenes_solicitados($req->id_paciente, $req->id_ficha_atencion);
            return response()->json(['estado' => 'error', 'mensaje' => 'Error al eliminar el examen','examenes' => $examenes_solicitados]);
        }
    }
}
