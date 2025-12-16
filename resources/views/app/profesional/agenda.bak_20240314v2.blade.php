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
                    <h5 class="text-primary my-1" style="font-size: 1.4rem;" id="titulo_tipo_agenda"></h5>
                </div>
                <div class="col-md-12 card">
                    <div id='agenda'></div>
                </div>
            </div>
        </div>
    </div>

    @include('app.profesional.modales.modal_consulta_agenda')

    <div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info pt-3 pb-2">
                    <h5 class="modal-title text-white text-center">Tomar hora</h5>
                    <button id="cerrar_tomar_hora" type="button" class="close text-white" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <h6 class="text-c-blue f-14">Ingrese el RUT del paciente</h6>
                            </div>
                        </div>
                    </div>
                    <div class="form-row div_rut_buscar">
                        <div class="col-sm-9 col-md-9">
                            <form id="validacion_rut_form">
                                <div class="form-group" id="validacion_rut_div">
                                    <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control form-control-sm" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                                </div>
                            </form>

                            {{--  <form id="validacion_rut_form">
                                <div id="validacion_rut_div" class="input-group input-group-sm mb-3">
                                    <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control form-control-sm" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                                </div>
                            </form>  --}}
                        </div>
                        <div class="col-sm-3 col-md-3 mb-3">
                            <button class="btn btn-sm btn-info btn-block" onclick="buscar_paciente();" type="button"id="button-addon2">
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
                                        <td><span id="reserva_hora_email"></span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Teléfono</strong>
                                        </th>
                                        <td><span id="reserva_hora_telefono"></span></td>
                                    </tr>
                                </tbody>
                            </table>

                            {{-- <div class="col-sm-12 col-md-12" id="seccion_acompanante">
                                <label class="label">Acompañado por </label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="acompanante_representante" value="1" checked>
                                                <label for="acompanante_representante" class="cr"></label>
                                            </div>
                                            <label><strong>Representante</strong></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"><div id="div_info_representante"></div></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="acompanante_acompanante" value="1">
                                                <label for="acompanante_acompanante" class="cr"></label>
                                            </div>
                                            <label><strong>Acompañante</strong></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div id="div_info_acompanante" style="display: none">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Acompañante</label>
                                                <select class="form-control form-control-sm" multiple name="reserva_hora_id_acompanante" id="reserva_hora_id_acompanante">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Descripción reserva</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                </div>
                            </div>

                            {{-- <div class="col-sm-12 col-md-12" id="seccion_autorizacion">
                                <label class="label">Autorización Atención</label>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="autorizacion_atencion" value="1" checked>
                                                <label for="autorizacion_atencion" class="cr"></label>
                                            </div>
                                            <label><strong>Autorizar Atención</strong></label>
                                            <input type="hidden" name="autorizacion_atencion_token" id="autorizacion_atencion_token" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <p style="font-size: 12px;font-weight: bold;color: #04048f;">Al Autorizar Atencion usted conciente que el Profesional atienda al Paciente.<p>
                                    </div>
                                </div>
                            </div> --}}


                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-x"></i> Cancelar</button>
                                <button type="button" onclick="agendar_hora();" class="btn btn-info"><i class="icon-check"></i> Agendar hora</button>
                            </div>
                        </div>

                        <div id="reserva_agregar_paciente_hora">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="alert alert-danger py-1" role="alert">
                                        Paciente no registrado, complete los datos para registrar al paciente.
                                    </div>
                                </div>
                            </div>
             
                                {{-- INFORMACION DEL PACIENTE --}}
                        
                            <div class="form-row seccion_reserva_paciente_nuevo">
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nombres</label>
                                        <input type="text" required class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                        <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                        <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">F. Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac" onchange="evaluar_edad();">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                        <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                        <input type="address" class="form-control form-control-sm" name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Región</label>
                                        <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar"
                                            class="form-control form-control-sm" required>
                                            <option value="0">Seleccione</option>
                                            @if (isset($region))
                                                @foreach ($region as $reg)
                                                    <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Ciudad</label>
                                        <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                            <option value="0">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                        <input type="text" class="form-control form-control-sm"
                                            onblur="validar_email_agenda()" name="reserva_hora_correo"
                                            id="reserva_hora_correo">
                                        <span id="mensaje_email_reserva" style="display:none"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Descripción reserva</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                    </div>
                                </div>
                            </div>

                                {{-- INFORMACION DEL REPRESENTANTE --}}
                                <div class="form-row seccion_reserva_paciente_nuevo_representante" style="display: none;">
                                        <div class="col-sm-12 col-md-12 mb-3">
                                            <h6 class="f-14 text-c-blue">Información del Representante Legal o encargado de la reserva:</h6>
                                        </div>
                                        <div class="col-sm-9 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">RUT</label>
                                                <input type="text" required class="form-control form-control-sm" name="reserva_hora_representante_rut" id="reserva_hora_representante_rut" oninput="formatoRut(this);">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-3">
                                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="buscar_rut_representente();"><i class="feather icon-search"></i> Buscar</button>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm"><span class="text-danger">*</span>Relación</label>
                                                <select class="form-control form-control-sm" name="reserva_hora_representante_agregar_relacion" id="reserva_hora_representante_agregar_relacion">
                                                    <option value="">Seleccione</option>
                                                    <option data-tipo="1" value="Hijo(a)" selected>Hijo(a)</option>
                                                    <option data-tipo="1" value="Sobrino(a)">Sobrino(a)</option>
                                                    <option data-tipo="1" value="Nieto(a)">Nieto(a)</option>
                                                    <option data-tipo="1" value="Hermano(a)">Hermano(a)</option>
                                                    <option data-tipo="1" value="Primo(a)">Primo(a)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="reserva_representante_nuevo_exitente" id="reserva_representante_nuevo_exitente" value="0">
                                        <div class="div_representante_nuevo px-1" style="display:none;">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Nombres</label>
                                                        <input type="text" required class="form-control form-control-sm" name="reserva_hora_representante_nombres_paciente" id="reserva_hora_representante_nombres_paciente">
                                                    </div>
                                                </div>
                                               <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                                        <input type="text" class="form-control form-control-sm" name="reserva_hora_representante_apellido_uno" id="reserva_hora_representante_apellido_uno">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                        <input type="text" class="form-control form-control-sm" name="reserva_hora_representante_apellido_dos" id="reserva_hora_representante_apellido_dos">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                        <input type="date" class="form-control form-control-sm" name="reserva_hora_representante_fecha_nac" id="reserva_hora_representante_fecha_nac" onclick="evaluar_edad();">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Sexo</label>
                                                        <select id="reserva_hora_representante_sexo" name="reserva_hora_representante_sexo"
                                                            class="form-control form-control-sm">
                                                            <option value="0">Selecione una opci&oacute;n</option>
                                                            <option value="F">Femenino</option>
                                                            <option value="M">Masculino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                                        <select id="reserva_hora_representante_convenio" name="reserva_hora_representante_convenio"
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
                                                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                        <input type="address" class="form-control form-control-sm" name="reserva_hora_representante_direccion" id="reserva_hora_representante_direccion">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                                        <input type="address" class="form-control form-control-sm" name="reserva_hora_representante_numero_dir" id="reserva_hora_representante_numero_dir">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Región</label>
                                                        <select  onchange="buscar_ciudad_repesentante();" name="reserva_hora_representante_region_agregar" id="reserva_hora_representante_region_agregar"
                                                            class="form-control form-control-sm" required>
                                                            <option value="0">Seleccione</option>
                                                            @if (isset($region))
                                                                @foreach ($region as $reg)
                                                                    <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Ciudad</label>
                                                        <select id="reserva_hora_representante_ciudad_agregar" name="reserva_hora_representante_ciudad_agregar" class="form-control form-control-sm" required>
                                                            <option value="0">Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            onblur="validar_email_agenda_representante()" name="reserva_hora_representante_correo"
                                                            id="reserva_hora_representante_correo">
                                                        <span id="mensaje_email_reserva_representante" style="display:none"></span>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                        <input type="tel" class="form-control form-control-sm"
                                                            name="reserva_hora_representante_telefono_uno" id="reserva_hora_representante_telefono_uno">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="div_representante_existente" style="display:none;">
                                                <input type="hidden" name="reserva_representante_id" id="reserva_representante_id" value=''>
                                                <input type="hidden" name="reserva_representante_id_usuario" id="reserva_representante_id_usuario" value=''>
                                                <table class="table table-borderless table-xs">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Nombre</strong>
                                                            </th>
                                                            <td><span id="reserva_representante_nombre"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Fecha Nacimiento</strong>
                                                            </th>
                                                            <td><span id="reserva_representante_fecha_nacimiento"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Sexo</strong>
                                                            </th>
                                                            <td><span id="reserva_representante_sexo"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Dirección</strong>
                                                            </th>
                                                            <td><span id="reserva_representante_direccion"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Correo Electrónico</strong>
                                                            </th>
                                                            <td><span id="reserva_representante_email"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <strong>Teléfono</strong>
                                                            </th>
                                                            <td><span id="reserva_representante_telefono"></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <h6 class="f-14 text-c-blue">Enviar confirmaci&oacute;n</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                                <label class="custom-control-label" for="reserva_hora_confirmacion">Correo
                                                    electr&oacute;nico</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
                                    <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();"
                                        class="btn btn-info">
                                        <i class="feather icon-check"></i> Tomar Hora
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
                            <div class="col-sm-12 mt-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Rut del Paciente</label>
                                    <input type="person" class="form-control" name="bono_paciente_rut" id="bono_paciente_rut">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombre del Paciente</label>
                                    <input type="text" class="form-control" name="bono_paciente_nombre" id="bono_paciente_nombre">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="floating-label-activo-sm"> Nombre Profesional</label>
                                    <input type="text" class="form-control" name="bono_profesional_nombre" id="bono_profesional_nombre">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label-activo-sm"> Rut Profesional</label>
                                    <input type="text" class="form-control" name="bono_profesional_rut" id="bono_profesional_rut">
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="floating-label-activo-sm">Clase Pago</label>
                                        <select id="bono_id_clase_bono" name="bono_id_clase_bono" class="form-control">
                                            <option value="1">Bono Fisico</option>
                                            <option value="2">Sencillito</option>
                                            <option value="3">Caja Vecina</option>
                                            <option value="4">Bono Web</option>
                                            <option value="5">Bono Web Pre-Pago</option>
											<option value="6">Particular</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="floating-label-activo-sm">Nº de bono o programa</label>
                                        <input type="text" class="form-control" name="bono_numero" id="bono_numero" >
                                    </div>
                                </div>
                                {{--  <div class="form-group">
                                    <label class="floating-label-activo-sm">Nº de bono o programa</label>
                                    <input type="text" class="form-control" name="bono_numero" id="bono_numero" >
                                </div>  --}}
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Valor total</label>
                                    <input name="bono_valor_consulta" id="bono_valor_consulta" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select id="bono_prevision" name="bono_prevision" class="form-control">
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
                                    <label class="floating-label">Nº de Sesiones</label>
                                    <input name="bono_sn_sesiones" id="bono_sn_sesiones" type="number" class="form-control">
                                </div>
                                <hr>
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

@section('page-script')
    <script>
        function evaluar_edad()
        {
            let fechaNacimiento = new Date($('#reserva_hora_fecha_nac').val());
            let hoy = new Date();
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

            // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
            if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
                edad--;
            }

            if( edad < 18 )
            {
                $('.seccion_reserva_paciente_nuevo').removeClass('');
                $('.seccion_reserva_paciente_nuevo_representante').removeClass('');

                $('.seccion_reserva_paciente_nuevo').addClass('');
                $('.seccion_reserva_paciente_nuevo_representante').addClass('');
                $('.seccion_reserva_paciente_nuevo_representante').show();

                $('#agenda_agregar_paciente').children(0).removeClass('modal-md');
                $('#agenda_agregar_paciente').children(0).addClass('modal-md');

                $('#reserva_hora_correo').attr('onblur', "");
            }
            else
            {
                $('.seccion_reserva_paciente_nuevo').removeClass('col-sm-6');
                $('.seccion_reserva_paciente_nuevo_representante').removeClass('col-sm-6');

                $('.seccion_reserva_paciente_nuevo').addClass('');
                $('.seccion_reserva_paciente_nuevo_representante').addClass('');
                $('.seccion_reserva_paciente_nuevo_representante').hide();

                $('#agenda_agregar_paciente').children(0).removeClass('modal-md');
                $('#agenda_agregar_paciente').children(0).addClass('modal-md');

                $('#reserva_hora_correo').attr('onblur', "validar_email_agenda();");
            }
        }

        function buscar_rut_representente()
        {

            let rut = $('#reserva_hora_representante_rut').val();
            // let url = "https://www.med-sdi.cl/Profesional/buscar_rut";
            let url = "{{ route('profesional.buscar_rut_paciente') }}";

            $('.div_representante_nuevo').hide();
            $('.div_representante_existente').hide();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        rut: rut,
                    },
                })
                .done(function(data) {

                    if (data !== 'null')
                    {
                        data = JSON.parse(data);

                        if(data.tipo_paciente == 'SI')
                        {
                            $('#reserva_representante_nuevo_exitente').val(1);

                            $('#reserva_representante_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
                            $('#reserva_representante_fecha_nacimiento').text(data.fecha_nac);
                            if (data.sexo == 'M') {
                                $('#reserva_representante_sexo').text('Masculino');
                            } else {
                                $('#reserva_representante_sexo').text('Femenino');
                            }
                            $('#reserva_representante_direccion').text(data.direccion.direccion + ' ' + data.direccion.numero_dir + ', ' + data.direccion.ciudad.nombre);
                            $('#reserva_representante_email').text(data.email);
                            $('#reserva_representante_telefono').text(data.telefono_uno);

                            $('#reserva_representante_id').val(data.id);
                            $('#reserva_representante_id_usuario').val(data.id_usuario);


                            $('.div_representante_nuevo').hide();
                            $('.div_representante_existente').show();
                        }
                        else
                        {
                            $('#reserva_representante_nuevo_exitente').val(0);
                            $('#reserva_representante_id').val('');
                            $('#reserva_representante_id_usuario').val('');
                            $('.div_representante_nuevo').show();
                            $('.div_representante_existente').hide();

                            $('#reserva_hora_representante_nombres_paciente').val('');
                            $('#reserva_hora_representante_apellido_uno').val('');
                            $('#reserva_hora_representante_apellido_dos').val('');
                            $('#reserva_hora_representante_fecha_nac').val('');
                            $('#reserva_hora_representante_sexo').val('');
                            $('#reserva_hora_representante_direccion').val('');
                            $('#reserva_hora_representante_numero_dir').val('');
                            $('#reserva_hora_representante_region_agregar').val('');
                            buscar_ciudad_repesentante();
                            // $('#reserva_hora_representante_ciudad_agregar').val('');
                            $('#reserva_hora_representante_correo').val('');
                            $('#reserva_hora_representante_telefono_uno').val('');
                        }
                    }
                    else
                    {
                        $('#reserva_representante_id').val('');
                        $('#reserva_representante_id_usuario').val('');
                        $('.div_representante_nuevo').show();
                        $('.div_representante_existente').hide();

                        $('#reserva_hora_representante_nombres_paciente').val('');
                        $('#reserva_hora_representante_apellido_uno').val('');
                        $('#reserva_hora_representante_apellido_dos').val('');
                        $('#reserva_hora_representante_fecha_nac').val('');
                        $('#reserva_hora_representante_sexo').val('');
                        $('#reserva_hora_representante_direccion').val('');
                        $('#reserva_hora_representante_numero_dir').val('');
                        $('#reserva_hora_representante_region_agregar').val('');
                        buscar_ciudad_repesentante();
                        // $('#reserva_hora_representante_ciudad_agregar').val('');
                        $('#reserva_hora_representante_correo').val('');
                        $('#reserva_hora_representante_telefono_uno').val('');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

    </script>
@endsection
