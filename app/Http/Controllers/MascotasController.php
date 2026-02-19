<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Mascota;
use App\Models\EspecieMascota;
use App\Models\EspecieTamanoMascota;
use App\Models\RazaMascota;
use App\Models\TamanoMascota;
use App\Models\FichaAtencion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'raza_id' => 'nullable|integer|exists:razas_mascotas,id',
            'otra_especie' => 'nullable|string|max:500',
            'tamano_id' => 'required|integer|exists:tamanos_mascotas,id',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'required|string|in:M,F',
            'foto_perfil' => 'nullable|string|max:255',
            'galeria' => 'nullable',
            'observaciones_fotos' => 'nullable|string',
            'esterilizado' => 'required|boolean',
            'fecha_esterilizacion_desconocida' => 'nullable|boolean',
            'fecha_esterilizacion' => [
                'nullable',
                'date',
                Rule::requiredIf(function () use ($request) {
                    $esterilizado = filter_var($request->input('esterilizado'), FILTER_VALIDATE_BOOLEAN);
                    $fechaDesconocida = filter_var($request->input('fecha_esterilizacion_desconocida'), FILTER_VALIDATE_BOOLEAN);

                    return $esterilizado && !$fechaDesconocida;
                }),
            ],
            'enfermedad_cronica' => 'nullable|string|max:500',
            'dieta' => 'nullable|string',
            'ultima_desparasitacion' => 'nullable|date',
            'producto_desparasitacion' => 'nullable|string|max:255',
            'cirugias' => 'nullable|string',
            'vacunas' => 'nullable|string',
            'viajes' => 'nullable|string',
            'vive_con_animales' => 'nullable|boolean',
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

        if ($request->filled('raza_id')) {
            $razaValida = RazaMascota::where('id', $request->input('raza_id'))
                ->where('especie_id', $request->input('especie_id'))
                ->exists();
            if (!$razaValida) {
                return [
                    'estado' => 0,
                    'msj' => 'La raza no pertenece a la especie seleccionada',
                ];
            }
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
        $fechaEsterilizacionDesconocida = filter_var($request->input('fecha_esterilizacion_desconocida'), FILTER_VALIDATE_BOOLEAN);
        $viveConAnimalesInput = $request->input('vive_con_animales');
        $viveConAnimales = null;
        if ($viveConAnimalesInput !== null && $viveConAnimalesInput !== '') {
            $viveConAnimales = filter_var($viveConAnimalesInput, FILTER_VALIDATE_BOOLEAN);
        }
        $tamano = TamanoMascota::find($request->input('tamano_id'));

        $mascota = new Mascota();
        $mascota->id_responsable = $paciente->id;
        $mascota->tiene_chip = $tieneChip;
        $mascota->chip = $tieneChip ? $request->input('chip') : null;
        $mascota->nombre = $request->input('nombre');
        $mascota->especie_id = $request->input('especie_id');
        $mascota->especie = $request->input('especie_id');
        $mascota->raza_id = $request->filled('raza_id') ? $request->input('raza_id') : null;
        $mascota->otra_especie = $request->input('otra_especie');
        $mascota->tamano_id = $request->input('tamano_id');
        $mascota->tamano = $tamano ? $tamano->slug : null;
        $mascota->fecha_nacimiento = $request->input('fecha_nacimiento');
        $mascota->sexo = $request->input('sexo');
        $mascota->foto_perfil = $request->input('foto_perfil');
        $mascota->galeria = $galeria;
        $mascota->observaciones_fotos = $request->input('observaciones_fotos');
        $mascota->esterilizado = $esterilizado;
        $mascota->fecha_esterilizacion = ($esterilizado && !$fechaEsterilizacionDesconocida && $request->filled('fecha_esterilizacion'))
            ? $request->input('fecha_esterilizacion')
            : null;
        $mascota->enfermedad_cronica = $request->input('enfermedad_cronica');
        $mascota->dieta = $request->input('dieta');
        $mascota->ultima_desparasitacion = $request->input('ultima_desparasitacion');
        $mascota->producto_desparasitacion = $request->input('producto_desparasitacion');
        $mascota->cirugias = $request->input('cirugias');
        $mascota->vacunas = $request->input('vacunas');
        $mascota->viajes = $request->input('viajes');
        $mascota->vive_con_animales = $viveConAnimales;
        $mascota->id_user = Auth::id();
        $mascota->estado = 1;

        if ($mascota->save()) {
            return [
                'estado' => 1,
                'msj' => 'Mascota registrada con exito.',
                'registro' => $mascota->load(['especieMascota', 'razaMascota', 'tamanoMascota']),
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
            'raza_id' => 'nullable|integer|exists:razas_mascotas,id',
            'otra_especie' => 'nullable|string|max:500',
            'tamano_id' => 'required|integer|exists:tamanos_mascotas,id',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'required|string|in:M,F',
            'foto_perfil' => 'nullable|string|max:255',
            'galeria' => 'nullable',
            'observaciones_fotos' => 'nullable|string',
            'esterilizado' => 'required|boolean',
            'fecha_esterilizacion_desconocida' => 'nullable|boolean',
            'fecha_esterilizacion' => [
                'nullable',
                'date',
                Rule::requiredIf(function () use ($request) {
                    $esterilizado = filter_var($request->input('esterilizado'), FILTER_VALIDATE_BOOLEAN);
                    $fechaDesconocida = filter_var($request->input('fecha_esterilizacion_desconocida'), FILTER_VALIDATE_BOOLEAN);

                    return $esterilizado && !$fechaDesconocida;
                }),
            ],
            'enfermedad_cronica' => 'nullable|string|max:500',
            'dieta' => 'nullable|string',
            'ultima_desparasitacion' => 'nullable|date',
            'producto_desparasitacion' => 'nullable|string|max:255',
            'cirugias' => 'nullable|string',
            'vacunas' => 'nullable|string',
            'viajes' => 'nullable|string',
            'vive_con_animales' => 'nullable|boolean',
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

        if ($request->filled('raza_id')) {
            $razaValida = RazaMascota::where('id', $request->input('raza_id'))
                ->where('especie_id', $request->input('especie_id'))
                ->exists();
            if (!$razaValida) {
                return [
                    'estado' => 0,
                    'msj' => 'La raza no pertenece a la especie seleccionada',
                ];
            }
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
        $fechaEsterilizacionDesconocida = filter_var($request->input('fecha_esterilizacion_desconocida'), FILTER_VALIDATE_BOOLEAN);
        $tamano = TamanoMascota::find($request->input('tamano_id'));
        $viveConAnimalesInput = $request->input('vive_con_animales');
        $viveConAnimales = ($viveConAnimalesInput === null || $viveConAnimalesInput === '')
            ? null
            : filter_var($viveConAnimalesInput, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        $mascota->tiene_chip = $tieneChip;
        $mascota->chip = $tieneChip ? $request->input('chip') : null;
        $mascota->nombre = $request->input('nombre');
        $mascota->especie_id = $request->input('especie_id');
        $mascota->especie = $request->input('especie_id');
        $mascota->raza_id = $request->filled('raza_id') ? $request->input('raza_id') : null;
        $mascota->otra_especie = $request->input('otra_especie');
        $mascota->tamano_id = $request->input('tamano_id');
        $mascota->tamano = $tamano ? $tamano->slug : null;
        $mascota->fecha_nacimiento = $request->input('fecha_nacimiento');
        $mascota->sexo = $request->input('sexo');
        $mascota->foto_perfil = $request->input('foto_perfil');
        $mascota->galeria = $galeria;
        $mascota->observaciones_fotos = $request->input('observaciones_fotos');
        $mascota->esterilizado = $esterilizado;
        $mascota->fecha_esterilizacion = ($esterilizado && !$fechaEsterilizacionDesconocida && $request->filled('fecha_esterilizacion'))
            ? $request->input('fecha_esterilizacion')
            : null;
        $mascota->enfermedad_cronica = $request->input('enfermedad_cronica');
        $mascota->dieta = $request->input('dieta');
        $mascota->ultima_desparasitacion = $request->input('ultima_desparasitacion');
        $mascota->producto_desparasitacion = $request->input('producto_desparasitacion');
        $mascota->cirugias = $request->input('cirugias');
        $mascota->vacunas = $request->input('vacunas');
        $mascota->viajes = $request->input('viajes');
        $mascota->vive_con_animales = $viveConAnimales;
        $mascota->id_user = Auth::id();
        $mascota->estado = 1;

        if ($mascota->save()) {
            return [
                'estado' => 1,
                'msj' => 'Mascota actualizada con exito.',
                'registro' => $mascota->load(['especieMascota', 'razaMascota', 'tamanoMascota']),
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

        $mascotas = Mascota::with(['especieMascota', 'razaMascota', 'tamanoMascota'])->where('id_responsable', $paciente->id)->get();

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

    public function razasPorEspecie($especie)
    {
        $razas = RazaMascota::where('especie_id', $especie)
            ->orderBy('nombre')
            ->get(['id', 'nombre', 'especie_id']);

        return [
            'estado' => 1,
            'razas' => $razas,
        ];
    }
    public function registro_vacunas(Request $request)
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $mascota = Mascota::find($request->id_dependiente_activo);

        if (!$mascota) {
            return back()->with('error', 'Mascota no encontrada');
        }

        return view('app.paciente_dependiente.registro_vacunas', [
            'mascota' => $mascota,
            'paciente' => $paciente,
            'vacunas' => $this->normalizarRegistros($mascota->vacunas_registro),
        ]);
    }

    public function registro_desparasitacion(Request $request)
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $mascota = Mascota::find($request->id_dependiente_activo);

        if (!$mascota) {
            return back()->with('error', 'Mascota no encontrada');
        }

        return view('app.paciente_dependiente.registro_desparasitacion',[
            'mascota' => $mascota,
            'paciente' => $paciente,
            'desparasitaciones' => $this->normalizarRegistros($mascota->desparasitaciones_registro),
        ]);
    }

    public function obtenerRegistrosSanitarios(Mascota $mascota)
    {
        return [
            'estado' => 1,
            'vacunas' => $this->normalizarRegistros($mascota->vacunas_registro),
            'desparasitaciones' => $this->normalizarRegistros($mascota->desparasitaciones_registro),
        ];
    }

    public function guardarVacunaDesdeModal(Request $request, Mascota $mascota)
    {
        $validator = Validator::make($request->all(), [
            'edad' => 'nullable|string|max:120',
            'fecha_dosis' => 'required|date',
            'vacuna' => 'required|string|max:255',
            'proxima_dosis' => 'nullable|date|after_or_equal:fecha_dosis',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Datos inválidos',
                'error' => $validator->errors(),
            ], 422);
        }

        $vacunas = $this->normalizarRegistros($mascota->vacunas_registro);
        $vacunas[] = [
            'id' => uniqid('vac_', true),
            'edad' => trim((string) $request->input('edad', '')),
            'fecha_dosis' => $request->input('fecha_dosis'),
            'vacuna' => trim((string) $request->input('vacuna')),
            'proxima_dosis' => $request->input('proxima_dosis'),
            'created_at' => now()->toDateTimeString(),
        ];

        $mascota->vacunas_registro = $vacunas;
        $mascota->save();

        return [
            'estado' => 1,
            'msj' => 'Vacuna agregada correctamente',
            'vacunas' => $this->normalizarRegistros($mascota->vacunas_registro),
        ];
    }

    public function guardarDesparasitacionDesdeModal(Request $request, Mascota $mascota)
    {
        $validator = Validator::make($request->all(), [
            'fecha_dosis' => 'required|date',
            'antiparasitario' => 'required|string|max:255',
            'tipo' => 'required|string|in:Externo,Interno,Interno y Externo',
            'proxima_dosis' => 'nullable|date|after_or_equal:fecha_dosis',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Datos inválidos',
                'error' => $validator->errors(),
            ], 422);
        }

        $desparasitaciones = $this->normalizarRegistros($mascota->desparasitaciones_registro);
        $desparasitaciones[] = [
            'id' => uniqid('des_', true),
            'fecha_dosis' => $request->input('fecha_dosis'),
            'antiparasitario' => trim((string) $request->input('antiparasitario')),
            'tipo' => $request->input('tipo'),
            'proxima_dosis' => $request->input('proxima_dosis'),
            'created_at' => now()->toDateTimeString(),
        ];

        $mascota->desparasitaciones_registro = $desparasitaciones;
        $mascota->ultima_desparasitacion = $request->input('fecha_dosis');
        $mascota->producto_desparasitacion = trim((string) $request->input('antiparasitario'));
        $mascota->save();

        return [
            'estado' => 1,
            'msj' => 'Desparasitación agregada correctamente',
            'desparasitaciones' => $this->normalizarRegistros($mascota->desparasitaciones_registro),
        ];
    }

    private function normalizarRegistros($registros)
    {
        if (empty($registros)) {
            return [];
        }

        if (is_string($registros)) {
            $decoded = json_decode($registros, true);
            $registros = is_array($decoded) ? $decoded : [];
        }

        if (!is_array($registros)) {
            return [];
        }

        return array_values(array_filter($registros, function ($item) {
            return is_array($item);
        }));
    }
}
