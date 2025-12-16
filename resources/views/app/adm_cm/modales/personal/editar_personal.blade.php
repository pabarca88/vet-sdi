<div id="editar_asistente_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_asistente_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Editar Datos de Contrato Adm</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="min-height: 360px;">
                <input type="hidden" name="edit_empleado_id_institucion" id="edit_empleado_id_institucion" value="{{ $institucion->id }}">
                <input type="hidden" name="edit_empleado_id_lugar_atencion" id="edit_empleado_id_lugar_atencion" value="{{ $institucion->id_lugar_atencion }}">
                <input type="hidden" name="edit_empleado_id_admin_creador" id="edit_empleado_id_admin_creador" value="{{ Auth::user()->id }}">
                <input type="hidden" name="edit_empleado_id_tipo_admin_creador" id="edit_empleado_id_tipo_admin_creador" value="{{ Auth::user()->Roles()->first()->id }}">
                <input type="hidden" name="edit_empleado_clave_ingreso" id="edit_empleado_clave_ingreso" value="{{ rand(11111,99999) }}">
                <input type="hidden" name="edit_empleado_id_empleado" id="edit_empleado_id_empleado" value="">
                <input type="hidden" name="edit_empleado_id_contrato" id="edit_empleado_id_contrato" value="">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    </div>
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
                                <a class="nav-link-aten text-reset" id="edit_horario_contrato-tab" data-toggle="tab" href="#edit_horario_contrato" role="tab" aria-controls="edit_horario_contrato" aria-selected="false">Horario</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="info-ingreso">
                            <!---->
                            <div class="tab-pane fade show active" id="edit_info-tipo_contrato" role="tabpanel" aria-labelledby="edit_info-tipo_contrato-tab">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                    <select class="form-control form-control-sm" name="edit_empleado_tipo_contrato" id="edit_empleado_tipo_contrato">
                                        <option value="">Seleccione</option>
                                        @if ($lista_tipo_contrato)
                                            @foreach ($lista_tipo_contrato as $item)
                                                <option value="{{ $item['nombre'] }}" data-id="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                            @endforeach
                                        @endif
                                        {{--  asistente tipo  --}}
                                        {{--  tipo institucion  --}}
                                        {{--  tipo administrador  --}}
                                    </select>
                                </div>
                            </div>
                                <!--INFO PERSONAL-->
                            <div class="tab-pane fade show" id="edit_info_personal_cont" role="tabpanel" aria-labelledby="edit_info_personal_cont-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h6 class="text-c-blue">INFORMACIÓN Y DATOS DE CONTACTO</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">RUT:</label>
                                            <input type="text" class="form-control form-control-sm" name="edit_empleado_rut" id="edit_empleado_rut" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Nombres</label>
                                            <input type="text" class="form-control form-control-sm" name="edit_empleado_nombre" id="edit_empleado_nombre">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Apellido Paterno</label>
                                            <input type="text" class="form-control form-control-sm" name="edit_empleado_apellido_uno" id="edit_empleado_apellido_uno">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Apellido Materno</label>
                                            <input type="text" class="form-control form-control-sm" name="edit_empleado_apellido_dos" id="edit_empleado_apellido_dos">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Sexo</label>
                                            <select class="form-control form-control-sm" name="edit_empleado_sexo" id="edit_empleado_sexo">
                                                <option value="">Seleccione</option>
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                            <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_nacimiento" id="edit_empleado_fecha_nacimiento">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Email:</label>
                                            <input type="text" class="form-control form-control-sm" name="edit_empleado_email" id="edit_empleado_email">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Teléfono</label>
                                            <input type="text" class="form-control form-control-sm" name="edit_empleado_telefono" id="edit_empleado_telefono">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Región</label>
                                            <select class="form-control form-control-sm" name="edit_empleado_region" id="edit_empleado_region" onchange="buscar_ciudad_editar_empleado();">
                                                <option value="">Seleccione</option>
                                                @if($regiones)
                                                    @foreach ($regiones as $reg )
                                                        <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                    @endforeach

                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Ciudad</label>
                                            <select class="form-control form-control-sm" name="edit_empleado_ciudad" id="edit_empleado_ciudad">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Dirección</label>
                                            <input type="text" class="form-control form-control-sm" name="edit_empleado_direccion" id="edit_empleado_direccion">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Número</label>
                                            <input type="text" class="form-control form-control-sm" name="edit_empleado_numero" id="edit_empleado_numero">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--INFO CONTRATO-->
                            <div class="tab-pane fade show" id="edit_info_contrato_pers" role="tabpanel" aria-labelledby="edit_info_contrato_pers-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h6 class="text-c-blue">INFORMACIÓN Y DATOS DEL CONTRATO</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                            <label class="floating-label-activo-sm">Fecha Inicio</label>
                                            <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_inicio" id="edit_empleado_fecha_inicio">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                            <label class="floating-label-activo-sm">Fecha Termino</label>
                                            <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_termino" id="edit_empleado_fecha_termino">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6"style="text-align:right">
                                            <label  class="cr">Indefinido</label>
                                            <input type="hidden" id="edit_empleado_cont_indefinido" name="edit_empleado_cont_indefinido" value="0">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" onchange="contrato_indefinido('edit_empleado_check_contrato_indef', 'edit_empleado_cont_indefinido', 'edit_empleado_fecha_termino');" id="edit_empleado_check_contrato_indef" name="edit_empleado_check_contrato_indef" value="">
                                                <label for="edit_empleado_check_contrato_indef" class="cr"></label>
                                            </div>
                                        </div>


                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label class="floating-label-activo-sm">Monto Imponible</label>
                                            <input type="number" class="form-control form-control-sm" name="edit_empleado_monto_imponible" id="edit_empleado_monto_imponible">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                            <label  class="floating-label-activo-sm">Locomoción</label>
                                            <input type="hidden" id="edit_empleado_locomocion" name="edit_empleado_locomocion" value="0">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" onchange="activar_check('edit_empleado_check_locomocion', 'edit_empleado_locomocion', 'edit_empleado_locomocion_porcentaje');" id="edit_empleado_check_locomocion" name="edit_empleado_check_locomocion" value="">
                                                <label for="edit_empleado_check_locomocion" class="cr"></label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                            <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_locomocion_porcentaje" id="edit_empleado_locomocion_porcentaje" value="N/A">
                                        </div>


                                        <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                            <label class="floating-label-activo-sm">Colación</label>
                                            <input type="hidden" id="edit_empleado_colacion" name="edit_empleado_colacion" value="0">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" onchange="activar_check('edit_empleado_check_colacion', 'edit_empleado_colacion', 'edit_empleado_colacion_porcentaje');" id="edit_empleado_check_colacion" name="edit_empleado_check_colacion" value="">
                                                <label for="edit_empleado_check_colacion" class="cr"></label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                            <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_colacion_porcentaje" id="edit_empleado_colacion_porcentaje" value="N/A">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                            <label class="floating-label-activo-sm">Asignación Familar</label>
                                            <input type="hidden" id="edit_empleado_asignacion_familiar" name="edit_empleado_asignacion_familiar" value="0">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" onchange="activar_check('edit_empleado_check_asignacion_familiar', 'edit_empleado_asignacion_familiar', 'edit_empleado_asignacion_familiar_cantidad');" id="edit_empleado_check_asignacion_familiar" name="edit_empleado_check_asignacion_familiar" value="">
                                                <label for="edit_empleado_check_asignacion_familiar" class="cr"></label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                            <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_asignacion_familiar_cantidad" id="edit_empleado_asignacion_familiar_cantidad" value="N/A">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                            <label class="floating-label-activo-sm">Cajas de Compensación</label>
                                            <input type="hidden" id="edit_empleado_caja_compensacion" name="edit_empleado_caja_compensacion" value="0">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" onchange="activar_check('edit_empleado_check_caja_compensacion', 'edit_empleado_caja_compensacion', 'edit_empleado_caja_compensacion_porcentaje');" id="edit_empleado_check_caja_compensacion" name="edit_empleado_check_caja_compensacion" value="">
                                                <label for="edit_empleado_check_caja_compensacion" class="cr"></label>
                                            </div>

                                        </div>

                                        <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                            <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_caja_compensacion_porcentaje" id="edit_empleado_caja_compensacion_porcentaje" value="N/A">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--INFO CONTRATO-->
                            <div class="tab-pane fade show" id="edit_horario_contrato" role="tabpanel" aria-labelledby="edit_horario_contrato-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h6 class="text-c-blue">HORARIO DE TRABAJO</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label class="floating-label-activo-sm">Días de Trabajo</label>
                                            <select class="js-example-basic-multiple" name="edit_empleado_dias_laborales" id="edit_empleado_dias_laborales" multiple="multiple">
                                                <option value="1">Lunes</option>
                                                <option value="2">Martes</option>
                                                <option value="3">Miercoles</option>
                                                <option value="4">Jueves</option>
                                                <option value="5">Viernes</option>
                                                <option value="6">Sabado</option>
                                                <option value="7">Domingo</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Hora entrada</label>
                                            <input type="time" class="form-control form-control-sm" id="edit_empleado_hora_entrada" name="edit_empleado_hora_entrada" value="08:00">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Hora salida</label>
                                            <input type="time" class="form-control form-control-sm" id="edit_empleado_hora_salida" name="edit_empleado_hora_salida" value="19:00">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Hora Inicio Colación</label>
                                            <input type="time" class="form-control form-control-sm" id="edit_empleado_hora_entrada_colacion" name="edit_empleado_hora_entrada_colacion" value="12:00">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="floating-label-activo-sm">Hora término colación</label>
                                            <input type="time" class="form-control form-control-sm" id="edit_empleado_hora_salida_colacion" name="edit_empleado_hora_salida_colacion" value="13:00">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="modificar_registros();">Guardar </button>
                {{-- <button type="button" class="btn btn-primary">Ver formulario (PDF)</button> --}}
            </div>
        </div>
    </div>
</div>

<script>
    function editar_datos_asistente(id) {
        $('#editar_asistente_cm').modal('show');

        let url = "{{ route('adm_cm.asistente_buscar') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id: id,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data != null)
            {
                if(data.estado == 1)
                {


                    // data.direccion;

                    $('#edit_empleado_id_empleado').val(data.registro.id);
                    // data.registro.id_asistente_tipo;
                    // data.registro.rut;
                    // data.registro.nombres;
                    // data.registro.apellido_uno;
                    // data.registro.apellido_dos;
                    // data.registro.telefono_uno;
                    // data.registro.telefono_dos;
                    $('#edit_empleado_sexo').val(data.registro.sexo);
                    // data.registro.email;
                    // data.registro.bienvenido;
                    $('#edit_empleado_fecha_nacimiento').val(data.registro.fecha_nac);
                    // data.registro.id_premium;
                    // data.registro.id_tipo_asistente;
                    // data.registro.id_direccion;
                    // data.registro.id_usuario;
                    // data.registro.buscador;
                    // data.registro.id_modalidad;

                    // data.registro.direccion.id;
                    $('#edit_empleado_region').val(data.registro.direccion.ciudad.id_region);
                    $('#edit_empleado_direccion').val(data.registro.direccion.direccion);
                    $('#edit_empleado_numero').val(data.registro.direccion.numero_dir);
                    buscar_ciudad_editar_empleado(data.registro.direccion.id_ciudad);
                    // $('#edit_empleado_ciudad').val(data.registro.direccion.id_ciudad);
                    // data.registro.direccion.ciudad.id
                    // data.registro.direccion.ciudad.nombre

                    $('#edit_empleado_id_contrato').val(data.registro.contrato.id);
                    $('#edit_empleado_tipo_contrato').val(data.registro.contrato.tipo_empleado);
                    // data.registro.contrato.id_empleado;
                    $('#edit_empleado_rut').val(data.registro.contrato.rut);
                    $('#edit_empleado_nombre').val(data.registro.contrato.nombres);
                    $('#edit_empleado_apellido_uno').val(data.registro.contrato.apellido_uno);
                    $('#edit_empleado_apellido_dos').val(data.registro.contrato.apellido_dos);
                    $('#edit_empleado_telefono').val(data.registro.contrato.telefono);
                    $('#edit_empleado_email').val(data.registro.contrato.email);
                    // data.registro.contrato.id_institucion;
                    // data.registro.contrato.id_lugar_atencion;
                    // data.registro.contrato.tipo_contrato;

                    $('#edit_empleado_check_contrato_indef').val(data.registro.contrato.tipo_contrato);
                    if(data.registro.contrato.tipo_contrato == 1)
                        $('#edit_empleado_check_contrato_indef').prop('checked', true);
                    else
                        $('#edit_empleado_check_contrato_indef').prop('checked', false);
                    contrato_indefinido('edit_empleado_check_contrato_indef', 'edit_empleado_cont_indefinido', 'edit_empleado_fecha_termino');

                    $('#edit_empleado_fecha_inicio').val(data.registro.contrato.fecha_inicio);
                    $('#edit_empleado_fecha_termino').val(data.registro.contrato.fecha_termino);
                    $('#edit_empleado_monto_imponible').val(data.registro.contrato.monto_imponible);

                    if(data.registro.contrato.locomocion == 1)
                        $('#edit_empleado_check_locomocion').prop('checked', true);
                    else
                        $('#edit_empleado_check_locomocion').prop('checked', false);
                    activar_check('edit_empleado_check_locomocion', 'edit_empleado_locomocion', 'edit_empleado_locomocion_porcentaje');
                    $('#edit_empleado_locomocion_porcentaje').val(data.registro.contrato.locomocion_porcentaje);

                    if(data.registro.contrato.colacion == 1)
                        $('#edit_empleado_check_colacion').prop('checked', true);
                    else
                        $('#edit_empleado_check_colacion').prop('checked', false);
                    activar_check('edit_empleado_check_colacion', 'edit_empleado_colacion', 'edit_empleado_colacion_porcentaje');
                    $('#edit_empleado_colacion_porcentaje').val(data.registro.contrato.colacion_porcentaje);

                    if(data.registro.contrato.asignacion_familiar == 1)
                        $('#edit_empleado_check_asignacion_familiar').prop('checked', true);
                    else
                        $('#edit_empleado_check_asignacion_familiar').prop('checked', false);
                    activar_check('edit_empleado_check_asignacion_familiar', 'edit_empleado_asignacion_familiar', 'edit_empleado_asignacion_familiar_cantidad');
                    $('#edit_empleado_asignacion_familiar_cantidad').val(data.registro.contrato.asignacion_familiar_cantidad);

                    if(data.registro.contrato.caja_compensacion == 1)
                        $('#edit_empleado_check_caja_compensacion').prop('checked', true);
                    else
                        $('#edit_empleado_check_caja_compensacion').prop('checked', false);
                    activar_check('edit_empleado_check_caja_compensacion', 'edit_empleado_caja_compensacion', 'edit_empleado_caja_compensacion_porcentaje');
                    $('#edit_empleado_caja_compensacion_porcentaje').val(data.registro.contrato.caja_compensacion_porcentaje);

                    // data.registro.contrato.otro;
                    $('#edit_empleado_dias_laborales').val(data.registro.contrato.dias_laborales.split(",")).select2();
                    $('#edit_empleado_hora_entrada').val(data.registro.contrato.hora_ingreso);
                    $('#edit_empleado_hora_salida').val(data.registro.contrato.hora_salida);
                    $('#edit_empleado_hora_entrada_colacion').val(data.registro.contrato.hora_inicio_colacion);
                    $('#edit_empleado_hora_salida_colacion').val(data.registro.contrato.hora_termino_colacion);
                    // data.registro.contrato.fecha_creacion;
                    // data.registro.contrato.id_admin_creador;
                    // data.registro.contrato.id_tipo_admin_creador;
                    // data.registro.contrato.texto_contrato;
                    // data.registro.contrato.pdf_base;
                    // data.registro.contrato.estado_firmado;
                    // data.registro.contrato.pdf_firmado;
                    // data.registro.contrato.estado_inspeccion_trabajo;
                    // data.registro.contrato.otro_2;
                    // data.registro.contrato.estado;
                }
                else
                {

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
    }

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

    function modificar_registros()
    {
        var valido = 1;
        var mensaje = '';

        let id_institucion = $('#edit_empleado_id_institucion').val();
        let id_lugar_atencion = $('#edit_empleado_id_lugar_atencion').val();
        let id_admin_creador = $('#edit_empleado_id_admin_creador').val();
        let id_tipo_admin_creador = $('#edit_empleado_id_tipo_admin_creador').val();
        let id_empleado = $('#edit_empleado_id_empleado').val();
        let id_contrato = $('#edit_empleado_id_contrato').val();
        let tipo_contrato = $('#edit_empleado_tipo_contrato').val();
        let rut = $('#edit_empleado_rut').val();
        let nombre = $('#edit_empleado_nombre').val();
        let apellido_uno = $('#edit_empleado_apellido_uno').val();
        let apellido_dos = $('#edit_empleado_apellido_dos').val();
        let sexo = $('#edit_empleado_sexo').val();
        let fecha_nacimiento = $('#edit_empleado_fecha_nacimiento').val();
        let email = $('#edit_empleado_email').val();
        let telefono = $('#edit_empleado_telefono').val();
        let region = $('#edit_empleado_region').val();
        let ciudad = $('#edit_empleado_ciudad').val();
        let direccion = $('#edit_empleado_direccion').val();
        let numero = $('#edit_empleado_numero').val();
        let fecha_inicio = $('#edit_empleado_fecha_inicio').val();
        let fecha_termino = $('#edit_empleado_fecha_termino').val();

        let cont_indefinido = $('#edit_empleado_cont_indefinido').val();
        // let check_contrato_indef = $('#edit_empleado_check_contrato_indef').val();

        let monto_imponible = $('#edit_empleado_monto_imponible').val();

        let locomocion = $('#edit_empleado_locomocion').val();
        // let check_locomocion = $('#edit_empleado_check_locomocion').val();
        let locomocion_porcentaje = $('#edit_empleado_locomocion_porcentaje').val();

        let colacion = $('#edit_empleado_colacion').val();
        // let check_colacion = $('#edit_empleado_check_colacion').val();
        let colacion_porcentaje = $('#edit_empleado_colacion_porcentaje').val();

        let asignacion_familiar = $('#edit_empleado_asignacion_familiar').val();
        // let check_asignacion_familiar = $('#edit_empleado_check_asignacion_familiar').val();
        let asignacion_familiar_cantidad = $('#edit_empleado_asignacion_familiar_cantidad').val();

        let caja_compensacion = $('#edit_empleado_caja_compensacion').val();
        // let check_caja_compensacion = $('#edit_empleado_check_caja_compensacion').val();
        let caja_compensacion_porcentaje = $('#edit_empleado_caja_compensacion_porcentaje').val();


        let dias_laborales = $('#edit_empleado_dias_laborales').val();
        let hora_entrada = $('#edit_empleado_hora_entrada').val();
        let hora_salida = $('#edit_empleado_hora_salida').val();
        let hora_entrada_colacion = $('#edit_empleado_hora_entrada_colacion').val();
        let hora_salida_colacion = $('#edit_empleado_hora_salida_colacion').val();

        let clave_ingreso = $('#add_empleado_clave_ingreso').val();
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
        if(id_empleado == '')
        {
            valido = 0;
            mensaje += 'Campo requerido ID Empleado\n';
        }
        if(id_contrato == '')
        {
            valido = 0;
            mensaje += 'Campo requerido ID Contrato\n';
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
            let url = "{{ route('adm_cm.editar_personal') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_institucion: id_institucion,
                    id_lugar_atencion: id_lugar_atencion,
                    id_admin_creador: id_admin_creador,

                    id_tipo_admin_creador: id_tipo_admin_creador,

                    id_contrato: id_contrato,
                    id_empleado: id_empleado,

                    tipo_empleado: tipo_contrato,

                    rut: rut,
                    nombre: nombre,
                    apellido_uno: apellido_uno,
                    apellido_dos: apellido_dos,
                    fecha_nac: fecha_nacimiento,
                    sexo: sexo,
                    email: email,
                    telefono: telefono,
                    region: region,
                    ciudad: ciudad,
                    direccion: direccion,
                    numero: numero,

                    fecha_inicio: fecha_inicio,
                    fecha_termino: fecha_termino,

                    tipo_contrato: cont_indefinido,

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
                        $('#editar_asistente_cm').modal('hide');

                        swal({
                            title: "Edicion de Personal",
                            text: 'Edicion Exitoso.',
                            icon: "success",
                            buttons: "Aceptar",
                        });
                        limpiar_formulario();
                        $('#contenedor_asistentes_personal').empty();
                        $('#contenedor_asistentes_personal').append(data.view);
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
                            title: "Edicion de Personal",
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

    {{-- BUSCAR CIUDAD DE REGISTRAR --}}
    function buscar_ciudad_editar_empleado(id_ciudad=0)
    {
        let region = $('#edit_empleado_region').val();
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

                let ciudades = $('#edit_empleado_ciudad');

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

</script>
