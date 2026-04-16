<?php



namespace App\Http\Controllers;



use Carbon\Carbon;

use App\Models\Ciudad;

use App\Models\ConConsentimientosPcte;

use App\Models\Especialidad;

use App\Models\FichaAtencion;

use App\Models\HoraMedica;

use App\Models\Mascota;

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

    private function nombreCompletoProfesional(?Profesional $profesional): string

    {

        if (!$profesional) {
            return '';
        }



        return trim(collect([
            $profesional->nombre,
            $profesional->apellido_uno,
            $profesional->apellido_dos,
        ])->filter()->implode(' '));

    }



    private function obtenerHorasAgendadasMascota(int $idResponsable, int $idMascota)

    {

        return HoraMedica::with([
                'Mascota.especieMascota',
                'Profesional.Especialidad',
                'Profesional.TipoEspecialidad',
                'Profesional.SubTipoEspecialidad',
                'LugarAtencion.Direccion.Ciudad',
                'Estado',
            ])
            ->where('id_paciente', $idResponsable)
            ->where('id_mascota', $idMascota)
            ->whereDate('fecha_consulta', '>=', date('Y-m-d'))
            ->orderBy('fecha_consulta', 'ASC')
            ->orderBy('hora_inicio', 'ASC')
            ->get()
            ->map(function ($horaMedica) {
                $profesional = $horaMedica->Profesional;
                $lugarAtencion = $horaMedica->LugarAtencion;
                $direccion = optional($lugarAtencion)->Direccion;
                $mascota = $horaMedica->Mascota;
                $fechaHoraAtencion = Carbon::parse($horaMedica->fecha_consulta . ' ' . $horaMedica->hora_inicio);
                $estadoVisual = (int) $horaMedica->id_estado;

                if ($fechaHoraAtencion->isFuture() && in_array($estadoVisual, [4, 5, 6, 7], true)) {
                    $estadoVisual = 2;
                }

                $especialidad = '';
                if (!empty(optional($profesional)->SubTipoEspecialidad->nombre)) {
                    $especialidad = $profesional->SubTipoEspecialidad->nombre;
                } elseif (!empty(optional($profesional)->TipoEspecialidad->nombre)) {
                    $especialidad = $profesional->TipoEspecialidad->nombre;
                } elseif (!empty(optional($profesional)->Especialidad->nombre)) {
                    $especialidad = $profesional->Especialidad->nombre;
                }

                $especieMascota = '';
                if (!empty(optional($mascota)->especieMascota->nombre)) {
                    $especieMascota = $mascota->especieMascota->nombre;
                } elseif (!empty(optional($mascota)->especie)) {
                    $especieMascota = $mascota->especie;
                }

                switch ($estadoVisual) {
                    case 1:
                    case 8:
                    case 16:
                        $textoEstado = 'Hora pendiente por confirmar';
                        break;
                    case 2:
                        $textoEstado = 'Hora confirmada';
                        break;
                    case 3:
                        $textoEstado = 'Hora cancelada';
                        break;
                    case 4:
                        $textoEstado = 'Hora en espera';
                        break;
                    case 5:
                        $textoEstado = 'Hora en atencion';
                        break;
                    case 6:
                        $textoEstado = 'Hora realizada';
                        break;
                    case 7:
                        $textoEstado = 'Hora inasistida';
                        break;
                    default:
                        $textoEstado = optional($horaMedica->Estado)->descripcion ?? 'Estado desconocido';
                        break;
                }

                $horaMedica->nombre_profesional_completo = $this->nombreCompletoProfesional($profesional);
                $horaMedica->nombre_especialidad_resumen = $especialidad;
                $horaMedica->nombre_mascota = optional($mascota)->nombre;
                $horaMedica->nombre_especie_mascota = $especieMascota;
                $horaMedica->nombre_lugar_atencion = optional($lugarAtencion)->nombre;
                $horaMedica->direccion_lugar_atencion = trim(collect([
                    optional($direccion)->direccion,
                    optional($direccion)->numero_dir,
                ])->filter()->implode(' '));
                $horaMedica->id_estado_visual = $estadoVisual;
                $horaMedica->texto_estado = $textoEstado;

                return $horaMedica;
            });

    }

    private function getVeterinarySearchCatalog(): array

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

        if (!$paciente_responsable) {
            return back()->with('error', 'Responsable no encontrado');
        }

        /** dependiente (solo mascotas) */

        $mascota_dependiente = Mascota::where('id', $request->id_dependiente_activo)
            ->where('id_responsable', $paciente_responsable->id)
            ->first();

        if ($mascota_dependiente) {
            return view('app.paciente_dependiente.escritorio_paciente_dependiente')->with([
                'paciente' => $mascota_dependiente,
                'responsable' => $paciente_responsable,
                'mascota' => $mascota_dependiente,
                'hora_medica' => $this->obtenerHorasAgendadasMascota($paciente_responsable->id, $mascota_dependiente->id),
            ]);
        }

        return back()->with('error', 'Dependiente no registrado bajo su tutela');

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

        $catalogo_veterinario_busqueda = $this->getVeterinarySearchCatalog();



        if(Auth::user()->hasRole('Paciente'))

        {

            $user = Auth::user();

            $paciente = Paciente::where('id_usuario', $user->id)->first();

            if (!$paciente) {
                return back()->with('error', 'Responsable no encontrado');
            }

            $paciente_dependiente = Mascota::where('id', $id_dependiente_activo_)
                ->where('id_responsable', $paciente->id)
                ->first();

            if (!$paciente_dependiente) {
                return back()->with('error', 'Mascota no encontrada');
            }

            // return view('app.paciente.buscador_profesional_paciente')->with(

            return view('app.general.buscador_profesionales.buscador')->with(

                [

                    'id_responsable' => $paciente->id,

                    'id_dependiente_activo' => $paciente_dependiente->id,

                    'es_veterinaria_busqueda' => true,

                    'catalogo_veterinario_busqueda' => $catalogo_veterinario_busqueda,

                    'profesiones' => $profesiones,

                    'especialidades' => $especialidades,

                    'sub_especialidades' => $sub_especialidades,

                    'previsiones' => $previsiones,

                    'paciente' => $paciente_dependiente,

                    'mascota' => $paciente_dependiente,

                    'responsable' => $paciente,

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

        if (!$paciente_responsable) {
            return back()->with('error', 'Responsable no encontrado');
        }

        /** dependiente */

        $paciente_dependiente = Mascota::where('id', $id_dependiente_activo_)
            ->where('id_responsable', $paciente_responsable->id)
            ->first();

        if (!$paciente_dependiente) {
            return back()->with('error', 'Mascota no encontrada');
        }



        // DESVINCULAR profesional

        if($id_usuario_ != 0 && $id_profesional_ != 0)

        {

            $fichas = FichaAtencion::where('id_paciente', $paciente_responsable->id)
                                     ->where('id_mascota', $paciente_dependiente->id)

                                     ->where('id_profesional', $id_profesional_)

                                     ->first();



            if($fichas)

            {

                $fichas->desvincular = 1;

                $fichas->save();

            }

        }



        // VER lista de profesionales

        $fichas = FichaAtencion::where('id_paciente', $paciente_responsable->id)
            ->where('id_mascota', $paciente_dependiente->id)
            ->get()
            ->unique('id_profesional');



        $fichas_desvinculados = FichaAtencion::select('id_profesional')

                                        ->where('id_paciente', $paciente_responsable->id)
                                        ->where('id_mascota', $paciente_dependiente->id)

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



    public function miFichaMedica($id_dependiente_activo_)

    {

        $paciente_responsable = Paciente::where('id_usuario', Auth::user()->id)->first();

        if (!$paciente_responsable) {

            return back()->with('error', 'Responsable no encontrado');

        }



        $mascota = Mascota::with(['especieMascota', 'razaMascota', 'tamanoMascota'])

            ->where('id', $id_dependiente_activo_)

            ->where('id_responsable', $paciente_responsable->id)

            ->first();



        if (!$mascota) {

            return back()->with('error', 'Mascota no encontrada');

        }



        $datosFvu = $this->buildVeterinaryRecordData($mascota, $paciente_responsable);



        return view('app.paciente_dependiente.ficha_veterinaria_unica', array_merge($datosFvu, [

            'paciente' => $mascota,

            'responsable' => $paciente_responsable,

            'mascota' => $mascota

        ]));

    }



    public function recetaOnline(Request $request)

    {

        $paciente_responsable = Paciente::where('id_usuario', Auth::user()->id)->first();
        if (!$paciente_responsable) {
            return back()->with('error', 'Responsable no encontrado');
        }

        $paciente = Mascota::where('id', $request->id_dependiente_activo)
            ->where('id_responsable', $paciente_responsable->id)
            ->first();

        if (!$paciente) {
            return back()->with('error', 'Mascota no encontrada');
        }

        return view('app.paciente_dependiente.receta.inicio_receta', [
            'id_dependiente_activo' => $request->id_dependiente_activo,
            'paciente' => $paciente,
            'mascota' => $paciente,
            'responsable' => $paciente_responsable,
        ]);

    }



    public function receta_misexamenes(Request $request)

    {

        $paciente_responsable = Paciente::where('id_usuario', Auth::user()->id)->first();
        if (!$paciente_responsable) {
            return back()->with('error', 'Responsable no encontrado');
        }

        $paciente = Mascota::where('id', $request->id_dependiente_activo)
            ->where('id_responsable', $paciente_responsable->id)
            ->first();

        if (!$paciente) {
            return back()->with('error', 'Mascota no encontrada');
        }

        return view('app.paciente_dependiente.receta.mis_examenes', [
            'id_dependiente_activo' => $request->id_dependiente_activo,
            'paciente' => $paciente,
            'mascota' => $paciente,
            'responsable' => $paciente_responsable,
        ]);

    }



    public function receta_misrecetas(Request $request)

    {

        $paciente_responsable = Paciente::where('id_usuario', Auth::user()->id)->first();
        if (!$paciente_responsable) {
            return back()->with('error', 'Responsable no encontrado');
        }

        $paciente = Mascota::where('id', $request->id_dependiente_activo)
            ->where('id_responsable', $paciente_responsable->id)
            ->first();

        if (!$paciente) {
            return back()->with('error', 'Mascota no encontrada');
        }

        $fichas = FichaAtencion::where('id_mascota', $paciente->id)
            ->where('id_paciente', $paciente_responsable->id)
            ->get();

        return view('app.paciente_dependiente.receta.mis_recetas', [
            'fichas' => $fichas,
            'id_dependiente_activo' => $request->id_dependiente_activo,
            'paciente' => $paciente,
            'mascota' => $paciente,
            'responsable' => $paciente_responsable,
        ]);

    }



    public function receta_miscertificados(Request $request)

    {

        $paciente_responsable = Paciente::where('id_usuario', Auth::user()->id)->first();
        if (!$paciente_responsable) {
            return back()->with('error', 'Responsable no encontrado');
        }

        $paciente = Mascota::where('id', $request->id_dependiente_activo)
            ->where('id_responsable', $paciente_responsable->id)
            ->first();

        if (!$paciente) {
            return back()->with('error', 'Mascota no encontrada');
        }

        $fichas = FichaAtencion::where('id_mascota', $paciente->id)
            ->where('id_paciente', $paciente_responsable->id)
            ->get();

        return view('app.paciente_dependiente.receta.mis_certificados', [
            'fichas' => $fichas,
            'id_dependiente_activo' => $request->id_dependiente_activo,
            'paciente' => $paciente,
            'mascota' => $paciente,
            'responsable' => $paciente_responsable,
        ]);

    }



    public function receta_mislicencias(Request $request)

    {

        $paciente_responsable = Paciente::where('id_usuario', Auth::user()->id)->first();
        if (!$paciente_responsable) {
            return back()->with('error', 'Responsable no encontrado');
        }

        $paciente = Mascota::where('id', $request->id_dependiente_activo)
            ->where('id_responsable', $paciente_responsable->id)
            ->first();

        if (!$paciente) {
            return back()->with('error', 'Mascota no encontrada');
        }

        $fichas = FichaAtencion::where('id_mascota', $paciente->id)
            ->where('id_paciente', $paciente_responsable->id)
            ->get();

        return view('app.paciente_dependiente.receta.mis_licencias', [
            'fichas' => $fichas,
            'id_dependiente_activo' => $request->id_dependiente_activo,
            'paciente' => $paciente,
            'mascota' => $paciente,
            'responsable' => $paciente_responsable,
        ]);

    }



    private function buildVeterinaryRecordData(Mascota $mascota, Paciente $responsable): array

    {

        $fichas = FichaAtencion::with(['Profesional', 'LugarAtencion', 'PresupuestosMascota'])

            ->where('id_mascota', $mascota->id)

            ->where('id_paciente', $responsable->id)

            ->orderByDesc('created_at')

            ->orderByDesc('id')

            ->get();



        $fichaIds = $fichas->pluck('id')->filter()->values();



        $documentosConsentimiento = $fichaIds->isEmpty()

            ? collect()

            : ConConsentimientosPcte::with('Consentimiento')

                ->whereIn('id_fc', $fichaIds)

                ->orderByDesc('id')

                ->get()

                ->map(function ($documento) {

                    return [

                        'tipo' => 'Consentimiento informado',

                        'nombre' => optional($documento->Consentimiento)->nombre ?: 'Consentimiento informado',

                        'fecha' => $documento->fecha_cons ?: optional($documento->created_at)->format('Y-m-d'),

                        'estado' => $documento->confirmacion,

                    ];

                });



        $documentosPresupuesto = $fichas->flatMap(function ($ficha) {

            return $ficha->PresupuestosMascota->map(function ($presupuesto) {

                return [

                    'tipo' => 'Presupuesto',

                    'nombre' => 'Presupuesto veterinario',

                    'fecha' => optional($presupuesto->fecha)->format('Y-m-d')

                        ?: optional($presupuesto->created_at)->format('Y-m-d'),

                    'estado' => $presupuesto->estado ?? null,

                ];

            });

        });



        $documentos = $documentosConsentimiento

            ->merge($documentosPresupuesto)

            ->sortByDesc(function ($documento) {

                return $documento['fecha'] ?: '1900-01-01';

            })

            ->values();



        return [

            'responsable_mascota' => $responsable,

            'galeria_mascota' => $this->extractGalleryUrls($mascota->galeria),

            'vacunas_fvu' => collect($this->normalizePetRecords($mascota->vacunas_registro))

                ->sortByDesc('fecha_dosis')

                ->values(),

            'desparasitaciones_fvu' => collect($this->normalizePetRecords($mascota->desparasitaciones_registro))

                ->sortByDesc('fecha_dosis')

                ->values(),

            'fichas_veterinarias' => $fichas,

            'documentos_mascota' => $documentos,

        ];

    }



    private function normalizePetRecords($records): array

    {

        if (empty($records)) {

            return [];

        }



        if (is_string($records)) {

            $decoded = json_decode($records, true);

            $records = is_array($decoded) ? $decoded : [];

        }



        if (!is_array($records)) {

            return [];

        }



        return array_values(array_filter($records, function ($item) {

            return is_array($item);

        }));

    }



    private function extractGalleryUrls($gallery): array

    {

        if (empty($gallery)) {

            return [];

        }



        if (is_string($gallery)) {

            $decoded = json_decode($gallery, true);

            $gallery = is_array($decoded) ? $decoded : [$gallery];

        }



        if (!is_array($gallery)) {

            return [];

        }



        $urls = [];



        foreach ($gallery as $item) {

            if (is_string($item) && trim($item) !== '') {

                $urls[] = trim($item);

                continue;

            }



            if (!is_array($item)) {

                continue;

            }



            foreach (['url', 'src', 'original'] as $key) {

                if (!empty($item[$key])) {

                    $urls[] = $item[$key];

                }

            }

        }



        return array_values(array_unique(array_filter($urls)));

    }



}
