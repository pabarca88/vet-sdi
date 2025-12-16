<?php

namespace App\Http\Controllers;

use App\Models\FichaPediatriaVacuna;
use App\Models\Instituciones;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use Illuminate\Http\Request;

class FichaPediatriaVacunaController extends Controller
{
    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {

            $id_institucion = $request->id_institucion;
            $nombre_institucion = $request->nombre_institucion;
            if(empty($request->id_institucion))
            {
                $institucion = Instituciones::where('id_lugar_atencion', $request->id_lugar_atencion)->get()->first();
                if($institucion)
                {
                    $id_institucion = $institucion->id;
                    $nombre_institucion = $institucion->nombre;
                }
                else
                {
                    $id_institucion = null;
                    $nombre_institucion = null;
                }
            }
            else
            {
                $id_institucion = $request->id_institucion;
                $nombre_institucion = $request->nombre_institucion;
            }

            $periodo = '';
            if(empty($request->periodo))
            {
                $periodo = '';
                $paciente = Paciente::find($request->id_paciente);
                $fecha_cumple = $paciente->fecha_nac;
                $periodo = \Carbon\Carbon::parse($fecha_cumple)->age;
            }
            else
            {
                $periodo = $request->periodo;
            }


            $registro = new FichaPediatriaVacuna();

            $registro->id_lugar_atencion = $request->id_lugar_atencion;
            $registro->id_ficha_atencion = $request->id_ficha_atencion;
            $registro->id_ficha_pediatria = $request->id_ficha_pediatria;
            $registro->id_paciente = $request->id_paciente;
            $registro->id_responsable = $request->id_responsable;
            $registro->id_profesional = $request->id_profesional;
            $registro->id_tipo_vacuna = $request->id_tipo_vacuna;
            $registro->tipo_vacuna = $request->tipo_vacuna;
            $registro->id_estado_vacuna = $request->id_estado_vacuna;
            $registro->texto_estado_vacuna = $request->texto_estado_vacuna;
            $registro->id_vacuna = $request->id_vacuna;
            $registro->nombre_vacuna = $request->nombre_vacuna;
            $registro->id_dosis = $request->id_dosis;
            $registro->texto_dosis = $request->texto_dosis;
            $registro->periodo = $periodo;
            $registro->indicaciones_vacuna = $request->indicaciones_vacuna;
            $registro->observacion_vacuna = $request->observacion_vacuna;
            $registro->fecha = date('Y-m-d');
            $registro->hora = date('H:i:s');
            $registro->id_institucion = $id_institucion;
            $registro->nombre_institucion = $nombre_institucion;
            $registro->id_servicio = $request->id_servicio;
            $registro->nombre_servicio = $request->nombre_servicio;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
        }
        return $datos;
    }

    public function verRegistros(Request $request)
    {
        $datos = array();
        $filtro = array();
        if(!empty($request->id_lugar_atencion))
            $filtro[] = array('id_lugar_atencion', $request->id_lugar_atencion);
        if(!empty($request->id_paciente))
            $filtro[] = array('id_paciente', $request->id_paciente);
        if(!empty($request->id_responsable))
            $filtro[] = array('id_responsable', $request->id_responsable);
        if(!empty($request->id_profesional))
            $filtro[] = array('id_profesional', $request->id_profesional);
        if(!empty($request->id_tipo_vacuna))
            $filtro[] = array('id_tipo_vacuna', $request->id_tipo_vacuna);
        if(!empty($request->tipo_vacuna))
            $filtro[] = array('tipo_vacuna', $request->tipo_vacuna);
        if(!empty($request->id_estado_vacuna))
            $filtro[] = array('id_estado_vacuna', $request->id_estado_vacuna);
        if(!empty($request->id_vacuna))
            $filtro[] = array('id_vacuna', $request->id_vacuna);
        if(!empty($request->nombre_vacuna))
            $filtro[] = array('nombre_vacuna', $request->nombre_vacuna);
        if(!empty($request->id_dosis))
            $filtro[] = array('id_dosis', $request->id_dosis);
        if(!empty($request->texto_dosis))
            $filtro[] = array('texto_dosis', $request->texto_dosis);
        if(!empty($request->id_institucion))
            $filtro[] = array('id_institucion', $request->id_institucion);
        if(!empty($request->nombre_institucion))
            $filtro[] = array('nombre_institucion', $request->nombre_institucion);
        if(!empty($request->id_servicio))
            $filtro[] = array('id_servicio', $request->id_servicio);
        if(!empty($request->nombre_servicio))
            $filtro[] = array('nombre_servicio', $request->nombre_servicio);

        $registros = FichaPediatriaVacuna::where($filtro)->get();

        if($registros)
        {

            foreach ($registros as $key => $value)
            {
                $paciente = Paciente::find($value->id_paciente);
                $fecha_nac = $paciente->fecha_nac;
                $edad = \Carbon\Carbon::parse($fecha_nac)->age;

                $registros[$key]['edad'] = $edad;
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

        return $datos;
    }

    public function generarPdfCarnet(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $paciente = Paciente::find($request->id_paciente);

            if($paciente)
            {

                /** token receta */
                $temp_token_carnet = CertificadoController::certificadoDocumento($paciente->id, $paciente->id, $paciente->id, 23);
                if($temp_token_carnet['estado'] == 1)
                {
                    $token_carnet = $temp_token_carnet['certificado'];
                    $url_carnet = CertificadoController::generarUrlDocumento($token_carnet);
                    $qr_carnet = GeneradorQrController::generar($url_carnet);
                }
                else
                {
                    $temp_token_carnet = CertificadoController::certificadoDocumento($paciente->id, rand(111,999), $paciente->id, 23);
                    $token_carnet = $temp_token_carnet['certificado'];
                    $url_carnet = CertificadoController::generarUrlDocumento($token_carnet);
                    $qr_carnet = GeneradorQrController::generar($url_carnet);
                }

                $qr_id = GeneradorQrController::generar(encrypt($paciente->id));

                $array_carnet = array(
                    'token' => $token_carnet,
                    'url' => $url_carnet,
                    'qr' => $qr_carnet,
                    'qr_id' => $qr_id,
                );

                $array_paciente = array(
                    'id' => $paciente->id,
                    'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                    'fecha_nac' => $paciente->fecha_nac,
                    'rut' => $paciente->rut,
                    'sexo' => $paciente->sexo,
                    'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
                );

                $vacunas = FichaPediatriaVacuna::with(['LugarAtencion' => function($query){
                                                    $query->select('id', 'nombre');
                                                }])
                                                ->with(['TipoVacuna' => function($query){
                                                    $query->select('id', 'nombre');
                                                }])
                                                ->with(['Profesional' => function($query){
                                                    $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut');
                                                }])
                                                ->where('id_paciente', $paciente->id)
                                                ->orderBy('id_tipo_vacuna', 'ASC')
                                                ->orderBy('fecha', 'DESC')
                                                ->get();

                $cantidad_vacunas = $vacunas->count();

                $rut = str_replace('.','', $paciente->rut);
                $rut = str_replace('-','_', $rut);
                $nombre_archivo = strtolower('carnet_vacuna_'.$rut);
                return  PdfController::generarPDF('', compact( 'array_paciente', 'array_carnet', 'vacunas', 'cantidad_vacunas'), $nombre_archivo, 'pdf_carnet_vacunacion');
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'campos requeridos';
                $datos['error'] = $error;

                return $datos;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;

            return $datos;
        }
    }
}
