<!--Modal Asociar Profesional-->
<div id="asociar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar Profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{--  DIV PARA BUSQUEDA DE PROFESIONAL  --}}
                    <div id="div_agregar_profesional_busqueda" style="display:;" class="col-sm-12 mb-3">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <h6 class="text-c-blue">Escriba rut y seleccione la sucursal</h6>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_int_rut" id="agregar_profesional_int_rut">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <button type="button" class="btn btn-info btn-sm "  id="agregar_profesional_btn_buscar_rut" onclick="buscar_profesional();">Buscar Profesional</button>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    @if($institucion->sucursales == 0)
                                        <label class="floating-label-activo-sm">Casa Matriz</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $institucion->LugarAtencion()->first()->nombre }}" readonly>
                                        <input type="hidden" name="agregar_profesional_int_id_lugar_atencion" id="agregar_profesional_int_id_lugar_atencion" value="{{ $institucion->LugarAtencion()->first()->id }}">
                                    @else
                                        <label class="floating-label-activo-sm">Sucursal</label>
                                        <select class="form-control form-control-sm" name="agregar_profesional_int_id_lugar_atencion" id="agregar_profesional_int_id_lugar_atencion">
                                            <option>Seleccione una opción</option>
                                                <option value="">Sucursal</option>
                                                <option value="1">Sucursal Demo</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">En el cargo de</label>
                                        <select class="form-control form-control-sm" name="agregar_profesional_cargo_int" id="agregar_profesional_cargo_int" onchange="registrar_nuevo_servicio(event)" disabled>
                                                <option value="0">Seleccione una opción</option>
                                                <option value="1">Profesional</option>
                                                <option value="2">Jefe de servicio</option>
                                                <option value="3">Subjefe de servicio</option>
                                                <option value="4">Director medico</option>
                                                <option value="5">Tens</option>
                                                <option value="6">Tons</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombre del servicio</label>
                                    <select name="servicio_profesional" id="servicio_profesional" class="form-control form-control-sm" disabled>
                                        @if(($servicios_internos->count()) > 0)
                                            @foreach($servicios_internos as $servicio)
                                                <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  DIV PARA MOSTRAR RESULTADO DE BUSQUEDA DE PROFESIONAL ENCONTRADO  --}}
                    <div id="div_agregar_profesional_ver_info_prof" style="display:none;" class="col-sm-12 mb-3">
                        <input type="hidden" name="agregar_profesional_ver_nombre_profesional" id="agregar_profesional_ver_nombre_profesional">
                        <input type="hidden" name="agregar_profesional_ver_telefono" id="agregar_profesional_ver_telefono">
                        <input type="hidden" name="agregar_profesional_ver_email" id="agregar_profesional_ver_email">
                        <input type="hidden" name="agregar_profesional_id_profesional" id="agregar_profesional_id_profesional">
                        <div class="row">
                            <div class="col-sm-4"><strong>Nombre: </strong></div>
                            <div class="col-sm-6" name="agregar_profesional_texto_ver_nombre_profesional" id="agregar_profesional_texto_ver_nombre_profesional"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Telefono: </strong></div>
                            <div class="col-sm-6" name="agregar_profesional_texto_ver_telefono" id="agregar_profesional_texto_ver_telefono"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Email: </strong></div>
                            <div class="col-sm-6" name="agregar_profesional_texto_ver_email" id="agregar_profesional_texto_ver_email"></div>
                        </div>

                        <hr/>

                        {{-- <div class="row m-t-15">
                            <div class="col-sm-4"><strong>Tipo Convenio: </strong></div>
                            <div class="col-sm-6">
                                <select class="form-control form-control-sm" name="agregar_profesional_id_tipo_convenio_institucion" id="agregar_profesional_id_tipo_convenio_institucion" onchange="mostar_div_montos_tipo_convenio('agregar_profesional_id_tipo_convenio_institucion');">
                                    <option value="">Seleccione</option>
                                    @if(isset($tipo_convenio))
                                        @foreach ($tipo_convenio as $tc )
                                            <option value="{{ $tc->id }}">{{ $tc->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div> --}}

                        <div class="div_fijo" style="display: none;">
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro Unico</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" name="agregar_profesional_fijo" id="agregar_profesional_fijo" value="">
                                </div>
                            </div>
                        </div>
                        <div class="div_variable" style="display: none;">
                            <div class="row mt-1">
                                <div class="col-sm-4">Porcentaje por Atenciones</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" max="100" step="0.1" name="agregar_profesional_atencion" id="agregar_profesional_atencion" value="">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro por Confirmaicon de Agenda</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" step="1" name="agregar_profesional_confirmacion_agenda" id="agregar_profesional_confirmacion_agenda" value="">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro por GGCC</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" step="1" name="agregar_profesional_ggcc" id="agregar_profesional_ggcc" value="">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro arriendo BOX</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" step="1" name="agregar_profesional_box" id="agregar_profesional_box" value="">
                                </div>
                            </div>
                        </div>

                        <hr/>

                        <div class="row m-t-15">
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-info" onclick="regresar_a_busqueda();">Regresar a Busqueda</button>
                            </div>
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-success" onclick="asociar_profesional_existente();">Asociar Profesional a Servicio</button>
                            </div>
                        </div>


                    </div>

                    {{--  DIV PARA CARGAR PROFESIONAL NUEVO  --}}
                    <div id="div_agregar_profesional_formulario_nuevo_prof" style="display:none;" class="col-sm-12 mb-3">
                        {{--  --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">RUT<span style="color: red; font-size: 10px;">*</span></label>
                                    <input type="text" required class="form-control form-control-sm" name="agregar_profesional_nuevo_rut" id="agregar_profesional_nuevo_rut">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombres<span style="color: red; font-size: 10px;">*</span></label>
                                    <input type="text" required class="form-control form-control-sm" name="agregar_profesional_nuevo_nombre" id="agregar_profesional_nuevo_nombre">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Primer Apellido<span style="color: red; font-size: 10px;">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_apellido_uno" id="agregar_profesional_nuevo_apellido_uno">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Segundo Apellido<span style="color: red; font-size: 10px;">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_apellido_dos" id="agregar_profesional_nuevo_apellido_dos">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico<span style="color: red; font-size: 10px;">*</span></label>
                                    <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda()" name="agregar_profesional_nuevo_correo" id="agregar_profesional_nuevo_correo">
                                    <span id="mensaje_email_reserva" style="display:none"></span>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tel&eacute;fono<span style="color: red; font-size: 10px;">*</span></label>
                                    <input type="tel" class="form-control form-control-sm" name="agregar_profesional_nuevo_telefono_uno" id="agregar_profesional_nuevo_telefono_uno">
                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Profesión<span style="color: red; font-size: 10px;">*</span></label>
                                <select class="form-control form-control-sm" id="agregar_profesional_nuevo_profesion" name="agregar_profesional_nuevo_profesion" onchange="buscar_tipo_especialidad()">
                                    <option selected value="0">Seleccione</option>
                                    @if (isset($especialidades))
                                        @foreach ($especialidades as $esp)
                                            <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Especialidad<span style="color: red; font-size: 10px;">*</span></label>
                                <select class="form-control form-control-sm" id="agregar_profesional_nuevo_especialidad" name="agregar_profesional_nuevo_especialidad" onchange="buscar_sub_tipo_especialidad()">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Tipo Especialidad<span style="color: red; font-size: 10px;">*</span></label>
                                <select class="form-control form-control-sm" id="agregar_profesional_nuevo_sub_tipo_especialidad" name="agregar_profesional_nuevo_sub_tipo_especialidad">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>

                        </div>
                        {{--  --}}

                        <hr/>

                        <div class="row m-t-15">
                            <div class="col-sm-4"><strong>Tipo Convenio: </strong></div>
                            <div class="col-sm-6">
                                <select class="form-control form-control-sm" name="agregar_profesional_nuevo_id_tipo_convenio_institucion" id="agregar_profesional_nuevo_id_tipo_convenio_institucion" onchange="mostar_div_montos_tipo_convenio('agregar_profesional_nuevo_id_tipo_convenio_institucion');">
                                    <option value="">Seleccione</option>
                                    @if(isset($tipo_convenio))
                                        @foreach ($tipo_convenio as $tc )
                                            <option value="{{ $tc->id }}">{{ $tc->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="div_fijo" style="display: none;">
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro Unico</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" name="agregar_profesional_nuevo_fijo" id="agregar_profesional_nuevo_fijo" value="">
                                </div>
                            </div>
                        </div>
                        <div class="div_variable" style="display: none;">
                            <div class="row mt-1">
                                <div class="col-sm-4">Porcentaje por Atenciones</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" max="100" step="0.1" name="agregar_profesional_nuevo_atencion" id="agregar_profesional_nuevo_atencion" value="">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro por Confirmaicon de Agenda</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" step="1" name="agregar_profesional_nuevo_confirmacion_agenda" id="agregar_profesional_nuevo_confirmacion_agenda" value="">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro por GGCC</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" step="1" name="agregar_profesional_nuevo_ggcc" id="agregar_profesional_nuevo_ggcc" value="">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">Cobro arriendo BOX</div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" min="0" step="1" name="agregar_profesional_nuevo_box" id="agregar_profesional_nuevo_box" value="">
                                </div>
                            </div>
                        </div>

                        <hr/>

                        <div class="row m-t-15">
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-info" onclick="regresar_a_busqueda();">Regresar a Busqueda</button>
                            </div>
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-success" onclick="asociar_nuevo_profesional();" >Enviar invitación</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        {{--  FORMATEO DE RUT AGREGAR NUEVO PROFESIONAL   --}}
        $("#agregar_profesional_int_rut").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });
        $("#agregar_profesional_nuevo_rut").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });

    });

    function mostar_div_montos_tipo_convenio(select)
    {
        console.log('mostar_div_montos_tipo_convenio');
        var valor = $('#'+select).val();
        $('.div_fijo').hide();
        $('.div_variable').hide();
        console.log(valor);
        if(valor == 1)
        {
            $('.div_fijo').show();
            $('.div_variable').hide();
            $('#agregar_profesional_fijo').val(0);

        }
        else if(valor == 2)
        {
            $('.div_fijo').hide();
            $('.div_variable').show();
            $('#agregar_profesional_atencion').val(0);
            $('#agregar_profesional_confirmacion_agenda').val(0);
            $('#agregar_profesional_ggcc').val(0);
            $('#agregar_profesional_box').val(0);
        }
        else
        {
            $('#div_fijo').hide();
            $('#div_variable').hide();
        }
    }

    function asociar_profesional() {
        $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
        $('#div_agregar_profesional_busqueda').show();
        $('#div_agregar_profesional_ver_info_prof').hide();
        $('#div_agregar_profesional_formulario_nuevo_prof').hide();
        $('#asociar_profesional_cm').modal('show');
    }

    function regresar_a_busqueda()
    {
        $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
        $('#agregar_profesional_int_rut').val('');

        $('#div_agregar_profesional_busqueda').show();
        $('#div_agregar_profesional_ver_info_prof').hide();
        $('#div_agregar_profesional_formulario_nuevo_prof').hide();

        $('#agregar_profesional_id_profesional').val('');
        $('#agregar_profesional_texto_ver_nombre_profesional').html('');
        $('#agregar_profesional_texto_ver_telefono').html('');
        $('#agregar_profesional_texto_ver_email').html('');
        $('#agregar_profesional_ver_nombre_profesional').val('');
        $('#agregar_profesional_ver_telefono').val('');
        $('#agregar_profesional_ver_email').val('');

        $('#agregar_profesional_nuevo_nombre').val('');
        $('#agregar_profesional_nuevo_apellido_p').val('');
        $('#agregar_profesional_nuevo_apellido_m').val('');
        $('#agregar_profesional_nuevo_telefono').val('');
        $('#agregar_profesional_nuevo_email').val('');
    }

    {{--  BUSQUEDA EN EL MODAL DE ASOCIAR NUEVO PROFESIONAL  --}}
    function buscar_profesional()
    {

        let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();

        if(id_lugar_atencion == '')
        {
            swal({
                title: "Debe seleccionar una sucursal",
                icon: "error",
            });
            return false;
        }

        $('#agregar_profesional_btn_buscar_rut').attr('disabled', 'disabled');
        var rut = $('#agregar_profesional_int_rut').val();
        if(rut == ''){
            swal({
                title: "Debe ingresar un RUT",
                icon: "error",
            });
            return false;
        }
        if(!$.validateRut(rut))
        {
            swal({
                title: "Debe ingresar un RUT valido",
                icon: "error",
            });
            return false;
        }

        {{--  busqueda  --}}
        let profesional_inter = $('#agregar_profesional_nuevo_profesional_inter');
        profesional_inter.find('option').remove();

        let url = "{{ route('profesional.buscador') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                rut: rut
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {
                /** encontrado */
                $('#agregar_profesional_texto_ver_nombre_profesional').html(data.registros[0].profesionales_nombre+' '+data.registros[0].profesionales_apellido_uno+' '+data.registros[0].profesionales_apellido_dos);
                $('#agregar_profesional_texto_ver_telefono').html(data.registros[0].profesional_telefono_uno);
                $('#agregar_profesional_texto_ver_email').html(data.registros[0].profesional_email);
                $('#agregar_profesional_ver_nombre_profesional').val(data.registros[0].profesionales_nombre+' '+data.registros[0].profesionales_apellido_uno+' '+data.registros[0].profesionales_apellido_dos);
                $('#agregar_profesional_ver_telefono').val(data.registros[0].profesional_telefono_uno);
                $('#agregar_profesional_ver_email').val(data.registros[0].profesional_email);

                $('#agregar_profesional_id_profesional').val(data.registros[0].profesionales_id);

                $('#div_agregar_profesional_busqueda').hide();
                $('#div_agregar_profesional_ver_info_prof').show();
                $('#div_agregar_profesional_formulario_nuevo_prof').hide();
            }
            else
            {
                /** no encontrado */
                /** REALIZAR BUSQUEDA TABLA DE INVITACIONES */
                let url = "{{ route('invitaciones.buscar.info') }}";
                $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        rut: rut
                    },
                })
                .done(function(data3) {
                    if (data3.estado == 1)
                    {
                        /** encontrado */
                        $('#agregar_profesional_nuevo_rut').val(rut);
                        $('#agregar_profesional_nuevo_nombre').val(data3.registro.nombre);
                        $('#agregar_profesional_nuevo_apellido_uno').val(data3.registro.apellido_uno);
                        $('#agregar_profesional_nuevo_apellido_dos').val(data3.registro.apellido_dos);
                        $('#agregar_profesional_nuevo_correo').val(data3.registro.email);
                        $('#agregar_profesional_nuevo_telefono_uno').val(data3.registro.telefono);
                        $('#agregar_profesional_nuevo_profesion').val(data3.registro.id_especialidad);

                        buscar_tipo_especialidad(data3.registro.id_tipo_especialidad);
                        // $('#agregar_profesional_nuevo_especialidad').val(data3.registro.id_tipo_especialidad);
                        setTimeout(function(){
                            buscar_sub_tipo_especialidad(data3.registro.id_sub_tipo_especialidad);
                        }, 1000);
                        // $('#agregar_profesional_nuevo_sub_tipo_especialidad').val(data3.registro.id_sub_tipo_especialidad);

                        $('#agregar_profesional_nuevo_id_tipo_convenio_institucion').val(data3.registro.convenio.id_tipo_convenio_institucion);
                        mostar_div_montos_tipo_convenio('agregar_profesional_nuevo_id_tipo_convenio_institucion');
                        $('#agregar_profesional_nuevo_fijo').val(data3.registro.convenio.fijo);
                        $('#agregar_profesional_nuevo_atencion').val(data3.registro.convenio.atencion);
                        $('#agregar_profesional_nuevo_confirmacion_agenda').val(data3.registro.convenio.confirmacion_agenda);
                        $('#agregar_profesional_nuevo_ggcc').val(data3.registro.convenio.ggcc);
                        $('#agregar_profesional_nuevo_box').val(data3.registro.convenio.box);

                        $('#div_agregar_profesional_busqueda').hide();
                        $('#div_agregar_profesional_ver_info_prof').hide();
                        $('#div_agregar_profesional_formulario_nuevo_prof').show();

                    }
                    else
                    {
                        $.ajax({
                            url: url,
                            type: "get",
                            data: {
                                rut: rut
                            },
                        })
                        .done(function(data2) {
                            if (data2.estado == 1)
                            {
                                /** encontrado */
                                $('#agregar_profesional_nuevo_rut').val(rut);
                                $('#agregar_profesional_nuevo_nombre').val( data2.registros.nombre);
                                $('#agregar_profesional_nuevo_apellido_uno').val( data2.registros.appaterno );
                                $('#agregar_profesional_nuevo_apellido_dos').val( data2.registros.apmaterno );
                                $('#agregar_profesional_nuevo_correo').val('');
                                $('#agregar_profesional_nuevo_telefono_uno').val('');

                                $('#agregar_profesional_nuevo_profesion').val('');
                                $('#agregar_profesional_nuevo_especialidad').val('');
                                $('#agregar_profesional_nuevo_sub_tipo_especialidad').val('');

                                $('#agregar_profesional_nuevo_id_tipo_convenio_institucion').val('');
                                $('#agregar_profesional_nuevo_fijo').val('');
                                $('#agregar_profesional_nuevo_atencion').val('');
                                $('#agregar_profesional_nuevo_confirmacion_agenda').val('');
                                $('#agregar_profesional_nuevo_ggcc').val('');
                                $('#agregar_profesional_nuevo_box').val('');

                                $('#div_agregar_profesional_busqueda').hide();
                                $('#div_agregar_profesional_ver_info_prof').hide();
                                $('#div_agregar_profesional_formulario_nuevo_prof').show();
                            }
                            else
                            {
                                /** no encontrado */
                                $('#agregar_profesional_nuevo_rut').val( rut );
                                $('#agregar_profesional_nuevo_nombre').val( '' );
                                $('#agregar_profesional_nuevo_apellido_uno').val( '' );
                                $('#agregar_profesional_nuevo_apellido_dos').val( '' );
                                $('#agregar_profesional_nuevo_correo').val('');
                                $('#agregar_profesional_nuevo_telefono_uno').val('');

                                $('#agregar_profesional_nuevo_profesion').val('');
                                $('#agregar_profesional_nuevo_especialidad').val('');
                                $('#agregar_profesional_nuevo_sub_tipo_especialidad').val('');

                                $('#agregar_profesional_nuevo_id_tipo_convenio_institucion').val('');
                                $('#agregar_profesional_nuevo_fijo').val('');
                                $('#agregar_profesional_nuevo_atencion').val('');
                                $('#agregar_profesional_nuevo_confirmacion_agenda').val('');
                                $('#agregar_profesional_nuevo_ggcc').val('');
                                $('#agregar_profesional_nuevo_box').val('');


                                $('#div_agregar_profesional_busqueda').hide();
                                $('#div_agregar_profesional_ver_info_prof').hide();
                                $('#div_agregar_profesional_formulario_nuevo_prof').show();

                            }

                        })
                        .fail(function(jqXHR, ajaxOptions, thrownError) {
                            console.log(jqXHR, ajaxOptions, thrownError)
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function asociar_profesional_existente()
    {
        let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();
        let id_profesional = $('#agregar_profesional_id_profesional').val();
        let id_servicio_clinico = $('#servicio_profesional').val();
        let id_cargo = $('#agregar_profesional_cargo_int').val();

        let url = "{{ route('adm_hospital.asociar_profesional_existente')}}";


        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: CSRF_TOKEN,
                id_lugar_atencion : id_lugar_atencion,
                id_profesional : id_profesional,
                id_servicio_clinico: id_servicio_clinico,
                id_cargo: id_cargo
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                swal({
                    title: "Invitación al Profesional Realizada con Exito.",
                    text: "Profesional pendiente por confirmar.",
                    icon: "success",
                });

                $('#asociar_profesional_cm').modal('hide');

                $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
                $('#agregar_profesional_int_rut').val('');

                $('#div_agregar_profesional_busqueda').show();
                $('#div_agregar_profesional_ver_info_prof').hide();
                $('#div_agregar_profesional_formulario_nuevo_prof').hide();

                $('#agregar_profesional_id_profesional').val('');
                $('#agregar_profesional_texto_ver_nombre_profesional').html('');
                $('#agregar_profesional_texto_ver_telefono').html('');
                $('#agregar_profesional_texto_ver_email').html('');
                $('#agregar_profesional_ver_nombre_profesional').val('');
                $('#agregar_profesional_ver_telefono').val('');
                $('#agregar_profesional_ver_email').val('');

                $('#agregar_profesional_nuevo_nombre').val('');
                $('#agregar_profesional_nuevo_apellido_p').val('');
                $('#agregar_profesional_nuevo_apellido_m').val('');
                $('#agregar_profesional_nuevo_telefono').val('');
                $('#agregar_profesional_nuevo_email').val('');
                $('#v-pills-tabContent').empty();
                $('#v-pills-tabContent').append(data.v);
            }
            else
            {
                swal({
                    title: "Invitación al Profesional Fallida.",
                    text: "Profesional pendiente por confirmar.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function desasociar_profesional_servicio(id_profesional,id_servicio_interno){
        swal({
                title: "Eliminar Profesional",
                text: "¿Está seguro que desea desasociar al profesional?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_desasociar_profesional_servicio(id_profesional,id_servicio_interno);
                }
            });
    }

    function confirmar_desasociar_profesional_servicio(id_profesional,id_servicio_interno){
        let id_servicio_clinico = id_servicio_interno;
        let url = "{{ route('adm_hospital.desasociar_profesional_existente')}}";
        let data = {
            id_profesional: id_profesional,
            id_servicio: id_servicio_clinico,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    swal({
                        title: "Profesional eliminado del hospital correctamente.",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                    $('#v-pills-tabContent').empty();
                    $('#v-pills-tabContent').append(resp.v);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function asociar_nuevo_profesional()
    {
        let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();

        let rut = $('#agregar_profesional_nuevo_rut').val();
        let nombre = $('#agregar_profesional_nuevo_nombre').val();
        let apellido_uno = $('#agregar_profesional_nuevo_apellido_uno').val();
        let apellido_dos = $('#agregar_profesional_nuevo_apellido_dos').val();
        let correo = $('#agregar_profesional_nuevo_correo').val();
        let telefono_uno = $('#agregar_profesional_nuevo_telefono_uno').val();

        let profesion = $('#agregar_profesional_nuevo_profesion').val();
        let especialidad = $('#agregar_profesional_nuevo_especialidad').val();
        let sub_tipo_especialidad = $('#agregar_profesional_nuevo_sub_tipo_especialidad').val();

        let id_tipo_convenio_institucion = $('#agregar_profesional_nuevo_id_tipo_convenio_institucion').val();
        let fijo = $('#agregar_profesional_nuevo_fijo').val();
        let atencion = $('#agregar_profesional_nuevo_atencion').val();
        let confirmacion_agenda = $('#agregar_profesional_nuevo_confirmacion_agenda').val();
        let ggcc = $('#agregar_profesional_nuevo_ggcc').val();
        let box = $('#agregar_profesional_nuevo_box').val();


        let url = "{{ route('adm_cm.asociar_profesional_nuevo')}}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: CSRF_TOKEN,
                id_lugar_atencion : id_lugar_atencion,
                rut : rut,
                nombre : nombre,
                apellido_uno : apellido_uno,
                apellido_dos : apellido_dos,
                correo : correo,
                telefono_uno : telefono_uno,
                profesion : profesion,
                especialidad : especialidad,
                sub_tipo_especialidad : sub_tipo_especialidad,
                id_tipo_convenio_institucion : id_tipo_convenio_institucion,
                fijo : fijo,
                atencion : atencion,
                confirmacion_agenda : confirmacion_agenda,
                ggcc : ggcc,
                box : box,
                observacion : '',
            },
        })
        .done(function(data) {
            if (data.estado == 1)
            {

                swal({
                    title: "Invitación al Profesional Realizada con Exito.",
                    text: "Profesional pendiente por confirmar.",
                    icon: "success",
                });

                $('#asociar_profesional_cm').modal('hide');

                $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
                $('#agregar_profesional_int_rut').val('');

                $('#div_agregar_profesional_busqueda').show();
                $('#div_agregar_profesional_ver_info_prof').hide();
                $('#div_agregar_profesional_formulario_nuevo_prof').hide();

                // $('#agregar_profesional_int_id_lugar_atencion').val('');
                $('#agregar_profesional_nuevo_rut').val('');
                $('#agregar_profesional_nuevo_nombre').val('');
                $('#agregar_profesional_nuevo_apellido_uno').val('');
                $('#agregar_profesional_nuevo_apellido_dos').val('');
                $('#agregar_profesional_nuevo_correo').val('');
                $('#agregar_profesional_nuevo_telefono_uno').val('');
                $('#agregar_profesional_nuevo_profesion').val('');
                $('#agregar_profesional_nuevo_especialidad').val('');
                $('#agregar_profesional_nuevo_sub_tipo_especialidad').val('');
                $('#agregar_profesional_nuevo_id_tipo_convenio_institucion').val('');
                $('#agregar_profesional_nuevo_fijo').val('');
                $('#agregar_profesional_nuevo_atencion').val('');
                $('#agregar_profesional_nuevo_confirmacion_agenda').val('');
                $('#agregar_profesional_nuevo_ggcc').val('');
                $('#agregar_profesional_nuevo_box').val('');
            }
            else
            {
                swal({
                    title: "Invitación al Profesional Fallida.",
                    text: "Profesional pendiente por confirmar.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function buscar_ciudad(select_region, select_ciudad, id_ciudad=0) {

        let region = $('#'+select_region).val();
        let url = "{{ route('home.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);

                let ciudades = $('#'+select_ciudad);

                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione Ciudad</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
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


    function buscar_tipo_especialidad(id='')
    {

        let tipo_especialidad_registro = $('#agregar_profesional_nuevo_especialidad');
        tipo_especialidad_registro.find('option').remove();

        let sub_tipo_especialidad_registro = $('#agregar_profesional_nuevo_sub_tipo_especialidad');
        sub_tipo_especialidad_registro.find('option').remove();

        let especialidad = $('#agregar_profesional_nuevo_profesion').val();
        let url = "{{ route('home.buscar_especialidad') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                especialidad: especialidad,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                let especialidades = $('#agregar_profesional_nuevo_especialidad');

                especialidades.find('option').remove();
                especialidades.append('<option value="">Seleccione</option>');
                if(data.length > 0)
                {
                    $(data).each(function(i, v) { // indice, valor
                        especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    })
                }
                else
                {
                    especialidades.append('<option value="0">No Aplica</option>');
                    especialidades.val(0);

                    let sub_especialidades = $('#agregar_profesional_nuevo_sub_tipo_especialidad');
                    sub_especialidades.append('<option value="0">No Aplica</option>');
                    sub_especialidades.val(0);
                }
                if(id != '')
                    especialidades.val(id);


            } else {
                alert('No se pudo Cargar los tipos de especialidad');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function buscar_sub_tipo_especialidad(id='')
    {
        let sub_tipo_especialidad_registro = $('#agregar_profesional_nuevo_sub_tipo_especialidad');
        sub_tipo_especialidad_registro.find('option').remove();

        let especialidad = $('#agregar_profesional_nuevo_especialidad').val();
        let url = "{{ route('home.buscar_sub_tipo_especialidad') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                especialidad: especialidad,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                console.log(data.length);
                let sub_especialidades = $('#agregar_profesional_nuevo_sub_tipo_especialidad');

                sub_especialidades.find('option').remove();
                sub_especialidades.append('<option value="">Seleccione</option>');
                if(data.length > 0)
                {
                    $(data).each(function(i, v) { // indice, valor
                        sub_especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    })
                }
                else
                {
                    sub_especialidades.append('<option value="0">No Aplica</option>');
                    sub_especialidades.val(0);
                }
                if(id != '')
                    sub_especialidades.val(id);

            } else {
                alert('No se pudo Cargar los tipos de especialidad');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function registrar_nuevo_servicio(event){
        let id_nuevo_servicio = event.target.value;
        if(id_nuevo_servicio == 2 || id_nuevo_servicio == 3)
        {
            $('#div_nuevo_servicio').removeClass('d-none');
        }
        else
        {
            $('#div_nuevo_servicio').addClass('d-none');
        }
    }

    function asignar_profesional_hospital(){

    }

</script>
