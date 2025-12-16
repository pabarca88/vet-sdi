<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use App\Models\DetalleReceta;
use App\Models\DetalleRecetaInterna;
use App\Models\FichaAtencion;
use App\Models\LugarAtencion;
use App\Models\MedicamentoUsoCronicoGeneral;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DetalleRecetaController extends Controller
{

    public function registroMedicamento_r(Request $request)
    {
        return $this->registroMedicamento($request->id_ficha,
                                $request->id_ingreso_paciente,
                                $request->id_recuperacion,
                                $request->id_sala,
                                $request->id_producto,
                                $request->medicamento,
                                $request->presentacion,
                                $request->posologia,
                                $request->via_administracion,
                                $request->periodo,
                                $request->uso_cronico,
                                $request->compra,
                                $request->comentario,
                                $request->id_profesional,
                                $request->id_paciente,
                                $request->id_lugar_atencion,
                                $request->dia
                        );

    }


    public function registroMedicamentos_r(Request $request)
    {
        $datos = array();
        if ($request->medicamentos == '[]' ) {
            $datos['estado'] = 0;
            $datos['msj'] =  'No se han agregado Medicamentos a Ficha Clínica.';

            $request_eliminar = new  Request(array(
                'id_ficha' => $request->id_ficha
            ));
            $result_eliminar = $this->eliminarMedicamentosFicha($request_eliminar);

            $datos['result_eliminar'] = $result_eliminar;
        }
        else
        {

            $request_eliminar = new  Request(array(
                'id_ficha' => $request->id_ficha
            ));
            $result_eliminar = $this->eliminarMedicamentosFicha($request_eliminar);

            $datos['result_eliminar'] = $result_eliminar;

            $medicamentos = json_decode($request->medicamentos);
            $dia = date('Y-m-d');
            $exito = 0;
            $falla = 0;
            for ($i = 0; $i < count($medicamentos); ++$i) {

                $retorno =  $this->registroMedicamento(
                                (!empty($request->id_ficha)?$request->id_ficha:''),
                                (!empty($request->id_ingreso_paciente)?$request->id_ingreso_paciente:''),
                                (!empty($request->id_recuperacion)?$request->id_recuperacion:''),
                                (!empty($request->id_sala)?$request->id_sala:''),
                                $medicamentos[$i]->id_producto,
                                $medicamentos[$i]->medicamento,
                                $medicamentos[$i]->presentacion,
                                $medicamentos[$i]->posologia,
                                $medicamentos[$i]->via_administracion,
                                $medicamentos[$i]->periodo,
                                ($medicamentos[$i]->uso_cronico == ''?(int)'0':$medicamentos[$i]->uso_cronico),
                                $medicamentos[$i]->compra,
                                (!empty($medicamentos[$i]->comentario)?$medicamentos[$i]->comentario:''),
                                $request->id_profesional,
                                $request->id_paciente,
                                $request->id_lugar_atencion,
                                $dia
                        );

                if($medicamentos[$i]->uso_cronico == 1)
                {
                    $articulo_med = Articulo::find($medicamentos[$i]->id_producto);
                    if($articulo_med)
                    {

                        //REGISTRO DE MEDICAMENTO CRONICO EN TABLA DE medicamentousocronicogeneral
                        $medicamento = new MedicamentoUsoCronicoGeneral();
                        $medicamento->id_ficha_atencion = $request->id_ficha;
                        $medicamento->id_paciente = $request->id_paciente;
                        $medicamento->id_profesional = $request->id_profesional;
                        $medicamento->id_articulo = $medicamentos[$i]->id_producto;
                        $medicamento->nombre_medicamento = $medicamentos[$i]->medicamento;
                        $medicamento->id_tipo_control = $articulo_med->tipo_cont;
                        $medicamento->cantidad = $medicamentos[$i]->compra;
                        $medicamento->presentacion = $medicamentos[$i]->presentacion;
                        $medicamento->posologia = $medicamentos[$i]->posologia;
                        $medicamento->via_administracion = $medicamentos[$i]->via_administracion;
                        $medicamento->periodo = $medicamentos[$i]->periodo;
                        $medicamento->tipo_enfermedad = 'cronico';

                        if($medicamento->save())
                        {
                            $datos['med_cronico'][$i]['estado'] = 1;
                            $datos['med_cronico'][$i]['msj'] = 'Registro Exitoso';
                        }
                        else
                        {
                            $datos['med_cronico'][$i]['estado'] = 0;
                            $datos['med_cronico'][$i]['error'] = $medicamento;
                        }
                    }
                }

                if($retorno['estado'] == 1)
                    $exito++;
                else
                    $falla++; //
                $datos['registros'][] = $retorno;
            }
            $datos['estado'] = 1;
            $datos['exito'] = $exito;
            $datos['falla'] = $falla;
            $datos['msj'] =  ' Medicamentos registrados';
        }

        return $datos;

    }



    /**
     * Registro de detalle receta individual
     *
     * @param Interger $id_ficha
     * @param Interger $id_ingreso_paciente
     * @param Interger $id_recuperacion
     * @param Interger $id_sala
     * @param Interger $id_articulo
     * @param String $producto
     * @param String $presentacion
     * @param String $posologia
     * @param String $via_administracion
     * @param String $periodo
     * @param Interger $cantidad_compra
     * @param String $comentario
     * @return void
     */
    static public function registroMedicamento($id_ficha, $id_ingreso_paciente, $id_recuperacion, $id_sala, $id_articulo, $producto, $presentacion, $posologia, $via_administracion, $periodo, $uso_cronico, $cantidad_compra, $comentario, $id_profesional, $id_paciente, $id_lugar_atencion, $dia)
    {
        $datos = array();
        $error = array();
        $validos = 0;

        if(empty($id_ficha) && empty($id_ingreso_paciente) && empty($id_recuperacion) && empty($id_sala))
        {
            $validos = 1;
            $error['id'] = "Campo (id_ficha o id_ingreso_paciente o id_recuperacion o id_sala) requerido";
        }

        // if(empty($id_articulo))
        // {
        //     $validos = 1;
        //     $error['id_articulo'] = 'Campo requerido id_articulo';
        // }
        if(empty($producto))
        {
            $validos = 1;
            $error['producto'] = 'Campo requerido producto';
        }
        if(empty($presentacion))
        {
            $validos = 1;
            $error['presentacion'] = 'Campo requerido presentacion';
        }
        if(empty($posologia))
        {
            $validos = 1;
            $error['posologia'] = 'Campo requerido posologia';
        }
        if(empty($via_administracion))
        {
            $validos = 1;
            $error['via_administracion'] = 'Campo requerido via_administracion';
        }
        if(empty($periodo))
        {
            $validos = 1;
            $error['periodo'] = 'Campo requerido ))';
        }
        // if((int)$uso_cronico == '')
        // {
        //     $validos = 1;
        //     $error['uso_cronico'] = 'Campo requerido uso_cronico';
        // }
        if(empty($cantidad_compra))
        {
            $validos = 1;
            $error['cantidad_compra'] = 'Campo requerido cantidad_compra';
        }
        // if(empty($comentario))
        // {
        //     $validos = 1;
        //     $error['comentario'] = 'Campo requerido comentario';
        // }
        if(empty($id_profesional))
        {
            $validos = 1;
            $error['id_profesional'] = 'Campo requerido id_profesional';
        }
        if(empty($id_paciente))
        {
            $validos = 1;
            $error['id_paciente'] = 'Campo requerido id_paciente';
        }
        if(empty($id_lugar_atencion))
        {
            $validos = 1;
            $error['id_lugar_atencion'] = 'Campo requerido id_lugar_atencion';
        }

        if($validos == 0)
        {
            $detalle_receta = new DetalleReceta();
            $detalle_receta->id_ficha =  (int)$id_ficha;
            $detalle_receta->id_ingreso_paciente = (int)$id_ingreso_paciente;
            $detalle_receta->id_recuperacion = (int)$id_recuperacion;
            $detalle_receta->id_sala = (int)$id_sala;
            $detalle_receta->id_articulo = $id_articulo;
            $detalle_receta->producto = $producto;
            $detalle_receta->presentacion = $presentacion;
            $detalle_receta->posologia = $posologia;
            $detalle_receta->via_administracion = $via_administracion;
            $detalle_receta->periodo = $periodo;
            $detalle_receta->uso_cronico = $uso_cronico;
            $detalle_receta->cantidad_compra = $cantidad_compra;
			$detalle_receta->cantidad = static::obtenerCantidad($cantidad_compra);
            $detalle_receta->cantidad_vendida = 0;
            $detalle_receta->comentario = $comentario;

            $profesional = Profesional::find($id_profesional);
            $paciente = Paciente::find($id_paciente);
            $lugar_atencion = LugarAtencion::find($id_lugar_atencion);

            // $detalle_receta->receta_token = encrypt( $dia.'_'.$profesional->nombre.'_'.$paciente->apellido_uno.'_'.$lugar_atencion->id );

            $certificado_documento = CertificadoController::certificadoDocumento((int)$id_ficha, (int)$id_profesional, (int)$id_paciente, 1);

            if($certificado_documento['estado'] == 1)
                $detalle_receta->receta_token = $certificado_documento['certificado'];
            else
                $detalle_receta->receta_token = encrypt( $dia.'_'.$profesional->nombre.'_'.$paciente->apellido_uno.'_'.$lugar_atencion->id );


            $detalle_receta->estado = 1;
            if($detalle_receta->save()){
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro Creado';
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

        if(!empty($request->id_ficha))
            $filtros[] = array('id_ficha', $request->id_ficha);
        if(!empty($request->id_ingreso_paciente))
            $filtros[] = array('id_ingreso_paciente', $request->id_ingreso_paciente);
        if(!empty($request->id_recuperacion))
            $filtros[] = array('id_recuperacion', $request->id_recuperacion);
        if(!empty($request->id_sala))
            $filtros[] = array('id_sala', $request->id_sala);
        if(!empty($request->id_articulo))
            $filtros[] = array('id_articulo', $request->id_articulo);
        if(!empty($request->producto))
            $filtros[] = array('producto', 'like', $request->producto.'%');
        if(!empty($request->presentacion))
            $filtros[] = array('presentacion','like', $request->presentacion.'%');
        if(!empty($request->posologia))
            $filtros[] = array('posologia','like', $request->posologia.'%');
        if(!empty($request->via_administracion))
            $filtros[] = array('via_administracion','like', $request->via_administracion.'%');
        if(!empty($request->periodo))
            $filtros[] = array('periodo','like', $request->periodo);
        if(!empty($request->cantidad_compra))
            $filtros[] = array('cantidad_compra','like', $request->cantidad_compra.'%');
        if(!empty($request->comentario))
            $filtros[] = array('comentario','like', $request->comentario.'%');

        // $registros = DetalleReceta::with(['RecetasPaciente' => function($query){
        //                                     $query->select('id', 'id_paciente')
        //                                             ->with(['Paciente' => function($query){
        //                                                 $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos')->get();
        //                                             }]);
        //                                 }])
        //                             ->where($filtros)
        //                             ->get();
        $registros = DetalleReceta::where($filtros)->get();

        $nombre_paciente = '';
        $id_paciente = '';

        if(isset($request->id_ficha))
        {
            $registro_ficha = FichaAtencion::with(['Paciente' => function($query){
                                                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos')->get();
                                                }])
                                                ->where('id',$request->id_ficha)->first();

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
            $datos['msj'] = 'No se han agregado Medicamentos a esta Ficha.';
            $datos['paciente'] = array(
                'nombre_paciente' => $nombre_paciente,
                'id_paciente' => $id_paciente,
            );
        }


        return $datos;
    }

    static public function eliminarMedicamentosFicha(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 0;

        if(empty($request->id_ficha))
        {
            $error['id_ficha'] = 'campo requerido';
            $valido = 1;
        }
        if($valido == 0)
        {
            $result = DetalleReceta::where('id_ficha',$request->id_ficha)->delete();

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

	static public function obtenerCantidad($texto)
    {
        $cantidad_text = $texto;

        $n1 = strpos($cantidad_text, '(');
        $n2 = strpos($cantidad_text, ')');

        //echo $n1; //2
        //echo $n2; //4

        $largo = ($n2-($n1+1));
        //echo $largo;

        return (int)substr($cantidad_text, $n1+1,$largo);

    }

    public function dameTodoDetalleRecetaPaciente($id_paciente){
        try{
            $detalle_receta = DetalleRecetaInterna::select('detalle_receta_interna.*','articulos.present as dosis','receta_dosis.indic as indicaciones','users.name as responsable')
            ->leftjoin('articulos', 'detalle_receta_interna.id_dosis', '=', 'articulos.id')
            ->leftjoin('receta_dosis', 'detalle_receta_interna.id_frecuencia', '=', 'receta_dosis.id')
            ->join('users', 'detalle_receta_interna.id_responsable', '=', 'users.id')
            ->where('detalle_receta_interna.id_paciente', $id_paciente)
            ->get();
            foreach($detalle_receta as $receta){
                $fechaHora = explode(' ', $receta->created_at);
                $receta->fecha = $fechaHora[0];
                $receta->hora = $fechaHora[1];
            }
            return $detalle_receta;
        }catch(Exception $e){
            return $e->getMessage();
        }

    }

    public function registroRecetaInterna(Request $req){

        $detalle_receta = new DetalleRecetaInterna();
        $detalle_receta->id_institucion = 19; // Cambiar por el id institucion del usuario
        $detalle_receta->id_servicio = 1; // Cambiar por el id servicio del usuario
        $detalle_receta->id_medicamento = $req->id_medicamento;
        $detalle_receta->receta_am = $req->receta_am;
        $detalle_receta->nombre_medicamento = $req->nombre_medicamento_ficha_dental;
        $detalle_receta->id_dosis = $req->id_dosis_medicamento_ficha_dental;
        $detalle_receta->nombre_dosis = $req->nombre_dosis_ficha_dental;
        $detalle_receta->id_paciente = $req->id_paciente;
        $detalle_receta->id_frecuencia = $req->id_frecuencia_medicamento_ficha_dental;
        if($req->id_frecuencia_medicamento_ficha_dental == 1000){
            $detalle_receta->nombre_frecuencia = $req->nombre_frecuencia_ficha_dental;
        }
        $detalle_receta->nombre_frecuencia = $req->nombre_frecuencia_ficha_dental;
        $detalle_receta->id_administra = Auth::user()->id;
        $detalle_receta->via_administracion = $req->via_administracion;
        $detalle_receta->id_tipo_control = $req->id_tipo_control;
        $detalle_receta->composicion = $req->farmaco;

        $detalle_receta->observaciones = 'SIN OBSERVACIONES';
        $detalle_receta->otros = 'SIN OTROS';
        $detalle_receta->otros_2 = 'SIN OTROS';

        $detalle_receta->estado_tratamiento = 1;
        $detalle_receta->estado_finalizado = 1;
        $detalle_receta->id_responsable = Auth::user()->id;

        // estados del medicamento 1: Pendiente, 2: Administrado



        if($detalle_receta->save()){
            $dame_todo_detalle_receta_paciente = $this->dameTodoDetalleRecetaPaciente($req->id_paciente);

            return response()->json(['status' => 'success', 'message' => 'Receta registrada correctamente', 'data' => $dame_todo_detalle_receta_paciente]);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Error al registrar la receta']);
        }
    }

    public function eliminarMedicamento(Request $req){
        $id = $req->id;
        $detalle_receta = DetalleRecetaInterna::find($id);
        if($detalle_receta->delete()){
            $dame_todo_detalle_receta_paciente = $this->dameTodoDetalleRecetaPaciente($detalle_receta->id_paciente);
            return response()->json(['status' => 'success', 'message' => 'Medicamento eliminado correctamente', 'data' => $dame_todo_detalle_receta_paciente]);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Error al eliminar el medicamento']);
        }
    }
}
