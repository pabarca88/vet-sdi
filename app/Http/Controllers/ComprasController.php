<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminInstServ;
use App\Models\Asistente;
use App\Models\Bodega;
use App\Models\Bono;
use App\Models\Compras;
use App\Models\Proveedor;
use App\Models\Instituciones;
use App\Models\TipoProducto;
use App\Models\Region;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\Producto;
use App\Models\Servicios;
use App\Models\TipoAlmacenamientoProductos;
use App\Models\Compras_detalle;
use App\Models\Marcas_productos;
use App\Models\Unidades_medidas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ComprasController extends Controller
{
    //

    public function index(){
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }
        $proveedores = Proveedor::select('proveedores.*', 'tipo_producto.nombre as tipo_producto')
        ->join('tipo_producto', 'proveedores.id_tipo_producto', '=', 'tipo_producto.id')
        ->get();

        $tipos_producto = TipoProducto::all();
        $regiones = Region::orderBy('nombre')->get();
        $productos_controller = new ProductosController();
        $marcas = $productos_controller->dameMarcas();
        $unidades_medidas = $productos_controller->dameMedidas();
        $bodegas = Bodega::where('id_institucion', $institucion->id)->get();
        $tipos_almacenamiento = TipoAlmacenamientoProductos::all();
        return view('app.bodega.compras', [
            'proveedores' => $proveedores,
            'tipos_producto' => $tipos_producto,
            'region' => $regiones,
            'marcas' => $marcas,
            'unidades_medidas' => $unidades_medidas,
            'bodegas' => $bodegas,
            'tipos_almacenamiento' => $tipos_almacenamiento,
            'institucion' => $institucion,
        ]);
    }

	public function index_(){

        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        $bonos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->get();

        return view('app.adm_cm.comercial.ingresos', [
            'bonos' => $bonos
        ]);
    }

    public function guardarCompra(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;

            /** INFORMACION DE INSTITUCION Y RESPONSABLE */
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {

                                $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                        ->where('id_empleado', $responsable->id)
                                        ->whereIn('estado', [2,3])
                                        ->first();

                                if($result_contrato)
                                {
                                    $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** INSTITUCION */
                                        $institucion = $registro;
                                        $tipo_institucion = 'institucion';
                                    }
                                    else
                                    {
                                        $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                        if($registro)
                                        {
                                            /** SERVICIOS */
                                            $institucion = $registro;
                                            $tipo_institucion = 'servicio';
                                        }
                                        else
                                        {
                                            return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }
                                else
                                {
                                    return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }

                }
            }
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */
            //code...
            // preguntar si existe la compra con el mismo número de factura y proveedor
            $compra = Compras::where('numero_factura', $req->nro_factura)
            ->where('id_proveedor', $req->proveedor)
            ->first();
            if($compra){
                $productos = $this->dameProductosPorFactura($compra->id);
                return ['mensaje' => 'existe', 'id_compra' => $compra->id, 'productos' => $productos];
            }
            $compra = new Compras();
            $compra->id_institucion = $institucion->id; // debe cambiar por el id de la institución del usuario
            $compra->id_proveedor = $req->proveedor;
            //$compra->id_usuario = Auth::user()->id;
            $compra->id_usuario = 1;
            $compra->fecha_emision = $req->fecha;
            $compra->numero_factura = $req->nro_factura;
            $compra->estado = 1;
            $compra->save();
            return ['mensaje' => 'OK', 'id_compra' => $compra->id];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function buscarProductosFactura(Request $req){
        try {
            //code...
            $idfactura = $req->id_factura;
            $productos = $this->dameProductosPorFactura($idfactura);
            // sumar el total de todos los productos
            $total = 0;
            foreach ($productos as $producto) {
                $total += $producto->cantidad * $producto->precio_unitario;
            }
            $factura = Compras::select('compras.*', 'proveedores.nombre as proveedor')
            ->join('proveedores', 'compras.id_proveedor', '=', 'proveedores.id')
            ->where('compras.id', $idfactura)
            ->first();

            $factura->total = $total;
            $factura->iva = $total * 0.19;
            $factura->total_final = $total + $factura->iva;
            $factura->save();
            return ['productos' => $productos, 'factura' => $factura];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function guardarItemFactura(Request $req){
        try {
         
            // guardar el nuevo producto
            $producto_controlador = new ProductosController();
            if ($req->nuevo == "SI") {
                $id_producto = $producto_controlador->guardarProducto($req);
              
                if($id_producto == false){
                    return ['mensaje' => 'El producto ya existe'];
                }
            }else{
                $id_producto = $req->id_producto;
                $prod = producto::find($id_producto);
                // le sumamos la cantidad al stock actual
                $prod->stock_actual += $req->cantidad;
                $prod->save();
            }
            $producto = Producto::find($id_producto);

            if($producto != null){
                $this->guardarDetalleFactura($req, $producto);

                $productos = $this->dameProductosPorFactura($req->id_compra);
                $compra = Compras::find($req->id_compra);
                //return $productos;
                return ['mensaje' => 'OK', 'productos' => $productos];
            }else{
                return ['mensaje' => $producto];
            }

        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function eliminarItemFactura(Request $req){
        try {

            $id_compra = $req->id_compra;
            $id_item = $req->id_item;
            $detalle = Compras_detalle::where('id_compra', $id_compra)->where('id', $id_item)->first();
            $detalle->delete();
            $productos = $this->dameProductosPorFactura($id_compra);
            // recalcular el total de la factura
            $total = 0;
            foreach ($productos as $producto) {
                $total += $producto->cantidad * $producto->precio_unitario;
            }
            $factura = Compras::find($id_compra);
            $factura->total = $total;
            $factura->iva = $total * 0.19;
            $factura->total_final = $total + $factura->iva;
            $factura->save();
            return 'OK';
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function buscarFacturasPorProveedor(Request $req){
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */
        $compras = Compras::select('compras.*', 'proveedores.nombre as proveedor')
        ->join('proveedores', 'compras.id_proveedor', '=', 'proveedores.id')
        ->where('compras.id_proveedor', $req->id_proveedor)
        ->where('compras.id_institucion', $institucion->id)
        ->get();
        return ['compras'=>$compras];
    }

    private function guardarDetalleFactura($req, $producto){
        $detalle = new Compras_detalle();
        $detalle->id_compra = $req->id_compra;
        $detalle->id_producto = $producto->id;
        $detalle->fecha_compra = Carbon::now();
        $detalle->precio_compra = $req->precio_compra;
        $detalle->cantidad = $req->cantidad;
        $detalle->id_unidad_medida = $req->unidad_medida;
        $detalle->lote = $req->lote;
        $detalle->fecha_vencimiento = $req->fecha_vencimiento;
        $detalle->observaciones = $req->observaciones;
        $detalle->otros = $req->otros;
        $detalle->save();
    }

    private function dameProductosPorFactura($idcompra){
        try {
            //code...
            $productos = Compras_detalle::select('productos.*', 'compras_detalle.id as id_item','tipo_producto.nombre as tipo_producto','compras_detalle.cantidad','compras_detalle.precio_compra as precio_unitario','unidades_medidas.nombre as unidad_medida', 'marcas_productos.nombre as marca')
            ->join('productos', 'compras_detalle.id_producto', 'productos.id')
            ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
            ->leftjoin('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
            ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
            ->where('compras_detalle.id_compra', $idcompra)
            ->get();
            return $productos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function detalleCompraProducto($idProducto){
        $compras = Compras_detalle::select('compras_detalle.cantidad','compras.numero_factura as factura','compras_detalle.precio_compra', 'compras.fecha_emision as fecha_compra','proveedores.nombre as proveedor')
        ->join('compras', 'compras_detalle.id_compra', 'compras.id')
        ->join('proveedores', 'compras.id_proveedor', 'proveedores.id')
        ->where('compras_detalle.id_producto', $idProducto)
        ->get();
        return $compras;
    }

    public function filtrarProductos(Request $req){
        try {
            //code...
            $id_tipo_producto = $req->id_tipo_productos;
            $mes = $req->mes;
            $anio = $req->anio;
            $codigo_tipo = $req->tipo;

            if($codigo_tipo == 1){
                $productos = Producto::select('productos.codigo_interno','productos.id', DB::raw('MAX(productos.nombre) as nombre_producto'), DB::raw('MAX(tipo_producto.nombre) as tipo_producto'), DB::raw('MAX(unidades_medidas.nombre) as unidad_medida'), DB::raw('MAX(marcas_productos.nombre) as marca'), DB::raw('SUM(compras_detalle.cantidad) as cantidad'),DB::raw('MAX(compras_detalle.precio_compra) as precio_unitario'))
                ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
                ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
                ->leftjoin('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
                ->join('compras_detalle', 'productos.id', 'compras_detalle.id_producto')
                ->join('compras', 'compras_detalle.id_compra', 'compras.id')
                ->join('proveedores', 'compras.id_proveedor', 'proveedores.id')
                ->where('productos.id_tipo_producto', $id_tipo_producto)
                ->whereMonth('compras_detalle.fecha_compra', $mes)
                ->whereYear('compras_detalle.fecha_compra', $anio)
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
                ->whereMonth('compras_detalle.fecha_compra', $mes)
                ->whereYear('compras_detalle.fecha_compra', $anio)
                ->groupBy('productos.codigo_interno','productos.id')
                ->get();
            }





            return $productos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }
}
