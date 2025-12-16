<div id="m_pasar_pagado_gastos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_pasar_pagado_gastos" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Gastos y Pagos Institucionales</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">

                <input type="hidden" name="m_pasar_pagado_gastos_id" id="m_pasar_pagado_gastos_id" value="">

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
    function mostrar_pasar_pagado(id_gastos)
    {
        $('#m_pasar_pagado_gastos_id').val(id_gastos);
        $('#m_pasar_pagado_gastos').modal('show');
    }

    function pasar_pagado()
    {
        var id = $('#m_pasar_pagado_gastos_id').val();
        var _token = CSRF_TOKEN;

        let url = "{{ route('gastos.pagado') }}";

        $.ajax({
            url: url,
            type: "POST",
            data: {
                id : id,
                _token : _token,
            },
        })
        .done(function(resp) {
            console.log(resp)

            if (resp != null)
            {
                if(resp.estado == 1)
                {

                    $('#m_pasar_pagado_gastos').modal('hide');

                    swal({
                        title: "Pago Gastos Institución",
                        text: 'Registro guardado con exito',
                        icon: "success",
                        buttons: "Aceptar",
                    });

                    carga_filtros();
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
                        title: "Pago Gastos Institución",
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
