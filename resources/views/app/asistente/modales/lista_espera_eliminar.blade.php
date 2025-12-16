<div class="modal fade" id="modal_eliminar_lista_espera" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_eliminar_lista_espera" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Eliminar de Lista de Espera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_eliminar();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="eliminar_id_lista_espera" id="eliminar_id_lista_espera" value="">
                        <p>Esta seguro de Eliminar al Paciente de la Lista de Espera</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger align-middle" onclick="elimina_lista_epera()"; data-dismiss="modal">Eliminar</button>
                <button type="button" class="btn btn-info align-middle" onclick="cerrar_modal_eliminar()"; data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>

    /** CERRAR MODAL */
    function cerrar_modal_eliminar() {
        $('#modal_eliminar_lista_espera').modal('hide');
    }

    /** ABRIR MODAL */
    function abrir_elimina_lista_epera(id)
    {
        $('#modal_eliminar_lista_espera').modal('show');
        $('#eliminar_id_lista_espera').val(id);
    }

    /** ELIMINAR ITEM DE LISTA DE ESPERA */
    function elimina_lista_epera()
    {
        var id = $('#eliminar_id_lista_espera').val();

        let _token = CSRF_TOKEN;
        let url = "{{ route('lista.espera.eliminar') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                id : id,
            },
        })
        .done(function(data) {
            if (data != null)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Registro de lista de espera",
                        text: 'Eliminado',
                        icon: "success",
                        buttons: "Aceptar"
                    });
                    $('#modal_eliminar_lista_espera').modal('hide');
                    cargarListaEsperaPorProfesional();
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += indexInArray+': '+valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Registro a lista de espera",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }

            }
            else
            {
                swal({
                    title: "Registro a lista de espera",
                    text: "Error al eliminar",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>
