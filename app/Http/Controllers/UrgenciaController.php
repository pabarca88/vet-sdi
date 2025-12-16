<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UrgenciaController extends Controller
{
    /** INICIO PROFESIONAL */
    public function IndexProfesional()
    {
        return view('urgencia.profesional.escritorio_profesional');
    }
    public function AtencionProfesional()
    {
        return view('urgencia.profesional.escritorio_atencion');
    }
    public function TriageProfesional()
    {
        return view('urgencia.profesional.escritorio_triage');
    }
    public function BoxProfesional()
    {
        return view('urgencia.profesional.escritorio_box');
    }
    public function AmbulanciaProfesional()
    {
        return view('urgencia.profesional.escritorio_ambulancia');
    }
    public function CamasProfesional()
    {
        return view('urgencia.profesional.escritorio_camas');
    }
    public function BuscarPacienteProfesional()
    {
        return view('urgencia.profesional.buscar_paciente');
    }
    /** FIN PROFESIONAL */

    /** INICIO ENFERMERIA */
    public function IndexEnfermeria()
    {
        return view('urgencia.enfermeras.escritorio_enfermera');
    }
    public function AtencionEnfermeria()
    {
        return view('urgencia.enfermeras.escritorio_atencion');
    }
    public function TriageEnfermeria()
    {
        return view('urgencia.enfermeras.escritorio_triage');
    }
    public function BoxEnfermeria()
    {
        return view('urgencia.enfermeras.escritorio_box');
    }
    public function AmbulanciaEnfermeria()
    {
        return view('urgencia.enfermeras.escritorio_ambulancia');
    }
    public function CamasEnfermeria()
    {
        return view('urgencia.enfermeras.escritorio_camas');
    }
    public function BuscarPacienteEnfermeria()
    {
        return view('urgencia.enfermeras.buscar_paciente');
    }
    /** FIN ENFERMERIA */


    /** INICIO ADMINISTRACION */
    public function IndexAdministrativo()
    {
        return view('urgencia.administrativo.escritorio_administrativo');
    }
    public function RecepcionAdministrativo()
    {
        return view('urgencia.administrativo.escritorio_recepcion');
    }
    public function MisProfesionalesAdministrativo()
    {
        $LugarAtencion = LugarAtencion::where('id',12)->first();
        return view('urgencia.administrativo.escritorio_mis_profesionales', [
            'lugares_atencion' => $LugarAtencion,
        ]);
    }
    // public function MisEnfermerasAdministrativo()
    // {
    //     return view('urgencia.administrativo.escritorio_mis_enfermeras');
    // }
    public function AmbulanciaAdministrativo()
    {
        return view('urgencia.administrativo.escritorio_ambulancias');
    }
    public function CamasAdministrativo()
    {
        return view('urgencia.administrativo.escritorio_box');
    }
    public function BuscarPacienteAdministrativo()
    {
        return view('urgencia.administrativo.buscar_paciente');
    }

    /** FIN ADMINISTRACION */

    /** INICIO FUNCIONES GENERICAS */
    public function buscar_rut_paciente(Request $request)
    {
        if ($request->tipo == 'asistente') {
            $asistente = Asistente::where('rut', $request->rut)->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();

            if ($asistente != null) {
                return 'asistente';
            }
        }

        $tipo_paciente = 1;
        $paciente = Paciente::where('rut', $request->rut)->with('Prevision')->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();
        if ($paciente == null) {
            $tipo_paciente++;
            $paciente = Asistente::where('rut', $request->rut)->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();
            if ($paciente == null) {
                $tipo_paciente++;
                $paciente = Profesional::where('rut', $request->rut)->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();
            }
        }
        if(isset($paciente))
            $paciente['code'] = Crypt::encryptString( $paciente['email'] );
        else
            $paciente = null;

        // validar si es paciente
        if($tipo_paciente > 1)
            $paciente['tipo_paciente'] = 'NO';
        else
            $paciente['tipo_paciente'] = 'SI';

        return json_encode($paciente);
    }
    /** CIERRE FUNCIONES GENERICAS */

}
