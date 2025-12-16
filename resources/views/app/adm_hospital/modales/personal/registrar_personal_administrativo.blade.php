{{--  MODAL AGREGAR RESUMEN CONTRATO, ROLES, ACCESO --}}
<div id="modal_agregar_personal_administrativo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_agregar_personal_administrativo" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Agregar Empleado Nuevo Administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                        <input type="hidden" name="add_empleado_id_institucion_administrativo" id="add_empleado_id_institucion_administrativo" value="{{ $institucion->id }}">
                        <input type="hidden" name="add_empleado_id_lugar_atencion_administrativo" id="add_empleado_id_lugar_atencion_administrativo" value="{{ $institucion->id_lugar_atencion }}">
                        <input type="hidden" name="add_empleado_id_admin_creador_administrativo" id="add_empleado_id_admin_creador_administrativo" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="add_empleado_id_tipo_admin_creador_administrativo" id="add_empleado_id_tipo_admin_creador_administrativo" value="{{ Auth::user()->Roles()->first()->id }}">
                        <input type="hidden" name="add_empleado_clave_ingreso_administrativo" id="add_empleado_clave_ingreso_administrativo" value="{{ rand(11111,99999) }}">
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
                                    <a class="nav-link-aten text-reset active" id="info-tipo_contrato_administrativo-tab" data-toggle="tab" href="#info-tipo_contrato_administrativo" role="tab" aria-controls="info-tipo_contrato_administrativo" aria-selected="true">Tipo Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="info_personal_cont_administrativo-tab" data-toggle="tab" href="#info_personal_cont_administrativo" role="tab" aria-controls="info_personal_cont_administrativo" aria-selected="false">Información Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="info_contrato_pers_administrativo-tab" data-toggle="tab" href="#info_contrato_pers_administrativo" role="tab" aria-controls="info_contrato_pers_administrativo" aria-selected="false">Información de Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="leyes_sociales_administrativo-tab" data-toggle="tab" href="#leyes_sociales_administrativo" role="tab" aria-controls="leyes_sociales_administrativo" aria-selected="false">Leyes Sociales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="horario_contrato_administrativo-tab" data-toggle="tab" href="#horario_contrato_administrativo" role="tab" aria-controls="horario_contrato_administrativo" aria-selected="false">Horario</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="info-ingreso">
                                <!---->
                                <div class="tab-pane fade show active" id="info-tipo_contrato_administrativo" role="tabpanel" aria-labelledby="info-tipo_contrato-tab">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                        <select class="form-control form-control-sm" name="_administrativo" id="add_empleado_tipo_contrato_administrativo">
                                            <option value="">Seleccione</option>
                                            @if ($lista_tipo_administrativo)
                                                @foreach ($lista_tipo_administrativo as $item)
                                                    <option value="{{ $item['nombres'] }}" data-id="{{ $item['id'] }}">{{ $item['nombres'] }}</option>
                                                @endforeach
                                            @endif
                                            {{--  asistente tipo  --}}
                                            {{--  tipo institucion  --}}
                                            {{--  tipo administrador  --}}
                                        </select>
                                    </div>
                                </div>
                                    <!--INFO PERSONAL-->
                                <div class="tab-pane fade show" id="info_personal_cont_administrativo" role="tabpanel" aria-labelledby="info_personal_cont-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">INFORMACIÓN Y DATOS DE CONTACTO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">RUT:</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_rut_administrativo" id="add_empleado_rut_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Nombres</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_nombre_administrativo" id="add_empleado_nombre_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Apellido Paterno</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_apellido_uno_administrativo" id="add_empleado_apellido_uno_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Apellido Materno</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_apellido_dos_administrativo" id="add_empleado_apellido_dos_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Sexo</label>
                                                <select class="form-control form-control-sm" name="add_empleado_sexo_administrativo" id="add_empleado_sexo_administrativo">
                                                    <option value="">Seleccione</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="M">Masculino</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                                <input type="date" class="form-control form-control-sm" name="add_empleado_fecha_nacimiento_administrativo" id="add_empleado_fecha_nacimiento_administrativo">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Email:</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_email_administrativo" id="add_empleado_email_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Teléfono</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_telefono_administrativo" id="add_empleado_telefono_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Región</label>
                                                <select class="form-control form-control-sm" name="add_empleado_region_administrativo" id="add_empleado_region_administrativo" onchange="buscar_ciudad_nuevo_empleado_administrativo_();">
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
                                                <select class="form-control form-control-sm" name="add_empleado_ciudad_administrativo" id="add_empleado_ciudad_administrativo">
                                                    <option value="">Seleccione</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Dirección</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_direccion_administrativo" id="add_empleado_direccion_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Número</label>
                                                <input type="text" class="form-control form-control-sm" name="add_empleado_numero_administrativo" id="add_empleado_numero_administrativo">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--INFO CONTRATO-->
                                <div class="tab-pane fade show" id="info_contrato_pers_administrativo" role="tabpanel" aria-labelledby="info_contrato_pers-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">INFORMACIÓN Y DATOS DEL CONTRATO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Fecha Inicio</label>
                                                <input type="date" class="form-control form-control-sm" name="add_empleado_fecha_inicio_administrativo" id="add_empleado_fecha_inicio_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Fecha Termino</label>
                                                <input type="date" class="form-control form-control-sm" name="add_empleado_fecha_termino_administrativo" id="add_empleado_fecha_termino_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6"style="text-align:right">
                                                <label  class="cr">Indefinido</label>
                                                <input type="hidden" id="add_cont_indefinido_administrativo" name="add_cont_indefinido_administrativo" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('add_empleado_check_contrato_indef_administrativo', 'add_cont_indefinido_administrativo_administrativo', ' ');" id="add_empleado_check_contrato_indef_administrativo" name="add_empleado_check_contrato_indef_administrativo" value="">
                                                    <label for="add_empleado_check_contrato_indef_administrativo" class="cr"></label>
                                                </div>
                                            </div>


                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Monto Imponible</label>
                                                <input type="number" class="form-control form-control-sm" name="add_empleado_monto_imponible_administrativo" id="add_empleado_monto_imponible_administrativo">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label  class="floating-label-activo-sm">Locomoción</label>
                                                <input type="hidden" id="add_empleado_locomocion_administrativo" name="add_empleado_locomocion_administrativo" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('add_empleado_check_locomocion_administrativo', 'add_empleado_locomocion_administrativo', 'add_empleado_locomocion_porcentaje_administrativo');" id="add_empleado_check_locomocion_administrativo" name="add_empleado_check_locomocion_administrativo" value="">
                                                    <label for="add_empleado_check_locomocion_administrativo" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_locomocion_porcentaje_administrativo" id="add_empleado_locomocion_porcentaje_administrativo" value="N/A">
                                            </div>


                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Colación</label>
                                                 <input type="hidden" id="add_empleado_colacion_administrativo" name="add_empleado_colacion_administrativo" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('add_empleado_check_colacion_administrativo', 'add_empleado_colacion_administrativo', 'add_empleado_colacion_porcentaje_administrativo');" id="add_empleado_check_colacion_administrativo" name="add_empleado_check_colacion_administrativo" value="">
                                                    <label for="add_empleado_check_colacion_administrativo" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_colacion_porcentaje_administrativo" id="add_empleado_colacion_porcentaje_administrativo" value="N/A">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Asignación Familar</label>
                                                <input type="hidden" id="add_empleado_asignacion_familiar_administrativo" name="add_empleado_asignacion_familiar_administrativo" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('add_empleado_check_asignacion_familiar_administrativo', 'add_empleado_asignacion_familiar_administrativo', 'add_empleado_asignacion_familiar_cantidad_administrativo');" id="add_empleado_check_asignacion_familiar_administrativo" name="add_empleado_check_asignacion_familiar_administrativo" value="">
                                                    <label for="add_empleado_check_asignacion_familiar_administrativo" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_asignacion_familiar_cantidad_administrativo" id="add_empleado_asignacion_familiar_cantidad_administrativo" value="N/A">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Cajas de Compensación</label>
                                                <input type="hidden" id="add_empleado_caja_compensacion_administrativo" name="add_empleado_caja_compensacion_administrativo" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('add_empleado_check_caja_compensacion_administrativo', 'add_empleado_caja_compensacion_administrativo', 'add_empleado_caja_compensacion_porcentaje_administrativo');" id="add_empleado_check_caja_compensacion_administrativo" name="add_empleado_check_caja_compensacion_administrativo" value="">
                                                    <label for="add_empleado_check_caja_compensacion_administrativo" class="cr"></label>
                                                </div>

                                            </div>

                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="add_empleado_caja_compensacion_porcentaje_administrativo" id="add_empleado_caja_compensacion_porcentaje_administrativo" value="N/A">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--INFO CONTRATO-->
                                <div class="tab-pane fade show" id="horario_contrato_administrativo" role="tabpanel" aria-labelledby="horario_contrato-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">HORARIO DE TRABAJO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Días de Trabajo</label>
                                                <select class="js-example-basic-multiple" name="add_empleado_dias_laborales_administrativo" id="add_empleado_dias_laborales_administrativo" multiple="multiple">
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
                                                <input type="time" class="form-control form-control-sm" id="add_empleado_hora_entrada_administrativo" name="add_empleado_hora_entrada_administrativo" value="08:00">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora salida</label>
                                                <input type="time" class="form-control form-control-sm" id="add_empleado_hora_salida_administrativo" name="add_empleado_hora_salida_administrativo" value="19:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora Inicio Colación</label>
                                                <input type="time" class="form-control form-control-sm" id="add_empleado_hora_entrada_colacion_administrativo" name="add_empleado_hora_entrada_colacion_administrativo" value="12:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora término colación</label>
                                                <input type="time" class="form-control form-control-sm" id="add_empleado_hora_salida_colacion_administrativo" name="add_empleado_hora_salida_colacion_administrativo" value="13:00">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- LEYES SOCIALES -->
                                <div class="tab-pane fade show" id="leyes_sociales_administrativo" role="tabpanel" aria-labelledby="leyes_sociales-tab">
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
                <button type="button" class="btn btn-info btn-sm mx-auto" onclick="registrar_nuevo_empleado_administrativo();">Añadir al Equipo</button>
                {{--  <button type="button" class="btn btn-primary">Ver formulario (PDF)</button>  --}}
                </form>
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
    });


    {{-- BUSCAR CIUDAD DE REGISTRAR --}}
    function buscar_ciudad_nuevo_empleado_administrativo_(id_ciudad=0)
    {
        let region = $('#add_empleado_region_administrativo').val();
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

                let ciudades = $('#add_empleado_ciudad_administrativo');

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


    function registrar_nuevo_empleado_administrativo()
    {
        var valido = 1;
        var mensaje = '';
        let id_institucion = $('#add_empleado_id_institucion_administrativo').val();
        let id_lugar_atencion = $('#add_empleado_id_lugar_atencion_administrativo').val();
        let id_admin_creador = $('#add_empleado_id_admin_creador_administrativo').val();
        let id_tipo_admin_creador = $('#add_empleado_id_tipo_admin_creador_administrativo').val();
        let tipo_contrato = $('#add_empleado_tipo_contrato_administrativo').val();

        let rut = $('#add_empleado_rut_administrativo').val();
        let nombre = $('#add_empleado_nombre_administrativo').val();
        let apellido_uno = $('#add_empleado_apellido_uno_administrativo').val();
        let apellido_dos = $('#add_empleado_apellido_dos_administrativo').val();
        let sexo = $('#add_empleado_sexo_administrativo').val();
        let fecha_nacimiento = $('#add_empleado_fecha_nacimiento_administrativo').val();
        let email = $('#add_empleado_email_administrativo').val();

        let fecha_inicio = $('#add_empleado_fecha_inicio_administrativo').val();
        let fecha_termino = $('#add_empleado_fecha_termino_administrativo').val();
        let monto_imponible = $('#add_empleado_monto_imponible_administrativo').val();

        let locomocion = ( $('#add_empleado_locomocion_administrativo').val() == ''?'0':$('#add_empleado_locomocion_administrativo').val() );
        var locomocion_porcentaje = '';
        if(locomocion == 1)
            locomocion_porcentaje = $('#add_empleado_locomocion_porcentaje_administrativo').val();
        else
            locomocion_porcentaje = '0';

        let colacion = ( $('#add_empleado_colacion_administrativo').val() == ''?'0':$('#add_empleado_colacion_administrativo').val() );
        var colacion_porcentaje = '';
        if(colacion == 1)
            colacion_porcentaje = $('#add_empleado_colacion_porcentaje_administrativo').val();
        else
            colacion_porcentaje = '0';

        let asignacion_familiar = ( $('#add_empleado_asignacion_familiar_administrativo').val() == ''?'0':$('#add_empleado_asignacion_familiar_administrativo').val() );
        var asignacion_familiar_cantidad = '';
        if(asignacion_familiar == 1)
            asignacion_familiar_cantidad = $('#add_empleado_asignacion_familiar_cantidad_administrativo').val();
        else
            asignacion_familiar_cantidad = '0';

        let caja_compensacion = ( $('#add_empleado_caja_compensacion_administrativo').val() == ''?'0':$('#add_empleado_caja_compensacion_administrativo').val() );
        var caja_compensacion_porcentaje = '';
        if(caja_compensacion == 1)
            caja_compensacion_porcentaje = $('#add_empleado_caja_compensacion_porcentaje_administrativo').val();
        else
            caja_compensacion_porcentaje = '0';


        let telefono = $('#add_empleado_telefono_administrativo').val();
        let region = $('#add_empleado_region_administrativo').val();
        let ciudad = $('#add_empleado_ciudad_administrativo').val();
        let direccion = $('#add_empleado_direccion_administrativo').val();
        let numero = $('#add_empleado_numero_administrativo').val();
        let dias_laborales = $('#add_empleado_dias_laborales_administrativo').val();
        let hora_entrada = $('#add_empleado_hora_entrada_administrativo').val();
        let hora_salida = $('#add_empleado_hora_salida_administrativo').val();
        let hora_entrada_colacion = $('#add_empleado_hora_entrada_colacion_administrativo').val();
        let hora_salida_colacion = $('#add_empleado_hora_salida_colacion_administrativo').val();
        let clave_ingreso = $('#add_empleado_clave_ingreso_administrativo').val();
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
                        });
                        // reload
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
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
            else if($(element).attr('id') == 'add_empleado_hora_entrada')
                $(element).val('08:00');
            else if($(element).attr('id') == 'add_empleado_hora_salida')
                $(element).val('19:00');
            else if($(element).attr('id') == 'add_empleado_hora_entrada_colacion')
                $(element).val('12:00');
            else if($(element).attr('id') == 'add_empleado_hora_salida_colacion')
                $(element).val('13:00');
            else if($(element).attr('id') == 'add_empleado_hora_salida_colacion')
                $(element).val('13:00');
            else if($(element).attr('id') == 'add_empleado_id_institucion')
                $(element).val();
            else if($(element).attr('id') == 'add_empleado_id_lugar_atencion')
                $(element).val();
            else if($(element).attr('id') == 'add_empleado_id_admin_creador')
                $(element).val();
            else if($(element).attr('id') == 'add_empleado_id_tipo_admin_creador')
                $(element).val();
            else
                $(element).val('');
        });
    }

</script>
