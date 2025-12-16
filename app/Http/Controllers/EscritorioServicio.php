<?php

namespace App\Http\Controllers;
use App\Models\AdminInstServ;
use App\Models\Ciudad;
use App\Models\ContratoDependiente;
use App\Models\Asistente;
use App\Models\ServiciosInternos;
use App\Models\ServiciosInternosSalas;
use App\Models\PacienteSala;
use App\Models\ProfesionalServicioClinico;
use App\Models\Profesional;
use App\Models\Especialidad;
use App\Models\Instituciones;
use App\Models\Region;
use App\Models\Servicios;
use App\Models\TipoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscritorioServicio extends Controller
{
    public function index()
    {
        $servicio = Servicios::where('id_usuario', Auth::user()->id)->first();
        $region = Region::all();
        $tipo_servicio = TipoServicio::all();

        if (isset($servicio)) {

            // return view('app.profesional.escritorio_profesional')->with(['region' => $region, 'profesional' => $profesional, 'hora_dia' => $horas_dia]);
        }


        return view('auth.Registros.registro_servicio')->with([
            'region' => $region,
            'tipo_servicio' => $tipo_servicio,
        ]);
    }

    public function salas($id){
        try {
            $servicio_interno=ServiciosInternos::select('servicio_interno.*','servicios.nombre as nombre_servicio','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                                                ->join('servicios','servicios.id','=','servicio_interno.id_servicio')
                                                ->leftjoin('profesionales','profesionales.id','=','servicio_interno.id_responsable')
                                                ->where('servicio_interno.id',$id)
                                                ->first();

                $salas_servicio = ServiciosInternosSalas::where('id_servicio_interno',$servicio_interno->id)->get();


                $servicio_interno->salas = $salas_servicio;

                $pacientes_salas = PacienteSala::select('paciente_sala.*','pacientes.nombres','pacientes.apellido_uno as apellido_uno_paciente','pacientes.apellido_dos as apellido_dos_paciente','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos','pacientes_triage.id as id_paciente_triage')
                                    ->join('pacientes','paciente_sala.id_paciente','pacientes.id')
                                    ->join('profesionales','paciente_sala.id_profesional','profesionales.id')
                                    ->join('pacientes_triage','pacientes_triage.id_paciente','=','paciente_sala.id_paciente')
                                    ->where('paciente_sala.id_servicio_interno',$servicio_interno->id)
                                    ->get();
                foreach($pacientes_salas as $paciente){
                    switch ($paciente->nivel_urgencia) {
                        case 1:
                            # code...
                            $paciente->urgencia = 'Leve';
                            $paciente->clase_html = 'bg-primary text-white';
                            break;
                        case 2:
                            $paciente->urgencia = 'Media Gravedad';
                            $paciente->clase_html = 'bg-warning text-white';
                            break;
                        case 3:
                            $paciente->urgencia = 'Grave';
                            $paciente->clase_html = 'bg-danger text-white';
                            break;
                        default:
                            # code...
                            $paciente->urgencia = '-----';
                            break;
                    }
                }
                $servicio_interno->pacientes = $pacientes_salas;
                $profesionales = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                    ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                    ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                    ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                    ->where('profesionales_servicios_clinicos.id_cargo',1)
                                    ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                    ->get();
                $servicio_interno->profesionales = $profesionales;

                $tens = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                    ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                    ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                    ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                    ->where('profesionales_servicios_clinicos.id_cargo',5)
                                    ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                    ->get();

                $servicio_interno->tens = $tens;

                $servicio_interno->jefe_servicio = Profesional::find($servicio_interno->id_responsable);

            return view('app.adm_hospital.servicios.servicios_clinicos.atender.salas_generales',['servicio' => $servicio_interno])->render();
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dame_servicios_internos($id_institucion){
        $servicios_internos = ServiciosInternos::select('servicio_interno.*','servicios.nombre as nombre_servicio','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                            ->join('servicios','servicios.id','=','servicio_interno.id_servicio')
                            ->leftjoin('profesionales','profesionales.id','=','servicio_interno.id_responsable')
                            ->where('servicio_interno.id_institucion',$id_institucion)
                            ->get();

        foreach($servicios_internos as $servicio_interno){
            $salas_servicio = ServiciosInternosSalas::where('id_servicio_interno',$servicio_interno->id)->get();
            $servicio_interno->salas = $salas_servicio;

            $profesionales = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                ->where('profesionales_servicios_clinicos.id_cargo',1)
                                ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                ->get();
            $servicio_interno->profesionales = $profesionales;

            $tens = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                ->where('profesionales_servicios_clinicos.id_cargo',5)
                                ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                ->get();

            $servicio_interno->tens = $tens;

            $servicio_interno->jefe_servicio = Profesional::find($servicio_interno->id_responsable);
        }

        return $servicios_internos;
    }
}
