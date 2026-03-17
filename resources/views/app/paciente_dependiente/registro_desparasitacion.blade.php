@extends('template.paciente_dependiente.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip"
                                    data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.mis_profesionales') }}">Registro de desparasitación</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                            <h4 class="f-20 text-white mb-2 mb-md-0">Registro de desparasitación</h4>
                            <button type="button" class="btn btn-outline-light rounded-pill px-4 py-2" data-toggle="modal" data-target="#modal_desparasitacion">
                                + Añadir registro
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabla_recetas_paciente_ro"
                                        class="display table table-striped dt-responsive nowrap table-sm"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Fecha dosis</th>
                                                <th class="align-middle">Antiparasitario</th>
                                                <th class="align-middle">Tipo</th>
                                                <th class="align-middle">Próx.Dosis</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabla_desparasitaciones_body">
                                            @forelse(($desparasitaciones ?? []) as $registro)
                                                <tr>
                                                    <td class="align-middle">
                                                        <span class="badge badge-secondary">
                                                            {{ !empty($registro['fecha_dosis']) ? \Carbon\Carbon::parse($registro['fecha_dosis'])->format('d-m-Y') : '-' }}
                                                        </span>
                                                    </td>
                                                    <td class="align-middle">{{ $registro['antiparasitario'] ?? '-' }}</td>
                                                    <td class="align-middle">{{ $registro['tipo'] ?? '-' }}</td>
                                                    <td class="align-middle text-center">
                                                        <span class="badge badge-info">
                                                            {{ !empty($registro['proxima_dosis']) ? \Carbon\Carbon::parse($registro['proxima_dosis'])->format('d-m-Y') : '-' }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="align-middle text-center text-muted" colspan="4">Sin registros</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cierre: Container Completo-->

<div class="modal fade" id="modal_desparasitacion" tabindex="-1" role="dialog" aria-labelledby="modal_desparasitacion_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_desparasitacion_label">Añadir registro de desparasitación</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_desparasitacion_modal">
                    <div class="form-group col-12 px-0">
                        <label class="floating-label-activo-sm">Fecha dosis</label>
                        <input type="date" class="form-control form-control-sm" id="des_fecha_dosis_modal" name="fecha_dosis">
                    </div>
                    <div class="form-group col-12 px-0">
                        <label class="floating-label-activo-sm">Antiparasitario</label>
                        <input type="text" class="form-control form-control-sm" id="des_antiparasitario_modal" name="antiparasitario">
                    </div>
                    <div class="form-group col-12 px-0">
                        <label class="floating-label-activo-sm">Tipo</label>
                        <select class="form-control form-control-sm" id="des_tipo_modal" name="tipo">
                            <option value="">Seleccione</option>
                            <option value="Externo">Externo</option>
                            <option value="Interno">Interno</option>
                            <option value="Interno y Externo">Interno y Externo</option>
                        </select>
                    </div>
                    <div class="form-group col-12 px-0">
                        <label class="floating-label-activo-sm">Prox. Dosis</label>
                        <input type="date" class="form-control form-control-sm" id="des_proxima_dosis_modal" name="proxima_dosis">
                    </div>
                    <div class="text-center pt-2">
                        <button type="submit" class="btn btn-info rounded-pill px-4">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script>
        function formatearFechaDesparasitacion(fecha) {
            if (!fecha) {
                return '-';
            }

            return moment(fecha).format('DD-MM-YYYY');
        }

        function renderTablaDesparasitaciones(registros) {
            var $tbody = $('#tabla_desparasitaciones_body');
            $tbody.html('');

            if (!registros || registros.length === 0) {
                $tbody.append('<tr><td class="align-middle text-center text-muted" colspan="4">Sin registros</td></tr>');
                return;
            }

            $.each(registros, function(_, registro) {
                var html = '';
                html += '<tr>';
                html += '    <td class="align-middle"><span class="badge badge-secondary">' + formatearFechaDesparasitacion(registro.fecha_dosis) + '</span></td>';
                html += '    <td class="align-middle">' + (registro.antiparasitario || '-') + '</td>';
                html += '    <td class="align-middle">' + (registro.tipo || '-') + '</td>';
                html += '    <td class="align-middle text-center"><span class="badge badge-info">' + formatearFechaDesparasitacion(registro.proxima_dosis) + '</span></td>';
                html += '</tr>';
                $tbody.append(html);
            });
        }

        function limpiarFormularioDesparasitacion() {
            $('#form_desparasitacion_modal')[0].reset();
        }

        function active_e(tipo_esp){
            if(tipo_esp=='all')
            {
                $('.filtro_le').removeClass('d-none');
            }else{
                $('.filtro_le').addClass('d-none');
                $('.le_'+tipo_esp).removeClass('d-none');
            }
        }

        $(document).on('submit', '#form_desparasitacion_modal', function(e) {
            e.preventDefault();

            var url = "{{ route('paciente.mascotas.desparasitaciones.guardar', ['mascotaId' => $mascota->id]) }}";
            var data = {
                _token: CSRF_TOKEN,
                fecha_dosis: $('#des_fecha_dosis_modal').val(),
                antiparasitario: $('#des_antiparasitario_modal').val(),
                tipo: $('#des_tipo_modal').val(),
                proxima_dosis: $('#des_proxima_dosis_modal').val(),
            };

            $.post(url, data)
                .done(function(resp) {
                    renderTablaDesparasitaciones(resp.desparasitaciones || []);
                    limpiarFormularioDesparasitacion();
                    $('#modal_desparasitacion').modal('hide');
                    swal({
                        title: 'Registro guardado',
                        text: 'La desparasitación fue agregada correctamente.',
                        icon: 'success',
                    });
                })
                .fail(function(xhr) {
                    var msj = 'No se pudo guardar la desparasitación';
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        var primerCampo = Object.keys(xhr.responseJSON.error)[0];
                        if (primerCampo && xhr.responseJSON.error[primerCampo][0]) {
                            msj = xhr.responseJSON.error[primerCampo][0];
                        }
                    }

                    swal({
                        title: msj,
                        icon: 'warning',
                    });
                });
        });
    </script>
@endsection
