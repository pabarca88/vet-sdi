<div id="editar_gasto_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_gasto_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar gasto Institucional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_editar_gasto_cm" id="id_editar_gasto_cm" value="">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-row">
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de gasto</label>
                                    <select class="form-control form-control-sm" id="tipo_editar_gasto_cm" name="tipo_editar_gasto_cm">
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
                                    <input class="form-control form-control-sm" type="text" id="nombre_editar_gasto_cm">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Vencimiento</label>
                                    <input class="form-control form-control-sm" type="date" id="vencimiento_editar_gasto_cm">
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
                                    <input class="form-control form-control-sm" type="text" id="emisor_editar_gasto_cm">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Folio</label>
                                    <input class="form-control form-control-sm" type="text" id="folio_editar_gasto_cm">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Cuenta Contabilidad</label>
                                    <select class="form-control form-control-sm" id="grupo_editar_gasto_cm" name="grupo_editar_gasto_cm">
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
                                    {{-- <input class="form-control form-control-sm" type="text" id="mes_pago_editar_gasto_cm"> --}}
                                    <select  class="form-control form-control-sm" type="text" id="mes_pago_editar_gasto_cm">
                                        <option value="1">ENERO</option>
                                        <option value="2">FEBRERO</option>
                                        <option value="3">MARZO</option>
                                        <option value="4">ABRIL</option>
                                        <option value="5">MAYO</option>
                                        <option value="6">JUNIO</option>
                                        <option value="7">JULIO</option>
                                        <option value="8">AGOSTO</option>
                                        <option value="9">SEPTIEMBRE</option>
                                        <option value="10">OCTUBRE</option>
                                        <option value="11">NOVIEMBRE</option>
                                        <option value="12">DICIEMBRE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Año de pago</label>
                                    {{-- <input class="form-control form-control-sm" type="text" id="ano_pago_editar_gasto_cm"> --}}
                                    <select class="form-control form-control-sm" name="ano_pago_editar_gasto_cm" id="ano_pago_editar_gasto_cm">
                                        @for ($i=2023; $i<=date('Y'); $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Modo de pago</label>
                                    <input class="form-control form-control-sm" type="text" id="modo_pago_editar_gasto_cm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-row">
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Monto a pagar</label>
                                    <input class="form-control form-control-sm" type="number" min="0" id="monto_editar_gasto_cm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                <button type="submit" class="btn btn-primary-light btn-sm btn-block" onclick="editar_gastos();">Editar gasto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Gastos --}}
<script>
    function mostrar_editar_gasto(id)
    {
        let url = "{{ route('gastos.ver') }}";

        $.ajax({
            url: url,
            type: "get",
            data: {
                id : id
            }
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                $('#id_editar_gasto_cm').val(id);
                $('#tipo_editar_gasto_cm').val(data.registro.tipo);
                $('#nombre_editar_gasto_cm').val(data.registro.nombre);
                $('#vencimiento_editar_gasto_cm').val(data.registro.vencimiento);
                $('#emisor_editar_gasto_cm').val(data.registro.emisor);
                $('#folio_editar_gasto_cm').val(data.registro.folio);
                $('#grupo_editar_gasto_cm').val(data.registro.grupo);
                $('#mes_pago_editar_gasto_cm').val(data.registro.mes_pago);
                $('#ano_pago_editar_gasto_cm').val(data.registro.ano_pago);
                $('#modo_pago_editar_gasto_cm').val(data.registro.modo_pago);
                $('#monto_editar_gasto_cm').val(data.registro.monto);
                $('#editar_gasto_cm').modal('show');

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
                    title: "Editar Gasto",
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

    function editar_gastos()
    {
        var id_institucion = '{{ $institucion->id }}';
        var id_lugar_atencion = '{{ $institucion->id_lugar_atencion }}';
        var id = $('#id_editar_gasto_cm').val();
        var tipo = $('#tipo_editar_gasto_cm').val();
        var nombre = $('#nombre_editar_gasto_cm').val();
        var vencimiento = $('#vencimiento_editar_gasto_cm').val();
        var emisor = $('#emisor_editar_gasto_cm').val();
        var folio = $('#folio_editar_gasto_cm').val();
        var grupo = $('#grupo_editar_gasto_cm').val();
        var mes_pago = $('#mes_pago_editar_gasto_cm').val();
        var ano_pago = $('#ano_pago_editar_gasto_cm').val();
        var modo_pago = $('#modo_pago_editar_gasto_cm').val();
        var monto = $('#monto_editar_gasto_cm').val();

        var _token = CSRF_TOKEN;

        let url = "{{ route('gastos.editar') }}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token : _token,
                id : id,
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
                $('#editar_gasto_cm').modal('hide');
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
