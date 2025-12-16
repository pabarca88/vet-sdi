@extends('template.profesional.template')
@section('page-styles')
    <link href='{{ asset('js/fullcalendar-5.10.1/lib/main.css') }}' rel='stylesheet' />

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
          padding:5px 5px;
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
    border-radius: 3px;
    margin: 0.375rem 0.75rem;
    padding: 0.35rem 0.4rem !important;
    height: auto !important;
    font-size:0.8rem;
  
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
                <div class="col-md-12 card">
                    <div id='agenda'></div>
                </div>
            </div>
        </div>
    </div>

    @include('app.profesional.modales.modal_consulta_agenda')

    <div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info pt-3 pb-2">
                    <h5 class="modal-title text-white text-center">Tomar hora</h5>
                    <button id="cerrar_tomar_hora" type="button" class="close text-white" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <h6 class="text-c-blue ml-2 mb-3">Ingrese el rut del paciente</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row div_rut_buscar">
                        <div class="col-sm-8 col-md-8 mb-3">
                            <form id="validacion_rut_form">
                                <div class="form-group" id="validacion_rut_div">
                                    <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                                </div>
                            </form>

                            {{--  <form id="validacion_rut_form">
                                <div id="validacion_rut_div" class="input-group input-group-sm mb-3">
                                    <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                                </div>
                            </form>  --}}
                        </div>
                        <div class="col-sm-4 col-md-4 mb-3">
                            <button class="btn btn-info" onclick="buscar_paciente();" type="button"id="button-addon2">
                                Buscar
                            </button>
                        </div>
                    </div>



                    <form id="form_reseva_de_horas">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="fecha_consulta" name="fecha_consulta" value="">
                        <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $lugar_atencion }}">
                        <input type="hidden" name="fecha" id="fecha">

                        <div id="reserva_datos_paciente" class="row mx-3">
                            <table class="table table-borderless table-xs">
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <strong>Rut</strong>
                                        <td><span id="reserva_rut_paciente"></span></td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Nombre</strong>
                                        <td><span id="reserva_hora_nombre"></span></td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Fecha Nacimiento</strong>
                                        <td><span id="reserva_fecha_nacimiento"></span></td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Sexo</strong>
                                            <td><span id="reserva_sexo"></span></td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Convenio</strong>
                                        <td><span id="reserva_convenio"></span></td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Dirección</strong>
                                        <td><span id="reserva_direccion"></span></td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Correo Electrónico</strong>
                                        <td id="reserva_hora_email">

                                        </td>


                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Teléfono</strong>
                                        <td><span id="reserva_hora_telefono"></span></td>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Descripción Reserva</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion"
                                        id="reserva_hora_descripcion">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="button" onclick="agendar_hora();" class="btn btn-info">Agendar Hora</button>

                            </div>
                        </div>

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
                                        <input type="address" class="form-control form-control-sm"
                                            name="reserva_hora_direccion" id="reserva_hora_direccion">
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
                                        <label class="floating-label-activo-sm">Region</label>
                                        <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar"
                                            class="form-control" required>
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
                                        <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                            <option value="0">Seleccione Ciudad</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
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
                                        <label class="floating-label-activo-sm">Descrici&oacute;n Reserva</label>
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
                                    data-dismiss="modal">Cancelar</button>
                                <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();"
                                    class="btn btn-info">
                                    Tomar Hora
                                </button>
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
                                    @foreach ($prevision as $prev)
                                        <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
                                    @endforeach
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
            </div>
        </div>
    </div>
    <!-- FIN RECEPCION BONO  -->

    @include('app.profesional.modales.boton_flotante_agenda_exa_ciru')

@endsection

