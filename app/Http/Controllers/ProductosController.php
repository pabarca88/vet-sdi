<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marcas_productos;
use App\Models\Unidades_medidas;
use App\Models\Producto;
use App\Models\Compras_detalle;
use App\Models\Compras;
use Illuminate\Support\Facades\DB;


class ProductosController extends Controller
{

    public function dameProductos(){
        $productos = Producto::select('productos.*', 'tipo_producto.nombre as tipo_producto','unidades_medidas.nombre as unidad_medida', 'marcas_productos.nombre as marca','compras_detalle.cantidad','proveedores.nombre as proveedor')
        ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
        ->join('unidades_medidas', 'productos.unidad_medida', 'unidades_medidas.id')
        ->join('compras_detalle', 'productos.id', 'compras_detalle.id_producto')
            ->join('compras', 'compras_detalle.id_compra', 'compras.id')
            ->join('proveedores', 'compras.id_proveedor', 'proveedores.id')
        ->leftjoin('marcas_productos', 'productos.marca', 'marcas_productos.id')
        ->get();

        return $productos;
    }
    //
    public function guardarMarca(Request $req){
        try {
            //code...
            $existe = $this->existeMarca($req->nombre);
            if($existe){
                return ['mensaje' => 'existe'];
            }
            $marca = new Marcas_productos();
            $marca->nombre = strtoupper($req->marca);
            $marca->descripcion = $req->descripcion;
            $marca->save();

            $marcas = $this->dameMarcas();
            return ['mensaje' => 'OK','marcas' => $marcas];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function guardarMedida(Request $req){
        try {
            //code...
            $existe = $this->existeMedida($req->medida);
            if($existe){
                return ['mensaje' => 'existe'];
            }
            $medida = new Unidades_medidas();
            $medida->nombre = strtoupper($req->medida);
            $medida->descripcion = $req->descripcion;
            $medida->save();

            $unidades_medidas = $this->dameMedidas();

            return ['mensaje' => 'OK', 'unidades_medidas' => $unidades_medidas];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function dameMarcas(){
        $marcas = Marcas_productos::all();
        return $marcas;
    }

    public function dameMedidas(){
        $medidas = Unidades_medidas::all();
        return $medidas;
    }

    public function existeMarca($nombre){
        $nombre_marca = strtoupper($nombre);
        $marca = Marcas_productos::where('nombre', $nombre_marca)->first();
        if($marca){
            return true;
        }
        return false;
    }

    public function existeMedida($nombre){
        $nombre_medida = strtoupper($nombre);
        $medida = Unidades_medidas::where('nombre', $nombre_medida)->first();
        if($medida){
            return true;
        }
        return false;
    }

    public function guardarProducto(Request $req){
        try {
            // preguntas si el producto ya existe con el proveedor
            $producto = Producto::where('codigo_interno', $req->codigo_interno)->first();
            if($producto){
                return false;
            }
            // Validar el archivo
            $req->validate([
                'imagen' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            // Obtener el archivo
            $file = $req->file('imagen');

            // Definir el nombre del archivo y la ruta donde se guardará
            $nombreArchivo = time() . '_' . $file->getClientOriginalName();
            $ruta = public_path('storage/images/farmacia');

            // Mover el archivo a la carpeta public/images/farmacia
            $file->move($ruta, $nombreArchivo);

            // Obtener la ruta pública del archivo
            $rutaPublica = 'storage/images/farmacia/' . $nombreArchivo;

            $producto = new Producto();
            $producto->codigo_interno = $req->codigo_interno;
            $producto->nombre = $req->nombre_producto;
            $producto->stock_minimo = $req->stock_minimo;
            $producto->stock_maximo = $req->stock_maximo;
            $producto->stock_actual += $req->cantidad;
            $producto->imagen = $nombreArchivo; // Guardar la ruta pública de la imagen
            $producto->descripcion = $req->observaciones;
            $producto->id_tipo_producto = $req->tipo_producto;
            $producto->id_unidad_medida = $req->unidad_medida;
            $producto->almacenamiento = intval($req->almacenamiento);
            $producto->id_tipo_almacenamiento = intval($req->tipo_almacenamiento);
            $producto->id_bodega = $req->bodega;
            $producto->id_marca = $req->marca;
            $producto->image_path = $rutaPublica;
            $producto->save();

            return $producto->id;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function buscarProductosTipo($id){
        try {
            //code...
            if($id == 0){
                $productos = Producto::select('productos.codigo_interno','productos.id', DB::raw('MAX(productos.nombre) as nombre_producto'),DB::raw('MAX(productos.stock_actual) as stock_actual'), DB::raw('MAX(tipo_producto.nombre) as tipo_producto'), DB::raw('MAX(unidades_medidas.nombre) as unidad_medida'), DB::raw('MAX(marcas_productos.nombre) as marca'), DB::raw('SUM(compras_detalle.cantidad) as cantidad'),DB::raw('MAX(compras_detalle.precio_compra) as precio_unitario'), DB::raw('MAX(proveedores.nombre) as proveedor'))
                ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
                ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
                ->leftjoin('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
                ->join('compras_detalle', 'productos.id', 'compras_detalle.id_producto')
                ->join('compras', 'compras_detalle.id_compra', 'compras.id')
                ->join('proveedores', 'compras.id_proveedor', 'proveedores.id')
                ->groupBy('productos.codigo_interno','productos.id')
                ->get();
            }else{
                $productos = Producto::select('productos.codigo_interno','productos.id', DB::raw('MAX(productos.nombre) as nombre_producto'), DB::raw('MAX(tipo_producto.nombre) as tipo_producto'), DB::raw('MAX(unidades_medidas.nombre) as unidad_medida'), DB::raw('MAX(marcas_productos.nombre) as marca'), DB::raw('SUM(compras_detalle.cantidad) as cantidad'),DB::raw('MAX(compras_detalle.precio_compra) as precio_unitario'), DB::raw('MAX(proveedores.nombre) as proveedor'))
                ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
                ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
                ->leftjoin('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
                ->join('compras_detalle', 'productos.id', 'compras_detalle.id_producto')
                ->join('compras', 'compras_detalle.id_compra', 'compras.id')
                ->join('proveedores', 'compras.id_proveedor', 'proveedores.id')
                ->where('productos.id_tipo_producto', $id)
                ->groupBy('productos.codigo_interno','productos.id')
                ->get();
            }



            // sumar todas las cantidades de los productos
            // foreach ($productos as $producto) {
            //     $cantidad = Compras_detalle::where('id_producto', $producto->id)->sum('cantidad');
            //     $producto->cantidad = $cantidad;
            // }

            return ['productos' => $productos];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function buscarProductos(Request $req){
        $tag = $req->producto;
        $idproveedor = $req->idproveedor;
        $productos = Producto::select('productos.codigo_interno','productos.id',DB::raw('MAX(compras_detalle.precio_compra) as precio_unitario'), DB::raw('MAX(productos.nombre) as nombre_producto'), DB::raw('MAX(tipo_producto.nombre) as tipo_producto'), DB::raw('MAX(unidades_medidas.nombre) as unidad_medida'), DB::raw('MAX(marcas_productos.nombre) as marca'), DB::raw('MAX(proveedores.nombre) as proveedor'))
            ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
            ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
            ->leftjoin('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
            ->join('compras_detalle', 'productos.id', 'compras_detalle.id_producto')
            ->join('compras', 'compras_detalle.id_compra', 'compras.id')
            ->join('proveedores', 'compras.id_proveedor', 'proveedores.id')
            ->where('productos.codigo_interno', 'like', '%'.$tag.'%')
            ->where('compras.id_proveedor', $idproveedor)
            ->groupBy('productos.codigo_interno','productos.id')
            ->get();


        return ['productos' => $productos];
    }

    public function seleccionarProducto($idproducto){
        $producto = Producto::select('productos.*', 'tipo_producto.nombre as tipo_producto','unidades_medidas.nombre as unidad_medida', 'marcas_productos.nombre as marca','compras_detalle.cantidad','compras_detalle.lote','compras_detalle.fecha_vencimiento','compras_detalle.observaciones','compras_detalle.otros','compras_detalle.precio_compra as precio_unitario')
        ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
        ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
        ->leftjoin('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
        ->join('compras_detalle', 'productos.id', 'compras_detalle.id_producto')
        ->where('productos.id', $idproducto)
        ->first();
        return ['producto' => $producto];
    }

    public function dameProductosAlmacenamiento(){
        try {
            $productos = Producto::select('productos.*', 'tipo_producto.nombre as tipo_producto','unidades_medidas.nombre as unidad_medida', 'marcas_productos.nombre as marca','compras_detalle.cantidad','proveedores.nombre as proveedor', 'tipo_almacenamiento_productos.nombre as tipo_almacenamiento')
            ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
            ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
            ->join('compras_detalle', 'productos.id', 'compras_detalle.id_producto')
            ->join('compras', 'compras_detalle.id_compra', 'compras.id')
            ->join('proveedores', 'compras.id_proveedor', 'proveedores.id')
            ->leftjoin('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
            ->join('tipo_almacenamiento_productos', 'productos.id_tipo_almacenamiento', 'tipo_almacenamiento_productos.id')
            ->where('productos.almacenamiento', 1)
            ->get();

            foreach($productos as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }

            return $productos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

}
