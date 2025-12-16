<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\AsistenteTipo;
use App\Models\ContratoDependiente;
use App\Models\LugarAtencion;
use App\Models\Prevision;
use App\Models\ProfesionOficio;
use App\Models\Region;
use App\Models\RegistroConfirmacionHoraAgenda;
use App\Models\TipoBono;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscritorioAsistenteLaboratorio extends Controller
{
    /*Asistente Centro Medico*/
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
            $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
            $tipo_bonos = TipoBono::where('estado', 1)->get();

            $url = 'app.asistente_laboratorio.escritorio_asistente'; // institucion
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
}
