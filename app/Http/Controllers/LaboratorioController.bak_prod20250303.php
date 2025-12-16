<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminInstServ;
use App\Models\AdminMed;
use App\Models\AreasCm;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\AsistenteTipo;
use App\Models\Bancos;
use App\Models\TipoAreasCm;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Ciudad;
use App\Models\ContratoDependiente;
use App\Models\ContratoDependienteProfesional;
use App\Models\ContratoConvenioProfesional;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\EspecialidadesCm;
use App\Models\Instituciones;
use App\Models\Laboratorio;
use App\Models\LiquidacionRecibo;
use App\Models\LugarAtencion;
use App\Models\MensajesDifusion;
use App\Models\MensajesProfesional;
use App\Models\Mensajes;
use App\Models\Paciente;
use App\Models\ProcedimientosCentro;
use App\Models\Profesional;
use App\Models\ProfesionalConvenio;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalInstitucionConvenio;
use App\Models\Remuneraciones;
use App\Models\Roles;
use App\Models\Servicios;
use App\Models\ServiciosInternos;
use App\Models\TipoAdministrador;
use App\Models\TipoConvenioInstitucion;
use App\Models\TipoEspecialidad;
use App\Models\SubTipoEspecialidad;
use App\Models\Sucursal;
use App\Models\TipoInstitucion;
use App\Models\User;

use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class LaboratorioController extends Controller
{
    /** ADMINISTRACION GENERAL  */
    public function home(){
        return view('app.laboratorio.adm_general.home');
    }
    public function adm_laboratorio(){
        return view('app.laboratorio.adm_general.admin_laboratorio');
    }
	 public function adm_laboratorio_local(){
        return view('app.laboratorio.administrador_local.administracion_admin');
    }
     public function asistentes_laboratorio(){
        return view('app.laboratorio.adm_general.asistentes_laboratorio');
    }

    public function perfil_admin(){
        return view('app.laboratorio.adm_general.perfil_admin');
    }
	public function perfil_laboratorio(){
        return view('app.laboratorio.adm_general.perfil_laboratorio');
    }

    public function sucursales_laboratorio(){
        return view('app.laboratorio.adm_general.sucursales_laboratorio');
    }
    public function admin_laboratorio(){
        return view('app.laboratorio.adm_general.admin_laboratorio');
    }
    public function administracion(){
        return view('app.laboratorio.adm_general.administracion');
    }
    public function administracion_agregar_asistente(){
        return view('app.laboratorio.adm_general.asistentes_laboratorio');
    }
    public function gastos_laboratorio_admin(){
        return view('app.laboratorio.adm_general.gastos_laboratorio_admin');
    }
    public function inventario_laboratorio_admin(){
        return view('app.laboratorio.adm_general.inventario_laboratorio_admin');
    }
    public function lista_exam(){
        return view('app.laboratorio.adm_general.lista_exam');
    }
    public function personal_laboratorio(){
        return view('app.laboratorio.adm_general.personal_laboratorio');
    }
    public function profesionales_laboratorio(){
        return view('app.laboratorio.adm_general.profesionales_laboratorio');
    }
    public function proveedores_laboratorio_admin(){
        return view('app.laboratorio.adm_general.proveedores_laboratorio_admin');
    }
    public function suscripcion_pago_laboratorio(){
        return view('app.laboratorio.adm_general.suscripcion_pago_laboratorio');
    }

    /** ADMINISTRACION LOCAL  */
    public function perfil_administrador_local(){
        return view('app.laboratorio.administrador_local.perfil_admin');
    }
    public function adm_local_laboratorio(){
        return view('app.laboratorio.administrador_local.administracion_admin');
    }
    public function asistente_laboratorio_Local(){
        return view('app.laboratorio.administrador_local.asistentes_laboratorio');
    }
    public function profesional_laboratorio_local(){
        return view('app.laboratorio.administrador_local.profesionales_laboratorio');
    }
    public function inventario_lab_local(){
        return view('app.laboratorio.administrador_local.inventario_laboratorio_admin');
    }
    public function examenes_agregar_local(){
        return view('app.laboratorio.administrador_local.lista_exam');
    }
    public function proveedores_laboratorio_local(){
        return view('app.laboratorio.administrador_local.proveedores_laboratorio_admin');
    }
    public function sucursales_laboratorio_local(){
        return view('app.laboratorio.administrador_local.sucursales_laboratorio');
    }
    public function gastos_laboratorio_local(){
        return view('app.laboratorio.administrador_local.gastos_laboratorio_admin');

    }
    public function sub_administracion_laboratorio(){
        return view('app.laboratorio.administrador_local.subadmin_laboratorio');
    }

    public function suscripcion_laboratorio_local(){
        return view('app.laboratorio.administrador_local.suscripcion_pago_laboratorio');
    }

    /** ASISTENTE LABORATORIO  */
    public function perfil_asistente(){
        return view('app.laboratorio.lab_asistente.perfil');
    }
    public function agenda_laboratorio(){
        return view('app.laboratorio.lab_asistente.agenda_laboratorio');
    }
    public function cotizar_laboratorio(){
        return view('app.laboratorio.lab_asistente.cotizar_laboratorio');
    }
    public function orden_laboratorio(){
        return view('app.laboratorio.lab_asistente.orden_laboratorio');
    }
    public function pacientes_laboratorio(){
        return view('app.laboratorio.lab_asistente.pacientes_laboratorio');
    }
    public function resultados_examenes_laboratorio(){
        return view('app.laboratorio.lab_asistente.resultados_examenes_laboratorio');
    }
    public function resultados_lab(){
        return view('app.laboratorio.lab_asistente.resultados_laboratorio');
    }
	public function escritorio_asistente_laboratorio(){
        return view('app.laboratorio.lab_asistente.escritorio_asistente_laboratorio');
    }


    /** ASISTENTE LABORATORIO SUBIR EXAMEN */
    public function perfil_asistente_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.perfil');
    }

    public function agenda_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.agenda_laboratorio');
    }

    public function cotizar_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.cotizar_laboratorio');
    }

    public function orden_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.orden_laboratorio');
    }

    public function pacientes_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.pacientes_laboratorio');
    }

    public function resultados_examenes_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.resultados_examenes_laboratorio');
    }

    public function cargar_resultados_examenes_laboratorio_subir_examan()
    {
        $tipo_examen = ExamenMedico::where('cod_parent', 0)->get();

        return view('app.laboratorio.lab_asistente_subir_examen.cargar_resultados_examenes_laboratorio')->with([
            'tipo_examen' => $tipo_examen,
        ]);
    }

    public function registrar_resultados_examenes_laboratorio_subir_examan(Request $request)
    {
        return ResultadoExamenController::registrar($request->id_lugar_atencion, $request->id_institucion, $request->tipo_examen, $request->id_paciente, $request->rut, $request->nombre, $request->apellido_paterno, $request->apellido_materno, $request->email, $request->observacion, '', $request->lista_examen,  '', '', '');
    }

    public function resultados_lab_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.resultados_laboratorio');
    }

	public function escritorio_asistente_laboratorio_subir_examan(){
        return view('app.laboratorio.lab_asistente_subir_examen.escritorio_asistente_laboratorio');
    }


    /** PROFESIONALES LABORATORIO  */
    public function perfil_profesional(){
        return view('app.laboratorio.lab_profesional.perfil');
    }
    public function escritorio_profesional_laboratorio(){
        return view('app.laboratorio.lab_profesional.escritorio_profesional_laboratorio');
    }
    public function gastos_laboratorio(){
        return view('app.laboratorio.lab_profesional.gastos_laboratorio');
    }
    public function inventario_laboratorio(){
        return view('app.laboratorio.lab_profesional.inventario_laboratorio');
    }
    public function pacientes_laboratoriop(){
        return view('app.laboratorio.lab_profesional.pacientes_laboratorio');
    }
    public function procesos_laboratorio(){
        return view('app.laboratorio.lab_profesional.procesos_laboratorio');
    }
    public function proveedores_laboratorio(){
        return view('app.laboratorio.lab_profesional.proveedores_laboratorio');
    }
    public function recepcion_muestras(){
        return view('app.laboratorio.lab_profesional.recepcion_muestras');
    }
    public function resultados(){
        return view('app.laboratorio.lab_profesional.resultados');
    }
    public function solicitud_exam_laboratorio_profesional(){
        return view('app.laboratorio.lab_profesional.solicitud_exam_laboratorio_profesional');
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
        // if(empty($request->id_institucion))
        // {
        //     $error['id_institucion'] = 'campo requerido';
        //     $valido = 0;
        // }
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

    public function buscar_profesional($id_profesional)
    {
        $datos = array();
        $profesional = Profesional::where('id', $id_profesional)->first();
        if($profesional)
        {
            $direccion_text = 'No Informada';
            if($profesional->id_direccion != '' || $profesional->id_direccion!=0)
            {
                $direccion = Direccion::where('id', $profesional->id_direccion)->first();
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
                if($registro->UsuarioAdministrador()->first())
                    $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                else
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

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
            $filtro[] = array('id_profesional', $profesional->id);
            // $filtro[] = array('estado', 2);
            $filtro[] = array('id_lugar_atencion', $LugarAtencion->id);

            $profesional->contrato = ContratoDependienteProfesional::where($filtro)->first();

            $profesional->direccion = Direccion::with('Ciudad')->find($profesional->id_direccion);


            if($profesional->contrato !== null){
                $profesional->especialidad = Especialidad::where('id',$profesional['contrato']['id_especialidad'])->first();
                $profesional->tipo_especialidad = TipoEspecialidad::where('id',$profesional['contrato']['id_tipo_especialidad'])->first();
                $profesional->sub_tipo_especialidad = SubTipoEspecialidad::where('id',$profesional['contrato']['id_subtipo_especialidad'])->first();
            }else{
                $profesional->contrato = null;
            }

            $liquidacion = LiquidacionRecibo::where('id_seccion',$profesional->id)->get();

        $liqui_principal = 0;

        if($liquidacion)
        foreach ($liquidacion as $key => $value)
        {
            $id_banco = decrypt($value->casa);
            $banco = Bancos::select('id', 'nombre')->where('id',$id_banco)->first();
            $liquidacion[$key]->banco = $banco;
            if($value->serie!='')
                $liquidacion[$key]->serie  = decrypt($value->serie);
            if($value->autor!='')
                $liquidacion[$key]->autor = decrypt($value->autor);
            if($value->casa!='')
                $liquidacion[$key]->casa = decrypt($value->casa);
            if($value->numero_control!='')
                $liquidacion[$key]->numero_control = decrypt($value->numero_control);
            if($value->email!='')
                $liquidacion[$key]->email = decrypt($value->email);
            if($value->otro!='')
                $liquidacion[$key]->otro = decrypt($value->otro);
            if($liqui_principal == 0 && $value->principal == 1)
                $liqui_principal = 1;
        }

            $convenios = ProfesionalConvenio::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$LugarAtencion->id)->get();

            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registro'] = $profesional;
            $datos['direccion'] = $direccion_text;
            $datos['convenios'] = $convenios;
            $datos['cuentas'] = $liquidacion;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }

        return $datos;
    }

    public function agregar_laboratorio(Request $request){
        try {
            // verificar si existe por el rut
            $laboratorio = Laboratorio::where('rut', $request->rut_laboratorio)->first();
            if(!$laboratorio){
                $laboratorio = new Laboratorio();
            }

            $laboratorio->nombre = $request->nombre_laboratorio;
            $laboratorio->rut = $request->rut_laboratorio;
            $laboratorio->email = $request->email_laboratorio;
            $laboratorio->telefono = $request->telefono_laboratorio;

            $institucion = Instituciones::find($request->id_institucion);
            $laboratorio->id_institucion = $institucion->id;
            $laboratorio->id_lugar_atencion = $institucion->id_lugar_atencion;

            /* DIRECCION */
            $existe_direccion = Direccion::where('direccion',$request->direccion_laboratorio)->where('numero_dir',$request->numero_laboratorio)->where('id_ciudad',$request->ciudad_laboratorio)->first();
            if($existe_direccion){
                $nueva_direccion = $existe_direccion;
                $laboratorio->id_direccion = $existe_direccion->id;
            }else{
                $nueva_direccion = new Direccion();
                $nueva_direccion->direccion = $request->direccion_laboratorio;
                $nueva_direccion->numero_dir = $request->numero_laboratorio;
                $nueva_direccion->id_ciudad = $request->ciudad_laboratorio;
                $nueva_direccion->save();

                $laboratorio->id_direccion = $nueva_direccion->id;
            }
            $laboratorio->id_tipo_laboratorio = $request->tipo_laboratorio;
            $laboratorio->ubicacion = $request->ubicacion;
            if($laboratorio->save()){
                $laboratorios = $this->dame_laboratorios($institucion->id);
                $v = view('fragm.laboratorios',[
                    'laboratorios' => $laboratorios
                ])->render();
                return ['estado' => 1, 'msj' => 'Laboratorio agregado correctamente', 'v' => $v];
            }else{
                return ['estado' => 0, 'msj' => 'Error al agregar laboratorio'];
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function dame_laboratorio($id){
        try {
            $laboratorio = Laboratorio::select('laboratorios.*','tipos_laboratorio.nombre as tipo_laboratorio','direcciones.direccion','direcciones.numero_dir','direcciones.id_ciudad')
                ->leftjoin('tipos_laboratorio','laboratorios.id_tipo_laboratorio','=','tipos_laboratorio.id')
                ->join('direcciones','laboratorios.id_direccion','=','direcciones.id')
                ->where('laboratorios.id',$id)
                ->first();

                $direccion = Direccion::where('id',$laboratorio->id_direccion)->first();
                $laboratorio->direccion = $direccion->direccion;
                $laboratorio->numero_dir = $direccion->numero_dir;
                $laboratorio->id_region = $direccion->ciudad->id_region;

            // buscar la ciudad de cada laboratorio por la direccion
            $ciudad = Ciudad::where('id',$laboratorio->id_ciudad)->first();
            $laboratorio->ciudad = $ciudad->nombre;
            return $laboratorio;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function editar_laboratorio(Request $request){
        try {
            $laboratorio = Laboratorio::find($request->id_laboratorio);
            $laboratorio->nombre = $request->nombre_laboratorio;
            $laboratorio->rut = $request->rut_laboratorio;
            $laboratorio->email = $request->email_laboratorio;
            $laboratorio->telefono = $request->telefono_laboratorio;
            $laboratorio->id_tipo_laboratorio = $request->tipo_laboratorio;
            $laboratorio->ubicacion = $request->ubicacion;
            $direccion = Direccion::where('id',$laboratorio->id_direccion)->first();
            $direccion->direccion = $request->direccion_laboratorio;
            $direccion->numero_dir = $request->numero_laboratorio;
            $direccion->id_ciudad = $request->ciudad_laboratorio;
            $direccion->save();
            $laboratorio->id_direccion = $direccion->id;
            if($laboratorio->save()){
                $laboratorios = $this->dame_laboratorios($request->id_institucion);
                $v = view('fragm.laboratorios',[
                    'laboratorios' => $laboratorios
                ])->render();
                return ['estado' => 1, 'msj' => 'Laboratorio editado correctamente', 'v' => $v];
            }else{
                return ['estado' => 0, 'msj' => 'Error al editar laboratorio'];
            }
        } catch (\Exception $e) {
            return ['estado' => 0, 'msj' => $e->getMessage()];
        }
    }

    public function eliminar_laboratorio(Request $request){
        try {
            $laboratorio = Laboratorio::find($request->id);
            $institucion = Instituciones::find($laboratorio->id_institucion);
            if($laboratorio->delete()){
                $laboratorios = $this->dame_laboratorios($institucion->id);
                $v = view('fragm.laboratorios',[
                    'laboratorios' => $laboratorios
                ])->render();
                return ['estado' => 1, 'msj' => 'Laboratorio eliminado correctamente', 'v' => $v];
            }else{
                return ['estado' => 0, 'msj' => 'Error al eliminar laboratorio'];
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
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

        return view('app.laboratorio.personal')->with([
            'responsable' => $responsable,
            'institucion' => $institucion,
            'tipo_institucion' => $tipo_institucion,
            'lista_asistente' => $lista_asistente,
            'lista_tipo_contrato' => (object)$lista_tipo_contrato,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
            'lista_tipo_asistente' => $lista_tipo_asistente,
            'adm_medico' => $adm_medico,
        ]);;
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

        $filtro_prodce  = array();
        $filtro_prodce[]  = array('id_lugar_atencion', $institucion->id_lugar_atencion);
        $filtro_prodce[]  = array('estado', 1);
        $procedimeintos = ProcedimientosCentro::where($filtro_prodce)->get();

        $sucursales = Sucursal::where('id_institucion', $institucion->id)
                        ->with('Direccion')
                        ->get();
        foreach ($sucursales as $key => $value)
        {
            $ciudad_suc = Ciudad::find($value->direccion->id_ciudad);
            $region_suc = Region::find($ciudad_suc->id_region);
            $sucursales[$key]->ciudadObj = $ciudad_suc;
            $sucursales[$key]->regionObj = $region_suc;
        }

        return view('app.laboratorio.configuracion')->with([
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
            'procedimeintos' => $procedimeintos,
            'sucursales' => $sucursales,

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

        return view('app.laboratorio.profesionales')->with([
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
            $url = 'app.laboratorio.pacientes'; // institucion
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


        $url = 'app.laboratorio.mis_profesionales'; // institucion
        $array_data = array(
            'lugares_atencion' => $LugarAtencion,
            'profesionales' => $profesionales,
        );

        return view($url, $array_data);
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

    public function areaComercial(Request $request)
    {
        return view('app.laboratorio.escritorio_adm_comercial');
    }

    public function dame_profesional(Request $req){
        $profesional = Profesional::where('id', $req->id)->first();
        return ['estado' => 1, 'profesional' => $profesional];
    }
}
