<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\GastosInstitucionales;
use App\Models\Instituciones;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GastosInstitucionalesController extends Controller
{
    public function index(Request $request)
    {
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
        /** fultros */
        $ano_toma = '';
        $mes_toma = '';
        $emision_s = '';
        if( empty($request->filtro_anio))
        {
            $ano_toma = date('Y');
        }
        else
        {
            $ano_toma = $request->filtro_anio;
        }

        if( $request->filtro_mes == '' )
        {
            $mes_toma = date('m');
            // $mes_toma = '';
        }
        else
        {
            $mes_toma = $request->filtro_mes;

        }

        if( empty($request->filtro_emisor) )
        {
            $emision_s = '';
        }
        else
        {
            $emision_s = $request->filtro_emisor;
        }

        $result_gastos = GastosInstitucionales::with('Institucion')
                                                ->with('LugarAtencion')
                                                ->with('Persona')
                                                ->where('id_institucion', $institucion->id)
                                                ->filtros($mes_toma, $ano_toma, $emision_s)
                                                ->get();

        $result_emisor = GastosInstitucionales::select('emisor')->groupBy('emisor')->get();

        return view('app.adm_cm.gastos')->with([
            'institucion' => $institucion,
            'gastos' => $result_gastos,
            'emisor' => $result_emisor,
            'ano_toma' => $ano_toma,
            'mes_toma' => $mes_toma,
            'emision_s' => $emision_s,
        ]);
    }

    public function agregar(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_institucion))
        {
            $error['id_institucion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->tipo))
        {
            $error['tipo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->vencimiento))
        {
            $error['vencimiento'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->emisor))
        {
            $error['emisor'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->folio))
        {
            $error['folio'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->grupo))
        {
            $error['grupo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->mes_pago))
        {
            $error['mes_pago'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->ano_pago))
        {
            $error['ano_pago'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->modo_pago))
        {
            $error['modo_pago'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->monto))
        {
            $error['monto'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $registro = new GastosInstitucionales();
            $registro->id_institucion =  $request->id_institucion;
            $registro->id_lugar_atencion =  $request->id_lugar_atencion;
            $registro->id_adm = Auth::user()->id;
            $registro->tipo =  $request->tipo;
            $registro->nombre =  $request->nombre;
            $registro->vencimiento =  $request->vencimiento;
            $registro->emisor =  $request->emisor;
            $registro->folio =  $request->folio;
            $registro->grupo =  $request->grupo;
            $registro->mes_pago =  $request->mes_pago;
            $registro->ano_pago =  $request->ano_pago;
            $registro->modo_pago =  $request->modo_pago;
            $registro->monto =  $request->monto;
            $registro->estado =  1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function pagado(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        if($valido)
        {
            $registro = GastosInstitucionales::find($request->id);
            if($registro)
            {
                $registro->estado = 2;
                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Estado Pagado Exito';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Falla cambio Estado Pagado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla cambio Estado Pagado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function ver_registro(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro = GastosInstitucionales::find($request->id);
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
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
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function modificar(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id_institucion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_institucion))
        {
            $error['id_institucion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->tipo))
        {
            $error['tipo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->vencimiento))
        {
            $error['vencimiento'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->emisor))
        {
            $error['emisor'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->folio))
        {
            $error['folio'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->grupo))
        {
            $error['grupo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->mes_pago))
        {
            $error['mes_pago'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->ano_pago))
        {
            $error['ano_pago'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->modo_pago))
        {
            $error['modo_pago'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->monto))
        {
            $error['monto'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $registro = GastosInstitucionales::find($request->id);
            $registro->id_institucion =  $request->id_institucion;
            $registro->id_lugar_atencion =  $request->id_lugar_atencion;
            $registro->id_adm = Auth::user()->id;
            $registro->tipo =  $request->tipo;
            $registro->nombre =  $request->nombre;
            $registro->vencimiento =  $request->vencimiento;
            $registro->emisor =  $request->emisor;
            $registro->folio =  $request->folio;
            $registro->grupo =  $request->grupo;
            $registro->mes_pago =  $request->mes_pago;
            $registro->ano_pago =  $request->ano_pago;
            $registro->modo_pago =  $request->modo_pago;
            $registro->monto =  $request->monto;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en editar';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }
}
