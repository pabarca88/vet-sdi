<div id="modal_pago" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="modal_pago" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Recibir pago</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row">
                    <div class="form-group col-sm-6 col-md-12 col-lg-6 col-xl-6">
                        <label for="input_pago">Proceso</label>
                        <select name="input_pago" id="input_pago">
                            <option value="">Seleccione</option>
                            <option value="1">ACEPTAR</option>
                            <option value="2">RECHAZAR</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block">Cancelar</button>
                    </div>
                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-info btn-sm btn-block" onclick="procesarPago();">Procesar</button>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

<script>
    function pago_venta_bono()
    {
        $('#modal_pago').modal('show');
    }

    function procesarPago()
    {
        var valido = 1;
        var estado_orden = 'RECHAZADO';
        if($('#input_pago').val() == 1)
        {
            estado_orden = 'PAGADO';
        }
        else if($('#input_pago').val() == 2)
        {
            estado_orden = 'RECHAZADO';
        }
        else
        {
            swal({
                title: "Pago",
                text: 'debe seleccionar estado de pago',
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            valido = 0;
            return false;
        }

        // Folio - venta_folio
        // Valor Bono - venta_valor_consulta
        // Valor Bonificación - venta_valor_pagar
        // Aporte Seguro - venta_valor_seguro
        // Valor a pagar -venta_valor_copago

        if(valido == 1)
        {
            let url = "{{ route('asistente.venta.bono.pago') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    // _token: token,
                    _token: CSRF_TOKEN,
                    id_lugar_atencion : $('#agenda_lugar_atencion_asistente').val(),
                    id_hora_medica : $('#bono_hora_medica').val(),
                    origen : 1,
                    tipo_movimiento : 1,
                    rut : $('#bono_paciente_rut').val(),
                    nombre : $('#venta_paciente_nombre').val(),
                    apellido_uno : $('#venta_paciente_apellido_uno').val(),
                    apellido_dos : $('#venta_paciente_apellido_dos').val(),
                    email : $('#venta_paciente_email').val(),
                    monto : $('#venta_valor_copago').val(),
                    estado_orden : estado_orden,
                    // fecha_pagado_cap : ,
                    nombre_detalle : 'BONO FISICO',
                    cantidad : 1,
                    unitario : $('#venta_valor_copago').val(),
                    descuento : 0,
                    total : $('#venta_valor_copago').val(),
                    convenio : $('#venta_prevision').val(),
                    numero_bono :$('#venta_folio').val() ,
                    valor_atencion : $('#venta_valor_consulta').val(),
                    glosa : 0,
                    id_profesional : $('#bono_id_profesional').val(),
                    id_asistente : '{{ $asistente->id }}',
                    id_paciente : $('#bono_id_paciente').val(),
                    id_clase_bono : 1,
                    id_tipo_bono : $('#bono_id_tipo_bono').val(),
                    id_referencia : $('#bono_hora_medica').val(),

                    bonificacion : $('#venta_valor_pagar').val(),
                    aporte_seguro : $('#venta_valor_seguro').val(),
                    a_pagar : $('#venta_valor_copago').val(),

                    numero_sesiones : 0,
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
                        swal({
                            title: "Recepción de bonos y programas",
                            text: 'Pago Exitoso',
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        cargarAgendaProfesional(1, data.bono.hora_medica.fecha_consulta);
                        $('#modal_recepcion_bonos_api').modal('hide');

                        $('#bono_paciente_nombre').val('');
                        $('#bono_profesional_nombre').val('');
                        $('#bono_profesional_rut').val('');
                        $('#bono_numero').val('');
                        $('#bono_valor_consulta').val('');
                        $('#bono_prevision').val('');
                        $('#recepcion_programa').val('');
                        $('#bono_sn_sesiones').val('');

                        $('#modal_pago').modal('hide');

                        $('#input_pago').val('');

                        $('#bono_hora_medica').val('');
                        $('#bono_paciente_rut').val('');
                        $('#venta_paciente_nombre').val('');
                        $('#venta_paciente_apellido_uno').val('');
                        $('#venta_paciente_apellido_dos').val('');
                        $('#venta_paciente_email').val('');
                        $('#venta_valor_copago').val('');
                        $('#venta_valor_copago').val('');
                        $('#venta_valor_copago').val('');
                        $('#venta_prevision').val('');
                        $('#venta_folio').val('');
                        $('#venta_valor_copago').val('');
                        $('#bono_hora_medica').val('');

                        $('#div_btn_pedir_autorizacion').show();
                        $('#venta_autorizada').hide();
                    }
                    else
                    {
                        swal({
                            title: "Proceso de PAgo ",
                            text: 'Falla en el proceso',
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('fail');
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
    }
</script>
