<div id="editar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Editar datos de contrato Adm. Profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="edit_id_institucion" id="edit_id_institucion" value="{{ $institucion->id }}">
                    <input type="hidden" name="edit_id_lugar_atencion" id="edit_id_lugar_atencion" value="{{ $institucion->id_lugar_atencion }}">
                    <input type="hidden" name="edit_id_admin_creador" id="edit_id_admin_creador" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="edit_id_tipo_admin_creador" id="edit_id_tipo_admin_creador" value="{{ Auth::user()->Roles()->first()->id }}">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="edit_info-tipo_contrato-tab" data-toggle="tab" href="#edit_info-tipo_contrato" role="tab" aria-controls="edit_info-tipo_contrato" aria-selected="true">Tipo Contrato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="edit_info_personal_cont-tab" data-toggle="tab" href="#edit_info_personal_cont" role="tab" aria-controls="edit_info_personal_cont" aria-selected="false">Información Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="edit_info_contrato_pers-tab" data-toggle="tab" href="#edit_info_contrato_pers" role="tab" aria-controls="edit_info_contrato_pers" aria-selected="false">Información de Contrato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="edit_leyes_sociales-tab" data-toggle="tab" href="#edit_leyes_sociales" role="tab" aria-controls="edit_leyes_sociales" aria-selected="false">Leyes Sociales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="edit_horario_contrato-tab" data-toggle="tab" href="#edit_horario_contrato" role="tab" aria-controls="edit_horario_contrato" aria-selected="false">Horario</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="edit_info-tipo_contrato" role="tabpanel" aria-labelledby="info-tipo_contrato-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Profesi&oacute;n</label>
                                            <select name="edit_profesion_nuevo_profesional" id="edit_profesion_nuevo_profesional" class="form-control" onchange="dame_tipo_especialidad()">
                                                <option value="0">Seleccione opci&oacute;n</option>
                                                @foreach($especialidades as $especialidad)
                                                    <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Especialidad</label>
                                            <select name="edit_especialidad_nuevo_profesional" id="edit_especialidad_nuevo_profesional" class="form-control" onchange="dame_subtipo_especialidad()">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Sub-especialidad</label>
                                            <select name="edit_sub_especialidad_nuevo_profesional" id="edit_sub_especialidad_nuevo_profesional" class="form-control">
                                                <option value="0">Seleccione opci&oacute;n</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="edit_info_personal_cont" role="tabpanel" aria-labelledby="edit_info_personal_cont-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Rut</label>
                                            <input type="text" class="form-control form-control-sm" oninput="formatoRut(this)" name="edit_rut_nuevo_profesional" id="edit_rut_nuevo_profesional">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Fecha de Ingreso</label>
                                            <input type="date" class="form-control form-control-sm" name="edit_f_ingreso_nuevo_profesional" id="edit_f_ingreso_nuevo_profesional" value="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Nombre</label>
                                            <input class="form-control form-control-sm" name="nombre_nuevo_profesional_edit" id="nombre_nuevo_profesional_edit" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Primer Apellido</label>
                                            <input class="form-control form-control-sm" name="edit_apellido1_nuevo_profesional" id="edit_apellido1_nuevo_profesional" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Segundo Apellido</label>
                                            <input class="form-control form-control-sm" name="edit_apellido2_nuevo_profesional" id="edit_apellido2_nuevo_profesional" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Sexo</label>
                                        <select class="form-control form-control-sm" name="edit_prof_sexo" id="edit_prof_sexo">
                                            <option value="">Seleccione</option>
                                            <option value="F">Femenino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="edit_fecha_nacimiento" id="edit_fecha_nacimiento">
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                            <input class="form-control form-control-sm" name="edit_email_nuevo_profesional" id="edit_email_nuevo_profesional" type="email" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                            <input class="form-control form-control-sm" name="edit_telefono1_nuevo_profesional" id="edit_telefono1_nuevo_profesional" type="number" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Tel&eacute;fono (opcional)</label>
                                            <input class="form-control form-control-sm" name="edit_telefono2_nuevo_profesional" id="edit_telefono2_nuevo_profesional" type="number" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Dirección</label>
                                            <input class="form-control form-control-sm" name="edit_direccion_nuevo_profesional" id="edit_direccion_nuevo_profesional" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Nº</label>
                                            <input class="form-control form-control-sm" name="edit_numero_nuevo_profesional" id="edit_numero_nuevo_profesional" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                            <select class="form-control form-control-sm" onchange="buscar_ciudad_editar_prof();" id="edit_region_nuevo_profesional">
                                                    <option>Seleccione opci&oacute;n</option>
                                                    @foreach($regiones as $region) <option value="{{ $region->id }}">{{ $region->nombre }}</option> @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Comuna</label>
                                            <select class="form-control form-control-sm" id="edit_comuna_nuevo_profesional">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="edit_correo-cont" checked="">
                                                <label for="edit_correo-cont" class="cr"></label>
                                            </div>
                                            <label>Notificar por correo electr&oacute;nico</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="edit_info_contrato_pers" role="tabpanel" aria-labelledby="edit_info_contrato_pers-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-modal">Datos Bancarios Para Dep&oacute;sito</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Banco</label>
                                            <select class="form-control form-control-sm" name="edit_banco_nuevo_profesional" id="edit_banco_nuevo_profesional">
                                                <option value="0">Seleccione opci&oacute;n</option>
                                                @foreach($bancos as $banco)
                                                    <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Nº Cuenta</label>
                                            <input class="form-control form-control-sm" name="edit_n_cta_nuevo_profesional" id="edit_n_cta_nuevo_profesional" type="number" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Sucursal</label>
                                            <input class="form-control form-control-sm" name="edit_sucursal_nuevo_profesional" id="edit_sucursal_nuevo_profesional" type="text" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="edit_leyes_sociales" role="tabpanel" aria-labelledby="edit_leyes_sociales-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                    <h6 class="t-modal">Información y datos del contrato</h6>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                    <label class="floating-label-activo-sm">Fecha inicio</label>
                                                    <input type="date" class="form-control form-control-sm" name="edit_prof_fecha_inicio" id="edit_prof_fecha_inicio" value="{{ date('Y-m-d') }}">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                    <label class="floating-label-activo-sm">Fecha término</label>
                                                    <input type="date" class="form-control form-control-sm" name="edit_prof_fecha_termino" id="edit_prof_fecha_termino">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6"style="text-align:right">
                                                    <label  class="cr">Contrato Indefinido</label>
                                                    <input type="hidden" id="edit_cont_indefinido" name="edit_cont_indefinido" value="0">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="activar_check('edit_prof_check_contrato_indef', 'edit_cont_indefinido', ' ');" id="edit_prof_check_contrato_indef" name="edit_prof_check_contrato_indef" value="">
                                                        <label for="edit_prof_check_contrato_indef" class="cr"></label>
                                                    </div>
                                                </div>


                                                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                    <label class="floating-label-activo-sm">Monto imponible</label>
                                                    <input type="number" class="form-control form-control-sm" name="edit_prof_monto_imponible" id="edit_prof_monto_imponible">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <label  class="floating-label-activo-sm">Locomoción</label>
                                                    <input type="hidden" id="edit_prof_locomocion" name="edit_prof_locomocion" value="0">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="activar_check('edit_prof_check_locomocion', 'edit_prof_locomocion', 'edit_prof_locomocion_porcentaje');" id="edit_prof_check_locomocion" name="edit_prof_check_locomocion" value="">
                                                        <label for="edit_prof_check_locomocion" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_prof_locomocion_porcentaje" id="edit_prof_locomocion_porcentaje" value="N/A">
                                                </div>


                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm">Colación</label>
                                                     <input type="hidden" id="edit_prof_colacion" name="edit_prof_colacion" value="0">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="activar_check('edit_prof_check_colacion', 'edit_prof_colacion', 'edit_prof_colacion_porcentaje');" id="edit_prof_check_colacion" name="edit_prof_check_colacion" value="">
                                                        <label for="edit_prof_check_colacion" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_prof_colacion_porcentaje" id="edit_prof_colacion_porcentaje" value="N/A">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm">Asignación familar</label>
                                                    <input type="hidden" id="edit_prof_asignacion_familiar" name="edit_prof_asignacion_familiar" value="0">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="activar_check('edit_prof_check_asignacion_familiar', 'edit_prof_asignacion_familiar', 'edit_prof_asignacion_familiar_cantidad');" id="edit_prof_check_asignacion_familiar" name="edit_prof_check_asignacion_familiar" value="">
                                                        <label for="edit_prof_check_asignacion_familiar" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_prof_asignacion_familiar_cantidad" id="edit_prof_asignacion_familiar_cantidad" value="N/A">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm">Cajas de Compensación</label>
                                                    <input type="hidden" id="edit_prof_caja_compensacion" name="edit_prof_caja_compensacion" value="0">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="activar_check('edit_prof_check_caja_compensacion', 'edit_prof_caja_compensacion', 'edit_prof_caja_compensacion_porcentaje');" id="edit_prof_check_caja_compensacion" name="edit_prof_check_caja_compensacion" value="">
                                                        <label for="edit_prof_check_caja_compensacion" class="cr"></label>
                                                    </div>

                                                </div>

                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_prof_caja_compensacion_porcentaje" id="edit_prof_caja_compensacion_porcentaje" value="N/A">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="edit_horario_contrato" role="tabpanel" aria-labelledby="edit_horario_contrato-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                            <h6 class="t-modal">Horario de trabajo</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Días de trabajo</label>
                                            <select class="js-example-basic-multiple" name="edit_dias_laborales" id="edit_dias_laborales" multiple="multiple">
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
                                            <input type="time" class="form-control form-control-sm" id="edit_hora_entrada" name="edit_hora_entrada" value="08:00">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora salida</label>
                                            <input type="time" class="form-control form-control-sm" id="edit_hora_salida" name="edit_hora_salida" value="19:00">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora inicio colación</label>
                                            <input type="time" class="form-control form-control-sm" id="edit_hora_entrada_colacion" name="edit_hora_entrada_colacion" value="12:00">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora término colación</label>
                                            <input type="time" class="form-control form-control-sm" id="edit_hora_salida_colacion" name="edit_hora_salida_colacion" value="13:00">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i>Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="modificar_registros_profesional();"><i class="feather icon-save"></i> Guardar cambios</button>
                {{-- <button type="button" class="btn btn-primary">Ver formulario (PDF)</button> --}}
            </div>
        </div>
    </div>
</div>

<script>

    function contrato_indefinido(input_checkbox, input_value, input_text)
    {
        if($('#'+input_checkbox).prop('checked'))
        {
            $('#'+input_text).val('');
            $('#'+input_value).val(1);
            $('#'+input_text).attr('disabled',true);
        }
        else
        {
            $('#'+input_value).val(0);
            $('#'+input_text).attr('disabled',false);
        }
    }

    function modificar_registros_profesional()
    {
        var valido = 1;
        var mensaje = '';

        let id_contrato = $('#id_contrato_edit').val();

        let id_institucion = $('#edit_id_institucion').val();
        let id_lugar_atencion = $('#edit_id_lugar_atencion').val();
        let id_admin_creador = $('#edit_id_admin_creador').val();
        let id_tipo_admin_creador = $('#edit_id_tipo_admin_creador').val();
        let id_profesion = $('#edit_profesion_nuevo_profesional').val();
        let id_especialidad = $('#edit_especialidad_nuevo_profesional').val();
        let id_sub_especialidad = $('#edit_sub_especialidad_nuevo_profesional').val();
        let tipo_contrato = '1';

        let rut = $('#edit_rut_nuevo_profesional').val();
        let f_ingreso = $('#edit_f_ingreso_nuevo_profesional').val();
        let nombre = $('#nombre_nuevo_profesional_edit').val();
        let apellido1 = $('#edit_apellido1_nuevo_profesional').val();
        let apellido2 = $('#edit_apellido2_nuevo_profesional').val();
        let sexo = $('#edit_prof_sexo').val();
        let fecha_nacimiento = $('#edit_fecha_nacimiento').val();
        let email = $('#edit_email_nuevo_profesional').val();

        let fecha_inicio = $('#edit_prof_fecha_inicio').val();
        let fecha_termino = $('#edit_prof_fecha_termino').val();
        let monto_imponible = $('#edit_prof_monto_imponible').val();

        let locomocion = $('#edit_prof_locomocion').val();
        let locomocion_porcentaje = '';

        if(locomocion == 1)
        {
            locomocion_porcentaje = $('#edit_prof_locomocion_porcentaje').val();
        }
        else
        {
            locomocion_porcentaje = 0;
        }

        let colacion = $('#edit_prof_colacion').val();
        let colacion_porcentaje = '';

        if(colacion == 1)
        {
            colacion_porcentaje = $('#edit_prof_colacion_porcentaje').val();
        }
        else
        {
            colacion_porcentaje = 0;
        }

        let asignacion_familiar = $('#edit_prof_asignacion_familiar').val();
        let asignacion_familiar_cantidad = '';

        if(asignacion_familiar == 1)
        {
            asignacion_familiar_cantidad = $('#edit_prof_asignacion_familiar_cantidad').val();
        }
        else
        {
            asignacion_familiar_cantidad = 0;
        }

        let caja_compensacion = $('#edit_prof_caja_compensacion').val();
        let caja_compensacion_porcentaje = '';

        if(caja_compensacion == 1)
        {
            caja_compensacion_porcentaje = $('#edit_prof_caja_compensacion_porcentaje').val();
        }
        else
        {
            caja_compensacion_porcentaje = 0;
        }

        let telefono1 = $('#edit_telefono1_nuevo_profesional').val();
        let telefono2 = $('#edit_telefono2_nuevo_profesional').val();
        let direccion = $('#edit_direccion_nuevo_profesional').val();
        let region = $('#edit_region_nuevo_profesional').val();
        let ciudad = $('#edit_comuna_nuevo_profesional').val();
        let numero = $('#edit_numero_nuevo_profesional').val();
        let dias_laborales = $('#edit_dias_laborales').val();
        let hora_entrada = $('#edit_hora_entrada').val();
        let hora_salida = $('#edit_hora_salida').val();
        let hora_entrada_colacion = $('#edit_hora_entrada_colacion').val();
        let hora_salida_colacion = $('#edit_hora_salida_colacion').val();
        let profesion = $('#edit_profesion_nuevo_profesional').val();
        let especialidad = $('#edit_especialidad_nuevo_profesional').val();
        let sub_especialidad = $('#edit_sub_especialidad_nuevo_profesional').val();
        let dias_atencion = $('#edit_dias_atencion_nuevo_profesional').val();
        let horario = $('#edit_horario_nuevo_profesional').val();
        let banco = $('#edit_banco_nuevo_profesional').val();
        let n_cta = $('#edit_n_cta_nuevo_profesional').val();
        let sucursal = $('#edit_sucursal_nuevo_profesional').val();


        let id_prof = $('#id_profesional_edit').val();

        let clave_ingreso = $('#add_prof_clave_ingreso').val();
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
        if(id_prof == '')
        {
            valido = 0;
            mensaje += 'Campo requerido ID Empleado\n';
        }
        if(id_profesion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido ID Profesion\n';
        }
        // if(id_especialidad == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido ID Especialidad\n';
        // }
        // if(id_sub_especialidad == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido ID Sub Especialidad\n';
        // }
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
        if(apellido1 == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Apellido Paterno\n';
        }
        if(apellido2 == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Apellido Materno\n';
        }
        if(sexo == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Sexo\n';
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
            mensaje += 'Campo requerido Locomoción\n';
        }
        // if(locomocion_porcentaje == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido locomocion_porcentaje';
        // }
        if(colacion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Colación\n';
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
            mensaje += 'Campo requerido Caja Compensación\n';
        }
        // if(caja_compensacion_porcentaje == '')
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido caja_compensacion_porcentaje';
        // }

        if(dias_laborales == '')
        {
            valido = 0;
            mensaje += 'Campo requerido días laborales\n';
        }
        if(hora_entrada == '')
        {
            valido = 0;
            mensaje += 'Campo requerido hora entrada\n';
        }
        if(hora_salida == '')
        {
            valido = 0;
            mensaje += 'Campo requerido hora salida\n';
        }
        if(hora_entrada_colacion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido hora entrada colación\n';
        }
        if(hora_salida_colacion == '')
        {
            valido = 0;
            mensaje += 'Campo requerido hora salida colación\n';
        }
        if(clave_ingreso == '')
        {
            valido = 0;
            mensaje += 'Campo requerido clave_ingreso\n';
        }

        if(valido == 1)
        {
            let url = "{{ route('adm_cm.editar_profesional') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id_institucion: id_institucion,
                    id_lugar_atencion: id_lugar_atencion,
                    id_admin_creador: id_admin_creador,
                    id_tipo_admin_creador: id_tipo_admin_creador,
                    tipo_contrato: tipo_contrato,
                    rut: rut,
                    f_ingreso: f_ingreso,
                    nombre: nombre,
                    apellido1: apellido1,
                    apellido2: apellido2,
                    sexo: sexo,
                    fecha_nacimiento: fecha_nacimiento,
                    email: email,
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
                    telefono1: telefono1,
                    telefono2: telefono2,
                    direccion: direccion,
                    region: region,
                    ciudad: ciudad,
                    dias_laborales: dias_laborales,
                    hora_entrada: hora_entrada,
                    hora_salida: hora_salida,
                    hora_entrada_colacion: hora_entrada_colacion,
                    hora_salida_colacion: hora_salida_colacion,
                    cargo: 'Profesional',
                    profesion: profesion,
                    especialidad: especialidad,
                    sub_especialidad: sub_especialidad,
                    dias_atencion: dias_atencion,
                    horario: horario,
                    banco: banco,
                    n_cta: n_cta,
                    sucursal: sucursal,
                    id_prof: id_prof,
                    id_contrato: id_contrato,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        $('#editar_profesional_cm').modal('hide');

                        swal({
                            title: "Edición de Personal",
                            text: 'Edición exitosa.',
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
                            title: "Edición de Personal",
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
                        text: "Error al cargar informacion del personal",
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

    function buscar_ciudad_editar_prof(id_ciudad = 0) {
        return new Promise((resolve, reject) => {
            let region = $('#edit_region_nuevo_profesional').val();
            console.log(region);
            let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    region: region,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#edit_comuna_nuevo_profesional');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    });

                    if (id_ciudad != 0) {
                        ciudades.val(id_ciudad);
                    }

                    resolve(); // Resuelve la promesa cuando se hayan cargado las ciudades
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                    reject("Error al cargar las ciudades"); // Rechaza la promesa en caso de error
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
                reject(thrownError); // Rechaza la promesa en caso de fallo en la solicitud AJAX
            });
        });
    }

</script>
