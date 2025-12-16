<!--Tab perfil persona liquidacion -->
<div class="tab-pane fade" id="info-liquidacion" role="tabpanel" aria-labelledby="info-liquidacion-tab">
    {{-- formulario para agregar  --}}
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5 class="f-20 text-c-blue d-inline mr-2 pt-1">Cuentas bancarias para depósito</h5>
            @if($liquidacion != NULL)
                <input type="hidden" name="cantidad_liquidaciones" id="cantidad_liquidaciones" value="{{ $liquidacion->count() }}">
            @else
                <input type="hidden" name="cantidad_liquidaciones" id="cantidad_liquidaciones" value="0">
            @endif
            @if($liquidacion != NULL)
                @if ($liquidacion->count() >= 4)
                    <button type="button" class="btn btn-info btn-sm d-inline float-right mb-2" onclick="" disabled="disabled"><i class="fas fa-plus"></i> Añadir</button>
                @else
                    <button type="button" class="btn btn-info btn-sm d-inline float-right mb-2" onclick="cta_banco_m();"><i class="fas fa-plus"></i> Añadir</button>
                @endif
            @endif

        </div>
    </div>
    <div class="row">
        @if($liquidacion != NULL)
            @foreach($liquidacion as $key_liqu => $value_liqu)
                {{-- CAJA DE REGISTRO LIQUIDACION  --}}
                <div class="col-sm-12 col-md-6">
                    <!--Card LIQUIDACION-->
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between bg-primary">
                            {{-- <h5 class="mb-0 text-white">{{ $value_liqu->banco->nombre }}</h5> --}}
                            <h5 class="mb-0 text-white">{{ $value_liqu->banco['nombre'] }}</h5>
                            <div class="float-md-right d-inline">
                                <button type="button" class="btn btn-light btn-icon" data-toggle="collapse" data-target=".u_personal_liquidacion_{{ $value_liqu->id }}" aria-expanded="false" aria-controls="u_personal_liquidacion_{{ $value_liqu->id }}_1 u_personal_liquidacion_{{ $value_liqu->id }}_2">
                                    <i class="feather icon-edit"></i>
                                </button>
                                <!--BOTÓN ELIMINAR PROGRAMAR - BORRAR COMENTARIO CUANDO SE PROGRAME-->
                                @if ($value_liqu->principal == 1)
                                    {{-- si es cuenta principal no se puede eliminar --}}
                                    <button type="button" class="btn btn-light btn-icon" onclick="" disabled="disabled">
                                        <i class="feather icon-x"></i>
                                    </button>
                                @else
                                    <button type="button" class="btn btn-light btn-icon" onclick="eliminar_registro_liquidacion({{ $value_liqu->id }})">
                                        <i class="feather icon-x"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                        <!--LIQUIDACION-->
                        <div class="card-body u_personal_liquidacion_{{ $value_liqu->id }} collapse show" id="u_personal_liquidacion_{{ $value_liqu->id }}_1">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Rut</label>
                                        <div>{{ $value_liqu->serie }}</div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Titular</label>
                                        <div>{{ $value_liqu->autor }}</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Banco</label>
                                        <div> {{ $value_liqu->banco['nombre'] }}</div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Nº de Cuenta</label>
                                        <div>{{  substr($value_liqu->numero_control, 0, 3) . '*******'; }}</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Tipo Cuenta</label>
                                        <div>{{  $value_liqu->otro; }}</div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Correo electrónico</label>
                                        <div>{{ $value_liqu->email }}</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Cuenta principal u opcional</label>
                                        <div>@if ($value_liqu->principal == 1)
                                            Cuenta Principal
                                        @else
                                            Cuenta Opcional
                                        @endif</div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--Cierre: DATOS BANCARIOS-->                                                                                                                                                                                                                                                                                  <!--(Editar)DATOS BANCARIOS-->
                        <div class="card-body border-top u_personal_liquidacion_{{ $value_liqu->id }} collapse" id="u_personal_liquidacion_{{ $value_liqu->id }}_2">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="text" class="form-control form-control-sm" id="{{ $value_liqu->id }}_liquidacion_rut" value="{{ $value_liqu->serie }}">
                                </div>
                                 <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm">Titular</label>
                                    <input type="text" class="form-control form-control-sm" id="{{ $value_liqu->id }}_liquidacion_nombre" value="{{ $value_liqu->autor }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class=floating-label-activo-sm>Banco</label>
                                    <select name="{{ $value_liqu->id }}_liquidacion_banco" id="{{ $value_liqu->id }}_liquidacion_banco" class="form-control form-control-sm">
                                        <option value="">Seleccione</option>
                                        @foreach ( $bancos as $banco)
                                            @if ($value_liqu->casa == $banco->id)
                                            <option value="{{ $banco->id }}" selected>{{ $banco->nombre }}</option>
                                            @else
                                            <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm">Nº de Cuenta</label>
                                    <input type="text" class="form-control form-control-sm" id="{{ $value_liqu->id }}_liquidacion_cuenta" value="{{ $value_liqu->numero_control }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm">Tipo de Cuenta</label>
                                    <select name="{{ $value_liqu->id }}_liquidacion_tipo_cuenta" id="{{ $value_liqu->id }}_liquidacion_tipo_cuenta" class="form-control form-control-sm">
                                        <option value="">Seleccione</option>
                                        <option value="Corriente" @if(mb_strtoupper($value_liqu->otro) == mb_strtoupper('Corriente')) selected @endif>Corriente</option>
                                        <option value="Ahorro" @if(mb_strtoupper($value_liqu->otro) == mb_strtoupper('Ahorro')) selected @endif>Ahorro</option>
                                        <option value="Vista" @if(mb_strtoupper($value_liqu->otro) == mb_strtoupper('Vista')) selected @endif>Vista</option>
                                    </select>
                                </div>
                                 <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm">Correo electrónico</label>
                                    <input type="text" class="form-control form-control-sm" id="{{ $value_liqu->id }}_liquidacion_email" value="{{ $value_liqu->email }}">
                                </div>
                            </div>
                            @if($liqui_principal == 0)
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Es cuenta principal?</label>
                                    <div class="col-sm-7 switch switch-success d-inline ">
                                        @if ($value_liqu->principal == 1)
                                        <input type="checkbox" id="{{ $value_liqu->id }}_liquidacion_principal" name="{{ $value_liqu->id }}_liquidacion_principal" value="" checked>
                                        @else
                                        <input type="checkbox" id="{{ $value_liqu->id }}_liquidacion_principal" name="{{ $value_liqu->id }}_liquidacion_principal" value="">
                                        @endif
                                        <label for="{{ $value_liqu->id }}_liquidacion_principal" class="cr"></label>
                                    </div>
                                </div>
                            @else
                                @if($value_liqu->principal == 0)
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label font-weight-bolder">Cuenta opcional</label>
                                        <div class="col-sm-7 switch switch-success d-inline ">
                                            <input type="checkbox" id="{{ $value_liqu->id }}_liquidacion_principal" name="{{ $value_liqu->id }}_liquidacion_principal" disabled="disabled" value="">
                                            <label for="{{ $value_liqu->id }}_liquidacion_principal" class="cr"></label>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                            <div class="alert alert-primary py-1" role="alert">
                                                <p class="font-weight-bolder text-c-blue">Para activar esta cuenta como principal,  debe desactivar su cuenta principal actual.</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label font-weight-bolder">Cuenta Principal</label>
                                        <div class="col-sm-7 switch switch-success d-inline ">
                                            <input type="checkbox" id="{{ $value_liqu->id }}_liquidacion_principal" name="{{ $value_liqu->id }}_liquidacion_principal" value="" checked>
                                            <label for="{{ $value_liqu->id }}_liquidacion_principal" class="cr"></label>
                                        </div>
                                    </div>
                                @endif

                            @endif
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button class="btn btn-info btn-sm" onclick="modificar_registro_liquidacion({{ $value_liqu->id }});"><i class="feather icon-save"></i> Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@include('app.profesional.modales.datos_bancarios')

{{-- modal para informar que ha llegado al maximo de cuentas permitidas --}}
<div id="modalMaximocuentaLiquidacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalMaximocuentaLiquidacion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Datos Bancarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalMaximocuentaLiquidacion').modal('hide');"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex">
                        <h5 class="f-20 text-c-blue d-inline pt-1">Ha llegado al Máximo de Cuentas Bancarias</h5>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-danger-light-c mr-2" data-dismiss="modal" onclick="$('#modalMaximocuentaLiquidacion').modal('hide');"><i class="feather icon-x"></i> Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>

    function cta_banco_m()
    {
        if(parseInt($('#cantidad_liquidaciones').val()) >= 4 )
        {
            $('#modalMaximocuentaLiquidacion').modal('show');
        }
        else
        {
            $('#cta_banco_modal').modal('show');
        }
    }

    function cerrar_cta_banco_m()
    {
        $('#cta_banco_modal').modal('hide');
    }

    function agregar_registro_liquidacion()
    {
        var mensaje = '';
        var valido = 1;
        var id_profesional = $('#liquidacion_id_profesional').val();
        var email = $('#liquidacion_email').val();
        var rut = $('#liquidacion_rut').val();
        var nombre = $('#liquidacion_nombre').val();
        var banco = $('#liquidacion_banco').val();
        var cuenta = $('#liquidacion_cuenta').val();
        var tipo_cuenta = $('#liquidacion_tipo_cuenta').val();
        var principal = 0;
        if($('#liquidacion_principal').prop('checked'))
            principal = 1;

        if(rut == '')
        {
            mensaje += 'Campo rut requerido\n';
            valido = 0;
        }
        if(nombre == '')
        {
            mensaje += 'Campo nombre requerido\n';
            valido = 0;
        }
        if(banco == '')
        {
            mensaje += 'Campo banco requerido\n';
            valido = 0;
        }
        if(cuenta == '')
        {
            mensaje += 'Campo cuenta requerido\n';
            valido = 0;
        }
        if(tipo_cuenta == '')
        {
            mensaje += 'Campo cuenta requerido\n';
            valido = 0;
        }

        if(valido == 1)
        {
            let url = "{{ route('liquidacion.agregar') }}";
            let token = CSRF_TOKEN;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    id_profesional:id_profesional,
                    email:email,
                    rut:rut,
                    nombre:nombre,
                    banco:banco,
                    cuenta:cuenta,
                    tipo_cuenta:tipo_cuenta,
                    principal:principal,
                },
            })
            .done(function(data) {

                if (data.estado == 1) {

                    swal({
                        title: "se a agregado datos de liquidacion con exito",
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 100);
                    // alert('se modifico antecedentes del paciente');
                    // location.reload();

                } else {
                    swal({
                        title: "Error al agregar datos de liquidacion",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('Error al modificar los antecedentes');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Campo requerido",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

    }

    function modificar_registro_liquidacion(id)
    {
        var mensaje = '';
        var valido = 1;
        var id_profesional = $('#liquidacion_id_profesional').val();

        var rut = $('#'+id+'_liquidacion_rut').val();
        var nombre = $('#'+id+'_liquidacion_nombre').val();
        var banco = $('#'+id+'_liquidacion_banco').val();
        var cuenta = $('#'+id+'_liquidacion_cuenta').val();
        var tipo_cuenta = $('#'+id+'_liquidacion_tipo_cuenta').val();
        var email = $('#'+id+'_liquidacion_email').val();
        var principal = 0;
        if($('#'+id+'_liquidacion_principal').prop('checked'))
            principal = 1;

        if(rut == '')
        {
            mensaje += 'Campo rut requerido\n';
            valido = 0;
        }
        if(nombre == '')
        {
            mensaje += 'Campo nombre requerido\n';
            valido = 0;
        }
        if(banco == '')
        {
            mensaje += 'Campo banco requerido\n';
            valido = 0;
        }
        if(cuenta == '')
        {
            mensaje += 'Campo cuenta requerido\n';
            valido = 0;
        }
        if(tipo_cuenta == '')
        {
            mensaje += 'Campo tipo cuenta requerido\n';
            valido = 0;
        }

        if(valido == 1)
        {
            let url = "{{ route('liquidacion.modificar') }}";
            let token = CSRF_TOKEN;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    id:id,
                    id_profesional:id_profesional,
                    email:email,
                    rut:rut,
                    nombre:nombre,
                    banco:banco,
                    cuenta:cuenta,
                    tipo_cuenta:tipo_cuenta,
                    principal:principal,
                },
            })
            .done(function(data) {

                if (data.estado == 1) {

                    swal({
                        title: "se a modificar datos de liquidacion con exito",
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 100);
                    // alert('se modifico antecedentes del paciente');
                    // location.reload();

                } else {
                    swal({
                        title: "Error al modificar datos de liquidacion",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('Error al modificar los antecedentes');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Campo requerido",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function eliminar_registro_liquidacion(id)
    {
        let url = "{{ route('liquidacion.eliminar') }}";
        let token = CSRF_TOKEN;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                id: id,
            },
        })
        .done(function(data) {

            if (data.estado == 1) {

                swal({
                    title: "Se Elimino datos de liquidacion",
                    icon: "success",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                })
                setTimeout(function() {
                    location.reload()
                }, 1000);
                // alert('se modifico antecedentes del paciente');
                // location.reload();

            } else {
                swal({
                    title: "Error al Eliminar datos de liquidacion",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('Error al modificar los antecedentes');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>
