<div id="m_pasar_pagado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_pasar_pagado" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Remuneraciones</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">

                <input type="hidden" name="m_pasar_pagado_r_mes_liq" id="m_pasar_pagado_r_mes_liq" value="">
                <input type="hidden" name="m_pasar_pagado_r_ano_liq" id="m_pasar_pagado_r_ano_liq" value="">
                <input type="hidden" name="m_pasar_pagado_id_contrato_dependiente" id="m_pasar_pagado_id_contrato_dependiente" value="">
                <input type="hidden" name="m_pasar_pagado_id_empleado" id="m_pasar_pagado_id_empleado" value="">
                <input type="hidden" name="m_pasar_pagado_id_remuneracion" id="m_pasar_pagado_id_remuneracion" value="">

                <div class="row">
                    <div class="col-sm-12">
                        Va a pasar a PAGADO el documento seleccionado
                    </div>
                </div>

			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success btn-sm" onclick="pasar_pagado();">Pasar a Pagado</button>
            </div>
		</div>
	</div>
</div>
<script>
    function mostrar_pasar_pagado(id_contrato_dependiente, id_empleado, id_remuneracion)
    {
        $('#m_pasar_pagado_r_mes_liq').val($('#filtro_mes').val());
        $('#m_pasar_pagado_r_ano_liq').val($('#filtro_anio').val());
        $('#m_pasar_pagado_id_contrato_dependiente').val(id_contrato_dependiente);
        $('#m_pasar_pagado_id_empleado').val(id_empleado);
        $('#m_pasar_pagado_id_remuneracion').val(id_remuneracion);

        $('#m_pasar_pagado').modal('show');
    }

    function pasar_pagado()
    {
        var mes = $('#m_pasar_pagado_r_mes_liq').val();
        var ano = $('#m_pasar_pagado_r_ano_liq').val();
        var id_contrato_dependiente = $('#m_pasar_pagado_id_contrato_dependiente').val();
        var id_empleado = $('#m_pasar_pagado_id_empleado').val();
        var id_remuneracion = $('#m_pasar_pagado_id_remuneracion').val();
        var _token = CSRF_TOKEN;

        let url = "{{ route('adm_cm.remuneracion.pagada') }}";

        $.ajax({
            url: url,
            type: "POST",
            data: {
                mes : mes,
                ano : ano,
                id_contrato_dependiente : id_contrato_dependiente,
                id_empleado : id_empleado,
                id_remuneracion : id_remuneracion,
                _token : _token,
            },
        })
        .done(function(resp) {
            console.log(resp)

            if (resp != null)
            {
                if(resp.estado == 1)
                {

                    $('#m_pasar_pagado').modal('hide');

                    swal({
                        title: "Liquidación Pago",
                        text: 'Registro guardado con exito',
                        icon: "success",
                        buttons: "Aceptar",
                    });

                    window.location.href = "{{ route('adm_cm.sueldos') }}?filtro_anio="+ano+"&filtro_mes="+mes+"";
                }
                else
                {
                    var mensaje = '';
                    if(resp.error)
                    {
                        $.each(resp.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Liquidación Pago",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }

            }
            else
            {
                var mensaje = '';
                if(resp.error)
                {
                    $.each(resp.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Liquidación Pago",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
