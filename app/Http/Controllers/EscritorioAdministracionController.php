<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\Asistente;
use App\Models\Bodega;
use App\Http\Controllers\BodegaController;
use App\Models\BoxAtencionServicio;
use App\Models\ContratoDependiente;
use App\Models\Categoria;
use App\Models\ContratoDependienteProfesional;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Hash;
use App\Models\Instituciones;
use App\Models\Invitacion;
use App\Models\LugarAtencion;
use App\Models\PacienteTriage;
use App\Models\PacienteBox;
use App\Models\Profesional;
use App\Models\ProfesionalReemplazo;
use App\Models\PedidoDetalle;
use App\Models\PersonalReemplazoServicio;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalesTurnos;
use App\Models\Region;
use App\Models\Servicios;
use App\Models\ServicioInterno;
use App\Models\ServiciosInternosAsistentes;
use App\Models\ServiciosInternosProfesionales;
use App\Models\TipoConvenioInstitucion;
use App\Models\TipoProducto;
use App\Models\User;
use App\Models\Responsable;
use App\Models\ReponsableBodega;
use App\Models\JefeTurnosUrgencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\InvitacionController;
use App\Http\Controllers\ProfesionalInstitucionConvenioController;

class EscritorioAdministracionController extends Controller
{
    public function index()
    {
        $admin = AdminInstServ::where('id_admin', Auth::user()->id)->first();
       
        if($admin){
            $servicio = Servicios::where('id_responsable', $admin->id)->first();
            return view('page.administrativo.escritorio_administrativo')->with([
                'id_lugar_atencion' => $servicio->id_lugar_atencion,
            ]);
        }else{
            return 'error';
        }
        
    }

    public function estadisticas()
    {
        return view('page.administrativo.estadisticas')->with([]);
    }

    public function configuracion()
    {
        try {
            //code...
            $responsables = Responsable::all();
            $categorias = Categoria::all();
            $bc = new BodegaController();
           
  
            $tipos_productos = TipoProducto::all();
        
            $profesionales = Profesional::all();
            $boxes_servicio = BoxAtencionServicio::orderBy('tipo_box','asc')->get();


            $admin = AdminInstServ::where('id_admin', Auth::user()->id)->first();
        
            $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();

            if($admin){
                $servicio = Servicios::where('id_responsable', $admin->id)->first();
            }else{
                $servicio = ServicioInterno::where('id_usuario', Auth::user()->id)->first();
            }

            $personal_reemplazo = PersonalReemplazoServicio::select('personal_servicio_reemplazo.*','profesionales.nombre as nombre_profesional','profesionales.apellido_uno as apellido_uno_profesional','profesionales.apellido_dos as apellido_dos_profesional')
                ->join('profesionales', 'personal_servicio_reemplazo.id_profesional', '=', 'profesionales.id')
                ->where('personal_servicio_reemplazo.id_lugar_atencion', $institucion->id_lugar_atencion)
                ->where('personal_servicio_reemplazo.estado',1)
                ->get();

            $especialidades = Especialidad::all();

            /** CARGA DE ASISTENTE */
            $lista_asistente = array();
        
        
            $SI_asistente = ServiciosInternosAsistentes::where('id_servicio_interno', $servicio->id)->pluck('id_asistente')->toArray();
        
            $asistente = Asistente::with('AsistenteTipo')->whereIn('id', $SI_asistente)->get();
    
            if($asistente)
            {
                foreach ($asistente as $key_asist => $value_asist)
                {
                array_push($lista_asistente, $value_asist);
                }
            }

            $profesionales = $this->dameProfesionalesServicio($institucion->id_lugar_atencion);
            $profesionales_reemplazo = $this->dameProfesionalesServicioReemplazo();

       
            $regiones = Region::all();

            $bodegas = $bc->dameBodegas($institucion->id); //  reemplazar por la institucion y el servicio
  
            foreach ($bodegas as $bodega) {
                // convertir a array el json tipos_productos
                $bodega->tipos_productos = json_decode($bodega->tipos_productos);
                $bodega->tipo_productos_autorizacion = json_decode($bodega->tipos_productos_autorizacion);
            }


            /** FIN CARGA DE ASISTENTE */
            return view('page.administrativo.configuracion')->with([
                'responsables' => $responsables,
                'categorias' => $categorias,
                'bodegas' => $bodegas,
                'tipos_productos' => $tipos_productos,
                'profesionales' => $profesionales,
                'boxes_servicio' => $boxes_servicio,
                'id_lugar_atencion' => $institucion->id_lugar_atencion,
                'id_tipo_convenio_institucion' => 1,
                'id_servicio_interno' => $servicio->id,
                'personal_reemplazo' => $personal_reemplazo,
                'especialidades' => $especialidades,
                // 'lista_asistente' => $lista_asistente,
                'institucion' => $institucion,
                'regiones' => $regiones,
                'encargado_servicio' => $admin,
            ]);
            } catch (\Exception $e) {
                //throw $th;
                return $e->getMessage();
            }
        
    }

    public function dameProfesionalesServicio($id_lugar_atencion){
        $profesionales_contratados = ProfesionalesLugaresAtencion::select('profesionales.*','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad','sub_tipo_especialidad.nombre as sub_tipo_especialidad')
            ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
            ->join('especialidades','profesionales.id_especialidad','=','especialidades.id')
            ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','=','tipos_especialidad.id')
            ->leftjoin('sub_tipo_especialidad','profesionales.id_sub_tipo_especialidad','=','sub_tipo_especialidad.id')
            ->where('profesionales_lugares_atencion.id_lugar_atencion',$id_lugar_atencion)
            ->get();

        foreach($profesionales_contratados as $profesional){
            $contrato = ContratoDependienteProfesional::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$id_lugar_atencion)->first();
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
        return $profesionales_contratados;
    }

    public function dameEnfermerasServicio($id_lugar_atencion){
        $enfermeras_contratadas = ProfesionalesLugaresAtencion::select('profesionales.*','profesionales_lugares_atencion.id','profesionales_lugares_atencion.id_profesional')
                                    ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
                                    // ->where('profesionales_lugares_atencion.id_lugar_atencion',$id_lugar_atencion)
                                    ->where('profesionales.id_especialidad',8)
                                    ->get();

        foreach($enfermeras_contratadas as $enfermera){
            $usuario = User::find($enfermera->id_usuario);
            $enfermera->profesional = $usuario;
            $enfermera->profesional->nombre = $usuario->name;
            // filtrar por rol de enfermera
            $enfermera->rol = $usuario->roles()->first()->name;
        }

        return $enfermeras_contratadas;
    }

    public function dameTensServicio($id_lugar_atencion){
        try {
            $tens_contratados = ProfesionalesLugaresAtencion::select('profesionales.*','profesionales_lugares_atencion.id','profesionales_lugares_atencion.id_profesional')
                                    ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
                                    ->where('profesionales_lugares_atencion.id_lugar_atencion',$id_lugar_atencion)
                                    ->get();

            $tens = [];

            foreach($tens_contratados as $enfermera){
                $usuario = User::find($enfermera->id_usuario);
                $enfermera->usuario = $usuario;
                // filtrar por rol de tens
                $enfermera->roles = $usuario->roles()->get();
                foreach($enfermera->roles as $rol){
                    if($rol->name == 'Tens'){
                        array_push($tens, $enfermera);
                    }
                }
            }

            return $tens;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
        
    }

    public function dameProfesionalesServicioReemplazo(){
        $invitaciones = Invitacion::where('estado',1)->get();
        $profesionales = [];
        foreach($invitaciones as $invitacion){
            $profesional = ProfesionalReemplazo::where('id_usuario',$invitacion->id_user_invitado)->first();
            if($profesional){
                $profesional->tipo_invitacion = $invitacion->tipo_invitacion;
                $profesional->fecha_aprobacion = $invitacion->fecha_aprobacion;
                $profesional->telefono_uno = $profesional->telefono_uno;
                array_push($profesionales, $profesional);
            }
        }
    }

    public function misProfesionales(Request $request)
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_servicio_interno = 1;
        // $id_servicio_interno = $request->id_servicio_interno;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();

        if($registro)
        {
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = ServicioInterno::where('id_usuario',Auth::user()->id)->first();
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
                        $registro = ServicioInterno::where('id_responsable',$responsable->id)->first();
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
                                    $registro = ServicioInterno::where('id',$result_contrato->id_institucion)->first();
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
        $lista_profesionales = array();
        $lista_profesionales['MEDICO'] = array();
        $lista_profesionales['OTROS'] = array();

        $lugar_atencion_profesionales = ServiciosInternosProfesionales::where('id_servicio_interno', $id_servicio_interno)->pluck('id_profesional')->toArray();
        $profesionales = Profesional::whereIn('id', $lugar_atencion_profesionales)->get();

        if($profesionales)
        {
            foreach ($profesionales as $key_prof => $value_prof)
            {

                if($value_prof->id_especialidad == 1)//MEDICO
                {
                    array_push($lista_profesionales['MEDICO'], $value_prof) ;
                }
                else if($value_prof->id_especialidad == 8)//ENFERMERA
                {
                    array_push($lista_profesionales['ENFERMERA'], $value_prof) ;
                }
                else if($value_prof->id_especialidad == 10)//TENS
                {
                    array_push($lista_profesionales['TENS'], $value_prof) ;
                }
                else //OTROS
                {
                    array_push($lista_profesionales['OTROS'], $value_prof) ;
                }
            }
        }
        /** FIN CARGA DE PROFESIONALES */

        /** CARGA DE ASISTENTE */
        $lista_asistente = array();
        
        $SI_asistente = ServiciosInternosAsistentes::where('id_servicio_interno', $id_servicio_interno)->pluck('id_asistente')->toArray();
        $asistente = Asistente::whereIn('id', $SI_asistente)->get();

        if($asistente)
        {
            foreach ($asistente as $key_asist => $value_asist)
            {
               array_push($lista_asistente['OTROS'], $value_asist);
            }
        }
        /** FIN CARGA DE ASISTENTE */

        $tipo_convenio = TipoConvenioInstitucion::where('estado', 1)->get();

        $region = Region::all();
        $especialidad = Especialidad::all();

        $servicio_interno = ServicioInterno::where('id_institucion', $institucion->id)->where('id_lugar_atencion',$institucion->id_lugar_atencion)->first();

        return view('page.administrativo.escritorio_mis_profesionales')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_profesionales' => $lista_profesionales,
            'lista_asistente' => $lista_asistente,
            'tipo_convenio' => $tipo_convenio,
            'region' => $region,
            'especialidad' => $especialidad,
            'servicio_interno' => $servicio_interno
        ]);
    }

    public function buscarProfesionalInstitucion(Request $request)
    {
    
        try {
            $datos = array();
            $error = array();
            $valido = 1;
    
            if(empty($request->rut))
            {
                $error['rut'] = 'campo requerido';
                $valido = 0;
            }
    
            if(empty($request->id_servicio_interno))
            {
                $error['id_servicio_interno'] = 'campo requerido';
                $valido = 0;
            }
    
            if($valido) 
            {
                $ser_inter = ServicioInterno::find($request->id_servicio_interno);
                $institucion = Instituciones::find($ser_inter->id_institucion);

                $lugar_atencion = LugarAtencion::find($institucion->id_lugar_atencion);
                $prof_institucion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $lugar_atencion->id)->pluck('id_profesional')->toArray();
    
                
                $profesional = Profesional::whereIn('id',$prof_institucion)
                                            ->where('rut', $request->rut)
                                            ->get()->first();
    
                if($profesional){
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registros';
                    $datos['registro'] = $profesional;
                }else{
                    $datos['estado'] = 0;
                    $datos['msj'] = 'No se encontraron registros';
                }
                
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'campo requerido';
                $datos['error'] = $error;
            }
    
            return $datos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
       
    }
	public function permisos()
    {
        return view('page.administrativo.permisos')->with([]);
    }

    public function solicitudes(){
        $bodega_controlador = new BodegaController(); 
        // dame bodegas de la institucion y del servicio
        $bodegas = $bodega_controlador->dameBodegas(5); //  reemplazar por la institucion y el servicio
        return view('page.administrativo.solicitudes')->with([
            'bodegas' => $bodegas
        ]);
    }

    public function solicitudes_bodega(Request $req){
        try {
            $bodega = Bodega::find($req->bodega);
            // dame productos de la bodega
            $bodega_controlador = new BodegaController();
            $productos = $bodega_controlador->dameProductosBodega($bodega->id);
            $productos_solicitados = [];

            foreach($productos as $producto){
                
                $productos_solicitados_bodega = $this->dameSolicitudesProducto($producto->id_producto);
                
                if(count($productos_solicitados_bodega) > 0){
                    foreach($productos_solicitados_bodega as $producto_solicitado){
                        array_push($productos_solicitados, $producto_solicitado);
                    }
                }
            }

            return ['productos' => $productos_solicitados];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

        
    }

    public function dameSolicitudesProducto($idproducto){
        $productos_solicitados_bodega = PedidoDetalle::select('pedido_detalle.id_producto', 'productos.nombre as nombre_producto', 'tipo_producto.nombre as tipo_producto','pedido.id as id_pedido','marcas_productos.nombre as marca')
                ->leftjoin('productos', 'pedido_detalle.id_producto', '=', 'productos.id')
                ->leftjoin('tipo_producto', 'productos.id_tipo_producto', '=', 'tipo_producto.id')
                ->leftjoin('pedido', 'pedido_detalle.id_pedido', '=', 'pedido.id')
                ->join('marcas_productos', 'productos.id_marca', '=', 'marcas_productos.id')
                ->where('pedido_detalle.id_producto', $idproducto)
                ->groupBy('pedido_detalle.id_producto', 'productos.nombre', 'tipo_producto.nombre', 'pedido.id', 'marcas_productos.nombre')
                ->get();

        return $productos_solicitados_bodega;
    }

    public function guardarBoxAtencion(Request $req){
        return $req;
    }

    public function sistematurnos(){
        $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
        $profesionales = $this->dameProfesionalesServicio($institucion->id_lugar_atencion);
        $enfermeras = $this->dameEnfermerasServicio($institucion->id_lugar_atencion);
        $choferes_ambulancia = $this->dameChoferesAmbulanciaServicio($institucion->id_lugar_atencion);

        return $choferes_ambulancia;

        $tens = $this->dameTensServicio($institucion->id_lugar_atencion);
   
        $profesionales_turnos = ProfesionalesTurnos::where('id_lugar_atencion', $institucion->id_lugar_atencion)->get();
        $profesionales_turnos->each(function($item){
            $item->ids_profesionales = json_decode($item->ids_profesionales);
        });

        $profesionales_turnos->each(function($item){
            $profesionales = Profesional::whereIn('id', $item->ids_profesionales)->with('Especialidad')->get();
            if($profesionales->isNotEmpty()){
                $item->profesionales = $profesionales;
            }

        });

        // Dividir los profesionales_turnos en dos colecciones basadas en tipo_turno
        $turnos_tipo_3 = $profesionales_turnos->filter(function($item) {
            return $item->tipo_turno == 3;
        })->values(); // Reiniciar índices

        $turnos_tipo_4 = $profesionales_turnos->filter(function($item) {
            return $item->tipo_turno == 4;
        })->values(); // Reiniciar índices

        $jefe_turnos = JefeTurnosUrgencias::where('id_lugar_atencion', $institucion->id_lugar_atencion)->get();
        $jefe_turnos->each(function($item){
            $item->profesional = Profesional::find($item->id_profesional);
        });

        $jefes_3 = $jefe_turnos->filter(function($item) {
            return $item->tipo_turno == 3;
        })->values(); // Reiniciar índices

        $jefes_4 = $jefe_turnos->filter(function($item) {
            return $item->tipo_turno == 4;
        })->values(); // Reiniciar índices

        return view('page.administrativo.turnos')->with([
            'id_lugar_atencion' => $institucion->id_lugar_atencion,
            'id_institucion' => $institucion->id,
            'profesionales' => $profesionales,
            'enfermeras' => $enfermeras,
            'tens' => $tens,
            'profesionales_turnos' => $profesionales_turnos ? $profesionales_turnos : [],
            'turnos_tipo_3' => $turnos_tipo_3,
            'turnos_tipo_4' => $turnos_tipo_4,
            'jefes_3' => $jefes_3,
            'jefes_4' => $jefes_4
        ]);
    }

    public function dameChoferesAmbulanciaServicio($id_lugar_atencion){
        $choferes_contratados = ProfesionalesLugaresAtencion::select('profesionales.*','profesionales_lugares_atencion.id','profesionales_lugares_atencion.id_profesional')
                                    ->join('profesionales','profesionales_lugares_atencion.id_profesional','=','profesionales.id')
                                    ->where('profesionales_lugares_atencion.id_lugar_atencion',$id_lugar_atencion)
                                    ->get();

        $choferes = [];

        foreach($choferes_contratados as $chofer){
            $usuario = User::find($chofer->id_usuario);
            $chofer->usuario = $usuario;
            // filtrar por rol de chofer
            $chofer->roles = $usuario->roles()->get();
            foreach($chofer->roles as $rol){
                if($rol->name == 'Chofer'){
                    array_push($choferes, $chofer);
                }
            }
        }

        return $choferes;
    }

    public function dame_calendario_turnos(){
        $institucion = Instituciones::where('id_usuario', Auth::user()->id)->first();
        $profesionales = $this->dameProfesionalesServicio($institucion->id_lugar_atencion);
        $enfermeras = $this->dameEnfermerasServicio($institucion->id_lugar_atencion);

        $tens = $this->dameTensServicio($institucion->id_lugar_atencion);

        $profesionales_turnos = ProfesionalesTurnos::where('id_lugar_atencion', $institucion->id_lugar_atencion)->get();
        $profesionales_turnos->each(function($item){
            $item->ids_profesionales = json_decode($item->ids_profesionales);
        });

        $profesionales_turnos->each(function($item){
            $profesionales = Profesional::whereIn('id', $item->ids_profesionales)->with('Especialidad')->get();
            if($profesionales->isNotEmpty()){
                $item->profesionales = $profesionales;
            }
        });

        // Dividir los profesionales_turnos en dos colecciones basadas en tipo_turno
        $turnos_tipo_3 = $profesionales_turnos->filter(function($item) {
            return $item->tipo_turno == 3;
        })->values(); // Reiniciar índices

        $turnos_tipo_4 = $profesionales_turnos->filter(function($item) {
            return $item->tipo_turno == 4;
        })->values(); // Reiniciar índices

        $jefe_turnos = JefeTurnosUrgencias::where('id_lugar_atencion', $institucion->id_lugar_atencion)->get();
        $jefe_turnos->each(function($item){
            $item->profesional = Profesional::find($item->id_profesional);
        });

        $jefes_3 = $jefe_turnos->filter(function($item) {
            return $item->tipo_turno == 3;
        })->values(); // Reiniciar índices

        $jefes_4 = $jefe_turnos->filter(function($item) {
            return $item->tipo_turno == 4;
        })->values(); // Reiniciar índices

        return view('page.fragm.calendario_turnos')->with([
            'id_lugar_atencion' => $institucion->id_lugar_atencion,
            'id_institucion' => $institucion->id,
            'profesionales' => $profesionales,
            'enfermeras' => $enfermeras,
            'tens' => $tens,
            'profesionales_turnos' => $profesionales_turnos ? $profesionales_turnos : [],
            'turnos_tipo_3' => $turnos_tipo_3,
            'turnos_tipo_4' => $turnos_tipo_4,
            'jefes_3' => $jefes_3,
            'jefes_4' => $jefes_4
        ])->render();
    }

    public function dameProfesionalesEquipo(Request $request){
        // buscar los profesionales que pertenecen al equipo
        $profesionales = ProfesionalesTurnos::where('equipo', $request->equipo)
                                            ->where('id_lugar_atencion', $request->id_lugar_atencion)
                                            ->where('tipo_turno', $request->tipo_turno)
                                            ->first();

        if($profesionales){
            $profesionales->ids_profesionales = json_decode($profesionales->ids_profesionales);
            $profesionales->profesionales = Profesional::whereIn('id', $profesionales->ids_profesionales)->get();
            return ['estado' => 'success', 'profesionales' => $profesionales];
        }else{
            return ['estado' => 'error', 'msj' => 'No se encontraron profesionales'];
        }
    }

    public function eliminar_profesional_turno(Request $request){
        try {
            $profesional_turno = ProfesionalesTurnos::find($request->id);
         
            $ids = json_decode($profesional_turno->ids_profesionales, true);
            // recorremos todos los id de los profesionales y eliminamos el id del profesional a eliminar
            foreach($ids as $key => $id){
                if($id == $request->id_profesional){
                    unset($ids[$key]);
                }
            }
            // Reindexar el array
            $ids = array_values($ids);

            $profesional_turno->ids_profesionales = json_encode($ids);
            if($profesional_turno->save()){
                $vista = $this->dame_calendario_turnos();
                return ['estado' => 'success', 'msj' => 'Profesional eliminado correctamente', 'vista' => $vista];
            }else{
                return ['estado' => 'error', 'msj' => 'Error al eliminar profesional'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 'error', 'msj' => $e->getMessage()];
        } 
    }

    public function asociar_profesional_turno(Request $request){
        try {
         
            // verificar si ya existe un registro con los mismos datos
            $turno = ProfesionalesTurnos::where('equipo', $request->equipo)
                                                    ->where('id_lugar_atencion', $request->id_lugar_atencion)
                                                    ->where('tipo_turno', $request->tipo_turno)
                                                    ->first();
            if($turno){
                $profesional_turno = ProfesionalesTurnos::find($turno->id);
                // Decodificar ids_profesionales existente
                $ids_profesionales = json_decode($profesional_turno->ids_profesionales, true);
                if (!is_array($ids_profesionales)) {
                    $ids_profesionales = [];
                }
                // Agregar nuevos ids_profesionales
                $ids_profesionales = array_merge($ids_profesionales, $request->ids);
                // Eliminar duplicados
                $ids_profesionales = array_unique($ids_profesionales);

                // reiniciar los indices
                $ids_profesionales = array_values($ids_profesionales);
            }else{
                $profesional_turno = new ProfesionalesTurnos();
                $ids_profesionales = $request->ids;
            }
            
            $profesional_turno->ids_profesionales = json_encode($ids_profesionales);
            $profesional_turno->equipo = $request->equipo;
            $profesional_turno->id_lugar_atencion = $request->id_lugar_atencion;
            $profesional_turno->tipo_turno = $request->tipo_turno;

            if($profesional_turno->save()){
                $v = $this->dame_calendario_turnos();
                return ['estado' => 'success', 'msj' => 'Profesionales asociados correctamente', 'vista' => $v];
            }else{
                return ['estado' => 'error', 'msj' => 'Error al asociar profesionales'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function asignar_jefe_turno(Request $request){
        try {
            $existe = JefeTurnosUrgencias::where('equipo', $request->equipo)
                                            ->where('tipo_turno', $request->tipo_turno)
                                            ->where('id_lugar_atencion', $request->id_lugar_atencion)
                                            ->where('fecha_inicio', $request->fecha_inicio)
                                            ->where('fecha_fin', $request->fecha_fin)
                                            ->first();
            if($existe){
                $jefe_turno = JefeTurnosUrgencias::find($existe->id);
            }else{
                $jefe_turno = new JefeTurnosUrgencias();
            }
            
            $jefe_turno->id_profesional = $request->jefe_turno;
            $jefe_turno->equipo = $request->equipo;
            $jefe_turno->tipo_turno = $request->tipo_turno;
            $jefe_turno->id_lugar_atencion = $request->id_lugar_atencion;
            $jefe_turno->cantidad_profesionales = $request->cantidad_profesionales;
            $jefe_turno->ids_profesionales = json_encode($request->ids_profesionales);
            $jefe_turno->fecha_inicio = $request->fecha_inicio;
            $jefe_turno->fecha_fin = $request->fecha_fin;
            $jefe_turno->hora_inicio = $request->hora_inicio;
            $jefe_turno->hora_fin = $request->hora_fin;
        
            if($jefe_turno->save()){
                return ['estado' => 'success', 'msj' => 'Jefe de turno asignado correctamente'];
            }else{
                return ['estado' => 'error', 'msj' => 'Error al asignar jefe de turno'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        } 
    }

    public function activar_box(Request $req){
        try {
            //code...
            $box = BoxAtencionServicio::find($req->id);
            $box->estado = 1;
            $box->save();
            return ['estado' => 'success', 'msj' => 'Box activado correctamente'];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
        
    }

    public function desactivar_box(Request $req){
        try {
           
            $box = BoxAtencionServicio::find($req->id);
      
            $paciente_box = PacienteBox::where('id_box', $req->id)->first();
            if($paciente_box){
                return ['estado' => 'error', 'msj' => 'No se puede desactivar el box, tiene pacientes asignados'];
            }
            $box->estado = 0;
            $box->save();
            return ['estado' => 'success', 'msj' => 'Box desactivado correctamente'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function permisosenf()
    {
        return view('page.enfermera.permisos')->with([]);
    }
    public function permisostens()
    {
        return view('page.tens.permisos')->with([]);
    }
    public function permisosprof()
    {
        return view('page.profesional.permisos')->with([]);
    }
    // public function permisos()
    // {
    //     return view('page.administrativo.permisos')->with([]);
    // }
    public function entrega_turno()
    {
        $pacientes_finalizados = PacienteTriage::where('estado', 'FINALIZADO')->get();
        return view('page.profesional.entrega_turno')->with([
            'pacientes_finalizados' => $pacientes_finalizados
        ]);
    }

    public function guardar_permisos(Request $req){
        return $req;
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($req->id_servicio_interno))
        {
            $error['id_servicio_interno'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($req->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($req->id_asistente))
        {
            $error['id_asistente'] = 'campo requerido';
            $valido = 0;
        }

        if($valido) 
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'permisos guardados';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function asociar_profesional(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_institucion))
        {
            $error['id_institucion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
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


            $profesionales = Profesional::where('id', $request->id_profesional)->first();
            
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

    public function desasociar_profesional(Request $request){
        
        $datos = array();
        $error = array();
        $valido = 1;


        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_institucion))
        {
            $error['id_institucion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
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
            
            // buscar la invitacion a ese profesional
            $profesional = Profesional::find($request->id_profesional);

            $invitacion = Invitacion::where('id_user_invitado', $profesional->id_usuario)->first();
            if($invitacion){
                $invitacion->delete();
            }
            $datos['estado'] = 1;
            $datos['msj'] = 'Exito';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function asociar_profesional_nuevo(Request $req){
      
        // verificar si el rut ya existe
        $profesional = Profesional::where('rut', $req->rut)->first();
        $institucion = Instituciones::where('id',$req->id_institucion)->first();
        if($profesional){
            $nuevo_profesional = $profesional;
        }else{
            $nuevo_profesional = new Profesional();
        }
        $nuevo_profesional->rut = $req->rut;
        $nuevo_profesional->nombre = $req->nombre;
        $nuevo_profesional->apellido_uno = $req->apellido_m;
        $nuevo_profesional->apellido_dos = $req->apellido_p;
        $nuevo_profesional->telefono_uno = $req->contacto;
        $nuevo_profesional->email = $req->correo;
        $nuevo_profesional->id_especialidad = 1;
        $nuevo_profesional->id_tipo_especialidad = 1;
        $nuevo_profesional->id_sub_tipo_especialidad = 1;
        $nuevo_profesional->id_usuario = 1;
        $nuevo_profesional->id_direccion = 1;
        $nuevo_profesional->sexo = $req->sexo;
        $nuevo_profesional->certificado = 3;
        if($nuevo_profesional->save()){
            $mensaje = '';
            $req->id_profesional = $nuevo_profesional->id;
            $datos['estado'] = 1;
            $datos['msj'] = 'Profesional guardado correctamente';

            $user = User::where('email', $nuevo_profesional->email)->first();
            if($user == NULL)
            {
                $user = new User();
                $user->name = $nuevo_profesional->nombre.' '.$nuevo_profesional->apellido_uno.' '.$nuevo_profesional->apellido_dos;
                $user->email = $nuevo_profesional->email;
                $temp_pass = rand(1111,9999);
                $user->password = Hash::make($temp_pass);
                if ($user->save()){
                    $user->assignRole('Profesional');
                    // $invitacion->procesado = 1;
                    // $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                    // $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                    // $invitacion->id_user_invitado = $user->id;
                    // $invitacion->estado = 0;
                    $nuevo_profesional->id_usuario = $user->id;
                    if($nuevo_profesional->save())
                    {
                        $mensaje .= 'Profesional '.$nuevo_profesional->nombre.' '.$nuevo_profesional->apellido_uno.' '.$nuevo_profesional->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$institucion->nombre.'. <br/>';


                        /** envio de correo de confirmacion  */
                        $blade = 'profesional_usuario_creado';
                        $to = array(
                                array('email' => $nuevo_profesional->email,'name' => $nuevo_profesional->nombre.' '.$nuevo_profesional->apellido_uno.' '.$nuevo_profesional->apellido_dos),
                            );
                        $cc = array();
                        $bcc = array();
                        $asunto = 'MED-SDI - Bienvenido!';
                        $body = array(
                            'nombre'=>$nuevo_profesional->nombre.' '.$nuevo_profesional->apellido_uno.' '.$nuevo_profesional->apellido_dos,
                            'user' => $nuevo_profesional->email,
                            'pass' => $temp_pass,
                        );
                        $archivo = '';/** pendiente */
                        $id_institucion = '';

                        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                        if($result_mail['estado'])
                        {
                            $mensaje .= 'Usuario creado con exito.<br/>';
                            $mensaje .= 'Recibirá un correo de Bienvenida con la información de acceso al sistema. <br/>';
                        }
                        else
                        {
                            $mensaje .= 'Usuario creado con exito.<br/>';
                            $mensaje .= 'Correo de Bienvenida con la información de acceso al sistema con problema para envío. <br/>';
                        }

                        $mensaje .= 'Deberá completar su perfil en el escritorio asignado. <br/>';
                    }
                    else
                    {
                        $mensaje .= 'Profesional '.$nuevo_profesional->nombre.' '.$nuevo_profesional->apellido_uno.' '.$nuevo_profesional->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$nuevo_profesional->LugarAtencion()->first()->nombre.'. <br/>';
                        $mensaje .= 'Usuario creado con exito.<br/>';
                        $mensaje .= 'Recibirá un correo con la información de acceso al sistema. <br/>';
                        $mensaje .= 'Deberá completar su perfil en el escritorio asignado. <br/>';
                        $mensaje .= 'Invitacion no actualizada. <br/>';
                    }
                }
                else
                {
                    $mensaje .= 'Se presento un problema al generar su Usuario, intente nuevamente. <br/>';
                }
            }
            else
            {
                $mensaje .= 'El correo "'.$nuevo_profesional->email.'" ya esta siendo utilizado o su usuario ya ha sido creado. <br/>';
            }

        }else{
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al guardar el profesional';

            return $datos;
        }

        $valido = 1;

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


            $profesionales = Profesional::where('id', $req->id_profesional)->first();
          
            if($profesionales)
            {
                $req->id_lugar_atencion = 12;
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
                $resultado = InvitacionController::registroInvtacionProfesional($req->id_lugar_atencion, $rut, $nombre, $apellido_uno, $apellido_dos, $telefono, $email, $id_especialidad, $id_tipo_especialidad, $id_sub_tipo_especialidad, $id_user_solicitud, $id_user_invitado, '0');
             
                if($resultado->estado == 1)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'profesional invitado';

                    /** GENERAR PROFESIONAL INSTITUCION CONVENIO */
                    $registro_prof_inst_conv = ProfesionalInstitucionConvenioController::registrar($resultado->last_id, $profesionales->id, $institucion->id, $req->id_lugar_atencion, $req->id_tipo_convenio_institucion, $req->fijo, $req->atencion, $req->confirmacion_agenda, $req->ggcc, $req->box,'','', $req->observacion);
                   
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

    public function invitarPersonalReemplazo(Request $req){
   
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($req->id_profesional_reemplazo))
        {
            $error['id_profesional_reemplazo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($req->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($req->id_tipo_convenio_institucion))
        {
            $error['id_tipo_convenio_institucion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido) 
        {
            $nuevo_profesional = new PersonalReemplazoServicio();
            $nuevo_profesional->id_profesional = $req->id_profesional_reemplazo;
            $nuevo_profesional->id_lugar_atencion = $req->id_lugar_atencion;
            $nuevo_profesional->estado = 1;
            
            
            $req->fijo = 10;
            $req->atencion = 0; 
            $req->confirmacion_agenda = 1; 
            $req->ggcc = 10;
            $req->box = 1;
            $req->observacion = 'observacion';

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
    
    
                $profesionales = Profesional::where('id', $req->id_profesional_reemplazo)->first();
              
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
                    $resultado = InvitacionController::registroInvtacionProfesional($req->id_lugar_atencion, $rut, $nombre, $apellido_uno, $apellido_dos, $telefono, $email, $id_especialidad, $id_tipo_especialidad, $id_sub_tipo_especialidad, $id_user_solicitud, $id_user_invitado, '0');
                 
                    if($resultado->estado == 1)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'profesional invitado';
    
                        /** GENERAR PROFESIONAL INSTITUCION CONVENIO */
                        $registro_prof_inst_conv = ProfesionalInstitucionConvenioController::registrar($resultado->last_id, $profesionales->id, $institucion->id, $req->id_lugar_atencion, $req->id_tipo_convenio_institucion, $req->fijo, $req->atencion, $req->confirmacion_agenda, $req->ggcc, $req->box,'','', $req->observacion);
                       
                        $datos['registro_prof_inst_conv'] = $registro_prof_inst_conv;
    
                        if($registro_prof_inst_conv->estado == 1)
                        {
                            /** ENVIO NOTIFICACION */
                            $result_notificacion = ProfesionalInstitucionConvenioController::envioNotificacionConvenio(1, $resultado->last_id);
                            
                            $datos['notificacion'] = $result_notificacion;
                            //Despues de todo que este resuelto, guardamos la relacion profesional con el servicio
                            $nuevo_profesional->save();
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
        }else{
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function invitarPersonalReemplazo_(Request $req){
        
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($req->nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($req->rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($req->correo))
        {
            $error['correo'] = 'campo requerido';
            $valido = 0;
        }

        if($valido) 
        {
            $institucion = '';
            $tipo_institucion = 1;
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

            if($registro){
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';
            }else{
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro){
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }else{
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();
                    if($responsable){
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro){
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';
                        }else{
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro){
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }else{
                                $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                        ->where('id_empleado', $responsable->id)
                                        ->whereIn('estado', [2,3])
                                        ->first();
                                if($result_contrato){
                                    $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                    if($registro){
                                        $institucion = $registro;
                                        $tipo_institucion = 'institucion';
                                    }else{
                                        $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                        if($registro){
                                            $institucion = $registro;
                                            $tipo_institucion = 'servicio';
                                        }else{
                                            return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }else{
                                    return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }else{
                        return back()->with('error','Institución no encontrada');
                    }
                }
            }

            $nuevo_profesional = new ProfesionalReemplazo();
            $nuevo_profesional->nombre = $req->nombre;
            $nuevo_profesional->apellido_uno = $req->apellido_paterno;
            $nuevo_profesional->apellido_dos = $req->apellido_materno;
            $nuevo_profesional->rut = $req->rut;
            $nuevo_profesional->email = $req->correo;
            $nuevo_profesional->telefono_uno = $req->contacto;
            $nuevo_profesional->telefono_dos = $req->contacto_;
            $nuevo_profesional->id_especialidad = 1;
            $nuevo_profesional->id_tipo_especialidad = 1;
            $nuevo_profesional->id_sub_tipo_especialidad = 1;
            $nuevo_profesional->id_usuario = 1;
            $nuevo_profesional->id_direccion = 1;
            $nuevo_profesional->sexo = $req->sexo;
            
            
            if($nuevo_profesional->save()){
                // crear al nuevo usuario en la tabla user
                $user = User::where('email', $nuevo_profesional->email)->first();
                if($user == NULL){
                    $user = new User();
                    $user->name = $nuevo_profesional->nombre.' '.$nuevo_profesional->apellido_uno.' '.$nuevo_profesional->apellido_dos;
                    $user->email = $nuevo_profesional->email;
                    $temp_pass = rand(1111,9999);
                    $user->password = Hash::make($temp_pass);
                   
                    if ($user->save()){
                        try {
                            $user->assignRole('Profesional');
                            $nuevo_profesional->id_usuario = $user->id;
                            if($nuevo_profesional->save()){
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Profesional guardado correctamente';
                                $datos['user'] = $user;
                                $datos['temp_pass'] = $temp_pass;
                            }else{
                                $datos['estado'] = 0;
                                $datos['msj'] = 'Error al guardar el profesional';
                            }
                        } catch (\Exception $e) {
                            //throw $th;
                            return $e->getMessage();
                        }
                        
                    }else{
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Error al guardar el profesional';
                    }
                    $id_user_invitado = $user->id;
                    $resultado = InvitacionController::registroInvtacionProfesionalInvitado($req->id_lugar_atencion, $nuevo_profesional->rut, $nuevo_profesional->nombre, $nuevo_profesional->apellido_uno, $nuevo_profesional->apellido_dos, $nuevo_profesional->telefono_uno, $nuevo_profesional->email, $nuevo_profesional->id_especialidad, $nuevo_profesional->id_tipo_especialidad, $nuevo_profesional->id_sub_tipo_especialidad, Auth::user()->id, $id_user_invitado, 1);
                    if($resultado->estado == 1){
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Profesional guardado correctamente';

                        /** GENERAR PROFESIONAL INSTITUCION CONVENIO */
                        $registro_prof_inst_conv = ProfesionalInstitucionConvenioController::registrar($resultado->last_id, $nuevo_profesional->id, $institucion->id, $req->id_lugar_atencion, $req->id_tipo_convenio_institucion, $req->fijo, $req->atencion, $req->confirmacion_agenda, $req->ggcc, $req->box,'','', $req->observacion);
                    
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
                    }else{
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Error al guardar el profesional';
                    }

            }else{
                $datos['estado'] = 0;
                $datos['msj'] = 'Error al guardar el profesional';
            }
        }else{
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }
}

    public function guardarPersonalReemplazo(Request $req){
     
        $datos = array();
        $error = array();
        $valido = 1;

        // if(empty($req->id_servicio_interno))
        // {
        //     $error['id_servicio_interno'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($req->id_asistente))
        // {
        //     $error['id_asistente'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($req->nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($req->rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($req->correo))
        {
            $error['correo'] = 'campo requerido';
            $valido = 0;
        }

        if($valido) 
        {
            $nuevo_profesional = new PersonalReemplazoServicio();
            $nuevo_profesional->nombre = $req->nombre;
            $nuevo_profesional->apellido_uno = $req->apellido_materno_reemplazo;
            $nuevo_profesional->apellido_dos = $req->apellido_paterno_reemplazo;
            $nuevo_profesional->rut = $req->rut;
            $nuevo_profesional->email = $req->correo;
            $nuevo_profesional->telefono_uno = $req->contacto;
            $nuevo_profesional->telefono_dos = $req->contacto_;
            $nuevo_profesional->id_especialidad = 1;
            $nuevo_profesional->id_tipo_especialidad = 1;
            $nuevo_profesional->id_sub_tipo_especialidad = 1;
            $nuevo_profesional->id_usuario = 1;
            $nuevo_profesional->id_direccion = 1;
            $nuevo_profesional->sexo = $req->sexo_reemplazo;
            $nuevo_profesional->certificado = 3;
            
            if($nuevo_profesional->save()){
                $datos['estado'] = 1;
                $datos['msj'] = 'Profesional guardado correctamente';
            }else{
                $datos['estado'] = 0;
                $datos['msj'] = 'Error al guardar el profesional';
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

    public function boxAlerta(){
        $boxEnAlerta = BoxAtencionServicio::where('estado', 1)->where('alerta', 1)->get();
        foreach($boxEnAlerta as $box){
            $box->descripcion = $box->tipo_box.' '.$box->numero_box;
        }

        return $boxEnAlerta;
    }
}
