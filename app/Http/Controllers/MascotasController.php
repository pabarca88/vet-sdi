<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\PacientesDependientes;
use App\Models\Mascota;
use App\Models\EspecieMascota;
use App\Models\EspecieTamanoMascota;
use App\Models\TamanoMascota;
use App\Models\FichaAtencion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class MascotasController extends Controller
{
    public function index()
    {
        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        $mascotas = Mascota::with(['especieMascota', 'tamanoMascota'])->where('id_responsable', optional($paciente)->id)->get();
        $especies = EspecieMascota::orderBy('nombre')->get();
        $tamanos = TamanoMascota::orderBy('nombre')->get();
        $especieTamanos = EspecieTamanoMascota::with(['especie', 'tamano'])->get();
        $fichasMascota = FichaAtencion::with('PresupuestosMascota')
            ->where('id_paciente', 3)
            ->orderBy('id', 'desc')
            ->get();

        return view('app.paciente.dependientes')->with([
            'titulo' => 'Mascotas',
            'registros' => collect(),
            'mascotas' => $mascotas,
            'dependencia' => 0,
            'tipo_dependencias' => '',
            'paciente' => $paciente,
            'prevision' => [],
            'region' => [],
            'especiesMascotas' => $especies,
            'tamanosMascotas' => $tamanos,
            'especieTamanosMascotas' => $especieTamanos,
            'fichasMascota' => $fichasMascota,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tiene_chip' => 'required|boolean',
            'chip' => 'nullable|required_if:tiene_chip,1|string|max:255',
            'nombre' => 'required|string|max:255',
            'especie_id' => 'required|integer|exists:especies_mascotas,id',
            'otra_especie' => 'nullable|string|max:500',
            'tamano_id' => 'required|integer|exists:tamanos_mascotas,id',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'required|string|in:M,F',
            'foto_perfil' => 'nullable|string|max:255',
            'galeria' => 'nullable',
            'observaciones_fotos' => 'nullable|string',
            'esterilizado' => 'required|boolean',
            'fecha_esterilizacion' => 'nullable|required_if:esterilizado,1|date',
            'enfermedad_cronica' => 'nullable|string|max:500',
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

        $comboValido = EspecieTamanoMascota::where('especie_id', $request->input('especie_id'))
            ->where('tamano_id', $request->input('tamano_id'))
            ->exists();

        if (!$comboValido) {
            return [
                'estado' => 0,
                'msj' => 'La combinación de especie y tamaño no es válida',
            ];
        }

        $galeria = $request->input('galeria');
        if (is_string($galeria)) {
            $decoded = json_decode($galeria, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $galeria = $decoded;
            }
        }

        $tieneChip = filter_var($request->input('tiene_chip'), FILTER_VALIDATE_BOOLEAN);
        $esterilizado = filter_var($request->input('esterilizado'), FILTER_VALIDATE_BOOLEAN);
        $tamano = TamanoMascota::find($request->input('tamano_id'));

        $mascota = new Mascota();
        $mascota->id_responsable = $paciente->id;
        $mascota->tiene_chip = $tieneChip;
        $mascota->chip = $tieneChip ? $request->input('chip') : null;
        $mascota->nombre = $request->input('nombre');
        $mascota->especie_id = $request->input('especie_id');
        $mascota->especie = $request->input('especie_id');
        $mascota->otra_especie = $request->input('otra_especie');
        $mascota->tamano_id = $request->input('tamano_id');
        $mascota->tamano = $tamano ? $tamano->slug : null;
        $mascota->fecha_nacimiento = $request->input('fecha_nacimiento');
        $mascota->sexo = $request->input('sexo');
        $mascota->foto_perfil = $request->input('foto_perfil');
        $mascota->galeria = $galeria;
        $mascota->observaciones_fotos = $request->input('observaciones_fotos');
        $mascota->esterilizado = $esterilizado;
        $mascota->fecha_esterilizacion = $esterilizado ? $request->input('fecha_esterilizacion') : null;
        $mascota->enfermedad_cronica = $request->input('enfermedad_cronica');
        $mascota->id_user = Auth::id();
        $mascota->estado = 1;

        if ($mascota->save()) {
            return [
                'estado' => 1,
                'msj' => 'Mascota registrada con exito.',
                'registro' => $mascota->load(['especieMascota', 'tamanoMascota']),
            ];
        }

        return [
            'estado' => 0,
            'msj' => 'Problemas al registrar la mascota',
        ];
    }

    public function update(Request $request, Mascota $mascota)
    {
        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        if (!$paciente || $mascota->id_responsable !== $paciente->id) {
            return [
                'estado' => 0,
                'msj' => 'Mascota no encontrada',
            ];
        }

        $validator = Validator::make($request->all(), [
            'tiene_chip' => 'required|boolean',
            'chip' => 'nullable|required_if:tiene_chip,1|string|max:255',
            'nombre' => 'required|string|max:255',
            'especie_id' => 'required|integer|exists:especies_mascotas,id',
            'otra_especie' => 'nullable|string|max:500',
            'tamano_id' => 'required|integer|exists:tamanos_mascotas,id',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'required|string|in:M,F',
            'foto_perfil' => 'nullable|string|max:255',
            'galeria' => 'nullable',
            'observaciones_fotos' => 'nullable|string',
            'esterilizado' => 'required|boolean',
            'fecha_esterilizacion' => 'nullable|required_if:esterilizado,1|date',
            'enfermedad_cronica' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return [
                'estado' => 0,
                'msj' => 'campos requeridos',
                'error' => $validator->errors(),
            ];
        }

        $comboValido = EspecieTamanoMascota::where('especie_id', $request->input('especie_id'))
            ->where('tamano_id', $request->input('tamano_id'))
            ->exists();

        if (!$comboValido) {
            return [
                'estado' => 0,
                'msj' => 'La combinación de especie y tamaño no es válida',
            ];
        }

        $galeria = $request->input('galeria');
        if (is_string($galeria)) {
            $decoded = json_decode($galeria, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $galeria = $decoded;
            }
        }

        $tieneChip = filter_var($request->input('tiene_chip'), FILTER_VALIDATE_BOOLEAN);
        $esterilizado = filter_var($request->input('esterilizado'), FILTER_VALIDATE_BOOLEAN);
        $tamano = TamanoMascota::find($request->input('tamano_id'));

        $mascota->tiene_chip = $tieneChip;
        $mascota->chip = $tieneChip ? $request->input('chip') : null;
        $mascota->nombre = $request->input('nombre');
        $mascota->especie_id = $request->input('especie_id');
        $mascota->especie = $request->input('especie_id');
        $mascota->otra_especie = $request->input('otra_especie');
        $mascota->tamano_id = $request->input('tamano_id');
        $mascota->tamano = $tamano ? $tamano->slug : null;
        $mascota->fecha_nacimiento = $request->input('fecha_nacimiento');
        $mascota->sexo = $request->input('sexo');
        $mascota->foto_perfil = $request->input('foto_perfil');
        $mascota->galeria = $galeria;
        $mascota->observaciones_fotos = $request->input('observaciones_fotos');
        $mascota->esterilizado = $esterilizado;
        $mascota->fecha_esterilizacion = $esterilizado ? $request->input('fecha_esterilizacion') : null;
        $mascota->enfermedad_cronica = $request->input('enfermedad_cronica');
        $mascota->id_user = Auth::id();
        $mascota->estado = 1;

        if ($mascota->save()) {
            return [
                'estado' => 1,
                'msj' => 'Mascota actualizada con exito.',
                'registro' => $mascota->load(['especieMascota', 'tamanoMascota']),
            ];
        }

        return [
            'estado' => 0,
            'msj' => 'Problemas al actualizar la mascota',
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

        $mascotas = Mascota::with(['especieMascota', 'tamanoMascota'])->where('id_responsable', $paciente->id)->get();

        return [
            'estado' => 1,
            'msj' => 'registros',
            'registros' => $mascotas,
        ];
    }

    public function destroy(Mascota $mascota)
    {
        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        if (!$paciente || $mascota->id_responsable !== $paciente->id) {
            return [
                'estado' => 0,
                'msj' => 'Mascota no encontrada',
            ];
        }

        if ($mascota->delete()) {
            return [
                'estado' => 1,
                'msj' => 'Mascota eliminada con exito.',
            ];
        }

        return [
            'estado' => 0,
            'msj' => 'No se pudo eliminar la mascota',
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
