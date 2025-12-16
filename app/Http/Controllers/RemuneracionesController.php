<?php

namespace App\Http\Controllers;

use App\Models\ContratoDependiente;
use App\Models\ContratoDependienteProfesional;
use App\Models\Instituciones;
use App\Models\Remuneraciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RemuneracionesController extends Controller
{
    public function registrar(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_contrato_dependiente))
        {
            $error['id_contrato_dependiente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_mes_liq))
        {
            $error['r_mes_liq'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_ano_liq))
        {
            $error['r_ano_liq'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_sueldo_base))
        {
            $error['r_sueldo_base'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->r_bonos))
        // {
        //     $error['r_bonos'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_horas_extra))
        // {
        //     $error['r_horas_extra'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_otros_imp))
        // {
        //     $error['r_otros_imp'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->r_total_h_imponibles))
        {
            $error['r_total_h_imponibles'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->r_colacion))
        // {
        //     $error['r_colacion'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_movilizacion))
        // {
        //     $error['r_movilizacion'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_asignacion_fam))
        // {
        //     $error['r_asignacion_fam'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_otros_noimp))
        // {
        //     $error['r_otros_noimp'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_total_no_imponibles))
        // {
        //     $error['r_total_no_imponibles'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->r_total_haberes))
        {
            $error['r_total_haberes'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->r_afp))
        // {
        //     $error['r_afp'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_seg_cesantia))
        // {
        //     $error['r_seg_cesantia'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_afp_vol))
        // {
        //     $error['r_afp_vol'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_por_salud))
        // {
        //     $error['r_por_salud'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_prestamos))
        // {
        //     $error['r_prestamos'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_anticipos))
        // {
        //     $error['r_anticipos'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_ahorro_vol))
        // {
        //     $error['r_ahorro_vol'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_seguro_complementario))
        // {
        //     $error['r_seguro_complementario'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->r_otros_desc_pers))
        // {
        //     $error['r_otros_desc_pers'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->r_total_desc))
        {
            $error['r_total_desc'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_suma_r_total_haberes))
        {
            $error['r_suma_r_total_haberes'] = 'campo requerido';
            $valido = 0;
        }
        if($request->r_suma_r_total_desc == '')
        {
            $error['r_suma_r_total_desc'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_a_pagar))
        {
            $error['r_a_pagar'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {

            $registro = new Remuneraciones();
            $registro->id_contrato_dependiente = $request->id_contrato_dependiente;
            $registro->id_empleado = $request->id_empleado;

            $registro->r_mes_liq = $request->r_mes_liq;
            $registro->r_ano_liq = $request->r_ano_liq;
            $registro->r_sueldo_base = $request->r_sueldo_base;
            $registro->r_bonos = $request->r_bonos;
            $registro->r_horas_extra = $request->r_horas_extra;
            $registro->r_otros_imp = $request->r_otros_imp;
            $registro->r_total_h_imponibles = $request->r_total_h_imponibles;
            $registro->r_colacion = $request->r_colacion;
            $registro->r_movilizacion = $request->r_movilizacion;
            $registro->r_asignacion_fam = $request->r_asignacion_fam;
            $registro->r_otros_noimp = $request->r_otros_noimp;
            $registro->r_total_no_imponibles = $request->r_total_no_imponibles;
            $registro->r_total_haberes = $request->r_total_haberes;
            $registro->r_afp = $request->r_afp;
            $registro->r_seg_cesantia = $request->r_seg_cesantia;
            $registro->r_afp_vol = $request->r_afp_vol;
            $registro->r_por_salud = $request->r_por_salud;
            $registro->r_prestamos = $request->r_prestamos;
            $registro->r_anticipos = $request->r_anticipos;
            $registro->r_ahorro_vol = $request->r_ahorro_vol;
            $registro->r_seguro_complementario = $request->r_seguro_complementario;
            $registro->r_otros_desc_pers = $request->r_otros_desc_pers;
            $registro->r_total_desc = $request->r_total_desc;
            $registro->r_suma_r_total_haberes = $request->r_suma_r_total_haberes;
            $registro->r_suma_r_total_desc = $request->r_suma_r_total_desc;
            $registro->r_a_pagar = $request->r_a_pagar;

            $registro->id_liquidador_generador = Auth::user()->id;
            // $registro->r_fecha_generado = $request->r_fecha_generado;

            // $registro->id_liquidador_pago = $request->id_liquidador_pago;
            // $registro->r_fecha_pago = $request->r_fecha_pago;

            // $registro->id_liquidador_eliminado = $request->id_liquidador_eliminado;
            // $registro->r_fecha_eliminado = $request->r_fecha_eliminado;

            // $registro->pdf = $request->pdf;

            // $registro->estado = $request->estado;
            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';

                /** generar pdf */
                $datos['pdf'] = $this->generarPDF($registro->id, Auth::user()->id);
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema en el registro';
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

    public function registrarProfesional(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_contrato_dependiente))
        {
            $error['id_contrato_dependiente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_mes_liq))
        {
            $error['r_mes_liq'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_ano_liq))
        {
            $error['r_ano_liq'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_sueldo_base))
        {
            $error['r_sueldo_base'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_total_h_imponibles))
        {
            $error['r_total_h_imponibles'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_total_haberes))
        {
            $error['r_total_haberes'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_total_desc))
        {
            $error['r_total_desc'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_suma_r_total_haberes))
        {
            $error['r_suma_r_total_haberes'] = 'campo requerido';
            $valido = 0;
        }
        if($request->r_suma_r_total_desc == '')
        {
            $error['r_suma_r_total_desc'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->r_a_pagar))
        {
            $error['r_a_pagar'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {

            $registro = new Remuneraciones();
            $registro->tipo_contrato = "PROFESIONAL";
            $registro->id_contrato_dependiente = $request->id_contrato_dependiente;
            $registro->id_empleado = $request->id_empleado;

            $registro->r_mes_liq = $request->r_mes_liq;
            $registro->r_ano_liq = $request->r_ano_liq;
            $registro->r_sueldo_base = $request->r_sueldo_base;
            $registro->r_bonos = $request->r_bonos;
            $registro->r_horas_extra = $request->r_horas_extra;
            $registro->r_otros_imp = $request->r_otros_imp;
            $registro->r_total_h_imponibles = $request->r_total_h_imponibles;
            $registro->r_colacion = $request->r_colacion;
            $registro->r_movilizacion = $request->r_movilizacion;
            $registro->r_asignacion_fam = $request->r_asignacion_fam;
            $registro->r_otros_noimp = $request->r_otros_noimp;
            $registro->r_total_no_imponibles = $request->r_total_no_imponibles;
            $registro->r_total_haberes = $request->r_total_haberes;
            $registro->r_afp = $request->r_afp;
            $registro->r_seg_cesantia = $request->r_seg_cesantia;
            $registro->r_afp_vol = $request->r_afp_vol;
            $registro->r_por_salud = $request->r_por_salud;
            $registro->r_prestamos = $request->r_prestamos;
            $registro->r_anticipos = $request->r_anticipos;
            $registro->r_ahorro_vol = $request->r_ahorro_vol;
            $registro->r_seguro_complementario = $request->r_seguro_complementario;
            $registro->r_otros_desc_pers = $request->r_otros_desc_pers;
            $registro->r_total_desc = $request->r_total_desc;
            $registro->r_suma_r_total_haberes = $request->r_suma_r_total_haberes;
            $registro->r_suma_r_total_desc = $request->r_suma_r_total_desc;
            $registro->r_a_pagar = $request->r_a_pagar;

            $registro->id_liquidador_generador = Auth::user()->id;
            // $registro->r_fecha_generado = $request->r_fecha_generado;

            // $registro->id_liquidador_pago = $request->id_liquidador_pago;
            // $registro->r_fecha_pago = $request->r_fecha_pago;

            // $registro->id_liquidador_eliminado = $request->id_liquidador_eliminado;
            // $registro->r_fecha_eliminado = $request->r_fecha_eliminado;

            // $registro->pdf = $request->pdf;

            // $registro->estado = $request->estado;
            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';

                /** generar pdf */
                $datos['pdf'] = $this->generarPDFprofesional($registro->id, Auth::user()->id);
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema en el registro';
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

    function generarPDF($id_remuneracion, $id_liquidador)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_remuneracion))
        {
            $error['id_remuneracion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = Remuneraciones::with('ContratoDependiente')->find($id_remuneracion);

            if($registro)
            {
                if($registro->ContratoDependiente)
                {
                    $array_mes = ['', 'ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];
                    $titulo = 'LIQ '.$array_mes[$registro->r_mes_liq].' '.$registro->r_ano_liq;

                    $remuneracion = Remuneraciones::find($id_remuneracion);
                    $contrato = ContratoDependiente::with('Persona')->find($remuneracion->id_contrato_dependiente);
                    $institucion = Instituciones::find($contrato->id_institucion);

                    // $directorio = 'liq/';
                    $nombre = 'LIQ_'.$array_mes[$registro->r_mes_liq].'_'.$registro->r_ano_liq.'_'.$registro->ContratoDependiente->rut;
                    $template = 'pdf_liquidacion';

                    $result_pdf =  PdfController::generarPDF($titulo, compact('remuneracion','contrato','institucion'), $nombre, $template, 'G');
                    if($result_pdf->estado == 1)
                    {
                        $registro->pdf = $nombre.'.pdf';
                        $registro->id_liquidador_generador = $id_liquidador;
                        $registro->r_fecha_generado = date('Y-m-d H:i:s');

                        if($registro->save())
                        {
                            $datos['pdf']['estado'] = 1;
                            $datos['pdf']['msj'] = 'pdf generado y registrado';
                            $datos['pdf']['pdf'] = $result_pdf->pdf;
                            $datos['pdf']['pdf_url'] = $result_pdf->pdf_url;
                        }
                        else
                        {
                            $datos['pdf']['estado'] = 0;
                            $datos['pdf']['msj'] = 'pdf generado y No registrado';
                        }
                    }
                    else
                    {
                        $datos['pdf']['estado'] = 0;
                        $datos['pdf']['msj'] = 'pdf no generado';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Contrato no encontrado';
                }
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

    function generarPDFprofesional($id_remuneracion, $id_liquidador)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_remuneracion))
        {
            $error['id_remuneracion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = Remuneraciones::with('ContratoDependienteProfesional')->find($id_remuneracion);

            if($registro)
            {
                if($registro->ContratoDependiente)
                {
                    $array_mes = ['', 'ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];
                    $titulo = 'LIQ '.$array_mes[$registro->r_mes_liq].' '.$registro->r_ano_liq;

                    $remuneracion = Remuneraciones::find($id_remuneracion);
                    $contrato = ContratoDependienteProfesional::with('Persona')->find($remuneracion->id_contrato_dependiente);
                    $institucion = Instituciones::find($contrato->id_institucion);

                    // $directorio = 'liq/';
                    $nombre = 'LIQ_'.$array_mes[$registro->r_mes_liq].'_'.$registro->r_ano_liq.'_'.$registro->ContratoDependiente->rut;
                    $template = 'pdf_liquidacion';

                    $result_pdf =  PdfController::generarPDF($titulo, compact('remuneracion','contrato','institucion'), $nombre, $template, 'G');
                    if($result_pdf->estado == 1)
                    {
                        $registro->pdf = $nombre.'.pdf';
                        $registro->id_liquidador_generador = $id_liquidador;
                        $registro->r_fecha_generado = date('Y-m-d H:i:s');

                        if($registro->save())
                        {
                            $datos['pdf']['estado'] = 1;
                            $datos['pdf']['msj'] = 'pdf generado y registrado';
                            $datos['pdf']['pdf'] = $result_pdf->pdf;
                            $datos['pdf']['pdf_url'] = $result_pdf->pdf_url;
                        }
                        else
                        {
                            $datos['pdf']['estado'] = 0;
                            $datos['pdf']['msj'] = 'pdf generado y No registrado';
                        }
                    }
                    else
                    {
                        $datos['pdf']['estado'] = 0;
                        $datos['pdf']['msj'] = 'pdf no generado';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Contrato no encontrado';
                }
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

    public function pagada(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->mes))
        {
            $error['mes'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->ano))
        {
            $error['ano'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_contrato_dependiente))
        {
            $error['id_contrato_dependiente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_remuneracion))
        {
            $error['id_remuneracion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {

            $filtro = array();
            $filtro[] = array('id', $request->id_remuneracion);
            $filtro[] = array('id_contrato_dependiente', $request->id_contrato_dependiente);
            $filtro[] = array('id_empleado', $request->id_empleado);
            $filtro[] = array('r_mes_liq', $request->mes);
            $filtro[] = array('r_ano_liq', $request->ano);

            $registro = Remuneraciones::where($filtro)->first();
            if($registro)
            {
                $registro->estado = 2;
                $registro->id_liquidador_pago = Auth::user()->id;
                $registro->r_fecha_pago = date('Y-m-d H:i:s');

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Remuneración Pagada con Exito';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Remuneracion no encontrada';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Remuneracion no encontrada';
            }
        }
        else
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function registrarMulticaja(Request $request){
        return $request;
    }
}
