<!--****Container Completo****-->

{{--  MODAL AGREGAR RESUMEN CONTRATO, ROLES, ACCESO --}}
<div id="registrar_personalaseoymantencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_personalaseoymantencion" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Registrar nuevo/a personal de mantención y limpieza</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="add_empleado_id_institucion_mantencion" id="add_empleado_id_institucion_mantencion" value="{{ $institucion->id }}">
                <input type="hidden" name="add_empleado_id_lugar_atencion_mantencion" id="add_empleado_id_lugar_atencion_mantencion" value="{{ $institucion->id_lugar_atencion }}">
                <input type="hidden" name="add_empleado_id_admin_creador_mantencion" id="add_empleado_id_admin_creador_mantencion" value="{{ Auth::user()->id }}">
                <input type="hidden" name="add_empleado_id_tipo_admin_creador_mantencion" id="add_empleado_id_tipo_admin_creador_mantencion" value="{{ Auth::user()->Roles()->first()->id }}">
                <input type="hidden" name="add_empleado_clave_ingreso_mantencion" id="add_empleado_clave_ingreso_mantencion" value="{{ rand(11111,99999) }}">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="info-tipo_contrato_mantencion-tab" data-toggle="tab" href="#info-tipo_contrato_mantencion" role="tab" aria-controls="info-tipo_contrato" aria-selected="true">Tipo Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="info_personal_cont_mantencion-tab" data-toggle="tab" href="#info_personal_cont_mantencion" role="tab" aria-controls="info_personal_cont" aria-selected="false">Información Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="info_contrato_pers_mantencion-tab" data-toggle="tab" href="#info_contrato_pers_mantencion" role="tab" aria-controls="info_contrato_pers" aria-selected="false">Información de Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="leyes_sociales_mantencion-tab" data-toggle="tab" href="#leyes_sociales_mantencion" role="tab" aria-controls="leyes_sociales" aria-selected="false">Leyes Sociales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="horario_contrato_mantencion-tab" data-toggle="tab" href="#horario_contrato_mantencion" role="tab" aria-controls="horario_contrato" aria-selected="false">Horario</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="myTabContent">
                                {{--  TIPO CONTRATO  --}}
                                <div class="tab-pane fade show active" id="info-tipo_contrato_mantencion" role="tabpanel" aria-labelledby="info-tipo_contrato_mantencion-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm" for="add_empleado_tipo_contrato_mantencion">Tipo de contrato</label>
                                                <select class="form-control" id="add_empleado_tipo_contrato_mantencion">
                                                    <option value="0">Seleccione</option>
                                                    <option value="GASFITERÍA">Gasfitería</option>
                                                    <option value="ELECTRICIDAD">Electricidad</option>
                                                    <option value="CARPINTERÍA">Carpintería</option>
                                                    <option value="PINTURA">Pintura</option>
                                                    <option value="JARDINERÍA">Jardinería</option>
                                                    <option value="LIMPIEZA">Limpieza</option>
                                                    <option value="MANTENCIÓN">Mantención</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="info_personal_cont_mantencion" role="tabpabel" aria-labelledby="info_personal_cont_mantencion-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="t-modal">Información y datos de contacto</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 d-flex mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_mantenedor" id="tipo_mantenedor-empresa" value="empresa" onclick="que_mantenedor()">
                                                    <label class="form-check-label mt-1" for="tipo_mantenedor-empresa">
                                                      Empresa
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_mantenedor" id="tipo_mantenedor-persona" value="persona" onclick="que_mantenedor()" checked>
                                                    <label class="form-check-label mt-1" for="tipo_mantenedor-persona">
                                                        Persona Natural
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm">RUT</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_rut_mantencion" id="add_empleado_rut_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm">Razón Social</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_rz_mantencion" id="add_empleado_rz_mantencion" disabled>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm">Giro</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_giro_mantencion" id="add_empleado_giro_mantencion" disabled>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label class="floating-label-activo-sm">Nombres de persona o empresa</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_nombre_mantencion" id="add_empleado_nombre_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Apellido Paterno</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_apellido_uno_mantencion" id="add_empleado_apellido_uno_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Apellido Materno</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_apellido_dos_mantencion" id="add_empleado_apellido_dos_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Sexo</label>
                                                <select class="form-control form-control-sm" name="add_empleado_sexo_mantencion" id="add_empleado_sexo_mantencion">
                                                    <option value="">Seleccione</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="M">Masculino</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                                <input type="date" class="form-control form-control-sm" name="add_empleado_fecha_nacimiento_mantencion" id="add_empleado_fecha_nacimiento_mantencion">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Email</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_email_mantencion" id="add_empleado_email_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Teléfono</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_telefono_mantencion" id="add_empleado_telefono_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Región</label>
                                                <select class="form-control form-control-sm" name="add_empleado_region_mantencion" id="add_empleado_region_mantencion" onchange="buscar_ciudad_nuevo_mantencion();">
                                                    <option value="">Seleccione</option>
                                                    @if($regiones)
                                                        @foreach ($regiones as $reg )
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                        @endforeach

                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Ciudad</label>
                                                <select class="form-control form-control-sm" name="add_empleado_ciudad_mantencion" id="add_empleado_ciudad_mantencion">
                                                    <option value="">Seleccione</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                <label class="floating-label-activo-sm">Dirección</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_direccion_mantencion" id="add_empleado_direccion_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm">Nº</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_numero_mantencion" id="add_empleado_numero_mantencion">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="info_contrato_pers_mantencion" role="tabpabel" aria-labelledby="info_contrato_pers_mantencion-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="t-modal">Información y datos del contrato</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <label class="floating-label-activo-sm">Fecha Inicio</label>
                                                <input type="date" class="form-control form-control-sm" name="add_empleado_fecha_inicio_mantencion" id="add_empleado_fecha_inicio_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <label class="floating-label-activo-sm">Fecha Termino</label>
                                                <input type="date" class="form-control form-control-sm" name="add_empleado_fecha_termino_mantencion" id="add_empleado_fecha_termino_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6"style="text-align:right">
                                                <label  class="cr">Contrato indefinido</label>
                                                <input type="hidden" id="add_cont_indefinido_mantencion" name="add_cont_indefinido_mantencion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('add_empleado_check_contrato_indef_mantencion', 'add_cont_indefinido_mantencion', ' ');" id="add_empleado_check_contrato_indef_mantencion" name="add_empleado_check_contrato_indef_mantencion" value="">
                                                    <label for="add_empleado_check_contrato_indef_mantencion" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Monto Imponible</label>
                                                <input type="number" class="form-control form-control-sm" name="add_empleado_monto_imponible_mantencion" id="add_empleado_monto_imponible_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-3">
                                                <label  class="floating-label-activo-sm">Locomoción</label>
                                                <input type="hidden" id="add_empleado_locomocion_mantencion" name="add_empleado_locomocion_mantencion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('add_empleado_check_locomocion_mantencion', 'add_empleado_locomocion_mantencion', 'add_empleado_locomocion_porcentaje_mantencion');" id="add_empleado_check_locomocion_mantencion" name="add_empleado_check_locomocion_mantencion" value="">
                                                    <label for="add_empleado_check_locomocion_mantencion" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_locomocion_porcentaje_mantencion" id="add_empleado_locomocion_porcentaje_mantencion" value="N/A">
                                            </div>


                                            <div class="form-group col-sm-12 col-md-12 col-lg-3">
                                                <label class="floating-label-activo-sm">Colación</label>
                                                <input type="hidden" id="add_empleado_colacion_mantencion" name="add_empleado_colacion_mantencion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('add_empleado_check_colacion_mantencion', 'add_empleado_colacion_mantencion', 'add_empleado_colacion_porcentaje_mantencion');" id="add_empleado_check_colacion_mantencion" name="add_empleado_check_colacion_mantencion" value="">
                                                    <label for="add_empleado_check_colacion_mantencion" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_colacion_porcentaje_mantencion" id="add_empleado_colacion_porcentaje_mantencion" value="N/A">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-12 col-lg-3">
                                                <label class="floating-label-activo-sm">Asignación Familar</label>
                                                <input type="hidden" id="add_empleado_asignacion_familiar_mantencion" name="add_empleado_asignacion_familiar_mantencion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('add_empleado_check_asignacion_familiar_mantencion', 'add_empleado_asignacion_familiar_mantencion', 'add_empleado_asignacion_familiar_cantidad_mantencion');" id="add_empleado_check_asignacion_familiar_mantencion" name="add_empleado_check_asignacion_familiar_mantencion" value="">
                                                    <label for="add_empleado_check_asignacion_familiar_mantencion" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_asignacion_familiar_cantidad_mantencion" id="add_empleado_asignacion_familiar_cantidad_mantencion" value="N/A">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-3">
                                                <label class="floating-label-activo-sm">Cajas de Compensación</label>
                                                <input type="hidden" id="add_empleado_caja_compensacion_mantencion" name="add_empleado_caja_compensacion_mantencion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('add_empleado_check_caja_compensacion_mantencion', 'add_empleado_caja_compensacion_mantencion', 'add_empleado_caja_compensacion_porcentaje_mantencion');" id="add_empleado_check_caja_compensacion_mantencion" name="add_empleado_check_caja_compensacion_mantencion" value="">
                                                    <label for="add_empleado_check_caja_compensacion_mantencion" class="cr"></label>
                                                </div>

                                            </div>

                                            <div class="form-group col-sm-12 col-md-12 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_caja_compensacion_porcentaje_mantencion" id="add_empleado_caja_compensacion_porcentaje_mantencion" value="N/A">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="leyes_sociales_mantencion" role="tabpabel" aria-labelledby="leyes_sociales_mantencion-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h6 class="t-modal">Leyes sociales</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <label class="floating-label-activo-sm" for="afp">Seguros</label>
                                            <select name="afp_mantencion" id="afp_mantencion" class="form-control form-control-sm">
                                                <option value="0">Seleccione</option>
                                                <option value="1">AFP Capital</option>
                                                <option value="2">AFP Cuprum</option>
                                                <option value="3">AFP Habitat</option>
                                                <option value="4">AFP Modelo</option>
                                                <option value="5">AFP Planvital</option>
                                                <option value="6">AFP Provida</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <label class="floating-label-activo-sm" for="salud">Seguros</label>
                                            <select name="salud_mantencion" id="salud_mantencion" class="form-control form-control-sm">
                                                <option value="0">Seleccione</option>
                                                <option value="1">Fonasa</option>
                                                <option value="2">Isapre Banmedica</option>
                                                <option value="3">Isapre Colmena</option>
                                                <option value="4">Isapre Consalud</option>
                                                <option value="5">Isapre Cruz Blanca</option>
                                                <option value="6">Isapre Nueva Masvida</option>
                                                <option value="7">Isapre Vida Tres</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm" for="seguros">Seguros</label>
                                                <input type="text" name="seguros_mantencion" id="seguros_mantencion" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm" for="cantidad">Cantidad</label>
                                                <input type="number" name="cantidad_mantencion" id="cantidad_mantencion" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="horario_contrato_mantencion" role="tabpabel" aria-labelledby="horario_contrato_mantencion-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                <h6 class="t-modal">Horario de trabajo</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label class="floating-label-activo-sm">Días de trabajo</label>
                                                <select class="js-example-basic-multiple" name="add_empleado_dias_laborales_mantencion" id="add_empleado_dias_laborales_mantencion" multiple="multiple">
                                                    <option value="1">Lunes</option>
                                                    <option value="2">Martes</option>
                                                    <option value="3">Miercoles</option>
                                                    <option value="4">Jueves</option>
                                                    <option value="5">Viernes</option>
                                                    <option value="6">Sabado</option>
                                                    <option value="7">Domingo</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Hora entrada</label>
                                                <input type="time" class="form-control form-control-sm" id="add_empleado_hora_entrada_mantencion" name="add_empleado_hora_entrada_mantencion" value="08:00">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Hora salida</label>
                                                <input type="time" class="form-control form-control-sm" id="add_empleado_hora_salida_mantencion" name="add_empleado_hora_salida_mantencion" value="19:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Hora inicio colación</label>
                                                <input type="time" class="form-control form-control-sm" id="add_empleado_hora_entrada_colacion_mantencion" name="add_empleado_hora_entrada_colacion_mantencion" value="12:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Hora término colación</label>
                                                <input type="time" class="form-control form-control-sm" id="add_empleado_hora_salida_colacion_mantencion" name="add_empleado_hora_salida_colacion_mantencion" value="13:00">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                {{--  INFORMACION PERSONAL  --}}
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="registrar_nuevo_empleado_mantencion();"><i class="feather icon-check"></i> Añadir al equipo</button>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        {{--  FORMATEO DE RUT AGREGAR NUEVO PROFESIONAL   --}}
        $("#add_empleado_rut").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });
        $('#add_empleado_rut_mantencion').rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });
        // select2
        $('#add_empleado_dias_laborales_asistente').select2({
            placeholder: "Seleccione"
        });
    });

    function registrar_personal() {
        $('#modal_agregar_personal').modal('show');
        limpiar_formulario();
    }

    {{-- BUSCAR CIUDAD DE REGISTRAR --}}
    function buscar_ciudad_nuevo_empleado(id_ciudad=0)
    {
        let region = $('#add_empleado_region').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            if (data != null)
            {
                data = JSON.parse(data);

                let ciudades = $('#add_empleado_ciudad');

                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })

                if(id_ciudad != 0)
                    ciudades.val(id_ciudad);

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

    function buscar_ciudad_nuevo_mantencion(){
        let region = $('#add_empleado_region_mantencion').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            if (data != null)
            {
                data = JSON.parse(data);
                let ciudades = $('#add_empleado_ciudad_mantencion');

                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                });

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


    function registrar_nuevo_empleado_mantencion()
    {
        var valido = 1;
        var mensaje = '';
        let id_institucion = $('#add_empleado_id_institucion_mantencion').val();
        let id_lugar_atencion = $('#add_empleado_id_lugar_atencion_mantencion').val();
        let id_admin_creador = $('#add_empleado_id_admin_creador_mantencion').val();
        let id_tipo_admin_creador = $('#add_empleado_id_tipo_admin_creador_mantencion').val();
        let tipo_contrato = $('#add_empleado_tipo_contrato_mantencion').val();

        let rut = $('#add_empleado_rut_mantencion').val();
        let nombre = $('#add_empleado_nombre_mantencion').val();
        let sexo = $('#add_empleado_sexo_mantencion').val();
        let fecha_nacimiento = $('#add_empleado_fecha_nacimiento_mantencion').val();

        let tipo_mantenedor = $('input:radio[name=tipo_mantenedor]:checked').val();

        if(tipo_mantenedor == 'empresa')
        {
            var t_m = 1;

            var rz = $('#add_empleado_rz_mantencion').val();
            var giro = $('#add_empleado_giro_mantencion').val();
            // validar si es empresa
            if(rz == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Razón Social\n';
            }
            if(giro == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Giro\n';
            }

        }
        else
        {
            var t_m = 0;

            var rz = '';
            var giro = '';

            var apellido_uno = $('#add_empleado_apellido_uno_mantencion').val();
            var apellido_dos = $('#add_empleado_apellido_dos_mantencion').val();

            if(apellido_uno == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Apellido Paterno\n';
            }
            if(apellido_dos == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Apellido Materno\n';
            }
            if(sexo == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Sexo\n';
            }
            if(fecha_nacimiento == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Fecha Nacimiento\n';
            }
        }

        tipo_mantenedor = t_m;
        let email = $('#add_empleado_email_mantencion').val();

        let fecha_inicio = $('#add_empleado_fecha_inicio_mantencion').val();
        let fecha_termino = $('#add_empleado_fecha_termino_mantencion').val();
        let monto_imponible = $('#add_empleado_monto_imponible_mantencion').val();

        let locomocion = ( $('#add_empleado_locomocion_mantencion').val() == ''?'0':$('#add_empleado_locomocion_mantencion').val() );
        var locomocion_porcentaje = '';
        if(locomocion == 1)
            locomocion_porcentaje = $('#add_empleado_locomocion_porcentaje_mantencion').val();
        else
            locomocion_porcentaje = '0';

        let colacion = ( $('#add_empleado_colacion_mantencion').val() == ''?'0':$('#add_empleado_colacion_mantencion').val() );
        var colacion_porcentaje = '';
        if(colacion == 1)
            colacion_porcentaje = $('#add_empleado_colacion_porcentaje_mantencion').val();
        else
            colacion_porcentaje = '0';

        let asignacion_familiar = ( $('#add_empleado_asignacion_familiar_mantencion').val() == ''?'0':$('#add_empleado_asignacion_familiar_mantencion').val() );
        var asignacion_familiar_cantidad = '';
        if(asignacion_familiar == 1)
            asignacion_familiar_cantidad = $('#add_empleado_asignacion_familiar_cantidad_mantencion').val();
        else
            asignacion_familiar_cantidad = '0';

        let caja_compensacion = ( $('#add_empleado_caja_compensacion_mantencion').val() == ''?'0':$('#add_empleado_caja_compensacion_mantencion').val() );
        var caja_compensacion_porcentaje = '';
        if(caja_compensacion == 1)
            caja_compensacion_porcentaje = $('#add_empleado_caja_compensacion_porcentaje_mantencion').val();
        else
            caja_compensacion_porcentaje = '0';


        let telefono = $('#add_empleado_telefono_mantencion').val();
        let region = $('#add_empleado_region_mantencion').val();
        let ciudad = $('#add_empleado_ciudad_mantencion').val();
        let direccion = $('#add_empleado_direccion_mantencion').val();
        let numero = $('#add_empleado_numero_mantencion').val();
        let dias_laborales = $('#add_empleado_dias_laborales_mantencion').val();
        let hora_entrada = $('#add_empleado_hora_entrada_mantencion').val();
        let hora_salida = $('#add_empleado_hora_salida_mantencion').val();
        let hora_entrada_colacion = $('#add_empleado_hora_entrada_colacion_mantencion').val();
        let hora_salida_colacion = $('#add_empleado_hora_salida_colacion_mantencion').val();
        let clave_ingreso = $('#add_empleado_clave_ingreso_mantencion').val();
        let _token = CSRF_TOKEN;

        if(id_institucion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Institución\n';
        }
        if(id_lugar_atencion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Lugar Atención\n';
        }
        if(id_admin_creador == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Usuario Creador\n';
        }
        if(id_tipo_admin_creador == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Tipo Usuario Creador\n';
        }
        if(tipo_contrato == '' || tipo_contrato == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido Tipo Contrato\n';
        }
        if(rut == '')
        {
            valido = 0;
            mensaje += 'Campo requerido RUT\n';
        }
        if(nombre == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Nombre\n';
        }
        if(email == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Email\n';
        }
        if(telefono == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Teléfono\n';
        }
        if(region == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Región\n';
        }
        if(ciudad == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Ciudad\n';
        }
        if(direccion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Dirección\n';
        }
        // if(numero == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido Número\n';
        // }


        if(fecha_inicio == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Fecha Inicio\n';
        }
        // if(fecha_termino == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido Fecha Termino';
        // }
        if(monto_imponible == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Monto Imponible\n';
        }

        if(locomocion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Locomocion\n';
        }
        // if(locomocion_porcentaje == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido locomocion_porcentaje';
        // }
        if(colacion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Colacion\n';
        }
        // if(colacion_porcentaje == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido colacion_porcentaje';
        // }
        if(asignacion_familiar == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Asignacion Familiar\n';
        }
        // if(asignacion_familiar_cantidad == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido asignacion_familiar_cantidad';
        // }
        if(caja_compensacion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Caja Compensacion\n';
        }
        // if(caja_compensacion_porcentaje == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido caja_compensacion_porcentaje';
        // }

        if(dias_laborales == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Días laborales\n';
        }
        if(hora_entrada == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Hora entrada\n';
        }
        if(hora_salida == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Hora salida\n';
        }
        if(hora_entrada_colacion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Hora entrada colación\n';
        }
        if(hora_salida_colacion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Hora salida colación\n';
        }
        // if(clave_ingreso == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido clave_ingreso\n';
        // }

        if(valido == 1)
        {
            let url = "{{ route('adm_cm.registrar_personal') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_institucion: id_institucion,
                    id_lugar_atencion: id_lugar_atencion,
                    id_admin_creador: id_admin_creador,
                    id_tipo_admin_creador: id_tipo_admin_creador,
                    tipo_contrato: tipo_contrato,
                    tipo_mantenedor: tipo_mantenedor,
                    rut: rut,
                    nombre: nombre,
                    apellido_uno: apellido_uno,
                    apellido_dos: apellido_dos,
                    fecha_nacimiento: fecha_nacimiento,
                    sexo: sexo,
                    email: email,
                    telefono: telefono,
                    region: region,
                    ciudad: ciudad,
                    direccion: direccion,
                    numero: numero,
                    fecha_inicio: fecha_inicio,
                    fecha_termino: fecha_termino,
                    monto_imponible: monto_imponible,
                    locomocion: locomocion,
                    locomocion_porcentaje: locomocion_porcentaje,
                    colacion: colacion,
                    colacion_porcentaje: colacion_porcentaje,
                    asignacion_familiar: asignacion_familiar,
                    asignacion_familiar_cantidad: asignacion_familiar_cantidad,
                    caja_compensacion: caja_compensacion,
                    caja_compensacion_porcentaje: caja_compensacion_porcentaje,
                    dias_laborales: dias_laborales,
                    hora_entrada: hora_entrada,
                    hora_salida: hora_salida,
                    hora_entrada_colacion: hora_entrada_colacion,
                    hora_salida_colacion: hora_salida_colacion,
                    otro: '',
                    otro_2: '',
                    clave_ingreso: clave_ingreso,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        $('#registrar_personalaseoymantencion').modal('hide');

                        swal({
                            title: "Ingreso de Personal",
                            text: 'Registro Exitoso.',
                            icon: "success",
                            buttons: "Aceptar",
                        })
                        .then((value) => {
                            location.reload();
                        });
                    }
                    else
                    {

                        var mensaje = '';
                        if(data.error)
                        {
                            $.each(data.error, function (indexInArray, valueOfElement)
                            {
                                mensaje += valueOfElement+'\n';
                            });
                        }
                        else
                        {
                            mensaje += 'Intente nuevamente.';
                        }

                        swal({
                            title: "Ingreso de Personal",
                            text: mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar personal",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
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
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function activar_check(check, input_base, input_valor)
    {
        if($('#'+check).prop('checked'))
        {
            $('#'+input_base).val(1);
            $('#'+input_valor).val(0);
            $('#'+input_valor).attr('disabled', false);
        }
        else
        {
            $('#'+input_base).val(0);
            $('#'+input_valor).val('N/A');
            $('#'+input_valor).attr('disabled', true);
        }
    }

    function limpiar_formulario()
    {
        $('#modal_agregar_personal').find('input,textarea,select,checkbox').each(function(key, element){
            if($(element).attr('type') == 'checkbox')
                $(element).prop('checked', '');
            else if($(element).attr('id') == 'add_empleado_hora_entrada_mantencion')
                $(element).val('08:00');
            else if($(element).attr('id') == 'add_empleado_hora_salida_mantencion')
                $(element).val('19:00');
            else if($(element).attr('id') == 'add_empleado_hora_entrada_colacion_mantencion')
                $(element).val('12:00');
            else if($(element).attr('id') == 'add_empleado_hora_salida_colacion_mantencion')
                $(element).val('13:00');
            else if($(element).attr('id') == 'add_empleado_id_institucion_mantencion')
                $(element).val();
            else if($(element).attr('id') == 'add_empleado_id_lugar_atencion_mantencion')
                $(element).val();
            else if($(element).attr('id') == 'add_empleado_id_admin_creador_mantencion')
                $(element).val();
            else if($(element).attr('id') == 'add_empleado_id_tipo_admin_creador_mantencion')
                $(element).val();
            else
                $(element).val('');
        });
    }

    function que_mantenedor() {
        // Obtener los elementos de los inputs y sus contenedores
        var rzInput = document.getElementById('add_empleado_rz_mantencion');
        var giroInput = document.getElementById('add_empleado_giro_mantencion');
        var apellidoUnoInput = document.getElementById('add_empleado_apellido_uno_mantencion');
        var apellidoDosInput = document.getElementById('add_empleado_apellido_dos_mantencion');
        var fechaNacimientoInput = document.getElementById('add_empleado_fecha_nacimiento_mantencion');
        var sexoInput = document.getElementById('add_empleado_sexo_mantencion');

        // Obtener los contenedores padre (form-group) para ocultar input + label
        var rzContainer = rzInput.closest('.form-group');
        var giroContainer = giroInput.closest('.form-group');
        var apellidoUnoContainer = apellidoUnoInput.closest('.form-group');
        var apellidoDosContainer = apellidoDosInput.closest('.form-group');
        var fechaNacimientoContainer = fechaNacimientoInput.closest('.form-group');
        var sexoContainer = sexoInput.closest('.form-group');

        // Verificar cuál opción de radio está seleccionada
        if (document.getElementById('tipo_mantenedor-empresa').checked) {
            console.log('Empresa');
            // Si se selecciona "Empresa", mostrar campos de empresa y ocultar campos de persona
            rzContainer.style.display = 'block';
            rzInput.removeAttribute('disabled');
            
            giroContainer.style.display = 'block';
            giroInput.removeAttribute('disabled');
            
            apellidoUnoContainer.style.display = 'none';
            apellidoUnoInput.setAttribute('disabled', 'disabled');
            
            apellidoDosContainer.style.display = 'none';
            apellidoDosInput.setAttribute('disabled', 'disabled');
            
            fechaNacimientoContainer.style.display = 'none';
            fechaNacimientoInput.setAttribute('disabled', 'disabled');
            
            sexoContainer.style.display = 'none';
            sexoInput.setAttribute('disabled', 'disabled');
        } else {
            console.log('Persona Natural');
            // Si se selecciona "Persona Natural", ocultar campos de empresa y mostrar campos de persona
            rzContainer.style.display = 'none';
            rzInput.setAttribute('disabled', 'disabled');
            
            giroContainer.style.display = 'none';
            giroInput.setAttribute('disabled', 'disabled');
            
            apellidoUnoContainer.style.display = 'block';
            apellidoUnoInput.removeAttribute('disabled');
            
            apellidoDosContainer.style.display = 'block';
            apellidoDosInput.removeAttribute('disabled');
            
            fechaNacimientoContainer.style.display = 'block';
            fechaNacimientoInput.removeAttribute('disabled');
            
            sexoContainer.style.display = 'block';
            sexoInput.removeAttribute('disabled');
        }
    }
</script>
