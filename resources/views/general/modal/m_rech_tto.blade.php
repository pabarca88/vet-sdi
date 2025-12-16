<div id="m_rech_tto" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_rech_tto" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia</h5>
				<button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
                <input type="hidden" name="m_rech_tto_id" id="m_rech_tto_id" value="0">
				<div class="form-row">
					<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p>1. Soy paciente del profesional <strong>Dr.{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong>.</p>
                        <p>2. Rechazo Voluntariamente el tratamiento indicado y propuesto por mi equipo médico.</p>
					</div>
				</div>
                <div class="form-row">
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Diagnóstico</label>
						<input type="text" class="form-control form-control-sm" id="m_rech_tto_diagnostico"name="m_rech_tto_diagnostico" value="">
					</div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Tratamiento, procedimiento y/o cirugia</label>
						<input type="text" class="form-control form-control-sm" id="m_rech_tto_tratamiento"name="m_rech_tto_tratamiento" value="">
					</div>

                   	<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Situaciones o motivos</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="m_rech_tto_motivo" id="m_rech_tto_motivo"></textarea>
                    </div>
                </div>

                <input type="hidden" name="m_rech_tto_esperando_aprobacion" id="m_rech_tto_esperando_aprobacion" value="0">

                <div class="form-row" id="div_m_rech_tto_btn_aprobacion_solicitud" style="display:;">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                        <button type="button" class="btn btn-info btn-sm btn-block" onclick="registar_solicitar_autorizacion_rechazo_tratamiento();">Solicitar autorización</button>
                    </div>
                </div>

                <div class="form-row" id="div_m_rech_tto_btn_aprobacion_espera" style="display: none;">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border text-primary mt-1 mb-3" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

                <div class="form-row" id="div_m_rech_tto_btn_aprobacion_ok" style="display: none;">
                    <div class="form-group col-sm-6">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block" id="btn_m_rech_tto_ver_pdf_cons_activa">Ver PDF</button>
                    </div>

                    <div class="form-group col-sm-6">
                        <button type="button" class="btn btn-success btn-sm btn-block">Enviar</button>
                    </div>
                </div>

				<div class="form-row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p>3. Al autorizar mediante email o por la app. Me hago responsable de esta solicitud y asumo las consecuencias que ésta implica</p>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>

<script>
    function rechtto() {
        $('#m_rech_tto').modal('show');
        limpiar_rechazo_trtt();
    }

    function registar_solicitar_autorizacion_rechazo_tratamiento()
    {

        var id_ficha_atencion = $('#id_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var diagnostico = $('#m_rech_tto_diagnostico').val();
        var tratamiento = $('#m_rech_tto_tratamiento').val();
        var observaciones = $('#m_rech_tto_motivo').val();
        var token = CSRF_TOKEN;

        var datos = {};
        datos._token = token;
        datos.id_ficha_atencion = id_ficha_atencion;
        datos.id_profesional = id_profesional;
        datos.id_paciente = id_paciente;
        datos.diagnostico = diagnostico;
        datos.tratamiento = tratamiento;
        datos.observaciones = observaciones;

        $.ajax({
            url: "{{ route('consentimiento.rechazo.tratamiento.registrar.autorizacion') }}",
            type: 'post',
            dataType: "json",
            data: datos,
            success: function(data) {
                // console.log(data);
                if(data.estado == 1)
                {
                    swal({
                        title: "Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia.",
                        text: 'Generado de forma exitosa.\n solicitud de aprobacion enviada.\n En Espera de aprobación.',
                        icon: "warning",
                    });
                    $('#div_m_rech_tto_btn_aprobacion_solicitud').hide();
                    $('#div_m_rech_tto_btn_aprobacion_espera').show();
                    $('#m_rech_tto_esperando_aprobacion').val(data.autorizacion.registro.token);

                    $('#m_rech_tto_id').val(data.last_id);

                    checkTokenRechazoTrtt('m_rech_tto_esperando_aprobacion', 'div_m_rech_tto_btn_aprobacion_ok', 'div_m_rech_tto_btn_aprobacion_espera','div_m_rech_tto_btn_aprobacion_solicitud');
                }
                else
                {
                    var texto_error = '';

                    if(data.registro.estado ==  0)
                    {
                        if('error' in data.registro)
                        {
                            $.each(data.registro.error, function (indexInArray, valueOfElement) {
                                texto_error += indexInArray+': '+valueOfElement+'\n';
                            });
                        }
                    }
                    swal({
                        title: "Problema al generar Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia.",
                        text: data.msj+'\n'+texto_error,
                        icon: "warning",
                    });
                }
            }
        });
    }

    function checkTokenRechazoTrtt(input_token, div_mostrar, div_ocultar, div_solicitud)
    {
        console.log('checkTokenRechazoTrtt');
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
                        aceptarAprobacionRechazoTrtt(resp.registro.estado);
                        $('#btn_m_rech_tto_ver_pdf_cons_activa').click(function (e) {
                            e.preventDefault();
                            ver_pdf_consentimiento_rechazo_trtt($('#m_rech_tto_id').val(), $('#id_fc').val());
                        });

                        $('#m_rech_tto_diagnostico').attr('disabled', true);
                        $('#m_rech_tto_tratamiento').attr('disabled', true);
                        $('#m_rech_tto_motivo').attr('disabled', true);
                    }
                    else if(resp.registro.estado==2)
                    {
                        $('#'+div_mostrar).hide();
                        $('#'+div_ocultar).hide();
                        $('#'+div_solicitud).show();
                        aceptarAprobacionRechazoTrtt(resp.registro.estado);

                        $('#btn_m_rech_tto_ver_pdf_cons_activa').click(function (e) {
                            e.preventDefault();
                        });

                        swal({
                            title: "Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia.",
                            text: 'Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia Rechazado\n Debe solicitar aprobación.',
                            icon: "warning",
                        });
                    }
                    else
                    {
                        setTimeout(checkTokenRechazoTrtt(input_token, div_mostrar, div_ocultar,div_solicitud),3000);
                    }
                }
                else
                {
                    setTimeout(checkTokenRechazoTrtt(input_token, div_mostrar, div_ocultar,div_solicitud),3000);
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    function aceptarAprobacionRechazoTrtt(estado)
    {
        // console.log('aceptarAprobacionRechazoTrtt');
        var id_rechazo_trtt = $('#m_rech_tto_id').val();
        var token = $('#m_rech_tto_esperando_aprobacion').val();
        let url = "{{ route('consentimiento.rechazo.tratamiento.estado.autorizacion') }}";
        var _token = $('input[name=_token]').val();
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id_rechazo_trtt : id_rechazo_trtt,
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

    function ver_pdf_consentimiento_rechazo_trtt(id_rechazo_trtt, id_ficha_atencion)
    {
        Fancybox.close();
        Fancybox.show(
            [
                {
                src: '{{ route("consentimiento.rechazo.tratamiento.pdf") }}?id_rechazo_trtt='+id_rechazo_trtt+'&id_ficha_atencion='+id_ficha_atencion,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }

    function limpiar_rechazo_trtt()
    {
        $('#m_rech_tto_id').val('');
        $('#m_rech_tto_diagnostico').val('');
        $('#m_rech_tto_diagnostico').attr('disabled', false);
        $('#m_rech_tto_tratamiento').val('');
        $('#m_rech_tto_tratamiento').attr('disabled', false);
        $('#m_rech_tto_motivo').val('');
        $('#m_rech_tto_motivo').attr('disabled', false);
        $('#m_rech_tto_esperando_aprobacion').val('');
        $('#div_m_rech_tto_btn_aprobacion_solicitud').show();
        $('#div_m_rech_tto_btn_aprobacion_espera').hide();
        $('#div_m_rech_tto_btn_aprobacion_ok').hide();
    }


</script>
