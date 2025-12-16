@extends('template.adm_cm.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container pcoded-main-container-urgencia">
    <div class="pcoded-content ">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title pt-3">
                            <h5 class="font-weight-bold pt-3 d-inline">Escritorio enfermera {{ $servicio->nombre_servicio }}</h5>
                            <span class="badge badge-danger">EN CONSTRUCCIÓN</span>
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
                    </div>
                </div>
            </div>
        </div>

        <!--Cierre: Header-->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir">
                        <a href="javascript:void(0)" onclick="abrir_recepcion_paciente()">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-55 text-center" src="{{ asset('images/iconos_urg/aten-med.png') }}">
                                <h6 class="mt-1 mb-0">Recepción</h6>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ URL('Servicio/Enfermeria/Salas/'.$servicio->id) }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/box-aten.png') }}">
                                <h6 class="mt-1 mb-0">Salas {{ $servicio->nombre_servicio }}</h6>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="#">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/box-aten.png') }}">
                                <h6 class="mt-1 mb-0">Documentos de respaldo {{ $servicio->nombre_servicio }}</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE: Row Botones -->
    </div>
</div>
@endsection

@section('modales')
<div class="modal fade" id="modal_recepcion_paciente" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Recepción de paciente</h6>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            {{-- <h6 class="text-c-blue f-14">Ingrese el RUT del paciente</h6> --}}
                        </div>
                    </div>
                </div>


                <div class="form-row div_rut_buscar" id="div_rut_buscar">
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
                    <input type="hidden" name="id_servicio_interno" id="id_servicio_interno" value="{{ $servicio->id }}">



                    <div id="reserva_datos_paciente" class="row mx-3" style="display:none;">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="text-c-blue f-16 d-inline">Información del paciente</h6>
                            <button type="button" onclick="volver_a_busqueda();" class="btn btn-sm btn-warning-light-c float-right d-inline paciente_view">
                                <i class="feather icon-edit"></i> Volver
                            </button>
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
                                                            @if (isset($regiones))
                                                                @foreach ($regiones as $reg)
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
                                <tr>
                                    <th scope="row">
                                        <strong>Motivo</strong>
                                    </th>
                                    <td>
                                        <div class="paciente_view">
                                            <span id="reserva_hora_motivo"></span>
                                        </div>
                                        <div class="paciente_edit" style="display:none">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <input type="text" class="form-control form-control-sm" id="input_reserva_hora_motivo" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Diagnosticos</strong>
                                    </th>
                                    <td>
                                        <div class="paciente_view">
                                            <span id="reserva_hora_diagnosticos"></span>
                                        </div>
                                        <div class="paciente_edit" style="display:none">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <input type="text" class="form-control form-control-sm" id="input_reserva_hora_diagnosticos" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Derivado por:</strong>
                                    </th>
                                    <td>
                                        <div class="paciente_view">
                                            <span id="reserva_hora_derivado"></span>
                                        </div>
                                        <div class="paciente_edit" style="display:none">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <input type="text" class="form-control form-control-sm" id="input_reserva_hora_derivado" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Escala Eva</strong>
                                    </th>
                                    <td>
                                        <div class="paciente_view">
                                            <span id="reserva_hora_eva"></span>
                                        </div>
                                        <div class="paciente_edit" style="display:none">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <input type="text" class="form-control form-control-sm" id="input_reserva_hora_eva" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Observaciones</strong>
                                    </th>
                                    <td>
                                        <div class="paciente_view">
                                            <span id="reserva_hora_observaciones"></span>
                                        </div>
                                        <div class="paciente_edit" style="display:none">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <input type="text" class="form-control form-control-sm" id="input_reserva_hora_observaciones" value="">
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

                        <div class="modal-footer mb-0 pt-1 pb-0">
                            {{--  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                            <button type="button" onclick="agendar_hora();" class="btn btn-info"><i class="feather icon-check"></i> Agendar hora</button>  --}}
                            <button type="button"   onclick="asignar_profesional();"class="btn btn-info" id="btn_cobro_paciente"><i class="feather icon-check"></i>Asignar Sala/Cama</button>
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
                                <div class="form-group" style="display:none" name="div_codigo_validador" id="div_codigo_validador">
                                    <label class="floating-label-activo-sm">Codigo Validador</label>
                                    <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno_codigo_validador" id="reserva_hora_telefono_uno_codigo_validador" onkeyup="validar_codigo_telefono();">
                                </div>
                                <input type="hidden" name="result_codigo_validacion" id="result_codigo_validacion" value="0">
                                <div id="div_codigo_validador_mensaje" style="display:none"></div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <button class="btn btn-sm btn-info btn-block" type="button" id="btn_reserva_hora_telefono_uno_validar" disabled="disabled" onclick="enviar_validacion_telefono();">
                                    <i class="feather icon-check"></i> Validar
                                </button>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-3">
                                <label class="floating-label-activo-sm" for="diagnostico">Diagnósticos</label>
                                <input type="text" class="form-control form-control-sm"name="diagnostico_" id="diagnostico_" @if(isset($antecedentes_urgencia_paciente)) value="{{ $antecedentes_urgencia_paciente->motivo_consulta }}" @endif @if(!$enfermera)  @endif>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-3">
                                <label class="floating-label-activo-sm" for="antecedentes">Derivado por:</label>
                                <input type="text" class="form-control form-control-sm" name="antecedentes_" id="antecedentes_"@if(isset($antecedentes_urgencia_paciente)) value="{{ $antecedentes_urgencia_paciente->medio_referencia }}" @endif @if(!$enfermera)  @endif>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-3">
                                <label class="floating-label-activo-sm" for="esc_eva_ing">Escala EVA</label>
                                <input type="number" class="form-control form-control-sm" name="esc_eva_ing_" id="esc_eva_ing_"@if(isset($antecedentes_urgencia_paciente)) value="{{ $antecedentes_urgencia_paciente->eva }}" @endif @if(!$enfermera)  @endif>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                <label class="floating-label-activo-sm" for="obs_ing_pcte_">Examen relevante y Observaciones de la  Hospitalización</label>
                                <textarea class="form-control caja-texto form-control-sm mb-9" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ing_pcte_" id="obs_ing_pcte_" placeholder="EXAMEN DE INGRESO PACIENTE" @if(!$enfermera)  @endif>
                                    @if(isset($antecedentes_urgencia_paciente)){{ $antecedentes_urgencia_paciente->observaciones }}@endif
                                </textarea>
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

                        <div class="form-row my-2">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <h6 class="f-14 text-c-blue">Aviso o contacto con familiares</h6>
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
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_contacto_emergencia" name="reserva_contacto_emergencia">
                                        <label class="custom-control-label" for="reserva_contacto_emergencia">Contacto emergencia</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button"   onclick="registrar_paciente();"class="btn btn-info"><i class="feather icon-check"></i>Asignar Sala/Cama</button>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>

</div>
<div id="m_asignar_profesional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_asignar_profesional" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_pago_consulta_title">Asignación</h5>
                <button type="button" class="close close_modal_recepcion_bonos_api" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body pb-0">
                <div class="row">
                    <div class="col-12">
                        <div id="contenedor_paciente_atencion"></div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Motivo de hospitalización</label>
                            <select name="motivo_hospitalizacion" id="motivo_hospitalizacion" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                <option value="1">Para estudio</option>
                                <option value="2">Para cirugía</option>
                                <option value="3">Para tratamiento</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Asignación de gravedad</label>
                            <select name="nivel_gravedad" id="nivel_gravedad" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                <option value="1">Leve</option>
                                <option value="2">Mediana gravedad</option>
                                <option value="3">Grave</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Profesional</label>
                            <select name="profesional_asignado" id="profesional_asignado" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @foreach ($servicio->profesionales as $profesional)
                                    <option value="{{ $profesional->id }}">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Salas</label>
                            <select name="salas_servicio" id="salas_servicio" class="form-control form-control-sm" onchange="dame_camas_sala(this)">
                                <option value="0">Seleccione</option>
                                @foreach ($servicio->salas as $sala)
                                    <option value="{{ $sala->id }}">{{ $sala->nombre_sala }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Cama</label>

                            <select name="cama_atencion" id="cama_atencion" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="observaciones_asignacion_sala">Observaciones</label>
                            <input type="text" name="observaciones_asignacion_sala" id="observaciones_asignacion_sala" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs-aten nav-fill mb-3" id="opciones_hospitalizacion" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-aten text-reset active" id="evoluciones_hosp-tab" data-toggle="tab" href="#evoluciones_hosp" role="tab" aria-controls="evoluciones_hosp" aria-selected="true">Control de ciclo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-aten text-reset" id="medicamentos-tab" data-toggle="tab" href="#medicamentos" role="tab" aria-controls="medicamentos" aria-selected="true">Medicamentos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link-aten text-reset" id="solicitudes_examenes-tab" data-toggle="tab" href="#solicitudes_examenes" role="tab" aria-controls="solicitudes_examenes" aria-selected="true">Solicitudes de examenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-aten text-reset" id="procedimientos-tab" data-toggle="tab" href="#procedimientos" role="tab" aria-controls="procedimientos" aria-selected="true">Procedimientos</a>
                    </li>
                </ul>
                <div class="tab-content" id="opciones_hospitalizacion_">
                    <div class="tab-pane fade show active" id="evoluciones_hosp" role="tabpanel" aria-labelledby="evoluciones_hosp-tab">
                        <div
                            id="contenedor_nueva_evolucion">
                        </div>
                        <div id="contenedor_evoluciones_hosp">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <p class="pt-3 d-inline">
                                        FECHA Y HORA
                                    </p>
                                </div>
                                <div class="form-group col-md-10">
                                    <label class="floating-label">Evolución</label>
                                    <textarea class="form-control form-control-sm" name="evolucion" id="evolucion" rows="2" onfocus="this.rows=4" onblur="this.rows=3;"></textarea>
                                </div>
                                <hr>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm" for="ind_cv_inmmed_urg">Control de ciclo</label>
                                    <select name="ind_cv_inmmed_urg_" id="ind_cv_inmmed_urg_" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ind_cv_inmmed_urg','div_ind_cv_inmmed_urg','obs_ind_cv_inmmed_urg',6);">
                                        <option value="0">Seleccione</option>
                                        <option value="Cada media hora">CC/Cada media hora</option>
                                        <option value="Cada hora">CC/Cada hora</option>
                                        <option value="Cada dos horas">CC/Cada dos horas</option>
                                        <option value="Cada 4 horas">CC/Cada 4 horas</option>
                                        <option value="No indicado">No indicado</option>
                                        <option value="6">Otro</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_ind_cv_inmmed_urg" style="display:none;">
                                    <label class="floating-label-activo-sm" for="obs_ind_cv_inmmed_urg">Descripción <i>Otra Indicación</i></label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ind_cv_inmmed_urg" id="obs_ind_cv_inmmed_urg"></textarea>
                                </div>
                                <button class="btn btn-outline-success btn-sm w-100 mt-3" onclick="guardar_cc()">Guardar</button>
                            </div>
                            <div class="col-md-6">
                                <div id="img-doc-resp-hosp" class="collapse show" aria-labelledby="img-doc-resp-hosp-c" data-parent="#img-doc-resp-hosp">
                                    <div class="dropzone" id="mis-imagenes-doc-resp-hosp" action="{{ route('profesional.imagen.carga') }}"></div>
                                </div>
                                <button type="submit" id="btn_evolucion_paciente"
                                    class="btn btn-info-light-c btn-xxs d-inline float-right"
                                    ><i
                                        class="feather icon-plus"></i>
                                    Subir imagen de hosp por receta</button>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade show" id="medicamentos" role="tabpanel" aria-labelledby="medicamentos-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">

                                        <li class="nav-item active">
                                            <a class="nav-link-wizard"
                                                onclick="mostrarFormularioReceta(1)"
                                                id="rec_t1" data-toggle="pill"
                                                href="#rec_1" role="tab"
                                                aria-controls="rec_1"
                                                aria-selected="true">Receta Autocomplete</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-wizard"
                                                onclick="mostrarFormularioReceta(2)"
                                                id="rec_t2" data-toggle="pill"
                                                href="#rec_2" role="tab"
                                                aria-controls="rec_2"
                                                aria-selected="true">Receta Manual</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link-wizard" onclick="mostrarFormularioReceta(3)"
                                            id="procedimiento_div_tab" data-toggle="pill"
                                            href="#procedimiento_div" role="tab"
                                            aria-controls="procedimiento_div" aria-selected="true"
                                            toogle="true">Procedimientos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-wizard" onclick="mostrarFormularioReceta(4)"
                                            id="curaciones_div_tab" data-toggle="pill"
                                            href="#curaciones_div" role="tab"
                                            aria-controls="procedimiento_div" aria-selected="true"
                                            toogle="true">Curaciones</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link-wizard" onclick="mostrarFormularioReceta(4)" id="indicaciones_tab" data-toggle="pill" href="#indicaciones" role="tab" aria-controls="indicaciones" aria-selected="true" toogle="true">Otras Indicaciones</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content" id="pills-tablas_examenes">
                                    <!--TAB 1-->
                                    <div class="tab-pane fade show active" id="rec_1" role="tabpanel"
                                        aria-labelledby="rec_1">
                                        <div class="form-row">
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label">Medicamento</label>
                                                    <input type="text" id="nombre_medicamento_ficha_dental"
                                                        name="nombre_medicamento_ficha_dental"
                                                        onblur="getDosis_sdi();"
                                                        class="form-control form-control-sm">
                                                    <input type="hidden" id="id_medicamento_ficha_dental"
                                                        name="id_medicamento_ficha_dental"
                                                        class="form-control " value="">
                                                    <input type="hidden" id="id_medicamento_cant_comp"
                                                        name="id_medicamento_cant_comp" class="form-control "
                                                        value="">
                                                    <input type="hidden" id="id_medicamento_tipo_control"
                                                        name="id_medicamento_tipo_control"
                                                        class="form-control" value="">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group">
                                                    <label
                                                        class="floating-label-activo-sm">Composición:</label>
                                                    <div id="nombre_composicion_farmaco"
                                                        name="nombre_composicion_farmaco" class="p-t-5">
                                                    </div>
                                                    <div id="mensaje_med_control" name="mensaje_med_control"
                                                        class="alert-warning"></div>

                                                </div>
                                            </div>
                                            {{--  CUANDO SE ENCUENTRA MEDICAMENTO EN BUSQUEDA  --}}
                                            <div class="col-sm-6 mt-2 medicamento_activo">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Presentación</label>
                                                    <select class="form-control form-control-sm"
                                                        id="dosis_medicamento_ficha_dental"
                                                        name="dosis_medicamento_ficha_dental"
                                                        onchange="getFrecuencia_sdi();getCantComp_sdi();">
                                                        <option>Seleccione una opción</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2 medicamento_activo">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Posología</label>
                                                    <select class="form-control form-control-sm"
                                                        id="frecuencia_medicamento_ficha_dental"
                                                        name="frecuencia_medicamento_ficha_dental">
                                                        <option>Seleccione una opción</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{--  SI NO SE ENCUENTRA EL MEDICAMENTO EN LA BUSQUEDA  --}}
                                            <div class="col-sm-6 mt-2 medicamento_inactivo"
                                                style="display:none;">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Presentación</label>
                                                    <input type="text"
                                                        name="dosis_medicamento_ficha_dental_2"
                                                        id="dosis_medicamento_ficha_dental_2"
                                                        class="form-control form-control-sm ">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2 medicamento_inactivo"
                                                style="display:none;">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Posología</label>
                                                    <input type="text"
                                                        name="frecuencia_medicamento_ficha_dental_2"
                                                        id="frecuencia_medicamento_ficha_dental_2"
                                                        class="form-control form-control-sm ">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Vía de Administración</label>
                                                    <select class="form-control form-control-sm"
                                                        id="via_administracion_ficha_dental"
                                                        name="via_administracion_ficha_dental"
                                                        onchange="validar_via_administracion_sdi();">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">V&iacute;a Oral</option>
                                                        <option value="2">V&iacute;a Sublingual</option>
                                                        <option value="3">V&iacute;a T&oacute;pica
                                                        </option>
                                                        <option value="4">V&iacute;a Oftalmol&oacute;gica
                                                        </option>
                                                        <option value="5">V&iacute;a &Oacute;tica</option>
                                                        <option value="6">V&iacute;a Inhalatoria</option>
                                                        <option value="7">V&iacute;a Nasal</option>
                                                        <option value="8">V&iacute;a Rectal</option>
                                                        <option value="9">V&iacute;a Vaginal</option>
                                                        <option value="10">V&iacute;a parental</option>
                                                        <option value="11">Otra Vía</option>
                                                    </select>
                                                </div>
                                                <div class="form-group fill"
                                                    id="div_observaciones_medicamento_ficha_dental"
                                                    style="display: none;">
                                                    <label class="floating-label">Otra vía de
                                                        Administración</label>
                                                    <input type="text"
                                                        id="observaciones_medicamento_ficha_dental"
                                                        name="observaciones_medicamento_ficha_dental"
                                                        class="form-control form-control-sm " disabled>
                                                </div>
                                            </div>
                                            {{--  <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Periodo</label>
                                                    <select class="form-control form-control-sm" id="periodo_ficha_dental" name="periodo_ficha_dental" onchange="validar_periodo_sdi();">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">SOS</option>
                                                        <option value="2">Dosis unica</option>
                                                        <option value="3">3 d&iacute;as</option>
                                                        <option value="4">5 d&iacute;as</option>
                                                        <option value="5">7 d&iacute;as</option>
                                                        <option value="6">10 d&iacute;as</option>
                                                        <option value="7">15 d&iacute;as</option>
                                                        <option value="8">30 d&iacute;as</option>
                                                        <option value="9">Permanente</option>
                                                        <option value="10">V&iacute;a parental</option>
                                                        <option value="11">Otro Periodo</option>
                                                    </select>
                                                </div>
                                                <div class="form-group fill" id="div_observaciones_periodo_ficha_dental" style="display: none;">
                                                    <label class="floating-label">Otro Periodo</label>
                                                    <input type="text" id="observaciones_periodo_ficha_dental" name="observaciones_periodo_ficha_dental" class="form-control form-control-sm " disabled >
                                                </div>
                                            </div>  --}}
                                            {{-- cantidad de medicamento a despachar o comprar    --}}
                                            {{--  <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Cantidad Comprar/Despachar</label>
                                                    <select class="form-control form-control-sm" id="cantidad_comprar" name="cantidad_comprar" onchange="validar_cantidad_comprar_sdi();">
                                                        <option value="0">Seleccione</option>
                                                        <option value="999">Otra Cantidad</option>
                                                    </select>
                                                </div>
                                                <div class="form-group fill" id="div_otra_cantidad_a_comprar" style="display: none;">
                                                    <label class="floating-label">Otra Cantidad</label>
                                                    <input type="text" id="otra_cantidad_a_comprar" name="otra_cantidad_a_comprar" class="form-control form-control-sm " disabled >
                                                </div>
                                            </div>  --}}

                                            <div class="col-sm-6">
                                                <button type="button" onclick="indicar_medicamento_sdi(1)"
                                                    class="btn btn-success btn-sm float-right"><i
                                                        class="fa fa-plus"></i> Agregar Medicamento</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="table-responsive">
                                                    <table id="tabla_medicamento_cirugia_sdi"
                                                        class="table table-bordered table-xs">
                                                        <thead>
                                                            <tr>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">id_tipo_control</td>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">id_producto</td>
                                                                    <td class="text-center align-middle text-wrap">
                                                                        Fecha/Hora</td>
                                                                <td class="text-center align-middle text-wrap">
                                                                    Medicamentos</td>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">farmaco</td>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">id_presentacion</td>
                                                                {{-- <td class="text-center align-middle text-wrap">Presentación</td> --}}
                                                                <td class="text-center align-middle text-wrap"
                                                                    hidden="hidden">id_receta_dosis</td>
                                                                <td
                                                                    class="text-center align-middle text-wrap hidden">
                                                                    Posología</td>
                                                                <td class="text-center align-middle text-wrap">
                                                                    Via Adm.</td>
                                                                <th class="text-center align-middle">Eliminar
                                                                </th>
                                                        </thead>
                                                        <tbody id="tbody_tabla_medicamento_cirugia_sdi">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--TAB 2-->
                                    <div class="tab-pane fade show" id="rec_2" role="tabpanel"
                                        aria-labelledby="rec_2">
                                        <div class="form-row">
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Ingrese Nombre
                                                        Medicamento</label>
                                                    <input type="text"
                                                        id="manual_nombre_medicamento_ficha_dental"
                                                        name="nombre_medicamento_ficha_dental"
                                                        class="form-control form-control-sm">
                                                    <input type="hidden"
                                                        id="manual_id_medicamento_ficha_dental"
                                                        name="manual_id_medicamento_ficha_dental"
                                                        value="0">
                                                    <input type="hidden" id="med_faltante" value="">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Farmaco</label>
                                                    <input type="text"
                                                        id="manual_nombre_composicion_farmaco"
                                                        name="manual_nombre_composicion_farmaco"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tipo
                                                        Control</label>
                                                    <select name="manual_tipo_control"
                                                        id="manual_tipo_control"
                                                        class="form-control form-control-sm">
                                                        @if (isset($receta_control))
                                                        <option value="0">Seleccione</option>
                                                            @foreach ($receta_control as $control)
                                                                @if ($control->cod_control !== 8)
                                                                    <option
                                                                        value="{{ $control->cod_control }}">
                                                                        {{ $control->descripcion }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Ingrese
                                                        Presentación</label>
                                                    <input type="text"
                                                        id="manual_dosis_medicamento_ficha_dental"
                                                        name="manual_dosis_medicamento_ficha_dental"
                                                        class="form-control form-control-sm">

                                                </div>
                                            </div>

                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Ingrese
                                                        Posología</label>
                                                    <input type="text"
                                                        id="manual_frecuencia_medicamento_ficha_dental"
                                                        name="manual_frecuencia_medicamento_ficha_dental"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Vía de
                                                        Administración</label>
                                                    <select class="form-control form-control-sm"
                                                        id="manual_via_administracion_ficha_dental"
                                                        name="manual_via_administracion_ficha_dental"
                                                        onchange="validar_via_administracion_manual_sdi();">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">V&iacute;a Oral</option>
                                                        <option value="2">V&iacute;a Sublingual</option>
                                                        <option value="3">V&iacute;a T&oacute;pica
                                                        </option>
                                                        <option value="4">V&iacute;a Oftalmol&oacute;gica
                                                        </option>
                                                        <option value="5">V&iacute;a &Oacute;tica</option>
                                                        <option value="6">V&iacute;a Inhalatoria</option>
                                                        <option value="7">V&iacute;a Nasal</option>
                                                        <option value="8">V&iacute;a Rectal</option>
                                                        <option value="9">V&iacute;a Vaginal</option>
                                                        <option value="10">V&iacute;a parental</option>
                                                        <option value="11">Otra Vía</option>
                                                    </select>
                                                </div>
                                                <div class="form-group fill"
                                                    id="div_manual_observaciones_via_administracion_ficha_dental"
                                                    style="display: none;">
                                                    <label class="floating-label-activo-sm">Otra vía de
                                                        Administración</label>
                                                    <input type="text"
                                                        id="manual_observaciones_via_administracion_ficha_dental"
                                                        name="manual_observaciones_via_administracion_ficha_dental"
                                                        class="form-control form-control-sm " disabled>
                                                </div>
                                            </div>



                                            <div class="col-sm-12">
                                                <div class="row">
                                                    {{--  <div class="col-sm-6">
                                                        <div class="form-group mb-1">
                                                            <label><strong>Uso Crónico</strong></label>
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" id="manual_medicamento_uso_cronico">
                                                                <label for="manual_medicamento_uso_cronico" class="cr"></label>
                                                            </div>
                                                            <div class="alert-primary" id="manual_mensaje_uso_cronico" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                                        </div>
                                                    </div>  --}}
                                                    <div class="col-sm-6">
                                                        <button type="button"
                                                            onclick="indicar_medicamento_manual_sdi()"
                                                            class="btn btn-success btn-sm float-right"><i
                                                                class="fa fa-plus"></i> Agregar Medicamento
                                                            Manual</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{--  <div class="col-sm-6">
                                            <button type="button" onclick="indicar_medicamento_sdi(2)"
                                                class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento</button>
                                        </div>  --}}
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="table-responsive">
                                                    <table id="tabla_medicamento_2"
                                                        class="table table-bordered table-xs">
                                                        <thead>
                                                            <tr>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">id_tipo_control</td>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">id_producto</td>
                                                                    <td class="text-center align-middle text-wrap">
                                                                        Fecha/Hora</td>
                                                                <td class="text-center align-middle text-wrap">
                                                                    Medicamentos</td>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">farmaco</td>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">id_presentacion</td>
                                                                {{-- <td class="text-center align-middle text-wrap">Presentación</td> --}}
                                                                <td class="text-center align-middle text-wrap"
                                                                    hidden="hidden">id_receta_dosis</td>
                                                                <td
                                                                    class="text-center align-middle text-wrap hidden">
                                                                    Posología</td>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">id_via_administracion</td>
                                                                <td class="text-center align-middle text-wrap">
                                                                    Vía Adm.</td>
                                                                <th class="text-center align-middle">Eliminar
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody_tabla_medicamento_manual">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--TAB 3-->
                                    <div class="tab-pane fade show" id="procedimiento_div" role="tabpanel"
                                        aria-labelledby="procedimiento_div_tab">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm"
                                                        for="ind_med">Vías y Cateter</label>
                                                    <select name="ind_med" id="ind_med"
                                                        class="form-control form-control-sm"
                                                        onchange="evaluar_para_carga_detalle('ind_med','div_ind_med','obs_ind_med',5);">
                                                        <option selected value="0">Seleccione</option>
                                                        <option value="Cateter o vía venosa periférica">Cateter
                                                            o vía venosa periférica</option>
                                                        <option value="Cateter venoso central">Cateter venoso
                                                            central</option>
                                                        <option value="Catéter subcutáneo">Catéter subcutáneo
                                                        </option>
                                                        <option value="otra">otra </option>
                                                        <option value="Otra Indicación">Otra Indicación
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_ind_med"
                                                    style="display:none;">
                                                    <label class="floating-label-activo-sm"
                                                        for="obs_ind_med">Descripción <i>Otra
                                                            Indicación</i></label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                        name="obs_ind_med" id="obs_ind_med"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm"
                                                        for="ind_cur">Curaciones</label>
                                                    <select name="ind_cur" id="ind_cur"
                                                        class="form-control form-control-sm"
                                                        onchange="evaluar_para_carga_detalle('ind_cur','div_ind_cur','obs_ind_cur',9);">
                                                        <option selected value="0">Seleccione</option>
                                                        <option value="Retiro de puntos">Retiro de puntos
                                                        </option>
                                                        <option value="Curación simple">Curación simple
                                                        </option>
                                                        <option value="Curación Avanzada">Curación Avanzada
                                                        </option>
                                                        <option value="Curación c/afrontamiento">Curación
                                                            c/afrontamiento</option>
                                                        <option value="Sutura">Sutura</option>
                                                        <option value="Otra Indicación">Otra Indicación
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_ind_cur"
                                                    style="display:none;">
                                                    <label class="floating-label-activo-sm"
                                                        for="obs_ind_cur">Descripción <i>Otra
                                                            Indicación</i></label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                        name="obs_ind_cur" id="obs_ind_cur"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm"
                                                        for="ind_proc">Sondas y procedimientos</label>
                                                    <select name="ind_proc" id="ind_proc"
                                                        class="form-control form-control-sm"
                                                        onchange="evaluar_para_carga_detalle('ind_proc','div_ind_proc','obs_ind_proc',9);">
                                                        <option selected value="0">Seleccione</option>
                                                        <option value="Sonda folley con medición de diuresis">
                                                            Sonda folley con medición de diuresis</option>
                                                        <option value="Sonda folley sin medición de diuresis">
                                                            Sonda folley sin medición de diuresis</option>
                                                        <option value="Sonda folley con irrigación vesical">
                                                            Sonda folley con irrigación vesical</option>
                                                        <option value="Cateterismo vesical">Cateterismo vesical
                                                        </option>
                                                        <option value="Sonda Nasogástrica">Sonda Nasogástrica
                                                        </option>
                                                        <option value="Sonda Nasogástrica con lavado gástrico">
                                                            Sonda Nasogástrica con lavado gástrico</option>
                                                        <option
                                                            value="Sonda Nasogástrica medición de contenido">
                                                            Sonda Nasogástrica medición de contenido</option>
                                                        <option value="6">otra</option>
                                                        <option value="9">Otra </option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_ind_proc"
                                                    style="display:none;">
                                                    <label class="floating-label-activo-sm"
                                                        for="obs_ind_proc">Descripción <i>Otra
                                                            Indicación</i></label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                        name="obs_ind_proc" id="obs_ind_proc"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm"
                                                        for="ind_inmmed">Inmovilización</label>
                                                    <select name="ind_inmmed" id="ind_inmmed"
                                                        class="form-control form-control-sm"
                                                        onchange="evaluar_para_carga_detalle('ind_inmmed','div_ind_inmmed','obs_ind_inmmed',9);">
                                                        <option value="0">Seleccione</option>
                                                        <option value="Vendaje en 8">Vendaje en 8</option>
                                                        <option value="Cabestrillo">Cabestrillo</option>
                                                        <option value="Férula">Férula</option>
                                                        <option value="Vendaje Compresivo">Vendaje Compresivo
                                                        </option>
                                                        <option value="Valva de yeso braquiopalmar">Valva de
                                                            yeso braquiopalmar</option>
                                                        <option value="Valva de yeso antebraquiopalmar">Valva
                                                            de yeso antebraquiopalmar</option>
                                                        <option value="yeso bota larga">yeso bota larga
                                                        </option>
                                                        <option value="yeso bota corta">yeso bota corta
                                                        </option>
                                                        <option value="9">Otra Inmovilización</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_ind_inmmed"
                                                    style="display:none;">
                                                    <label class="floating-label-activo-sm"
                                                        for="obs_ind_inmmed">Descripción <i>Otra
                                                            Indicación</i></label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                        name="obs_ind_inmmed" id="obs_ind_inmmed"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="ind_cv_inmmed_urg" >Control de ciclo</label>
                                                    <select name="ind_cv_inmmed_urg" id="ind_cv_inmmed_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ind_cv_inmmed_urg','div_ind_cv_inmmed_urg','obs_ind_cv_inmmed_urg',6);">
                                                        <option value="0">Seleccione</option>
                                                        <option value="Cada media hora">Cada media hora</option>
                                                        <option value="Cada hora">Cada hora</option>
                                                        <option value="Cada dos horas">Cada dos horas</option>
                                                        <option value="Cada 4 horas">Cada 4 horas</option>
                                                        <option value="Suspender">Suspender</option>
                                                        <option value="6">Otro</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_ind_cv_inmmed_urg" style="display:none;">
                                                    <label class="floating-label-activo-sm" for="obs_ind_cv_inmmed_urg">Descripción <i>Otra Indicación</i></label>
                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ind_cv_inmmed_urg" id="obs_ind_cv_inmmed_urg"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">

                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm"
                                                        for="ind_pp">Preparar para</label>
                                                    <select name="ind_pp" id="ind_pp"
                                                        class="form-control form-control-sm"
                                                        onchange="evaluar_para_carga_detalle('ind_pp','div_ind_pp','obs_ind_pp',9);">
                                                        <option value="0">Seleccione</option>
                                                        <option value="Cirugía">Cirugía</option>
                                                        <option value="Traslado">Traslado</option>
                                                        <option value="etc">etc</option>
                                                        <option value="etc">etc</option>
                                                        <option value="Valva de yeso braquiopalmar">Valva de
                                                            yeso braquiopalmar</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_ind_pp"
                                                    style="display:none;">
                                                    <label class="floating-label-activo-sm"
                                                        for="obs_b_com">Descripción <i>Otra
                                                            Indicación</i></label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                        name="obs_ind_pp" id="obs_ind_pp"></textarea>
                                                </div>
                                            </div>
                                            {{-- <div class="col-sm-6 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Vigilar Signos de
                                                        Alerta</label>
                                                    <input type="text" id="ind_vig_sig" name="ind_vig_sig"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div> --}}


                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm"
                                                        for="obs_ind_med_servicio">Otras
                                                        Indicaciones (Indicar nombre)</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                        name="obs_ind_med_servicio" id="obs_ind_med_servicio" onkeydown="mostrarObservaciones()" placeholder="Indique nombre de procedimiento y el tipo (llene aqui)"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2 d-none" id="observaciones_otras_indicaciones">
                                                <div class="form-group">
                                                    <label
                                                        class="floating-label-activo-sm">Observaciones</label>
                                                    <input type="text" id="obs_detalle_ind_med"
                                                        name="obs_detalle_ind_med"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt-2">
                                                <button type="button" class="btn btn-outline-success btn-sm float-right" onclick="indicar_procedimiento_sdi()"><i class="fas fa-save"></i> Guardar</button>
                                            </div>
                                            {{-- PROCEDIMIENTOS --}}
                                            <!--Tabla-->
                                            <div class="col-sm-12 mt-2">
                                                <div class="table-responsive">
                                                    <table id="tabla_procedimientos_servicio"
                                                        class="table table-bordered table-xs">
                                                        <thead>
                                                            <tr>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">id_procedimiento</td>
                                                                <td class="text-center align-middle text-wrap">
                                                                        Fecha/Hora</td>
                                                                <td class="text-center align-middle text-wrap">
                                                                    Procedimiento</td>
                                                                <td class="text-center align-middle text-wrap">
                                                                    Vigilar Signos de Alerta</td>
                                                                <th class="text-center align-middle">Eliminar
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--Cierre: Tabla-->


                                        </div>

                                    </div>

                                    <!--TAB 4-->
                                    <div class="tab-pane fade show" id="curaciones_div" role="tabpanel" aria-labelledby="curaciones_div_tab">
                                        <div class="form-row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table id="tabla_curaciones_procedimientos"
                                                        class="table table-bordered table-xs">
                                                        <thead>
                                                            <tr>
                                                                <td class="text-center align-middle text-wrap hidden"
                                                                    hidden="hidden">id_procedimiento</td>
                                                                <td class="text-center align-middle text-wrap">
                                                                    Procedimiento</td>
                                                                <td class="text-center align-middle text-wrap">
                                                                    Vigilar Signos de Alerta</td>
                                                                <th class="text-center align-middle">Eliminar
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--DIV DE TABLA -->


                                    <!--Cierre: Tabla-->
                                    <!-- DIV MEDICAMENTO FALTANTE-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-sm-12 mt-3 mb-2">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="ranking_recetas_switch">
                                                    <label class="custom-control-label text-primary"
                                                        for="ranking_recetas_switch"><strong><u>Ranking de
                                                                recetas controladas del
                                                                paciente</u></strong></label>
                                                </div>
                                            </div>
                                            <div class="row" id="ranking_recetas" style="display:none">
                                                <div class="col-sm-12 col-md-12">
                                                    <h6 class="text-c-blue mb-3">Recetas propias</h6>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group fill">
                                                        <label class="floating-label">Tipo de control</label>
                                                        <select class="form-control form-control-sm"
                                                            id="" name="">
                                                            <option>Seleccione una opción</option>
                                                            <option value="S" data-select2-id="0">
                                                                Seleccione una opción</option>
                                                            <option value="1"> Control Psicotrópicos
                                                            </option>
                                                            <option value="2"> Control Estupefacientes
                                                            </option>
                                                            <option value="3"> Receta cheque </option>
                                                            <option value="4"> Receta Retenida Simple
                                                            </option>
                                                            <option value="5"> Receta Retenida C/Codeína
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input class="form-control form-control-sm" type="text"
                                                        placeholder="Nº de recetas">
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <h6 class="text-c-blue mb-3">Recetas totales</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group fill">
                                                        <label class="floating-label">Tipo de control</label>
                                                        <select class="form-control form-control-sm"
                                                            id="" name="">
                                                            <option value="S" data-select2-id="0">
                                                                Seleccione una opción</option>
                                                            <option value="1"> Control Psicotrópicos
                                                            </option>
                                                            <option value="2"> Control Estupefacientes
                                                            </option>
                                                            <option value="3"> Receta cheque </option>
                                                            <option value="4"> Receta Retenida Simple
                                                            </option>
                                                            <option value="5"> Receta Retenida C/Codeína
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input class="form-control form-control-sm" type="text"
                                                        placeholder="Nº de recetas">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="control_ciclo" role="tabpanel" aria-labelledby="control_ciclo-tab">

                        <div id="contenedor_evoluciones_paciente">
                                @if(!$enfermera)
                                    <div class=" border  px-2 pt-3 pb-1 rounded shadow mb-3">
                                        <div class="form-row">
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tº</label>
                                                    <input type="text" class="form-control form-control-sm" name="temperatura"
                                                        id="temperatura" value="" >
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Pulso</label>
                                                    <input type="text" class="form-control form-control-sm" name="pulso" id="pulso"
                                                        value="{!! old('pulso') !!}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md-col-lg-col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">PAS</label>
                                                    <input type="text" class="form-control form-control-sm" name="pas" id="pas"
                                                        value="{!! old('presion_pas') !!}" oninput="calcularPAM()">
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">PAD</label>
                                                    <input type="text" class="form-control form-control-sm" name="presion_bi" id="pad"
                                                        value="{!! old('presion_pad') !!}" oninput="calcularPAM()">
                                                </div>
                                            </div>
                                            <!--el PAM esla presion arterial media hay una formula-->
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">PAM</label>
                                                    <input type="text" class="form-control form-control-sm" name="presion_bi" id="pam"
                                                        value="{!! old('presion_pam') !!}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-sm-2 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Peso</label>
                                                    <input type="text" class="form-control form-control-sm" name="peso" id="peso"
                                                        value="{!! old('peso') !!}" oninput="calcularIMC()">

                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">

                                                    <label class="floating-label-activo-sm">Talla</label>
                                                    <input type="text" class="form-control form-control-sm" name="talla" id="talla"
                                                        value="{!! old('talla') !!}" oninput="calcularIMC()">

                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <!--el IMC es el indice de masa corporal hay una formula-->
                                                    <label class="floating-label-activo-sm">IMC</label>
                                                    <input type="text" class="form-control form-control-sm" name="imc" id="imc"
                                                        value="{!! old('imc') !!}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tipo de Respiracion</label>
                                                    <select name="tipo_respiracion_servicio" id="tipo_respiracion_servicio" class="form-control form-control-sm" onchange="mostrarDatosRespiracion(event)">
                                                        <option value="0">Seleccione</option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="Agitada">Agitada</option>
                                                        <option value="Dificultosa">Dificultosa</option>
                                                        <option value="Signos de hipoxia">Signos de hipoxia</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-sm-9 d-none" id="select_info_respiracion_servicio">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <div class="form-group">
                                                            <label for="" class="floating-label-activo-sm">F/R</label>
                                                            <input type="text" class="form-control form-control-sm" name="fr" id="fr"
                                                                value="{!! old('fr') !!}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <div class="form-group">
                                                            <label for="" class="floating-label-activo-sm">Sat (%)</label>
                                                            <input type="text" class="form-control form-control-sm" name="saturacion_fio2" id="saturacion_fio2"
                                                                value="{!! old('saturacion') !!}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label for="" class="floating-label-activo-sm">FI 02 (%)</label>
                                                            <input type="text" class="form-control form-control-sm" name="saturacion_oxigeno" id="saturacion_oxigeno"
                                                                value="{!! old('saturacion_oxigeno') !!}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label for="dispositivo_servicio" class="floating-label-activo-sm">Dispositivo</label>
                                                            <select name="dispositivo_servicio" id="dispositivo_servicio" class="form-control form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="Naricera">Naricera</option>
                                                                <option value="Mascarilla simple">Mascarilla simple</option>
                                                                <option value="Mascarilla C/reservorio">Mascarilla C/reservorio</option>
                                                                <option value="Tubo nasotraqueal">Tubo nasotraqueal</option>
                                                                <option value="Tubo orotraqueal">Tubo orotraqueal</option>
                                                                <option value="Traqueostoma">Traqueostoma</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <button type="button" class="btn btn-outline-info btn-sm w-100" data-target="#modalInfoRespiracionServicio" data-toggle="modal">Info</button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">HGT</label>
                                                    <input type="text" class="form-control form-control-sm" name="hemoglucotest"
                                                        id="hemoglucotest" value="{!! old('hemoglucotest') !!}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                <div class="form-group">

                                                    <label class="floating-label-activo-sm">Glasgow</label>
                                                    <input type="text" class="form-control form-control-sm" name="glasgow" id="glasgow"
                                                        value="{!! old('glasgow') !!}" >

                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">EVA</label>
                                                    <input type="text" class="form-control form-control-sm" name="c_eva" id="c_eva"
                                                        value="{!! old('c_eva') !!}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otras Pruebas</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                        name="otras_pruebas" id="otras_pruebas"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-3">
                                                <label class="floating-label-activo-sm">Gravedad/Estado de consciencia</label>
                                                <input type="text" class="form-control form-control-sm" name="gravedad_e_conc"
                                                    id="gravedad_e_conc" value="{!! old('gravedad_e_conc') !!}" >
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <button type="button" class="btn btn-icon btn-danger-light-c"><i class="feather icon-x"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-success-light-c"
                                                    onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                        </div>
                    </div>
                    <div class="tab-pane fade show" id="solicitudes_examenes" role="tabpanel" aria-labelledby="solicitudes_examenes-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="modal-body">

                                        <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Tipo Examen</label>

                                                    <select class="form-control form-control-sm"
                                                        name="tipo_examen" id="tipo_examen" onchange="">
                                                        <option value="0">Seleccione</option>
                                                        @foreach ($examenMedico as $exa)
                                                            <option value="{{ $exa->cod_examen }}">
                                                                {{ $exa->nombre_examen }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Sub-tipo de
                                                        Examen</label>

                                                    <select class="form-control form-control-sm"
                                                        name="sub_tipo_examen" id="sub_tipo_examen">
                                                        <option value="">Seleccione</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Examen</label>
                                                    <select class="form-control form-control-sm"
                                                        name="examen" id="examen">
                                                        <option value="">Seleccione</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Lado</label>
                                                    <select class="form-control form-control-sm"
                                                        id="lado" name="lado">
                                                        <option value="0" >Seleccione</option>
                                                        <option value="Derecho">Derecho</option>
                                                        <option value="Izquierdo">Izquierdo</option>
                                                        <option value="Bilateral">Bilateral</option>
                                                        <option value="N/C" selected>No corresponde</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Prioridad</label>
                                                    <select class="form-control form-control-sm"
                                                        id="prioridad" name="prioridad">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Baja</option>
                                                        <option value="2" selected>Media</option>
                                                        <option value="3">Alta</option>
                                                        <option value="4">Urgente</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mt-3">
                                                <div class="form-group mb-1">
                                                    <label><strong>Con Contraste</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="imagenologia_con_contraste"
                                                            disabled='disabled'>
                                                        <label for="imagenologia_con_contraste"
                                                            class="cr"></label>
                                                    </div>
                                                    <div class="alert-primary"
                                                        id="mensaje_imagenologia_con_contraste"
                                                        style="display:none;">Acaba de seleccionar Imagen con
                                                        Constraste, El examen de Creatinina fue adjuntado
                                                        correctamente.</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="button" onclick="indicar_examen_cirugia();"
                                                    id="agregar_examen_tabla"
                                                    class="btn btn-success btn-sm float-right">
                                                    <i lass="fa fa-plus"></i> Agregar Examen
                                                </button>
                                            </div>
                                            <div class="col-sm-12 mt-3">
                                                <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                <!--Tabla-->
                                                <div class="table-responsive">
                                                    <table id="tabla_examen_cirugia"
                                                        class="table table-bordered table-sm tabla_examenes_ficha">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle"
                                                                    style="display:none">id</th>
                                                                <th class="text-center align-middle"
                                                                    style="display:none">Nombre Examen</th>
                                                                <th class="text-center align-middle">Fecha/Hora</th>
                                                                <th class="text-center align-middle">Nombre
                                                                    Examen</th>
                                                                <th class="text-center align-middle">Lado</th>
                                                                <th class="text-center align-middle">Tipo</th>
                                                                {{--  <th class="text-center align-middle">Sub-Tipo</th>  --}}
                                                                <th class="text-center align-middle">Prioridad
                                                                </th>
                                                                <th class="text-center align-middle">Con
                                                                    Contraste</th>
                                                                <th class="text-center align-middle">Acción
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($examenes_solicitados as $examen)
                                                                <tr>
                                                                    <td class="text-center align-middle"
                                                                        style="display:none">{{ $examen->id }}</td>
                                                                    <td class="text-center align-middle"
                                                                        style="display:none">{{ $examen->datos_examen->examen }}</td>
                                                                    <td class="text-center align-middle">
                                                                        {{ $examen->fecha }} {{ $examen->hora }}</td>
                                                                    <td class="text-center align-middle">
                                                                        {{ $examen->datos_examen->examen }}</td>
                                                                    <td class="text-center align-middle">
                                                                        {{ $examen->datos_examen->lado }}</td>
                                                                    <td class="text-center align-middle">
                                                                        {{ $examen->datos_examen->tipo_examen }}</td>
                                                                    {{--  <td class="text-center align-middle">{{ $examen->sub_tipo }}</td>  --}}
                                                                    <td class="text-center align-middle">
                                                                        {{ $examen->datos_examen->prioridad }}</td>
                                                                    <td class="text-center align-middle">
                                                                        {{ $examen->datos_examen->imagenologia_con_contraste }}</td>
                                                                    <td class="text-center align-middle">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            onclick="eliminar_examen_cirugia({{ $examen->id }})"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--Cierre Tabla-->
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  --}}
                                        {{--  <button type="button" data-dismiss="modal" class="btn btn-info">Guardar</button>  --}}
                                        {{--  <button type="button" onclick="alerta_registro_examen();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>  --}}
                                        <button type="button" onclick="registro_examen_ficha();"
                                            data-dismiss="modal" class="btn btn-info">Generar Orden de
                                            Examen</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="procedimientos" role="tabpanel" aria-labelledby="procedimientos-tab">
                        <table id="tabla_procedimientos_hosp" class="table table-bordered table-xs">
                            <thead>
                                <tr>
                                    <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                        id_procedimiento
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        Fecha/Hora
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        Procedimiento
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        Vigilar
                                        Signos de
                                        Alerta</td>
                                    <th class="text-center align-middle">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                                                                                                                                </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm w-100 my-2" onclick="registrar_nueva_atencion()"><i class="fas fa-save"></i> Asignar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="contenedor_recetas_asignacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" name="id_paciente" id="id_paciente" value="">
@endsection

@section('page-script')
<script>
        /** Used to generate unique IDs. */
        var idCounter = 0;
        Dropzone.options.misImagenesDocRespHosp = {
            // Note: using "function()" here to bind `this` to
            // the Dropzone instance.
            init: function() {
                this.on("addedfile", file => {
                    console.log("A file has been added");
                });
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },
            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            // Enviar datos adicionales con el archivo
            sending: function (file, xhr, formData) {
                const idPaciente = document.getElementById("id_paciente").value; // Obtener ID paciente
                formData.append("id_paciente", idPaciente); // Agregarlo al formulario
            },
            // Acción al completar correctamente la subida
            success: function (file, response) {
                console.log("Archivo subido exitosamente:", response);
                // Opcional: manejar la respuesta del servidor
            },

            // Manejo de errores
            error: function (file, errorMessage) {
                console.error("Error al subir archivo:", errorMessage);
            },
        };



    $(document).ready(function() {
        $("#nombre_medicamento_ficha_dental").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('medicamentos.get') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.length == 0) {
                            $('#rec1 .medicamento_activo').hide();
                            $('#rec1 .medicamento_inactivo').show();
                            $('#dosis_medicamento_ficha_dental_2').val('');
                            $('#frecuencia_medicamento_ficha_dental_2').val('');
                            $('#id_medicamento_ficha_dental').val('');
                            $('#id_medicamento_tipo_control').val('');
                            $('#mensaje_med_control').val('');
                        } else {
                            $('#rec1 .medicamento_activo').show();
                            $('#rec1 .medicamento_inactivo').hide();
                            $('#dosis_medicamento_ficha_dental_2').val('');
                            $('#frecuencia_medicamento_ficha_dental_2').val('');
                            // $('#id_medicamento_ficha_dental').val('');
                            $('#id_medicamento_tipo_control').val('');
                            $('#mensaje_med_control').val('');
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                console.log(ui.item);
                // Set selection
                $('#nombre_medicamento_ficha_dental').val(ui.item
                .label); // display the selected text
                $('#id_medicamento_ficha_dental').val(ui.item.value); // save selected id to input
                $('#nombre_composicion_farmaco').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control').val(ui.item.control); // save selected id to input
                if (ui.item.control == 1 || ui.item.control == 1 || ui.item.control == 2 || ui.item
                    .control == 3 || ui.item.control == 4 || ui.item.control == 5)
                    $('#mensaje_med_control').html(
                        'Este Paciente ha tenido 3 Recetas retenidas este año<br>Consulte en "Ranking de recetas controladas del paciente"'
                        );
                else
                    $('#mensaje_med_control').html('');

                return false;
            }
        });
        $('#tipo_examen').change(function(e) {
            console.log('tipo examen examen comun');
            e.preventDefault();
            tipo_examen = $('#tipo_examen').val();

            $("#sub_tipo_examen").empty();
            $("#examen").empty();
            $.ajax({
                    url: 'https://med-sdi.cl/api/Ficha_atencion_sub_tipo',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        tipo_examen: tipo_examen
                    },
                })
                .done(function(response) {

                    $('#sub_tipo_examen').append(
                        `<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#sub_tipo_examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                    }

                    /** ACTIVAR CHECHBOK DE CON  CONTRASTE */
                    if ($('#tipo_examen').val() == 354) $('#imagenologia_con_contraste').removeAttr(
                        'disabled');
                    else $('#imagenologia_con_contraste').attr('disabled', 'disabled');
                })
                .fail(function() {
                    console.log("error");
                })

        });


        $('#sub_tipo_examen').change(function(e) {

            e.preventDefault();
            sub_tipo_examen = $('#sub_tipo_examen').val();

            $("#examen").empty();
            $.ajax({
                    url: "{{ route('examen.medico.get') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        sub_tipo_examen: sub_tipo_examen
                    },
                })
                .done(function(response) {

                    $('#examen').append(`<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                    }
                })
                .fail(function() {
                    console.log("error");
                })

        });


        $('#imagenologia_con_contraste').change(function() {
            if ($('#imagenologia_con_contraste').is(':checked')) {
                $('#mensaje_imagenologia_con_contraste').show();
            } else {
                $('#mensaje_imagenologia_con_contraste').hide();
            }

        });
    });

    function indicar_examen_cirugia() {

       var tipo_examen = $("#tipo_examen option:selected").text();
       var id_tipo_examen = $("#tipo_examen").val();
       var sub_tipo_examen = $("#sub_tipo_examen option:selected").text();
       var id_sub_tipo_examen = $("#sub_tipo_examen").val();
       var examen = $("#examen option:selected").text();
       var id_examen = $("#examen").val();
       var prioridad = $("#prioridad option:selected").text();
       var lado = $("#lado option:selected").text();
       var id_paciente = $('#id_paciente').val();

       var imagenologia_con_contraste = 'N/C';
       if($('#imagenologia_con_contraste').is(':checked'))
           imagenologia_con_contraste = 'Con Contraste';

       var valido = 0;
       var mensaje = '';

       if ($.trim(tipo_examen) == '' || $.trim(tipo_examen) == 'Seleccione...' || $.trim(tipo_examen) == 'Seleccione') {
           valido = 1;
           mensaje += ' Debe seleccionar Tipo Examen\n';
       }
       if( $.trim(sub_tipo_examen) == '' || $.trim(sub_tipo_examen) == 'Seleccione...' || $.trim(sub_tipo_examen) == 'Seleccione' ){
           valido = 1;
           mensaje += ' Debe seleccionar Sub Tipo Examen\n';
       }
       if ($.trim(examen) == '' || $.trim(examen) == 'Seleccione...' || $.trim(examen) == 'Seleccione') {
           valido = 1;
           mensaje += ' Debe seleccionar Examen\n';
       }
       if ($.trim(prioridad) == '' || $.trim(prioridad) == 'Seleccione...' || $.trim(prioridad) == 'Seleccione') {
           valido = 1;
           mensaje += ' Debe seleccionar Prioridad\n';
       }


       if (valido == 0) {
           let data = {
               tipo_examen: tipo_examen,
               id_tipo_examen: id_tipo_examen,
               sub_tipo_examen: sub_tipo_examen,
               id_sub_tipo_examen: id_sub_tipo_examen,
               examen: examen,
               id_examen: id_examen,
               prioridad: prioridad,
               lado: lado,
               id_paciente: id_paciente,
               imagenologia_con_contraste: imagenologia_con_contraste,
               _token: "{{ csrf_token() }}"
           }

           var url = "{{ route('examen.indicar_examen_cirugia') }}";
           $.ajax({
                   url: url,
                   type: "post",
                   data: data,
                   dataType: "json",
               })
               .done(function(data) {
                   console.log(data);
                   if (data.estado == 'success') {
                       let examenes = data.examenes;
                       $('#tabla_examen_cirugia tbody').empty();
                       $('#tabla_examenes_servicios tbody').empty();
                       examenes.forEach(function(resp) {
                           let examen = resp.datos_examen;
                           $('#tabla_examen_cirugia tbody').append(`
                               <tr>
                                    <td class="text-center align-middle text-wrap">${resp.fecha} ${resp.hora} <br> ${resp.responsable}</td>
                                   <td class="text-center align-middle text-wrap">${examen.examen}</td>
                                   <td class="text-center align-middle text-wrap">${examen.lado}</td>
                                   <td class="text-center align-middle text-wrap">${examen.tipo_examen}</td>
                                   <td class="text-center align-middle text-wrap">${examen.prioridad}</td>
                                   <td class="text-center align-middle text-wrap">${examen.imagenologia_con_contraste}</td>
                                   <td class="text-center align-middle"><div class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_cirugia(${resp.id});"><i class="fas fa-trash"></i></div></td>
                               </tr>
                           `);
                           $('#tabla_examenes_servicios tbody').append(`
                               <tr>
                                   <td class="text-center align-middle text-wrap">`+resp.fecha+` `+resp.hora+` <br> `+resp.responsable+`</td>
                                   <td class="text-center align-middle text-wrap">`+examen.examen+`</td>
                                   <td class="text-center align-middle text-wrap">
                                       <div class="switch switch-success d-inline">
                                           <input type="checkbox" id="examenes_servicio_listo`+resp.id+`" checked="">
                                           <label for="examenes_servicio_listo`+resp.id+`" class="cr"></label>
                                       </div>
                                       </td>
                                       <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-outline-info btn-sm has-ripple" data-target="#modalAgregarInsumos" data-toggle="modal">Insumos<span class="ripple ripple-animate" style="height: 66.375px; width: 66.375px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -15.25px; left: -1.53125px;"></span></button></td>
                                   </tr>
                           `);
                       });
                       swal({
                           title: "Ingreso de examen(es).",
                           text: data.mensaje,
                           icon: "success",
                           buttons: "Aceptar",
                           //SuccessMode: true,
                       })
                   } else {
                       swal({
                           title: "Ingreso de examen(es).",
                           text: data.mensaje,
                           icon: "error",
                           buttons: "Aceptar",
                           //SuccessMode: true,
                       });
                   }
               })
               .fail(function(jqXHR, ajaxOptions, thrownError) {
                   console.log(jqXHR, ajaxOptions, thrownError)
               });
       }else{
           swal({
               title: "Ingreso de examen(es).",
               text: mensaje,
               icon: "error",
               buttons: "Aceptar",
               //SuccessMode: true,
           });
       }

       // $('.examenes_sin_registros').remove();


       // if ($('#imagenologia_con_contraste').prop('checked')) {
       //     $('#tabla_examen_cirugia tr').each(function(key, value) {
       //         $(value).find('td').each(function(key_td, value_td) {
       //             if (key_td == 0) {
       //                 if ($(value_td).text() == 'CREATININA EN SANGRE') {
       //                     creatinina = 1;
       //                 }
       //             }
       //         });
       //     });
       //     if (creatinina == 0) {
       //         fila = '';
       //         fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
       //         fila += '<td class="text-center align-middle text-wrap">CREATININA EN SANGRE</td>';
       //         fila += '<td class="text-center align-middle text-wrap">SANGRE</td>';
       //         //fila =     '<td>' + sub_tipo_examen + '</td>';
       //         fila += '<td class="text-center align-middle text-wrap">Media</td>';
       //         fila += '<td class="text-center align-middle text-wrap">N/C</td>';
       //         fila += '<td class="text-center align-middle"><div name="remove" id="' + i +
       //             '" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_contraste(\'row' + i +
       //             '\');"><i class="fas fa-trash"></i></div></td>';
       //         fila += '</tr>';
       //         $('#tabla_examen_cirugia tr:first').after(fila);
       //         i++;
       //         creatinina = 1;
       //     }
       // }




       $("#tipo_examen").val('');
       $("#sub_tipo_examen").val('');
       $("#examen").val('');
       $("#prioridad").val(2);
       $('#imagenologia_con_contraste').prop('checked', false);
       $('#mensaje_imagenologia_con_contraste').hide();
       $("#lado").val(0);
   }

    function abrir_recepcion_paciente(){
        // abrir modal de recepcion de paciente
        $('#modal_recepcion_paciente').modal('show');
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
            .done(function(resp) {

                if (resp[0] !== 'null') {
                    data = JSON.parse(resp[0]);
                    let evoluciones = resp[1];
                    let recetas = resp[2];
                    let procedimientos = resp[3];
                    let curaciones = resp[4];
                    let examenes = resp[5];
                    console.log(evoluciones);

                    if(evoluciones){
                        $('#contenedor_evoluciones_hosp').empty();
                            if(evoluciones.length > 0){

                                    evoluciones.forEach((e, index) => {

                                    $('#contenedor_evoluciones_hosp').append(`
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <p class="pt-3 d-inline">
                                                    `+e.fecha+` `+e.hora+`
                                                </p>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label class="floating-label-active-sm">Evolución</label>
                                                <textarea class="form-control form-control-sm" name="evolucion" id="evolucion" rows="2" onfocus="this.rows=4" onblur="this.rows=3;">`+e.evolucion+`</textarea>
                                            </div>
                                            <hr>

                                            <div class="col-md-12 d-flex justify-content-end">
                                                <button type="button" class="btn btn-icon btn-danger-light-c"
                                                    onclick="eliminarEvolucionAgregada(`+e.id+`,`+index+`)"><i class="feather icon-x"></i>
                                                </button>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <table class="table table-bordered table-xs table-responsive" id="table_medicamentos_info${e.id}">
                                                            <thead>
                                                                <tr>
                                                                    <td>Medicamento</td>
                                                                    <td>Posología</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <table class="table table-bordered table-xs table-responsive" id="table_examenes_info${e.id}">
                                                            <thead>
                                                                <tr>
                                                                    <td>Examenes</td>
                                                                    <td>Tipo</td>
                                                                    <td>Prioridad</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <table class="table table-bordered table-xs table-responsive" id="table_procedimientos_info${e.id}">
                                                            <thead>
                                                                <tr>
                                                                    <td>Procedimiento</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);

                                    // Mostrar los exámenes en la tabla correspondiente
                                    if (e.examenes && e.examenes.length > 0) {
                                        e.examenes.forEach(examen => {
                                            $(`#table_examenes_info${e.id} tbody`).append(`
                                                <tr>
                                                    <td>${examen.datos_examen.examen}</td>
                                                    <td>${examen.datos_examen.tipo_examen}</td>
                                                    <td>${examen.datos_examen.prioridad}</td>
                                                </tr>
                                            `);
                                        });
                                    }else{
                                        $(`#table_examenes_info${e.id}`).empty();
                                    }

                                    if(e.recetas && e.recetas.length > 0){
                                        e.recetas.forEach(m => {
                                            $(`#table_medicamentos_info${e.id} tbody`).append(
                                                `
                                                    <tr>
                                                        <td>${m.nombre_medicamento}</td>
                                                        <td>${m.nombre_frecuencia}</td>
                                                    </tr>
                                                `
                                            );
                                        })
                                    }else{
                                        $(`#table_medicamentos_info${e.id}`).empty();
                                    }

                                    if(e.procedimientos && e.procedimientos.length > 0){
                                        e.procedimientos.forEach(p => {
                                            $(`#table_procedimientos_info${e.id} tbody`).append(
                                                `
                                                    <tr>
                                                        <td>${p.datos_procedimiento.nombre_procedimiento}</td>

                                                    </tr>
                                                `
                                            );
                                        })
                                    }else{
                                        $(`#table_procedimientos_info${e.id}`).empty();
                                    }
                                });



                            $('#contenedor_evoluciones_hosp').append(`

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <h6 class="text-c-blue">
                                            Resumen de
                                            evoluciones e
                                            interconsultas</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control form-control-sm" name="resumen_evolucion" id="resumen_evolucion" rows="3" onfocus="this.rows=5" onblur="this.rows=4;"></textarea>
                                    </div>
                                </div>
                            `);
                        }
                    }
                    if(recetas){
                        $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                        $('#tbody_tabla_medicamento_manual').empty();
                        recetas.forEach(r => {
                            $('#tbody_tabla_medicamento_cirugia_sdi').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                    `+r.id+`
                                </td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">

                                </td>
                                <td class="text-center align-middle text-wrap">
                                    `+r.fecha+` `+r.hora+`
                                </td>
                                <td class="text-center align-middle text-wrap">
                                    `+r.nombre_medicamento+`
                                </td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">

                                </td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">

                                </td>

                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">

                                </td>
                                <td class="text-center align-middle text-wrap hidden">
                                    `+r.nombre_frecuencia+`
                                </td>
                                <td class="text-center align-middle text-wrap">
                                    `+r.via_administracion+`
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_medicamento_sdi(`+r.id+`)"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            `);
                            $('#tbody_tabla_medicamento_manual').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                    `+r.id+`
                                </td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">

                                </td>
                                <td class="text-center align-middle text-wrap">
                                    `+r.fecha+` `+r.hora+`
                                </td>
                                <td class="text-center align-middle text-wrap">
                                    `+r.nombre_medicamento+`
                                </td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">

                                </td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">

                                </td>

                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">

                                </td>
                                <td class="text-center align-middle text-wrap hidden">
                                    `+r.nombre_frecuencia+`
                                </td>
                                <td class="text-center align-middle text-wrap">
                                    `+r.via_administracion+`
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_medicamento_sdi(`+r.id+`)"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    }

                    if(procedimientos){
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_procedimientos_servicio tbody').empty();
                        procedimientos.forEach(p => {
                            if (p.estado == 0) {
                                var html = '<span class="badge badge-warning">Suspendido </span>';
                            } else {
                                var html = '';
                            }
                            let datos = p.datos_procedimiento;
                            $('#tabla_procedimientos_hosp tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${p.fecha} ${p.hora} <br> ${p.responsable}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                    <td class="text-center align-middle text-wrap">
                                        <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${p.id})">
                                            <i class="fas fa-trash"></i>Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-${p.estado === 0 ? 'success' : 'warning'} btn-sm"
                                            onclick="${p.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${p.id})">
                                            <i class="fas ${p.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                            ${p.estado === 0 ? 'Reponer' : 'Suspender'}
                                        </button>
                                    </td>
                                </tr>
                            `);
                            $('#tabla_procedimientos_servicio tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap hidden" hidden="hidden">

                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        `+p.fecha+` `+p.hora+`
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        `+datos.nombre_procedimiento+` ${html}
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <input type="text" id="ind_vig_sig41" name="ind_vig_sig41" class="form-control form-control-sm">
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${p.id})">
                                            <i class="fas fa-trash"></i>Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-${p.estado === 0 ? 'success' : 'warning'} btn-sm"
                                            onclick="${p.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${p.id})">
                                            <i class="fas ${p.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                            ${p.estado === 0 ? 'Reponer' : 'Suspender'}
                                        </button>
                                    </td>
                                </tr>
                            `);
                        });
                    }

                    if(curaciones){
                        $('#tabla_curaciones_procedimientos tbody').empty();
                        curaciones.forEach(c => {
                            $('#tabla_curaciones_procedimientos tbody').append(`
                            <tr>
                                    <td class="text-center align-middle text-wrap">`+c.datos_curacion.nombre_procedimiento+`</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sigundefined" name="ind_vig_sigundefined" class="form-control form-control-sm"></td>
                                    <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(`+c.id+`)"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            `);
                        });
                    }

                    if(examenes){
                        $('#tabla_examen_cirugia tbody').empty();
                       examenes.forEach(function(resp) {
                           let examen = resp.datos_examen;
                           $('#tabla_examen_cirugia tbody').append(`
                               <tr>
                                <td class="text-center align-middle text-wrap">`+resp.fecha+` `+resp.hora+` <br> `+resp.responsable+`</td>
                                   <td class="text-center align-middle text-wrap">${examen.examen}</td>
                                   <td class="text-center align-middle text-wrap">${examen.lado}</td>
                                   <td class="text-center align-middle text-wrap">${examen.tipo_examen}</td>
                                   <td class="text-center align-middle text-wrap">${examen.prioridad}</td>
                                   <td class="text-center align-middle text-wrap">${examen.imagenologia_con_contraste}</td>
                                   <td class="text-center align-middle"><div class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_cirugia(${resp.id});"><i class="fas fa-trash"></i></div></td>
                               </tr>
                           `);
                       });
                    }

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
                    $('#id_paciente').val(data.id);
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
                    $('#paciente_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
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

                    $('#reserva_hora_motivo').text(data.motivo_hospitalizacion);
                    $('#reserva_hora_diagnosticos').text(data.diagnostico);
                    $('#reserva_hora_derivado').text(data.derivado);
                    $('#reserva_hora_eva').text(data.eva);

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

    function eliminar_examen_cirugia(id){
        swal({
            title: "Eliminar Examen.",
            text: 'Al "Aceptar" Elimina el examen.\n',
            icon: "warning",
            buttons: ["Cancelar", 'Aceptar'],
        }).then((result) => {
            if (result == true) {
                eliminar_examen_cirugia_ajax(id);
            } else {
                console.log('regresar');
            }
        })


    }

    function eliminar_examen_cirugia_ajax(id){
        var url = "{{ route('examen.eliminar_examen_cirugia') }}";
        var id_paciente = $('#id_paciente').val();
        $.ajax({
                url: url,
                type: "post",
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 'success') {
                    let examenes = data.examenes;
                    $('#tabla_examen_cirugia tbody').empty();
                    $('#tabla_examenes_servicios tbody').empty();
                    examenes.forEach(function(resp) {
                        let examen = resp.datos_examen;
                        console.log(examen);
                        $('#tabla_examen_cirugia tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${examen.examen}</td>
                                <td class="text-center align-middle text-wrap">${examen.lado}</td>
                                <td class="text-center align-middle text-wrap">${examen.tipo_examen}</td>
                                <td class="text-center align-middle text-wrap">${examen.prioridad}</td>
                                <td class="text-center align-middle text-wrap">${examen.imagenologia_con_contraste}</td>
                                <td class="text-center align-middle"><div name="remove" id="${resp.id}" class="btn btn-danger btn_remove btn-sm btn-sm" onclick="eliminar_examen_cirugia(${resp.id});"><i class="fas fa-trash"></i></div></td>
                            </tr>
                        `);
                        $('#tabla_examenes_servicios tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${resp.fecha} ${resp.hora} <br> ${resp.responsable}</td>
                                <td class="text-center align-middle text-wrap">${examen.examen}</td>
                                <td class="text-center align-middle text-wrap">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="examenes_servicio_listo${resp.id}" checked="">
                                        <label for="examenes_servicio_listo${resp.id}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-outline-info btn-sm has-ripple" data-target="#modalAgregarInsumos" data-toggle="modal">Insumos<span class="ripple ripple-animate" style="height: 66.375px; width: 66.375px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -15.25px; left: -1.53125px;"></span></button></td>
                            </tr>
                        `);
                    });
                    swal({
                        title: "Ingreso de examen(es).",
                        text: data.mensaje,
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                } else {
                    swal({
                        title: "Ingreso de examen(es).",
                        text: data.mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function volver_a_busqueda(){
        // ocultar modal de paciente
        $('#reserva_agregar_paciente_hora').hide();
        $('#reserva_datos_paciente').hide();
        $('#div_rut_buscar').show();
    }

    function asignar_profesional(nombre_paciente = null) {
        if(nombre_paciente == null){
            nombre_paciente = $('#bono_paciente_nombre').val();
        }
        console.log(nombre_paciente);
        $('#contenedor_paciente_atencion').empty();
        $('#contenedor_paciente_atencion').append(nombre_paciente);
        $('#m_asignar_profesional').modal('show');
    }

    function eliminarEvolucionAgregada(id, idCounter) {
        swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta evolución?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmarEliminarEvolucionAgregada(id, idCounter);
            }
        })
    }

    function confirmarEliminarEvolucionAgregada(id, idCounter){
        let url = "{{ route('enfermeria.eliminar_evolucion_agregada_hosp') }}";
        var idPaciente = $('#id_paciente').val();
        $.ajax({
            url: url,
            type: 'post',
            data: {
                id: id,
                id_paciente: idPaciente,
                id_counter: idCounter,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.vista;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución eliminada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#contenedor_evoluciones_hosp').empty();
                    $('#contenedor_evoluciones_hosp').append(vista);
                } else {
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function getDosis_sdi() {
        let id_medicamento = $('#id_medicamento_ficha_dental').val();
        console.log(id_medicamento);

        let url = "{{ route('dosis.get') }}";
        $.ajax({

            url: url,
            type: "get",
            data: {

                id_medicamento: id_medicamento,

            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null) {

                data = JSON.parse(data);
                console.log(data)
                let dosis = $('#dosis_medicamento_ficha_dental');

                dosis.find('option').remove();
                dosis.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    dosis.append('<option value="' + v.dosis + '" data-id="' + v.id +
                        '" data-cant_comp="' + v.cant_comp + '">' + v.present +
                        '</option>');
                })

            } else {



            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function mostrarFormularioReceta(id) {
            console.log(id);
            if (id == 1) {
                $('#rec_1').addClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').removeClass('show active');
            } else if (id == 2) {
                $('#rec_2').addClass('show active');
                $('#rec_1').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').removeClass('show active');
            } else if (id == 3) {
                $('#rec_1').removeClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').addClass('show active');
                $('#curaciones_div').removeClass('show active');
            }else{
                console.log('es 4');
                $('#rec_1').removeClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').addClass('show active');
            }
        }

        function indicar_procedimiento_sdi() {
            var ind_med = $('#ind_med').val();
            var ind_cur = $('#ind_cur').val();
            var ind_proc = $('#ind_proc').val();
            var ind_inmmed = $('#ind_inmmed').val();
            var ind_cc = $('#ind_cv_inmmed_urg').val();
            var ind_pp = $('#ind_pp').val();
            var ind_vig_sig = $('#ind_vig_sig').val();

            var obs_ind_med = $('#obs_ind_med_servicio').val();
            var obs_detalle_ind_med = $('#obs_detalle_ind_med').val();

            var params = new URLSearchParams(location.search);
            var id_paciente = $('#id_paciente').val();

            var valido = 0;
            var mensaje = '';

            // if ($.trim(ind_med) == '' || ind_med == 0 || $.trim(ind_med) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Vias y Cateter.\n';
            // }

            // if ($.trim(ind_cur) == '' || ind_cur == 0 || $.trim(ind_cur) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Curaciones.\n';
            // }

            // if ($.trim(ind_proc) == '' || ind_proc == 0 || $.trim(ind_proc) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Sondas y procedimientos.\n';
            // }

            // if ($.trim(ind_inmmed) == '' || ind_inmmed == 0 || $.trim(ind_inmmed) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Inmovilizacion.\n';
            // }

            // if ($.trim(ind_cc) == '' || ind_cc == 0 || $.trim(ind_cc) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Control de ciclo.\n';
            // }

            // if ($.trim(ind_pp) == '' || ind_pp == 0 || $.trim(ind_pp) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Preparar para.\n';
            // }

            // if ($.trim(ind_vig_sig) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Vigilar signos de alerta.\n';
            // }

            // if ($.trim(obs_ind_med) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Observaciones.\n';
            // }

            // if ($.trim(obs_detalle_ind_med) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Detalle de Observaciones.\n';
            // }


            if (valido == 0) {
                let data = {
                    ind_med: ind_med,
                    ind_cur: ind_cur,
                    ind_proc: ind_proc,
                    ind_inmmed: ind_inmmed,
                    ind_cc: ind_cc,
                    ind_pp: ind_pp,
                    ind_vig_sig: ind_vig_sig,
                    id_paciente: id_paciente,
                    obs_ind_med: obs_ind_med,
                    obs_detalle_ind_med: obs_detalle_ind_med,
                    _token: "{{ csrf_token() }}"
                };

                console.log(data);
                var url = "{{ route('indicar_procedimiento_sdi') }}";
                $.ajax({
                        url: url,
                        type: "post",
                        data: data,
                        dataType: "json",
                    })
                    .done(function(data) {
                        if (data.status == 1) {
                            let procedimientos = data.procedimientos;
                            let curaciones = data.curaciones;

                            $('#tabla_procedimientos_servicio tbody').empty();
                            $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                            $('#tabla_curaciones_servicio tbody').empty();
                            $('#tabla_curaciones_procedimientos tbody').empty();
                            $('#tabla_procedimientos_hosp tbody').empty();
                            procedimientos.forEach(function(procedimiento) {
                                console.log(procedimiento.id);
                                if (procedimiento.estado == 0) {
                                    var html = '<span class="badge badge-warning">Suspendido </span>';
                                } else {
                                    var html = '';
                                }
                                let datos = JSON.parse(procedimiento.datos_procedimiento);
                                // Ahora puedes trabajar con datos como un objeto JSON

                                $('#tabla_procedimientos_servicio tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);

                                $('#tabla_procedimientos_hosp tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap">
                                            <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                        </td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);
                            });
                            if (curaciones.length > 0) {
                                curaciones.forEach(function(curacion) {
                                    let datos = curacion.datos_curacion;
                                    // Ahora puedes trabajar con datos como un objeto JSON
                                    console.log(curacion);
                                    $('#tabla_curaciones_servicio tbody').append(`
                                        <tr>
                                            <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                            <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                            <td class="text-center align-middle">
                                                <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="switch switch-success d-inline">
                                                    <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                                    <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                                    Insumos
                                                </button>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-outline-warning btn-sm" >
                                                    <i class="fas fa-edit"></i>

                                                </button>
                                            </td>
                                        </tr>
                                    `);

                                    $('#tabla_curaciones_procedimientos tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fas fa-trash"></i></button></td>
                                    </tr>
                                    `);
                                });
                            }

                            swal({
                                title: "Indicación de Procedimiento.",
                                text: data.mensaje,
                                icon: "success",
                                buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        } else {
                            swal({
                                title: "Indicación de Procedimiento.",
                                text: data.mensaje,
                                icon: "error",
                                buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                        }
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            } else {
                swal({
                    title: "Indicación de Procedimiento.",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        }

        function evaluar_para_carga_detalle(select, div, input, valor)
        {
            var valor_select = $('#'+select+'').val();
            if(valor_select == valor) $('#'+div+'').show();
            else {
                $('#'+div+'').hide();
                $('#'+input+'').val('');
            }
        }

        function eliminar_procedimiento_sdi(id) {
            swal({
                title: "Eliminar Procedimiento.",
                text: 'Al "Aceptar" Elimina el procedimiento.\n',
                icon: "warning",
                buttons: ["Cancelar", 'Aceptar'],
            }).then((result) => {
                console.log(result);
                if (result == true) {
                    eliminar_procedimiento_sdi_ajax(id);
                } else {
                    console.log('regresar');
                }
            });
        }

        function suspender_procedimiento_sdi(id) {
            var url = "{{ route('suspender_procedimiento_sdi') }}";
            var id_paciente = $('#id_paciente').val();

            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        id: id,
                        id_paciente: id_paciente,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(procedimientos);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            if (procedimiento.estado == 0) {
                                var html = '<span class="badge badge-warning">Suspendido </span>';
                            } else {
                                var html = '';
                            }
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                    <td class="text-center align-middle text-wrap">
                                        <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                            <i class="fas fa-trash"></i>Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                            onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                            <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                            ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                        </button>
                                    </td>
                                </tr>
                            `);

                            $('#tabla_procedimientos_hosp tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                    <td class="text-center align-middle text-wrap">
                                        <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                            <i class="fas fa-trash"></i>Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                            onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                            <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                            ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                        </button>
                                    </td>
                                </tr>
                            `);

                        });

                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm" >
                                            <i class="fas fa-edit"></i>

                                        </button>
                                    </td>
                                </tr>
                            `);
                        });

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function eliminar_procedimiento_sdi_ajax(id) {
            var url = "{{ route('eliminar_procedimiento_sdi') }}";
            var id_paciente = $('#id_paciente').val();
            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        id: id,
                        id_paciente: id_paciente,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(curaciones);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            if (procedimiento.estado == 0) {
                                    var html = '<span class="badge badge-warning">Suspendido </span>';
                                } else {
                                    var html = '';
                                }
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);

                                $('#tabla_procedimientos_hosp tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap">
                                            <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                        </td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);
                        });

                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm" >
                                            <i class="fas fa-edit"></i>

                                        </button>
                                    </td>
                                </tr>
                            `);
                        });

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function eliminarCuracion(id) {
            swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no podrás recuperar este registro!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('eliminar_curacion') }}",
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id,
                                "id_paciente": $('#id_paciente').val()
                            },
                            success: function(data) {

                                // convertir json a objeto
                                var obj = JSON.parse(data);
                                var curaciones = obj.curaciones;
                                $('#tabla_curaciones_servicio tbody').empty();
                                $('#tabla_curaciones_procedimientos tbody').empty();
                                curaciones.forEach(curacion => {
                                    let datos = curacion.datos_curacion;
                                    $('#tabla_curaciones_servicio tbody').append(`
                                    <tr>
                                        <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                        <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle">
                                            <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                                <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                                Insumos
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarCuracion(${curacion.id})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                `);
                                    $('#tabla_curaciones_procedimientos tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap hidden" hidden="hidden">${curacion.id}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${curacion.id}" name="ind_vig_sig${curacion.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                `);
                                });

                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    }
                });

        }

        function eliminar_medicamento_sdi(id) {
            swal({
                title: "Eliminar Medicamento",
                text: "¿Está seguro de eliminar el medicamento?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    let url = "{{ route('detalle_receta.eliminar') }}";
                    var _token = CSRF_TOKEN;
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _token: _token,
                            id: id,
                        },
                        success: function(resp) {
                            console.log(resp);
                            let mensaje = resp.status;
                            if (mensaje == 'success') {
                                let medicamentos = resp.data;
                                $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                                $('#tbody_tabla_medicamento_manual').empty();
                                $('#tabla_tratamientos_servicio tbody').empty();
                                medicamentos.forEach(medicamento => {
                                    console.log(medicamento);
                                    if (medicamento.id_dosis == null) {
                                        medicamento.dosis = medicamento.nombre_dosis;
                                    }

                                    if (medicamento.id_frecuencia == null || medicamento
                                        .id_frecuencia == 0) {
                                        medicamento.indicaciones = medicamento
                                        .nombre_frecuencia;
                                    }

                                    let fila = `<tr id="row${medicamento.id}">
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                                <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                                            </tr>`;

                                    let fila_ = `<tr id="row${medicamento.id}">
                                                <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                                <td><input type="text" disabled></td>
                                                <td class="p-0">
                                                    <div class="switch switch-success d-inline">
                                                        <input type="checkbox" id="tratamiento_listo${medicamento.id}">
                                                        <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                                    </div><br>
                                                    <label>Listo</label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                                </td>
                                                <td><button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"> </i></button> </td>
                                            </tr>`;
                                    $('#tbody_tabla_medicamento_cirugia_sdi').append(fila);
                                    $('#tbody_tabla_medicamento_manual').append(fila);
                                    $('#tabla_tratamientos_servicio tbody').append(fila_);
                                });
                                swal({
                                    title: "Medicamento Eliminado",
                                    icon: "success",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                            }
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        }
                    })
                }
            });
        }

        function enviar_medicamento_faltante_sdi()
        {
            var med_faltante = $.trim($('#med_faltante').val());
            var med_droga = $.trim($('#manual_nombre_composicion_farmaco').val());

            if(med_faltante != '')
            {
                /** registro */
                let url = "{{ route('medicamentoFaltante.registro')}}";


                var _token = CSRF_TOKEN;
                var id_profesional = $('#id_profesional').val();

                $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        id_profesional: id_profesional,
                        nombre: med_faltante,
                        droga: med_droga,
                    },
                })
                .done(function(data)
                {

                    if (data !== 'null')
                    {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        if(data.estado == 1)
                        {
                            swal({
                                title: "Medicamento/Dispositivo Faltante enviado.\n Proximamente se agregará el Medicamento/Dispositivo Faltante en los registros",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            $('#med_faltante').val('');
                            $('#no_existe_switch').prop( "checked", false );
                            $('#no_existe').hide();

                        }
                        else{

                            swal({
                                title: "Problema al Enviar solicitud.",
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

            }
            else
            {
                swal({
                    title: "Debe Indicar el nombre del Medicamento/Dispositivo Faltante.",
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        }
        function indicar_medicamento_manual_sdi()
        {
            let nombre_medicamento_ficha_dental = $('#manual_nombre_medicamento_ficha_dental').val();
            let id_medicamento = $('#manual_id_medicamento_ficha_dental').val();
            let farmaco = $('#manual_nombre_composicion_farmaco').val();
            let tipo_control = $('#manual_tipo_control').val();

            let dosis_medicamento_ficha_dental = $('#manual_dosis_medicamento_ficha_dental').val();
            let frecuencia_medicamento_ficha_dental = $('#manual_frecuencia_medicamento_ficha_dental').val();

            let cantidad_comprar = $('#manual_cantidad_comprar').val();
            let cantidad_numero_comprar = $('#manual_cantidad_numero').val();

            let id_via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental').val();
            let via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental option:selected').text();

            let observaciones_medicamento_ficha_dental = $('#manual_observaciones_via_administracion_ficha_dental').val();

            let id_periodo_ficha_dental = $('#manual_periodo_ficha_dental').val();
            let periodo_ficha_dental = $('#manual_periodo_ficha_dental option:selected').text();

            let observaciones_periodo_ficha_dental = $('#manual_observaciones_periodo_ficha_dental').val();



            var lista_med = [];
            $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    lista_med.push($.trim($(data[2]).text().split("\n").join("")));
                }
            });

            if($.inArray(nombre_medicamento_ficha_dental,lista_med) == -1)
            {

                var medicamento_uso_cronico = 0;
                if($('#manual_medicamento_uso_cronico').is(':checked'))
                    medicamento_uso_cronico = 1;

                var valido = 0;
                var mensaje = '';

                if($.trim(nombre_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Medicamento.\n';
                }

                if($.trim(tipo_control) == '0')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Tipo Control.\n';
                }

                if($.trim(farmaco) == '')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Farmaco.\n';
                }

                if($.trim(dosis_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Presentación.\n';
                }

                if($.trim(frecuencia_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Posología.\n';
                }


                if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Via de Administración.\n';
                }
                else if($('#via_administracion_ficha_dental').val() == 11)
                {
                    if( $.trim(observaciones_medicamento_ficha_dental) == '')
                    {
                        valido = 1;
                        mensaje += 'Debe ingresar Otra Vía Administración\n';
                    }
                    else
                    {
                        via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
                    }
                }

                // if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
                // {
                //     valido = 1;
                //     mensaje += 'Debe completar el campo Periodo.\n';
                // }
                // else if($('#periodo_ficha_dental').val() == 11)
                // {
                //     if( $.trim(observaciones_periodo_ficha_dental) == '')
                //     {
                //         valido = 1;
                //         mensaje += 'Debe ingresar Otro Periodo\n';
                //     }
                //     else
                //     {
                //         periodo_ficha_dental = observaciones_periodo_ficha_dental;
                //     }
                // }

                // if($.trim(cantidad_comprar) == '')
                // {
                //     valido = 1;
                //     mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
                // }
                // else
                // {
                //     const regex = /\(\d+\) \w+ \w+/g;
                //     if (!regex.test(cantidad_comprar))
                //     {
                //         console.log('no cuadra');
                //         valido = 1;
                //         mensaje += 'El campo de Cantidad a Comprar no tiene el formato adecuado\n Ejemplo: (1) Una Caja.\n';
                //     }
                //     else
                //     {
                //         console.log('correcto');
                //     }
                // }

                if(valido == 0)
                {
                    var parametros = {
                        "id_tipo_control": tipo_control,
                        "id_medicamento": id_medicamento,
                        "nombre_medicamento_ficha_dental": nombre_medicamento_ficha_dental,
                        "farmaco": farmaco,
                        "dosis_medicamento_ficha_dental": dosis_medicamento_ficha_dental,
                        "frecuencia_medicamento_ficha_dental": frecuencia_medicamento_ficha_dental,
                        "via_administracion_ficha_dental": via_administracion_ficha_dental,
                        "observaciones_medicamento_ficha_dental": observaciones_medicamento_ficha_dental,
                        "medicamento_uso_cronico": medicamento_uso_cronico,

                    }

                    console.log(parametros);
                    $('.medicamentos_sin_registros').remove();
                    agregarMedicamentoManualReceta(parametros, 1);

                    /** enviando a table de medicamento faltante */
                    if($('#id_medicamento_ficha_dental').val() == '')
                    {
                        $('#med_faltante').val(nombre_medicamento_ficha_dental);
                        enviar_medicamento_faltante_sdi();
                    }


                    $('#manual_nombre_medicamento_ficha_dental').val('');
                    $('#manual_id_medicamento_ficha_dental').val('');
                    $('#manual_nombre_composicion_farmaco').val('');
                    $('#manual_dosis_medicamento_ficha_dental').val('');
                    $('#manual_frecuencia_medicamento_ficha_dental').val('');
                    $('#manual_cantidad_comprar').val('');
                    $('#manual_via_administracion_ficha_dental').val(0);
                    $('#manual_observaciones_via_administracion_ficha_dental').val('');
                    $('#manual_periodo_ficha_dental').val(0);
                    $('#manual_observaciones_periodo_ficha_dental').val('');

                    $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();

                }
                else
                {
                    swal({
                        title: "Ingreso de medicamento(s).",
                        text: mensaje,
                        icon: "error",
                    });
                }
            }
            else
            {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text:'El medicamento está Recetado',
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        }

        function validar_via_administracion_manual_sdi() {
            if ($('#manual_via_administracion_ficha_dental').val() == 11) {
                $('#div_manual_observaciones_via_administracion_ficha_dental').show();
                $('#manual_observaciones_via_administracion_ficha_dental').removeAttr('disabled');
            } else {
                $('#div_manual_observaciones_via_administracion_ficha_dental').hide();
                $('#manual_observaciones_via_administracion_ficha_dental').attr('disabled', 'disabled');
                $('#manual_observaciones_via_administracion_ficha_dental').val('');
            }
        }

        function agregarMedicamentoManualReceta(parametros, receta_am) {

        let url = "{{ route('detalle_receta.registro_manual_receta') }}";
        let id_paciente = $('#id_paciente').val();
        let selectedOption = $('#dosis_medicamento_ficha_dental option:selected');
        let dataId = selectedOption.data('id');
        var _token = CSRF_TOKEN;
        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_ficha: $('#id_fc').val(),
                id_tipo_control: parametros.id_tipo_control,
                id_medicamento: parametros.id_medicamento,
                nombre_medicamento_ficha_dental: parametros.nombre_medicamento_ficha_dental,
                nombre_dosis_ficha_dental: parametros.dosis_medicamento_ficha_dental,
                nombre_frecuencia_ficha_dental: parametros.frecuencia_medicamento_ficha_dental,
                via_administracion: parametros.via_administracion_ficha_dental,
                farmaco: parametros.farmaco,
                observaciones: parametros.observaciones_medicamento_ficha_dental,
                uso_cronico: parametros.medicamento_uso_cronico,
                id_paciente: id_paciente,
                receta_am: receta_am,
            },
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.status;
                if (mensaje == 'success') {
                    let medicamentos = resp.data;
                    $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                    $('#tbody_tabla_medicamento_manual').empty();
                    $('#tabla_tratamientos_servicio tbody').empty();
                    medicamentos.forEach(medicamento => {
                        console.log(medicamento);
                        if (medicamento.id_dosis == null) {
                            medicamento.dosis = medicamento.nombre_dosis;
                        }

                        if (medicamento.id_frecuencia == null || medicamento.id_frecuencia == 0 ||
                            medicamento.id_frecuencia == 1000) {
                            medicamento.indicaciones = medicamento.nombre_frecuencia;
                        }
                        let fila = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                        <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                                    </tr>`;

                        let fila_ = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                        <td><input type="text" disabled></td>
                                        <td class="p-0">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="tratamiento_listo${medicamento.id}" disabled>
                                                <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                            </div><br>
                                            <label>Pendiente</label>
                                        </td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                        </td>
                                        <td> <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarObservaciones" onclick="dame_tratamiento(${medicamento.id})"><i class="fas fa-edit"> </i></button></td>
                                    </tr>`;
                        $('#tbody_tabla_medicamento_cirugia_sdi').append(fila);
                        $('#tbody_tabla_medicamento_manual').append(fila);
                        $('#tabla_tratamientos_servicio tbody').append(fila_);
                    });
                    swal({
                        title: "Medicamento Agregado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    function registrar_nueva_atencion(){
        let nivel_gravedad = $('#nivel_gravedad').val();
        let id_profesional = $('#profesional_asignado').val();
        let sala = $('#salas_servicio').val();
        let cama = $('#cama_atencion').val();
        let id_paciente = $('#reserva_hora_id_paciente').val();
        let id_servicio_interno = $('#id_servicio_interno').val();
        let observaciones = $('#observaciones_asignacion_sala').val();
        let motivo_hospitalizacion = $('#motivo_hospitalizacion').val();

        let valido = 1;
        let mensaje = '';

        if(nivel_gravedad == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Nivel Gravedad </li>';
        }
        if(id_profesional == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Profesional </li>';
        }
        if(sala == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Sala </li>';
        }
        if(cama == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Cama </li>';
        }
        // if(observaciones == ''){
        //     valido = 0;
        //     mensaje += '<li>Campo requerido Observaciones </li>';
        // }

        if(motivo_hospitalizacion == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Motivo Hospitalización </li>';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let url = "{{ ROUTE('adm_hospital.asignar_profesional_atencion') }}";

        let data = {
            nivel_gravedad: nivel_gravedad,
            id_profesional: id_profesional,
            sala: sala,
            cama: cama,
            id_paciente: id_paciente,
            id_servicio_interno: id_servicio_interno,
            observaciones: observaciones,
            motivo_hospitalizacion: motivo_hospitalizacion,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                // cerrar modal
                $('#m_asignar_profesional').modal('hide');
                if(resp.estado == 'OK'){
                    swal({
                        icon:'success',
                        title:'Exito',
                        text:'Paciente asignado correctamente'
                    }).then((resp) => {
                        window.location.href = `/Enfermeria/Enfermera/atencion?id_paciente=${data.id_paciente}&id_servicio=${id_servicio_interno}`;
                    });
                }else{
                    swal({
                        icon:'info',
                        title:'INFO',
                        text:resp.mensaje
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function eliminarEvolucionPaciente(id) {
        let idEvolucion = $('#evolucion' + id).val();
        console.log(idEvolucion);
        // Elimina el elemento con el ID proporcionado
        $('#contenedor_evolucion_' + id).remove();
    }

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
        let reserva_hora_sms = $('#reserva_hora_sms').val();
        let diagnostico = $('#diagnostico_').val();
        let antecedentes = $('#antecedentes_').val();
        let eva = $('#esc_eva_ing_').val();
        let observaciones = $('#obs_ing_pcte_').val();

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

        if(diagnostico == ''){
            $valido = 0;
            $mensaje += 'Diagnostico de la hospitalización es requerida\n';
        }
        if(antecedentes == ''){
            $valido = 0;
            $mensaje += 'Antecedentes es requerida\n';
        }
        if(eva == ''){
            $valido = 0;
            $mensaje += 'Eva es requerida\n';
        }
        if(observaciones == ''){
            $valido = 0;
            $mensaje += 'Observaciones es requerida\n';
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
                diagnostico: diagnostico,
                antecedentes: antecedentes,
                eva: eva,
                observaciones: observaciones
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

    function mostrarNuevaEvolucionPaciente(counter) {
        let url = "{{ route('adm_hospital.mostrar_nueva_evolucion_paciente') }}";
        $.ajax({
            url: url,
            type: 'post',
            data: {
                counter: counter,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                $('#contenedor_nueva_evolucion').html(resp);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function eliminarEvolucionPacienteHospital(id) {
        let idEvolucion = $('#evolucion' + id).val();
        console.log(idEvolucion);
        // Elimina el elemento con el ID proporcionado
        $('#contenedor_evolucion_' + id).remove();
    }

    function agregarEvolucionPacienteHospital(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var evolucion = $('#evolucion' + id).val();

        var idPaciente = $('#id_paciente').val();

        var valido = 1;
        var mensaje = '';

        if (evolucion == '') {
            valido = 0;
            mensaje += 'Campo requerido Evolucion\n';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        var data = {
            id_paciente: idPaciente,
            evolucion: evolucion,
            _token: '{{ csrf_token() }}'
        }

        console.log(data);

        let url = "{{ route('profesional.agregar_evolucion_paciente_hosp') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.vista;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución agregada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#contenedor_evoluciones_hosp').empty();
                    $('#contenedor_evoluciones_hosp').html(vista);
                    $('#contenedor_nueva_evolucion').empty();

                    $("#btn_evolucion_paciente").attr("onclick", "mostrarNuevaEvolucionPacienteHosp("+idCounter+")");
                    idCounter++;
                } else {
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }

            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function abrir_modal_relacionar_observacion(tipo_modal, id_evolucion){
        console.log(tipo_modal);
        console.log(id_evolucion);
    }

    function guardar_cc(){
        let cc = $('#ind_cv_inmmed_urg_').val();
        let id_paciente = $('#id_paciente').val();

        if(cc == 0){
            swal({
                icon:'error',
                text:'Debe seleccionar control de ciclo',
            });
            return false;
        }


        let data = {
            ind_cc: cc,
            id_paciente: id_paciente,
            cc: true,
            _token: "{{ csrf_token() }}"
        };

        console.log(data);
        var url = "{{ route('indicar_procedimiento_sdi') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
            dataType: "json",
        })
        .done(function(data) {
            if (data.status == 1) {
                let procedimientos = data.procedimientos;
                let curaciones = data.curaciones;
                console.log(procedimientos);
                $('#tabla_procedimientos_servicio tbody').empty();
                $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                $('#tabla_curaciones_servicio tbody').empty();
                $('#tabla_curaciones_procedimientos tbody').empty();
                $('#tabla_procedimientos_hosp tbody').empty();
                procedimientos.forEach(function(procedimiento) {
                    console.log(procedimiento.id);
                    if (procedimiento.estado == 0) {
                        var html = '<span class="badge badge-warning">Suspendido </span>';
                    } else {
                        var html = '';
                    }
                    let datos = JSON.parse(procedimiento.datos_procedimiento);
                    // Ahora puedes trabajar con datos como un objeto JSON

                    $('#tabla_procedimientos_servicio tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                            <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                            <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                            <td class="text-center align-middle text-wrap">
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                    <i class="fas fa-trash"></i>Eliminar
                                </button>
                                <button type="button"
                                    class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                    onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                    <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                    ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                </button>
                            </td>
                        </tr>
                    `);

                    $('#tabla_procedimientos_hosp tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                            <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                            <td class="text-center align-middle text-wrap">
                                <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                            </td>
                            <td class="text-center align-middle text-wrap">
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                    <i class="fas fa-trash"></i>Eliminar
                                </button>
                                <button type="button"
                                    class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                    onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                    <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                    ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                </button>
                            </td>
                        </tr>
                    `);
                });
                if (curaciones.length > 0) {
                    curaciones.forEach(function(curacion) {
                        let datos = curacion.datos_curacion;
                        // Ahora puedes trabajar con datos como un objeto JSON
                        console.log(curacion);
                        $('#tabla_curaciones_servicio tbody').append(`
                            <tr>
                                <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle">
                                    <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                </td>
                                <td class="text-center align-middle">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                        <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                        Insumos
                                    </button>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-warning btn-sm" >
                                        <i class="fas fa-edit"></i>

                                    </button>
                                </td>
                            </tr>
                        `);

                        $('#tabla_curaciones_procedimientos tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                            <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                            <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        `);
                    });
                }

                swal({
                    title: "Indicación de Procedimiento.",
                    text: data.mensaje,
                    icon: "success",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                })
            } else {
                swal({
                    title: "Indicación de Procedimiento.",
                    text: data.mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
}



</script>
@endsection

@section('style')
<style>
    .dz-remove{
        color: white;
        margin-top: 4px;
        padding: 2px;
    }
</style>
@endsection
