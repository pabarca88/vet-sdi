<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h6 class="t-aten d-inline"> PFP</h6>
             </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12 col-md-6 col-lg-6  col-xl-6 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Pieza N°</label>
                    <input type="text" class="form-control form-control-sm" name="n_pieza_pfp{{ $counter }}" id="n_pieza_pfp{{ $counter }}">
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6  col-xl-6  col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Tipo de anclaje</label>
                    <select name="tipo_anc_impl_pfp{{ $counter }}" id="tipo_anc_impl_pfp{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_anc_impl_pfp{{ $counter }}','div_tipo_anc_impl_pfp{{ $counter }}','det_tipo_anc_impl_pfp{{ $counter }}',3)">
                        <option value="0">Seleccione</option>
                        <option value="1">Ferulizada Atornillada </option>
                        <option value="2">Ferulizada Cementada </option>
                        <option value="3">Otra</option>
                    </select>
                </div>
                <div class="form-group"   id="div_tipo_anc_impl_pfp{{ $counter }}" style="display:none">
                    <label class="floating-label-activo-sm">Observaciones</label>
                    <input type="text" class="form-control form-control-sm" name="det_tipo_anc_impl_pfp{{ $counter }}" id="det_tipo_anc_impl_pfp{{ $counter }}">

                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Impresión / Envío a Lab.</label>
                    <select name="corona_toma_imp_pfp{{ $counter }}" id="corona_toma_imp_pfp{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('corona_toma_imp_pfp{{ $counter }}','div_corona_toma_imp_pfp{{ $counter }}','det_corona_toma_imp_pfp{{ $counter }}',2)">
                        <option value="0">Seleccione</option>
                        <option value="1">No</option>
                        <option value="2">Si</option>

                    </select>
                </div>
                <div class="form-group"   id="div_corona_toma_imp_pfp{{ $counter }}" style="display:none">
                    <label class="floating-label-activo-sm">Nombre Paciente</label>
                    <input type="text" class="form-control form-control-sm" name="nombre_paciente_pfp{{ $counter }}" id="nombre_paciente_pfp{{ $counter }}">
                    <div class="form-group mt-3">
                        <label class="floating-label-activo-sm">Laboratorio</label>
                        <input type="text" class="form-control form-control-sm" name="lab_pfp{{ $counter }}" id="lab_pfp{{ $counter }}">
                    </div>
                    <div class="form-group mt-3">
                        <label class="floating-label-activo-sm">Numero de orden</label>
                        <input type="text" class="form-control form-control-sm" name="numero_orden_pfp{{ $counter }}" id="numero_orden_pfp{{ $counter }}">
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Prueba de ajuste</label>
                    <select name="prueba_ajuste_cor_pfp{{ $counter }}"  id="prueba_ajuste_cor_pfp{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prueba_ajuste_cor_pfp{{ $counter }}','div_prueba_ajuste_cor_pfp{{ $counter }}','obs_prueba_ajuste_cor_pfp{{ $counter }}',2);">
                        <option selected  value="1">Buena </option>
                        <option value="2">No devuelta a laboratorio</option>

                    </select>
                </div>
                <div class="form-group" id="div_prueba_ajuste_cor_pfp{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Otro (Describir)</label>
                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prueba_ajuste_cor_pfp{{ $counter }}" id="obs_prueba_ajuste_cor_pfp{{ $counter }}"></textarea>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Pulido</label>
                    <select name="pulido_ajuste_pfp{{ $counter }}" id="pulido_ajuste_pfp{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pulido_ajuste_pfp{{ $counter }}','div_pulido_ajuste_pfp{{ $counter }}','det_pulido_ajuste_pfp{{ $counter }}',2)">
                        <option value="0">Seleccione</option>
                        <option value="1">Satisfactorio</option>
                        <option value="2">Deficiente se cita a control</option>

                    </select>
                </div>
                <div class="form-group"   id="div_pulido_ajuste_pfp{{ $counter }}" style="display:none">
                    <label class="floating-label-activo-sm">Detalle (Describir)</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_pulido_ajuste_pfp{{ $counter }}" id="det_pulido_ajuste_pfp{{ $counter }}"></textarea>
                </div>
            </div>


        </div>
        <div class="form-row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Obs. Al procedimiento</label>
                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aprec_pfp{{ $counter }}" id="aprec_pfp{{ $counter }}"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        {{-- <button type="button" class="btn btn-danger-light-c btn-icon" onclick="ocultar_pieza_dental_pfp()"><i class="feather icon-x"></i></button> --}}
        <button type="button" class="btn btn-primary-light-c btn-icon" onclick="guardar_pieza_dental_pfp({{ $counter }})"><i class="feather icon-save"></i></button>
    </div>
</div>


<script>
     function ocultar_pieza_dental_pfp(){
        $('#nueva_pieza_dental_pfp').empty();
    }

    function guardar_pieza_dental_pfp(counter){
        var n_pieza_pfp = $('#n_pieza_pfp'+counter).val();
        let tipo_anclaje_pfp = $('#tipo_anc_impl_pfp'+counter).val();
        let tipo_anclaje_pfp_text = $('#tipo_anc_impl_pfp'+counter+' option:selected').text();
        if(tipo_anclaje_pfp == 3){
            var det_tipo_anc_impl_pfp = $('#det_tipo_anc_impl_pfp'+counter).val();
        }
        var corona_toma_imp_pfp = $('#corona_toma_imp_pfp'+counter).val();
        var corona_toma_imp_pfp_text = $('#corona_toma_imp_pfp'+counter+' option:selected').text();
        if(corona_toma_imp_pfp == 2){
            var nombre_paciente_pfp = $('#nombre_paciente_pfp'+counter).val();
            var lab_pfp = $('#lab_pfp'+counter).val();
            var n_orden_pfp = $('#numero_orden_pfp'+counter).val();
        }
        var prueba_ajuste_cor_pfp = $('#prueba_ajuste_cor_pfp'+counter).val();
        var prueba_ajuste_cor_pfp_text = $('#prueba_ajuste_cor_pfp'+counter+' option:selected').text();
        if(prueba_ajuste_cor_pfp == 2){
            var prueba_ajuste_cor_pfp_text = $('#obs_prueba_ajuste_cor_pfp'+counter).val();
        }
        var pulido_ajuste_pfp = $('#pulido_ajuste_pfp'+counter).val();
        var pulido_ajuste_pfp_text = $('#pulido_ajuste_pfp'+counter+' option:selected').text();
        if(pulido_ajuste_pfp == 2){
            var pulido_ajuste_pfp_text = $('#det_pulido_ajuste_pfp'+counter).val();
        }
        var aprec_pfp = $('#aprec_pfp'+counter).val();

        var valido = 1;
        var mensaje = '';

        if(n_pieza_pfp == ''){
            mensaje += '<li>Debe ingresar el número de pieza dental</li>';
            valido = 0;
        }

        if(tipo_anclaje_pfp == 0){
            mensaje += '<li>Debe seleccionar el tipo de anclaje</li>';
            valido = 0;
        }

        if(corona_toma_imp_pfp == 0){
            mensaje += '<li>Debe seleccionar si se tomo la corona o no</li>';
            valido = 0;
        }

        if(corona_toma_imp_pfp == 2){
            if(nombre_paciente_pfp == ''){
                mensaje += '<li>Debe ingresar el nombre del paciente</li>';
                valido = 0;
            }

            if(lab_pfp == ''){
                mensaje += '<li>Debe ingresar el laboratorio</li>';
                valido = 0;
            }

            if(n_orden_pfp == ''){
                mensaje += '<li>Debe ingresar el número de orden</li>';
                valido = 0;
            }
        }

        if(prueba_ajuste_cor_pfp == 0){
            mensaje += '<li>Debe seleccionar la prueba de ajuste</li>';
            valido = 0;
        }

        if(prueba_ajuste_cor_pfp == 2){
            if(prueba_ajuste_cor_pfp_text == ''){
                mensaje += '<li>Debe ingresar la observación de la prueba de ajuste</li>';
                valido = 0;
            }
        }

        if(pulido_ajuste_pfp == 0){
            mensaje += '<li>Debe seleccionar el pulido</li>';
            valido = 0;
        }

        if(pulido_ajuste_pfp == 2){
            if(pulido_ajuste_pfp_text == ''){
                mensaje += '<li>Debe ingresar el detalle del pulido</li>';
                valido = 0;
            }
        }

        if(aprec_pfp == ''){
            mensaje += '<li>Debe ingresar la apreciación</li>';
            valido = 0;
        }

        if(valido == 0){
            swal({
                title:'Campos requeridos',
                content:{
                    element:'span',
                    attributes:{
                        innerHTML:mensaje
                    }
                },
                icon:'warning'
            });
            return false;
        }

        var data = {
            id_paciente: $('#id_paciente_fc').val(),
            id_ficha_atencion: $('#id_fc').val(),
            n_pieza_pfp: n_pieza_pfp,
            tipo_anclaje_pfp: tipo_anclaje_pfp,
            tipo_anclaje_pfp_text: tipo_anclaje_pfp_text,
            det_tipo_anc_impl_pfp: det_tipo_anc_impl_pfp,
            corona_toma_imp_pfp: corona_toma_imp_pfp,
            corona_toma_imp_pfp_text: corona_toma_imp_pfp_text,
            nombre_paciente_pfp: nombre_paciente_pfp,
            lab_pfp: lab_pfp,
            n_orden_pfp: n_orden_pfp,
            prueba_ajuste_cor_pfp: prueba_ajuste_cor_pfp,
            prueba_ajuste_cor_pfp_text: prueba_ajuste_cor_pfp_text,
            pulido_ajuste_pfp: pulido_ajuste_pfp,
            pulido_ajuste_pfp_text: pulido_ajuste_pfp_text,
            aprec_pfp: aprec_pfp,
            _token: CSRF_TOKEN
        }

        console.log(data);

        $.ajax({
            url: "{{ route('profesional.adm_dental.guardar_pieza_dental_pfp') }}",
            type: "POST",
            data: data,
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal({
                        title:'Pieza guardada',
                        text:'La pieza dental ha sido guardada correctamente',
                        icon:'success'
                    });
                    $('#contenedor_piezas_dentales_pfp').empty();
                    $('#contenedor_piezas_dentales_pfp').append(response.v);
                    $('#nueva_pieza_dental_pfp').empty();
                    mostrar_nuevo_pieza_pfp();
                }else{
                    alert('Error al guardar la pieza');
                }
            }
        });
    }
</script>
