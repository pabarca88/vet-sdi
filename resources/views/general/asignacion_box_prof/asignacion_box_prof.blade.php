<div id="m_modificar_box_prf" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_modificar_box_prf"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <input type="hidden" name="m_modificar_box_prf_id" id="m_modificar_box_prf_id" value="">
        <input type="hidden" name="m_modificar_box_prf_id_lugar_atencion" id="m_modificar_box_prf_id_lugar_atencion" value="{{ $lugares_atencion->id }}">
        <input type="hidden" name="m_modificar_box_prf_id_profesional" id="m_modificar_box_prf_id_profesional" value="">
        @csrf
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asigancion de Box</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    onclick="$('#m_modificar_box_prf').modal('hide');"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm">Box</label>
                        <select class="form-control form-control-sm" name="m_modificar_box_prf_id_box" id="m_modificar_box_prf_id_box">
                            @isset($boxes)
                                @foreach ($boxes as $bs)
                                    <option value="{{ $bs->id }}">{{ $bs->tipo_box }} - {{ $bs->numero_box }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" id="btn_guardar_m_modificar_box_prf" onclick="agregar_box_prof();" class="btn btn-success btn-sm btn-block">Guardar</button>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger btn-sm btn-block" onclick="$('#m_modificar_box_prf').modal('hide');">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function abrir_editar_box_prof(id)
    {

        $('#m_modificar_box_prf_id').val('');
        $('#m_modificar_box_prf_id_lugar_atencion').val('{{ $lugares_atencion->id }}');
        $('#m_modificar_box_prf_id_profesional').val('');
        $('#m_modificar_box_prf_id_box').val('');

        let url = "{{ route('lugar_box_profesional.ver_registro') }}";

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: id,
            },
        })
        .done(function(resp) {

            if (resp != '') {
                console.log(resp);
                if (resp.estado == '1')
                {

                    $('#m_modificar_box_prf_id').val(resp.registros.id);
                    $('#m_modificar_box_prf_id_lugar_atencion').val(resp.registros.id_lugar_atencion);
                    $('#m_modificar_box_prf_id_profesional').val(resp.registros.id_profesional);
                    $('#m_modificar_box_prf_id_box').val(resp.registros.id_box);

                    $('#m_modificar_box_prf').modal('show');

                    $('#btn_guardar_m_modificar_box_prf').attr('onclick', 'editar_box_prof();');
                }
                else
                {
                    swal({
                        title: "Registro Box.",
                        text: 'No encontrado',
                        icon: "error",
                    })
                }
            }
        })
        .fail(function(e) {
            console.log("error");
            console.log(e);
        });

    }

    function editar_box_prof()
    {
        var id = $('#m_modificar_box_prf_id').val();
        var id_lugar_atencion = $('#m_modificar_box_prf_id_lugar_atencion').val();
        var id_profesional = $('#m_modificar_box_prf_id_profesional').val();
        var id_box = $('#m_modificar_box_prf_id_box').val();
        var valido = 1;
        var msj = '';

        if( id_lugar_atencion == '' )
        {
            msj += 'Campo requerido, Lugar Atención';
            valido = 0;
        }
        if( id_profesional == '' )
        {
            msj += 'Campo requerido, Profesional';
            valido = 0;
        }
        if( id_box == '' )
        {
            msj += 'Campo requerido, Box';
            valido = 0;
        }

        if( valido == 1)
        {
            let url = '{{ route("lugar_box_profesional.modificar") }}';
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id:id,
                    id_lugar_atencion:id_lugar_atencion,
                    id_profesional:id_profesional,
                    id_box:id_box,
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    if (response['estado'] == '1') {
                        swal({
                            title: "Asignacion Box",
                            text: response['msj'],
                            icon: "success",
                        })
                        $('#m_modificar_box_prf').modal('hide');

                        $('#m_modificar_box_prf_id_lugar_atencion').val('{{ $lugares_atencion->id }}');
                        $('#m_modificar_box_prf_id_profesional').val('');
                        $('#m_modificar_box_prf_id_box').val('');
                        $('#m_modificar_box_prf_id').val('');

                        $('#profesional_box').html(response.registros.box.tipo_box + ' - ' + response.registros.box.numero_box);
                        if ($('#id_box').length)
                        {
                            $('#id_box').val(response.registros.box.id);
                        }

                    } else {
                        swal({
                            title: "Asignacion Box",
                            text: response['msj'],
                            icon: "error",
                        })
                    }
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            });

        }
        else
        {
            swal({
                title: "Asignación de Box",
                text: msj,
                icon: "error",
            });
        }
    }

    function abrir_agregar_box_prof(id_profesional)
    {
        $('#m_modificar_box_prf_id').val('');
        $('#m_modificar_box_prf_id_lugar_atencion').val('{{ $lugares_atencion->id }}');
        $('#m_modificar_box_prf_id_profesional').val(id_profesional);
        $('#m_modificar_box_prf_id_box').val('');

        $('#btn_guardar_m_modificar_box_prf').attr('onclick', 'agregar_box_prof();');

        $('#m_modificar_box_prf').modal('show');
    }

    function agregar_box_prof()
    {
        var id_lugar_atencion = $('#m_modificar_box_prf_id_lugar_atencion').val();
        var id_profesional = $('#m_modificar_box_prf_id_profesional').val();
        var id_box = $('#m_modificar_box_prf_id_box').val();
        var valido = 1;
        var msj = '';

        if( id_lugar_atencion == '' )
        {
            msj += 'Campo requerido, Lugar Atención';
            valido = 0;
        }
        if( id_profesional == '' )
        {
            msj += 'Campo requerido, Profesional';
            valido = 0;
        }
        if( id_box == '' )
        {
            msj += 'Campo requerido, Box';
            valido = 0;
        }

        if( valido == 1)
        {
            let url = '{{ route("lugar_box_profesional.agregar") }}';
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id_lugar_atencion:id_lugar_atencion,
                    id_profesional:id_profesional,
                    id_box:id_box,
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    if (response['estado'] == '1') {
                        swal({
                            title: "Asignacion Box",
                            text: response['msj'],
                            icon: "success",
                        })
                        $('#m_modificar_box_prf').modal('hide');

                        $('#m_modificar_box_prf_id_lugar_atencion').val('{{ $lugares_atencion->id }}');
                        $('#m_modificar_box_prf_id_profesional').val('');
                        $('#m_modificar_box_prf_id_box').val('');
                        $('#m_modificar_box_prf_id').val('');

                        $('#profesional_box').html(response.registros.box.tipo_box + ' - ' + response.registros.box.numero_box);
                        if ($('#id_box').length)
                        {
                            $('#id_box').val(response.registros.box.id);
                        }
                    } else {
                        swal({
                            title: "Asignacion Box",
                            text: response['msj'],
                            icon: "error",
                        })
                    }
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            });

        }
        else
        {
            swal({
                title: "Asignación de Box",
                text: msj,
                icon: "error",
            });
        }
    }

</script>
