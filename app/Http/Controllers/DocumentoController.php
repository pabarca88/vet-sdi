<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FichaAtencion;
use App\Models\DetalleReceta;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\Articulo;
use App\Models\Recomendacion;
use App\Models\RecomendacionDetalle;
// ArrayObject
use ArrayObject;

use PDF;

class DocumentoController extends Controller
{

    public function verRegistrosRecetasRut(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->rut)||(int)$request->rut==0) // rut paciente
        {
            $error['rut'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if(empty($request->id)||(int)$request->id==0) // id ficha
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            $paciente = Paciente::where('rut',$request->rut)->first();

            if($paciente)
            {
            $registros = FichaAtencion::select('fichas_atenciones.id as id','detalles_receta.posologia as posologia','fichas_atenciones.hipotesis_diagnostico as hipotesis_diagnostico','fichas_atenciones.created_at as created_at','fichas_atenciones.id as id_ficha' )
										->join('detalles_receta', 'fichas_atenciones.id', '=', 'detalles_receta.id_ficha')
                                        ->where('fichas_atenciones.id_paciente',$paciente->id)
                                        ->where('fichas_atenciones.id',$request->id)
										->orderBy('fichas_atenciones.id','desc')
                                        ->get();

				$id_fichas = array();
				$registro_limpios = array();
				foreach($registros as $key => $value)
				{
					if(in_array($value->id,$id_fichas)==false)
					{
						$registro_limpios[] = $value;
						$id_fichas[] = $value->id;
					}

				}

                if($registros)
                {
                    $datos['estado'] = 1;
					$datos['id_paciente'] = $paciente->id;
                    $datos['registros'] = $registro_limpios;
                    $datos['request'] = $request->all();

                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Registro no encontrado';
                    $datos['request'] = $request->all();
                }

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no encontrado';
                $datos['request'] = $request->all();
            }



        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRegistrosRecetasId(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id)||$request->id=='') // id id_usuario
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {

            $registros = FichaAtencion::select('fichas_atenciones.id as id','detalles_receta.posologia as posologia','fichas_atenciones.hipotesis_diagnostico as hipotesis_diagnostico','fichas_atenciones.created_at as created_at','fichas_atenciones.id as id_ficha' )
										->join('detalles_receta', 'fichas_atenciones.id', '=', 'detalles_receta.id_ficha')
                                        ->where('fichas_atenciones.id',decrypt($request->id))
										->orderBy('fichas_atenciones.id','desc')
                                        ->get();

				$id_fichas = array();
				$registro_limpios = array();
				foreach($registros as $key => $value)
				{
					if(in_array($value->id,$id_fichas)==false)
					{
						$registro_limpios[] = $value;
						$id_fichas[] = $value->id;
					}

				}

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['registros'] = $registro_limpios;
                $datos['request'] = $request->all();
                $datos['id'] = decrypt($request->id);
                //$datos['token'] = encrypt($request->id);

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no encontrado';
                $datos['request'] = $request->all();
            }


        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['token'] = encrypt($request->token);
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verDetalleRecetas(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id_ficha)||(int)$request->id_ficha==0) // id_ficha id_usuario
        {
            $error['id_ficha'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            $detalle_receta = DetalleReceta::where('id_ficha',$request->id_ficha)
                                            ->where('estado',1)
                                            ->get();

            $datos['estado'] = 1;
            $datos['registros'] = $detalle_receta;


        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function ventaDetalleRecetas(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->lista_productos)) // id_ficha id_usuario
        {
            $error['lista_productos'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            $lista_productos = json_decode($request->lista_productos, true);
            $cant = 0;

            foreach($lista_productos as $key => $value)
            {
                $registro = DetalleReceta::find($value['id']);
                $registro->cantidad_vendida = $value['cantidad_vendida'];
                if($registro->save())
                {
                    $value['actualizado'] = 1;
                }else{
                    $value['actualizado'] = 0;
                }
            }

            $datos['estado'] = 1;
            $datos['registros'] = $lista_productos;


        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRegistrosRecetas(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id_paciente)||(int)$request->id_paciente==0) // id_paciente id_usuario
        {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {
            $paciente = Paciente::where('id_usuario',$request->id_paciente)->first();

            $registros = FichaAtencion::select('fichas_atenciones.id as id','detalles_receta.posologia as posologia','fichas_atenciones.hipotesis_diagnostico as hipotesis_diagnostico','fichas_atenciones.created_at as created_at','fichas_atenciones.id as id_ficha' )
										->join('detalles_receta', 'fichas_atenciones.id', '=', 'detalles_receta.id_ficha')
                                        ->where('fichas_atenciones.id_paciente',$paciente->id)
										->orderBy('fichas_atenciones.id','desc')
                                        ->get();

			$id_fichas = array();
			$registro_limpios = array();
            foreach($registros as $key => $value)
			{
				if(in_array($value->id,$id_fichas)==false)
				{
					$registro_limpios[] = $value;
					$id_fichas[] = $value->id;
				}

			}
            $recomendaciones = [];
            $id_recomendaciones = [];
            foreach($id_fichas as $i){
                $recomendacion = Recomendacion::select('recomendacion.*','fichas_atenciones.id as id_ficha','fichas_atenciones.hipotesis_diagnostico as hipotesis_diagnostico','fichas_atenciones.created_at as created_at')
                                    ->join('fichas_atenciones','fichas_atenciones.id','=','recomendacion.atencion')
                                    ->where('fichas_atenciones.id',$i)
                                    ->first();
                if($recomendacion){
                    $recomendaciones[] = $recomendacion;
                    $id_recomendaciones[] = $recomendacion->id;
                }
            }

            foreach($recomendaciones as $key => $value_det){
                $recomendacionDetalle = RecomendacionDetalle::where('id_recomendacion',$value_det->id)->get();

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
                        $recomendaciones[$key]['detalle'] = new ArrayObject($temp_val);
                    }
            }

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['registros'] = $registro_limpios;
                $datos['recomendaciones'] = $recomendaciones;
                $datos['id_recomendaciones'] = $id_recomendaciones;
                $datos['request'] = $request->all();

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no encontrado';
                $datos['request'] = $request->all();
            }


        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRecomendaciones(Request $request)
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

        $registros = \App\Models\Recomendacion::where($filtros)
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
                $detalle = \App\Models\RecomendacionDetalle::where('id_recomendacion',$value->id)->get();
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

        return response($datos)->header('Content-Type', 'application/json');
    }


    public function verRecetaPDF(Request $request)
    {

        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if(empty($request->id)||(int)$request->id==0)
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {

            $datos = array();
            $receta = Recomendacion::where('id',$request->id)->first();

            $detalleReceta = RecomendacionDetalle::where('id_recomendacion', $receta->id)->get();
            $ficha_atencion = FichaAtencion::find($receta->atencion);

            if($detalleReceta->count()>0)
            {
                $lugar_atencion = LugarAtencion::with('direccion')->find($ficha_atencion->id_lugar_atencion);
                $profesional = Profesional::find($ficha_atencion->id_profesional);
                $paciente = Paciente::find($ficha_atencion->id_paciente);

                $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

                $detalle_receta = (object)array();

                $token_receta = '';
                $cantidad_recetas = 0;
                foreach ($detalleReceta as $key_detalle_receta => $value_detalle_receta)
                {
                    // var_dump($value_detalle_receta);
                    // $producto = Articulo::where('nombre',$value_detalle_receta->producto)->first();

                    // $array_medicamento = array(
                    //     'nombre_medicamento' => $producto->nombre,
                    //     'droga'=>$producto->droga,
                    //     'presentacion' => $value_detalle_receta->presentacion,
                    //     'posologia' => $value_detalle_receta->posologia,
                    //     'via_administracion' => $value_detalle_receta->via_administracion,
                    //     'periodo' => $value_detalle_receta->periodo,
                    //     'uso_cronico' => $value_detalle_receta->uso_cronico,
                    //     'cantidad_compra' => $value_detalle_receta->cantidad_compra,
                    //     'receta_token' => $value_detalle_receta->receta_token,
                    // );
                    $array_medicamento = array(
                            'id' => $value_detalle_receta->id,
                            'id_receta' => $value_detalle_receta->id_recomendacion,
                            'id_tipo_control' => decrypt($value_detalle_receta->control),
                            'id_producto' => decrypt($value_detalle_receta->id_articulo),
                            'nombre_medicamento' => decrypt($value_detalle_receta->articulo),
                            'droga' => decrypt($value_detalle_receta->componente),
                            'id_presentacion' => decrypt($value_detalle_receta->id_apariencia),
                            'presentacion' => decrypt($value_detalle_receta->apariencia),
                            'id_receta_dosis' => decrypt($value_detalle_receta->id_cuota),
                            'posologia' => decrypt($value_detalle_receta->cuota),
                            'id_via_administracion' => decrypt($value_detalle_receta->id_regimen),
                            'via_administracion' => decrypt($value_detalle_receta->regimen),
                            'id_periodo' => decrypt($value_detalle_receta->id_lapso),
                            'periodo' => decrypt($value_detalle_receta->lapso),
                            'uso_cronico' => decrypt($value_detalle_receta->uso_frecuente),
                            'cantidad_compra' => decrypt($value_detalle_receta->volumen_compra),
                            'cantidad' => decrypt($value_detalle_receta->volumen),
                            'cantidad_vendida' => decrypt($value_detalle_receta->volumen_entregado),
                            'comentario' => decrypt($value_detalle_receta->comentario),
                            'receta_token' => $value_detalle_receta->cod_doc,
                            'estado' => $value_detalle_receta->estado,
                            'created_at' => $value_detalle_receta->created_at,
                            'updated_at' => $value_detalle_receta->updated_at,
                        );

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


                    $nombre_control = $producto->RecetaControl()->first()->descripcion;
                    $id_control = $producto->RecetaControl()->first()->cod_control;

                    // 4 - Receta retenida
                    // 6 - Receta Simple
                    // 7 - Venta Directa

                    // 1 - Receta retenida con control de Psicotrópicos
                    // 2 - Receta retenida con control de Estupefacientes
                    // 3 - Receta Cheque
                    // 5 - Receta retenida con control de Codeína


                    if(trim($nombre_control) == 'Receta retenida' || trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
                    {
                        $nombre_control = 'Receta';

                        if(!isset($detalle_receta->$nombre_control))
                            $cantidad_recetas ++;

                    }
                    else
                    {
                        $nombre_control = trim($nombre_control).'_'.$key_detalle_receta;

                        if(!isset($detalle_receta->$nombre_control))
                            $cantidad_recetas ++;

                    }

                    $detalle_receta->$nombre_control[] = $array_medicamento;


                    $temp_token = CertificadoController::certificadoProfesional($profesional->id,1,1,1);
                    if($temp_token['estado'] == 1)
                    {
                        $token_profesional = $temp_token['certificado'];
                        $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                        $qr_profesional = GeneradorQrController::generar($url_documento);
                    }
                    else
                    {
                        $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
                        $token_profesional = $temp_token['certificado'];
                        $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                        $qr_profesional = GeneradorQrController::generar($url_documento);
                    }


                }

                // echo json_encode($detalle_receta);
                // die();

                $array_ficha_atencion = array(
                    'id' => $ficha_atencion->id,
                    'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                    'token' => $token_receta,
                    'url' => $url_documento,
                    'qr' => $qr_documento,
                );
                $array_lugar_atencion = array(
                    'id' => $lugar_atencion->id,
                    'nombre' => $lugar_atencion->nombre,
                    'direccion' => $lugar_atencion->direccion->direccion.' '.$lugar_atencion->direccion->numero_dir.', '.$lugar_atencion->direccion->Ciudad()->first()->nombre,
                    'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
                    'comuna' => $lugar_atencion->direccion->Ciudad()->first()->nombre
                );
                $array_profesional = array(
                    'id' => $profesional->id,
                    'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                    'rut' => $profesional->rut,
                    'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
                    'id_especialidad' => $profesional->id_especialidad,
                    'num_colegio' => $profesional->num_colegio,
                    'token' =>  $token_profesional,
                    'url' =>  $url_profesional,
                    'qr' =>  $qr_profesional,
                );
                $array_paciente = array(
                    'id' => $paciente->id,
                    'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                    'fecha_nac' => $paciente->fecha_nac,
                    'rut' => $paciente->rut,
                    'sexo' => $paciente->sexo,
                    'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
                );

                return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se encontraron medicamentos';
            }

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;

            return response($datos)->header('Content-Type', 'application/json');
        }



    }
}
