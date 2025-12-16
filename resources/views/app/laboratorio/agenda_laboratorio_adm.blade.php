@extends('template.laboratorio.laboratorio_asistente.template')

@section('page-style')
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

        .fc-timegrid-event .fc-event-time{
            font-size: 1rem!important;
        }

        .fc-v-event .fc-event-title{
            font-size: 0.9rem!important;
        }

        /* kill the horizontal border/padding used to compensate for scrollbars */
        .fc-row {
            border: 0 !important;
            margin: 0 !important;
        }

        .fc .fc-timegrid-slot {
            height: 5em!important;
        }

        .fc-timegrid-event-harness > .fc-timegrid-event {
          /* height:6em; */
		}

        .fc .fc-toolbar-title {
            font-size: 1.4em;
            margin: 0;
        }

        .fc .fc-toolbar.fc-header-toolbar {
            margin-bottom: 0px!important;
        }

        .btn-group>.btn,
        .btn-group-vertical>.btn {
            position: relative;
            flex: 1 1 auto;
            padding: 5px 5px;
            font-size: 0.8rem;
        }

        .fc-today-button{
            padding: 5px 5px;
            font-size: 0.8rem;
        }

         .btn.btn-agenda {
            width: 38px !important;
            height: 38px !important;
            font-size: 22px !important;
            padding: 0px;
            border-radius: 50%!important;
        }

        @media (max-width: 767.98px) {

            .t-lugar-aten{
                font-size:0.9rem!important;
            }

            .t-tipo-agenda {
                font-size:0.94rem!important;
            }

             .btn.btn-agenda {
                width: 30px !important;
                height: 30px !important;
                font-size: 15px !important;
                padding: 0px;
                border-radius: 50%!important;
            }

            .fc .fc-toolbar-title {
            font-size: 1rem!important;
            margin: 0;
            }

             .btn-group>.btn,
            .btn-group-vertical>.btn {
                position: relative;
                flex: 1 1 auto;
                padding: 1px 5px;
                font-size: 0.8rem;
            }

        }
    </style>

    <link href='{{ asset('css/estilos_boton_agen_examenes.css') }}' rel='stylesheet' />
@endsection

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
                              {{--  @if ($profesional->id_especialidad == 11 && $profesional->id_tipo_especialidad == 59)
                                    <h5 class="m-b-10 font-weight-bold">Agenda Laboratorio Radiología</h5>
                                @else
                                    <h5 class="m-b-10 font-weight-bold">Agenda Laboratorio</h5>
                                @endif--}}

                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                @if ($profesional->id_especialidad == 11 && $profesional->id_tipo_especialidad == 59)
                                    <li class="breadcrumb-item"><a href="agenda_laboratorios_asistentes_cm.php">Agenda Laboratorio Radiología</a></li>
                                @else
                                    <li class="breadcrumb-item"><a href="agenda_laboratorios_asistentes_cm.php">Agenda Laboratorio</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
             <!--Pacientes y pagos-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                    <h4 class="font-weight-bold d-inline f-20 text-white">Laboratorio:&nbsp;&nbsp;</h4><!--Nombre del Laboratorio--><span class=" f-20 d-inline text-white">Laboratorio Clínico</span> <!--Tipo de Laboratorio-->

                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Sucursal</label>
                                            <select class="form-control form-control-sm" id="agenda_sucursal" name="agenda_sucursal" onchange="cargarBox();">
                                                <option value="">Seleccione</option>
                                                @if($sucursales)
                                                    @foreach($sucursales as $key_suc => $value_suc)
                                                        @if ($loop->first)
                                                            <option selected value="{{ $value_suc->id }}" data-id_lugar_atencion="{{ $value_suc->id_lugar_atencion }}" data-id_tipo_agenda="5">{{ mb_strtoupper($value_suc->nombre, 'UTF-8') }}</option>
                                                        @else
                                                            <option value="{{ $value_suc->id }}" data-id_lugar_atencion="{{ $value_suc->id_lugar_atencion }}" data-id_tipo_agenda="5">{{ mb_strtoupper($value_suc->nombre, 'UTF-8') }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Box</label>
                                            <select class="form-control form-control-sm" id="agenda_box" name="agenda_box" onchange="cargarAgendaSucursal();">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id='agenda'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->

    {{-- modal agenda --}}
    <div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info pt-3 pb-2">
                    <h5 class="modal-title text-white text-center">Tomar horas</h5>
                    <button id="cerrar_tomar_hora" type="button" class="close" data-bs-dismiss="modal" aria-label="Close" ><span aria-hidden="true">×</span>
                </button>

                </div>
                <div class="modal-body">
                    {{--  BUSCADOR DE RUT  --}}
                    <div class="form-row div_rut_buscar">
                         <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <h6 class="text-c-blue f-14">Ingrese el RUT del paciente</h6>
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <form id="validacion_rut_form">
                                <div class="form-group" id="validacion_rut_div">
                                    <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva"
                                        class="form-control form-control-sm" placeholder="Rut del paciente"
                                        aria-label="Rut del paciente" aria-describedby="button-addon2" required
                                        oninput="formatoRut(this)">
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-3 col-md-3 mb-3">
                            <button class="btn btn-sm btn-info btn-block" onclick="buscar_paciente();"
                                type="button"id="button-addon2">
                                <i class="feather icon-search"></i> Buscar
                            </button>
                        </div>
                    </div>

                    <form id="form_reseva_de_horas">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="fecha_consulta" name="fecha_consulta" value="">
                        <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="">
                        <input type="hidden" name="fecha" id="fecha">

                        {{-- @if ($profesional->id_especialidad == 4 && $profesional->id_tipo_especialidad == 55) --}}
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="div_procedimiento" name="div_procedimiento" style="display: none;">

                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Procedimiento</label>
                                    <input type="hidden" name="total_bloques_procedimientos" id="total_bloques_procedimientos" value="">
                                    <select class="form-control form-control-sm" name="form_reseva_de_horas_id_procedimiento" id="form_reseva_de_horas_id_procedimiento" multiple="multiple">

                                        {{-- <option value="">Seleccione</option> --}}
                                        @if ( isset($procedimientos) && !empty($procedimientos) )
                                            @foreach ($procedimientos as $proced )
                                                <option value="{{ $proced->id }}" data-cant_bloque="{{ (empty($proced->cantidad_bloques_prof)?$proced->cantidad_bloques:$proced->cantidad_bloques_prof) }}">{{ $proced->nombre }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                            </div>
                        {{-- @endif --}}

                        <div id="reserva_datos_paciente" class="row mx-3">

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h6 class="text-c-blue f-16 d-inline">Información del paciente</h6>
                                <button type="button" onclick="editar_info_paciente();" class="btn btn-sm btn-info-light-c float-right d-inline paciente_view">
                                    <i class="feather icon-edit"></i> Editar
                                </button>
                                <input type="hidden" name="modificando_paciente" id="modificando_paciente" value="0">
                            </div>
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
                                        <td>
                                            <div class="paciente_view">
                                                <span id="reserva_hora_nombre"></span>
                                            </div>

                                                <div class="paciente_edit" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-4">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_nombre" value="">
                                                    </div>
                                                        <div class="col-sm-12 col-md-4">
                                                            <input type="text" class="form-control form-control-sm" id="input_reserva_hora_apellido_uno" value="">
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_apellido_dos" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Fecha Nacimiento</strong>
                                        </th>
                                        <td>
                                            <div class="paciente_view">
                                                <span id="reserva_fecha_nacimiento"></span>
                                            </div>
                                            <div class="paciente_edit" style="display:none">
                                                <input type="text" class="mask_date form-control form-control-sm"
                                                    name="input_reserva_fecha_nacimiento" id="input_reserva_fecha_nacimiento"
                                                    onchange="evaluar_edad();"
                                                    maxlength="10" placeholder="dd/mm/aaaa"
                                                    autocomplete="off"
                                                    data-mask="00/00/0000"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Sexo</strong>
                                        </th>
                                        <td>
                                            <div class="paciente_view">
                                                <span id="reserva_sexo"></span>
                                            </div>
                                            <div class="paciente_edit" style="display:none">
                                                <select id="input_reserva_sexo" class="form-control form-control-sm">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Convenio</strong>
                                        </th>
                                        <td>
                                            <div class="paciente_view">
                                                <span id="reserva_convenio"></span>
                                            </div>
                                            <div class="paciente_edit" style="display:none">
                                                <select id="input_reserva_convenio" name="input_reserva_convenio" class="form-control form-control-sm">
                                                    <option value="0">Seleccione</option>
                                                    @if (isset($prevision))
                                                        @foreach ($prevision as $p)
                                                            <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Dirección</strong>
                                        </th>
                                        <td>
                                            <div class="paciente_view">
                                                <span id="reserva_direccion"></span>
                                            </div>
                                            <div class="paciente_edit" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-9">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                            <input type="address" class="form-control form-control-sm" name="input_reserva_direccion_direccion" id="input_reserva_direccion_direccion" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                                            <input type="address" class="form-control form-control-sm" name="input_reserva_direccion_numero_dir" id="input_reserva_direccion_numero_dir" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Región</label>
                                                            <select id="input_reserva_direccion_region" onchange="buscar_ciudad_general('input_reserva_direccion_region', 'input_reserva_direccion_ciudad', 0);" name="input_reserva_direccion_region" class="form-control form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                @if (isset($region))
                                                                    @foreach ($region as $reg)
                                                                        <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Ciudad</label>
                                                            <select id="input_reserva_direccion_ciudad" name="input_reserva_direccion_ciudad" class="form-control form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Correo Electrónico</strong>
                                        </th>
                                        <td>
                                            <div class="paciente_view">
                                                <span id="reserva_hora_email"></span>
                                            </div>
                                            <div class="paciente_edit" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_email" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Teléfono</strong>
                                        </th>
                                        <td>
                                            <div class="paciente_view">
                                                <span id="reserva_hora_telefono"></span>
                                            </div>
                                            <div class="paciente_edit" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_telefono" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                   <!-- <tr class="paciente_edit" style="display: none;">
                                        <hr>
                                    </tr>-->
                                    <br>
                                    <tr class="paciente_edit">

                                        <td>
                                            <button type="button" id="cancelar_modifcar_paciente" onclick="cancelar_modificacion_paciente();" class="btn btn-sm btn-danger">
                                                <i class="feather icon-x"></i> Cancelar actualización
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" id="actualizar_modificar_paciente" onclick="actualizar_paciente();" class="btn btn-sm btn-info">
                                                <i class="feather icon-check"></i> Actualizar paciente
                                            </button>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                                <div class="form-group paciente_view">
                                    <label class="floating-label-activo-sm">Descripción reserva</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                </div>
                            </div>

                            <div class="modal-footer mb-0 pt-1 pb-0 paciente_view">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="feather icon-x"></i> Cancelar</button>
                                <button type="button" onclick="agendar_hora();" class="btn btn-info"><i
                                        class="feather icon-check"></i> Agendar hora</button>
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

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="paciente_dependiente"
                                                name="paciente_dependiente" onchange="activar_paciente_dependientes();">
                                            <label class="custom-control-label" for="paciente_dependiente">Paciente Dependiente</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- INFORMACION DEL PACIENTE --}}
                            <div class="form-row seccion_reserva_paciente_nuevo">
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nombres</label>
                                        <input type="text" required class="form-control form-control-sm"
                                            name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">F. Nacimiento</label>
                                        {{-- <input type="date" class="form-control form-control-sm"
                                            name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac"
                                            onchange="evaluar_edad();"> --}}

                                            <input type="text" class="mask_date form-control form-control-sm"
                                                name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac"
                                                onchange="evaluar_edad();"
                                                maxlength="10" placeholder="dd/mm/aaaa"
                                                autocomplete="off"
                                                data-mask="00/00/0000"
                                            />
                                            <span id="mensaje_reserva_hora_fecha_nac" style="font-size: 10px; color: #f33; font-weight: bold; display:none"></span>
                                        {{-- <input type="text" class="form-control" name="txtFecActivacion" id="txtFecActivacion_1" onblur="validarLinea(1)" ;="" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Ingrese un fecha correcta." maxlength="10" placeholder="__/__/____" autocomplete="off" data-original-title="" title=""> --}}

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
                                        <input type="address" class="form-control form-control-sm"
                                            name="reserva_hora_direccion" id="reserva_hora_direccion">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nº</label>
                                        <input type="address" class="form-control form-control-sm"
                                            name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
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
                                        <select id="ciudad_agregar" name="ciudad_agregar"
                                            class="form-control form-control-sm" required>
                                            <option value="0">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Correo Electr&oacute;nico Paciente</label>

                                        <input type="text" class="form-control form-control-sm"
                                            onblur="validar_email_agenda();validar_campo_telefono();" onchange="validar_email_agenda();validar_campo_telefono();"name="reserva_hora_correo"
                                            id="reserva_hora_correo">
                                        <span id="mensaje_email_reserva" style="width: 100%; font-size: 10px; color: #f00; font-weight: bold; display:none"></span>
                                        {{-- <label class="" style="width: 100%; font-size: 10px; color: #f00; font-weight: bold;">En caso que sea menor de edad no es requerido</label> --}}
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno" onblur="validar_campo_telefono();" onchange="validar_campo_telefono();">
                                    </div>
                                    <button class="btn btn-sm btn-info btn-block"
                                        type="button" id="btn_reserva_hora_telefono_uno_validar" disabled="disabled" onclick="enviar_validacion_telefono();">
                                        <i class="feather icon-check"></i> Validar
                                    </button>
                                    <div class="form-group" style="display:none" name="div_codigo_validador" id="div_codigo_validador">
                                        <label class="floating-label-activo-sm">Codigo Validador</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="reserva_hora_telefono_uno_codigo_validador" id="reserva_hora_telefono_uno_codigo_validador" onkeyup="validar_codigo_telefono();">
                                    </div>
                                    <input type="hidden" name="result_codigo_validacion" id="result_codigo_validacion" value="0">
                                    <div id="div_codigo_validador_mensaje" style="display:none"></div>
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
                                    <h6 class="f-14 text-c-blue">Información del Representante Legal o encargado de la
                                        reserva:</h6>
                                </div>
                                <div class="col-sm-9 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">RUT</label>
                                        <input type="text" required class="form-control form-control-sm"
                                            name="reserva_hora_representante_rut" id="reserva_hora_representante_rut"
                                            oninput="formatoRut(this);">
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <button type="button" class="btn btn-info btn-sm btn-block"
                                        onclick="buscar_rut_representente();"><i class="feather icon-search"></i>
                                        Buscar</button>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm"><span
                                                class="text-danger">*</span>Relación</label>
                                        <select class="form-control form-control-sm"
                                            name="reserva_hora_representante_agregar_relacion"
                                            id="reserva_hora_representante_agregar_relacion">
                                            <option value="">Seleccione</option>
                                            <option data-tipo="1" value="Hijo(a)" selected>Hijo(a)</option>
                                            <option data-tipo="1" value="Sobrino(a)">Sobrino(a)</option>
                                            <option data-tipo="1" value="Nieto(a)">Nieto(a)</option>
                                            <option data-tipo="1" value="Hermano(a)">Hermano(a)</option>
                                            <option data-tipo="1" value="Primo(a)">Primo(a)</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="reserva_representante_nuevo_exitente"
                                    id="reserva_representante_nuevo_exitente" value="0">
                                <div class="div_representante_nuevo px-1" style="display:none;">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Nombres</label>
                                                <input type="text" required class="form-control form-control-sm"
                                                    name="reserva_hora_representante_nombres_paciente"
                                                    id="reserva_hora_representante_nombres_paciente">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Primer Apellido</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="reserva_hora_representante_apellido_uno"
                                                    id="reserva_hora_representante_apellido_uno">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="reserva_hora_representante_apellido_dos"
                                                    id="reserva_hora_representante_apellido_dos">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                {{-- <input type="date" class="form-control form-control-sm"
                                                    name="reserva_hora_representante_fecha_nac"
                                                    id="reserva_hora_representante_fecha_nac"> --}}

                                                <input type="text" class="mask_date form-control form-control-sm"
                                                    name="reserva_hora_representante_fecha_nac" id="reserva_hora_representante_fecha_nac"
                                                    maxlength="10" placeholder="dd/mm/aaaa"
                                                    autocomplete="off"
                                                    data-mask="00/00/0000"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Sexo</label>
                                                <select id="reserva_hora_representante_sexo"
                                                    name="reserva_hora_representante_sexo"
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
                                                <select id="reserva_hora_representante_convenio"
                                                    name="reserva_hora_representante_convenio"
                                                    class="form-control form-control-sm">
                                                    <option value="0">Selecione una opci&oacute;n</option>
                                                    @if (isset($prevision))
                                                        @foreach ($prevision as $p)
                                                            <option value="{{ $p->id }}">{{ $p->nombre }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                <input type="address" class="form-control form-control-sm"
                                                    name="reserva_hora_representante_direccion"
                                                    id="reserva_hora_representante_direccion">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Nº.</label>
                                                <input type="address" class="form-control form-control-sm"
                                                    name="reserva_hora_representante_numero_dir"
                                                    id="reserva_hora_representante_numero_dir">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Región</label>
                                                <select onchange="buscar_ciudad_repesentante();"
                                                    name="reserva_hora_representante_region_agregar"
                                                    id="reserva_hora_representante_region_agregar"
                                                    class="form-control form-control-sm" required>
                                                    <option value="0">Seleccione</option>
                                                    @if (isset($region))
                                                        @foreach ($region as $reg)
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ciudad</label>
                                                <select id="reserva_hora_representante_ciudad_agregar"
                                                    name="reserva_hora_representante_ciudad_agregar"
                                                    class="form-control form-control-sm" required>
                                                    <option value="0">Seleccione</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    onblur="validar_email_agenda_representante();validar_campo_telefono_representante();"
                                                    name="reserva_hora_representante_correo"
                                                    id="reserva_hora_representante_correo">
                                                <span id="mensaje_email_reserva_representante"
                                                    style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                <input type="tel" class="form-control form-control-sm"
                                                    name="reserva_hora_representante_telefono_uno"
                                                    id="reserva_hora_representante_telefono_uno" onblur="validar_campo_telefono_representante();validar_email_agenda_representante();" onchange="validar_campo_telefono_representante();validar_email_agenda_representante();">
                                            </div>

                                            <button class="btn btn-sm btn-info btn-block"
                                                type="button" id="btn_reserva_hora_representante_telefono_uno_validar" disabled="disabled" onclick="enviar_validacion_telefono_representante();">
                                                <i class="feather icon-check"></i> Validar
                                            </button>

                                            <div class="form-group" style="display:none" name="div_representante_codigo_validador" id="div_representante_codigo_validador">
                                                <label class="floating-label-activo-sm">Código Validador</label>
                                                <input type="tel" class="form-control form-control-sm"
                                                    name="reserva_hora_representante_telefono_uno_codigo_validador" id="reserva_hora_representante_telefono_uno_codigo_validador" onkeyup="validar_codigo_telefono_representante();">
                                            </div>

                                            <input type="hidden" name="result_representante_codigo_validacion" id="result_representante_codigo_validacion" value="0">
                                            <div id="div_representante_codigo_validador_mensaje" style="display:none"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="div_representante_existente" style="display:none;">
                                    <input type="hidden" name="reserva_representante_id" id="reserva_representante_id"
                                        value=''>
                                    <input type="hidden" name="reserva_representante_id_usuario"
                                        id="reserva_representante_id_usuario" value=''>
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
                                                    <strong>Correo electrónico</strong>
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
                                <button type="button" id="guardar_reserva_paciente"
                                    onclick="agendar_hora_paciente_nuevo();" class="btn btn-info" disabled="disabled">
                                    <i class="feather icon-check"></i> Tomar Hora
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal agenda --}}

    <!--Modal Recepción de Bonos y programas-->
    <div id="modal_recepcion_bonos_api" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="Recepcion de bonos" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_pago_consulta_title">Recepción de pago atención</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="$('#modal_recepcion_bonos_api').modal('hide');"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body pb-0">
                    <div class="form-row mb-2">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger">
                                <h6 class="text-danger p-16">Recuerde que siempre se debe validar datos del paciente, profesional y convenio con los datos del bono físico</h6>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <input type="hidden" name="bono_hora_medica" id="bono_hora_medica">
                        <input type="hidden" name="bono_id_profesional" id="bono_id_profesional" value="{{ $profesional->id }}">
                        <input type="hidden" name="bono_id_paciente" id="bono_id_paciente">
                        <input type="hidden" name="bono_id_tipo_bono" id="bono_id_tipo_bono" value="1">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Rut del Paciente</label>
                                <input type="person" class="form-control form-control-sm" name="bono_paciente_rut"
                                    id="bono_paciente_rut" disabled="disabled">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nombre del Paciente</label>
                                <input type="text" class="form-control form-control-sm" name="bono_paciente_nombre"
                                    id="bono_paciente_nombre" disabled="disabled">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"> Nombre Profesional</label>
                                <input type="text" class="form-control form-control-sm" name="bono_profesional_nombre"
                                    id="bono_profesional_nombre" disabled="disabled" value="{{ $profesional->nombre.''.$profesional->apellido_uno }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"> Rut Profesional</label>
                                <input type="text" class="form-control form-control-sm" name="bono_profesional_rut"
                                    id="bono_profesional_rut" disabled="disabled" value="{{ $profesional->rut }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Clase Pago</label>
                                <select id="bono_id_clase_bono" name="bono_id_clase_bono" class="form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Emitido por Institucion</option>
                                    <option value="2">Váucher</option>
                                    <option value="3">Caja Vecina</option>
                                    <option value="4">Bono Web</option>
                                    <option value="5">Bono Web Pre-Pago</option>
                                    <option value="6">Particular</option>
                                    <option value="7">COPAGO Fonasa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nº de bono o programa</label>
                                <input type="text" class="form-control form-control-sm" name="bono_numero"
                                    id="bono_numero">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">N° De Boleta</label>
                                <input type="text" class="form-control form-control-sm" name="numero_boleta"
                                    id="numero_boleta">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label class="floating-label-activo-sm">Convenio</label>
                                <input type="text" class="form-control form-control-sm" name="bono_prevision_txt" id="bono_prevision_txt" disabled="disabled" value="">
                                <select id="bono_prevision" name="bono_prevision" class="form-control form-control-sm"  style="display: none;" onchange="$('#bono_prevision_txt').val( $('#bono_prevision option:selected').text() );$('#bono_prevision_txt').show();$('#bono_prevision').hide();actualizar_prevision_paciente('bono_id_paciente', 'bono_prevision');">
                                    <option value="0">Selecione una opción</option>
                                    @foreach ($prevision as $prev)
                                        <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary btn-sm" type="button" onclick="$('#bono_prevision_txt').hide();$('#bono_prevision').show();"><i class="feather icon-edit"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Valor total</label>
                                <input name="bono_valor_consulta" id="bono_valor_consulta" type="number"
                                    class="form-control form-control-sm">
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

                            <div class="row" id="sesiones_programa" style="display: none;">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo Bono</label>
                                        <select  id="bono_id_tipo_bono" name="bono_id_tipo_bono"class="form-control form-control-sm">
                                            {{-- <option value="0">Seleccione</option> --}}
                                            @foreach ($tipo_bonos as $t_bono)
                                                <option value="{{ $t_bono->id }}">{{ $t_bono->nombre }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nº de Sesiones</label>
                                        <input name="bono_sn_sesiones" id="bono_sn_sesiones" type="number"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
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

    @include('app.laboratorio.modal_consulta_agenda_adm')

@endsection

@section('page-script')
    <script src="{{ asset('js/jQuery-Mask-Plugin-master/jquery.mask.js') }}"></script>
    <script>

        var sumaBloques = 0;

        $(document).ready(function () {
            $('.loader-bg').hide();

            $('#form_reseva_de_horas_id_procedimiento').select2();

            // Evento al cambiar selección
            $('#form_reseva_de_horas_id_procedimiento').on('change', function() {
                sumaBloques = 0;

                const seleccionados = $(this).find('option:selected');
                const idsSeleccionados = [];

                seleccionados.each(function() {
                    // Sumar los bloques (convertir a número con +)
                    sumaBloques += +$(this).data('cant_bloque');
                    idsSeleccionados.push($(this).val());
                });

                // Resultados
                // console.log("IDs seleccionados:", idsSeleccionados);
                // console.log("Total de bloques:", sumaBloques);

                $('#total_bloques_procedimientos').val(sumaBloques);
            });

            cargarBox();

            $('.mask_date').mask("dd/mm/0000", {
                'translation': {
                    0: {pattern: /[0-9]/},
                    d: {pattern: /[0-9]/},
                    m: {pattern: /[0-9]/},
                    Y: {
                        pattern: function (value) {
                            // Eliminar cualquier carácter que no sea un dígito
                            value = value.replace(/\D/g, '');

                            // Validar el año para que esté entre 1924 y 2024
                            if (value.length === 4) {
                                var year = parseInt(value, 10);
                                return year >= {{ date('Y')-110 }} && year <= {{ date('Y') }};
                            }
                            return true; // Permitir cualquier valor mientras se está escribiendo
                        }
                    }
                },
                onKeyPress: function(value, e, field, options) {
                    $('#mensaje_reserva_hora_fecha_nac').html('');
                    $('#mensaje_reserva_hora_fecha_nac').hide();
                    // Forzar la validación después de cada tecla presionada
                    var year = value.split('/')[2];
                    if (year)
                    {
                        var year_txt = year.toString();
                        if(year_txt.length >= 4)
                        {
                            $('#mensaje_reserva_hora_fecha_nac').html('');
                            $('#mensaje_reserva_hora_fecha_nac').hide();
                            if (year && (year < {{ date('Y')-110 }} || year > {{ date('Y') }} ))
                            {

                                $('#mensaje_reserva_hora_fecha_nac').html('');
                                $('#mensaje_reserva_hora_fecha_nac').show();
                                $('#mensaje_reserva_hora_fecha_nac').html('La fecha cargada no es valida');

                                // field.val('');
                                console.log('validacion:');
                                console.log(year);
                            }

                            if (validarEdad(value)) {
                                console.log("La edad es válida.");
                                $('#mensaje_reserva_hora_fecha_nac').html('');
                                $('#mensaje_reserva_hora_fecha_nac').hide();
                                validar_email_agenda();
                                validar_campo_telefono();
                            } else {
                                console.log("La edad no es válida.");
                                $("#guardar_reserva_paciente").prop('disabled', true);
                                $('#mensaje_reserva_hora_fecha_nac').html('');
                                $('#mensaje_reserva_hora_fecha_nac').show();
                                $('#mensaje_reserva_hora_fecha_nac').html('La fecha cargada no es valida');
                            }


                        }
                    }
                }
            });
        });

        function cargarBox()
        {
            $('#agenda_box').html('');
            let url = "{{ route('laboratorio.box') }}";
            var id_lugar_atencion = $('#agenda_sucursal option:selected').attr('data-id_lugar_atencion');

            $('#id_lugar_atencion').val(id_lugar_atencion);

            $.ajax({

                url: url,
                type: "get",
                data: {
                    id_lugar_atencion: id_lugar_atencion,
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    if (data.estado == 1)
                    {
                        data.registros.forEach(element => {
                            var html = '<option value="'+element.id+'">'+element.tipo_box+'</option>';
                            $('#agenda_box').append(html);
                        });

                        $('#agenda_box').prop('selectedIndex', 0);

                        cargarAgendaSucursal();
                    }
                    else
                    {
                        swal({
                            title: "Carga de Box",
                            text: "Falla en Actualización.\nIntente de nuevo.",
                            icon: "error",
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Carga de Box",
                        text: "Falla en Actualización.\nIntente de nuevo.",
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cargarAgendaSucursal(fecha = '')
        {
            let url = "{{ route('laboratorio.sucursal.horario.agenda') }}";

            var id_sucursal = $('#agenda_sucursal').val();
            var id_lugar_atencion = $('#agenda_sucursal option:selected').attr('data-id_lugar_atencion');
            var id_box = $('#agenda_box').val();

            $.ajax({

                url: url,
                type: "get",
                data: {
                    id_sucursal: id_sucursal,
                    id_lugar_atencion: id_lugar_atencion,
                    id_box: id_box,
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    if (data.estado == 1)
                    {
                        console.log(data);
                        console.log(fecha);
                        agendaCalendario(data, fecha, id_lugar_atencion, id_box);
                    }
                    else
                    {
                        swal({
                            title: "Carga de agenda",
                            text: "Falla en Actualización.\nIntente de nuevo.",
                            icon: "error",
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Carga de agenda",
                        text: "Falla en Actualización.\nIntente de nuevo.",
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function agendaCalendario(data, fecha, id_lugar_atencion, id_box)
        {
            if(data.estado == 1 && data.horario.length!=0)
            {
                // $('#tabla_info_profesional').show();
                // $('#seccion_agenda_botones').show();
                // $('#seccion_agenda_agendas').show();
                // $('#nombre_profesional_agenda').html(data.profesional.nombre.toUpperCase()  + ' ' + data.profesional.apellido_uno.toUpperCase()  + ' ' + data.profesional.apellido_dos.toUpperCase() );

                // var especialidad = '';
                // especialidad += data.especialidad.nombre.toUpperCase() +'<br>';
                // especialidad += data.tipo_especialidad.nombre.toUpperCase() +'<br>';
                // if(data.sub_tipo_especialidad != '')
                //     especialidad += data.sub_tipo_especialidad.nombre.toUpperCase() +'<br>';
                // $('#especialidad_porfesional_agenda').html(especialidad);
                // $('#btn_ver_info_profesional_seleccionado').attr('onclick','info_profesional('+data.profesional.id+');');

                // $('#img_profesional').attr('src', data.profesional.img_profesional);

                // if(data.horario.length > 0)
                // {
                //     info_profesional_seleccionado['profesional'] = data.profesional;
                //     info_profesional_seleccionado['horario'] = data.horario;
                //     info_profesional_seleccionado['horario_data'] = data.horario_data;
                //     evaluacion =  true;
                // }
                // else
                // {
                //     evaluacion =  false;
                // }

                // // carga de examenes posibles por el profesional
                // $('#m_hora_examen_lista_examenes').html('<option value="">Seleccione</option>');
                // if(data.examen_tipo != null && data.examen_tipo != '')
                // {
                //     data.examen_tipo.forEach(element => {
                //         $('#m_hora_examen_lista_examenes').append('<option value="'+element.id+'">'+element.nombre+'</option>');
                //     });
                // }

                if(fecha != undefined && fecha != '')
                {
                    var res = fecha.split('T')[0];
                    fecha = res;
                }
                else
                {
                    fecha = '{{ date("Y-m-d") }}';
                }

                evaluacion =  true;
                if(evaluacion)
                {
                    var calendarEl = document.getElementById('agenda');
                    CalendarEl = new FullCalendar.Calendar(calendarEl, {
                        droppable: false,
                        editable: false,
                        locale: "es",
                        timeZone: 'local',
                        initialDate: fecha,
                        initialView: 'timeGridWeek',
                        themeSystem: 'bootstrap',
                        slotDuration: data.horario_data.periodo_agenda,
                        // slotMinutes: '00:15:00',
                        headerToolbar: {
                            //start: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek', // will normally be on the left. if RTL, will be on the right
                            //center: 'title',
                            //end: 'today prev,next'
                            start: 'prev,next today',
                            center: 'title',
                            // right: 'timeGridWeek,listWeek'
                            right: 'timeGridWeek,listWeek'
                        },
                        // timeGrid: 60,
                        //navLinks: true,
                        weekends: true,
                        nowIndicator: true,
                        selectable: true,
                        //dayMaxEvents: true,
                        titleFormat: {
                            year: 'numeric',
                            month: 'numeric',
                            day: 'numeric'
                        },
                        allDaySlot: false,
                        expandRows: true,
                        slotEventOverlap: false,

                        selectConstraint: "businessHours",
                        slotLabelFormat: {
                            hour: 'numeric',
                            minute: '2-digit',
                            omitZeroMinute: false,
                            meridiem: 'medium'
                        },
                        eventDidMount: function(info) {
                            $(info.el).tooltip({
                                title: info.event.extendedProps.description,
                                placement: "top",
                                trigger: "hover",
                                container: "body"
                            });
                        },

                        events: function(start, end, callback){
                            var arrayTemp = [];
                            let url = "{{ route('hora_medica.ver') }}";

                            $.ajax({
                                url: url,
                                type: "GET",
                                data: {
                                    id_lugar_atencion: id_lugar_atencion,
                                    id_box: id_box,
                                },
                                success:function(data){
                                    if (data !== 'null')
                                    {
                                        //data = JSON.parse(data);
                                        console.log('-----------------------');
                                        console.log(data);
                                        console.log('-----------------------');
                                        if(data.estado == 1)
                                        {
                                            // var arraytemp = [];
                                            // arraytemp.push([id=>'11']);
                                            // console.log(arraytemp)
                                            var arrayTemp = [];
                                            data.registros.forEach(element => {
                                                var rut = element.paciente.rut+' | '
                                                var valor = element.estado.valor+' | '
                                                var comentarios_confirmacion = '';
                                                if(comentarios_confirmacion != 'null')
                                                    comentarios_confirmacion = element.comentarios_confirmacion+' | '
                                                var nombre = element.paciente.prevision.nombre
                                                var descripcion = '';

                                                if(element.tipo_hora_medica == 'B')
                                                {
                                                    descripcion += valor;
                                                    arrayTemp.push({
                                                                    id: element.id,
                                                                    title: element.descripcion,
                                                                    description: descripcion ,
                                                                    start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                                    end: element.fecha_consulta + 'T' + element.hora_termino,
                                                                    backgroundColor: element.estado.color
                                                    });
                                                }
                                                else
                                                {
                                                    descripcion += rut;
                                                    descripcion += valor;
                                                    descripcion += comentarios_confirmacion;
                                                    descripcion += nombre;
                                                    arrayTemp.push({
                                                                    id: element.id,
                                                                    title: element.tipo_hora_medica+' - '+element.descripcion,
                                                                    description: descripcion ,
                                                                    start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                                    end: element.fecha_consulta + 'T' + element.hora_termino,
                                                                    backgroundColor: element.estado.color
                                                    });
                                                }
                                            });
                                            console.log(arrayTemp);
                                            console.log('aqui');
                                            end(arrayTemp);
                                        }
                                        else
                                        {
                                            console.log('falla en carga');
                                        }
                                    }
                                }
                            });
                        },

                        eventClick: function(info) {
                            $('#seccion_examenes').html('');

                            let id_hora_medica = info.event.id;
                            let url = "{{ route('agenda.buscar_hora_medica') }}"

                            $.ajax({

                                url: url,
                                type: "get",
                                data: {
                                    //_token: _token,
                                    id_hora_medica: id_hora_medica,
                                },
                            })
                            .done(function(data) {
                                console.log('hola');
                                console.log(data);

                                if (data != null) {

                                    $('#reserva_hora_id_paciente_asistente').val(data.paciente.id);
                                    $('#datos_consulta_rut').text(data.paciente.rut);
                                    $('#datos_consulta_nombre').text(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                    $('#input_reserva_hora_nombre_asistente').val(data.paciente.nombres);
                                    $('#input_reserva_hora_apellido_uno_asistente').val(data.paciente.apellido_uno);
                                    $('#input_reserva_hora_apellido_dos_asistente').val(data.paciente.apellido_dos);
                                    $('#datos_consulta_edad').text(data.paciente.fecha_nac);
                                    $('#input_reserva_fecha_nacimiento_asistente').val(data.paciente.fecha_nac);
                                    $('#datos_consulta_email').text(data.paciente.email);
                                    $('#input_reserva_hora_email_asistente').val(data.paciente.email);
                                    $('#datos_consulta_telefono').text(data.paciente.telefono_uno);
                                    $('#input_reserva_hora_telefono_asistente').val(data.paciente.telefono_uno);

                                    if (data.paciente.sexo == 'M') {
                                        $('#datos_consulta_sexo').text('Masculino');
                                        $('#input_reserva_sexo_asistente').val('M');
                                    } else {
                                        $('#datos_consulta_sexo').text('Femenino');
                                        $('#input_reserva_sexo_asistente').val('F');
                                    }

                                    // $('#estado_id_profesional').val(data.profesional.id);
                                    $('#estado_id_paciente').val(data.paciente.id);
                                    $('#id_hora_medica').val(id_hora_medica);

                                    //celeste
                                    //Reservada
                                    if (data.estado_hora == 1) //else if (info.event.backgroundColor == '#FEAA32')
                                    {
                                        //'Reservada') //Hora pendiente
                                        $('#hm_anular_hora').show();
                                        $('#hm_atender_hora').hide();
                                        $('#hm_confirmar_hora').show();
                                        $('#hm_ver_hora').hide();
                                        $('#hm_espera_paciente_hora').hide();
                                        $('#confirmar_anulacion_hora').hide();
                                        $('#confirmacion_hora').hide();

                                        $('#cabecera_hora_medica').text('Datos Del Paciente');

                                        if(data?.["procedimiento"] !== undefined)
                                        {
                                            if(data.procedimiento != '')
                                            {
                                                // Generar la lista ordenada
                                                var lista_examen = '<strong>Examenes</strong>';
                                                lista_examen += '<ul class="lista-examenes">';
                                                data.procedimiento.forEach(function(examen) {
                                                    lista_examen += `<li>${examen.nombre}</li>`;
                                                });
                                                lista_examen += '</ul>';
                                                $('#seccion_examenes').html(lista_examen);
                                            }
                                        }

                                        $('#consulta_adm').modal('show');

                                    }
                                    //verde
                                    // CONFIRMADO
                                    else if(data.estado_hora == 2)//if (info.event.backgroundColor == '#94BF61')
                                    {
                                        console.log(data.paciente);
                                        console.log(info.event.id);

                                        $('#modal_recepcion_bonos_api').modal('show');

                                        /** PESTAÑA DE RECIBIR PAGO */
                                        $('#bono_paciente_rut').val(data.paciente.rut);
                                        $('#bono_paciente_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                        $('#bono_profesional_nombre').val(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
                                        $('#bono_profesional_rut').val( data.profesional.rut);


                                        $('#bono_hora_medica').val(info.event.id);
                                        $('#bono_id_profesional').val(data.profesional.id);
                                        $('#bono_id_paciente').val(data.paciente.id);
                                        $('#bono_prevision').val(data.paciente.id_prevision);
                                        $('#bono_prevision_txt').val( $('#bono_prevision option:selected').text() );

                                        if(data?.["procedimiento"] !== undefined)
                                        {
                                            if(data.procedimiento != '')
                                            {
                                                var total_valor = 0;
                                                // Generar la lista ordenada
                                                var lista_examen = '<strong>Examenes</strong>';
                                                lista_examen += '<ul class="lista-examenes">';
                                                data.procedimiento.forEach(function(examen) {
                                                    lista_examen += `<li>${examen.nombre}</li>`;
                                                    total_valor += examen.valor;
                                                });
                                                lista_examen += '</ul>';
                                                $('#seccion_examenes').html(lista_examen);

                                                // valor
                                                $('#bono_valor_consulta').val(total_valor);
                                            }
                                            else
                                            {
                                                $('#bono_valor_consulta').val('');
                                            }
                                        }
                                        else
                                        {
                                            $('#bono_valor_consulta').val('');
                                        }


                                        /** PESTAÑA DE VENTA DE BONO */
                                        $('#venta_rut').val(data.paciente.rut);
                                        $('#venta_serie').val('');
                                        $('#venta_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                        $('#venta_paciente_nombre').val(data.paciente.nombres);
                                        $('#venta_paciente_apellido_uno').val(data.paciente.apellido_uno);
                                        $('#venta_paciente_apellido_dos').val(data.paciente.apellido_dos);
                                        $('#venta_paciente_email').val(data.paciente.email);
                                        $('#venta_previsioon').val('0');
                                        $('#venta_folio').val('');
                                        $('#venta_valor_consulta').val('');
                                        $('#venta_valor_pagar').val('');
                                        $('#venta_valor_seguro').val('');
                                        $('#venta_valor_copago').val('');

                                        $('.venta_autorizada').hide();

                                        $('#div_btn_pedir_autorizacion').show();

                                    }
                                    //rojo
                                    //Rechazada
                                    else if(data.estado_hora == 3)//else if (info.event.backgroundColor == '#FF3D3D')
                                    {
                                        // 'Rechazada')//Hora cancelada
                                        $('#hm_anular_hora').hide();
                                        $('#hm_atender_hora').hide();
                                        $('#hm_confirmar_hora').hide();
                                        $('#hm_espera_paciente_hora').hide();
                                        $('#hm_ver_hora').hide();
                                        $('#confirmar_anulacion_hora').hide();
                                        $('#confirmacion_hora').hide();

                                        $('#cabecera_hora_medica').text('Datos Del Paciente');

                                        if(data?.["procedimiento"] !== undefined)
                                        {
                                            if(data.procedimiento != '')
                                            {
                                                // Generar la lista ordenada
                                                var lista_examen = '<strong>Examenes</strong>';
                                                lista_examen += '<ul class="lista-examenes">';
                                                data.procedimiento.forEach(function(examen) {
                                                    lista_examen += `<li>${examen.nombre}</li>`;
                                                });
                                                lista_examen += '</ul>';
                                                $('#seccion_examenes').html(lista_examen);
                                            }
                                        }

                                        $('#consulta_adm').modal('show');

                                    }
                                    //morado
                                    // Espera -- Llamando
                                    else if (data.estado_hora == 4 || data.estado_hora == 8) //else if (info.event.backgroundColor == '#A06CC1')
                                    {
                                        // 'Espera')//Esperando atención
                                        // 'Llamando')//Esperando atención
                                        $('#hm_anular_hora').hide();
                                        $('#hm_atender_hora').show();
                                        $('#hm_confirmar_hora').hide();
                                        $('#hm_ver_hora').hide();
                                        $('#hm_espera_paciente_hora').hide();
                                        $('#confirmar_anulacion_hora').hide();
                                        $('#confirmacion_hora').hide();

                                        $('#cabecera_hora_medica').text('Datos Del Paciente');

                                        if(data?.["procedimiento"] !== undefined)
                                        {
                                            if(data.procedimiento != '')
                                            {
                                                // Generar la lista ordenada
                                                var lista_examen = '<strong>Examenes</strong>';
                                                lista_examen += '<ul class="lista-examenes">';
                                                data.procedimiento.forEach(function(examen) {
                                                    lista_examen += `<li>${examen.nombre}</li>`;
                                                });
                                                lista_examen += '</ul>';
                                                $('#seccion_examenes').html(lista_examen);
                                            }
                                        }

                                        $('#consulta_adm').modal('show');

                                    }
                                    //rosa
                                    //Realizando
                                    else if (data.estado_hora == 5) //else if (info.event.backgroundColor == '#EDBB99')
                                    {
                                        //'Realizando')
                                        $('#hm_anular_hora').hide();
                                        $('#hm_atender_hora').show();
                                        $('#hm_confirmar_hora').hide();
                                        $('#hm_ver_hora').hide();
                                        $('#hm_espera_paciente_hora').hide();
                                        $('#confirmar_anulacion_hora').hide();
                                        $('#confirmacion_hora').hide();

                                        $('#cabecera_hora_medica').text('Datos Del Paciente');

                                        if(data?.["procedimiento"] !== undefined)
                                        {
                                            if(data.procedimiento != '')
                                            {
                                                // Generar la lista ordenada
                                                var lista_examen = '<strong>Examenes</strong>';
                                                lista_examen += '<ul class="lista-examenes">';
                                                data.procedimiento.forEach(function(examen) {
                                                    lista_examen += `<li>${examen.nombre}</li>`;
                                                });
                                                lista_examen += '</ul>';
                                                $('#seccion_examenes').html(lista_examen);
                                            }
                                        }

                                        $('#consulta_adm').modal('show');

                                    }
                                    //azul
                                    // Realizada
                                    else if (data.estado_hora == 6)//else if (info.event.backgroundColor == '#17C1C1')
                                    {
                                        //'Realizada')//Paciente atendido
                                        $('#hm_anular_hora').hide();
                                        $('#hm_atender_hora').hide();
                                        $('#hm_confirmar_hora').hide();
                                        $('#hm_ver_hora').hide();
                                        $('#hm_espera_paciente_hora').hide();
                                        $('#confirmar_anulacion_hora').hide();
                                        $('#confirmacion_hora').hide();

                                        $('#cabecera_hora_medica').text('Datos Del Paciente');

                                        if(data?.["procedimiento"] !== undefined)
                                        {
                                            if(data.procedimiento != '')
                                            {
                                                // Generar la lista ordenada
                                                var lista_examen = '<strong>Examenes</strong>';
                                                lista_examen += '<ul class="lista-examenes">';
                                                data.procedimiento.forEach(function(examen) {
                                                    lista_examen += `<li>${examen.nombre}</li>`;
                                                });
                                                lista_examen += '</ul>';
                                                $('#seccion_examenes').html(lista_examen);
                                            }
                                        }

                                        $('#consulta_adm').modal('show');

                                    }
                                    //naranjo
                                    //Inasistida
                                    else if (data.estado_hora == 7)//else if (info.event.backgroundColor == '#F9A825')
                                    {
                                        //'Inasistida')
                                        $('#hm_anular_hora').hide();
                                        $('#hm_atender_hora').hide();
                                        $('#hm_confirmar_hora').hide();
                                        $('#hm_ver_hora').hide();
                                        $('#hm_espera_paciente_hora').hide();
                                        $('#confirmar_anulacion_hora').hide();
                                        $('#confirmacion_hora').hide();

                                        $('#cabecera_hora_medica').text('Datos Del Paciente');

                                        if(data?.["procedimiento"] !== undefined)
                                        {
                                            if(data.procedimiento != '')
                                            {
                                                // Generar la lista ordenada
                                                var lista_examen = '<strong>Examenes</strong>';
                                                lista_examen += '<ul class="lista-examenes">';
                                                data.procedimiento.forEach(function(examen) {
                                                    lista_examen += `<li>${examen.nombre}</li>`;
                                                });
                                                lista_examen += '</ul>';
                                                $('#seccion_examenes').html(lista_examen);
                                            }
                                        }

                                        $('#consulta_adm').modal('show');

                                    }

                                }
                                else
                                {

                                    swal({
                                        title: "Paciente no encontrado en el sistema",
                                        icon: "error",
                                        buttons: "Aceptar",
                                        DangerMode: true,
                                    })
                                    // alert('Paciente no encontrado en el sistema');
                                }

                            })
                            .fail(function(jqXHR, ajaxOptions, thrownError) {
                                console.log(jqXHR, ajaxOptions, thrownError)
                            });


                            $('#datos_hora_medica').show();
                            $('#cancelacion_hora_medica').hide();
                            $('#confirmacion_hora_medica').hide();
                            /*$('#opcion_cancelar_hora_div').hide();*/
                            $('#id_hora_medica').val(info.event.id);
                            $('#id_hora_realizar').val(info.event.id);
                            $('#lugar_atencion_id').val(id_lugar_atencion);
                            info.el.style.borderColor = 'red';
                        },

                        selectOverlap: function(event) {
                            {{--  console.log(event);  --}}
                            return event.rendering === 'background';
                        },

                        dateClick: function(date, jsEvent, view) {

                            var valido = 1;
                            var valido_fecha = 1;
                            /** VALIDACION DE FUERA DE HORARIO */
                            // $.each(date.jsEvent.path, function(index, value)
                            $.each(date.jsEvent.srcElement.classList, function(index, value)
                            {
                                // console.log(value);
                                if(value == 'fc-non-business')
                                {
                                    swal({
                                        title: "Toma de Hora",
                                        text: "Horario no disponible con el Profesional",
                                        icon: "error",
                                        buttons: "Aceptar",
                                        DangerMode: true,
                                    })
                                    valido = 0;
                                }

                            });

                            if(valido == 1)
                            {

                                {{--  console.log(date.date);  --}}
                                {{--  console.log(date.dateStr);  --}}
                                var date_str = date.dateStr.replace('T',' ');
                                var date_DD = new Date(date_str);
                                var curr_date = date_DD.getDate();
                                var curr_month = date_DD.getMonth();
                                var curr_year = date_DD.getFullYear();
                                var curr_hour = date_DD.getHours();
                                var curr_mint = date_DD.getMinutes();
                                var fecha_seleccionada = curr_year+"-"+curr_month+"-"+curr_date+" "+curr_hour+":"+curr_mint;
                                $.each(CalendarEl.getEvents(), function( index, value ) {
                                    var date_str2 = value.startStr.replace('T',' ');
                                    var date_DD2 = new Date(date_str2);
                                    var curr_date2 = date_DD2.getDate();
                                    var curr_month2 = date_DD2.getMonth();

                                    var curr_year2 = date_DD2.getFullYear();
                                    var curr_hour2 = date_DD2.getHours();
                                    var curr_mint2 = date_DD2.getMinutes();
                                    var fecha_evento = curr_year2+"-"+curr_month2+"-"+curr_date2+" "+curr_hour2+":"+curr_mint2;

                                    if($.trim(fecha_seleccionada) == $.trim(fecha_evento))
                                    {
                                        valido = 0;
                                    }
                                });

                                /** VALIDAR BLOQUEO */
                                CalendarEl.getEvents().forEach(function(event) {
                                    var eventEnd = typeof event.end === 'string' ? moment(event.end) : event.end;
                                    if (date.date >= event.start && date.date <= eventEnd) {
                                        valido = 0;
                                        console.log('Existe un evento en esta fecha: ' + event.title);
                                        console.log(date.date);
                                        console.log(event.start);
                                        console.log(eventEnd);

                                        swal({
                                            title: "Toma de Hora",
                                            text: "El profesional no atiende en este periodo.",
                                            icon: "error",
                                            buttons: "Aceptar",
                                            DangerMode: true,
                                        });
                                        return false;
                                    }

                                });

                                /** validar  dias pasados */
                                var diaActual = '{{ date('d') }}';
                                var mesActual = '{{ date('m')-1 }}';
                                var anioActual = '{{ date('Y') }}';

                                var fecha_actual = new Date(anioActual, mesActual, diaActual);
                                var fecha_seleccion = new Date(curr_year, curr_month, curr_date);

                                if(fecha_actual > fecha_seleccion){
                                    console.log("fecha_actual > fecha_seleccion");
                                    valido_fecha = 0;
                                }
                                if(fecha_actual <= fecha_seleccion){
                                    console.log("fecha_actual < fecha_seleccion");
                                    valido_fecha = 1;
                                }


                                if(valido == 1)
                                {
                                    if(valido_fecha == 1)
                                    {
                                        $('.div_rut_buscar').show();
                                        $('#agenda_agregar_paciente').modal('show');
                                        $('#reserva_datos_paciente').hide();
                                        $('#div_procedimiento').hide();
                                        $('#rut_paciente_reserva').val('');
                                        $('#reserva_agregar_paciente_hora').hide();
                                        $('#fecha_consulta').val(date.dateStr);
                                    }
                                    else
                                    {
                                        swal({
                                            title: "Seleccion Fecha",
                                            text: "No Puede tomar Hora en Fechas Anterior a la actual",
                                            icon: "error",
                                            buttons: "Aceptar",
                                            DangerMode: true,
                                        })
                                    }
                                }
                                else
                                {
                                    swal({
                                        title: "Toma de Hora",
                                        text: "Hora con profesional ya esta tomada",
                                        icon: "error",
                                        buttons: "Aceptar",
                                        DangerMode: true,
                                    })
                                }
                            }
                        },
                        eventDrop: function(info) {
                            {{--  console.log(info);  --}}
                            return false;
                        },

                    });

                    var data_businessHours = [];
                    $.each(data.horario, function(key, value){
                        var dias =  value.dia.split(",");
                        data_businessHours.push({
                            'daysOfWeek': dias ,
                            'startTime': value.hora_inicio,
                            'endTime': value.hora_termino
                        });
                    })
                    var tem_hiddenDays = data.horario_data.horario_agenda.split(",");
                    var tem_hiddenDays2 =[];

                    $.each(tem_hiddenDays, function(key, value){
                        {{--  console.log(value);  --}}
                        tem_hiddenDays2.push(parseInt(value));
                    });

                    CalendarEl.setOption('hiddenDays',tem_hiddenDays2  );
                    CalendarEl.setOption('businessHours', data_businessHours );
                    CalendarEl.setOption('slotMinTime', data.horario_data.hora_inicio_agenda );
                    CalendarEl.setOption('slotMaxTime', data.horario_data.hora_termino_agenda );
                    {{--  console.log(CalendarEl.getOption('hiddenDays'));  --}}
                    {{--  console.log(CalendarEl.getOption('businessHours'));  --}}
                    {{--  console.log(CalendarEl.getOption('slotMinTime'));  --}}
                    {{--  console.log(CalendarEl.getOption('slotMaxTime'));  --}}

                    CalendarEl.render();

                    /** registra la fecha de la semana en la vista */
                    CalendarEl.on('datesSet', function(info) {
                        activeDaysInRange = [];
                        var dia_inicio = CalendarEl.view.currentStart;
                        var dia_fin = CalendarEl.view.currentEnd;
                        var array_activos = CalendarEl.getCurrentData().dateProfileGenerator.isHiddenDayHash;
                        getInactiveDays(dia_inicio, dia_fin, array_activos);
                        console.log('activeDaysInRange2:', activeDaysInRange);
                    })

                    if(fecha != '' && fecha != null)
                        CalendarEl.gotoDate(fecha);


                    {{--   console.log(calendarEl);  --}}

                    // var event = calendarEl.getEventById('107');
                    {{--   console.log(event);  --}}
                    // var start = event.start;
                    {{--   console.log(start.toISOString());  --}}
                }
                else
                {
                    swal({
                        title: "Agenda del Profesional.",
                        text:"El profesional no cuenta con agenda.",
                        icon: "error",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    evaluacion =  false;
                    $('#agenda').html('');
                    $('#titulo_tipo_agenda').html('');
                    // $('#tabla_info_profesional').hide();
                    // $('#seccion_agenda_botones').hide();
                    // $('#seccion_agenda_agendas').hide();
                }
            }
            else
            {
                swal({
                    title: "Agenda del Profesional.",
                    text:"El profesional no cuenta con agenda.",
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                evaluacion =  false;
                $('#agenda').html('');
                $('#titulo_tipo_agenda').html('');
                $('#tabla_info_profesional').hide();
                $('#seccion_agenda_botones').hide();
                $('#seccion_agenda_agendas').hide();
            }
        }

        function getInactiveDays(startDate, endDate, activeDays)
        {
            const diffInDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));

            for (let i = 0; i <= diffInDays; i++)
            {
                const day = new Date(startDate.getTime() + i * 1000 * 60 * 60 * 24);
                if (!activeDays[day.getDay()]) {
                    activeDaysInRange.push(day);
                }
            }

            return activeDaysInRange;
        }


        function buscar_paciente() {
            $('#form_reseva_de_horas').submit(function(e) {
                e.preventDefault();
            });

            $('#reserva_hora_nombres_paciente').val('');
            $('#reserva_hora_apellido_uno').val('');
            $('#reserva_hora_apellido_dos').val('');
            $('#reserva_hora_fecha_nac').val('');
            $('#reserva_hora_sexo').val('');
            $('#reserva_hora_convenio').val('');
            $('#reserva_hora_direccion').val('');
            $('#reserva_hora_numero_dir').val('');
            $('#ciudad_agregar').val('');
            $('#reserva_hora_correo').val('');
            $('#reserva_hora_telefono_uno').val('');
            $('#reserva_hora_confirmacion').val('');
            $('#reserva_representante_nuevo_exitente').val('');
            $('#reserva_representante_id').val('');
            $('#reserva_representante_id_usuario').val('');
            $('#reserva_hora_representante_rut').val('');
            $('#reserva_hora_representante_nombres_paciente').val('');
            $('#reserva_hora_representante_apellido_uno').val('');
            $('#reserva_hora_representante_apellido_dos').val('');
            $('#reserva_hora_representante_fecha_nac').val('');
            $('#reserva_hora_representante_sexo').val('');
            $('#reserva_hora_representante_convenio').val('');
            $('#reserva_hora_representante_direccion').val('');
            $('#reserva_hora_representante_numero_dir').val('');
            $('#reserva_hora_representante_region_agregar').val('');
            $('#reserva_hora_representante_ciudad_agregar').val('');
            $('#reserva_hora_representante_correo').val('');
            $('#reserva_hora_representante_telefono_uno').val('');
            $('#reserva_hora_representante_agregar_relacion').val('');
            evaluar_edad();
            $('.div_representante_nuevo').hide();
            $('.div_representante_existente').hide();
             $('#div_procedimiento').hide();


            validar_campo_telefono();
            validar_campo_telefono_representante();

            let rut = $('#rut_paciente_reserva').val();

            if(rut != '')
            {
                $('#reserva_agregar_paciente_hora').hide();
                $('#reserva_datos_paciente').hide();
                let url = "{{ route('profesional.buscar_rut_paciente') }}";

                $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        rut: rut,
                    },
                })
                .done(function(data) {

                    console.log(JSON.parse(data));
                    if (data !== 'null') {

                        $('#div_procedimiento').show();

                        data = JSON.parse(data);
                        if (data.tipo_paciente == 'SI') {


                            $('.paciente_view').show();
                            $('.paciente_edit').hide();

                            {{--  console.log(data);  --}}
                            $('#reserva_datos_paciente').show();
                            $('#reserva_hora_id_paciente').val(data.id);
                            $('#bono_id_paciente').val(data.id);
                            $('#reserva_rut_paciente').text(data.rut);

                            $('#reserva_hora_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
                            $('#input_reserva_hora_nombre').val(data.nombres);
                            $('#input_reserva_hora_apellido_uno').val(data.apellido_uno);
                            $('#input_reserva_hora_apellido_dos').val(data.apellido_dos);

                            $('#reserva_fecha_nacimiento').text(data.fecha_nac);
                            $('#input_reserva_fecha_nacimiento').val(DateFormatVista(data.fecha_nac));

                            if (data.sexo == 'M') {
                                $('#reserva_sexo').text('Masculino');
                            } else {
                                $('#reserva_sexo').text('Femenino');
                            }
                            $('#input_reserva_hora_sexo').val(data.sexo);

                            $('#reserva_hora_email').text(data.email);
                            $('#input_reserva_hora_email').val(data.email);

                            $('#reserva_hora_telefono').text(data.telefono_uno);
                            $('#input_reserva_hora_telefono').val(data.telefono_uno);

                            $('#reserva_convenio').text(data.prevision.nombre);
                            $('#input_reserva_convenio').val(data.prevision.id);

                            $('#reserva_direccion').text(data.direccion.direccion+' '+data.direccion.numero_dir+', '+data.direccion.ciudad.nombre);
                            $('#input_reserva_direccion_direccion').val(data.direccion.direccion);
                            $('#input_reserva_direccion_numero_dir').val(data.direccion.numero_dir);

                            $('#input_reserva_direccion_region').val(data.direccion.ciudad.id_region);
                            // $('#input_reserva_direccion_ciudad_agregar').val(data.direccion.ciudad.id);
                            buscar_ciudad_general('input_reserva_direccion_region', 'input_reserva_direccion_ciudad', data.direccion.ciudad.id);

                            $('#rut_paciente_reserva').val('');
                            $('.div_rut_buscar').hide();

                            $('#reserva_hora_edad').val(data.edad);

                            // $('#id_lugar_atencion').val($('#agenda_lugar_atencion_asistente').val());
                            $('#contenedor_tratamientos_presupuesto').hide();
                            $('#presupuesto_numero').empty();
                            $('#presupuesto_numero').append('<option>Seleccione el presupuesto </option>');
                            console.log(data.presupuestos);
                            if(data.presupuestos?.length > 0){
                                data.presupuestos.forEach(p => {
                                    $('#presupuesto_numero').append(`<option value="${p.id}" data-total="${p.valor_total}">${p.id} - ${p.fecha}</option>`);
                                });
                            }else{
                                $('#presupuesto_numero').append(`<option value="0">Primera consulta</option>`);
                            }

                            if (data.edad < 18) {
                                $('#acompanante_representante').prop("checked", true);
                                $('#acompanante_acompanante').prop("checked", false);
                                $('#autorizacion_atencion').prop("checked", false);

                                $('#div_info_representante').html(data.nombre_responsable);

                                $('#reserva_hora_id_acompanante').html('');
                                $.each(data.acompanante, function(indexInArray, valueOfElement) {
                                    console.log(valueOfElement);
                                    var html = '';
                                    html = '<option value="' + valueOfElement.id_acompanante + '">' +
                                        valueOfElement.acompanante.nombre + ' ' + valueOfElement.acompanante
                                        .apellido_uno + ' - ' + valueOfElement.acompanante.rut + '</option>';
                                    $('#reserva_hora_id_acompanante').append(html);
                                });
                                $('#reserva_hora_id_acompanante').select2();

                                $('#reserva_hora_id_responsable').val(data.id_responsable);

                                $('#seccion_acompanante').show();
                                $('#seccion_autorizacion').show();
                            } else {
                                $('#acompanante_representante').prop("checked", false);
                                $('#acompanante_acompanante').prop("checked", false);
                                $('#autorizacion_atencion').prop("checked", false);
                                $('#reserva_hora_id_acompanante').val('');


                                $('#reserva_hora_id_responsable').val('');

                                $('#seccion_acompanante').hide();
                                $('#seccion_autorizacion').hide();
                            }

                        }
                        else
                        {
                            $('#reserva_datos_paciente').hide();
                            $('#reserva_agregar_paciente_hora').show();
                            let regiones = data.regiones;
                            console.log(regiones);

                            regiones.forEach(function(region) {
                                let opcion = `<option value="${region.id}">${region.nombre}</option>`;
                                $('#region_agregar').append(opcion);
                            });

                            $('#div_procedimiento').hide();

                            // $('#reserva_hora_nombres_paciente').val(data.nombres);
                            // $('#reserva_hora_apellido_uno').val(data.apellido_uno);
                            // $('#reserva_hora_apellido_dos').val(data.apellido_dos);
                            // if(data.fecha_nac != null)
                            //     $('#reserva_hora_fecha_nac').val((DateFormatVista(data.fecha_nac)));

                            // if (data.sexo != null)
                            //     $('#reserva_hora_sexo').val(data.sexo);
                            // else
                            //     $('#reserva_hora_sexo').val(0);


                            // $('#reserva_hora_correo').val(data.email);
                            // $('#region_agregar').val(data.direccion.ciudad.id_region);
                            // buscar_ciudad(data.direccion.id_ciudad);
                            // $('#reserva_hora_direccion').val(data.direccion.direccion);
                            // $('#reserva_hora_numero_dir').val(data.direccion.numero_dir);

                            // $('#reserva_hora_telefono_uno').val(data.telefono_uno);

                            // {{--
                            // $('#reserva_hora_profesion').val();
                            // $('#reserva_hora_convenio').val();
                            // $('#reserva_hora_descripcion').val();
                            // --}}
                            // validar_email_agenda();
                            // validar_campo_telefono();
                        }

                    } else {
                        $('#reserva_datos_paciente').hide();
                        $('#reserva_agregar_paciente_hora').show();

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else
            {
                swal({
                    title: "Buscar Paciente",
                    text: 'Debe ingresar RUT para buscar.',
                    icon: "error",
                });
            }
        };

        function buscar_ciudad() {

            let region = $('#region_agregar').val();
            let url = "{{ route('buscar_ciudad_region') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        region: region,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);

                        let ciudades = $('#ciudad_agregar');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                    } else {

                        swal({
                            title: "Error",
                            text: "Error al cargar las ciudades",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function evaluar_edad() {
            let fechaNacimiento = new Date($('#reserva_hora_fecha_nac').val());
            // console.log(fechaNacimiento);
            let hoy = new Date();
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

            // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
            if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
                edad--;
            }

            if (edad < 18) {
                $('#paciente_dependiente').prop('checked', 'checked');
                // $('.seccion_reserva_paciente_nuevo_representante').show();
                activar_paciente_dependientes();
                $('#reserva_hora_correo').attr('onblur', "");
                $('#reserva_hora_telefono_uno').attr('onchange', "");
                $('#btn_reserva_hora_telefono_uno_validar').hide();

                $('#reserva_hora_telefono_uno_codigo_validador').val('');
                $('#div_codigo_validador_mensaje').html('');
                $('#result_codigo_validacion').val('0');

                $('#reserva_hora_representante_telefono_uno_codigo_validador').val('');
                $('#div_representante_codigo_validador_mensaje').html('');
                $('#result_representante_codigo_validacion').val('0');
            } else {
                $('#paciente_dependiente').prop('checked', '')
                // $('.seccion_reserva_paciente_nuevo_representante').hide();
                activar_paciente_dependientes();
                $('#reserva_hora_correo').attr('onblur', "validar_email_agenda();");
                $('#reserva_hora_telefono_uno').attr('onchange', "validar_campo_telefono();");
                $('#btn_reserva_hora_telefono_uno_validar').show();

                $('#reserva_hora_telefono_uno_codigo_validador').val('');
                $('#div_codigo_validador_mensaje').html('');
                $('#result_codigo_validacion').val('0');

                $('#reserva_hora_representante_telefono_uno_codigo_validador').val('');
                $('#div_representante_codigo_validador_mensaje').html('');
                $('#result_representante_codigo_validacion').val('0');
            }
        }


        function activar_paciente_dependientes()
        {
            if ($('#paciente_dependiente').prop('checked'))
            {
                $('.seccion_reserva_paciente_nuevo_representante').show();
                $('#reserva_hora_correo').attr('onblur', "");
                $('#reserva_hora_telefono_uno').attr('onchange', "");
                $('#btn_reserva_hora_telefono_uno_validar').hide();
            }
            else
            {
                $('.seccion_reserva_paciente_nuevo_representante').hide();
                $('#reserva_hora_correo').attr('onblur', "validar_email_agenda();");
                $('#reserva_hora_telefono_uno').attr('onchange', "validar_campo_telefono();");
                $('#btn_reserva_hora_telefono_uno_validar').show();
                if($('#reserva_hora_fecha_nac').val() !=='')
                    evaluar_edad();
            }
        }

        function validar_campo_telefono()
        {
            var telefono = $('#reserva_hora_telefono_uno').val();
            var email = $('#reserva_hora_correo').val();

            console.log('telefono:*'+telefono+'*');
            console.log('email:*'+email+'*');

            if(email == '')
            {
                // if (telefono != '')
                {
                    var re = new RegExp(/^\x2b56[6-9][0-9]{8}$/i);//+56612341234
                    if( re.test(telefono) )
                    {

                        if (validarEdad($('#reserva_hora_fecha_nac').val())) {
                            console.log("La edad es válida.");
                            $('#btn_reserva_hora_telefono_uno_validar').attr('disabled',false);
                        } else {
                            console.log("La edad no es válida.");
                            $('#btn_reserva_hora_telefono_uno_validar').attr('disabled',true);
                            $("#guardar_reserva_paciente").prop('disabled', true);
                        }

                    }
                    else
                        $('#btn_reserva_hora_telefono_uno_validar').attr('disabled',true);
                }
            }
        }

        function enviar_validacion_telefono()
        {
            $('#btn_reserva_hora_telefono_uno_validar').hide();
            $('#div_codigo_validador').show();
            $('#reserva_hora_telefono_uno_codigo_validador').val('');
            $('#div_codigo_validador_mensaje').html('');
            $('#result_codigo_validacion').val('0');
        }

        function validar_codigo_telefono()
        {
            var codigo = $('#reserva_hora_telefono_uno_codigo_validador').val();
            if(codigo.length >= 4)
            {
                console.log(codigo);
                if(codigo == 1234)
                {
                    $('#div_codigo_validador').hide();
                    $('#div_codigo_validador_mensaje').show();
                    $('#div_codigo_validador_mensaje').html('<span style="color:green;">Valido</span>');
                    $('#result_codigo_validacion').val('1');
                    $("#guardar_reserva_paciente").prop('disabled', false);
                }
                else
                {
                    $('#div_codigo_validador').show();
                    $('#div_codigo_validador_mensaje').show();
                    $('#div_codigo_validador_mensaje').html('<span style="color:red;">No Valido</span>');
                    $('#result_codigo_validacion').val('0');
                    $("#guardar_reserva_paciente").prop('disabled', true);
                }
            }
        }

        function validar_campo_telefono_representante()
        {
            var telefono = $('#reserva_hora_representante_telefono_uno').val();
            var email = $('#reserva_hora_representante_correo').val();

            if(email === '')
            {
                // if (telefono != '')
                {
                    var re = new RegExp(/^\x2b56[6-9][0-9]{8}$/i);//+56612341234
                    if( re.test(telefono) )
                        $('#btn_reserva_hora_representante_telefono_uno_validar').attr('disabled',false);
                    else
                        $('#btn_reserva_hora_representante_telefono_uno_validar').attr('disabled',true);
                }
            }
            $('#reserva_hora_representante_telefono_uno_codigo_validador').val('');
            $('#div_representante_codigo_validador_mensaje').html('');
            $('#result_representante_codigo_validacion').val('0');
        }

        function enviar_validacion_telefono_representante()
        {
            $('#btn_reserva_hora_representante_telefono_uno_validar').hide();
            $('#div_representante_codigo_validador').show();
            $('#reserva_hora_representante_telefono_uno_codigo_validador').val('');
            $('#div_representante_codigo_validador_mensaje').html('');
            $('#result_representante_codigo_validacion').val('0');
        }

        function validar_codigo_telefono_representante()
        {
            var codigo = $('#reserva_hora_representante_telefono_uno_codigo_validador').val();
            if(codigo.length >= 4)
            {
                console.log(codigo);
                if(codigo == 1234)
                {
                    $('#div_representante_codigo_validador').hide();
                    $('#div_representante_codigo_validador_mensaje').show();
                    $('#div_representante_codigo_validador_mensaje').html('<span style="color:green;">Valido</span>');
                    $('#result_representante_codigo_validacion').val('1');
                    $("#guardar_reserva_paciente").prop('disabled', false);
                }
                else
                {
                    $('#div_representante_codigo_validador').show();
                    $('#div_representante_codigo_validador_mensaje').show();
                    $('#div_representante_codigo_validador_mensaje').html('<span style="color:red;">No Valido</span>');
                    $('#result_representante_codigo_validacion').val('0');
                    $("#guardar_reserva_paciente").prop('disabled', true);
                }
            }
        }

        function editar_info_paciente()
        {
            $('.paciente_view').hide();
            $('.paciente_edit').show();
            $('#modificando_paciente').val(1);
        }

        function editar_info_paciente_asistente()
        {
            $('.paciente_view_asistente').hide();
            $('.paciente_edit_asistente').show();
            $('#modificando_paciente_asistente').val(1);
        }

        function cancelar_modificacion_paciente()
        {
            $('.paciente_view').show();
            $('.paciente_edit').hide();
            $('#modificando_paciente').val(0);
        }


        function cancelar_modificacion_paciente_asistente()
        {
            $('.paciente_view_asistente').show();
            $('.paciente_edit_asistente').hide();
            $('#modificando_paciente_asistente').val(0);
        }

        function actualizar_paciente()
        {
            var modificando = $('#modificando_paciente').val();
            var id_paciente = $('#reserva_hora_id_paciente').val();
            var nombre_paciente = $('#input_reserva_hora_nombre').val();
            var apellido_uno_paciente = $('#input_reserva_hora_apellido_uno').val();
            var apellido_dos_paciente = $('#input_reserva_hora_apellido_dos').val();
            var fecha_nacimiento = $('#input_reserva_fecha_nacimiento').val();
            var sexo_paciente = $('#input_reserva_sexo').val();
            var convenio_paciente = $('#input_reserva_convenio').val();
            var convenio_txt_paciente = $('#input_reserva_convenio option:selected').text()
            var direccion_paciente = $('#input_reserva_direccion_direccion').val();
            var numero_direccion_paciente = $('#input_reserva_direccion_numero_dir').val();
            var region_paciente = $('#input_reserva_direccion_region').val();
            var ciudad_paciente = $('#input_reserva_direccion_ciudad').val();
            var ciudad_txt_paciente = $('#input_reserva_direccion_ciudad option:selected').text();
            var email_paciente = $('#input_reserva_hora_email').val();
            var telefono_paciente = $('#input_reserva_hora_telefono').val();
            var valido = 1;
            var mensaje = '';

            if( id_paciente == '' )
            {
                valido = 0;
                mensaje += 'Paciente Requerido\n';
            }
            if( nombre_paciente == '' )
            {
                valido = 0;
                mensaje += 'Nombre Paciente requerido\n';
            }
            if( apellido_uno_paciente == '' )
            {
                valido = 0;
                mensaje += 'Apellido Paterno de Pacientet requerido\n';
            }
            if( apellido_dos_paciente == '' )
            {
                valido = 0;
                mensaje += 'Apellido Materno de Pacientet requerido\n';
            }
            if( fecha_nacimiento == '' )
            {
                valido = 0;
                mensaje += 'Fecha de Nacimiento del Pacientet requerido\n';
            }
            else
            {
                fecha_nacimiento = formatDateDB(fecha_nacimiento);
            }
            if( sexo_paciente == '' )
            {
                valido = 0;
                mensaje += 'Sexo del Pacientet requerido\n';
            }
            if( convenio_paciente == '' )
            {
                valido = 0;
                mensaje += 'Convenio del Pacientet requerido\n';
            }
            if( direccion_paciente == '' )
            {
                valido = 0;
                mensaje += 'Dirección del Pacientet requerido\n';
            }
            if( numero_direccion_paciente == '' )
            {
                valido = 0;
                mensaje += 'Número de Dirección del Pacientet requerido\n';
            }
            if( region_paciente == '' )
            {
                valido = 0;
                mensaje += 'Región de Dirección del Pacientet requerido\n';
            }
            if( ciudad_paciente == '' )
            {
                valido = 0;
                mensaje += 'Ciudad de Dirección del Pacientet requerido\n';
            }
            if( email_paciente == '' )
            {
                valido = 0;
                mensaje += 'Email del Pacientet requerido\n';
            }
            if( telefono_paciente == '' )
            {
                valido = 0;
                mensaje += 'Teléfono del Pacientet requerido\n';
            }

            if(valido == 1)
            {
                if(modificando == 1)
                {
                    let url = "{{ route('asistente.paciente.modificar') }}";

                    $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            id: id_paciente,
                            nombre: nombre_paciente,
                            apellido_uno: apellido_uno_paciente,
                            apellido_dos: apellido_dos_paciente,
                            fecha_nacimiento: fecha_nacimiento,
                            sexo: sexo_paciente,
                            convenio: convenio_paciente,
                            direccion: direccion_paciente,
                            numero_direccion: numero_direccion_paciente,
                            region: region_paciente,
                            ciudad: ciudad_paciente,
                            email: email_paciente,
                            telefono: telefono_paciente,
                        },
                    })
                    .done(function(data) {
                        if (data.estado == 1)
                        {
                            if (data.estado == 1)
                            {
                                $('#reserva_hora_nombre').text(nombre_paciente + ' ' + apellido_uno_paciente + ' ' + apellido_dos_paciente);
                                $('#reserva_fecha_nacimiento').text(fecha_nacimiento);
                                if (sexo_paciente == 'M') {
                                    $('#reserva_sexo').text('Masculino');
                                } else {
                                    $('#reserva_sexo').text('Femenino');
                                }
                                $('#reserva_hora_email').text(email_paciente);
                                $('#reserva_hora_telefono').text(telefono_paciente);
                                $('#reserva_convenio').text(convenio_txt_paciente);
                                $('#reserva_direccion').text(direccion_paciente+' '+numero_direccion_paciente+', '+ciudad_txt_paciente);

                                $('.paciente_view').show();
                                $('.paciente_edit').hide();
                                $('#modificando_paciente').val(0);

                                swal({
                                    title: "Actualización de Paciente",
                                    text: "Actualización Exitosa",
                                    icon: "success",
                                });
                            }
                            else
                            {
                                swal({
                                    title: "Actualización de Paciente",
                                    text: "Falla en Actualización.\nIntente de nuevo.",
                                    icon: "error",
                                });
                            }
                        }
                        else
                        {
                            swal({
                                title: "Actualización de Paciente",
                                text: "Falla en Actualización.\nIntente de nuevo.",
                                icon: "error",
                            });
                        }
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
                }
                else
                {
                    swal({
                        title: "Actualización de Paciente",
                        text: "Esta actualizando al paciente sin haber inicado proceso de edición",
                        icon: "error",
                    });
                }
            }
            else
            {
                swal({
                    title: "Actualización de Paciente",
                    text: "Campos requeridos.\n"+mensaje,
                    icon: "error",
                    buttons: "Aceptar"
                });
            }


        }

        function actualizar_paciente_asistente(){
            var modificando = $('#modificando_paciente_asistente').val();
            var id_paciente = $('#estado_id_paciente').val();
            var nombre_paciente = $('#input_reserva_hora_nombre_asistente').val();
            var apellido_uno_paciente = $('#input_reserva_hora_apellido_uno_asistente').val();
            var apellido_dos_paciente = $('#input_reserva_hora_apellido_dos_asistente').val();
            var fecha_nacimiento = $('#input_reserva_fecha_nacimiento_asistente').val();
            var sexo_paciente = $('#input_reserva_sexo_asistente').val();
            var email_paciente = $('#input_reserva_hora_email_asistente').val();
            var telefono_paciente = $('#input_reserva_hora_telefono_asistente').val();
            var valido = 1;
            var mensaje = '';

            var data = {
                id: id_paciente,
                nombre: nombre_paciente,
                apellido_uno: apellido_uno_paciente,
                apellido_dos: apellido_dos_paciente,
                fecha_nacimiento: fecha_nacimiento,
                sexo: sexo_paciente,
                email: email_paciente,
                telefono: telefono_paciente,
            }

            if( id_paciente == '' )
            {
                valido = 0;
                mensaje += 'Paciente Requerido\n';
            }
            if( nombre_paciente == '' )
            {
                valido = 0;
                mensaje += 'Nombre Paciente requerido\n';
            }
            if( apellido_uno_paciente == '' )
            {
                valido = 0;
                mensaje += 'Apellido Paterno de Pacientet requerido\n';
            }
            if( apellido_dos_paciente == '' )
            {
                valido = 0;
                mensaje += 'Apellido Materno de Pacientet requerido\n';
            }
            if( fecha_nacimiento == '' )
            {
                valido = 0;
                mensaje += 'Fecha de Nacimiento del Pacientet requerido\n';
            }
            else
            {
                //fecha_nacimiento = formatDateDB(fecha_nacimiento);
            }
            if( sexo_paciente == '' )
            {
                valido = 0;
                mensaje += 'Sexo del Pacientet requerido\n';
            }

            if(valido == 1)
            {
                if(modificando == 1)
                {
                    let url = "{{ route('asistente.paciente.modificar') }}";

                    $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            id: id_paciente,
                            nombre: nombre_paciente,
                            apellido_uno: apellido_uno_paciente,
                            apellido_dos: apellido_dos_paciente,
                            fecha_nacimiento: fecha_nacimiento,
                            sexo: sexo_paciente,
                            email: email_paciente,
                            telefono: telefono_paciente,
                        },
                    })
                    .done(function(data) {
                        console.log(data);
                        if (data.estado == 1)
                        {
                            if (data.estado == 1)
                            {
                                $('#datos_consulta_nombre').text(nombre_paciente + ' ' + apellido_uno_paciente + ' ' + apellido_dos_paciente);
                                $('#datos_consulta_edad').text(fecha_nacimiento);
                                if (sexo_paciente == 'M') {
                                    $('#datos_consulta_sexo').text('Masculino');
                                } else {
                                    $('#datos_consulta_sexo').text('Femenino');
                                }
                                $('#datos_consulta_email').text(email_paciente);
                                $('#datos_consulta_telefono').text(telefono_paciente);

                                $('.paciente_view_asistente').show();
                                $('.paciente_edit_asistente').hide();
                                $('#modificando_paciente_asistente').val(0);

                                swal({
                                    title: "Actualización de Paciente",
                                    text: "Actualización Exitosa",
                                    icon: "success",
                                });
                            }
                            else
                            {
                                swal({
                                    title: "Actualización de Paciente",
                                    text: "Falla en Actualización.\nIntente de nuevo.",
                                    icon: "error",
                                });
                            }
                        }
                        else
                        {
                            swal({
                                title: "Actualización de Paciente",
                                text: "Falla en Actualización.\nIntente de nuevo.",
                                icon: "error",
                            });
                        }
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
                }
                else
                {
                    swal({
                        title: "Actualización de Paciente",
                        text: "Esta actualizando al paciente sin haber inicado proceso de edición",
                        icon: "error",
                    });
                }
            }
            else
            {
                swal({
                    title: "Actualización de Paciente",
                    text: "Campos requeridos.\n"+mensaje,
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        }

        function buscar_ciudad_general(input_region, input_ciudad, id_ciudad=0)
        {
            var region = $('#'+input_region).val();
            console.log(region);
            let url = "{{ route('home.buscar_ciudad_region') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#'+input_ciudad);

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    })

                    if(id_ciudad != 0)
                    {
                        ciudades.val(id_ciudad);
                    }
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        };

        function actualizar_prevision_paciente(input_paciente, input_prevision)
        {
            var paciente = $('#'+input_paciente).val();
            var prevision = $('#'+input_prevision).val();

            let url = "{{ route('paciente.prevision.actualizar') }}";
            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: $('#_token').val(),
                    id_paciente: paciente,
                    id_prevision: prevision,
                },
            })
            .done(function(data) {
                if (data != null) {
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Actualizacion de Convenio del Paciente.",
                            text: "Convenio del Paciente actualizado.",
                            icon: "success",
                        });
                    }
                    else
                    {
                        swal({
                            title: "Actualizacion de Convenio del Paciente.",
                            text: "Se presento una falla al intentar actualizar el Convenio del Paciente.",
                            icon: "error",
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Actualizacion de Convenio del Paciente.",
                        text: "Se presento una falla al intentar actualizar el Convenio del Paciente.",
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function DateFormatVista(dateStr) {
            let parts = dateStr.split('-');

            if (parts.length !== 3) {
                console.log('Invalid date format');
            }

            let year = parts[0];
            let month = parts[1];
            let day = parts[2];

            let formattedDate = `${day}/${month}/${year}`;

            return formattedDate;
        }


        function agendar_hora() {


            let url = "{{ route('laboratorio.agendar_hora') }}";
            let _token = $('#_token').val();
            let id_sucursal = $('#agenda_sucursal').val();
            let fecha_consulta = $('#fecha_consulta').val();
            let reserva_hora_id = $('#reserva_hora_id_paciente').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let tipo_agenda = $('#id_tipo_agenda').val();
            let id_box = $('#agenda_box').val();
            var tipo_agenda_text = 'C';
            var procedimiento = $('#form_reseva_de_horas_id_procedimiento').val();
            // var proc_bloque = $('#form_reseva_de_horas_id_procedimiento option:selected').attr('data-cant_bloque');
            var proc_bloque = sumaBloques;


            console.log(tipo_agenda);
            console.log(tipo_agenda_text);

            switch (tipo_agenda) {
                case '1':
                    tipo_agenda_text = 'C'; //CONSULTA
                    break;
                case '2':
                    tipo_agenda_text = 'D'; //DENTAL
                    break;
                case '3':
                    tipo_agenda_text = 'T'; //TELEMEDICINA
                    break;
                case '4':
                    tipo_agenda_text = 'E'; //EXAMEN
                    break;
            }

            console.log(tipo_agenda_text);

            let representante = 0;
            let lista_Acompanante = $('#reserva_hora_id_acompanante').val();

            if ($('#acompanante_representante').prop("checked"))
                representante = 1;
            else
                representante = 0;

            let acompanante = 0;
            if ($('#acompanante_acompanante').prop("checked"))
                acompanante = 1;
            else {
                acompanante = 0;
                lista_Acompanante = '';
            }

            let autorizacion_atencion = 0;
            if ($('#autorizacion_atencion').prop("checked"))
                autorizacion_atencion = 1;
            else
                autorizacion_atencion = 0;

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        _token: _token,
                        id_sucursal: id_sucursal,
                        fecha_consulta: fecha_consulta,
                        reserva_hora_id: reserva_hora_id,
                        id_lugar_atencion: id_lugar_atencion,
                        tipo_hora_medica: tipo_agenda_text,
                        representante: representante,
                        acompanante: acompanante,
                        lista_Acompanante: lista_Acompanante,
                        autorizacion_atencion: autorizacion_atencion,
                        procedimiento: procedimiento,
                        proc_bloque: proc_bloque,
                        id_box: id_box,
                    }
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);

                        if (data.estado == 'error') {

                            swal({
                                title: "Error!",
                                text: data.msj,
                                type: "error",
                                icon: "error",
                                confirmButtonText: "Cool"
                            });
                            $('#agenda_agregar_paciente').modal('hide');
                        } else {
                            swal({
                                title: "Hora Agendada Correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            })
                            // setTimeout(function() {
                            //     location.reload()
                            // }, 5000);
                            $('#agenda_agregar_paciente').modal('hide');
                            // location.reload();
                        }
                        // cargarAgendaProfesional( data.id_profesional,fecha_consulta );

                        cargarAgendaSucursal(fecha_consulta);

                    } else {

                        swal({
                            title: "Error!",
                            text: "Paciente no encontrado en el sistema",
                            type: "error",
                            confirmButtonText: "Cool"
                        });

                        // alert('Paciente no encontrado en el sistema');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });



        };

        function validar_email_agenda() {

                if ($("#reserva_hora_correo").val().indexOf('@', 0) == -1 || $("#reserva_hora_correo")
                    .val().indexOf(
                        '.', 0) == -1) {
                    swal({
                        title: "El correo electrónico introducido no es correcto.",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('El correo electrónico introducido no es correcto.');
                    $("#guardar_reserva_paciente").prop('disabled', true);
                    return false;
                }

                let email = $('#reserva_hora_correo').val();
                let url = "{{ route('profesional.validar_rut') }}";

                $.ajax({
                        url: url,
                        type: "get",
                        data: {

                            email: email,

                        }

                    })
                    .done(function(data) {
                        if (data == 'fail') {

                            // console.log(data);

                            $('#mensaje_email_reserva').text('el email ya esta en nuestros registros');
                            $('#mensaje_email_reserva').show();
                            $('#reserva_hora_correo').focus();

                            $("#guardar_reserva_paciente").prop('disabled', true);

                        } else {
                            $('#mensaje_email_reserva').text('');
                            $('#mensaje_email_reserva').hide();
                            $("#guardar_reserva_paciente").prop('disabled', false);
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }

        function agendar_hora_paciente_nuevo() {


            let url = "{{ route('profesional.agendar_hora_nuevo_paciente') }}";
            let _token = $('#_token').val();
            let fecha_consulta = $('#fecha_consulta').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_box = $('#agenda_box').val();
            let tipo_agenda = $('#id_tipo_agenda').val();
            var tipo_agenda_text = 'C';


            console.log(tipo_agenda);
            console.log(tipo_agenda_text);

            switch (tipo_agenda) {
                case '1':
                    tipo_agenda_text = 'C'; //CONSULTA
                    break;
                case '2':
                    tipo_agenda_text = 'D'; //DENTAL
                    break;
                case '3':
                    tipo_agenda_text = 'T'; //TELEMEDICINA
                    break;
                case '4':
                    tipo_agenda_text = 'E'; //EXAMEN
                    break;
            }

            console.log(tipo_agenda_text);

            let rut_paciente_reserva = $('#rut_paciente_reserva').val();
            if (rut_paciente_reserva == '')
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el Rut",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return false;
            }

            let reserva_hora_nombre = $('#reserva_hora_nombres_paciente').val();
            if (reserva_hora_nombre == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar los nombres del paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_primer_apellido = $('#reserva_hora_apellido_uno').val();
            if (reserva_hora_primer_apellido == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar el primer apellido",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_segundo_apellido = $('#reserva_hora_apellido_dos').val();
            if (reserva_hora_segundo_apellido == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar el segundo apellido",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });

                return;

            }
            let reserva_hora_fecha_nac = $('#reserva_hora_fecha_nac').val();
            if (reserva_hora_fecha_nac == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar la fecha de nacimiento",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;
            }
            else
            {
                reserva_hora_fecha_nac = formatDateDB(reserva_hora_fecha_nac);
            }

            let reserva_hora_sexo = $('#reserva_hora_sexo').val();
            if (reserva_hora_sexo == '0') {

                swal({
                    title: "Error!",
                    text: "Debe seleccionar el del sexo del paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });

                return;
            }
            let reserva_hora_convenio = $('#reserva_hora_convenio').val();
            if (reserva_hora_convenio == '0') {

                swal({
                    title: "Error!",
                    text: "Debe seleccionar la previsión del paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }
            let reserva_hora_direccion = $('#reserva_hora_direccion').val();
            if (reserva_hora_direccion == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar una dirección",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }
            let reserva_hora_numero_dir = $('#reserva_hora_numero_dir').val();
            {{--
            if (reserva_hora_numero_dir == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar un numero a su dirección",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }
            --}}
            let reserva_hora_comuna = $('#ciudad_agregar').val();
            if (reserva_hora_comuna == '' || reserva_hora_comuna == '0' || reserva_hora_comuna == 'null' || reserva_hora_comuna == null) {

                swal({
                    title: "Error!",
                    text: "Debe ingresar la región y la ciudad",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_email = $('#reserva_hora_correo').val();
            let reserva_hora_telefono_uno = $('#reserva_hora_telefono_uno').val();
            let reserva_result_codigo_validacion = $('#result_codigo_validacion').val();

            let fechaNacimiento = new Date(reserva_hora_fecha_nac);
            let hoy = new Date();
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

            // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
            if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
                edad--;
            }

            // if( edad > 18 )
            if( $('#paciente_dependiente').prop('checked') == false )
            {
                if (reserva_hora_email == '') {

                    if(reserva_hora_telefono_uno == '' && (reserva_result_codigo_validacion =='' || reserva_result_codigo_validacion =='0') )
                    {
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el email o teléfono",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    }
                    else
                    {
                        if(reserva_result_codigo_validacion =='0')
                        {
                            var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                            if (caract.test(reserva_hora_email) == false){
                                swal({
                                    title: "Error!",
                                    text: "Debe ingresar el email o teléfono",
                                    icon: "error",
                                    type: "danger",
                                    DangerMode: true,
                                });
                                return;
                            }
                        }
                    }
                }
                else
                {

                    if (reserva_hora_telefono_uno == '')
                    {
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el teléfono",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    }
                    else
                    {
                        if(reserva_hora_email == '' && (reserva_result_codigo_validacion =='' || reserva_result_codigo_validacion =='0'))
                        {
                            swal({
                                title: "Error!",
                                text: "Debe validar el teléfono",
                                icon: "error",
                                type: "danger",
                                DangerMode: true,
                            });
                            return;
                        }
                    }
                }
            }

            var reserva_representante_nuevo_exitente = $('#reserva_representante_nuevo_exitente').val();
            var reserva_representante_id = $('#reserva_representante_id').val();
            var reserva_representante_id_usuario = $('#reserva_representante_id_usuario').val();
            var reserva_hora_representante_rut = $('#reserva_hora_representante_rut').val();
            var reserva_hora_representante_nombres_paciente = $('#reserva_hora_representante_nombres_paciente').val();
            var reserva_hora_representante_apellido_uno = $('#reserva_hora_representante_apellido_uno').val();
            var reserva_hora_representante_apellido_dos = $('#reserva_hora_representante_apellido_dos').val();
            var reserva_hora_representante_fecha_nac = $('#reserva_hora_representante_fecha_nac').val();
            var reserva_hora_representante_sexo = $('#reserva_hora_representante_sexo').val();
            var reserva_hora_representante_convenio = $('#reserva_hora_representante_convenio').val();
            var reserva_hora_representante_direccion = $('#reserva_hora_representante_direccion').val();
            var reserva_hora_representante_numero_dir = $('#reserva_hora_representante_numero_dir').val();
            var reserva_hora_representante_region_agregar = $('#reserva_hora_representante_region_agregar').val();
            var reserva_hora_representante_ciudad_agregar = $('#reserva_hora_representante_ciudad_agregar').val();
            var reserva_hora_representante_correo = $('#reserva_hora_representante_correo').val();
            var reserva_hora_representante_telefono_uno = $('#reserva_hora_representante_telefono_uno').val();
            var reserva_hora_representante_result_codigo_validacion = $('#result_representante_codigo_validacion').val();
            var reserva_hora_representante_agregar_relacion = $('#reserva_hora_representante_agregar_relacion').val();


            var dependiente = 0;
            if($('#paciente_dependiente').prop('checked')  == true)
                dependiente = 1;
            else if($('#paciente_dependiente').prop('checked')  == false)
                dependiente = 0;

            if( edad < 18 || $('#paciente_dependiente').prop('checked')==true)
            {
                if(reserva_hora_representante_agregar_relacion == '')
                {
                    swal({
                        title: "Error!",
                        text: "Debe seleccionar Relación",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }
                if(reserva_representante_nuevo_exitente == '1')
                {
                    /** existente */
                    if(reserva_representante_id == '')
                    {
                        swal({
                            title: "Error!",
                            text: "Información del Representante con problemas",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    // if($('#reserva_representante_id_usuario').val() == '')
                    // {
                    //     swal({
                    //         title: "Error!",
                    //         text: "Información del Representante con problemas",
                    //         icon: "error",
                    //         type: "danger",
                    //         DangerMode: true,

                    //     });
                    //     return;
                    // }
                }
                else
                {
                    /** nuevo */
                    if( reserva_hora_representante_nombres_paciente == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Nombre del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if( reserva_hora_representante_apellido_uno == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Apellido Paterno del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if( reserva_hora_representante_apellido_dos == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Apellido Materno del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if( reserva_hora_representante_fecha_nac == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Fecha Nacimiento del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    else
                    {
                        reserva_hora_representante_fecha_nac = formatDateDB(reserva_hora_representante_fecha_nac);
                    }
                    if( reserva_hora_representante_sexo == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Sexo del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if( reserva_hora_representante_direccion == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Direccion del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    // if( reserva_hora_representante_numero_dir == '' )
                    // {
                    //     swal({
                    //         title: "Error!",
                    //         text: "Numero del Representante requerido",
                    //         icon: "error",
                    //         type: "danger",
                    //         DangerMode: true,

                    //     });
                    //     return;
                    // }
                    // if( reserva_hora_representante_region_agregar == '' )
                    // {
                    //     swal({
                    //         title: "Error!",
                    //         text: "Region del Representante requerido",
                    //         icon: "error",
                    //         type: "danger",
                    //         DangerMode: true,

                    //     });
                    //     return;
                    // }
                    if( reserva_hora_representante_ciudad_agregar == '' || reserva_hora_representante_ciudad_agregar == '0' || reserva_hora_representante_ciudad_agregar == 'null' || reserva_hora_representante_ciudad_agregar == null )
                    {
                        swal({
                            title: "Error!",
                            text: "Ciudad del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }

                    if( $('#paciente_dependiente').prop('checked') == true )
                    {
                        if (reserva_hora_representante_correo == '') {

                            if(reserva_hora_representante_telefono_uno == '' && (reserva_hora_representante_result_codigo_validacion =='' || reserva_hora_representante_result_codigo_validacion =='0') )
                            {
                                swal({
                                    title: "Error!",
                                    text: "Debe ingresar el email o teléfono del representante",
                                    icon: "error",
                                    type: "danger",
                                    DangerMode: true,
                                });
                                return;
                            }
                            else
                            {
                                if(reserva_hora_representante_result_codigo_validacion =='0')
                                {
                                    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                                    if (caract.test(reserva_hora_representante_correo) == false){
                                        swal({
                                            title: "Error!",
                                            text: "Debe ingresar el email o teléfono del representante",
                                            icon: "error",
                                            type: "danger",
                                            DangerMode: true,
                                        });
                                        return;
                                    }
                                }
                            }
                        }
                        else
                        {

                            if (reserva_hora_representante_telefono_uno == '')
                            {
                                swal({
                                    title: "Error!",
                                    text: "Debe ingresar el teléfono del representante",
                                    icon: "error",
                                    type: "danger",
                                    DangerMode: true,
                                });
                                return;
                            }
                            else
                            {
                                if(reserva_hora_representante_correo == '' && (reserva_hora_representante_result_codigo_validacion =='' || reserva_hora_representante_result_codigo_validacion =='0'))
                                {
                                    swal({
                                        title: "Error!",
                                        text: "Debe validar el teléfono del representante",
                                        icon: "error",
                                        type: "danger",
                                        DangerMode: true,
                                    });
                                    return;
                                }
                            }
                        }
                    }

                }
            }

            let reserva_hora_confirmacion = $('#reserva_hora_confirmacion').val();
            let reserva_hora_sms = $('#reserva_hora_sms').val();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        _token: _token,
                        dependiente: dependiente,
                        fecha_consulta: fecha_consulta,
                        rut_paciente_reserva: rut_paciente_reserva,
                        reserva_hora_nombre: reserva_hora_nombre,
                        reserva_hora_primer_apellido: reserva_hora_primer_apellido,
                        reserva_hora_segundo_apellido: reserva_hora_segundo_apellido,
                        reserva_hora_fecha_nac: reserva_hora_fecha_nac,
                        reserva_hora_sexo: reserva_hora_sexo,
                        reserva_hora_convenio: reserva_hora_convenio,
                        reserva_hora_direccion: reserva_hora_direccion,
                        reserva_hora_numero_dir: reserva_hora_numero_dir,
                        reserva_hora_comuna: reserva_hora_comuna,
                        reserva_hora_email: reserva_hora_email,
                        reserva_hora_telefono: reserva_hora_telefono_uno,
                        reserva_result_codigo_validacion: reserva_result_codigo_validacion,
                        reserva_hora_confirmacion: reserva_hora_confirmacion,
                        reserva_hora_sms: reserva_hora_sms,
                        id_lugar_atencion: id_lugar_atencion,
                        tipo_hora_medica: tipo_agenda_text,
                        /** representante */
                        reserva_representante_nuevo_exitente: reserva_representante_nuevo_exitente,
                        reserva_representante_id: reserva_representante_id,
                        reserva_representante_id_usuario: reserva_representante_id_usuario,
                        reserva_hora_representante_rut: reserva_hora_representante_rut,
                        reserva_hora_representante_nombres_paciente: reserva_hora_representante_nombres_paciente,
                        reserva_hora_representante_apellido_uno: reserva_hora_representante_apellido_uno,
                        reserva_hora_representante_apellido_dos: reserva_hora_representante_apellido_dos,
                        reserva_hora_representante_fecha_nac: reserva_hora_representante_fecha_nac,
                        reserva_hora_representante_sexo: reserva_hora_representante_sexo,
                        reserva_hora_representante_convenio: reserva_hora_representante_convenio,
                        reserva_hora_representante_direccion: reserva_hora_representante_direccion,
                        reserva_hora_representante_numero_dir: reserva_hora_representante_numero_dir,
                        reserva_hora_representante_region_agregar: reserva_hora_representante_region_agregar,
                        reserva_hora_representante_ciudad_agregar: reserva_hora_representante_ciudad_agregar,
                        reserva_hora_representante_correo: reserva_hora_representante_correo,
                        reserva_hora_representante_telefono_uno: reserva_hora_representante_telefono_uno,
                        reserva_hora_representante_result_codigo_validacion: reserva_hora_representante_result_codigo_validacion,
                        reserva_hora_representante_agregar_relacion: reserva_hora_representante_agregar_relacion,
                        id_box: id_box,
                    },
                })
                .done(function(data) {
                    console.log(data);
                    if (data != null) {
                        // data = JSON.parse(data);
                        // console.log(data);
                        if (data.estado == 1) {
                            swal({
                                title: "Exito!",
                                text: "Hora medica agendada correctamente",
                                type: "success",
                                confirmButtonText: "Cool"
                            });

                            @if (isset($profesional) && isset($lugar_atencion))
                                // cargarAgendaProfesional('{{ $profesional->id }}',fecha_consulta);
                                cargarAgendaProfesional($('#id_tipo_agenda').val(), '{{ $lugar_atencion }}','{{ $profesional->id }}', fecha_consulta);
                            @endif
                            $('#agenda_agregar_paciente').modal('hide');
                        } else {
                            swal({
                                title: "Hora medica",
                                text: data.msj,
                                type: "error",
                                confirmButtonText: "Cool"
                            });
                        }
                    } else {
                        swal({
                            title: "Error!",
                            text: "Paciente no encontrado en el sistema",
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                        // alert('Paciente no encontrado en el sistema');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function opcion_confirmar_hora() {


            $('#datos_hora_medica').hide();
            $('#cancelacion_hora_medica').hide();
            $('#cabecera_hora_medica').text('Confirmar Hora Medica');
            $('#hm_anular_hora').hide();
            $('#hm_atender_hora').hide();
            $('#hm_confirmar_hora').hide();
            $('#hm_ver_hora').hide();
            $('#confirmacion_hora').show();
            $('#confirmacion_hora_medica').show();


        };

        function opcion_cancelar_hora() {

            $('#datos_hora_medica').hide();
            $('#cancelacion_hora_medica').show();
            $('#cabecera_hora_medica').text('Cancelar Hora Medica');
            $('#hm_anular_hora').hide();
            $('#hm_atender_hora').hide();
            $('#hm_confirmar_hora').hide();
            $('#hm_ver_hora').hide();
            $('#confirmar_anulacion_hora').show();

        };

        function cancelar_hora() {

            let url = "{{ route('profesional.cancelar_hora') }}";
            let comentario = $('#cancelar_hora_comentario').val();
            let id_hora_medica = $('#id_hora_medica').val();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        comentario: comentario,
                        id_hora_medica: id_hora_medica
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);
                        console.log(data);
                        $('#consulta_adm').modal('hide');
                        swal({
                            title: "Exito!",
                            text: "Hora medica cancelada correctamente",
                            type: "success",
                            confirmButtonText: "Cool"
                        });

                        cargarAgendaSucursal(data.fecha_consulta);

                        // location.reload();

                    } else {
                        alert('No se pudo Confirmar Reserva');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function paciente_esperando() {

            let url = "{{ route('profesional.eperando_hora') }}";
            let id_hora_medica = $('#id_hora_medica').val();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_hora_medica: id_hora_medica
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);
                        console.log(data);
                        swal({
                            title: "Exito!",
                            text: "Paciente esperando",
                            type: "success",
                            // DangerMode: true,
                            confirmButtonText: "Cool"
                        });
                        setTimeout(function() {
                            location.reload()
                        }, 1000);
                        // $('#consulta_adm').modal('hide');
                        // location.reload();

                    } else {

                        swal({
                            title: "Error!",
                            text: "No se pudo Actualizar el estado de la Reserva",
                            type: "danger",
                            DangerMode: true,
                            confirmButtonText: "Cool"
                        });
                        // setTimeout(function() {
                        //     location.reload()
                        // }, 5000);
                        // alert('No se pudo Actualizar el estado de la Reserva');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function confirmar_hora() {

            let url = "{{ route('profesional.confirmar_hora') }}";
            let comentario = $('#confirmar_hora_comentario').val();
            let id_hora_medica = $('#id_hora_medica').val();
            let id_profesional = $('#estado_id_profesional').val();

            $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    comentario: comentario,
                    id_hora_medica: id_hora_medica
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);
                    console.log(data);
                    swal({
                        title: "Exito!",
                        text: "Se ha confirmado su hora medica",
                        type: "success",
                        // DangerMode: true,
                        confirmButtonText: "Cool"
                    });
                    // cargarAgendaProfesional( id_profesional, data.fecha_consulta );
                    cargarAgendaSucursal(data.fecha_consulta);
                    // setTimeout(function() {
                    //     location.reload()
                    // }, 5000);
                    $('#consulta_adm').modal('hide');
                    // location.reload();

                } else {
                    swal({
                        title: "Error!",
                        text: "No se pudo Confirmar Reserva",
                        type: "danger",
                        DangerMode: true,
                        confirmButtonText: "Cool"
                    });
                    // setTimeout(function() {
                    //     location.reload()
                    // }, 5000);
                    alert('No se pudo Confirmar Reserva');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        };

        function recepcion_pago() {

            var bono_paciente_rut = $('#bono_paciente_rut').val();
            var bono_paciente_nombre = $('#bono_paciente_nombre').val();
            var bono_profesional_nombre = $('#bono_profesional_nombre').val();
            var bono_profesional_rut = $('#bono_profesional_rut').val();
            var bono_numero = $('#bono_numero').val();
            var numero_boleta = $('#numero_boleta').val();
            var bono_valor_consulta = $('#bono_valor_consulta').val();
            var bono_prevision = $('#bono_prevision').val();
            var bono_prevision_nombre = $('#bono_prevision option:selected').text();
            var recepcion_programa = $('#recepcion_programa').val();
            var bono_sn_sesiones = $('#bono_sn_sesiones').val();

            var bono_hora_medica = $('#bono_hora_medica').val();
            var bono_id_profesional = $('#bono_id_profesional').val();
            var bono_id_paciente = $('#bono_id_paciente').val();
            var bono_id_tipo_bono = $('#bono_id_tipo_bono').val();
            var bono_id_clase_bono = $('#bono_id_clase_bono').val();

            var mensaje = '';
            var valido = 1;

            if (bono_paciente_rut == '') {
                mensaje += 'Campo requerido RUT DEL PACIENTE\n';
                valido = 0;
            }
            if (bono_paciente_nombre == '') {
                mensaje += 'Campo requerido NOMBRE DEL PACIENTE\n';
                valido = 0;
            }
            if (bono_profesional_nombre == '') {
                mensaje += 'Campo requerido NOMBRE DEL PROFESIONAL\n';
                valido = 0;
            }
            if (bono_profesional_rut == '') {
                mensaje += 'Campo requerido RUT DEL PROFESIONAL\n';
                valido = 0;
            }
            if (bono_id_clase_bono != 6) {
                if (bono_numero == '') {
                    mensaje += 'Campo requerido NUMERO DEL BONO O PROGRAMA\n';
                    valido = 0;
                }
            }
            if (bono_valor_consulta == '') {
                mensaje += 'Campo requerido VALOR TOTAL\n';
                valido = 0;
            }
            if (bono_prevision == '' || bono_prevision == 0) {
                mensaje += 'Campo requerido CONVENIO\n';
                valido = 0;
            }

            if (valido == 1) {
                let url = "{{ route('profesional.recibir_bono') }}";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        convenio: bono_prevision,
                        convenio_nombre: bono_prevision_nombre,
                        numero_bono: bono_numero,
                        numero_boleta: numero_boleta,
                        valor_atencion: bono_valor_consulta,
                        glosa: '1',
                        id_profesional: bono_id_profesional,
                        id_asistente: '-1',
                        id_paciente: bono_id_paciente,
                        id_tipo_bono: bono_id_tipo_bono,
                        id_clase_bono: bono_id_clase_bono,
                        id_referencia: bono_hora_medica, //une bono a hora medica (para buscar id ficha atencion)
                        numero_sesiones: bono_sn_sesiones
                    }
                })
                .done(function(data) {
                    if (data !== 'null') {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        if (data.estado == 1) {
                            swal({
                                title: "Recepción de bonos y programas",
                                text: 'Pago Exitoso',
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });

                            cargarAgendaSucursal(data.hora_medica.fecha_consulta);

                            $('#modal_recepcion_bonos_api').modal('hide');
                            $('#bono_paciente_rut').val('');
                            $('#bono_paciente_nombre').val('');
                            $('#bono_profesional_nombre').val('');
                            $('#bono_profesional_rut').val('');
                            $('#bono_numero').val('');
                            $('#bono_valor_consulta').val('');
                            $('#bono_prevision').val('');
                            $('#recepcion_programa').val('');
                            $('#bono_sn_sesiones').val('');
                            $('#bono_hora_medica').val('');
                            {{--  $('#bono_id_profesional').val('');  --}}
                            {{--  $('#bono_id_paciente').val('');  --}}
                            {{--  $('#bono_id_tipo_bono').val('');  --}}

                        } else {
                            var mensaje = '';
                            if(typeof(data.bono) != "undefined" && data.bono !== null) {
                                if (data.bono.estado == 0) {
                                    mensaje += bono.estado.msj;
                                }
                                if (data.hora_medica.estado == 0) {
                                    mensaje += data.hora_medica.msj;
                                }
                            } else {
                                mensaje += data.error;
                            }

                            swal({
                                title: "Recepción de bonos y programas",
                                text: 'Pago con Problemas.\n' + data.msj + '\n' + mensaje,
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });

                        }
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('fail');
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            } else {
                swal({
                    title: "Recepción de bonos y programas",
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        }

    </script>
@endsection
