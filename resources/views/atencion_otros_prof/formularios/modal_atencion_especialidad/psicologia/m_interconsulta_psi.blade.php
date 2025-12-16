<div id="modal_interconsulta_psi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_interconsulta_psi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Interconsulta Siquiatríafff</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-7 col-xl-7">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input  class="form-control form-control-sm" name="nombre_paciente_interconsulta_sq" id="nombre_paciente_interconsulta_sq" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <label class="floating-label-activo-sm">Rut</label>
                        <input class="form-control form-control-sm"  name="rut_paciente_interconsulta_sq" id="rut_paciente_interconsulta_sq" value="{{ $paciente->rut }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <label class="floating-label-activo-sm">Edad</label>
                        <input class="form-control form-control-sm" name="edad_paciente_interconsulta_sq" id="edad_paciente_interconsulta_sq" value="">
                    </div>
                </div>
                {{--  PESTAÑA DE SOLICITUD  --}}
                <div>
                    <form id="inter-especialidad">
                        <div class="form-row">
                            {{--  CARGA DE INTERCONSULT  --}}
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Profesión</label>
                                <select class="form-control form-control-sm" id="profesion_sq" name="profesion_sq" onchange="buscar_tipo_especialidad_sq();buscar_profesional_sq();">
                                    <option selected value="0">Seleccione</option>
                                    @if (isset($especialidad))
                                        @foreach ($especialidad as $esp)
                                            @if($esp->id != 8 && $esp->id != 10 && $esp->id != 11 && $esp->id != 12 )
                                            <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">Especialidad</label>
                                <select class="form-control form-control-sm" id="especialidad_sq" name="especialidad_sq" onchange="buscar_sub_tipo_especialidad_sq();buscar_profesional_sq();">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">Tipo Especialidad</label>
                                <select class="form-control form-control-sm" id="sub_tipo_especialidad_sq" name="sub_tipo_especialidad_sq" onchange="buscar_profesional_sq();">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Profesional</label>
                                <select class="form-control form-control-sm" id="profesional_inter_sq" name="profesional_inter_sq">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 nombre_profesional_inter_sq" style="display: none;">
                                <label class="floating-label-activo-sm">Profesional Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_profesional_inter_sq" id="nombre_profesional_inter_sq">
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                <input type="text" class="form-control form-control-sm" name="hipotesis_interconsulta_sq" id="hipotesis_interconsulta_sq">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Se desea saber</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2" name="comentarios_interconsulta_sq" id="comentarios_interconsulta_sq"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer pt-2 pb-0">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                            <button type="button" onclick="registrar_interconsulta_sq();" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function ind_ic_psi() {

        $('#profesion_sq').val(1);
        buscar_tipo_especialidad_sq(12);
        // buscar_sub_tipo_especialidad_sq(80);
        // buscar_profesional();

        $('#modal_interconsulta_psi').modal('show');

    }

    function buscar_tipo_especialidad_sq(id)
    {

        let tipo_especialidad_registro = $('#especialidad_sq');
        tipo_especialidad_registro.find('option').remove();

        let sub_tipo_especialidad_registro = $('#sub_tipo_especialidad_sq');
        sub_tipo_especialidad_registro.find('option').remove();

        let especialidad = $('#profesion_sq').val();
        let url = "{{ route('home.buscar_especialidad') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                especialidad: especialidad,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                let especialidades = $('#especialidad_sq');

                especialidades.find('option').remove();
                especialidades.append('<option value="">Seleccione</option>');
                if(data.length > 0)
                {
                    $(data).each(function(i, v) { // indice, valor
                        especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    });

                    if(id != '')
                    {
                        especialidades.val(id);
                        buscar_sub_tipo_especialidad_sq(80);
                    }
                    else
                        especialidades.val('');

                }
                else
                {
                    especialidades.append('<option value="0">No Aplica</option>');
                    especialidades.val(0);

                    let sub_especialidades = $('#sub_tipo_especialidad_sq');
                    sub_especialidades.append('<option value="0">No Aplica</option>');
                    sub_especialidades.val(0);
                }


            } else {
                alert('No se pudo Cargar los tipos de especialidad');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function buscar_sub_tipo_especialidad_sq(id)
    {
        let sub_tipo_especialidad_registro = $('#sub_tipo_especialidad_sq');
        sub_tipo_especialidad_registro.find('option').remove();

        let especialidad = $('#especialidad_sq').val();
        let url = "{{ route('home.buscar_sub_tipo_especialidad') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                especialidad: especialidad,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                console.log(data.length);
                let sub_especialidades = $('#sub_tipo_especialidad_sq');

                sub_especialidades.find('option').remove();
                sub_especialidades.append('<option value="">Seleccione</option>');
                if(data.length > 0)
                {
                    $(data).each(function(i, v) { // indice, valor
                        sub_especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    });
                    if(id != '')
                    {
                        sub_especialidades.val(id);
                        buscar_profesional_sq();
                    }
                    else
                        sub_especialidades.val('');
                }
                else
                {
                    sub_especialidades.append('<option value="0">No Aplica</option>');
                    sub_especialidades.val(0);
                }


            } else {
                alert('No se pudo Cargar los tipos de especialidad');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function buscar_profesional_sq()
    {
        let profesional_inter = $('#profesional_inter_sq');
        profesional_inter.find('option').remove();

        let profesion = $('#profesion_sq').val();
        let especialidad = $('#especialidad_sq').val();
        let sub_tipo_especialidad = $('#sub_tipo_especialidad_sq').val();
        let url = "{{ route('profesional.buscar') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_especialidad: profesion,
                id_tipo_especialidad: especialidad,
                id_sub_tipo_especialidad: sub_tipo_especialidad,
            },
        })
        .done(function(data) {
            if (data.estado = 1) {

                console.log(data);
                console.log(data.registros.length);


                profesional_inter.find('option').remove();
                profesional_inter.append('<option value="">Seleccione</option>');
                if(data.registros.length > 0)
                {
                    $(data.registros).each(function(i, v) { // indice, valor
                        profesional_inter.append('<option value="' + v.id + '">' + v.nombre + ' ' + v.apellido_uno + ' ' + v.apellido_dos + '</option>');
                    })
                    profesional_inter.append('<option value="OTRO">Otro</option>');
                }
                else
                {
                    profesional_inter.append('<option value="0">Sin Especialista</option>');
                    profesional_inter.append('<option value="OTRO">Otro</option>');
                    profesional_inter.val(0);
                }

                $('#profesional_inter_sq').change(function(){
                    var id_actual  = $('#profesional_inter_sq option:selected').val();
                    var text_actual  = $('#profesional_inter_sq option:selected').text();
                    if(id_actual == 'OTRO'){
                        $('.nombre_profesional_inter_sq').show();
                        $('#nombre_profesional_inter_sq').val('Ingrese nombre del profesional');
                    }
                    else
                    {
                        $('.nombre_profesional_inter_sq').hide();
                        $('#nombre_profesional_inter_sq').val(text_actual);
                    }

                });

            } else {
                console.log('No se encontro profesional');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function registrar_interconsulta_sq()
    {
        var  mensaje = '';
        var valido = 1;

        let profesion = $('#profesion_sq').val();
        let especialidad = $('#especialidad_sq').val();
        let sub_tipo_especialidad = $('#sub_tipo_especialidad_sq').val();
        let profesional_inter = $('#profesional_inter_sq').val();
        let nombre_profesional_inter = $('#nombre_profesional_inter_sq').val();
        let hipotesis_interconsulta = $('#hipotesis_interconsulta_sq').val();
        let comentarios_interconsulta = $('#comentarios_interconsulta_sq').val();
        let id_fc = $('#id_fc').val();
        let url = "{{ route('ficha_medica.registrar_interconsulta') }}";
        let hora_medica = $('#hora_medica').val();

        if(profesion == '') {
            mensaje += 'Debe ingresar Profesión\n';
            valido = 0;
        }

        if(especialidad == '') {
            mensaje += 'Debe ingresar Especialidad\n';
            valido = 0;
        }

        // if(sub_tipo_especialidad == '') {
        //     mensaje += 'Debe ingresar Sub Tipo Especialidad\n';
        //     valido = 0;
        // }
        // if(profesional_inter == '') {
        //     mensaje += 'Debe ingresar profesional_inter\n';
        //     valido = 0;
        // }
        // if(nombre_profesional_inter == '') {
        //     mensaje += 'Debe ingresar nombre_profesional_inter\n';
        //     valido = 0;
        // }

        if(hipotesis_interconsulta == '') {
            mensaje += 'Debe ingresar Hipótesis diagnóstica\n';
            valido = 0;
        }
        if(comentarios_interconsulta == '') {
            mensaje += 'Debe ingresar que desea saber\n';
            valido = 0;
        }

        if(valido == 1)
        {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    profesion: profesion,
                    especialidad: especialidad,
                    sub_tipo_especialidad: sub_tipo_especialidad,
                    profesional_inter: profesional_inter,
                    nombre_profesional_inter: nombre_profesional_inter,
                    hipotesis_interconsulta: hipotesis_interconsulta,
                    comentarios_interconsulta: comentarios_interconsulta,
                    id_fc_op: id_fc,
                },
            })
            .done(function(response) {

                if (response.estado == 1) {
                    console.log(response);
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').text('Se ha creado la interconsulta de forma correcta');
                    $('#mensaje').show();
                    $('#modal_interconsulta_psi').modal('hide');
                    ver_pdf_interconsulta(response.id_last);
                }
                else
                {
                    swal({
                        title: "Se ha presentado un problema al registrar." ,
                        icon: "error",
                    })
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
                title: "Complete los datos." ,
                text: mensaje,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
        }
    };
</script>
