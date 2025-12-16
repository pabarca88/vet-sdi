<?php

namespace App\Http\Controllers;

use App\Models\FichaAtencion;
use App\Models\GesRegistros;
use App\Models\GesRegistrosImg;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;

class GesRegistrosController extends Controller
{
    public function generarPdf_r(Request $request)
    {
        return static::generarPdf($request->id, $request->funcionalida);
    }
    static public function generarPdf($id, $funcionalida = 'V')
    {
        $datos = array();

        $registros = GesRegistros::find($id);

        if($registros)
        {

            $registros_archivo = GesRegistrosImg::where('id_registro_ges', $id)->get();

            $paciente = Paciente::find($registros->id_paciente);

            // info solicitud
            $ficha_atencion = FichaAtencion::find($registros->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($registros->id_profesional);
            // $token_firma_soli = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );



            /** token receta */
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 11, $id);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 11, $id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            // $temp_token = CertificadoController::certificadoProfesional($profesional->id);
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $id, 11, $id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                // $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $id, 11, $id);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre,
                'email' => $paciente->email,
                'telefono_uno' => $paciente->telefono_uno,
            );


            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );

            // array solicitud
            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array = array(
                'id' => $registros->id,
                'nombre_institucion_ficha_ges' => $registros->nombre_institucion_ficha_ges,
                'direccion_institucion_ficha_ges' => $registros->direccion_institucion_ficha_ges,
                'nombre_responsable_ficha_ges' => $registros->nombre_responsable_ficha_ges,
                'rut_responsable_ficha_ges' => $registros->rut_responsable_ficha_ges,
                'confirmacion_diagnostica_ficha_ges' => $registros->confirmacion_diagnostica_ficha_ges,
                'paciente_tratamiento_ficha_ges' => $registros->paciente_tratamiento_ficha_ges,
                'fecha_ficha_ges' => $registros->fecha_ficha_ges,
                'hora_ficha_ges' => $registros->hora_ficha_ges,
                'id_ges_diagnostico' => $registros->id_ges_diagnostico,
                'nombre_ges' => $registros->nombre_ges,
                'registros_archivo' => $registros_archivo,
            );

            $rut_temp = str_replace(str_replace($paciente->rut, '.', ''), '-', '');
            $nombre_archivo = strtolower('Constancia_GES_'.$paciente->rut.'_'.rand(1111,9999));

            return  PdfController::generarPDF('NOTIFICACIÓN CONSTANCIA INFORMACIÓN AL PACIENTE GES', compact( 'array_paciente', 'array_lugar_atencion', 'array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array'), $nombre_archivo, 'notificacion_ges', $funcionalida);

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }


    public function vistaPreviaPdf_r(Request $request)
    {
        return static::vistaPreviaPdf($request->id_ficha_atencion, $request->nombre_institucion_ficha_ges, $request->direccion_institucion_ficha_ges, $request->nombre_responsable_ficha_ges, $request->rut_responsable_ficha_ges, $request->confirmacion_diagnostica_ficha_ges, $request->paciente_tratamiento_ficha_ges, $request->fecha_ficha_ges, $request->hora_ficha_ges, $request->id_ges_diagnostico, $request->nombre_ges);
    }

    static public function vistaPreviaPdf($id_ficha_atencion, $nombre_institucion_ficha_ges, $direccion_institucion_ficha_ges, $nombre_responsable_ficha_ges, $rut_responsable_ficha_ges, $confirmacion_diagnostica_ficha_ges, $paciente_tratamiento_ficha_ges, $fecha_ficha_ges, $hora_ficha_ges, $id_ges_diagnostico, $nombre_ges)
    {
        $datos = array();

        $ficha_atencion = FichaAtencion::find($id_ficha_atencion);
        $paciente = Paciente::find($ficha_atencion->id_paciente);
        $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
        $profesional = Profesional::find($ficha_atencion->id_profesional);

        /** token archivo */
        $temp_token = '';
        $token_receta = '';
        $url_documento = '';
        $qr_documento = '';

        /** token profesional */
        $temp_token = CertificadoController::certificadoProfesional($profesional->id, date('YmdHis'), 11, date('YmdHis'));
        if($temp_token['estado'] == 1)
        {
            $token_profesional = $temp_token['certificado'];
            $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
            $qr_profesional = GeneradorQrController::generar($url_documento);
        }
        else
        {
            $temp_token = CertificadoController::certificadoProfesional(rand(111111,999999), date('YmdHis'), 11, date('YmdHis'));

            var_dump($temp_token);

            $token_profesional = $temp_token['certificado'];
            $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
            $qr_profesional = GeneradorQrController::generar($url_documento);
        }

        $array_paciente = array(
            'id' => $paciente->id,
            'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
            'fecha_nac' => $paciente->fecha_nac,
            'rut' => $paciente->rut,
            'sexo' => $paciente->sexo,
            'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre,
            'email' => $paciente->email,
            'telefono_uno' => $paciente->telefono_uno,
        );


        $array_lugar_atencion = array(
            'id' => $lugar_atencion->id,
            'nombre' => $lugar_atencion->nombre
        );

        // array solicitud
        $array_ficha_atencion = array(
            'id' => $ficha_atencion->id,
            'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
            'token' => $token_receta,
            'url' => $url_documento,
            'qr' => $qr_documento,
        );
        $array_lugar_atencion = array(
            'id' => $lugar_atencion->id,
            'nombre' => $lugar_atencion->nombre
        );
        $array_profesional = array(
            'id' => $profesional->id,
            'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
            'rut' => $profesional->rut,
            'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
            'token' =>  $token_profesional,
            'url' =>  $url_profesional,
            'qr' =>  $qr_profesional,
        );
        $array = array(
            'nombre_institucion_ficha_ges' => $nombre_institucion_ficha_ges,
            'direccion_institucion_ficha_ges' => $direccion_institucion_ficha_ges,
            'nombre_responsable_ficha_ges' => $nombre_responsable_ficha_ges,
            'rut_responsable_ficha_ges' => $rut_responsable_ficha_ges,
            'confirmacion_diagnostica_ficha_ges' => $confirmacion_diagnostica_ficha_ges,
            'paciente_tratamiento_ficha_ges' => $paciente_tratamiento_ficha_ges,
            'fecha_ficha_ges' => $fecha_ficha_ges,
            'hora_ficha_ges' => $hora_ficha_ges,
            'id_ges_diagnostico' => $id_ges_diagnostico,
            'nombre_ges' => $nombre_ges,
        );

        $rut_temp = str_replace(str_replace($paciente->rut, '.', ''), '-', '');
        $nombre_archivo = strtolower('TEMP_Constancia_GES_'.$paciente->rut.'_'.rand(1111,9999));

        return  PdfController::generarPDF('NOTIFICACIÓN CONSTANCIA INFORMACIÓN AL PACIENTE GES', compact( 'array_paciente', 'array_lugar_atencion', 'array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array'), $nombre_archivo, 'notificacion_ges');

    }
}
