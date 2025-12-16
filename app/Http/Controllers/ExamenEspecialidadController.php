<?php

namespace App\Http\Controllers;

use App\Models\ExamenBiopsia;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenEspecialidadImg;
use App\Models\ExamenEspecialidadTemplate;
use App\Models\ExamenEspecialidadTipo;
use App\Models\ExamenLaboratorioTemplate;
use App\Models\ExamenLaboratorioTipo;
use App\Models\FichaAtencion;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExamenEspecialidadController extends Controller
{


    public function estructurajson_r(Request $request)
    {
        return static::estructuraJson($request->id_template, $request->all());
    }

    static public function estructuraJson($id_template, $parametros)
    {
        Log::channel('ExamenEspecialidad')->info(json_encode($id_template));
        Log::channel('ExamenEspecialidad')->info(json_encode($parametros));
        $datos = array();
        $error = array();
        $campo_requerido = 1;

        if(empty($id_template))
        {
            $error['id_template'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if(empty($parametros))
        {
            $error['parametros'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if($campo_requerido)
        {

            $template = ExamenEspecialidadTemplate::find($id_template);
            if($template)
            {
                $estructura = explode('|',$template->estructura);
                $cant_estructura = count($estructura);
                $cant_datos = 0;
                $alias = $template->alias;
                $info = array();
                foreach ($estructura as $key => $value)
                {
                    if($value == 'estado')
                        $info[$value] = '1';
                    else
                        $info[$value] = '';
                }
                foreach ($parametros as $key_param => $value_param) {
                    $temp = str_replace('id_fc','id_fichas_atenciones',$key_param);
                    $temp = str_replace('descripcion_examen_rfl','motivo',$temp);
                    $temp = str_replace('_'.$alias,'',$temp);//
                    $temp = str_replace('_fc','',$temp);

                    if(key_exists($temp,$info))
                    {
                        $info[$temp] = $value_param;

                        if( !empty($value_param) && !is_null($value_param) && $value_param != 'null' && $temp != 'id_fichas_atenciones' && $temp != 'id_ficha_otorrino' && $temp != 'id_paciente' && $temp != 'motivo' && $temp != 'estado')
                        {
                            $cant_datos++;
                        }
                    }
                }

                $datos['estado'] = 1;
                $datos['cant_estructura'] = $cant_estructura;
                $datos['cant_datos'] = $cant_datos;
                $datos['msj'] = 'json';
                $datos['json'] = json_encode($info);
                // $datos['json'] = ($info);

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Template no encontrado';
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function generarPDF_r(Request $request)
    {
        if(empty($request->pdf_tipo))
            return static::generarPDF($request->id_examen_especialidad);
        else
            return static::generarPDF($request->id_examen_especialidad, $request->pdf_tipo);
    }

    static public function generarPDF($id_examen_especialidad, $pdf_tipo = 'V')
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_examen_especialidad))
        {
            $error['id_examen_especialidad'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $examen = ExamenEspecialidad::find($id_examen_especialidad);
            if($examen)
            {
                /** CARGA DE INFORMACION BASE */
                $ficha_atencion = FichaAtencion::find($examen->id_ficha_atencion);
                $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
                $tipo = ExamenEspecialidadTipo::find($examen->id_examen_tipo);
                $template = ExamenEspecialidadTemplate::find($examen->id_template);
                $paciente = Paciente::find($examen->id_paciente);
                $profesional = Profesional::find($examen->id_profesional);

                /** ARMANDO CUERPO */
                $imagenes = ExamenEspecialidadImg::where('id_examen', $examen->id)->get();
                $registro = json_decode($examen->cuerpo);

                $template_pdf = $template->pdf;

                if(isset($registro->solicitado_id_profesional))
                {
                    if(!empty($registro->solicitado_id_profesional))
                    {
                        $profesional_temp = Profesional::find($registro->solicitado_id_profesional);
                        if($profesional_temp)
                        {
                            $registro->solicitado_nombre = $profesional_temp->nombre;
                            $registro->solicitado_por_nombre = $profesional_temp->nombre;
                            $registro->solicitado_apellido = $profesional_temp->apellido_uno.' '.$profesional_temp->apellido_dos;
                            $registro->solicitado_por_apellido = $profesional_temp->apellido_uno.' '.$profesional_temp->apellido_dos;
                            $registro->solicitado_rut = $profesional_temp->rut;
                            $registro->solicitado_por_rut = $profesional_temp->rut;
                            $registro->solicitado_email = $profesional_temp->email;
                            $registro->solicitado_por_email = $profesional_temp->email;
                        }
                    }
                }
                else if(isset($registro->id_profesional_solicitado_por))
                {
                    if(!empty($registro->id_profesional_solicitado_por))
                    {
                        $profesional_temp = Profesional::find($registro->id_profesional_solicitado_por);
                        if($profesional_temp)
                        {
                            $registro->solicitado_nombre = $profesional_temp->nombre;
                            $registro->solicitado_por_nombre = $profesional_temp->nombre;
                            $registro->solicitado_apellido = $profesional_temp->apellido_uno.' '.$profesional_temp->apellido_dos;
                            $registro->solicitado_por_apellido = $profesional_temp->apellido_uno.' '.$profesional_temp->apellido_dos;
                            $registro->solicitado_rut = $profesional_temp->rut;
                            $registro->solicitado_por_rut = $profesional_temp->rut;
                            $registro->solicitado_email = $profesional_temp->email;
                            $registro->solicitado_por_email = $profesional_temp->email;
                        }
                    }
                }

                // var_dump($registro);
                // die();
                foreach ($registro as $key => $value)
                {
                    if(trim($key) == 'imagenes')
                    {

                        // if(trim($value) != 'IMAGEN REGISTRADA')
                        // {
                        //     $template_pdf = str_replace( strtoupper('{{'.$key.'}}'), $value, $template_pdf);
                        // }
                    }
                    else if(trim($key) == 'biopsia')
                    {
                        if(trim($value) == '1')
                        {
                            $template_pdf = str_replace( strtoupper('{{'.$key.'}}'), 'SI', $template_pdf);
                        }
                        else
                        {
                            $template_pdf = str_replace( strtoupper('{{'.$key.'}}'), 'NO', $template_pdf);
                        }
                    }
                    else
                    {
                        $template_pdf = str_replace( strtoupper('{{'.$key.'}}'), $value, $template_pdf);
                    }
                }

                $lista_imagnes = $imagenes;
                $cuerpo_img = '<table>';

                if(!empty($lista_imagnes))
                {

                    $cant_img_total = count($lista_imagnes);
                    $cant_img_row = 0;
                    foreach($lista_imagnes as $key => $img)
                    {
                        if(file_exists(asset('storage/imagenes/examen/'.$img->nombre)))
                        {
                            if($cant_img_row == 0)
                            {
                                $cuerpo_img .= '<tr>';
                            }
                            $cant_img_row++;

                            $cuerpo_img .= '<td style="padding:5px;width:33.33%">';
                            // var_dump(asset('storage/imagenes/examen/'.$img->nombre));
                            $img_temp = base64_encode(file_get_contents(asset('storage/imagenes/examen/'.$img->nombre)));
                            if(isset($img->otro))
                                $cuerpo_img .= '<img style="width:80%" src="data:image/png;base64,'.$img_temp.'" alt="'.$img->nombre.'"><br/>'.$img->otro.'';
                            else
                                $cuerpo_img .= '<img style="width:80%" src="data:image/png;base64,'.$img_temp.'" alt="'.$img->nombre.'">';

                            $cuerpo_img .= '</td>';

                            if($cant_img_total<3 && $cant_img_total == $cant_img_row)
                            {
                                for ($i=$cant_img_row; $i < 3; $i++) {
                                    $cuerpo_img .= '<td style="padding:5px;width:33.33%"></td>';
                                    $cant_img_row++;
                                }
                            }


                            if($cant_img_row == 3)
                            {
                                $cuerpo_img .= '</tr>';
                                $cant_img_row = 0;
                            }
                        }
                    }
                }
                else
                {
                    // $template_pdf = str_replace( strtoupper('{{IMAGENES}}'), $cuerpo_img, $template_pdf);
                }
                $cuerpo_img .= '</table>';

                $template_pdf = str_replace( strtoupper('{{IMAGENES}}'), $cuerpo_img, $template_pdf);
                /** CIERRE ARMANDO CUERPO */

                /** TOKEN DE RECETA */
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 4, $examen->id);
                if($temp_token['estado'] == 1)
                {
                    $token_receta = $temp_token['certificado'];
                    $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                    $qr_documento = GeneradorQrController::generar($url_documento);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 4, $examen->id);
                    $token_receta = $temp_token['certificado'];
                    $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                    $qr_documento = GeneradorQrController::generar($url_documento);
                }

                /** TOKEN DE PROFESIONAL */
                $temp_token = CertificadoController::certificadoProfesional($profesional->id, rand(111,999), 4, $examen->id);
                if($temp_token['estado'] == 1)
                {
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_documento);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), rand(111,999), 4, $examen->id);
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_documento);
                }

                $nombre_archivo = str_replace(' ','_',mb_strtolower('examen_'.$tipo->nombre)).'_'.$paciente->rut.'_'.rand(1111,999);
                $nombre_archivo = str_replace('á','a',str_replace('é','e',str_replace('í','i',str_replace('ó','o',str_replace('ú','u',$nombre_archivo)))));

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
                $array_paciente = array(
                    'id' => $paciente->id,
                    'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                    'fecha_nac' => $paciente->fecha_nac,
                    'rut' => $paciente->rut,
                    'sexo' => $paciente->sexo,
                    'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
                );

                // echo json_encode($imagenes);
                // die();

                // return  PdfController::generarPDF($tipo->nombre, compact('imagenes', 'registro', 'array_lugar_atencion', 'array_profesional', 'array_paciente','array_ficha_atencion'), $nombre_archivo, 'pdf_orl_rino',$pdf_tipo);
                return  PdfController::generarPDF($tipo->nombre, compact('template_pdf', 'array_lugar_atencion', 'array_profesional', 'array_paciente','array_ficha_atencion'), $nombre_archivo, 'pdf_orl_rino',$pdf_tipo);

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Examen no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function visualizarGenerarPDF_r(Request $request)
    {
        return static::visualizarGenerarPDF($request->id_ficha, $request->contenido, $request->imagenes);
    }
    static public function visualizarGenerarPDF($id_ficha, $contenido, $imagenes, $pdf_tipo = 'V')
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_ficha))
        {
            $error['id_ficha'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($contenido))
        {
            $error['contenido'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = json_decode($contenido);

            /** CARGA DE INFORMACION BASE */
            $ficha_atencion = FichaAtencion::find($id_ficha);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $tipo = ExamenEspecialidadTipo::find($registro->id_examen_especialidad_tipo);
            $template = ExamenEspecialidadTemplate::find($tipo->id_template);
            $paciente = Paciente::find($ficha_atencion->id_paciente);
            $profesional = Profesional::find($ficha_atencion->id_profesional);

            /** ARMANDO CUERPO */
            $template_pdf = $template->pdf;
            if(isset($registro->solicitado_id_profesional_rfl))
            {
                if(!empty($registro->solicitado_id_profesional_rfl))
                {
                    $profesional_temp = Profesional::find($registro->solicitado_id_profesional_rfl);
                    if($profesional_temp)
                    {
                        $registro->solicitado_nombre = $profesional_temp->nombre;
                        $registro->solicitado_apellido = $profesional_temp->apellido_uno.' '.$profesional_temp->apellido_dos;
                        $registro->solicitado_rut = $profesional_temp->rut;
                        $registro->solicitado_email = $profesional_temp->email;
                    }
                }
            }
            else if(isset($registro->solicitado_id_profesional))
            {
                if(!empty($registro->solicitado_id_profesional))
                {
                    $profesional_temp = Profesional::find($registro->solicitado_id_profesional);
                    if($profesional_temp)
                    {
                        $registro->solicitado_nombre = $profesional_temp->nombre;
                        $registro->solicitado_por_nombre = $profesional_temp->nombre;
                        $registro->solicitado_apellido = $profesional_temp->apellido_uno.' '.$profesional_temp->apellido_dos;
                        $registro->solicitado_por_apellido = $profesional_temp->apellido_uno.' '.$profesional_temp->apellido_dos;
                        $registro->solicitado_rut = $profesional_temp->rut;
                        $registro->solicitado_por_rut = $profesional_temp->rut;
                        $registro->solicitado_email = $profesional_temp->email;
                        $registro->solicitado_por_email = $profesional_temp->email;
                    }
                }
            }
            else if(isset($registro->id_profesional_solicitado_por))
            {
                if(!empty($registro->id_profesional_solicitado_por))
                {
                    $profesional_temp = Profesional::find($registro->id_profesional_solicitado_por);
                    if($profesional_temp)
                    {
                        $registro->solicitado_nombre = $profesional_temp->nombre;
                        $registro->solicitado_por_nombre = $profesional_temp->nombre;
                        $registro->solicitado_apellido = $profesional_temp->apellido_uno.' '.$profesional_temp->apellido_dos;
                        $registro->solicitado_por_apellido = $profesional_temp->apellido_uno.' '.$profesional_temp->apellido_dos;
                        $registro->solicitado_rut = $profesional_temp->rut;
                        $registro->solicitado_por_rut = $profesional_temp->rut;
                        $registro->solicitado_email = $profesional_temp->email;
                        $registro->solicitado_por_email = $profesional_temp->email;
                    }
                }
            }

            foreach ($registro as $key => $value)
            {
                if($key == 'descripcion_examen_rfl')
                {
                    $key_tmp = 'motivo';
                }
                else if($key == 'antec_especialidad_rfl')
                {
                    $key_tmp = 'antec_especialidad';
                }
                else
                {
                    $key_tmp = $key;
                }
                $template_pdf = str_replace( strtoupper('{{'.$key_tmp.'}}'), $value, $template_pdf);
            }

            $lista_imagnes = json_decode(json_decode($imagenes));

            $cuerpo_img = '<table>';

            if(!empty($lista_imagnes))
            {

                $cant_img_total = count($lista_imagnes);
                $cant_img_row = 0;
                foreach($lista_imagnes as $key => $img)
                {
                    if($cant_img_row == 0)
                    {
                        $cuerpo_img .= '<tr>';
                    }
                    $cant_img_row++;

                    $cuerpo_img .= '<td style="padding:5px;width:33.33%">';
                    $img_temp = base64_encode(file_get_contents(asset('storage/imagenes/temp/'.$img[2])));
                    if(isset($img[4]))
                         $cuerpo_img .= '<img style="width:80%; height: 180px;" src="data:image/png;base64,'.$img_temp.'" alt="'.$img[2].'"><br/><span style="text-transform: uppercase; font-weight: bold; margin-top: 5px; text-align: center;">'.$img[4].'</span>';
                    else
                        $cuerpo_img .= '<img style="width:80%; height: 180px;" src="data:image/png;base64,'.$img_temp.'" alt="'.$img[2].'">';

                    $cuerpo_img .= '</td>';

                    if($cant_img_total<3 && $cant_img_total == $cant_img_row)
                    {
                        for ($i=$cant_img_row; $i < 3; $i++) {
                            $cuerpo_img .= '<td style="padding:5px;width:33.33%"></td>';
                            $cant_img_row++;
                        }
                    }

                    if($cant_img_row == 3)
                    {
                        $cuerpo_img .= '</tr>';
                        $cant_img_row = 0;
                    }
                }
            }
            else
            {
                // $template_pdf = str_replace( strtoupper('{{IMAGENES}}'), $cuerpo_img, $template_pdf);
            }
            $cuerpo_img .= '</table>';

            $template_pdf = str_replace( strtoupper('{{IMAGENES}}'), $cuerpo_img, $template_pdf);
            /** CIERRE ARMANDO CUERPO */

            /** TOKEN DE RECETA */
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 4);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 4);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** TOKEN DE PROFESIONAL */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $id_ficha, 1, 1);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $id_ficha, 1, 1);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

            $nombre_archivo = str_replace(' ','_',mb_strtolower('examen_'.$tipo->nombre)).'_'.$paciente->rut.'_'.rand(1111,999);
            $nombre_archivo = str_replace('á','a',str_replace('é','e',str_replace('í','i',str_replace('ó','o',str_replace('ú','u',$nombre_archivo)))));

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
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            // echo json_encode($imagenes);
            // die();

            $biopsias = ExamenBiopsia::where('id_ficha_atencion', $ficha_atencion->id)->get()->toArray();

            // return  PdfController::generarPDF($tipo->nombre, compact('imagenes', 'registro', 'array_lugar_atencion', 'array_profesional', 'array_paciente','array_ficha_atencion'), $nombre_archivo, 'pdf_orl_rino',$pdf_tipo);
            return  PdfController::generarPDF($tipo->nombre, compact('template_pdf', 'array_lugar_atencion', 'array_profesional', 'array_paciente','array_ficha_atencion','biopsias'), $nombre_archivo, 'pdf_orl_rino',$pdf_tipo);
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function ExamenRevisado(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_examen))
        {
            $error['id_examen'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ExamenEspecialidad::find($request->id_examen);

            if($registro)
            {
                $registro->revisado = 1;
                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Revisado';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema al actualizar';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj']  = 'Registro no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj']  = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function VerRegistros(Request $request)
    {
        $datos = array();
        $filtros = array();


        if(!empty($request->id_template))
            $filtros[] = array('id_template', $request->id_template);
        if(!empty($request->id_examen_tipo))
            $filtros[] = array('id_examen_tipo', $request->id_examen_tipo);
        if(!empty($request->id_sub_tipo_especialidad))
            $filtros[] = array('id_sub_tipo_especialidad', $request->id_sub_tipo_especialidad);
        if(!empty($request->id_ficha_atencion))
            $filtros[] = array('id_ficha_atencion', $request->id_ficha_atencion);
        if(!empty($request->id_ficha_especialidad))
            $filtros[] = array('id_ficha_especialidad', $request->id_ficha_especialidad);
        if(!empty($request->id_paciente))
            $filtros[] = array('id_paciente', $request->id_paciente);
        if(!empty($request->id_profesional))
            $filtros[] = array('id_profesional', $request->id_profesional);
        if(!empty($request->id_asistente))
            $filtros[] = array('id_asistente', $request->id_asistente);
        if($request->revisado != '')
            $filtros[] = array('revisado', $request->revisado);
        if(!empty($request->estado))
            $filtros[] = array('estado', $request->estado);

        $registros = ExamenEspecialidad::where($filtros)
                                        ->with(['HoraMedica' => function($query){
                                            $query->select('id', 'id_ficha_atencion', 'fecha_realizacion_consulta', 'id_estado');
                                        }])
                                        ->with(['ExamenEspecialidadTemplate' => function($query){
                                            $query->select('id', 'nombre', 'alias');
                                        }])
                                        ->with(['ExamenEspecialidadTipo' => function($query){
                                            $query->select('id', 'nombre', 'descripcion');
                                        }])
                                        ->with(['SubTipoEspecialidad' => function($query){
                                            $query->select('id', 'nombre');
                                        }])
                                        ->filtroEstadoHora($request->id_estado)
                                        ->get();

        if($registros)
        {
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
}
