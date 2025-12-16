<div class="card-informacion">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h6 class="t-aten d-inline"> PFU</h6>
             </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-1">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Pieza N°</label>
                    <select name="n_pieza_pfu{{ $counter }}" id="n_pieza_pfu{{ $counter }}" class="form-control form-control-sm">
                        @foreach ($odontograma as $o)
                            @if($o->presupuesto == 1)
                                <option value="{{ $o->pieza }}">{{ $o->pieza }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                <div class="form-group fill">
                    <label class="floating-label-activo-sm">Móvil</label>
                    <select name="movil_pfu{{ $counter }}" id="movil_pfu{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('movil_pfu{{ $counter }}','div_movil_pfu{{ $counter }}','obs_movil_pfu{{ $counter }}',2);">
                        <option value="0">Seleccione</option>
                        <option value="1">No</option>
                        <option value="2">Sí</option>
                    </select>
                </div>
                <div class="form-group" id="div_movil_pfu{{ $counter }}" style="display: none">
                    <label class="floating-label-activo-sm">Describir</label>
                    <textarea class="form-control form-control-sm" data-titulo="" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_movil_pfu{{ $counter }}" id="obs_movil_pfu{{ $counter }}"></textarea>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Prueba de ajuste</label>
                    <select name="prueba_ajuste_cor_pfu{{ $counter }}"  id="prueba_ajuste_cor_pfu{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prueba_ajuste_cor_pfu{{ $counter }}','div_prueba_ajuste_cor_pfu{{ $counter }}','obs_prueba_ajuste_cor_pfu{{ $counter }}',2);">
                        <option selected  value="1">Buena </option>
                        <option value="2">No devuelta a laboratorio</option>

                    </select>
                </div>
                <div class="form-group" id="div_prueba_ajuste_cor_pfu{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Otro (Describir)</label>
                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prueba_ajuste_cor_pfu{{ $counter }}" id="obs_prueba_ajuste_cor_pfu{{ $counter }}"></textarea>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                <div class="form-group fill">
                    <label for="tornillo_cor_pfu{{ $counter }}" class="floating-label-activo-sm">Tornillo</label>
                    <select class="form-control form-control-sm" name="tornillo_cor_pfu{{ $counter }}" id="tornillo_cor_pfu{{ $counter }}" onchange="evaluar_para_carga_detalle('tornillo_cor_pfu{{ $counter }}','div_tornillo_cor_pfu{{ $counter }}','obs_tornillo_cor_pfu{{ $counter }}',4);">
                        <option value="1">Tornillo rodado</option>
                        <option value="2">Fractura de tornillo</option>
                        <option value="3">Tornillo óptimo</option>
                        <option value="4">Otra</option>
                    </select>
                </div>
                <div class="form-group" id="div_tornillo_cor_pfu{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Otro (Describir)</label>
                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tornillo_cor_pfu{{ $counter }}" id="obs_tornillo_cor_pfu{{ $counter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Pulido</label>
                    <select name="pulido_ajuste_pfu{{ $counter }}" id="pulido_ajuste_pfu{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pulido_ajuste_pfu{{ $counter }}','div_pulido_ajuste_pfu{{ $counter }}','det_pulido_ajuste_pfu{{ $counter }}',2)">
                        <option value="0">Seleccione</option>
                        <option value="1">Satisfactorio</option>
                        <option value="2">Deficiente se cita a control</option>
                    </select>
                </div>
                <div class="form-group"   id="div_pulido_ajuste_pfu{{ $counter }}" style="display:none">
                    <label class="floating-label-activo-sm">Detalle (Describir)</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_pulido_ajuste_pfu{{ $counter }}" id="det_pulido_ajuste_pfu{{ $counter }}"></textarea>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Obs. Al procedimiento</label>
                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aprec_pfu{{ $counter }}" id="aprec_pfu{{ $counter }}"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        {{-- <button type="button" class="btn btn-danger-light-c btn-icon" onclick="ocultar_pieza_dental_pfu()"><i class="feather icon-x"></i></button> --}}
        <button type="button" class="btn btn-primary-light-c btn-icon" onclick="guardar_pieza_dental_pfu({{ $counter }})"><i class="feather icon-save"></i></button>
    </div>
</div>

<script>
    function ocultar_pieza_dental_pfu(){
        $('#nueva_pieza_dental').empty();
    }

    function guardar_pieza_dental_pfu(counter){
        var n_pieza_pfu = $('#n_pieza_pfu'+counter).val();
        var movil_pfu = $('#movil_pfu'+counter).val();
        var movil_pfu_text = $('#movil_pfu'+counter+' option:selected').text();
        if(movil_pfu == 2){
            var movil_pfu_text = $('#obs_movil_pfu'+counter).val();
        }
        var tornillo_cor_pfu = $('#tornillo_cor_pfu'+counter).val();
        var tornillo_cor_pfu_text = $('#tornillo_cor_pfu'+counter+' option:selected').text();
        if(tornillo_cor_pfu == 4){
            var tornillo_cor_pfu_text = $('#obs_tornillo_cor_pfu'+counter).val();
        }
        var prueba_ajuste_cor_pfu = $('#prueba_ajuste_cor_pfu'+counter).val();
        var prueba_ajuste_cor_pfu_text = $('#prueba_ajuste_cor_pfu'+counter+' option:selected').text();
        if(prueba_ajuste_cor_pfu == 2){
            var prueba_ajuste_cor_pfu_text = $('#obs_prueba_ajuste_cor_pfu'+counter).val();
        }
        var pulido_ajuste_pfu = $('#pulido_ajuste_pfu'+counter).val();
        var pulido_ajuste_pfu_text = $('#pulido_ajuste_pfu'+counter+' option:selected').text();
        if(pulido_ajuste_pfu == 2){
            var pulido_ajuste_pfu_text = $('#det_pulido_ajuste_pfu'+counter).val();
        }
        var aprec_pfu = $('#aprec_pfu'+counter).val();

        var valido = 1;
        var mensaje = '';

        if(n_pieza_pfu == ''){
            mensaje += '<li>Debe ingresar el número de pieza dental</li>';
            valido = 0;
        }

        if(movil_pfu == 0){
            mensaje += '<li>Debe seleccionar el móvil</li>';
            valido = 0;
        }

        if(movil_pfu == 2){
            if(movil_pfu_text == ''){
                mensaje += '<li>Debe ingresar la observación del móvil</li>';
                valido = 0;
            }
        }

        if(tornillo_cor_pfu == 0){
            mensaje += '<li>Debe seleccionar el tornillo</li>';
            valido = 0;
        }

        if(tornillo_cor_pfu == 3){
            if(tornillo_cor_pfu_text == ''){
                mensaje += '<li>Debe ingresar la observación del tornillo</li>';
                valido = 0;
            }
        }

        if(prueba_ajuste_cor_pfu == 0){
            mensaje += '<li>Debe seleccionar la prueba de ajuste</li>';
            valido = 0;
        }

        if(prueba_ajuste_cor_pfu == 2){
            if(prueba_ajuste_cor_pfu_text == ''){
                mensaje += '<li>Debe ingresar la observación de la prueba de ajuste</li>';
                valido = 0;
            }
        }

        if(pulido_ajuste_pfu == 0){
            mensaje += '<li>Debe seleccionar el pulido</li>';
            valido = 0;
        }

        if(pulido_ajuste_pfu == 2){
            if(pulido_ajuste_pfu_text == ''){
                mensaje += '<li>Debe ingresar el detalle del pulido</li>';
                valido = 0;
            }
        }

        if(aprec_pfu == ''){
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
            n_pieza_pfu: n_pieza_pfu,
            movil_pfu: movil_pfu,
            movil_pfu_text: movil_pfu_text,
            tornillo_cor_pfu: tornillo_cor_pfu,
            tornillo_cor_pfu_text: tornillo_cor_pfu_text,
            prueba_ajuste_cor_pfu: prueba_ajuste_cor_pfu,
            prueba_ajuste_cor_pfu_text: prueba_ajuste_cor_pfu_text,
            pulido_ajuste_pfu: pulido_ajuste_pfu,
            pulido_ajuste_pfu_text: pulido_ajuste_pfu_text,
            aprec_pfu: aprec_pfu,
            _token: CSRF_TOKEN
        }

        console.log(data);

        $.ajax({
            url: "{{ route('profesional.adm_dental.guardar_pieza_dental_pfu') }}",
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
                    $('#contenedor_piezas_dentales_pfu').empty();
                    $('#contenedor_piezas_dentales_pfu').append(response.v);
                    $('#nueva_pieza_dental').empty();
                    mostrar_nueva_pieza_pfu()
                }else{
                    alert('Error al guardar la pieza');
                }
            }
        });
    }
</script>

