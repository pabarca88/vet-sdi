<div id="modal_finalizar_empleado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_finalizar_empleado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine">Finalizar Personal</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_finalizar_empleado_id_empleado" id="modal_finalizar_empleado_id_empleado" value="">
                <input type="hidden" name="modal_finalizar_empleado_id_contrato" id="modal_finalizar_empleado_id_contrato" value="">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>
                            Usted esta por <span style="color:red">Finalizar el contrato y Desasociar</span> a <span id="modal_finalizar_empleado_nombre" style="font-weight: bold; color:#1317d6"></span> de forma definitiva.<br>
                            Si esta seguro presione el botón de "Finalizar / Desasociar"
                        </h5>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="finalizar_personal_profesional();">Finalizar / Desasociar</button>
            </div>
        </div>
    </div>
</div>

<div id="modal_finalizar_otro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_finalizar_otro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine">Finalizar Personal</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_finalizar_otro_id_empleado" id="modal_finalizar_otro_id_empleado" value="">
                <input type="hidden" name="modal_finalizar_otro_id_contrato" id="modal_finalizar_otro_id_contrato" value="">
                <input type="hidden" name="modal_finalizar_otro_tipo" id="modal_finalizar_otro_tipo" value="">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>
                            Usted esta por <span style="color:red">Finalizar el contrato y Desasociar</span> a <span id="modal_finalizar_otro_nombre" style="font-weight: bold; color:#1317d6"></span> de forma definitiva.<br>
                            Si esta seguro presione el botón de "Finalizar / Desasociar"
                        </h5>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="finalizar_personal_otro_profesional();">Finalizar / Desasociar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function modal_desactivar_profesional(id, id_contrato, nombre)
    {
        $('#modal_finalizar_empleado').modal('show');
        $('#modal_finalizar_empleado_nombre').html(nombre);
        $('#modal_finalizar_empleado_id_empleado').val(id);
        $('#modal_finalizar_empleado_id_contrato').val(id_contrato);
    }

    function finalizar_personal_profesional()
    {
        let id_empleado = $('#modal_finalizar_empleado_id_empleado').val();
        let id_contrato = $('#modal_finalizar_empleado_id_contrato').val();
        let _token = CSRF_TOKEN;

        let url = "{{ route('adm_cm.personal.finalizar_profesional') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token:_token,
                id_empleado:id_empleado,
                id_contrato:id_contrato,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data != null)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Finalizar Contrato / Desasociar Personal",
                        text: 'Proceso Exitoso',
                        icon: "succes",
                    })
                    .then((value) => {
                        location.reload();
                    });
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
                        title: "Finalizar Contrato / Desasociar Personal",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }

            }
            else
            {
                swal({
                    title: "Finalizar Contrato / Desasociar Personal",
                    text: "Se presenteo problema en el momento, Intente de nuevo.",
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

    function modal_desactivar_otros_profesionales(tipo,id, id_contrato, nombre){
        $('#modal_finalizar_otro').modal('show');
        $('#modal_finalizar_otro_nombre').html(nombre);
        $('#modal_finalizar_otro_id_empleado').val(id);
        $('#modal_finalizar_otro_id_contrato').val(id_contrato);
        $('#modal_finalizar_otro_tipo').val(tipo);
    }

    function finalizar_personal_otro_profesional()
    {
        let id_empleado = $('#modal_finalizar_otro_id_empleado').val();
        let id_contrato = $('#modal_finalizar_otro_id_contrato').val();
        let tipo = $('#modal_finalizar_otro_tipo').val();
        let _token = CSRF_TOKEN;

        let url = "{{ route('adm_cm.personal.finalizar_otros_profesionales') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token:_token,
                id_empleado:id_empleado,
                id_contrato:id_contrato,
                tipo:tipo,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data != null)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Finalizar Contrato / Desasociar Personal",
                        text: 'Proceso Exitoso',
                        icon: "succes",
                    })
                    .then((value) => {
                        location.reload();
                    });
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
                        title: "Finalizar Contrato / Desasociar Personal",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }

            }
            else
            {
                swal({
                    title: "Finalizar Contrato / Desasociar Personal",
                    text: "Se presenteo problema en el momento, Intente de nuevo.",
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
