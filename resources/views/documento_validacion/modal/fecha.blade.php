<div class="modal fade" id="modal_validar_fecha_documento">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_validar_fecha_documentoLabel">Validar Fecha de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="cuerpo_modal_validar_fecha_documento">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal" aria-label="Close"> Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function abrir_validar_fecha_documento() {
        $('#modal_validar_fecha_documento').modal('show');
        $('#cuerpo_modal_validar_fecha_documento').html('');

        let url = "{{ route('validar.fecha.documento') }}";

        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                tkx_1: "{{ str_shuffle(app('request')->input('tkx')) }}",
                tkx_2: "{{ str_shuffle(app('request')->input('tkx')) }}",
                tkx_3: "{{ app('request')->input('tkx') }}",
                tkx_4: "{{ str_shuffle(app('request')->input('tkx')) }}",
                tkx_5: "{{ str_shuffle(app('request')->input('tkx')) }}",
            },
        })
        .done(function(data)
        {
            if (data !== 'null')
            {
                if(data.estado == 1)
                {

                    if(data.estado == 1)
                    {

                        var html = '';
                        /** DOCUMENTO */
                        html += '<div class="row">';
                        html += '   <div class="col-12 font-weight-bold">Fecha de Elaboración </div><div class="col-12 mb-2"><span>'+data.documento.fecha_elaboracion+'</div>';
                        if(data.documento.dias_elaborado < 30)
                            html += '   <div class="col-12 font-weight-bold">Dias desde elaboración </div><div class="col-12 mb-2"><span>'+data.documento.dias_elaborado+' Día(s)</div>';
                        else
                            html += '   <div class="col-12 font-weight-bold">Dias desde elaboración </div><div class="col-12 font-weight-bold text-danger mb-2"><span>'+data.documento.dias_elaborado+' Día(s)</div>';
                        html += '   <div class="col-12 font-weight-bold">Tipo de Documento </div><div class="col-12 mb-2">'+data.documento.tipo_control+'</div>';
                        // html += '   <div class="col-6">Cantidad de Item: </div><div class="col-6">'+data.documento.cantidad_item+'</div>';
                        html += '</div>';

                        /** PROFESIONAL */
                        html += '<div class="row mb-2">';
                        html += '   <div class="col-12 font-weight-bold">Profesional Responsable </div><div class="col-12">'+data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos+'<br><span>'+data.profesional.rut+'</span></div>';
                        html += '</div>';

                        /** PACIENTE */
                        html += '<div class="row mb-2">';
                        html += '   <div class="col-12 font-weight-bold">Paciente Receptor</div><div class="col-12">'+data.paciente.nombre+' '+data.paciente.apellido_uno+' '+data.paciente.apellido_dos+'<br><span>'+data.paciente.rut+'</span></div>';
                        html += '</div>';

                        $('#cuerpo_modal_validar_fecha_documento').html(html);
                    }
                    else
                    {
                        $('#cuerpo_modal_validar_fecha_documento').html('Problema en el proceso de Validación');
                    }
                }
                else
                {
                    $('#cuerpo_modal_validar_fecha_documento').html('Problema en el proceso de Validación');
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
