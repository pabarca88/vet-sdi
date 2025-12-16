<div id="modal_solalta" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="modal_solalta" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Solicitud de alta voluntaria </h5>
				<button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			<div class="modal-body">
                <input type="hidden" name="modal_solalta_id" id="modal_solalta_id" value="0">
				<div class="form-row">
					<div class="form-group col-sm-12 col-md-12 col-xl-12">
						<p>1. Soy paciente del profesional <strong>Dr.{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong>.</p>
                        <p>2. Principalmente por motivos personales , es que solicito mi Alta Voluntaria.</p>
					</div>
				</div>
                <div class="form-row">
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label">Diagnóstico</label>
						<input type="text" class="form-control form-control-sm" id="modal_solalta_diagnostico" name="modal_solalta_diagnostico" value="">
					</div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Situaciones o motivos</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="modal_solalta_motivo" id="modal_solalta_motivo" placeholder="Me reservo el derecho de omitir el motivo"></textarea>
                    </div>
                </div>

                <input type="hidden" name="modal_solalta_esperando_aprobacion" id="modal_solalta_esperando_aprobacion" value="0">

                <div class="form-row" id="div_modal_solalta_btn_aprobacion_solicitud" style="display:;">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                        <button type="button" class="btn btn-info btn-sm btn-block" onclick="registar_solicitar_autorizacion_alta_voluntaria();">Solicitar autorización</button>
                    </div>
                </div>

                <div class="form-row" id="div_modal_solalta_btn_aprobacion_espera" style="display: none;">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border text-primary mt-1 mb-3" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

                <div class="form-row" id="div_modal_solalta_btn_aprobacion_ok" style="display: none;">
                    <div class="form-group col-sm-6">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block" id="btn_modal_solalta_ver_pdf_cons_activa">Ver PDF</button>
                    </div>

                    <div class="form-group col-sm-6">
                        <button type="button" class="btn btn-success btn-sm btn-block">Enviar</button>
                    </div>
                </div>

				<div class="form-row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p>3. Al autorizar mediante email o por la app.,Me hago responsable de esta solicitud y asumo las consecuencias que ésta implica</p>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>

<script>
    /** solicitud de alta */
    function solalta() {
        $('#modal_solalta').modal('show');
        limpiar_solicitud_alta();
    }

    function registar_solicitar_autorizacion_alta_voluntaria()
    {

        var id_ficha_atencion = $('#id_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var diagnostico = $('#modal_solalta_diagnostico').val();
        var observaciones = $('#modal_solalta_motivo').val();
        var token = CSRF_TOKEN;

        var datos = {};
        datos._token = token;
        datos.id_ficha_atencion = id_ficha_atencion;
        datos.id_profesional = id_profesional;
        datos.id_paciente = id_paciente;
        datos.diagnostico = diagnostico;
        datos.observaciones = observaciones;

        $.ajax({
            url: "{{ route('consentimiento.solicitud.alta.registrar.autorizacion') }}",
            type: 'post',
            dataType: "json",
            data: datos,
            success: function(data) {
                // console.log(data);
                if(data.estado == 1)
                {
                    swal({
                        title: "Solicitud de Alta Voluntaria.",
                        text: 'Generado de forma exitosa.\n solicitud de aprobacion enviada.\n En Espera de aprobación.',
                        icon: "warning",
                    });
                    $('#div_modal_solalta_btn_aprobacion_solicitud').hide();
                    $('#div_modal_solalta_btn_aprobacion_espera').show();
                    $('#modal_solalta_esperando_aprobacion').val(data.autorizacion.registro.token);

                    $('#modal_solalta_id').val(data.last_id);

                    checkTokenSolicitudAlta('modal_solalta_esperando_aprobacion', 'div_modal_solalta_btn_aprobacion_ok', 'div_modal_solalta_btn_aprobacion_espera','div_modal_solalta_btn_aprobacion_solicitud');
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
                        title: "Problema al generar Solicitud de Alta Voluntaria.",
                        text: data.msj+'\n'+texto_error,
                        icon: "warning",
                    });
                }
            }
        });
    }

    function checkTokenSolicitudAlta(input_token, div_mostrar, div_ocultar, div_solicitud)
    {
        console.log('checkTokenSolicitudAlta');
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
                        aceptarAprobacionSolicitudAltaVoluntaria(resp.registro.estado);
                        $('#btn_modal_solalta_ver_pdf_cons_activa').click(function (e) {
                            e.preventDefault();
                            ver_pdf_consentimiento_alta_voluntaria($('#modal_solalta_id').val(), $('#id_fc').val());
                        });

                        $('#modal_solalta_diagnostico').attr('disabled', true);
                        $('#modal_solalta_motivo').attr('disabled', true);
                    }
                    else if(resp.registro.estado==2)
                    {
                        $('#'+div_mostrar).hide();
                        $('#'+div_ocultar).hide();
                        $('#'+div_solicitud).show();
                        aceptarAprobacionSolicitudAltaVoluntaria(resp.registro.estado);

                        $('#btn_modal_solalta_ver_pdf_cons_activa').click(function (e) {
                            e.preventDefault();
                        });

                        swal({
                            title: "Consentimiento Informado.",
                            text: 'Consentimiento Informado Rechazado\n Debe solicitar aprobación.',
                            icon: "warning",
                        });
                    }
                    else
                    {
                        setTimeout(checkTokenSolicitudAlta(input_token, div_mostrar, div_ocultar,div_solicitud),3000);
                    }
                }
                else
                {
                    setTimeout(checkTokenSolicitudAlta(input_token, div_mostrar, div_ocultar,div_solicitud),3000);
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    function aceptarAprobacionSolicitudAltaVoluntaria(estado)
    {
        // console.log('aceptarAprobacionSolicitudAltaVoluntaria');
        var id_sol_alta = $('#modal_solalta_id').val();
        var token = $('#modal_solalta_esperando_aprobacion').val();
        let url = "{{ route('consentimiento.solicitud.alta.estado.autorizacion') }}";
        var _token = $('input[name=_token]').val();
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id_sol_alta : id_sol_alta,
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

    function ver_pdf_consentimiento_alta_voluntaria(id_sol_alta, id_ficha_atencion)
    {
        Fancybox.close();
        Fancybox.show(
            [
                {
                src: '{{ route("consentimiento.solicitud.alta.pdf") }}?id_sol_alta='+id_sol_alta+'&id_ficha_atencion='+id_ficha_atencion,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }

    function limpiar_solicitud_alta()
    {
        $('#modal_solalta_id').val('');
        $('#modal_solalta_diagnostico').val('');
        $('#modal_solalta_diagnostico').attr('disabled', false);
        $('#modal_solalta_motivo').val('');
        $('#modal_solalta_motivo').attr('disabled', false);
        $('#modal_solalta_esperando_aprobacion').val('');
        $('#div_modal_solalta_btn_aprobacion_solicitud').show();
        $('#div_modal_solalta_btn_aprobacion_espera').hide();
        $('#div_modal_solalta_btn_aprobacion_ok').hide();
    }

</script>

