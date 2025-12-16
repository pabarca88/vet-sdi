<div class="card-a">
    <div class="card-header-a" id="enf_urgencia">
        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button"
            data-toggle="collapse" data-target="#enf_urgencia_c" aria-expanded="false" aria-controls="enf_urgencia_c">
            Atención Enfermería
        </button>
    </div>
    <div id="enf_urgencia_c" class="open:" aria-labelledby="enf_urgencia" data-parent="#enf_urgencia">
        <div class="card-body-aten-a">
            <div id="form-enf_urgencia">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="enf_urgencia" role="tablist">
                            @if($enfermera)
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ing_pac_tab" data-toggle="tab"
                                    href="#ing_pac" role="tab" aria-controls="ing_pac"
                                    aria-selected="true">Ingresar Paciente</a>
                            </li>
                            @endif
                            {{-- <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="ing_enf_tab" data-toggle="tab"
                                    href="#ing_enf" role="tab" aria-controls="ing_enf"
                                    aria-selected="true">Antecedentes de Ingreso</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="enf_cont_ciclo_tab" data-toggle="tab"
                                    href="#enf_cont_ciclo" role="tab" aria-controls="enf_cont_ciclo"
                                    aria-selected="true">Control de Ciclo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link-aten text-reset"  id="enf_tto_tab" data-toggle="tab" href="#enf_tto"
                                    role="tab" aria-controls="enf_tto" aria-selected="true" @if(isset($tiene_receta_pendiente) && $tiene_receta_pendiente) style="background: darkred !important; color: white !important;" @endif>Tratamientos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="enf_proc_tab" data-toggle="tab" href="#enf_proc"
                                    role="tab" aria-controls="enf_proc" aria-selected="true">Procedimientos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="enf_cura_tab" data-toggle="tab" href="#enf_cura"
                                    role="tab" aria-controls="enf_cura" aria-selected="true">Curaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="enf_examenes_tab" data-toggle="tab"
                                    href="#enf_examenes" role="tab" aria-controls="enf_examenes"
                                    aria-selected="true">Exámenes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="enf_asig_grav_tab" data-toggle="tab"
                                    href="#enf_asig_grav" role="tab" aria-controls="enf_asig_grav"
                                    aria-selected="true">Asignación de Gravedad </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="orl_adulto">
                            <!--INGRESO ENFERMERIA-->
                            <div class="tab-pane fade show" id="ing_pac" role="tabpanel"
                                aria-labelledby="ing_pac_tab">
                                <!--recibir paciente-->
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
                            <!--INGRESO ENFERMERIA-->
                            <div class="tab-pane fade show " id="ing_enf" role="tabpanel"
                                aria-labelledby="ing_enf_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                        <h6 class="t-aten">Antecedentes de ingreso</h6>
                                    </div>
                                    {{-- @include('page.general.secciones_ficha.motivo_ingreso_paciente') --}}
                                </div>
                                <br>
                            </div>
                            <!--CONTROL DE CICLO-->
                            <div class="tab-pane fade show active" id="enf_cont_ciclo"
                                role="tabpanel" aria-labelledby="enf_cont_ciclo_tab"><br>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        @include('app.adm_hospital.servicios.enfermera.secciones_ficha.signos_vitales_cc')
                                    </div>
                                </div>
                            </div>

                            <!--ASIGNAR URGENCIA-->
                            <div class="tab-pane fade show " id="enf_asig_grav" role="tabpanel"
                                aria-labelledby="enf_asig_grav_tab">
                                <div class="row pb-3">
                                    @include('app.adm_hospital.general.secciones_ficha.ficha_asignacion_gravedad')
                                </div>

                            </div>

                            <!--EJECUTAR TRATAMIENTO-->
                            <div class="tab-pane fade show " id="enf_tto"
                                role="tabpanel"aria-labelledby="enf_tto_tab">
                                @include('app.adm_hospital.servicios.enfermera.tratamientos')
                            </div>
                            <!--EJECUTAR PROCEDIMIENTO-->
                            <div class="tab-pane fade show " id="enf_proc" role="tabpanel"
                                aria-labelledby="enf_proc_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten">Procedimientos</h6>
                                        {{-- <button type="button"
                                            class="btn btn-info-light-c btn-xxs btn-agregar-procedimiento d-inline float-right mb-2"><i
                                                class="feather icon-plus"></i> Nuevo procedimiento</button> --}}
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table id="tabla_procedimientos_servicio_enfermera"
                                                class="display table table-striped table-bordered table-xs dt-responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle text-wrap hidden" hidden="hidden">
                                                            id_procedimiento</th>
                                                        <th class="align-middle text-wrap">
                                                            Fecha y hora</th>
                                                        <th class="align-middle text-wrap">
                                                            Procedimiento</th>
                                                        <th class="align-middle text-wrap">
                                                            Vigilar Signos de Alerta</th>
                                                            <th class="align-middle text-wrap">
                                                            Observaciones</th>
                                                        <th class="align-middle text-wrap">
                                                            Acción</th>
                                                        <th class="align-middle">
                                                            Materiales
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($enfermera))
                                                    @if(!$enfermera)
                                                    @if(isset($procedimientos))
                                                        @foreach ($procedimientos as $p)
                                                            <tr class="{{ $p->estado == 0 ? 'bg-warning' : '' }}">
                                                                <td>{{ $p->fecha }} {{ $p->hora }} <br> {{ $p->responsable }}</td>
                                                                <td class="align-middle text-wrap hidden" hidden="hidden">
                                                                    {{ $p->id_procedimiento }}</td>
                                                                <td class="align-middle text-wrap">
                                                                    {{ $p->datos_procedimiento->nombre_procedimiento }}
                                                                </td>
                                                                <td class="align-middle text-wrap">
                                                                    <input type="text" id="ind_vig_sig{{ $p->id }}"
                                                                        name="ind_vig_sig{{ $p->id }}"
                                                                        class="form-control form-control-sm" >
                                                                </td>
                                                                <td class="align-middle text-wrap">
                                                                    <input type="text" id="obs{{ $p->id }}" name="obs{{ $p->id }}"
                                                                        class="form-control form-control-sm">
                                                                </td>
                                                                <td>
                                                                    <div class="switch switch-success d-inline">
                                                                        <input type="checkbox" id="procedimiento_servicio_listo{{ $p->id }}" checked="" >
                                                                        <label for="procedimiento_servicio_listo{{ $p->id }}" class="cr"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <button type="button" class="btn btn-primary-light-c btn-xxs"
                                                                        data-toggle="modal"
                                                                        data-target="#modalAgregarInsumos">Insumos</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    @else
                                                    @if(isset($procedimientos))
                                                        @foreach ($procedimientos as $p)
                                                            <tr>
                                                                <td>{{ $p->fecha }} {{ $p->hora }} <br> {{ $p->responsable }}</td>
                                                                <td class="align-middle text-wrap hidden" hidden="hidden">
                                                                    {{ $p->id_procedimiento }}</td>
                                                                <td class="text-center align-middle text-wrap">
                                                                    {{ $p->datos_procedimiento->nombre_procedimiento }}
                                                                </td>
                                                                <td class="align-middle text-wrap">
                                                                    <input type="text" id="ind_vig_sig{{ $p->id }}"
                                                                        name="ind_vig_sig{{ $p->id }}"
                                                                        class="form-control form-control-sm" @if($enfermera) disabled @endif>
                                                                </td>
                                                                <td class="align-middle text-wrap">
                                                                    <input type="text" id="obs{{ $p->id }}" name="obs{{ $p->id }}"
                                                                        class="form-control form-control-sm" @if(!$enfermera) disabled @endif>
                                                                </td>
                                                                <td>
                                                                    <div class="switch switch-success d-inline">
                                                                        <input type="checkbox" id="procedimiento_servicio_listo{{ $p->id }}" checked="">
                                                                        <label for="procedimiento_servicio_listo{{ $p->id }}" class="cr"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <button type="button" class="btn btn-primary-light-c btn-xxs"
                                                                        data-toggle="modal"
                                                                        data-target="#modalAgregarInsumos">Insumos</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    @endif
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="contenedor_procedimiento">
                                    <div id="procedimiento" class="row">
                                    </div>
                                </div>
                                <!--PAGINACIÓN-->
                                <!--Programar paginación para las evoluciones, ejemplo: Se muestran 8 y para ver las otras se usa la paginación-->
                                {{-- <div class="row mt-3">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <nav aria-label="...">
                                            <ul class="pagination justify-content-end">
                                                <li class="page-item disabled">
                                                    <a class="page-link">Anterior</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active" aria-current="page">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Siguiente</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- EJECUTAR CURACIONES -->
                            <div class="tab-pane fade show " id="enf_cura" role="tabpanel"
                                aria-labelledby="enf_cura_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten mb-2">Curaciones indicadas por médico</h6>
                                        <div class="table-responsive">
                                            <table id="tabla_curaciones_servicio" class="display table table-striped table-xs dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Fecha y Hora</th>
                                                        <th class="align-middle">Procedimiento</th>
                                                        <th class="align-middle">Vigilar</th>
                                                        <th class="align-middle">Acción</th>
                                                        <th class="align-middle">materiales</th>
                                                        <th class="align-middle">acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($curaciones))
                                              @foreach($curaciones as $c)
                                                    <tr>
                                                        <td>{{ $c->fecha }} {{ $c->hora }} <br> {{ $c->responsable }}</td>
                                                        <td class="align-middle">{{ $c->datos_curacion->nombre_procedimiento }}</td>
                                                        <td class="align-middle"><input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio{{ $c->id }}" /></td>
                                                        <td class="align-middle">
                                                            <div class="switch switch-success d-inline">
                                                                <input type="checkbox" id="curaciones_servicio_listo{{ $c->id }}" onchange="cambiarTextoLabelCuracion({{ $c->id }})" @if(!$enfermera) disabled @endif @if($c->estado == 0) checked @endif>
                                                                <label for="curaciones_servicio_listo{{ $c->id }}" class="cr"></label>
                                                            </div><br>
                                                            <label for="" id="label_curacion_{{ $c->id }}">@if($c->estado == 0) Listo @else Pendiente @endif</label>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button type="button" class="btn btn-primary-light-c btn-xxs" data-toggle="modal" data-target="#modalAgregarInsumos">
                                                                Insumos
                                                            </button>
                                                        </td>

                                                        <td class="align-middle">
                                                            <button type="button" class="btn btn-warning-light-c btn-icon"><i class="feather icon-edit"> </i></button>
                                                            <button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminarCuracion({{ $c->id }})"><i class="feather icon-x"></i></button>
                                                        </td>
                                                    </tr>
                                              @endforeach
                                              @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @if(isset($enfermera) && $enfermera)
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 w-100">
                                        <div class="form-row mb-3 m-t-15">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                <div class="nav flex-column nav-pills mb-3" id="v-pills-tab"
                                                    role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link-aten text-reset active" id="cur_plana-tab"
                                                        data-toggle="tab" href="#cur_plana" role="tab"
                                                        aria-controls="cur_plana" aria-selected="true">Cur. Planas</a>
                                                    <a class="nav-link-aten text-reset" id="cur_lpp-tab"
                                                        data-toggle="tab" href="#cur_lpp" role="tab"
                                                        aria-controls="cur_lpp" aria-selected="false">Curación.LPP</a>
                                                    <a class="nav-link-aten text-reset" id="cur_pd-tab"
                                                        data-toggle="tab" href="#cur_pd" role="tab"
                                                        aria-controls="cur_pd" aria-selected="false">Píe Diabético</a>
                                                    <a class="nav-link-aten text-reset" id="cur_quem-tab"
                                                        data-toggle="tab" href="#cur_quem" role="tab"
                                                        aria-controls="cur_quem" aria-selected="false">Quemados</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-8 col-md-8 col-lg-8 col-xl-8 col-xxl-10">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <!--CURACION PLANA-->
                                                    <div class="tab-pane fade show active" id="cur_plana"
                                                        role="tabpanel" aria-labelledby="cur_plana-tab">
                                                        <div class="form-row mx-2">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <h6 class="t-aten d-inline">Curaciones</h6>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-10"
                                                                    id="enf_urgencia" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active"
                                                                            id="val_hda-tab" data-toggle="tab"
                                                                            href="#val_hda" role="tab"
                                                                            aria-controls="val_hda"
                                                                            aria-selected="true">Valoración</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset"
                                                                            id="cur_hda-tab" data-toggle="tab"
                                                                            href="#cur_hda" role="tab"
                                                                            aria-controls="cur_hda"
                                                                            aria-selected="true">Curación</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                <div class="tab-content"
                                                                    id="Curación de lesiones planas">
                                                                    <div class="tab-pane fade show active"
                                                                        id="val_hda" role="tabpanel"
                                                                        aria-labelledby="val_hda-tab">
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="alert alert-warning"
                                                                                    role="alert">
                                                                                    Si desea ocupar el item de
                                                                                    observaciones debe necesariamente
                                                                                    elegir otra opción para sumar el
                                                                                    puntaje.
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="cp_asp">Aspecto</label>
                                                                                    <select name="cp_asp"
                                                                                            id="cp_asp"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('cp_asp','div_cp_asp','obs_cp_asp',6);actualizarTotal()">
                                                                                        <option selected value="0">Seleccione</option>
                                                                                        <option value="1" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_asp == "1" ? 'selected' : '') : '' }}>Eritematoso </option>
                                                                                        <option value="2" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_asp == "2" ? 'selected' : '') : '' }}>Enrojecido</option>
                                                                                        <option value="3" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_asp == "3" ? 'selected' : '') : '' }}>Amarillo pálido</option>
                                                                                        <option value="4" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_asp == "4" ? 'selected' : '') : '' }}>Necrótico </option>
                                                                                        <option value="6" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_asp == "5" ? 'selected' : '') : '' }}>Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_asp"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_asp">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_asp" id="obs_cp_asp"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                                <div class="form-group">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-sm btn-block"onclick="curac_hda();">
                                                                                        <i
                                                                                            class="feather icon-plus"></i>
                                                                                        Guía</button>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_me">Mayor
                                                                                        Extensión</label>
                                                                                        <select name="cp_me"
                                                                                        id="cp_me"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('cp_me','div_cp_me','obs_cp_me',5);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                            <option value="1" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_me == "1" ? 'selected' : '') : '' }}>0-1 cm</option>
                                                                                            <option value="2" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_me == "2" ? 'selected' : '') : '' }}>1-3 cm</option>
                                                                                            <option value="3" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_me == "3" ? 'selected' : '') : '' }}>3-6 cm</option>
                                                                                            <option value="4" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_me == "4" ? 'selected' : '') : '' }}>>6 cm</option>
                                                                                            <option value="5" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_me == "5" ? 'selected' : '') : '' }}>Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_me"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_me">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_me" id="obs_cp_me"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_pro">Profundidad</label>
                                                                                        <select name="cp_pro"
                                                                                        id="cp_pro"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('cp_pro','div_cp_pro','obs_cp_pro1',6);actualizarTotal()">
                                                                                        <option selected value="0">Seleccione</option>
                                                                                        <option value="1" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pro == "1" ? 'selected' : '') : '' }}>0</option>
                                                                                        <option value="2" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pro == "2" ? 'selected' : '') : '' }}>0-1 cm</option>
                                                                                        <option value="3" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pro == "3" ? 'selected' : '') : '' }}>1-2 cm</option>
                                                                                        <option value="4" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pro == "4" ? 'selected' : '') : '' }}>2-3 cm</option>
                                                                                        <option value="5" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pro == "5" ? 'selected' : '') : '' }}> >3 cm</option>
                                                                                        <option value="6" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pro == "6" ? 'selected' : '') : '' }}>Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_pro"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_pro">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_pro" id="obs_cp_pro"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_ecant">Exudado-Cantidad</label>
                                                                                        <select name="cp_ecant"
                                                                                                id="cp_ecant"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_ecant','div_cp_ecant','obs_cp_ecant',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                            <option value="1" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ecant == "1" ? 'selected' : '') : '' }}>Ausente</option>
                                                                                            <option value="2" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ecant == "2" ? 'selected' : '') : '' }}>Escaso</option>
                                                                                            <option value="3" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ecant == "3" ? 'selected' : '') : '' }}>Moderado</option>
                                                                                            <option value="4" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ecant == "4" ? 'selected' : '') : '' }}>Abundante</option>
                                                                                            <option value="6" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ecant == "6" ? 'selected' : '') : '' }}>Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_ecant"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_ecant">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_ecant" id="obs_cp_ecant"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_ecal">Exudado-Calidad</label>
                                                                                        <select name="cp_ecal"
                                                                                                id="cp_ecal"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_ecal','div_cp_ecal','obs_cp_ecal',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                            <option value="1" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ecal == "1" ? 'selected' : '') : '' }}>Sin exudado</option>
                                                                                            <option value="2" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ecal == "2" ? 'selected' : '') : '' }}>Seroso</option>
                                                                                            <option value="3" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ecal == "3" ? 'selected' : '') : '' }}>Turbio</option>
                                                                                            <option value="4" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ecal == "4" ? 'selected' : '') : '' }}>Purulento</option>
                                                                                            <option value="6" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ecal == "6" ? 'selected' : '') : '' }}>Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_ecal"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_ecal">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_ecal" id="obs_cp_ecal"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_tn">Tejido
                                                                                        esfacelado o necrótico</label>
                                                                                        <select name="cp_tn"
                                                                                                id="cp_tn"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_tn','div_cp_tn','obs_cp_tn',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                            <option value="1" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tn == "1" ? 'selected' : '') : '' }}>Ausente</option>
                                                                                            <option value="2" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tn == "2" ? 'selected' : '') : '' }}><25 %</option>
                                                                                            <option value="3" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tn == "3" ? 'selected' : '') : '' }}>25 - 50 %</option>
                                                                                            <option value="4" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tn == "4" ? 'selected' : '') : '' }}>>50 - 75 %</option>
                                                                                            <option value="5" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tn == "5" ? 'selected' : '') : '' }}>>75 %</option>
                                                                                            <option value="6" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tn == "6" ? 'selected' : '') : '' }}>Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_tn"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_tn">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_tn" id="obs_cp_tn"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_tg">Tejido
                                                                                        granulatorio</label>
                                                                                        <select name="cp_tg"
                                                                                                id="cp_tg"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_tg','div_cp_tg','obs_cp_tg',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                            <option value="1" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tg == "1" ? 'selected' : '') : '' }}>100- 75 %</option>
                                                                                            <option value="2" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tg == "2" ? 'selected' : '') : '' }}><75 - 50 %</option>
                                                                                            <option value="3" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tg == "3" ? 'selected' : '') : '' }}><50 - 25 %</option>
                                                                                            <option value="4" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tg == "4" ? 'selected' : '') : '' }}><25 %</option>
                                                                                            <option value="6" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_tg == "6" ? 'selected' : '') : '' }}>Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_tg"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_tg">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_tg" id="obs_cp_tg"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_ed">Edema</label>
                                                                                        <select name="cp_ed"
                                                                                                id="cp_ed"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_ed','div_cp_ed','obs_cp_ed',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                            <option value="1" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ed == "1" ? 'selected' : '') : '' }}>Ausente</option>
                                                                                            <option value="2" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ed == "2" ? 'selected' : '') : '' }}>+</option>
                                                                                            <option value="3" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ed == "3" ? 'selected' : '') : '' }}>++</option>
                                                                                            <option value="4" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ed == "4" ? 'selected' : '') : '' }}>+++</option>
                                                                                            <option value="6" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_ed == "6" ? 'selected' : '') : '' }}>Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_ed"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_ed">Obs.<i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_ed" id="obs_cp_ed"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_dol">Dolor</label>
                                                                                        <select name="cp_dol"
                                                                                                id="cp_dol"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_dol','div_cp_dol','obs_cp_dol',6);actualizarTotal()">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_dol == "1" ? 'selected' : '') : '' }}>0 - 1</option>
                                                                                            <option value="2" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_dol == "2" ? 'selected' : '') : '' }}>2 - 3</option>
                                                                                            <option value="3" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_dol == "3" ? 'selected' : '') : '' }}>4 - 6</option>
                                                                                            <option value="4" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_dol == "4" ? 'selected' : '') : '' }}>7 - 10</option>
                                                                                            <option value="6" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_dol == "6" ? 'selected' : '') : '' }}>Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_dol"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_dol">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_dol" id="obs_cp_dol"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_pielc">Piel
                                                                                        circundante</label>
                                                                                        <select name="cp_pielc"
                                                                                                id="cp_pielc"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_pielc','div_cp_pielc','obs_cp_pielc',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                            <option value="1" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pielc == "1" ? 'selected' : '') : '' }}>Sana</option>
                                                                                            <option value="2" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pielc == "2" ? 'selected' : '') : '' }}>Descamada</option>
                                                                                            <option value="3" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pielc == "3" ? 'selected' : '') : '' }}>Erimatosa</option>
                                                                                            <option value="4" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pielc == "4" ? 'selected' : '') : '' }}>Macerada</option>
                                                                                            <option value="6" {{ $curacion_plana ? ($curacion_plana->datos_curacion_plana->cp_pielc == "6" ? 'selected' : '') : '' }}>Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_pielc"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_pielc">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_pielc" id="obs_cp_pielc"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="bh_dren_1">P.Total</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="ptos_tot_ev"
                                                                                        id="ptos_tot_ev" value="{{ $curacion_plana ? $curacion_plana->datos_curacion_plana->ptos_tot_ev : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="tpo_les_curgen">Valoración</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="tpo_les_curgen"
                                                                                        id="tpo_les_curgen" value="{{ $curacion_plana ? $curacion_plana->datos_curacion_plana->tpo_les_curgen : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-sm  btn-block"onclick="cur_guia();">
                                                                                        <i
                                                                                            class="feather icon-plus"></i>
                                                                                        Guía</button>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="obs_cp_gral">Obs.
                                                                                        Valoración Herida</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=1;"
                                                                                        name="obs_cp_gral" id="obs_cp_gral"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="obs_cur_plana">Obs.
                                                                                        Curación Plana</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cur_plana" id="obs_cur_plana"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if(!$curacion_plana)
                                                                            <button type="button" class="btn btn-outline-success btn-sm float-right my-2" onclick="guardar_curacion_plana_servicio()"><i class="fas fa-save"></i>Guardar</button>
                                                                        @else
                                                                            <button type="button" class="btn btn-outline-success btn-sm float-right my-2" onclick="actualizar_curacion_plana_servicio({{ $curacion_plana->id }})"><i class="fas fa-save"></i>Actualizar</button>
                                                                        @endif
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="cur_hda"
                                                                        role="tabpanel" aria-labelledby="cur_hda-tab">
                                                                        @include('app.adm_hospital.servicios.enfermera.curaciones_lpp')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--CURACION LPP-->
                                                    <div class="tab-pane fade " id="cur_lpp" role="tabpanel" aria-labelledby="cur_lpp-tab">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <h6 class="t-aten">Curación LPP</h6>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="enf_urgencia" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="val_lpp-tab" data-toggle="tab" href="#val_lpp" role="tab" aria-controls="val_lpp" aria-selected="true">Valoración</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="cur1_lpp-tab" data-toggle="tab" href="#cur1_lpp" role="tab" aria-controls="cur1_lpp" aria-selected="true">Curación</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="curidados_lpp-tab" data-toggle="tab" href="#curidados_lpp" role="tab" aria-controls="curidados_lpp" aria-selected="true">Cuidado y Prevensión</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                    <div class="tab-content" id="Curación de lesiones planas">
                                                                        <div class="tab-pane fade show active" id="val_lpp" role="tabpanel" aria-labelledby="val_lpp-tab">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="upp_local_eval">Localización</label>
                                                                                        <select name="upp_local_eval" id="upp_local_eval" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('upp_local_eval','div_upp_local_eval','obs_upp_local_eval',15);">
                                                                                            <option selected value="0">Seleccione </option>
                                                                                            <option value="Cabeza">Cabeza </option>
                                                                                            <option value="Frente">Frente</option>
                                                                                            <option value="Oreja">Oreja</option>
                                                                                            <option value="Mejilla">Mejilla</option>
                                                                                            <option value="Omoplato">Omoplato</option>
                                                                                            <option value="Costillas">Costillas</option>
                                                                                            <option value="Pecho">Pecho</option>
                                                                                            <option value="Sacro">Sacro</option>
                                                                                            <option value="Trocanter">Trocanter</option>
                                                                                            <option value="Genitales">Genitales</option>
                                                                                            <option value="Rodilla">Rodilla</option>
                                                                                            <option value="Cóndilos">Cóndilos</option>
                                                                                            <option value="Rodilla">Rodilla</option>
                                                                                            <option value="Dedos">Dedos</option>
                                                                                            <option value="Talones">Talones</option>
                                                                                            <option value="Maleolo">Maleolo</option>
                                                                                            <option value="Otras">Otras</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_upp_local_eval" style="display:none;">
                                                                                        <label class="floating-label-activo-sm" for="obs_upp_local_eval">Otras <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_upp_local_eval" id="obs_upp_local_eval"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="upp_gr_eval">Grado</label>
                                                                                        <select name="upp_gr_eval" id="upp_gr_eval" class="form-control form-control-sm">
                                                                                            <option value="G-0">G-0 </option>
                                                                                            <option value="G-1">G-1</option>
                                                                                            <option value="G-2">G-2</option>
                                                                                            <option value="G-3">G-3</option>
                                                                                            <option value="G-4">G-4</option>
                                                                                            <option value="G-5">G-5</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="upp_diam_eval">Diámetro</label>
                                                                                        <select name="upp_diam_eval" id="upp_diam_eval" class="form-control form-control-sm">
                                                                                            <option selected value="Seleccione">Seleccione</option>
                                                                                            <option value="Menor de 1 cm.">Menor de 1 cm.</option>
                                                                                            <option value="Entre 1 y 2 cms.">Entre 1 y 2 cms.</option>
                                                                                            <option value="Entre 2 y 3 cms.">Entre 2 y 3 cms.</option>
                                                                                            <option value="Entre 3 y 4 cms.">Entre 3 y 4 cms.</option>
                                                                                            <option value="Entre 5 y 6 cms.">Entre 5 y 6 cms.</option>
                                                                                            <option value="Entre 7 y 8 cms.">Entre 7 y 8 cms.</option>
                                                                                            <option value="Entre 9 y 10 cms.">Entre 9 y 10 cms.</option>
                                                                                            <option value="Entre 11 y 12 cms.">Entre 11 y 12 cms.</option>
                                                                                            <option value="Entre 12 y 15 cms.">Entre 12 y 15 cms.</option>
                                                                                            <option value="Mayor de 15 cms..">Mayor de 15 cms..</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="bh_dren_1">Profundidad</label>
                                                                                        <select name="upp_prof_eval" id="upp_prof_eval" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('upp_prof_eval','div_upp_prof_eval','obs_upp_prof_eval',11);">
                                                                                            <option selected  value="0">Seleccione</option>
                                                                                            <option value="Epidermis">Epidermis</option>
                                                                                            <option value="Dermis">Dermis</option>
                                                                                            <option value="Hipodermis">Hipodermis</option>
                                                                                            <option value="Otros">Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_upp_prof_eval" style="display:none;">
                                                                                        <label class="floating-label-activo-sm" for="obs_upp_prof_eval">Otras <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_upp_prof_eval" id="obs_upp_prof_eval"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="bh_dren_1">Infección</label>
                                                                                        <select name="upp_Infec_eval" id="upp_Infec_eval" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('upp_Infec_eval','div_upp_Infec_eval','obs_upp_Infec_eval',11);">
                                                                                            <option selected  value="0">Seleccione</option>
                                                                                            <option value="No">No</option>
                                                                                            <option value="Solo presencia de pus">Solo presencia de pus</option>
                                                                                            <option value="Presencia de pus + necrosis">Presencia de pus + necrosis</option>
                                                                                            <option value="Absceso">Absceso</option>
                                                                                            <option value="Absceso + área Necrótica">Absceso + área Necrótica</option>
                                                                                            <option value="Otros">Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_upp_Infec_eval" style="display:none;">
                                                                                        <label class="floating-label-activo-sm" for="obs_upp_Infec_eval">Otras <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_upp_Infec_eval" id="obs_upp_Infec_eval"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label class="floating-label-activo-sm" for="lpp_patasoc">Seleccionar Patologías de riesgo y Fac. agravantes</label>
                                                                                    <select class="form-control form-control-sm" name="lpp_patasoc" id="lpp_patasoc" multiple="multiple">
                                                                                        <option value="Hipertensión">Hipertensión</option>
                                                                                        <option value="Diabetes">Diabetes</option>
                                                                                        <option value="Hipercolesterolemia">Hipercolesterolemia</option>
                                                                                        <option value="Hiperlipidemia">Hiperlipidemia</option>
                                                                                        <option value="Cancer">Cancer</option>
                                                                                        <option value="Obesidad">Obesidad</option>
                                                                                        <option value="Hipertiroidismo">Hipertiroidismo</option>
                                                                                        <option value="Hipotiroidismo">Hipotiroidismo</option>
                                                                                        <option value="Cirugías reciente">Cirugías reciente</option>
                                                                                        <option value="Infección Sistémica">Infección Sistémica</option>
                                                                                        <option value="Infección local">Infección local</option>
                                                                                        <option value="Fístulas">Fístulas</option>
                                                                                        <option value="Otras(Agregar en Observaciones)">Otras(Agregar en Observaciones)</option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="obs_orin"> Observaciones Patología Asociada</label>
                                                                                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_pa_eval_upp" id="obs_pa_eval_upp"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="obs_orin">Obs. Valoración LPP</label>
                                                                                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_val_eval_upp" id="obs_val_eval_upp"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @if(isset($enfermera)) <button type="button" class="btn btn-outline-success btn-sm my-2 float-right" onclick="guardar_curacion_lpp()"><i class="fas fa-save"></i>Guardar</button> @endif
                                                                        </div>
                                                                        <div class="tab-pane fade show" id="cur1_lpp" role="tabpanel" aria-labelledby="cur1_lpp-tab">
                                                                            {{-- @include('page.general.secciones_ficha.curacion_heridas') --}}
                                                                        </div>
                                                                        <div class="tab-pane fade show" id="curidados_lpp" role="tabpanel" aria-labelledby="curidados_lpp-tab">
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                                    <label class="floating-label-activo-sm" for="lpp_patasoc">Seleccionar Medidas liquidas</label>
                                                                                    <select class="form-control form-control-sm" name="lpp_medprotliq" id="lpp_medprotliq" multiple="multiple">
                                                                                        <option value="1">Soluciones Locales Humectantes</option>
                                                                                        <option value="2">Soluciones Locales Hidratantes</option>
                                                                                        <option value="3">Soluciones Locales Hidratantes</option>
                                                                                        <option value="4">AGEHO : LINOLEICO , PALMITICO </option>
                                                                                        <option value="5">Otras(Agregar en Observaciones)</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                                    <label class="floating-label-activo-sm" for="lpp_patasoc">Dispositivos de descarga</label>
                                                                                    <select class="form-control form-control-sm" name="lpp_medproddesc" id="lpp_medproddesc" multiple="multiple">
                                                                                        <option value="1">Dispositivo de descarga local</option>
                                                                                        <option value="2">Dispositivo de descarga General</option>
                                                                                        <option value="3">Otras(Agregar en Observaciones)</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                                    <label class="floating-label-activo-sm" for="lpp_patasoc">Seleccionar Medidas preventivas Externas</label>
                                                                                    <select class="form-control form-control-sm" name="lpp_medprevext" id="lpp_medprevext" multiple="multiple">
                                                                                        <option value="1">Colchón especial</option>
                                                                                        <option value="2">Picarón</option>
                                                                                        <option value="3">Movilización frecuente</option>
                                                                                        <option value="3">Masajes</option>
                                                                                        <option value="4">Otras(Agregar en Observaciones)</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="obs_orin"> Observaciones Med de prevención y cuidado</label>
                                                                                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_pa_eval_upp" id="obs_pa_eval_upp"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--PIE DIABÉTICO-->
                                                    <div class="tab-pane fade" id="cur_pd" role="tabpanel"
                                                        aria-labelledby="cur_pd-tab">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                    <div class="form-group">
                                                                        <h6 class="t-aten">Curación Pié Diabético</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3"
                                                                        id="enf_urgencia" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active"
                                                                                id="val_pie-tab" data-toggle="tab"
                                                                                href="#val_pie" role="tab"
                                                                                aria-controls="val_pie"
                                                                                aria-selected="true">Valoración</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset"
                                                                                id="curac_pie-tab" data-toggle="tab"
                                                                                href="#curac_pie" role="tab"
                                                                                aria-controls="curac_pie"
                                                                                aria-selected="true">Curación</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="alert alert-warning" role="alert">
                                                                        Si desea ocupar el item de observaciones debe
                                                                        necesariamente elegir otra opción para sumar el
                                                                        puntaje.
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                    <div class="tab-content" id="pie_diab">
                                                                        <div class="tab-pane fade show active"
                                                                            id="val_pie" role="tabpanel"
                                                                            aria-labelledby="val_pie-tab">
                                                                            <div class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="aspecto_pie_diab">Aspecto</label>
                                                                                        <select name="aspecto_pie_diab"
                                                                                            id="aspecto_pie_diab"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('aspecto_pie_diab','div_aspecto_pie_diab','obs_aspecto_pie_diab',6); actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Erimatoso </option>
                                                                                            <option value="2">
                                                                                                Enrojecido</option>
                                                                                            <option value="3">
                                                                                                Amarillo pálido</option>
                                                                                            <option value="4">
                                                                                                Necrótico grisáceo
                                                                                            </option>
                                                                                            <option value="5">
                                                                                                Necrótico negruzco
                                                                                            </option>
                                                                                            <option value="6">
                                                                                                Observaciones</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_aspecto_pie_diab"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_aspecto_pie_diab">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_aspecto_pie_diab" id="obs_aspecto_pie_diab"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-primary btn-sm  btn-block"onclick="p_diab();">
                                                                                            <i
                                                                                                class="feather icon-plus"></i>
                                                                                            Guía</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="mayor_extension">Mayor
                                                                                            Extensión</label>
                                                                                        <select name="mayor_extension"
                                                                                            id="mayor_extension"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('mayor_extension','div_mayor_extension','obs_mayor_extension',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">0-1
                                                                                                cm</option>
                                                                                            <option value="2">1-3
                                                                                                cm</option>
                                                                                            <option value="3">3-6
                                                                                                cm</option>
                                                                                            <option value="4">6-10
                                                                                                cm</option>
                                                                                            <option value="5">>10
                                                                                                cm</option>
                                                                                            <option value="6">
                                                                                                Observaciones</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_mayor_extension"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_mayor_extension">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_mayor_extension" id="obs_mayor_extension"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="profundidad_curacion">Profundidad</label>
                                                                                        <select name="profundidad_curacion"
                                                                                            id="profundidad_curacion"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('profundidad_curacion','div_profundidad_curacion','obs_profundidad_curacion',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="1">
                                                                                                Seleccione </option>
                                                                                            <option value="1">0
                                                                                            </option>
                                                                                            <option value="2">0-1
                                                                                                cm</option>
                                                                                            <option value="3">1-2
                                                                                                cm</option>
                                                                                            <option value="4">2-3
                                                                                                cm</option>
                                                                                            <option value="5"> >3
                                                                                                cm </option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_profundidad_curacion"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_profundidad_curacion">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_profundidad_curacion" id="obs_profundidad_curacion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="exudado_cantidad_curacion">Exudado-Cantidad</label>
                                                                                        <select name="exudado_cantidad_curacion"
                                                                                            id="exudado_cantidad_curacion"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('exudado_cantidad_curacion','div_exudado_cantidad_curacion','obs_exudado_cantidad_curacion',11);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Ausente</option>
                                                                                            <option value="2">
                                                                                                Escaso</option>
                                                                                            <option value="3">
                                                                                                Moderado</option>
                                                                                            <option value="4">
                                                                                                Abundante</option>
                                                                                            <option value="5">Muy
                                                                                                abundante</option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group "
                                                                                        id="div_exudado_cantidad_curacion"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_exudado_cantidad_curacion">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_exudado_cantidad_curacion" id="obs_exudado_cantidad_curacion"></textarea>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="exudado_calidad_curacion">Exudado-Calidad</label>
                                                                                        <select name="exudado_calidad_curacion"
                                                                                            id="exudado_calidad_curacion"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('exudado_calidad_curacion','div_exudado_calidad_curacion','obs_exudado_calidad_curacion',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="1">
                                                                                                Seleccione </option>
                                                                                            <option value="1">Sin
                                                                                                exudado </option>
                                                                                            <option value="2">
                                                                                                Seroso</option>
                                                                                            <option value="3">
                                                                                                Turbio</option>
                                                                                            <option value="4">
                                                                                                Purulento </option>
                                                                                            <option value="5">
                                                                                                Purulento gangrenoso
                                                                                            </option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_exudado_calidad_curacion"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_exudado_calidad_curacion">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_exudado_calidad_curacion" id="obs_exudado_calidad_curacion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="tejido_esf">Tejido
                                                                                            esfacelado o
                                                                                            necrótico</label>
                                                                                        <select name="tejido_esf"
                                                                                            id="tejido_esf"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('tejido_esf','div_tejido_esf','obs_tejido_esf',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Ausente</option>
                                                                                            <option value="2">
                                                                                                <25 %</option>
                                                                                            <option value="3">25 -
                                                                                                50 %</option>
                                                                                            <option value="4">>50
                                                                                                - 75 %</option>
                                                                                            <option value="5">>75
                                                                                                %</option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_tejido_esf"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_tejido_esf">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_tejido_esf" id="obs_tejido_esf"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="tejido_granu">Tejido
                                                                                            granulatorio</label>
                                                                                        <select name="tejido_granu"
                                                                                            id="tejido_granu"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('tejido_granu','div_tejido_granu','obs_tejido_granu',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="1">
                                                                                                Seleccione </option>
                                                                                            <option value="1">100
                                                                                                % </option>
                                                                                            <option value="2">99 -
                                                                                                75 %</option>
                                                                                            <option value="3">
                                                                                                <75 - 50 %</option>
                                                                                            <option value="4">
                                                                                                <50 - 25 %</option>
                                                                                            <option value="5">
                                                                                                <25 %</option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_tejido_granu"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_tejido_granu">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_tejido_granu" id="obs_tejido_granu"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="edema_curacion">Edema</label>
                                                                                        <select name="edema_curacion"
                                                                                            id="edema_curacion"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('edema_curacion','div_edema_curacion','obs_edema_curacion',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Ausente </option>
                                                                                            <option value="2">+
                                                                                            </option>
                                                                                            <option value="3">++
                                                                                            </option>
                                                                                            <option value="4">+++
                                                                                            </option>
                                                                                            <option value="5">++++
                                                                                            </option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group "
                                                                                        id="div_edema_curacion"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_edema_curacion">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_edema_curacion" id="obs_edema_curacion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="dolor_curacion">Dolor</label>
                                                                                        <select name="dolor_curacion"
                                                                                            id="dolor_curacion"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('dolor_curacion','div_dolor_curacion','obs_dolor_curacion',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">0 -
                                                                                                1</option>
                                                                                            <option value="2">2 -
                                                                                                3</option>
                                                                                            <option value="3">4 -
                                                                                                6</option>
                                                                                            <option value="4">7 -
                                                                                                8</option>
                                                                                            <option value="5">9 -
                                                                                                10</option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_dolor_curacion"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_dolor_curacion">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_dolor_curacion" id="obs_dolor_curacion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="piel_circun">Piel
                                                                                            circundante</label>
                                                                                        <select name="piel_circun"
                                                                                            id="piel_circun"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('piel_circun','div_piel_circun','obs_piel_circun',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Sana </option>
                                                                                            <option value="2">
                                                                                                Descamada</option>
                                                                                            <option value="3">
                                                                                                Erimatosa</option>
                                                                                            <option value="4">
                                                                                                Macerada</option>
                                                                                            <option value="5">
                                                                                                Gangrena</option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_piel_circun"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_piel_circun">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_piel_circun" id="obs_piel_circun"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="ptos_tot_ev_diab">P.Total</label>
                                                                                        <input type="number"
                                                                                            class="form-control form-control-sm"
                                                                                            name="ptos_tot_ev_diab"
                                                                                            id="ptos_tot_ev_diab">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-1">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-sm  btn-block"onclick="g_pdiab();">
                                                                                        <i
                                                                                            class="feather icon-plus"></i>
                                                                                        Guía</button>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_orin">Obs.
                                                                                            Curación Pié
                                                                                            Diabético</label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=3;"
                                                                                            name="obs_orin" id="obs_orin"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <!--ANTECEDENTES RELEVANTES-->
                                                                                    <div class="form-row">
                                                                                        <div
                                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6
                                                                                                class="t-aten mt-2 mb-2">
                                                                                                ANTECEDENTES RELEVANTES
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="pat_prop">Enfermedad
                                                                                                actual</label>
                                                                                            <select
                                                                                                class="form-control form-control-sm"
                                                                                                name="pat_prop"
                                                                                                id="pat_prop"
                                                                                                multiple="multiple">
                                                                                                <option
                                                                                                    value="1">
                                                                                                    Hipertensión
                                                                                                </option>
                                                                                                <option
                                                                                                    value="2">
                                                                                                    Diabetes</option>
                                                                                                <option
                                                                                                    value="3">
                                                                                                    Hipercolesterolemia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="4">
                                                                                                    Hiperlipidemia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="5">
                                                                                                    Cancer</option>
                                                                                                <option
                                                                                                    value="6">
                                                                                                    Obesidad</option>
                                                                                                <option
                                                                                                    value="7">
                                                                                                    Hipertiroidismo
                                                                                                </option>
                                                                                                <option
                                                                                                    value="8">
                                                                                                    Hipotiroidismo
                                                                                                </option>
                                                                                                <option
                                                                                                    value="9">
                                                                                                    Cirugías</option>
                                                                                                <option
                                                                                                    value="10">
                                                                                                    Inmunodepresión
                                                                                                </option>
                                                                                                <option
                                                                                                    value="11">
                                                                                                    Tabaquismo</option>
                                                                                                <option
                                                                                                    value="12">
                                                                                                    Insuficiencia venosa
                                                                                                </option>
                                                                                                <option
                                                                                                    value="13">
                                                                                                    Insuficiencia
                                                                                                    arterial</option>
                                                                                                <option
                                                                                                    value="14">
                                                                                                    Sustancias Ilícitas
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="sint_act">Medicamentos
                                                                                                / Tratamientos</label>
                                                                                            <select
                                                                                                class="form-control form-control-sm"
                                                                                                name="sint_act"
                                                                                                id="sint_act"
                                                                                                multiple="multiple">
                                                                                                <option
                                                                                                    value="1">
                                                                                                    Hipoglicemiantes
                                                                                                </option>
                                                                                                <option
                                                                                                    value="2">
                                                                                                    Antibióticos
                                                                                                </option>
                                                                                                <option
                                                                                                    value="3">
                                                                                                    Corticosteroides
                                                                                                </option>
                                                                                                <option
                                                                                                    value="4">
                                                                                                    Tratamiento
                                                                                                    Anticoagulante
                                                                                                </option>
                                                                                                <option
                                                                                                    value="5">
                                                                                                    Otros</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="ot_pat_act">Resultado
                                                                                                de exámenes</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" onfocus="this.rows=4"
                                                                                                onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade show"
                                                                            id="curac_pie" role="tabpanel"
                                                                            aria-labelledby="curac_pie-tab">
                                                                            <div class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="cp_cult">Toma de
                                                                                            Cultivo</label>
                                                                                        <select name="cp_cult"
                                                                                            id="cp_cult"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('cp_cult','div_cp_cult','obs_cp_cult',6);">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione</option>
                                                                                            <option value="1">No
                                                                                            </option>
                                                                                            <option value="2">Si
                                                                                            </option>
                                                                                            <option value="6">
                                                                                                Observaciones</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_cp_cult"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_cp_cult">Observaciones
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_cp_cult" id="obs_cp_cult"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="cp_td">Tipos de
                                                                                            debridamiento</label>
                                                                                        <select name="cp_td"
                                                                                            id="cp_td"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('cp_td','div_cp_td','obs_cp_td',8);">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Quirúrgico </option>
                                                                                            <option value="2">
                                                                                                Cortante</option>
                                                                                            <option value="3">
                                                                                                Enzimático</option>
                                                                                            <option value="4">
                                                                                                Autolítico</option>
                                                                                            <option value="5">
                                                                                                Osmótico</option>
                                                                                            <option value="6">
                                                                                                Larval</option>
                                                                                            <option value="7">
                                                                                                Mecánico</option>
                                                                                            <option value="8">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_cp_td"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_cp_td">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_cp_td" id="obs_cp_td"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="cp_duch">Duchoterapia</label>
                                                                                        <select name="cp_duch"
                                                                                            id="cp_duch"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('cp_duch','div_cp_duch','obs_cp_duch',3);">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione</option>
                                                                                            <option value="1">Si
                                                                                            </option>
                                                                                            <option value="2">No
                                                                                            </option>
                                                                                            <option value="3">
                                                                                                Observaciones</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_cp_duch"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_cp_duch">Observaciones
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_cp_duch" id="obs_cp_duch"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-row mt-2">
                                                                                        <div
                                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Tipo de
                                                                                                Antisépticos y
                                                                                                materiales usados</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="pie_ant">Tipo de
                                                                                                antisepticos</label>
                                                                                            <select
                                                                                                class="form-control form-control-sm"
                                                                                                name="pie_ant"
                                                                                                id="pie_ant"
                                                                                                multiple="multiple">
                                                                                                <option
                                                                                                    value="1">
                                                                                                    Solución fisiológica
                                                                                                </option>
                                                                                                <option
                                                                                                    value="2">
                                                                                                    Bialcohol</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="tpo_aposc">Tipo
                                                                                                de apósitos y
                                                                                                materiales</label>
                                                                                            <select
                                                                                                class="form-control form-control-sm"
                                                                                                name="tpo_aposc"
                                                                                                id="tpo_aposc"
                                                                                                multiple="multiple">
                                                                                                <option
                                                                                                    value="1">
                                                                                                    Apósitos Pasivos
                                                                                                </option>
                                                                                                <option
                                                                                                    value="2">
                                                                                                    Apósito Interactivo
                                                                                                    (Espuma Hidrofílica)
                                                                                                </option>
                                                                                                <option
                                                                                                    value="3">
                                                                                                    Apósito Bioactivo
                                                                                                    (Alginato)</option>
                                                                                                <option
                                                                                                    value="4">
                                                                                                    Apósitos Mixtos
                                                                                                </option>
                                                                                                <option
                                                                                                    value="5">
                                                                                                    Vasocontrictores
                                                                                                </option>
                                                                                                <option
                                                                                                    value="6">
                                                                                                    Otros</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="antisep">Observaciones</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4"
                                                                                                onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
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
                                                    <!--QUEMADOS-->
                                                    <div class="tab-pane fade" id="cur_quem" role="tabpanel"
                                                        aria-labelledby="cur_quem-tab">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <h6 class="t-aten">Curación Quemados</h6>
                                                                </div>
                                                                <ul class="nav nav-tabs-aten nav-fill mb-2"
                                                                    id="enf_urgencia" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active"
                                                                            id="val_quem-tab" data-toggle="tab"
                                                                            href="#val_quem" role="tab"
                                                                            aria-controls="val_quem"
                                                                            aria-selected="true">Valoración</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset"
                                                                            id="curac_quem-tab" data-toggle="tab"
                                                                            href="#curac_quem" role="tab"
                                                                            aria-controls="curac_quem"
                                                                            aria-selected="true">Curación</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="tab-content" id="quemados">
                                                                    <div class="tab-pane fade show active"
                                                                        id="val_quem" role="tabpanel"
                                                                        aria-labelledby="val_quem-tab">
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="qmsupqm">Superficie
                                                                                        quemada</label>
                                                                                    <select name="qmsupqm"
                                                                                        id="qmsupqm"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('qmsupqm','div_qmsupqm','obs_qmsupqm',4);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            < 9% </option>
                                                                                        <option value="2">9-18%
                                                                                        </option>
                                                                                        <option value="3"> >18%
                                                                                        </option>
                                                                                        <option value="4">Otros
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_qmsupqm"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_qmsupqm">Otras
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_qmsupqm" id="obs_qmsupqm"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-sm btn-block"onclick="quem();">
                                                                                        <i
                                                                                            class="feather icon-plus"></i>
                                                                                        Guía</button>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="qmdr">Grado
                                                                                        quemadura</label>
                                                                                    <select name="qmdr"
                                                                                        id="qmdr"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('qmdr','div_qmdr','obs_qmdr',11);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">Primer
                                                                                            grado</option>
                                                                                        <option value="2">Segundo
                                                                                            grado</option>
                                                                                        <option value="3">Tercer
                                                                                            grado</option>
                                                                                        <option value="4">Mixta
                                                                                        </option>
                                                                                        <option value="11">
                                                                                            Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_qmdr"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_qmdr">Observaciones
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_qmdr" id="obs_qmdr"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="bh_dren_1">Infección</label>
                                                                                    <select name="qm_presinf"
                                                                                        id="qm_presinf"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('qm_presinf','div_qm_presinf','obs_qm_presinf',2);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">No
                                                                                        </option>
                                                                                        <option value="2">Si
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_qm_presinf"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_qm_presinf">Observaciones
                                                                                        Infección
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_qm_presinf" id="obs_qm_presinfr"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="qm_tq">Tipo
                                                                                        quemadura</label>
                                                                                    <select name="qm_tq"
                                                                                        id="qm_tq"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('qm_tq','div_qm_tq','obs_qm_tq',11);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">Solar
                                                                                        </option>
                                                                                        <option value="2">Por
                                                                                            Liquidos</option>
                                                                                        <option value="3">Vapores
                                                                                            y gases</option>
                                                                                        <option value="4">Sust.
                                                                                            Químicas</option>
                                                                                        <option value="5">
                                                                                            Eléctricidad</option>
                                                                                        <option value="6">Fuego
                                                                                            directo</option>
                                                                                        <option value="11">Otros
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_qm_tq"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_qm_tq">Otra causa
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_qm_tq" id="obs_qm_tq"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="qm_tc">Tipo
                                                                                        curación</label>
                                                                                    <select name="qm_tc"
                                                                                        id="qm_tc"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('qm_tc','div_qm_tc','obs_qm_tc',11);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">Plana
                                                                                            superficial</option>
                                                                                        <option value="2">Con
                                                                                            remoción de tejidos</option>
                                                                                        <option value="3">Aseo
                                                                                            quirúrgico</option>
                                                                                        <option value="11">Otros
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_qm_tc"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="obs_bh_dren_1">Observaciones
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_qm_tc" id="obs_qm_tc"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <!--ANTECEDENTES RELEVANTES-->
                                                                                <div class="form-row mt-2">
                                                                                    <div
                                                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten">
                                                                                            Antecedentes relevantes</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div
                                                                                        class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-6 col-xxl-4">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="pat_propq">Enfermedad
                                                                                            actual</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="pat_propq"
                                                                                            id="pat_propq"
                                                                                            multiple="multiple">
                                                                                            <option value="1">
                                                                                                Hipertensión</option>
                                                                                            <option value="2">
                                                                                                Diabetes</option>
                                                                                            <option value="3">
                                                                                                Hipercolesterolemia
                                                                                            </option>
                                                                                            <option value="4">
                                                                                                Hiperlipidemia</option>
                                                                                            <option value="5">
                                                                                                Cáncer</option>
                                                                                            <option value="6">
                                                                                                Obesidad</option>
                                                                                            <option value="7">
                                                                                                Hipertiroidismo</option>
                                                                                            <option value="8">
                                                                                                Hipotiroidismo</option>
                                                                                            <option value="9">
                                                                                                Cirugías</option>
                                                                                            <option value="10">
                                                                                                Inmunodepresión</option>
                                                                                            <option value="11">
                                                                                                Tabaquismo</option>
                                                                                            <option value="12">
                                                                                                Insuficiencia venosa
                                                                                            </option>
                                                                                            <option value="13">
                                                                                                Insuficiencia arterial
                                                                                            </option>
                                                                                            <option value="14">
                                                                                                Sustancias Ilícitas
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-4">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="med_quem">Medicamentos
                                                                                            / Tratamientos</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="med_quem"
                                                                                            id="med_quem"
                                                                                            multiple="multiple">
                                                                                            <option value="1">
                                                                                                Hipoglicemiantes
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Antibióticos</option>
                                                                                            <option value="3">
                                                                                                Corticosteroides
                                                                                            </option>
                                                                                            <option value="4">
                                                                                                Tratamiento
                                                                                                Anticoagulante</option>
                                                                                            <option value="5">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="ot_pat_act">Resultado
                                                                                            de exámenes</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2" onfocus="this.rows=4"
                                                                                            onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="curac_quem"
                                                                        role="tabpanel"
                                                                        aria-labelledby="curac_quem-tab">
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="cp_cult">Toma de
                                                                                        Cultivo</label>
                                                                                    <select name="cp_cult"
                                                                                        id="cp_cult"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('cp_cult','div_cp_cult','obs_cp_cult',3);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">No
                                                                                        </option>
                                                                                        <option value="2">Si
                                                                                        </option>
                                                                                        <option value="3">
                                                                                            Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_cult"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="obs_cp_cult">Observaciones
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_cult" id="obs_cp_cult"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="cp_td">Tipos de
                                                                                        debridamiento</label>
                                                                                    <select name="cp_td"
                                                                                        id="cp_td"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('cp_td','div_cp_td','obs_cp_td',8);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Quirúrgico </option>
                                                                                        <option value="2">
                                                                                            Cortante</option>
                                                                                        <option value="3">
                                                                                            Enzimático</option>
                                                                                        <option value="4">
                                                                                            Autolítico</option>
                                                                                        <option value="5">
                                                                                            Osmótico</option>
                                                                                        <option value="6">Larval
                                                                                        </option>
                                                                                        <option value="7">
                                                                                            Mecánico</option>
                                                                                        <option value="8">Otros
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_td"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_td">Otras
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_td" id="obs_cp_td"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_duch">Duchoterapia</label>
                                                                                    <select name="cp_duch"
                                                                                        id="cp_duch"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('cp_duch','div_cp_duch','obs_cp_duch',3);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">Si
                                                                                        </option>
                                                                                        <option value="2">No
                                                                                        </option>
                                                                                        <option value="3">
                                                                                            Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_duch"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_duch">Observaciones
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_duch" id="obs_cp_duch"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-row mt-2">
                                                                                    <div
                                                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten">Tipo de
                                                                                            Antisépticos y materiales
                                                                                            usados</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div
                                                                                        class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="ants_qm">Tipo de
                                                                                            antisepticos y
                                                                                            cremas</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="ants_qm"
                                                                                            id="ants_qm"
                                                                                            multiple="multiple">
                                                                                            <option value="1">
                                                                                                Solución fisiológica
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Bialcohol</option>
                                                                                            <option value="3">
                                                                                                Sulfadiazina de
                                                                                                plata(Platsul)</option>
                                                                                            <option value="4">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                        <div class="form-group"
                                                                                            style="margin-top:2%">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="ot_qx_ac">Anote
                                                                                                Otro Antiséptico o
                                                                                                crema</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=3;"
                                                                                                name="ot_qx_ac" id="ot_qx_ac"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="tpo_aposqm">Tipo de
                                                                                            apósitos y
                                                                                            materiales</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="tpo_aposqm"
                                                                                            id="tpo_aposqm"
                                                                                            multiple="multiple">
                                                                                            <option value="1">
                                                                                                Apósitos Pasivos
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Apósito
                                                                                                Interactivo(Espuma
                                                                                                Hidrofílica)</option>
                                                                                            <option value="3">
                                                                                                Apósito
                                                                                                Bioactivo(Alginato)
                                                                                            </option>
                                                                                            <option value="4">
                                                                                                Apósitos Mixtos</option>
                                                                                            <option value="5">
                                                                                                Vasocontrictores
                                                                                            </option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                        <div class="form-group"
                                                                                            style="margin-top:2%">
                                                                                            <label
                                                                                                class="floating-label-activo-sm mt-10"
                                                                                                for="ot_qx_apos">Anote
                                                                                                Otro Tipo de
                                                                                                apósitos</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=3;"
                                                                                                name="ot_qx_apos" id="ot_qx_apos"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm"
                                                                        for="obs_gen_cur_qx">Observaciones Curación
                                                                        Quemados</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=3;"
                                                                        name="obs_gen_cur_qx" id="obs_gen_cur_qx"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <!--EXÁMENES-->
                            <div class="tab-pane fade show " id="enf_examenes" role="tabpanel"
                                aria-labelledby="enf_examenes_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabla_examenes_servicios" class="display table table-xs table-striped dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Fecha y Hora</th>
                                                        <th class="align-middle">Examen</th>
                                                        <th class="align-middle">Acción</th>
                                                        <th class="align-middle">materiales</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($examenes_solicitados))
                                                    @foreach($examenes_solicitados as $examen)
                                                    <tr>
                                                        <td class="align-middle">{{ $examen->fecha }} {{ $examen->hora }} <br> {{ $examen->responsable }}</td>
                                                        <td class="align-middle">{{ $examen->datos_examen->examen }}</td>
                                                        <td class="align-middle"><div class="switch switch-success d-inline">
                                                            <input type="checkbox" id="examenes_servicio_listo{{ $examen->id }}" checked="">
                                                            <label for="examenes_servicio_listo{{ $examen->id }}" class="cr"></label>
                                                        </div></td>
                                                        <td class="align-middle"><button type="button" class="btn btn-outline-info btn-sm" data-target="#modalAgregarInsumos" data-toggle="modal">Insumos</button></td>
                                                    </tr>
                                                @endforeach
                                                @endif
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
</div>

<!-- modalAgregarObservaciones -->
<div class="modal fade" id="modalAgregarObservaciones" tabindex="-1" role="dialog" aria-labelledby="modalAgregarObservacionesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modalAgregarObservacionesLabel">Agregar observaciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" id="observaciones_tratamiento" rows="3"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="agregarObservaciones()">Agregar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL AGREGAR INSUMOS -->
<div class="modal fade" id="modalAgregarInsumos" tabindex="-1" role="dialog" aria-labelledby="modalAgregarInsumos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Agregar insumos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group m-t-10">
                                    <label class="floating-label-activo-sm" for="insumo">Insumo</label>
                                    <input type="text" class="form-control form-control-sm" id="insumo" name="insumo">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group m-t-10">
                                    <label class="floating-label-activo-sm" for="cantidad">Cantidad</label>
                                    <input type="text" class="form-control form-control-sm" id="cantidad" name="cantidad">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group m-t-10">
                                    <label class="floating-label-activo-sm" for="observaciones">Observaciones</label>
                                    <textarea class="form-control form-control-sm" id="observaciones" name="observaciones" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @if(isset($enfermera))
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
                @endif
            </div>
        </div>
    </div>
</div>

@include('app.adm_hospital.servicios.profesionales.cobro_atencion')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.insumos_servicios')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.barthel')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.cudyr')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.glasgow')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.braden')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.caidas')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.eva')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.balance_hidrico')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.pie_diab')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.pie_diab_guia')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.curaciones_hda')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.curaciones_guia')
@include('app.adm_hospital.servicios.enfermera.modal_enfermeria.quemados')


{{--
<script>
    /** MENSAJE*/
    /** CARGAR mensaje */
    $('#mensaje_ficha').html(
        ' Usted puede guardar la evolución solo guarde la ficha cuando el paciente es dado de alta o se traslade ');
    $('#mensaje_ficha').show();
    setTimeout(function() {
        $('#mensaje_ficha').hide();
    }, 5000);
    /** cronico */
    $(document).ready(function() {
        $('#pie_ant').select2();
        $('#tpo_aposc').select2();
        $('#u_med').select2();
        $('#pat_prop').select2();
        $('#pat_propq').select2();
        $('#sint_act').select2();
        $('#med_quem').select2();
        $('#ants_qm').select2();
        $('#tpo_aposqm').select2();
        $('#lpp_patasoc').select2();
        $('#lpp_medprotliq').select2();
        $('#lpp_medproddesc').select2();
        $('#lpp_medprevext').select2();
    });

    function cambiarTextoLabelCuracion(id){
        let url = "{{ route('enfermeria.cambiar_estado_curacion') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id_tratamiento: id,
                observaciones: $('#observaciones_'+id).val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log(response);
                // limpiar el campo hora_
                $('#hora_tratamiento_'+id).html('');
                if(response.mensaje == 'OK'){
                    $('#hora_'+id).html(response.dif);

                    if(response.estado == 0){
                        $('#label_curacion_'+id).html('Listo');
                    }

                    else
                        $('#label_curacion_'+id).html('Pendiente');

                    // agregar disabled al input de observaciones
                    if(response.estado == 0){
                        $('#observaciones_'+id).attr('disabled', true);
                    }else{
                        $('#observaciones_'+id).attr('disabled', false);
                    }
                }else{
                    swal({
                        title: "Error",
                        text: "Ocurrio un error al cambiar el estado del tratamiento",
                        icon: "error",
                        button: "Aceptar",
                    }).then((value) => {
                        //window.location.reload();
                        // volver el check a su estado anterior
                        $('#curaciones_servicio_listo'+id).prop('checked', !$('#curaciones_servicio_listo'+id).prop('checked'));
                    })
                }

            }
        });
    }

    function cargarIgual(input) {

        let actual = $('#' + input);
        let equivalentes = $('#' + input).attr('data-input_igual').split(',');
        $.each(equivalentes, function(index, value) {
            var equivalente = $('#' + value);
            equivalente.val(actual.val());
        });

    }

    function evaluar_para_carga_detalle(select, div, input, valor) {
        var valor_select = $('#' + select + '').val();
        if (valor_select == valor) $('#' + div + '').show();
        else {
            $('#' + div + '').hide();
            $('#' + input + '').val('');
        }
    }
    /* Ponemos "agregarEvolucion" en el ámbito de toda la página */
    function agregarTratamiento() {
        var html = '';
        html += '<div id="contenedor_tratamiento">';
        html += '<div id="tratamiento" class="row border">';
        html += '<div class="col-sm-12 col-md-12 m-t-5">';
        html += '<div class="form-row">';
        html += '<div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        var f = new Date();
        html += ' <input class="form-control form-control-sm" name="fecha" type="hidden" value="' + f.getFullYear() +
            " -/ " + (f.getMonth() + 1) + "-" + f.getDate() + '">';
        html += ' <input class="form-control form-control-sm" name="hora" type="hidden" value="' + f.getHours() + ":" +
            f.getMinutes() + '">';
        html += f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear() + " -/ " + f.getHours() + ":" + f
            .getMinutes() + " min.";
        html += '(Rut responsable)';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="form-group">';
        html += '     <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>';
        html += '     <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm">';
        html += '             <option  value="0">Seleccione</option>';
        html += '             <option  value="1">Juana Perez </option>';
        html += '             <option  value="2">Maria la del Barrio</option>';
        html += '             <option  value="3">alumna en práctica</option>';
        html += '             <option  value="4">Otro/a<option>';
        html += '          <select>';
        html += '     </div>';
        html += '  </div>';
        html += '<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '  <div class="form-group">';
        html += '     <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Indicado Por:</label>';
        html += '     <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm">';
        html += '             <option  value="0">Seleccione</option>';
        html += '             <option  value="1">Juana Perez </option>';
        html += '             <option  value="2">Maria la del Barrio</option>';
        html += '             <option  value="3">alumna en práctica</option>';
        html += '             <option  value="4">Otro/a<option>';
        html += '      <select>';
        html += '   </div>';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="form-group">';
        html += '     <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Vía de Administración:</label>';
        html += '     <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm">';
        html += '             <option  value="0">Seleccione</option>';
        html += '             <option  value="1">Oral</option>';
        html += '             <option  value="2">IM</option>';
        html += '             <option  value="3">EV Directa</option>';
        html += '             <option  value="4">EV Suero<option>';
        html += '             <option  value="3">Rectal</option>';
        html += '             <option  value="4">Subcutánea<option>';
        html += '          <select>';
        html += '  </div>';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-12 m-t-5">';
        html += '  <div class="form-row">';
        html += '<div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1">';


        html += '</div>';
        html += '    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '       <div class="form-group">';
        html +=
            '        <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Medicamento</i></label>';
        html +=
            '        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>';
        html += '    </div>';
        html += '  </div>';
        html += '  <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
        html += '       <div class="form-group">';

        html += '        <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Dosis</i></label>';
        html +=
            '        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>';
        html += '     </div>';
        html += '   </div>';
        html += '  <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="form-group">';

        html +=
            '      <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Tolerancia/efectos adversos</i></label>';
        html +=
            '      <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>';
        html += '  </div>';
        html += '  </div>';
        html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += ' <div class="switch switch-success d-inline m-r-10">';
        html += '  <input type="checkbox" id="registro_alternativo_paciente" checked="">';
        html += ' <label for="registro_alternativo_paciente" class="cr"></label>';
        html += ' </div>';
        html += '  <label>Listo</label>';
        html += '</div>';
        html += '    </div>';
        html += '    </div>';
        html += ' </div>';
        html += '<div class="form-row">';
        html += '</div>';
        html += '</div>';
        html += '</form>';
        html += ' </div>';
        html += '</div>';
        html += '</div>';
        html += '       ';
        html += '    </div>';
        html += '</div>';

        $('#contenedor_tratamiento').append(html);
    } // agregarEvolucion
    $(document).ready(function() {
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-tratamiento').click(function() {
            //agregarTratamiento();
        });
    });

    function agregarProcedimiento() {
        var html = '';
        html += '<div class=" border  px-2 pt-3 pb-1 mb-4 rounded shadow mx-2">';
        html += '<div id="contenedor_procedimiento">';
        html += '<div id="procedimiento" class="row">';
        html += ' <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
        html += ' <div class="form-row">';
        html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += ' <div class="form-group">';
        html += ' <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>';
        html += ' <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm">';
        html += ' <option  value="0">Seleccione</option>';
        html += ' <option  value="1">Juana Perez </option>';
        html += ' <option  value="2">Maria la del Barrio</option>';
        html += ' <option  value="3">alumna en práctica</option>';
        html += ' </select>';
        html += ' </div>';
        html += ' </div>';
        html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += ' <div class="form-group">';
        html += ' <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Indicado por:</label>';
        html += ' <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm">';
        html += ' <option  value="0">Seleccione</option>';
        html += ' <option  value="1">Juana Perez </option>';
        html += ' <option  value="2">Maria la del Barrio</option>';
        html += ' <option  value="3">alumna en práctica</option>';
        html += ' </select>';
        html += ' </div>';
        html += ' </div>';
        html += ' <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">';
        html += ' <div class="form-group">';
        html += ' <label class="floating-label-activo-sm t-red" for="proc_enf_urg">Procedimiento</label>';
        html += ' <select name="proc_enf_urg"  id="proc_enf_urg" class="form-control form-control-sm">';
        html += ' <option value="0">Seleccione</option>';
        html += ' <option  value="1">Reanimación</option>';
        html += ' <option  value="2">Nebulización</option>';
        html += ' <option  value="3">Curación</option>';
        html += ' <option  value="4">Sonda Folley</option>';
        html += ' <option  value="5">Sonda Nasogástrica</option>';
        html += ' <option  value="6">Inmovilización Fx.</option>';
        html += ' <option  value="7">Otro/a<option>';
        html += ' </select>';
        html += ' </div>';
        html += ' </div>';
        html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="custom-control custom-switch">';
        html += ' <input type="checkbox" class="custom-control-input" id="procedimiento_1">';
        html += '  <label class="custom-control-label" for="procedimiento_1">Finalizado</label>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';
        html += ' <div class="form-row">';
        html += ' <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-11 col-xxxl-11">';
        html += ' <div class="form-group">';
        html += ' <label class="floating-label-activo-sm" for="obs_proc_enf_urg">Observaciones</label>';
        html +=
            ' <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_proc_enf_urg" id="obs_proc_enf_urg"></textarea>';
        html += ' </div>';
        html += ' </div>';
        html += ' <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1 col-xxxl-1">';
        html +=
            ' <button type="button" class="btn btn-icon btn-danger-light-c"><i class="feather icon-x"></i></button>';
        html +=
            ' <button type="button" class="btn btn-icon btn-info-light-c"><i class="feather icon-save"></i></button>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';
        html += '</div>';
        html += ' </div>';
        $('#contenedor_procedimiento').append(html);
    } // agregarEvolucion
    $(document).ready(function() {
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-procedimiento').click(function() {
            //agregarProcedimiento();
        });
    });

    function actualizarTotal() {
        console.log('actualizarTotal');
        // Define los ID de los elementos select
        var selectIds = ['cp_asp', 'cp_me', 'cp_pro', 'cp_ecant', 'cp_ecal', 'cp_tn', 'cp_tg', 'cp_ed', 'cp_dol',
            'cp_pielc'
        ];
        var total = 0;

        // Recorre cada ID
        for (var i = 0; i < selectIds.length; i++) {
            // Obtiene el elemento select por su ID y suma su valor al total
            var select = document.getElementById(selectIds[i]);
            total += Number(select.value);
        }

        // Actualiza el valor del campo de entrada con id 'ptos_tot_ev'
        document.getElementById('ptos_tot_ev').value = total;

        if(total >= 10 && total <= 15){
            document.getElementById('tpo_les_curgen').value = 'Tipo 1';
        }else if(total >= 16 && total <= 21){
            document.getElementById('tpo_les_curgen').value = 'Tipo 2';
        }else if(total >= 22 && total <= 27){
            document.getElementById('tpo_les_curgen').value = 'Tipo 3';
        }else if(total >= 28 && total <= 40){
            document.getElementById('tpo_les_curgen').value = 'Tipo 4';
        }
    }

    function actualizarTotalPieDiabetico(){
        console.log('actualizarTotalPieDiabetico');
        // Define los ID de los elementos select
        var selectIds = ['aspecto_pie_diab', 'mayor_extension', 'profundidad_curacion','exudado_cantidad_curacion', 'exudado_calidad_curacion', 'tejido_esf', 'tejido_granu', 'edema_curacion', 'dolor_curacion', 'piel_circun'];
        var total = 0;

        // Recorre cada ID
        for (var i = 0; i < selectIds.length; i++) {
            // Obtiene el elemento select por su ID y suma su valor al total
            var select = document.getElementById(selectIds[i]);
            total += Number(select.value);
        }

        // Actualiza el valor del campo de entrada con id 'ptos_tot_ev'
        document.getElementById('ptos_tot_ev_diab').value = total;

        // if(total >= 10 && total <= 15){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 1';
        // }else if(total >= 16 && total <= 21){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 2';
        // }else if(total >= 22 && total <= 27){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 3';
        // }else if(total >= 28 && total <= 40){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 4';
        // }
    }

    function asignar_nuevo_triage_paciente(id_triage) {
        $('#id_triage').val(id_triage);
        var urlParams = new URLSearchParams(window.location.search);
        var idPaciente = urlParams.get('id_paciente');

        $.ajax({
            url: "{{ route('enfermeria.asignar_nuevo_triage_paciente') }}",
            type: 'POST',
            data: {
                id_triage: id_triage,
                id_paciente: idPaciente,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                console.log(data);
                if (data.mensaje == 'OK') {
                    $('#modal_asignar_triage').modal('hide');
                    swal({
                        title: "Triage Asignado",
                        text: "El triage ha sido asignado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    }).then(function() {
                        let paciente = data.paciente;
                        console.log(paciente);
                        $('#info_paciente_triage').empty();
                        $('#info_paciente_triage').append(`
                        <div class="alert ` + paciente.clase +
                            ` text-white" role="alert" onclick="abrir_atencion_paciente(` +
                            paciente.id + `)">
                            <i class="fas fa-check"></i>&nbsp; &nbsp; ` + paciente.nombres + ` ` + paciente
                            .apellido_uno + ` ` + paciente.apellido_dos + ` <strong>` + paciente
                            .descripcion + `</strong>
                        </div>
                        `);
                    })
                } else {
                    console.log(data);
                }
            },
            error: function(data) {
                console.log(data.responseText);
            }
        });
    }

    function dame_id_paciente(){
        let params = new URLSearchParams(location.search);
        let id_paciente = params.get('id_paciente');
        return id_paciente;
    }

    function guardar_curacion_plana_servicio(){
        var cp_asp = $('#cp_asp').val();
        var cp_me = $('#cp_me').val();
        var cp_pro = $('#cp_pro').val();
        var cp_ecant = $('#cp_ecant').val();
        var cp_ecal = $('#cp_ecal').val();
        var cp_tn = $('#cp_tn').val();
        var cp_tg = $('#cp_tg').val();
        var cp_ed = $('#cp_ed').val();
        var cp_dol = $('#cp_dol').val();
        var cp_pielc = $('#cp_pielc').val();
        var cp_obs = $('#obs_cp_gral').val();
        var tpo_les_curgen = $('#tpo_les_curgen').val();
        var obs_cur_plana = $('#obs_cur_plana').val();
        var ptos_tot_ev = $('#ptos_tot_ev').val();


        var id_paciente = dame_id_paciente();

        // validar que ingrese todos los campos
        if(cp_asp == 0 || cp_me == 0 || cp_pro == 0 || cp_ecant == 0 || cp_ecal == 0 || cp_tn == 0 || cp_tg == 0 || cp_ed == 0 || cp_dol == 0 || cp_pielc == 0){
            swal({
                title: "Curación Plana",
                text: "Debe ingresar todos los campos",
                icon: "warning",
                button: "Aceptar",
            });
            return;
        }

        var data = {
            cp_asp: cp_asp,
            cp_me: cp_me,
            cp_pro: cp_pro,
            cp_ecant: cp_ecant,
            cp_ecal: cp_ecal,
            cp_tn: cp_tn,
            cp_tg: cp_tg,
            cp_ed: cp_ed,
            cp_dol: cp_dol,
            cp_pielc: cp_pielc,
            cp_obs: cp_obs,
            tpo_les_curgen: tpo_les_curgen,
            obs_cur_plana: obs_cur_plana,
            ptos_tot_ev: ptos_tot_ev,
            id_paciente: id_paciente,
            _token: "{{ csrf_token() }}"
        }

        $.ajax({
            url: "{{ route('enfermeria.guardar_curacion_plana_servicio') }}",
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                if (data.mensaje == 'OK') {
                    swal({
                        title: "Curación Plana",
                        text: "La curación plana ha sido guardada correctamente",
                        icon: "success",
                        button: "Aceptar",
                    }).then(function() {
                        $('#modal_curacion_plana').modal('hide');
                    })
                } else {
                    console.log(data.mensaje);
                }
            },
            error: function(data) {
                console.log(data.responseText);
            }
        });

    }

    function actualizar_curacion_plana_servicio(id){
        var cp_asp = $('#cp_asp').val();
        var cp_me = $('#cp_me').val();
        var cp_pro = $('#cp_pro').val();
        var cp_ecant = $('#cp_ecant').val();
        var cp_ecal = $('#cp_ecal').val();
        var cp_tn = $('#cp_tn').val();
        var cp_tg = $('#cp_tg').val();
        var cp_ed = $('#cp_ed').val();
        var cp_dol = $('#cp_dol').val();
        var cp_pielc = $('#cp_pielc').val();
        var cp_obs = $('#obs_cp_gral').val();
        var tpo_les_curgen = $('#tpo_les_curgen').val();
        var obs_cur_plana = $('#obs_cur_plana').val();
        var ptos_tot_ev = $('#ptos_tot_ev').val();
    }

    function guardar_curacion_lpp(){
        var upp_local_eval = $('#upp_local_eval').val();
        var upp_gr_eval = $('#upp_gr_eval').val();
        var upp_diam_eval = $('#upp_diam_eval').val();
        var upp_prof_eval = $('#upp_prof_eval').val();
        var upp_Infec_eval = $('#upp_Infec_eval').val();
        var obs_pa_eval_upp = $('#obs_pa_eval_upp').val();
        var obs_cur_lpp = $('#obs_cur_lpp').val();
        var obs_val_eval_upp = $('#obs_val_eval_upp').val();
        var valoresSeleccionados = $('#lpp_patasoc').val();

        var id_paciente = dame_id_paciente();

        // validar que ingrese todos los campos
        if(upp_local_eval == 0 || upp_gr_eval == 0 || upp_diam_eval == 0 || upp_prof_eval == 0 || upp_Infec_eval == 0){
            swal({
                title: "Curación LPP",
                text: "Debe ingresar todos los campos",
                icon: "warning",
                button: "Aceptar",
            });
            return;
        }

        var data = {
            upp_local_eval: upp_local_eval,
            upp_gr_eval: upp_gr_eval,
            upp_diam_eval: upp_diam_eval,
            upp_prof_eval: upp_prof_eval,
            upp_Infec_eval: upp_Infec_eval,
            obs_pa_eval_upp: obs_pa_eval_upp,
            obs_cur_lpp: obs_cur_lpp,
            obs_val_eval_upp: obs_val_eval_upp,
            id_paciente: id_paciente,
            patologias: valoresSeleccionados,
            _token: "{{ csrf_token() }}"
        }

        $.ajax({
            url: "{{ route('enfermeria.guardar_curacion_lpp_servicio') }}",
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                if (data.mensaje == 'OK') {
                    swal({
                        title: "Curación LPP",
                        text: "La curación LPP ha sido guardada correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                    let curaciones_lpp = data.curaciones_lpp;
                    console.log(curaciones_lpp);
                    $('#tabla_curaciones_lpp_servicio tbody').empty();
                    $.each(curaciones_lpp, function(index, value){
                        $('#tabla_curaciones_lpp_servicio tbody').append(`
                            <tr>
                                <td class="text-center align-middle">${value.fecha} ${value.hora} <br> ${value.responsable}</td>
                                <td class="text-center align-middle">${value.datos_curacion_lpp.upp_gr_eval}</td>
                                <td class="text-center align-middle">${value.datos_curacion_lpp.upp_local_eval}</td>
                                <td class="text-center align-middle">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="curacion_lpp_servicio_listo${value.id}">
                                        <label for="curacion_lpp_servicio_listo${value.id}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle"><button type="button" class="btn btn-outline-primary btn-sm" data-target="#modalAgregarInsumos" data-toggle="modal">Insumos</button></td>
                                <td class="text-center align-middle"><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_curacion_lpp_servicio(${value.id})"><i class="fas fa-trash"></i></button></td>
                            </tr>
                        `);
                    });
                    limpiar_curacion_lpp();
                } else {
                    console.log(data.mensaje);
                }
            },
            error: function(data) {
                console.log(data.responseText);
            }
        });

    }

    function limpiar_curacion_lpp(){
        $('#upp_local_eval').val(0);
        $('#upp_gr_eval').val(0);
        $('#upp_diam_eval').val(0);
        $('#upp_prof_eval').val(0);
        $('#upp_Infec_eval').val(0);
        $('#obs_pa_eval_upp').val('');
        $('#obs_cur_lpp').val('');
        $('#obs_val_eval_upp').val('');
        $('#lpp_patasoc').html('');
    }

    function guardar_antecedentes_ingreso(){
        let motivo = $('#motivo').val();
        let antecedentes = $('#antecedentes').val();
        let esc_eva_ing = $('#esc_eva_ing').val();
        let observaciones = $('#obs_ing_pcte').val();

        let valido = 1;
        let mensaje = '';

        if(motivo == ''){
            valido = 0;
            mensaje += 'Debe ingresar el motivo de ingreso<br>';
        }
        if(antecedentes == ''){
            valido = 0;
            mensaje += 'Debe ingresar los antecedentes<br>';
        }
        if(esc_eva_ing == ''){
            valido = 0;
            mensaje += 'Debe ingresar la escala de evaluación<br>';
        }
        if(observaciones == ''){
            valido = 0;
            mensaje += 'Debe ingresar el examen físico<br>';
        }

        if(valido == 0){
            swal({
                title: "Antecedentes de Ingreso",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: "warning",
                button: "Aceptar",
            });
            return;
        }

        let id_paciente = dame_id_paciente();
        let id_ficha_atencion = $('#id_fc').val();
        let data = {
            motivo: motivo,
            antecedentes: antecedentes,
            esc_eva_ing: esc_eva_ing,
            observaciones: observaciones,
            id_paciente: id_paciente,
            id_ficha_atencion: id_ficha_atencion,
            _token: "{{ csrf_token() }}"
        }

        $.ajax({
            url: "{{ route('enfermeria.guardar_antecedentes_ingreso') }}",
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                if (data.estado == 1) {
                    swal({
                        title: "Antecedentes de Ingreso",
                        text: "Los antecedentes de ingreso han sido guardados correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                } else {
                    console.log(data.msj);
                }
            },
            error: function(data) {
                console.log(data.responseText);
            }
        });
    }
</script> --}}
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
            .done(function(resp) {
                console.log(resp);
                if (resp[0] !== 'null') {

                    data = JSON.parse(resp[0]);
                    let evoluciones = resp[1];
                    let recetas = resp[2];
                    let procedimientos = resp[3];
                    $('#evoluciones_hosp').empty();
                        if(evoluciones.length > 0){
                            evoluciones.forEach(e => {
                            $('#evoluciones_hosp').append(`
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

                            </div>
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
                                    <textarea class="form-control form-control-sm" name="resumen_evolucion" id="resumen_evolucion" rows="3" onfocus="this.rows=5" onblur="this.rows=4;">`+e.resumen+`</textarea>
                                </div>
                            </div>
                            `);
                        });
                    }

                    $('#tabla_medicamento tbody').empty();
                    recetas.forEach(r => {
                        $('#tabla_medicamento tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                `+r.id+`
                            </td>
                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">

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

                    $('#tabla_procedimientos_hosp tbody').empty();
                    procedimientos.forEach(p => {
                        $('#tabla_procedimientos_hosp tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">

                            </td>
                            <td class="text-center align-middle text-wrap">
                                `+p.datos_procedimiento.nombre_procedimiento+`
                            </td>
                            <td class="text-center align-middle text-wrap">
                                <input type="text" id="ind_vig_sig41" name="ind_vig_sig41" class="form-control form-control-sm">
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(41)"><i class="fa fa-trash"></i>Eliminar</button>
                                                                                                                                                    <button type="button" class="btn btn-warning btn-sm" onclick="suspender_procedimiento_sdi(41)"><i class="fas fa-ban"></i>Suspender</button>
                                                                                                                                            </td>
                        </tr>
                        `);
                    });

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

    function volver_a_busqueda(){
        // ocultar modal de paciente
        $('#reserva_agregar_paciente_hora').hide();
        $('#reserva_datos_paciente').hide();
        $('#div_rut_buscar').show();
    }

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

    function getDosis_sdi() {

        let id_medicamento = $('#id_medicamento_ficha_dental').val();


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

    function eliminarEvolucionPacienteHospital(id) {
        let idEvolucion = $('#evolucion' + id).val();
        console.log(idEvolucion);
        // Elimina el elemento con el ID proporcionado
        $('#contenedor_evolucion_' + id).remove();
    }


    function getFrecuencia() {

        let id_dosis = $('#dosis_medicamento_ficha_dental_hosp').val();
        //console.log(dosis);

        let url = "{{ route('frecuencia.get') }}";
            $.ajax({

                url: url,
                type: "get",
                data: {

                    id_dosis: id_dosis,

                },
            })
            .done(function(data) {
                console.log(data)

                if (data != null) {

                    data = JSON.parse(data);
                    console.log(data)
                    let dosis = $('#frecuencia_medicamento_ficha_dental');

                    dosis.find('option').remove();
                    dosis.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        dosis.append('<option value="' + v.id + '">' + v.indic +
                            '</option>');
                    })

                } else {



                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    };

    function getCantComp() {

var cant_comp = $('#dosis_medicamento_ficha_dental option:selected').attr('data-cant_comp');
console.log(cant_comp);

let url = "{{ route('presentacion.get') }}";
$.ajax({

        url: url,
        type: "get",
        data: {

            cant_comp: cant_comp,

        },
    })
    .done(function(data) {
        console.log(data)

        if (data != null) {

            data = JSON.parse(data);
            console.log(data)
            let select_cant_comp = $('#cantidad_comprar');
            let select_cant_comp2 = $('#med_cronicomes');

            select_cant_comp.find('option').remove();
            select_cant_comp.append('<option value="0">Seleccione</option>');
            $(data).each(function(i, v) { // indice, valor
                select_cant_comp.append('<option value="' + v.id + '">' + v.cant +'</option>');
            })
            select_cant_comp.append('<option value="999">Otra Cantidad</option>');
        } else {



        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });

};

    function guardar_evolucion_hospital(){
        let evolucion = $('#evolucion1').val();
        let resumen = $('#resumen_evolucion').val();
        let id_paciente = $('#id_paciente').val();

        let valido = 1;
        let mensaje = '';

        if(evolucion == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Evolucion</li>';
        }
        if(resumen == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Resumen</li>';
        }

        if(valido == 0){
           return swal({
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
        }

        let data = {
            evolucion: evolucion,
            resumen: resumen,
            id_paciente: id_paciente,
            _token: CSRF_TOKEN
        }

        let url = '{{ ROUTE("adm_hospital.registrar_evolucion_paciente_hosp") }}';
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
            },
            error: function(error){
                console.log(error.responseText);
            }
        });

    }
</script>
@endsection
