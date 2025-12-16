<!--datos banco-->
<div id="dat_bancarios" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dat_bancarios" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Cuenta bancaria</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <!--Card Nav Pills-->
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-md-12">
                                    <ul class="nav nav-pills bg-white" id="liquidacion_pills" role="tablist">
                                        {{-- <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="liquidacion_1-tab" data-toggle="tab" href="#liquidacion_1" role="tab" aria-controls="liquidacion_1" aria-selected="false">banco 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="liquidacion_2-tab" data-toggle="tab" href="#liquidacion_2" role="tab" aria-controls="liquidacion_2" aria-selected="false">banco 2</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="liquidacion_3-tab" data-toggle="tab" href="#liquidacion_3" role="tab" aria-controls="liquidacion_3" aria-selected="false">banco 3</a>
                                        </li> --}}
                                    </ul>
                                </div>
                                <div class="col-md-12">
                                    <div class="tab-content" id="liquidaciones">
                                        {{-- tab1 --}}
                                        <div class="tab-pane fade active show" id="liquidacion_1" role="tabpanel" aria-labelledby="liquidacion_1-tab">
                                        </div>
                                        {{-- tab2 --}}
                                        <div class="tab-pane fade" id="liquidacion_2" role="tabpanel" aria-labelledby="liquidacion_2-tab">
                                        </div>
                                        {{-- tab3 --}}
                                        <div class="tab-pane fade" id="liquidacion_3" role="tabpanel" aria-labelledby="liquidacion_3-tab">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>

          /** Modals datos bancarios */
          function datos_depositos(id) {

            $('#liquidaciones').html('');
            $('#liquidacion_pills').html('');
            let url = "{{ route('profesional.liquidacion_ver_profesional') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_seccion: id
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    console.log(data.registros);
                    /** encontrado */
                    $('#liquidaciones').html('');
                    $('#liquidacion_pills').html('');


                    $.each(data.registros, function( index, element ) {
                        /** pills */
                        var html_p = '';
                        html_p += '<li class="nav-item">';
                        if(element.principal == 1)
                            html_p += '    <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="liquidacion_'+index+'-tab" data-toggle="tab" href="#liquidacion_'+index+'" role="tab" aria-controls="liquidacion_'+index+'" aria-selected="true">'+element.banco.nombre+'</a>';
                        else
                            html_p += '    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="liquidacion_'+index+'-tab" data-toggle="tab" href="#liquidacion_'+index+'" role="tab" aria-controls="liquidacion_'+index+'" aria-selected="false">'+element.banco.nombre+'</a>';
                        html_p += '</li>';
                        $('#liquidacion_pills').append(html_p);

                        /** cuerpo */
                        var activo = ' active show ';

                        var html = '';
                        html += '<!-- tab '+index+'-->';
                        if(element.principal == 1)
                            html += '<div class="tab-pane fade '+activo+'" id="liquidacion_'+index+'" role="tabpanel" aria-labelledby="liquidacion_'+index+'-tab">';
                        else
                            html += '<div class="tab-pane fade " id="liquidacion_'+index+'" role="tabpanel" aria-labelledby="liquidacion_'+index+'-tab">';
                        html += '<div class="row info-basica" id="info-basica-1">';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_rut">'+element.serie+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Titular</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_nombre">'+element.autor+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Banco</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_banco">'+element.banco.nombre+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Cuenta</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_cuenta">'+element.numero_control+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Tipo Cuenta</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_tipo_cuenta">'+element.otro+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Correo electrónico</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_email">'+element.email+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Principal</label>';
                        if(element.principal == 1)
                            html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_principal">Principal</div>';
                        else
                            html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_principal">Opcional</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '</div>';
                        html += '</div>';
                        $('#liquidaciones').append(html);
                    });

                    $('#dat_bancarios').modal('show');
                }
                else
                {
                    /** no encontrado */
                    swal({
                        title: "El Empleado no posee cuentas registradas.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }
</script>
