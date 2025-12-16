<div id="modal_personal_contacto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_personal_contacto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Contacto</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Correo electr&oacute;nico</h6>
                        <span id="personal_contacto_email">-</span>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Tel&eacute;fono</h6>
                        <span id="personal_contacto_telefono">-</span>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Direcci&oacute;n</h6>
                        <span id="personal_contacto_direccion">-</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /*-Modals personal-*/
    function contacto_persona(nombre_tipo, id_tipo, id)
    {
        let url = "{{ route('adm_cm.cargar_personal_persona') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                nombre_tipo : nombre_tipo,
                id_tipo : id_tipo,
                id : id,
                id_lugar_atencion : '{{ $institucion->id_lugar_atencion }}',
            },
        })
        .done(function(data) {
            if (data.estado == 1)
            {
                /** encontrado */
                $('#personal_contacto_email').html(data.registro.email);
                $('#personal_contacto_telefono').html(data.registro.telefono_uno);
                $('#personal_contacto_direccion').html(data.registro.direccion.direccion+' #'+data.registro.direccion.numero_dir+', '+data.registro.direccion.ciudad.nombre);
                $('#modal_personal_contacto').modal('show');
            }
            else
            {
                /** no encontrado */
                swal({
                    title: "Problema al cargar informacion del Personal.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

</script>
