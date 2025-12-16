<div id="coneccion_api" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="coneccion_api" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Esperando autorización</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row">
                    <div class="form-group col-sm-6 col-md-12 col-lg-6 col-xl-6 text-center">
                        <img src="{{ asset('images\spinner.svg') }}" style="width:50%;text-align:center">
                    </div>
                    <div class="form-group col-sm-6 col-md-12 col-lg-3 col-xl-3">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block" id="btn_permiso_paciente">Paciente</button>
                    </div>
                    <div class="form-group col-sm-6 col-md-12 col-lg-3 col-xl-3">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block" id="btn_permiso_prevision">Previsión</button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block">Cancelar</button>
                    </div>
                    {{-- <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-info btn-sm btn-block">Continuar</button>
                    </div> --}}
                </div>
            </div>
		</div>
	</div>
</div>
<script>
    function conectar_api()
    {
        var mensaje = '';
        var valido = '1';

        if($('#venta_rut').val() == '')
        {
            mensaje += 'Rut: Campo requerido.\n';
            valido = 0;
        }
        if($('#venta_serie').val() == '')
        {
            mensaje += 'Nº de serie carne: Campo requerido.\n';
            valido = 0;
        }
        if($('#venta_nombre').val() == '')
        {
            mensaje += 'Nombre: Campo requerido.\n';
            valido = 0;
        }
        if($('#venta_prevision').val() == '0')
        {
            mensaje += 'Previsión: Campo requerido.\n';
            valido = 0;
        }

        if( valido == 1 )
        {
            $('#coneccion_api').modal('show');

            /** SOLICITAR AUTORIZACION A PACIENTE */
            let url = "{{ route('asistente.solicitud.auto.paciente.venta.bono') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    // _token: token,
                    _token: CSRF_TOKEN,
                    id_paciente : $('#bono_id_paciente').val(),
                    id_profesional : $('#bono_id_profesional').val(),
                    id_lugar_atencion : $('#agenda_lugar_atencion_asistente').val(),
                }
            })
            .done(function(data)
            {
                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        validar_permiso_paciente(data.registro.token);
                    }
                    else
                    {
                        var mensaje = '';
                        if(isset(data.bono))
                        {
                            if(data.bono.estado == 0)
                                mensaje +=  bono.estado.msj;

                            if(data.hora_medica.estado == 0)
                                mensaje +=  data.hora_medica.msj;
                        }
                        else
                        {
                            mensaje += data.error;
                        }

                        swal({
                            title: "Recepción de bonos y programas",
                            text: 'Pago con Problemas.\n'+data.msj+'\n'+mensaje,
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });

                    }
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('fail');
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }
        else
        {
            swal({
                title: "Pedir Autorización",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function validar_permiso_paciente(token)
    {
        let url = "{{ route('asistente.solicitud.auto.validar') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                // _token: token,
                _token: CSRF_TOKEN,
                token : token
            }
        })
        .done(function(data)
        {
            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    if(data.estado_log == 0)
                    {
                        setTimeout(function(){
                            validar_permiso_paciente(token);
                        }, 2000);
                    }
                    else if(data.estado_log == 1)
                    {
                        $('#btn_permiso_paciente').html('APROBADO');
                        $('#btn_permiso_paciente').removeClass('btn-danger-light');
                        $('#btn_permiso_paciente').addClass('btn-success-light');

                        cargar_prevision();
                        return true;
                    }
                    else if(data.estado_log == 2)
                    {
                        $('#btn_permiso_paciente').html('RECHAZADO');
                        $('#btn_permiso_paciente').addClass('btn-danger-light');
                        $('#btn_permiso_paciente').removeClass('btn-success-light');
                        return false;
                    }
                    else if(data.estado_log == 3)
                    {
                        $('#btn_permiso_paciente').html('CANCELADO');
                        $('#btn_permiso_paciente').addClass('btn-danger-light');
                        $('#btn_permiso_paciente').removeClass('btn-success-light');
                        return false;
                    }
                }
                else
                {
                    return false;
                    // setTimeout(function(){
                    //     validar_permiso_paciente(token);
                    // }, 2000);
                }
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('fail');
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_prevision()
    {
        if($('#venta_rut').val() == '')
        {
            mensaje += 'Rut: Campo requerido.\n';
            valido = 0;
        }
        if($('#venta_serie').val() == '')
        {
            mensaje += 'Nº de serie carne: Campo requerido.\n';
            valido = 0;
        }
        if($('#venta_prevision').val() == '0')
        {
            mensaje += 'Previsión: Campo requerido.\n';
            valido = 0;
        }

        let url = "{{ route('asistente.conectar.prevision') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                // _token: token,
                _token: CSRF_TOKEN,
                rut : $('#venta_rut').val(),
                serie : $('#venta_serie').val(),
                prevision : $('#venta_prevision').val(),
            }
        })
        .done(function(data)
        {
            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    $('#btn_permiso_prevision').html('APROBADO');
                    $('#btn_permiso_prevision').removeClass('btn-danger-light');
                    $('#btn_permiso_prevision').addClass('btn-success-light');

                    $('.venta_autorizada').show();

                    $('#venta_folio').val(data.registro.numero);
                    $('#venta_valor_consulta').val(data.registro.total);
                    $('#venta_valor_pagar').val(data.registro.a_pagar);
                    $('#venta_valor_seguro').val(data.registro.aporte_seguro);
                    $('#venta_valor_copago').val(data.registro.bonificacion);

                    $('#div_btn_pedir_autorizacion').hide();

                    $('#coneccion_api').modal('hide');
                }
                else
                {
                    $('#btn_permiso_prevision').html('RECHAZADO');
                    $('#btn_permiso_prevision').addClass('btn-danger-light');
                    $('#btn_permiso_prevision').removeClass('btn-success-light');

                    $('.venta_autorizada').hide();
                    $('#venta_folio').val('');
                    $('#venta_valor_consulta').val('');
                    $('#venta_valor_pagar').val('');
                    $('#venta_valor_seguro').val('');
                    $('#venta_valor_copago').val('');

                    $('#div_btn_pedir_autorizacion').show();
                }
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('fail');
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>


