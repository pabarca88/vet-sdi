<?php

namespace App\Http\Controllers;

use App\Models\HoraMedica;
use App\Models\JitsiVideo;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JitsiController extends Controller
{

    public function index($id, $nombre)
    {
        $error = '';
        $token_invitado = '';
        $registro = JitsiVideo::where('nombre_grupo', $nombre)->get()->first();
        // var_dump( $nombre ) ;
        // var_dump( $registro ) ;
        // die();
        if($registro)
        {
            $token_invitado = $registro->$token_invitado;
        }
        else
        {
            $error = 'Link de llamada no valido';
        }

        return view('videollamada')->with([
            'id' => $id,
            'nombre' => $nombre,
            'error' => $error,
            'token_invitado' => $token_invitado,
        ]);
    }
    /** REGISTRO DE LLAMADA CON JITSI */
    public function registrar_r( Request $request )
    {
        return static::registrar( $request->id_profesional,
                                    $request->id_paciente,
                                    $request->nombre_grupo,
                                    $request->token,
                                    $request->token_inicio,
                                    $request->token_termino,
                                    $request->llamada_inicio,
                                    $request->llamada_termino,
                                    $request->estado );

    }

    static public function registrar( $id_profesional, $id_paciente, $nombre_grupo, $token_moderator, $token_invitado, $hora_inicio, $hora_termino, $llamada_inicio, $llamada_termino)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if( empty($id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if( empty($id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if( empty($nombre_grupo))
        {
            $error['nombre_grupo'] = 'campo requerido';
            $valido = 0;
        }

        // if( empty($token_moderator))
        // {
        //     $error['token_moderator'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( empty($token_invitado))
        // {
        //     $error['token_invitado'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( empty($hora_inicio))
        // {
        //     $error['hora_inicio'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( empty($hora_termino))
        // {
        //     $error['hora_termino'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( empty($llamada_inicio))
        // {
        //     $error['llamada_inicio'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( empty($llamada_termino))
        // {
        //     $error['llamada_termino'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if( $estado == '')
        // {
        //     $error['estado'] = 'campo requerido';
        //     $valido = 0;
        // }


        if($valido)
        {

            $registros = new JitsiVideo();

            $registros->id_profesional = $id_profesional;
            $registros->id_paciente = $id_paciente;
            $registros->nombre_grupo = $nombre_grupo;
            $registros->token_moderator = $token_moderator;
            $registros->token_invitado = $token_invitado;
            $registros->hora_inicio = $hora_inicio;
            $registros->hora_termino = $hora_termino;
            if(!empty($llamada_inicio))
                $registros->llamada_inicio = $llamada_inicio;
            if(!empty($llamada_termino))
                $registros->llamada_termino = $llamada_termino;
            $registros->estado = 1;

            if($registros->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
                $datos['last_id'] = $registros->id;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'capos requeridos';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }


    public function generarJWT_r(Request $request)
    {
        return $this->generarJWT(   $request->id_lugar_atencion,
                                    $request->id_usuario,
                                    $request->nombre_usuario,
                                    $request->imagen_usuario,
                                    $request->correo_usuario,
                                    $request->moderador,
                                    $request->nombre_profesional,
                                    $request->nombre_paciente,
                                    $request->fecha_inicio
                                );

    }
    /** GENERAR JWT */
    /**
     * @param $id_lugar_atencion int
     * @param $id_usuario int
     * @param $nombre_usuario string
     * @param $imagen_usuario string
     * @param $correo_usuario string
     * @param $moderador boolean
     * @param $nombre_profesional string
     * @param $nombre_paciente string
     * @param $fecha_inicio dateTime 2024-09-19 16:31:01
     */
    static public function generarJWT($id_lugar_atencion, $id_usuario, $nombre_usuario, $imagen_usuario, $correo_usuario, $moderador, $nombre_profesional, $nombre_paciente, $fecha_inicio)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($id_usuario))
        {
            $error['id_usuario'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($nombre_usuario))
        {
            $error['nombre_usuario'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($imagen_usuario))
        // {
        //     $error['imagen_usuario'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($correo_usuario))
        {
            $error['correo_usuario'] = 'campo requerido';
            $valido = 0;
        }

        if(!isset($moderador))
        {
            $error['moderador'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($nombre_profesional))
        {
            $error['nombre_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($nombre_paciente))
        {
            $error['nombre_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($fecha_inicio))
        {
            $error['fecha_inicio'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $app_id = env('JITSI_APP_ID');
            $api_key = env('JITSI_API_KEY');

            // $inicio = strtotime("2024-09-19 16:31:01");
            // $inicio = strtotime("now");
            $inicio = strtotime($fecha_inicio);
            // $termino = strtotime($inicio)+strtotime("2024-09-19 18:30:00");
            $termino = strtotime ( '+90 minute' , $inicio );
            // $termino = strtotime ( '+1 year' , $inicio );

            // var_dump($inicio);
            // var_dump($termino);


            /** NOMBRE PROFESIONAL  */
            $nombre_profesional = mb_strtoupper($nombre_profesional);
            $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
            $nombre_profesional = strtr( $nombre_profesional, $unwanted_array );
            $nombre_profesional_temp = str_replace(' ', '', $nombre_profesional);

            /** NOMBRE PACIENTE */
            $nombre_paciente = mb_strtoupper($nombre_paciente);
            $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
            $nombre_paciente = strtr( $nombre_paciente, $unwanted_array );
            $nombre_paciente_temp = str_replace(' ', '', $nombre_paciente);

            $nombre_consulta ='Consulta.'.$nombre_profesional_temp.'.'.$nombre_paciente_temp.'.'.$inicio;
            // $nombre_consulta = '*';

            $payload = [
                "aud"=> "jitsi",
                "iss"=> "chat",
                // "iat"=> $inicio,
                // "exp"=> $termino,
                // "nbf"=> $inicio,
                "iat"=> strtotime("2024-09-19 16:31:01"),
                "exp"=> strtotime ( '+1 year' , strtotime("2024-09-19 16:31:01") ),
                "nbf"=> strtotime("2024-09-19 16:31:01"),
                "sub"=> $app_id,
                "context"=> array(
                    "features"=> array(
                        "livestreaming"=> true,
                        "outbound-call"=> true,
                        "sip-outbound-call"=> false,
                        "transcription"=> true,
                        "recording"=> true
                    ),
                    "user"=> array(
                        "hidden-from-recorder"=> false,
                        "id"=> $id_usuario.'-'.$id_lugar_atencion.uniqid('',true),
                        "name"=> $nombre_usuario,
                        "avatar"=> $imagen_usuario,
                        "email"=> $correo_usuario,
                        "moderator"=> $moderador
                    )
                ),
                "room"=> $nombre_consulta
            ];

            /** sin enviar el public key */
            $jwt = JWT::encode($payload, env('JITSI_PRIVATE_KEY'), 'RS256', $api_key);

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['jwt'] = $jwt;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return (object)$datos;

    }


    /** MEODO PARA REGISTRAR LLAMDA DE CONSULTA */
    public function jitsiRegistroMeet_r( Request $request )
    {
        return static::jitsiRegistroMeet( $request->id_profesional, $request->id_paciente, $request->id_hora );
    }
    static public function jitsiRegistroMeet( $id_profesional, $id_paciente, $id_hora )
    {

        $profesional = Profesional::find($id_profesional);
        // busqueda de imagen
        $array_rut = explode('-',$profesional->rut);
        $nombre_imagen = asset('images/iconos/usuario_profesional.svg');
        if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png')))
        {
            $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
        }
        $profesional->img_profesional = $nombre_imagen;


        $paciente = Paciente::find($id_paciente);
        $hora_medica = HoraMedica::find($id_hora);

        $token_profesional = '';
        $token_profesional_temp = static::generarJWT(
            $hora_medica->id_lugar_atencion,
            $profesional->id_usuario,
            'Dr. '.$profesional->apellido_uno,
            $profesional->img_profesional,
            $profesional->email,
            true,
            'Dr. '.$profesional->apellido_uno,
            explode(' ', trim($paciente->nombres))[0].' '.$paciente->apellido_uno,
            date('Y-m-d H:i:s', strtotime($hora_medica->fecha_consulta . ' ' . $hora_medica->hora_inicio . ' -5 minutes'))
        );

        // echo json_encode($token_profesional_temp);
        // echo $token_profesional_temp->estado;

        if($token_profesional_temp->estado == 1)
        {
            $token_profesional = $token_profesional_temp->jwt;
        }
        else
        {
            return (object)array(
                'estado' => 0,
                'mjs' => 'falla en la generacion de Token para registro de llamada de profesional'
            );
        }

        $token_paciente = '';
        $token_paciente_temp = static::generarJWT(
            $hora_medica->id_lugar_atencion,
            empty($paciente->id_usuario)?$paciente->id:$paciente->id_usuario,
            explode(' ', trim($paciente->nombres))[0].' '.$paciente->apellido_uno,
            '',
            $paciente->email,
            false,
            'Dr. '.$profesional->apellido_uno,
            explode(' ', trim($paciente->nombres))[0].' '.$paciente->apellido_uno,
            date('Y-m-d H:i:s', strtotime($hora_medica->fecha_consulta . ' ' . $hora_medica->hora_inicio . ' -5 minutes'))
        );

         echo json_encode($token_paciente_temp);
        // echo $token_paciente_temp->estado;

        if($token_paciente_temp->estado == 1)
        {
            $token_paciente = $token_paciente_temp->jwt;
        }
        else
        {
            return (object)array(
                'estado' => 0,
                'mjs' => 'falla en la generacion de Token para registro de llamada de Paciente',
                'error' => $token_paciente_temp->error
            );
        }


        /** INICIO NOMBRE DE GRUPO  */
        /** NOMBRE PROFESIONAL  */
        $nombre_profesional = mb_strtoupper('Dr. '.$profesional->apellido_uno);
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                        'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
        $nombre_profesional = strtr( $nombre_profesional, $unwanted_array );
        $nombre_profesional_temp = str_replace(' ', '', $nombre_profesional);

        /** NOMBRE PACIENTE */
        $nombre_paciente = mb_strtoupper(explode(' ', trim($paciente->nombres))[0].' '.$paciente->apellido_uno,);
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                        'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
        $nombre_paciente = strtr( $nombre_paciente, $unwanted_array );
        $nombre_paciente_temp = str_replace(' ', '', $nombre_paciente);

        $nombre_consulta ='Consulta.'.$nombre_profesional_temp.'.'.$nombre_paciente_temp.'.'.strtotime(date('Y-m-d H:i:s', strtotime($hora_medica->fecha_consulta . ' ' . $hora_medica->hora_inicio . ' -5 minutes' )));
        /** FIN NOMBRE DE GRUPO  */

        $registro_meet = static::registrar(  $id_profesional,
                                            $id_paciente,
                                            $nombre_consulta,
                                            $token_profesional,
                                            $token_paciente,
                                            date('Y-m-d H:i:s', strtotime($hora_medica->fecha_consulta . ' ' . $hora_medica->hora_inicio)),
                                            date('Y-m-d H:i:s', strtotime($hora_medica->fecha_consulta . ' ' . $hora_medica->hora_termino)),
                                            '',
                                            ''
                                        );
        if($registro_meet->estado == 1)
        {
            $hora = HoraMedica::find($id_hora);
            $hora->id_jitsi_video_consulta = $registro_meet->last_id;
            $hora->save();
        }
        return $registro_meet;
    }

    public function buscarLlamadaJitsi(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id llamada'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = JitsiVideo::find($request->id);
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registo';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'campos requeridos';
                $datos['error'] = $error;
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

    public function envioNotificacionLlamada()
    {

        // $fecha = date('Y-m-d');
        $fecha = '2025-05-05';


        // Obtener la hora actual
        $horaActual = date('H:i:s');

        // Obtener la hora actual con 5 minutos añadidos
        $horaMasCinco = date('H:i:s', strtotime('+5 minutes'));

        $filtros = array();
        $filtros[] = array('fecha_consulta', $fecha);
        $filtros[] = array('tipo_hora_medica', 'T');
        $filtros[] = array('id_jitsi_video_consulta', '<>','');
        // $filtros[] = array('hora_inicio', $hora);


        $registros = HoraMedica::where($filtros)
                                ->whereIn('id_estado', [1,2,4,8])
                                //->whereTime('hora_inicio', '>', $horaActual)
                                //->whereTime('hora_inicio', '<', $horaMasCinco)
                                ->get();

        foreach ($registros as $key => $value)
        {

            $registro_jitsi = JitsiVideo::find($value->id_jitsi_video_consulta);
            if($registro_jitsi->estado == 1)
            {

                $id_profesional = $registro_jitsi->id_profesional;
                $profesional = Profesional::find($id_profesional);

                $id_paciente = $registro_jitsi->id_paciente;
                $paciente = Paciente::find($id_paciente);

                $nombre_grupo = $registro_jitsi->nombre_grupo;

                $lugar_atencion = LugarAtencion::find($value->id_lugar_atencion);

                $blade = 'notificacion_video_llamada';
                $to = array(
                        array('email' => $paciente->email,'name' => $paciente->nombres.' '.$paciente->apellido_uno)
                    );
                $cc = array();
                $bcc = array();
                $asunto = 'MED-SDI - Notificación Link de Consulta';
                $body = array(
                    'nombre_paciente' => $paciente->nombres.' '.$paciente->apellido_uno,
                    'nombre_profesional' => $profesional->nombres.' '.$profesional->apellido_uno,
                    'link_meet' => env('JITSI_LINK_MEET').env('JITSI_APP_ID').'/'.$nombre_grupo,
                    'lugar_atencion' => $lugar_atencion->nombre,
                    'fecha_consulta' => $value->fecha_consulta,
                    'hora_consulta' => $value->hora_inicio
                );

                $archivo = '';/** pendiente */
                $id_institucion = '';

                $correo = SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                if($correo['estado'])
                {
                    /** estado de notificado */
                    $registro_jitsi->estado = 2;
                    $registro_jitsi->save();
                }


            }
            else
            {
                $correo = array(
                    'estado' => 1,
                    'msj' => 'notificacion ya ha sido enviada'
                );
            }

            echo json_encode($correo);

            Log::build([
                'path' => storage_path('logs/log_envio_notificacion_link_consulta_' . date('Ymd') . '.log'),
              ])->info(json_encode($correo) );

        }

        return $registros;

    }

}
