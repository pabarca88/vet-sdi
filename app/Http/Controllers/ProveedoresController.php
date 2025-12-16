<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Region;
use App\Models\TipoProducto;

class ProveedoresController extends Controller
{
    //
    public function index(){
        try {
            //code...
            $regiones = Region::orderBy('nombre')->get();
            $proveedores = Proveedor::select('proveedores.*', 'tipo_producto.nombre as tipo_producto')
            ->join('tipo_producto', 'proveedores.id_tipo_producto', '=', 'tipo_producto.id')
            ->orderBy('proveedores.id', 'asc')
            ->get();
            $tipo_producto = TipoProducto::all();
            return view('app.bodega.proveedores',[
                'region' => $regiones,
                'proveedores' => $proveedores,
                'tipo_producto' => $tipo_producto
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function guardarProveedor(Request $req){

        // validar datos
        $req->validate([
            'nombre_prov' => 'required',
            'prov_prod' => 'required',
            'direccion' => 'required',
            'rut' => 'required',
            'numero' => 'required',
            'email' => 'required',
            'rol' => 'required',
            'comunas' => 'required',
            'region_agregar' => 'required'
        ],
        [
            'nombre_prov.required' => 'El campo nombre es obligatorio',
            'prov_prod.required' => 'El campo productos es obligatorio',
            'direccion.required' => 'El campo dirección es obligatorio',
            'rut.required' => 'El campo rut es obligatorio',
            'numero.required' => 'El campo número es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'rol.required' => 'El campo rol es obligatorio',
            'comunas.required' => 'El campo comuna es obligatorio',
            'region_agregar.required' => 'El campo región es obligatorio'
        ]);



        $proveedor = new Proveedor();
        $proveedor->nombre = $req->nombre_prov;
        $proveedor->id_tipo_producto = $req->prov_prod;
        $proveedor->direccion = $req->direccion;
        $proveedor->rut = $req->rut;
        $proveedor->telefono = $req->numero;
        $proveedor->email = $req->email;
        $proveedor->rol_tributario = $req->rol;
        $proveedor->id_comuna = $req->comunas;
        $proveedor->id_region = $req->region_agregar;
        $proveedor->save();
        return redirect()->route('proveedores');
    }

    public function guardarProveedorCompras(Request $req){
        try {
            //code...
            // preguntar si existe el proveedor
            $proveedor = Proveedor::where('rut', $req->rut)->first();
            if($proveedor){
                return ['mensaje' => 'El proveedor ya existe'];
            }
            $proveedor = new Proveedor();
            $proveedor->nombre = $req->nombre;
            $proveedor->id_tipo_producto = $req->tipo_producto;
            $proveedor->direccion = $req->direccion;
            $proveedor->rut = $req->rut;
            $proveedor->telefono = $req->telefono;
            $proveedor->email = $req->email;
            $proveedor->id_comuna = $req->idcomuna;
            $proveedor->id_region = $req->idregion;
            $proveedor->save();

            $proveedores = $this->dameProveedores();
            return ['mensaje' => 'OK', 'proveedores' => $proveedores];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    private function dameProveedores(){
        $proveedores = Proveedor::select('proveedores.*', 'tipo_producto.nombre as tipo_producto')
                                    ->join('tipo_producto', 'proveedores.id_tipo_producto', '=', 'tipo_producto.id')
                                    ->get();
        return $proveedores;
    }

    public function getProveedor($id){
        $proveedor = Proveedor::find($id);
        return json_encode($proveedor);
    }

    public function editarProveedor(Request $req){

        $proveedor = Proveedor::find($req->id_proveedor);
        $proveedor->nombre = $req->nombre;
        $proveedor->direccion = $req->direccion;
        $proveedor->id_tipo_producto = $req->prov_prod_;
        $proveedor->rut = $req->rut;
        $proveedor->telefono = $req->telefono;
        $proveedor->email = $req->email;
        $proveedor->rol_tributario = $req->rol_;
        $proveedor->id_comuna = $req->comunas_editar;
        $proveedor->id_region = $req->region_editar;
        $proveedor->save();
        return redirect()->route('proveedores');
    }

    public function cambiarEstadoProveedor($id){
        $proveedor = Proveedor::find($id);
        $proveedor->estado = !$proveedor->estado;
        $proveedor->save();
        return ['mensaje' => 'OK'];
    }
}
