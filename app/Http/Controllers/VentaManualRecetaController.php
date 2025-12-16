<?php

namespace App\Http\Controllers;

use App\Models\VentaManualReceta;
use App\Models\DetalleReceta;
use App\Models\Instituciones;
use App\Models\Profesional;
use Illuminate\Http\Request;

class VentaManualRecetaController extends Controller
{
    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if((int)$request->id_ficha==0) 
        {
            $error['id_ficha'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if((int)$request->id_paciente==0) 
        {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->id_usuario==0) 
        {
            $error['id_usuario'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->lista_productos=='') 
        {
            $error['lista_productos'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {

            $lista_productos = json_decode($request->lista_productos, true);           
            $lista_productos_registrados = [];
            $cant = 0;

            foreach($lista_productos as $key => $value)
            {
                $registro = DetalleReceta::find($value['id']);
                $registro->cantidad_vendida = $value['cantidad_vendida'];
                $registro->save();    

                $id_profesional_ = 0;
                $id_institucion_ = 0;
                
                $profesional = Profesional::where('id_usuario',$request->id_usuario)->first();
                $instituciones = Instituciones::where('id_usuario',$request->id_usuario)->first();

                if($profesional)
                $id_profesional_ = $profesional->id;

                if($instituciones)
                $id_institucion_ = $instituciones->id;                                    

                $registro = new VentaManualReceta();

                $registro->id_ficha         = encrypt($request->id_ficha);          
                $registro->id_paciente      = encrypt($request->id_paciente);
                $registro->id_profesional   = encrypt($id_profesional_);
                $registro->id_institucion   = encrypt($id_institucion_);
                $registro->id_medicamento   = encrypt($registro->id_articulo);
                $registro->medicamento      = encrypt($registro->producto);
                $registro->cantidad         = encrypt($registro->cantidad);
                $registro->vendida          = encrypt($registro->cantidad_compra);
                $registro->tipo             = encrypt('');
                $registro->control          = encrypt('');

                $registro->nombre           = encrypt($request->nombre);
                $registro->rut              = encrypt($request->rut);
                $registro->edad             = encrypt($request->edad);
                $registro->direccion        = encrypt($request->direccion);
                $registro->estado_manual    = encrypt($request->estado_manual);
                
                $registro->save();

                $lista_productos_registrados[] = $registro; //guardado de estado
                                             
            }

            $datos['registros_productos'] = $lista_productos;   
            $datos['registros_productos_ingresados'] = $lista_productos_registrados;   
            $datos['estado'] = 1;

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRegistro(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        if((int)$request->id==0) 
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        if($campos_requeridos==0)
        {
            $registro = VentaManualReceta::find($request->id);

            $registro_ = array(
            "id" => $registro->id,    
            "id_ficha" => decrypt($registro->id_ficha),
            "id_paciente" => decrypt($registro->id_paciente),
            "id_profesional" => decrypt($registro->id_profesional),
            "id_institucion" => decrypt($registro->id_institucion),
            "id_medicamento" => decrypt($registro->id_medicamento),
            "medicamento" => decrypt($registro->medicamento),
            "cantidad" => decrypt($registro->cantidad),
            "vendida" => decrypt($registro->vendida),
            "tipo" => decrypt($registro->tipo),
            "control" => decrypt($registro->control),

            "nombre" => decrypt($registro->nombre),
            "rut" => decrypt($registro->rut),
            "edad" => decrypt($registro->edad),
            "direccion" => decrypt($registro->direccion),
            "estado_manual" => decrypt($registro->estado_manual),

            "estado" => $registro->estado,
            "created_at" => $registro->created_at,
            "updated_at" => $registro->updated_at
            );

            $datos['registro'] = $registro_;
            $datos['estado'] = 1;
            $datos['id'] = $registro->id;
                                             

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }
}
