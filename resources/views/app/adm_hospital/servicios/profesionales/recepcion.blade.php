@extends('template.hospitales.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content m-top">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center pt-2">
                    <div class="col-md-12">
                        <div class="page-header-title d-inline">
                            <p class="font-italic mt-0 mb-0 text-white d-inline float-right">
                            @php
                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            $fecha = \Carbon\Carbon::parse(now());
                            $mes = $meses[($fecha->format('n')) - 1];
                            $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                            @endphp
                            {{ $fecha }}
                            </p>
                        </div>
                        <ul class="breadcrumb">
                             <li class="breadcrumb-item"> <a href="#" data-toggle="tooltip"
                             data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home text-white d-inline"></i>
                            <li class="breadcrumb-item">
                                <a class="f-20" href="#">Salas del servicio: {{ $servicio->nombre_servicio }}</a>
                            </li>
                        </ul>
                    </div>
                    @if(isset($pacientes_graves))
                    <div class="col-md-12">
                        <button class="btn btn-danger btn-xs float-right" id="btn_mostrar_pacientes_graves" onclick="mostrar_pacientes_graves()">Ver Pacientes Graves en espera de asignacion ({{ $pacientes_graves->count() }})</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row w-100 mb-2">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="col-md-12">
                            <div class="row w-100">
                                <div class="col-md-6">
                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Servicio {{ $servicio->nombre_servicio }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="agenda_agregar_paciente" class="form-row">

                            <div class="modal-content">
                                <div class="modal-header bg-info pt-3 pb-2">
                                    <h5 class="modal-title text-white text-center">Recepción de Pacientes</h5>
                                    <button id="cerrar_tomar_hora" type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="volver_recepcion()"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                {{-- <h6 class="text-c-blue f-14">Ingrese el RUT del paciente</h6> --}}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row div_rut_buscar">
                                        <div class="col-sm-9 col-md-9">
                                            <form id="validacion_rut_form" novalidate="novalidate">
                                                <div class="form-group" id="validacion_rut_div">
                                                    <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control form-control-sm valid" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required="" oninput="formatoRut(this)" aria-invalid="false" onkeyup="enter_buscar_paciente(event)">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-3 col-md-3 mb-3">
                                            <button class="btn btn-sm btn-info btn-block has-ripple" onclick="buscar_paciente();" type="button" >
                                                <i class="feather icon-search"></i> Buscar
                                            <span class="ripple ripple-animate" style="height: 187.1px; width: 187.1px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -85.6125px; left: 16.35px;"></span></button>
                                        </div>
                                    </div>

                                    <form id="form_reseva_de_horas">
                                        <input type="hidden" name="_token" id="_token" value="ISv2hth5QO04KlvCzk5uFgudXjTu4PKOnvgUGOER">
                                        <input type="hidden" id="fecha_consulta" name="fecha_consulta" value="2024-05-09T13:00:01-04:00">
                                        <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="3">
                                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $institucion->id_lugar_atencion }}">
                                        <input type="hidden" name="id_institucion" id="id_institucion" value="{{ $institucion->id }}">
                                        <input type="hidden" name="fecha" id="fecha" value="">
                                        <input type="hidden" name="reserva_hora_edad" id="reserva_hora_edad" value="69">
                                        <input type="hidden" name="reserva_hora_id_responsable" id="reserva_hora_id_responsable" value="">
                                        <input type="hidden" name="reserva_nombre_paciente" id="reserva_nombre_paciente" value="">
                                        <input type="hidden" name="bono_paciente_nombre" id="bono_paciente_nombre" value="">



                                        <div id="reserva_datos_paciente" class="row mx-3" style="display:none;">
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
                                                                    <option value="1">Fonasa</option>
                                                                    <option value="2">Banmédica</option>
                                                                    <option value="3">Isalud</option>
                                                                    <option value="4">Colmena Golden Cross</option>
                                                                    <option value="5">Consalud</option>
                                                                    <option value="6">Cruz Blanca</option>
                                                                    <option value="7">Cruz del Norte</option>
                                                                    <option value="8">Nueva Masvida</option>
                                                                    <option value="9">Fundación</option>
                                                                    <option value="10">Vida Tres</option>
                                                                    <option value="11">Codelco</option>
                                                                    <option value="12">Control sin costo</option>
                                                                    <option value="13">Sin Convenio</option>
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
                                                    <tr class="paciente_edit" style="display: none;">

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
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Motivo de la urgencia</label>
                                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                                </div>
                                            </div>

                                            <div class="modal-footer mb-0 pt-1 pb-0">
                                                {{--  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                                                <button type="button" onclick="agendar_hora();" class="btn btn-info"><i class="feather icon-check"></i> Agendar hora</button>  --}}
                                                <button type="button"   onclick="asignar_profesional();"class="btn btn-info" id="btn_cobro_paciente"><i class="feather icon-check"></i>Cobro Ingreso Paciente</button>
                                                {{-- <button type="button" class="btn btn-warning"><i class="feather icon-check"></i>Editar Datos Paciente</button> --}}
                                            </div>
                                        </div>

                                        <div id="reserva_agregar_paciente_hora" style="display: none;">
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
                                                            <input type="checkbox" class="custom-control-input" id="paciente_dependiente" name="paciente_dependiente" onchange="activar_paciente_dependientes();">
                                                            <label class="custom-control-label" for="paciente_dependiente">Paciente Dependiente</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-row seccion_reserva_paciente_nuevo">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Nombres</label>
                                                        <input type="text" required="" class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
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
                                                        <select id="reserva_hora_sexo" name="reserva_hora_sexo" class="form-control form-control-sm">
                                                            <option value="0">Selecione una opción</option>
                                                            <option value="F">Femenino</option>
                                                            <option value="M">Masculino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Previsión</label>
                                                        <select id="reserva_hora_convenio" name="reserva_hora_convenio" class="form-control form-control-sm">
                                                            <option value="0">Selecione una opción</option>
                                                            <option value="1">Fonasa</option>
                                                            <option value="2">Banmédica</option>
                                                            <option value="3">Isalud</option>
                                                            <option value="4">Colmena Golden Cross</option>
                                                            <option value="5">Consalud</option>
                                                            <option value="6">Cruz Blanca</option>
                                                            <option value="7">Cruz del Norte</option>
                                                            <option value="8">Nueva Masvida</option>
                                                            <option value="9">Fundación</option>
                                                            <option value="10">Vida Tres</option>
                                                            <option value="11">Codelco</option>
                                                            <option value="12">Control sin costo</option>
                                                            <option value="13">Sin Convenio</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Dirección</label>
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
                                                        <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control form-control-sm" required="">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Arica y Parinacota </option>
                                                            <option value="2">Tarapacá </option>
                                                            <option value="3">Antofagasta </option>
                                                            <option value="4">Atacama </option>
                                                            <option value="5">Coquimbo </option>
                                                            <option value="6">Valparaiso </option>
                                                            <option value="7">Metropolitana de Santiago </option>
                                                            <option value="8">Libertador General Bernardo OHiggins </option>
                                                            <option value="9">Maule </option>
                                                            <option value="10">Ñuble </option>
                                                            <option value="11">Biobío </option>
                                                            <option value="12">La Araucanía </option>
                                                            <option value="13">Los Ríos </option>
                                                            <option value="14">Los Lagos </option>
                                                            <option value="15">Aisén del General Carlos Ibáñez del Campo </option>
                                                            <option value="16">Magallanes y de la Antártica Chilena </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Ciudad</label>
                                                        <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required="">
                                                            <option value="0">Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Correo Electrónico</label>
                                                        <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda();" name="reserva_hora_correo" id="reserva_hora_correo">
                                                        <span id="mensaje_email_reserva" style="display:none"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Teléfono</label>
                                                        <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno" onchange="validar_campo_telefono();">
                                                    </div>
                                                    <button class="btn btn-sm btn-info btn-block" type="button" id="btn_reserva_hora_telefono_uno_validar" disabled="disabled" onclick="enviar_validacion_telefono();">
                                                        <i class="feather icon-check"></i> Validar
                                                    </button>
                                                    <div class="form-group" style="display:none" name="div_codigo_validador" id="div_codigo_validador">
                                                        <label class="floating-label-activo-sm">Codigo Validador</label>
                                                        <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno_codigo_validador" id="reserva_hora_telefono_uno_codigo_validador" onkeyup="validar_codigo_telefono();">
                                                    </div>
                                                    <input type="hidden" name="result_codigo_validacion" id="result_codigo_validacion" value="0">
                                                    <div id="div_codigo_validador_mensaje" style="display:none"></div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Motivo de la urgencia</label>
                                                        <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion_" id="reserva_hora_descripcion_">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-row seccion_reserva_paciente_nuevo_representante" style="display: none;">
                                                <div class="col-sm-12 col-md-12 mb-3">
                                                    <h6 class="f-14 text-c-blue">Información del Representante Legal o encargado de la
                                                        reserva:</h6>
                                                </div>
                                                <div class="col-sm-9 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">RUT</label>
                                                        <input type="text" required="" class="form-control form-control-sm" name="reserva_hora_representante_rut" id="reserva_hora_representante_rut" oninput="formatoRut(this);">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-md-3">
                                                    <button type="button" class="btn btn-info btn-sm btn-block" onclick="buscar_rut_representente();"><i class="feather icon-search"></i>
                                                        Buscar</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm"><span class="text-danger">*</span>Relación</label>
                                                        <select class="form-control form-control-sm" name="reserva_hora_representante_agregar_relacion" id="reserva_hora_representante_agregar_relacion">
                                                            <option value="">Seleccione</option>
                                                            <option data-tipo="1" value="Hijo(a)" selected="">Hijo(a)</option>
                                                            <option data-tipo="1" value="Sobrino(a)">Sobrino(a)</option>
                                                            <option data-tipo="1" value="Nieto(a)">Nieto(a)</option>
                                                            <option data-tipo="1" value="Hermano(a)">Hermano(a)</option>
                                                            <option data-tipo="1" value="Primo(a)">Primo(a)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="reserva_representante_nuevo_exitente" id="reserva_representante_nuevo_exitente" value="">
                                                <div class="div_representante_nuevo px-1" style="display:none;">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Nombres</label>
                                                                <input type="text" required="" class="form-control form-control-sm" name="reserva_hora_representante_nombres_paciente" id="reserva_hora_representante_nombres_paciente">
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
                                                                <input type="date" class="form-control form-control-sm" name="reserva_hora_representante_fecha_nac" id="reserva_hora_representante_fecha_nac">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Sexo</label>
                                                                <select id="reserva_hora_representante_sexo" name="reserva_hora_representante_sexo" class="form-control form-control-sm">
                                                                    <option value="0">Selecione una opción</option>
                                                                    <option value="F">Femenino</option>
                                                                    <option value="M">Masculino</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Previsión</label>
                                                                <select id="reserva_hora_representante_convenio" name="reserva_hora_representante_convenio" class="form-control form-control-sm">
                                                                    <option value="0">Selecione una opción</option>
                                                                    <option value="1">Fonasa</option>
                                                                    <option value="2">Banmédica</option>
                                                                    <option value="3">Isalud</option>
                                                                    <option value="4">Colmena Golden Cross</option>
                                                                    <option value="5">Consalud</option>
                                                                    <option value="6">Cruz Blanca</option>
                                                                    <option value="7">Cruz del Norte</option>
                                                                    <option value="8">Nueva Masvida</option>
                                                                    <option value="9">Fundación</option>
                                                                    <option value="10">Vida Tres</option>
                                                                    <option value="11">Codelco</option>
                                                                    <option value="12">Control sin costo</option>
                                                                    <option value="13">Sin Convenio</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Dirección</label>
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
                                                                <select onchange="buscar_ciudad_repesentante();" name="reserva_hora_representante_region_agregar" id="reserva_hora_representante_region_agregar" class="form-control form-control-sm" required="">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Arica y Parinacota</option>
                                                                    <option value="2">Tarapacá</option>
                                                                    <option value="3">Antofagasta</option>
                                                                    <option value="4">Atacama</option>
                                                                    <option value="5">Coquimbo</option>
                                                                    <option value="6">Valparaiso</option>
                                                                    <option value="7">Metropolitana de Santiago </option>
                                                                    <option value="8">Libertador General Bernardo OHiggins</option>
                                                                    <option value="9">Maule</option>
                                                                    <option value="10">Ñuble </option>
                                                                    <option value="11">Biobío </option>
                                                                    <option value="12">La Araucanía</option>
                                                                    <option value="13">Los Ríos</option>
                                                                    <option value="14">Los Lagos</option>
                                                                    <option value="15">Aisén del General Carlos Ibáñez del Campo</option>
                                                                    <option value="16">Magallanes y de la Antártica Chilena</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Ciudad</label>
                                                                <select id="reserva_hora_representante_ciudad_agregar" name="reserva_hora_representante_ciudad_agregar" class="form-control form-control-sm" required="">
                                                                    <option value="0">Seleccione</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Correo Electrónico</label>
                                                                <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda_representante()" name="reserva_hora_representante_correo" id="reserva_hora_representante_correo">
                                                                <span id="mensaje_email_reserva_representante" style="display:none"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Teléfono</label>
                                                                <input type="tel" class="form-control form-control-sm" name="reserva_hora_representante_telefono_uno" id="reserva_hora_representante_telefono_uno" onchange="validar_campo_telefono_representante();">
                                                            </div>

                                                            <button class="btn btn-sm btn-info btn-block" type="button" id="btn_reserva_hora_representante_telefono_uno_validar" disabled="disabled" onclick="enviar_validacion_telefono_representante();">
                                                                <i class="feather icon-check"></i> Validar
                                                            </button>

                                                            <div class="form-group" style="display:none" name="div_representante_codigo_validador" id="div_representante_codigo_validador">
                                                                <label class="floating-label-activo-sm">Codigo Validador</label>
                                                                <input type="tel" class="form-control form-control-sm" name="reserva_hora_representante_telefono_uno_codigo_validador" id="reserva_hora_representante_telefono_uno_codigo_validador" onkeyup="validar_codigo_telefono_representante();">
                                                            </div>

                                                            <input type="hidden" name="result_representante_codigo_validacion" id="result_representante_codigo_validacion" value="0">
                                                            <div id="div_representante_codigo_validador_mensaje" style="display:none"></div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="div_representante_existente" style="display:none;">
                                                    <input type="hidden" name="reserva_representante_id" id="reserva_representante_id" value="">
                                                    <input type="hidden" name="reserva_representante_id_usuario" id="reserva_representante_id_usuario" value="">
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
                                                        <h6 class="f-14 text-c-blue">Enviar confirmación</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion" value="">
                                                            <label class="custom-control-label" for="reserva_hora_confirmacion">Correo
                                                                electrónico</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                                            <label class="custom-control-label" for="sms">SMS</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"   onclick="registrar_paciente();"class="btn btn-info"><i class="feather icon-check"></i>Cobro Ingreso Paciente</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    #contenedor_paciente_atencion{
        padding: 20px;
        font-size: 20px;
        border: 1px solid black;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('modales')
@include('app.adm_hospital.servicios.profesionales.cobro_atencion')
@endsection

@section('page-script')

<script>
    function dame_camas_sala(resp){
         console.log(resp.value);
         let id_sala = resp.value;
        let url = "{{ ROUTE('adm_hospital.dame_camas_sala') }}";
        let data = {
            id: id_sala,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                $('#cama_atencion').empty();
                $('#cama_atencion').append('<option value="0">Seleccione </option>');
                let camas = resp.cantidad_camas;
               for(let i=1; i <= camas; i++){
                $('#cama_atencion').append('<option value="'+i+'">Cama '+i+'</option>');
               }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

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
            let url = "#";

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

        function validar_campo_telefono()
    {
        var telefono = $('#reserva_hora_telefono_uno').val();
        var email = $('#reserva_hora_correo').val();
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
            }
        }
    }

    function validarEdad(fechaNacimiento) {
        // Dividir la fecha de nacimiento en día, mes y año
        var partes = fechaNacimiento.split('/');
        var dia = parseInt(partes[0], 10);
        var mes = parseInt(partes[1], 10) - 1; // Los meses en JavaScript van de 0 a 11
        var anio = parseInt(partes[2], 10);

        // Crear un objeto Date con la fecha de nacimiento
        var fechaNac = new Date(anio, mes, dia);

        // Obtener la fecha actual
        var hoy = new Date();

        // Calcular la diferencia en años
        var edad = hoy.getFullYear() - fechaNac.getFullYear();
        var mes = hoy.getMonth() - fechaNac.getMonth();
        var dia = hoy.getDate() - fechaNac.getDate();

        // Ajustar la edad si el mes o día actual es antes del mes o día de nacimiento
        if (mes < 0 || (mes === 0 && dia < 0)) {
            edad--;
        }

        // Validar si la edad está en el rango de 0 a 120 años
        return edad >= 0 && edad <= 120;
    }

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
            $('.seccion_reserva_paciente_nuevo').removeClass('col-sm-12');
            $('.seccion_reserva_paciente_nuevo_representante').removeClass('col-sm-12');

            $('.seccion_reserva_paciente_nuevo').addClass('col-sm-12');
            $('.seccion_reserva_paciente_nuevo_representante').addClass('col-sm-12');
            $('.seccion_reserva_paciente_nuevo_representante').show();

            $('#agenda_agregar_paciente').children(0).removeClass('modal-md');
            $('#agenda_agregar_paciente').children(0).addClass('modal-xl');

            $('#reserva_hora_correo').attr('onblur', "");
        }
        else
        {
            $('.seccion_reserva_paciente_nuevo').removeClass('col-sm-6');
            $('.seccion_reserva_paciente_nuevo_representante').removeClass('col-sm-6');

            $('.seccion_reserva_paciente_nuevo').addClass('col-sm-12');
            $('.seccion_reserva_paciente_nuevo_representante').addClass('col-sm-12');
            $('.seccion_reserva_paciente_nuevo_representante').hide();

            $('#agenda_agregar_paciente').children(0).removeClass('modal-xl');
            $('#agenda_agregar_paciente').children(0).addClass('modal-md');

            $('#reserva_hora_correo').attr('onblur', "validar_email_agenda();");
        }
    }



    function registrar_paciente() {

        let url = "{{ ROUTE('adm_hospital.agendar_hora_nuevo_paciente_servicio') }}";
        let _token = $('#_token').val();
        let fecha_consulta = $('#fecha_consulta').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_institucion = $('#id_institucion').val();
        let reserva_hora_primer_apellido = $('#reserva_hora_apellido_uno').val();
        let reserva_hora_segundo_apellido = $('#reserva_hora_apellido_dos').val();
        let rut_paciente_reserva = $('#rut_paciente_reserva').val();
        let reserva_hora_nombre = $('#reserva_hora_nombres_paciente').val();
        let reserva_hora_fecha_nac = $('#reserva_hora_fecha_nac').val();
        let reserva_hora_sexo = $('#reserva_hora_sexo').val();
        let reserva_hora_convenio = $('#reserva_hora_convenio').val();
        let reserva_hora_region = $('#region_agregar').val();
        let reserva_hora_direccion = $('#reserva_hora_direccion').val();
        let reserva_hora_comuna = $('#ciudad_agregar').val();
        let reserva_hora_email = $('#reserva_hora_correo').val();
        let reserva_hora_telefono = $('#reserva_hora_telefono_uno').val();
        let reserva_hora_confirmacion = $('#reserva_hora_confirmacion').val();
        let reserva_hora_descripcion = $('#reserva_hora_descripcion_').val();
        let reserva_hora_sms = $('#reserva_hora_sms').val();

        $valido = 1;
        $mensaje = '';

        if (reserva_hora_nombre == '') {
            $valido = 0;
            $mensaje += 'Nombre Paciente requerido\n';
        }

        if (reserva_hora_primer_apellido == '') {
            $valido = 0;
            $mensaje += 'Apellido Paterno de Paciente requerido\n';
        }

        if (reserva_hora_segundo_apellido == '') {
            $valido = 0;
            $mensaje += 'Apellido Materno de Paciente requerido\n';
        }

        if (reserva_hora_fecha_nac == '') {
            $valido = 0;
            $mensaje += 'Fecha de Nacimiento del Paciente requerido\n';
        }

        if (reserva_hora_sexo == '') {
            $valido = 0;
            $mensaje += 'Sexo del Paciente requerido\n';
        }

        if (reserva_hora_convenio == '') {
            $valido = 0;
            $mensaje += 'Convenio del Paciente requerido\n';
        }

        if (reserva_hora_region == '') {
            $valido = 0;
            $mensaje += 'Región de Dirección del Paciente requerido\n';
        }

        if (reserva_hora_direccion == '') {
            $valido = 0;
            $mensaje += 'Dirección del Paciente requerido\n';
        }

        if (reserva_hora_comuna == '') {
            $valido = 0;
            $mensaje += 'Comuna de Dirección del Paciente requerido\n';
        }

        if (reserva_hora_email == '') {
            $valido = 0;
            $mensaje += 'Correo Electrónico del Paciente requerido\n';
        }

        if (reserva_hora_telefono == '') {
            $valido = 0;
            $mensaje += 'Teléfono del Paciente requerido\n';
        }

        if(reserva_hora_descripcion == '')
        {
            $valido = 0;
            $mensaje += 'Motivo de la urgencia es requerida\n';
        }

        // if(profesional_asignado == 0){
        //     $valido = 0;
        //     $mensaje += 'Profesional requerido\n';
        // }

        // if(sala == 0){
        //     $valido = 0;
        //     $mensaje += 'Sala requerida\n';
        // }

        // if(cama == 0){
        //     $valido = 0;
        //     $mensaje += 'Cama requerida\n';
        // }

        if ($valido == 0) {
            swal({
                title: "Error",
                text: $mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            return false;
        }

        $.ajax({

            url: url,
            type: "post",
            data: {
                _token: CSRF_TOKEN,
                fecha_consulta: fecha_consulta,
                rut_paciente_reserva: rut_paciente_reserva,
                reserva_hora_nombre: reserva_hora_nombre,
                reserva_hora_primer_apellido: reserva_hora_primer_apellido,
                reserva_hora_segundo_apellido: reserva_hora_segundo_apellido,
                reserva_hora_fecha_nac: reserva_hora_fecha_nac,
                reserva_hora_sexo: reserva_hora_sexo,
                reserva_hora_convenio: reserva_hora_convenio,
                reserva_hora_region: reserva_hora_region,
                reserva_hora_direccion: reserva_hora_direccion,
                reserva_hora_comuna: reserva_hora_comuna,
                reserva_hora_email: reserva_hora_email,
                reserva_hora_telefono: reserva_hora_telefono,
                reserva_hora_confirmacion: reserva_hora_confirmacion,
                reserva_hora_sms: reserva_hora_sms,
            },
        })
            .done(function (data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);
                    console.log(data);
                    $('#reservar_hora').modal('hide');
                    $('#bono_paciente_nombre').val(data.descripcion);
                    $('#bono_paciente_rut').val(data.rut_paciente);
                    $('#reserva_hora_id_paciente').val(data.id_paciente);
                    $('#reserva_hora_direccion').val(data.direccion);
                    asignar_profesional(data.descripcion);

                } else {
                    alert('Paciente no encontrado en el sistema');
                }

            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    };

    function asignar_profesional(nombre_paciente = null) {

        if(nombre_paciente == null){
            nombre_paciente = $('#bono_paciente_nombre').val();
        }
        console.log(nombre_paciente);
        $('#contenedor_paciente_atencion').empty();
        $('#contenedor_paciente_atencion').append(nombre_paciente);
        $('#m_asignar_profesional').modal('show');
    }

    function enter_buscar_paciente(event){
        $('#form_reseva_de_horas').submit(function(e) {
                e.preventDefault();
                if(event.keyCode == 13){
                    buscar_paciente();
                }
            });

    }

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

    function volver_recepcion(){
        $('#reserva_agregar_paciente_hora').hide();
    }

    function buscar_paciente() {
        $('#form_reseva_de_horas').submit(function(e) {
            e.preventDefault();
        });
        let rut = $('#rut_paciente_reserva').val();
        $('#reserva_agregar_paciente_hora').hide();
        $('#reserva_datos_paciente').hide();
        let url = "{{ route('adm_hospital.buscar_rut_paciente') }}";

        $.ajax({
                url: url,
                type: "get",
                data: {
                    rut: rut,
                },
            })
            .done(function(data) {
                console.log(data);

                if (data !== 'null') {

                    data = JSON.parse(data);
                    console.log(data);

                if(data.triage == 'SI'){
                    return swal({
                        icon: 'error',
                        text: 'Paciente ya ingresado',
                        buttons: false,
                        timer: 3000,
                        position: 'top-right',
                        toast:true,
                    });
                }
                if(data.tipo_paciente == 'SI')
                {
                    {{--  console.log(data);  --}}
                    $('#reserva_datos_paciente').show();
                    $('#reserva_hora_id_paciente').val(data.id);
                    $('#reserva_rut_paciente').text(data.rut);
                    $('#bono_paciente_rut').val(data.rut);
                    $('#input_reserva_hora_nombre').val(data.nombres);
                    $('#input_reserva_hora_apellido_uno').val(data.apellido_uno);
                    $('#input_reserva_hora_apellido_dos').val(data.apellido_dos);
                    $('#input_reserva_fecha_nacimiento').val(data.fecha_nac);
                    $('#input_reserva_hora_sexo').val(data.sexo);
                    $('#input_reserva_convenio').empty();
                    let convenios = data.prevision;
                    $('#bono_prevision').val(data.prevision.id);
                    let option = '<option value="0">Seleccione una opción</option>';
                    $('#input_reserva_convenio').append('<option value="'+convenios.id+'">'+convenios.nombre+'</option>');
                    $('#input_reserva_direccion_direccion').val(data.direccion.direccion+' #'+data.direccion.numero_dir);
                    $('#reserva_hora_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
                    $('#bono_paciente_nombre').val(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
                    $('#reserva_fecha_nacimiento').text(data.fecha_nac);
                    if (data.sexo == 'M') {
                        $('#reserva_sexo').text('Masculino');
                    } else {
                        $('#reserva_sexo').text('Femenino');
                    }
                    $('#reserva_hora_email').text(data.email);
                    $('#input_reserva_hora_email').val(data.email);
                    $('#reserva_hora_telefono').text(data.telefono_uno);
                    $('#input_reserva_hora_telefono').val(data.telefono_uno);

                    $('#reserva_convenio').text(data.prevision.nombre);
                    $('#reserva_direccion').text(data.direccion.direccion+' '+data.direccion.numero_dir+', '+data.direccion.ciudad.nombre);

                    $('#rut_paciente_reserva').val('');
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
                    // $('#region_agregar').val(data.direccion.ciudad.id_region);
                    // buscar_ciudad(data.direccion.id_ciudad);
                    // $('#reserva_hora_direccion').val(data.direccion.direccion);
                    // $('#reserva_hora_numero_dir').val(data.direccion.numero_dir);

                    // $('#reserva_hora_telefono_uno').val(data.telefono_uno);

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

    function buscar_rut_representente() {

        let rut = $('#reserva_hora_representante_rut').val();
        let url = "{{ route('agenda.buscar_rut_paciente') }}";

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

            if (data !== 'null') {
                data = JSON.parse(data);

                if (data.tipo_paciente == 'SI') {
                    $('#reserva_representante_nuevo_exitente').val(1);

                    $('#reserva_representante_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data
                        .apellido_dos);
                    $('#reserva_representante_fecha_nacimiento').text(data.fecha_nac);
                    if (data.sexo == 'M') {
                        $('#reserva_representante_sexo').text('Masculino');
                    } else {
                        $('#reserva_representante_sexo').text('Femenino');
                    }
                    $('#reserva_representante_direccion').text(data.direccion.direccion + ' ' + data.direccion
                        .numero_dir + ', ' + data.direccion.ciudad.nombre);
                    $('#reserva_representante_email').text(data.email);
                    $('#reserva_representante_telefono').text(data.telefono_uno);

                    $('#reserva_representante_id').val(data.id);
                    $('#reserva_representante_id_usuario').val(data.id_usuario);

                    $("#guardar_reserva_paciente").prop('disabled', false);

                    $('.div_representante_nuevo').hide();
                    $('.div_representante_existente').show();
                } else {
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
            } else {
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

    function buscar_ciudad_repesentante(id_ciudad = 0) {

    let region = $('#reserva_hora_representante_region_agregar').val();
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

                let ciudades = $('#reserva_hora_representante_ciudad_agregar');

                ciudades.find('option').remove();
                ciudades.append('<option value="0">seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre +
                        '</option>');
                })

                if (id_ciudad != 0)
                    ciudades.val(id_ciudad);

            } else {

                swal({
                    title: "Error",
                    text: "Error al cargar las ciudades",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('No se pudo Cargar las ciudades');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });


    }
</script>
@endsection

