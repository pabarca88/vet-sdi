<?php

namespace App\Http\Controllers;

use App\Models\FichaAtencion;
use App\Models\LugarAtencion;
use App\Models\OftalmoRecetaLente;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\RecetaAudifono;
use App\Models\Recomendacion;
use App\Models\RecomendacionDetalle;
use ArrayObject;
use Illuminate\Http\Request;

// Auth
use Illuminate\Support\Facades\Auth;

class RecomendacionController extends Controller
{
    /** RECOMENDACIONES */
    public function registrarRecomendacion_r(Request $request)
    {
        return $this->registrarRecomendacion($request->atencion, $request->salida, $request->herir, $request->cuadro, $request->activo, $request->aficionado, $request->control, $request->cod_doc, $request->cod_auto, $request->info);
    }

    static public function registrarRecomendacion($atencion, $salida, $herir, $cuadro, $activo, $aficionado, $control, $cod_doc, $cod_auto, $info)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($atencion) && empty($salida) && empty($herir) && empty($cuadro))
        {
            $error['ID ATENCION'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($atencion)) // id_ficha_atencion
        // {
        //     $error['FICHA ATENCION'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($salida)) // id_ingreso_paciente
        // {
        //     $error['INGRESO PACIENTE'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($herir)) // id_recuperacion
        // {
        //     $error['RECUPERACION'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($cuadro)) // id_sala
        // {
        //     $error['SALA'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($activo)) // id_paciente
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($aficionado)) // id_profesional
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($control)) // id_tipo_control
        {
            $error['TIPO CONTROL'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($cod_doc)) // token_doc
        // {
        //     $error['TOKEN DOC'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($cod_auto)) // token_auto
        // {
        //     $error['TOKEN AUTO'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($info)) // token_auto
        // {
        //     $error['PDF'] = 'campo requerido';
        //     $valido = 0;
        // }


        if($valido)
        {
            $registro = new Recomendacion();
            $registro->atencion = $atencion;
            $registro->salida = $salida;
            $registro->herir = $herir;
            $registro->cuadro = $cuadro;
            $registro->activo = $activo;
            $registro->aficionado = $aficionado;
            $registro->control = $control;
            $registro->cod_doc = $cod_doc; // AGREGAR CLAVE DE SEGURIDAD DIARIA
            $registro->cod_auto = $cod_auto;
            $registro->info = $info;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Exito';
                $datos['last_id'] = $registro->id;

                $token_doc_temp = (object)CertificadoController::certificadoDocumento((int)$atencion, (int)$aficionado, (int)$activo, 1, $registro->id);
                $token_doc = $token_doc_temp->certificado;

                $registro_2 = Recomendacion::find($registro->id);
                $registro_2->cod_doc = $token_doc;
                $registro_2->save();

                /** REGISTRAR FIRMA PROFESIONAL */
                $papeleria_token = session('lic_token');
                $papeleria_log_id = session('lic_log_id');
                $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$aficionado, $papeleria_token, $papeleria_log_id, "1", $registro->id);

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en registro Recomendacion';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    /** RECOMENDACION DETALLE */
    public function registrarDetalle_r(Request $request)
    {
        return $this->registrarDetalle($request->id_recomendacion, $request->control, $request->id_articulo, $request->articulo, $request->componente, $request->id_apariencia, $request->apariencia, $request->id_cuota, $request->cuota, $request->id_regimen, $request->regimen, $request->id_lapso, $request->lapso, $request->uso_frecuente, $request->volumen_compra, $request->volumen, $request->volumen_entregado, $request->comentario, $request->cod_doc);
    }

    static public function registrarDetalle($id_recomendacion, $control, $id_articulo, $articulo, $componente, $id_apariencia, $apariencia, $id_cuota, $cuota, $id_regimen, $regimen, $id_lapso, $lapso, $uso_frecuente, $volumen_compra, $volumen, $volumen_entregado, $comentario, $cod_doc)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_recomendacion)) //id_receta
        {
            $error['RECETA'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($control)) //id_tipo_control
        {
            $error['TIPO CONTROL'] = 'campo requerido';
            $valido = 0;
        }
        else if($control != 8)
        {
            if(!empty($articulo)) //producto
            {
                $temp = $articulo;
                if(is_int($temp))
                {
                    if(empty($componente)) //producto
                    {
                        $error['FARMACO'] = 'campo requerido';
                        $valido = 0;
                    }
                }
                else if(json_decode($temp))
                {
                    // echo 'json';
                }
            }

        }

        // if(empty($id_articulo)) //id_producto
        // {
        //     $error['N° PRODUCTO'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($articulo)) //producto
        {
            $error['PRODUCTO'] = 'campo requerido';
            $valido = 0;
        }



        // if(empty($id_apariencia)) //id_presentacion
        // {
        //     $error['ID PRESENTACION'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($apariencia)) //presentacion
        {
            $error['PRESENTACION'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($id_cuota)) //id_receta_dosis
        // {
        //     $error['ID POSOLOGIA'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($cuota)) //posologia
        {
            $error['POSOLOGIA'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($id_regimen)) //id_via_administracion
        // {
        //     $error['ID VIA ADMINISTRACION'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($regimen)) //via_administracion
        {
            $error['VIA ADMINISTRACION'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($id_lapso)) //id_periodo
        // {
        //     $error['ID PERIODO'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($lapso)) //periodo
        {
            $error['PERIODO'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($uso_frecuente)) //uso_cronico
        // {
        //     $error['USO CRONICO'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($volumen_compra)) //cantidad_compra
        {
            $error['CANTIDAD COMPRA'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($volumen)) //cantidad
        {
            $error['CANTIDAD'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($volumen_entregado)) //cantidad_vendida
        // {
        //     $error['CANTIDAD VENDIDA'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($comentario)) //comentario
        // {
        //     $error['COMENTARIO'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($cod_doc)) //token_doc
        {
            $error['TOKEN DOC'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {

            $registro_recomendacion = Recomendacion::find($id_recomendacion);

            $registro = new RecomendacionDetalle();
            $registro->id_recomendacion = $id_recomendacion; //id_receta
            $registro->control = encrypt($control); //id_tipo_control
            if($control == 8)
            {
                $registro->id_articulo = encrypt('0'); //id_producto
                $registro->articulo = encrypt($id_articulo); //producto
            }
            else
            {
                $registro->id_articulo = encrypt($id_articulo); //id_producto
                $registro->articulo = encrypt($articulo); //producto
            }
            $registro->componente = encrypt($componente); //farmaco
            $registro->id_apariencia = encrypt($id_apariencia); //id_presentacion
            $registro->apariencia = encrypt($apariencia); //presentacion
            $registro->id_cuota = encrypt($id_cuota); //id_receta_dosis
            $registro->cuota = encrypt($cuota);//posologia
            $registro->id_regimen = encrypt($id_regimen); //id_via_administracion
            $registro->regimen = encrypt($regimen); //via_administracion
            $registro->id_lapso = encrypt($id_lapso); //id_periodo
            $registro->lapso = encrypt($lapso); //periodo
            $registro->uso_frecuente = encrypt($uso_frecuente); //uso_cronico
            $registro->volumen_compra = encrypt($volumen_compra); //cantidad_compra
            $registro->volumen = encrypt($volumen); //cantidad
            $registro->volumen_entregado = encrypt($volumen_entregado); //cantidad_vendida
            $registro->comentario = encrypt($comentario); //comentario
            $registro->cod_doc = $registro_recomendacion->cod_doc; //token_doc

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Exito';
                $datos['last_id'] = $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en registro de detalle';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    /** REGISTRO DE RECETA  */
    public function registroRecomendacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if( empty($request->id_ficha) && empty($request->id_ingreso_paciente) && empty($request->id_recuperacion) && empty($request->id_sala) )
        {
            $error['ID ATENCION'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_lugar_atencion))
        {
            $error['LUGAR ATENCION'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($request->id_tipo_control))
        // {
        //     $error['TIPO RECETA'] = 'campo requerido';
        //     $valido = 0;
        // }


        if($valido)
        {
            $id_receta = $request->id_receta;
            $id_ficha_atencion = $request->id_ficha;
            $id_ingreso_paciente = $request->id_ingreso_paciente;
            $id_recuperacion = $request->id_recuperacion;
            $id_sala = $request->id_sala;
            $id_paciente = $request->id_paciente;
            $id_profesional = $request->id_profesional;
            $id_lugar_atencion = $request->id_lugar_atencion;
            // $id_tipo_control = $request->id_tipo_control;
            $pdf = '';
            $token_doc_temp = (object)CertificadoController::certificadoDocumento((int)$id_ficha_atencion, (int)$id_profesional, (int)$id_paciente, 1);
            $token_doc = $token_doc_temp->certificado;


            /** BUSCAR CABECERA */
            $registros_recomendacion = Recomendacion::where( 'atencion', $id_ficha_atencion )->get();

            if($registros_recomendacion)
            {
                foreach ($registros_recomendacion as $key => $value)
                {
                    /** LIMPIAR DETALLE */
                    $borrar_detalle = RecomendacionDetalle::where( 'id_recomendacion', $value->id )->delete();

                    /** LIMPIAR CABECERAS */
                    $borrar_cabecera = Recomendacion::where( 'id', $value->id )->delete();

                    $datos['borrar_detalle'][] = $borrar_detalle;
                    $datos['borrar_cabecera'][] = $borrar_cabecera;
                }
            }

            /** DIVIDIR DETALLE */
            $med_tipo_control = array();
            $medicamentos = json_decode($request->medicamentos);
            if ($request->medicamentos !== '[]' )
            {
                foreach ($medicamentos as $key => $value)
                {
                    switch (intval($value->id_tipo_control))
                    {
                        case 4: //Receta retenida
                        case 6: //Receta Simple
                        case 7: //Venta Directa
                            $med_tipo_control[6][] = $value;
                            break;
                        case 1: //Receta retenida con control de Psicotrópicos
                            $med_tipo_control[1][] = $value;
                            break;
                        case 2: //Receta retenida con control de Estupefacientes
                            $med_tipo_control[2][] = $value;
                            break;
                        case 3: //Receta Cheque
                            $med_tipo_control[3][] = $value;
                            break;
                        case 5: //Receta retenida con control de Codeína
                            $med_tipo_control[5][] = $value;
                            break;
                        case 8: //Magistral
                            $med_tipo_control[8][] = $value;
                            break;
                    }
                }
            }

            // echo json_encode($med_tipo_control);
            /** RECORRER TIPO CONTROL */
            foreach ($med_tipo_control as $key_2 => $value_2)
            {

                if(!empty($value_2))
                {
                    // var_dump($value_2);

                    /** CREAR CABECERA POR TIPO TIPO CONTRO */
                    $registro = (object)$this->registrarRecomendacion(  $id_ficha_atencion, // $atencion
                                                                $id_ingreso_paciente, // $salida
                                                                $id_recuperacion, // $herir
                                                                $id_sala, // $cuadro
                                                                $id_paciente, // $activo
                                                                $id_profesional, // $aficionado
                                                                $key_2, // $control
                                                                $token_doc, // $cod_doc
                                                                session('lic_token'),// $token_auto, // $cod_auto
                                                                $pdf, // $info
                                                            );
                    if($registro->estado)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Registro de Receta';
                        $datos['recomendacion'][$key_2]['cabecera'] = $registro;

                        $exito = 0;
                        $falla = 0;
                        /** CARGA DETALLE  */
                        foreach ($value_2 as $key_3 => $value_3)
                        {
                            $temp = $value_3->producto;
                            $tipo_control = $value_3->id_tipo_control;
                            if(is_int($temp))
                            {
                                $tipo_control = $value_3->id_tipo_control;
                            }
                            else if(json_decode($temp))
                            {
                                $tipo_control = 8;
                            }
                            $detalle_registro = (object) $this->registrarDetalle(   $registro->last_id,
                                                                                    $tipo_control, // $control
                                                                                    $value_3->id_producto, // $id_articulo
                                                                                    $value_3->producto, // $articulo
                                                                                    $value_3->componente, // $farmaco
                                                                                    $value_3->id_dosis, // $id_apariencia
                                                                                    $value_3->dosis, // $apariencia
                                                                                    $value_3->id_posologia, // $id_cuota
                                                                                    $value_3->posologia, // $cuota
                                                                                    $value_3->id_via_administracion, // $id_regimen
                                                                                    $value_3->via_administracion, // $regimen
                                                                                    $value_3->id_periodo, // $id_lapso
                                                                                    $value_3->periodo, // $lapso
                                                                                    $value_3->uso_cronico, // $uso_frecuente
                                                                                    $value_3->cantidad_comprar, // $volumen_compra
                                                                                    $value_3->cantidad, // $volumen
                                                                                    0, // $volumen_entregado
                                                                                    '', // $comentario
                                                                                    $token_doc, // $cod_doc
                                                                        );
                            if($detalle_registro->estado == 1)
                            {
                                $datos['recomendacion'][$key_2]['detalle'][$key_3] = $detalle_registro;
                                $exito++;
                            }
                            else
                            {
                                $datos['recomendacion'][$key_2]['detalle'][$key_3] = $detalle_registro;
                                $falla++;
                            }
                        }
                        $datos['exito'] = $exito;
                        $datos['falla'] = $falla;
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Falla registro de Receta';
                    }
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    /** CARGAR RECETAS */
    static public function verRecomendaciones(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        $filtros = array();

        if(!empty($request->id))
            $filtros[] = array('id', $request->id);
        if(!empty($request->id_ficha))
            $filtros[] = array('atencion', $request->id_ficha);
        if(!empty($request->id_ingreso_paciente))
            $filtros[] = array('salida', $request->id_ingreso_paciente);
        if(!empty($request->id_recuperacion))
            $filtros[] = array('herir', $request->id_recuperacion);
        if(!empty($request->id_sala))
            $filtros[] = array('cuadro', $request->id_sala);
        if(!empty($request->id_paciente))
            $filtros[] = array('activo', $request->id_paciente);
        if(!empty($request->id_profesional))
            $filtros[] = array('aficionado', $request->id_profesional);
        // if(!empty($request->id_tipo_control))
        //     $filtros[] = array('control', $request->id_tipo_control);
        if(!empty($request->token_doc))
            $filtros[] = array('cod_doc', $request->token_doc);
        if(!empty($request->token_auto))
            $filtros[] = array('cod_auto', $request->token_auto);

        $registros = Recomendacion::where($filtros)
                                    ->tipoControl($request->id_tipo_control)
                                    ->anio($request->anio)
                                    ->mes($request->mes)
                                    ->get();

        if($registros)
        {
            $regisrto_result = array();
            foreach ($registros as $key => $value)
            {
                $paciente = Paciente::find($value->activo);
                $detalle = RecomendacionDetalle::where('id_recomendacion',$value->id)->get();
                $detalle_temp = array();
                if($detalle)
                {
                    $detalle_temp = array();
                    foreach ($detalle as $key_det => $value_det)
                    {
                        $detalle_temp[] = array(
                            'id' => $value_det->id,
                            'id_receta' => $value_det->id_recomendacion,
                            'id_tipo_control' => decrypt($value_det->control),
                            'id_producto' => decrypt($value_det->id_articulo),
                            'producto' => decrypt($value_det->articulo),
                            'farmaco' => decrypt($value_det->componente),
                            'id_presentacion' => decrypt($value_det->id_apariencia),
                            'presentacion' => decrypt($value_det->apariencia),
                            'id_receta_dosis' => decrypt($value_det->id_cuota),
                            'posologia' => decrypt($value_det->cuota),
                            'id_via_administracion' => decrypt($value_det->id_regimen),
                            'via_administracion' => decrypt($value_det->regimen),
                            'id_periodo' => decrypt($value_det->id_lapso),
                            'periodo' => decrypt($value_det->lapso),
                            'uso_cronico' => decrypt($value_det->uso_frecuente),
                            'cantidad_compra' => decrypt($value_det->volumen_compra),
                            'cantidad' => decrypt($value_det->volumen),
                            'cantidad_vendida' => decrypt($value_det->volumen_entregado),
                            'comentario' => decrypt($value_det->comentario),
                            'token_doc' => $value_det->cod_doc,
                            'estado' => $value_det->estado,
                            'created_at' => $value_det->created_at,
                            'updated_at' => $value_det->updated_at,
                        );
                    }
                }

                $datos['paciente'] = $paciente;
                $regisrto_result[] = array(
                    'id' => $value->id,
                    'id_ficha_atencion' => $value->atencion,
                    'id_ingreso_paciente' => $value->salida,
                    'id_recuperacion' => $value->herir,
                    'id_sala' => $value->cuadro,
                    'id_paciente' => $value->activo,
                    'id_profesional' => $value->aficionado,
                    'id_tipo_control' => $value->control,
                    'token_doc' => $value->cod_doc,
                    'token_auto' => $value->cod_auto,
                    'pdf' => $value->info,
                    'estado' => $value->estado,
                    'detalle' => $detalle_temp,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,

                );
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $regisrto_result;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    public function verPDF(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if( empty($request->id_ficha_atencion) && empty($request->id_receta) )
        {
            $error['IDENTIFICADOR'] = 'Campos de busqueda faltantes IDENTIFICADOR FICHA O IDENTIFICADOR RECETA';
            $valido = 0;
        }

        if($valido)
        {

            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);

            $lugar_atencion = LugarAtencion::with('direccion')->select('id', 'nombre', 'rut', 'email', 'telefono', 'id_direccion')->find($ficha_atencion->id_lugar_atencion);

            $profesional = Profesional::select('profesionales.id as id', 'profesionales.nombre as nombre', 'profesionales.apellido_uno as apellido_uno', 'profesionales.apellido_dos as apellido_dos','profesionales.num_colegio',
                                                'profesionales.sexo as sexo', 'profesionales.rut as rut', 'profesionales.email as email', 'profesionales.telefono_uno as telefono_uno', 'profesionales.id_direccion as id_direccion',
                                                'profesionales.id_especialidad as id_especialidad', 'especialidades.nombre as nombre_especialidades',
                                                'profesionales.id_tipo_especialidad as id_tipo_especialidad', 'tipos_especialidad.nombre as nombre_tipo_especialidad',
                                                'profesionales.id_sub_tipo_especialidad as id_sub_tipo_especialidad', 'sub_tipo_especialidad.nombre as nombre_sub_tipo_especialidad')
                                        ->join('especialidades', 'especialidades.id', '=', 'profesionales.id_especialidad')
                                        ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'profesionales.id_tipo_especialidad')
                                        ->join('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'profesionales.id_sub_tipo_especialidad')
                                        ->find($ficha_atencion->id_profesional);
            if(!$profesional){
                $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            }

            $profesional->direccion = $lugar_atencion->direccion->direccion;
            $profesional->numero_dir = $lugar_atencion->direccion->numero_dir;
            $profesional->comuna = $lugar_atencion->direccion->ciudad;
            $profesional->region = $lugar_atencion->direccion->ciudad->Region;

            $paciente = Paciente::select('pacientes.id as id', 'pacientes.rut as rut', 'pacientes.nombres as nombres', 'pacientes.apellido_uno as apellido_uno', 'pacientes.apellido_dos as apellido_dos',
                                            'pacientes.telefono_uno as telefono_uno', 'pacientes.sexo as sexo', 'pacientes.email as email', 'pacientes.fecha_nac as fecha_nac', 'pacientes.id_prevision as id_prevision',
                                            'pacientes.id_direccion as id_direccion', 'pacientes.id_antecedente as id_antecedente', 'direcciones.direccion as direccion', 'direcciones.numero_dir as numero_dir',
                                            'ciudades.nombre as ciudad_nombre', 'regiones.nombre as region_nombre')
                                        ->join('direcciones', 'pacientes.id_direccion', '=', 'direcciones.id')
                                        ->join('ciudades', 'ciudades.id', '=', 'direcciones.id_ciudad')
                                        ->join('regiones', 'regiones.id', '=', 'ciudades.id_region')
                                        ->find($ficha_atencion->id_paciente);
            $filtro = array();
            if(!empty($request->id_ficha_atencion))
                $filtro[] = array('atencion', $request->id_ficha_atencion);
            if(!empty($request->id_receta))
                $filtro[] = array('id', $request->id_receta);

            $recomendacion = Recomendacion::where($filtro)->get();
            $cantidad_recetas = Recomendacion::where($filtro)->count();
            if($recomendacion)
            {
                foreach ($recomendacion as $key => $value)
                {
                    $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 1, $value->id);
                    if($temp_token['estado'] == 1)
                    {
                        $token_receta = $temp_token['certificado'];
                        $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                        $qr_documento = GeneradorQrController::generar($url_documento);
                    }
                    else
                    {
                        $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 1);
                        $token_receta = $temp_token['certificado'];
                        $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                        $qr_documento = GeneradorQrController::generar($url_documento);
                    }
                    $recomendacion[$key]['qr'] = (object)array('documento' => $qr_documento, 'token' =>$token_receta );

                    $temp_token = CertificadoController::certificadoProfesional($profesional->id, $value->cod_auto, 1, $value->id);
                    if($temp_token['estado'] == 1)
                    {
                        $token_profesional = $temp_token['certificado'];
                        $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                        $qr_profesional = GeneradorQrController::generar($url_profesional);
                    }
                    else
                    {
                        $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $value->cod_auto, 1, $value->id);
                        $token_profesional = $temp_token['certificado'];
                        $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                        $qr_profesional = GeneradorQrController::generar($url_profesional);
                    }
                    $recomendacion[$key]['qr_prof'] = (object)array('profesional' => $qr_profesional);


                    // $qr_id = GeneradorQrController::generar(encrypt($ficha_atencion->id));
                    $qr_id = GeneradorQrController::generar(encrypt($value->id));
                    $recomendacion[$key]['qr_id'] = $qr_id;

                    $recomendacion[$key]['ficha_atencion'] = $ficha_atencion;
                    $recomendacion[$key]['lugar_atencion'] = $lugar_atencion;
                    $recomendacion[$key]['profesional'] = $profesional;
                    $recomendacion[$key]['paciente'] = $paciente;
                    $recomendacion[$key]['detalle'] = (object)array();

                    $recomendacionDetalle = RecomendacionDetalle::where('id_recomendacion', $value->id)->get();
                    if($recomendacionDetalle)
                    {
                        $temp_val = array();
                        foreach ($recomendacionDetalle as $key_det => $value_det)
                        {
                            $temp_val[] = array(
                                'id' => $value_det->id,
                                'id_receta' => $value_det->id_recomendacion,
                                'id_tipo_control' => decrypt($value_det->control),
                                'id_producto' => decrypt($value_det->id_articulo),
                                'producto' => decrypt($value_det->articulo),
                                'farmaco' => decrypt($value_det->componente),
                                'id_presentacion' => decrypt($value_det->id_apariencia),
                                'presentacion' => decrypt($value_det->apariencia),
                                'id_receta_dosis' => decrypt($value_det->id_cuota),
                                'posologia' => decrypt($value_det->cuota),
                                'id_via_administracion' => decrypt($value_det->id_regimen),
                                'via_administracion' => decrypt($value_det->regimen),
                                'id_periodo' => decrypt($value_det->id_lapso),
                                'periodo' => decrypt($value_det->lapso),
                                'uso_cronico' => decrypt($value_det->uso_frecuente),
                                'cantidad_compra' => decrypt($value_det->volumen_compra),
                                'cantidad' => decrypt($value_det->volumen),
                                'cantidad_vendida' => decrypt($value_det->volumen_entregado),
                                'comentario' => decrypt($value_det->comentario),
                                'token_doc' => $value_det->cod_doc,
                                'estado' => $value_det->estado,
                            );
                        }
                        $recomendacion[$key]['detalle'] = new ArrayObject($temp_val);
                    }
                }

                /** ESPECIALIDAD OTORRINOLARINGOLOGÍA (AUDIFONOS) */
                $recetaAudifonos = array();
                $detalleOrlAudifono = RecetaAudifono::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                if($detalleOrlAudifono)
                {
                    $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 1);
                    if($temp_token['estado'] == 1)
                    {
                        $token_receta = $temp_token['certificado'];
                        $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                        $qr_documento = GeneradorQrController::generar($url_documento);
                    }
                    else
                    {
                        $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 1);
                        $token_receta = $temp_token['certificado'];
                        $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                        $qr_documento = GeneradorQrController::generar($url_documento);
                    }
                    $recetaAudifonos[0]['qr'] = (object)array('documento' => $qr_documento, 'token' =>$token_receta );

                    $temp_token = CertificadoController::certificadoProfesional($profesional->id, $detalleOrlAudifono->cod_auto, 2, $detalleOrlAudifono->id);
                    if($temp_token['estado'] == 1)
                    {
                        $token_profesional = $temp_token['certificado'];
                        $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                        $qr_profesional = GeneradorQrController::generar($url_profesional);
                    }
                    else
                    {
                        $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $detalleOrlAudifono->cod_auto, 2, $detalleOrlAudifono->id);
                        $token_profesional = $temp_token['certificado'];
                        $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                        $qr_profesional = GeneradorQrController::generar($url_profesional);
                    }
                    $recetaAudifonos[0]['qr_prof'] = (object)array('profesional' => $qr_profesional);


                    $qr_id = GeneradorQrController::generar(encrypt($ficha_atencion->id));
                    $recetaAudifonos[0]['qr_id'] = $qr_id;

                    $recetaAudifonos[0]['ficha_atencion'] = $ficha_atencion;
                    $recetaAudifonos[0]['lugar_atencion'] = $lugar_atencion;
                    $recetaAudifonos[0]['profesional'] = $profesional;
                    $recetaAudifonos[0]['paciente'] = $paciente;
                    $recetaAudifonos[0]['detalle'] = (object)array();

                    $cantidad_recetas ++;
                    $arrayTipo = array('','Audifono Intracanal', 'Audifono Retroauricular', 'Audifono Tipo Audigafas', 'Audifono Implante', $detalleOrlAudifono->otro_tipo);

                    $array_medicamento = array(
                        'tipo' => $arrayTipo[$detalleOrlAudifono->tipo],
                        'od' => $detalleOrlAudifono->od,
                        'especificacion_od' => $detalleOrlAudifono->especificacion_od,
                        'oi' => $detalleOrlAudifono->oi,
                        'especificacion_oi' => $detalleOrlAudifono->especificacion_oi,
                        'bi' => $detalleOrlAudifono->bi,
                        'especificacion_bi' => $detalleOrlAudifono->especificacion_bi,
                        'especificacion_general' => $detalleOrlAudifono->especificacion_general,
                    );
                    // $nombre_control = 'ORL_AUDIFONO';
                    $recetaAudifonos[0]['detalle'] = new ArrayObject($array_medicamento);
                }

                /** ESPECIALIDAD OFTALMOLOGIA (LENTES) */
                $recetaLentes = array();
                $detalleLente = OftalmoRecetaLente::where('id_ficha_atencion', $request->id_ficha_atencion)->where('estado', 1)->orderBy('id','DESC')->first();

                if($detalleLente)
                {
                    $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 1);
                    if($temp_token['estado'] == 1)
                    {
                        $token_receta = $temp_token['certificado'];
                        $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                        $qr_documento = GeneradorQrController::generar($url_documento);
                    }
                    else
                    {
                        $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 1);
                        $token_receta = $temp_token['certificado'];
                        $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                        $qr_documento = GeneradorQrController::generar($url_documento);
                    }
                    $recetaLentes[0]['qr'] = (object)array('documento' => $qr_documento, 'token' =>$token_receta );

                    $temp_token = CertificadoController::certificadoProfesional($profesional->id, $detalleLente->cod_auto, 24, $detalleLente->id);
                    if($temp_token['estado'] == 1)
                    {
                        $token_profesional = $temp_token['certificado'];
                        $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                        $qr_profesional = GeneradorQrController::generar($url_profesional);
                    }
                    else
                    {
                        $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $detalleLente->cod_auto, 24, $detalleLente->id);
                        $token_profesional = $temp_token['certificado'];
                        $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                        $qr_profesional = GeneradorQrController::generar($url_profesional);
                    }
                    $recetaLentes[0]['qr_prof'] = (object)array('profesional' => $qr_profesional);


                    $qr_id = GeneradorQrController::generar(encrypt($ficha_atencion->id));
                    $recetaLentes[0]['qr_id'] = $qr_id;

                    $recetaLentes[0]['ficha_atencion'] = $ficha_atencion;
                    $recetaLentes[0]['lugar_atencion'] = $lugar_atencion;
                    $recetaLentes[0]['profesional'] = $profesional;
                    $recetaLentes[0]['paciente'] = $paciente;
                    $recetaLentes[0]['detalle'] = (object)array();

                    $cantidad_recetas ++;
                    $arrayTipo = array('', 'Opticos monofocales', 'Opticos bifocales', 'Opticos trifocales', 'Progresivos', 'Opticos de sol', 'Contacto');
                    $arrayPara = array('', 'Lentes de cerca', 'Lentes intermedios', 'Lentes ópticos');

                    $temp_val = array();
                    foreach ($detalleLente as $key => $value)
                    {

                        $temp_val[$key] = array(
                            'tipo_lentes' => $arrayTipo[$value->tipo_lentes],
                            'lentes_para' => $value->lentes_para_texto,
                            'r_oi_esfera' => $value->r_oi_esfera,
                            'r_oi_cilindro' => $value->r_oi_cilindro,
                            'r_oi_valor_eje' => $value->r_oi_valor_eje,
                            'r_oi_add' => $value->r_oi_add,
                            'r_oi_prisma' => $value->r_oi_prisma,
                            'r_oi_dip' => $value->r_oi_dip,
                            'r_oi_obs' => $value->r_oi_obs,
                            'r_od_esfera' => $value->r_od_esfera,
                            'r_od_cilindro' => $value->r_od_cilindro,
                            'r_od_valor_eje' => $value->r_od_valor_eje,
                            'r_od_add' => $value->r_od_add,
                            'r_od_prisma' => $value->r_od_prisma,
                            'r_od_dip' => $value->r_od_dip,
                            'r_od_obs' => $value->r_od_obs,
                            'r_obs' => $value->r_obs,
                        );
                    }
                    $recetaLentes[0]['detalle'] = new ArrayObject($temp_val);
                }

                // echo ($cantidad_recetas);
                // echo json_encode($recomendacion);
                // echo json_encode($paciente);
                // echo json_encode($detalleLente);
                // die();

                $fecha_atencion = $ficha_atencion->created_at;

                if($cantidad_recetas > 0)
                    return  PdfController::generarPDF('RECETA MEDICA', compact('recomendacion', 'cantidad_recetas', 'recetaAudifonos', 'recetaLentes', 'fecha_atencion'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica_2');
                else
                    return  PdfController::generarPDF('RECETA MEDICA', compact('recomendacion', 'cantidad_recetas', 'recetaAudifonos', 'recetaLentes', 'fecha_atencion'), 'Receta Medica ', 'pdf_receta_medica_2');
                exit();

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'documento no encontrado';
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;

    }

    public function verRecetaPacienteCantidad(Request $request)
    {
        $datos = array();
        $error = array();
        $filtro = array();
        $valido = 1;

        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            if(empty($request->id_profesional))
                $filtro[] = array('aficionado', $request->id_profesional);

            if(empty($request->id_paciente))
                $filtro[] = array('activo', $request->id_paciente);

            if(empty($request->tipo_control))
                $filtro[] = array('control', $request->tipo_control);

            $registros = Recomendacion::where($filtro)->get();
            $cantidad = $registros->count();

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registros;
            $datos['cantidad'] = $cantidad;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

}
