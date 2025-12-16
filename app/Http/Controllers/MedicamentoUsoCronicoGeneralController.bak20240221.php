<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetalleReceta;
use App\Models\LugarAtencion;
use App\Models\MedicamentoUsoCronicoGeneral;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;

class MedicamentoUsoCronicoGeneralController extends Controller
{
    public function registrar(Request $request){
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($request->id_ficha_atencion))
        {
            $error['ID FICHA ATENCION'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['ID PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['ID PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_medicamento))
        {
            $error['IS MEDICAMENTO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->nombre_medicamento))
        {
            $error['NOMBRE MEDICAMENTO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_medicamento_tipo_control))
        {
            $error['TIPO CONTROL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->cantidad_comprar))
        {
            $error['CANTIDAD'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->dosis_medicamento))
        {
            $error['DOSIS'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->frecuencia_medicamento))
        {
            $error['FRECUENCIA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->via_administracion))
        {
            $error['VIA ADMINISTRACION'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->periodo))
        {
            $error['PERIODO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_enfermedad))
        {
            $error['ENFERMEDAD'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->cliente)){
        //     $valido = 0;
        //     $error['cliente'] = 'Campo requerido cliente';
        // }
        // if(empty($request->estado)){
        //     $valido = 0;
        //     $error['estado'] = 'Campo requerido estado';
        // }

        if($valido )
        {
            $medicamento = new MedicamentoUsoCronicoGeneral();

            $medicamento->id_ficha_atencion = $request->id_ficha_atencion;
            $medicamento->id_paciente = $request->id_paciente;
            $medicamento->id_profesional = $request->id_profesional;
            $medicamento->id_articulo = $request->id_medicamento;
            $medicamento->nombre_medicamento = $request->nombre_medicamento;
            $medicamento->id_tipo_control = $request->id_medicamento_tipo_control;
            $medicamento->cantidad = $request->cantidad_comprar;
            $medicamento->presentacion = $request->dosis_medicamento;
            $medicamento->posologia = $request->frecuencia_medicamento;
            $medicamento->via_administracion = $request->via_administracion;
            $medicamento->periodo = $request->periodo;
            $medicamento->tipo_enfermedad = $request->tipo_enfermedad;
            // $medicamento->cliente = $request->cliente;
            // $medicamento->estado = $request->estado;

            if($medicamento->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro Exitoso';
                $datos['request'] = $request->all();

                /** REGISTRO DE MEDICAMENTO EN RECETA */
                $datos['registro_receta'] = static::ingresarMdicamentoNuevoAReceta($request);

            }
            else
            {
                $datos['estado'] = 0;
                $datos['error'] = $medicamento;
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;

    }

    static public function ingresarMdicamentoNuevoAReceta(Request $request)
    {

        $filtrotemp = array();
        $filtrotemp[] = array('id_ficha',$request->id_ficha_atencion);
        $filtrotemp[] = array('id_articulo',$request->id_medicament);
        $result_busqueda = DetalleReceta::where($filtrotemp)->count();
        if($result_busqueda == 0)
        {
            $detalle_receta = new DetalleReceta();
            $detalle_receta->id_ficha =  (int)$request->id_ficha_atencion;
            $detalle_receta->id_ingreso_paciente = (int)0;
            $detalle_receta->id_recuperacion = (int)0;
            $detalle_receta->id_sala = (int)0;
            $detalle_receta->id_articulo = $request->id_medicamento;
            $detalle_receta->id_tipo_control = $request->id_medicamento_tipo_control;
            $detalle_receta->producto = $request->nombre_medicamento;
            $detalle_receta->presentacion = $request->dosis_medicamento;
            $detalle_receta->posologia = $request->frecuencia_medicamento;
            $detalle_receta->via_administracion = $request->via_administracion;
            $detalle_receta->periodo = $request->periodo;
            $detalle_receta->uso_cronico = 1;
            $detalle_receta->cantidad_compra = $request->cantidad_comprar;
            $detalle_receta->cantidad_vendida = 0;
            $detalle_receta->comentario = '';

            $profesional = Profesional::find($request->id_profesional);
            $paciente = Paciente::find($request->id_paciente);
            $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

            // $detalle_receta->receta_token = encrypt( $dia.'_'.$profesional->nombre.'_'.$paciente->apellido_uno.'_'.$lugar_atencion->id );

            $certificado_documento = CertificadoController::certificadoDocumento((int)$request->id_ficha_atencion, (int)$request->id_profesional, (int)$request->id_paciente, 1);

            $dia = date('Y-m-d');
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
            $datos['estado'] = 1;
            $datos['msj'] = 'Medicamento ya existente en receta';
        }

        return $datos;

    }

    static public function pasarMedicamentoCronicoAReceta(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_ficha_atencion))
        {
            $error['FICHA ATENCION'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['LUGAR ATENCION'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->lista_medicamento))
        {
            $error['LISTA MEDICAMENTOS'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $lista_medicamento = $request->lista_medicamento;
            $resultMedCron = MedicamentoUsoCronicoGeneral::whereIn('id', $lista_medicamento)->get();

            if($resultMedCron)
            {
                foreach ($resultMedCron as $key => $value)
                {
                    $filtrotemp = array();
                    $filtrotemp[] = array('id_ficha',$request->id_ficha_atencion);
                    $filtrotemp[] = array('id_articulo',$value->id_articulo);
                    $result_busqueda = DetalleReceta::where($filtrotemp)->count();

                    if($result_busqueda == 0)
                    {
                        $detalle_receta = new DetalleReceta();
                        $detalle_receta->id_ficha =  (int)$request->id_ficha_atencion;
                        $detalle_receta->id_ingreso_paciente = (int)0;
                        $detalle_receta->id_recuperacion = (int)0;
                        $detalle_receta->id_sala = (int)0;
                        $detalle_receta->id_articulo = $value->id_articulo;
                        $detalle_receta->id_tipo_control = $value->id_tipo_control;
                        $detalle_receta->producto = $value->nombre_medicamento;
                        $detalle_receta->presentacion = $value->presentacion;
                        $detalle_receta->posologia = $value->posologia;
                        $detalle_receta->via_administracion = $value->via_administracion;
                        $detalle_receta->periodo = $value->periodo;
                        $detalle_receta->uso_cronico = 1;
                        $detalle_receta->cantidad_compra = $value->cantidad;
                        $detalle_receta->cantidad_vendida = 0;
                        $detalle_receta->comentario = '';

                        $profesional = Profesional::find($request->id_profesional);
                        $paciente = Paciente::find($request->id_paciente);
                        $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

                        // $detalle_receta->receta_token = encrypt( $dia.'_'.$profesional->nombre.'_'.$paciente->apellido_uno.'_'.$lugar_atencion->id );

                        $certificado_documento = CertificadoController::certificadoDocumento((int)$request->id_ficha_atencion, (int)$request->id_profesional, (int)$request->id_paciente, 1);

                        $dia = date('Y-m-d');
                        if($certificado_documento['estado'] == 1)
                            $detalle_receta->receta_token = $certificado_documento['certificado'];
                        else
                            $detalle_receta->receta_token = encrypt( $dia.'_'.$profesional->nombre.'_'.$paciente->apellido_uno.'_'.$lugar_atencion->id );

                        $detalle_receta->estado = 1;

                        if($detalle_receta->save())
                        {
                            $datos['detalle'][$key]['estado'] = 1;
                            $datos['detalle'][$key]['msj'] = 'Registro Creado';
                        }
                        else
                        {
                            $datos['detalle'][$key]['estado'] = 0;
                            $datos['detalle'][$key]['msj'] = 'Falla en el registro';
                        }

                    }
                    else
                    {
                        $datos['detalle'][$key]['estado'] = 1;
                        $datos['detalle'][$key]['msj'] = 'Medicamento ya existente en receta';
                    }
                }
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registros no encontrados';
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

    public function getRegsitros(Request $request)
    {

        $datos = array();
        $filtro = array();

        if(!empty($request->id_ficha_atencion)){
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        }
        if(!empty($request->id_paciente)){
            $filtro[] = array('id_paciente',$request->id_paciente);
        }
        if(!empty($request->id_profesional)){
            $filtro[] = array('id_profesional',$request->id_profesional);
        }
        if(!empty($request->nombre_medicamento)){
            $filtro[] = array('nombre_medicamento', 'like' ,$request->nombre_medicamento.'%');
        }
        if(!empty($request->cantidad)){
            $filtro[] = array('cantidad',$request->cantidad);
        }
        if(!empty($request->cliente)){
            $filtro[] = array('cliente',$request->cliente);
        }
        if(!empty($request->tipo_enfermedad)){
            $filtro[] = array('tipo_enfermedad',$request->tipo_enfermedad);
        }
        if(!empty($request->estado)){
            $filtro[] = array('estado',$request->estado);
        }

        $medicamento = Medicamentousocronicogeneral::where($filtro)->get();

        if($medicamento->count() > 0) {
            $datos['estado'] = 1;
            $datos['msj'] = 'busqueda exitosa';
            $datos['registros'] = $medicamento;
            $datos['request'] = $request->all();
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Sin Registros';
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    public function getRegsitro(Request $request)
    {

        $datos = array();
        $filtro = array();
        $valido = 0;
        $error = array();

        if(empty($request->id)){
           $valido = 1;
           $error[] = 'Campo Requerido ID';
        }

        if($valido == 0){
             $medicamento = Medicamentousocronicogeneral::find($request->id);

            if($medicamento->count() > 0) {
                $datos['estado'] = 1;
                $datos['msj'] = 'busqueda exitosa';
                $datos['registros'] = $medicamento;
                $datos['request'] = $request->all();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'error al buscar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Camppo Requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    public function deleteRegsitro(Request $request)
    {

        $datos = array();
        $filtro = array();
        $valido = 0;
        $error = array();

        if(empty($request->id)){
           $valido = 1;
           $error[] = 'Campo Requerido ID';
        }

        if($valido == 0){
            $medicamento = Medicamentousocronicogeneral::find($request->id);
            $medicamento->delete();

            if($medicamento->count() > 0) {
                $datos['estado'] = 1;
                $datos['msj'] = 'busqueda exitosa';
                $datos['registros'] = $medicamento;
                $datos['request'] = $request->all();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'error al buscar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Camppo Requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }


}
