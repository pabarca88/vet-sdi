<div class="card-informacion">
    <div class="card-body">
        <div class="form-row align-items-center">
            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Pieza N°</label>
                    <select class="form-control form-control-sm" name="n_pieza_ex_pp_od_odontop{{ $counter }}" id="n_pieza_ex_pp_od_odontop{{ $counter }}">
                        <option value="0">Seleccione</option>
                        @foreach (['5.5', '5.4', '5.3', '5.2', '5.1', '6.1', '6.2', '6.3', '6.4', '6.5', '8.5', '8.4', '8.3', '8.2', '8.1', '7.1', '7.2', '7.3', '7.4', '7.5'] as $pieza)
                            <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-5">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Zona de Dolor</label>
                    <input type="text" class="form-control form-control-sm" name="ex_odontop_zdolor_od{{ $counter }}" id="ex_odontop_zdolor_od{{ $counter }}" value="">
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-5">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Historial de la pieza</label>
                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_odontop_hp_od{{ $counter }}" id="ex_odontop_hp_od{{ $counter }}"></textarea>
                </div>
            </div>
        </div>
        <div class="form-row my-2">
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Intensidad</label>
                    <select name="intensidad_odontop{{ $counter }}" id="intensidad_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad_odontop{{ $counter }}','div_intensidad_odontop{{ $counter }}','obs_intensidad_odontop{{ $counter }}',4);">
                        <option selected value="1">Leve</option>
                        <option value="2">Moderada</option>
                        <option value="3">Severa</option>
                        <option value="4">Intensa</option>
                        <option value="5">Otro (Describir)</option>
                    </select>
                </div>
                <div class="form-group" id="div_intensidad_odontop{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Intensidad</label>
                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad_odontop{{ $counter }}" id="obs_intensidad_odontop{{ $counter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Modo dolor</label>
                    <select name="modo_dolor_odontop{{ $counter }}"  id="modo_dolor_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor_odontop{{ $counter }}','div_modo_dolor_odontop{{ $counter }}','obs_modo_dolor_odontop{{ $counter }}',3);">
                        <option selected value="1">Pulsátil</option>
                        <option value="2">Permanente</option>
                        <option value="3">Otro (Describir)</option>
                    </select>
                </div>
                <div class="form-group" id="div_modo_dolor_odontop{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Modo dolor</label>
                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor_odontop{{ $counter }}" id="obs_modo_dolor_odontop{{ $counter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Localización</label>
                    <select name="loc_dolor_odontop{{ $counter }}" id="loc_dolor_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor_odontop{{ $counter }}','div_loc_dolor_odontop{{ $counter }}','obs_loc_dolor_odontop{{ $counter }}',3);">
                        <option selected  value="1">Localizado</option>
                        <option value="2">Referido</option>
                        <option value="3">Otro (Describir)</option>
                    </select>
                </div>
                <div class="form-group" id="div_loc_dolor_odontop{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Localización</label>
                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor_odontop{{ $counter }}" id="obs_loc_dolor_odontop{{ $counter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Provocación del Dolor</label>
                    <select name="provocacion_dolor_odontop{{ $counter }}" data-titulo="Odontopediatria" data-seccion="Odontopediatria"  id="provocacion_dolor_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor_odontop{{ $counter }}','div_provocacion_dolor_odontop{{ $counter }}','obs_provocacion_dolor_odontop{{ $counter }}',5);">
                        <option selected  value="1">Frío</option>
                        <option value="2">Calor</option>
                        <option value="3">Actividad</option>
                        <option value="4">Masticación</option>
                        <option value="5">Otro (Describir)</option>
                    </select>
                </div>
                <div class="form-group" id="div_provocacion_dolor_odontop{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Provocación del Dolor</label>
                    <textarea class="form-control form-control-sm" data-titulo="Odontopediatria"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor_odontop{{ $counter }}" id="obs_provocacion_dolor_odontop{{ $counter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Observaciones</label>
                    <textarea class="form-control form-control-sm" data-titulo="Odontopediatria"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_observaciones_odontop{{ $counter }}" id="obs_observaciones_odontop{{ $counter }}"></textarea>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Resp. Calor</label>
                    <select id="sel_odontop_resp_calor{{ $counter }}" name="sel_odontop_resp_calor{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                    <select id="sel_odontop_resp_frio{{ $counter }}" name="sel_odontop_resp_frio{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                    <select id="sel_odontop_resp_elect{{ $counter }}" name="sel_odontop_resp_elect{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                    <select id="sel_odontop_resp_perc{{ $counter }}" name="sel_odontop_resp_perc{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                    <select id="sel_odontop_resp_expl{{ $counter }}" name="sel_odontop_resp_expl{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                    <select id="sel_odontop_cavitaria{{ $counter }}" name="sel_odontop_cavitaria{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                        <option><span>N/R </span> No realizada</option>
                        <option><span>↑ </span> Positiva</option>
                        <option><span>↓ </span> Negativa</option>
                        <option><span>N </span> Normal</a></option>
                        <option><span>(-) </span> No responde</a></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-sm btn-outline-info" onclick="guardar_pieza_examen_pieza_odontop({{ $counter }})"><i class="feather icon-save"></i> Guardar</button>
    </div>
</div>
<input type="hidden" name="tipo_examen" id="tipo_examen" value="{{ $tipo_examen }}">

<script>

    $(document).ready(function() {
        $('#n_pieza_ex_pp_od_odontop{{ $counter }}').select2();
    });

    function ocultar_pieza_examen_pieza_odontop() {
        $('#contenedor_nueva_pieza_dental_odontop').empty();
    }

     function guardar_pieza_examen_pieza_odontop(counter){
        let numero_pieza = $('#n_pieza_ex_pp_od_odontop'+counter).val();
        let zona_dolor = $('#ex_odontop_zdolor_od'+counter).val();
        let ex_odontop_hp = $('#ex_odontop_hp_od'+counter).val();
        let intensidad = $('#intensidad_odontop'+counter).val();
        let modo_dolor = $('#modo_dolor_odontop'+counter).val();
        let localizacion = $('#loc_dolor_odontop'+counter).val();
        let provocacion_dolor = $('#provocacion_dolor_odontop'+counter).val();
        let resp_calor = $('#sel_odontop_resp_calor'+counter).val();
        let resp_frio = $('#sel_odontop_resp_frio'+counter).val();
        let resp_elect = $('#sel_odontop_resp_elect'+counter).val();
        let resp_perc = $('#sel_odontop_resp_perc'+counter).val();
        let resp_expl = $('#sel_odontop_resp_expl'+counter).val();
        let resp_cavitaria = $('#sel_odontop_cavitaria'+counter).val();
        let observaciones = $('#obs_observaciones_odontop'+counter).val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_especialidad = $('#id_especialidad').val();
        let tipo_examen = 'odontopediatria';

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza : numero_pieza,
            zona_dolor : zona_dolor,
            ex_odontop_hp : ex_odontop_hp,
            intensidad : intensidad,
            modo_dolor : modo_dolor,
            localizacion : localizacion,
            provocacion_dolor : provocacion_dolor,
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

        if(ex_odontop_hp == ''){
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
                    $('#contenedor_pieza_dental_odontop').empty();
                    $('#contenedor_pieza_dental_odontop').append(resp.v);
                    $('#contenedor_examenes_grupos_dentales_odontop').empty();
                    $('#contenedor_examenes_grupos_dentales_odontop').append(resp.vista_presupuestos);
                    $('#contenedor_nueva_pieza_dental_odontop').empty();
                    $('#planificacion_examenes_odontop').empty();
                    let examenes = resp.examenes;
                    examenes.forEach(examen => {
                        $('#planificacion_examenes_odontop').append(
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
                                            <select name="tipo_tratamiento_odontop" class="form-control form-control-sm">
                                                <option selected="" value="1">Pulpotomía</option>
                                                <option value="2">Pulpectomía</option>
                                                <option value="3">Corona de acero</option>
                                                <option value="4">Extracción</option>
                                                <option value="5">Obturación</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Convenio</label>
                                            <select name="convenio_odontop" class="form-control form-control-sm">
                                                <option selected="" value="1">Convenio</option>
                                                <option value="2">Sin Convenio</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                        `);
                    });

                    swal({
                        title: "Pieza dental guardada",
                        text: "La pieza dental para examen odontopediátrico ha sido guardada correctamente.",
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
                    text: "Ha ocurrido un error al guardar los datos de odontopediatría.",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
    }
</script>
