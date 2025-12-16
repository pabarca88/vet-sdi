<!-- Modal agregar acompanante -->
<div class="modal fade" id="modal_agregar_acompanante" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Agregar acompañante de dependiente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <input type="hidden" name="modal_agregar_acompanante_id_paciente" id="modal_agregar_acompanante_id_paciente" value="">
                <input type="hidden" name="modal_agregar_acompanante_id_paciente_dependiente" id="modal_agregar_acompanante_id_paciente_dependiente" value="">

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Rut:</label>
                            <input type="text" class="form-control form-control-sm" name="modal_agregar_acompanante_rut" id="modal_agregar_acompanante_rut" value="" onchange="buscar_rut_acompanante();"/>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Numero Documento:</label>
                            <input type="text" class="form-control form-control-sm" name="modal_agregar_acompanante_numero_documento" id="modal_agregar_acompanante_numero_documento" value=""/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Nombre:</label>
                            <input type="text" class="form-control form-control-sm" name="modal_agregar_acompanante_nombre" id="modal_agregar_acompanante_nombre" value=""/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Apellido Paterno:</label>
                            <input type="text" class="form-control form-control-sm" name="modal_agregar_acompanante_apellido_paterno" id="modal_agregar_acompanante_apellido_paterno" value=""/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Apellido Materno:</label>
                            <input type="text" class="form-control form-control-sm" name="modal_agregar_acompanante_apellido_materno" id="modal_agregar_acompanante_apellido_materno" value=""/>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Email:</label>
                            <input type="email" class="form-control form-control-sm" name="modal_agregar_acompanante_email" id="modal_agregar_acompanante_email" value=""/>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Tipo: <span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" name="modal_agregar_acompanante_tipo" id="modal_agregar_acompanante_tipo">
                                <option value="1">Solo para este paciente dependiente</option>
                                <option value="2">Para Todos mis pacientes dependientes</option>
                            </select>
                        </div>
                    </div>
                </div>

               <!-- <hr>
                <div class="row">
                    <div class="col-md-12"><span style="color: red;">*</span>Campos requeridos</div>
                </div>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="registrar_acompanante();"><i class="feather icon-check"></i> Registrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function ()
    {
        $("#modal_agregar_acompanante_rut").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });
    });



    function buscar_rut_acompanante()
    {
        let rut = $('#modal_agregar_acompanante_rut').val();
        if(rut != '')
        {
            if(rut.length > 5)
            {
                let url = "{{ route('paciente.buscar_persona_rut') }}";
                $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        rut: rut,
                    },
                })
                .done(function(resp) {
                    if (resp !== 'null')
                    {
                        if(resp.estado == 1)
                        {
                            $('#modal_agregar_acompanante_numero_documento').val();
                            $('#modal_agregar_acompanante_nombre').val(resp.registro.nombre);
                            $('#modal_agregar_acompanante_apellido_paterno').val(resp.registro.apellido_paterno);
                            $('#modal_agregar_acompanante_apellido_materno').val(resp.registro.apellido_materno);
                            $('#modal_agregar_acompanante_email').val(resp.registro.email);
                        }
                        else
                        {
                            console.log('sin respuesta de consulta');
                        }
                    }
                    else
                    {
                        console.log('sin respuesta de consulta');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
        }
        else
        {
            console.log('sin respuesta de consulta');
        }
    };


    function abrir_agregar_acompanante(id_paciente_dependiente, id_paciente)
    {
        $('#modal_agregar_acompanante').modal('show');
        $('#modal_agregar_acompanante_id_paciente_dependiente').val(id_paciente_dependiente);
        $('#modal_agregar_acompanante_id_paciente').val(id_paciente);
    }

    function registrar_acompanante()
    {
        var id_paciente = $('#modal_agregar_acompanante_id_paciente').val();
        var id_paciente_dependiente = $('#modal_agregar_acompanante_id_paciente_dependiente').val();
        var rut = $('#modal_agregar_acompanante_rut').val();
        var numero_documento = $('#modal_agregar_acompanante_numero_documento').val();
        var nombre = $('#modal_agregar_acompanante_nombre').val();
        var apellido_paterno = $('#modal_agregar_acompanante_apellido_paterno').val();
        var apellido_materno = $('#modal_agregar_acompanante_apellido_materno').val();
        var email = $('#modal_agregar_acompanante_email').val();
        var tipo = $('#modal_agregar_acompanante_tipo').val();
        var _token = CSRF_TOKEN;


        var url = "{{ route('paciente.acompanante.asignacion') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                id_responsable: id_paciente,
                id_dependiente: id_paciente_dependiente,
                rut: rut,
                numero_documento: numero_documento,
                nombre: nombre,
                apellido_uno: apellido_paterno,
                apellido_dos: apellido_materno,
                email: email,
                id_tipo: tipo,
            },
        })
        .done(function(resp) {
            if (resp !== 'null')
            {
                if(resp.estado == 1)
                {
                    cargarDependientes();
                    // $('#modal_agregar_acompanante_id_paciente').val('');
                    $('#modal_agregar_acompanante_id_paciente_dependiente').val('');
                    $('#modal_agregar_acompanante_rut').val('');
                    $('#modal_agregar_acompanante_numero_documento').val('');
                    $('#modal_agregar_acompanante_nombre').val('');
                    $('#modal_agregar_acompanante_apellido_paterno').val('');
                    $('#modal_agregar_acompanante_apellido_materno').val('');
                    $('#modal_agregar_acompanante_email').val('');
                    $('#modal_agregar_acompanante_tipo').val('1');

                    swal({
                        title: "Asignacion Responsable",
                        text: 'Responsable Asignado a Dependiente',
                        icon: "success",
                    });
                }
                else
                {
                    var mensaje = '';
                    if(resp.error)
                    {
                        $.each(resp.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Asignacion Responsable",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            }
            else
            {
                var mensaje = '';
                if(resp.error)
                {
                    $.each(resp.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Asignacion Responsable",
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

    function cargarResponsable(id_paciente, id_dependiente)
    {

        var datos = {};
        datos.id_responsable = id_paciente;
        datos.id_dependiente = id_dependiente;

        var url = "{{ route('paciente.acompanante.ver') }}";
        $.ajax({
            url: url,
            type: "get",
            data: datos,
        })
        .done(function(resp) {
            if (resp !== 'null')
            {
                if(resp.estado == 1)
                {
                    console.log(id_paciente);
                    console.log(id_dependiente);
                    $('#lista_acompananate_'+id_dependiente+' tbody').html('');
                    var html = '';
                    $.each(resp.registros, function (key, value) {
                        html ='';
                        html +='<tr>';
                        html +='    <td style="font-size: 10px; font-weight: bold;">'+value.acompanante.nombre+' '+value.acompanante.apellido_uno+' '+value.acompanante.apellido_dos+'</td>';
                        html +='    <td style="font-size: 10px; font-weight: bold;">'+value.acompanante.rut+'</td>';
                        html +='</tr>';
                        $('#lista_acompananate_'+id_dependiente+' tbody').append(html);
                    });
                }
                else
                {
                    console.log('sin registros');
                }
            }
            else
            {
                console.log('sin registros');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }


</script>
