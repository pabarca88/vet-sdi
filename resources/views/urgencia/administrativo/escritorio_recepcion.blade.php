@extends('template.urgencia.template_asistente')
@section('content')
<!--Container Completo-->

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Recepción Urgencias</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('urgencia.adminstrativo.home') }}">Mi escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Buscador de pacientes-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="row">
                            <div class="col-md-12 align-botton">
                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Ingreso Pacientes</h4>
                                {{--
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#agregar_paciente_asistente">
                                    <i class="feather icon-plus"></i> Registrar Paciente
                                </button>
                                --}}
                            </div>
                        </div>
                    </div>
                    {{--  <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $lugares_atencion->id }}">  --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3 col-md-3">
                                {{--  <input class="form-control form-control-sm" type="text" name="busqueda_rut" id="busqueda_rut" placeholder="RUT" value="" oninput="formatoRut(this)">  --}}
                                <input class="form-control form-control-sm" type="text" name="busqueda_rut" id="busqueda_rut" placeholder="RUT" value="" oninput="formatoRut(this)">
                            </div>
                            {{--  <div class="col-sm-3 col-md-3">
                                <input class="form-control form-control-sm" type="text" name="busqueda_nombre" id="busqueda_nombre" placeholder="Nombre" value="">
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <input class="form-control form-control-sm" type="text" name="busqueda_apellido" id="busqueda_apellido" placeholder="Apellido" value="">
                            </div>  --}}
                            <div class="col-sm-3 col-md-3">
                                <button type="button" class="btn btn-info btn-sm has-ripple" onclick="buscar_paciente_rut();">Buscar Paciente</button>
                            </div>
                        </div>




                        <div id="form_reseva_de_horas">

                            {{--  VISUALIZACION DE DATOS DEL PACIENTE  --}}
                            <div id="reserva_datos_paciente" class="row mx-3" style="display:none;">
                                <table class="table table-borderless table-xs">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <strong>Rut</strong>
                                            </th>
                                            <td><span id="reserva_rut_paciente"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Nombre</strong>
                                            </th>
                                            <td><span id="reserva_hora_nombre"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Fecha Nacimiento</strong>
                                            </th>
                                            <td><span id="reserva_fecha_nacimiento"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Sexo</strong>
                                            </th>
                                            <td><span id="reserva_sexo"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Convenio</strong>
                                            </th>
                                            <td><span id="reserva_convenio"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Dirección</strong>
                                            </th>
                                            <td><span id="reserva_direccion"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Correo Electrónico</strong>
                                            </th>
                                            <td id="reserva_hora_email"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Teléfono</strong>
                                            </th>
                                            <td><span id="reserva_hora_telefono"></span></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label">Motivo de la Urgencia</label>
                                        <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <h6 class="text-c-blue ml-2 mb-3">Avisar a contacto de Emergencia</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                                <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                                <label class="custom-control-label" for="sms">SMS</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 mb-3">
                                        <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-triage" onclick="agregarCategoria();" ><i class="fas fa-save"></i> Cargar Triage</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="contenedor_triage">
                                            <div id="categorizacion" class="row" style="display:none;">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-group">
                                                            <div class="tab-pane fade show " id="enf_asig_urg" role="tabpanel" aria-labelledby="enf_asig_urg_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-6 col-md-6 mb-3 m-t-10">
                                                                                                <H6><i class="feather icon-heart m-l-10"></i> Asignar Urgencia</H6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-md-1">

                                                                                            </div>


                                                                                            <div class="col-md-2">
                                                                                                <a href="#" >
                                                                                                    <div class="card bg-c order-card"style="background-color:#ff0000">
                                                                                                        <div class="card-body">
                                                                                                            <div class="row">
                                                                                                                <div class="col-6"><h3 class="text-white">2</h3></div>
                                                                                                                <div class="col-6"><p class="text-white m-b-0">Ver<i class="feather icon-arrow-up m-l-10"></i></p></div>
                                                                                                            </div>
                                                                                                            <i class="card-icon feather icon-heart"></i>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>

                                                                                            <div class="col-md-2">
                                                                                                <a href="#" >
                                                                                                <div class="card bg-c order-card" style="background-color:#F46732">
                                                                                                    <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-6"><h3 class="text-white">5</h3></div>
                                                                                                        <div class="col-6"><p class="text-white m-b-0">Ver<i class="feather icon-arrow-up m-l-10"></i></p></div>
                                                                                                    </div>
                                                                                                        <i class="card-icon feather icon-heart"></i>
                                                                                                    </div>
                                                                                                </div>
                                                                                                 </a>
                                                                                            </div>
                                                                                            <div class="col-md-2">
                                                                                            <a href="#" >
                                                                                                <div class="card bg-c order-card" style="background-color:#F6F92C">
                                                                                                    <div class="card-body">
                                                                                                        <div class="row">
                                                                                                            <div class="col-6"><h3 class="text-white">8</h3></div>
                                                                                                            <div class="col-6"><p class="text-white m-b-0">Ver<i class="feather icon-arrow-up m-l-10"></i></p></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                             </a>
                                                                                            </div>
                                                                                            <div class="col-md-2">
                                                                                                <a href="#" >
                                                                                                <div class="card bg-c-green order-card">
                                                                                                    <div class="card-body">
                                                                                                        <h2 class="text-white">0</h2>
                                                                                                        <i class="card-icon feather icon-heart"></i>
                                                                                                    </div>
                                                                                                </div>
                                                                                                 </a>
                                                                                            </div>

                                                                                            <div class="col-md-2">
                                                                                            <a href="#" >
                                                                                                <div class="card bg-c-blue order-card">
                                                                                                    <div class="card-body">
                                                                                                        <h2 class="text-white">2</h2>
                                                                                                        <i class="card-icon feather icon-heart"></i>
                                                                                                    </div>
                                                                                                </div>
                                                                                                 </a>
                                                                                            </div>
                                                                                            <div class="col-md-1">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--  FORMULARIO DE PACIENTE NUEVO  --}}
                            <div id="reserva_agregar_paciente_hora" style="display:none;">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="alert alert-danger" role="alert">
                                            Paciente no registrado, complete los datos para registrar al paciente
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Nombres</label>
                                            <input type="text" required class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Primer Apellido</label>
                                            <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Segundo Apellido</label>
                                            <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">F. Nacimiento</label>
                                            <input type="date" class="form-control form-control-sm" name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Sexo</label>
                                            <select id="reserva_hora_sexo" name="reserva_hora_sexo" class="form-control form-control-sm">
                                                <option value="0">Selecione una opci&oacute;n</option>
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                            <select id="reserva_hora_profesion" name="reserva_hora_profesion" class="form-control form-control-sm">
                                                <option value="0">Selecione una opci&oacute;n</option>
                                                @if (isset($profesion_oficio))
                                                    @foreach ($profesion_oficio as $prof_ofic)
                                                        <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                            <select id="reserva_hora_convenio" name="reserva_hora_convenio" class="form-control form-control-sm">
                                                <option value="0">Selecione una opci&oacute;n</option>
                                                @if (isset($prevision))
                                                    @foreach ($prevision as $p)
                                                        <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 col-md-9">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                            <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">N&uacute;mero</label>
                                            <input type="address" class="form-control form-control-sm" name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Region</label>
                                            <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control" required>
                                                <option value="0">Seleccione Regi&oacute;n</option>
                                                @if (isset($region))
                                                    @foreach ($region as $reg)
                                                        <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ciudad</label>
                                            <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                                <option value="0">Seleccione Ciudad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                            <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda()" name="reserva_hora_correo" id="reserva_hora_correo">
                                            <span id="mensaje_email_reserva" style="display:none"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                            <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Descrici&oacute;n Reserva</label>
                                            <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <h6 class="text-c-blue ml-2 mb-3">Avisar a contacto de Emergencia</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                                <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                                <label class="custom-control-label" for="sms">SMS</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger close_agenda_agregar_paciente"  data-dismiss="modal">Cancelar</button>
                                    <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();" class="btn btn-info">
                                        Tomar Hora
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal consulta agenda profesional-->
                        <div id="consulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="consulta" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <input type="hidden" name="estado_id_profesional" id="estado_id_profesional" value="">
                                    <input type="hidden" name="estado_id_paciente" id="estado_id_paciente" value="">
                                    <input type="hidden" name="id_hora_medica" id="id_hora_medica" value="">
                                    <div class="modal-header bg-info pt-3 pb-3">
                                        <h6 id="cabecera_hora_medica" class="text-white f-16 mb-0 mt-0">Información del paciente</h6>
                                    </div>
                                    <div class="modal-body">
                                        <form id="datos_hora_medica">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <table class="table table-borderless table-xs text-break table-responsive modal-agenda">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <strong>Rut</strong>
                                                                <td>
                                                                    <span id="datos_consulta_rut"></span>
                                                                </td>


                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <strong>Nombre</strong>
                                                                <td>
                                                                    <span id="datos_consulta_nombre"></span>
                                                                </td>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <strong>Fecha Nacimiento</strong>
                                                                <td>
                                                                    <span id="datos_consulta_edad"></span>
                                                                </td>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <strong>Sexo</strong>
                                                                <td>
                                                                    <span id="datos_consulta_sexo"></span>
                                                                </td>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </form>

                                        <form id="cancelacion_hora_medica">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">

                                                    <div class="form-group ">
                                                        <label class="floating-label">Comentarios</label>
                                                        <input type="text" class="form-control" id="cancelar_hora_comentario" name="cancelar_hora_comentario">
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                        <form id="confirmacion_hora_medica">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">

                                                    <div class="form-group ">
                                                        <label class="floating-label-activo-sm">Vía de Confirmación</label>
                                                        {{--  <input type="text" class="form-control" id="confirmar_hora_comentario" name="confirmar_hora_comentario">  --}}
                                                        <select class="form-control" name="confirmar_hora_comentario" id="confirmar_hora_comentario">
                                                            @if (isset($reg_confirmacion_hora))
                                                                @foreach ($reg_confirmacion_hora as $reg)
                                                                    <option value="{{ $reg->nombre }}">
                                                                        {{ $reg->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            @else
                                                                <option value="0">Seleccione</option>
                                                            @endif
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="modal-footer">

                                        <div>
                                            <button type="button" onclick="opcion_cancelar_hora();" id="hm_anular_hora" class="btn btn-danger btn-sm" data-dismiss="modal">
                                                Anular Hora
                                            </button>
                                        </div>

                                        <div>
                                            <button type="submit" onclick="opcion_confirmar_hora()" id="hm_confirmar_hora" class="btn btn-success btn-sm">
                                                Confirmar Hora
                                            </button>
                                        </div>


                                        <div>
                                            <button type="submit" id="hm_ver_hora" class="btn btn-info btn-sm">Ver Atención</button>
                                        </div>


                                        <div>

                                            <form method="get" action="{{ route('profesional.realizar_consulta') }}">
                                                @csrf
                                                <input type="hidden" name="id_hora_realizar" id="id_hora_realizar" val="">
                                                <input type="hidden" name="lugar_atencion_id" id="lugar_atencion_id" value="$('#agenda_lugar_atencion_asistente').val();">

                                                <button type="submit" id="hm_atender_hora" class="btn btn-info btn-sm">Atender</button>
                                            </form>
                                        </div>

                                        <div>
                                            <form method="get" action="#">
                                                @csrf
                                                <input type="hidden" name="id_hora_realizar" id="id_hora_realizar" val="">

                                                <button type="submit" id="hm_espera_paciente_hora" class="btn btn-info btn-sm"
                                                    onclick="paciente_esperando();">Esperando</button>
                                            </form>
                                        </div>

                                        <div>
                                            <button type="button" id="cerrarModal" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" id="confirmar_anulacion_hora" onclick="cancelar_hora();"
                                                class="btn btn-danger btn-sm">Anular
                                                Hora
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" id="confirmacion_hora" onclick="confirmar_hora();"
                                                class="btn btn-success btn-sm">Confirmar
                                                Hora
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- INICIO RECEPCION BONO  -->
                        <!--Modal Recepción de Bonos y programas-->
                        <div id="modal_recepcion_bonos_api" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Recepcion de bonos" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="modal_pago_consulta_title">Pago Consulta</h5>
                                        <button type="button" class="close close_modal_recepcion_bonos_api" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body pb-0">
                                        {{--  BOTONES  --}}
                                        <ul class="nav nav-pills mt-3 mb-4" id="pills-tab-bonos" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link-modal active" id="pills-tab-recibir-bono" data-toggle="pill" href="#pills-recibir-bono" role="tab" aria-controls="pills-home" aria-selected="true">Recibir Pago</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-modal" id="pills-venta-tab" data-toggle="pill" href="#pills-venta" role="tab" aria-controls="pills-venta" aria-selected="false">Venta de Bonos</a>
                                            </li>
                                        </ul>
                                        {{--  PESTAÑAS  --}}
                                        <div class="tab-content" id="pills-tabContent-interconsulta">
                                            {{--  PESTAÑA DE RECIBIR PAGO  --}}
                                            <div class="tab-pane fade show active" id="pills-recibir-bono" role="tabpanel" aria-labelledby="pills-tab-recibir-bono">
                                                <div class="form-row">
                                                    <input type="hidden" name="bono_hora_medica" id="bono_hora_medica">
                                                    <input type="hidden" name="bono_id_profesional" id="bono_id_profesional">
                                                    <input type="hidden" name="bono_id_paciente" id="bono_id_paciente">
                                                    <input type="hidden" name="bono_id_tipo_bono" id="bono_id_tipo_bono" value="1">
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Rut del Paciente</label>
                                                            <input type="person" class="form-control form-control-sm" name="bono_paciente_rut" id="bono_paciente_rut">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Nombre del Paciente</label>
                                                            <input type="text" class="form-control form-control-sm" name="bono_paciente_nombre" id="bono_paciente_nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm"> Nombre Profesional</label>
                                                            <input type="text" class="form-control form-control-sm" name="bono_profesional_nombre" id="bono_profesional_nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm"> Rut Profesional</label>
                                                            <input type="text" class="form-control form-control-sm" name="bono_profesional_rut" id="bono_profesional_rut">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Clase Pago</label>
                                                            <select id="bono_id_clase_bono" name="bono_id_clase_bono" class="form-control form-control-sm">
                                                                <option value="1">Bono Fisico</option>
                                                                <option value="2">Sencillito</option>
                                                                <option value="3">Caja Vecina</option>
                                                                <option value="4">Bono Web</option>
                                                                <option value="5">Bono Web Pre-Pago</option>
                                                                <option value="6">Particular</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Nº de bono o programa</label>
                                                            <input type="text" class="form-control form-control-sm" name="bono_numero" id="bono_numero" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Convenio</label>
                                                            <select id="bono_prevision" name="bono_prevision" class="form-control form-control-sm">
                                                                <option value="0">Selecione una opción</option>
                                                                {{--  @foreach ($prevision as $prev)
                                                                    <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
                                                                @endforeach  --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Valor total</label>
                                                            <input name="bono_valor_consulta" id="bono_valor_consulta" type="number" class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" id="recepcion_programa">
                                                                <label for="recepcion_programa" class="cr"></label>
                                                            </div>
                                                            <label>Recepción de programa</label>
                                                        </div>
                                                        <div class="form-group" id="sesiones_programa" style="display:none">
                                                            <label class="floating-label">Nº de Sesiones</label>
                                                            <input name="bono_sn_sesiones" id="bono_sn_sesiones" type="number" class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group text-center my-2 pb-2">
                                                            <div onclick="recepcion_pago();" class="btn btn-success">Recepcionar</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--  PESTAÑA DE VENTA DE BONO  --}}
                                            <div class="tab-pane fade" id="pills-venta" role="tabpanel" aria-labelledby="pills-venta-tab">
                                                <div class="form-row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Rut</label>
                                                            <input type="person" class="form-control form-control-sm" name="rut" id="rut">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Nº de serie carne</label>
                                                            <input type="text" class="form-control form-control-sm" name="serie" id="serie">
                                                            </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Nombre</label>
                                                            <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Previsión</label>
                                                            <select id="prevision" name="previsioon" class="form-control form-control-sm">
                                                                <option value="0">Selecione una opción</option>
                                                                {{--  @foreach ($prevision as $prev)
                                                                    <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
                                                                @endforeach  --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <button type="submit" onclick="conectar_api()"; class="btn btn-info btn-sm has-ripple">Pedir Autorización</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Folio</label>
                                                            <input type="number" class="form-control form-control-sm" name="folio" id="folio">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Valor Bono</label>
                                                            <input type="number" class="form-control form-control-sm" name="valor_consulta" id="valor_consulta">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Valor Bonificación</label>
                                                            <input type="number" class="form-control form-control-sm" name="valor_pagar" id="valor_pagar">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Aporte Seguro</label>
                                                            <input type="number" class="form-control form-control-sm" name="valor_seguro" id="valor_seguro">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Valor a pagar</label>
                                                            <input type="number" class="form-control form-control-sm" name="valor_copago" id="valor_copagp">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <button type="submit" class="btn btn-info btn-sm has-ripple left-0">Pagar Atención Médica</button>
                                                            {{--  <button type="button" class="btn btn-danger btn-sm has-ripple " data-dismiss="modal">Cerrar</button>  --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill text-left">
                                                            {{--  <button type="submit" class="btn btn-info btn-sm has-ripple">Pagar Atención Médica</button>  --}}
                                                            <button type="button" class="btn btn-danger btn-sm has-ripple " data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIN RECEPCION BONO  -->

                        {{--  <!-- MODAL AGREGAR HORA MEDICA -->
                        <div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info pt-3 pb-2">
                                        <h5 class="modal-title text-white text-center">Tomar hora</h5>
                                        <button id="cerrar_tomar_hora" type="button" class="close text-white close_agenda_agregar_paciente" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <h6 class="text-c-blue ml-2 mb-3">Ingrese el rut del paciente</h6>
                                                </div>
                                            </div>
                                        </div>

                                        {{- -  BUSCADOR DE RUT  - -}}
                                        <div class="row div_rut_buscar">
                                            <div class="col-sm-8 col-md-8 mb-3">
                                                <form id="validacion_rut_form">
                                                    <div class="form-group" id="validacion_rut_div">
                                                        <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-4 col-md-4 mb-3">
                                                <button class="btn btn-info" onclick="buscar_paciente();" type="button" id="button-addon2">
                                                    Buscar
                                                </button>
                                            </div>
                                        </div>



                                        <form id="form_reseva_de_horas">
                                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" id="fecha_consulta" name="fecha_consulta" value="">
                                            <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">
                                            <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="$('#agenda_lugar_atencion_asistente').val();">
                                            <input type="hidden" name="fecha" id="fecha">

                                            {{- -  VISUALIZACION DE DATOS DEL PACIENTE  - -}}
                                            <div id="reserva_datos_paciente" class="row mx-3">
                                                <table class="table table-borderless table-xs">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Rut</strong>
                                                            </th>
                                                            <td><span id="reserva_rut_paciente"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Nombre</strong>
                                                            </th>
                                                            <td><span id="reserva_hora_nombre"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Fecha Nacimiento</strong>
                                                            </th>
                                                            <td><span id="reserva_fecha_nacimiento"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Sexo</strong>
                                                            </th>
                                                            <td><span id="reserva_sexo"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Convenio</strong>
                                                            </th>
                                                            <td><span id="reserva_convenio"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Dirección</strong>
                                                            </th>
                                                            <td><span id="reserva_direccion"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Correo Electrónico</strong>
                                                            </th>
                                                            <td id="reserva_hora_email"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Teléfono</strong>
                                                            </th>
                                                            <td><span id="reserva_hora_telefono"></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label">Descripción Reserva</label>
                                                        <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger close_agenda_agregar_paciente" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" onclick="agendar_hora();" class="btn btn-info">Agendar Hora</button>

                                                </div>
                                            </div>

                                            {{- -  FORMULARIO DE PACIENTE NUEVO  - -}}
                                            <div id="reserva_agregar_paciente_hora">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="alert alert-danger" role="alert">
                                                            Paciente no registrado, complete los datos para registrar al paciente
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Nombres</label>
                                                            <input type="text" required class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Primer Apellido</label>
                                                            <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                            <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                            <input type="date" class="form-control form-control-sm" name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Sexo</label>
                                                            <select id="reserva_hora_sexo" name="reserva_hora_sexo" class="form-control form-control-sm">
                                                                <option value="0">Selecione una opci&oacute;n</option>
                                                                <option value="F">Femenino</option>
                                                                <option value="M">Masculino</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                                            <select id="reserva_hora_profesion" name="reserva_hora_profesion" class="form-control form-control-sm">
                                                                <option value="0">Selecione una opci&oacute;n</option>
                                                                @if (isset($profesion_oficio))
                                                                    @foreach ($profesion_oficio as $prof_ofic)
                                                                        <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                                            <select id="reserva_hora_convenio" name="reserva_hora_convenio" class="form-control form-control-sm">
                                                                <option value="0">Selecione una opci&oacute;n</option>
                                                                @if (isset($prevision))
                                                                    @foreach ($prevision as $p)
                                                                        <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9 col-md-9">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                            <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">N&uacute;mero</label>
                                                            <input type="address" class="form-control form-control-sm" name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Region</label>
                                                            <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control" required>
                                                                <option value="0">Seleccione Regi&oacute;n</option>
                                                                @if (isset($region))
                                                                    @foreach ($region as $reg)
                                                                        <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Ciudad</label>
                                                            <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                                                <option value="0">Seleccione Ciudad</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                            <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda()" name="reserva_hora_correo" id="reserva_hora_correo">
                                                            <span id="mensaje_email_reserva" style="display:none"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                            <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno">
                                                        </div>
                                                    </div>

                                                    {{- -  <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Descrici&oacute;n Reserva</label>
                                                            <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                                        </div>
                                                    </div>  - -}}
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <h6 class="text-c-blue ml-2 mb-3">Avisar a contacto de Emergencia/h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                                                <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                                                <label class="custom-control-label" for="sms">SMS</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger close_agenda_agregar_paciente"  data-dismiss="modal">Cancelar</button>
                                                    <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();" class="btn btn-info">
                                                        Tomar Hora
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>  --}}

                        @include('app.asistente.modales.m_esperando_api')
                        <!-- FIN MODAL AGREGAR HORA MEDICA -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cierre: Container Completo-->
@endsection



<script>

    /* Ponemos "agregarPieza" en el ámbito de toda la página */
    function agregarCategoria(){
        $('#categorizacion').show();
        {{--  var html = '';  --}}
        {{--  html += '<div id="categorizacion" class="row">';
        html += '    <div class="form-row">';
        html += '        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Pieza N°este boton</label>';
        html += '                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">';
        html += '            </div>';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="form-row">';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Resp.Calor</label>';
        html += '                <select id="sel_endo_resp_calor" name="sel_endo_resp_calor" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Resp.Frio</label>';
        html += '                <select id="sel_endo_resp_frio" name="sel_endo_resp_frio" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Eléctrico</label>';
        html += '                <select id="sel_endo_resp_elect" name="sel_endo_resp_elect" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Percusión</label>';
        html += '                <select id="sel_endo_resp_perc" name="sel_endo_resp_perc" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Exploración</label>';
        html += '                <select id="sel_endo_resp_expl" name="sel_endo_resp_expl" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Cavitaria</label>';
        html += '                <select id="sel_endo_cavitaria" name="sel_endo_cavitaria" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '       ';
        html += '    </div>';
        html += '</div>';  --}}

        {{--  $('#contenedor_triage').append(html);  --}}
    }

    function buscar_paciente_rut()
    {
        let rut = $('#busqueda_rut').val();
        let url = "{{ route('urgencia.buscar_rut_paciente') }}";

        $.ajax({

                url: url,
                type: "get",
                data: {
                    rut: rut,
                },
            })
            .done(function(data) {


                if (data !== 'null') {

                    data = JSON.parse(data);
                    if(data.tipo_paciente == 'SI')
                    {
                        {{--  console.log(data);  --}}
                        $('#reserva_datos_paciente').show();
                        $('#reserva_agregar_paciente_hora').hide();
                        $('#reserva_hora_id_paciente').val(data.id);
                        $('#reserva_rut_paciente').text(data.rut);
                        $('#reserva_hora_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
                        $('#reserva_fecha_nacimiento').text(data.fecha_nac);
                        if (data.sexo == 'M') {
                            $('#reserva_sexo').text('Masculino');
                        } else {
                            $('#reserva_sexo').text('Femenino');
                        }
                        $('#reserva_hora_email').text(data.email);
                        $('#reserva_hora_telefono').text(data.telefono_uno);

                        $('#reserva_convenio').text(data.prevision.nombre);
                        $('#reserva_direccion').text(data.direccion.direccion+' '+data.direccion.numero_dir+', '+data.direccion.ciudad.nombre);

                        $('#busqueda_rut').val('');
                        $('.div_rut_buscar').hide();
                    }
                    else
                    {
                        $('#reserva_datos_paciente').hide();
                        $('#reserva_agregar_paciente_hora').show();

                        $('#reserva_hora_nombres_paciente').val(data.nombres);
                        $('#reserva_hora_apellido_uno').val(data.apellido_uno);
                        $('#reserva_hora_apellido_dos').val(data.apellido_dos);
                        $('#reserva_hora_fecha_nac').val(data.fecha_nac);
                        if(data.sexo != null)
                            $('#reserva_hora_sexo').val(data.sexo);
                        else
                            $('#reserva_hora_sexo').val(0);


                        $('#reserva_hora_correo').val(data.email);
                        $('#region_agregar').val(data.direccion.ciudad.id_region);
                        buscar_ciudad(data.direccion.id_ciudad);
                        $('#reserva_hora_direccion').val(data.direccion.direccion);
                        $('#reserva_hora_numero_dir').val(data.direccion.numero_dir);

                        $('#reserva_hora_telefono_uno').val(data.telefono_uno);

                        {{--
                        $('#reserva_hora_profesion').val();
                        $('#reserva_hora_convenio').val();
                        $('#reserva_hora_descripcion').val();
                        --}}
                    }

                } else {
                    $('#reserva_datos_paciente').hide();
                    $('#reserva_agregar_paciente_hora').show();

                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    };

    /** FORMATEO DE RUT */
    function formatoRut(rut)
    {
        var valor = rut.value.replace('.','');
        valor = valor.replace('-','');
        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        rut.value = cuerpo + '-'+ dv

        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

        suma = 0;
        multiplo = 2;

        for(i=1;i<=cuerpo.length;i++)
        {
            index = multiplo * valor.charAt(cuerpo.length - i);
            suma = suma + index;
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
        }

        dvEsperado = 11 - (suma % 11);
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;

        if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

        rut.setCustomValidity('');
    }
</script>
