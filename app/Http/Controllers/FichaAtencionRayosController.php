<?php

namespace App\Http\Controllers;

use App\Models\FichaAtencion;
use App\Models\FichaAtencionRayo;
use App\Models\HoraMedica;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\ProcedimientosCentro;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FichaAtencionRayosController extends Controller
{

    public function store_fono_lab_rayos(Request $request)
    {
        $campos_requeridos = 1;
        $tipo_mensaje = 'success';
        $mensaje = '';
        // if(empty( trim($request->concluciones_examen)))
        // {
        //     $campos_requeridos = 0;
        //     $mensaje = 'La conclucion es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún.';
        // }


        /** REGISTRO DE PROFESIONAO SOLICITADO POR */
        if( !empty($request->solicitado_id_profesional) || !empty($request->derivado_por_rut) )
        {

            if( empty($request->solicitado_id_profesional) && !empty($request->derivado_por_rut) )
            {

                if(empty($request->solicitado_nombre))
                {
                    $campos_requeridos = 0;
                    $mensaje = 'Campo requerido NOMBRE del Solicitante.\n';
                }
                if(empty($request->solicitado_apellido))
                {
                    $campos_requeridos = 0;
                    $mensaje = 'Campo requerido APELLIDO del Solicitante.\n';
                }
                if(empty($request->solicitado_telefono) || empty($request->solicitado_email))
                {
                    $campos_requeridos = 0;
                    $mensaje = 'Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                }
            }
        }

        if($campos_requeridos)
        {


            /** FICHA ATENCION  */
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $paciente = Paciente::find($request->id_paciente_fc);
            // $procedimiento = ProcedimientosCentro::find($hora_medica->id_procedimiento);

            $idProcedimiento = $hora_medica->id_procedimiento;
            $nombre_procedimiento = '';
            if (strpos($idProcedimiento, '|') !== false) {
                // Convertir la cadena en un array de IDs
                $array_id_procedimiento = explode('|', $idProcedimiento);

                // Obtener todos los procedimientos que coincidan con los IDs
                $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
            } else {
                // Caso de un solo ID (número)
                $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
            }

            if($procedimientoCentroTem)
            {
                foreach ($procedimientoCentroTem as $key_nom_temp => $value_nom_temp) {
                    $nombre_procedimiento .= $value_nom_temp->nombre.'; ';
                }
            }


            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();

            $ficha->motivo = $nombre_procedimiento;
            $ficha->hipotesis_diagnostico = $nombre_procedimiento;

            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;

            if( !empty($request->solicitado_id_profesional) || !empty($request->derivado_por_rut) )
            {
                if( empty($request->solicitado_id_profesional) && !empty($request->derivado_por_rut) )
                {
                    $profesional_provisorio = ProfesionalProvisorioController::registrar( $request->solicitado_nombre, $request->solicitado_apellido, '', '', $request->derivado_por_rut, $request->solicitado_email, $request->solicitado_telefono, '', '', '', '', '', '', '', '', '', 1);
                    $ficha->der_por = $profesional_provisorio['last_id'];
                }
                else if( !empty($request->solicitado_id_profesional) )
                {
                    $ficha->der_por = $request->solicitado_id_profesional;
                }
            }

            $ficha->finalizada = 1;

            $registro_archivo = array();
            if(!empty($request->input_lista_archivo))
            {


                $array_archivo = json_decode($request->input_lista_archivo);

                $resulto_img = array();
                foreach ($array_archivo as $key => $value)
                {
                    $ruta_temp = $value[0];
                    $nombre_real = $value[1];
                    $nombre_temp = $value[2];
                    $file_extension = $value[3];
                    $nombre_final = $paciente->rut.'_rayo_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                    $resulto_archivo[$key] = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);
                    $url = $resulto_archivo[$key]['proceso']['url'];

                    $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                    $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                    array_push($registro_archivo, array(
                        'nombre' => $nombre_final,
                        'url' => $url
                    ));
                }

                $registro_archivo = json_encode($registro_archivo);
            }

            if(!empty($registro_archivo))
                $ficha->estado_archivo = 1;
            else
                $ficha->estado_archivo = 0;

            $ficha->archivo = $registro_archivo;


            if ($ficha->save())
            {

                /** registro en ficha atencion rayo */
                $fichaRayo = new FichaAtencionRayo();

                $fichaRayo->token = uniqid('RY');
                $fichaRayo->id_ficha_atencion = $ficha->id;
                $fichaRayo->id_paciente = $paciente->id;
                $fichaRayo->id_profesional = $id_profesional;
                $fichaRayo->id_procedimiento = $hora_medica->id_procedimiento;

                if(empty($request->informe_radio))
                {
                    $fichaRayo->estado_informe = 0;
                    $fichaRayo->informe = '';
                    $fichaRayo->id_usuario_informe = 0;
                }
                else
                {
                    $fichaRayo->estado_informe = 1;
                    $fichaRayo->informe = $request->informe_radio;
                    $fichaRayo->id_usuario_informe = Auth::user()->id;
                }

                if(!empty($registro_archivo))
                {
                    $fichaRayo->estado_archivo = 1;
                    $fichaRayo->archivo = $registro_archivo;
                }
                else
                {
                    $fichaRayo->estado_archivo = 0;
                    $fichaRayo->archivo = '';
                }

                $fichaRayo->estado = 1;

                if($fichaRayo->save())
                {
                    //  finalizar hora medica
                    $hora_medica->id_estado = 6;
                    $mensaje_estado_hora_medica = '';
                    if (!$hora_medica->save()) {
                        $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                    }
                    else
                    {
                        $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                    }
                    $mensaje .= $mensaje_estado_hora_medica;

                    $mensaje .= 'Ficha Clínica  guardada de forma correcta\n';
                }




                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('laboratorio.agenda_laboratorio','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    // $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');
                }
            }
            else
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }



    public function generarPdfInformeRayos(Request $request)
    {
        if(!empty($request->t))
        {
            $fichaRayo = FichaAtencionRayo::where('token', $request->t)->get()->first();
            if($fichaRayo)
            {

                $ficha_atencion = FichaAtencion::find($fichaRayo->id_ficha_atencion);
                $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
                $paciente = Paciente::find($fichaRayo->id_paciente);
                $profesional = Profesional::find($fichaRayo->id_profesional);

                // Certificados y QR
                $token_receta = '';
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 1);
                if ($temp_token['estado'] != 1) {
                    $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 1);
                }
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);

                $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 26, $ficha_atencion->id);
                if ($temp_token['estado'] != 1) {
                    $temp_token = CertificadoController::certificadoProfesional($profesional->id, rand(1114, 999), 26, $ficha_atencion->id);
                }
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);

                $array_ficha_atencion = [
                    'id' => $ficha_atencion->id,
                    'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                    'token' => $token_receta,
                    'url' => $url_documento,
                    'qr' => $qr_documento,
                ];

                $array_ficha_atencion = [
                    'id' => $ficha_atencion->id,
                    'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                    'token' => $token_receta,
                    'url' => $url_documento,
                    'qr' => $qr_documento,
                ];

                $array_lugar_atencion = [
                    'id' => $lugar_atencion->id,
                    'nombre' => $lugar_atencion->nombre
                ];

                $array_profesional = [
                    'id' => $profesional->id,
                    'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                    'rut' => $profesional->rut,
                    'especialidad' => optional($profesional->SubTipoEspecialidad()->first())->nombre,
                    'token' => $token_profesional,
                    'url' => $url_profesional,
                    'qr' => $qr_profesional,
                ];

                $direccion = $paciente->Direccion()->first();
                $array_paciente = [
                    'id' => $paciente->id,
                    'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                    'fecha_nac' => $paciente->fecha_nac,
                    'rut' => $paciente->rut,
                    'sexo' => $paciente->sexo,
                    'direccion' => $direccion->direccion.' '.$direccion->numero_dir.', '.$direccion->Ciudad()->first()->nombre
                ];

                $cuerpo = [
                    'array_ficha_atencion' => $array_ficha_atencion,
                    'array_lugar_atencion' => $array_lugar_atencion,
                    'array_profesional' => $array_profesional,
                    'array_paciente' => $array_paciente,
                ];

                $titulo = 'Informe de Radiológico';

                $lista_imagenes = array();

                // if($fichaRayo->estado_archivo == 1)
                // {
                //     $archivos_temp = json_decode($fichaRayo->archivo); // Sin el parámetro true

                //     if (json_last_error() === JSON_ERROR_NONE) {

                //         $archivos_temp = json_decode($archivos_temp); // Sin el parámetro true
                //         // Recorrer el array de archivos
                //         foreach ($archivos_temp as $archivo) {
                //             // echo "Nombre: " . $archivo->nombre . "<br>";
                //             // echo "URL: " . $archivo->url . "<br><br>";

                //             if(file_exists(asset('storage/archivo/archivo/'.$archivo->nombre)))
                //             {
                //                 var_dump('existe');
                //                 $lista_imagenes[] = base64_encode(file_get_contents(asset('storage/imagenes/examen/'.$archivo->nombre)));
                //             }
                //         }
                //     } else {
                //         // echo "Error al decodificar el JSON: " . json_last_error_msg();
                //     }

                //     // var_dump($lista_temp);
                //     var_dump($lista_imagenes);
                //     die();
                // }

                return PdfController::generarPDF($titulo, compact('fichaRayo','lista_imagenes', 'ficha_atencion', 'lugar_atencion', 'paciente', 'profesional', 'array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente'), 'Informe'.$paciente->rut, 'pdf_informe_radiologico');
            }
            else
            {
                echo 'Ficha no encontrada';
                die();
            }
        }
        else
        {
            echo 'campo requerido';
            die();
        }
    }

    public function resultadosRayos(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['ID'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registros = FichaAtencionRayo::find($request->id);
            if($registros)
            {

               $lista_imagenes = array();

                if($registros->estado_archivo == 1) {
                    $archivos_temp = json_decode($registros->archivo);

                    if (json_last_error() === JSON_ERROR_NONE) {
                        // Recorrer el array de archivos
                        foreach ($archivos_temp as $archivo)
                        {
                            $ruta_fisica = public_path('storage/archivo/archivo/'.$archivo->nombre);

                            if(file_exists($ruta_fisica))
                            {
                                // Usar asset() solo para la URL pública en la lista final
                                $lista_imagenes[] = asset('storage/archivo/archivo/'.$archivo->nombre);
                            }
                        }
                    }
                }

                $idProcedimiento = $registros->id_procedimiento;
                $nombre_procedimiento = '';
                if (strpos($idProcedimiento, '|') !== false) {
                    // Convertir la cadena en un array de IDs
                    $array_id_procedimiento = explode('|', $idProcedimiento);

                    // Obtener todos los procedimientos que coincidan con los IDs
                    $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
                } else {
                    // Caso de un solo ID (número)
                    $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
                }

                if($procedimientoCentroTem)
                {
                    foreach ($procedimientoCentroTem as $key_nom_temp => $value_nom_temp) {
                        $nombre_procedimiento .= '<li>'.$value_nom_temp->nombre.'</li>';
                    }
                }

                // cambiamos el estado a revisado
                $registros->revisado = 1; // 1: pendiente, 2: revisado
                $registros->save();

                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
                $datos['lista_imagenes'] = $lista_imagenes;
                $datos['fecha_examen'] = date('d-m-Y', strtotime($registros->created_at));
                $datos['lista_nombre_examnes'] = $nombre_procedimiento;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
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

}
