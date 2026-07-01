<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\PacientesDependientes;
use App\Models\Mascota;
use App\Models\EspecieMascota;
use App\Models\EspecieTamanoMascota;
use App\Models\RazaMascota;
use App\Models\TamanoMascota;
use App\Models\FichaAtencion;
use App\Models\HoraMedica;
use App\Models\Profesional;
use App\Models\Producto;
use App\Support\LugarAtencionInstitucionResolver;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class MascotasController extends Controller
{
    public function buscarProductosSuscripcion(Request $request)
    {
        $search = trim((string) $request->input('search', ''));

        $productos = Producto::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('nombre', 'like', '%' . $search . '%')
                        ->orWhere('codigo_interno', 'like', '%' . $search . '%')
                        ->orWhere('descripcion', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('nombre', 'asc')
            ->limit(20)
            ->get(['id', 'nombre', 'codigo_interno', 'descripcion']);

        $response = $productos->map(function ($producto) {
            $label = $producto->nombre;

            if (!empty($producto->codigo_interno)) {
                $label .= ' (' . $producto->codigo_interno . ')';
            }

            return [
                'value' => $producto->id,
                'label' => $label,
                'name' => $producto->nombre,
                'codigo_interno' => $producto->codigo_interno,
                'descripcion' => $producto->descripcion,
            ];
        })->values();

        return response()->json($response);
    }

    public function index()
    {
        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        $idLugarAtencion = request()->input('id_lugar_atencion');
        $mascotas = Mascota::with(['especieMascota', 'tamanoMascota', 'lugaresAtencion'])
            ->where('id_responsable', optional($paciente)->id)
            ->porLugarAtencion($idLugarAtencion)
            ->get();
        $especies = EspecieMascota::orderBy('nombre')->get();
        $tamanos = TamanoMascota::orderBy('nombre')->get();
        $especieTamanos = EspecieTamanoMascota::with(['especie', 'tamano'])->get();

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
            'fichasMascota' => collect(),
        ]);
    }

    public function obtenerFichasMascota($mascotaId)
    {
        $mascota = $this->resolverMascota($mascotaId);
        if (!$mascota) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Mascota no encontrada',
                'registros' => [],
            ], 404);
        }

        $registros = FichaAtencion::with(['Profesional', 'LugarAtencion'])
            ->where('id_mascota', $mascota->id)
            ->where('id_paciente', $mascota->id_responsable)
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->get()
            ->map(function ($ficha) {
                $profesional = $ficha->Profesional;
                $lugarAtencion = $ficha->LugarAtencion;

                return [
                    'id' => $ficha->id,
                    'fecha' => optional($ficha->created_at)->format('d/m/Y'),
                    'diagnostico' => $ficha->hipotesis_diagnostico ?: '-',
                    'indicaciones' => $ficha->indicaciones ?: '-',
                    'profesional' => trim(collect([
                        optional($profesional)->nombre,
                        optional($profesional)->apellido_uno,
                        optional($profesional)->apellido_dos,
                    ])->filter()->implode(' ')) ?: 'Sin profesional registrado',
                    'lugar_atencion' => optional($lugarAtencion)->nombre ?: 'Sin lugar registrado',
                ];
            })
            ->values();

        return response()->json([
            'estado' => 1,
            'msj' => 'registros',
            'registros' => $registros,
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
            'id_lugar_atencion' => 'nullable|integer|exists:lugares_atencion,id',
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
            $idLugarAtencion = $request->filled('id_lugar_atencion')
                ? (int) $request->input('id_lugar_atencion')
                : null;
            $idInstitucion = LugarAtencionInstitucionResolver::resolve($idLugarAtencion);
            $mascota->vincularLugarAtencion($idLugarAtencion, $idInstitucion, 'portal_responsable');

            return [
                'estado' => 1,
                'msj' => 'Mascota registrada con exito.',
                'registro' => $mascota->load(['especieMascota', 'razaMascota', 'tamanoMascota', 'lugaresAtencion']),
            ];
        }

        return [
            'estado' => 0,
            'msj' => 'Problemas al registrar la mascota',
        ];
    }

    public function update(Request $request, Mascota $mascota)
    {
        $user = Auth::user();
        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        $autorizado = $paciente && ((int)$mascota->id_responsable === (int)$paciente->id);

        // Permitir actualización desde ficha profesional cuando exista relación real
        // entre profesional, paciente responsable y mascota.
        if (!$autorizado && $user && ($user->hasRole('Profesional') || $user->hasRole('Admin') || $user->hasRole('admin'))) {
            $idResponsable = (int)$request->input('id_responsable');
            if ($idResponsable > 0 && (int)$mascota->id_responsable === $idResponsable) {
                $profesional = Profesional::where('id_usuario', $user->id)->first();
                if ($profesional) {
                    $tieneHora = HoraMedica::where('id_profesional', $profesional->id)
                        ->where('id_paciente', $idResponsable)
                        ->where('id_mascota', $mascota->id)
                        ->exists();

                    $tieneFicha = FichaAtencion::where('id_profesional', $profesional->id)
                        ->where('id_paciente', $idResponsable)
                        ->where('id_mascota', $mascota->id)
                        ->exists();

                    $autorizado = ($tieneHora || $tieneFicha);
                }
            }
        }

        if (!$autorizado) {
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
            'id_lugar_atencion' => 'nullable|integer|exists:lugares_atencion,id',
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
            $idLugarAtencion = $request->filled('id_lugar_atencion')
                ? (int) $request->input('id_lugar_atencion')
                : null;
            $idInstitucion = LugarAtencionInstitucionResolver::resolve($idLugarAtencion);
            $mascota->vincularLugarAtencion($idLugarAtencion, $idInstitucion, 'actualizacion');

            return [
                'estado' => 1,
                'msj' => 'Mascota actualizada con exito.',
                'registro' => $mascota->load(['especieMascota', 'razaMascota', 'tamanoMascota', 'lugaresAtencion']),
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

        $mascotas = Mascota::with(['especieMascota', 'razaMascota', 'tamanoMascota', 'lugaresAtencion'])
            ->where('id_responsable', $paciente->id)
            ->porLugarAtencion($request->input('id_lugar_atencion'))
            ->get();

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

    public function suscripcion_servicios(Request $request){
        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        $mascotas = collect();
        $mascotaActiva = null;

        if ($paciente) {
            $mascotas = Mascota::where('id_responsable', $paciente->id)
                ->orderBy('nombre')
                ->get();

            $mascotaActiva = $this->resolverMascota($request->input('id_dependiente_activo'));

            if (!$mascotaActiva && $mascotas->count() === 1) {
                $mascotaActiva = $mascotas->first();
            }
        }

        $petsData = $mascotas->map(function ($mascota) {
            return [
                'id' => $mascota->id,
                'nombre' => $mascota->nombre,
                'suscripciones' => array_values($mascota->suscripciones_servicios_registro ?? []),
                'reservas' => array_values($mascota->reservas_servicios_registro ?? []),
            ];
        })->values();

        return view('app.paciente_dependiente.suscripcion_servicios', [
            'paciente' => $paciente,
            'mascotas' => $mascotas,
            'mascotaActiva' => $mascotaActiva,
            'petsData' => $petsData,
        ]);
    }

    public function guardarSuscripcionServicio(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_mascota' => 'required|integer',
                'servicio' => 'required|string|in:alimentos,farmacia,pet_shop',
                'lugar_nombre' => 'required|string|max:255',
                'lugar_direccion' => 'nullable|string|max:255',
                'items' => 'required|array|min:1',
                'items.*.name' => 'required|string|max:255',
                'items.*.quantity' => 'required|integer|min:1',
                'items.*.presentation' => 'required|string|max:255',
            ],
            [
                'id_mascota.required' => 'Debe seleccionar una mascota.',
                'servicio.in' => 'El servicio seleccionado no admite suscripción.',
                'items.required' => 'Debe agregar al menos un producto.',
                'items.min' => 'Debe agregar al menos un producto.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Datos inválidos',
                'error' => $validator->errors(),
            ], 422);
        }

        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        if (!$paciente) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Responsable no encontrado',
            ], 404);
        }

        $mascota = Mascota::where('id', $request->input('id_mascota'))
            ->where('id_responsable', $paciente->id)
            ->first();

        if (!$mascota) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Mascota no encontrada',
            ], 404);
        }

        $suscripciones = $this->normalizarRegistros($mascota->suscripciones_servicios_registro);
        $registro = [
            'id' => uniqid('sus_', true),
            'servicio' => $request->input('servicio'),
            'lugar_nombre' => trim((string) $request->input('lugar_nombre')),
            'lugar_direccion' => trim((string) $request->input('lugar_direccion', '')),
            'items' => collect($request->input('items', []))
                ->map(function ($item) {
                    return [
                        'name' => trim((string) ($item['name'] ?? '')),
                        'quantity' => (int) ($item['quantity'] ?? 0),
                        'presentation' => trim((string) ($item['presentation'] ?? '')),
                    ];
                })
                ->filter(function ($item) {
                    return $item['name'] !== '' && $item['quantity'] > 0 && $item['presentation'] !== '';
                })
                ->values()
                ->all(),
            'estado' => 'pendiente',
            'created_at' => now()->toDateTimeString(),
        ];

        $suscripciones[] = $registro;
        $mascota->suscripciones_servicios_registro = $suscripciones;
        $mascota->save();

        return response()->json([
            'estado' => 1,
            'msj' => 'Suscripción registrada correctamente',
            'registro' => $registro,
            'suscripciones' => $this->normalizarRegistros($mascota->suscripciones_servicios_registro),
        ]);
    }

    public function guardarReservaServicio(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_mascota' => 'required|integer',
                'servicio' => 'required|string|in:peluqueria,hotel_mascotas',
                'lugar_nombre' => 'required|string|max:255',
                'lugar_direccion' => 'nullable|string|max:255',
                'fecha' => 'required|date',
                'hora' => 'required|date_format:H:i',
            ],
            [
                'id_mascota.required' => 'Debe seleccionar una mascota.',
                'servicio.in' => 'El servicio seleccionado no admite reserva.',
                'fecha.required' => 'Debe seleccionar una fecha.',
                'hora.required' => 'Debe seleccionar una hora.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Datos inválidos',
                'error' => $validator->errors(),
            ], 422);
        }

        $paciente = Paciente::where('id_usuario', Auth::id())->first();
        if (!$paciente) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Responsable no encontrado',
            ], 404);
        }

        $mascota = Mascota::where('id', $request->input('id_mascota'))
            ->where('id_responsable', $paciente->id)
            ->first();

        if (!$mascota) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Mascota no encontrada',
            ], 404);
        }

        $reservas = $this->normalizarRegistros($mascota->reservas_servicios_registro);
        $registro = [
            'id' => uniqid('res_', true),
            'servicio' => $request->input('servicio'),
            'lugar_nombre' => trim((string) $request->input('lugar_nombre')),
            'lugar_direccion' => trim((string) $request->input('lugar_direccion', '')),
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
            'estado' => 'pendiente',
            'created_at' => now()->toDateTimeString(),
        ];

        $reservas[] = $registro;
        $mascota->reservas_servicios_registro = $reservas;
        $mascota->save();

        return response()->json([
            'estado' => 1,
            'msj' => 'Reserva registrada correctamente',
            'registro' => $registro,
            'reservas' => $this->normalizarRegistros($mascota->reservas_servicios_registro),
        ]);
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

     public function pagos_suscripcion(){
        return view('app.paciente_dependiente.pagos_suscripcion');
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
        $mascota = $this->resolverMascota($request->id_dependiente_activo);

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
        $mascota = $this->resolverMascota($request->id_dependiente_activo);

        if (!$mascota) {
            return back()->with('error', 'Mascota no encontrada');
        }

        return view('app.paciente_dependiente.registro_desparasitacion',[
            'mascota' => $mascota,
            'paciente' => $paciente,
            'desparasitaciones' => $this->normalizarRegistros($mascota->desparasitaciones_registro),
        ]);
    }

    public function obtenerRegistrosSanitarios($mascotaId)
    {
        $mascota = $this->resolverMascota($mascotaId);
        if (!$mascota) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Mascota no encontrada',
                'vacunas' => [],
                'desparasitaciones' => [],
            ], 404);
        }

        return [
            'estado' => 1,
            'vacunas' => $this->normalizarRegistros($mascota->vacunas_registro),
            'desparasitaciones' => $this->normalizarRegistros($mascota->desparasitaciones_registro),
        ];
    }

    public function guardarVacunaDesdeModal(Request $request, $mascotaId)
    {
        $mascota = $this->resolverMascota($mascotaId);
        if (!$mascota) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Mascota no encontrada',
            ], 404);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'edad' => 'nullable|string|max:120',
                'fecha_dosis' => 'required|date',
                'vacuna' => 'required|string|max:255',
                'proxima_dosis' => 'nullable|date|after_or_equal:fecha_dosis',
            ],
            [
                'fecha_dosis.required' => 'Debe ingresar la fecha de dosis.',
                'fecha_dosis.date' => 'La fecha de dosis no es válida.',
                'vacuna.required' => 'Debe ingresar el nombre de la vacuna.',
                'vacuna.max' => 'El nombre de la vacuna no puede superar 255 caracteres.',
                'proxima_dosis.date' => 'La próxima dosis no es una fecha válida.',
                'proxima_dosis.after_or_equal' => 'La próxima dosis debe ser igual o posterior a la fecha de dosis.',
            ]
        );

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

    public function guardarDesparasitacionDesdeModal(Request $request, $mascotaId)
    {
        $mascota = $this->resolverMascota($mascotaId);
        if (!$mascota) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Mascota no encontrada',
            ], 404);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'fecha_dosis' => 'required|date',
                'antiparasitario' => 'required|string|max:255',
                'tipo' => 'required|string|in:Externo,Interno,Interno y Externo',
                'proxima_dosis' => 'nullable|date|after_or_equal:fecha_dosis',
            ],
            [
                'fecha_dosis.required' => 'Debe ingresar la fecha de dosis.',
                'fecha_dosis.date' => 'La fecha de dosis no es válida.',
                'antiparasitario.required' => 'Debe ingresar el antiparasitario.',
                'antiparasitario.max' => 'El antiparasitario no puede superar 255 caracteres.',
                'tipo.required' => 'Debe seleccionar el tipo.',
                'tipo.in' => 'El tipo seleccionado no es válido.',
                'proxima_dosis.date' => 'La próxima dosis no es una fecha válida.',
                'proxima_dosis.after_or_equal' => 'La próxima dosis debe ser igual o posterior a la fecha de dosis.',
            ]
        );

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

    private function resolverMascota($id)
    {
        if (empty($id)) {
            return null;
        }

        $mascota = Mascota::find($id);
        if ($mascota) {
            return $mascota;
        }

        // Compatibilidad con IDs legacy (id_paciente dependiente).
        $dependencia = PacientesDependientes::where('id_paciente', $id)->first();
        if (!$dependencia) {
            return null;
        }

        $pacienteDependiente = Paciente::find($id);
        $nombreMascota = trim((string) ($pacienteDependiente->nombres ?? ''));
        if ($nombreMascota === '') {
            $nombreMascota = 'Mascota #' . $id;
        }

        $mascota = Mascota::where('id_responsable', $dependencia->id_responsable)
            ->where('nombre', $nombreMascota)
            ->first();

        return $mascota;
    }
}


