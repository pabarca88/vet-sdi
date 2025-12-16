<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\AdminMed;
use App\Models\AreasCm;
use App\Models\Asistente;
use App\Models\AsistenteTipo;
use App\Models\Ciudad;
use App\Models\ContratoDependiente;
use App\Models\EspecialidadesCm;
use App\Models\Instituciones;
use App\Models\Paciente;
use App\Models\LugarAtencion;
use App\Models\Permission;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\Region;
use App\Models\Servicios;
use App\Models\ServiciosInternos;
use App\Models\TipoAdministrador;
use App\Models\TipoAreasCm;
use App\Models\TipoConvenioInstitucion;
use App\Models\Especialidad;
use App\Models\TipoEspecialidad;
use App\Models\TipoAdministradorSDI;
use App\Models\User;
use App\Models\Roles;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('administracion.home');
    }
	public function profesionales_sdi()
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

        return view('administracion.profesionales_sdi')->with([
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
    public function config_sdi()
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
        // foreach ($lista_tipo_institucion as $key => $value) {
        //     array_push($lista_tipo_contrato,array(
        //         'id' => $value->id,
        //         'nombre' => strtoupper($value->nombre),
        //     ));
        // }
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

        $cargos = AdminMed::all();

        $director_cm = Profesional::find($institucion->id_director_medico);

        $subdirector_cm = Profesional::find($institucion->id_subdirector_medico);

        $director_gestion_cuidado = Profesional::find($institucion->id_director_gestion_cuidado);

        $tipo_administradores_sdi = TipoAdministradorSDI::all();


        return view('administracion.configuracion',[
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
            'especialidades_cm' => $especialidades_cm,
            'otras_especialidades_cm' => $otras_especialidades_cm,
            'profesionales' => $profesionales,
            'tipos_areas_cm' => $tipos_areas_cm,
            'areas_cm' => $areas_cm,
            'servicios' => $servicios,
            'servicios_internos' => $servicios_internos,
            'tipo_administradores_sdi' => $tipo_administradores_sdi,
        ]);
    }

    public function roles_permisos()
    {
        $usuario = User::where('id', Auth::user()->id)->first();
        $usuarios = User::all();
        $permisos = Permission::all();
        foreach ($usuarios as $u) {
            switch ($u->getRoleNames()->first()) {
               case 'Admin':
                $paciente = Paciente::where('id_usuario', $u->id)->first();
                if (isset($paciente->nombres)) {
                    $u->Nombre = $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos;
                    $u->Rut = $paciente->rut;
                } else {
                    $u->Nombre = '';
                    $u->Rut = '';
                }
                break;

                case 'Paciente':
                $paciente = Paciente::where('id_usuario', $u->id)->first();
                if (isset($paciente->nombres)) {
                    $u->Nombre = $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos;
                    $u->Rut = $paciente->rut;
                } else {
                    $u->Nombre = '';
                    $u->Rut = '';
                }
                break;
            }
        }

        return view('administracion.roles_permisos')->with(['usuario' => $usuario, 'usuarios' => $usuarios, 'permisos' => $permisos]);
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
        $especialidad = EspecialidadesCm::select('especialidades_cm.id', 'especialidades_cm.id_tipo_especialidad', 'especialidades_cm.id_lugar_atencion', 'especialidades_cm.id_institucion', 'especialidades_cm.id_admin', 'especialidades_cm.estado','especialidades_cm.num_profesionales','tipos_especialidad.nombre','sub_tipo_especialidad.nombre as sub_tipo')
                                        ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'especialidades_cm.id_tipo_especialidad')
                                        ->join('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'especialidades_cm.id_sub_tipo_especialidad')
                                        ->where('especialidades_cm.id', $id)
                                        ->first();
        return $especialidad;
    }

    public function dame_profesionales($id_lugar_atencion){
        $profesionales = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos')
                            ->leftjoin('profesionales','profesionales.id','=','profesionales_lugares_atencion.id_profesional')
                            ->where('profesionales_lugares_atencion.id_lugar_atencion',$id_lugar_atencion)
                            ->get();

        return $profesionales;
    }

    public function dame_areas_cm($id_lugar_atencion){
        $areas_cm = AreasCm::select('areas_cm.*','tipos_areas_cm.nombre as tipo_area')
                            ->join('tipos_areas_cm','tipos_areas_cm.id','=','areas_cm.id_tipo_area_cm')
                            ->where('areas_cm.id_lugar_atencion',$id_lugar_atencion)
                            ->get();

        return $areas_cm;
    }

    public function dame_servicios_internos($id_institucion){
        $servicios_internos = ServiciosInternos::select('servicio_interno.*','servicios.nombre as nombre_servicio','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                            ->join('servicios','servicios.id','=','servicio_interno.id_servicio')
                            ->leftjoin('profesionales','profesionales.id','=','servicio_interno.id_responsable')
                            ->where('servicio_interno.id_institucion',$id_institucion)
                            ->get();

        return $servicios_internos;
    }

    public function agregar_permiso(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->givePermissionTo('admin.role.create');

        return json_encode($user);
    }
}
