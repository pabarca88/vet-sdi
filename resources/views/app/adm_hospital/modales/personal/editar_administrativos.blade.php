{{--  MODAL AGREGAR RESUMEN CONTRATO, ROLES, ACCESO --}}
<div id="modal_editar_personal_administrativo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_editar_personal_administrativo" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Editar Empleado Nuevo Administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                        <input type="hidden" name="edit_id_institucion_administrativo" id="edit_id_institucion_administrativo" value="{{ $institucion->id }}">
                        <input type="hidden" name="edit_id_lugar_atencion_administrativo" id="edit_id_lugar_atencion_administrativo" value="{{ $institucion->id_lugar_atencion }}">
                        <input type="hidden" name="edit_id_admin_creador_administrativo" id="edit_id_admin_creador_administrativo" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="edit_id_tipo_admin_creador_administrativo" id="edit_id_tipo_admin_creador_administrativo" value="{{ Auth::user()->Roles()->first()->id }}">
                        <input type="hidden" name="edit_clave_ingreso_administrativo" id="edit_clave_ingreso_administrativo" value="{{ rand(11111,99999) }}">
                        <input type="hidden" name="edit_id_administrativo" id="edit_id_administrativo" value="">
                        <input type="hidden" name="edit_id_contrato_administrativo" id="edit_id_contrato_administrativo" value="">
                     <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <script>
                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                            var f=new Date();
                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                            </script>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="edit_info-tipo_contrato_administrativo-tab" data-toggle="tab" href="#edit_info-tipo_contrato_administrativo" role="tab" aria-controls="edit_info-tipo_contrato_administrativo" aria-selected="true">Tipo Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_info_personal_cont_administrativo-tab" data-toggle="tab" href="#edit_info_personal_cont_administrativo" role="tab" aria-controls="edit_info_personal_cont_administrativo" aria-selected="false">Información Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_info_contrato_pers_administrativo-tab" data-toggle="tab" href="#edit_info_contrato_pers_administrativo" role="tab" aria-controls="edit_info_contrato_pers_administrativo" aria-selected="false">Información de Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_leyes_sociales_administrativo-tab" data-toggle="tab" href="#edit_leyes_sociales_administrativo" role="tab" aria-controls="edit_leyes_sociales_administrativo" aria-selected="false">Leyes Sociales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_horario_contrato_administrativo-tab" data-toggle="tab" href="#edit_horario_contrato_administrativo" role="tab" aria-controls="edit_horario_contrato_administrativo" aria-selected="false">Horario</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="info-ingreso">
                                <!---->
                                <div class="tab-pane fade show active" id="edit_info-tipo_contrato_administrativo" role="tabpanel" aria-labelledby="edit_info-tipo_contrato-tab">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                        <select class="form-control form-control-sm" name="edit_tipo_contrato_administrativo" id="edit_tipo_contrato_administrativo">
                                            <option value="">Seleccione</option>
                                            @if ($lista_tipo_administrativo)
                                                @foreach ($lista_tipo_administrativo as $item)
                                                    <option value="{{ $item['nombres'] }}" data-id="{{ $item['nombres'] }}">{{ $item['nombres'] }}</option>
                                                @endforeach
                                            @endif
                                            {{--  asistente tipo  --}}
                                            {{--  tipo institucion  --}}
                                            {{--  tipo administrador  --}}
                                        </select>
                                    </div>
                                </div>
                                    <!--INFO PERSONAL-->
                                <div class="tab-pane fade show" id="edit_info_personal_cont_administrativo" role="tabpanel" aria-labelledby="edit_info_personal_cont-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">INFORMACIÓN Y DATOS DE CONTACTO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">RUT:</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_rut_administrativo" id="edit_rut_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Nombres</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_nombre_administrativo" id="edit_nombre_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Apellido Paterno</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_apellido_uno_administrativo" id="edit_apellido_uno_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Apellido Materno</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_apellido_dos_administrativo" id="edit_apellido_dos_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Sexo</label>
                                                <select class="form-control form-control-sm" name="edit_sexo_administrativo" id="edit_sexo_administrativo">
                                                    <option value="">Seleccione</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="M">Masculino</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_fecha_nacimiento_administrativo" id="edit_fecha_nacimiento_administrativo">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Email:</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_email_administrativo" id="edit_email_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Teléfono</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_telefono_administrativo" id="edit_telefono_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Región</label>
                                                <select class="form-control form-control-sm" name="edit_region_administrativo" id="edit_region_administrativo" onchange="buscar_ciudad_nuevo_empleado_administrativo();">
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
                                                <select class="form-control form-control-sm" name="edit_ciudad_administrativo" id="edit_ciudad_administrativo">
                                                    <option value="">Seleccione</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Dirección</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_direccion_administrativo" id="edit_direccion_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Número</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_numero_administrativo" id="edit_numero_administrativo">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--INFO CONTRATO-->
                                <div class="tab-pane fade show" id="edit_info_contrato_pers_administrativo" role="tabpanel" aria-labelledby="edit_info_contrato_pers-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">INFORMACIÓN Y DATOS DEL CONTRATO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Fecha Inicio</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_fecha_inicio_administrativo" id="edit_fecha_inicio_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Fecha Termino</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_fecha_termino_administrativo" id="edit_fecha_termino_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6"style="text-align:right">
                                                <label  class="cr">Indefinido</label>
                                                <input type="hidden" id="add_cont_indefinido_administrativo" name="add_cont_indefinido_administrativo" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_check_contrato_indef_administrativo', 'add_cont_indefinido_administrativo_administrativo', ' ');" id="edit_check_contrato_indef_administrativo" name="edit_check_contrato_indef_administrativo" value="">
                                                    <label for="edit_check_contrato_indef_administrativo" class="cr"></label>
                                                </div>
                                            </div>


                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Monto Imponible</label>
                                                <input type="number" class="form-control form-control-sm" name="edit_monto_imponible_administrativo" id="edit_monto_imponible_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label  class="floating-label-activo-sm">Locomoción</label>
                                                <input type="hidden" id="edit_locomocion_administrativo" name="edit_locomocion_administrativo" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_check_locomocion_administrativo', 'edit_locomocion_administrativo', 'edit_locomocion_porcentaje_administrativo');" id="edit_check_locomocion_administrativo" name="edit_check_locomocion_administrativo" value="">
                                                    <label for="edit_check_locomocion_administrativo" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_locomocion_porcentaje_administrativo" id="edit_locomocion_porcentaje_administrativo" value="N/A">
                                            </div>


                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Colación</label>
                                                 <input type="hidden" id="edit_colacion_administrativo" name="edit_colacion_administrativo" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_check_colacion_administrativo', 'edit_colacion_administrativo', 'edit_colacion_porcentaje_administrativo');" id="edit_check_colacion_administrativo" name="edit_check_colacion_administrativo" value="">
                                                    <label for="edit_check_colacion_administrativo" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_colacion_porcentaje_administrativo" id="edit_colacion_porcentaje_administrativo" value="N/A">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Asignación Familar</label>
                                                <input type="hidden" id="edit_asignacion_familiar_administrativo" name="edit_asignacion_familiar_administrativo" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_check_asignacion_familiar_administrativo', 'edit_asignacion_familiar_administrativo', 'edit_asignacion_familiar_cantidad_administrativo');" id="edit_check_asignacion_familiar_administrativo" name="edit_check_asignacion_familiar_administrativo" value="">
                                                    <label for="edit_check_asignacion_familiar_administrativo" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_asignacion_familiar_cantidad_administrativo" id="edit_asignacion_familiar_cantidad_administrativo" value="N/A">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Cajas de Compensación</label>
                                                <input type="hidden" id="edit_caja_compensacion_administrativo" name="edit_caja_compensacion_administrativo" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_check_caja_compensacion_administrativo', 'edit_caja_compensacion_administrativo', 'edit_caja_compensacion_porcentaje_administrativo');" id="edit_check_caja_compensacion_administrativo" name="edit_check_caja_compensacion_administrativo" value="">
                                                    <label for="edit_check_caja_compensacion_administrativo" class="cr"></label>
                                                </div>

                                            </div>

                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_caja_compensacion_porcentaje_administrativo" id="edit_caja_compensacion_porcentaje_administrativo" value="N/A">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--INFO CONTRATO-->
                                <div class="tab-pane fade show" id="edit_horario_contrato_administrativo" role="tabpanel" aria-labelledby="edit_horario_contrato-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">HORARIO DE TRABAJO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Días de Trabajo</label>
                                                <select class="js-example-basic-multiple" name="edit_dias_laborales_administrativo" id="edit_dias_laborales_administrativo" multiple="multiple">
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
                                                <input type="time" class="form-control form-control-sm" id="edit_hora_entrada_administrativo" name="edit_hora_entrada_administrativo" value="08:00">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora salida</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_hora_salida_administrativo" name="edit_hora_salida_administrativo" value="19:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora Inicio Colación</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_hora_entrada_colacion_administrativo" name="edit_hora_entrada_colacion_administrativo" value="12:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora término colación</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_hora_salida_colacion_administrativo" name="edit_hora_salida_colacion_administrativo" value="13:00">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- LEYES SOCIALES -->
                                <div class="tab-pane fade show" id="edit_leyes_sociales_administrativo" role="tabpanel" aria-labelledby="edit_leyes_sociales-tab">
                                    <div class="form-group form-row">
                                        <div class="col-md-3">
                                            <label class="floating-label-activo-sm" for="afp">Seguros</label>
                                            <select name="afp_administrativo" id="afp_administrativo" class="form-control form-control-sm">
                                                <option value="0">Seleccione</option>
                                                <option value="1">AFP Capital</option>
                                                <option value="2">AFP Cuprum</option>
                                                <option value="3">AFP Habitat</option>
                                                <option value="4">AFP Modelo</option>
                                                <option value="5">AFP Planvital</option>
                                                <option value="6">AFP Provida</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="floating-label-activo-sm" for="salud">Seguros</label>
                                            <select name="salud_administrativo" id="salud_administrativo" class="form-control form-control-sm">
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm" for="seguros">Seguros</label>
                                                <input type="text" name="seguros_administrativo" id="seguros_administrativo" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm" for="cantidad">Cantidad</label>
                                                <input type="number" name="cantidad_administrativo" id="cantidad_administrativo" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm mx-auto" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning btn-sm mx-auto" onclick="editar_nuevo_empleado_administrativo();">Editar</button>
                {{--  <button type="button" class="btn btn-primary">Ver formulario (PDF)</button>  --}}
                </form>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        {{--  FORMATEO DE RUT AGREGAR NUEVO PROFESIONAL   --}}
        $("#edit_rut").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });
    });


    {{-- BUSCAR CIUDAD DE REGISTRAR --}}
    function buscar_ciudad_nuevo_empleado_administrativo(id_ciudad=0)
    {
        let region = $('#edit_region_administrativo').val();
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

                let ciudades = $('#edit_ciudad_administrativo');

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

    function buscar_ciudad_editar_admin(id_ciudad = 0) {
        return new Promise((resolve, reject) => {
            let region = $('#edit_region_administrativo').val();
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

                    let ciudades = $('#edit_ciudad_administrativo');

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
            else if($(element).attr('id') == 'edit_hora_entrada')
                $(element).val('08:00');
            else if($(element).attr('id') == 'edit_hora_salida')
                $(element).val('19:00');
            else if($(element).attr('id') == 'edit_hora_entrada_colacion')
                $(element).val('12:00');
            else if($(element).attr('id') == 'edit_hora_salida_colacion')
                $(element).val('13:00');
            else if($(element).attr('id') == 'edit_hora_salida_colacion')
                $(element).val('13:00');
            else if($(element).attr('id') == 'edit_id_institucion')
                $(element).val();
            else if($(element).attr('id') == 'edit_id_lugar_atencion')
                $(element).val();
            else if($(element).attr('id') == 'edit_id_admin_creador')
                $(element).val();
            else if($(element).attr('id') == 'edit_id_tipo_admin_creador')
                $(element).val();
            else
                $(element).val('');
        });
    }



</script>
