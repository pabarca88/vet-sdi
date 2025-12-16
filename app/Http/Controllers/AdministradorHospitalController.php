<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminInstServ;
use App\Models\AdminMed;
use App\Models\AdminMantenInst;
use App\Models\AreasCm;
use App\Models\Antecedente;
use App\Models\AntecedentesPaciente;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AsignacionUrgencia;
use App\Models\AsignacionGravedad;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\AsistenteTipo;
use App\Models\Bancos;
use App\Models\Bodega;
use App\Models\ControlObesidad;
use App\Models\ContactoEmergencia;
use App\Models\ConvenioInstitucion;
use App\Models\ContratoDependienteProfesional;
use App\Models\CuentaBancariaInst;
use App\Models\CuracionesServicio;
use App\Models\CuracionesPlanasServicio;
use App\Models\CuracionesTipo;
use App\Models\Hipertension;
use App\Models\Diabete;
use App\Models\EvolucionUrgencia;
use App\Models\EvolucionPacienteHospital;
use App\Models\ExamenMedico;
use App\Models\ExamenEspecialidad;
use App\Models\GrupoSanguineo;
use App\Models\HoraMedica;
use App\Models\TipoAreasCm;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Ciudad;
use App\Models\ContratoDependiente;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\EspecialidadesCm;
use App\Models\Instituciones;
use App\Models\Laboratorio;
use App\Models\LugarAtencion;
use App\Models\MensajesDifusion;
use App\Models\MensajesProfesional;
use App\Models\Mensajes;
use App\Models\Paciente;
use App\Models\PacienteTraslado;
use App\Models\PacientesDependientes;
use App\Models\PacienteContactoEmergencia;
use App\Models\PacienteSala;
use App\Models\PacienteTriage;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\ProcedimientoServicio;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalInstitucionConvenio;
use App\Models\ProfesionalHorario;
use App\Models\ProfesionalConvenio;
use App\Models\ProfesionalServicioClinico;
use App\Models\RecetaControl;
use App\Models\Recomendacion;
use App\Models\RecomendacionDetalle;
use App\Models\ResultadoExamen;
use App\Models\Responsable;
use App\Models\ResponsableBodega;
use App\Models\Remuneraciones;
use App\Models\Roles;
use App\Models\Servicios;
use App\Models\ServiciosInternos;
use App\Models\ServiciosInternosSalas;
use App\Models\TipoAdministrador;
use App\Models\TipoCuentaBancaria;
use App\Models\TipoConvenioInstitucion;
use App\Models\TipoEspecialidad;
use App\Models\TipoInstitucion;
use App\Models\TipoProductoConvenios;
use App\Models\TiposReceta;
use App\Models\TiposLaboratorio;
use App\Models\SubTipoEspecialidad;
use App\Models\User;

// DB
use Illuminate\Support\Facades\DB;

// CRYPT
use Illuminate\Support\Facades\Crypt;

use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class AdministradorHospitalController  extends Controller
{
    public function index()
    {

        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        return $institucion;
        $usuario = Auth::user();
        $roles = $usuario->roles()->orderBy('id', 'DESC')->pluck('name')->toArray();
        $adm_medico = false;
        foreach($roles as $rol){
            if($rol == 'AdministradorMedico'){
                $adm_medico = true;
                break;
            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */
        return view('app.adm_cm.home')->with(['institucion' => $institucion, 'adm_medico' => $adm_medico]);
    }

    public function areaContratosNuevos(){
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        $regiones = Region::all();
        $bancos = Bancos::all();
        $especialidades = Especialidad::all();
        $profesionales_contratados = ProfesionalesLugaresAtencion::select('profesionales.*','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad','sub_tipo_especialidad.nombre as sub_tipo_especialidad')
            ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
            ->join('especialidades','profesionales.id_especialidad','=','especialidades.id')
            ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','=','tipos_especialidad.id')
            ->leftjoin('sub_tipo_especialidad','profesionales.id_sub_tipo_especialidad','=','sub_tipo_especialidad.id')
            ->where('profesionales_lugares_atencion.id_lugar_atencion',$institucion->id_lugar_atencion)
            ->get();

        foreach($profesionales_contratados as $profesional){
            $contrato = ContratoDependienteProfesional::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$institucion->id_lugar_atencion)->first();
            if($contrato){
                $profesional->contrato = $contrato;
                $especialidad_contrato = Especialidad::find($contrato->id_especialidad);
                $profesional->especialidad_contrato = $especialidad_contrato;
                $tipo_especialidad = TipoEspecialidad::find($contrato->id_tipo_especialidad);
                if($tipo_especialidad) $profesional->tipo_especialidad_contrato = $tipo_especialidad->nombre;
                $sub_tipo_especialidad = SubTipoEspecialidad::find($contrato->id_sub_tipo_especialidad);
                if($sub_tipo_especialidad) $profesional->sub_tipo_especialidad_contrato = $sub_tipo_especialidad->nombre;

            }else{
                $profesional->contrato = null;
            }
            $profesional->horas_semanales = 45;
        }

        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_administrativo = array();
        if($LugarAtencion)
        {
            $lista_administrativo = $LugarAtencion->AdministrativoInstitucion()->get();

            if($lista_administrativo)
            {
                foreach ($lista_administrativo as $key => $value)
                {

                    /** roles */
                    $usuario = User::where('id', $value->id_admin)->first();
                    $roles = $usuario->roles()->get();
                    $array_roles = array();
                    foreach ($roles as $key_2 => $value_2) {
                        array_push($array_roles, $value_2->name);
                    }

                    if(!empty($array_roles))
                        $lista_administrativo[$key]->roles = implode(",",$array_roles);
                    else
                        $lista_administrativo[$key]->roles = '';

                    /** tipo administrativo */
                    $lista_administrativo[$key]->tipo_administrativo = TipoAdministrador::find($value->id_tipo_administrador);

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_administrativo[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion','tipo_empleado')->where($filtro_cont)->first();
                }
            }
        }

        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_mantencion = array();
        if($LugarAtencion)
        {
            $lista_mantencion = $LugarAtencion->MantencionInstitucion()->get();

            if($lista_mantencion)
            {
                foreach ($lista_mantencion as $key => $value)
                {
                    /** roles */
                    $usuario = User::where('id', $value->id_admin)->first();
                    if($usuario){
                        $roles = $usuario->roles()->get();
                        $array_roles = array();
                        foreach ($roles as $key_2 => $value_2) {
                            array_push($array_roles, $value_2->name);
                        }

                        if(!empty($array_roles))
                            $lista_mantencion[$key]->roles = implode(",",$array_roles);
                        else
                            $lista_mantencion[$key]->roles = '';
                    }

                    if($value->empresa == 1){
                        $lista_mantencion[$key]->empresa = true;
                    }else{
                        $lista_mantencion[$key]->empresa = false;
                    }

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_mantencion[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion','tipo_empleado')->where($filtro_cont)->first();
                }
            }
        }

        /** LISTA CONTRATO */
        $lista_tipo_asistente = AsistenteTipo::select('id', 'nombre')->where('estado',1)->get();
        $lista_tipo_administrador = TipoAdministrador::select('id', 'nombres')->where('estado',1)->get();

        $lista_tipo_contrato = array();
        foreach ($lista_tipo_asistente as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombre),
            ));
        }
        foreach ($lista_tipo_administrador as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombres),
            ));
        }
        /** FIN LISTA CONTRATO */

        $lista_tipo_administrativo = TipoAdministrador::where('estado', 1)->get();
        $tipo_convenio = TipoConvenioInstitucion::where('estado', 1)->get();

        return view('app.adm_hospital.contratos_nuevos',
            [
                'regiones' => $regiones,
                'bancos' => $bancos,
                'especialidades' => $especialidades,
                'profesionales_contratados' => $profesionales_contratados,
                'institucion' => $institucion,
                'lista_administrativo' => $lista_administrativo,
                'lista_tipo_contrato' => (object)$lista_tipo_contrato,
                'lista_tipo_administrativo' => $lista_tipo_administrativo,
                'lista_mantencion' => $lista_mantencion,
                'tipo_convenio' => $tipo_convenio
            ]
        );
    }

    public function agregar_area_cm(Request $request){
        try {
            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
            $profesional_responsable = Profesional::find($request->responsable_cargo);
            $area = new AreasCm();
            $area->id_institucion = $institucion->id;
            $area->id_lugar_atencion = $institucion->id_lugar_atencion;
            $area->id_tipo_area_cm = $request->tipo_area;
            $area->nombre = $profesional_responsable->nombre;
            $area->apellido_uno = $profesional_responsable->apellido_uno;
            $area->apellido_dos = $profesional_responsable->apellido_dos;
            $area->email = $request->e_cont;
            $area->telefono = $request->tel_c;
            $area->numero_personas = $request->n_pers;
            $area->id_responsable = $request->responsable_cargo;
            $area->save();
            $areas_cm = $this->dame_areas_cm($institucion->id_lugar_atencion);
            $v = view('fragm.areas_cm',[
                'areas_cm' => $areas_cm,
                'institucion' => $institucion
            ])->render();
            return response()->json(['estado' => 1, 'mensaje' => 'Área agregada correctamente', 'v' => $v]);
        } catch (\Exception $e) {
            return response()->json(['estado' => 0, 'mensaje' => $e->getMessage()]);
        }
    }

    public function asignar_profesionales_area(Request $request){
        try {
            // Buscar el área por ID
            $area_cm = AreasCm::find($request->id_area);

            // Verificar si el área existe
            if (!$area_cm) {
                return response()->json(['mensaje' => 'Área no encontrada'], 404);
            }

            // Convertir los datos de profesionales a JSON
            $datos_profesionales_json = json_encode($request->profesionales);

            // Asignar los datos JSON a la propiedad datos_profesionales
            $area_cm->datos_profesionales = $datos_profesionales_json;

            // Guardar los cambios en la base de datos
            $area_cm->save();

            $areas_cm = $this->dame_areas_cm($area_cm->id_lugar_atencion);

            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();

            $v = view('fragm.areas_cm',[
                'area' => $area_cm,
                'areas_cm' => $areas_cm,
                'institucion' => $institucion
            ])->render();

            // Devolver el objeto actualizado
            return response()->json(['mensaje' => 'OK','areas_cm' => $area_cm,'v' => $v], 200);
        } catch (\Exception $e) {
            // Manejar la excepción y devolver el mensaje de error
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function centroMedico(){
        return view('app.adm_hospital_ambulatorio.home');
    }

    public function mi_horario_lugar_atencion(Request $request)
    {
        $profesional = Profesional::where('id', $request->id_profesional)->first();
        $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->id_lugar_atencion)->get();
        return $horario;
    }

    public function adm_medico(){
        $usuario = Auth::user();
        $instituciones = Instituciones::where('id_director_medico', $usuario->id)->get();
        if($instituciones->count() == 1){
            return view('app.adm_cm.adm_medico_id',[
                'institucion' => $instituciones[0]
            ]);
        }

        return view('app.adm_cm.adm_medico',[
            'instituciones' => $instituciones
        ]);

    }

    public function adm_medico_id($id){
        $usuario = Auth::user();
        $institucion = Instituciones::find($id);

        return view('app.adm_cm.adm_medico_id',[
            'institucion' => $institucion
        ]);
    }

	public function escritorio_asist_adm(){
        return view('app.asistente_adm_cm.escritorio_asist_adm');
    }

    public function asistente_adm_pedidos(){
        return view('app.asistente_adm_cm.asistente_adm_pedidos');
    }

    public function configuracion()
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }


        /** CONVENIOS */
        /** cargar convenios */

        /** CARGA TIPO DE CONTRATO (TIPO DE ASISTENTE, INSTITUCION, ADMINISTRADOR) */
        $lista_tipo_asistente = AsistenteTipo::select('id', 'nombre')->where('estado',1)->get();
        // $lista_tipo_institucion = TipoInstitucion::select('id', 'nombre',)->where('estado',1)->get();
        $lista_tipo_administrador = TipoAdministrador::select('id', 'nombres')->where('estado',1)->get();

        $lista_tipo_contrato = array();
        foreach ($lista_tipo_asistente as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombre),
            ));
        }

        foreach ($lista_tipo_administrador as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombres),
            ));
        }

        // var_dump((object)$lista_tipo_contrato);

        // echo json_encode($personal);

        $especialidades = TipoEspecialidad::where('id_especialidad',1)->get();

        $especialidades_cm = $this->dame_especialidades_cm($institucion->id);
        $otras_especialidades_cm = $this->dame_otras_especialidades_cm($institucion->id);
        $profesionales = $this->dame_profesionales($institucion->id_lugar_atencion);
        $tipos_areas_cm = TipoAreasCm::all();
        $areas_cm = $this->dame_areas_cm($institucion->id_lugar_atencion);

        $servicios = Servicios::all();

        $servicios_internos = $this->dame_servicios_internos($institucion->id);

        // buscar si el responsable tiene una area asignada
        $areas_institucion = AreasCm::where('id_institucion',$institucion->id)->get();
        $responsable_medico = Profesional::find(3);

        foreach($areas_institucion as $area){
            if($area->id_tipo_area_cm == 1){
                $responsable_medico = Profesional::find($area->id_responsable);
                break;
            }
        }

        $cargos = $lista_tipo_administrador;

        $usuario_director_cm = User::find($institucion->id_director_medico);
        $usuario_subdirector_cm = User::find($institucion->id_subdirector_medico);
        $usuario_director_gestion_cuidado = User::find($institucion->id_director_gestion_cuidado);

        if($usuario_director_cm){
            $director_cm = Profesional::where('id_usuario',$usuario_director_cm->id)->first();
        }else{
            $director_cm = null;
        }

        if($usuario_subdirector_cm){
            $subdirector_cm = Profesional::where('id_usuario',$usuario_subdirector_cm->id)->first();
        }else{
            $subdirector_cm = null;
        }

        if($usuario_director_gestion_cuidado){
            $director_gestion_cuidado = Profesional::where('id_usuario',$usuario_director_gestion_cuidado->id)->first();
        }else{
            $director_gestion_cuidado = null;
        }

        $tipos_laboratorio = TiposLaboratorio::all();
        $laboratorios = $this->dame_laboratorios($institucion->id);

        //$boxes_cm = $this->dame_boxes_cm($institucion->id_lugar_atencion);

        $tipos_productos = TipoProducto::all();

        $bodegas = Bodega::where('id_institucion',$institucion->id)->get();
        foreach($bodegas as $bodega){
            $bodega->tipo_productos_autorizacion = json_decode($bodega->tipos_productos_autorizacion);
            $bodega->tipos_productos = json_decode($bodega->tipos_productos);
            $responsables = ResponsableBodega::select('responsable_bodega.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos')
                ->join('profesionales','responsable_bodega.id_responsable','=','profesionales.id')
                ->where('responsable_bodega.id_bodega',$bodega->id)
                ->get();
            $bodega->responsables = $responsables;
        }

        return view('app.adm_hospital.configuracion')->with([
            'tipo_institucion' => $tipo_institucion,
            'institucion' => $institucion,
            'responsable' => $responsable,
            'director_cm' => $director_cm ? $director_cm : null,
            'subdirector_cm' => $subdirector_cm ? $subdirector_cm : null,
            'director_gestion_cuidado' => $director_gestion_cuidado ? $director_gestion_cuidado : null,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
            'cargos' => $cargos,
            'personal' => $personal,
            'lista_tipo_contrato' => (object)$lista_tipo_contrato,
            'especialidades' => $especialidades,
            'especialidad' => $especialidades,
            'especialidades_cm' => $especialidades_cm,
            'otras_especialidades_cm' => $otras_especialidades_cm,
            'profesionales' => $profesionales,
            'tipos_areas_cm' => $tipos_areas_cm,
            'areas_cm' => $areas_cm,
            'servicios' => $servicios,
            'servicios_internos' => $servicios_internos,
            'tipos_laboratorio' => $tipos_laboratorio,
            'laboratorios' => $laboratorios,
            // 'boxes_servicio' => $boxes_cm,
            'tipos_productos' => $tipos_productos,
            'bodegas' => $bodegas
        ]);
    }

    public function dameSalasCamas(Request $request){
        try {
            $camas = ServiciosInternosSalas::find($request->id);
            return $camas;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function agendarPacienteNuevo(Request $request)
    {
        $user = Auth::user()->id;
        $paciente = new Paciente();
        $direccion = new Direccion();
        $profesional = Asistente::where('id_usuario',Auth::user()->id)->first();
        if(!$profesional) $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        $direccion->direccion = $request->reserva_hora_direccion;
        $direccion->numero_dir = $request->reserva_hora_numero_dir;
        $direccion->id_ciudad = $request->reserva_hora_comuna;

        $direccion->save();
        $paciente->rut = $request->rut_paciente_reserva;
        $paciente->nombres = $request->reserva_hora_nombre;
        $paciente->apellido_uno = $request->reserva_hora_primer_apellido;
        $paciente->apellido_dos = $request->reserva_hora_segundo_apellido;
        $paciente->sexo = $request->reserva_hora_sexo;
        $paciente->profesion = $request->reserva_hora_profesion;
        $paciente->fecha_nac = $request->reserva_hora_fecha_nac;
        $paciente->id_prevision = $request->reserva_hora_convenio;
        $paciente->email = $request->reserva_hora_email;
        $paciente->telefono_uno = $request->reserva_hora_telefono;
        $paciente->id_direccion = $direccion->id;
        $paciente->motivo_hospitalizacion = $request->antecedentes;
        $paciente->diagnostico = $request->diagnostico;
        $paciente->derivado = $request->antecedentes;
        $paciente->eva = $request->eva;

        if ($paciente->save()) {

            /** buscar tiempo de la consult */
        $dia_de_semana = \Carbon\Carbon::parse($request->fecha_consulta)->format('w');
        $profesional_horarios = ProfesionalHorario::select('duracion_consulta')
                                                    ->where('id_profesional', $profesional->id)
                                                    ->where('id_lugar_atencion',$request->id_lugar_atencion)
                                                    ->where('dia','like','%'.$dia_de_semana.'%')
                                                    ->first();

        // $profesional_horarios = '00:30:00';
        // $tiempo_consulta = 30;
        // $horas = date('H',strtotime($profesional_horarios->duracion_consulta));
        // $minutos = date('i',strtotime($profesional_horarios->duracion_consulta));
        // $totales = ($horas*60) + $minutos;
        // $tiempo_consulta = $totales;

        $horas = 24;
        $minutos = 0;
        $totales = ($horas*60) + $minutos;
        $tiempo_consulta = $totales;

            $hora_medica = new HoraMedica();

            $hora_medica->id_paciente = $paciente->id;
            $hora_medica->id_profesional = $profesional->id;
            $hora_medica->id_estado = 1;
            $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

            $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
            $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->format('H:i:s');
            $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;

            if (!$hora_medica->save()) {
                return 'error';
            }
            $hora_medica->rut_paciente = $paciente->rut;

            $details = [
                'title' => 'Hora medica Reservada',
                'body' => 'Estimado/a ' . $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos . ',<br>
                    Junto con saludar, por medio de este correo le informamos que se ha reservado su hora medida <br>' .
                    'Fecha: ' . $hora_medica->fecha_consulta . '<br>' .
                    'Hora : ' . $hora_medica->hora_inicio . '<br>' .
                    'Profesional: <b>' . $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos . '<b> <br><br>' .
                    'Que tenga un excelente día. </br></br>' .
                    'Saludos.',
            ];

            //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

            return json_encode($hora_medica);
        }

        return 'algo';
    }

    public function mostrar_nueva_evolucion_paciente_profesional(Request $req){

        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);

        return view('app.adm_hospital.servicios.enfermera.agregar_evolucion_paciente_', compact('idCounter','responsable'));
    }

    public function dame_boxes_cm($id_lugar_atencion){
        $boxes = BoxCm::where('id_lugar_atencion',$id_lugar_atencion)->get();
        foreach($boxes as $box){
            if($box->seccion == '1') $box->seccion = 'Pediatría';
            if($box->seccion == '2') $box->seccion = 'General';
            if($box->seccion == '3') $box->seccion = 'Gineco-Obstetricia';
            if($box->seccion == '4') $box->seccion = 'Rehabilitación';
        }
        return $boxes;
    }

    public function dame_laboratorios($id_institucion){
        $laboratorios = Laboratorio::select('laboratorios.*','tipos_laboratorio.nombre as tipo_laboratorio','direcciones.direccion','direcciones.numero_dir','direcciones.id_ciudad')
            ->leftjoin('tipos_laboratorio','laboratorios.id_tipo_laboratorio','=','tipos_laboratorio.id')
            ->join('direcciones','laboratorios.id_direccion','=','direcciones.id')
            ->where('laboratorios.id_institucion',$id_institucion)
            ->get();

        // buscar la ciudad de cada laboratorio por la direccion
        foreach($laboratorios as $laboratorio){
            $ciudad = Ciudad::where('id',$laboratorio->id_ciudad)->first();
            $laboratorio->ciudad = $ciudad->nombre;
        }
        return $laboratorios;
    }

    public function dame_area($id, $id_lugar_atencion){

        $area = AreasCm::where('id',$id)->where('id_lugar_atencion',$id_lugar_atencion)->first();
        return $area;

    }

    public function eliminar_admin_cm(Request $req){
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::find($req->id_institucion);
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }

            $regiones = Region::all();
            $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

            /** CARGA DE PERSONAL */
            /** EMPLEADOS */
            $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                            ->where('id_institucion',$institucion->id)
                                            ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                            ->get();
            // var_dump($contratos);

            $personal = array();
            if($contratos)
            {
                // var_dump($contratos->count());
                if($contratos->count()>0)
                {
                    foreach ($contratos as $key_contratos => $value_contratos)
                    {
                        // Asistente Publico
                        // Asistente Jefa Caja
                        // Asistente Adm
                        // Asistente Online
                        if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                        {
                            $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                    ->with(['AsistenteTipo' => function($query){
                                                        $query->select('id', 'nombre', 'descripcion');
                                                    }])
                                                    ->where('id', $value_contratos->id_empleado)
                                                    ->first();
                            if($asistente)
                                array_push($personal, $asistente);
                        }
                        // adm_insitucion
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                        {
                            $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                    ->with(['TipoAdministrador' => function($query){
                                                        $query->select('id', 'nombres as nombre','descripcion');
                                                    }])
                                                    ->where('id', $value_contratos->id_empleado)
                                                    ->first();
                            // var_dump($administrador);
                            if($administrador)
                                array_push($personal, $administrador);
                        }
                        // contador
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                        {

                        }
                        // profesional (dependiente-> ej: admin medico)
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                        {

                        }

                    }
                }
            }

            if($req->tipo_admin == 1){
                $institucion->id_director_medico = null;
            }else if($req->tipo_admin == 2){
                $institucion->id_subdirector_medico = null;
            }else if($req->tipo_admin == 3){
                $institucion->id_director_gestion_cuidado = null;
            }
            $institucion->update();

            // se elimina el rol de director medico
            $rol = Role::where('name','AdministradorMedico')->first();
            $usuario = User::where('id',$responsable->id)->first();
            $usuario->removeRole($rol);

            if($institucion->id_director_medico){
                $director_cm = Profesional::where('id_usuario', $institucion->id_director_medico)->first();
            }else{
                $director_cm = null;
            }

            if($institucion->id_subdirector_medico){
                $subdirector_cm = Profesional::where('id_usuario', $institucion->id_subdirector_medico)->first();
            }else{
                $subdirector_cm = null;
            }

            if($institucion->id_director_gestion_cuidado){
                $director_gestion_cuidado = Profesional::where('id_usuario', $institucion->id_director_gestion_cuidado)->first();
            }else{
                $director_gestion_cuidado = null;
            }

            if($institucion->id_director_comercial){
                $director_comercial = Profesional::where('id_usuario', $institucion->id_director_comercial)->first();
            }else{
                $director_comercial = null;
            }

            $v = view('fragm.administradores_cm',[
                'director_cm' => $director_cm ? $director_cm : null,
                'subdirector_cm' => $subdirector_cm ? $subdirector_cm : null,
                'director_gestion_cuidado' => $director_gestion_cuidado ? $director_gestion_cuidado : null,
                'responsable' => $responsable ? $responsable : null,
                'institucion' => $institucion,
                'regiones' => $regiones,
                'ciudades' => $ciudades,
            ])->render();

            return ['estado' => 1, 'mensaje' => 'Administrador eliminado', 'v' => $v];
    }

    public function registrar_servicio_cm(Request $req){
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }
        $servicio = Servicios::find($req->id_servicio);
        $nuevo_servicio = new ServiciosInternos();
        $responsable = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos')
        ->leftjoin('profesionales','profesionales.id','=','profesionales_lugares_atencion.id_profesional')
        ->where('profesionales_lugares_atencion.id',$req->id_responsable)
        ->first();
        $profesional = Profesional::find($responsable->id_profesional);

        $nuevo_servicio->id_institucion = $institucion->id;
        $nuevo_servicio->id_lugar_atencion = $institucion->id_lugar_atencion;
        $nuevo_servicio->id_servicio = $req->id_servicio;
        $nuevo_servicio->nombre = $servicio->nombre;
        $nuevo_servicio->id_responsable = $responsable->id_profesional;

        $nuevo_servicio->save();

        $servicios_internos = $this->dame_servicios_internos($institucion->id);

        return ['estado' => 1, 'mensaje' => 'Servicio registrado', 'servicios_internos' => $servicios_internos];
    }

    public function dame_servicios_internos($id_institucion){
        $servicios_internos = ServiciosInternos::select('servicio_interno.*','servicios.nombre as nombre_servicio','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                            ->join('servicios','servicios.id','=','servicio_interno.id_servicio')
                            ->leftjoin('profesionales','profesionales.id','=','servicio_interno.id_responsable')
                            ->where('servicio_interno.id_institucion',$id_institucion)
                            ->get();

        foreach($servicios_internos as $servicio_interno){
            $salas_servicio = ServiciosInternosSalas::where('id_servicio_interno',$servicio_interno->id)->get();
            $servicio_interno->salas = $salas_servicio;

            $profesionales = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                ->where('profesionales_servicios_clinicos.id_cargo',1)
                                ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                ->get();
            $servicio_interno->profesionales = $profesionales;

            $tens = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                ->where('profesionales_servicios_clinicos.id_cargo',5)
                                ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                ->get();

            $servicio_interno->tens = $tens;

            $servicio_interno->jefe_servicio = Profesional::find($servicio_interno->id_responsable);
        }

        return $servicios_internos;
    }

    public function asignarProfesionalAtencion(Request $req){
        try {

            // guardar paciente triage del paciente para ingresarse al nuevo servicio
            // $registro = $this->paciente_triage_servicio($req);

            // verificar si ya existe ese paciente ingresado en el box
            $existe = PacienteSala::where('id_paciente',$req->id_paciente)->first();

            if(!$existe){
                $existe_en_sala = PacienteSala::where('id_sala',$req->sala)->where('id_cama',$req->cama)->first();
                if($existe_en_sala) return ['estado' => 'ERROR','mensaje' => 'Cama dentro de la sala ocupada'];
                $paciente_sala = new PacienteSala();
                $paciente_sala->id_paciente = $req->id_paciente;
                $paciente_sala->id_sala = $req->sala;
                $paciente_sala->id_cama = $req->cama;
                $paciente_sala->id_servicio_interno = $req->id_servicio_interno;
                $paciente_sala->id_responsable = Auth::user()->id;
                $paciente_sala->id_profesional = $req->id_profesional;
                $paciente_sala->nivel_urgencia = $req->nivel_gravedad;
                $paciente_sala->fecha = date('Y-m-d');
                $paciente_sala->hora = date('H:i:s');
                $paciente_sala->diagnostico = $req->motivo_hospitalizacion;
                $paciente_sala->observaciones = $req->observaciones;

                if($paciente_sala->save()){
                    $sc = new SalasController();
                    $salas = $sc->dame_salas_atencion($req->id_servicio_interno);
                    foreach($salas as $sala)
                    {
                        $sala->pacientes = $this->dame_pacientes_sala($sala->id);

                        foreach($sala->pacientes as $paciente)
                        {
                            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                            $ano_diferencia  = date("Y") - $ano;
                            $mes_diferencia = date("m") - $mes;
                            $dia_diferencia   = date("d") - $dia;
                            if ($dia_diferencia < 0 || $mes_diferencia < 0)
                            $ano_diferencia--;

                            $edad = $ano_diferencia;
                            $paciente->edad = $edad;
                        }
                    }



                    $paciente_triage = PacienteTriage::where('id_paciente',$req->id_paciente)->first();
                    $paciente_triage->estado = "INGRESADO";
                    $paciente_triage->save();

                    return ['estado' => 'OK','paciente' =>$paciente_triage];
                }else{
                    return ['estado' => 'ERROR'];
                }
            }else{
                return ['estado'=>'ERROR','mensaje'=> 'PACIENTE YA TIENE ASIGNADA UNA CAMA'];
            }

        } catch (\Exception $e) {
            //throw $th;
            return ['estado'=> 'ERROR','mensaje' => $e->getMessage()];
        }
    }

    public function atencion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();

            $id_paciente = $request->id_paciente;
            if(empty($request->id_paciente)) $id_paciente = 6;
            $paciente = Paciente::where('pacientes.id', $id_paciente)->first();

            /** carga de direccion en paciente */
            $direccion = Direccion::find($paciente->id_direccion);
            if (!$direccion == null)
            {
                $ciudad = Ciudad::find($direccion->id_ciudad);
                if($ciudad)
                    $region = Region::find($ciudad->id_region);
                else
                    $region = null;
            }
            else
            {
                $direccion = null;
                $ciudad = null;
                $region = null;
            }

            $paciente->direccion = (object)array(
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'region' => $region,
            );

            /* FMU CONTACTO EMERGENCIA */
            $pacientes_contacto_emergencia = PacienteContactoEmergencia::with('ContactoEmergencia')->where('id_paciente',$paciente->id)->get();

            /* CONTACTO EMERGENCIA */
            $pacientes_contacto_emergencia = PacienteContactoEmergencia::where('id_paciente',$paciente->id)->first();
            if(is_object($pacientes_contacto_emergencia))
            {
                $contacto_emergencia = ContactoEmergencia::find($pacientes_contacto_emergencia->id_contacto);

                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $contacto_emergencia->fecha_nac = $dia.'-'.$mes.'-'.$ano;
                $contacto_emergencia->edad = $edad;

            }
            else
            {
                $contacto_emergencia = (object) array(
                    'nombre'=>'N/A',
                    'apellido_uno'=>'N/A',
                    'apellido_dos'=>'N/A',
                    'rut'=>'N/A',
                    'edad'=>'N/A',
                    'email'=>'N/A',
                    'fecha_nac'=>'N/A',
                    'telefono'=>'N/A',
                    'parentezco'=>'N/A'
                );
            }

            /** FMU ALERGIAS */
            $paciente_alergias = Antecedente::where('id_paciente', $paciente->id)->where('id_tipo_antecedente', 5)->get();

            /* ANTECEDENTES */
            $antecedentes = Antecedente::where('id_paciente',$paciente->id)->with('users','paciente','tipo_antecendente','profesional')->get();
            foreach ($antecedentes as $valor)
            {
                $valor['antecedente_data'] = json_decode($valor['data']);
            }

            $antecedentes_paciente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
            if (isset($antecedentes_paciente))
            {
                $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
                $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
                $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
                $patoligias_cronicas = Antecedente::where('id_tipo_antecedente', 2)->where('id_paciente', $paciente->id)->where('estado', 1)->get();
            }
            else
            {
                $medicamentos_cronicos = [];
                $alergias = [];
                $antecedentes_quirurgicos = [];
                $patoligias_cronicas = [];
            }

            $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->get();
            $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
            $diabetes = Diabete::where('id_paciente', $paciente->id)->get();

            /** resultado de examenes */
            $resultado_examen = ResultadoExamen::with('ResultadoExamenArchivo')->where('id_paciente', $paciente->id)->get();
            if($resultado_examen)
            {
                foreach ($resultado_examen as $key => $value)
                {
                    $result_tipo_ex = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                    $resultado_examen[$key]['obj_tipo_examen'] = $result_tipo_ex;
                }
            }


            /* ANTECEDENTES */
            $id_antecedente = $paciente->id_antecedente;
            if($id_antecedente!=null)
            {
                $antecedentes_paciente = AntecedentesPaciente::find($id_antecedente);
            }
            else
            {
                $antecedentes_paciente = (object) array(
                    'id'=>'',
                    'transfusion'=>'N/A',
                    'dona_organos'=>'N/A',
                    'dona_organos_parcial'=>'N/A',
                    'dona_sangre'=>'N/A',
                    'impedimento_donar'=>'N/A',
                    'comentario_gs'=>'N/A',
                    'comentarios'=>'N/A',
                    'hepatitis'=>'N/A',
                    'comentario_hepa'=>'N/A',
                    'id_grupo_sanguineo'=>0,
                );
            }

            /* SANGUINEO */
            $id_grupo_sanguineo = $antecedentes_paciente->id_grupo_sanguineo;
            if($id_grupo_sanguineo!=0)
            {
                $grupo_sanguineo = GrupoSanguineo::find($id_grupo_sanguineo);
            }
            else
            {
                $grupo_sanguineo = (object) array(
                    'id'=> 0,
                    'nombre_gs'=> 'N/A',
                    'descripcion_gs'=> 'N/A'
                );
            }

            /** Control enfermedades Cronicas */
            $control_enfer_cronicas = array();
            /** obsidad */
            $obesidad = ControlObesidad::where('id_paciente', $paciente->id)->get();
            if($obesidad)
            {
                foreach ($obesidad as $key => $value)
                {
                    $temp = array(
                        'fecha' => date('d-m-Y', strtotime($value->created_at)),
                        'tipo' => 'Obesidad',
                        'detalle' => array(
                            'Peso' => $value->peso,
                            'Variación' => $value->variacion,
                            'Ideal' => $value->ideal,
                        )
                    );
                    $control_enfer_cronicas[] = $temp;
                }
            }

            /** diabetes */
            $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
            if($diabetes)
            {
                foreach ($diabetes as $key => $value)
                {
                    $temp = array(
                        'fecha' => date('d-m-Y', strtotime($value->created_at)),
                        'tipo' => 'Diabetes',
                        'detalle' => array(
                            'Peso' => $value->peso,
                            'Piés' => $value->pies,
                            'HG A1c' => $value->hgac1,
                            'Colesterol' => $value->colesterol,
                            'Creatina' => $value->creatina,
                            'Glicosilada postprandial' => $value->glicosilada_postprandial,
                            'Glicosilada ayuno' => $value->glicosinada_ayuno,
                        )
                    );
                    $control_enfer_cronicas[] = $temp;
                }
            }

            /** hipertensiones */
            $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
            if($hipertension)
            {
                foreach ($hipertension as $key => $value)
                {
                    $temp = array(
                        'fecha' => date('d-m-Y', strtotime($value->created_at)),
                        'tipo' => 'Hipertensión',
                        'detalle' => array(
                            'Presión Sistólica' => $value->sistolica,
                            'Presión Diastólica' => $value->diastolica,
                            'Presión Ideal' => $value->ideal,
                        )
                    );
                    $control_enfer_cronicas[] = $temp;
                }
            }

            /** RESPONSABLES */
            $responsables = '';
            /** validar si es dependiente */
            $array_id_responsable = PacientesDependientes::where('id_paciente', $paciente->id)->pluck('id_responsable')->toArray();

            if(count($array_id_responsable) > 0)
            {
                $responsables = Paciente::whereIn('id', $array_id_responsable)->get();
            }

            $contacto_emergencia_html = "
                <table class='table table-bordered table-xs'>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Materno</th>
                            <th>Apellido Paterno</th>
                            <th>Rut</th>
                            <th>Edad</th>
                            <th>Email</th>
                            <th>Fecha Nacimiento</th>
                            <th>Teléfono</th>
                            <th>Parentezco</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>$contacto_emergencia->nombre</td>
                            <td>$contacto_emergencia->apellido_uno</td>
                            <td>$contacto_emergencia->apellido_dos</td>

                            <td>$contacto_emergencia->rut</td>
                            <td>$contacto_emergencia->edad</td>
                            <td>$contacto_emergencia->email</td>

                            <td>$contacto_emergencia->fecha_nac</td>
                            <td>$contacto_emergencia->telefono</td>
                            <td>$contacto_emergencia->parentezco</td>
                        </tr>
                    </tbody>
                </table>
            ";

            $responsables_html = "
                <table class='table table-bordered table-xs'>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Materno</th>
                            <th>Apellido Paterno</th>
                            <th>Rut</th>
                            <th>Email</th>
                            <th>Teléfono </th>
                        </tr>
                    </thead>
                    <tbody>";
                    if($responsables)
                    {
                        foreach ($responsables as $key => $value)
                        {
                            $responsables_html .= "<tr>
                                <td>$value->nombres</td>
                                <td>$value->apellido_uno</td>
                                <td>$value->apellido_dos</td>
                                <td>$value->rut</td>
                                <td>$value->email</td>
                                <td>$value->telefono</td>
                            </tr>";
                        }
                    }
            $responsables_html .=     "</tbody>
                </table>";

            /** RECETAS */
            $fecha_actual = date("d-m-Y");
            $regisrto_result = array();
            $lista_recetas = Recomendacion::whereDate('created_at', '>=', date("Y-m-d",strtotime($fecha_actual."- 1 week")) )->pluck('id')->toArray();
            if($lista_recetas)
            {
                $registros = Recomendacion::whereIn('id', $lista_recetas)->get();
                if($registros)
                {
                    $regisrto_result = array();
                    foreach ($registros as $key => $value)
                    {
                        $detalle = RecomendacionDetalle::where('id_recomendacion',$value->id)->get();
                        $detalle_temp = array();
                        if($detalle)
                        {
                            $detalle_temp = array();
                            foreach ($detalle as $key_det => $value_det)
                            {
                                $detalle_temp[] = array(
                                    'id' => $value_det->id,
                                    'id_receta' => $value_det->id_recomendacion,
                                    'id_tipo_control' => decrypt($value_det->control),
                                    'id_producto' => decrypt($value_det->id_articulo),
                                    'producto' => decrypt($value_det->articulo),
                                    'farmaco' => decrypt($value_det->componente),
                                    'id_presentacion' => decrypt($value_det->id_apariencia),
                                    'presentacion' => decrypt($value_det->apariencia),
                                    'id_receta_dosis' => decrypt($value_det->id_cuota),
                                    'posologia' => decrypt($value_det->cuota),
                                    'id_via_administracion' => decrypt($value_det->id_regimen),
                                    'via_administracion' => decrypt($value_det->regimen),
                                    'id_periodo' => decrypt($value_det->id_lapso),
                                    'periodo' => decrypt($value_det->lapso),
                                    'uso_cronico' => decrypt($value_det->uso_frecuente),
                                    'cantidad_compra' => decrypt($value_det->volumen_compra),
                                    'cantidad' => decrypt($value_det->volumen),
                                    'cantidad_vendida' => decrypt($value_det->volumen_entregado),
                                    'comentario' => decrypt($value_det->comentario),
                                    'token_doc' => $value_det->cod_doc,
                                    'estado' => $value_det->estado,
                                    'created_at' => $value_det->created_at,
                                    'updated_at' => $value_det->updated_at,
                                );
                            }
                        }

                        $regisrto_result[] = array(
                            'id' => $value->id,
                            'id_ficha_atencion' => $value->atencion,
                            'id_ingreso_paciente' => $value->salida,
                            'id_recuperacion' => $value->herir,
                            'id_sala' => $value->cuadro,
                            'id_paciente' => $value->activo,
                            'id_profesional' => $value->aficionado,
                            'id_tipo_control' => $value->control,
                            'token_doc' => $value->cod_doc,
                            'token_auto' => $value->cod_auto,
                            'pdf' => $value->info,
                            'estado' => $value->estado,
                            'detalle' => $detalle_temp,
                            'created_at' => $value->created_at,
                            'updated_at' => $value->updated_at,
                        );
                    }
                }
            }
            // $regisrto_result
            $receta_activa_html = "
                <table class='table table-bordered table-xs'>
                <thead>
                    <tr>
                        <th>Fecha Receta</th>
                        <th>Producto</th>
                        <th>Presentación</th>
                        <th>Posologia</th>
                        <th>Via<br/>Administracion</th>
                        <th>Periodo</th>
                        <th>Cantidad Compra</th>
                    </tr>
                </thead>
                <tbody>";
                if($regisrto_result)
                {
                    foreach ($regisrto_result as $key => $value)
                    {
                        foreach ($value['detalle'] as $key_detalle => $value_detalle)
                        {
                            $receta_activa_html .= "
                                <tr>
                                    <td>".date('d-m-Y', strtotime($value['created_at']))."</td>
                                    <td>".$value_detalle['producto']."<br/><span style=\"font-size:10px;\">".$value_detalle['farmaco']."</span></td>
                                    <td>".$value_detalle['presentacion']."</td>
                                    <td>".$value_detalle['posologia']."</td>
                                    <td>".$value_detalle['via_administracion']."</td>
                                    <td>".$value_detalle['periodo']."</td>
                                    <td>".$value_detalle['cantidad_compra']."</td>
                                </tr>";
                        }
                    }
                }
            $receta_activa_html .= "
                </tbody>
            </table>";

            $datos = (object)array(
                'contacto_emergencia' =>  $contacto_emergencia_html,
                'tratamientos_activos' => $receta_activa_html,
                'confidencial' => '',
                'responsables' => $responsables_html,

            );


            /** EXAMENES DE ESPECIALIDAD REALIZADOS */
            $examenes_especialidad_realizados = ExamenEspecialidad::select('id', 'id_tipo', 'id_template', 'id_examen_tipo', 'id_sub_tipo_especialidad', 'id_ficha_atencion', 'id_ficha_especialidad', 'id_paciente', 'id_profesional', 'id_asistente', 'nombre', 'revisado', 'estado')
                                                                // ->with(['HoraMedica' => function($query){
                                                                //     $query->select('id', 'id_ficha_atencion', 'fecha_realizacion_consulta', 'id_estado');
                                                                // }])
                                                                ->with(['ExamenEspecialidadTemplate' => function($query){
                                                                    $query->select('id', 'nombre', 'alias');
                                                                }])
                                                                ->with(['ExamenEspecialidadTipo' => function($query){
                                                                    $query->select('id', 'nombre', 'descripcion');
                                                                }])
                                                                ->with(['SubTipoEspecialidad' => function($query){
                                                                    $query->select('id', 'nombre');
                                                                }])
                                                                ->where('id_paciente', $paciente->id)
                                                                ->get();
            foreach ($examenes_especialidad_realizados as $key_ex_esp_realizado => $value_ex_esp_realizado)
            {
                if($value_ex_esp_realizado->id_sub_tipo_especialidad == 27)
                {
                    $filtro_h_ex_esp_ral = array();
                    $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                    $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                    $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
                }
                else if($profesional->id_especialidad != 1)
                {
                    $filtro_h_ex_esp_ral = array();
                    $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                    $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                    $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
                }
                else
                {
                    $filtro_h_ex_esp_ral = array();
                    $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_atencion);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                    $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                    $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
                }
            }

            /** resultado de examenes */
            $resultado_examen = ResultadoExamen::with('ResultadoExamenArchivo')->where('id_paciente', $paciente->id)->get();
            if($resultado_examen)
            {
                foreach ($resultado_examen as $key => $value)
                {
                    $result_tipo_ex = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                    $resultado_examen[$key]['obj_tipo_examen'] = $result_tipo_ex;
                }
            }

            $receta_control = RecetaControl::orderBy('Descripcion')->get();


            $examenMedico = ExamenMedico::where('cod_parent', 0)->where('habilitado', 1)->orderby('nombre_examen', 'ASC')->get();

            // triage del paciente
            $pt = PacienteTriage::where('id_paciente', $paciente->id)->first();


            $niveles_urgencia = AsignacionUrgencia::all();
            // Si existe un paciente en espera
            if($pt){
                foreach($niveles_urgencia as $nu){
                    if($nu->id == $pt->id_triage){
                        $paciente->clase = $nu->clase_html;
                        $paciente->descripcion = $nu->descripcion;
                    }
                }
            }

            // $datos['estado'] = 1;
            // $datos['msj'] = 'exito';

            $responsables = Responsable::all();

            $controles_ciclo = $this->dameEvolucionesPaciente($paciente->id);

            if(count($controles_ciclo) == 0)
            {
                // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
                $contador_div_evaluaciones = 1;
            }else{
                // si hay ciclos de control se suma 1 para manejar el id en la vista
                $contador_div_evaluaciones = count($controles_ciclo) + 1;
            }

            foreach($controles_ciclo as $cc)
            {
                $cc->datos_evolucion = json_decode($cc->datos_evolucion);
            }

            $tipos_curaciones = CuracionesTipo::all();

            $tipos_receta = TiposReceta::all();

            $detalle_receta_controlador = new DetalleRecetaController();
            $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente['id']);

            foreach($recetas as $receta)
            {
                if($receta->id_dosis == null){
                    $receta->dosis = $receta->nombre_dosis;
                }

                $receta->frecuencia = $receta->nombre_frecuencia;

            }
            $procedimientos = $this->dameProcedimientosPaciente($paciente->id);
            $examenControlador = new ExamenMedicoController();
            $examenes_solicitados = $examenControlador->dame_examenes_solicitados($paciente->id);
            $curaciones = $this->dameCuracionesPaciente($paciente->id);
            $curaciones_planas = $this->dameCuracionesPlanasPaciente($paciente->id);
            $enfermeraControlador = new EscritorioEnfermerasController();
            $curaciones_lpp = $enfermeraControlador->dameCuracionesLppPaciente($paciente->id);

            // return json_encode($examenes_solicitados[0]->datos_examen->lado);
            // variable que identifica si el usuario es enfermera
            $enfermera = false;

            // ultimo controla de ciclo
            $ultimo_control_ciclo = EvolucionUrgencia::where('id_paciente', $paciente->id)->orderBy('id', 'desc')->first();
            if($ultimo_control_ciclo)
                $ultimo_control_ciclo->datos_evolucion = json_decode($ultimo_control_ciclo->datos_evolucion);



            $tieneRecetaPendiente_ = false;
            // buscar recetas con estado 1
            foreach($recetas as $key => $receta)
            {
                if($receta->estado_tratamiento == 1)
                {
                    $tieneRecetaPendiente_ = true;
                    break;
                }
            }



        $resumen_recetas = "";
            foreach($recetas as $r){
                $resumen_recetas .= "<p>".$r->nombre_medicamento." ".$r->dosis." ".$r->nombre_frecuencia." ".$r->duracion." ".$r->comentario." con fecha ".$r->created_at."</p>";
            }


        $regiones = Region::all();
        $ciudades = Ciudad::all();

        $institucion = Instituciones::find(12);


        $servicio_interno = ServiciosInternos::find($request->id_servicio);

        $salas_servicio = ServiciosInternosSalas::where('id_servicio_interno',$servicio_interno->id)->get();

        $servicio_interno->salas = $salas_servicio;
        $profesionales = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                    ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                    ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                    ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                    ->where('profesionales_servicios_clinicos.id_cargo',1)
                                    ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                    ->get();
        $servicio_interno->profesionales = $profesionales;

        $direccion_id_region_paciente = $paciente->direccion->region->id;
        $direccion_id_ciudad_paciente  = $paciente->direccion->ciudad->id;

        $controles_ciclo_hosp = $this->dameEvolucionesPacienteHosp($paciente->id);

        $paciente_sala = PacienteSala::select('paciente_sala.*','pacientes.nombres','pacientes.apellido_uno as apellido_uno_paciente','pacientes.apellido_dos as apellido_dos_paciente','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos','pacientes_triage.id as id_paciente_triage')
                                    ->join('pacientes','paciente_sala.id_paciente','pacientes.id')
                                    ->join('profesionales','paciente_sala.id_profesional','profesionales.id')
                                    ->join('pacientes_triage','pacientes_triage.id_paciente','=','paciente_sala.id_paciente')
                                    ->where('paciente_sala.id_servicio_interno',$servicio_interno->id)
                                    ->where('paciente_sala.id_paciente',$paciente->id)
                                    ->first();

            switch ($paciente_sala->nivel_urgencia) {
                case 1:
                    # code...
                    $paciente_sala->urgencia = 'Leve';
                    $paciente_sala->clase_html = 'bg-primary text-white';
                    break;
                case 2:
                    $paciente_sala->urgencia = 'Media Gravedad';
                    $paciente_sala->clase_html = 'bg-warning text-white';
                    break;
                case 3:
                    $paciente_sala->urgencia = 'Grave';
                    $paciente_sala->clase_html = 'bg-danger text-white';
                    break;
                default:
                    # code...
                    $paciente_sala->urgencia = '-----';
                    break;
            }
            $escritorioProfesionalController = new EscritorioProfesional;
            $odontograma = $escritorioProfesionalController->dameOdontogramaPaciente($paciente->id, $pt->id_ficha_atencion, $request->lugar_atencion_id);

            return view('app.adm_hospital.servicios.profesionales.escritorio_profesional_paciente')->with([
                'direccion_id_region_paciente' => $direccion_id_region_paciente,
                'direccion_id_ciudad_paciente' => $direccion_id_ciudad_paciente,
                'paciente_sala' => $paciente_sala,
                'servicio' => $servicio_interno,
                'institucion' => $institucion,
                'paciente' => $paciente,
                'responsables' => $responsables,
                'controles_ciclo' => $controles_ciclo,
                'controles_ciclo_hosp' => $controles_ciclo_hosp,
                'ultimo_control_ciclo' => $ultimo_control_ciclo,
                'niveles_urgencia' => $niveles_urgencia,
                'contador_div_evaluaciones' => $contador_div_evaluaciones,
                'tipos_curaciones' => $tipos_curaciones,
                'tipos_receta' => $tipos_receta,
                'recetas' => $recetas,
                'tiene_receta_pendiente' => $tieneRecetaPendiente_,
                'resumen_recetas' => $resumen_recetas,
                'procedimientos' => $procedimientos,
                'examenes_solicitados' => $examenes_solicitados,
                'curaciones' => $curaciones,
                'curacion_plana' => $curaciones_planas,
                'curaciones_lpp' => $curaciones_lpp,
                'enfermera' => $enfermera,
                'odontograma' => $odontograma,
                // 'responsable' => $responsable,
                'pacientes_contacto_emergencia' => $pacientes_contacto_emergencia,
                'paciente_alergias' => $paciente_alergias,
                // 'prevision' => $prevision,
                'profesional' => $profesional,
                'ciudades' => $ciudades,
                'regiones' => $regiones,
                // 'medicamento' => $medicamento,
                // 'hora_medica' => $hora,
                // 'fichas' => $fichas,
                // 'ciudades' => $ciudades,
                // 'regiones' => $regiones,
                // 'tipo_examen' => $tipoExamen,
                'control_peso' => $control_peso,
                'hipertension' => $hipertension,
                'diabetes' => $diabetes,
                // 'ciudad' => $ciudad,
                'examenMedico' => $examenMedico,
                // 'medicamentos_cronicos' => $medicamentos_cronicos,
                // 'alergias' => $alergias,
                // 'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'patoligias_cronicas' => $patoligias_cronicas,
                // 'fichaAtencion' => $fichaAtencion,
                'id_lugar_atencion' => $request->lugar_atencion_id,
                // 'lugar_atencion' => $lugar_atencion,
                // 'lugares_atencion ' => $lugares_atencion ,
                'id_ficha_atencion' => $pt->id_ficha_atencion,
                // 'especialidad' => $especialidad,
                // 'interconsulta' => $interconsulta,
                // 'fichaTipo' => $fichaTipo,
                // 'examen_tipo' => $examen_tipo,
                // 'examen' => $examen,
                // 'lista_examen_especial' => $lista_examen_especial,
                // 'examenes_especialidad' => $examenes_especialidad,
                // 'examenes_radiologicos' => $examenes_radiologicos,
                'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                // 'institucion' => $institucion,
                // 'cns_tipo' => $cns_tipo,
                // 'cns_tipo_template' => $cns_tipo_template,
                // 'cns_registros' => $cns_registros,
                'resultado_examen' => $resultado_examen,
                // 'tipo_antecedente' => $tipo_antecedente,
                'receta_control' => $receta_control,

                /** FMU */
                // 'id_usuario' => $id_usuario,
                //// 'paciente' => $paciente,
                // 'contacto_emergencia' => $contacto_emergencia,
                'antecedentes_paciente' => $antecedentes_paciente,
                'grupo_sanguineo' => $grupo_sanguineo,
                'antecedentes' => $antecedentes,
                'token' => $request->token,
                // 'fichas' => $fichas,
                // 'especialidad' => $especialidad,
                // 'sub_tipo_especialidad' => $sub_tipo_especialidad,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'region' => $region,
                'datos' => $datos, // TEMPLATE PARA USO EN MODAL INCLUDE
                'tratamiento_activo' => $regisrto_result,
                //// 'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                //// 'resultado_examen' => $resultado_examen,
                'control_enfer_cronicas' => $control_enfer_cronicas,

                // 'ficha_ges' => $ges,
                // 'direccion' => $direccion,
                /*'contacto' => $contacto,
                'contacto_direccion'=> $contacto_direccion,
                'contacto_ciudad' => $contacto_ciudad,*/
                // 'licencia' => $licencia,

                /** RESPONSABLES */
                // 'responsables'  => $responsables,
                // 'acompanantes'  => $acompanantes,
            ]);
        }
        else
        {

            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
            return redirect()->back()->with(['mensaje'=>'Paciente reuqerido']);
        }
    }

    public function registrar_alta_paciente(Request $request){
        try {
            $traslado = new PacienteTraslado;
            $traslado->id_destino = $request->destino;
            $traslado->id_traslado_en = $request->traslado_en;
            $traslado->id_paciente = $request->id_paciente;
            $traslado->id_condicion = $request->condicion;
            $traslado->observaciones = $request->observaciones;
            $traslado->id_servicio_interno = $request->id_servicio_interno;
            $traslado->resultado = $request->resultado;
            if($traslado->save()){
                return ['mensaje' => 'OK', 'resp' => $traslado];
            }
        } catch (\Exception $e) {
            return ['mensaje' => 'error','resp'=>  $e->getMessage()];
        }
    }


    public function dameCuracionesPaciente($idpaciente){
        $curaciones =  CuracionesServicio::select('curaciones_servicio.*','users.name as responsable')
                                             ->join('users','users.id','=','curaciones_servicio.id_responsable')
                                             ->where('id_paciente', $idpaciente)
                                             ->get();

            foreach($curaciones as $curacion)
            {
                // convertir el atributo datos_procedimiento de longtext a array
                $curacion->datos_curacion = json_decode($curacion->datos_curacion);
                // sacar la fecha y hora del campo created_at
                $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
                $curacion->hora = date('H:i', strtotime($curacion->created_at));
            }

            return $curaciones;
    }

    public function dameCuracionesPlanasPaciente($id_paciente){
        $curacion = CuracionesPlanasServicio::select('curaciones_planas_servicio.*','users.name as responsable')
                                        ->join('users','users.id','=','curaciones_planas_servicio.id_responsable')
                                        ->where('id_paciente', $id_paciente)
                                        ->where('activa', 1)
                                        ->first();

            if($curacion)
            {
                // convertir el atributo datos_procedimiento de longtext a array
                $curacion->datos_curacion_plana = json_decode($curacion->datos_curacion_plana);
                // sacar la fecha y hora del campo created_at
                $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
                $curacion->hora = date('H:i', strtotime($curacion->created_at));
            }


        return $curacion;
    }

    public function dameEvolucionesPaciente($idpaciente){
        $controles_ciclo = EvolucionUrgencia::select('evoluciones_urgencias.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_urgencias.id_responsable')
                                                    ->where('evoluciones_urgencias.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }


    public function dameProcedimientosPaciente($idpaciente){
        $procedimientos =  ProcedimientoServicio::select('procedimientos_servicio.*','users.name as responsable')
                                                 ->join('users','users.id','=','procedimientos_servicio.id_responsable')
                                                 ->where('id_paciente', $idpaciente)
                                                 ->get();

         foreach($procedimientos as $procedimiento)
         {
             // convertir el atributo datos_procedimiento de longtext a array
             $procedimiento->datos_procedimiento = json_decode($procedimiento->datos_procedimiento);
             // sacar la fecha y hora del campo created_at
             $procedimiento->fecha = date('d-m-Y', strtotime($procedimiento->created_at));
             $procedimiento->hora = date('H:i', strtotime($procedimiento->created_at));
         }

         return $procedimientos;
 }

    public function cambiar_estado_paciente_triage(Request $req){

        $paciente_triage = PacienteTriage::find($req->id_paciente_triage);
        $paciente_triage->estado = "INGRESADO";
        $paciente_triage->save();

        return ['mensaje' => 'OK'];
    }


    public function sacarPacienteCama($id){
        $paciente_sala = PacienteSala::select('paciente_sala.*','pacientes.apellido_uno','pacientes.sexo','pacientes.fecha_nac','pacientes.rut','pacientes.nombres')
        ->join('pacientes','pacientes.id','=','paciente_sala.id_paciente')
        ->where('paciente_sala.id', $id)
        ->first();
        $id_servicio_interno = $paciente_sala->id_servicio_interno;
        if($paciente_sala->delete()){

                $servicio_interno = ServiciosInternos::find($id_servicio_interno);
                $salas_servicio = ServiciosInternosSalas::where('id_servicio_interno',$servicio_interno->id)->get();

                $servicio_interno->salas = $salas_servicio;

                $pacientes_salas = PacienteSala::select('paciente_sala.*','pacientes.nombres','pacientes.apellido_uno as apellido_uno_paciente','pacientes.apellido_dos as apellido_dos_paciente','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos')
                                    ->join('pacientes','paciente_sala.id_paciente','pacientes.id')
                                    ->join('profesionales','paciente_sala.id_profesional','profesionales.id')
                                    ->where('paciente_sala.id_servicio_interno',$servicio_interno->id)
                                    ->get();
                foreach($pacientes_salas as $paciente){
                    switch ($paciente->nivel_urgencia) {
                        case 1:
                            # code...
                            $paciente->urgencia = 'Leve';
                            $paciente->clase_html = 'bg-primary text-white';
                            break;
                        case 2:
                            $paciente->urgencia = 'Media Urgencia';
                            $paciente->clase_html = 'bg-warning text-white';
                            break;
                        case 3:
                            $paciente->urgencia = 'Urgente';
                            $paciente->clase_html = 'bg-danger text-white';
                            break;
                        default:
                            # code...
                            $paciente->urgencia = '-----';
                            break;
                    }
                }
                $servicio_interno->pacientes = $pacientes_salas;
                $profesionales = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                    ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                    ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                    ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                    ->where('profesionales_servicios_clinicos.id_cargo',1)
                                    ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                    ->get();
                $servicio_interno->profesionales = $profesionales;

                $tens = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                    ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                    ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                    ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                    ->where('profesionales_servicios_clinicos.id_cargo',5)
                                    ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                    ->get();

                $servicio_interno->tens = $tens;

                $servicio_interno->jefe_servicio = Profesional::find($servicio_interno->id_responsable);
                $salas_alerta = $this->salasAlerta();

                $v = view('app.adm_hospital.servicios.fragm.salas_servicio',['servicio' => $servicio_interno,'salas_alerta' => $salas_alerta])->render();

                return ['mensaje' => 'OK','v' => $v];
        }
    }



    public function dame_pacientes_sala($id_sala, $id_paciente = null){
        try {
            $query = PacienteSala::select('paciente_sala.*','pacientes.apellido_uno','pacientes.sexo','pacientes.fecha_nac','pacientes.rut','pacientes.nombres','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','pacientes_triage.id as id_paciente_triage')
                            ->join('pacientes','pacientes.id','=','paciente_sala.id_paciente')
                            ->join('pacientes_triage','pacientes_triage.id_paciente','=','paciente_sala.id_paciente')
                            ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                            ->where('pacientes_triage.estado',"INGRESADO")
                            ->where('paciente_sala.id_sala', $id_sala);

            if ($id_paciente !== null) {
                $query->where('paciente_sala.id_paciente', $id_paciente);
            }

            $pacientes = $query->get();
            return $pacientes;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function paciente_triage_servicio(Request $req){
        try {

            // verificar si el paciente ya esta en triage
            $paciente_triage = PacienteTriage::where('id_paciente', $req->id_paciente)->first();

            if($paciente_triage)
            {
                return false;
            }

            $paciente_triage = new PacienteTriage();
            $paciente_triage->id_paciente = $req->id_paciente;
            $paciente_triage->id_triage = $req->nivel_gravedad;
            $paciente_triage->id_servicio_interno = $req->id_servicio_interno;
            $paciente_triage->fecha = date('Y-m-d');
            $paciente_triage->hora = date('H:i:s');
            $paciente_triage->observaciones = "SIN OBSERVACIONES";
            $paciente_triage->estado = "EN ESPERA";
            $paciente_triage->save();

            return true;
        } catch (\Exception $e) {
            //throw $th;
            return false;
        }


    }

    public function registrarPaciente(Request $request){
        return $request;
    }

    public function desasociarProfesionalExistente(Request $request){

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_servicio))
        {
            $error['id_servicio'] = 'campo requerido';
            $valido = 0;
        }

        if($valido){
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;

            /** INFORMACION DE INSTITUCION Y RESPONSABLE */
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {

                                $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                        ->where('id_empleado', $responsable->id)
                                        ->whereIn('estado', [2,3])
                                        ->first();

                                if($result_contrato)
                                {
                                    $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** INSTITUCION */
                                        $institucion = $registro;
                                        $tipo_institucion = 'institucion';
                                    }
                                    else
                                    {
                                        $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                        if($registro)
                                        {
                                            /** SERVICIOS */
                                            $institucion = $registro;
                                            $tipo_institucion = 'servicio';
                                        }
                                        else
                                        {
                                            return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }
                                else
                                {
                                    return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }

                }
            }

            $profesional_servicio = ProfesionalServicioClinico::where('id_servicio_interno',$request->id_servicio)
            ->where('id_profesional',$request->id_profesional)
            ->first();

            if($profesional_servicio->delete()){
                $servicios_internos = $this->dame_servicios_internos($institucion->id);
                $v = view('fragm.salas_servicios_profesionales',['servicios_internos' => $servicios_internos])->render();
                $datos['estado'] = 1;
                $datos['msj'] = 'Eliminado correctamente';
                $datos['v'] = $v;
            }else{
                $datos['estado'] = 0;
                $datos['msj'] = 'Ha ocurrido un error';
            }
        }else{
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function editar_servicio(Request $request){

        $id_servicio = $request->id_servicio;
        $total_salas = $request->total_salas;
        $total_camas = $request->total_camas;
        $id_responsable = $request->id_responsable;

        $servicio = ServiciosInternos::find($request->id);
        $servicio->numero_salas = $total_salas;
        $servicio->numero_camas = $total_camas;
        $servicio->id_responsable = $id_responsable;
        if($servicio->save()){
            $servicios_internos = $this->dame_servicios_internos($servicio->id_institucion);
            $v = view('fragm.servicios_hospital',['servicios_internos' => $servicios_internos])->render();
            return ['estado' => 'OK','mensaje' => 'Servicio editado correctamente','v' => $v];
        }else{
            return ['estado' => 'error','mensaje' => 'Ha ocurrido un error'];
        }
    }

    public function registrar_servicio(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }

            $regiones = Region::all();
            $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

            /** CARGA DE PERSONAL */
            /** EMPLEADOS */
            $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                            ->where('id_institucion',$institucion->id)
                                            ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                            ->get();
            // var_dump($contratos);

            $personal = array();
            if($contratos)
            {
                // var_dump($contratos->count());
                if($contratos->count()>0)
                {
                    foreach ($contratos as $key_contratos => $value_contratos)
                    {
                        // Asistente Publico
                        // Asistente Jefa Caja
                        // Asistente Adm
                        // Asistente Online
                        if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                        {
                            $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                    ->with(['AsistenteTipo' => function($query){
                                                        $query->select('id', 'nombre', 'descripcion');
                                                    }])
                                                    ->where('id', $value_contratos->id_empleado)
                                                    ->first();
                            if($asistente)
                                array_push($personal, $asistente);
                        }
                        // adm_insitucion
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                        {
                            $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                    ->with(['TipoAdministrador' => function($query){
                                                        $query->select('id', 'nombres as nombre','descripcion');
                                                    }])
                                                    ->where('id', $value_contratos->id_empleado)
                                                    ->first();
                            // var_dump($administrador);
                            if($administrador)
                                array_push($personal, $administrador);
                        }
                        // contador
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                        {

                        }
                        // profesional (dependiente-> ej: admin medico)
                        else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                        {

                        }

                    }
                }
            }

            // buscar al responsable
            $responsable = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos','profesionales.rut')
            ->leftjoin('profesionales','profesionales.id','=','profesionales_lugares_atencion.id_profesional')
            ->where('profesionales_lugares_atencion.id',$req->id_responsable_servicio)
            ->first();

            $direccion = new Direccion();
            $direccion->direccion = $req->direccion_servicio;
            $direccion->numero_dir = 1;
            $direccion->id_ciudad = 1;
            $direccion->save();

            $servicio = new Servicios();
            $servicio->nombre = $req->nombre_servicio;
            $servicio->id_direccion = $direccion->id;
            $servicio->rut = $req->rut_servicio;
            $servicio->telefono = $req->telefono_servicio;
            $servicio->email = $req->email_servicio;
            $servicio->id_usuario = Auth::user()->id;
            $servicio->rut_responsable = $responsable->rut;
            $servicio->id_responsable = $responsable->id_profesional;
            $servicio->nombre_responsable = $responsable->nombre.' '.$responsable->apellido_uno.' '.$responsable->apellido_dos;
            $servicio->estado = 1;
            $servicio->id_servicio = 1;
            $servicio->save();

            // guardar el servicio interno en la institucion
            $servicio_interno = new ServiciosInternos();
            $servicio_interno->id_institucion = $institucion->id;
            $servicio_interno->id_lugar_atencion = $institucion->id_lugar_atencion;
            $servicio_interno->id_servicio = $servicio->id;
            $servicio_interno->nombre = $req->nombre_servicio;
            $servicio_interno->id_responsable = $responsable->id_profesional;
            $servicio_interno->save();

            return ['estado' => 1, 'mensaje' => 'Servicio registrado'];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function eliminar_servicio_cm(Request $req){
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }
        $servicio = ServiciosInternos::find($req->id);
        $servicio->delete();

        $servicios_internos = $this->dame_servicios_internos($institucion->id);
        return ['estado' => 1, 'mensaje' => 'Servicio eliminado','servicios_internos' => $servicios_internos];
    }

    public function dame_areas_cm($id_lugar_atencion){
        $areas_cm = AreasCm::select('areas_cm.*','tipos_areas_cm.nombre as tipo_area','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                            ->join('tipos_areas_cm','tipos_areas_cm.id','=','areas_cm.id_tipo_area_cm')
                            ->leftjoin('profesionales','profesionales.id','=','areas_cm.id_responsable')
                            ->where('areas_cm.id_lugar_atencion',$id_lugar_atencion)
                            ->get();

        foreach ($areas_cm as $key => $area_cm) {
            if($area_cm->datos_profesionales){
                $area_cm->datos_profesionales = json_decode($area_cm->datos_profesionales);
                $profesionales = array();
                foreach ($area_cm->datos_profesionales as $key => $value) {
                    $profesional = Profesional::find($value);
                    array_push($profesionales,$profesional);
                }
                $area_cm->profesionales = $profesionales;
            }else{
                $area_cm->profesionales = null;
            }
        }

        return $areas_cm;
    }

    public function dame_profesionales($id_lugar_atencion){
        $profesionales = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos')
                            ->join('profesionales','profesionales.id','=','profesionales_lugares_atencion.id_profesional')
                            ->where('profesionales_lugares_atencion.id_lugar_atencion',$id_lugar_atencion)
                            ->get();

        return $profesionales;
    }

    public function editarDatosPerfil(Request $request)
    {
        $datos = array();

        $id_institucion = $request->id_institucion;
        $tipo_institucion = $request->tipo_institucion;
        $nombre = '';
        $razon_social = '';
        $rut = '';
        $certificado_supersalud = '';
        $id_direccion = '';
        $logo = '';
        $telefono = '';
        $whatsapp = '';
        $sucursales = '';
        $horario_atencion = '';
        $id_usuario = '';
        $email = '';
        $rut_responsable = '';
        $id_responsable = '';
        $nombre_responsable = '';
        $id_servicio = '';
        $id_tipo_institucion = '';
        $sitio_web = '';
        $region = '';
        $direccion = '';
        $numero_dir = '';

        if(!empty($request->nombre))
            $nombre = $request->nombre;
        if(!empty($request->razon_social))
            $razon_social = $request->razon_social;
        if(!empty($request->rut))
            $rut = $request->rut;
        if(!empty($request->certificado_supersalud))
            $certificado_supersalud = $request->certificado_supersalud;
        // if(!empty($request->id_direccion))
        //     $id_direccion = $request->id_direccion;
        if(!empty($request->logo))
            $logo = $request->logo;
        if(!empty($request->telefono))
            $telefono = $request->telefono;
        if(!empty($request->whatsapp))
            $whatsapp = $request->whatsapp;
        if(isset($request->sucursales) && ($request->sucursales == 1 || $request->sucursales == 0))
            $sucursales = $request->sucursales;
        if(!empty($request->horario_atencion))
            $horario_atencion = $request->horario_atencion;
        if(!empty($request->id_usuario))
            $id_usuario = $request->id_usuario;
        if(!empty($request->email))
            $email = $request->email;
        if(!empty($request->rut_responsable))
            $rut_responsable = $request->rut_responsable;
        if(!empty($request->id_responsable))
            $id_responsable = $request->id_responsable;
        if(!empty($request->nombre_responsable))
            $nombre_responsable = $request->nombre_responsable;
        if(!empty($request->id_servicio))
            $id_servicio = $request->id_servicio;
        if(!empty($request->id_tipo_institucion))
            $id_tipo_institucion = $request->id_tipo_institucion;
        if(!empty($request->sitio_web))
            $sitio_web = $request->sitio_web;

        if(isset($request->region))
            $region = $request->region;
        if(isset($request->ciudad))
            $ciudad = $request->ciudad;
        if(isset($request->direccion))
            $direccion = $request->direccion;
        if(isset($request->numero_dir))
            $numero_dir = $request->numero_dir;




        if($tipo_institucion == 'institucion')
        {
            $registro = Instituciones::find($id_institucion);
            if($registro)
            {
                if(!empty($nombre))
                    $registro->nombre = $nombre;
                if(!empty($razon_social))
                    $registro->razon_social = $razon_social;
                if(!empty($rut))
                    $registro->rut = $rut;
                if(!empty($certificado_supersalud))
                    $registro->certificado_supersalud = $certificado_supersalud;
                if(!empty($id_direccion))
                    $registro->id_direccion = $id_direccion;
                if(!empty($logo))
                    $registro->logo = $logo;
                if(!empty($telefono))
                    $registro->telefono = $telefono;
                if(!empty($whatsapp))
                    $registro->whatsapp = $whatsapp;
                if($sucursales == '1' || $sucursales == '0')
                    $registro->sucursales = $sucursales;
                if(!empty($horario_atencion))
                    $registro->horario_atencion = $horario_atencion;
                if(!empty($id_usuario))
                    $registro->id_usuario = $id_usuario;
                if(!empty($email))
                    $registro->email = $email;
                if(!empty($rut_responsable))
                    $registro->rut_responsable = $rut_responsable;
                if(!empty($id_responsable))
                    $registro->id_responsable = $id_responsable;
                if(!empty($nombre_responsable))
                    $registro->nombre_responsable = $nombre_responsable;
                if(!empty($id_servicio))
                    $registro->id_servicio = $id_servicio;
                if(!empty($id_tipo_institucion))
                    $registro->id_tipo_institucion = $id_tipo_institucion;
                if(!empty($sitio_web))
                    $registro->sitio_web = $sitio_web;


                if( !empty($region) || !empty($ciudad) || !empty($direccion) || !empty($numero_dir) )
                {
                    $registro_direccion = Direccion::where('id', $registro->id_direccion)->first();
                    if($registro_direccion)
                    {
                        $registro_direccion->direccion = $direccion;
                        $registro_direccion->numero_dir = $numero_dir;
                        $registro_direccion->id_ciudad = $ciudad;
                        if($registro_direccion->save())
                        {
                            $datos['direccion']['estado'] = 1;
                            $datos['direccion']['msj'] = 'registro actualizado';
                        }
                        else
                        {
                            $datos['direccion']['estado'] = 0;
                            $datos['direccion']['msj'] = 'registro no actualizado';
                        }
                    }
                    else
                    {
                        $registro_direccion = new Direccion();
                        $registro_direccion->direccion = $direccion;
                        $registro_direccion->numero_dir = $numero_dir;
                        $registro_direccion->id_ciudad = $ciudad;
                        if($registro_direccion->save())
                        {
                            $datos['direccion']['estado'] = 1;
                            $datos['direccion']['msj'] = 'direccion registrada';
                            $registro->id_direccion = $registro_direccion->id;
                        }
                        else
                        {
                            $datos['direccion']['estado'] = 0;
                            $datos['direccion']['msj'] = 'direccion no registrada';
                        }
                    }
                }

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registros modificados satifactoriamente';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'registros No modificados';
                }
            }
        }
        else if($tipo_institucion == 'servicio')
        {
            /**pendiente */
        }


        return $datos;
    }

    public function editarDatosPerfilResponsable(Request $request)
    {
        $datos = array();

        $rut = '';
        $nombres = '';
        $apellido_uno = '';
        $apellido_dos = '';
        $telefono_uno = '';
        $telefono_dos = '';
        $sexo = '';
        $email = '';
        $fecha_nac = '';
        $id_tipo_administrador = '';
        $id_premium = '';
        $id_direccion = '';
        // $id_antecedente = '';
        $id_admin = '';
        $region = '';
        $ciudad = '';
        $direccion = '';
        $numero_dir = '';

        $id_responsable = $request->id_responsable;

        if(!empty($request->rut))
            $rut = $request->rut;
        if(!empty($request->nombres))
            $nombres = $request->nombres;
        if(!empty($request->apellido_uno))
            $apellido_uno = $request->apellido_uno;
        if(!empty($request->apellido_dos))
            $apellido_dos = $request->apellido_dos;
        if(!empty($request->telefono_uno))
            $telefono_uno = $request->telefono_uno;
        if(!empty($request->telefono_dos))
            $telefono_dos = $request->telefono_dos;
        if(!empty($request->sexo))
            $sexo = $request->sexo;
        if(!empty($request->email))
            $email = $request->email;
        if(!empty($request->fecha_nac))
            $fecha_nac = $request->fecha_nac;
        if(!empty($request->id_tipo_administrador))
            $id_tipo_administrador = $request->id_tipo_administrador;
        if(!empty($request->id_premium))
            $id_premium = $request->id_premium;
        if(!empty($request->id_direccion))
            $id_direccion = $request->id_direccion;
        // if(!empty($request->id_antecedente))
        //     $id_antecedente = $request->id_antecedente;
        // if(!empty($request->id_admin))
            $id_admin = $request->id_admin;


        if(isset($request->region))
            $region = $request->region;
        if(isset($request->ciudad))
            $ciudad = $request->ciudad;
        if(isset($request->direccion))
            $direccion = $request->direccion;
        if(isset($request->numero_dir))
            $numero_dir = $request->numero_dir;


        $registro = AdminInstServ::find($id_responsable);
        if($registro)
        {
            if(!empty($rut))
                $registro->rut = $rut;
            if(!empty($nombres))
                $registro->nombres = $nombres;
            if(!empty($apellido_uno))
                $registro->apellido_uno = $apellido_uno;
            if(!empty($apellido_dos))
                $registro->apellido_dos = $apellido_dos;
            if(!empty($telefono_uno))
                $registro->telefono_uno = $telefono_uno;
            if(!empty($telefono_dos))
                $registro->telefono_dos = $telefono_dos;
            if(!empty($sexo))
                $registro->sexo = $sexo;
            if(!empty($email))
                $registro->email = $email;
            if(!empty($fecha_nac))
                $registro->fecha_nac = $fecha_nac;
            if(!empty($id_tipo_administrador))
                $registro->id_tipo_administrador = $id_tipo_administrador;
            if(!empty($id_premium))
                $registro->id_premium = $id_premium;
            if(!empty($id_direccion))
                $registro->id_direccion = $id_direccion;
            if(!empty($id_admin))
                $registro->id_admin = $id_admin;


            if( !empty($region) || !empty($ciudad) || !empty($direccion) || !empty($numero_dir) )
            {
                $registro_direccion = Direccion::where('id', $registro->id_direccion)->first();
                if($registro_direccion)
                {
                    $registro_direccion->direccion = $direccion;
                    $registro_direccion->numero_dir = $numero_dir;
                    $registro_direccion->id_ciudad = $ciudad;
                    if($registro_direccion->save())
                    {
                        $datos['direccion']['estado'] = 1;
                        $datos['direccion']['msj'] = 'registro actualizado';
                    }
                    else
                    {
                        $datos['direccion']['estado'] = 0;
                        $datos['direccion']['msj'] = 'registro no actualizado';
                    }
                }
                else
                {
                    $registro_direccion = new Direccion();
                    $registro_direccion->direccion = $direccion;
                    $registro_direccion->numero_dir = $numero_dir;
                    $registro_direccion->id_ciudad = $ciudad;
                    if($registro_direccion->save())
                    {
                        $datos['direccion']['estado'] = 1;
                        $datos['direccion']['msj'] = 'direccion registrada';
                        $registro->id_direccion = $registro_direccion->id;
                    }
                    else
                    {
                        $datos['direccion']['estado'] = 0;
                        $datos['direccion']['msj'] = 'direccion no registrada';
                    }
                }
            }

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros modificados satifactoriamente';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registros No modificados';
            }
        }

        return $datos;
    }

    public function editarDatosPerfilResponsableMedico(Request $req){
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }
        // buscar AREA CM ADMINISTRADOR MEDICO de la institucion
        $area_cm_responsable = AreasCm::select('areas_cm.*','tipos_areas_cm.nombre as tipo_area')
                            ->join('tipos_areas_cm','tipos_areas_cm.id','=','areas_cm.id_tipo_area_cm')
                            ->where('areas_cm.id_lugar_atencion',$institucion->id_lugar_atencion)
                            ->where('areas_cm.id_responsable',$req->id_responsable)
                            ->where('areas_cm.id_tipo_area_cm',1)
                            ->first();

        $area_cm_responsable->nombre = $req->nombres;
        $area_cm_responsable->apellido_uno = $req->apellido_uno;
        $area_cm_responsable->apellido_dos = $req->apellido_dos;
        $area_cm_responsable->email = $req->email;
        $area_cm_responsable->telefono = $req->telefono;

        $area_cm_responsable->save();

        return ['estado' => 1, 'mensaje' => 'Datos actualizados','area_cm' => $area_cm_responsable];
    }

    // ACTUALIZAR CONTRASEÑA DEL RESPONSABLE DE LA INSTITUCION
    public function cambioContrasenaPerfilResponsable(Request $request)
    {
        $mensaje_error = '';
        $mensaje_error2 = '';
        $mensaje_success = '';
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->responsable_actual)) {
            $error['responsable_actual'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }
        else
        {
            $filtro = array();
            $filtro[] = array('id', $request->responsable_id);
            $user = User::where( $filtro )->first();


            if($user == NULL){
                $error['contrasena_actual'] = 'Contraseña actual no es valida';
                $mensaje_error2 .= 'Contraseña actual no es valida\n';
                $valido = 0;
            }
            else
            {
                $password = $request->responsable_actual;
                if (!password_verify($password, $user->password)) {
                    $error['contrasena_actual'] = 'Contraseña actual no es valida';
                    $mensaje_error2 .= 'Contraseña actual no es valida\n';
                    $valido = 0;
                }
            }

        }

        if(empty($request->responsable_nueva)) {
            $error['responsable_nueva'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }

        if(empty($request->responsable_validacion)) {
            $error['responsable_validacion'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }

        if(!empty($request->responsable_nueva)  && !empty($request->responsable_validacion))
        {
            if($request->responsable_nueva != $request->responsable_validacion)
            {
                $error['password_confirmacion'] = 'Contraseñas no son iguales';
                $mensaje_error2 .= 'Contraseñas no son iguales\n';
                $valido = 0;
            }
        }

        if($valido == 1)
        {
            $user->password = Hash::make($request->responsable_nueva);
            if($user->save())
            {
                $datos['estado'] = 1 ;
                $datos['msj'] = 'Contraseña actualizada' ;
                $mensaje_success = 'Contraseña Actualizada';
            }
            else
            {
                $datos['estado'] = 0 ;
                $datos['msj'] = 'Problemas al Actualizar la Contraseña' ;
                $mensaje_error = 'Problemas al Actualizar la Contraseña';
            }
        }
        else
        {
            $datos['estado'] = 0 ;
            $datos['msj'] = 'campos requeridos' ;
            $datos['error'] = $error;
            $mensaje_error = 'Campos requeridos.';
        }

        // return $datos;

        if(!empty($mensaje_error))
            return back()->with(['error' => $mensaje_error.'\n'.$mensaje_error2, 'titulo_error' => 'Cambio de Contraseña']);
        else
        {
            //envio de correo
            return back()->with(['mensaje' => $mensaje_success,'titulo_mensaje'=> 'Perfil Administrador De Institución']);
            // return redirect()->route('home.ingreso',['mensaje' => 'Contraseña actualizada'])->with('mensaje', 'Contraseña actualizada');
            // return back()->with( 'mensaje', 'Contraseña actualizada');

        }
    }

    public function cargaPersonalPersona(Request $request)
    {
        $datos = array();
        $nombre_tipo = $request->nombre_tipo;
        $id_tipo = $request->id_tipo;
        $id = $request->id;
        $id_lugar_atencion = $request->id_lugar_atencion;
        $datos['test'] = mb_strtoupper($nombre_tipo);
        $datos['test1'] = strpos(strtoupper($nombre_tipo), 'ASISTENTE');
        $datos['test2'] = strpos(strtoupper($nombre_tipo), 'ADMINISTRADOR');

        if(strstr(strtoupper($nombre_tipo), 'ASISTENTE') !== FALSE)
        {
            $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                    ->with(['AsistenteTipo' => function($query){
                                        $query->select('id', 'nombre', 'descripcion');
                                    }])
                                    ->with(['Direccion' => function($query){
                                        $query->with('Ciudad');
                                    }])
                                    ->where('id', $id)
                                    ->first();

            if(!empty($id_lugar_atencion))
            {
                $asistente_lugar = AsistenteLugarAtencion::where('id_asistente',$id)->where('id_lugar_atencion', $id_lugar_atencion)->first();
                $asistente->asistente_lugar = $asistente_lugar;
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $asistente;
            $datos['tipo'] = 'ASISTENTE';
            $datos['request'] = $request->all();
        }
        // adm_insitucion
        else if(strpos(strtoupper($nombre_tipo), 'ADMINISTRADOR') >= 0)
        {
            $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                    ->with(['TipoAdministrador' => function($query){
                                        $query->select('id', 'nombres','descripcion');
                                    }])
                                    ->with(['Direccion' => function($query){
                                        $query->with('Ciudad');
                                    }])
                                    ->where('id', $id)
                                    ->first();

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $administrador;
            $datos['tipo'] = 'ADMINISTRADOR';
            $datos['request'] = $request->all();
        }
        // contador
        else if(strpos(strtoupper($nombre_tipo), 'CONTADOR') >= 0)
        {

        }
        // profesional
        else if(strpos(strtoupper($nombre_tipo), 'PROFESIONAL') >= 0)
        {

        }

        return $datos;
    }

    public function actualizarAccesoPersonal(Request $request)
    {
        $datos = array();
        // tipo_personal
        // id_persona
        // id_personal
        // id_lugar_atencion
        // clave
        // id_edit

        if(strstr(strtoupper($request->tipo_personal), 'ASISTENTE') !== FALSE)
        {
            $registro = AsistenteLugarAtencion::where('id', $request->id_edit)->first();
            $registro->token = $request->clave;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'actualizacion exitosa';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'actualizacion fallida';
            }


        }
        else if(strpos(strtoupper($request->tipo_personal), 'ADMINISTRADOR') >= 0)
        {
            // $registro = AsistenteLugarAtencion::where('id', $request->id_edit)->first();
            // $registro->token = $request->clave;

            // if($registro->save())
            // {
            //     $datos['estado'] = 1;
            //     $datos['msj'] = 'actualizacion exitosa';
            // }
            $datos['estado'] = 0;
                $datos['msj'] = 'actualizacion fallida';
        }
        // contador
        else if(strpos(strtoupper($request->tipo_personal), 'CONTADOR') >= 0)
        {

        }
        // profesional
        else if(strpos(strtoupper($request->tipo_personal), 'PROFESIONAL') >= 0)
        {

        }

        return $datos;
    }

    public function estadisticas(){
        return view('app.adm_cm.estadisticas');
    }


    // public function estadisticas(){
    //     return view('estadisticas');
    // }

    // public function getEstadisticas(){
    //     return view('estadisticas_');
    // }


    public function perfil(){
        return view('app.adm_cm.perfil_cm');
    }

    public function laboratorio(){
        return view('app.adm_cm.laboratorio');
    }
    public function laboratorio_agregar(){
        return view('app.adm_cm.laboratorio_agregar');
    }
    public function examenes(){
        return view('app.adm_cm.examenes');
    }
	public function vacunatorio_instalaciones(){
        return view('app.adm_cm.vacunatorio_instalaciones');
    }
	public function vacunatorio_pedidos(){
        return view('app.adm_cm.vacunatorio_pedidos');
    }
	public function vacunatorio_personal(){
        return view('app.adm_cm.vacunatorio_personal');
    }
	public function vacunatorio_felicitreclamos(){
        return view('app.adm_cm.vacunatorio_felicitreclamos');
    }
    public function sucursales_cm(){
        return view('app.adm_cm.sucursales_cm');
    }
    public function procedimientos(){
        return view('app.adm_cm.procedimientos');
    }
	public function at_profesionales(){
        return view('app.adm_cm.at_profesionales');
    }
    public function profesionales()
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['ODONTOLOG'] = array();
        $lista_profesionales['OTROS'] = array();

        if($LugarAtencion)
        {
            $profesionales = $LugarAtencion->Profesionales()->get();

            if($profesionales)
            {

                // echo json_encode($profesionales);
                // exit();

                foreach ($profesionales as $key_prof => $value_prof)
                {

                    if($value_prof->id_especialidad == 1)//MEDICO
                    {
                        array_push($lista_profesionales['MEDICO'], $value_prof) ;
                    }
                    else if($value_prof->id_especialidad == 2)//ODONTOLOG
                    {
                        array_push($lista_profesionales['ODONTOLOG'], $value_prof) ;
                    }
                    else //OTROS
                    {
                        array_push($lista_profesionales['OTROS'], $value_prof) ;
                    }
                }
            }
        }
        /** FIN CARGA DE PROFESIONALES */

        $tipo_convenio = TipoConvenioInstitucion::where('estado', 1)->get();

        $region = Region::all();
        $especialidad = Especialidad::all();
        $roles = Roles::orderBy('alias','ASC')->where('difusion',1)->get();

        $usuario = Auth::user();
        $roles_ = $usuario->roles()->orderBy('id', 'DESC')->pluck('name')->toArray();
        $adm_medico = false;
        foreach($roles_ as $rol){
            if($rol == 'AdministradorMedico'){
                $adm_medico = true;
                break;
            }
        }

        $servicios = Servicios::all();

        return view('app.adm_cm.profesionales')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_profesionales' => $lista_profesionales,
            'tipo_convenio' => $tipo_convenio,
            'region' => $region,
            'especialidad' => $especialidad,
            'roles' => $roles,
            'adm_medico' => $adm_medico,
            'servicios' => $servicios
        ]);
    }

    public function profesionales_id($id){

        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            // Modificado por Francisco para traer la institucion buscada por id
            // $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            $registro = Instituciones::where('id',$id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        $institucion = Instituciones::find($id);

        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['ODONTOLOG'] = array();
        $lista_profesionales['OTROS'] = array();

        if($LugarAtencion)
        {
            $profesionales = $LugarAtencion->Profesionales()->get();
            if($profesionales)
            {

                // echo json_encode($profesionales);
                // exit();

                foreach ($profesionales as $key_prof => $value_prof)
                {

                    if($value_prof->id_especialidad == 1)//MEDICO
                    {
                        array_push($lista_profesionales['MEDICO'], $value_prof) ;
                    }
                    else if($value_prof->id_especialidad == 2)//ODONTOLOG
                    {
                        array_push($lista_profesionales['ODONTOLOG'], $value_prof) ;
                    }
                    else //OTROS
                    {
                        array_push($lista_profesionales['OTROS'], $value_prof) ;
                    }
                }
            }
        }
        /** FIN CARGA DE PROFESIONALES */

        $tipo_convenio = TipoConvenioInstitucion::where('estado', 1)->get();

        $region = Region::all();
        $especialidad = Especialidad::all();
        $roles = Roles::orderBy('alias','ASC')->where('difusion',1)->get();

        $usuario = Auth::user();
        $roles_ = $usuario->roles()->orderBy('id', 'DESC')->pluck('name')->toArray();

        $adm_medico = false;
        foreach($roles_ as $rol){
            if($rol == 'AdministradorMedico'){
                $adm_medico = true;
                break;
            }
        }

        $servicios = Servicios::all();

        return view('app.adm_cm.profesionales_id')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_profesionales' => $lista_profesionales,
            'tipo_convenio' => $tipo_convenio,
            'region' => $region,
            'especialidad' => $especialidad,
            'roles' => $roles,
            'adm_medico' => $adm_medico,
            'servicios' => $servicios
        ]);
    }

    public function profesionales_institucion(){
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE PROFESIONALES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['ODONTOLOG'] = array();
        $lista_profesionales['OTROS'] = array();

        if($LugarAtencion)
        {
            $profesionales = $LugarAtencion->Profesionales()->get();
            if($profesionales)
            {

                // echo json_encode($profesionales);
                // exit();

                foreach ($profesionales as $key_prof => $value_prof)
                {

                    if($value_prof->id_especialidad == 1)//MEDICO
                    {
                        array_push($lista_profesionales['MEDICO'], $value_prof) ;
                    }
                    else if($value_prof->id_especialidad == 2)//ODONTOLOG
                    {
                        array_push($lista_profesionales['ODONTOLOG'], $value_prof) ;
                    }
                    else //OTROS
                    {
                        array_push($lista_profesionales['OTROS'], $value_prof) ;
                    }
                }
            }
        }
        /** FIN CARGA DE PROFESIONALES */

        $tipo_convenio = TipoConvenioInstitucion::where('estado', 1)->get();

        $region = Region::all();
        $especialidad = Especialidad::all();
        $roles = Roles::orderBy('alias','ASC')->where('difusion',1)->get();

        $usuario = Auth::user();
        $roles_ = $usuario->roles()->orderBy('id', 'DESC')->pluck('name')->toArray();
        $adm_medico = true;

        $servicios = Servicios::all();

        return view('app.adm_cm.profesionales')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_profesionales' => $lista_profesionales,
            'tipo_convenio' => $tipo_convenio,
            'region' => $region,
            'especialidad' => $especialidad,
            'roles' => $roles,
            'adm_medico' => $adm_medico,
            'servicios' => $servicios
        ]);
    }

    public function mensaje_difusion(Request $req){
        try {
            $destinatarios = $req->para;
            // Obtener los roles correspondientes
            $roles = Role::whereIn('id', $destinatarios)->get();
            // Obtener los nombres de los roles
            $roleNames = $roles->pluck('name');

            // Obtener todos los usuarios que tienen esos roles
            $usuariosConRoles = User::whereHas('roles', function($query) use ($roleNames) {
                $query->whereIn('name', $roleNames);
            })->get();

            $datos_mensaje = [
                'titulo' => $req->titulo,
                'asunto' => $req->detalle,
                'mensaje' => $req->mensaje,
            ];

            foreach($usuariosConRoles as $usuario){
                // enviar un mensaje a cada usuario
                $nuevo_mensaje = new Mensajes();
                $nuevo_mensaje->id_usuario = Auth::user()->id;
                $nuevo_mensaje->destinatarios = json_encode($destinatarios);
                $nuevo_mensaje->id_receptor = $usuario->id;
                $nuevo_mensaje->datos_mensaje = json_encode($datos_mensaje);
                $nuevo_mensaje->tipo_mensaje = 2; // Difusion
                $nuevo_mensaje->fecha_envio = Carbon::now()->format('Y-m-d H:i:s');
                $nuevo_mensaje->estado = 1; // 1: No leido, 2: Leido

                $nuevo_mensaje->save();
            }

            $datos = array();
            $datos['estado'] = 1;
            $datos['msj'] = 'mensaje enviado';

            // Manejar archivos adjuntos
            if ($req->hasFile('misArchivosGes')) {
                foreach ($req->file('misArchivosGes') as $file) {
                    $filename = time().'_'.$file->getClientOriginalName();
                    $file->storeAs('uploads/', $filename, 'public');

                    // Aquí puedes guardar la información del archivo en la base de datos si es necesario
                    // Ejemplo:
                    // $archivo = new Archivo();
                    // $archivo->mensaje_id = $nuevo_mensaje->id;
                    // $archivo->ruta = '/storage/uploads/'.$filename;
                    // $archivo->save();
                }
            }

            return $datos;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function mensaje_difusion_ministerio(Request $req){
        try {
            // verificar si viene un archivo de tipo file adjunto
            $destinatarios = $req->receptores;
            // Obtener los roles correspondientes
            $roles = Role::whereIn('id', $destinatarios)->get();
            // Obtener los nombres de los roles
            $roleNames = $roles->pluck('name');

            // Obtener todos los usuarios que tienen esos roles
            $usuariosConRoles = User::whereHas('roles', function($query) use ($roleNames) {
                $query->whereIn('name', $roleNames);
            })->get();

            $datos_mensaje = [
                'titulo' => $req->titulo,
                'asunto' => $req->detalle,
                'mensaje' => $req->message,
            ];

            foreach($usuariosConRoles as $usuario){
                // enviar un mensaje a cada usuario
                $nuevo_mensaje = new Mensajes();
                $nuevo_mensaje->id_usuario = Auth::user()->id;
                $nuevo_mensaje->destinatarios = json_encode($destinatarios);
                $nuevo_mensaje->id_receptor = $usuario->id;
                $nuevo_mensaje->datos_mensaje = json_encode($datos_mensaje);
                $nuevo_mensaje->tipo_mensaje = 2; // Difusion
                $nuevo_mensaje->fecha_envio = Carbon::now()->format('Y-m-d H:i:s');
                $nuevo_mensaje->estado = 1; // 1: No leido, 2: Leido

                $nuevo_mensaje->save();
            }

            $datos = array();
            $datos['estado'] = 1;
            $datos['msj'] = 'mensaje enviado';

            // Manejar archivos adjuntos
            if ($req->hasFile('archivos')) {

                foreach ($req->file('archivos') as $file) {

                    $filename = time().'_'.$file->getClientOriginalName();
                    $file->storeAs('uploads/', $filename, 'public');

                    // Aquí puedes guardar la información del archivo en la base de datos si es necesario
                    // Ejemplo:
                    // $archivo = new Archivo();
                    // $archivo->mensaje_id = $nuevo_mensaje->id;
                    // $archivo->ruta = '/storage/uploads/'.$filename;
                    // $archivo->save();
                }
            }else{
                $datos['msj'] = 'mensaje enviado sin archivos';
            }

            return $datos;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function historial_mensajes_profesional($id){
        $mensajes = Mensajes::where('id_receptor', $id)->orderBy('fecha_envio', 'DESC')->get();
        foreach($mensajes as $mensaje){
            $mensaje->datos_mensaje = json_decode($mensaje->datos_mensaje);
            $mensaje->destinatarios = json_decode($mensaje->destinatarios);
        }
        return ['estado' => 1, 'mensajes' => $mensajes];
    }

    public function mensaje_profesional(Request $req){
        try {
            $id_receptor = intval($req->id_profesional_mensaje);
            $datos_mensaje = [
                'titulo' => $req->titulo,
                'asunto' => $req->detalle,
                'mensaje' => $req->mensaje,
            ];
            $mensaje = new Mensajes;
            $mensaje->id_usuario = Auth::user()->id;
            $mensaje->destinatarios = null;
            $mensaje->id_receptor = $id_receptor ? $id_receptor : null;
            $mensaje->datos_mensaje = json_encode($datos_mensaje);
            $mensaje->tipo_mensaje = 1; // Directo a profesional
            $mensaje->fecha_envio = Carbon::now()->format('Y-m-d H:i:s');
            $mensaje->estado = 1; // 1: No leido, 2: Leido

            $mensaje->save();
            return ['estado' => 1, 'msj' => 'mensaje enviado'];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

	public function liquidacion_profesionales(){
        return view('app.adm_cm.liquidacion_profesionales');
    }

    public function asistente_adm_liquidacion_profesionales(){
        return view('app.asistente_adm_cm.liquidacion_profesionales');
    }

	public function adm_liquidacion_profesionales(){
        return view('app.adm_cm.liquidacion_profesionales');
    }

    public function dame_profesional(Request $req){
        $profesional = Profesional::where('id', $req->id)->first();
        return ['estado' => 1, 'profesional' => $profesional];
    }

    public function personal()
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_asistente = array();
        if($LugarAtencion)
        {
            $lista_asistente = $LugarAtencion->AsistenteIntitucion()->get();

            if($lista_asistente)
            {
                foreach ($lista_asistente as $key => $value)
                {

                    /** roles */
                    $usuario = User::where('id', $value->id_usuario)->first();
                    $roles = $usuario->roles()->get();
                    $array_roles = array();
                    foreach ($roles as $key_2 => $value_2) {
                        array_push($array_roles, $value_2->name);
                    }

                    if(!empty($array_roles))
                        $lista_asistente[$key]->roles = implode(",",$array_roles);
                    else
                        $lista_asistente[$key]->roles = '';

                    /** tipo asistente */
                    $lista_asistente[$key]->asistente_tipo = AsistenteTipo::find($value->id_asistente_tipo);

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_asistente[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion')->where($filtro_cont)->first();
                }
            }
        }
        /** FIN CARGA DE ASISTENTES */

        /** CARGA DE ADMINISTRATIVOS */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_administrativo = array();
        if($LugarAtencion)
        {
            $lista_administrativo = $LugarAtencion->AdministrativoInstitucion()->get();

            if($lista_administrativo)
            {
                foreach ($lista_administrativo as $key => $value)
                {

                    /** roles */
                    $usuario = User::where('id', $value->id_admin)->first();
                    $roles = $usuario->roles()->get();
                    $array_roles = array();
                    foreach ($roles as $key_2 => $value_2) {
                        array_push($array_roles, $value_2->name);
                    }

                    if(!empty($array_roles))
                        $lista_administrativo[$key]->roles = implode(",",$array_roles);
                    else
                        $lista_administrativo[$key]->roles = '';

                    /** tipo administrativo */
                    $lista_administrativo[$key]->tipo_administrativo = TipoAdministrador::find($value->id_tipo_administrador);

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_administrativo[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion')->where($filtro_cont)->first();
                }
            }
        }


        /** LISTA CONTRATO */
        $lista_tipo_asistente = AsistenteTipo::select('id', 'nombre')->where('estado',1)->get();
        $lista_tipo_administrador = TipoAdministrador::select('id', 'nombres')->where('estado',1)->get();

        $lista_tipo_contrato = array();
        foreach ($lista_tipo_asistente as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombre),
            ));
        }
        foreach ($lista_tipo_administrador as $key => $value) {
            array_push($lista_tipo_contrato,array(
                'id' => $value->id,
                'nombre' => strtoupper($value->nombres),
            ));
        }
        /** FIN LISTA CONTRATO */

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        $usuario = Auth::user();

        $roles = $usuario->roles()->orderBy('id', 'DESC')->get();
        $adm_medico = false;
        foreach($roles as $rol){
            if($rol->name == 'AdministradorMedico'){
                $adm_medico = true;
                // salir del bucle
                break;
            }
        }

        $lista_tipo_administrativo = TipoAdministrador::where('estado', 1)->get();

        return view('app.adm_cm.personal')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_asistente' => $lista_asistente,
            'lista_tipo_contrato' => (object)$lista_tipo_contrato,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
            'lista_tipo_asistente' => $lista_tipo_asistente,
            'adm_medico' => $adm_medico,
            'lista_tipo_administrativo' => $lista_tipo_administrativo,
            'lista_administrativo' => $lista_administrativo
        ]);;
    }

    public function personal_asistentes()
    {
        $datos = array();
        $errro = array();
        $valido = 1;


        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_asistente = array();
        if($LugarAtencion)
        {
            $lista_asistente = $LugarAtencion->AsistenteIntitucion()->get();

            if($lista_asistente)
            {
                foreach ($lista_asistente as $key => $value)
                {

                    /** roles */
                    $usuario = User::where('id', $value->id_usuario)->first();
                    $roles = $usuario->roles()->get();
                    $array_roles = array();
                    foreach ($roles as $key_2 => $value_2) {
                        array_push($array_roles, $value_2->name);
                    }

                    if(!empty($array_roles))
                        $lista_asistente[$key]->roles = implode(",",$array_roles);
                    else
                        $lista_asistente[$key]->roles = '';

                    /** tipo asistente */
                    $lista_asistente[$key]->asistente_tipo = AsistenteTipo::find($value->id_asistente_tipo);

                    $lista_asistente[$key]->direccion = $value->direccion()->first()->direccion;
                    $lista_asistente[$key]->numero_dir = $value->direccion()->first()->numero_dir;
                    $lista_asistente[$key]->ciudad = $value->direccion()->first()->ciudad()->first()->nombre;
                    $lista_asistente[$key]->institucion = $institucion;
                }
            }
        }
        /** FIN CARGA DE ASISTENTES */

        if($lista_asistente)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $lista_asistente;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }


        return $datos;
    }


	public function asistente_adm_buscar_pacientes()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',strtoupper($asistente_tipo->nombre));
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

        $url = 'app.asistente_adm_cm.buscar_paciente'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
        );

        return view($url, $array_data);
    }

    public function adm_buscar_pacientes()
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_asistente = array();
        if($LugarAtencion)
        {
            $url = 'app.adm_cm.pacientes'; // institucion
            $array_data = array(
                'lugares_atencion' => $LugarAtencion,
            );
            return view($url, $array_data);
        }
        else
        {
            return back()->with('warning', 'El Lugar de Atencion no se encontro');
        }

    }
	public function adm_cm_area_contabilidad(){
        return view('adm_cm.area_contabilidad');
    }

    public function administracion_cm(){
        return view('app.adm_cm.administracion_cm');
    }

    public function insumos(){
        return view('app.bodega.escritorio_bodega_insumo');
    }
    public function proveedores(){
        return view('app.adm_cm.proveedores');
    }
    public function controles_almacenamiento(){
        $producto_controller = new ProductosController();
        // dame productos que necesitan almacenamiento
        $productos = $producto_controller->dameProductosAlmacenamiento();

        return view('app.bodega.controles_almacenamiento',[
            'productos' => $productos
        ]);
    }

    public function pagos(){
        return view('app.adm_cm.pagos');
    }
    public function departamentos(){
        return view('app.adm_cm.departamentos_servicios');
    }
	public function vacunatorio(){
        return view('app.adm_cm.vacunatorio');
    }

	public function buscar_ciudad_region(Request $request)
    {
        $ciudad = Ciudad::where('id_region', $request->region)->orderBy('nombre')->get();

        return json_encode($ciudad);
    }

    public function asociarProfesionalExistente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_cargo))
        {
            $error['id_cargo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->id_tipo_convenio_institucion))
        // {
        //     $error['id_tipo_convenio_institucion'] = 'campo requerido';
        //     $valido = 0;
        // }
        // else
        // {
        //     if($request->id_tipo_convenio_institucion == 1)
        //     {
        //         if(empty($request->fijo))
        //         {
        //             $error['fijo'] = 'campo requerido';
        //             $valido = 0;
        //         }
        //     }
        //     else if($request->id_tipo_convenio_institucion == 2)
        //     {
        //         if(empty($request->atencion))
        //         {
        //             $error['atencion'] = 'campo requerido';
        //             $valido = 0;
        //         }
        //         if(empty($request->confirmacion_agenda))
        //         {
        //             $error['confirmacion_agenda'] = 'campo requerido';
        //             $valido = 0;
        //         }
        //         if(empty($request->ggcc))
        //         {
        //             $error['ggcc'] = 'campo requerido';
        //             $valido = 0;
        //         }
        //         if(empty($request->box))
        //         {
        //             $error['box'] = 'campo requerido';
        //             $valido = 0;
        //         }
        //     }
        // }

        if($valido)
        {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;

            /** INFORMACION DE INSTITUCION Y RESPONSABLE */
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {

                                $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                        ->where('id_empleado', $responsable->id)
                                        ->whereIn('estado', [2,3])
                                        ->first();

                                if($result_contrato)
                                {
                                    $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** INSTITUCION */
                                        $institucion = $registro;
                                        $tipo_institucion = 'institucion';
                                    }
                                    else
                                    {
                                        $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                        if($registro)
                                        {
                                            /** SERVICIOS */
                                            $institucion = $registro;
                                            $tipo_institucion = 'servicio';
                                        }
                                        else
                                        {
                                            return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }
                                else
                                {
                                    return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }

                }
            }
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

            $profesionales = Profesional::where('id', $request->id_profesional)->first();
            $profesional_servicio = new ProfesionalServicioClinico();
            $profesional_servicio->id_profesional = $profesionales->id;
            $profesional_servicio->id_cargo = $request->id_cargo;
            $profesional_servicio->id_servicio_interno = $request->id_servicio_clinico;
            $profesional_servicio->observaciones = '';
            $profesional_servicio->fecha = Carbon::now();

            if($profesional_servicio->save()){
                $servicios_internos = $this->dame_servicios_internos($institucion->id);
                $v = view('fragm.salas_servicios_profesionales',['servicios_internos' => $servicios_internos])->render();
                return ['estado' => 1,'mensaje' => 'Profesional asignado correctamente.','v' => $v];
            }else{
                return ['estado' => 'error','mensaje' => 'Ha ocurrido un error'];
            }


            if($profesionales)
            {
                // id_lugar_atencion
                // id_profesional
                // creo invitacion
                $rut = $profesionales->rut;
                $nombre = $profesionales->nombre;
                $apellido_uno = $profesionales->apellido_uno;
                $apellido_dos = $profesionales->apellido_dos;
                $telefono = $profesionales->telefono;
                $email = $profesionales->email;
                $id_user_solicitud = Auth::user()->id;
                $id_user_invitado = $profesionales->id_usuario;
                $id_especialidad = $profesionales->id_especialidad;
                $id_tipo_especialidad = $profesionales->id_tipo_especialidad;
                $id_sub_tipo_especialidad = $profesionales->id_sub_tipo_especialidad;
                $resultado = InvitacionController::registroInvtacionProfesional($request->id_lugar_atencion, $rut, $nombre, $apellido_uno, $apellido_dos, $telefono, $email, $id_especialidad, $id_tipo_especialidad, $id_sub_tipo_especialidad, $id_user_solicitud, $id_user_invitado, '0');
                if($resultado->estado == 1)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'profesional invitado';

                    /** GENERAR PROFESIONAL INSTITUCION CONVENIO */
                    $registro_prof_inst_conv = ProfesionalInstitucionConvenioController::registrar($resultado->last_id, $profesionales->id, $institucion->id, $request->id_lugar_atencion, $request->id_tipo_convenio_institucion, $request->fijo, $request->atencion, $request->confirmacion_agenda, $request->ggcc, $request->box,'','', $request->observacion);
                    $datos['registro_prof_inst_conv'] = $registro_prof_inst_conv;

                    if($registro_prof_inst_conv->estado == 1)
                    {
                        /** ENVIO NOTIFICACION */
                        $result_notificacion = ProfesionalInstitucionConvenioController::envioNotificacionConvenio(1, $resultado->last_id);

                        $datos['notificacion'] = $result_notificacion;
                    }
                    else
                    {
                        $datos['notificacion']['estado'] = 0;
                        $datos['notificacion']['msj'] = 'notificacion no enviada';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'invitacion al profesional con falla';
                }

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'profesional no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }



        return $datos;
    }

    public function asociarProfesionalNuevo(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->apellido_uno))
        {
            $error['apellido_uno'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->apellido_dos))
        {
            $error['apellido_dos'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->correo))
        {
            $error['correo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->telefono_uno))
        {
            $error['telefono_uno'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->profesion))
        {
            $error['profesion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->especialidad))
        {
            $error['especialidad'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->sub_tipo_especialidad))
        {
            $error['sub_tipo_especialidad'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo_convenio_institucion))
        {
            $error['id_tipo_convenio_institucion'] = 'campo requerido';
            $valido = 0;
        }
        else
        {
            if($request->id_tipo_convenio_institucion == 1)
            {
                if(empty($request->fijo))
                {
                    $error['fijo'] = 'campo requerido';
                    $valido = 0;
                }
            }
            else if($request->id_tipo_convenio_institucion == 2)
            {
                if(empty($request->atencion))
                {
                    $error['atencion'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->confirmacion_agenda))
                {
                    $error['confirmacion_agenda'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->ggcc))
                {
                    $error['ggcc'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->box))
                {
                    $error['box'] = 'campo requerido';
                    $valido = 0;
                }
            }
        }

        if($valido)
        {

            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;

            /** INFORMACION DE INSTITUCION Y RESPONSABLE */
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {

                                $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                        ->where('id_empleado', $responsable->id)
                                        ->whereIn('estado', [2,3])
                                        ->first();

                                if($result_contrato)
                                {
                                    $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** INSTITUCION */
                                        $institucion = $registro;
                                        $tipo_institucion = 'institucion';
                                    }
                                    else
                                    {
                                        $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                        if($registro)
                                        {
                                            /** SERVICIOS */
                                            $institucion = $registro;
                                            $tipo_institucion = 'servicio';
                                        }
                                        else
                                        {
                                            return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }
                                else
                                {
                                    return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }

                }
            }
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

            /** REGISTRO INVITACION */
            $rut = $request->rut;
            $nombre = $request->nombre;
            $apellido_uno = $request->apellido_uno;
            $apellido_dos = $request->apellido_dos;
            $telefono = $request->telefono_uno;
            $email = $request->correo;
            $profesion = $request->profesion;
            $especialidad = $request->especialidad;
            $sub_tipo_especialidad = $request->sub_tipo_especialidad;
            $id_user_solicitud = Auth::user()->id;

            $result_invitacion = InvitacionController::registroInvtacionProfesional($request->id_lugar_atencion, $rut, $nombre, $apellido_uno, $apellido_dos, $telefono, $email, $profesion, $especialidad, $sub_tipo_especialidad, $id_user_solicitud, '', '0');

            if($result_invitacion->estado == 1)
            {
                /** CREAR CONVENIO PROFESIONAL INSTITUCION */
                /** ENVIO NOTIFICACION */
                $datos['estado'] = 1;
                $datos['msj'] = 'profesional invitado';


                /** VALIDAR CONVENIO */
                $filtro = array();
                $filtro[] = array('id_invitacion',$result_invitacion->last_id);
                $filtro[] = array('id_institucion',$institucion->id);
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
                $filtro[] = array('estado',1);
                $resul_buscar_conv = ProfesionalInstitucionConvenio::where($filtro)->first();

                if($resul_buscar_conv)
                {
                    /** ACTUALIZACION DE PROFESIONAL INSTITUCION CONVENIO */
                    $result_prof_inst_convenio = ProfesionalInstitucionConvenioController::modificar($resul_buscar_conv->id, $result_invitacion->last_id, '', $institucion->id, $request->id_lugar_atencion, $request->id_tipo_convenio_institucion, $request->fijo, $request->atencion, $request->confirmacion_agenda, $request->ggcc, $request->box, '', '', $resul_buscar_conv->estado, $request->observacion);
                    $datos['registro_prof_inst_conv'] = $registro_prof_inst_conv = $result_prof_inst_convenio;
                    if($registro_prof_inst_conv->estado == 1)
                    {
                        /** ENVIO NOTIFICACION */
                        $result_notificacion = ProfesionalInstitucionConvenioController::envioNotificacionConvenio(1, $result_invitacion->last_id);
                        $datos['notificacion'] = $result_notificacion;
                    }
                    else
                    {
                        $datos['notificacion']['estado'] = 0;
                        $datos['notificacion']['msj'] = 'notificacion no enviada';
                    }
                }
                else
                {
                    /** GENERAR PROFESIONAL INSTITUCION CONVENIO */
                    $registro_prof_inst_conv = ProfesionalInstitucionConvenioController::registrar($result_invitacion->last_id, '', $institucion->id, $request->id_lugar_atencion, $request->id_tipo_convenio_institucion, $request->fijo, $request->atencion, $request->confirmacion_agenda, $request->ggcc, $request->box,'','', $request->observacion);
                    $datos['registro_prof_inst_conv'] = $registro_prof_inst_conv;
                    if($registro_prof_inst_conv->estado == 1)
                    {
                        /** ENVIO NOTIFICACION */
                        $result_notificacion = ProfesionalInstitucionConvenioController::envioNotificacionConvenio(1, $result_invitacion->last_id);
                        $datos['notificacion'] = $result_notificacion;
                    }
                    else
                    {
                        $datos['notificacion']['estado'] = 0;
                        $datos['notificacion']['msj'] = 'notificacion no enviada';
                    }
                }

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en invitacion';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function buscar_profesional(Request $req)
    {
        try {
            $datos = array();
            $profesional = Profesional::where('id', $req->id_profesional)->first();

            if($profesional)
            {
                $direccion_text = 'No Informada';
                if($profesional->id_direccion != '' || $profesional->id_direccion!=0)
                {
                    $direccion = Direccion::where('id', $profesional->id_direccion)->first();
                    if($direccion)
                        $direccion_text = $direccion->direccion.', '.$direccion->ciudad->nombre;
                }
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $profesional;
                $datos['direccion'] = $direccion_text;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }

            return $datos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function buscar_asistente(Request $request)
    {
        $datos = array();

        $asistente = Asistente::where('id', $request->id)->first();

        if($asistente)
        {
            $direccion_text = 'No Informada';
            if($asistente->id_direccion != '' || $asistente->id_direccion!=0)
            {
                $direccion = Direccion::where('id', $asistente->id_direccion)->first();
                if($direccion)
                    $direccion_text = $direccion->direccion.', '.$direccion->ciudad->nombre;
            }

            $id_busqueda = Auth::user()->id;

            /** INFORMACION DE INSTITUCION Y RESPONSABLE */
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {

                                $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                        ->where('id_empleado', $responsable->id)
                                        ->whereIn('estado', [2,3])
                                        ->first();

                                if($result_contrato)
                                {
                                    $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** INSTITUCION */
                                        $institucion = $registro;
                                        $tipo_institucion = 'institucion';
                                    }
                                    else
                                    {
                                        $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                        if($registro)
                                        {
                                            /** SERVICIOS */
                                            $institucion = $registro;
                                            $tipo_institucion = 'servicio';
                                        }
                                        else
                                        {
                                            return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }
                                else
                                {
                                    return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }

                }
            }
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

            /** CARGA DE ASISTENTES */
            $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
            $filtro = array();
            $filtro[] = array('id_empleado', $asistente->id);
            $filtro[] = array('estado', 2);
            $filtro[] = array('id_lugar_atencion', $LugarAtencion->id);
            $asistente->contrato = ContratoDependiente::where($filtro)->first();

            $filtro_d = array();
            $filtro_d[] = array();
            $asistente->direccion = Direccion::with('Ciudad')->find($asistente->id_direccion);

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $asistente;
            $datos['direccion'] = $direccion_text;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }

        return $datos;
    }

    public function buscar_administrativo(Request $req){

        $datos = array();
        $administrativo = AdminInstServ::where('id', $req->id)->first();
        // buscamos al profesional relacionado

        if($administrativo)
        {
            $direccion_text = 'No Informada';
            if($administrativo->id_direccion != '' || $administrativo->id_direccion!=0)
            {
                $direccion = Direccion::where('id', $administrativo->id_direccion)->first();
                if($direccion)
                    $direccion_text = $direccion->direccion.', '.$direccion->ciudad->nombre;
            }

            $administrativo->contrato = ContratoDependiente::where('id_empleado', $administrativo->id)->first();

            $administrativo->direccion = Direccion::with('Ciudad')->find($administrativo->id_direccion);

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $administrativo;
            $datos['direccion'] = $direccion_text;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }

        return $datos;

    }

    public function buscar_mantencion(Request $req){

            $datos = array();
            $mantencion = AdminMantenInst::where('id', $req->id)->first();

            // buscamos al profesional relacionado

            if($mantencion)
            {
                $direccion_text = 'No Informada';
                if($mantencion->id_direccion != '' || $mantencion->id_direccion!=0)
                {
                    $direccion = Direccion::where('id', $mantencion->id_direccion)->first();
                    if($direccion)
                        $direccion_text = $direccion->direccion.', '.$direccion->ciudad->nombre;
                }

                $mantencion->contrato = ContratoDependiente::where('id_empleado', $mantencion->id)->first();

                $mantencion->direccion = Direccion::with('Ciudad')->find($mantencion->id_direccion);

                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $mantencion;
                $datos['direccion'] = $direccion_text;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }

            return $datos;
    }

    public function buscar_paciente_rut(Request $request)
    {
        $datos = array();
        $id_lugar_atencion = $request->id_lugar_atencion;
        $rut = $request->rut;
        $nombre = $request->nombre;
        $apellido = $request->apellido;

        // $filtro = array();
        // $filtro[] = array('rut',$rut);
        // $filtro[] = array('nombres','like','%'.$nombre.'%');

        // $filtro_2 = array();
        // $filtro_2[] = array('apellido_uno','like','%'.$apellido.'%');
        // $filtro_2[] = array('apellido_dos','like','%'.$apellido.'%');
        // 1=1
        // rut='26340063-1' and (nombres like '%'.$nombre.'%'; or apellido_uno like '%daviladasda%' or apellido_dos like '%fdavila%')

        $sql  = '';
        $sql_val = array();
        if(!empty($rut))
        {
            $sql .= " rut=? ";
            $sql_val[] = $rut;
        }
        if(!empty($nombre))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " nombres like ? ";
            $sql_val[] = '%'.$nombre.'%';
        }
        if(!empty($apellido))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " apellido_uno like ?  OR  apellido_dos like ? ";
            $sql_val[] = '%'.$apellido.'%';
            $sql_val[] = '%'.$apellido.'%';
        }

        $registro = Paciente::with(['FichaAtencion' => function($query) use ($id_lugar_atencion){
                                $query->select('id','id_lugar_atencion','id_paciente')->where('id_lugar_atencion',$id_lugar_atencion);
                            }])
                            ->with(['Prevision' =>function($query){
                                $query->select('id','nombre');
                            }])
                            ->with(['Direccion' =>function($query){
                                $query->select('id','direccion','numero_dir','id_ciudad')
                                            ->with(['Ciudad' => function($query2){
                                                $query2->select('id','nombre','id_region')
                                                    // ->Region()
                                                    ;
                                            }]);
                            }])
                            /** PERMITE FILTRAR POR LUGAR ATENCION, RUT, NOMBRE, APELLIDO  */
                            ->porLuAt_Rut_Nom_Ape($id_lugar_atencion, $rut, $nombre, $apellido)
                            ->get();
        if($registro)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registro;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    public function asistente_adm_mis_profesionales()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

        $profesionales = $lugares_atencion->profesionales()->get();


        $url = 'app.asistente_adm_cm.mis_profesionales'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
            'profesionales' => $profesionales,
        );

        return view($url, $array_data);
    }
	public function adm_inst_mis_profesionales()
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();

        $profesionales = $LugarAtencion->profesionales()->get();


        $url = 'app.adm_cm.mis_profesionales'; // institucion
        $array_data = array(
            'lugares_atencion' => $LugarAtencion,
            'profesionales' => $profesionales,
        );

        return view($url, $array_data);
    }
    public function asistente_adm_cargar_contrato(Request $request)
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->where('id_asistente_tipo',3)->first();
        if($asistente)
        {
            $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

            $filtro = array();
            $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
            $filtro[] = array('estado',2) ;
            $contrato = ContratoDependiente::where($filtro)->first();
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $id_institucion = $contrato->id_institucion;

            /** CARGA DE PERSONAL */
            /** EMPLEADOS */
            $contratos_nuevos = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',1)
                                            // ->persona()
                                            ->get();
            $contratos_activos = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',2)
                                            ->get();
            $contratos_vencidos = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',3)
                                            ->get();
            $contratos_finalizados = ContratoDependiente::where('id_institucion',$id_institucion)
                                            ->where('id_lugar_atencion', $id_lugar_atencion)
                                            ->where('estado',4)
                                            ->get();

            /** PROFESIONALES */
            $profesionales = array();

            $url = 'app.asistente_adm_cm.contratos';
            $array_data = array(
                'asistente' => $asistente,
                'contratos_nuevos' => $contratos_nuevos,
                'contratos_activos' => $contratos_activos,
                'contratos_vencidos' => $contratos_vencidos,
                'contratos_finalizados' => $contratos_finalizados,
                'profesionales' => $profesionales,
            );

            return view($url, $array_data);
        }
        else
        {
            return back()->with('error','Asistente sin permiso de visualizar Contratos');
        }
    }

    public function asistente_adm_detalle_contrato(Request $request)
    {
        $datos = array();

        if(!empty($request->id))
        {
            $registros = ContratoDependiente::where('id', $request->id)->first();
            if($registros)
            {
                if(strstr(strtoupper($registros->tipo_empleado), 'ASISTENTE') !== FALSE)
                {
                    $registro = Asistente::where('id', $registros->id_empleado)->first();
                    $direccion = $registro->Direccion()->first();
                    $ciudad_nombre = $direccion->Ciudad()->first()->nombre;
                    $ciudad_id_region = $direccion->Ciudad()->first()->id_region;
                    $region = Region::where('id', $ciudad_id_region)->first()->nombre;
                    $registro->direccion = array(
                        'direccion' => $direccion->direccion,
                        'numero_dir' => $direccion->numero_dir,
                        'ciudad' => $ciudad_nombre,
                        'region' => $region
                    );

                }
                else if(strpos(strtoupper($registros->tipo_empleado), 'ADMINISTRADOR') >= 0)
                {
                    $registro = AdminInstServ::where('id', $registros->id_empleado)->first();
                    $direccion = $registro->Direccion()->first();
                    $ciudad_nombre = $direccion->Ciudad()->first()->nombre;
                    $ciudad_id_region = $direccion->Ciudad()->first()->id_region;
                    $region = Region::where('id', $ciudad_id_region)->first()->nombre;
                    $registro->direccion = array(
                        'direccion' => $direccion->direccion,
                        'numero_dir' => $direccion->numero_dir,
                        'ciudad' => $ciudad_nombre,
                        'region' => $region
                    );
                }
                else if(strpos(strtoupper($registros->tipo_empleado), 'CONTADOR') >= 0)
                {

                }
                else if(strpos(strtoupper($registros->tipo_empleado), 'PROFESIONAL') >= 0)
                {
                    $registro = Profesional::where('id', $registros->id_empleado)->first();
                    $direccion = $registro->Direccion()->first();
                    $ciudad_nombre = $direccion->Ciudad()->first()->nombre;
                    $ciudad_id_region = $direccion->Ciudad()->first()->id_region;
                    $region = Region::where('id', $ciudad_id_region)->first()->nombre;
                    $registro->direccion = array(
                        'direccion' => $direccion->direccion,
                        'numero_dir' => $direccion->numero_dir,
                        'ciudad' => $ciudad_nombre,
                        'region' => $region
                    );
                }

                $registros->persona = $registro;

                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registro'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
            }
        }
        else
        {
            $datos['estado']=0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = array('id'=>'Campo requerido');
        }

        return $datos;
    }

    public function modificar_rol_asistente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_user))
        {
            $error['id_user'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo))
        {
            $error['id_tipo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo_movimiento))
        {
            $error['id_tipo_movimiento'] = 'campo requerido';
            $valido = 0;
        }
        if($request->movimiento == '')
        {
            $error['movimiento'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $user = User::find($request->id_user);
            $rol = '';
            if($user)
            {
                // roles
                // 4 - Asistente
                // 10 - AsistenteAdm
                // 11 - AsistenteJefaCaja
                // 12 - AsistenteCaja
                // 13 - AsistenteOnline

                // 2 - Paciente
                // 3 - Profesional
                // 5 - Institucion
                // 6 - Servicio

                // 7 - Adm_Institucion
                // 8 - Adm_Servicio

                // 9 - Contador

                switch (mb_strtoupper($request->id_tipo_movimiento))
                {
                    case 'ASISTENTE':
                        // asistente tipo
                        // 1 - Asistente Publico
                        // 2 - Asistente Jefa Caja
                        // 3 - Asistente Administrativo
                        // 4 - Asistente Online
                        // 5 - Asistente Consulta
                        $rol = $request->id_tipo;
                        break;
                    case 'ADMINISTRADOR':
                        // TIPO ADMINISTRADO
                        // 1 - Administrador de CM
                        // 2 - Administrador de Servicios
                        $rol = $request->id_tipo;
                        break;
                    case 'CONTADOR':
                        $rol = $request->id_tipo;
                        break;
                    // default:
                    //     # code...
                    //     break;
                }

                /** AGREGAR ROL */
                if($request->movimiento == 1)
                {
                    try {
                        $user->assignRole($rol);
                        $datos['estado'] = 1;
                        $datos['msj'] = 'perfil modificado';
                        $datos['rol'] = $rol;
                        $datos['user'] = $user;
                    } catch (\Throwable $th) {
                        $datos['estado'] = 0;
                        $datos['error'] =$th;
                        $datos['msj'] = 'problema modificando Perfil';
                    }
                }
                /** QUITAR ROL */
                else
                {
                    try {
                        $user->removeRole($rol);
                        $datos['estado'] = 1;
                        $datos['msj'] = 'perfil modificado';
                        $datos['rol'] = $rol;
                        $datos['user'] = $user;
                    } catch (\Throwable $th) {
                        $datos['estado'] = 0;
                        $datos['error'] =$th;
                        $datos['msj'] = 'problema modificando Perfil';
                    }
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'usuario no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function modificar_rol_asistente_bak(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_user))
        {
            $error['id_user'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo))
        {
            $error['id_tipo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo_movimiento))
        {
            $error['id_tipo_movimiento'] = 'campo requerido';
            $valido = 0;
        }
        if($request->movimiento == '')
        {
            $error['movimiento'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {

            $user = User::find($request->id_user);
            $rol = '';
            if($user)
            {
                // roles
                // 4 - Asistente
                // 10 - AsistenteAdm
                // 11 - AsistenteJefaCaja
                // 12 - AsistenteCaja
                // 13 - AsistenteOnline

                // 2 - Paciente
                // 3 - Profesional
                // 5 - Institucion
                // 6 - Servicio

                // 7 - Adm_Institucion
                // 8 - Adm_Servicio

                // 9 - Contador

                switch (mb_strtoupper($request->id_tipo_movimiento))
                {
                    case 'ASISTENTE':
                        // asistente tipo
                        // 1 - Asistente Publico
                        // 2 - Asistente Jefa Caja
                        // 3 - Asistente Administrativo
                        // 4 - Asistente Online
                        // 5 - Asistente Consulta
                        switch ($request->id_tipo) {

                            case '1':
                                $rol = 'AsistenteCaja';
                                break;
                            case '2':
                                $rol = 'AsistenteJefaCaja';
                                break;
                            case '3':
                                $rol = 'AsistenteAdm';
                                break;
                            case '4':
                                $rol = 'AsistenteOnline';
                                break;
                            case '5':
                                $rol = 'Asistente';
                                break;

                            // default:
                            //     $rol = '';
                            //     break;
                        }
                        break;
                    case 'ADMINISTRADOR':
                        switch ($request->id_tipo) {
                            // TIPO ADMINISTRADO
                            // 1 - Administrador de CM
                            // 2 - Administrador de Servicios
                            case '1':
                                $rol = 'Adm_Institucion';
                                break;
                            case '2':
                                $rol = 'Adm_Servicio';
                                break;
                            // default:
                            //     $rol = '';
                            //     break;
                        }
                        break;
                    case 'CONTADOR':
                         $rol = 'Contador';
                        break;
                    // default:
                    //     # code...
                    //     break;
                }

                /** AGREGAR ROL */
                if($request->movimiento == 1)
                {
                    try {
                        $user->assignRole($rol);
                        $datos['estado'] = 1;
                        $datos['msj'] = 'perfil modificado';
                        $datos['rol'] = $rol;
                        $datos['user'] = $user;
                    } catch (\Throwable $th) {
                        $datos['estado'] = 0;
                        $datos['error'] =$th;
                        $datos['msj'] = 'problema modificando Perfil';
                    }
                }
                /** QUITAR ROL */
                else
                {
                    try {
                        $user->removeRole($rol);
                        $datos['estado'] = 1;
                        $datos['msj'] = 'perfil modificado';
                        $datos['rol'] = $rol;
                        $datos['user'] = $user;
                    } catch (\Throwable $th) {
                        $datos['estado'] = 0;
                        $datos['error'] =$th;
                        $datos['msj'] = 'problema modificando Perfil';
                    }
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'usuario no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

	public function areaComercial(Request $request)
    {
        return view('app.adm_cm.escritorio_adm_comercial');
    }

    public function sueldos(Request $request)
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        $ano_toma = '';
        $mes_toma = '';
        if( empty($request->filtro_anio) && empty($request->filtro_mes))
        {
            $ano_toma = date('Y');
            $mes_toma = date('m');
        }
        else
        {
            $ano_toma = $request->filtro_anio;
            $mes_toma = $request->filtro_mes;
        }

        $filtro_contrato = array();
        $filtro_contrato[] = array('id_institucion', $institucion->id);
        $filtro_contrato[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);

        // echo json_encode($filtro_contrato);

        $registro_personal = ContratoDependiente::with('Persona')
                                                    ->with('Institucion')
                                                    ->with('LugarAtencion')
                                                    ->where($filtro_contrato)
                                                    ->whereIn('estado', [2,3])
                                                    ->filtroFechaContratoActivo($ano_toma, $mes_toma)
                                                    ->get();

        foreach ($registro_personal as $key => $value)
        {
            $filtro_remu = array();
            $filtro_remu[] = array('r_ano_liq', $ano_toma);
            $filtro_remu[] = array('r_mes_liq', $mes_toma);
            $filtro_remu[] = array('id_contrato_dependiente', $value->id);
            $filtro_remu[] = array('id_empleado', $value->id_empleado);
            $remuneracion_result = Remuneraciones::where($filtro_remu)->whereIn('estado', [1,2])->first();
            if($remuneracion_result)
            {
                $registro_personal[$key]->remuneracion = $remuneracion_result;
            }
            else
            {
                $registro_personal[$key]->remuneracion = array();
            }
        }

        return view('app.adm_cm.sueldos')->with([
            'registro_personal' => $registro_personal,
            'institucion' => $institucion,
            'ano_toma' => $ano_toma,
            'mes_toma' => $mes_toma,
        ]);
    }

    public function areaContabilidad(Request $request)
    {
        return view('app.contabilidad.escritorio_contabilidad');
    }
	public function ContadorRrHh(Request $request)
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        $regiones = Region::all();
        $bancos = Bancos::all();
        $especialidades = Especialidad::all();
        $profesionales_contratados = ContratoProfesionalInstitucion::select('contrato_profesional_institucion.*','especialidades.nombre as especialidad')
            ->join('especialidades','especialidades.id','contrato_profesional_institucion.id_especialidad')
            ->where('contrato_profesional_institucion.id_institucion',$institucion->id)
            ->get();
        return view('app.contabilidad.secciones_contabilidad.rrhh',
            [
                'regiones' => $regiones,
                'bancos' => $bancos,
                'especialidades' => $especialidades,
                'profesionales_contratados' => $profesionales_contratados,
            ]
        );
    }
    public function ContadorSueldos(Request $request)
    {
        return view('app.contabilidad.secciones_contabilidad.remuneraciones');
    }
    public function ContadorLiquidaciones(Request $request)
    {
        return view('app.contabilidad.secciones_contabilidad.liquidaciones');
    }
    public function ContadorRemuneraciones(Request $request)
    {
        $ano_toma = date('Y');
        $mes_toma = date('m');
        $registro_personal = ContratoDependiente::with('Persona')
                                                    ->with('Institucion')
                                                    ->with('LugarAtencion')
                                                    ->whereIn('estado', [2,3])
                                                    ->filtroFechaContratoActivo($ano_toma, $mes_toma)
                                                    ->get();

        foreach ($registro_personal as $key => $value)
        {
            $filtro_remu = array();
            $filtro_remu[] = array('r_ano_liq', $ano_toma);
            $filtro_remu[] = array('r_mes_liq', $mes_toma);
            $filtro_remu[] = array('id_contrato_dependiente', $value->id);
            $filtro_remu[] = array('id_empleado', $value->id_empleado);
            $remuneracion_result = Remuneraciones::where($filtro_remu)->whereIn('estado', [1,2])->first();
            if($remuneracion_result)
            {
                $registro_personal[$key]->remuneracion = $remuneracion_result;
            }
            else
            {
                $registro_personal[$key]->remuneracion = array();
            }
        }
        return view('app.contabilidad.secciones_contabilidad.info-pago_sueldos',[
            'mes_toma' => $mes_toma,
            'registro_personal' => $registro_personal
        ]);
    }
    public function ContadorLibroContable(Request $request)
    {
        return view('app.contabilidad.secciones_contabilidad.contable');
    }
    public function ContadorIngresos(Request $request)
    {
        return view('app.contabilidad.secciones_contabilidad.ingresos');
    }
    public function ContadorEgresos(Request $request)
    {
        return view('app.contabilidad.secciones_contabilidad.egresos');
    }
    public function ContadorFacturas(Request $request)
    {
        return view('app.contabilidad.secciones_contabilidad.factura');
    }
    public function areaBodega(Request $request)
    {
        return view('');
    }

    public function areaEstadistica()
    {

        return view('app.contabilidad.secciones_contabilidad.estadisticas_inicio');
    }

    public function areaLiquidaciones(){
        return view('app.contabilidad.secciones_contabilidad.liquidaciones');
    }

    /** ADMINISTRADOR COMERCIAL */
    public function configuracion_comercial(){
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        $director_comercial = Profesional::find($institucion->id_director_comercial);
        $tipo_cuentas_bancarias = TipoCuentaBancaria::all();
        $cuenta_bancaria = CuentaBancariaInst::select('cuenta_bancaria_inst.*','tipo_cuenta_bancaria.descripcion','bancos.nombre as nombre_banco','bancos.id as id_banco')
                                                ->join('tipo_cuenta_bancaria','cuenta_bancaria_inst.id_tipo_cuenta','=','tipo_cuenta_bancaria.id')
                                                ->join('bancos','cuenta_bancaria_inst.id_banco','=','bancos.id')
                                                ->where('id_institucion', $institucion->id)
                                                ->get();

        $bancos = Bancos::all();

        return view('app.adm_cm.configuracion_esc_comercial',[
            'institucion' => $institucion,
            'director_comercial' => $director_comercial,
            'tipo_cuentas_bancarias' => $tipo_cuentas_bancarias,
            'cuentas_bancarias' => $cuenta_bancaria ? $cuenta_bancaria : null,
            'bancos' => $bancos
        ]);
    }

    public function escritorioAdminComercial()
    {
        return view('app.adm_cm.escritorio_adm_comercial_adm');
    }

    public function registrar_especialidad_cm(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }


            $especialidadesCm = new EspecialidadesCm();
            $especialidadesCm->id_tipo_especialidad = $req->especialidad;
            $especialidadesCm->id_sub_tipo_especialidad = $req->sub_tipo_especialidad;
            $especialidadesCm->id_lugar_atencion = $institucion->id_lugar_atencion;
            $especialidadesCm->id_institucion = $institucion->id;
            $especialidadesCm->num_profesionales = $req->num_profesionales;
            $especialidadesCm->id_admin = Auth::user()->id;
            $especialidadesCm->estado = 1;
            $especialidadesCm->principal = $req->principal;
            $especialidadesCm->save();

            $especialidades = $this->dame_especialidades_cm($req->id_institucion);
            $otras_especialidades = $this->dame_otras_especialidades_cm($req->id_institucion);

            return ['estado' => 1, 'msj' => 'Especialidad registrada', 'especialidades' => $especialidades, 'otras_especialidades' => $otras_especialidades];
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }

    }

    public function eliminar_especialidad_cm(Request $req){
        try {
            $especialidadesCm = EspecialidadesCm::where('id', $req->id)->first();
            $especialidadesCm->delete();

            $especialidades = $this->dame_especialidades_cm($req->id_institucion);
            $otras_especialidades = $this->dame_otras_especialidades_cm($req->id_institucion);

            return ['estado' => 1, 'msj' => 'Especialidad eliminada', 'especialidades' => $especialidades,'otras_especialidades' => $otras_especialidades];
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    public function eliminar_otra_especialidad(Request $req){
        try {
            $especialidadesCm = EspecialidadesCm::where('id', $req->id)->first();
            $especialidadesCm->delete();

            $otras_especialidades = $this->dame_otras_especialidades_cm($req->id_institucion);
            $especialidades = $this->dame_especialidades_cm($req->id_institucion);

            return ['estado' => 1, 'msj' => 'Especialidad eliminada', 'especialidades' => $especialidades,'otras_especialidades' => $otras_especialidades];
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    public function dame_especialidades_cm($id_institucion){
        $especialidades = EspecialidadesCm::select('especialidades_cm.id', 'especialidades_cm.id_tipo_especialidad', 'especialidades_cm.id_lugar_atencion', 'especialidades_cm.id_institucion', 'especialidades_cm.id_admin', 'especialidades_cm.estado','especialidades_cm.num_profesionales','tipos_especialidad.nombre','sub_tipo_especialidad.nombre as sub_tipo')
                                        ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'especialidades_cm.id_tipo_especialidad')
                                        ->join('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'especialidades_cm.id_sub_tipo_especialidad')
                                        ->where('especialidades_cm.id_institucion', $id_institucion)
                                        ->where('especialidades_cm.principal',1)
                                        ->get();
        return $especialidades;
    }

    public function dame_otras_especialidades_cm($id_institucion){
        $especialidades = EspecialidadesCm::select('especialidades_cm.id', 'especialidades_cm.id_tipo_especialidad', 'especialidades_cm.id_lugar_atencion', 'especialidades_cm.id_institucion', 'especialidades_cm.id_admin', 'especialidades_cm.estado','tipos_especialidad.nombre','sub_tipo_especialidad.nombre as sub_tipo')
                                        ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'especialidades_cm.id_tipo_especialidad')
                                        ->join('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'especialidades_cm.id_sub_tipo_especialidad')
                                        ->where('especialidades_cm.id_institucion', $id_institucion)
                                        ->where('especialidades_cm.principal',0)
                                        ->get();
        return $especialidades;
    }

    public function dame_especialidad($id){
        $especialidad = EspecialidadesCm::select('especialidades_cm.id', 'especialidades_cm.id_tipo_especialidad', 'especialidades_cm.id_lugar_atencion', 'especialidades_cm.id_institucion', 'especialidades_cm.id_admin', 'especialidades_cm.estado','especialidades_cm.num_profesionales','tipos_especialidad.nombre','sub_tipo_especialidad.nombre as sub_tipo','sub_tipo_especialidad.id as id_sub_tipo')
                                        ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'especialidades_cm.id_tipo_especialidad')
                                        ->join('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'especialidades_cm.id_sub_tipo_especialidad')
                                        ->where('especialidades_cm.id', $id)
                                        ->first();
        return $especialidad;
    }

    public function cambiar_estado_especialidad(Request $req){

        $estado = $req->estado;
        $especialidad = EspecialidadesCm::where('id', $req->id)->first();

        if($estado == 1){
            $especialidad->estado = 1;
        }else{
            $especialidad->estado = 0;
        }
        $especialidad->save();
        $especialidades = $this->dame_especialidades_cm($req->id_institucion);
        $otras_especialidades = $this->dame_otras_especialidades_cm($req->id_institucion);

        return ['estado' => 1, 'msj' => 'Especialidad actualizada', 'especialidades' => $especialidades, 'otras_especialidades' => $otras_especialidades];
    }

    public function editar_direccion_medica(Request $req){

            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $institucion->direccion()->first()->ciudad()->first()->Region()->first()->id)->orderBy('nombre')->get();

        /** CARGA DE PERSONAL */
        /** EMPLEADOS */
        $contratos = ContratoDependiente::select('id', 'id_institucion', 'id_lugar_atencion', 'tipo_empleado', 'id_empleado')
                                        ->where('id_institucion',$institucion->id)
                                        ->where('id_lugar_atencion', $institucion->id_lugar_atencion)
                                        ->get();
        // var_dump($contratos);

        $personal = array();
        if($contratos)
        {
            // var_dump($contratos->count());
            if($contratos->count()>0)
            {
                foreach ($contratos as $key_contratos => $value_contratos)
                {
                    // Asistente Publico
                    // Asistente Jefa Caja
                    // Asistente Adm
                    // Asistente Online
                    if(strstr(strtoupper($value_contratos->tipo_empleado), 'ASISTENTE') !== FALSE)
                    {
                        $asistente = Asistente::select('id', 'id_asistente_tipo', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_direccion', 'id_usuario', 'id_modalidad')
                                                ->with(['AsistenteTipo' => function($query){
                                                    $query->select('id', 'nombre', 'descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        if($asistente)
                            array_push($personal, $asistente);
                    }
                    // adm_insitucion
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'ADMINISTRADOR') >= 0)
                    {
                        $administrador = AdminInstServ::select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'email', 'id_tipo_administrador', 'id_direccion', 'id_admin')
                                                ->with(['TipoAdministrador' => function($query){
                                                    $query->select('id', 'nombres as nombre','descripcion');
                                                }])
                                                ->where('id', $value_contratos->id_empleado)
                                                ->first();
                        // var_dump($administrador);
                        if($administrador)
                            array_push($personal, $administrador);
                    }
                    // contador
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'CONTADOR') >= 0)
                    {

                    }
                    // profesional (dependiente-> ej: admin medico)
                    else if(strpos(strtoupper($value_contratos->tipo_empleado), 'PROFESIONAL') >= 0)
                    {

                    }

                }
            }
        }
        try {

            $responsable_ = ProfesionalesLugaresAtencion::where('id', $req->responsable)->first();
            if($responsable_) $profesional = Profesional::find($responsable_->id_profesional);

            $user = User::find($profesional->id_usuario);
            // Tabla donde estan todos los tipos de administraciones medicas
            $cargo = TipoAdministrador::where('id', $req->cargo)->first();

            $institucion = Instituciones::where('id', $req->id_institucion)->first();

            if($cargo->id == 1){
                $institucion->id_director_medico = intval($user->id);
                $user->assignRole(3); // Profesional
                $user->assignRole(23); // Director Médico
            }

            if($cargo->id == 2){
                $institucion->id_subdirector_medico = intval($user->id);
                $user->assignRole(3); // Profesional
            }


            if($cargo->id == 3){
                $institucion->id_director_gestion_cuidado = intval($user->id);
                $user->assignRole(3); // Profesional
            }



            if($cargo->id == 4){
                $institucion->id_director_comercial = intval($user->id);
                $user->assignRole(3); // Profesional
            }


            $institucion->update();

            if($institucion->id_director_medico){
                $director_cm = Profesional::where('id_usuario', $institucion->id_director_medico)->first();
            }else{
                $director_cm = null;
            }

            if($institucion->id_subdirector_medico){
                $subdirector_cm = Profesional::where('id_usuario', $institucion->id_subdirector_medico)->first();
            }else{
                $subdirector_cm = null;
            }

            if($institucion->id_director_gestion_cuidado){
                $director_gestion_cuidado = Profesional::where('id_usuario', $institucion->id_director_gestion_cuidado)->first();
            }else{
                $director_gestion_cuidado = null;
            }

            if($institucion->id_director_comercial){
                $director_comercial = Profesional::where('id_usuario', $institucion->id_director_comercial)->first();
            }else{
                $director_comercial = null;
            }

            $v = view('fragm.administradores_cm',[
                'director_cm' => $director_cm ? $director_cm : null,
                'subdirector_cm' => $subdirector_cm ? $subdirector_cm : null,
                'director_gestion_cuidado' => $director_gestion_cuidado ? $director_gestion_cuidado : null,
                'responsable' => $responsable ? $responsable : null,
                'institucion' => $institucion,
                'regiones' => $regiones,
                'ciudades' => $ciudades,

            ])->render();
            return ['estado' => 1, 'msj' => 'Cargo registrado', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function eliminar_area_profesional(Request $req){
        try {
            $area_cm = AreasCm::where('id', $req->id)->first();
            $lugar_atencion = $area_cm->id_lugar_atencion;
            $area_cm->delete();
            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
            $areas = $this->dame_areas_cm($lugar_atencion);
            $v = view('fragm.areas_cm',[
                'areas_cm' => $areas,
                'institucion' => $institucion
            ])->render();
            return ['estado' => 1, 'msj' => 'Area eliminada', 'areas' => $areas, 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function editar_especialidad_cm(Request $req){
        try {
            //code...
            $especialidadesCm = EspecialidadesCm::where('id', $req->id_especialidad_cm)->first();
            $especialidadesCm->num_profesionales = intval($req->numero_profesionales);
            $especialidadesCm->save();
            $especialidades = $this->dame_especialidades_cm($req->id_institucion);
            return ['estado' => 1, 'msj' => 'Especialidad actualizada', 'especialidades' => $especialidades];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function editar_cuenta_bancaria_institucion(Request $req){

        $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        try {

            $nueva_cuenta = CuentaBancariaInst::find($req->id);

            $nueva_cuenta->rut_titular = $req->rut_titular;
            $nueva_cuenta->nombre_titular = $req->nombre_titular;

            $nueva_cuenta->numero_cuenta = $req->numero_cuenta;
            $nueva_cuenta->rut_representante = $req->rut_representante;
            $nueva_cuenta->nombre_representante = $req->nombre_representante;
            $nueva_cuenta->id_institucion = $institucion->id;

            $nueva_cuenta->id_banco = $req->banco_titular;
            $nueva_cuenta->id_tipo_cuenta = intval($req->tipo_cuenta);

            $nueva_cuenta->id_responsable = Auth::user()->id;
            $nueva_cuenta->email = $req->email_titular;
            $nueva_cuenta->telefono = "123456789";
            $nueva_cuenta->estado = 1;
            $nueva_cuenta->observaciones = "Cuenta Bancaria Institucion";
            $nueva_cuenta->update();

            $cuentas_bancarias = CuentaBancariaInst::select('cuenta_bancaria_inst.*','tipo_cuenta_bancaria.descripcion','bancos.nombre as nombre_banco','bancos.id as id_banco')
            ->join('tipo_cuenta_bancaria','cuenta_bancaria_inst.id_tipo_cuenta','=','tipo_cuenta_bancaria.id')
            ->join('bancos','cuenta_bancaria_inst.id_banco','=','bancos.id')
            ->where('id_institucion', $institucion->id)
            ->get();

            $tipo_cuentas_bancarias = TipoCuentaBancaria::all();

            $bancos = Bancos::all();

            $v = view('fragm.cuentas_bancarias_inst',[
            'cuentas_bancarias' => $cuentas_bancarias,
            'tipo_cuentas_bancarias' => $tipo_cuentas_bancarias,
            'bancos' => $bancos
            ])->render();

            return ['estado' => 1, 'msj' => 'Cuenta editada', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function agregar_cuenta_bancaria_institucion(Request $req){
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        try {

            // verificar si el rut ya existe en la base de datos de cuentas bancarias
            $cuenta_bancaria = CuentaBancariaInst::where('rut_titular', $req->rut_titular)->first();
            if($cuenta_bancaria)
                return ['estado' => 0, 'msj' => 'El rut ya se encuentra registrado'];

            $nueva_cuenta = new CuentaBancariaInst();

            $nueva_cuenta->rut_titular = $req->rut_titular;
            $nueva_cuenta->nombre_titular = $req->nombre_titular;

            $nueva_cuenta->numero_cuenta = intval($req->numero_cuenta);
            $nueva_cuenta->id_institucion = $institucion->id;

            $nueva_cuenta->id_banco = $req->banco_titular;
            $nueva_cuenta->id_tipo_cuenta = intval($req->tipo_cuenta);
            $nueva_cuenta->rut_representante = $req->rut_representante;
            $nueva_cuenta->nombre_representante = $req->nombre_representante;
            $nueva_cuenta->id_responsable = Auth::user()->id;
            $nueva_cuenta->email = $req->email_titular;
            $nueva_cuenta->telefono = "123456789";
            $nueva_cuenta->estado = 1;
            $nueva_cuenta->observaciones = "Cuenta Bancaria Institucion";
            $nueva_cuenta->save();

            $cuentas_bancarias = CuentaBancariaInst::select('cuenta_bancaria_inst.*','tipo_cuenta_bancaria.descripcion','bancos.nombre as nombre_banco','bancos.id as id_banco')
                                                    ->join('tipo_cuenta_bancaria','cuenta_bancaria_inst.id_tipo_cuenta','=','tipo_cuenta_bancaria.id')
                                                    ->join('bancos','cuenta_bancaria_inst.id_banco','=','bancos.id')
                                                    ->where('id_institucion', $institucion->id)
                                                    ->get();

            $tipo_cuentas_bancarias = TipoCuentaBancaria::all();

            $bancos = Bancos::all();

            $v = view('fragm.cuentas_bancarias_inst',[
                'cuentas_bancarias' => $cuentas_bancarias,
                'tipo_cuentas_bancarias' => $tipo_cuentas_bancarias,
                'bancos' => $bancos
            ])->render();

            return ['estado' => 1, 'msj' => 'Cuenta creada', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function eliminar_cuenta_bancaria_institucion(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }
            $cuenta_bancaria = CuentaBancariaInst::where('id', $req->id)->first();
            $cuenta_bancaria->delete();

            $cuentas_bancarias = CuentaBancariaInst::select('cuenta_bancaria_inst.*','tipo_cuenta_bancaria.descripcion','bancos.nombre as nombre_banco','bancos.id as id_banco')
                                                    ->join('tipo_cuenta_bancaria','cuenta_bancaria_inst.id_tipo_cuenta','=','tipo_cuenta_bancaria.id')
                                                    ->join('bancos','cuenta_bancaria_inst.id_banco','=','bancos.id')
                                                    ->where('id_institucion', $institucion->id)
                                                    ->get();

            $tipo_cuentas_bancarias = TipoCuentaBancaria::all();

            $bancos = Bancos::all();

            $v = view('fragm.cuentas_bancarias_inst',[
                'cuentas_bancarias' => $cuentas_bancarias,
                'tipo_cuentas_bancarias' => $tipo_cuentas_bancarias,
                'bancos' => $bancos
            ])->render();

            return ['estado' => 1, 'msj' => 'Cuenta eliminada', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function registrar_profesional(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }

            // verificar que el rut no este contratado en la institucion
            $contrato = ContratoProfesionalInstitucion::where('rut', $req->rut)->where('id_institucion', $institucion->id)->where('email',$req->email)->first();
            if($contrato)
                return ['estado' => 0, 'msj' => 'El rut o email ya se encuentra registrado'];

            $nuevo_contrato = new ContratoProfesionalInstitucion();
            $nuevo_contrato->rut = $req->rut;
            $nuevo_contrato->fecha_ingreso = $req->f_ingreso;
            $nuevo_contrato->nombre = $req->nombre;
            $nuevo_contrato->primer_apellido = $req->apellido1;
            $nuevo_contrato->segundo_apellido = $req->apellido2;
            $nuevo_contrato->email = $req->email;
            $nuevo_contrato->telefono = $req->telefono1;
            $nuevo_contrato->telefono_dos = $req->telefono2;
            $nuevo_contrato->direccion = $req->direccion;
            $nuevo_contrato->id_cargo = 1;
            $nuevo_contrato->id_region = $req->region;
            $nuevo_contrato->id_comuna = $req->comuna;
            $nuevo_contrato->id_profesion = $req->profesion;
            $nuevo_contrato->id_especialidad = $req->especialidad;
            $nuevo_contrato->id_sub_tipo_especialidad = $req->sub_especialidad;
            $nuevo_contrato->dias_laborales = $req->dias_laborales;
            $nuevo_contrato->horario_atencion = $req->horario;
            $nuevo_contrato->pacientes_hora = $req->p_hora;
            $nuevo_contrato->id_banco = $req->banco;
            $nuevo_contrato->numero_cuenta = $req->n_cta;
            $nuevo_contrato->sucursal = $req->sucursal;
            $nuevo_contrato->id_institucion = $institucion->id;
            $nuevo_contrato->id_tipo_contrato = 1; // contrato indefinido (por defecto)

            $nuevo_contrato->save();

            $profesionales_contratados = ContratoProfesionalInstitucion::select('contrato_profesional_institucion.*','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
            ->join('especialidades','especialidades.id','contrato_profesional_institucion.id_profesion')
            ->join('tipos_especialidad','tipos_especialidad.id','contrato_profesional_institucion.id_especialidad')
            ->where('contrato_profesional_institucion.id_institucion',$institucion->id)
            ->get();

            $v = view('fragm.profesionales_contratados',[
                'profesionales_contratados' => $profesionales_contratados,
            ])->render();

            return ['estado' => 1, 'msj' => 'Profesional registrado', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function registrar_asistente(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }

            // verificar que el rut no este contratado en la institucion
            $contrato = ContratoAsistenteInstitucion::where('rut', $req->rut)->where('id_institucion', $institucion->id)->where('email',$req->email)->first();
            if($contrato)
                return ['estado' => 0, 'msj' => 'El rut o email ya se encuentra registrado'];

            $nuevo_contrato = new ContratoAsistenteInstitucion();
            $nuevo_contrato->rut = $req->rut;
            $nuevo_contrato->fecha_ingreso = $req->fecha_ingreso;
            $nuevo_contrato->nombre = $req->nombre;
            $nuevo_contrato->apellido_paterno = $req->apellido_paterno;
            $nuevo_contrato->apellido_materno = $req->apellido_materno;
            $nuevo_contrato->email = $req->email;
            $nuevo_contrato->telefono = $req->telefono;
            $nuevo_contrato->direccion = $req->direccion;
            $nuevo_contrato->numero = $req->numero;
            $nuevo_contrato->id_cargo = $req->profesion;
            $nuevo_contrato->id_region = $req->region;
            $nuevo_contrato->id_comuna = $req->ciudad;
            $nuevo_contrato->id_funcion = $req->funcion;
            $nuevo_contrato->horas_contratadas = $req->horas_contrato;
            $nuevo_contrato->sueldo_bruto = intval($req->remuneracion);
            $nuevo_contrato->id_banco = $req->banco;
            $nuevo_contrato->numero_cuenta = $req->n_cta;
            $nuevo_contrato->sucursal = $req->sucursal;
            $nuevo_contrato->id_institucion = $institucion->id;
            $nuevo_contrato->id_tipo_contrato = 1; // contrato indefinido (por defecto)

            if($nuevo_contrato->save()){
                $asistentes_contratados = ContratoAsistenteInstitucion::where('id_institucion',$institucion->id)->get();
                $v = view('fragm.asistentes_contratados',[
                    'asistentes_contratados' => $asistentes_contratados,
                ])->render();
                return ['estado' => 1, 'msj' => 'Asistente registrado', 'v' => $v];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function dame_convenio(Request $req){
        try {
            //code...
            $convenio = ConvenioInstitucion::select('convenio_institucion.*','tipo_convenio_institucion.nombre as tipo_convenio')
                                        ->join('tipo_convenio_institucion','convenio_institucion.id_tipo_convenio_institucion','=','tipo_convenio_institucion.id')
                                        ->where('convenio_institucion.id', $req->id)
                                        ->first();

            $convenio->productos = json_decode($convenio->productos_convenio_institucion);
            return ['estado' => 1, 'convenio' => $convenio];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dame_convenio_profesional(Request $request){

        $profesional_convenios = ProfesionalConvenio::where('id_profesional', $request->id_profesional)->where('id_lugar_atencion', $request->id_lugar_atencion)->first();
        if($profesional_convenios)
        {
            return ['estado' => 1, 'profesional_convenios' => $profesional_convenios];
        }
        else
        {
            return ['estado' => 0, 'msj' => 'No se encontraron convenios'];
        }
    }

    public function registrar_convenio(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }
            $nuevo_convenio = new ConvenioInstitucion();
            $nuevo_convenio->nombre_representante_convenio_institucion = $req->nombre_representante_convenio;
            $nuevo_convenio->id_tipo_convenio = intval($req->tipo_convenio);
            $nuevo_convenio->id_tipo_convenio_institucion = intval($req->tipo_convenio_institucion);
            $nuevo_convenio->nombre_convenio_institucion = $req->nombre_convenio;
            $nuevo_convenio->fecha_inicio_convenio_institucion = $req->fecha_inicial_pago_convenio;
            $nuevo_convenio->fecha_fin_convenio_institucion = $req->fecha_final_pago_convenio;
            $nuevo_convenio->rut_representante_convenio_institucion = $req->rut_representante_convenio;
            $nuevo_convenio->nombre_representante_convenio_institucion = $req->nombre_representante_convenio;
            $nuevo_convenio->telefono_representante_convenio_institucion = $req->telefono_representante_convenio;
            $nuevo_convenio->email_representante_convenio_institucion = $req->email_representante_convenio;
            $nuevo_convenio->direccion_representante_convenio_institucion = $req->direccion_representante_convenio;
            $nuevo_convenio->observaciones_convenio_institucion = $req->observaciones_nuevo_convenio;
            $nuevo_convenio->productos_convenio_institucion = json_encode($req->productos_convenio);
            $nuevo_convenio->porcentaje_convenio_institucion = intval($req->porcentaje_dcto);
            $nuevo_convenio->id_institucion = $institucion->id;
            $nuevo_convenio->estado = 1;

            if($nuevo_convenio->save()){
                $convenios = ConvenioInstitucion::select('convenio_institucion.*','tipo_convenio_institucion.nombre as tipo_convenio')
                                                            ->join('tipo_convenio_institucion','convenio_institucion.id_tipo_convenio_institucion','=','tipo_convenio_institucion.id')
                                                            ->where('convenio_institucion.id_institucion',$institucion->id)
                                                            ->get();


                foreach($convenios as $convenio)
                {
                    $tipos_productos = [];
                    // pasar el json a array
                    $convenio->productos = json_decode($convenio->productos_convenio_institucion);
                    foreach($convenio->productos as $producto)
                    {
                        $tipo_producto = TipoProductoConvenios::find($producto);
                        array_push($tipos_productos,$tipo_producto->descripcion);
                    }

                    $convenio->tipos_productos = $tipos_productos;
                }

                $tipo_convenios = TipoConvenioInstitucion::all();

                $v = view('fragm.convenios_institucion',[
                    'convenios_institucion' => $convenios,
                    'tipo_convenios' => $tipo_convenios
                ])->render();
                return ['estado' => 1, 'msj' => 'Convenio registrado', 'v' => $v];
            }
            return $nuevo_convenio;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function eliminar_convenio(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }
            $convenio = ConvenioInstitucion::find($req->id);
            $convenio->delete();
            $convenios = ConvenioInstitucion::select('convenio_institucion.*','tipo_convenio_institucion.nombre as tipo_convenio')
                                                            ->join('tipo_convenio_institucion','convenio_institucion.id_tipo_convenio_institucion','=','tipo_convenio_institucion.id')
                                                            ->where('convenio_institucion.id_institucion',$institucion->id)
                                                            ->get();
            $tipos_productos = [];

            foreach($convenios as $convenio)
            {
                // pasar el json a array
                $convenio->productos = json_decode($convenio->productos_convenio_institucion);
                foreach($convenio->productos as $producto)
                {
                    $tipo_producto = TipoProductoConvenios::find($producto);
                    array_push($tipos_productos,$tipo_producto->descripcion);
                }

                $convenio->tipos_productos = $tipos_productos;
            }
            $tipo_convenios = TipoConvenioInstitucion::all();
            $v = view('fragm.convenios_institucion',[
                'convenios_institucion' => $convenios,
                'tipo_convenios' => $tipo_convenios
            ])->render();
            return ['estado' => 1, 'msj' => 'Convenio eliminado', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function editar_convenio(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }

            $convenio = ConvenioInstitucion::find($req->id_convenio_institucion);

            $convenio->nombre_representante_convenio_institucion = $req->nombre_representante_convenio_edicion;
            $convenio->id_tipo_convenio = intval($req->tipo_convenio_edicion);
            $convenio->id_tipo_convenio_institucion = intval($req->tipo_convenio_institucion_edicion);
            $convenio->nombre_convenio_institucion = $req->nombre_convenio_edicion;
            $convenio->fecha_inicio_convenio_institucion = $req->fecha_inicial_pago_convenio_edicion;
            $convenio->fecha_fin_convenio_institucion = $req->fecha_final_pago_convenio_edicion;
            $convenio->rut_representante_convenio_institucion = $req->rut_representante_convenio_edicion;
            $convenio->nombre_representante_convenio_institucion = $req->nombre_representante_convenio_edicion;
            $convenio->telefono_representante_convenio_institucion = $req->telefono_representante_convenio_edicion;
            $convenio->email_representante_convenio_institucion = $req->email_representante_convenio_edicion;
            $convenio->direccion_representante_convenio_institucion = $req->direccion_representante_convenio_edicion;
            $convenio->observaciones_convenio_institucion = $req->observaciones_nuevo_convenio_edicion;
            $convenio->productos_convenio_institucion = json_encode($req->productos_convenio_edicion);
            $convenio->porcentaje_convenio_institucion = intval($req->porcentaje_dcto_edicion);
            $convenio->id_institucion = $institucion->id;
            $convenio->estado = 1;
            $convenio->observaciones_convenio_institucion = $req->observaciones_edicion_convenio;

            if($convenio->save()){
                $convenios = ConvenioInstitucion::select('convenio_institucion.*','tipo_convenio_institucion.nombre as tipo_convenio')
                                                            ->join('tipo_convenio_institucion','convenio_institucion.id_tipo_convenio_institucion','=','tipo_convenio_institucion.id')
                                                            ->where('convenio_institucion.id_institucion',$institucion->id)
                                                            ->get();


                foreach($convenios as $convenio)
                {
                    $tipos_productos = [];
                    // pasar el json a array
                    $convenio->productos = json_decode($convenio->productos_convenio_institucion);
                    foreach($convenio->productos as $producto)
                    {
                        $tipo_producto = TipoProductoConvenios::find($producto);
                        array_push($tipos_productos,$tipo_producto->descripcion);
                    }

                    $convenio->tipos_productos = $tipos_productos;
                }
                $tipo_convenios = TipoConvenioInstitucion::all();
                $v = view('fragm.convenios_institucion',[
                    'convenios_institucion' => $convenios,
                    'tipo_convenios' => $tipo_convenios
                ])->render();
                return ['estado' => 1, 'msj' => 'Convenio editado', 'v' => $v];
            }
            return $convenio;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function eliminar_asistente(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }
            $asistente = ContratoAsistenteInstitucion::find($req->id);

            $asistente->delete();
            $asistentes_contratados = ContratoAsistenteInstitucion::where('id_institucion',$institucion->id)->get();

            $v = view('fragm.asistentes_contratados',[
                'asistentes_contratados' => $asistentes_contratados,
            ])->render();
            return ['estado' => 1, 'msj' => 'Asistente eliminado', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }


    }

    public function registrar_personal_mantencion(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }

            $nuevo_contrato_mantencion = new ContratoMantencionInstitucion();
            $nuevo_contrato_mantencion->rut = $req->rut;
            $nuevo_contrato_mantencion->fecha_ingreso = $req->fecha;
            $nuevo_contrato_mantencion->nombre = $req->nombre;
            $nuevo_contrato_mantencion->primer_apellido = $req->apellido1;
            $nuevo_contrato_mantencion->segundo_apellido = $req->apellido2;
            $nuevo_contrato_mantencion->email = $req->email;
            $nuevo_contrato_mantencion->telefono = $req->telefono;
            $nuevo_contrato_mantencion->direccion = $req->direccion;
            $nuevo_contrato_mantencion->numero = $req->numero;
            $nuevo_contrato_mantencion->id_cargo = $req->profesion;
            $nuevo_contrato_mantencion->id_region = $req->region;
            $nuevo_contrato_mantencion->id_comuna = $req->comuna;
            $nuevo_contrato_mantencion->id_tipo_mantencion = $req->tipo;
            $nuevo_contrato_mantencion->id_funcion = $req->funcion;
            $nuevo_contrato_mantencion->horas_trabajadas = $req->horas_trabajadas;
            $nuevo_contrato_mantencion->remuneracion = intval($req->remuneracion);
            $nuevo_contrato_mantencion->id_banco = $req->banco;
            $nuevo_contrato_mantencion->numero_cuenta = $req->n_cta;
            $nuevo_contrato_mantencion->sucursal = $req->sucursal;
            $nuevo_contrato_mantencion->id_institucion = $institucion->id;
            $nuevo_contrato_mantencion->id_tipo_contrato = 1; // contrato indefinido (por defecto)

            if($nuevo_contrato_mantencion->save()){
                $mantenedores_contratados = ContratoMantencionInstitucion::where('id_institucion',$institucion->id)->get();
                $v = view('fragm.mantenedores_contratados',[
                    'mantenedores_contratados' => $mantenedores_contratados,
                ])->render();
                return ['estado' => 1, 'msj' => 'Mantenedor registrado', 'v' => $v];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }


    }

    public function eliminar_personal_mantencion(Request $req){
        try {
            $institucion = '';
            $tipo_institucion = '1';
            $id_busqueda = Auth::user()->id;
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {
                                return back()->with('error','Institución no encontrada');
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }
            $mantenedor = ContratoMantencionInstitucion::find($req->id);
            $mantenedor->delete();
            $mantenedores_contratados = ContratoMantencionInstitucion::where('id_institucion',$institucion->id)->get();
            $v = view('fragm.mantenedores_contratados',[
                'mantenedores_contratados' => $mantenedores_contratados,
            ])->render();
            return ['estado' => 1, 'msj' => 'Mantenedor eliminado', 'v' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function solicitudes_pendientes(){
        $tipos_producto = TipoProducto::all();
        $empleados = User::all();
        $pedidos = Pedido::select('pedido.*', 'users.name as usuario')
            ->leftjoin('users', 'pedido.id_usuario', '=', 'users.id')
            ->where('pedido.estado', 1)
            ->get();
        return view('app.bodega.solicitudes_pendientes',[
            'pedidos' => $pedidos,
            'tipos_producto' => $tipos_producto,
            'empleados' => $empleados
        ]);
    }

    public function ver_solicitud(Request $req){
        try {
            //code...
            $tipos_producto = TipoProducto::all();
            $empleados = User::all();
            $pedido = Pedido::select('pedido.*', 'users.name as usuario')
                ->leftjoin('users', 'pedido.id_usuario', '=', 'users.id')
                ->where('pedido.id', $req->id)
                ->first();
            $bodega_controlador = new BodegasController();
            $todos_productos = $bodega_controlador->dameProductosEntregados($req->id);
            $productos_pedido = $todos_productos['entregados'];
            $productos_pendientes = $todos_productos['pendientes'];
            foreach($productos_pedido as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }
            foreach($productos_pendientes as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }
            return view('app.bodega.solicitud',[
                'pedido' => $pedido,
                'productos_pedido' => $productos_pedido,
                'productos_pendientes' => $productos_pendientes,
                'tipos_producto' => $tipos_producto,
                'empleados' => $empleados
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function guardar_camas_servicio(Request $request){

        $nombre_sala = $request->nombre_sala;
        $tipo_sala = $request->tipo_sala;
        $cantidad_camas = $request->cantidad_camas;
        $id_sala_servicio = $request->id_sala;

        $servicio_interno = ServiciosInternos::find($request->id_servicio);
        // verificamos si existe por el id_sala
        $existe = ServiciosInternosSalas::where('id_sala_servicio',$id_sala_servicio)->first();
        if($existe) $servicio_interno->camas_disponibles += $existe->cantidad_camas;


        // validar que no se asignen mas camas de las que quedan disponibles
        if($cantidad_camas <= $servicio_interno->camas_disponibles){
            $servicio_interno->camas_disponibles -= $cantidad_camas;
            $servicio_interno->save();
        }else{
            return ['estado' => 'error','mensaje' => "Excede el total de camas."];
        }

        if($existe){
            $servicio_interno_sala = $existe;
        } else{
            $servicio_interno_sala = new ServiciosInternosSalas();
        }

        $servicio_interno_sala->id_servicio_interno = $request->id_servicio;
        $servicio_interno_sala->id_sala_servicio = $id_sala_servicio;
        $servicio_interno_sala->nombre_sala = $nombre_sala;
        $servicio_interno_sala->tipo_sala = $tipo_sala;
        $servicio_interno_sala->cantidad_camas = $cantidad_camas;
        $servicio_interno_sala->estado = 1;

        if($servicio_interno_sala->save()){
            $servicios_internos = $this->dame_servicios_internos($servicio_interno->id_institucion);
            $v = view('fragm.salas_servicios',['servicios_internos' => $servicios_internos,'id_servicio_activo' => $servicio_interno->id])->render();
            return ['estado' => 'OK','mensaje' => 'Camas asignadas con éxito.','v' => $v];
        }else{
            return ['estado' => 'error','mensaje' => 'Ha ocurrido un error'];
        }
    }

    public function buscar_rut_paciente(Request $request)
    {
        try {

            //code...
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
            if(isset($paciente)){
                $paciente_box = PacienteTriage::where('id_paciente', $paciente->id)->first();
                if($paciente_box)
                {
                    $paciente['triage'] = "SI";
                }else{
                    $paciente['triage'] = "NO";
                }
                $paciente['code'] = Crypt::encryptString( $paciente['email'] );

                $detalle_receta_controlador = new DetalleRecetaController();
                $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente['id']);
                $procedimientos = $this->dameProcedimientosPaciente($paciente['id']);
                $curaciones = $this->dameCuracionesPaciente($paciente['id']);
                $controles_ciclo = $this->dameEvolucionesPacienteHosp($paciente['id']);
                $examenControlador = new ExamenMedicoController();
                $examenes_solicitados = $examenControlador->dame_examenes_solicitados($paciente['id']);
                foreach ($controles_ciclo as $index => &$evolucion) {
                    // Construir fecha y hora de la evolución actual
                    $fechaHoraEvolucionActual = Carbon::parse($evolucion['fecha'] . ' ' . $evolucion['hora']);

                    // Construir fecha y hora de la evolución siguiente (si existe)
                    $fechaHoraEvolucionSiguiente = isset($controles_ciclo[$index + 1])
                        ? Carbon::parse($controles_ciclo[$index + 1]['fecha'] . ' ' . $controles_ciclo[$index + 1]['hora'])
                        : null;

                    // Filtrar exámenes que ocurren después de la evolución actual y antes de la siguiente
                    $examenesFiltrados = collect($examenes_solicitados)->filter(function ($examen) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                        // Construir fecha y hora del examen
                        $fechaHoraExamen = Carbon::parse($examen['fecha'] . ' ' . $examen['hora']);
                        return $fechaHoraExamen->greaterThan($fechaHoraEvolucionActual) && // Debe ser posterior a la evolución actual
                               ($fechaHoraEvolucionSiguiente === null || $fechaHoraExamen->lessThan($fechaHoraEvolucionSiguiente)); // Opcionalmente anterior a la siguiente evolución
                    });

                      // Filtrar recetas que ocurren después de la evolución actual y antes de la siguiente
                    $recetasFiltradas = collect($recetas)->filter(function ($receta) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                        // Construir fecha y hora de la receta
                        $fechaHoraReceta = Carbon::parse($receta['fecha'] . ' ' . $receta['hora']);
                        return $fechaHoraReceta->greaterThan($fechaHoraEvolucionActual) && // Debe ser posterior a la evolución actual
                            ($fechaHoraEvolucionSiguiente === null || $fechaHoraReceta->lessThan($fechaHoraEvolucionSiguiente)); // Opcionalmente anterior a la siguiente evolución
                    });

                     // Filtrar procedimientos que ocurren después de la evolución actual y antes de la siguiente
                    $procedimientosFiltrados = collect($procedimientos)->filter(function ($procedimiento) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                        // Construir fecha y hora del procedimiento
                        $fechaHoraProcedimiento = Carbon::parse($procedimiento['fecha'] . ' ' . $procedimiento['hora']);
                        return $fechaHoraProcedimiento->greaterThan($fechaHoraEvolucionActual) && // Después de la evolución actual
                            ($fechaHoraEvolucionSiguiente === null || $fechaHoraProcedimiento->lessThan($fechaHoraEvolucionSiguiente)); // Antes de la siguiente evolución
                    });

                    // Asignar exámenes a la evolución actual
                    $evolucion['examenes'] = $examenesFiltrados->values(); // Asegurar que sea una lista indexada
                    // Asignar recetas a la evolución actual
                    $evolucion['recetas'] = $recetasFiltradas->values(); // Asegurar que sea una lista indexada
                    // Asignar procedimientos a la evolución actual
                    $evolucion['procedimientos'] = $procedimientosFiltrados->values(); // Asegurar que sea una lista indexada
                }


                foreach($recetas as $receta)
                {
                    if($receta->id_dosis == null){
                        $receta->dosis = $receta->nombre_dosis;
                    }
                    $receta->frecuencia = $receta->nombre_frecuencia;
                }
            }

            else
                $paciente = null;

            // validar si es paciente
            if($tipo_paciente > 1)
                $paciente['tipo_paciente'] = 'NO';
            else
                $paciente['tipo_paciente'] = 'SI';


            return [
                json_encode($paciente),
                isset($controles_ciclo) ? $controles_ciclo : null,
                isset( $recetas) ? $recetas : null,
                isset($procedimientos) ? $procedimientos : null,
                isset($curaciones) ? $curaciones : null,
                isset($examenes_solicitados) ? $examenes_solicitados : null
            ];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function clave1(Request $req){

        $box = ServiciosInternosSalas::find($req->id_box);
        $id_servicio_interno = $box->id_servicio_interno;
        $servicio_interno=ServiciosInternos::select('servicio_interno.*','servicios.nombre as nombre_servicio','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                                                ->join('servicios','servicios.id','=','servicio_interno.id_servicio')
                                                ->leftjoin('profesionales','profesionales.id','=','servicio_interno.id_responsable')
                                                ->where('servicio_interno.id',$id_servicio_interno)
                                                ->first();

        if($box->alerta == 1) {
            $box->alerta = 0;
            $mensaje = "ALERTA DESACTIVADA";
            $tipo_mensaje = "success";
        }else{
            $box->alerta = 1;
            $mensaje = "ALERTA ACTIVADA";
            $tipo_mensaje = "warning";
        }
        if($box->save()){
            $servicio_interno = ServiciosInternos::find($id_servicio_interno);
                $salas_servicio = ServiciosInternosSalas::where('id_servicio_interno',$servicio_interno->id)->get();

                $servicio_interno->salas = $salas_servicio;

                $pacientes_salas = PacienteSala::select('paciente_sala.*','pacientes.nombres','pacientes.apellido_uno as apellido_uno_paciente','pacientes.apellido_dos as apellido_dos_paciente','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','pacientes_triage.id as id_paciente_triage')
                                    ->join('pacientes','paciente_sala.id_paciente','pacientes.id')
                                    ->join('pacientes_triage','pacientes_triage.id_paciente','=','paciente_sala.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->join('profesionales','paciente_sala.id_profesional','profesionales.id')
                                    ->where('paciente_sala.id_servicio_interno',$servicio_interno->id)
                                    ->get();
                foreach($pacientes_salas as $paciente){
                    switch ($paciente->nivel_urgencia) {
                        case 1:
                            # code...
                            $paciente->urgencia = 'Leve';
                            $paciente->clase_html = 'bg-primary text-white';
                            break;
                        case 2:
                            $paciente->urgencia = 'Media Urgencia';
                            $paciente->clase_html = 'bg-warning text-white';
                            break;
                        case 3:
                            $paciente->urgencia = 'Urgente';
                            $paciente->clase_html = 'bg-danger text-white';
                            break;
                        default:
                            # code...
                            $paciente->urgencia = '-----';
                            break;
                    }
                }
                $servicio_interno->pacientes = $pacientes_salas;
                $profesionales = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                    ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                    ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                    ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                    ->where('profesionales_servicios_clinicos.id_cargo',1)
                                    ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                    ->get();
                $servicio_interno->profesionales = $profesionales;

                $tens = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                    ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                    ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                    ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                    ->where('profesionales_servicios_clinicos.id_cargo',5)
                                    ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                    ->get();

                $servicio_interno->tens = $tens;

                $servicio_interno->jefe_servicio = Profesional::find($servicio_interno->id_responsable);

                $v = view('app.adm_hospital.servicios.fragm.salas_servicio',['servicio' => $servicio_interno])->render();

                $salas_alerta = $this->salasAlerta();

            return ['mensaje' => 'OK','vista' => $v,'mensaje' => $mensaje,'tipo_mensaje' => $tipo_mensaje,'salas_alerta' => $salas_alerta];
        }
    }

    public function salasAlerta(){
        $boxEnAlerta = ServiciosInternosSalas::where('estado', 1)->where('alerta', 1)->get();
        foreach($boxEnAlerta as $box){
            $box->descripcion = $box->tipo_box.' '.$box->numero_box;
        }

        return $boxEnAlerta;
    }

    public function registrar_evolucion_paciente_hosp(Request $request){
        try {
            $evolucion = new EvolucionPacienteHospital;
            $evolucion->id_responsable = Auth::user()->id;
            $evolucion->id_paciente = $request->id_paciente;
            $evolucion->fecha = date('Y-m-d');
            $evolucion->hora = date('H:i:s');
            $evolucion->evolucion = $request->evolucion;
            $evolucion->resumen = $request->resumen;
            if($evolucion->save()){
                $controles_ciclo = $this->dameEvolucionesPacienteHosp($request->id_paciente);
                    if(count($controles_ciclo) == 0)
                    {
                        // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
                        $contador_div_evaluaciones = 1;
                    }else{
                        // si hay ciclos de control se suma 1 para manejar el id en la vista
                        $contador_div_evaluaciones = count($controles_ciclo) + 1;
                    }

                    foreach($controles_ciclo as $cc)
                    {
                        $cc->datos_evolucion = json_decode($cc->datos_evolucion);
                    }

                    $enfermera = true;

                    $v = view('app.adm_hospital.servicios.enfermera.control_ciclo', compact('controles_ciclo','enfermera','contador_div_evaluaciones'))->render();
                    return ['mensaje' => 'OK','vista' => $v];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function dameEvolucionesPacienteHosp($idpaciente){
        $controles_ciclo = EvolucionPacienteHospital::select('evoluciones_paciente_hosp.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_paciente_hosp.id_responsable')
                                                    ->where('evoluciones_paciente_hosp.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }
}
