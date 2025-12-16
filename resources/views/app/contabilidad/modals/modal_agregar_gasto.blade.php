<div id="agregar_gasto_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_gasto_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar gasto Institucional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                    <ul class="nav nav-pills bg-white" id="finanzas" role="tablist">
                        <li class="nav-item active">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1 has-ripple" id="pago_general-tab" data-toggle="tab" href="#pago_general" role="tab" aria-controls="pago_general" aria-selected="false">Pago General<span></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1 has-ripple" id="pago_factura-tab" data-toggle="tab" href="#pago_factura" role="tab" aria-controls="pago_factura" aria-selected="false">Pago Factura<span class="ripple ripple-animate" ></span></a>
                        </li>
                    </ul>
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo de gasto</label>
                                        <select class="form-control form-control-sm" id="tipo_gasto_inst" name="tipo_gasto_inst">
                                            <option value="0" data-select2-id="0">Seleccione</option>
                                            <option value="1">Mensual</option>
                                            <option value="2">Semestral</option>
                                            <option value="3">Anual</option>
                                            <option value="4">Esporádico</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nombre</label>
                                        <input class="form-control form-control-sm" type="text" id="nombre_gasto_inst">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Vencimiento</label>
                                        <input class="form-control form-control-sm" type="date" id="vencimiento_gasto_inst">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Emisor</label>
                                        <input class="form-control form-control-sm" type="text" id="emisor_gasto_inst">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Folio</label>
                                        <input class="form-control form-control-sm" type="text" id="folio_gasto_inst">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Cuenta Contabilidad</label>
                                        <select class="form-control form-control-sm" id="grupo_gasto_inst" name="grupo_gasto_inst">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Generales</option>
                                            <option value="2">Gastos Comunes</option>
                                            <option value="3">G. Operativos</option>
                                            <option value="4">Otros</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Mes de pago</label>
                                        {{-- <input class="form-control form-control-sm" type="text" id="mes_pago_gasto_inst"> --}}
                                        <select  class="form-control form-control-sm" type="text" id="mes_pago_gasto_inst">
                                            @if (date('m') == 1)
                                                <option value="1" selected>ENERO</option>
                                            @else
                                                <option value="1">ENERO</option>
                                            @endif

                                            @if (date('m') == 2)
                                                <option value="2" selected>FEBRERO</option>
                                            @else
                                                <option value="2">FEBRERO</option>
                                            @endif

                                            @if (date('m') == 3)
                                                <option value="3" selected>MARZO</option>
                                            @else
                                                <option value="3">MARZO</option>
                                            @endif

                                            @if (date('m') == 4)
                                                <option value="4" selected>ABRIL</option>
                                            @else
                                                <option value="4">ABRIL</option>
                                            @endif

                                            @if (date('m') == 5)
                                                <option value="5" selected>MAYO</option>
                                            @else
                                                <option value="5">MAYO</option>
                                            @endif

                                            @if (date('m') == 6)
                                                <option value="6" selected>JUNIO</option>
                                            @else
                                                <option value="6">JUNIO</option>
                                            @endif

                                            @if (date('m') == 7)
                                                <option value="7" selected>JULIO</option>
                                            @else
                                                <option value="7">JULIO</option>
                                            @endif

                                            @if (date('m') == 8)
                                                <option value="8" selected>AGOSTO</option>
                                            @else
                                                <option value="8">AGOSTO</option>
                                            @endif

                                            @if (date('m') == 9)
                                                <option value="9" selected>SEPTIEMBRE</option>
                                            @else
                                                <option value="9">SEPTIEMBRE</option>
                                            @endif

                                            @if (date('m') == 10)
                                                <option value="10" selected>OCTUBRE</option>
                                            @else
                                                <option value="10">OCTUBRE</option>
                                            @endif

                                            @if (date('m') == 11)
                                                <option value="11" selected>NOVIEMBRE</option>
                                            @else
                                                <option value="11">NOVIEMBRE</option>
                                            @endif

                                            @if (date('m') == 12)
                                                <option value="12" selected>DICIEMBRE</option>
                                            @else
                                                <option value="12">DICIEMBRE</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Año de pago</label>
                                        {{-- <input class="form-control form-control-sm" type="text" id="ano_pago_gasto_inst"> --}}
                                        <select class="form-control form-control-sm" name="ano_pago_gasto_inst" id="ano_pago_gasto_inst">
                                            @for ($i=2023; $i<=date('Y'); $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Modo de pago</label>
                                        <input class="form-control form-control-sm" type="text" id="modo_pago_gasto_inst">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Monto a pagar</label>
                                        <input class="form-control form-control-sm" type="number" min="0" id="monto_gasto_inst">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-sm-12 col-md-12">
                    <div class="form-row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger-light btn-sm btn-block" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary-light btn-sm btn-block" onclick="agregar_gastos();">Agregar gasto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function mostrar_agregar_gasto() {
        $('#agregar_gasto_cm').modal('show');
    }

    function agregar_gastos()
    {
        var id_institucion = '{{ $institucion->id }}';
        var id_lugar_atencion = '{{ $institucion->id_lugar_atencion }}';
        var tipo = $('#tipo_gasto_inst').val();
        var nombre = $('#nombre_gasto_inst').val();
        var vencimiento = $('#vencimiento_gasto_inst').val();
        var emisor = $('#emisor_gasto_inst').val();
        var folio = $('#folio_gasto_inst').val();
        var grupo = $('#grupo_gasto_inst').val();
        var mes_pago = $('#mes_pago_gasto_inst').val();
        var ano_pago = $('#ano_pago_gasto_inst').val();
        var modo_pago = $('#modo_pago_gasto_inst').val();
        var monto = $('#monto_gasto_inst').val();
        var _token = CSRF_TOKEN;

        let url = "{{ route('gastos.agregar') }}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token : _token,
                id_institucion : id_institucion,
                id_lugar_atencion : id_lugar_atencion,
                tipo : tipo,
                nombre : nombre,
                vencimiento : vencimiento,
                emisor : emisor,
                folio : folio,
                grupo : grupo,
                mes_pago : mes_pago,
                ano_pago : ano_pago,
                modo_pago : modo_pago,
                monto : monto,
            }
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {
                $('#agregar_gasto_cm').modal('hide');
                carga_filtros();
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
                    title: "Agregar Gasto",
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
</script>
