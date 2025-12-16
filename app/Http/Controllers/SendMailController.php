<?php

namespace App\Http\Controllers;

use App\Mail\CorreoGenerico;
use App\Models\RegistroCorreo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{


    public function envioCorreoR(Request $request)
    {
        return static::envioCorreo($request->blade, $request->to, $request->cc, $request->bcc, $request->asunto, $request->body, $request->archivo, $request->id_institucion, $request->observaciones);
    }

    /**
     * ENVIO DE CORREO
     *
     * @param string $blade -> 'registrar_app'
     * @param array $to -> array(['email'=>'demo@demo.com','name'=>'name'],...,['email'=>'demo@demo.com','name'=>'name'])
     * @param array $cc -> array(['email'=>'demo@demo.com','name'=>'name'],...,['email'=>'demo@demo.com','name'=>'name'])
     * @param array $bcc -> array(['email'=>'demo@demo.com','name'=>'name'],...,['email'=>'demo@demo.com','name'=>'name'])
     * @param string $asunto
     * @param array $body -> array('nombre'=>'demo','usuario'=>'demo344','contrasena'=>'sindem0',...)
     * @param array $archivo -> array('url'=>'../pdf/documento.pdf','mime'=>'application/pdf') ó array(array('url'=>'../pdf/documento.pdf','mime'=>'application/pdf'), array('url'=>'../pdf/documento.pdf','mime'=>'application/pdf'))
     * @param int $id_institucion -> 13
     * @return array
     */
    static public function envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion, $observacion = null)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($blade))
        {
            $error['blade'] = 'campo requerido';
            $valido = 0;
        }
        if(count($to)==0)
        {
            $error['to'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $data = array(
                'blade' => $blade,
                'asunto' => $asunto,
                'body' => $body,
                'url_archivo' => $archivo,
                'observaciones' => $observacion,
                'id_institucion' => $id_institucion,
            );
       
            $correo = new CorreoGenerico($data);
     
            $listaBlade = array(
                // PACIENTE
                // 'bienvenida_paciente_usuario', 'hora_agendada', 'confirmar_hora', 'hora_confirmada_paciente', 'hora_cancelada_paciente', 'hora_anulada_profesional',
                // 'notificacion_video_llamada',
                // 'resultado_examen',
                // 'indicaciones_medicas_documento',
                // 'compra_bono',

                // PROFESIONAL
                'profesional_usuario_creado', 'invitacion_profesional', 'invitacion_profesional_convenio',
                // 'profesional_provisorio_creado',

                // ASISTENTE
                'bienvenida_asistente', 'bienvenida_asistente_usuario',

                // INSTITUCION
                // 'bienvenida_institucion',

                // ADMIN INSTITUCION
                // 'bienvenida_admin_institucion',

                // TODOS
                'recuperacion_contrasena', 'registrar_app',

                 // LABORATORIO
                'informe_terapia_voz',
                'campania_promocional',

                // ?
                // 'resultado_examen_lab',
            );



            if(in_array($blade, $listaBlade))
            {
                //envio correo a destino origen y copia oculta
                $bcc = array(
                    ['email'=>'contacto@med-sdi.cl','name'=>'Contacto MED-SDI'],
                    ['email'=>'jkriman@gmail.com','name'=>'Jaime']
                    //['email'=>'johan.e.davilap@gmail.com','name'=>'Johan']
                );
            }
            else
            {
                $lista_array = array('', 'jgkriman@gmail.com', 'danielasepulvedabravo@gmail.com', 'dasebraa@gmail.com', 'pgajardo1012@gmail.com');
                $enviar_dev = 1;
                foreach ($to as $key => $value)
                {
                    if(in_array($value['email'], $lista_array) != false)
                    {
                        $enviar_dev = 0;
                    }
                }

                if($enviar_dev)
                {
                    // desarrollo
                    $to = array(
                        ['email'=>'contacto@med-sdi.cl','name'=>'Contacto MED-SDI'],
                        ['email'=>'jkriman@gmail.com','name'=>'Jaime']
                        //['email'=>'johan.e.davilap@gmail.com','name'=>'Johan']
                    );
                }
                else
                {
                    //envio correo a destino origen y copia oculta
                    $bcc = array(
                        ['email'=>'contacto@med-sdi.cl','name'=>'Contacto MED-SDI'],
                        ['email'=>'jkriman@gmail.com','name'=>'Jaime']
                        //['email'=>'johan.e.davilap@gmail.com','name'=>'Johan']
                    );
                }
            }

            try {
                Mail::to($to)
                    ->cc($cc)
                    ->bcc($bcc)
                    ->send($correo);
            } catch (\Exception $e) {
                $datos['estado'] = 0;
                $datos['msj'] = 'Error al enviar correo: ' . $e->getMessage();
                $datos['trace'] = $e->getTraceAsString();
                return $datos;
            }

            $id_usuario = '1';
            if(!empty(Auth::user()))
                $id_usuario = Auth::user()->id;

            if (Mail::failures())
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en envio de correo';

                $registro_correo = new RegistroCorreo();
                $data_correo = array(
                    'blade' => $blade,
                    'to' => $to,
                    'cc' => $cc,
                    'bcc' => $bcc,
                    'asunto' => $asunto,
                    'body' => $body,
                    'archivo' => $archivo,
                    'id_institucion' => $id_institucion
                );

                $registro_correo->id_user = $id_usuario;
                $registro_correo->data = json_encode($data_correo);
                $registro_correo->fecha_envio = date('Y-m-d H:i:s');
                $registro_correo->estado = 0;

                if($registro_correo->save())
                {
                    $datos['registro_correo']['estado'] = 1;
                    $datos['registro_correo']['msj'] = 'registro exitoso';
                }
                else
                {
                    $datos['registro_correo']['estado'] = 0;
                    $datos['registro_correo']['msj'] = 'falla en el registro';
                }
            }
            else
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'email enviado';

                $registro_correo = new RegistroCorreo();
                $data_correo = array(
                    'blade' => $blade,
                    'to' => $to,
                    'cc' => $cc,
                    'bcc' => $bcc,
                    'asunto' => $asunto,
                    'body' => $body,
                    'archivo' => $archivo,
                    'id_institucion' => $id_institucion
                );

                $registro_correo->id_user = $id_usuario;
                $registro_correo->data = json_encode($data_correo);
                $registro_correo->fecha_envio = date('Y-m-d H:i:s');
                $registro_correo->estado = 1;

                if($registro_correo->save())
                {
                    $datos['registro_correo']['estado'] = 1;
                    $datos['registro_correo']['msj'] = 'registro exitoso';
                }
                else
                {
                    $datos['registro_correo']['estado'] = 0;
                    $datos['registro_correo']['msj'] = 'falla en el registro';
                }

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

    public function envioCorreoTest()
    {
        $blade = 'registrar_app';
        $to = array(
                array('email' => 'jkriman@gmail.com','name' => 'jaime'),
                array('email' => 'j2edavila@gmail.com','name' => 'johan'),
                array('email' => 'contacto@med-sdi.cl','name' => 'Contacto MED-sdi'),
                // array('email' => 'paul_baeza@hotmail.com','name' => 'paul')
            );
        $cc = array();
        $bcc = array();
        $asunto = 'MED-SDI - Codigo Registro APP';
        $body = array('CODIGO'=>'12345', 'NOMBRE_CLIENTE'=> 'demo demo', 'URL'=>'455646');
        // $archivo = 'documentos/consejosodontopediatría.pdf';/** pendiente */
        $archivo = '';/** pendiente */
        $id_institucion = '';

        return static::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

    }
}

