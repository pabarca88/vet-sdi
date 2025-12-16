<div id="liq_prof_institucion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="liq_prof_institucion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="title_">Registro Convenio Profesional:</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span onclick="cerrarModal()"; aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="liq_profes_inst" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="info_personal-tab" data-toggle="tab" href="#info_personal" role="tab" aria-controls="info_personal" aria-selected="false">Información Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="info-profesion_convenio-tab" data-toggle="tab" href="#info-profesion_convenio" role="tab" aria-controls="info-profesion" aria-selected="true">Profesión</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_info-tipo_contrato_liqinst-tab" data-toggle="tab" href="#edit_info-tipo_contrato_liqinst" role="tab" aria-controls="edit_info-tipo_contrato_liqinst" aria-selected="true">Info Convenio</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="fonasa_liq_inst-tab" data-toggle="tab" href="#fonasa_liq_inst" role="tab" aria-controls="fonasa_liq_inst" aria-selected="false">Formas de pago</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="info_contrato_pers_convenio-tab" data-toggle="tab" href="#info_contrato_pers_convenio" role="tab" aria-controls="info_contrato_pers_convenio" aria-selected="false">Información bancaria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="horario_contrato_convenio-tab" data-toggle="tab" href="#horario_contrato_convenio" role="tab" aria-controls="horario_contrato" aria-selected="false">Horario</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="liq_profes_inst">
                                <!-- INFO PERSONAL -->
                                <div class="tab-pane fade show active" id="info_personal" role="tabpanel" aria-labelledby="info_personal-tab">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Rut</label>
                                                <input type="text" class="form-control form-control-sm" oninput="formatoRut(this)" name="rut_nuevo_profesional_convenio" id="rut_nuevo_profesional_convenio">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Fecha de Ingreso</label>
                                                <input type="date" class="form-control form-control-sm" name="f_ingreso_nuevo_profesional_convenio" id="f_ingreso_nuevo_profesional_convenio" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Nombre</label>
                                                <input class="form-control form-control-sm" name="nombre_nuevo_profesional_convenio" id="nombre_nuevo_profesional_convenio" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Primer Apellido</label>
                                                <input class="form-control form-control-sm" name="apellido1_nuevo_profesional_convenio" id="apellido1_nuevo_profesional_convenio" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                <input class="form-control form-control-sm" name="apellido2_nuevo_profesional_convenio" id="apellido2_nuevo_profesional_convenio" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="floating-label-activo-sm">Sexo</label>
                                            <select class="form-control form-control-sm" name="empleado_sexo_convenio" id="empleado_sexo_convenio">
                                                <option value="">Seleccione</option>
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_nacimiento_convenio" id="fecha_nacimiento_convenio">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                <input class="form-control form-control-sm" name="email_nuevo_profesional_convenio" id="email_nuevo_profesional_convenio" type="email" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                <input class="form-control form-control-sm" name="telefono1_nuevo_profesional_convenio" id="telefono1_nuevo_profesional_convenio" type="number" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Tel&eacute;fono (opcional)</label>
                                                <input class="form-control form-control-sm" name="telefono2_nuevo_profesional_convenio" id="telefono2_nuevo_profesional_convenio" type="number" >
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Direcci&oacute;n N&deg; / Calle</label>
                                                <input class="form-control form-control-sm" name="direccion_nuevo_profesional_convenio" id="direccion_nuevo_profesional_convenio" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">N&deg; Dpto / Casa</label>
                                                <input class="form-control form-control-sm" name="n_dpto_nuevo_profesional_convenio" id="n_dpto_nuevo_profesional_convenio" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                                <select class="form-control form-control-sm" onchange="buscar_ciudad_profesional_convenio();" id="region_nuevo_profesional_convenio">
                                                    <option>Seleccione opci&oacute;n</option>
                                                    @foreach($regiones as $region)
                                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Comuna</label>
                                                <select class="form-control form-control-sm" id="comuna_nuevo_profesional_convenio">

                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- INFO PROFESIONAL -->
                                <div class="tab-pane fade show" id="info-profesion_convenio" role="tabpanel" aria-labelledby="info-profesion_convenio-tab">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Profesi&oacute;n</label>
                                                <select name="profesion_nuevo_profesional" id="profesion_nuevo_profesional_convenio" class="form-control" onchange="dame_tipo_especialidad_convenio()">
                                                    <option value="0">Seleccione opci&oacute;n</option>
                                                    @foreach($especialidades as $especialidad)
                                                        <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Especialidad</label>
                                                <select name="especialidad_nuevo_profesional" id="especialidad_nuevo_profesional_convenio" class="form-control" onchange="dame_subtipo_especialidad()">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Sub-especialidad</label>
                                                <select name="sub_especialidad_nuevo_profesional" id="sub_especialidad_nuevo_profesional_convenio" class="form-control">
                                                    <option value="0">Seleccione opci&oacute;n</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INFO CONTRATO-->
                                <div class="tab-pane fade show" id="edit_info-tipo_contrato_liqinst" role="tabpanel" aria-labelledby="edit_info-tipo_contrato_liqinst-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                <a class="nav-link-aten text-reset active" id="valor_fijo_pill-tab" data-toggle="tab" href="#valor_fijo_pill" role="tab" aria-controls="valor_fijo_pill" aria-selected="true">Valor Fijo</a>
                                                                <a class="nav-link-aten text-reset" id="valor_variable_pill-tab" data-toggle="tab" href="#valor_variable_pill" role="tab" aria-controls="valor_variable_pill" aria-selected="false">Variable</a>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                <div class="tab-pane fade show active" id="valor_fijo_pill" role="tabpanel" aria-labelledby="valor_fijo_pill-tab">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Valor Fijo por mes</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="valor_fijo" class="floating-label-activo-sm">Valor fijo</label>
                                                                                    <input type="text" name="valor_fijo" id="valor_fijo" class="form-control form-control-sm" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade " id="valor_variable_pill" role="tabpanel" aria-labelledby="valor_variable_pill-tab">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Porcentaje</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="porc_convenio">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Conf. Agenda</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="conf_agenda_convenio">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Gastos Comunes</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="gc_convenio">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Gastos Box</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="gb_convenio">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Valor Variable</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label id="total_variable" class="floating-label-activo-sm">$:.......</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr> <br>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Valor Total</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label id="valor_total" class="floating-label-activo-sm">$:.......</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--INFO FONASA-->
                                <div class="tab-pane fade show" id="fonasa_liq_inst" role="tabpanel" aria-labelledby="fonasa_liq_inst-tab">
                                    <form>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <h6> Valores de consulta:</h6>
                                         </div>
                                        <div class="form-row">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                      Fonasa
                                                    </label>
                                                  </div>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                      Isapres
                                                    </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label for="">Valor consulta privada</label>
                                                    <input type="text" class="form-control form-control-sm">
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Nombre de Procedimientos</label>
                                                    <input type="text" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Valor de Procedimientos</label>
                                                    <input type="text" class="form-control form-control-sm">
                                                </div>
                                            </div>


                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="info_contrato_pers_convenio" role="tabpanel" aria-labelledby="info_contrato_pers_convenio-tab">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h5>Datos Bancarios Para Dep&oacute;sito</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Banco</label>
                                                <select class="form-control form-control-sm" name="banco_nuevo_profesional_convenio" id="banco_nuevo_profesional_convenio">
                                                    <option value="0">Seleccione opci&oacute;n</option>
                                                    @foreach($bancos as $banco)
                                                        <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">N&deg; Cuenta</label>
                                                <input class="form-control form-control-sm" name="n_cta_nuevo_profesional_convenio" id="n_cta_nuevo_profesional_convenio" type="number" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Sucursal</label>
                                                <input class="form-control form-control-sm" name="sucursal_nuevo_profesional_convenio" id="sucursal_nuevo_profesional_convenio" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- HORARIO DE TRABAJO -->
                                <div class="tab-pane fade" id="horario_contrato_convenio" role="tabpanel" aria-labelledby="horario_contrato_convenio-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">HORARIO DE TRABAJO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Días de Trabajo</label>
                                                <select class="js-example-basic-multiple" name="dias_laborales_convenio" id="dias_laborales_convenio" multiple="multiple">
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
                                                <input type="time" class="form-control form-control-sm" id="hora_entrada_convenio" name="hora_entrada_convenio" value="08:00">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora salida</label>
                                                <input type="time" class="form-control form-control-sm" id="hora_salida_convenio" name="hora_salida_convenio" value="19:00">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="cerrarModal()"; data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="registrar_convenio_profesional()">Guardar </button>
                <button type="button" class="btn btn-primary" style="color: #3268bf;background-color: #cde0f6;border-color: #cde0f6;"><i class="feather icon-file"></i>Generar PDF</button>
            </div>
        </div>
    </div>
</div>

<script>
    function liquidacion_prof_cm() {
        $('#liq_prof_institucion').modal('show');
    }
    function cerrarModal() {
        $('#liq_prof_institucion').modal('hide');
      }


      function buscar_ciudad_profesional_convenio(id_ciudad=0) {

        let region = $('#region_nuevo_profesional_convenio').val();
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

                    let ciudades = $('#comuna_nuevo_profesional_convenio');

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

        function dame_tipo_especialidad_convenio(){
        let profesion = $('#profesion_nuevo_profesional_convenio').val();
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

                    let especialidades = $('#especialidad_nuevo_profesional_convenio');

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
        console.log(especialidad);
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
</script>
