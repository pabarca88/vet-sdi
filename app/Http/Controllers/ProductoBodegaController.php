<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductoBodega;
use Illuminate\Http\Request;

class ProductoBodegaController extends Controller
{

    public function getProductoBodegaCategoriaAutocomplete(Request $request)
    {
        $datos = array();


        $search = $request->search;
        $id_categoria = $request->id_categoria;

        if($id_categoria == '')
        {
            if ($search == '') {
                $productos = ProductoBodega::orderby('nombre', 'asc')->select('id', 'nombre', 'codigo','cantidad_stock')->where('cantidad_stock','>',0)->limit(15)->get();
            } else {
                $productos = ProductoBodega::orderby('nombre', 'asc')->select('id', 'nombre','codigo','cantidad_stock')->where('nombre', 'like', $search . '%')->where('cantidad_stock','>',0)->limit(15)->get();
            }
        }
        else
        {
            if ($search == '') {
                $productos = ProductoBodega::orderby('nombre', 'asc')->select('id', 'nombre', 'codigo','cantidad_stock')->where('id_categoria',$id_categoria)->where('cantidad_stock','>',0)->limit(15)->get();
            } else {
                $productos = ProductoBodega::orderby('nombre', 'asc')->select('id', 'nombre','codigo','cantidad_stock')->where('nombre', 'like', $search . '%')->where('id_categoria',$id_categoria)->where('cantidad_stock','>',0)->limit(15)->get();
            }
        }

        $response = array();
        if($productos)
        {
            foreach ($productos as $producto) {
                // $response[] = array("value" => $producto->id, "label" => $producto->nombre);
                $response[] = array("value" => $producto->id, "label" => $producto->nombre, "codigo" => $producto->codigo);
            }
        }


        return response()->json($response);
    }

    static public function verRegistos( $id_bodega, $id_categoria, $id_sub_categoria, $id_tipo_unidad, $sku, $alias, $codigo, $nombre, $descripcion, $observacion, $valor_unidad, $precio_referencia, $punto_pedido, $cantidad_stock, $estado )
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_bodega)){
            $error['id_bodega'] = 'campo requerido';
        }

        if($valido == 1)
        {
            $filtro = array();
            $filtro[] = array('id_bodega',$id_bodega);
            if(!empty($id_categoria))
                $filtro[] = array('id_categoria',$id_categoria);
            if(!empty($id_sub_categoria))
                $filtro[] = array('id_sub_categoria',$id_sub_categoria);
            if(!empty($id_tipo_unidad))
                $filtro[] = array('id_tipo_unidad',$id_tipo_unidad);
            if(!empty($sku))
                $filtro[] = array('sku','like',$sku.'%');
            if(!empty($alias))
                $filtro[] = array('alias', 'like',$alias.'%');
            if(!empty($codigo))
                $filtro[] = array('codigo', 'like',$codigo.'%');
            if(!empty($nombre))
                $filtro[] = array('nombre', 'like',$nombre.'%');
            if(!empty($descripcion))
                $filtro[] = array('descripcion', 'like',$descripcion.'%');
            if(!empty($observacion))
                $filtro[] = array('observacion', 'like',$observacion.'%');
            if(!empty($valor_unidad))
                $filtro[] = array('valor_unidad',$valor_unidad);
            if(!empty($precio_referencia))
                $filtro[] = array('precio_referencia',$precio_referencia);
            if(!empty($punto_pedido))
                $filtro[] = array('punto_pedido',$punto_pedido);
            if(!empty($cantidad_stock))
                $filtro[] = array('cantidad_stock',$cantidad_stock);
            if($estado != '')
                $filtro[] = array('estado',$estado);

            $registros = ProductoBodega::where($filtro)->get();
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;

    }



}
