<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\EspecieMascota;
use App\Models\HoraMedica;
use App\Models\LugarAtencion;
use App\Models\Mascota;
use App\Models\Paciente;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProfesionalHorario;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VetsdiInicioReservaController extends Controller
{
    public function catalogo()
    {
        $catalogoVeterinario = $this->getVeterinarySearchCatalog();

        return response()->json([
            'estado' => 1,
            'regiones' => Region::orderBy('nombre')->get(['id', 'nombre']),
            'areas_veterinarias' => collect($catalogoVeterinario)->map(function (array $area) {
                return [
                    'id' => $area['slug'],
                    'nombre' => $area['nombre'],
                ];
            })->values(),
            'especies' => EspecieMascota::orderBy('nombre')->get(['id', 'nombre']),
        ]);
    }

    public function ciudades(Request $request)
    {
        $request->validate([
            'id_region' => 'required|integer',
        ]);

        return response()->json([
            'estado' => 1,
            'ciudades' => Ciudad::where('id_region', (int) $request->input('id_region'))
                ->orderBy('nombre')
                ->get(['id', 'nombre']),
        ]);
    }

    public function tiposEspecialidad(Request $request)
    {
        $request->validate([
            'area' => 'required|string',
        ]);

        $area = $this->findVeterinaryAreaBySlug((string) $request->input('area'));

        return response()->json([
            'estado' => 1,
            'label_item' => $area['label_item'] ?? 'Servicio',
            'tipos_especialidad' => collect($area['items'] ?? [])->map(function (string $item) {
                return [
                    'id' => $item,
                    'nombre' => $item,
                ];
            })->values(),
        ]);
    }

    public function subtiposEspecialidad(Request $request)
    {
        return response()->json([
            'estado' => 1,
            'subtipos_especialidad' => [],
        ]);
    }

    public function profesionales(Request $request)
    {
        $veterinariaAreaSlug = trim((string) $request->input('veterinaria_area', ''));
        $veterinariaItem = trim((string) $request->input('veterinaria_item', ''));
        $veterinariaArea = $this->findVeterinaryAreaBySlug($veterinariaAreaSlug);

        $query = Profesional::query()
            ->with([
                'Especialidad:id,nombre',
                'TipoEspecialidad:id,nombre',
                'SubTipoEspecialidad:id,nombre',
                'Direccion:id,direccion,numero_dir,id_ciudad',
                'Direccion.Ciudad:id,nombre,id_region',
                'Direccion.Ciudad.Region:id,nombre',
                'LugaresAtencion' => function ($relation) {
                    $relation->select('lugares_atencion.id', 'lugares_atencion.nombre', 'lugares_atencion.id_direccion');
                },
                'LugaresAtencion.Direccion:id,direccion,numero_dir,id_ciudad',
                'LugaresAtencion.Direccion.Ciudad:id,nombre,id_region',
                'LugaresAtencion.Direccion.Ciudad.Region:id,nombre',
            ]);

        if ($request->filled('id_ciudad')) {
            $query->whereHas('Direccion', function ($relation) use ($request) {
                $relation->where('id_ciudad', (int) $request->input('id_ciudad'));
            });
        } elseif ($request->filled('id_region')) {
            $query->whereHas('Direccion.Ciudad', function ($relation) use ($request) {
                $relation->where('id_region', (int) $request->input('id_region'));
            });
        }

        if ($request->filled('q')) {
            $term = mb_strtolower(trim((string) $request->input('q')));
            $query->where(function ($nameQuery) use ($term) {
                $nameQuery->whereRaw('LOWER(nombre) LIKE ?', ["%{$term}%"])
                    ->orWhereRaw('LOWER(apellido_uno) LIKE ?', ["%{$term}%"])
                    ->orWhereRaw('LOWER(apellido_dos) LIKE ?', ["%{$term}%"])
                    ->orWhereRaw('LOWER(CONCAT(nombre, " ", apellido_uno, " ", apellido_dos)) LIKE ?', ["%{$term}%"]);
            });
        }

        $profesionales = $query->orderBy('apellido_uno')->orderBy('nombre')->limit(80)->get();

        $resultados = $profesionales->map(function (Profesional $profesional) use ($request, $veterinariaArea, $veterinariaItem) {
            $rutBase = explode('-', (string) $profesional->rut)[0] ?? '';
            $imagen = asset('images/iconos/usuario_profesional.svg');

            if ($rutBase !== '' && file_exists(public_path('images/img_perfil/'.$rutBase.'.png'))) {
                $imagen = asset('images/img_perfil/'.$rutBase.'.png');
            }

            $lugares = $profesional->LugaresAtencion->map(function (LugarAtencion $lugar) {
                $direccion = $lugar->Direccion;
                $ciudad = optional($direccion)->Ciudad;
                $region = optional($ciudad)->Region;

                return [
                    'id' => $lugar->id,
                    'nombre' => $lugar->nombre,
                    'direccion' => trim(
                        collect([
                            optional($direccion)->direccion,
                            optional($direccion)->numero_dir,
                            optional($ciudad)->nombre,
                            optional($region)->nombre,
                        ])->filter()->implode(', ')
                    ),
                    'ciudad' => optional($ciudad)->nombre,
                    'region' => optional($region)->nombre,
                    'ciudad_id' => optional($ciudad)->id,
                    'region_id' => optional($region)->id,
                ];
            });

            $lugaresFiltrados = $lugares->filter(function (array $lugar) use ($request) {
                if ($request->filled('id_ciudad')) {
                    return (int) ($lugar['ciudad_id'] ?? 0) === (int) $request->input('id_ciudad');
                }

                if ($request->filled('id_region')) {
                    return (int) ($lugar['region_id'] ?? 0) === (int) $request->input('id_region');
                }

                return true;
            })->values();

            if ($lugaresFiltrados->isEmpty()) {
                $lugaresFiltrados = $lugares->values();
            }

            $lugares = $lugaresFiltrados->map(function (array $lugar) {
                unset($lugar['ciudad_id'], $lugar['region_id']);

                return $lugar;
            });

            $direccionPrincipal = $profesional->Direccion;
            $ciudadPrincipal = optional($direccionPrincipal)->Ciudad;
            $regionPrincipal = optional($ciudadPrincipal)->Region;

            return [
                'id' => $profesional->id,
                'nombre' => trim($profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos),
                'especialidad' => $veterinariaArea['nombre'] ?? (optional($profesional->TipoEspecialidad)->nombre ?: optional($profesional->Especialidad)->nombre ?: 'Veterinario/a'),
                'tipo_especialidad' => $veterinariaItem !== '' ? $veterinariaItem : optional($profesional->SubTipoEspecialidad)->nombre,
                'sub_tipo_especialidad' => null,
                'email' => $profesional->email,
                'telefono' => $profesional->telefono ?? $profesional->telefono_uno ?? null,
                'imagen' => $imagen,
                'lugares_atencion' => $lugares,
                'agenda_publica_disponible' => $lugares->count() > 0,
                'direccion_principal' => trim(
                    collect([
                        optional($direccionPrincipal)->direccion,
                        optional($direccionPrincipal)->numero_dir,
                        optional($ciudadPrincipal)->nombre,
                        optional($regionPrincipal)->nombre,
                    ])->filter()->implode(', ')
                ),
            ];
        })->values();

        return response()->json([
            'estado' => 1,
            'registros' => $resultados,
        ]);
    }

    public function horas(Request $request)
    {
        $request->validate([
            'id_profesional' => 'required|integer',
            'id_lugar_atencion' => 'required|integer',
            'fecha' => 'required|date_format:Y-m-d',
        ]);

        $fecha = Carbon::createFromFormat('Y-m-d', $request->input('fecha'))->startOfDay();
        $horario = $this->getHorario((int) $request->input('id_profesional'), (int) $request->input('id_lugar_atencion'), $fecha);

        if (!$horario) {
            return response()->json([
                'estado' => 0,
                'msj' => 'No hay agenda configurada para la fecha seleccionada.',
                'horarios' => [],
            ]);
        }

        $duracion = $this->resolveDurationMinutes($horario);
        $bloques = [];

        $inicio = Carbon::parse($fecha->format('Y-m-d').' '.$horario->hora_inicio);
        $termino = Carbon::parse($fecha->format('Y-m-d').' '.$horario->hora_termino);

        for ($slot = $inicio->copy(); $slot->lt($termino); $slot->addMinutes($duracion)) {
            if ($this->slotDisponible((int) $request->input('id_profesional'), (int) $request->input('id_lugar_atencion'), $slot, $duracion)) {
                $bloques[] = [
                    'fecha' => $slot->format('Y-m-d'),
                    'hora' => $slot->format('H:i'),
                    'fecha_hora' => $slot->format('Y-m-d H:i'),
                    'timestamp' => $slot->timestamp,
                ];
            }
        }

        return response()->json([
            'estado' => 1,
            'msj' => 'registros',
            'text_fecha' => $fecha->translatedFormat('l d \\d\\e F \\d\\e Y'),
            'horarios' => $bloques,
        ]);
    }

    public function reservar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_profesional' => 'required|integer',
            'id_lugar_atencion' => 'required|integer',
            'fecha' => 'required|date_format:Y-m-d',
            'hora' => 'required|date_format:H:i',
            'responsable_nombres' => 'required|string|max:100',
            'responsable_apellido_uno' => 'required|string|max:50',
            'responsable_apellido_dos' => 'nullable|string|max:50',
            'responsable_email' => 'required|email|max:200',
            'responsable_telefono' => 'required|string|max:20',
            'mascota_nombre' => 'required|string|max:100',
            'mascota_especie_id' => 'required|integer|exists:especies_mascotas,id',
            'comentarios' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Datos incompletos o inválidos.',
                'errores' => $validator->errors(),
            ], 422);
        }

        $respuesta = DB::transaction(function () use ($request) {
            $profesional = Profesional::with(['Especialidad', 'TipoEspecialidad', 'SubTipoEspecialidad'])->findOrFail((int) $request->input('id_profesional'));
            $lugar = LugarAtencion::with('Direccion.Ciudad')->findOrFail((int) $request->input('id_lugar_atencion'));
            $especie = EspecieMascota::findOrFail((int) $request->input('mascota_especie_id'));

            $inicio = Carbon::createFromFormat('Y-m-d H:i', $request->input('fecha').' '.$request->input('hora'));
            $horario = $this->getHorario($profesional->id, $lugar->id, $inicio);

            if (!$horario) {
                return response()->json([
                    'estado' => 0,
                    'msj' => 'El profesional no atiende en ese bloque.',
                ], 422);
            }

            $duracion = $this->resolveDurationMinutes($horario);

            if (!$this->slotDisponible($profesional->id, $lugar->id, $inicio, $duracion)) {
                return response()->json([
                    'estado' => 0,
                    'msj' => 'La hora seleccionada ya no está disponible.',
                ], 409);
            }

            $paciente = Paciente::whereRaw('LOWER(email) = ?', [mb_strtolower($request->input('responsable_email'))])->first();

            if (!$paciente) {
                $paciente = new Paciente();
                $paciente->token = md5(uniqid((string) mt_rand(), true));
                $paciente->rut = $this->generateExternalRut();
                $paciente->nombres = trim((string) $request->input('responsable_nombres'));
                $paciente->apellido_uno = trim((string) $request->input('responsable_apellido_uno'));
                $paciente->apellido_dos = trim((string) $request->input('responsable_apellido_dos', '')) ?: 'N/A';
                $paciente->telefono_uno = trim((string) $request->input('responsable_telefono'));
                $paciente->sexo = 'O';
                $paciente->email = mb_strtolower(trim((string) $request->input('responsable_email')));
                $paciente->fecha_nac = '2000-01-01';
                $paciente->id_prevision = optional(Prevision::orderBy('id')->first())->id ?? 1;
                $paciente->save();
            } else {
                $paciente->telefono_uno = trim((string) $request->input('responsable_telefono'));
                $paciente->nombres = trim((string) $request->input('responsable_nombres'));
                $paciente->apellido_uno = trim((string) $request->input('responsable_apellido_uno'));
                $paciente->apellido_dos = trim((string) $request->input('responsable_apellido_dos', '')) ?: ($paciente->apellido_dos ?: 'N/A');
                $paciente->save();
            }

            $mascota = new Mascota();
            $mascota->id_responsable = $paciente->id;
            $mascota->nombre = trim((string) $request->input('mascota_nombre'));
            $mascota->especie_id = $especie->id;
            $mascota->especie = $especie->id;
            $mascota->id_user = $paciente->id_usuario;
            $mascota->estado = 1;
            $mascota->save();

            $horaMedica = new HoraMedica();
            $horaMedica->id_paciente = $paciente->id;
            $horaMedica->id_mascota = $mascota->id;
            $horaMedica->id_profesional = $profesional->id;
            $horaMedica->id_estado = 1;
            $horaMedica->id_lugar_atencion = $lugar->id;
            $horaMedica->fecha_consulta = $inicio->format('Y-m-d');
            $horaMedica->hora_inicio = $inicio->format('H:i:s');
            $horaMedica->hora_termino = $inicio->copy()->addMinutes($duracion)->subSecond()->format('H:i:s');
            $horaMedica->tipo_hora_medica = 'C';
            $horaMedica->alias_examen = 'Consulta';
            $horaMedica->descripcion = trim($paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos);
            $horaMedica->observaciones = trim(
                'Reserva externa VET SDI. Mascota: '.$mascota->nombre.' ('.$especie->nombre.').' .
                (!empty($request->input('comentarios')) ? ' Observaciones: '.$request->input('comentarios') : '')
            );
            $horaMedica->save();

            $direccion = optional($lugar->Direccion);
            $ciudad = optional($direccion->Ciudad);

            SendMailController::envioCorreo(
                'hora_agendada',
                [[
                    'email' => $paciente->email,
                    'name' => trim($paciente->nombres.' '.$paciente->apellido_uno),
                ]],
                [],
                [],
                'VET SDI - Reserva confirmada',
                [
                    'nombre_paciente' => trim($paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos),
                    'fecha' => $horaMedica->fecha_consulta,
                    'hora' => substr($horaMedica->hora_inicio, 0, 5),
                    'profesional_nombre' => trim($profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos),
                    'profesional_especialidad' => optional($profesional->Especialidad)->nombre,
                    'profesional_tipo_especialidad' => optional($profesional->TipoEspecialidad)->nombre,
                    'profesional_sub_tipo_especialidad' => optional($profesional->SubTipoEspecialidad)->nombre,
                    'lugar_atencion' => $lugar->nombre,
                    'direccion' => trim(
                        collect([
                            $direccion->direccion ?? null,
                            $direccion->numero_dir ?? null,
                            $ciudad->nombre ?? null,
                        ])->filter()->implode(', ')
                    ),
                    'mascota_nombre' => $mascota->nombre,
                    'mascota_especie' => $especie->nombre,
                ],
                '',
                ''
            );

            return response()->json([
                'estado' => 1,
                'msj' => 'Reserva creada correctamente.',
                'registro' => [
                    'id' => $horaMedica->id,
                    'fecha' => $horaMedica->fecha_consulta,
                    'hora' => substr($horaMedica->hora_inicio, 0, 5),
                    'profesional' => trim($profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos),
                    'lugar_atencion' => $lugar->nombre,
                    'mascota' => $mascota->nombre,
                    'especie' => $especie->nombre,
                ],
            ]);
        });

        return $respuesta;
    }

    protected function getHorario(int $idProfesional, int $idLugarAtencion, Carbon $fecha): ?ProfesionalHorario
    {
        $dia = (int) $fecha->format('N');

        return ProfesionalHorario::where('id_profesional', $idProfesional)
            ->where('id_lugar_atencion', $idLugarAtencion)
            ->where('dia', 'like', '%'.$dia.'%')
            ->where('tipo_agenda', 1)
            ->first();
    }

    protected function resolveDurationMinutes(ProfesionalHorario $horario): int
    {
        $duracion = explode(':', (string) $horario->duracion_consulta);
        $horas = isset($duracion[0]) ? (int) $duracion[0] : 0;
        $minutos = isset($duracion[1]) ? (int) $duracion[1] : 0;
        $total = ($horas * 60) + $minutos;

        return $total > 0 ? $total : 15;
    }

    protected function slotDisponible(int $idProfesional, int $idLugarAtencion, Carbon $inicio, int $duracion): bool
    {
        $termino = $inicio->copy()->addMinutes($duracion)->subSecond();

        return !HoraMedica::where('id_profesional', $idProfesional)
            ->where('id_lugar_atencion', $idLugarAtencion)
            ->where('fecha_consulta', $inicio->format('Y-m-d'))
            ->whereNotIn('id_estado', [3, 14, 15])
            ->where(function ($query) use ($inicio, $termino) {
                $query->whereBetween('hora_inicio', [$inicio->format('H:i:s'), $termino->format('H:i:s')])
                    ->orWhereBetween('hora_termino', [$inicio->format('H:i:s'), $termino->format('H:i:s')])
                    ->orWhere(function ($subQuery) use ($inicio, $termino) {
                        $subQuery->where('hora_inicio', '<=', $inicio->format('H:i:s'))
                            ->where('hora_termino', '>=', $termino->format('H:i:s'));
                    });
            })
            ->exists();
    }

    protected function generateExternalRut(): string
    {
        do {
            $rut = 'EXT'.str_pad((string) random_int(0, 999999999), 9, '0', STR_PAD_LEFT);
        } while (Paciente::where('rut', $rut)->exists());

        return $rut;
    }

    protected function getVeterinarySearchCatalog(): array
    {
        return [
            [
                'slug' => 'procedimientos_examenes',
                'nombre' => 'Procedimiento / Exámenes',
                'label_item' => 'Procedimiento / Exámenes',
                'items' => [
                    'Exámenes Sanguíneos',
                    'Radiografías',
                    'Ecografía abdominal',
                    'Ecografía tiroides',
                    'Ecografía tórax extra cardiaca',
                    'TAC',
                    'Toma Muestra de Sangre',
                    'Ecografía Cuello',
                ],
            ],
            [
                'slug' => 'consulta_veterinaria',
                'nombre' => 'Consulta Veterinaria',
                'label_item' => 'Consulta',
                'items' => [
                    'Consulta General Felino',
                    'Consulta General Canino',
                    'Implantación Microchip',
                    'Control Felino',
                    'Control Canino',
                ],
            ],
            [
                'slug' => 'consulta_especialista',
                'nombre' => 'Consulta Especialista',
                'label_item' => 'Especialidad',
                'items' => [
                    'Broncopulmonar',
                    'Cardiología',
                    'Neurología',
                    'Odontología',
                    'Especialista Felino',
                    'Especialista Canino',
                    'Nefrología',
                    'Oftalmología',
                    'Otorrinolaringología',
                    'Dermatología',
                    'Geriatría',
                    'Consulta Cirujano',
                    'Medicina Interna Canino',
                    'Medicina Interna Felino',
                    'Oncología',
                    'Traumatología',
                    'Fisiatría',
                    'Sesión Fisiatría',
                ],
            ],
            [
                'slug' => 'vacunacion',
                'nombre' => 'Vacunación',
                'label_item' => 'Vacuna',
                'items' => [
                    'Vacunación Canino',
                    'Vacunación Felino',
                ],
            ],
            [
                'slug' => 'visita_hospital',
                'nombre' => 'Visita Hospital',
                'label_item' => 'Servicio',
                'items' => [
                    'Visita Hospital',
                ],
            ],
            [
                'slug' => 'peluqueria',
                'nombre' => 'Peluquería',
                'label_item' => 'Servicio',
                'items' => [
                    'Peluquería / Baño y Mantenimiento',
                    'Corte de uñas',
                ],
            ],
        ];
    }

    protected function findVeterinaryAreaBySlug(string $slug): ?array
    {
        foreach ($this->getVeterinarySearchCatalog() as $area) {
            if (($area['slug'] ?? '') === $slug) {
                return $area;
            }
        }

        return null;
    }
}
