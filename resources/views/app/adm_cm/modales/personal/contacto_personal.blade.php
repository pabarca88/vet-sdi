<!--datos Contacto-->
<div id="contacto_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contacto_usuario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Info de Contacto</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row info-basica" id="info-basica-1">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <h6 class="text-c-blue">Rut</h6>
                            <div id="contacto_prof_rut"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <h6 class="text-c-blue">Correo electrónico</h6>
                            <div id="contacto_prof_email"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <h6 class="text-c-blue">Teléfonos</h6>
                            <div  >
                                <ul>
                                    <li id="contacto_prof_telefono1"><span></span></li>
                                    <li id="contacto_prof_telefono2"><span></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <h6 class="text-c-blue">Dirección</h6>
                            <div id="contacto_prof_direccion"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function contacto(tipo,id)
    {
        var url = "";
        if(tipo == 'profesional')
            url = "{{ url('/Profesionales/buscar') }}"+"/"+id;
        else if(tipo == 'asistente' || tipo == 'asistente publico')
            url = "{{ route('adm_cm.asistente_buscar') }}";
        else if(tipo == 'administrativo')
            url = "{{ url('/Profesionales/buscar') }}"+"/"+id;
        else if(tipo == 'limpieza')
            url = "{{ url('/Profesionales/buscar') }}"+"/"+id;
        $.ajax({
            url: url,
            type: "get",
            data: {
                id: id
            },
        })
        .done(function(data) {
            if (data.estado == 1)
            {
                /** encontrado */
                $('#contacto_prof_rut').html(data.registro.rut);
                $('#contacto_prof_email').html(data.registro.email);
                $('#contacto_prof_telefono1').html(data.registro.telefono_uno);
                $('#contacto_prof_telefono2').html(data.registro.telefono_dos);
                $('#contacto_prof_direccion').html(data.direccion);
                $('#contacto_usuario').modal('show');
            }
            else
            {
                /** no encontrado */
                swal({
                    title: "Problema al cargar informacion del usuario.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }
</script>
