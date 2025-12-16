<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ExamenMedico;
use App\Models\ExamenPPF;
use App\Models\FichaAtencion;
use App\Models\FichaGinecoObstetrica;
use App\Models\HoraMedica;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use FichaGinObstetrica;
use Illuminate\Http\Request;

class ExamenesPPFController extends Controller
{

    public function registroExamen_r(Request $request)
    {
        return $this->registroMedicamento( $request->id_prioridad,
                                            $request->id_paciente,
                                            $request->id_profesional,
                                            $request->id_ficha_atencion,
                                            $request->id_examen,
                                            $request->examen,
                                            $request->examen_especialidad,
                                            $request->tipo_examen,
                                            $request->tipo_ficha,
                                            $request->con_contraste,
                                            $request->archivos,
                                            $request->otro,

                                        );

    }


    /**
     * Undocumented function
     *
     * @param Request $request
     * id_paciente
     * id_profesional
     * id_ficha_atencion
     * tipo_ficha
     * examenes
     *     [
     *         prioridad
     *         nombre_examen
     *         tipo
     *         con_contraste
     *         archivo
     *     ]
     * @return void
     */
    public function registroExamenes_r(Request $request)
    {
        $datos = array();
        if ($request->examenes == '[]' ) {
            $datos['estado'] = 1;
            $datos['msj'] =  'No se han agregado Examenes a Ficha Clínica.';

            $request_eliminar = new  Request(array(
                'id_ficha_atencion' => $request->id_ficha_atencion,
                'id_ficha_otros_prof' => $request->id_ficha_otros_prof,
                'id_ficha_gineco_obstetrica' => $request->id_ficha_gineco_obstetrica
            ));
            $result_eliminar = $this->eliminarExamenesFicha($request_eliminar);

            $datos['result_eliminar'] = $result_eliminar;
        }
        else
        {

            $request_eliminar = new  Request(array(
                'id_ficha_atencion' => $request->id_ficha_atencion,
                'id_ficha_otros_prof' => $request->id_ficha_otros_prof,
                'id_ficha_gineco_obstetrica' => $request->id_ficha_gineco_obstetrica
            ));
            $result_eliminar = $this->eliminarExamenesFicha($request_eliminar);

            $datos['result_eliminar'] = $result_eliminar;

            $examenes = json_decode($request->examenes);
            $dia = date('Y-m-d');
            $exito = 0;
            $falla = 0;
            for ($i = 0; $i < count($examenes); ++$i)
            {
                $prioridad = 0;
                if(trim($examenes[$i]->prioridad) == 'Baja')
                    $prioridad = 1;
                else if(trim($examenes[$i]->prioridad) == 'Media')
                    $prioridad = 2;
                else if(trim($examenes[$i]->prioridad) == 'Alta')
                    $prioridad = 3;
                else if(trim($examenes[$i]->prioridad) == 'Urgente')
                    $prioridad = 4;
                else
                    $prioridad = 2;

                $con_contraste = 0;
                if(empty($examenes[$i]->con_contraste) || trim($examenes[$i]->con_contraste) == 'N/C')
                    $con_contraste = 0;
                else
                    $con_contraste = 1;

                $retorno =  $this->registroExamen(
                    $prioridad,
                    $request->id_paciente,
                    $request->id_profesional,
                    $request->id_ficha_atencion,
                    $request->id_ficha_otros_prof,
                    $request->id_ficha_gineco_obstetrica,
                    $examenes[$i]->id_examen,
                    $examenes[$i]->nombre_examen,
                    $examenes[$i]->nombre_examen_especialidad,
                    $examenes[$i]->tipo,
                    $request->tipo_ficha,
                    $con_contraste,
                    isset($examenes[$i]->archivo)?$examenes[$i]->archivo:'',
                    isset($examenes[$i]->sospecha)?$examenes[$i]->sospecha:'',
                    isset($examenes[$i]->observacion)?$examenes[$i]->observacion:'',
                    isset($examenes[$i]->enfasis)?$examenes[$i]->enfasis:'',
                    isset($examenes[$i]->lado)?$examenes[$i]->lado:''
                );

                if($retorno['estado'] == 1)
                    $exito++;
                else
                    $falla++; //
                $datos['registros'][] = $retorno;
            }
            $datos['estado'] = 1;
            $datos['exito'] = $exito;
            $datos['falla'] = $falla;
            $datos['msj'] =  ' Examenes registrados';
        }

        return $datos;

    }



    /**
     * REGISTRO DE EXAMEN
     *
     * @param [type] $id_prioridad
     * @param [type] $id_paciente
     * @param [type] $id_profesional
     * @param [type] $id_ficha_atencion
     * @param [type] $id_ficha_otros_prof
     * @param [type] $id_ficha_gineco_obstetrica
     * @param [type] $id_examen
     * @param [type] $examen
     * @param [type] $examen_especialidad
     * @param [type] $tipo_examen
     * @param [type] $tipo_ficha
     * @param [type] $con_contraste
     * @param [type] $archivo
     * @param [type] $sospecha
     * @param [type] $observacion
     * @param [type] $otro
     * @return array()
     */
    public function registroExamen($id_prioridad, $id_paciente, $id_profesional, $id_ficha_atencion, $id_ficha_otros_prof, $id_ficha_gineco_obstetrica, $id_examen, $examen, $examen_especialidad, $tipo_examen, $tipo_ficha, $con_contraste, $archivo, $sospecha, $observacion, $prioridad, $otro)
    {
        // var_dump($id_prioridad); //int(2)
        // var_dump($id_paciente); //string(1) "7"
        // var_dump($id_profesional); //string(4) "2743"
        // var_dump($id_ficha_atencion); //NULL
        // var_dump($id_ficha_otros_prof); //NULL
        // var_dump($id_ficha_gineco_obstetrica); //string(1) "2"
        // var_dump($id_examen); //string(3) "486"
        // var_dump($examen); //string(72) "ECOGRAFIA GINECOLOGICA, PELVIANA FEMENINA U OBSTETRICA CON ESTUDIO FETAL"
        // var_dump($examen_especialidad); //string(24) "Ecografía ginecológica"
        // var_dump($tipo_examen); //string(13) "Ginecobstetra"
        // var_dump($tipo_ficha); //string(1) "1"
        // var_dump($con_contraste); //int(1)
        // var_dump($archivo); //string(0) ""
        // var_dump($sospecha); //string(10) "dsf asdfas"
        // var_dump($observacion); //string(0) ""
        // var_dump($prioridad); //string(0) ""
        // var_dump($otro); //string(19) "7567 56456 456 4567"
        // die();

        $datos = array();
        $error = array();
        $validos = 0;

        if(empty($id_prioridad))
        {
            $validos = 1;
            $error['id_prioridad'] = "Campo requerido";
        }
        if(empty($id_paciente))
        {
            $validos = 1;
            $error['id_paciente'] = 'Campo requerido id_paciente';
        }
        if(empty($id_profesional))
        {
            $validos = 1;
            $error['id_profesional'] = 'Campo requerido id_profesional';
        }

        /** validacion de id de ficha */
        if( empty($id_ficha_atencion) && empty($id_ficha_otros_prof) && empty($id_ficha_gineco_obstetrica) )
        {
            $validos = 1;
            $error['id_ficha'] = 'Campo requerido id_ficha';
        }
        else
        {
            $variablesConValor = count(array_filter([$id_ficha_atencion, $id_ficha_otros_prof, $id_ficha_gineco_obstetrica]));
            if ($variablesConValor !== 1)
            {
                $validos = 1;
                $error['id_ficha'] = 'Esta enviando mas de una id_ficha';
                $error['id_ficha_2'] = $variablesConValor;
            }
        }


        if(empty($id_examen))
        {
            $validos = 1;
            $error['id_examen'] = 'Campo requerido id_examen';
        }
        if(empty($examen))
        {
            $validos = 1;
            $error['examen'] = 'Campo requerido examen';
        }
        if(empty($examen_especialidad))
        {
            $validos = 1;
            $error['examen_especialidad'] = 'Campo requerido examen_especialidad';
        }
        if(empty($tipo_examen))
        {
            $validos = 1;
            $error['tipo_examen'] = 'Campo requerido tipo_examen';
        }
        if(empty($tipo_ficha))
        {
            $validos = 1;
            $error['tipo_ficha'] = 'Campo requerido tipo_ficha';
        }
        // if(empty($con_contraste))
        // {
        //     $validos = 1;
        //     $error['con_contraste'] = 'Campo requerido con_contraste';
        // }
        // if(empty($archivo))
        // {
        //     $validos = 1;
        //     $error['archivo'] = 'Campo requerido archivo';
        // }


        if($validos == 0)
        {

            /** BUSCAR CODIGO FONASA */
            $examen_medico = ExamenMedico::select('codigo')->where('nombre_examen','like',''.$examen.'%' )->first();

            $codigo = 0;
            if($examen_medico)
                $codigo = $examen_medico->codigo;
            else
                $codigo = 0;

            $examen_ppf = new ExamenPPF();
            $examen_ppf->id_prioridad = $id_prioridad;
            $examen_ppf->id_paciente = $id_paciente;
            $examen_ppf->id_profesional = $id_profesional;
            $examen_ppf->id_ficha_atencion = $id_ficha_atencion;
            $examen_ppf->id_ficha_otros_prof = $id_ficha_otros_prof;
            $examen_ppf->id_ficha_gineco_obstetrica = $id_ficha_gineco_obstetrica;
            $examen_ppf->id_examen = $id_examen;
            $examen_ppf->examen = $examen;
            $examen_ppf->examen_especialidad = $examen_especialidad;
            $examen_ppf->tipo_examen = $tipo_examen;
            $examen_ppf->tipo_ficha = $tipo_ficha;
            $examen_ppf->con_contraste = $con_contraste;
            $examen_ppf->codigo_fonasa = $codigo;
            $examen_ppf->archivo = $archivo;
            $examen_ppf->sospecha = $sospecha;
            $examen_ppf->observacion = $observacion;
            $examen_ppf->prioridad = $prioridad;
            $examen_ppf->otro = $otro;
            //$examen_ppf->estado = 1;

            if($examen_ppf->save()){
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro Creado';
                $datos['registro'] = $examen_ppf;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en el registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Falta informacion';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function verRegistros(Request $request)
    {
        $datos = array();
        $filtros = array();

        if(!empty($request->id_prioridad))
            $filtros[] = array('id_prioridad', $request->id_prioridad);
        if(!empty($request->id_paciente))
            $filtros[] = array('id_paciente', $request->id_paciente);
        if(!empty($request->id_profesional))
            $filtros[] = array('id_profesional', $request->id_profesional);
        if(!empty($request->id_ficha_atencion))
            $filtros[] = array('id_ficha_atencion', $request->id_ficha_atencion);
        if(!empty($request->id_ficha_otros_prof))
            $filtros[] = array('id_ficha_otros_prof', $request->id_ficha_otros_prof);
        if(!empty($request->id_ficha_gineco_obstetrica))
            $filtros[] = array('id_ficha_gineco_obstetrica', $request->id_ficha_gineco_obstetrica);
        if(!empty($request->id_examen))
            $filtros[] = array('id_examen', 'like', $request->id_examen.'%');
        if(!empty($request->examen))
            $filtros[] = array('examen', 'like', $request->examen.'%');
        if(!empty($request->examen_especialidad))
            $filtros[] = array('examen_especialidad', 'like', $request->examen_especialidad.'%');
        if(!empty($request->tipo_examen))
            $filtros[] = array('tipo_examen', 'like', $request->tipo_examen.'%');
        if(!empty($request->tipo_ficha))
            $filtros[] = array('tipo_ficha', $request->tipo_ficha);
        if(!empty($request->con_contraste))
            $filtros[] = array('con_contraste', $request->con_contraste);

        $registros = ExamenPPF::where($filtros)->get();

        $nombre_paciente = '';
        $id_paciente = '';

        if(isset($request->id_hora_medica))
        {
            $registro_ficha = HoraMedica::with(['Paciente' => function($query){
                            $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos')->get();
                        }])
                        ->where('id',$request->id_hora_medica)->first();

            $nombre_paciente = $registro_ficha->Paciente->nombres.' '.$registro_ficha->Paciente->apellido_uno . ' '. $registro_ficha->Paciente->apellido_dos;
            $id_paciente = $registro_ficha->Paciente->id;

            // if( !empty($registro_ficha->id_ficha_atencion) )
            // {

            // }
            // if( !empty($registro_ficha->id_ficha_otros_prof) )
            // {

            // }
        }

        else if(isset($request->id_ficha_atencion))
        {
            $registro_ficha = FichaAtencion::with(['Paciente' => function($query){
                                                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos')->get();
                                                }])
                                                ->where('id',$request->id_ficha_atencion)->first();

            $nombre_paciente = $registro_ficha->Paciente->nombres.' '.$registro_ficha->Paciente->apellido_uno . ' '. $registro_ficha->Paciente->apellido_dos;
            $id_paciente = $registro_ficha->Paciente->id;
        }
        else if(isset($request->id_ficha_otros_prof))
        {
            // $registro_ficha = FichaOtrosProfesionales::with(['Paciente' => function($query){
            //                                         $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos')->get();
            //                                     }])
            //                                     ->where('id',$request->id_ficha_atencion)->first();

            // $nombre_paciente = $registro_ficha->Paciente->nombres.' '.$registro_ficha->Paciente->apellido_uno . ' '. $registro_ficha->Paciente->apellido_dos;
            // $id_paciente = $registro_ficha->Paciente->id;
        }
        else if(isset($request->id_ficha_gineco_obstetrica))
        {
            $registro_ficha = FichaGinecoObstetrica::with(['Paciente' => function($query){
                                                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos')->get();
                                                }])
                                                ->where('id',$request->id_ficha_gineco_obstetrica)->first();

            $nombre_paciente = $registro_ficha->Paciente->nombres.' '.$registro_ficha->Paciente->apellido_uno . ' '. $registro_ficha->Paciente->apellido_dos;
            $id_paciente = $registro_ficha->Paciente->id;
        }


        if(count($registros) > 0)
        {
            $datos['estado'] = 1;
            $datos['registros'] = $registros;
            $datos['paciente'] = array(
                'nombre_paciente' => $nombre_paciente,
                'id_paciente' => $id_paciente,
            );
            $datos['msj'] = 'Registros encontrados';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['registros'] = array();
            $datos['msj'] = 'No se han agregado Examenes a esta Ficha.';
            $datos['paciente'] = array(
                'nombre_paciente' => $nombre_paciente,
                'id_paciente' => $id_paciente,
            );
        }


        return $datos;
    }

    static public function eliminarExamenesFicha(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 0;

        /** validacion de id de ficha */
        if( empty($request->id_ficha_atencion) && empty($request->id_ficha_otros_prof) && empty($request->id_ficha_gineco_obstetrica) )
        {
            $error['id_ficha'] = 'Campo requerido id_ficha';
            $valido = 1;
        }
        else
        {
            $variablesConValor = count(array_filter([$request->id_ficha_atencion, $request->id_ficha_otros_prof, $request->id_ficha_gineco_obstetrica]));
            if ($variablesConValor !== 1)
            {
                $error['id_ficha'] = 'Esta enviando mas de una id_ficha';
                $error['id_ficha'] = $variablesConValor;
                $valido = 1;
            }
        }

        // if(empty($request->id_ficha_atencion))
        // {
        //     $error['id_ficha_atencion'] = 'campo requerido';
        //     $valido = 1;
        // }

        if($valido == 0)
        {
            if(!empty($request->id_ficha_atencion))
                $result = ExamenPPF::where('id_ficha_atencion',$request->id_ficha_atencion)->delete();
            if(!empty($request->id_ficha_otros_prof))
                $result = ExamenPPF::where('id_ficha_otros_prof',$request->id_ficha_otros_prof)->delete();
            if(!empty($request->id_ficha_gineco_obstetrica))
                $result = ExamenPPF::where('id_ficha_gineco_obstetrica',$request->id_ficha_gineco_obstetrica)->delete();

            $datos['estado'] = 1;
            $datos['msj'] = 'eliminacion de medicamentos de ficha exitosa';
            $datos['result'] = $result;
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
