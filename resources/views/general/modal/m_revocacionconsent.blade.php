<div id="m_rev_cons" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_rev_cons" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Revocación consentimiento informado</h5>
                <button type="button" class="close" onclick="$('#m_rev_cons').modal('hide')" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="div_m_rev_cons_informacion_pasos_cons">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                Seleccione consentimiento a revocar
                            </div>
                        </div>
                    </div>
                </div>

                <!--TABLA-->
                <h6 class="text-c-blue mt-2 mb-0">Consentimientos informados activos</h6>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="display table table-striped table-xs dt-responsive datatable" style="width:100%"
                            id="m_rev_cons_table_activos">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sol. por</th>
                                    <th>Consentimiento</th>
                                    <th>Diagnostigo</th>
                                    <th>Cirugia</th>
                                    <th>F. Creación</th>
                                    {{-- <th>F. Aprobación</th> --}}
                                    <th>Estado</th>
                                    <th>Revocar</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-xl-12">
                        <p>1. Soy paciente del profesional <strong>Dr.{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong> a quien otorgué el Consentimiento Informado con fecha <span id="m_rev_cons_fecha_consentimiento"></span></p>
                    </div>
                </div>
                <div class="form-row">
                    <input type="hidden" name="m_rev_cons_id_consentimiento_activo" id="m_rev_cons_id_consentimiento_activo" value="">
                    <input type="hidden" name="m_rev_cons_esperando_aprobacion" id="m_rev_cons_esperando_aprobacion" value="0">

                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-12">
                        <label class="floating-label-activo-sm">Consentimiento</label>
                        <input type="text" class="form-control form-control-sm" id="m_rev_cons_consentimiento"name="m_rev_cons_consentimiento" value="" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-12">
                        <label class="floating-label-activo-sm">Diagnóstico</label>
                        <input type="text" class="form-control form-control-sm" id="m_rev_cons_diagnostico"name="m_rev_cons_diagnostico" value="" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-12">
                        <label class="floating-label-activo-sm">Cirugía o procedimiento propuesto</label>
                        <input type="text" class="form-control form-control-sm" id="m_rev_cons_cirugia"name="m_rev_cons_cirugia" value="" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="floating-label-activo-sm">Situaciones o motivos</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="m_rev_cons_motivo" id="m_rev_cons_motivo" placeholder="Me reservo el derecho de omitir el motivo"></textarea>
                    </div>
                </div>

                <div class="form-row" id="div_m_rev_cons_btn_aprobacion_solicitud" style="display:;">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button type="button" class="btn btn-info btn-sm btn-block" onclick="registar_solicitar_autorizacion_revocacion();">Solicitar autorización de Revocación</button>
                    </div>
                </div>

                <div class="form-row" id="div_m_rev_cons_btn_aprobacion_espera" style="display: none;">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border text-primary mt-1 mb-3" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

                <div class="form-row" id="div_m_rev_cons_btn_aprobacion_ok" style="display: none;">
                    <div class="form-group col-sm-6">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block"
                            id="m_rev_cons_btn_ver_pdf_cons_activa">Ver PDF</button>
                    </div>

                    <div class="form-group col-sm-6">
                        <button type="button" class="btn btn-success btn-sm btn-block">Enviar</button>
                    </div>

                    <div class="form-group col-sm-12">
                        <button type="button" class="btn btn-info btn-sm btn-block" onclick="limpiar_revocacion()">Crear nueva Revocación</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                        <p>2. Al autorizar mediante email o por la app.,Me doy por informado y revoco mi consentimiento para el procedimiento enunciado precedentemente</p>
                    </div>
                </div>

                <!--TABLA-->
                <h6 class="text-c-blue mt-2 mb-0">Reversas Consentimientos informados</h6>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="display table table-striped table-xs dt-responsive datatable" style="width:100%"
                            id="m_rev_cons_table_reversas">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sol. por</th>
                                    <th>Consentimiento</th>
                                    <th>Diagnostigo</th>
                                    <th>Cirugia</th>
                                    <th>F. Revocacion</th>
                                    <th>Observación</th>
                                    <th>Estado</th>
                                    <th>PDF</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /** revocacion de consentimientos informados */
    function cons_revtto() {
        $('#m_rev_cons').modal('show');
        mostrar_consentimientos_paciente_activas();
        mostrar_consentimientos_paciente_revocadas();
    }

    function mostrar_consentimientos_paciente_activas()
    {
        var id_paciente_fc = $('#id_paciente_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_ficha_atencion = $('#id_ficha_atencion').val();

        if(!id_ficha_atencion) id_ficha_atencion = $('#id_fc').val();

        let url = "{{ route('consentimiento.paciente.ver') }}";
        var _token = $('input[name=_token]').val();
        $('#m_rev_cons_table_activos tbody').html('');
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente_fc,
                id_lugar_atencion : id_lugar_atencion,
                id_ficha_atencion: id_ficha_atencion,
                confirmacion : '1',
                revocacion : '0',
            },
            success: (resp)=>{
                console.log(resp);
                html = '';
                if(resp.estado==1)
                {

                    let estado_log = ['En espera', 'Aprobado', 'Rechazado','Otro','Otro'];
                    $.each(resp.registros, function (key, value) {
                        var estado_log_valor = 0;
                        // var fecha_log = '-';
                        if(value.log_users_devices != null){
                            estado_log_valor = value.log_users_devices.estado;
                            // fecha_log = value.log_users_devices.updated_at;
                        }
                        html += '<tr>';
                        html += '    <td>'+value.id+'</td>';
                        html += '    <td>'+value.profesional.nombre+' '+value.profesional.apellido_uno+' '+value.profesional.apellido_dos+'</td>';
                        html += '    <td>'+value.consentimiento.nombre+'</td>';
                        html += '    <td>'+value.diagnostico_cons+'</td>';
                        html += '    <td>'+value.cirugia_cons+'</td>';
                        html += '    <td>'+value.fecha_cons+'</td>';
                        // html += '    <td>'+fecha_log+'</td>';
                        html += '    <td>'+estado_log[estado_log_valor]+'</td>';
                        html += '    <td><button class="btn btn-danger btn-xs" role="button" onclick="revocar_consentimiento(\''+value.id+'\',\''+value.consentimiento.nombre+'\', \''+value.diagnostico_cons+'\', \''+value.cirugia_cons+'\', \''+value.fecha_cons+'\');">Revocar</button></td>';
                        html += '</tr>';
                    });
                }

                $('#m_rev_cons_table_activos').DataTable().destroy();
                $('#m_rev_cons_table_activos tbody').html(html);
                $('#m_rev_cons_table_activos').DataTable({
                    responsive: true,
                });

            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    function revocar_consentimiento(id, consentimiento, diagnostico_cons, cirugia_cons, fecha_cons)
    {
        $('#div_m_rev_cons_btn_aprobacion_solicitud').show();
        $('#div_m_rev_cons_btn_aprobacion_espera').hide();
        // $('#m_rev_cons_esperando_aprobacion').val(0);

        $('#m_rev_cons_id_consentimiento_activo').val(id);
        $('#m_rev_cons_fecha_consentimiento').html(fecha_cons);
        $('#m_rev_cons_consentimiento').val(consentimiento);
        $('#m_rev_cons_diagnostico').val(diagnostico_cons);
        $('#m_rev_cons_cirugia').val(cirugia_cons);
        $('#m_rev_cons_motivo').val('Me reservo el derecho de omitir el motivo');
        $('#div_m_rev_cons_informacion_pasos_cons').hide();
    }

    function registar_solicitar_autorizacion_revocacion()
    {

        var id_consentimiento_pcte = $('#m_rev_cons_id_consentimiento_activo').val();
        var observaciones_rev = $('#m_rev_cons_motivo').val();
        var otro = '';
        var token = CSRF_TOKEN;

        var datos = {};
        datos._token = token;
        datos.id_consentimiento_pcte = id_consentimiento_pcte;
        datos.observaciones_rev = observaciones_rev;
        datos.otro = otro;

        $.ajax({
            url: "{{ route('consentimiento.revocacion.autorizacion') }}",
            type: 'post',
            dataType: "json",
            data: datos,
            success: function(data) {
                console.log(data);
                if(data.estado == 1)
                {
                    swal({
                        title: "Revocacion de Consentimiento Informado.",
                        text: 'Solicitud de revocación enviada.\n En Espera de aprobación.',
                        icon: "warning",
                    });
                    $('#div_m_rev_cons_btn_aprobacion_solicitud').hide();
                    $('#div_m_rev_cons_btn_aprobacion_espera').show();
                    $('#m_rev_cons_esperando_aprobacion').val(data.registro.token);

                    $('#m_rev_cons_id_consentimiento_activo').val(data.last_id);

                    checkTokenRevocacion('m_rev_cons_esperando_aprobacion', 'div_m_rev_cons_btn_aprobacion_ok', 'div_m_rev_cons_btn_aprobacion_espera','div_m_rev_cons_btn_aprobacion_solicitud');
                }
                else
                {
                    swal({
                        title: "Problema al enviar solicitud de aprobación de Revocación de Consentimiento Informado.",
                        text: data.msj,
                        icon: "warning",
                    });
                }
            }
        });
    }

    function enviar_revocacion(){
        var id_consentimiento_pcte = $('#m_rev_cons_id_consentimiento_activo').val();
        var observaciones_rev = $('#m_rev_cons_motivo').val();
        var otro = '';
        var token = CSRF_TOKEN;

        var datos = {};
        datos._token = token;
        datos.id_consentimiento_pcte = id_consentimiento_pcte;
        datos.observaciones_rev = observaciones_rev;
        datos.otro = otro;

        $.ajax({
            url: "{{ route('consentimiento.enviar.revocacion') }}",
            type: 'post',
            dataType: "json",
            data: datos,
            success: function(data) {
                console.log(data);
                if(data.estado == 1)
                {
                    swal({
                        title: "Revocación de Consentimiento Informado.",
                        text: 'Revocación enviada exitosamente.',
                        icon: "success",
                    });
                    limpiar_revocacion();
                }
                else
                {
                    swal({
                        title: "Problema al enviar Revocación de Consentimiento Informado.",
                        text: data.msj,
                        icon: "warning",
                    });
                }
            }
        });
    }

    function checkTokenRevocacion(input_token, div_mostrar, div_ocultar, div_solicitud)
    {
        let url = "{{ route('check_sdi_token') }}";
        var _token = $('input[name=_token]').val();
        var token = $('#'+input_token).val();
        $.ajax({
            url: url,
            type: "GET",
            data: {
                _token: _token,
                token:token
            },
            success: (resp)=>{
                if(resp.estado==1)
                {
                    if(resp.registro.estado==1)
                    {
                        $('#'+div_mostrar).show();
                        $('#'+div_ocultar).hide();
                        aceptarRevocacion(resp.registro.estado);
                        $('#m_rev_cons_btn_ver_pdf_cons_activa').click(function (e) {
                            e.preventDefault();
                            ver_pdf_revocacion($('#m_rev_cons_id_consentimiento_activo').val(), $('#id_fc').val());
                        });
                        mostrar_consentimientos_paciente_activas();
                        mostrar_consentimientos_paciente_revocadas();
                        $('#m_rev_cons_motivo').attr('disabled', true);
                    }
                    else if(resp.registro.estado==2)
                    {
                        $('#'+div_mostrar).hide();
                        $('#'+div_ocultar).hide();
                        $('#'+div_solicitud).show();
                        aceptarRevocacion(resp.registro.estado);
                        $('#m_rev_cons_btn_ver_pdf_cons_activa').click(function (e) {
                            e.preventDefault();
                        });

                        swal({
                            title: "Revocación de Consentimiento Informado.",
                            text: 'Revocación de Consentimiento Informado Rechazado\n Debe solicitar aprobación.',
                            icon: "warning",
                        });
                    }
                    else
                    {
                        setTimeout(checkTokenRevocacion(input_token, div_mostrar, div_ocultar,div_solicitud),3000);
                    }
                }
                else
                {
                    setTimeout(checkTokenRevocacion(input_token, div_mostrar, div_ocultar,div_solicitud),3000);
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    function aceptarRevocacion(estado)
    {
        var id_consentimiento = $('#m_rev_cons_id_consentimiento_activo').val();
        var token = $('#m_rev_cons_esperando_aprobacion').val();
        let url = "{{ route('consentimiento.estado.revocacion') }}";
        var _token = $('input[name=_token]').val();
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id_consentimiento : id_consentimiento,
                token : token,
                estado : estado,
                _token : _token,

            },
            success: (resp)=>{
                console.log(resp);
                if(resp.estado==1)
                {
                    console.log('registro actualizado');
                }
                else
                {
                    console.log('falla en actualizacion');
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    function ver_pdf_revocacion(id_consentimiento_pcte, id_ficha_atencion)
    {
        Fancybox.close();
        Fancybox.show(
            [
                {
                src: '{{ route("consentimiento.revocacion.pdf") }}?id_consentimiento='+id_consentimiento_pcte+'&id_ficha_atencion='+id_ficha_atencion,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }

    function limpiar_revocacion()
    {
        mostrar_consentimientos_paciente_activas();
        mostrar_consentimientos_paciente_revocadas();

        $('#m_rev_cons_motivo').attr('disabled', false);

        $('#m_rev_cons_id_consentimiento_activo').val('');
        $('#m_rev_cons_esperando_aprobacion').val('');
        $('#m_rev_cons_fecha_consentimiento').html('10-01-1900');
        $('#m_rev_cons_consentimiento').val('');
        $('#m_rev_cons_diagnostico').val('');
        $('#m_rev_cons_cirugia').val('');
        $('#m_rev_cons_motivo').val('Me reservo el derecho de omitir el motivo');
        $('#div_m_rev_cons_btn_aprobacion_solicitud').show();
        $('#div_m_rev_cons_btn_aprobacion_espera').hide();
        $('#div_m_rev_cons_btn_aprobacion_ok').hide();
    }

    function mostrar_consentimientos_paciente_revocadas()
    {
        var id_paciente_fc = $('#id_paciente_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_ficha_atencion = $('#id_fc').val();

        let url = "{{ route('consentimiento.paciente.ver') }}";
        var _token = $('input[name=_token]').val();
        $('#m_rev_cons_table_reversas tbody').html('');
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente_fc,
                id_lugar_atencion : id_lugar_atencion,
                id_ficha_atencion: id_ficha_atencion,
                revocacion : 1,
            },
            success: (resp)=>{
                console.log(resp);
                html = '';
                if(resp.estado==1)
                {

                    let estado_log = ['En espera', 'Revocado', 'Cancelada'];
                    $.each(resp.registros, function (key, value) {

                        html += '<tr>';
                        html += '    <td>'+value.id+'</td>';
                        html += '    <td>'+value.profesional.nombre+' '+value.profesional.apellido_uno+' '+value.profesional.apellido_dos+'</td>';
                        html += '    <td>'+value.consentimiento.nombre+'</td>';
                        html += '    <td>'+value.diagnostico_cons+'</td>';
                        html += '    <td>'+value.cirugia_cons+'</td>';
                        html += '    <td>'+value.fecha_revocacion+'</td>';
                        html += '    <td>'+value.observaciones_rev+'</td>';
                        html += '    <td>'+estado_log[value.revocacion]+'</td>';
                        html += '    <td><button class="btn btn-danger btn-xs" role="button" onclick="ver_pdf_revocacion(\''+value.id+'\', \''+$('#id_fc').val()+'\');">Ver PDF</button></td>';
                        html += '</tr>';
                    });
                }

                $('#m_rev_cons_table_reversas').DataTable().destroy();
                $('#m_rev_cons_table_reversas tbody').html(html);
                $('#m_rev_cons_table_reversas').DataTable({
                    responsive: true,
                });

            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }
</script>
