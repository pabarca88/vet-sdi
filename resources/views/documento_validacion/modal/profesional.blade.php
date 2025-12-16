<div class="modal fade" id="modal_validar_profesional_documento">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_validar_profesional_documentoLabel">Validar Profesional de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div  id="cuerpo_modal_validar_profesional_documento">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal" aria-label="Close"> Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function abrir_validar_profesional_documento() {
        $('#modal_validar_profesional_documento').modal('show');
        $('#cuerpo_modal_validar_profesional_documento').html('');

        let url = "{{ route('validar.profesional.documento') }}";

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

                        /** PROFESIONAL */
                        html += '<div class="row">';
                        html += '   <div class="col-12 font-weight-bold">Nombre </div><div class="col-12 mb-2"><span>'+data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos+'<br><span>'+data.profesional.rut+'</span></span></div>';
                        html += '   <div class="col-12 font-weight-bold">Email </div><div class="col-12 mb-2">'+data.profesional.email+'</div>';
                        // html += '   <div class="col-6">Especialidad: </div><div class="col-6" style="">'+data.profesional.especialidad+'</div>';
                        if(data.profesional.tipo_especialidad != null)
                        html += '   <div class="col-12 font-weight-bold">Especialidad </div><div class="col-12 mb-2">'+data.profesional.tipo_especialidad+'</div>';
                        if(data.profesional.sub_tipo_especialidad != null)
                        html += '   <div class="col-12 font-weight-bold">Tipo Especialidad </div><div class="col-12 mb-2">'+data.profesional.sub_tipo_especialidad+'</div>';
                        if(data.profesional.certificado != null)
                        html += '   <div class="col-12 font-weight-bold">Certificado </div><div class="col-12 mb-2">'+data.profesional.certificado+'</div>';
                        if(data.profesional.numero_certificado != null)
                        html += '   <div class="col-12 font-weight-bold">Numero Certificado </div><div class="col-12 mb-2">'+data.profesional.numero_certificado+'</div>';
                        html += '</div>';

                        /** DOCUMENTO */
                        html += '<div class="row">';
                        html += '   <div class="col-12 font-weight-bold">Tipo de Documento </div><div class="col-12 mb-2">'+data.documento.tipo_control+'</div>';
                        html += '   <div class="col-12 font-weight-bold">Fecha de Elaboración: </div><div class="col-12 mb-2">'+data.documento.fecha_elaboracion+'</div>';
                        // html += '   <div class="col-6">Cantidad de Item: </div><div class="col-6">'+data.documento.cantidad_item+'</div>';
                        html += '</div>';

                        $('#cuerpo_modal_validar_profesional_documento').html(html);
                    }
                    else
                    {
                        $('#cuerpo_modal_validar_profesional_documento').html('Problema en el proceso de Validación');
                    }
                }
                else
                {
                    $('#cuerpo_modal_validar_profesional_documento').html('Problema en el proceso de Validación');
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
