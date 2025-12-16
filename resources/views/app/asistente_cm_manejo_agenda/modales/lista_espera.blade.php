<div class="modal fade" id="m_lista_espera" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_lista_espera" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Lista de Espera profesional....</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="clasificacion" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-modal active" id="lista_espera_tab" data-toggle="pill" href="#lista_espera" role="tab" aria-controls="lista_espera" aria-selected="true">Lista de Espera</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-modal" id="inscribir_lista_espera_tab" data-toggle="pill" href="#inscribir_lista_espera" role="tab" aria-controls="inscribir_lista_espera" aria-selected="false">Inscribir</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content">
                            <!--TABLA DE LISTA DE ESPERA-->
                            <div class="tab-pane fade show active" id="lista_espera" role="tabpanel" aria-labelledby="lista_espera_tab">
                                <div class="row mt-2">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <h5 class="text-info">Lista de Espera</h5>
                                        <hr class="mt-0">
                                    </div>
                                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $lugares_atencion->id }}">
                                    <div class="col-sm-12 col-md-12 mb-3">
                                        <div class="table-responsive">
                                            <table id="tabla_lista_espera" class="display table-bordered table table-striped dt-responsive nowrap table-xs text-wrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-left">RUT</th>
                                                        <th class="align-left">NOMBRE</th>
                                                        <th class="align-left">APELLIDOS</th>
                                                        <th class="align-left">EMAIL</th>
                                                        <th class="align-left">TELÉFONO</th>
                                                        <th class="align-left">ACCIÓN</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    {{--
                                                    <tr>
                                                        <td class="align-left">6187674-K</td>
                                                        <td class="align-left">JAIME</td>
                                                        <td class="align-left">KRIMAN</td>
                                                        <td class="align-left">JKRIMAN@GMAIL.COM</td>
                                                        <td class="align-left">+56995474660</td>
                                                        <td class="align-left">
                                                            <div class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Confirmar" onclick="confirmar_hora('','Telefonica');">C</div>
                                                            <div class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"data-placement="top" title="Cancelar" onclick="cancelar_hora('','Telefonica');">CN</div>
                                                            <div class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip"data-placement="top" title="No contesta" onclick="no_contesta('', '', 'Telefonica');">NoC</div>
                                                        </td>
                                                    </tr>
                                                    --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FORMULARIO  -->
                            <div class="tab-pane fade" id="inscribir_lista_espera" role="tabpanel" aria-labelledby="inscribir_lista_espera_tab">

                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                                <div class="row mt-2">
                                    <div class="m_lista_espera_busqueda">
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
                                                    <input type="text" id="m_lista_espera_rut" name="m_lista_espera_rut" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4 mb-3">
                                                <button class="btn btn-info" onclick="buscar_paciente_lista_espera();" type="button"id="button-addon2">Buscar</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m_lista_espera_paciente_existente" style="display: none">
                                        <div class="row mx-3">
                                            <input type="hidden" name="m_lista_espera_ex_id_paciente" id="m_lista_espera_ex_id_paciente" value="">
                                            <table class="table table-borderless table-xs">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Rut</strong>
                                                            <td><span id="m_lista_espera_ex_rut_paciente"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Nombre</strong>
                                                            <td><span id="m_lista_espera_ex_nombre"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Fecha Nacimiento</strong>
                                                            <td><span id="m_lista_espera_ex_fecha_nacimiento"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Sexo</strong>
                                                            <td><span id="m_lista_espera_ex_sexo"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Convenio</strong>
                                                            <td><span id="m_lista_espera_ex_convenio"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Dirección</strong>
                                                            <td><span id="m_lista_espera_ex_direccion"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Correo Electrónico</strong>
                                                            <td id="m_lista_espera_ex_email"></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Teléfono</strong>
                                                            <td><span id="m_lista_espera_ex_telefono"></span></td>
                                                        </th>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Observacion de Lista Espera</strong>
                                                            <td>
                                                                <textarea class="form-control form-control-sm" name="m_lista_espera_ex_observacion" id="m_lista_espera_ex_observacion" cols="30" rows="10"></textarea>
                                                            </td>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="modal-footer">
                                                <button type="button" onclick="cancelar_busqueda();"class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                <button type="button" onclick="registrar_le_ex();" class="btn btn-info">Registrar</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m_lista_espera_paciente_nuevo" style="display: none">
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
                                                        <input type="text" required class="form-control form-control-sm" name="m_lista_espera_nv_rut_paciente" id="m_lista_espera_nv_rut_paciente" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Nombres</label>
                                                        <input type="text" required class="form-control form-control-sm" name="m_lista_espera_nv_nombres_paciente" id="m_lista_espera_nv_nombres_paciente">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                                        <input type="text" class="form-control form-control-sm" name="m_lista_espera_nv_apellido_uno" id="m_lista_espera_nv_apellido_uno">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                        <input type="text" class="form-control form-control-sm" name="m_lista_espera_nv_apellido_dos" id="m_lista_espera_nv_apellido_dos">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                        <input type="date" class="form-control form-control-sm" name="m_lista_espera_nv_fecha_nac" id="m_lista_espera_nv_fecha_nac">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Sexo</label>
                                                        <select id="m_lista_espera_nv_sexo" name="m_lista_espera_nv_sexo" class="form-control form-control-sm">
                                                            <option value="0">Selecione una opci&oacute;n</option>
                                                            <option value="F">Femenino</option>
                                                            <option value="M">Masculino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                                        <select id="m_lista_espera_nv_convenio" name="m_lista_espera_nv_convenio" class="form-control form-control-sm">
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
                                                        <input type="address" class="form-control form-control-sm" name="m_lista_espera_nv_direccion" id="m_lista_espera_nv_direccion">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                                        <input type="address" class="form-control form-control-sm" name="m_lista_espera_nv_numero_dir" id="m_lista_espera_nv_numero_dir">
                                                    </div>
                                                </div>


                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Region</label>
                                                        <select class="form-control" name="m_lista_espera_nv_region" id="m_lista_espera_nv_region" onchange="buscar_ciudad_le('m_lista_espera_nv_region', 'm_lista_espera_nv_ciudad', '0');" required>
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
                                                        <select class="form-control" id="m_lista_espera_nv_ciudad" name="m_lista_espera_nv_ciudad" required>
                                                            <option value="0">Seleccione Ciudad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                        <input type="text" class="form-control form-control-sm" name="m_lista_espera_nv_correo" id="m_lista_espera_nv_correo">
                                                        <span id="mensaje_email_reserva" style="display:none"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                        <input type="tel" class="form-control form-control-sm" name="m_lista_espera_nv_telefono_uno" id="m_lista_espera_nv_telefono_uno">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Observacion de lista de espera</label>
                                                        <textarea class="form-control form-control-sm" name="m_lista_espera_nv_observacion" id="m_lista_espera_nv_observacion" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="cancelar_busqueda();"class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                <button type="button" onclick="registrar_le_np();" class="btn btn-info">Registrar</button>
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
                <button type="button" class="btn btn-danger align-middle" onclick="cerrarModal()"; data-dismiss="modal">Cerrar Modal</button>
            </div>
        </div>
    </div>
</div>

@include('app.asistente_cm_manejo_agenda.modales.lista_espera_eliminar')
@include('app.asistente_cm_manejo_agenda.modales.lista_espera_agendar')

<script>

    /** CERRAR MODAL */
    function cerrarModal() {
        $('#m_lista_espera').modal('hide');
    }

    /** ABRIR MODAL DE LISTA DE ESPERA */
    function lista_espera()
    {
        if($('#agenda_profesional_asistente').val()!=='')
        {
            cargarListaEsperaPorProfesional();
            $('#m_lista_espera_rut').val('');
            $('.div_rut_buscar').show();
            $('.m_lista_espera_busqueda').show();
            $('.m_lista_espera_paciente_existente').hide();
            $('.m_lista_espera_paciente_nuevo').hide();
        }
        else
        {
            swal({
                title: "Lista de Espera",
                text: "Debe seleccionar un Profesional.",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
        }
    }

    /** CARGA INFORMACION DE LISTA ESPERA DEL PROFESIONAL */
    function cargarListaEsperaPorProfesional()
    {
        var body = $('#tabla_lista_espera tbody');
            $('#tabla_lista_espera').dataTable().fnClearTable();
            $('#tabla_lista_espera').dataTable().fnDestroy();
            body.empty();

            url = "{{ route('lista.espera.buscar.por.profesional') }}";
            let id_profesional = $('#agenda_profesional_asistente').val();
            let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();

            var data = {
                id_profesional:id_profesional,
                id_lugar_atencion:id_lugar_atencion,
            }

            $.ajax({
                url: url,
                type: "get",
                data: data
            })
            .done(function(data) {

                if (data.estado == 1)
                {
                    console.log(data.registros);

                    for (i = 0; i < data.registros.length; i++)
                    {

                        var fila = '';
                        fila += '<tr>';
                        fila += '    <td class="align-left">'+data.registros[i].paciente.rut+'</td>';
                        fila += '    <td class="align-left">'+data.registros[i].paciente.nombres+'</td>';
                        fila += '    <td class="align-left">'+data.registros[i].paciente.apellido_uno+' '+data.registros[i].paciente.apellido_dos+'</td>';
                        fila += '    <td class="align-left">'+data.registros[i].paciente.email+'</td>';
                        fila += '    <td class="align-left">'+data.registros[i].paciente.telefono_uno+'</td>';
                        fila += '    <td class="align-left">';
                        fila += '        <div class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Agendar" onclick="abrir_agendar_lista_epera(\''+data.registros[i].id+'\', \''+data.registros[i].id_paciente+'\');">Agendar</div>';
                        fila += '        <div class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="abrir_elimina_lista_epera(\''+data.registros[i].id+'\');">Eliminar</div>';
                        fila += '    </td>';
                        fila += '</tr>';

                        body.append(fila);
                    }

                    $('#tabla_lista_espera').DataTable({
                        responsive: true,
                    });

                }
                else
                {
                    body.empty();
                    $('#tabla_lista_espera').dataTable().fnClearTable();
                    $('#tabla_lista_espera').dataTable().fnDestroy();
                    var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>'
                    body.append(fila);
                    $('#tabla_lista_espera').DataTable({
                        responsive: true,
                    });
                }
                $('#m_lista_espera').modal('show');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    /** BUSCAR PACIENTE POR RUT */

    // CANCELAR BBUSQUEDA
    function cancelar_busqueda()
    {
        /** LIMPIEZA BUSQEUDA */
        $('#m_lista_espera_rut').val('');

        /** LIMPIEZA DE EXISTENTES */
        $('#m_lista_espera_ex_id_paciente').val('');
        $('#m_lista_espera_ex_rut_paciente').text('');
        $('#m_lista_espera_ex_nombre').text('');
        $('#m_lista_espera_ex_fecha_nacimiento').text('');
        $('#m_lista_espera_ex_sexo').text('');
        $('#m_lista_espera_ex_sexo').text('');
        $('#m_lista_espera_ex_convenio').text('');
        $('#m_lista_espera_ex_direccion').text('');
        $('#m_lista_espera_ex_email').text('');
        $('#m_lista_espera_ex_telefono').text('');
        $('#m_lista_espera_ex_observacion').text('');

        /** LIMPIAR FORMULARIO */
        $('#m_lista_espera_nv_rut_paciente').val('');
        $('#m_lista_espera_nv_nombres_paciente').val('');
        $('#m_lista_espera_nv_apellido_uno').val('');
        $('#m_lista_espera_nv_apellido_dos').val('');
        $('#m_lista_espera_nv_fecha_nac').val('');
        $('#m_lista_espera_nv_sexo').val(0);
        $('#m_lista_espera_nv_convenio').val(0);
        $('#m_lista_espera_nv_direccion').val('');
        $('#m_lista_espera_nv_numero_dir').val('');
        $('#m_lista_espera_nv_region').val('');
        // $('#m_lista_espera_nv_ciudad').val('');
        buscar_ciudad_le('m_lista_espera_nv_region', 'm_lista_espera_nv_ciudad', '0');
        $('#m_lista_espera_nv_correo').val('');
        $('#m_lista_espera_nv_telefono_uno').val('');
        $('#m_lista_espera_nv_observacion').val('');

        /** VISUALIZACION DE  DIV */
        $('.m_lista_espera_busqueda').show();
        $('.m_lista_espera_paciente_existente').hide();
        $('.m_lista_espera_paciente_nuevo').hide();
    }

    // BUSCAR PACIENTE
    function buscar_paciente_lista_espera() {

        let rut = $('#m_lista_espera_rut').val();
        // $('.m_lista_espera_busqueda').hide();
        $('.m_lista_espera_paciente_existente').hide();
        $('.m_lista_espera_paciente_nuevo').hide();

        let url = "{{ route('agenda.buscar_rut_paciente') }}";
        console.log(rut);
        $.ajax({
            url: url,
            type: "GET",
            data: {
                rut: rut,
            },
        })
        .done(function(data) {


            if (data !== 'null') {
                data = JSON.parse(data);
                if(data.tipo_paciente == 'SI')
                {
                    //  console.log(data);
                    $('.m_lista_espera_paciente_existente').show();

                    $('#m_lista_espera_ex_id_paciente').val(data.id);
                    $('#m_lista_espera_ex_rut_paciente').text(data.rut);
                    $('#m_lista_espera_ex_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
                    $('#m_lista_espera_ex_fecha_nacimiento').text(data.fecha_nac);
                    if (data.sexo == 'M') {
                        $('#m_lista_espera_ex_sexo').text('Masculino');
                    } else {
                        $('#m_lista_espera_ex_sexo').text('Femenino');
                    }
                    $('#m_lista_espera_ex_convenio').text(data.prevision.nombre);
                    $('#m_lista_espera_ex_direccion').text(data.direccion.direccion+' '+data.direccion.numero_dir+', '+data.direccion.ciudad.nombre);
                    $('#m_lista_espera_ex_email').text(data.email);
                    $('#m_lista_espera_ex_telefono').text(data.telefono_uno);


                    $('#m_lista_espera_rut').val('');
                    $('.m_lista_espera_busqueda').hide();
                }
                else
                {
                    $('.m_lista_espera_busqueda').hide();
                    $('.m_lista_espera_paciente_existente').hide();
                    $('.m_lista_espera_paciente_nuevo').show();

                    $('#m_lista_espera_nv_rut_paciente').val(rut);

                    console.log(data.nombres);

                    if(data.nombres != null)
                    {
                        $('#m_lista_espera_nv_nombres_paciente').val(data.nombres);
                        $('#m_lista_espera_nv_apellido_uno').val(data.apellido_uno);
                        $('#m_lista_espera_nv_apellido_dos').val(data.apellido_dos);
                        $('#m_lista_espera_nv_fecha_nac').val(data.fecha_nac);
                        if(data.sexo != null)
                            $('#m_lista_espera_nv_sexo').val(data.sexo);
                        else
                            $('#m_lista_espera_nv_sexo').val(0);

                        $('#m_lista_espera_nv_convenio').val();
                        $('#m_lista_espera_nv_direccion').val(data.direccion.direccion);
                        $('#m_lista_espera_nv_numero_dir').val(data.direccion.numero_dir);
                        $('#m_lista_espera_nv_region').val(data.direccion.ciudad.id_region);
                        // $('#m_lista_espera_nv_ciudad').val();
                        buscar_ciudad_le('m_lista_espera_nv_region', 'm_lista_espera_nv_ciudad', data.direccion.id_ciudad);
                        $('#m_lista_espera_nv_correo').val(data.email);
                        $('#m_lista_espera_nv_telefono_uno').val(data.telefono_uno);
                    }
                    else
                    {
                        $('#m_lista_espera_nv_nombres_paciente').val('');
                        $('#m_lista_espera_nv_apellido_uno').val('');
                        $('#m_lista_espera_nv_apellido_dos').val('');
                        $('#m_lista_espera_nv_fecha_nac').val('');
                        $('#m_lista_espera_nv_sexo').val(0);

                        $('#m_lista_espera_nv_convenio').val();
                        $('#m_lista_espera_nv_direccion').val('');
                        $('#m_lista_espera_nv_numero_dir').val('');
                        $('#m_lista_espera_nv_region').val('');
                        // $('#m_lista_espera_nv_ciudad').val();
                        buscar_ciudad_le('m_lista_espera_nv_region', 'm_lista_espera_nv_ciudad', 0);
                        $('#m_lista_espera_nv_correo').val('');
                        $('#m_lista_espera_nv_telefono_uno').val('');
                    }


                }
            }
            else
            {
                $('.m_lista_espera_busqueda').show();
                $('.m_lista_espera_paciente_existente').hide();
                $('.m_lista_espera_paciente_nuevo').hide();
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    /** REGISTRO DE LISTA DE ESPERA EXISTENTE */
    function registrar_le_ex()
    {
        // let id_institucion = $('#m_lista_espera_ex_id_paciente').val();
        let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
        let id_profesional = $('#agenda_profesional_asistente').val();
        let id_paciente = $('#m_lista_espera_ex_id_paciente').val();
        let observacion = $('#m_lista_espera_ex_observacion').val();
        let _token = CSRF_TOKEN;

        let url = "{{ route('lista.espera.registrar.existente') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_lugar_atencion : id_lugar_atencion,
                id_profesional : id_profesional,
                id_paciente : id_paciente,
                observacion : observacion,
            },
        })
        .done(function(data) {
            if (data != null)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Registro a lista de espera",
                        text: 'Registro exitoso',
                        icon: "success",
                        buttons: "Aceptar"
                    });

                    cargarListaEsperaPorProfesional();
                    cancelar_busqueda();
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += indexInArray+': '+valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Registro a lista de espera",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }

            }
            else
            {
                swal({
                    title: "Registro a lista de espera",
                    text: "Error al registrar",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    /** REGISTRO DE LISTA DE ESPERA NUEVO */
    function registrar_le_np()
    {
        let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
        let id_profesional = $('#agenda_profesional_asistente').val();

        let rut_paciente = $('#m_lista_espera_nv_rut_paciente').val();
        let nombres_paciente = $('#m_lista_espera_nv_nombres_paciente').val();
        let apellido_uno = $('#m_lista_espera_nv_apellido_uno').val();
        let apellido_dos = $('#m_lista_espera_nv_apellido_dos').val();
        let fecha_nac = $('#m_lista_espera_nv_fecha_nac').val();
        let sexo = $('#m_lista_espera_nv_sexo').val();
        let convenio = $('#m_lista_espera_nv_convenio').val();
        let direccion = $('#m_lista_espera_nv_direccion').val();
        let numero_dir = $('#m_lista_espera_nv_numero_dir').val();
        let region = $('#m_lista_espera_nv_region').val();
        let ciudad = $('#m_lista_espera_nv_ciudad').val();
        let correo = $('#m_lista_espera_nv_correo').val();
        let telefono_uno = $('#m_lista_espera_nv_telefono_uno').val();
        let observacion = $('#m_lista_espera_nv_observacion').val();
        let _token = CSRF_TOKEN;

        var valido = 1;
        var mensaje_req = '';

        if(rut_paciente=='')
        {
            $('#m_lista_espera_nv_rut_paciente').focus();
            mensaje_req += 'RUT\n';
            valido = 0;
        }
        if(nombres_paciente=='')
        {
            $('#m_lista_espera_nv_nombres_paciente').focus();
            mensaje_req += 'Nombre\n';
            valido = 0;
        }
        if(apellido_uno=='')
        {
            $('#m_lista_espera_nv_apellido_uno').focus();
            mensaje_req += 'Primer Apellido\n';
            valido = 0;
        }
        if(apellido_dos=='')
        {
            $('#m_lista_espera_nv_apellido_dos').focus();
            mensaje_req += 'Segundo Apellido\n';
            valido = 0;
        }
        if(fecha_nac=='')
        {
            $('#m_lista_espera_nv_fecha_nac').focus();
            mensaje_req += 'Fecha Nacimiento\n';
            valido = 0;
        }
        if(sexo=='0')
        {
            $('#m_lista_espera_nv_sexo').focus();
            mensaje_req += 'Sexo\n';
            valido = 0;
        }
        if(convenio=='0')
        {
            $('#m_lista_espera_nv_convenio').focus();
            mensaje_req += 'Convenio\n';
            valido = 0;
        }
        if(direccion=='')
        {
            $('#m_lista_espera_nv_direccion').focus();
            mensaje_req += 'Dirección\n';
            valido = 0;
        }
        // if(numero_dir=='')
        // {
        //     $('#m_lista_espera_nv_numero_dir').focus();
        //     mensaje_req += 'Depto. | Ofic.\n';
        //     valido = 0;
        // }
        if(region=='0')
        {
            $('#m_lista_espera_nv_region').focus();
            mensaje_req += 'Region\n';
            valido = 0;
        }
        if(ciudad=='0')
        {
            $('#m_lista_espera_nv_ciudad').focus();
            mensaje_req += 'Ciudad\n';
            valido = 0;
        }
        if(correo=='')
        {
            $('#m_lista_espera_nv_correo').focus();
            mensaje_req += 'Correo\n';
            valido = 0;
        }
        if(telefono_uno=='')
        {
            $('#m_lista_espera_nv_telefono_uno').focus();
            mensaje_req += 'Teléfono\n';
            valido = 0;
        }

        if(valido == 1)
        {
            let url = "{{ route('lista.espera.registrar.nuevo') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_lugar_atencion : id_lugar_atencion,
                    id_profesional : id_profesional,
                    rut : rut_paciente,
                    nombres : nombres_paciente,
                    apellido_uno : apellido_uno,
                    apellido_dos : apellido_dos,
                    fecha_nac : fecha_nac,
                    sexo : sexo,
                    convenio : convenio,
                    direccion : direccion,
                    numero_dir : numero_dir,
                    region : region,
                    ciudad : ciudad,
                    correo : correo,
                    telefono_uno : telefono_uno,
                    observacion : observacion,
                },
            })
            .done(function(data) {
                if (data != null)
                {
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Registro a lista de espera",
                            text: 'Registro exitoso',
                            icon: "success",
                            buttons: "Aceptar"
                        });

                        cargarListaEsperaPorProfesional();
                        cancelar_busqueda();
                    }
                    else
                    {
                        var mensaje = '';
                        if(data.error)
                        {
                            $.each(data.error, function (indexInArray, valueOfElement)
                            {
                                mensaje += indexInArray+': '+valueOfElement+'\n';
                            });
                        }
                        else
                        {
                            mensaje += 'Intente nuevamente.';
                        }

                        swal({
                            title: "Registro a lista de espera",
                            text: mensaje,
                            icon: "error",
                            buttons: "Aceptar"
                        });
                    }

                }
                else
                {
                    swal({
                        title: "Registro a lista de espera",
                        text: "Error al registrar",
                        icon: "error",
                        buttons: "Aceptar"
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
                title: "Registro a lista de espera - Campos requeridos",
                text: mensaje_req,
                icon: "success",
                buttons: "Aceptar"
            });
        }
    }

    // BUSCAR CIUDAD
    function buscar_ciudad_le(input_region, input_ciudad, id_ciudad=0)
    {
        var region = $('#'+input_region).val();

        let url = "{{ route('home.buscar_ciudad_region') }}";
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

                let ciudades = $('#'+input_ciudad);

                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })

                if(id_ciudad != 0)
                {
                    ciudades.val(id_ciudad);
                }

            } else {

                swal({
                    title: "Error",
                    text: "Error al cargar las ciudades",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });

                let ciudades = $('#'+input_ciudad);
                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione</option>');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };



</script>
