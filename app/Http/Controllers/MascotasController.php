<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\PacientesDependientes;
use App\Models\Mascota;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class MascotasController extends Controller
{
    public function index()
    {
        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        $mascotas = Mascota::where('id_responsable', optional($paciente)->id)->get();

        return view('app.paciente.dependientes')->with([
            'titulo' => 'Mascotas',
            'registros' => collect(),
            'mascotas' => $mascotas,
            'dependencia' => 0,
            'tipo_dependencias' => '',
            'paciente' => $paciente,
            'prevision' => [],
            'region' => [],
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'chip' => 'nullable|string|max:255',
            'nombre' => 'required|string|max:255',
            'especie' => 'required|integer|min:1',
            'otra_especie' => 'nullable|string|max:500',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'required|string|in:M,F',
            'foto_perfil' => 'nullable|string|max:255',
            'galeria' => 'nullable',
            'observaciones_fotos' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return [
                'estado' => 0,
                'msj' => 'campos requeridos',
                'error' => $validator->errors(),
            ];
        }

        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        if (!$paciente) {
            return [
                'estado' => 0,
                'msj' => 'Paciente no encontrado',
            ];
        }

        $galeria = $request->input('galeria');
        if (is_string($galeria)) {
            $decoded = json_decode($galeria, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $galeria = $decoded;
            }
        }

        $mascota = new Mascota();
        $mascota->id_responsable = $paciente->id;
        $mascota->chip = $request->input('chip');
        $mascota->nombre = $request->input('nombre');
        $mascota->especie = $request->input('especie');
        $mascota->otra_especie = $request->input('otra_especie');
        $mascota->fecha_nacimiento = $request->input('fecha_nacimiento');
        $mascota->sexo = $request->input('sexo');
        $mascota->foto_perfil = $request->input('foto_perfil');
        $mascota->galeria = $galeria;
        $mascota->observaciones_fotos = $request->input('observaciones_fotos');
        $mascota->id_user = Auth::id();
        $mascota->estado = 1;

        if ($mascota->save()) {
            return [
                'estado' => 1,
                'msj' => 'Mascota registrada con exito.',
                'registro' => $mascota,
            ];
        }

        return [
            'estado' => 0,
            'msj' => 'Problemas al registrar la mascota',
        ];
    }

    public function listar(Request $request)
    {
        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        if (!$paciente) {
            return [
                'estado' => 0,
                'msj' => 'Paciente no encontrado',
            ];
        }

        $mascotas = Mascota::where('id_responsable', $paciente->id)->get();

        return [
            'estado' => 1,
            'msj' => 'registros',
            'registros' => $mascotas,
        ];
    }

    public function inscripcion_alimentos(Request $request){
        return view('app.paciente_dependiente.inscripcion_alimentos');
    }

    public function inscripcion_medicamentos(Request $request){
        return view('app.paciente_dependiente.inscripcion_medicamentos');
    }

    public function promociones_especiales(){
        return view('app.paciente_dependiente.promociones_especiales');
    }

    public function promociones_generales(){
        return view('app.paciente_dependiente.promociones_generales');
    }
     public function registro_vacunas(Request $request){
     
        $id_mascota = $request->id_dependiente_activo;
        $mascota = PacientesDependientes::find($id_mascota);
        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        return view('app.paciente_dependiente.registro_vacunas',['mascota' => $mascota,'paciente' => $paciente]);
    }

    public function registro_desparasitacion(Request $request){
         $id_mascota = $request->id_dependiente_activo;
        $mascota = PacientesDependientes::find($id_mascota);
        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();
        return view('app.paciente_dependiente.registro_desparasitacion',[
            'mascota' => $mascota,
            'paciente' => $paciente
        ]);
    }
    
}
