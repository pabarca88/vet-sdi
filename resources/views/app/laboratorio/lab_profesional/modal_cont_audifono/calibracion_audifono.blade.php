<!--datos Contacto-->
<div id="cal_audifono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cal_audifono" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Calibración de audífono</h5>
                    <p class="font-weight-bold mt-1 mb-0 text-white float-md-right">
                        @php
                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            $fecha = \Carbon\Carbon::parse(now());
                            $mes = $meses[($fecha->format('n')) - 1];
                            $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                        @endphp
                        {{ $fecha }}
                    </p>
                <button type="button" class="close text-white" data-dismiss="modal"  onclick="$('#cal_audifono').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <div class="row info-basica" id="info-basica-1">
                    <div class="col-md-12">
                     <div class="form- row">
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Motivo del control</label>
                                    <select name="mot_cont_audif" id="mot_cont_audif" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mot_cont_audif','div_mot_cont_audif','obs_mot_cont_audif',3);">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Control de Venta</option>
                                        <option value="2">Recalibración</option>
                                        <option value="3">Otros (anotar)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_mot_cont_audif" style="display:none;">
                                    <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Otro Motivo <i>(describir)</i></label>
                                    <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mot_cont_audif" id="obs_mot_cont_audif"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Estado del Audífono</label>
                                    <select name="est_audifono" id="est_audifono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_audifono','div_est_audifono','obs_est_audifono',3);">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Buenas condiciones</option>
                                        <option value="2">Deteriorado</option>
                                        <option value="3">Otros (anotar)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_est_audifono" style="display:none;">
                                    <label class="floating-label-activo-sm t-red" for="obs_est_audifono">Estado del audífono<i>(describir)</i></label>
                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_audifono" id="obs_est_audifono"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo">Marca</label>
                                <input type="text" class="form-control form-control-sm" placeholder="MARCA AUDÍFONO" id="marca_audif" name="marca_audif" value="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo">Modelo</label>
                                <input type="text" class="form-control form-control-sm" placeholder="MODELO" id="model_audif" name="model_audif" value="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo">N° de serie</label>
                                <input type="text" class="form-control form-control-sm" placeholder="N° SERIE" id="n_serie_aud" name="n_serie_aud" value="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo">Fecha de entrega</label>
                                <input type="date" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud" name="fecha_ent_aud" value="">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-blue" for="av_pris_oi">Acciones de calibrado</label>
                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="acciones_calib" id="acciones_calib"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-blue" for="av_pris_oi">Opinión del paciente</label>
                                <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="opinion_calibrado" id="opinion_calibrado"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                            <table class="table table-striped table-sm" id="tabla_historial_calibraciones_audifono">
                                <thead class="thead-light sticky-top">
                                    <tr>
                                        <th style="min-width: 120px;">Motivo Control</th>
                                        <th style="min-width: 120px;">Estado de audífono</th>
                                        <th style="min-width: 150px;">Producto</th>
                                        <th style="min-width: 150px;">Acciones de calibrado</th>
                                        <th style="min-width: 120px;">Opiniones</th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpo_historial_calibraciones_audifono">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-sm btn-danger-light-c" data-dismiss="modal" onclick="$('#cal_audifono').modal('hide')" ><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-sm btn-info-light-c" onclick="registrar_calibracion();"><i class="feather icon-save"></i> Guardar</button>
			</div>
        </div>
    </div>

</div>
<input type="hidden" name="id_producto" id="id_producto" value="">

<style>
    /* Estilos para mejorar la tabla en el modal */
    #tabla_historial_calibraciones_audifono {
        font-size: 0.85rem;
    }

    #tabla_historial_calibraciones_audifono th {
        border-top: none;
        font-weight: 600;
        background-color: #f8f9fa;
    }

    #tabla_historial_calibraciones_audifono td {
        vertical-align: middle;
        word-wrap: break-word;
        max-width: 200px;
    }

    .table-responsive {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
    }

    /* Mantener el header fijo mientras se hace scroll */
    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 10;
    }
</style>

<script>
    function calib_audif (){
        $('#cal_audifono').modal('show');
    }
     function evaluar_para_carga_detalle(select, div, input, valor)
        {
            var valor_select = $('#'+select+'').val();
            if(valor_select == valor) $('#'+div+'').show();
            else {
                $('#'+div+'').hide();
                $('#'+input+'').val('');
            }
        }

        function registrar_calibracion(){
            var id_hora_medica = '{{ isset($hora_medica->id) ? $hora_medica->id : 0 }}';
            var mot_cont_audif = $('#mot_cont_audif').val();
            var obs_mot_cont_audif = $('#obs_mot_cont_audif').val();
            var est_audifono = $('#est_audifono').val();
            var obs_est_audifono = $('#obs_est_audifono').val();
            var marca_audif = $('#marca_audif').val();
            var model_audif = $('#model_audif').val();
            var n_serie_aud = $('#n_serie_aud').val();
            var fecha_ent_aud = $('#fecha_ent_aud').val();
            var acciones_calib = $('#acciones_calib').val();
            var opinion_calibrado = $('#opinion_calibrado').val();
            var id_producto = $('#id_producto').val();
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var id_profesional = $('#id_profesional_fc').val();
            var id_paciente = $('#id_paciente_fc').val();

            $.ajax({
                type: "POST",
                url: "{{ route('laboratorio.profesional.registrar_calibracion_audifono') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id_hora_medica: id_hora_medica,
                    mot_cont_audif: mot_cont_audif,
                    obs_mot_cont_audif: obs_mot_cont_audif,
                    est_audifono: est_audifono,
                    obs_est_audifono: obs_est_audifono,
                    marca_audif: marca_audif,
                    model_audif: model_audif,
                    n_serie_aud: n_serie_aud,
                    fecha_ent_aud: fecha_ent_aud,
                    acciones_calib: acciones_calib,
                    opinion_calibrado: opinion_calibrado,
                    id_producto: id_producto,
                    id_lugar_atencion: id_lugar_atencion,
                    id_profesional: id_profesional,
                    id_paciente: id_paciente,
                },
                success: function (response) {
                    console.log(response);
                    if(response.estado == 1){
                        swal({
                            title: 'Éxito',
                            text: 'La calibración del audífono ha sido registrada correctamente.',
                            icon: 'success',
                        });
                        dame_historial_calibraciones_audifono();
                        // Limpiar campos
                        $('#mot_cont_audif').val(0);
                        $('#obs_mot_cont_audif').val('');
                        $('#est_audifono').val(0);
                        $('#obs_est_audifono').val('');
                        $('#marca_audif').val('');
                        $('#model_audif').val('');
                        $('#n_serie_aud').val('');
                        $('#fecha_ent_aud').val('');
                        $('#acciones_calib').val('');
                        $('#opinion_calibrado').val('');
                    }else{
                        swal({
                            title: 'Error',
                            text: response.mensaje,
                            icon: 'error',
                        })
                    }
                },
                error: function (xhr) {
                    swal('Error', 'Ha ocurrido un error al registrar la calibración.', 'error');
                }
            });
        }

        function dame_historial_calibraciones_audifono(){
            var id_paciente = $('#paciente_seleccionado_id').val();
            if(id_paciente === ''){
                $('#cuerpo_historial_calibraciones_audifono').html(`
                    <tr>
                        <td colspan="5" class="text-center">
                            <div class="alert alert-warning mb-0">
                                <i class="feather icon-alert-circle"></i>
                                Por favor seleccione un paciente para ver su historial de calibraciones.
                            </div>
                        </td>
                    </tr>
                `);
                return;
            }
            $.ajax({
                type: "POST",
                url: "{{ route('laboratorio.profesional.dame_historial_calibraciones_audifono') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id_paciente: id_paciente
                },
                success: function (response) {
                    console.log(response);
                    if(response.estado == 1){
                        var historial = response.data;
                        var tbody = $('#cuerpo_historial_calibraciones_audifono');
                        tbody.empty();

                        if(historial.length > 0){
                            historial.forEach(function(calibracion) {
                                var fila = `
                                    <tr>
                                        <td>${calibracion.motivo_control || 'N/A'}</td>
                                        <td>${calibracion.estado_audifono || 'N/A'}</td>
                                        <td>${calibracion.nombre_producto || 'N/A'} - ${calibracion.marca_producto || 'N/A'}</td>
                                        <td>${calibracion.acciones_calibrado || 'N/A'}</td>
                                        <td>${calibracion.opinion_paciente || 'N/A'}</td>
                                    </tr>
                                `;
                                tbody.append(fila);
                            });
                        } else {
                            tbody.append('<tr><td colspan="5" class="text-center">No hay historial de calibraciones</td></tr>');
                        }
                    }
                },
                error: function (xhr) {
                    console.error('Error al cargar historial:', xhr);
                }
            });
        }

        // Cargar historial cuando se abre el modal
        // $('#cal_audifono').on('shown.bs.modal', function () {
        //     dame_historial_calibraciones_audifono();
        // });
</script>
