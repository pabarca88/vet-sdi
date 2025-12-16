<div class="card-informacion">
    <div class="form-row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
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
</div>
<div class="form-row">
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Resp.Calor</label>
            <select id="sel_odontopo_resp_calor_odontop{{ $counter }}" name="sel_odontopo_resp_calor_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>

    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Resp.Frio</label>
            <select id="sel_odontopo_resp_frio_odontop{{ $counter }}" name="sel_odontopo_resp_frio_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>

    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Eléctrico</label>
            <select id="sel_odontopo_resp_elect_odontop{{ $counter }}" name="sel_odontopo_resp_elect_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Percusión</label>
            <select id="sel_odontopo_resp_perc_odontop{{ $counter }}" name="sel_odontopo_resp_perc_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Exploración</label>
            <select id="sel_odontopo_resp_expl_odontop{{ $counter }}" name="sel_odontopo_resp_expl_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Cavitaria</label>
            <select id="sel_odontopo_cavitaria_odontop{{ $counter }}" name="sel_odontopo_cavitaria_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>
    </div>
    <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_examen_pieza_odontop({{ $counter }})"><i class="fas fa-save"></i></button>
</div>
<input type="hidden" name="tipo_examen" id="tipo_examen" value="{{ $tipo_examen }}">
</div>


<script>
    function ocultar_pieza_dental_dolor_odontop(){
        $('#nueva_pieza_dental_odontop').empty();
    }

    function guardar_pieza_dental_dolor_odontop(count){
        let derivado_por = $('#derivado_por_odontop').val();
        let zona_dolor = $('#zona_dolor_odontop').val();
        let historia_anterior = $('#historia_anterior_odontop').val();


        let pieza_dental_odontop = $('#pieza_dental_odontop'+count).val();
        let tipo_dolor_odontop = $('#tipo_dolor_odontop'+count).val();
        let intensidad_odontop = $('#intensidad_odontop'+count).val();
        let modo_dolor_odontop = $('#modo_dolor_odontop'+count).val();
        let loc_dolor_odontop = $('#loc_dolor_odontop'+count).val();
        let provocacion_dolor = $('#provocacion_dolor_odontop'+count).val();
        let cdo_duele_odontop = $('#cdo_duele_odontop'+count).val();
        let tpo_evolucion_odontop = $('#tpo_evolucion_odontop'+count).val();
        let obs_loc_dolor_odontop = $('#obs_loc_dolor_odontop'+count).val();

        let valido = 1;
        let mensaje = '';
        if(derivado_por == ''){
            valido = 0;
            mensaje += 'Debe seleccionar un derivado por.\n';
        }
        if(zona_dolor == ''){
            valido = 0;
            mensaje += 'Debe seleccionar una zona del dolor.\n';
        }
        if(historia_anterior == ''){
            valido = 0;
            mensaje += 'Debe seleccionar un historial anterior.\n';
        }
        if(pieza_dental_odontop == ''){
            valido = 0;
            mensaje += 'Debe seleccionar una pieza dental.\n';
        }
        if(tipo_dolor_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar un tipo de dolor.\n';
        }
        if(intensidad_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar una intensidad del dolor.\n';
        }
        if(modo_dolor_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar un modo del dolor.\n';
        }
        if(loc_dolor_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar una localización del dolor.\n';
        }
        if(provocacion_dolor == 0){
            valido = 0;
            mensaje += 'Debe seleccionar una provocación del dolor.\n';
        }
        if(cdo_duele_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar cuando duele.\n';
        }
        if(tpo_evolucion_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar el tipo de evolución.\n';
        }
        if(obs_loc_dolor_odontop == ''){
            valido = 0;
            mensaje += 'Debe describir el efecto analgésicos.\n';
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

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza: pieza_dental_odontop,
            tipo_dolor: tipo_dolor_odontop,
            intensidad: intensidad_odontop,
            modo_dolor: modo_dolor_odontop,
            loc_dolor: loc_dolor_odontop,
            provocacion_dolor: provocacion_dolor,
            cdo_duele: cdo_duele_odontop,
            tpo_evolucion: tpo_evolucion_odontop,
            obs_loc_dolor: obs_loc_dolor_odontop,
            derivado_por: derivado_por,
            zona_dolor: zona_dolor,
            historia_anterior: historia_anterior,
            id_paciente: dame_id_paciente(),
            id_profesional: $('#id_profesional_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            tipo_examen: 'odontopediatria',
        }

        console.log(data);

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_odontp_dolor') }}";

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if(response.mensaje == 'OK'){
                    $('#contenedor_pieza_dental_od_general').empty();
                    $('#contenedor_pieza_dental_od_general').append(response.v);
                    $('#nueva_pieza_dental_odontop').empty();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        })
    }
</script>
