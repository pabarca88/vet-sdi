<?php



namespace App\Http\Controllers;



use App\Models\Profesional;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;



class ContabilidadController extends Controller

{

   public function index(){
    return view('app.adm_cm.contabilidad.escritorio');
   }

    public function getRendicion(Request $request){

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $bonos = $profesional->Bonos()->get();



        foreach ($bonos as $b) {

            $paciente = $b->Paciente()->first();

            $b->PacienteNombre = $paciente->nombres .' '. $paciente->apellido_uno;

            $b->PacienteRut = $paciente->rut;

        }



        $data = [

            'bonos' => $bonos,

        ];

        return json_encode($data);

    }



    public function Rendicion(Request $request){

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $bonos = $profesional->Bonos()->get();



        foreach ($bonos as $b) {

            $b->rendido = true;

            $b->save();

        }



        $data = [

            'bonos' => 'Funciona',

        ];

        return json_encode($data);

    }

}

