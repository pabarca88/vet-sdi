<?php

namespace App\Http\Controllers;

use App\Models\TomaMuestra;
use App\Models\TomaMuestraDetalle;
use Illuminate\Http\Request;

class TomaMuestraController extends Controller
{

    /**
     * registrarMuestra
     * @var  Request $request
     * @return (object)
     */
    public function registrarMuestra(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_tipo_toma))
        {
            $error['TIPO TOMA'] = "campo requerido";
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = "campo requerido";
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = "campo requerido";
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['LUGAR ATENCION'] = "campo requerido";
            $valido = 0;
        }
        if(empty($request->patologo_lab))
        {
            $error['PATOLOGO O LABORATORIO'] = "campo requerido";
            $valido = 0;
        }
        if(empty($request->prioridad))
        {
            $error['URGENCIA'] = "campo requerido";
            $valido = 0;
        }
        if(empty($request->detalle))
        {
            $error['MUESTRA'] = "muestra requerida";
            $valido = 0;
        }


        if($valido)
        {
            $registro_muestra = static::registrar($request->id_tipo_toma, $request->id_ficha_atencion, $request->id_ficha_otros_prof, $request->id_ficha_gineco_obstetrica, $request->id_paciente, $request->id_profesional, $request->id_lugar_atencion, $request->patologo_lab, $request->sospecha, $request->prioridad, $request->observacion);
            if($registro_muestra->estado == 1)
            {
                $estado_reg_muestra = 1;
                $estado_reg_det_ok = 0;
                $estado_reg_det_erro = 0;
                $datos['toma_muestra']['estado'] = 1;
                $datos['toma_muestra']['msj'] = 'exito';

                foreach ($request->detalle as $key => $value)
                {
                    $registro_detalle = TomaMuestraDetalleController::registrar($registro_muestra->last_id, $value['id_tipo_embase'], $value['observacion']);
                    if($registro_detalle->estado == 1)
                    {
                        $datos['muestra'][$key]['estado'] = 1;
                        $datos['muestra'][$key]['msj'] = 'exito';
                        $estado_reg_det_ok++;
                    }
                    else
                    {
                        $datos['muestra'][$key]['estado'] = 0;
                        $datos['muestra'][$key]['msj'] = 'falla';
                        $estado_reg_det_erro++;
                    }
                }


                if($estado_reg_muestra == 1 && $estado_reg_det_erro > 0)
                {
                    $datos['estado'] = 2;
                    $datos['msj'] = 'Orden creada, con problema en guardado de la muestra.';
                }
                else if($estado_reg_muestra == 1 )
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Registro guardado con exito.';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en el registro.';

                $datos['toma_muestra']['estado'] = 0;
                $datos['toma_muestra']['msj'] = 'falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    static public function registrar($id_tipo_toma, $id_ficha_atencion, $id_ficha_otros_prof, $id_ficha_gineco_obstetrica, $id_paciente, $id_profesional, $id_lugar_atencion, $patologo_lab, $sospecha, $prioridad, $observacion)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_tipo_toma))
        {
            $error['TIPO TOMA'] = "campo requerido";
            $valido = 0;
        }
        if(empty($id_ficha_atencion) && empty($id_ficha_otros_prof) && empty($id_ficha_gineco_obstetrica))
        {
            $error['ID FICHA'] = "campo requerido";
            $valido = 0;
        }
        if(empty($id_paciente))
        {
            $error['PACIENTE'] = "campo requerido";
            $valido = 0;
        }
        if(empty($id_profesional))
        {
            $error['PROFESIONAL'] = "campo requerido";
            $valido = 0;
        }
        if(empty($id_lugar_atencion))
        {
            $error['LUGAR ATENCION'] = "campo requerido";
            $valido = 0;
        }
        if(empty($patologo_lab))
        {
            $error['PATOLOGO O LABORATORIO'] = "campo requerido";
            $valido = 0;
        }
        if(empty($prioridad))
        {
            $error['URGENCIA'] = "campo requerido";
            $valido = 0;
        }

        if($valido)
        {
            $registrar = new TomaMuestra();
            $registrar->id_tipo_toma = $id_tipo_toma;
            $registrar->id_ficha_atencion = $id_ficha_atencion;
            $registrar->id_ficha_otros_prof = $id_ficha_otros_prof;
            $registrar->id_ficha_gineco_obstetrica = $id_ficha_gineco_obstetrica;
            $registrar->id_paciente = $id_paciente;
            $registrar->id_profesional = $id_profesional;
            $registrar->id_lugar_atencion = $id_lugar_atencion;
            $registrar->fecha = date('Y-m-d H:i:s');
            $registrar->patologo_lab = $patologo_lab;
            $registrar->sospecha = $sospecha;
            $registrar->prioridad = $prioridad;
            $registrar->observacion = $observacion;
            $registrar->estado = 1;

            if($registrar->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
                $datos['last_id'] = $registrar->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'resgistro con falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function modificar($id, $id_tipo_toma, $id_ficha_atencion, $id_ficha_otros_prof, $id_ficha_gineco_obstetrica, $id_paciente, $id_profesional, $id_lugar_atencion, $fecha, $patologo_lab, $sospecha, $prioridad, $observacion, $estado)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id))
        {
            $error['ID'] = "campo requerido";
            $valido = 0;
        }
        if(empty($id_tipo_toma))
        {
            $error['TIPO TOMA'] = "campo requerido";
            $valido = 0;
        }
        if(empty($id_paciente))
        {
            $error['PACIENTE'] = "campo requerido";
            $valido = 0;
        }
        if(empty($id_profesional))
        {
            $error['PROFESIONAL'] = "campo requerido";
            $valido = 0;
        }
        if(empty($id_lugar_atencion))
        {
            $error['LUGAR ATENCION'] = "campo requerido";
            $valido = 0;
        }
        if(empty($patologo_lab))
        {
            $error['PATOLOGO O LABORATORIO'] = "campo requerido";
            $valido = 0;
        }
        if(empty($prioridad))
        {
            $error['URGENCIA'] = "campo requerido";
            $valido = 0;
        }

        if($valido)
        {
            $registrar = TomaMuestra::find($id);
            $registrar->id_tipo_toma = $id_tipo_toma;
            $registrar->id_ficha_atencion = $id_ficha_atencion;
            $registrar->id_ficha_otros_prof = $id_ficha_otros_prof;
            $registrar->id_ficha_gineco_obstetrica = $id_ficha_gineco_obstetrica;
            $registrar->id_paciente = $id_paciente;
            $registrar->id_profesional = $id_profesional;
            $registrar->id_lugar_atencion = $id_lugar_atencion;
            $registrar->fecha = $fecha;
            $registrar->patologo_lab = $patologo_lab;
            $registrar->sospecha = $sospecha;
            $registrar->prioridad = $prioridad;
            $registrar->observacion = $observacion;
            $registrar->estado = $estado;

            if($registrar->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
                $datos['last_id'] = $registrar->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'resgistro con falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function verRegistro_r(Request $request)
    {
        return static::verRegistro($request->id);
    }
    static public function verRegistro($id)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(!empty($id))
        {
            $error['ID'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = TomaMuestra::find($id);
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function verRegistros_r(Request $request)
    {
        return static::verRegistros($request->id, $request->id_tipo_toma, $request->id_ficha_atencion, $request->id_ficha_otros_prof, $request->id_ficha_gineco_obstetrica, $request->id_paciente, $request->id_profesional, $request->id_lugar_atencion, $request->fecha, $request->patologo_lab, $request->prioridad, $request->estado);
    }
    static public function verRegistros($id, $id_tipo_toma, $id_ficha_atencion, $id_ficha_otros_prof, $id_ficha_gineco_obstetrica, $id_paciente, $id_profesional, $id_lugar_atencion, $fecha, $patologo_lab, $prioridad, $estado)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $filtro = array();
            if(!empty($id))
                $filtro[] = array('id', $id);
            if(!empty($id_tipo_toma))
                $filtro[] = array('id_tipo_toma', $id_tipo_toma);
            if(!empty($id_ficha_atencion))
                $filtro[] = array('id_ficha_atencion', $id_ficha_atencion);
            if(!empty($id_ficha_otros_prof))
                $filtro[] = array('id_ficha_otros_prof', $id_ficha_otros_prof);
            if(!empty($id_ficha_gineco_obstetrica))
                $filtro[] = array('id_ficha_gineco_obstetrica', $id_ficha_gineco_obstetrica);
            if(!empty($id_paciente))
                $filtro[] = array('id_paciente', $id_paciente);
            if(!empty($id_profesional))
                $filtro[] = array('id_profesional', $id_profesional);
            if(!empty($id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion', $id_lugar_atencion);
            if(!empty($fecha))
                $filtro[] = array('fecha', $fecha);
            if(!empty($patologo_lab))
                $filtro[] = array('patologo_lab', $patologo_lab);
            if(!empty($prioridad))
                $filtro[] = array('prioridad', $prioridad);
            if(!empty($estado))
                $filtro[] = array('estado', $estado);

            $registro = TomaMuestra::where($filtro)->get();

            if($registro)
            {
                foreach ($registro as $key => $value) {
                    $detalle = TomaMuestraDetalle::where('id_toma_muestra', $value->id)->get();
                    $detalle_cantidad = TomaMuestraDetalle::where('id_toma_muestra', $value->id)->count();
                    $registro[$key]['toma_muestra_detalle'] = $detalle;
                    $registro[$key]['toma_muestra_detalle_cantidad'] = $detalle_cantidad;
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function eliminarRegistros_r(Request $request)
    {
        return static::eliminarRegistros($request->id, $request->id_paciente);
    }
    static public  function eliminarRegistros($id, $id_paciente)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id))
        {
            $error['ID'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro = array();
            $filtro[] = array('id', $id);
            $filtro[] = array('id_paciente', $id_paciente);

            $registro = TomaMuestra::where($filtro)->get()->first();

            if($registro)
            {

                $registro_detalle_delete = TomaMuestraDetalle::where('id_toma_muestra',$registro->id )->delete();

                if($registro_detalle_delete)
                {
                    $datos['detalle']['msj'] = 'detalle eliminado';

                    $registro_delete = $registro->delete();
                    if($registro_delete)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Toma muestra eliminada';
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'falla al eliminar toma de muestra';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla al eliminar detalle de toma muestra';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

}
