<div class="card">
    <div class="card-body mb-2">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <div class="form-row">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Pieza N°</label>
                            <select name="period_historia_pza{{ $counter }}" id="period_historia_pza{{ $counter }}" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @foreach($odontograma as $o)
                                @if($o->urgencia == 0)
                                    <option value="{{ $o->pieza }}">{{ $o->pieza }}</option>
                                @endif
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control form-control-sm" name="period_historia_pza{{ $counter }}" id="period_historia_pza{{ $counter }}" value=""> --}}
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Pérdida de la pieza</label>
                                <select name="period_perdida{{ $counter }}" id="period_perdida{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_perdida{{ $counter }}','div_period_perdida{{ $counter }}','period_obs_perdida{{ $counter }}',3);">
                                    <option selected="" value="1">Espontánea</option>
                                    <option value="2">Extracción por Urgencia</option>
                                    <option value="3">Otro describir</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_period_perdida{{ $counter }}" style="display:none;">
                                <label class="floating-label-activo-sm">Otro motivo</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="period_obs_perdida{{ $counter }}" id="period_obs_perdida{{ $counter }}"></textarea>
                            </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Años</label>
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Años</label>
                                <select name="period_anos_perd{{ $counter }}" id="period_anos_perd{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_anos_perd{{ $counter }}','div_period_anos_perd{{ $counter }}','period_obs_anos_perd{{ $counter }}',4);">
                                    <option selected="" value="1">&lt; 1 año</option>
                                    <option value="2">2 años</option>
                                    <option value="3">3 años</option>
                                    <option value="4">Otro describir</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="div_period_anos_perd{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Años</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="period_obs_anos_perd{{ $counter }}" id="period_obs_anos_perd{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones Pérdida</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Oral" data-seccion="Examen Oral" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="period_obs_ex_oral{{ $counter }}" id="period_obs_ex_oral{{ $counter }}"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group fill">

                    <div class="switch switch-success d-inline m-r-10">
                        <input type="checkbox" onchange="biopsia_check_period({{ $counter }})" id="biopsia_check_period_period{{ $counter }}" name="biopsia_check_period_period{{ $counter }}" value="">
                        <label for="biopsia_check_period_period{{ $counter }}" class="cr"></label>
                    </div>
                    <label>biopsia</label>
                    <hr>
                    <div class="form-group fill">
                        <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="period_biop_zona{{ $counter }}" id="period_biop_zona{{ $counter }}" disabled></textarea>
                    </div>
                    <div class="form-group fill">
                        <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="period_obs_result_biopsia{{ $counter }}" id="period_obs_result_biopsia{{ $counter }}" disabled></textarea>
                    </div>
                    <div class="form-group fill m-50">
                        <button type="button" class="btn btn-outline-success btn-sm " onclick="solicitar_ic_periodoncia()">SOLICITAR INTERCONSULTA PERIODÓNCIA</button>
                    </div>
                </div>

            </div>

        </div>
        <div class="form-group">
            <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_period_period()">X</button>
            <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_period_period({{ $counter }})"><i class="fas fa-save"></i></button>
        </div>
    </div>
</div>

<script>

    function ocultar_pieza_period_period() {
        $('#contenedor_pieza_period_period').empty();
    }

    function guardar_pieza_period_period(counter){
        let pieza = $('#period_historia_pza'+counter).val();
        let perdida = $('#period_perdida'+counter).val(); // Obtiene el value del select
        let perdida_texto = $('#period_perdida'+counter+' option:selected').text(); // Obtiene el texto
        let tiempo = $('#period_anos_perd'+counter).val();
        let tiempo_texto = $('#period_anos_perd'+counter+' option:selected').text();
        let observaciones = $('#period_obs_ex_oral'+counter).val();
        let id_paciente = dame_id_paciente();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_especialidad = $('#id_especialidad').val();

        let biopsia = $('#biopsia_check_period_period'+counter).is(':checked');
        let zona_motivo = $('#period_biop_zona'+counter).val();

        // Si la opción seleccionada es "Otro describir", usa el valor del textarea
        if (perdida == "3") {
            perdida_texto = $('#period_perdida'+counter).val().trim(); // Toma el texto ingresado
        }
        if(tiempo == "4"){
            tiempo_texto = $('#period_anos_perd'+counter).val().trim();
        }

        let valido = 1;
        let mensaje = '';

        if (pieza == '') {
            valido = 0;
            mensaje += '<li>Debe ingresar el número de pieza</li>';
        }
        if (perdida == "3" && perdida_texto == '') {
            valido = 0;
            mensaje += '<li>Debe ingresar el motivo de la pérdida</li>';
        }
        if (tiempo == 0) {
            valido = 0;
            mensaje += '<li>Debe indicar el tiempo en años de pérdida</li>';
        }

        if (valido == 1) {
            let data = {
                id_lugar_atencion:id_lugar_atencion,
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                pieza: pieza,
                perdida: perdida, // Value de la opción seleccionada
                perdida_texto: perdida_texto, // Texto del select o el valor del input
                tiempo: tiempo,
                tiempo_texto: tiempo_texto,
                observaciones: observaciones,
                biopsia: biopsia,
                zona_motivo: zona_motivo,
                _token: CSRF_TOKEN
            }

            console.log(data); // Aquí puedes ver el resultado antes de enviarlo
            let url = "{{ ROUTE('profesional.guardar_pieza_examen_pieza_period') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(resp){
                    console.log(resp);
                    if(resp.mensaje == 'OK'){
                        $('#contenedor_piezas_period_period').empty();
                        $('#contenedor_piezas_period_period').append(resp.v);
                        $('#contenedor_pieza_period_period').empty();
                        swal({
                            title: "Pieza dental guardada",
                            text: "La pieza dental para examen ha sido guardada correctamente.",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });

                    }
                },
                error: function(error){
                    console.log(error);
                    return swal({
                        title: "Error al guardar",
                        text: "Ha ocurrido un error al guardar los datos.",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                dangerMode: true,
            });
        }
    }

</script>
