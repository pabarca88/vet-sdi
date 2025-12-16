<?php

namespace App\Http\Controllers;

use App\Models\ExamenMedico;
use App\Models\ResultadoExamen;
use App\Models\ResultadoExamenArchivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResultadoExamenController extends Controller
{

    static public function registrar($id_lugar_atencion,$id_institucion,$tipo_examen,$nombre_examen,$id_paciente,$rut,$nombre,$apellido_paterno,$apellido_materno,$email,$observacion, $fecha_regsitro, $lista_archivo, $id_profesional, $profesional_rut, $profesional_nombre)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($tipo_examen))
        {
            $error['tipo_examen'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($apellido_paterno))
        {
            $error['apellido_paterno'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($apellido_materno))
        {
            $error['apellido_materno'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($email))
        {
            $error['email'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $id_user = Auth::user()->id;

            $registro = new ResultadoExamen();
            if(!empty($id_lugar_atencion))
                $registro->id_lugar_atencion = $id_lugar_atencion;

            if(!empty($id_institucion))
                $registro->id_institucion = $id_institucion;

            $registro->id_user = $id_user;

            $registro->tipo_examen = $tipo_examen;

            if(!empty($nombre_examen))
                $registro->nombre_examen = $nombre_examen;

            $registro->id_paciente = $id_paciente;
            $registro->rut = $rut;
            $registro->nombre = $nombre;
            $registro->apellido_paterno = $apellido_paterno;
            $registro->apellido_materno = $apellido_materno;
            $registro->email = $email;

            if(!empty($id_profesional))
                $registro->id_profesional = $id_profesional;

            if(!empty($profesional_rut))
                $registro->profesional_rut = $profesional_rut;

            if(!empty($profesional_nombre))
                $registro->profesional_nombre = $profesional_nombre;

            $registro->observacion = $observacion;

            if(!empty($fecha_regsitro))
                $registro->fecha_registro = $fecha_regsitro;
            else
                $registro->fecha_registro = date('Y-m-d');

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';

                /** REGISTROS DE ARCHIVOS */
                if(!empty($lista_archivo))
                {
                    $lista_archivo_array = json_decode($lista_archivo);
                    $canidad_archivos = count($lista_archivo_array);

                    $datos['update_cantidad'] = ResultadoExamen::where('id', $registro->id)->update(['cantidad' => $canidad_archivos]);

                    $resulto_archivo = array();
                    foreach ($lista_archivo_array as $key => $value)
                    {
                        $ruta_temp = $value[0];
                        $nombre_real = $value[1];
                        $nombre_temp = $value[2];
                        $file_extension = $value[3];
                        $nombre_final = $rut.'_resultado_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                        $resulto_archivo[$key] = CargaExamenController::moverArchivo($nombre_temp, 'examen', $nombre_final);

                        $archivo = new ResultadoExamenArchivo();
                        $archivo->id_resultado_examen = $registro->id;
                        $archivo->nombre = $nombre_final;
                        $archivo->url = $resulto_archivo[$key]['proceso']['url'];

                        if($archivo->save())
                        {

                            $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                            $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                            $datos['archivo'][$key]['estado'] = 1;
                            $datos['archivo'][$key]['msj'] = 'registro';
                            $datos['archivo'][$key]['url_temp'] = $url_temp;
                            $datos['archivo'][$key]['archivo_correo'] = $archivo_correo;
                            $datos['archivo'][$key]['resulto_archivo'] = $resulto_archivo;
                        }
                        else
                        {
                            $datos['archivo'][$key]['estado'] = 0;
                            $datos['archivo'][$key]['msj'] = 'falla';
                        }
                    }

                    $datos['notificacion'] = ResultadoExamenController::notificar($registro->id);
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en registro';
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

    static public function  verArchivos(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id_examen'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registros = ResultadoExamenArchivo::where('id_resultado_examen', $request->id)->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registros'] = $registros;
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

        return $datos;
    }

    static public function resultadoRevisado(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro = ResultadoExamen::find($request->id);
            if($registro)
            {
                $registro->revisado = 1;
                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro exitoso';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla en registro';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function notificar_r(Request $request)
    {
        return static::notificar($request->id);
    }
    static public function notificar($id_resultado_examen)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {

            $registro = ResultadoExamen::find($id_resultado_examen);

            if($registro)
            {
                $archivos = ResultadoExamenArchivo::where('id_resultado_examen', $id_resultado_examen)->get();
                if($archivos)
                {
                    $lista_archivo = array();
                    foreach ($archivos as $key => $value)
                    {
                        $arrayTemp = array(
                            'url'=> Storage::disk('examen')->path($value->nombre),
                            'mime'=> Storage::disk('examen')->mimeType($value->nombre),
                        );
                        array_push($lista_archivo, $arrayTemp );
                    }

                    $tipo_examen_medico = ExamenMedico::find($registro->tipo_examen);
                    /** envio correo */
                    $blade = 'resultado_examen_lab';
                    $to = array(
                            array('email' => $registro->email, 'name' => $registro->nombre.' '.$registro->apellido_paterno.' '.$registro->apellido_materno),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Resultado Examen';
                    $body = array(
                        'NOMBRE_PACIENTE' => mb_strtoupper($registro->nombre.' '.$registro->apellido_paterno.' '.$registro->apellido_materno),
                        'TIPO_EXAMEN' => mb_strtoupper($tipo_examen_medico->nombre_examen),
                        'OBSERVACION' => $registro->observacion,
                    );
                    $archivo = $lista_archivo;
                    $id_institucion = '';

                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);
                    if($result_mail['estado'] == 1)
                    {
                        $datos['notificacion']['estado'] = 1;
                        $datos['notificacion']['msj'] = 'correo enviado';
                    }
                    else
                    {
                        $datos['notificacion']['estado'] = 0;
                        $datos['notificacion']['msj'] = 'falle en envio de correo';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'archivo de resultado examen no encontrado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'resultado examen no encontrado';
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'notificado';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;

    }

    public function testArchivo()
    {
        echo Storage::disk('examen')->exists('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo '<br/>';

        echo Storage::disk('examen')->size('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo '<br/>';

        echo Storage::disk('examen')->url('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo '<br/>';

        echo Storage::disk('examen')->path('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo '<br/>';

        echo Storage::disk('examen')->mimeType('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo '<br/>';

        $contenido = Storage::disk('examen')->get('26340063-1_resultado_20230902004322_64f2bd6a24a56.jpg');
        echo ($contenido);
        echo '<br/>';
    }

    public function verRegistrosRut(Request $request)
    {
        $datos = array();
        $error = array();
        $filtro = array();
        $valido = 1;

        if(empty($request->rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro[] = array('rut', $request->rut);

            $registros = ResultadoExamen::rangoFecha($request->rango_dias)->where($filtro)->get();

            if($registros)
            {

                foreach ($registros as $key => $value)
                {
                    $tipoE = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                    $registros[$key]['tipo_examen'] = $tipoE;
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
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

    public function resultadoVer(Request $request)
    {
        $datos = array();
        $error = array();
        $filtro = array();
        $valido = 1;

        if($valido)
        {
            if(!empty($request->id))
                $filtro[] = array('id', $request->id);

            if(!empty($request->id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion', $request->id_lugar_atencion);

            if(!empty($request->id_institucion))
                $filtro[] = array('id_institucion', $request->id_institucion);

            if(!empty($request->id_user))
                $filtro[] = array('id_user', $request->id_user);

            if(!empty($request->tipo_examen))
                $filtro[] = array('tipo_examen', $request->tipo_examen);

            if(!empty($request->id_paciente))
                $filtro[] = array('id_paciente', $request->id_paciente);

            if(!empty($request->rut))
                $filtro[] = array('rut', $request->rut);

            if(!empty($request->nombre))
                $filtro[] = array('nombre', 'like', $request->nombre.'%');

            if(!empty($request->apellido_paterno))
                $filtro[] = array('apellido_paterno', 'like', $request->apellido_paterno.'%');

            if(!empty($request->apellido_materno))
                $filtro[] = array('apellido_materno', 'like', $request->apellido_materno.'%');

            if(!empty($request->email))
                $filtro[] = array('email', $request->email);

            if(!empty($request->observacion))
                $filtro[] = array('observacion', 'like', $request->observacion.'%');

            if(!empty($request->cantidad))
                $filtro[] = array('cantidad', $request->cantidad);

            if(!empty($request->fecha_registro))
                $filtro[] = array('fecha_registro', $request->fecha_registro);

            if($request->revisado != '')
                $filtro[] = array('revisado', $request->revisado);

            if($request->estado != '')
                $filtro[] = array('estado', $request->estado);


            $registros = ResultadoExamen::where($filtro)->get();
            if($registros)
            {
                if($registros)
                {
                    foreach ($registros as $key => $value)
                    {
                        $result_tipo_ex = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                        $registros[$key]['obj_tipo_examen'] = $result_tipo_ex;
                    }
                }
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
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
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }
}
