<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Direccion;
use App\Models\LugarAtencion;
use App\Models\Region;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function registrar_r( Request $request )
    {
        return $this->registrar( $request->id_institucion, $request->id_lugar_atencion, $request->rut, $request->nombre, $request->direccion, $request->numero_dir, $request->comuna, $request->id_direccion, $request->email, $request->telefono, $request->telefono_2, $request->otro, $request->estado );
    }

    public function registrar( $id_institucion, $id_lugar_atencion, $rut, $nombre, $direccion, $numero_dir, $comuna, $id_direccion, $email, $telefono, $telefono_2, $otro, $estado )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro = new Sucursal();

            $direccion_suc = new Direccion();
            $direccion_suc->direccion = $direccion;
            $direccion_suc->numero_dir = $numero_dir;
            $direccion_suc->id_ciudad = $comuna;
            $direccion_suc->save();

            $lugar_atencion = new LugarAtencion();
            $lugar_atencion->nombre = $nombre;
            $lugar_atencion->email = $email;
            $lugar_atencion->rut = $rut;
            $lugar_atencion->telefono = $telefono;
            $lugar_atencion->id_direccion = $direccion_suc->id;
            $lugar_atencion->tipo = 2;
            $lugar_atencion->save();

            $registro->id_institucion = $id_institucion;
            $registro->id_lugar_atencion = $lugar_atencion->id;
            $registro->rut = $rut;
            $registro->nombre = $nombre;

            $registro->id_direccion = $direccion_suc->id;
            $registro->email = $email;
            $registro->telefono = $telefono;
            $registro->telefono_2 = $telefono_2;
            $registro->otro = $otro;
            // $registro->estado = $estado;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['last_id'] = $registro->id;

                $this->notificar_nueva_sucursal($registro);
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en el registro';
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

    public function modificar_r( Request $request )
    {
        return $this->modificar( $request->id, $request->id_institucion, $request->id_lugar_atencion, $request->rut, $request->nombre, $request->direccion, $request->numero_dir, $request->comuna, $request->id_direccion, $request->email, $request->telefono, $request->telefono_2, $request->otro, $request->estado );
    }
    public function modificar( $id, $id_institucion, $id_lugar_atencion, $rut, $nombre, $direccion, $numero_dir, $comuna, $id_direccion, $email, $telefono, $telefono_2, $otro, $estado )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = Sucursal::find($id);

            if($registro)
            {
                if(!empty($id_institucion))
                    $registro->id_institucion = $id_institucion;

                if(!empty($id_lugar_atencion))
                    $registro->id_lugar_atencion = $id_lugar_atencion;

                if(!empty($rut))
                    $registro->rut = $rut;

                if(!empty($nombre))
                    $registro->nombre = $nombre;

                if(!empty($direccion) || !empty($numero_dir) || !empty($comuna) )
                {
                    $reg_direccion = Direccion::find($registro->id_direccion);
                    $reg_direccion->direccion = !empty($direccion)?$direccion:$reg_direccion->direccion;
                    $reg_direccion->numero_dir = !empty($numero_dir)?$numero_dir:$reg_direccion->numero_dir;
                    $reg_direccion->id_ciudad = !empty($comuna)?$comuna:$reg_direccion->comuna;

                    $reg_direccion->save();
                }
                // if(!empty($id_direccion))
                //     $registro->id_direccion = $id_direccion;

                if(!empty($email))
                    $registro->email = $email;

                if(!empty($telefono))
                    $registro->telefono = $telefono;

                if(!empty($telefono_2))
                    $registro->telefono_2 = $telefono_2;

                if(!empty($otro))
                    $registro->otro = $otro;

                if(!empty($estado))
                    $registro->estado = $estado;


                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro';
                    $datos['last_id'] = $registro->id;
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla en el registro';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro no encontrado';
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

    public function verRegistros_r( Request $request )
    {
        return $this->verRegistros( $request->id_institucion, $request->id_lugar_atencion, $request->rut, $request->nombre, $request->email, $request->telefono );
    }
    public function verRegistros( $id_institucion, $id_lugar_atencion, $rut, $nombre, $email, $telefono )
    {
        $datos = array();
        $filtro = array();
        $error = array();
        $valido = 1;

        if(!empty($id_institucion))
            $filtro[] = array('id_institucion', $id_institucion);
        if(!empty($id_lugar_atencion))
            $filtro[] = array('id_lugar_atencion', $id_lugar_atencion);
        if(!empty($rut))
            $filtro[] = array('rut', $rut);
        if(!empty($nombre))
            $filtro[] = array('nombre', $nombre);
        if(!empty($email))
            $filtro[] = array('email', $email);
        if(!empty($telefono))
            $filtro[] = array('telefono', $telefono);

        $registro = Sucursal::where($filtro)->with('Direccion')->get();
        foreach ($registro as $key => $value)
        {
            $ciudad_suc = Ciudad::find($value->direccion->id_ciudad);
            $region_suc = Region::find($ciudad_suc->id_region);
            $registro[$key]->ciudadObj = $ciudad_suc;
            $registro[$key]->regionObj = $region_suc;
        }

        if($registro)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registro;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
            $datos['registros'] = array();
        }

        return $datos;
    }

    public function verRegistro_r( Request $request )
    {
        return $this->verRegistro( $request->id, $request->id_institucion, $request->id_lugar_atencion, $request->rut, $request->nombre, $request->email, $request->telefono );
    }
    public function verRegistro($id, $id_institucion, $id_lugar_atencion, $rut, $nombre, $email, $telefono )
    {
        $datos = array();
        $filtro = array();
        $error = array();
        $valido = 1;

        if(empty($id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro[] = array('id', $id);

            if(!empty($id_institucion))
                $filtro[] = array('id_institucion', $id_institucion);
            if(!empty($id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion', $id_lugar_atencion);
            if(!empty($rut))
                $filtro[] = array('rut', $rut);
            if(!empty($nombre))
                $filtro[] = array('nombre', $nombre);
            if(!empty($email))
                $filtro[] = array('email', $email);
            if(!empty($telefono))
                $filtro[] = array('telefono', $telefono);

            $registro = Sucursal::where($filtro)->with('Direccion')->get()->first();

            $ciudad_suc = Ciudad::find($registro->direccion->id_ciudad);
            $region_suc = Region::find($ciudad_suc->id_region);
            $registro->ciudadObj = $ciudad_suc;
            $registro->regionObj = $region_suc;

            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
                $datos['registro'] = array();
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

    public function notificar_nueva_sucursal($sucursal)
    {
        $institucion = Instituciones::find($sucursal->id_institucion);


    }

}
