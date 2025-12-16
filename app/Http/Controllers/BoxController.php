<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoxCm;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    //
    public function guardarBoxServicio(Request $request){
        try {
            
            $existe = BoxCm::where('numero_box', $request->numero_box)->where('id_lugar_atencion', $request->id_lugar_atencion)->first();
            if($existe){
                return ['estado' => 0, 'mensaje' => 'Ya existe un box con el número ingresado'];
            }
            $box_cm = new BoxCm();
            $box_cm->id_institucion = $request->id_institucion;
            $box_cm->id_lugar_atencion = $request->id_lugar_atencion;
            $box_cm->numero_box = $request->numero_box;
            $box_cm->tipo_box = $request->tpo_box_servicio;
            $box_cm->tipo_especializacion = $request->tpo_especializacion;
            $box_cm->ubicacion = $request->tpo_equip_servicio;
            $box_cm->seccion = $request->seccion_box;
            $box_cm->id_usuario = Auth::user()->id;
            if($box_cm->save()){
                $boxes_cm = $this->dame_boxes_cm($request->id_lugar_atencion);
                $v = view('fragm.boxes_cm',['boxes_servicio' => $boxes_cm])->render();
                return ['estado' => 1, 'mensaje' => 'Box guardado correctamente', 'v' => $v];
            }else{
                return ['estado' => 0, 'mensaje' => 'Error al guardar el box'];
            }
        } catch (\Exception $e) {
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }
    }

    public function dameBox($id){
        try {
            $box = BoxCm::find($id);
            return ['estado' => 1, 'box' => $box];
        } catch (\Exception $e) {
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }
    }

    public function editarBoxServicio(Request $request){
        try {
            $box_cm = BoxCm::find($request->id_box);
            $box_cm->id_institucion = $request->id_institucion;
            $box_cm->id_lugar_atencion = $request->id_lugar_atencion;
            $box_cm->numero_box = $request->numero_box;
            $box_cm->tipo_box = $request->tpo_box_servicio;
            $box_cm->tipo_especializacion = $request->tpo_especializacion;
            $box_cm->ubicacion = $request->tpo_equip_servicio;
            $box_cm->seccion = $request->seccion_box;
            $box_cm->id_usuario = Auth::user()->id;
            if($box_cm->save()){
                $boxes_cm = $this->dame_boxes_cm($request->id_lugar_atencion);
                $v = view('fragm.boxes_cm',['boxes_servicio' => $boxes_cm])->render();
                return ['estado' => 1, 'mensaje' => 'Box actualizado correctamente', 'v' => $v];
            }else{
                return ['estado' => 0, 'mensaje' => 'Error al actualizar el box'];
            }
        } catch (\Exception $e) {
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }
    }

    public function eliminarBoxServicio(Request $request){
        try {
            $box_cm = BoxCm::find($request->id);
            if($box_cm->delete()){
                $boxes_cm = $this->dame_boxes_cm($request->id_lugar_atencion);
                $v = view('fragm.boxes_cm',['boxes_servicio' => $boxes_cm])->render();
                return ['estado' => 1, 'mensaje' => 'Box eliminado correctamente', 'v' => $v];
            }else{
                return ['estado' => 0, 'mensaje' => 'Error al eliminar el box'];
            }
        } catch (\Exception $e) {
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }
    }

    public function dame_boxes_cm($id_lugar_atencion){
        $boxes = BoxCm::where('id_lugar_atencion',$id_lugar_atencion)->get();
        foreach($boxes as $box){
            if($box->seccion == '1') $box->seccion = 'Pediatría';
            if($box->seccion == '2') $box->seccion = 'General';
            if($box->seccion == '3') $box->seccion = 'Gineco-Obstetricia';
            if($box->seccion == '4') $box->seccion = 'Rehabilitación';
        }
        return $boxes;
    }
}
