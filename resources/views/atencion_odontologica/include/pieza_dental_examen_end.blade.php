<div class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
        <div class="card-informacion">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="floating-label-activo-sm">Pieza N°</label>
                        <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp_end{{ $counter }}" id="n_pieza_ex_pp_end{{ $counter }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Resp.Calor</label>
                            <select id="sel_endo_resp_calor_end{{ $counter }}" name="sel_endo_resp_calor_end{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                            <label class="floating-label-activo-sm">Resp.Frio</label>
                            <select id="sel_endo_resp_frio_end{{ $counter }}" name="sel_endo_resp_frio_end{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                            <select id="sel_endo_resp_elect_end{{ $counter }}" name="sel_endo_resp_elect_end{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                            <select id="sel_endo_resp_perc_end{{ $counter }}" name="sel_endo_resp_perc_end{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                            <label class="floating-label-activo-sm">Exploración</label>
                            <select id="sel_endo_resp_expl_end{{ $counter }}" name="sel_endo_resp_expl_end{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                            <label class="floating-label-activo-sm">Cavitaria</label>
                            <select id="sel_endo_cavitaria_end{{ $counter }}" name="sel_endo_cavitaria_end{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                <option><span>N/R </span> No realizada</option>
                                <option><span>↑ </span> Aumentado</option>
                                <option><span>↓ </span> Disminuido</option>
                                <option><span>N </span> Normal</a></option>
                                <option><span>(-) </span> No responde</a></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            @if($tipo_examen == 'endo')
                    <button type="button" class="btn btn-icon btn-info" onclick="guardar_pieza_examen_pieza_end_({{ $counter }})"><i class="feather icon-save"></i></button>
                    @else
                    <button type="button" class="btn btn-icon btn-info" onclick="guardar_pieza_examen_pieza_odontop({{ $counter }})"><i class="feather icon-save"></i></button>
                    @endif
            </div>
        </div>
    </div>
</div>


<input type="hidden" name="tipo_examen" id="tipo_examen" value="{{ $tipo_examen }}">

<script>
    function ocultar_pieza_examen_pieza_end() {
        $('#nueva_pieza_dental_endo').empty();
    }

    function ocultar_pieza_examen_pieza_odontop(){
        $('#nueva_pieza_dental_odontop_examen').empty();
    }

    function guardar_pieza_examen_pieza_end(counter){
        let numero_pieza = $('#n_pieza_ex_pp_end'+counter).val();
        let resp_calor = $('#sel_endo_resp_calor_end'+counter).val();
        let resp_frio = $('#sel_endo_resp_frio_end'+counter).val();
        let resp_elect = $('#sel_endo_resp_elect_end'+counter).val();
        let resp_perc = $('#sel_endo_resp_perc_end'+counter).val();
        let resp_expl = $('#sel_endo_resp_expl_end'+counter).val();
        let resp_cavitaria = $('#sel_endo_cavitaria_end'+counter).val();
        let id_paciente = dame_id_paciente();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_especialidad = $('#id_especialidad').val();
        let tipo_examen = 'endo';

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza : numero_pieza,
            resp_calor : resp_calor,
            resp_frio : resp_frio,
            resp_elect : resp_elect,
            resp_perc : resp_perc,
            resp_expl: resp_expl,
            resp_cavitaria: resp_cavitaria,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_ficha_atencion: id_ficha_atencion,
            id_especialidad: id_especialidad,
            tipo_examen: tipo_examen
        }

        console.log(numero_pieza);

        let valido = 1;
        let mensaje = '';

        if(numero_pieza == ''){
            valido = 0;
            mensaje += 'El número de pieza es obligatorio.\n';
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
                    let examenes = resp.examenes;
                    $('#contenedor_pieza_dental_endo').empty();
                    $('#contenedor_pieza_dental_endo').append(resp.v);
                    $('#eval_adults').empty();
                    $('#eval_adults').append(resp.vista_presupuestos);
                    $('#nueva_pieza_dental_endo').empty();
                    $('#planificacion_examenes_endo').empty();
                    examenes.forEach(e => {
                        $('#planificacion_examenes_endo').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                    <input type="text" class="form-control form-control-sm" value="${e.numero_pieza}">
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
                        `);
                    });
                    swal({
                        title: "Pieza dental guardada",
                        text: "La pieza dental para examen ha sido guardada correctamente.",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });

                    $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(data.vista_presupuestos);
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

    function guardar_pieza_examen_pieza_end_(id){

        let numero_pieza = $('#n_pieza_ex_pp_end'+id).val();

        let resp_calor = $('#sel_endo_resp_calor_end'+id).val();
        let resp_frio = $('#sel_endo_resp_frio_end'+id).val();
        let resp_elect = $('#sel_endo_resp_elect_end'+id).val();
        let resp_perc = $('#sel_endo_resp_perc_end'+id).val();
        let resp_expl = $('#sel_endo_resp_expl_end'+id).val();
        let resp_cavitaria = $('#sel_endo_cavitaria_end'+id).val();
        let id_paciente = dame_id_paciente();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_especialidad = $('#id_especialidad').val();
        let tipo_examen = 'endo';

        if(numero_pieza == ''){
            return swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: 'El número de pieza es obligatorio.',
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza : numero_pieza,
            resp_calor : resp_calor,
            resp_frio : resp_frio,
            resp_elect : resp_elect,
            resp_perc : resp_perc,
            resp_expl: resp_expl,
            resp_cavitaria: resp_cavitaria,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_ficha_atencion: id_ficha_atencion,
            id_especialidad: id_especialidad,
            tipo_examen: tipo_examen
        }

        console.log(data);

        let url = "{{ route('profesional.guardar_pieza_examen_pieza') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    let piezas_endo = resp.examenes;
                    $('#contenedor_pieza_dental_endo').empty();
                    $('#planificacion_examenes_endo').empty();
                    piezas_endo.forEach(pieza => {
                        $('#contenedor_pieza_dental_endo').append(`
                        <div class="mb-3">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp_end${pieza.id}" id="n_pieza_ex_pp_end${pieza.id}" value="${pieza.numero_pieza}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Resp.Calor</label>
                                        <select id="sel_endo_resp_calor1" name="sel_endo_resp_calor1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                            <option selected="">N/R  No realizada</option>
                                            <option>↑  Aumentado</option>
                                            <option>↓  Disminuido</option>
                                            <option>N  Normal</option>
                                            <option>(-)  No responde</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Resp.Frio</label>
                                        <select id="sel_endo_resp_frio1" name="sel_endo_resp_frio1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                            <option selected="">N/R  No realizada</option>
                                            <option>↑  Aumentado</option>
                                            <option>↓  Disminuido</option>
                                            <option>N  Normal</option>
                                            <option>(-)  No responde</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Eléctrico</label>
                                        <select id="sel_endo_resp_elect1" name="sel_endo_resp_elect1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                            <option selected="">N/R  No realizada</option>
                                            <option>↑  Aumentado</option>
                                            <option>↓  Disminuido</option>
                                            <option>N  Normal</option>
                                            <option>(-)  No responde</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Percusión</label>
                                        <select id="sel_endo_resp_perc1" name="sel_endo_resp_perc1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                            <option selected="">N/R  No realizada</option>
                                            <option>↑  Aumentado</option>
                                            <option>↓  Disminuido</option>
                                            <option>N  Normal</option>
                                            <option>(-)  No responde</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Exploración</label>
                                        <select id="sel_endo_resp_expl1" name="sel_endo_resp_expl1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                            <option selected="">N/R  No realizada</option>
                                            <option>↑  Aumentado</option>
                                            <option>↓  Disminuido</option>
                                            <option>N  Normal</option>
                                            <option>(-)  No responde</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Cavitaria</label>
                                        <select id="sel_endo_cavitaria1" name="sel_endo_cavitaria1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                            <option selected="">N/R  No realizada</option>
                                            <option>↑  Aumentado</option>
                                            <option>↓  Disminuido</option>
                                            <option>N  Normal</option>
                                            <option>(-)  No responde</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_pieza(${pieza.id},'endo')">X</button>
                            </div>
                        </div>
                        `);
                        $('#planificacion_examenes_endo').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${pieza.numero_pieza}">
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
                        `);
                    });
                    $('#nueva_pieza_dental_endo').empty();
                    $('#contenedor_examenes_grupos_dentales').empty();
                    $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                    swal({
                        title:'Exito',
                        text:'Se ha guardado la pieza.',
                        icon:'success'
                    });
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
</script>
