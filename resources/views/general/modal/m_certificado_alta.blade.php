<!---******* Modal Formulario Certificado de alta medica (informe médico) ********-->
<div id="modal_cert_alta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_cert_alta"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Certificado de Alta</h5>
                <button type="button" class="close text-white"  data-bs-dismiss="modal"  aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_cert_alta_tipo_informe" id="modal_cert_alta_tipo_informe" value="2">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm" name="modal_cert_alta_nombre_paciente" id="modal_cert_alta_nombre_paciente" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Rut</label>
                        <input type="person" class="form-control form-control-sm" name="modal_cert_alta_rut_paciente" id="modal_cert_alta_rut_paciente" value="{{ $paciente->rut }}" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Edad</label>
                        <input type="number" class="form-control form-control-sm" name="modal_cert_alta_edad_paciente" id="modal_cert_alta_edad_paciente" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Dirección</label>
                        <input type="address" class="form-control form-control-sm" name="modal_cert_alta_direccion_paciente" id="modal_cert_alta_direccion_paciente" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Regi&oacute;n</label>
                        <select id="modal_cert_alta_region_paciente" name="modal_cert_alta_region_paciente" class="form-control form-control-sm" readonly>
                            <option value="0">Seleccione</option>
                            @foreach ($regiones as $r)
                                @if ($r->id == $paciente->Direccion()->first()->Ciudad()->first()->id_region)
                                    <option id="{{ $r->id }}" selected> {{ $r->nombre }} </option>
                                @endif
                                <option id="{{ $r->id }}"> {{ $r->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Ciudad</label>
                        <select id="modal_cert_alta_region_paciente" name="modal_cert_alta_region_paciente" class="form-control form-control-sm" readonly>
                            <option value="0">Seleccione</option>
                            @foreach ($ciudades as $c)
                                @if ($c->id == $paciente->Direccion()->first()->Ciudad()->first()->id)
                                    <option id="{{ $c->id }}" selected> {{ $c->nombre }} </option>
                                @endif
                                <option id="{{ $c->id }}"> {{ $c->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <p class="text-c-blue mb-0 mt-3">El Profesional que suscribe informa que</p>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Descripción</label>
                        <textarea type="text" class="form-control form-control-sm" rows="3" name="modal_cert_alta_comentarios" id="modal_cert_alta_comentarios"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="registrar_alta_medica('modal_cert_alta_tipo_informe','modal_cert_alta_comentarios','modal_cert_alta');" class="btn btn-info">Generar Certificado de Alta</button>
            </div>
        </div>
    </div>
</div>

<script>
    /** certificado de alta */
    function certificado_alta()
    {
        $('#modal_cert_alta').modal('show');
    }

    function registrar_alta_medica(input_tipo, input_comentario, modal)
    {

        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let hora_medica = $('#hora_medica').val();
        let tipo_informe = $('#'+input_tipo).val();
        let comentarios_informe_medico = $('#'+input_comentario).val();
        let url = "{{ route('ficha_medica.registrar_informe_medico') }}";

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                tipo_informe: tipo_informe,
                comentarios_informe_medico: comentarios_informe_medico,
                hora_medica: hora_medica,
                id_lugar_atencion: id_lugar_atencion,
            },
        })
        .done(function(response) {

            if (response != '') {
                console.log(response);

                $('#mensaje').removeClass('alert-success');
                $('#mensaje').removeClass('alert-danger');
                $('#mensaje').hide();

                if(response['estado'] == '1')
                {
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').addClass('alert-success');
                    $('#mensaje').removeClass('alert-danger');
                    $('#mensaje').html('Certificado de Alta medica. <i class="fas fa-check"></i>');
                    $('#mensaje').show();
                    $('#'+modal).modal('hide');

                    ver_pdf_informe_medico_alta($('#id_fc').val(), $('#'+input_tipo).val() );
                }
                else
                {
                    swal({
                        title: "Registro de Certificado de Alta medica." ,
                        text: response['msj'],
                        icon: "error",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }


            }
        })
        .fail(function(e) {
            console.log("error");
            console.log(e);

        })
    };

    function ver_pdf_informe_medico_alta(id_ficha_atencion, tipo)
    {

        let url = "{{ route('pdf.informe_medico') }}";
        Fancybox.show(
            [
                {
                src: '{{ route("pdf.informe_medico") }}?id_ficha_atencion='+id_ficha_atencion+'&id_tipo_informe='+tipo,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }
</script>
