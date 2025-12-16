<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\AsistenteTipo;
use App\Models\ContratoDependiente;
use App\Models\HoraMedica;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Prevision;
use App\Models\ProfesionOficio;
use App\Models\ProfesionalHorario;
use App\Models\Region;
use App\Models\RegistroConfirmacionHoraAgenda;
use App\Models\TipoBono;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscritorioAsistenteCmMnAg extends Controller
{
    /** ASISTENTE MANEJO DE AGENDA */
    public function index()
    {
        $array_data = array();
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $region = Region::all();
        $prevision = Prevision::all();
        if (!isset($asistente))
            return view('auth.Registros.registro_asistente')->with(['region' => $region, 'prevision' => $prevision]);

        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();
        $profesion_oficio = ProfesionOficio::all();

        $filtro = array();
        // $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;// contrato activo
        $filtro[] = array('id_empleado',$asistente->id) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;

            $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();
            $profesionales = $lugares_atencion->profesionales()->get();

            foreach ($profesionales as $key_tipo_agenda => $value_tipo_agenda)
            {
                $registro_tipo_agenda = ProfesionalHorario::where('id_profesional', $value_tipo_agenda->id)->where('id_lugar_atencion', $id_lugar_atencion)->orderBy('id', 'ASC')->get();
                $registro_tipo_agenda_cantidad = ProfesionalHorario::where('id_profesional', $value_tipo_agenda->id)->where('id_lugar_atencion', $id_lugar_atencion)->count();

                if($registro_tipo_agenda_cantidad > 0)
				{
                    $profesionales[$key_tipo_agenda]['id_tipo_agenda'] = $registro_tipo_agenda[0]->tipo_agenda;
				}
                else
				{
                    $profesionales[$key_tipo_agenda]['id_tipo_agenda'] = 0;
				}
            }

            $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
            $tipo_bonos = TipoBono::where('estado', 1)->get();

            $url = 'app.asistente_cm_manejo_agenda.escritorio_asistente_manejo_agenda'; // Asistente Centro Medico Manejo de Agenda
            $array_data = array(
                'asistente' => $asistente,
                'prevision' => $prevision,
                'profesionales' => $profesionales,
                'lugares_atencion' => $lugares_atencion,
                'reg_confirmacion_hora' => $reg_confirmacion_hora,
                'region' => $region,
                'profesion_oficio' => $profesion_oficio,
                'tipo_bonos' => $tipo_bonos,
            );


            if (isset($asistente)) {
                if($asistente->bienvenido == 0)
                    return view('bienvenida.inicio_asistente');
                else
                    return view($url)->with($array_data);
            }

            return view('auth.Registros.registro_asistente')->with(['region' => $region, 'prevision' => $prevision]);
        }
        else
        {
            return back()->with('error','Contrato de usuario no encontado');
        }
    }

    public function buscar_paciente()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',strtoupper($asistente_tipo->nombre));
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

        $url = 'app.asistente_cm_manejo_agenda.buscar_paciente'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
        );

        return view($url, $array_data);
    }

    public function buscar_paciente_rut(Request $request)
    {
        $datos = array();
        $id_lugar_atencion = $request->id_lugar_atencion;
        $rut = $request->rut;
        $nombre = $request->nombre;
        $apellido = $request->apellido;

        // $filtro = array();
        // $filtro[] = array('rut',$rut);
        // $filtro[] = array('nombres','like','%'.$nombre.'%');

        // $filtro_2 = array();
        // $filtro_2[] = array('apellido_uno','like','%'.$apellido.'%');
        // $filtro_2[] = array('apellido_dos','like','%'.$apellido.'%');
        // 1=1
        // rut='26340063-1' and (nombres like '%'.$nombre.'%'; or apellido_uno like '%daviladasda%' or apellido_dos like '%fdavila%')

        $sql  = '';
        $sql_val = array();
        if(!empty($rut))
        {
            $sql .= " rut=? ";
            $sql_val[] = $rut;
        }
        if(!empty($nombre))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " nombres like ? ";
            $sql_val[] = '%'.$nombre.'%';
        }
        if(!empty($apellido))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " apellido_uno like ?  OR  apellido_dos like ? ";
            $sql_val[] = '%'.$apellido.'%';
            $sql_val[] = '%'.$apellido.'%';
        }

        $registro = Paciente::with(['FichaAtencion' => function($query) use ($id_lugar_atencion){
                                $query->select('id','id_lugar_atencion','id_paciente')->where('id_lugar_atencion',$id_lugar_atencion);
                            }])
                            ->with(['Prevision' =>function($query){
                                $query->select('id','nombre');
                            }])
                            ->with(['Direccion' =>function($query){
                                $query->select('id','direccion','numero_dir','id_ciudad')
                                            ->with(['Ciudad' => function($query2){
                                                $query2->select('id','nombre','id_region')
                                                    // ->Region()
                                                    ;
                                            }]);
                            }])
                            /** PERMITE FILTRAR POR LUGAR ATENCION, RUT, NOMBRE, APELLIDO  */
                            ->porLuAt_Rut_Nom_Ape($id_lugar_atencion, $rut, $nombre, $apellido)
                            ->get();
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
        }

        return $datos;
    }

    public function mis_profesionales()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

        $profesionales = $lugares_atencion->profesionales()->get();


        $url = 'app.asistente_cm_manejo_agenda.mis_profesionales'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
            'profesionales' => $profesionales,
        );

        return view($url, $array_data);
    }

    public function confirmarHora(Request $request)
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $filtro = array();
        // $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;// contrato activo
        $filtro[] = array('id_empleado',$asistente->id) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

            $filtro_hora = array();
            $filtro_hora[] = array('id_lugar_atencion', $lugares_atencion->id);
            $filtro_hora[] = array('id_estado', 1);
            $fecha_incio = date('Y-m-d');
            $fecha_termino = date('Y-m-d', strtotime(date('Y-m-d').'+10 days'));
            $horas = HoraMedica::where($filtro_hora)
                                ->with(['Notificacionesconfirmacion' => function($query){
                                    // $query->whereIn('estado_confirmacion', [0,1]);
                                }])
                                ->with(['Profesional' => function($query){
                                    $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos');
                                }])
                                ->with(['Paciente' => function($query){
                                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'telefono_dos');
                                }])
                                ->whereBetween('fecha_consulta', [$fecha_incio, $fecha_termino])
                                ->orderBy('fecha_consulta', 'ASC')
                                ->get();

            // echo json_encode($horas);

            return view('app.asistente_cm_manejo_agenda.confirmar_hora', [
                'horas' => $horas,
                'fecha_incio' => $fecha_incio,
                'fecha_termino' => $fecha_termino,
                'lugares_atencion' => $lugares_atencion,
            ]);

        }
        else
        {
            return back()->with('error','Contrato de usuario no encontado');
        }
    }

    public function cargarConfirmarHora(Request $request)
    {
        $datos = array();

        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $filtro = array();
        // $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;// contrato activo
        $filtro[] = array('id_empleado',$asistente->id) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

            $filtro_hora = array();
            $filtro_hora[] = array('id_lugar_atencion', $lugares_atencion->id);
            $filtro_hora[] = array('id_estado', 1);
            $fecha_incio = date('Y-m-d');
            $fecha_termino = date('Y-m-d', strtotime(date('Y-m-d').'+1 days'));
            $horas = HoraMedica::where($filtro_hora)
                                ->with(['Notificacionesconfirmacion' => function($query){
                                    // $query->whereIn('estado_confirmacion', [0,1]);
                                }])
                                ->with(['Profesional' => function($query){
                                    $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos');
                                }])
                                ->with(['Paciente' => function($query){
                                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'telefono_dos');
                                }])
                                ->whereBetween('fecha_consulta', [$fecha_incio, $fecha_termino])
                                ->orderBy('fecha_consulta', 'ASC')
                                ->get();


            if($horas)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $horas;
                $datos['fecha_incio'] = $fecha_incio;
                $datos['fecha_termino'] = $fecha_termino;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
                $datos['fecha_incio'] = $fecha_incio;
                $datos['fecha_termino'] = $fecha_termino;
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Usuario son acceso a registros.';
        }

        return $datos;
    }

}
