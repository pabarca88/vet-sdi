{{-- modal horas extras --}}
<div class="modal fade" id="m_hora_extras" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_hora_extras" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Agregar Horas Extras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_m_hora_extras();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                        <div class="row mt-2">
                            <div class="m_hora_extras_busqueda">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <h6 class="text-c-blue ml-2 mb-3">Ingrese el rut del paciente</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row div_rut_buscar">
                                    <div class="col-sm-8 col-md-8 mb-3">
                                        <div class="form-group">
                                            <input type="text" id="m_hora_extras_rut" name="m_hora_extras_rut" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4 mb-3">
                                        <div id="m_hora_extra_div_cargando" style="display: none;">
                                            <img src="{{ asset('images/spinner.svg') }}" alt="cargando">
                                        </div>
                                        <div id="m_hora_extra_div_boton_buscar_paciente" style="display: ">
                                            <button class="btn btn-info" onclick="buscar_paciente_hora_extra();" type="button"id="button-addon2">Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="m_hora_extras_paciente_existente" style="display: none">
                                <div class="row mx-3">
                                    <input type="hidden" name="m_hora_extras_ex_id_paciente" id="m_hora_extras_ex_id_paciente" value="">
                                    <table class="table table-borderless table-xs">
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <strong>Rut</strong>
                                                    <td><span id="m_hora_extras_ex_rut_paciente"></span></td>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <strong>Nombre</strong>
                                                    <td><span id="m_hora_extras_ex_nombre"></span></td>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <strong>Fecha Nacimiento</strong>
                                                    <td><span id="m_hora_extras_ex_fecha_nacimiento"></span></td>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <strong>Sexo</strong>
                                                    <td><span id="m_hora_extras_ex_sexo"></span></td>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <strong>Convenio</strong>
                                                    <td><span id="m_hora_extras_ex_convenio"></span></td>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <strong>Dirección</strong>
                                                    <td><span id="m_hora_extras_ex_direccion"></span></td>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <strong>Correo Electrónico</strong>
                                                    <td id="m_hora_extras_ex_email"></td>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <strong>Teléfono</strong>
                                                    <td><span id="m_hora_extras_ex_telefono"></span></td>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="modal-footer">
                                        <button type="button" onclick="cancelar_busqueda_horas_extras();"class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="button" onclick="agendar_he_ex();" class="btn btn-info">Agendar Hora Extra</button>
                                    </div>
                                </div>
                            </div>

                            <div class="m_hora_extras_paciente_nuevo" style="display: none">
                                <!-- List group -->
                                <div class="col-sm-12 col-md-12">
                                    <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones active text-uppercase" id="m_hora_extra_reserva_hora-tab"
                                                data-toggle="tab" href="#m_hora_extra_reserva_hora" role="tab"
                                                aria-controls="m_hora_extra_reserva_hora" aria-selected="true">Reserva de hora</a>
                                        </li>
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones text-uppercase" id="m_hora_extra_prereserva_hora-tab"
                                                data-toggle="tab" href="#m_hora_extra_prereserva_hora" role="tab"
                                                aria-controls="m_hora_extra_prereserva_hora" aria-selected="false">PRE-Reserva</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Tab panes -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content">
                                        {{-- contenedor de reserva --}}
                                        <div class="tab-pane fade show active" id="m_hora_extra_reserva_hora" role="tabpanel" aria-labelledby="m_hora_extra_reserva_hora-tab">
                                            <div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="alert alert-danger" role="alert">
                                                            Paciente no registrado, complete los datos para registrar al paciente
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">RUT</label>
                                                            <input type="text" required class="form-control form-control-sm" name="m_hora_extras_nv_rut_paciente" id="m_hora_extras_nv_rut_paciente" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Nombres</label>
                                                            <input type="text" required class="form-control form-control-sm" name="m_hora_extras_nv_nombres_paciente" id="m_hora_extras_nv_nombres_paciente">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Primer Apellido</label>
                                                            <input type="text" class="form-control form-control-sm" name="m_hora_extras_nv_apellido_uno" id="m_hora_extras_nv_apellido_uno">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                            <input type="text" class="form-control form-control-sm" name="m_hora_extras_nv_apellido_dos" id="m_hora_extras_nv_apellido_dos">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                            <input type="date" class="form-control form-control-sm" name="m_hora_extras_nv_fecha_nac" id="m_hora_extras_nv_fecha_nac">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Sexo</label>
                                                            <select id="m_hora_extras_nv_sexo" name="m_hora_extras_nv_sexo" class="form-control form-control-sm">
                                                                <option value="0">Selecione una opci&oacute;n</option>
                                                                <option value="F">Femenino</option>
                                                                <option value="M">Masculino</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                                            <select id="m_hora_extras_nv_convenio" name="m_hora_extras_nv_convenio" class="form-control form-control-sm">
                                                                <option value="0">Selecione una opci&oacute;n</option>
                                                                @if (isset($prevision))
                                                                    @foreach ($prevision as $p)
                                                                        <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8 col-md-8">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                            <input type="address" class="form-control form-control-sm" name="m_hora_extras_nv_direccion" id="m_hora_extras_nv_direccion">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                                            <input type="address" class="form-control form-control-sm" name="m_hora_extras_nv_numero_dir" id="m_hora_extras_nv_numero_dir">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Region</label>
                                                            <select class="form-control" name="m_hora_extras_nv_region" id="m_hora_extras_nv_region" onchange="buscar_ciudad_le('m_hora_extras_nv_region', 'm_hora_extras_nv_ciudad', '0');" required>
                                                                <option value="0">Seleccione Regio&oacute;n</option>
                                                                @if (isset($region))
                                                                    @foreach ($region as $reg)
                                                                        <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Ciudad</label>
                                                            <select class="form-control" id="m_hora_extras_nv_ciudad" name="m_hora_extras_nv_ciudad" required>
                                                                <option value="0">Seleccione Ciudad</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                            <input type="text" class="form-control form-control-sm" name="m_hora_extras_nv_correo" id="m_hora_extras_nv_correo">
                                                            <span id="mensaje_email_reserva" style="display:none"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                            <input type="tel" class="form-control form-control-sm mask_telefono" name="m_hora_extras_nv_telefono_uno" id="m_hora_extras_nv_telefono_uno">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" onclick="cancelar_busqueda_horas_extras();" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" onclick="agendar_he_np();" class="btn btn-info">Registrar Paciente</button>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- contenedor de pre reserva --}}
                                        <div class="tab-pane fade" id="m_hora_extra_prereserva_hora" role="tabpanel" aria-labelledby="m_hora_extra_prereserva_hora-tab">
                                            <input type="hidden" name="m_hora_extra_prereserva" id="m_hora_extra_prereserva" value="0">
                                            <div class="form-row seccion_pre_reserva_paciente_nuevo">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Nombres</label>
                                                        <input type="text" required class="form-control form-control-sm"
                                                            name="m_he_prereserva_hora_nombres_paciente"
                                                            id="m_he_prereserva_hora_nombres_paciente">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="m_he_prereserva_hora_apellido_uno"
                                                            id="m_he_prereserva_hora_apellido_uno">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="m_he_prereserva_hora_apellido_dos"
                                                            id="m_he_prereserva_hora_apellido_dos">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Correo Electr&oacute;nico
                                                            Contacto</label>

                                                        <input type="text" class="form-control form-control-sm"
                                                            onblur="m_he_validar_email_agenda_prereserva();"
                                                            name="m_he_prereserva_hora_correo" id="m_he_prereserva_hora_correo">
                                                        <span id="m_he_mensaje_email_prereserva"
                                                            style="width: 100%; font-size: 10px; color: #f00; font-weight: bold; display:none"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                        <input type="tel" class="form-control form-control-sm mask_telefono"
                                                            name="m_he_prereserva_hora_telefono_uno"
                                                            id="m_he_prereserva_hora_telefono_uno"
                                                            onchange="m_he_validar_campo_telefono();">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" onclick="cancelar_busqueda_horas_extras();" id="m_hora_extra_cerrar_registro_paciente_hora" data-dismiss="modal">
                                                    <i class="feather icon-x"></i> Cancelar
                                                </button>
                                                <button type="button" id="m_hora_extra_guardar_prereserva_paciente" onclick="agendar_he_np_prereserva();" class="btn btn-info">
                                                    <i class="feather icon-check"></i> Tomar Hora
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger align-middle" onclick="cerrar_m_hora_extras()"; data-dismiss="modal">Cerrar</button>
                {{-- <button type="button" class="btn btn-success align-middle" onclick="registrar_horas_extras()"; data-dismiss="modal">Registras</button> --}}
            </div>
        </div>
    </div>
</div>

<script>

    /** CERRAR MODAL */
    function cerrar_m_hora_extras() {
        $('#m_hora_extras').modal('hide');
        $('#m_hora_extras_id_lista_espera').val('');
        $('#m_hora_extras_id_paciente').val('');
    }

    // CANCELAR BBUSQUEDA
    function cancelar_busqueda_horas_extras()
    {
        $('#m_hora_extra_div_cargando').hide();
        $('#m_hora_extra_div_boton_buscar_paciente').show();

        /** LIMPIEZA BUSQEUDA */
        $('#m_hora_extras_rut').val('');

        /** LIMPIEZA DE EXISTENTES */
        $('#m_hora_extras_ex_id_paciente').val('');
        $('#m_hora_extras_ex_rut_paciente').text('');
        $('#m_hora_extras_ex_nombre').text('');
        $('#m_hora_extras_ex_fecha_nacimiento').text('');
        $('#m_hora_extras_ex_sexo').text('');
        $('#m_hora_extras_ex_sexo').text('');
        $('#m_hora_extras_ex_convenio').text('');
        $('#m_hora_extras_ex_direccion').text('');
        $('#m_hora_extras_ex_email').text('');
        $('#m_hora_extras_ex_telefono').text('');
        $('#m_hora_extras_ex_observacion').text('');

        /** LIMPIAR FORMULARIO */
        $('#m_hora_extras_nv_rut_paciente').val('');
        $('#m_hora_extras_nv_nombres_paciente').val('');
        $('#m_hora_extras_nv_apellido_uno').val('');
        $('#m_hora_extras_nv_apellido_dos').val('');
        $('#m_hora_extras_nv_fecha_nac').val('');
        $('#m_hora_extras_nv_sexo').val(0);
        $('#m_hora_extras_nv_convenio').val(0);
        $('#m_hora_extras_nv_direccion').val('');
        $('#m_hora_extras_nv_numero_dir').val('');
        $('#m_hora_extras_nv_region').val('');
        // $('#m_hora_extras_nv_ciudad').val('');
        buscar_ciudad_le('m_hora_extras_nv_region', 'm_hora_extras_nv_ciudad', '0');
        $('#m_hora_extras_nv_correo').val('');
        $('#m_hora_extras_nv_telefono_uno').val('');
        $('#m_hora_extras_nv_observacion').val('');

        /** VISUALIZACION DE  DIV */
        $('.m_hora_extras_busqueda').show();
        $('.m_hora_extras_paciente_existente').hide();
        $('.m_hora_extras_paciente_nuevo').hide();

        /** LIMPIAR PRERESERVA */
        $('#prereserva_hora_nombres_paciente').val('');
        $('#prereserva_hora_apellido_uno').val('');
        $('#prereserva_hora_apellido_dos').val('');
        $('#prereserva_hora_correo').val('');
        $('#prereserva_hora_telefono_uno').val('');
    }

    /** ABRIR MODAL */
    function abrir_horas_extras(id, id_paciente)
    {
        if($('#agenda_profesional_asistente').val()!=='')
        {
            cancelar_busqueda_horas_extras();
            $('#m_hora_extras').modal('show');
            $('.div_rut_buscar').show();
            $('#m_hora_extras_rut').val('');
            $('.m_hora_extras').show();
            $('.m_hora_extras_paciente_existente').hide();
            $('.m_hora_extras_paciente_nuevo').hide();
            $('#m_hora_extra_prereserva').val(0);
            $('#m_agendar_hora_extra_prereserva').val(0);
        }
        else
        {
            swal({
                title: "Lista de Espera",
                text: "Debe seleccionar un Profesional.",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }


    // BUSCAR PACIENTE
    function buscar_paciente_hora_extra()
    {
        $('#m_hora_extra_div_cargando').show();
        $('#m_hora_extra_div_boton_buscar_paciente').hide();

        let rut = $('#m_hora_extras_rut').val();

        if(rut != '')
        {
            // $('.m_hora_extras_busqueda').hide();
            $('.m_hora_extras_paciente_existente').hide();
            $('.m_hora_extras_paciente_nuevo').hide();

            let url = "{{ route('agenda.buscar_rut_paciente') }}";
            console.log(rut);
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    rut: rut,
                    id_profesional: $('#id_profesional').val(),
                },
            })
            .done(function(data) {
                console.log(data);
                $('#m_hora_extra_div_cargando').hide();
                $('#m_hora_extra_div_boton_buscar_paciente').show();

                if (data !== 'null')
                {
                    data = JSON.parse(data);
                    if(data.tipo_paciente == 'SI')
                    {
                        //  console.log(data);
                        $('.m_hora_extras_paciente_existente').show();

                        $('#m_hora_extras_ex_id_paciente').val(data.id);
                        $('#m_hora_extras_ex_rut_paciente').text(data.rut);
                        $('#m_hora_extras_ex_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
                        $('#m_hora_extras_ex_fecha_nacimiento').text(data.fecha_nac);
                        if (data.sexo == 'M') {
                            $('#m_hora_extras_ex_sexo').text('Masculino');
                        } else {
                            $('#m_hora_extras_ex_sexo').text('Femenino');
                        }
                        $('#m_hora_extras_ex_convenio').text(data.prevision.nombre);
                        $('#m_hora_extras_ex_direccion').text(data.direccion.direccion+' '+data.direccion.numero_dir+', '+data.direccion.ciudad.nombre);
                        $('#m_hora_extras_ex_email').text(data.email);
                        $('#m_hora_extras_ex_telefono').text(data.telefono_uno);


                        $('#m_hora_extras_rut').val('');
                        $('.m_hora_extras_busqueda').hide();
                    }
                    else
                    {
                        $('.m_hora_extras_busqueda').hide();
                        $('.m_hora_extras_paciente_existente').hide();
                        $('.m_hora_extras_paciente_nuevo').show();

                        $('#m_hora_extras_nv_rut_paciente').val(rut);

                        console.log(data.nombres);

                        if(data.nombres != null)
                        {
                            $('#m_hora_extras_nv_nombres_paciente').val(data.nombres);
                            $('#m_hora_extras_nv_apellido_uno').val(data.apellido_uno);
                            $('#m_hora_extras_nv_apellido_dos').val(data.apellido_dos);
                            $('#m_hora_extras_nv_fecha_nac').val(data.fecha_nac);
                            if(data.sexo != null)
                                $('#m_hora_extras_nv_sexo').val(data.sexo);
                            else
                                $('#m_hora_extras_nv_sexo').val(0);

                            $('#m_hora_extras_nv_convenio').val();
                            if(data?.["direccion"] !== undefined)
                            {
                                $('#m_hora_extras_nv_direccion').val(data.direccion.direccion);
                                $('#m_hora_extras_nv_numero_dir').val(data.direccion.numero_dir);
                                $('#m_hora_extras_nv_region').val(data.direccion.ciudad.id_region);
                                // $('#m_hora_extras_nv_ciudad').val();
                                buscar_ciudad_le('m_hora_extras_nv_region', 'm_hora_extras_nv_ciudad', data.direccion.id_ciudad);
                            }

                            $('#m_hora_extras_nv_correo').val(data.email);
                            $('#m_hora_extras_nv_telefono_uno').val(data.telefono_uno);

                            // INFORMACION DE PRE RESERVA

                            $('#m_he_prereserva_hora_nombres_paciente').val(data.nombres);
                            $('#m_he_prereserva_hora_apellido_uno').val(data.apellido_uno);
                            $('#m_he_prereserva_hora_apellido_dos').val(data.apellido_dos);
                            $('#m_he_prereserva_hora_correo').val(data.email);
                            $('#m_he_prereserva_hora_telefono_uno').val(data.telefono_uno);
                        }
                        else
                        {
                            $('#m_hora_extras_nv_nombres_paciente').val('');
                            $('#m_hora_extras_nv_apellido_uno').val('');
                            $('#m_hora_extras_nv_apellido_dos').val('');
                            $('#m_hora_extras_nv_fecha_nac').val('');
                            $('#m_hora_extras_nv_sexo').val(0);

                            $('#m_hora_extras_nv_convenio').val();
                            $('#m_hora_extras_nv_direccion').val('');
                            $('#m_hora_extras_nv_numero_dir').val('');
                            $('#m_hora_extras_nv_region').val('');
                            // $('#m_hora_extras_nv_ciudad').val();
                            buscar_ciudad_le('m_hora_extras_nv_region', 'm_hora_extras_nv_ciudad', 0);
                            $('#m_hora_extras_nv_correo').val('');
                            $('#m_hora_extras_nv_telefono_uno').val('');
                        }
                    }
                }
                else
                {
                    $('.m_hora_extras_busqueda').show();
                    $('.m_hora_extras_paciente_existente').hide();
                    $('.m_hora_extras_paciente_nuevo').hide();
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Buscar Paciente",
                text: 'Debe ingresar RUT para buscar.',
                icon: "error",
            });

            $('#m_hora_extra_div_cargando').hide();
            $('#m_hora_extra_div_boton_buscar_paciente').show();
        }
    };

    function agendar_he_ex()
    {
        $('#m_agendar_hora_extra_agendar_id_paciente').val($('#m_hora_extras_ex_id_paciente').val());
        carga_calendario_profesional_he();
        $('#m_agendar_hora_extra').modal('show');
        $('#m_hora_extras').modal('hide');
        cancelar_busqueda_horas_extras();
    }

    {{--  REGISTRO NUEVO PACIENTE GENERACION DE HORA  --}}
    function agendar_he_np()
    {
        // $('#he_agenda_agregar_paciente').modal('show');
        let url = "{{ route('agenda.paciente.nuevo') }}";
        let _token = $('#_token').val();

        let rut_paciente_reserva = $('#m_hora_extras_nv_rut_paciente').val();
        if (rut_paciente_reserva == '')
        {
            swal({
                title: "Error!",
                text: "Debe ingresar el Rut",
                icon: "error",
                type: "danger",
                DangerMode: true,
            });
            return false;
        }
        let reserva_hora_nombre = $('#m_hora_extras_nv_nombres_paciente').val();
        if (reserva_hora_nombre == '')
        {

            swal({
                title: "Error!",
                text: "Debe ingresar los nombres del paciente",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;
        }
        let reserva_hora_primer_apellido = $('#m_hora_extras_nv_apellido_uno').val();
        if (reserva_hora_primer_apellido == '')
        {
            swal({
                title: "Error!",
                text: "Debe ingresar el primer apellido",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return false;
        }
        let reserva_hora_segundo_apellido = $('#m_hora_extras_nv_apellido_dos').val();
        if (reserva_hora_segundo_apellido == '')
        {
            swal({
                title: "Error!",
                text: "Debe ingresar el segundo apellido",
                icon: "error",
                type: "danger",
                DangerMode: true,
            });
            return false;

        }
        let reserva_hora_fecha_nac = $('#m_hora_extras_nv_fecha_nac').val();
        if (reserva_hora_fecha_nac == '')
        {

            swal({
                title: "Error!",
                text: "Debe ingresar la fecha de nacimiento",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;

        }
        let reserva_hora_sexo = $('#m_hora_extras_nv_sexo').val();
        if (reserva_hora_sexo == '0')
        {

            swal({
                title: "Error!",
                text: "Debe seleccionar el del sexo del paciente",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });

            return;
        }
        let reserva_hora_convenio = $('#m_hora_extras_nv_convenio').val();
        if (reserva_hora_convenio == '0')
        {

            swal({
                title: "Error!",
                text: "Debe seleccionar la previsión del paciente",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;

        }
        let reserva_hora_direccion = $('#m_hora_extras_nv_direccion').val();
        if (reserva_hora_direccion == '')
        {

            swal({
                title: "Error!",
                text: "Debe ingresar una dirección",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;

        }
        let reserva_hora_numero_dir = $('#m_hora_extras_nv_numero_dir').val();
        if (reserva_hora_numero_dir == '')
        {

            swal({
                title: "Error!",
                text: "Debe ingresar un numero a su dirección",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;

        }
        let reserva_hora_comuna = $('#m_hora_extras_nv_ciudad').val();
        if (reserva_hora_comuna == '')
        {

            swal({
                title: "Error!",
                text: "Debe ingresar la región y la ciudad",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;

        }
        let reserva_hora_email = $('#m_hora_extras_nv_correo').val();
        if (reserva_hora_email == '')
        {

            swal({
                title: "Error!",
                text: "Debe ingresar el email",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;

        }
        let reserva_hora_telefono = $('#m_hora_extras_nv_telefono_uno').val();
        if (reserva_hora_telefono == '')
        {

            swal({
                title: "Error!",
                text: "Debe ingresar el teléfono",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;

        }

        let id_profesional = $('#agenda_profesional_asistente').val();
        let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();

        $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    rut: rut_paciente_reserva,
                    nombres: reserva_hora_nombre,
                    apellido_uno: reserva_hora_primer_apellido,
                    apellido_dos: reserva_hora_segundo_apellido,
                    fecha_nac: reserva_hora_fecha_nac,
                    sexo: reserva_hora_sexo,
                    id_prevision: reserva_hora_convenio,
                    direccion: reserva_hora_direccion,
                    numero_dir: reserva_hora_numero_dir,
                    id_ciudad: reserva_hora_comuna,
                    email: reserva_hora_email,
                    telefono_uno: reserva_hora_telefono
                },
            })
            .done(function(data) {
                if (data != null)
                {
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Paciente",
                            text: "Creado con exito.",
                            icon: "success",
                            buttons: "Aceptar",
                        });

                        $('#m_agendar_hora_extra_agendar_id_paciente').val(data.paciente_final);
                        carga_calendario_profesional_he();
                        $('#m_agendar_hora_extra').modal('show');
                        $('#m_hora_extras').modal('hide');
                        cancelar_busqueda_horas_extras();
                    }
                    else
                    {
                        swal({
                            title: "Paciente",
                            text: "Falla en el registo",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }

                }
                else
                {
                    swal({
                        title: "Paciente",
                        text: "Falla en el registo",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    };

    function agendar_he_np_prereserva()
    {
        // $('#he_agenda_agregar_paciente').modal('show');
        let url = "{{ route('agenda.paciente.nuevo.prereserva') }}";
        let _token = $('#_token').val();


        let rut_paciente_reserva = $('#m_hora_extras_nv_rut_paciente').val();
        if (rut_paciente_reserva == '')
        {
            swal({
                title: "Error!",
                text: "Debe ingresar el Rut",
                icon: "error",
                type: "danger",
                DangerMode: true,
            });
            return false;
        }
        let reserva_hora_nombre = $('#m_he_prereserva_hora_nombres_paciente').val();
        if (reserva_hora_nombre == '')
        {

            swal({
                title: "Error!",
                text: "Debe ingresar los nombres del paciente",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;
        }
        let reserva_hora_primer_apellido = $('#m_he_prereserva_hora_apellido_uno').val();
        if (reserva_hora_primer_apellido == '')
        {
            swal({
                title: "Error!",
                text: "Debe ingresar el primer apellido",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return false;
        }
        let reserva_hora_segundo_apellido = $('#m_he_prereserva_hora_apellido_dos').val();
        if (reserva_hora_segundo_apellido == '')
        {
            swal({
                title: "Error!",
                text: "Debe ingresar el segundo apellido",
                icon: "error",
                type: "danger",
                DangerMode: true,
            });
            return false;

        }
        let reserva_hora_email = $('#m_he_prereserva_hora_correo').val();
        if (reserva_hora_email == '')
        {

            swal({
                title: "Error!",
                text: "Debe ingresar el email",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;

        }
        let reserva_hora_telefono = $('#m_he_prereserva_hora_telefono_uno').val();
        if (reserva_hora_telefono == '')
        {

            swal({
                title: "Error!",
                text: "Debe ingresar el teléfono",
                icon: "error",
                type: "danger",
                DangerMode: true,

            });
            return;

        }

        let id_profesional = $('#agenda_profesional_asistente').val();
        let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();

        $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    rut: rut_paciente_reserva,
                    nombres: reserva_hora_nombre,
                    apellido_uno: reserva_hora_primer_apellido,
                    apellido_dos: reserva_hora_segundo_apellido,
                    email: reserva_hora_email,
                    telefono_uno: reserva_hora_telefono
                },
            })
            .done(function(data) {
                if (data != null)
                {
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Hora Extra Pre reserva",
                            text: "Creado con exito.",
                            icon: "success",
                            buttons: "Aceptar",
                        });

                        $('#m_agendar_hora_extra_agendar_id_paciente').val(data.paciente_final);
                        carga_calendario_profesional_he();
                        $('#m_agendar_hora_extra').modal('show');
                        $('#m_hora_extras').modal('hide');
                        cancelar_busqueda_horas_extras();
                        $('#m_hora_extra_prereserva').val(1);
                        $('#m_agendar_hora_extra_prereserva').val(1);
                        $('#he_reserva_hora_prereserva').val(1);
                    }
                    else
                    {
                        swal({
                            title: "Hora Extra Pre reserva",
                            text: "Falla en el registo",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }

                }
                else
                {
                    swal({
                        title: "Hora Extra Pre reserva",
                        text: "Falla en el registo",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    };

    function m_he_validar_email_agenda_prereserva()
    {
        // m_he_prereserva_hora_correo
        // m_he_mensaje_email_prereserva
        if ($("#m_he_prereserva_hora_correo").val() != '') {
            if ($("#m_he_prereserva_hora_correo").val().indexOf('@', 0) == -1 || $("#m_he_prereserva_hora_correo").val().indexOf(
                    '.', 0) == -1) {
                swal({
                    title: "El correo electrónico introducido no es correcto.",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                return false;
            }
        }
    }

    function m_he_validar_campo_telefono() {
        var telefono = $('#m_he_prereserva_hora_telefono_uno').val();
        var email = $('#m_he_prereserva_hora_correo').val();
        // if (email == '')
        {
            if (telefono != '')
            {
                var re = new RegExp(/^\x2b56[6-9][0-9]{8}$/i); //+56612341234
                if (re.test(telefono)) {

                    // if (validarEdad($('#reserva_hora_fecha_nac').val())) {
                    //     console.log("La edad es válida.");
                    //     // $('#btn_reserva_hora_telefono_uno_validar').attr('disabled', false);
                    // } else {
                    //     console.log("La edad no es válida.");
                    //     // $('#btn_reserva_hora_telefono_uno_validar').attr('disabled', true);
                    //     $("#m_hora_extra_guardar_prereserva_paciente").prop('disabled', true);
                    // }

                    $("#m_hora_extra_guardar_prereserva_paciente").prop('disabled', false);
                }
            }
        }
    }


</script>
