@extends('template.profesional.template')
@section('page-styles')
    <link href='{{ asset('js/fullcalendar-5.10.1/lib/main.css') }}' rel='stylesheet'/>

     <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">

    <style>
        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar {
            max-width: 900px;
            margin: 40px auto;
        }

        /* kill the scrollbars and allow natural height */
        .fc-scroller,
        .fc-day-grid-container,
        /* these divs might be assigned height, which we need to cleared */
        .fc-time-grid-container {
            /* */
            overflow-x: hidden;
            overflow-y: auto !important;
            height: auto !important;
        }

        /* kill the horizontal border/padding used to compensate for scrollbars */
        .fc-row {
            border: 0 !important;
            margin: 0 !important;
        }

        .fc .fc-timegrid-slot {
            height: 3.5em;
        }

                .fc .fc-toolbar-title {
            font-size: 1.3em;
            margin: 0;
        }

        .btn-group > .btn,
        .btn-group-vertical > .btn {
            position: relative;
            flex: 1 1 auto;
            padding:0.375rem 0.35rem ;
            font-size:0.8rem;
        }

        .fc-today-button,
        .fc-button {
            background: #f0f2f3;
            border: none;
            color: #343a40;
            text-shadow: none;
            text-transform: capitalize;
            box-shadow: none;
            font-size:0.8rem;
            border-radius: 3px;
            margin: 0.375rem 0.75rem;
            padding: 0.375rem 0.35rem !important;
            height: auto !important;
        }

        .borde-gris {
            border-color: #ced4da!important;
        }
    </style>
    <link href='{{ asset('css/estilos_boton_agen_examenes.css') }}' rel='stylesheet' />
@endsection

@section('content')

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--HEADER-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center text-center">
                        <div class="page-header-title">
                            <h5 class="text-white f-22"><a href="#" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a> <strong>AGENDA</strong><br> {{ strtoupper($lugar_atencion_nombre) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!--CIERRE: HEADER-->
            <div class="row user-profile user-card  p-3" style="background-color:#ecf0f5;">
                <div class="col-md-12">
                    <h5 class="my-1 d-inline" style="font-size: 1.2rem; color: #1a49a3;"  id="titulo_tipo_agenda"></h5><button type="button" class="btn btn-danger btn-sm float-right mr-3 d-inline mb-2" data-toggle="modal" data-target="#conf_agenda"> <i class="fas fa-cog"></i></button>
                </div>
                <div class="col-md-12 card">
                    <div id='agenda'></div>
                </div>
            </div>
        </div>
    </div>

    @include('app.profesional.modales.modal_consulta_agenda')
<!--CONFIGURAR AGENDA MODAL-->
    <div class="modal fade" id="conf_agenda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Configuración de agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="orl_adulto" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="c_bloq_tab" data-toggle="tab" href="#c_bloq" role="tab" aria-controls="c_bloq" aria-selected="true">Crear bloqueo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="bloq_tab" data-toggle="tab" href="#bloq" role="tab" aria-controls="bloq" aria-selected="true">Bloqueos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="bloq_agenda">
                                <!--CREACIÓN DE BLOQUEO-->
                                <div class="tab-pane fade show active" id="c_bloq" role="tabpanel" aria-labelledby="c_bloq_tab">
                                    <form>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label class="floating-label-activo-sm">Agenda</label>
                                                <input type="text" class="form-control form-control-sm" name="bono_paciente_nombre" id="bono_paciente_nombre">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label class="floating-label-activo-sm">Motivo</label>
                                                <input type="text" class="form-control form-control-sm" name="bono_paciente_nombre" id="bono_paciente_nombre">
                                            </div>
                                            <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Fecha de inicio</label>
                                                <input type="date" class="form-control form-control-sm" name="bono_paciente_nombre" id="bono_paciente_nombre">
                                            </div>
                                            <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Fecha de finalización</label>
                                                <input type="date" class="form-control form-control-sm" name="bono_paciente_nombre" id="bono_paciente_nombre">
                                            </div>
                                            <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Hora de inicio</label>
                                                <input type="time" class="form-control form-control-sm" name="bono_paciente_nombre" id="bono_paciente_nombre">
                                            </div>
                                           <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Hora</label>
                                                <input type="time" class="form-control form-control-sm" name="bono_paciente_nombre" id="bono_paciente_nombre">
                                            </div>
                                            <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1">Todo el día</label>
                                                </div>
                                            </div>
                                            <div class="text-center col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div type ="button" class="btn btn-info"><i class="feather icon-check"></i> Crear bloqueo</div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--BLOQUEOS-->
                                <div class="tab-pane fade" id="bloq" role="tabpanel" aria-labelledby="bloq_tab">
                                    <div class="form-row px-2">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 border borde-gris rounded mb-2">
                                            <table class="table table-borderless my-0 table-xs">
                                                <tbody>
                                                    <tr>
                                                        <td scope="row"><strong>Motivo: </strong><span id="motivo_bloqueo">Vacaciones</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row"><strong>Inicio: </strong><span id="fecha_inicio_bloq">11 de Marzo,2024</span> - <span id="hora_inicio_bloq">00:00 horas.</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row"><strong>Finalización: </strong><span id="fecha_fin_bloq">30 de Marzo,2024</span> - <span id="hora_fin_bloq">23:59 horas.</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <a href="#" class="btn btn-info-light-c btn-xxs">Desbloquear</a>
                                                            <a href="#" class="btn btn-secondary-light-c btn-xxs">Eliminar bloqueo</a>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 border borde-gris rounded mb-2">
                                            <table class="table table-borderless my-0 table-xs">
                                                <tbody>
                                                    <tr>
                                                        <td scope="row"><strong>Motivo: </strong><span id="motivo_bloqueo">Capacitación</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row"><strong>Inicio: </strong><span id="fecha_inicio_bloq">14 de Marzo,2024</span> - <span id="hora_inicio_bloq">10:00 horas.</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row"><strong>Finalización: </strong><span id="fecha_fin_bloq">14 de Marzo,2024</span> - <span id="hora_fin_bloq">15:00 horas.</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <a href="#" class="btn btn-danger-light-c btn-xxs">Bloquear</a>
                                                            <a href="#" class="btn btn-secondary-light-c btn-xxs">Eliminar bloqueo</a>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 border borde-gris rounded mb-2">
                                            <table class="table table-borderless my-0 table-xs">
                                                <tbody>
                                                    <tr>
                                                        <td scope="row"><strong>Motivo: </strong><span id="motivo_bloqueo">Urgencia</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row"><strong>Inicio: </strong><span id="fecha_inicio_bloq">21de Marzo,2024</span> - <span id="hora_inicio_bloq">00:00 horas.</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row"><strong>Finalización: </strong><span id="fecha_fin_bloq">21 de Marzo,2024</span> - <span id="hora_fin_bloq">23:59 horas.</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <a href="#" class="btn btn-info-light-c btn-xxs">Desbloquear</a>
                                                            <a href="#" class="btn btn-secondary-light-c btn-xxs">Eliminar bloqueo</a>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
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

    <div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Tomar hora</h5>
                    <button id="cerrar_tomar_hora" type="button" class="close text-white" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row div_rut_buscar">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="text-c-blue mb-2">Ingrese el RUT del paciente</h6>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 mb-2">
                            <form id="validacion_rut_form">
                                <div class="form-group" id="validacion_rut_div">
                                    <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control mb-2" placeholder="RUT del paciente" aria-label="RUT del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                                </div>
                            </form>
                            {{--  <form id="validacion_rut_form">
                                <div id="validacion_rut_div" class="input-group input-group-sm mb-3">
                                    <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                                </div>
                            </form>  --}}
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-3">
                            <button class="btn btn-info btn-block" onclick="buscar_paciente();" type="button"id="button-addon2">
                                <i class="feather icon-search"></i> Buscar
                            </button>
                        </div>
                    </div>
                    <form id="form_reseva_de_horas">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="fecha_consulta" name="fecha_consulta" value="">
                        <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $lugar_atencion }}">
                        <input type="hidden" name="fecha" id="fecha">

                        <div id="reserva_datos_paciente">
                            <table class="table table-borderless table-xs mx-1">
                                <tbody>
                                    <tr>
                                        <th scope="row"><strong>RUT</strong></th>
                                        <td><span id="reserva_rut_paciente"></span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong>Nombre</strong></th>
                                        <td class="text-wrap"><span id="reserva_hora_nombre"></span></td>
                                    </tr>
                                    <tr>
                                        <th class="wid-50" scope="row"><strong>Fecha nacimiento</strong></th>
                                        <td><span id="reserva_fecha_nacimiento"></span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong>Sexo</strong></th>
                                        <td class="text-wrap"><span id="reserva_sexo"></span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong>Convenio</strong></th><td class="text-wrap"><span id="reserva_convenio"></span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong>Dirección</strong></th>
                                        <td class="text-wrap"><span id="reserva_direccion"></span></td>
                                    </tr>
                                    <tr>
                                        <th class="wid-50" scope="row"><strong>Correo electrónico</strong> </th>
                                        <td class="text-wrap" id="reserva_hora_email"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong>Teléfono</strong></th>
                                        <td><span id="reserva_hora_telefono"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Descripción reserva</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion"
                                        id="reserva_hora_descripcion">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 text-center">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                                <button type="button" onclick="agendar_hora();" class="btn btn-info"><i class="feather icon-check"></i> Agendar hora</button>
                            </div>
                        </div>
                        <div id="reserva_agregar_paciente_hora">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Paciente no registrado</strong>, complete los datos para registrar al paciente.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nombres</label>
                                        <input type="text" required class="form-control form-control-sm"
                                            name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">F. Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Sexo</label>
                                        <select id="reserva_hora_sexo" name="reserva_hora_sexo"
                                            class="form-control form-control-sm">
                                            <option value="0">Selecione una opci&oacute;n</option>
                                            <option value="F">Femenino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                        <select id="reserva_hora_convenio" name="reserva_hora_convenio"
                                            class="form-control form-control-sm">
                                            <option value="0">Selecione una opci&oacute;n</option>
                                            @if (isset($prevision))
                                                @foreach ($prevision as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                        <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                        <input type="address" class="form-control form-control-sm"
                                            name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Región</label>
                                        <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar"
                                            class="form-control form-control-sm" required>
                                            <option value="0">Seleccione Regio&oacute;n</option>
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
                                        <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                            <option value="0">Seleccione Ciudad</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Correo electr&oacute;nico</label>
                                        <input type="text" class="form-control form-control-sm"
                                            onblur="validar_email_agenda()" name="reserva_hora_correo"
                                            id="reserva_hora_correo">
                                        <span id="mensaje_email_reserva" style="display:none"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Descrici&oacute;n reserva</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <h6 class="text-c-blue ml-2 mb-3">Enviar confirmaci&oacute;n</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                            <label class="custom-control-label" for="reserva_hora_confirmacion">Correo
                                                electr&oacute;nico</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="reserva_hora_sms"
                                                name="reserva_hora_sms">
                                            <label class="custom-control-label" for="sms">SMS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="cerrar_registro_paciente_hora"
                                    data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                                <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();"class="btn btn-info"><i class="feather icon-check"></i> Tomar Hora</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
 </div>
    <!--Evento Reserva-->

    <!-- INICIO RECEPCION BONO  -->
    <!--Modal Recepción de Bonos y programas-->
    <div id="modal_recepcion_bonos_api" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Recepcion de bonos" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_pago_consulta_title">Recepción de Pago Atención</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_recepcion_bonos_api').modal('hide');"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body pb-0">
                    <div class="form-row">
                        <input type="hidden" name="bono_hora_medica" id="bono_hora_medica">
                        <input type="hidden" name="bono_id_profesional" id="bono_id_profesional">
                        <input type="hidden" name="bono_id_paciente" id="bono_id_paciente">
                        <input type="hidden" name="bono_id_tipo_bono" id="bono_id_tipo_bono" value="1">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut del Paciente</label>
                                <input type="person" class="form-control form-control-sm" name="bono_paciente_rut" id="bono_paciente_rut">
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre del Paciente</label>
                                <input type="text" class="form-control form-control-sm" name="bono_paciente_nombre" id="bono_paciente_nombre">
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm"> Nombre Profesional</label>
                                <input type="text" class="form-control form-control-sm" name="bono_profesional_nombre" id="bono_profesional_nombre">
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm"> Rut Profesional</label>
                                <input type="text" class="form-control form-control-sm" name="bono_profesional_rut" id="bono_profesional_rut">
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
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
                                 <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nº de bono o programa</label>
                                        <input type="text" class="form-control form-control-sm" name="bono_numero" id="bono_numero" >
                                    </div>
                                </div>
                             </div>

                            {{--  <div class="form-group">
                                <label class="floating-label-activo-sm">Nº de bono o programa</label>
                                <input type="text" class="form-control form-control-sm" name="bono_numero" id="bono_numero" >
                            </div>  --}}
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Valor total</label>
                                <input name="bono_valor_consulta" id="bono_valor_consulta" type="number" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Convenio</label>
                                <select id="bono_prevision" name="bono_prevision" class="form-control form-control-sm">
                                    <option value="0">Selecione una opción</option>
                                    @foreach ($prevision as $prev)
                                        <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="recepcion_programa">
                                    <label for="recepcion_programa" class="cr"></label>
                                </div>
                                <label>Recepción de programa</label>
                            </div>
                            <div class="form-group" id="sesiones_programa" style="display:none">
                                <label class="floating-label-activo-sm">Nº de Sesiones</label>
                                <input name="bono_sn_sesiones" id="bono_sn_sesiones" type="number" class="form-control form-control-sm">
                            </div>
                            <div class="form-group text-center my-2 pb-2">
                                <div onclick="recepcion_pago();" class="btn btn-info"><i class="feather icon-check"></i> Recepcionar</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN RECEPCION BONO  -->

    @include('app.profesional.modales.boton_flotante_agenda_exa_ciru')

@endsection



