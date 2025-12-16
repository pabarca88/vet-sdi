<!--detalle rendicion archivo-->
<div id="detalle_rendicion_archivo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detalle_rendicion"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_pago_consulta_title">Detalle Rendición</h5>
                <button type="button" class="close cerrar_modal_detalle_rendicion_archivo" data-dismiss="modal" aria-label="Close" onclick="$('#detalle_rendicion_archivo').modal('hide')"><span>×</span></button>

            </div>
            <div class="modal-body">
                <div class="row" id="cuerpo_archivos">

                </div>
            </div>
            <div class="modal-footer">
                <div type="button" class="btn btn-info cerrar_modal_detalle_rendicion_archivo" data-dismiss="modal" aria-label="Close" onclick="$('#detalle_rendicion_archivo').modal('hide')">Cerrar</div>
            </div>
        </div>
    </div>
</div>

<script>
    function ver_archivos(id_rendicion)
    {
        let url = "{{ route('asistentejcm.rendicion.detalle.archivos') }}";
        $('#cuerpo_archivos').html('');

        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_rendicion : id_rendicion
            },
        })
        .done(function(resp) {

            console.log(resp);
            if (resp.estado == 1)
            {
                $.each(resp.registro, function (key, value) {
                    var html = '';
                    html += '<div class="col-md-4 col-6" style="border-radius: 6px; background-color: aliceblue; border: 2px dashed gray; padding: 1em; display: inline-block; text-wrap: wrap;">';
                    html += '   <div class="row">';
                    html += '       <div data-fancybox data-type="pdf" data-src="'+value.url+'">';
                    html += '           <div class="col-12 text-center"><img src="{{ asset('images/iconos/archivo_descarga.svg') }}" alt="archivo descarga"></div>';
                    html += '           <div class="col-12 text-center text-primary">'+value.nombre+'</div>';
                    html += '       </div>';
                    html += '    </div>';
                    html += '</div>';
                    $('#cuerpo_archivos').append(html);
                });

                $('#detalle_rendicion_archivo').modal('show');
            }
            else
            {
                var mensaje = '';
                if(data.error)
                {
                    $.each(data.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Falla al cargar Detalle de Rendición Archivos",
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
