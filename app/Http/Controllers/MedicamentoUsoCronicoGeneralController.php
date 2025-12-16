<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use App\Models\DetalleReceta;
use App\Models\LugarAtencion;
use App\Models\MedicamentoUsoCronicoGeneral;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\RecetaDosis;
use App\Models\Recomendacion;
use App\Models\RecomendacionDetalle;
use Illuminate\Http\Request;

class MedicamentoUsoCronicoGeneralController extends Controller
{
    public function registrar(Request $request){
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($request->id_ficha_atencion))
        {
            $error['ID FICHA ATENCION'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['ID PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['ID PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_medicamento))
        {
            $error['IS MEDICAMENTO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->nombre_medicamento))
        {
            $error['NOMBRE MEDICAMENTO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_medicamento_tipo_control))
        {
            $error['TIPO CONTROL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->cantidad_comprar))
        {
            $error['CANTIDAD'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->dosis_medicamento))
        {
            $error['DOSIS'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->frecuencia_medicamento))
        {
            $error['FRECUENCIA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->via_administracion))
        {
            $error['VIA ADMINISTRACION'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->periodo))
        {
            $error['PERIODO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_enfermedad))
        {
            $error['ENFERMEDAD'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->cliente)){
        //     $valido = 0;
        //     $error['cliente'] = 'Campo requerido cliente';
        // }
        // if(empty($request->estado)){
        //     $valido = 0;
        //     $error['estado'] = 'Campo requerido estado';
        // }

        if($valido )
        {
            $medicamento = new MedicamentoUsoCronicoGeneral();

            $medicamento->id_ficha_atencion = $request->id_ficha_atencion;
            $medicamento->id_paciente = $request->id_paciente;
            $medicamento->id_profesional = $request->id_profesional;
            $medicamento->id_articulo = $request->id_medicamento;
            $medicamento->nombre_medicamento = $request->nombre_medicamento;
            $medicamento->id_tipo_control = $request->id_medicamento_tipo_control;
            $medicamento->cantidad = $request->cantidad_comprar;
            $medicamento->presentacion = $request->dosis_medicamento;
            $medicamento->posologia = $request->frecuencia_medicamento;
            $medicamento->via_administracion = $request->via_administracion;
            $medicamento->periodo = $request->periodo;
            $medicamento->tipo_enfermedad = $request->tipo_enfermedad;
            // $medicamento->cliente = $request->cliente;
            // $medicamento->estado = $request->estado;

            if($medicamento->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro Exitoso';
                $datos['request'] = $request->all();

                if(!empty(session('lic_token')) && session('lic_estado') == 1)
                {
                    /** REGISTRO DE MEDICAMENTO EN RECETA */
                    $datos['registro_receta'] = static::ingresarMdicamentoNuevoAReceta($request);
                }
                else
                {
                    $datos['registro_receta']['estado'] = 0;
                    $datos['registro_receta']['msj'] = 'no se puede agregar el medicamento a receta por no tener activo la AUTORIZACIOM de papeleria';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['error'] = $medicamento;
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;

    }

    static public function ingresarMdicamentoNuevoAReceta(Request $request)
    {
        $datos = array();

        $articulo_encontrado = 0;

        $filtrotemp = array();
        $filtrotemp[] = array('atencion',$request->id_ficha_atencion);
        // $request->id_medicament
        $result_busqueda = Recomendacion::where($filtrotemp)->get();
        if($result_busqueda)
        {
            foreach ($result_busqueda as $key => $value)
            {
                $result_detalle = RecomendacionDetalle::where('id_recomendacion', $value->id)->get();
                if($result_detalle)
                {
                    foreach ($result_detalle as $key_detalle => $value_detalle)
                    {
                        if(decrypt($value_detalle->id_articulo) == $request->id_medicament)
                        {
                            $articulo_encontrado++;
                        }
                    }
                }
            }
        }

        if($articulo_encontrado == 0)
        {
            $id_receta = 0;
            $cod_doc = 0;

            $filtrotemp2 = array();
            $filtrotemp2[] = array('atencion',$request->id_ficha_atencion);
            $filtrotemp2[] = array('control',$request->id_medicamento_tipo_control);

            $buscar_receta_tipo = Recomendacion::where($filtrotemp2)->first();
            if($buscar_receta_tipo)
            {
                $id_receta = $buscar_receta_tipo->id;
                $cod_doc = $buscar_receta_tipo->cod_doc;

                $result_detalle = (object) RecomendacionController::registrarDetalle(
                    $id_receta,
                    $request->id_medicamento_tipo_control, // $control - id_receta
                    $request->id_medicamento, // $id_articulo - id_tipo_control
                    $request->nombre_medicamento, // $articulo - id_producto
                    $request->nombre_composicion_farmaco, // $farmaco - producto
                    $request->id_dosis_medicamento, // $id_apariencia - id_presentacion
                    $request->dosis_medicamento, // $apariencia - presentacion
                    $request->id_frecuencia_medicamento, // $id_cuota - id_receta_dosis
                    $request->frecuencia_medicamento, // $cuota - posologia
                    $request->id_via_administracion, // $id_regimen - id_via_administracion
                    $request->via_administracion, // $regimen - via_administracion
                    $request->id_periodo, // $id_lapso - id_periodo
                    $request->periodo, // $lapso - periodo
                    1, // $uso_frecuente - uso_cronico
                    $request->cantidad_comprar, // $volumen_compra - cantidad_compra
                    $request->id_cantidad_comprar, // $volumen - cantidad
                    0, // $volumen_entregado - cantidad_vendida
                    $request->observaciones_medicamento, // $comentario - comentario
                    $cod_doc // $cod_doc - token_doc
                );

                if($result_detalle->estado == 1)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Medicamento agregado';
                    $datos['resul_receta'] = $buscar_receta_tipo;
                    $datos['result_det'] = $result_detalle;
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla en registro Medicamento';
                    $datos['resul_receta'] = $buscar_receta_tipo;
                    $datos['result_det'] = $result_detalle;
                }
            }
            else
            {
                $token_doc_temp = (object)CertificadoController::certificadoDocumento((int)$request->id_ficha_atencion, (int)$request->id_profesional, (int)$request->id_paciente, 1);
                $token_doc = $token_doc_temp->certificado;
                $registro = (object)RecomendacionController::registrarRecomendacion(  $request->id_ficha_atencion, // $atencion
                                                                '', // $salida
                                                                '', // $herir
                                                                '', // $cuadro
                                                                $request->id_paciente, // $activo
                                                                $request->id_profesional, // $aficionado
                                                                $request->id_medicamento_tipo_control, // $control
                                                                $token_doc, // $cod_doc
                                                                session('lic_token'),// $token_auto, // $cod_auto
                                                                '', // $info
                                                            );
                if($registro->estado)
                {
                    $id_receta = $registro->last_id;
                    $cod_doc = $token_doc;

                    $result_detalle = (object) RecomendacionController::registrarDetalle(
                                $id_receta,
                                $request->id_medicamento_tipo_control, // $control - id_receta
                                $request->id_medicamento, // $id_articulo - id_tipo_control
                                $request->nombre_medicamento, // $articulo - id_producto
                                $request->nombre_composicion_farmaco, // $farmaco - producto
                                $request->id_dosis_medicamento, // $id_apariencia - id_presentacion
                                $request->dosis_medicamento, // $apariencia - presentacion
                                $request->id_frecuencia_medicamento, // $id_cuota - id_receta_dosis
                                $request->frecuencia_medicamento, // $cuota - posologia
                                $request->id_via_administracion, // $id_regimen - id_via_administracion
                                $request->via_administracion, // $regimen - via_administracion
                                $request->id_periodo, // $id_lapso - id_periodo
                                $request->periodo, // $lapso - periodo
                                1, // $uso_frecuente - uso_cronico
                                $request->cantidad_comprar, // $volumen_compra - cantidad_compra
                                $request->id_cantidad_comprar, // $volumen - cantidad
                                0, // $volumen_entregado - cantidad_vendida
                                $request->observaciones_medicamento, // $comentario - comentario
                                $cod_doc // $cod_doc - token_doc
                    );
                    if($result_detalle->estado == 1)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Medicamento agregado';
                        $datos['result_det'] = $result_detalle;
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'falla en registro Medicamento';
                        $datos['result_det'] = $result_detalle;
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla generando receta';
                    $datos['resul_receta'] = $registro;
                }
            }
        }
        else
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'Medicamento ya existente en receta';
        }

        return $datos;

    }

    static public function pasarMedicamentoCronicoAReceta(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_ficha_atencion))
        {
            $error['FICHA ATENCION'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['LUGAR ATENCION'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->lista_medicamento))
        {
            $error['LISTA MEDICAMENTOS'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $lista_medicamento = $request->lista_medicamento;
            $resultMedCron = MedicamentoUsoCronicoGeneral::whereIn('id', $lista_medicamento)->get();

            if($resultMedCron)
            {
                foreach ($resultMedCron as $key => $value)
                {
                    $articulo_encontrado = 0;
                    $filtrotemp = array();
                    $filtrotemp[] = array('atencion',$request->id_ficha_atencion);
                    // $request->id_medicament
                    $result_busqueda = Recomendacion::where($filtrotemp)->get();
                    if($result_busqueda)
                    {
                        foreach ($result_busqueda as $key2 => $value2)
                        {
                            $result_detalle = RecomendacionDetalle::where('id_recomendacion', $value2->id)->get();
                            if($result_detalle)
                            {
                                foreach ($result_detalle as $key_detalle => $value_detalle)
                                {
                                    if(decrypt($value_detalle->id_articulo) == $value->id_articulo)
                                    {
                                        $articulo_encontrado++;
                                    }
                                }
                            }
                        }
                    }

                    $datos['articulo_encontrado'][$key] = ''.$articulo_encontrado.'';

                    if($articulo_encontrado == 0)
                    {
                        $filtrotemp2 = array();
                        $filtrotemp2[] = array('atencion',$request->id_ficha_atencion);
                        $filtrotemp2[] = array('control',$value->id_tipo_control);

                        $buscar_receta_tipo = Recomendacion::where($filtrotemp2)->first();
                        $datos['buscar_receta_tipo'] = $buscar_receta_tipo;
                        if($buscar_receta_tipo)
                        {
                            $id_receta = $buscar_receta_tipo->id;
                            $cod_doc = $buscar_receta_tipo->cod_doc;

                            /** farmaco */
                            $farmaco = '';
                            $busqueda_farmaco = Articulo::where('nombre',$value->nombre_medicamento)->first();
                            if($busqueda_farmaco)
                                $farmaco = $busqueda_farmaco->droga;

                            /** presentacion  y frecuencia (dosis-posologia) */
                            /** presentacion */
                            $id_presentacion = '';
                            $presentacion = '';
                            /** frecuencia */
                            $id_frecuencia = '0';
                            $frecuencia = $value->posologia;

                            $temp_pre = array();
                            $temp_pre[] = array('cod_parent', $value->id_articulo);
                            $temp_pre[] = array('present', $value->presentacion);
                            $busqueda_presentacion = Articulo::where($temp_pre)->first();
                            if($busqueda_presentacion)
                            {
                                /** presentacion */
                                $id_presentacion = $busqueda_presentacion->id;
                                $presentacion = $busqueda_presentacion->present;

                                /** frecuencia */
                                $filtro_rec = array();
                                $filtro_rec[] = array('cod_parent', $busqueda_presentacion->dosis);
                                $filtro_rec[] = array('indic', $value->posologia);
                                $receta_dosis = RecetaDosis::where($filtro_rec)->first();
                                if($receta_dosis)
                                    $id_frecuencia = $receta_dosis->id;

                                $frecuencia = $value->posologia;
                            }

                            /** via administracion */
                            $array_via = array(
                                '',
                                mb_strtoupper('Vía Oral'),
                                mb_strtoupper('Vía Sublingual'),
                                mb_strtoupper('Vía Tópica'),
                                mb_strtoupper('Vía Oftalmológica'),
                                mb_strtoupper('Vía Ótica'),
                                mb_strtoupper('Vía Inhalatoria'),
                                mb_strtoupper('Vía Nasal'),
                                mb_strtoupper('Vía Rectal'),
                                mb_strtoupper('Vía Vaginal'),
                                mb_strtoupper('Vía parental'),
                                mb_strtoupper('Otra Vía')
                            );
                            $id_via_administracion = '0';
                            $via_administracion = $value->via_administracion;

                            if(in_array(mb_strtoupper($value->via_administracion), $array_via))
                            {
                                $id_via_administracion = array_search(mb_strtoupper($value->via_administracion), $array_via);
                            }

                            /** periodo */
                            $array_periodo = array(
                                '',
                                'SOS',
                                'Dosis unica',
                                '3 días',
                                '5 días',
                                '7 días',
                                '10 días',
                                '15 días',
                                '30 días',
                                'Permanente',
                                'Vía parental',
                                'Otro Periodo',
                            );
                            $id_periodo = 0;
                            $periodo = $value->periodo;
                            if(in_array(mb_strtoupper($periodo), $array_periodo))
                            {
                                $id_periodo = array_search(mb_strtoupper($periodo), $array_periodo);
                            }

                            /** cantidad */
                            $texto_cantidad = $value->cantidad;
                            $n1 = strpos($texto_cantidad, '(');
                            $n2 = strpos($texto_cantidad, ')');
                            $largo = ($n2-($n1+1));
                            $numero_cantidad = (int)substr($texto_cantidad, $n1+1,$largo);


                            $result_detalle = (object) RecomendacionController::registrarDetalle(
                                $id_receta,
                                $value->id_tipo_control, // $control - id_receta
                                $value->id_articulo, // $id_articulo - id_tipo_control
                                $value->nombre_medicamento, // $articulo - id_producto
                                $farmaco, // $farmaco - producto
                                $id_presentacion, // $id_apariencia - id_presentacion
                                $presentacion, // $apariencia - presentacion
                                $id_frecuencia, // $id_cuota - id_receta_dosis
                                $frecuencia, // $cuota - posologia
                                $id_via_administracion, // $id_regimen - id_via_administracion
                                $via_administracion, // $regimen - via_administracion
                                $id_periodo, // $id_lapso - id_periodo
                                $periodo, // $lapso - periodo
                                1, // $uso_frecuente - uso_cronico
                                $texto_cantidad, // $volumen_compra - cantidad_compra
                                $numero_cantidad, // $volumen - cantidad
                                0, // $volumen_entregado - cantidad_vendida
                                '', // $comentario - comentario
                                $cod_doc // $cod_doc - token_doc
                            );

                            if($result_detalle->estado == 1)
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Medicamento agregado';
                                $datos['resul_receta'] = $buscar_receta_tipo;
                                $datos['result_det'] = $result_detalle;
                            }
                            else
                            {
                                $datos['estado'] = 0;
                                $datos['msj'] = 'falla en registro Medicamento';
                                $datos['resul_receta'] = $buscar_receta_tipo;
                                $datos['result_det'] = $result_detalle;
                            }
                        }
                        else
                        {
                            /** registro de nueva receta */
                            $token_doc_temp = (object)CertificadoController::certificadoDocumento((int)$request->id_ficha_atencion, (int)$value->id_profesional, (int)$value->id_paciente, 1);
                            $token_doc = $token_doc_temp->certificado;

                            $registro_receta = (object)RecomendacionController::registrarRecomendacion(  $request->id_ficha_atencion, // $atencion
                                                                '', // $salida
                                                                '', // $herir
                                                                '', // $cuadro
                                                                $value->id_paciente, // $activo
                                                                $value->id_profesional, // $aficionado
                                                                $value->id_tipo_control, // $control
                                                                $token_doc, // $cod_doc
                                                                session('lic_token'),// $token_auto, // $cod_auto
                                                                '', // $info
                                                            );
                            if($registro_receta)
                            {
                                $id_receta = $registro_receta->last_id;
                                $cod_doc = $token_doc;

                                /** farmaco */
                                $farmaco = '';
                                $busqueda_farmaco = Articulo::where('nombre',$value->nombre_medicamento)->first();
                                if($busqueda_farmaco)
                                    $farmaco = $busqueda_farmaco->droga;

                                /** presentacion  y frecuencia (dosis-posologia) */
                                /** presentacion */
                                $id_presentacion = '';
                                $presentacion = '';
                                /** frecuencia */
                                $id_frecuencia = '0';
                                $frecuencia = $value->posologia;

                                $temp_pre = array();
                                $temp_pre[] = array('cod_parent', $value->id_articulo);
                                $temp_pre[] = array('present', $value->presentacion);
                                $busqueda_presentacion = Articulo::where($temp_pre)->first();
                                if($busqueda_presentacion)
                                {
                                    /** presentacion */
                                    $id_presentacion = $busqueda_presentacion->id;
                                    $presentacion = $busqueda_presentacion->present;

                                    /** frecuencia */
                                    $filtro_rec = array();
                                    $filtro_rec[] = array('cod_parent', $busqueda_presentacion->dosis);
                                    $filtro_rec[] = array('indic', $value->posologia);
                                    $receta_dosis = RecetaDosis::where($filtro_rec)->first();
                                    if($receta_dosis)
                                        $id_frecuencia = $receta_dosis->id;

                                    $frecuencia = $value->posologia;
                                }

                                /** via administracion */
                                $array_via = array(
                                    '',
                                    mb_strtoupper('Vía Oral'),
                                    mb_strtoupper('Vía Sublingual'),
                                    mb_strtoupper('Vía Tópica'),
                                    mb_strtoupper('Vía Oftalmológica'),
                                    mb_strtoupper('Vía Ótica'),
                                    mb_strtoupper('Vía Inhalatoria'),
                                    mb_strtoupper('Vía Nasal'),
                                    mb_strtoupper('Vía Rectal'),
                                    mb_strtoupper('Vía Vaginal'),
                                    mb_strtoupper('Vía parental'),
                                    mb_strtoupper('Otra Vía')
                                );
                                $id_via_administracion = '0';
                                $via_administracion = $value->via_administracion;

                                if(in_array(mb_strtoupper($value->via_administracion), $array_via))
                                {
                                    $id_via_administracion = array_search(mb_strtoupper($value->via_administracion), $array_via);
                                }

                                /** periodo */
                                $array_periodo = array(
                                    '',
                                    'SOS',
                                    'Dosis unica',
                                    '3 días',
                                    '5 días',
                                    '7 días',
                                    '10 días',
                                    '15 días',
                                    '30 días',
                                    'Permanente',
                                    'Vía parental',
                                    'Otro Periodo',
                                );
                                $id_periodo = 0;
                                $periodo = $value->periodo;
                                if(in_array(mb_strtoupper($periodo), $array_periodo))
                                {
                                    $id_periodo = array_search(mb_strtoupper($periodo), $array_periodo);
                                }

                                /** cantidad */
                                $texto_cantidad = $value->cantidad;
                                $n1 = strpos($texto_cantidad, '(');
                                $n2 = strpos($texto_cantidad, ')');
                                $largo = ($n2-($n1+1));
                                $numero_cantidad = (int)substr($texto_cantidad, $n1+1,$largo);


                                $result_detalle = (object) RecomendacionController::registrarDetalle(
                                    $id_receta,
                                    $value->id_tipo_control, // $control - id_receta
                                    $value->id_articulo, // $id_articulo - id_tipo_control
                                    $value->nombre_medicamento, // $articulo - id_producto
                                    $farmaco, // $farmaco - producto
                                    $id_presentacion, // $id_apariencia - id_presentacion
                                    $presentacion, // $apariencia - presentacion
                                    $id_frecuencia, // $id_cuota - id_receta_dosis
                                    $frecuencia, // $cuota - posologia
                                    $id_via_administracion, // $id_regimen - id_via_administracion
                                    $via_administracion, // $regimen - via_administracion
                                    $id_periodo, // $id_lapso - id_periodo
                                    $periodo, // $lapso - periodo
                                    1, // $uso_frecuente - uso_cronico
                                    $texto_cantidad, // $volumen_compra - cantidad_compra
                                    $numero_cantidad, // $volumen - cantidad
                                    0, // $volumen_entregado - cantidad_vendida
                                    '', // $comentario - comentario
                                    $cod_doc // $cod_doc - token_doc
                                );

                                if($result_detalle->estado == 1)
                                {
                                    $datos['estado'] = 1;
                                    $datos['msj'] = 'Medicamento agregado';
                                    $datos['resul_receta'] = $buscar_receta_tipo;
                                    $datos['result_det'] = $result_detalle;
                                }
                                else
                                {
                                    $datos['estado'] = 0;
                                    $datos['msj'] = 'falla en registro Medicamento';
                                    $datos['resul_receta'] = $buscar_receta_tipo;
                                    $datos['result_det'] = $result_detalle;
                                }
                            }
                        }
                    }
                    else
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Medicamento ya existente en receta';
                    }
                }
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registros no encontrados';
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

    public function getRegsitros(Request $request)
    {

        $datos = array();
        $filtro = array();

        if(!empty($request->id_ficha_atencion)){
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        }
        if(!empty($request->id_paciente)){
            $filtro[] = array('id_paciente',$request->id_paciente);
        }
        if(!empty($request->id_profesional)){
            $filtro[] = array('id_profesional',$request->id_profesional);
        }
        if(!empty($request->nombre_medicamento)){
            $filtro[] = array('nombre_medicamento', 'like' ,$request->nombre_medicamento.'%');
        }
        if(!empty($request->cantidad)){
            $filtro[] = array('cantidad',$request->cantidad);
        }
        if(!empty($request->cliente)){
            $filtro[] = array('cliente',$request->cliente);
        }
        if(!empty($request->tipo_enfermedad)){
            $filtro[] = array('tipo_enfermedad',$request->tipo_enfermedad);
        }
        if(!empty($request->estado)){
            $filtro[] = array('estado',$request->estado);
        }

        $medicamento = Medicamentousocronicogeneral::where($filtro)->get();

        if($medicamento->count() > 0) {
            $datos['estado'] = 1;
            $datos['msj'] = 'busqueda exitosa';
            $datos['registros'] = $medicamento;
            $datos['request'] = $request->all();
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Sin Registros';
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    public function getRegsitro(Request $request)
    {

        $datos = array();
        $filtro = array();
        $valido = 0;
        $error = array();

        if(empty($request->id)){
           $valido = 1;
           $error[] = 'Campo Requerido ID';
        }

        if($valido == 0){
             $medicamento = Medicamentousocronicogeneral::find($request->id);

            if($medicamento->count() > 0) {
                $datos['estado'] = 1;
                $datos['msj'] = 'busqueda exitosa';
                $datos['registros'] = $medicamento;
                $datos['request'] = $request->all();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'error al buscar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Camppo Requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    public function deleteRegsitro(Request $request)
    {

        $datos = array();
        $filtro = array();
        $valido = 0;
        $error = array();

        if(empty($request->id)){
           $valido = 1;
           $error[] = 'Campo Requerido ID';
        }

        if($valido == 0){
            $medicamento = Medicamentousocronicogeneral::find($request->id);
            $medicamento->delete();

            if($medicamento->count() > 0) {
                $datos['estado'] = 1;
                $datos['msj'] = 'busqueda exitosa';
                $datos['registros'] = $medicamento;
                $datos['request'] = $request->all();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'error al buscar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Camppo Requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }


}
