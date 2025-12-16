<div id="registrar_contratoprofesional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_contratoprofesional" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Contrato profesional funcionario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_institucion" id="id_institucion" value="{{ $institucion->id }}">
                <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $institucion->id_lugar_atencion }}">
                <input type="hidden" name="id_admin_creador" id="id_admin_creador" value="{{ Auth::user()->id }}">
                <input type="hidden" name="id_tipo_admin_creador" id="id_tipo_admin_creador" value="{{ Auth::user()->Roles()->first()->id }}">
                <input type="hidden" name="id_profesional_edit" id="id_profesional_edit" value="">
                <input type="hidden" name="id_contrato_edit" id="id_contrato_edit" value="">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="info-profesion-tab" data-toggle="tab" href="#info-profesion" role="tab" aria-controls="info-profesion" aria-selected="true">Profesión</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="info-tipo_contrato-tab" data-toggle="tab" href="#info-tipo_contrato" role="tab" aria-controls="info-tipo_contrato" aria-selected="true">Tipo Contrato</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="info_personal_cont-tab" data-toggle="tab" href="#info_personal_cont" role="tab" aria-controls="info_personal_cont" aria-selected="false">Información Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="info_contrato_pers-tab" data-toggle="tab" href="#info_contrato_pers" role="tab" aria-controls="info_contrato_pers" aria-selected="false">Información Bancaria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="leyes_sociales-tab" data-toggle="tab" href="#leyes_sociales" role="tab" aria-controls="leyes_sociales" aria-selected="false">Leyes Sociales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="horario_contrato-tab" data-toggle="tab" href="#horario_contrato" role="tab" aria-controls="horario_contrato" aria-selected="false">Horario</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="info-profesion" role="tabpanel" aria-labelledby="info-profesion-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Profesi&oacute;n</label>
                                            <select name="profesion_nuevo_profesional" id="profesion_nuevo_profesional" class="form-control" onchange="dame_tipo_especialidad()">
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
                                            <select name="especialidad_nuevo_profesional" id="especialidad_nuevo_profesional" class="form-control" onchange="dame_subtipo_especialidad()">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Sub-especialidad</label>
                                            <select name="sub_especialidad_nuevo_profesional" id="sub_especialidad_nuevo_profesional" class="form-control">
                                                <option value="0">Seleccione opci&oacute;n</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="info-tipo_contrato" role="tabpanel" aria-labelledby="info-tipo_contrato-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tipo de contrato</label>
                                            <select class="form-control" name="tipo_contrato" id="tipo_contrato">
                                                <option value="0">Seleccione opci&oacute;n</option>
                                                <option value="1">Fijo</option>
                                                <option value="2">Porcentaje de atención</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="info_personal_cont" role="tabpanel" aria-labelledby="info_personal_cont-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Rut</label>
                                            <input type="text" class="form-control form-control-sm" oninput="formatoRut(this)" name="rut_nuevo_profesional" id="rut_nuevo_profesional">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Fecha de Ingreso</label>
                                            <input type="date" class="form-control form-control-sm" name="f_ingreso_nuevo_profesional" id="f_ingreso_nuevo_profesional" value="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Nombre</label>
                                            <input class="form-control form-control-sm" name="nombre_nuevo_profesional" id="nombre_nuevo_profesional" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Primer Apellido</label>
                                            <input class="form-control form-control-sm" name="apellido1_nuevo_profesional" id="apellido1_nuevo_profesional" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Segundo Apellido</label>
                                            <input class="form-control form-control-sm" name="apellido2_nuevo_profesional" id="apellido2_nuevo_profesional" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group  col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Sexo</label>
                                        <select class="form-control form-control-sm" name="empleado_sexo" id="empleado_sexo">
                                            <option value="">Seleccione</option>
                                            <option value="F">Femenino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                    </div>
                                    <div class="form-group  col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_nacimiento" id="fecha_nacimiento">
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                            <input class="form-control form-control-sm" name="email_nuevo_profesional" id="email_nuevo_profesional" type="email" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                            <input class="form-control form-control-sm" name="telefono1_nuevo_profesional" id="telefono1_nuevo_profesional" type="number" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Tel&eacute;fono (opcional)</label>
                                            <input class="form-control form-control-sm" name="telefono2_nuevo_profesional" id="telefono2_nuevo_profesional" type="number" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Dirección</label>
                                            <input class="form-control form-control-sm" name="direccion_nuevo_profesional" id="direccion_nuevo_profesional" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Nº</label>
                                            <input class="form-control form-control-sm" name="n_dpto_nuevo_profesional" id="n_dpto_nuevo_profesional" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                            <select class="form-control form-control-sm" onchange="buscar_ciudad_profesional();" id="region_nuevo_profesional">
                                                <option>Seleccione opci&oacute;n</option>
                                                @foreach($regiones as $region)
                                                    <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Comuna</label>
                                            <select class="form-control form-control-sm" id="comuna_nuevo_profesional">

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="correo-cont" checked="">
                                                <label for="correo-cont" class="cr"></label>
                                            </div>
                                            <label>Notificar por correo electr&oacute;nico</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="info_contrato_pers" role="tabpanel" aria-labelledby="info_contrato_pers-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-modal">Datos Bancarios Para Dep&oacute;sito</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Banco</label>
                                            <select class="form-control form-control-sm" name="banco_nuevo_profesional" id="banco_nuevo_profesional">
                                                <option value="0">Seleccione opci&oacute;n</option>
                                                @foreach($bancos as $banco)
                                                    <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">N&deg; Cuenta</label>
                                            <input class="form-control form-control-sm" name="n_cta_nuevo_profesional" id="n_cta_nuevo_profesional" type="number" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Sucursal</label>
                                            <input class="form-control form-control-sm" name="sucursal_nuevo_profesional" id="sucursal_nuevo_profesional" type="text" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="leyes_sociales" role="tabpanel" aria-labelledby="leyes_sociales-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                    <h6 class="text-c-blue">Información y datos del contrato</h6>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                    <label class="floating-label-activo-sm">Fecha inicio</label>
                                                    <input type="date" class="form-control form-control-sm" name="empleado_fecha_inicio" id="empleado_fecha_inicio" value="{{ date('Y-m-d') }}">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                    <label class="floating-label-activo-sm">Fecha término</label>
                                                    <input type="date" class="form-control form-control-sm" name="empleado_fecha_termino" id="empleado_fecha_termino">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6"style="text-align:right">
                                                    <label  class="cr">Contrato Indefinido</label>
                                                    <input type="hidden" id="cont_indefinido" name="cont_indefinido" value="0">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="activar_check('empleado_check_contrato_indef', 'cont_indefinido', ' ');" id="empleado_check_contrato_indef" name="empleado_check_contrato_indef" value="">
                                                        <label for="empleado_check_contrato_indef" class="cr"></label>
                                                    </div>
                                                </div>


                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <label class="floating-label-activo-sm">Monto Imponible</label>
                                                    <input type="number" class="form-control form-control-sm" name="empleado_monto_imponible" id="empleado_monto_imponible">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <label  class="floating-label-activo-sm">Locomoción</label>
                                                    <input type="hidden" id="empleado_locomocion" name="empleado_locomocion" value="0">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="activar_check('empleado_check_locomocion', 'empleado_locomocion', 'empleado_locomocion_porcentaje');" id="empleado_check_locomocion" name="empleado_check_locomocion" value="">
                                                        <label for="empleado_check_locomocion" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <input type="number" disabled="disabled" class="form-control form-control-sm" name="empleado_locomocion_porcentaje" id="empleado_locomocion_porcentaje" value="N/A">
                                                </div>


                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm">Colación</label>
                                                     <input type="hidden" id="empleado_colacion" name="empleado_colacion" value="0">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="activar_check('empleado_check_colacion', 'empleado_colacion', 'empleado_colacion_porcentaje');" id="empleado_check_colacion" name="empleado_check_colacion" value="">
                                                        <label for="empleado_check_colacion" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <input type="number" disabled="disabled" class="form-control form-control-sm" name="empleado_colacion_porcentaje" id="empleado_colacion_porcentaje" value="N/A">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm">Asignación familar</label>
                                                    <input type="hidden" id="empleado_asignacion_familiar" name="empleado_asignacion_familiar" value="0">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="activar_check('empleado_check_asignacion_familiar', 'empleado_asignacion_familiar', 'empleado_asignacion_familiar_cantidad');" id="empleado_check_asignacion_familiar" name="empleado_check_asignacion_familiar" value="">
                                                        <label for="empleado_check_asignacion_familiar" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <input type="number" disabled="disabled" class="form-control form-control-sm" name="empleado_asignacion_familiar_cantidad" id="empleado_asignacion_familiar_cantidad" value="N/A">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm">Cajas de Compensación</label>
                                                    <input type="hidden" id="empleado_caja_compensacion" name="empleado_caja_compensacion" value="0">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="activar_check('empleado_check_caja_compensacion', 'empleado_caja_compensacion', 'empleado_caja_compensacion_porcentaje');" id="empleado_check_caja_compensacion" name="empleado_check_caja_compensacion" value="">
                                                        <label for="empleado_check_caja_compensacion" class="cr"></label>
                                                    </div>

                                                </div>

                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                    <input type="number" disabled="disabled" class="form-control form-control-sm" name="empleado_caja_compensacion_porcentaje" id="empleado_caja_compensacion_porcentaje" value="N/A">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="horario_contrato" role="tabpanel" aria-labelledby="horario_contrato-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h6 class="t-modal">Horario de trabajo</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Días de trabajo</label>
                                            <select class="js-example-basic-multiple" name="dias_laborales" id="dias_laborales" multiple="multiple">
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
                                            <input type="time" class="form-control form-control-sm" id="hora_entrada" name="hora_entrada" value="08:00">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora salida</label>
                                            <input type="time" class="form-control form-control-sm" id="hora_salida" name="hora_salida" value="19:00">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora inicio colación</label>
                                            <input type="time" class="form-control form-control-sm" id="hora_entrada_colacion" name="hora_entrada_colacion" value="12:00">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora término colación</label>
                                            <input type="time" class="form-control form-control-sm" id="hora_salida_colacion" name="hora_salida_colacion" value="13:00">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="registrar_nuevo_profesional()"><i class="feather icon-check"></i> Registrar profesional</button>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        $('#dias_laborales').select2();
        $('#dias_laborales_convenio').select2();
    });

    /** buscar ciudad */
    function buscar_ciudad_profesional(id_ciudad=0) {

        let region = $('#region_nuevo_profesional').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
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

                    let ciudades = $('#comuna_nuevo_profesional');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if(id_ciudad != 0)
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


    };


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

    function dame_tipo_especialidad(){
        let profesion = $('#profesion_nuevo_profesional').val();
        let url = "{{ route('web.profesional.buscar_tipo_especialidad') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_especialidad: profesion,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    registros = data.registros;

                    let especialidades = $('#especialidad_nuevo_profesional');

                    especialidades.find('option').remove();
                    especialidades.append('<option value="0">Seleccione</option>');
                    $(registros).each(function(i, v) { // indice, valor
                        especialidades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las especialidades",
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

    function dame_subtipo_especialidad(){
        let especialidad = $('#especialidad_nuevo_profesional').val();
        let url = "{{ route('web.profesional.buscar_sub_tipo_especialidad') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_tipo_especialidad: especialidad,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    registros = data.registros;

                    let subespecialidades = $('#sub_especialidad_nuevo_profesional');

                    subespecialidades.find('option').remove();
                    subespecialidades.append('<option value="0">Seleccione</option>');
                    $(registros).each(function(i, v) { // indice, valor
                        subespecialidades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las sub-especialidades",
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

</script>
