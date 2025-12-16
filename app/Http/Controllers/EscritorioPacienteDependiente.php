<?php



namespace App\Http\Controllers;



use App\Models\Ciudad;

use App\Models\Especialidad;

use App\Models\FichaAtencion;

use App\Models\Paciente;

use App\Models\PacientesDependientes;

use App\Models\Prevision;

use App\Models\Profesional;

use App\Models\Region;

use App\Models\RegistroConfirmacionHoraAgenda;

use App\Models\SubTipoEspecialidad;

use App\Models\TipoEspecialidad;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;



class EscritorioPacienteDependiente extends Controller

{

    public function buscar_especialidad(Request $request)

    {

        $profesion_profesional = $request->profesion_profesional;

        $especialidades = TipoEspecialidad::where('id_especialidad', $profesion_profesional)->get();



        return json_encode($especialidades);

    }





    public function buscar_sub_especialidad(Request $request)

    {

        $especialidad = $request->especialidad;

        $sub_especialidades = SubTipoEspecialidad::where('id_tipo_especialidad', $especialidad)->get();



        return json_encode($sub_especialidades);

    }



    public function index(Request $request)

    {

        /** responsable */

        $paciente_responsable = Paciente::where('id_usuario', Auth::user()->id)->first();

        /** dependiente */

        $paciente_dependiente = Paciente::where('id', $request->id_dependiente_activo)->first();


        /** validar dependencia */

        $filtro = array();

        $filtro[] = array('id_responsable', $paciente_responsable->id);

        $filtro[] = array('id_paciente', $paciente_dependiente->id);

        $relacion = PacientesDependientes::where($filtro)->first();



        if($relacion)

        {

            $region = Region::all();

            $prevision = Prevision::all();



            if (isset($paciente_dependiente)) {

                return view('app.paciente_dependiente.escritorio_paciente_dependiente')->with([
                    'paciente' => $paciente_dependiente, 
                    'responsable' => $paciente_responsable,
                    'mascota' => $paciente_dependiente
                ]);

            }



            return view('auth.Registros.registro_paciente')->with(['region' => $region, 'prevision' => $prevision]);

        }

        else

        {

            back()->with('error', 'Dependiente no registrado bajo su tutela');

        }



    }



    public function agendarHora($id_dependiente_activo_, $id_profesion_ = 0,$id_especialidad_ = 0,$id_subespecialidad_ = 0)

    {

        $profesiones = Especialidad::where('estado', 1)->whereNotIn('id',[8,10,11,12])->get();

        $especialidades = TipoEspecialidad::where('estado', 1)->whereNotIn('id_especialidad',[8,10,11,12])->get();

        if($id_especialidad_>0)

            $sub_especialidades = SubTipoEspecialidad::where('estado', 1)->where('id_tipo_especialidad',$id_especialidad_)->get();

        else

            $sub_especialidades = (object)array();

        $regiones = Region::all();

        $ciudades = Ciudad::all();

        $previsiones = Prevision::all();



        $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();



        if(Auth::user()->hasRole('Paciente'))

        {

            $user = Auth::user();

            $paciente = Paciente::where('id_usuario', $user->id)->first();

            $paciente_dependiente = Paciente::where('id', $id_dependiente_activo_)->first();

            // return view('app.paciente.buscador_profesional_paciente')->with(

            return view('app.general.buscador_profesionales.buscador')->with(

                [

                    'id_responsable' => $paciente->id,

                    'id_dependiente_activo' => $profesiones,

                    'profesiones' => $profesiones,

                    'especialidades' => $especialidades,

                    'sub_especialidades' => $sub_especialidades,

                    'previsiones' => $previsiones,

                    'paciente' => $paciente_dependiente,

                    'regiones' => $regiones,

                    'ciudades' => $ciudades,

                    'reg_confirmacion_hora' => $reg_confirmacion_hora,

                    'filtros' => array(

                        'id_profesion' => $id_profesion_,

                        'id_especialidad' => $id_especialidad_,

                        'id_subespecialidad' => $id_subespecialidad_

                    )



                ]

            );

        }

        else

        {

            // return view('app.paciente.buscador_profesional_paciente')->with(

            return view('app.general.buscador_profesionales.buscador')->with(

                [

                    'profesiones' => $profesiones,

                    'especialidades' => $especialidades,

                    'sub_especialidades' => $sub_especialidades,

                    'regiones' => $regiones,

                    'ciudades' => $ciudades,

                    'filtros' => array(

                        'id_profesion' => $id_profesion_,

                        'id_especialidad' => $id_especialidad_,

                        'id_subespecialidad' => $id_subespecialidad_

                    )



                ]

            );

        }

    }



    public function miProfesionales($id_dependiente_activo_, $id_usuario_ = 0, $id_profesional_ = 0)

    {

        // var_dump($id_dependiente_activo_);

        // var_dump($id_usuario_);

        // var_dump($id_profesional_);

        /** responsable */

        $paciente_responsable = Paciente::where('id_usuario', Auth::user()->id)->first();

        /** dependiente */

        $paciente_dependiente = Paciente::where('id', $id_dependiente_activo_)->first();



        // DESVINCULAR profesional

        if($id_usuario_ != 0 && $id_profesional_ != 0)

        {

            $fichas = FichaAtencion::where('id_paciente', $id_usuario_)

                                     ->where('id_profesional', $id_profesional_)

                                     ->first();



            if($fichas)

            {

                $fichas->desvincular = 1;

                $fichas->save();

            }

        }



        // VER lista de profesionales

        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

        $fichas = FichaAtencion::where('id_paciente', $paciente_dependiente->id)->get()->unique('id_profesional');



        $fichas_desvinculados = FichaAtencion::select('id_profesional')

                                        ->where('id_paciente', $paciente_dependiente->id)

                                        ->where('desvincular', 1)

                                        ->get()

                                        ->unique('id_profesional');



        $profesional = [];

        $desvinculados = [];

        $profesion = [];

        foreach ($fichas as $f) {

            array_push($profesional, $f->profesional()->first());

            $profesional_ = Profesional::with('Especialidad')->find($f->id_profesional);

            array_push($profesion,$profesional_->Especialidad->nombre);

        }



        foreach ($fichas_desvinculados as $d) {

            array_push($desvinculados, $d->id_profesional);

        }



        $id_usuario = Auth::user()->id;



        $lista_especialidad = array_unique($profesion);



        // var_dump(Auth::user()->id);

        // var_dump($profesional);

        return view('app.paciente_dependiente.medicos_paciente',

        [

            'paciente' => $paciente_dependiente,

            'responsable' => $paciente_responsable,

            'id_usuario' => $id_usuario,

            'profesional' => $profesional,

            'desvinculados' => $desvinculados,

            'lista_especialidad' => $lista_especialidad

        ]);



    }



    public function recetaOnline(Request $request)

    {

        $paciente = Paciente::where('id', $request->id_dependiente_activo)->first();

        return view('app.paciente_dependiente.receta.inicio_receta',['id_dependiente_activo' => $request->id_dependiente_activo, 'paciente' => $paciente]);

    }



    public function receta_misexamenes(Request $request)

    {

        $paciente = Paciente::where('id', $request->id_dependiente_activo)->first();

        return view('app.paciente_dependiente.receta.mis_examenes',['id_dependiente_activo' => $request->id_dependiente_activo, 'paciente' => $paciente]);

    }



    public function receta_misrecetas(Request $request)

    {

        $paciente = Paciente::where('id', $request->id_dependiente_activo)->first();

        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->get();



        return view('app.paciente_dependiente.receta.mis_recetas', ['fichas' => $fichas, 'id_dependiente_activo' => $request->id_dependiente_activo, 'paciente' => $paciente]);

    }



    public function receta_miscertificados(Request $request)

    {

        $paciente = Paciente::where('id', $request->id_dependiente_activo)->first();

        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->get();



        return view('app.paciente_dependiente.receta.mis_certificados', ['fichas' => $fichas, 'id_dependiente_activo' => $request->id_dependiente_activo, 'paciente' => $paciente]);

    }



    public function receta_mislicencias(Request $request)

    {

        $paciente = Paciente::where('id', $request->id_dependiente_activo)->first();

        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->get();



        return view('app.paciente_dependiente.receta.mis_licencias', ['fichas' => $fichas, 'id_dependiente_activo' => $request->id_dependiente_activo, 'paciente' => $paciente]);

    }



}

