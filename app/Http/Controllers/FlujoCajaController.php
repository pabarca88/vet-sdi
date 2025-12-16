<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\Bono;
use Carbon\Carbon;
use App\Models\ContratoDependiente;
use App\Models\Instituciones;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Parametro;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProfesionalAsistente;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\RendicionCaja;
use App\Models\Servicios;
use App\Models\TipoBono;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\RendicionAprobadaMail;
use Illuminate\Support\Facades\Mail;

class FlujoCajaController extends Controller
{
    public function ver_flujo_caja()
    {

        $lista_asistente = Asistente::all();
        $lista_prevision = Prevision::all();
        $lista_estado_consulta = Parametro::where('referencia','Agenda_Estado')->get();
        $lista_lugares_atencion_activos = LugarAtencion::all();

        $filtro = array();
        $filtro_rendicion = array();
        // if(Auth::user()->hasRole('Admin'))
        // {
        //     $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        //     $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        //     $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();


        //     $bonos = Bono::filtroRelacion($profesional, $paciente, $asistente)
        //                 ->where('numero_sesiones','=','0')
        //                 ->get();

        //     $bonos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
        //                 ->where('numero_sesiones','>','0')
        //                 ->get();

        //     $bonos_rendidos = Bono::filtroRelacion($profesional, $paciente, $asistente)
        //                 ->where('numero_sesiones','=','0')
        //                 ->where('rendido','1')
        //                 ->get();

        //     $bonos_rendidos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
        //                 ->where('numero_sesiones','>','0')
        //                 ->where('rendido','1')
        //                 ->get();

        //     $rendiciones = RendicionCaja::where('id_asistente',$asistente->id)
        //                     ->where('rendicion','0')
        //                     ->get();


        //     $total = 0;
        //     $total_bonos = 0;
        //     $total_efectivo = 0;
        //     $total_otros = 0;
        //     $lista_bonos = array();

        //     foreach ($bonos as $bono){
        //         $lista_bonos[] = $bono->id;

        //         $total++;
        //         // 1->Bono Fisico
        //         if($bono->id_clase_bono == 1)
        //             $total_bonos++;
        //         // 2->Sencillito
        //         else if($bono->id_clase_bono == 2)
        //             $total_bonos++;
        //         // 3->Caja Vecina
        //         else if($bono->id_clase_bono == 3)
        //             $total_bonos++;
        //         // 4->Bono Web
        //         else if($bono->id_clase_bono == 4)
        //             $total_bonos++;
        //         // 5->Bono Web Pre-Pago
        //         else if($bono->id_clase_bono == 5)
        //             $total_bonos++;
        //         // 6->Particular
        //         else if($bono->id_clase_bono == 6)
        //             $total_efectivo += $bono->valor_atencion;
        //         else
        //             $total_otros++;

        //     }


        //     // return view('app.general.flujo_caja.flujo_caja')->with([
        //     return view('app.general.asistente.flujo_caja.home')->with([
        //         'bono' => $bonos,
        //         'bonos_programa' => $bonos_programa,
        //         'bonos_rendidos' => $bonos_rendidos,
        //         'bonos_rendidos_programa' => $bonos_rendidos_programa,
        //         'lista_asistente' => $lista_asistente,
        //         'lista_prevision' => $lista_prevision,
        //         'lista_estado_consulta' => $lista_estado_consulta,

        //         /** */
        //         'asistente' => $asistente,
        //         'lista_bonos' => implode('|',$lista_bonos),
        //         'bono' => $bonos,
        //         'listado_recibe' => $listado_recibe,
        //         'total' => $total,
        //         'total_bonos' => $total_bonos,
        //         'total_efectivo' => $total_efectivo,
        //         'total_otros' => $total_otros,

        //         'listado_recibe_prof' => $profesionales,

        //         'bonos_profesionales' => $bonos_profesionales,

        //         'prevision' => $prevision,

        //         'listado_recibe_prof' => $profesionales,
        //     ]);

        // }
        // else
        if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
            $filtro_rendicion[] = array('id_profesional_receptor',$profesional->id);

            /** Buscar Asistentes de profesional y/o profesional */
            $profesional_lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where('estado',1)->pluck('id_lugar_atencion')->toArray();
            $lista_lugares_atencion_activos = LugarAtencion::whereIn('id', $profesional_lugar_atencion)->get();
            $asistentes_lugar_atencion = AsistenteLugarAtencion::whereIn('id_lugar_atencion', $profesional_lugar_atencion)->where('estado', 1)->pluck('id_asistente')->toArray();
            $lista_asistente = Asistente::whereIn('id', $asistentes_lugar_atencion)->get();
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Adm_Institucion'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Adm_Servicio'))
        {
            $servicio = AdminInstServ::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Contador'))
        {
            // $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }

        $bonos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            // ->where('estado_consulta','<>',8)
            ->get();

        $bonos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->get();

        $bonos_rendidos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->where('estado_consulta','<>',8)
            ->where('id_clase_bono','<>',6)
            ->get();

        $bonos_rendidos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->where('rendido','1')
            ->get();

        $rendiciones = RendicionCaja::where($filtro_rendicion)
                    ->where('rendicion','0')
                    ->get();

        $fecha = Carbon::now();

        $bonos_diarios = Bono::where($filtro)
        ->with('Asistente')
        ->where('numero_sesiones', 0)
        ->whereDate('fecha_atencion', $fecha)
        ->get();

                             // agregar el rut del paciente a los bonos rendidos por el id_cliente
        foreach ($bonos_rendidos as $key => $value) {
                $paciente = Paciente::where('id',$value->id_paciente)->first();
                $value->rut_paciente = $paciente->rut;
                $profesional = Profesional::where('id',$value->id_profesional)->first();
                $value->rut_profesional = $profesional->rut;
        }


        $bonos_fonasa = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->where('estado_consulta',6)
            ->where('convenio',1)
            ->get();

        foreach ($bonos_fonasa as $key => $value) {
            $paciente = Paciente::where('id',$value->id_paciente)->first();
            $value->rut_paciente = $paciente->rut;
            $profesional = Profesional::where('id',$value->id_profesional)->first();
            $value->rut_profesional = $profesional->rut;
        }

        $bonos_otros = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->where('estado_consulta',6)
            ->where('convenio',3)
            ->get();

        foreach ($bonos_otros as $key => $value) {
            $paciente = Paciente::where('id',$value->id_paciente)->first();
            $value->rut_paciente = $paciente->rut;
            $profesional = Profesional::where('id',$value->id_profesional)->first();
            $value->rut_profesional = $profesional->rut;
        }

        $bonos_ = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->whereIn('estado_consulta',[4,6])
            ->where('id_clase_bono','<>',6)
            ->get();

        foreach ($bonos_ as $key => $value) {
            $paciente = Paciente::where('id',$value->id_paciente)->first();
            $value->rut_paciente = $paciente->rut;
            $profesional = Profesional::where('id',$value->id_profesional)->first();
            $value->rut_profesional = $profesional->rut;
        }

        $bonosAgrupadosPorConvenio = $bonos_->groupBy('convenio');

        $bonos_rendidos_generados = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->where('estado_consulta',8)
            ->get();

        foreach ($bonos_rendidos_generados as $key => $value) {
            $paciente = Paciente::where('id',$value->id_paciente)->first();
            $value->rut_paciente = $paciente->rut;
            $profesional = Profesional::where('id',$value->id_profesional)->first();
            $value->rut_profesional = $profesional->rut;
        }

        // return view('page.flujo_cajas.profesional.flujo_caja')->with([
        return view('app.profesional.flujo_caja')->with([
            'bono' => $bonos,
            'bonos_programa' => $bonos_programa,
            'bonos_rendidos' => $bonos_rendidos,
            'bonos_rendidos_programa' => $bonos_rendidos_programa,
            'lista_asistente' => $lista_asistente,
            'lista_prevision' => $lista_prevision,
            'lista_estado_consulta' => $lista_estado_consulta,
            'lista_lugares_atencion_activos' => $lista_lugares_atencion_activos,
            'rendiciones' => $rendiciones,
            'bonos_fonasa' => $bonos_fonasa,
            'bonos_otros' => $bonos_otros,
            'bonos_agrupados_convenio' => $bonosAgrupadosPorConvenio,
            'bonos_rendidos_generados' => $bonos_rendidos_generados,
            'bonos_diarios' => $bonos_diarios
        ]);

    }

    public function home(){
        $prevision = Prevision::all();
        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        // buscamos las rendiciones de los bonos para el asistente
        $rendiciones = RendicionCaja::where('id_asistente_receptor',$asistente->id)
                    ->where('rendicion','0')
                    ->whereDate('fecha_rendicion', Carbon::now())
                    ->get();

        // Paso 1: Obtener bonos desde las rendiciones
        $ids_bonos_rendidos = [];

        foreach ($rendiciones as $rendicion) {
            $ids = explode('|', $rendicion->bonos); // separar por "|"
            $ids_bonos_rendidos = array_merge($ids_bonos_rendidos, $ids); // acumular
        }

        // Limpiar IDs vacíos y convertirlos a enteros
        $ids_bonos_rendidos = array_filter(array_map('intval', $ids_bonos_rendidos));

        // Paso 2: Buscar bonos por ID en base de datos
        $bonos_rendidos = Bono::whereIn('id', $ids_bonos_rendidos)->get();

        $id_lugar_atencion = array();
        $es_institucion = 0;
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $id_lugar_atencion = array($contrato->id_lugar_atencion);
            $es_institucion = 1;
        }
        else
        {
            $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_lugar_atencion')->toArray();
            if($asistentes_lugar_atencion)
            {
                $id_lugar_atencion = $asistentes_lugar_atencion;
            }
            else
            {
                /** no manejar por que se debe evaluar con jaime */
                $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                $id_lugar_atencion = array();
            }
        }



        if(!empty($id_lugar_atencion))
        {

             // Paso 3: Bonos del mes (no rendidos)
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');

            $bonos_dia = Bono::where($filtro)
                            ->whereDate('fecha_atencion', Carbon::now())
                            ->get();

            // Paso 4: Unir los dos conjuntos
            $bonos = $bonos_dia->merge($bonos_rendidos);

            // Paso 5 (opcional): Eliminar duplicados por ID
            $bonos = $bonos->unique('id')->values(); // 'values' para resetear índices

            foreach($bonos as $b){
                $responsable = Asistente::where('id',$b->id_asistente)->first();
                $b->responsable = $responsable->nombres.' '.$responsable->apellido_uno;
            }

            // echo json_encode($bonos);
            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_bonos_fisicos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $total_bono_institucional = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1){
                    $total_bonos++;
                    $total_bonos_fisicos++;
                }
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                else if($bono->id_clase_bono == 7)
                    $total_bono_institucional++;
                else
                    $total_otros++;

            }


            if($es_institucion)
            {

                $institucion = Instituciones::whereIn('id_lugar_atencion',$id_lugar_atencion)->first();

                $lista_asistente_lugar = AsistenteLugarAtencion::whereIn('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_asistente')->toArray();

                /** PERSONAL QUE RECIBE */
                /** ASISTENTE */
                $listado_recibe_a = Asistente::select('id', 'nombres', 'apellido_uno', 'apellido_dos')->whereIn('id_asistente_tipo', [1,2,3])
                                                ->whereIn('id', $lista_asistente_lugar)
                                                ->whereNotIn('id',[$asistente->id]);

                /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
                $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                    ->where('id_institucion', $institucion->id)
                                    ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->whereNotIn('id_empleado',[$asistente->id])
                                    ->union($listado_recibe_a)
                                    ->get();

                $institucion = Instituciones::whereIn('id_lugar_atencion',$id_lugar_atencion)->first();
                $lista_asistente_lugar = AsistenteLugarAtencion::whereIn('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_lugar_atencion')->toArray();

                /** PERSONAL QUE RECIBE */
                /** profesional */
                $lista_profesionales = ProfesionalesLugaresAtencion::whereIn('id_lugar_atencion', $lista_asistente_lugar)->pluck('id_profesional')->toArray();

                $profesionales = Profesional::whereIn('id', $lista_profesionales)->orderBy('apellido_uno', 'ASC')->get();
            }
            else
            {
                $listado_recibe = '';
                $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                if($asistentes_lugar_atencion)
                {
                    $profesionales = $listado_recibe = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos')->whereIn('id', $asistentes_lugar_atencion)->get();
                }
            }

            $bonos_profesionales = Bono::where($filtro)
                                    ->whereDay('fecha_atencion','<=', date('d'))
                                    ->whereMonth('fecha_atencion',  date('m'))
                                    ->whereYear('fecha_atencion', date('Y'))
                                    ->get();

            // return view('page.flujo_cajas.asistente_cm.home')->with([
            return view('app.general.asistente.flujo_caja.home')->with([
                'es_institucion' => $es_institucion,
                'asistente' => $asistente,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'bonos_profesionales' => $bonos_profesionales,
                'listado_recibe' => $listado_recibe,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
                'prevision' => $prevision,
                'listado_recibe_prof' => $profesionales,

            ]);
        }
        else
        {
            return back()->with('mensaje','Lugar de Atención no valido');
        }

    }

    public function pdfBonosDia(){
        $prevision = Prevision::all();
        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        // buscamos las rendiciones de los bonos para el asistente
        $rendiciones = RendicionCaja::where('id_asistente_receptor',$asistente->id)
        ->where('rendicion','0')
        ->whereDate('fecha_rendicion', Carbon::now())
        ->get();

        // Paso 1: Obtener bonos desde las rendiciones
        $ids_bonos_rendidos = [];

        foreach ($rendiciones as $rendicion) {
            $ids = explode('|', $rendicion->bonos); // separar por "|"
            $ids_bonos_rendidos = array_merge($ids_bonos_rendidos, $ids); // acumular
        }

        // Limpiar IDs vacíos y convertirlos a enteros
        $ids_bonos_rendidos = array_filter(array_map('intval', $ids_bonos_rendidos));

        // Paso 2: Buscar bonos por ID en base de datos
        $bonos_rendidos = Bono::whereIn('id', $ids_bonos_rendidos)->get();

        $id_lugar_atencion = array();
        $es_institucion = 0;
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();
        if($contrato)
        {
            $id_lugar_atencion = array($contrato->id_lugar_atencion);
            $es_institucion = 1;
        }
        else
        {
            $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_lugar_atencion')->toArray();
            if($asistentes_lugar_atencion)
            {
                $id_lugar_atencion = $asistentes_lugar_atencion;
            }
            else
            {
                /** no manejar por que se debe evaluar con jaime */
                $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                $id_lugar_atencion = array();
            }
        }

        if(!empty($id_lugar_atencion))
        {
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');
            // echo json_encode($filtro);

            /** rendicion a cm */
            /** bono  */

            $bonos_dia = Bono::where($filtro)
                            ->whereDate('fecha_atencion', Carbon::now())
                            ->get();

            // Paso 4: Unir los dos conjuntos
            $bonos = $bonos_dia->merge($bonos_rendidos);

            // Paso 5 (opcional): Eliminar duplicados por ID
            $bonos = $bonos->unique('id')->values(); // 'values' para resetear índices

            foreach($bonos as $b){
                $responsable = Asistente::where('id',$b->id_asistente)->first();
                $b->responsable = $responsable->nombres.' '.$responsable->apellido_uno;
            }

            // echo json_encode($bonos);
            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_bonos_fisicos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $total_bono_institucional = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1){
                    $total_bonos++;
                    $total_bonos_fisicos++;
                }
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                else if($bono->id_clase_bono == 7)
                    $total_bono_institucional++;
                else
                    $total_otros++;

            }
            $lugar_atencion = LugarAtencion::find($id_lugar_atencion[0]);

            // generamos el pdf
            $pdf = \PDF::loadView('app.general.asistente.flujo_caja.PDF.pdf_bonos_dia', [
                'bonos' => $bonos,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
                'prevision' => $prevision,
                'asistente' => $asistente,
                'lugar_atencion' => $lugar_atencion,
            ]);
            // Guardar el PDF en la carpeta public
            $fileName = 'rendicion_caja_' . $asistente->id . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);

        }
    }

    public function pdfBonosDiaProf($id){
        $profesional_agenda = Profesional::where('id',$id)->first();
        $prevision = Prevision::all();
        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        $id_lugar_atencion = array();
        $es_institucion = 0;
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();
        if($contrato)
        {
            $id_lugar_atencion = array($contrato->id_lugar_atencion);
            $es_institucion = 1;
        }
        else
        {
            $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_lugar_atencion')->toArray();
            if($asistentes_lugar_atencion)
            {
                $id_lugar_atencion = $asistentes_lugar_atencion;
            }
            else
            {
                /** no manejar por que se debe evaluar con jaime */
                $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                $id_lugar_atencion = array();
            }
        }

        if(!empty($id_lugar_atencion))
        {
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('id_profesional',$profesional_agenda->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');
            // echo json_encode($filtro);

            /** rendicion a cm */
            /** bono  */

            $bonos = Bono::where($filtro)
             ->whereDate('fecha_atencion', Carbon::now())
             ->get();

            // echo json_encode($bonos);
            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_bonos_fisicos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $total_bono_institucional = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1){
                    $total_bonos++;
                    $total_bonos_fisicos++;
                }
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                else if($bono->id_clase_bono == 7)
                    $total_bono_institucional++;
                else
                    $total_otros++;

            }
            $lugar_atencion = LugarAtencion::find($id_lugar_atencion[0]);

            // generamos el pdf
            $pdf = \PDF::loadView('app.general.asistente.flujo_caja.PDF.pdf_bonos_dia', [
                'bonos' => $bonos,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
                'prevision' => $prevision,
                'asistente' => $asistente,
                'lugar_atencion' => $lugar_atencion,
                'profesional_agenda' => $profesional_agenda,
            ]);
            // Guardar el PDF en la carpeta public
            $fileName = 'rendicion_caja_' . $asistente->id . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);

        }
    }

    public function dataFlujoCaja(Request $request)
    {
        $datos = array();

        $registro = '';
        $search_fecha = '';
        // $search_lugares = '';
        $search_asistente = '';
        $search_convenio = '';
        $search_estado_consulta = '';
        if(!empty($request->fecha))
            $search_fecha = $request->fecha;
        // if(!empty($request->lugares))
        //     $search_lugares = $request->lugares;
        if(!empty($request->asistente))
            $search_asistente = $request->asistente;
        if(!empty($request->convenio))
            $search_convenio = $request->convenio;
        if(!empty($request->estado_consulta))
            $search_estado_consulta = $request->estado_consulta;

        $filtro_user = array();
        // if(Auth::user()->hasRole('Admin'))
        // {
        //     $filtro = array();
        //     if(!empty($search_fecha))
        //         $filtro[] = array('fecha_atencion','like', $search_fecha.'%');
        //     if(!empty($search_asistente))
        //         $filtro[] = array('id_asistente',$search_asistente);
        //     if(!empty($search_convenio))
        //         $filtro[] = array('convenio',$search_convenio);
        //     if(!empty($search_estado_consulta))
        //         $filtro[] = array('estado_consulta',$search_estado_consulta);

        //     $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        //     $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        //     $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        //     // $registro = Bono::where(function($query) use($profesional, $paciente, $asistente) {
        //     //             $query->where('id_profesional',$profesional->id)
        //     //                 ->orWhere('id_paciente',$paciente->id)
        //     //                 ->orWhere('id_asistente',$asistente->id);
        //     //             })
        //     //             ->where('numero_sesiones','=','0')
        //     //             ->where('rendido','0')
        //     //             ->where($filtro)
        //     //             ->with(['TipoBono' => function($query){
        //     //                 $query->select('id','nombre');
        //     //             }])
        //     //             ->with(['Convenio' => function($query){
        //     //                 $query->select('id','nombre');
        //     //             }])
        //     //             ->with(['Paciente' => function($query){
        //     //                 $query->select('id','nombres', 'apellido_uno', 'apellido_dos', 'rut');
        //     //             }])
        //     //             ->with(['Parametro' => function($query){
        //     //                 $query->select('id','valor');
        //     //             }])
        //     //             ->with(['Profesional' => function($query){
        //     //                 $query->select('id','nombre', 'apellido_uno', 'apellido_dos');
        //     //             }])
        //     //             ->get();
        //         $registro = Bono::filtroRelacion($profesional, $paciente, $asistente)
        //                 ->where('numero_sesiones','=','0')
        //                 ->where('rendido','0')
        //                 ->where($filtro)
        //                 ->with(['TipoBono' => function($query){
        //                     $query->select('id','nombre');
        //                 }])
        //                 ->with(['Convenio' => function($query){
        //                     $query->select('id','nombre');
        //                 }])
        //                 ->with(['Paciente' => function($query){
        //                     $query->select('id','nombres', 'apellido_uno', 'apellido_dos', 'rut');
        //                 }])
        //                 ->with(['Parametro' => function($query){
        //                     $query->select('id','valor');
        //                 }])
        //                 ->with(['Profesional' => function($query){
        //                     $query->select('id','nombre', 'apellido_uno', 'apellido_dos');
        //                 }])
        //                 ->get();

        // }
        // else
        if(Auth::user()->hasRole('Paciente'))
        {
            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $filtro_user[] = array('id_paciente',$paciente->id);
        }
        else if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro_user[] = array('id_profesional',$profesional->id);
        }
        else if(Auth::user()->hasRole('Asistente'))
        {
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $filtro_user[] = array('id_asistente',$asistente->id);
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro_user[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro_user[] = array();
        }

        if(!$registro)
        {
            $filtro = array();
            if(!empty($search_fecha))
                $filtro[] = array('fecha_atencion','like', $search_fecha.'%');
            // if(!empty($search_lugares))
            //     $filtro[] = array('fecha_atencion', $search_lugares);
            if(!empty($search_asistente))
                $filtro[] = array('id_asistente',$search_asistente);
            if(!empty($search_convenio))
                $filtro[] = array('convenio',$search_convenio);
            if(!empty($search_estado_consulta))
                $filtro[] = array('estado_consulta',$search_estado_consulta);

                $registro = Bono::where($filtro_user)
                ->where('numero_sesiones','=','0')
                ->where($filtro)
                ->with(['TipoBono' => function($query){
                    $query->select('id','nombre');
                }])
                ->with(['Convenio' => function($query){
                    $query->select('id','nombre');
                }])
                ->with(['Paciente' => function($query){
                    $query->select('id','nombres', 'apellido_uno', 'apellido_dos', 'rut');
                }])
                ->with(['Parametro' => function($query){
                    $query->select('id','valor');
                }])
                ->with(['Profesional' => function($query){
                    $query->select('id','nombre', 'apellido_uno', 'apellido_dos');
                }])
                // ->with(['Asistente' => function($query){
                //     $query->select('id','nombres', 'apellido_uno', 'apellido_dos');
                // }])
                ->get();
        }


        if($registro){

            foreach ($registro as $key => $value) {
                $asistente = array( 'id' => '',
                                    'nombres' => '',
                                    'apellido_uno' => '',
                                    'apellido_dos' => ''
                                );
                if(!empty($value->id_asistente))
                {
                    $asistente_temp = Asistente::select('id','nombres', 'apellido_uno', 'apellido_dos')->find($value->id_asistente);
                    if($asistente_temp)
                        $asistente = $asistente_temp;
                }
                $registro[$key]->asistente = $asistente;
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registro;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    public function dataFlujoCajaPrograma(Request $request)
    {
        $lista_asistente = Asistente::all();
        $lista_prevision = Prevision::all();
        $lista_estado_consulta = Parametro::where('referencia','Agenda_Estado')->get();

        $fecha = '';
        $asistente = '';
        $convenio = '';
        $estado_consulta = '';
        if(!empty($request->fecha))
            $fecha = $request->fecha;
        if(!empty($request->asistente))
            $asistente = $request->asistente;
        if(!empty($request->convenio))
            $convenio = $request->convenio;
        if(!empty($request->estado_consulta))
            $estado_consulta = $request->estado_consulta;

        if(Auth::user()->hasRole('Admin'))
        {
            $filtro = array();
            $filtro[] = array('fecha_atencion',$fecha);
            $filtro[] = array('id_asistente',$asistente);
            $filtro[] = array('convenio',$convenio);
            $filtro[] = array('estado_consulta',$estado_consulta);

            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

            // $filtro[] = array('id_paciente',$paciente->id);
            // $filtro[] = array('id_profesional',$profesional->id);
            // $filtro[] = array('id_asistente',$asistente->id);
            $bonos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();


            return view('app.general.flujo_caja.flujo_caja')->with([
                'bono' => $bonos,
                'bonos_programa' => $bonos_programa,
                'bonos_rendidos' => $bonos_rendidos,
                'bonos_rendidos_programa' => $bonos_rendidos_programa,
                'lista_asistente' => $lista_asistente,
                'lista_prevision' => $lista_prevision,
                'lista_estado_consulta' => $lista_estado_consulta,
            ]);

        }
        else if(Auth::user()->hasRole('Paciente'))
        {
            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_paciente',$paciente->id);
        }
        else if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
        }
        else if(Auth::user()->hasRole('Asistente'))
        {
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_asistente',$asistente->id);
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }

        $bonos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->get();
        $bonos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->get();
        $bonos_rendidos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->get();
        $bonos_rendidos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->where('rendido','1')
            ->get();

        return view('app.general.flujo_caja.flujo_caja')->with([
            'bono' => $bonos,
            'bonos_programa' => $bonos_programa,
            'bonos_rendidos' => $bonos_rendidos,
            'bonos_rendidos_programa' => $bonos_rendidos_programa,
            'lista_asistente' => $lista_asistente,
            'lista_prevision' => $lista_prevision,
            'lista_estado_consulta' => $lista_estado_consulta,
        ]);
    }

    public function dataFlujoCajaRendidos(Request $request)
    {
        $lista_asistente = Asistente::all();
        $lista_prevision = Prevision::all();
        $lista_estado_consulta = Parametro::where('referencia','Agenda_Estado')->get();

        $fecha = '';
        $asistente = '';
        $convenio = '';
        $estado_consulta = '';
        if(!empty($request->fecha))
            $fecha = $request->fecha;
        if(!empty($request->asistente))
            $asistente = $request->asistente;
        if(!empty($request->convenio))
            $convenio = $request->convenio;
        if(!empty($request->estado_consulta))
            $estado_consulta = $request->estado_consulta;

        if(Auth::user()->hasRole('Admin'))
        {
            $filtro = array();
            $filtro[] = array('fecha_atencion',$fecha);
            $filtro[] = array('id_asistente',$asistente);
            $filtro[] = array('convenio',$convenio);
            $filtro[] = array('estado_consulta',$estado_consulta);

            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

            // $filtro[] = array('id_paciente',$paciente->id);
            // $filtro[] = array('id_profesional',$profesional->id);
            // $filtro[] = array('id_asistente',$asistente->id);
            $bonos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();

            $bonos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();

            $bonos_rendidos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();

            $bonos_rendidos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();


            return view('app.general.flujo_caja.flujo_caja')->with([
                'bono' => $bonos,
                'bonos_programa' => $bonos_programa,
                'bonos_rendidos' => $bonos_rendidos,
                'bonos_rendidos_programa' => $bonos_rendidos_programa,
                'lista_asistente' => $lista_asistente,
                'lista_prevision' => $lista_prevision,
                'lista_estado_consulta' => $lista_estado_consulta,
            ]);

        }
        else if(Auth::user()->hasRole('Paciente'))
        {
            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_paciente',$paciente->id);
        }
        else if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
        }
        else if(Auth::user()->hasRole('Asistente'))
        {
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_asistente',$asistente->id);
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }

        $bonos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->get();
        $bonos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->get();
        $bonos_rendidos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->get();
        $bonos_rendidos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->where('rendido','1')
            ->get();

        return view('app.general.flujo_caja.flujo_caja')->with([
            'bono' => $bonos,
            'bonos_programa' => $bonos_programa,
            'bonos_rendidos' => $bonos_rendidos,
            'bonos_rendidos_programa' => $bonos_rendidos_programa,
            'lista_asistente' => $lista_asistente,
            'lista_prevision' => $lista_prevision,
            'lista_estado_consulta' => $lista_estado_consulta,
        ]);
    }

    public function dataFlujoCajaRendidosProgramas(Request $request)
    {
        $lista_asistente = Asistente::all();
        $lista_prevision = Prevision::all();
        $lista_estado_consulta = Parametro::where('referencia','Agenda_Estado')->get();

        $fecha = '';
        $asistente = '';
        $convenio = '';
        $estado_consulta = '';
        if(!empty($request->fecha))
            $fecha = $request->fecha;
        if(!empty($request->asistente))
            $asistente = $request->asistente;
        if(!empty($request->convenio))
            $convenio = $request->convenio;
        if(!empty($request->estado_consulta))
            $estado_consulta = $request->estado_consulta;

        if(Auth::user()->hasRole('Admin'))
        {
            $filtro = array();
            $filtro[] = array('fecha_atencion',$fecha);
            $filtro[] = array('id_asistente',$asistente);
            $filtro[] = array('convenio',$convenio);
            $filtro[] = array('estado_consulta',$estado_consulta);

            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

            $bonos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','0')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','=','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();
            $bonos_rendidos_programa = Bono::filtroRelacion($profesional, $paciente, $asistente)
                        ->where('numero_sesiones','>','0')
                        ->where('rendido','1')
                        ->where($filtro)
                        ->get();


            return view('app.general.flujo_caja.flujo_caja')->with([
                'bono' => $bonos,
                'bonos_programa' => $bonos_programa,
                'bonos_rendidos' => $bonos_rendidos,
                'bonos_rendidos_programa' => $bonos_rendidos_programa,
                'lista_asistente' => $lista_asistente,
                'lista_prevision' => $lista_prevision,
                'lista_estado_consulta' => $lista_estado_consulta,
            ]);

        }
        else if(Auth::user()->hasRole('Paciente'))
        {
            $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_paciente',$paciente->id);
        }
        else if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
        }
        else if(Auth::user()->hasRole('Asistente'))
        {
            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_asistente',$asistente->id);
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
        }

        $bonos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->get();
        $bonos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->get();
        $bonos_rendidos = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->get();
        $bonos_rendidos_programa = Bono::where($filtro)
            ->where('numero_sesiones','>','0')
            ->where('rendido','1')
            ->get();

        return view('app.general.flujo_caja.flujo_caja')->with([
            'bono' => $bonos,
            'bonos_programa' => $bonos_programa,
            'bonos_rendidos' => $bonos_rendidos,
            'bonos_rendidos_programa' => $bonos_rendidos_programa,
            'lista_asistente' => $lista_asistente,
            'lista_prevision' => $lista_prevision,
            'lista_estado_consulta' => $lista_estado_consulta,
        ]);
    }

    /** Asistentes CM*/
    public function rendirCajaDiaria(Request $request)
    {
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');


            // echo json_encode($filtro);

            /** rendicion a cm */
            /** bono  */
            $bonos = Bono::where($filtro)
                ->whereDay('fecha_atencion','<=', date('d'))
                ->whereMonth('fecha_atencion',  date('m'))
                ->whereYear('fecha_atencion', date('Y'))
                ->get();

            // echo json_encode($bonos);
            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1)
                    $total_bonos++;
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                else
                    $total_otros++;

            }

            $institucion = Instituciones::where('id_lugar_atencion',$id_lugar_atencion)->first();
            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_asistente')->toArray();

            /** PERSONAL QUE RECIBE */
            /** ASISTENTE */
            $listado_recibe_a = Asistente::select('id', 'nombres', 'apellido_uno', 'apellido_dos')->whereIn('id_asistente_tipo', [2,3])
                                            ->whereIn('id', $lista_asistente_lugar)
                                            ->whereNotIn('id',[$asistente->id]);
            /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
            $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                ->where('id_institucion', $institucion->id)
                                ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                ->whereNotIn('id_empleado',[$asistente->id])
                                ->union($listado_recibe_a)
                                ->get();



            $institucion = Instituciones::where('id_lugar_atencion',$id_lugar_atencion)->first();
            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_lugar_atencion')->toArray();

            /** PERSONAL QUE RECIBE */
            /** profesional */
            $lista_profesionales = ProfesionalesLugaresAtencion::whereIn('id_lugar_atencion', $lista_asistente_lugar)->pluck('id_profesional')->toArray();

            $profesionales = Profesional::whereIn('id', $lista_profesionales)->orderBy('apellido_uno', 'ASC')->get();

            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');

            $bonos_profesionales = Bono::where($filtro)
                                    ->whereDay('fecha_atencion','<=', date('d'))
                                    ->whereMonth('fecha_atencion',  date('m'))
                                    ->whereYear('fecha_atencion', date('Y'))
                                    ->get();

            $prevision = Prevision::all();

            return view('app.asistente_cm_publico.flujo_caja')->with([
                'asistente' => $asistente,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'listado_recibe' => $listado_recibe,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,

                'listado_recibe_prof' => $profesionales,

                'bonos_profesionales' => $bonos_profesionales,

                'prevision' => $prevision,

            ]);
        }
        else
        {
            return back()->with('mensaje','Contrato no encontrado');
        }
    }

    /** Asistentes CM Manejo de Agenda*/
    public function rendirCajaDiariaMa(Request $request)
    {
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');


            // echo json_encode($filtro);

            /** rendicion a cm */
            /** bono  */
            $bonos = Bono::where($filtro)
                ->whereDay('fecha_atencion','<=', date('d'))
                ->whereMonth('fecha_atencion',  date('m'))
                ->whereYear('fecha_atencion', date('Y'))
                ->get();

            // echo json_encode($bonos);
            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1)
                    $total_bonos++;
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                else
                    $total_otros++;

            }

            $institucion = Instituciones::where('id_lugar_atencion',$id_lugar_atencion)->first();
            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_asistente')->toArray();

            /** PERSONAL QUE RECIBE */
            /** ASISTENTE */
            $listado_recibe_a = Asistente::select('id', 'nombres', 'apellido_uno', 'apellido_dos')->whereIn('id_asistente_tipo', [2,3])
                                            ->whereIn('id', $lista_asistente_lugar)
                                            ->whereNotIn('id',[$asistente->id]);
            /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
            $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                ->where('id_institucion', $institucion->id)
                                ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                ->whereNotIn('id_empleado',[$asistente->id])
                                ->union($listado_recibe_a)
                                ->get();



            $institucion = Instituciones::where('id_lugar_atencion',$id_lugar_atencion)->first();
            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_lugar_atencion')->toArray();

            /** PERSONAL QUE RECIBE */
            /** profesional */
            $lista_profesionales = ProfesionalesLugaresAtencion::whereIn('id_lugar_atencion', $lista_asistente_lugar)->pluck('id_profesional')->toArray();

            $profesionales = Profesional::whereIn('id', $lista_profesionales)->orderBy('apellido_uno', 'ASC')->get();

            return view('app.asistente_cm_manejo_agenda.flujo_caja')->with([
                'asistente' => $asistente,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'listado_recibe' => $listado_recibe,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,

                'listado_recibe_prof' => $profesionales,

            ]);
        }
        else
        {
            return back()->with('mensaje','Contrato no encontrado');
        }
    }

    /** Asistente CM JEFA */
    public function rendirCajaDiariaJefe(Request $request)
    {
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','0');

            /** bono  */
            $bonos = Bono::where($filtro)
                // ->where('numero_sesiones','=','0')
                // ->where('rendido','0')
                // ->where('id_asistente', $asistente->id)
                ->whereDay('fecha_atencion','<=', date('d'))
                ->whereMonth('fecha_atencion',  date('m'))
                ->whereYear('fecha_atencion', date('Y'))
                ->get();

            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_copago = 0;
            $total_otros = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1)
                    $total_bonos++;
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                // 7->copago
                else if($bono->id_clase_bono == 7)
                    $total_copago += $bono->valor_atencion;
                else
                    $total_otros++;

            }

            $institucion = Instituciones::where('id_lugar_atencion',$id_lugar_atencion)->first();
            $lista_asistente_lugar = AsistenteLugarAtencion::where('id_lugar_atencion',$id_lugar_atencion)->where('id_institucion',$institucion->id)->pluck('id_asistente')->toArray();

            /** PERSONAL QUE RECIBE */
            /** ASISTENTE */
            $listado_recibe_a = Asistente::select('id', 'nombres', 'apellido_uno', 'apellido_dos')->whereIn('id_asistente_tipo', [2,3])
                                            ->whereIn('id', $lista_asistente_lugar)
                                            ->whereNotIn('id',[$asistente->id]);
            /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
            $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                ->where('id_institucion', $institucion->id)
                                ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                ->whereNotIn('id_empleado',[$asistente->id])
                                ->union($listado_recibe_a)
                                ->get();


            /** RENDICION */
            $rendiciones = RendicionCaja::where('id_asistente_receptor', $asistente->id)->where('rendicion','0')->where('estado',2)->get();

            $total_rendiciones = 0;
            $total_documentos_rendiciones = 0;
            $total_bonos_rendiciones = 0;
            $total_efectivo_rendicion = 0;
            $total_copago_rendicion = 0;
            $total_otros_rendicion = 0;
            $total_archivos_rendicion = 0;
            $lista_rendiciones = array();

            if($rendiciones)
            {
                foreach ($rendiciones as $rendicion)
                {
                    $lista_rendiciones[] = $rendicion->id;

                    $total_rendiciones++;
                    $total_documentos_rendiciones += $rendicion->total_documentos;
                    $total_bonos_rendiciones += $rendicion->total_bono;
                    $total_efectivo_rendicion += $rendicion->total_efectivo;
                    $total_copago_rendicion += $rendicion->total_copago;
                    $total_otros_rendicion += $rendicion->total_otros;

                    if(!empty($rendicion->archivos))
                    {
                        $archivos_array  = explode('|',$rendicion->archivos);
                        $total_archivos_rendicion += count($archivos_array);
                        $rendicion->cantidad_archivos = count($archivos_array);
                    }
                    else
                    {
                        $rendicion->cantidad_archivos = 0;
                    }
                }
            }

            return view('app.asistente_cm.flujo_caja')->with([
                'asistente' => $asistente,
                'lista_bonos' => implode('|',$lista_bonos),
                'bono' => $bonos,
                'listado_recibe' => $listado_recibe,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_copago' => $total_copago,
                'total_otros' => $total_otros,
                'rendiciones' => $rendiciones,
                'total_rendiciones' => $total_rendiciones,
                'total_documentos_rendiciones' => $total_documentos_rendiciones,
                'total_bonos_rendiciones' => $total_bonos_rendiciones,
                'total_efectivo_rendicion' => $total_efectivo_rendicion,
                'total_copago_rendicion' => $total_copago_rendicion,
                'total_otros_rendicion' => $total_otros_rendicion,
                'lista_rendiciones' => implode('|',$lista_rendiciones),
                // 'bonos_programa' => $bonos_programa,
            ]);
        }
        else
        {
            return back()->with('mensaje','Contrato no encontrado');
        }
    }

    public function cargaBonosAsistenteDia(Request $request)
    {
        try {
            $id_lugar_atencion = array();
            $es_institucion = 0;

            $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
            $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

            // buscamos las rendiciones de los bonos para el asistente
            $rendiciones = RendicionCaja::where('id_asistente_receptor',$asistente->id)
            ->where('rendicion','0')
            ->whereDate('fecha_rendicion', Carbon::now())
            ->where('id_profesional_receptor',$request->id_profesional)
            ->get();

            // Paso 1: Obtener bonos desde las rendiciones
            $ids_bonos_rendidos = [];

            foreach ($rendiciones as $rendicion) {
                $ids = explode('|', $rendicion->bonos); // separar por "|"
                $ids_bonos_rendidos = array_merge($ids_bonos_rendidos, $ids); // acumular
            }

            // Limpiar IDs vacíos y convertirlos a enteros
            $ids_bonos_rendidos = array_filter(array_map('intval', $ids_bonos_rendidos));

            // Paso 2: Buscar bonos por ID en base de datos
            $bonos_rendidos = Bono::whereIn('id', $ids_bonos_rendidos)->get();

            if($contrato)
            {
                $id_lugar_atencion = array($contrato->id_lugar_atencion);
                $es_institucion = 1;
            }
            else
            {
                $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_lugar_atencion')->toArray();
                if($asistentes_lugar_atencion)
                {
                    $id_lugar_atencion = $asistentes_lugar_atencion;
                }
                else
                {
                    /** no manejar por que se debe evaluar con jaime */
                    // $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                    $id_lugar_atencion = array();
                }
            }



            if(!empty($id_lugar_atencion))
            // if($contrato)
            {
                $filtro = array();
                $filtro[] = array('id_asistente',$asistente->id);
                $filtro[] = array('numero_sesiones','=','0');
                $filtro[] = array('rendido','0');


                if(!empty($request->id_profesional))
                    $filtro[] = array('id_profesional',$request->id_profesional);

                /** rendicion a cm */
                /** bono  */
                // $bonos_dia = Bono::where($filtro)
                //     ->whereDate('fecha_atencion', Carbon::today())
                //     ->with(['TipoBono' => function($query){
                //         $query->select('id', 'nombre');
                //     }])
                //     ->with(['Convenio' => function($query){
                //         $query->select('id', 'nombre');
                //     }])
                //     ->with(['Paciente' => function($query){
                //         $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'rut');
                //     }])
                //     ->with(['Profesional' => function($query){
                //         $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut');
                //     }])
                //     ->get();
                $bonos_dia = Bono::where($filtro)
                            ->whereDate('fecha_atencion', Carbon::now())
                            ->get();
                // Paso 4: Unir los dos conjuntos
                $bonos = $bonos_dia->merge($bonos_rendidos);

                // Paso 5 (opcional): Eliminar duplicados por ID
                $bonos = $bonos->unique('id')->values(); // 'values' para resetear índices

                foreach($bonos as $b){
                    $responsable = Asistente::where('id',$b->id_asistente)->first();
                    $b->responsable = $responsable->nombres.' '.$responsable->apellido_uno;
                    $b->convenio = Prevision::where('id',$b->id_clase_bono)->first();
                    $b->tipo_bono = TipoBono::where('id',$b->id_tipo_bono)->first();
                    $b->paciente = Paciente::where('id',$b->id_paciente)->first();
                    $b->profesional = Profesional::where('id',$b->id_profesional)->first();
                }


                // var_dump($bonos);
                /** programa */
                // $bonos_programa = Bono::where($filtro)
                //     ->where('numero_sesiones','>','0')
                //     ->where('rendido','0')
                //     ->get();

                $total = 0;
                $total_bonos = 0;
                $total_efectivo = 0;
                $total_otros = 0;
                $lista_bonos = array();

                foreach ($bonos as $bono){
                    $lista_bonos[] = $bono->id;

                    $total++;
                    // 1->Bono Fisico
                    if($bono->id_clase_bono == 1)
                        $total_bonos++;
                    // 2->Sencillito
                    else if($bono->id_clase_bono == 2)
                        $total_bonos++;
                    // 3->Caja Vecina
                    else if($bono->id_clase_bono == 3)
                        $total_bonos++;
                    // 4->Bono Web
                    else if($bono->id_clase_bono == 4)
                        $total_bonos++;
                    // 5->Bono Web Pre-Pago
                    else if($bono->id_clase_bono == 5)
                        $total_bonos++;
                    // 6->Particular
                    else if($bono->id_clase_bono == 6)
                        $total_efectivo += $bono->valor_atencion;
                    else
                        $total_otros++;

                }

                return array(
                    'estado' => 1,
                    'lista_bonos' => implode('|',$lista_bonos),
                    'bono' => $bonos,
                    'total' => $total,
                    'total_bonos' => $total_bonos,
                    'total_efectivo' => $total_efectivo,
                    'total_otros' => $total_otros,
                );
            }
            else
            {
                // return back()->with('mensaje','Contrato no encontrado');
                return array(
                    'estado' => 0,
                    'msj' => 'sin contrato',

                );
            }
        } catch (Exception $th) {
            return $th->getMessage();
        }

    }

    public function rendicionDetalle(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro_rendicion = RendicionCaja::find($request->id_rendicion);
            $info_bonos = array();
            if($registro_rendicion)
            {
                $bonos = $registro_rendicion->bonos;
                if(!empty($bonos))
                {
                    $bonos_array = explode('|',$bonos);
                    foreach ($bonos_array as $key => $value)
                    {
                        $registro_bono = Bono::with('TipoBono')
                                                ->with(['Convenio' => function($query){
                                                    $query->select('id', 'nombre');
                                                }])
                                                ->with(['Paciente' => function($query){
                                                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'rut', 'telefono_uno', 'email');
                                                }])
                                                ->with(['Parametro' => function($query){
                                                    $query->select('id', 'valor', 'color');
                                                }])
                                                ->with(['Profesional' => function($query){
                                                    $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut', 'telefono_uno', 'email', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                                                            ->with(['Especialidad' => function($query){
                                                                $query->select('id', 'nombre');
                                                            }])
                                                            ->with(['TipoEspecialidad' => function($query){
                                                                $query->select('id', 'nombre');
                                                            }])
                                                            ->with(['SubTipoEspecialidad' => function($query){
                                                                $query->select('id', 'nombre');
                                                            }]);
                                                }])
                                                ->find($value);
                        if($registro_bono)
                        {
                            // $info_bonos[$key]['estado'] = 0;
                            // $info_bonos[$key]['msj'] = 'registro';
                            // $info_bonos[$key]['registro'] = $registro_bono;
                            $info_bonos[$key] = $registro_bono;
                        }
                        else
                        {
                            $info_bonos[$key]['estado'] = 0;
                            $info_bonos[$key]['msj'] = 'sin registro';
                            $info_bonos[$key]['registro'] = '';
                        }
                    }
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registros';
                    $datos['registros'] = $info_bonos;
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Rendicion sin bonos registrados';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Rendicion no encontrada';
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

    public function rendicionDetalleArchivos(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro_rendicion = RendicionCaja::find($request->id_rendicion);

            if($registro_rendicion)
            {
                $archivos = $registro_rendicion->archivos;
                if(!empty($archivos))
                {
                    $datos['estado'] = 1;
                    $archivos_array = explode('|', $archivos);
                    foreach ($archivos_array as $key => $value)
                    {
                        $url_temp = Storage::disk('archivo_archivo')->url($value);
                        $datos['registro'][] = (object)array(
                            'nombre' => $value,
                            'url' => $url_temp,
                        );
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Sin archivos a visualizar';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Rendicion no encontrada';
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

    public function historicoCajaDiaria(Request $request)
    {

    }

    /** Asistente Jefe | Asistente Administrativa */
    public function recibirCaja(Request $request)
    {

    }

    public function cargaRendicionesAsistenteDia(Request $request)
    {
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();

        if($contrato)
        {
            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);

            /** rendiciones  */
            $rendiciones = RendicionCaja::where('id_asistente_receptor', $asistente->id)
                                ->with(['Asistente' => function($query){
                                    $query->select('id','nombres','apellido_uno','apellido_dos', 'rut');
                                }])
                                ->with(['AsistenteReceptor' => function($query){
                                    $query->select('id','nombres','apellido_uno','apellido_dos', 'rut');
                                }])
                                ->where('rendicion','0')
                                ->where('estado',2)
                                ->get();

            $total_rendiciones = 0;
            $total_documentos_rendiciones = 0;
            $total_bonos_rendiciones = 0;
            $total_efectivo_rendicion = 0;
            $total_otros_rendicion = 0;
            $total_archivos_rendicion = 0;
            $lista_rendiciones = array();

            if($rendiciones)
            {
                foreach ($rendiciones as $rendicion){
                    $lista_rendiciones[] = $rendicion->id;

                    $total_rendiciones++;
                    $total_documentos_rendiciones += $rendicion->total_documentos;
                    $total_bonos_rendiciones += $rendicion->total_bono;
                    $total_efectivo_rendicion += $rendicion->total_efectivo;
                    $total_otros_rendicion += $rendicion->total_otros;

                    if(!empty($rendicion->archivos))
                    {
                        $archivos_array  = explode('|',$rendicion->archivos);
                        $total_archivos_rendicion += count($archivos_array);
                        $rendicion->cantidad_archivos = count($archivos_array);
                    }
                    else
                    {
                        $rendicion->cantidad_archivos = 0;
                    }
                }
            }


            return array(
                'estado' => 1,
                'lista_rendiciones' => implode('|',$lista_rendiciones),
                'total_rendiciones' => $total_rendiciones,
                'total_documentos' => $total_documentos_rendiciones,
                'total_bonos' => $total_bonos_rendiciones,
                'total_efectivo' => $total_efectivo_rendicion,
                'total_otros' => $total_otros_rendicion,
                'rendiciones' => $rendiciones,
            );
        }
        else
        {
            return back()->with('mensaje','Contrato no encontrado');
        }
    }


    public function cargaRendicionCmAdm(Request $request)
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


        if($institucion)
        {
             /** RENDICION */
             $rendiciones = RendicionCaja::where('id_asistente_receptor', $responsable->id)
                                    ->where('rendicion','0')
                                    ->where('estado',2)
                                    ->get();

             $total_rendiciones = 0;
             $total_documentos_rendiciones = 0;
             $total_bonos_rendiciones = 0;
             $total_efectivo_rendicion = 0;
             $total_copago_rendicion = 0;
             $total_otros_rendicion = 0;
             $total_archivos_rendicion = 0;
             $lista_rendiciones = array();

             if($rendiciones)
             {
                 foreach ($rendiciones as $rendicion)
                 {
                     $lista_rendiciones[] = $rendicion->id;

                     $total_rendiciones++;
                     $total_documentos_rendiciones += $rendicion->total_documentos;
                     $total_bonos_rendiciones += $rendicion->total_bono;
                     $total_efectivo_rendicion += $rendicion->total_efectivo;
                     $total_copago_rendicion += $rendicion->total_copago;
                     $total_otros_rendicion += $rendicion->total_otros;

                     if(!empty($rendicion->archivos))
                     {
                         $archivos_array  = explode('|',$rendicion->archivos);
                         $total_archivos_rendicion += count($archivos_array);
                         $rendicion->cantidad_archivos = count($archivos_array);
                     }
                     else
                     {
                         $rendicion->cantidad_archivos = 0;
                     }
                 }
             }

            /** PERSONAL QUE RECIBE */
            /** ADMINISTRADOR CENTRO, ADMINISTRADOR COMERCIAL */
            $listado_recibe = ContratoDependiente::select('id_empleado as id', 'nombres', 'apellido_uno', 'apellido_dos')
                                ->where('id_institucion', $institucion->id)
                                ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                ->whereNotIn('id_empleado',[$responsable->id])
                                ->get();
            // var_dump($listado_recibe);

             return view('app.adm_cm.flujo_caja')->with([
                /** informacion de rendiciones */
                'listado_recibe' => $listado_recibe,
                'rendiciones' => $rendiciones,
                'total_rendiciones' => $total_rendiciones,
                'total_documentos_rendiciones' => $total_documentos_rendiciones,
                'total_bonos_rendiciones' => $total_bonos_rendiciones,
                'total_efectivo_rendicion' => $total_efectivo_rendicion,
                'total_copago_rendicion' => $total_copago_rendicion,
                'total_otros_rendicion' => $total_otros_rendicion,
                'lista_rendiciones' => implode('|',$lista_rendiciones),
             ]);
        }
        else
        {
            return back()->with('error', 'no se encontro institucion asociada');
        }
    }


    public function cajaProfesional(){
        return view('page.flujo_cajas.profesional.flujo_caja');
    }

    public function recepcionRendicion(){
        $asistente = Asistente::where('id_usuario',Auth::user()->id)->first();

        $rendiciones = RendicionCaja::select('rendicion_caja.*','asistentes.nombres','asistentes.apellido_uno','asistentes.apellido_dos')
            ->join('asistentes','asistentes.id','=','rendicion_caja.id_asistente')
            ->where('rendicion_caja.id_asistente_receptor',$asistente->id)
            ->get();
        return view('page.flujo_cajas.profesional.recepcion_rendicion',[
            'rendiciones' => $rendiciones
        ]);
    }

    public function dameRendicion($id){
        $rendicion = RendicionCaja::select('rendicion_caja.*','asistentes.nombres','asistentes.apellido_uno','asistentes.apellido_dos')
                                        ->join('asistentes','asistentes.id','=','rendicion_caja.id_asistente')
                                        ->where('rendicion_caja.id',$id)
                                        ->first();
        $archivos = explode('|',$rendicion->archivos);
        return view('app.profesional.dame_rendicion',[
            'rendicion' => $rendicion,
            'archivos' => $archivos
        ]);
    }

    public function dameRendicionPdf($id, $id_asistente){
        $rendicion = RendicionCaja::select('rendicion_caja.*','asistentes.nombres','asistentes.apellido_uno','asistentes.apellido_dos')
                                        ->join('asistentes','asistentes.id','=','rendicion_caja.id_asistente')
                                        ->where('rendicion_caja.id',$id)
                                        ->first();

        $ids_bonos = explode('|', $rendicion->bonos); // Convierte "12|15|19" → [12, 15, 19]

        $asistente = Asistente::where('id',$id_asistente)->first();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $id_lugar_atencion = array();
        $es_institucion = 0;
        $contrato = ContratoDependiente::where('id_empleado',$asistente->id)->first();
        if($contrato)
        {
            $id_lugar_atencion = array($contrato->id_lugar_atencion);
            $es_institucion = 1;
        }
        else
        {
            $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->pluck('id_lugar_atencion')->toArray();
            if($asistentes_lugar_atencion)
            {
                $id_lugar_atencion = $asistentes_lugar_atencion;
            }
            else
            {
                /** no manejar por que se debe evaluar con jaime */
                $profesionales_asistentes = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
                $id_lugar_atencion = array();
            }
        }

        if(!empty($id_lugar_atencion))
        {

            $filtro = array();
            $filtro[] = array('id_asistente',$asistente->id);
            $filtro[] = array('id_profesional',$profesional->id);
            $filtro[] = array('numero_sesiones','=','0');
            $filtro[] = array('rendido','1');
            // echo json_encode($filtro);
            $fecha = Carbon::parse($rendicion->fecha_rendicion)->toDateString(); // "2024-05-09"
            /** rendicion a cm */
            /** bono  */

            // $bonos = Bono::where($filtro)
            //  ->whereDate('fecha_atencion', $fecha)
            //  ->get();

            $bonos = Bono::whereIn('id', $ids_bonos)
             ->where('rendido', 1)
             ->get();

             if($bonos->isEmpty()) {
                $bonos = Bono::whereIn('id', $ids_bonos)
                ->where('rendido', 0)
                ->get();
            }

            // echo json_encode($bonos);
            /** programa */
            // $bonos_programa = Bono::where($filtro)
            //     ->where('numero_sesiones','>','0')
            //     ->where('rendido','0')
            //     ->get();

            $total = 0;
            $total_bonos = 0;
            $total_bonos_fisicos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $total_bono_institucional = 0;
            $lista_bonos = array();

            foreach ($bonos as $bono){
                $lista_bonos[] = $bono->id;

                $total++;
                // 1->Bono Fisico
                if($bono->id_clase_bono == 1){
                    $total_bonos++;
                    $total_bonos_fisicos++;
                }
                // 2->Sencillito
                else if($bono->id_clase_bono == 2)
                    $total_bonos++;
                // 3->Caja Vecina
                else if($bono->id_clase_bono == 3)
                    $total_bonos++;
                // 4->Bono Web
                else if($bono->id_clase_bono == 4)
                    $total_bonos++;
                // 5->Bono Web Pre-Pago
                else if($bono->id_clase_bono == 5)
                    $total_bonos++;
                // 6->Particular
                else if($bono->id_clase_bono == 6)
                    $total_efectivo += $bono->valor_atencion;
                else if($bono->id_clase_bono == 7)
                    $total_bono_institucional++;
                else
                    $total_otros++;

            }
            $lugar_atencion = LugarAtencion::find($id_lugar_atencion[0]);

            // generamos el pdf
            $pdf = \PDF::loadView('app.general.asistente.flujo_caja.PDF.pdf_bonos_dia', [
                'bonos' => $bonos,
                'fecha_rendicion' => $rendicion->fecha_rendicion,
                'total' => $total,
                'total_bonos' => $total_bonos,
                'total_efectivo' => $total_efectivo,
                'total_otros' => $total_otros,
                // 'prevision' => $prevision,
                'asistente' => $asistente,
                'lugar_atencion' => $lugar_atencion,
                'profesional_agenda' => $profesional,
            ]);
            // Guardar el PDF en la carpeta public
            $fileName = 'rendicion_caja_' . $asistente->id . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);

        }
    }

    public function aprobarRendicion($id)
    {
        $rendicion = RendicionCaja::find($id);
        $rendicion->estado = 3; // Cambia el estado a "Aprobada"
        $rendicion->save();
        $asistente = Asistente::find($rendicion->id_asistente);

        $filtro_rendicion[] = array('id_profesional_receptor',$rendicion->id_profesional_receptor);

        $fileName = 'rendicion_caja_' . $asistente->id . '.pdf';
        $filePath = public_path('reportes/' . $fileName);

        if (!file_exists($filePath)) {
            // Asegúrate de que el PDF esté generado
            // Aquí puedes reutilizar el método que ya genera el PDF
            // Ejemplo: $this->dameRendicionPdf($rendicion->id, $asistente->id);
        }

        Mail::to('l.mena.insi@gmail.com')->send(new RendicionAprobadaMail($asistente, $filePath));
        Mail::to('jkriman@gmail.com')->send(new RendicionAprobadaMail($asistente, $filePath));
        $rendiciones =  $rendiciones = RendicionCaja::where($filtro_rendicion)
        ->where('rendicion','0')
        ->get();
        foreach ($rendiciones as $rendicion) {
            $asistente = Asistente::find($rendicion->id_asistente);
            $rendicion->asistente = $asistente;
            if($rendicion->estado == 3){
                $rendicion->estado = 'APROBADA';
            }else if($rendicion->estado == 2){
                $rendicion->estado = 'OTRO';
            }else if($rendicion->estado == 1){
                $rendicion->estado = 'EN ESPERA';
            }else if($rendicion->estado == 4){
                $rendicion->estado = 'RECHAZADA';
            }
        }
        return response()->json(['mensaje' => 'Rendición aprobada y correo enviado.', 'rendiciones' => $rendiciones]);
    }

    public function rechazarRendicion($id)
    {
        $rendicion = RendicionCaja::find($id);
        $rendicion->estado = 4; // Cambia el estado a "Rechazada"
        $rendicion->save();
        $filtro_rendicion[] = array('id_profesional_receptor',$rendicion->id_profesional_receptor);
        $rendiciones =  $rendiciones = RendicionCaja::where($filtro_rendicion)
        ->where('rendicion','0')
        ->get();
        foreach ($rendiciones as $rendicion) {
            $asistente = Asistente::find($rendicion->id_asistente);
            $rendicion->asistente = $asistente;
            if($rendicion->estado == 3){
                $rendicion->estado = 'APROBADA';
            }else if($rendicion->estado == 2){
                $rendicion->estado = 'OTRO';
            }else if($rendicion->estado == 1){
                $rendicion->estado = 'EN ESPERA';
            }else if($rendicion->estado == 4){
                $rendicion->estado = 'RECHAZADA';
            }
        }
        return response()->json(['mensaje' => 'Rendición rechazada.', 'rendiciones' => $rendiciones]);
    }

    public function cambiarEstado(Request $req){
        try {
            $bonos_fonasa = json_decode($req->bonos_fonasa);
            $bonos_otros = json_decode($req->bonos_otros);
            $bonos_agrupados = json_decode($req->bonos_agrupados);

            foreach ($bonos_agrupados as $key => $bonos) {
                foreach ($bonos as $bono) {
                    // Aquí puedes acceder a cada bono y cambiar su estado
                    // Suponiendo que 'id' es la clave única para cada bono y 'estado' es el campo que quieres cambiar
                    $bonoEncontrado = Bono::find($bono->id);
                    if ($bonoEncontrado) {
                        $bonoEncontrado->estado_consulta = 8; // Reemplaza 'nuevo_estado' con el estado que quieras
                        $bonoEncontrado->save();
                    }
                }
            }

            return 'ok';
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dameBonosDiarios(Request $req){
        $fecha = $req->fecha;
        if(Auth::user()->hasRole('Profesional'))
        {
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array('id_profesional',$profesional->id);
            $filtro_rendicion[] = array('id_profesional_receptor',$profesional->id);

            /** Buscar Asistentes de profesional y/o profesional */
            $profesional_lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where('estado',1)->pluck('id_lugar_atencion')->toArray();
            $lista_lugares_atencion_activos = LugarAtencion::whereIn('id', $profesional_lugar_atencion)->get();
            $asistentes_lugar_atencion = AsistenteLugarAtencion::whereIn('id_lugar_atencion', $profesional_lugar_atencion)->where('estado', 1)->pluck('id_asistente')->toArray();
            $lista_asistente = Asistente::whereIn('id', $asistentes_lugar_atencion)->get();
        }
        else if(Auth::user()->hasRole('Institucion'))
        {
            $institucion = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Servicio'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Adm_Institucion'))
        {
            $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Adm_Servicio'))
        {
            $servicio = AdminInstServ::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }
        else if(Auth::user()->hasRole('Contador'))
        {
            // $servicio = Servicios::where('id_usuario',Auth::user()->id)->first();
            $filtro[] = array();
            $filtro_rendicion[] = array();
        }

        $bonos_diarios = Bono::where($filtro)

        ->with('Convenio')
         ->with('TipoBono')
         ->with('Paciente')
         ->with('Asistente')
         ->where('numero_sesiones', 0)
        ->whereDate('fecha_atencion', $fecha)
        ->get();

        // foreach($bonos_diarios as $b){
        //     $paciente = paciente::find($b->id_paciente);
        //     if($paciente) $b->paciente = $paciente;
        //     $convenio = Prevision::where('id',$b->id_clase_bono)->first();
        //     if($convenio) $b->convenio = $convenio;
        //     $tipo_bono = TipoBono::where('id',$b->id_tipo_bono)->first();
        //     if($tipo_bono) $b->tipo = $tipo_bono;
        // }

        return ['estado' => 1, 'bonos' => $bonos_diarios];
    }

    public function dataProfesionalRendiciones(Request $request)
    {
        $datos = array();
        $filtro = array();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $filtro[] = array('id_profesional_receptor',$profesional->id);
        // if(!empty($request->fecha))
        //     $filtro[] = array('fecha_recepcion',$request->fecha);
        // if(!empty($request->convenio))
        //     $filtro[] = array('convenio',$request->convenio);
        if(!empty($request->asistente))
            $filtro[] = array('id_asistente',$request->asistente);
        // if(!empty($request->estado_consulta))
        //     $filtro[] = array('id_profesional_receptor',$request->estado_consulta);

        $rendiciones = RendicionCaja::where($filtro)
                    ->where('rendicion','0')
                    ->filtrofecha($request->fecha)
                    ->with('Asistente')
                    ->with('ProfesionalReceptor')
                    ->get();

        foreach($rendiciones as $r){
            if($r->estado == 3){
                $r->estado = 'APROBADA';
            }else if($r->estado == 2){
                $r->estado = 'OTRO';
            }else if($r->estado == 1){
                $r->estado = 'EN ESPERA';
            }else if($r->estado == 4){
                $r->estado = 'RECHAZADA';
            }
        }

        $datos['estado'] = 1;
        $datos['registros'] = $rendiciones;

        return $datos;
    }

    public function dataProfesionalBonosRendidosPrograma(Request $request)
    {
        $datos = array();
        $filtro = array();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $filtro[] = array('id_profesional',$profesional->id);

        // if(!empty($request->fecha))
        //     $filtro[] = array('fecha_atencion',$request->fecha);
        if(!empty($request->asistente))
            $filtro[] = array('id_asistente',$request->asistente);
        if(!empty($request->convenio))
            $filtro[] = array('convenio',$request->convenio);
        if(!empty($request->estado_consulta))
            $filtro[] = array('estado_consulta',$request->estado_consulta);

        $bonos_programa = Bono::where($filtro)
            ->with('TipoBono')
            ->with('Convenio')
            ->with('Paciente')
            ->with('Parametro')
            ->with('Profesional')
            ->with('Asistente')
            ->where('numero_sesiones','>','0')
            ->filtroFechaAtencion($request->fecha)
            ->get();

        $datos['estado'] = 1;
        $datos['registros'] = $bonos_programa;

        return $datos;
    }

    public function dataProfesionalGestionBonos(Request $request)
    {
        $datos = array();
        $filtro = array();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $filtro[] = array('id_profesional',$profesional->id);

        // if(!empty($request->fecha))
        //     $filtro[] = array('fecha_atencion',$request->fecha);
        if(!empty($request->asistente))
            $filtro[] = array('id_asistente',$request->asistente);
        if(!empty($request->convenio))
            $filtro[] = array('convenio',$request->convenio);
        if(!empty($request->estado_consulta))
            $filtro[] = array('estado_consulta',$request->estado_consulta);


            // var_dump($filtro);

        $bonos_rendidos = Bono::where($filtro)
            ->where('rendido','1')
            ->where('id_clase_bono','<>',6)
            ->where('numero_sesiones','=','0')
            ->where('estado_consulta','<>',8)
            ->filtroFechaAtencion($request->fecha)
            ->with('TipoBono')
            ->with('Convenio')
            ->with('Paciente')
            ->with('Parametro')
            ->with('Profesional')
            ->with('Asistente')
            ->get();

        $bonos_rendidos_generados = Bono::where($filtro)
            ->where('numero_sesiones','=','0')
            ->where('rendido','1')
            ->where('estado_consulta',8)
            ->filtroFechaAtencion($request->fecha)
            ->with('TipoBono')
            ->with('Convenio')
            ->with('Paciente')
            ->with('Parametro')
            ->with('Profesional')
            ->with('Asistente')
            ->get();


        $datos['estado'] = 1;
        $datos['registros']['bonos_rendidos'] = $bonos_rendidos;
        $datos['registros']['bonos_rendidos_generados'] = $bonos_rendidos_generados;

        return $datos;
    }

}
