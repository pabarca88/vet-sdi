<!--****Container Completo****-->

{{--  MODAL AGREGAR RESUMEN CONTRATO, ROLES, ACCESO --}}
<div id="editar_personalaseoymantencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_personalaseoymantencion" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Editar Mantención y Limpieza</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="edit_id_institucion_mantencion" id="edit_id_institucion_mantencion" value="{{ $institucion->id }}">
                <input type="hidden" name="edit_id_lugar_atencion_mantencion" id="edit_id_lugar_atencion_mantencion" value="{{ $institucion->id_lugar_atencion }}">
                <input type="hidden" name="edit_id_admin_creador_mantencion" id="edit_id_admin_creador_mantencion" value="{{ Auth::user()->id }}">
                <input type="hidden" name="edit_id_tipo_admin_creador_mantencion" id="edit_id_tipo_admin_creador_mantencion" value="{{ Auth::user()->Roles()->first()->id }}">
                <input type="hidden" name="edit_clave_ingreso_mantencion" id="edit_clave_ingreso_mantencion" value="{{ rand(11111,99999) }}">
                <input type="hidden" name="edit_id_contrato_mantencion" id="edit_id_contrato_mantencion" value="0">
                <input type="hidden" name="edit_id_mantencion" id="edit_id_mantencion" value="0">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="edit_info-tipo_contrato_mantencion-tab" data-toggle="tab" href="#edit_info-tipo_contrato_mantencion" role="tab" aria-controls="edit_info-tipo_contrato" aria-selected="true">Tipo Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_info_personal_cont_mantencion-tab" data-toggle="tab" href="#edit_info_personal_cont_mantencion" role="tab" aria-controls="edit_info_personal_cont" aria-selected="false">Información Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_info_contrato_pers_mantencion-tab" data-toggle="tab" href="#edit_info_contrato_pers_mantencion" role="tab" aria-controls="edit_info_contrato_pers" aria-selected="false">Información de Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_leyes_sociales_mantencion-tab" data-toggle="tab" href="#edit_leyes_sociales_mantencion" role="tab" aria-controls="edit_leyes_sociales" aria-selected="false">Leyes Sociales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_horario_contrato_mantencion-tab" data-toggle="tab" href="#edit_horario_contrato_mantencion" role="tab" aria-controls="edit_horario_contrato" aria-selected="false">Horario</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="myTabContent">
                                {{--  TIPO CONTRATO  --}}
                                <div class="tab-pane fade show active" id="edit_info-tipo_contrato_mantencion" role="tabpanel" aria-labelledby="edit_info-tipo_contrato_mantencion-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm" for="edit_tipo_empleado">Tipo de Contrato</label>
                                                <select class="form-control" id="edit_tipo_empleado">
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
                                <div class="tab-pane fade" id="edit_info_personal_cont_mantencion" role="tabpabel" aria-labelledby="edit_info_personal_cont_mantencion-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                <h6 class="t-modal">Información y datos de contacto</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_mantenedor_edit" id="tipo_mantenedor-empresa_edit" value="empresa" onclick="que_mantenedor_edit()">
                                                    <label class="form-check-label pt-1" for="tipo_mantenedor-empresa">
                                                      Empresa
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_mantenedor_edit" id="tipo_mantenedor-persona_edit" value="persona" onclick="que_mantenedor_edit()" checked>
                                                    <label class="form-check-label pt-1" for="tipo_mantenedor-persona">
                                                        Persona Natural
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">RUT</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_rut_mantencion" id="edit_rut_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Razón Social</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_rz_mantencion" id="edit_rz_mantencion" disabled>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Giro</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_giro_mantencion" id="edit_giro_mantencion" disabled>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Nombres o Empresa</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_nombre_mantencion" id="edit_nombre_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Apellido Paterno</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_apellido_uno_mantencion" id="edit_apellido_uno_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Apellido Materno</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_apellido_dos_mantencion" id="edit_apellido_dos_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Sexo</label>
                                                <select class="form-control form-control-sm" name="edit_sexo_mantencion" id="edit_sexo_mantencion">
                                                    <option value="">Seleccione</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="M">Masculino</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_fecha_nacimiento_mantencion" id="edit_fecha_nacimiento_mantencion">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Correo electrónico</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_email_mantencion" id="edit_email_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Teléfono</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_telefono_mantencion" id="edit_telefono_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Región</label>
                                                <select class="form-control form-control-sm" name="edit_region_mantencion" id="edit_region_mantencion" onchange="buscar_ciudad_nuevo_mantencion();">
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
                                                <select class="form-control form-control-sm" name="edit_ciudad_mantencion" id="edit_ciudad_mantencion">
                                                    <option value="">Seleccione</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-8 col-lg-9 cool-xl-9">
                                                <label class="floating-label-activo-sm">Dirección</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_direccion_mantencion" id="edit_direccion_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                <label class="floating-label-activo-sm">Nº</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_numero_mantencion" id="edit_numero_mantencion">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="edit_info_contrato_pers_mantencion" role="tabpabel" aria-labelledby="edit_info_contrato_pers_mantencion-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="t-modal">Información y datos del contrato</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <label class="floating-label-activo-sm">Fecha inicio</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_fecha_inicio_mantencion" id="edit_fecha_inicio_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <label class="floating-label-activo-sm">Fecha término</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_fecha_termino_mantencion" id="edit_fecha_termino_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6"style="text-align:right">
                                                <label  class="cr">Contrato Indefinido</label>
                                                <input type="hidden" id="add_cont_indefinido_mantencion" name="add_cont_indefinido_mantencion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_check_contrato_indef_mantencion', 'add_cont_indefinido_mantencion', 'edit_fecha_termino_mantencion');" id="edit_check_contrato_indef_mantencion" name="edit_check_contrato_indef_mantencion" value="">
                                                    <label for="edit_check_contrato_indef_mantencion" class="cr"></label>
                                                </div>
                                            </div>


                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label class="floating-label-activo-sm">Monto Imponible</label>
                                                <input type="number" class="form-control form-control-sm" name="edit_monto_imponible_mantencion" id="edit_monto_imponible_mantencion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                <label  class="floating-label-activo-sm">Locomoción</label>
                                                <input type="hidden" id="edit_locomocion_mantencion" name="edit_locomocion_mantencion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_check_locomocion_mantencion', 'edit_locomocion_mantencion', 'edit_locomocion_porcentaje_mantencion');" id="edit_check_locomocion_mantencion" name="edit_check_locomocion_mantencion" value="">
                                                    <label for="edit_check_locomocion_mantencion" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_locomocion_porcentaje_mantencion" id="edit_locomocion_porcentaje_mantencion" value="N/A">
                                            </div>


                                            <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                <label class="floating-label-activo-sm">Colación</label>
                                                <input type="hidden" id="edit_colacion_mantencion" name="edit_colacion_mantencion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_check_colacion_mantencion', 'edit_colacion_mantencion', 'edit_colacion_porcentaje_mantencion');" id="edit_check_colacion_mantencion" name="edit_check_colacion_mantencion" value="">
                                                    <label for="edit_check_colacion_mantencion" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_colacion_porcentaje_mantencion" id="edit_colacion_porcentaje_mantencion" value="N/A">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                <label class="floating-label-activo-sm">Asignación Familar</label>
                                                <input type="hidden" id="edit_asignacion_familiar_mantencion" name="edit_asignacion_familiar_mantencion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_check_asignacion_familiar_mantencion', 'edit_asignacion_familiar_mantencion', 'edit_asignacion_familiar_cantidad_mantencion');" id="edit_check_asignacion_familiar_mantencion" name="edit_check_asignacion_familiar_mantencion" value="">
                                                    <label for="edit_check_asignacion_familiar_mantencion" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_asignacion_familiar_cantidad_mantencion" id="edit_asignacion_familiar_cantidad_mantencion" value="N/A">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                <label class="floating-label-activo-sm">Cajas de Compensación</label>
                                                <input type="hidden" id="edit_caja_compensacion_mantencion" name="edit_caja_compensacion_mantencion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_check_caja_compensacion_mantencion', 'edit_caja_compensacion_mantencion', 'edit_caja_compensacion_porcentaje_mantencion');" id="edit_check_caja_compensacion_mantencion" name="edit_check_caja_compensacion_mantencion" value="">
                                                    <label for="edit_check_caja_compensacion_mantencion" class="cr"></label>
                                                </div>

                                            </div>

                                            <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_caja_compensacion_porcentaje_mantencion" id="edit_caja_compensacion_porcentaje_mantencion" value="N/A">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="edit_leyes_sociales_mantencion" role="tabpabel" aria-labelledby="edit_leyes_sociales_mantencion-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                            <h6 class="t-modal">Leyes sociales</h6>
                                        </div>
                                        <div class=" form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
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
                                <div class="tab-pane fade" id="edit_horario_contrato_mantencion" role="tabpabel" aria-labelledby="edit_horario_contrato_mantencion-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12mb-2">
                                                <h6 class="t-modal">Horario de trabajo</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Días de trabajo</label>
                                                <select class="js-example-basic-multiple" name="edit_dias_laborales_mantencion" id="edit_dias_laborales_mantencion" multiple="multiple">
                                                    <option value="1">Lunes</option>
                                                    <option value="2">Martes</option>
                                                    <option value="3">Miércoles</option>
                                                    <option value="4">Jueves</option>
                                                    <option value="5">Viernes</option>
                                                    <option value="6">Sábado</option>
                                                    <option value="7">Domingo</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Hora entrada</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_hora_entrada_mantencion" name="edit_hora_entrada_mantencion" value="08:00">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Hora salida</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_hora_salida_mantencion" name="edit_hora_salida_mantencion" value="19:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Hora Inicio Colación</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_hora_entrada_colacion_mantencion" name="edit_hora_entrada_colacion_mantencion" value="12:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Hora término colación</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_hora_salida_colacion_mantencion" name="edit_hora_salida_colacion_mantencion" value="13:00">
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
                <button type="button" class="btn btn-info btn-sm" onclick="editar_nuevo_empleado_mantencion();"><i class="feather icon-edit"></i> Guardar cambios</button>
                {{--  <button type="button" class="btn btn-primary">Ver formulario (PDF)</button>  --}}

            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {

        $('#edit_rut_mantencion').rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });
        // select2
        $('#edit_dias_laborales_mantencion').select2({
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
        let region = $('#edit_region').val();
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

                let ciudades = $('#edit_ciudad');

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
        let region = $('#edit_region_mantencion').val();
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
                let ciudades = $('#edit_ciudad_mantencion');

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

    function editar_datos_mantencion(tipo, id){
    $('#editar_personalaseoymantencion').modal('show');
    var url = "{{ route('adm_cm.mantencion_buscar') }}"
    $.ajax({
        url: url,
        type: "get",
        data: {
            tipo: tipo,
            id: id,
        },
    })
    .done(function(data) {
        console.log(data);
        if (data != null)
        {
            $('#edit_id_contrato_mantencion').val(data.registro.contrato.id);
            $('#edit_id_mantencion').val(data.registro.id);
            $('#edit_tipo_empleado').val(data.registro.contrato.tipo_empleado);
            $('#edit_nombre_mantencion').val(data.registro.nombre);
            if(data.registro.contrato.empresa == 0){

                $('input:radio[name=tipo_mantenedor][value=persona]').prop('checked', true);
                $('#edit_rut_mantencion').val(data.registro.rut);
                $('#edit_apellido_uno_mantencion').val(data.registro.apellido_paterno);
                $('#edit_apellido_dos_mantencion').val(data.registro.apellido_materno);
                $('#edit_sexo_mantencion').val(data.registro.sexo);
                $('#edit_fecha_nacimiento_mantencion').val(data.registro.fecha_nac);
                $('#edit_email_mantencion').val(data.registro.email);
                $('#edit_telefono_mantencion').val(data.registro.telefono_uno);
                $('#edit_region_mantencion').val(data.registro.direccion.ciudad.id_region);
                $('#edit_direccion_mantencion').val(data.registro.direccion.direccion);
                $('#edit_numero_mantencion').val(data.registro.direccion.numero_dir);
            }else{

                $('input:radio[name=tipo_mantenedor][value=empresa]').prop('checked', true);
                $('#edit_rut_mantencion').val(data.registro.rut);
                $('#edit_rz_mantencion').val(data.registro.contrato.razon_social);
                $('#edit_giro_mantencion').val(data.registro.contrato.giro);
                $('#edit_email_mantencion').val(data.registro.email);
                $('#edit_telefono_mantencion').val(data.registro.telefono_uno);
                $('#edit_region_mantencion').val(data.registro.direccion.ciudad.id_region);
                $('#edit_direccion_mantencion').val(data.registro.direccion.direccion);
                $('#edit_numero_mantencion').val(data.registro.direccion.numero_dir);
            }
            buscar_ciudad_editar_mantencion(data.registro.direccion.ciudad.id);

            if(data.registro.contrato.tipo_contrato == 1)
                $('#edit_check_contrato_indef_mantencion').prop('checked', true);
            else
                $('#edit_check_contrato_indef_mantencion').prop('checked', false);

            contrato_indefinido('edit_check_contrato_indef_mantencion', 'edit_empleado_cont_indefinido', 'edit_empleado_fecha_termino');
            $('#edit_fecha_inicio_mantencion').val(data.registro.contrato.fecha_inicio);
            $('#edit_fecha_termino_mantencion').val(data.registro.contrato.fecha_termino);
            $('#edit_monto_imponible_mantencion').val(data.registro.contrato.monto_imponible);

            if(data.registro.contrato.locomocion == 1)
                $('#edit_check_locomocion_mantencion').prop('checked', true);
            else
                $('#edit_check_locomocion_mantencion').prop('checked', false);
            activar_check('edit_check_locomocion_mantencion', 'edit_locomocion_mantencion', 'edit_locomocion_porcentaje_mantencion');
            $('#edit_locomocion_porcentaje_mantencion').val(data.registro.contrato.locomocion_porcentaje);

            if(data.registro.contrato.colacion == 1)
                $('#edit_check_colacion_mantencion').prop('checked', true);
            else
                $('#edit_check_colacion_mantencion').prop('checked', false);
            activar_check('edit_check_colacion_mantencion', 'edit_colacion_mantencion', 'edit_colacion_porcentaje_mantencion');
            $('#edit_colacion_porcentaje_mantencion').val(data.registro.contrato.colacion_porcentaje);

            if(data.registro.contrato.asignacion_familiar == 1)
                $('#edit_check_asignacion_familiar_mantencion').prop('checked', true);
            else
                $('#edit_check_asignacion_familiar_mantencion').prop('checked', false);
            activar_check('edit_check_asignacion_familiar_mantencion', 'edit_asignacion_familiar_mantencion', 'edit_asignacion_familiar_cantidad_mantencion');
            $('#edit_asignacion_familiar_cantidad_mantencion').val(data.registro.contrato.asignacion_familiar_cantidad);

            if(data.registro.contrato.caja_compensacion == 1)
                $('#edit_check_caja_compensacion_mantencion').prop('checked', true);
            else
                $('#edit_check_caja_compensacion_mantencion').prop('checked', false);
            activar_check('edit_check_caja_compensacion_mantencion', 'edit_caja_compensacion_mantencion', 'edit_caja_compensacion_porcentaje_mantencion');
            $('#edit_caja_compensacion_porcentaje_mantencion').val(data.registro.contrato.caja_compensacion_porcentaje);

            $('#afp_mantencion').val(data.registro.afp);
            $('#salud_mantencion').val(data.registro.salud);
            $('#seguros_mantencion').val(data.registro.seguros);
            $('#cantidad_mantencion').val(data.registro.cantidad);

            $('#edit_hora_entrada_mantencion').val(data.registro.contrato.hora_ingreso);
            $('#edit_hora_salida_mantencion').val(data.registro.contrato.hora_salida);
            $('#edit_hora_entrada_colacion_mantencion').val(data.registro.contrato.hora_inicio_colacion);
            $('#edit_hora_salida_colacion_mantencion').val(data.registro.contrato.hora_termino_colacion);
            $('#edit_dias_laborales_mantencion').val(data.registro.contrato.dias_laborales.split(',')).select2();


        }
        else
        {
            swal({
                title: "Error",
                text: "Error al cargar los datos",
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

function buscar_ciudad_editar_mantencion(id_ciudad=0)
{
    let region = $('#edit_region_mantencion').val();
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

            let ciudades = $('#edit_ciudad_mantencion');

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

function editar_nuevo_empleado_mantencion()
{
    var valido = 1;
    var mensaje = '';
    let id_mantencion = $('#edit_id_mantencion').val();
    let id_institucion = $('#edit_id_institucion_mantencion').val();
    let id_lugar_atencion = $('#edit_id_lugar_atencion_mantencion').val();
    let id_admin_creador = $('#edit_id_admin_creador_mantencion').val();
    let id_tipo_admin_creador = $('#edit_id_tipo_admin_creador_mantencion').val();
    let tipo_empleado = $('#edit_tipo_empleado').val();
    let tipo_contrato = $('#add_cont_indefinido_mantencion').val();
    let id_contrato_mantencion = $('#edit_id_contrato_mantencion').val();

    let rut = $('#edit_rut_mantencion').val();
    let nombre = $('#edit_nombre_mantencion').val();
    let sexo = $('#edit_sexo_mantencion').val();
    let fecha_nacimiento = $('#edit_fecha_nacimiento_mantencion').val();

    let tipo_mantenedor = $('input:radio[name=tipo_mantenedor]:checked').val();

    if(tipo_mantenedor == 'empresa')
    {
        var t_m = 1;

        var rz = $('#edit_rz_mantencion').val();
        var giro = $('#edit_giro_mantencion').val();
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

        var apellido_uno = $('#edit_apellido_uno_mantencion').val();
        var apellido_dos = $('#edit_apellido_dos_mantencion').val();

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
    let email = $('#edit_email_mantencion').val();

    let fecha_inicio = $('#edit_fecha_inicio_mantencion').val();
    let fecha_termino = $('#edit_fecha_termino_mantencion').val();
    let monto_imponible = $('#edit_monto_imponible_mantencion').val();

    let locomocion = ( $('#edit_locomocion_mantencion').val() == ''?'0':$('#edit_locomocion_mantencion').val() );
    var locomocion_porcentaje = '';
    if(locomocion == 1)
        locomocion_porcentaje = $('#edit_locomocion_porcentaje_mantencion').val();
    else
        locomocion_porcentaje = '0';

    let colacion = ( $('#edit_colacion_mantencion').val() == ''?'0':$('#edit_colacion_mantencion').val() );
    var colacion_porcentaje = '';
    if(colacion == 1)
        colacion_porcentaje = $('#edit_colacion_porcentaje_mantencion').val();
    else
        colacion_porcentaje = '0';

    let asignacion_familiar = ( $('#edit_asignacion_familiar_mantencion').val() == ''?'0':$('#edit_asignacion_familiar_mantencion').val() );
    var asignacion_familiar_cantidad = '';
    if(asignacion_familiar == 1)
        asignacion_familiar_cantidad = $('#edit_asignacion_familiar_cantidad_mantencion').val();
    else
        asignacion_familiar_cantidad = '0';

    let caja_compensacion = ( $('#edit_caja_compensacion_mantencion').val() == ''?'0':$('#edit_caja_compensacion_mantencion').val() );
    var caja_compensacion_porcentaje = '';
    if(caja_compensacion == 1)
        caja_compensacion_porcentaje = $('#edit_caja_compensacion_porcentaje_mantencion').val();
    else
        caja_compensacion_porcentaje = '0';


    let telefono = $('#edit_telefono_mantencion').val();
    let region = $('#edit_region_mantencion').val();
    let ciudad = $('#edit_ciudad_mantencion').val();
    let direccion = $('#edit_direccion_mantencion').val();
    let numero = $('#edit_numero_mantencion').val();
    let dias_laborales = $('#edit_dias_laborales_mantencion').val();
    let hora_entrada = $('#edit_hora_entrada_mantencion').val();
    let hora_salida = $('#edit_hora_salida_mantencion').val();
    let hora_entrada_colacion = $('#edit_hora_entrada_colacion_mantencion').val();
    let hora_salida_colacion = $('#edit_hora_salida_colacion_mantencion').val();
    let clave_ingreso = $('#edit_clave_ingreso_mantencion').val();
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
    if(tipo_contrato == '')
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
        let url = "{{ route('adm_cm.editar_mantencion') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_institucion: id_institucion,
                id_lugar_atencion: id_lugar_atencion,
                id_admin_creador: id_admin_creador,
                id_tipo_admin_creador: id_tipo_admin_creador,
                id_contrato_mantencion: id_contrato_mantencion,
                id_mantencion : id_mantencion,
                tipo_contrato: tipo_contrato,
                tipo_empleado: tipo_empleado,
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
                    $('#modal_agregar_personal').modal('hide');

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



    function limpiar_formulario()
    {
        $('#modal_agregar_personal').find('input,textarea,select,checkbox').each(function(key, element){
            if($(element).attr('type') == 'checkbox')
                $(element).prop('checked', '');
            else if($(element).attr('id') == 'edit_hora_entrada_mantencion')
                $(element).val('08:00');
            else if($(element).attr('id') == 'edit_hora_salida_mantencion')
                $(element).val('19:00');
            else if($(element).attr('id') == 'edit_hora_entrada_colacion_mantencion')
                $(element).val('12:00');
            else if($(element).attr('id') == 'edit_hora_salida_colacion_mantencion')
                $(element).val('13:00');
            else if($(element).attr('id') == 'edit_id_institucion_mantencion')
                $(element).val();
            else if($(element).attr('id') == 'edit_id_lugar_atencion_mantencion')
                $(element).val();
            else if($(element).attr('id') == 'edit_id_admin_creador_mantencion')
                $(element).val();
            else if($(element).attr('id') == 'edit_id_tipo_admin_creador_mantencion')
                $(element).val();
            else
                $(element).val('');
        });
    }

    function que_mantenedor_edit() {
        // Obtener los elementos de los inputs
        var rzInput = document.getElementById('edit_rz_mantencion');
        var giroInput = document.getElementById('edit_giro_mantencion');
        var apellidoUnoInput = document.getElementById('edit_apellido_uno_mantencion');
        var apellidoDosInput = document.getElementById('edit_apellido_dos_mantencion');
        var fechaNacimientoInputa = document.getElementById('edit_fecha_nacimiento_mantencion');
        var sexoInput = document.getElementById('edit_sexo_mantencion');

        // Verificar cuál opción de radio está seleccionada
        if (document.getElementById('tipo_mantenedor-empresa_edit').checked) {
            console.log('Empresa');
            // Si se selecciona "Empresa", habilitar los inputs
            rzInput.removeAttribute('disabled');
            rzInput.style.display = 'block';
            giroInput.removeAttribute('disabled');
            giroInput.style.display = 'block';
            apellidoUnoInput.setAttribute('disabled', 'disabled');
            apellidoUnoInput.style.display = 'none';
            apellidoDosInput.setAttribute('disabled', 'disabled');
            apellidoDosInput.style.display = 'none';
            fechaNacimientoInputa.setAttribute('disabled', 'disabled');
            fechaNacimientoInputa.style.display = 'none';
            sexoInput.setAttribute('disabled', 'disabled');
            sexoInput.style.display = 'none';
        } else {
            console.log('Persona Natural');
            // Si se selecciona "Persona Natural", deshabilitar los inputs
            rzInput.setAttribute('disabled', 'disabled');
            rzInput.style.display = 'none';
            giroInput.setAttribute('disabled', 'disabled');
            giroInput.style.display = 'none';
            apellidoUnoInput.removeAttribute('disabled');
            apellidoUnoInput.style.display = 'block';
            apellidoDosInput.removeAttribute('disabled');
            apellidoDosInput.style.display = 'block';
            fechaNacimientoInputa.removeAttribute('disabled');
            fechaNacimientoInputa.style.display = 'block';
            sexoInput.removeAttribute('disabled');
            sexoInput.style.display = 'block';
        }
    }
</script>
