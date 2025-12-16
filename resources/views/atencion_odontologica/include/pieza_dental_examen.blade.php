<div class="card-informacion">
    <div class="card-body">
        <div class="form-row align-items-center">
            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Pieza N°</label>
                    <select class="form-control form-control-sm" name="n_pieza_ex_pp_od_gral{{ $counter }}" id="n_pieza_ex_pp_od_gral{{ $counter }}">
                        <option value="0">Seleccione</option>
                         @foreach (['1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8','3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '4.1', '4.2', '4.3', '4.4', '4.5', '4.6', '4.7', '4.8'] as $pieza)
                            <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-5">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Zona de Dolor</label>
                    <input type="text" class="form-control form-control-sm" name="ex_grl_zdolor_od_gral{{ $counter }}" id="ex_grl_zdolor_od_gral{{ $counter }}" value="">
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-5">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Historial de la pieza</label>
                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_grl_hp_od_gral{{ $counter }}" id="ex_grl_hp_od_gral{{ $counter }}"></textarea>
                </div>
            </div>
        </div>
        <div class="form-row my-2">
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Intensidad</label>
                    <select name="intensidad" id="intensidad" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad','div_intensidad','obs_intensidad',4);">
                        <option selected value="1">Leve</option>
                        <option value="2">Moderada</option>
                        <option value="3">Severa</option>
                        <option value="4">Intensa</option>
                        <option value="5">Otro (Describir)</option>
                    </select>
                </div>
                <div class="form-group" id="div_intensidad" style="display:none;">
                    <label class="floating-label-activo-sm">Intensidad</label>
                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad" id="obs_intensidad"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Modo dolor</label>
                    <select name="modo_dolor"  id="modo_dolor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor','div_modo_dolor','obs_modo_dolor',3);">
                        <option selected value="1">Pulsátil</option>
                        <option value="2">Permanente</option>
                        <option value="3">Otro (Describir)</option>
                    </select>
                </div>
                <div class="form-group" id="div_modo_dolor" style="display:none;">
                    <label class="floating-label-activo-sm">Modo dolor</label>
                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor" id="obs_modo_dolor"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Localización</label>
                    <select name="loc_dolor" id="loc_dolor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor','div_loc_dolor','obs_loc_dolor',3);">
                        <option selected  value="1">Localizado</option>
                        <option value="2">Referido</option>
                        <option value="3">Otro (Describir)</option>
                    </select>
                </div>
                <div class="form-group" id="div_loc_dolor" style="display:none;">
                    <label class="floating-label-activo-sm">Localización</label>
                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor" id="obs_loc_dolor"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Provocación del Dolor</label>
                    <select name="provocacion_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor','div_provocacion_dolor','obs_provocacion_dolor',5);">
                        <option selected  value="1">Frío</option>
                        <option value="2">Calor</option>
                        <option value="3">Actividad</option>
                        <option value="4">Masticación</option>
                        <option value="5">Otro (Describir)</option>
                    </select>
                </div>
                <div class="form-group" id="div_provocacion_dolor" style="display:none;">
                    <label class="floating-label-activo-sm">Provocación del Dolor</label>
                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor" id="obs_provocacion_dolor"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Observaciones</label>
                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_observaciones{{ $counter }}" id="obs_observaciones{{ $counter }}"></textarea>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Resp. Calor</label>
                    <select id="sel_endo_resp_calor{{ $counter }}" name="sel_endo_resp_calor{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                        <option><span>N/R </span> No realizada</option>
                        <option><span>↑ </span> Aumentado</option>
                        <option><span>↓ </span> Disminuido</option>
                        <option><span>N </span> Normal</a></option>
                        <option><span>(-) </span> No responde</a></option>
                    </select>
                </div>

            </div>
            <div class="col-sm-12 col-md-6 col-lg-6  col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Resp. Frío</label>
                    <select id="sel_endo_resp_frio{{ $counter }}" name="sel_endo_resp_frio{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                        <option><span>N/R </span> No realizada</option>
                        <option><span>↑ </span> Aumentado</option>
                        <option><span>↓ </span> Disminuido</option>
                        <option><span>N </span> Normal</a></option>
                        <option><span>(-) </span> No responde</a></option>
                    </select>
                </div>

            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Eléctrico</label>
                    <select id="sel_endo_resp_elect{{ $counter }}" name="sel_endo_resp_elect{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                        <option><span>N/R </span> No realizada</option>
                        <option><span>↑ </span> Aumentado</option>
                        <option><span>↓ </span> Disminuido</option>
                        <option><span>N </span> Normal</a></option>
                        <option><span>(-) </span> No responde</a></option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Percusión</label>
                    <select id="sel_endo_resp_perc{{ $counter }}" name="sel_endo_resp_perc{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                        <option><span>N/R </span> No realizada</option>
                        <option><span>↑ </span> Positiva</option>
                        <option><span>↓ </span> Negativa</option>
                        <option><span>N </span> Normal</a></option>
                        <option><span>(-) </span> No responde</a></option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Exploración</label>
                    <select id="sel_endo_resp_expl{{ $counter }}" name="sel_endo_resp_expl{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                        <option><span>N/R </span> No realizada</option>
                        <option><span>↑ </span> Positiva</option>
                        <option><span>↓ </span> Negativa</option>
                        <option><span>N </span> Normal</a></option>
                        <option><span>(-) </span> No responde</a></option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Cavitaria</label>
                    <select id="sel_endo_cavitaria{{ $counter }}" name="sel_endo_cavitaria{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                        <option><span>N/R </span> No realizada</option>
                        <option><span>↑ </span> Positiva</option>
                        <option><span>↓ </span> Negativa</option>
                        <option><span>N </span> Normal</a></option>
                        <option><span>(-) </span> No responde</a></option>
                    </select>
                </div>
            </div>
            <!--<button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_examen_pieza()">X</button>
            <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_examen_pieza({{ $counter }},'gral')"><i class="fas fa-save"></i></button>-->
        </div>
    </div>
    <div class="card-footer">
        {{-- <button type="button" class="btn btn-icon btn-danger" onclick="ocultar_pieza_examen_pieza()"><i class="feather icon-x"></i></button> --}}
        <button type="button" class="btn btn-sm btn-outline-info" onclick="guardar_pieza_examen_pieza({{ $counter }},'gral')"><i class="feather icon-save"></i> Guardar</button>

    </div>
</div>

<script>

    $(document).ready(function() {
        $('#n_pieza_ex_pp_od_gral1000').select2();
    });

    function ocultar_pieza_examen_pieza() {
        $('#contenedor_nueva_pieza_dental').empty();
    }

    function guardar_pieza_examen_pieza(counter){
        let numero_pieza = $('#n_pieza_ex_pp_od_gral'+counter).val();
        let zona_dolor = $('#ex_grl_zdolor_od_gral'+counter).val();
        let historia_anterior = $('#ex_grl_hp_od_gral'+counter).val();
        let resp_calor = $('#sel_endo_resp_calor'+counter).val();
        let resp_frio = $('#sel_endo_resp_frio'+counter).val();
        let resp_elect = $('#sel_endo_resp_elect'+counter).val();
        let resp_perc = $('#sel_endo_resp_perc'+counter).val();
        let resp_expl = $('#sel_endo_resp_expl'+counter).val();
        let resp_cavitaria = $('#sel_endo_cavitaria'+counter).val();
        let observaciones = $('#obs_observaciones'+counter).val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_especialidad = $('#id_especialidad').val();
        let tipo_examen = 'gral';

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza : numero_pieza,
            zona_dolor : zona_dolor,
            historia_anterior : historia_anterior,
            resp_calor : resp_calor,
            resp_frio : resp_frio,
            resp_elect : resp_elect,
            resp_perc : resp_perc,
            resp_expl: resp_expl,
            resp_cavitaria: resp_cavitaria,
            observaciones: observaciones,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_ficha_atencion: id_ficha_atencion,
            id_especialidad: id_especialidad,
            tipo_examen: tipo_examen
        }

        let valido = 1;
        let mensaje = '';

        if(numero_pieza == '' || numero_pieza == '0'){
            valido = 0;
            mensaje += 'El número de pieza es obligatorio.</br>';
        }

        if(zona_dolor == ''){
            valido = 0;
            mensaje += 'La zona de dolor es obligatoria.</br>';
        }

        if(ex_grl_hp == ''){
            valido = 0;
            mensaje += 'La historia de la pieza es obligatoria.</br>';
        }

        if(observaciones == ''){
            //valido = 0;
            //mensaje += 'Las observaciones son obligatorias.</br>';
        }

        if(valido == 0){
            return swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

        let url = "{{ ROUTE('profesional.guardar_pieza_examen_pieza') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    mostrar_pieza_dental_examen(2000);
                    $('#contenedor_pieza_dental_endo_gral').empty();
                    $('#contenedor_pieza_dental_endo_gral').append(resp.v);
                    $('#contenedor_examenes_grupos_dentales').empty();
                    $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                    $('#contenedor_nueva_pieza_dental').empty();
                    $('#planificacion_examenes_gral').empty();
                    let examenes = resp.examenes;
                    examenes.forEach(examen => {
                        $('#planificacion_examenes_gral').append(
                            `<div class="form-row">
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                            <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                            <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                <option selected="" value="1">Uniradicular</option>
                                                <option value="2">Biradicular</option>
                                                <option value="2">Triradicular</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                            <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Convenio</label>
                                            <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                                <option selected="" value="1">Convenio</option>
                                                <option value="2">Sin Convenio</option>
                                            </select>
                                        </div>
                                    </div>

                            </div>
                `
                        );
                    });
                    // si es 1 es examen general
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
    }
</script>
