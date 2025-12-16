<div class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-informacion">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2 col-xxl-1">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Piezas N°</label><!--USAR SELECT 2 ?-->
                            <select class="js-example-basic-multiple select2-dental" name="pzas_grupo_impl{{ $counter }}" id="pzas_grupo_impl{{ $counter }}" multiple="multiple">
                                @foreach (['1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8','3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '4.1', '4.2', '4.3', '4.4', '4.5', '4.6', '4.7', '4.8'] as $pieza)
                                    <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Estabilidad (ISQ)</label>
                            <select name="estab_grupo_implante{{ $counter }}"    id="estab_grupo_implante{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('estab_grupo_implante{{ $counter }}','div_estab_grupo_implante{{ $counter }}','obs_estab_grupo_implante{{ $counter }}',8);">
                                <option value="1">30</option>
                                <option value="2">40</option>
                                <option value="3">50</option>
                                <option selected  value="4">60</option>
                                <option value="5">70</option>
                                <option value="6">80</option>
                                <option value="7">90</option>
                                <option value="8">Otra (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_estab_grupo_implante{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Describa otra observación</label>
                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_estab_grupo_implante{{ $counter }}" id="obs_estab_grupo_implante{{ $counter }}"></textarea>
                        </div>
                    </div> --}}
                    <div class="col-sm-12 col-md-10 col-lg-6 col-xl-6 col-xxl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Posición</label>
                            <select name="posc_grupo_impl{{ $counter }}"  id="posc_grupo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posc_grupo_impl{{ $counter }}','div_posc_grupo_impl{{ $counter }}','posc_grupo_vp{{ $counter }}',2);">
                                <option selected  value="1">Correcta</option>
                                <option value="2">Incorrecta (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_posc_grupo_impl{{ $counter }}" style="display:none;">
                            <div class="form-group mt-1">
                                <label class="floating-label-activo-sm">Vestíbulo-palatino</label>
                                <input type="text"class="form-control form-control-sm" id="posc_grupo_vp{{ $counter }}">
                            </div>
                            <div class="form-group mt-1">
                                <label class="floating-label-activo-sm">Vestíbulo-lingual</label>
                                <input type="text"class="form-control form-control-sm" id="posc_vl{{ $counter }}">
                            </div>
                            <div class="form-group mt-1">
                                <label class="floating-label-activo-sm">Mesio-distal</label>
                                <input type="text"class="form-control form-control-sm" id="posc_md{{ $counter }}">
                            </div>
                            <div class="form-group mt-1">
                                <label class="floating-label-activo-sm">Cráneo-caudal</label>
                                <input type="text"class="form-control form-control-sm" id="posc_cc{{ $counter }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Altura </label>
                            <input type="number" class="form-control form-control-sm " id="posc_altura{{ $counter }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Dpa </label>
                            <input type="number" class="form-control form-control-sm " placeholder="Dist. pieza adyacente" id="posc_dpa{{ $counter }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Desgaste del implante</label>
                            <select name="desg_gpo_impl{{ $counter }}"  id="desg_gpo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('desg_gpo_impl{{ $counter }}','div_desg_gpo_impl{{ $counter }}','obs_desg_gpo_impl{{ $counter }}',2);">
                                <option value="1">No</option>
                                <option value="2">Si (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_desg_gpo_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Describir</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_desg_gpo_impl{{ $counter }}" id="obs_desg_gpo_impl{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Estado de la encía</label>
                            <select name="est_encia_gpo_impl{{ $counter }}" id="est_encia_gpo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_encia_gpo_impl{{ $counter }}','div_est_encia_gpo_impl{{ $counter }}','obs_est_encia_gpo_impl{{ $counter }}',2);">
                                <option value="1">Normal</option>
                                <option value="2">Anormal (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_est_encia_gpo_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Anormal (Describir)</label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_encia_gpo_impl{{ $counter }}" id="obs_est_encia_gpo_impl{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Hueso circundante</label>
                            <select name="hueso_cont_gpo_impl{{ $counter }}"  id="hueso_cont_gpo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hueso_cont_gpo_impl{{ $counter }}','div_hueso_cont_gpo_impl{{ $counter }}','obs_hueso_cont_gpo_impl{{ $counter }}',2);">
                                <option selected  value="1">Normal</option>
                                <option value="2">Anormal (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_hueso_cont_gpo_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Anormal (Describir)</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hueso_cont_gpo_impl{{ $counter }}" id="obs_hueso_cont_gpo_impl{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Evaluación Corona | Prótesis</label>
                            <select name="corprot_cont_impl{{ $counter }}"  id="corprot_cont_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('corprot_cont_impl{{ $counter }}','div_corprot_cont_impl{{ $counter }}','obs_corprot_cont_impl{{ $counter }}',2);">
                                <option selected  value="1">Normal</option>
                                <option value="2">Anormal (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_corprot_cont_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Anormal (Describir)</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_corprot_cont_impl{{ $counter }}" id="obs_corprot_cont_impl{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8 col-xl-9 col-xxl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Obs. Al control grupo implante</label>
                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_control_gpo_implante{{ $counter }}" id="obs_control_gpo_implante{{ $counter }}"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_grupo_dental_post_impl({{ $counter }})"><i class="feather icon-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="counter" id="counter" value="{{ $counter }}">
<script>
    $(document).ready(function(){
        let counter = $('#counter').val();
        $('#pzas_grupo_impl'+counter).select2();
    });
    function ocultar_grupo_dental_post_impl(){
        $('#grupo_dental_post_impl').empty();
    }

    function guardar_grupo_dental_post_impl(counter){
        let piezas = $('#pzas_grupo_impl'+counter).val();
        console.log(piezas);
        let estabilidad = $('#estab_grupo_implante'+counter).val();
        let estabilidad_text = $('#estab_grupo_implante'+counter+' option:selected').text();
        if(estabilidad == 8){
            estabilidad_text = $('#obs_estab_grupo_implante'+counter).val();
        }
        let posicion = $('#posc_grupo_impl'+counter).val();
        let posicion_text = $('#posc_grupo_impl'+counter+' option:selected').text();
        if(posicion == 2){
            posicion_text = $('#posc_grupo_vp'+counter).val();
        }
        let altura = $('#posc_altura'+counter).val();

        let dpa = $('#posc_dpa'+counter).val();
        let desgaste = $('#desg_gpo_impl'+counter).val();
        let desgaste_text = $('#desg_gpo_impl'+counter+' option:selected').text();
        if(desgaste == 2){
            desgaste_text = $('#obs_desg_gpo_impl'+counter).val();
        }
        let estado_encia = $('#est_encia_gpo_impl'+counter).val();
        let estado_encia_text = $('#est_encia_gpo_impl'+counter+' option:selected').text();
        if(estado_encia == 2){
            estado_encia_text = $('#obs_est_encia_gpo_impl'+counter).val();
        }
        let hueso_circundante = $('#hueso_cont_gpo_impl'+counter).val();
        let hueso_circundante_text = $('#hueso_cont_gpo_impl'+counter+' option:selected').text();
        if(hueso_circundante == 2){
            hueso_circundante_text = $('#obs_hueso_cont_gpo_impl'+counter).val();
        }
        let ev_corona_prot = $('#corprot_cont_impl'+counter).val();
        let ev_corona_prot_text = $('#corprot_cont_impl'+counter+' option:selected').text();
        if(ev_corona_prot == 2){
            ev_corona_prot_text = $('#obs_corprot_cont_impl'+counter).val();
        }
        let observaciones = $('#obs_control_gpo_implante'+counter).val();

        let valido = 1;
        let mensaje = '';

        if(piezas.length == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar al menos una pieza</li>';
        }

        if(estabilidad == 8 && estabilidad_text == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una descripción para la estabilidad</li>';
        }

        if(posicion == 2 && posc_grupo_vp == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una descripción para la posición</li>';
        }

        if(altura == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una altura</li>';
        }

        if(dpa == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una descripción para la DPA</li>';
        }

        if(desgaste == 2 && desgaste_text == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una descripción para el desgaste</li>';
        }

        if(estado_encia == 2 && estado_encia_text == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una descripción para el estado de la encía</li>';
        }

        if(hueso_circundante == 2 && hueso_circundante_text == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una descripción para el hueso circundante</li>';
        }

        if(valido == 0){
            swal({
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
            return;
        }

        let data = {
            id_paciente: $('#id_paciente_fc').val(),
            id_ficha_atencion: $('#id_fc').val(),
            piezas: piezas,
            estabilidad: estabilidad,
            estabilidad_text: estabilidad_text,
            posicion: posicion,
            altura: altura,
            dpa: dpa,
            desgaste: desgaste,
            desgaste_text: desgaste_text,
            estado_encia: estado_encia,
            estado_encia_text: estado_encia_text,
            hueso_circundante: hueso_circundante,
            hueso_circundante_text: hueso_circundante_text,
            ev_corona_prot: ev_corona_prot,
            ev_corona_prot_text: ev_corona_prot_text,
            observaciones: observaciones,
            _token: CSRF_TOKEN
        }

        $.ajax({
            url: '{{ route("profesional.adm_dental.guardar_grupo_dental_post_impl") }}',
            type: 'POST',
            data: data,
            success: function(data){
                console.log(data);
                if(data.mensaje == 'OK'){
                    swal({
                        title: "Guardado",
                        text: "Grupo dental guardado correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                    $('#contenedor_grupos_dental_implantada').empty();
                    $('#contenedor_grupos_dental_implantada').append(data.v);
                    mostrar_nuevo_grupo_post_impl(1000);
                }else{
                    swal({
                        title: "Error",
                        text: "Ocurrió un error al guardar el grupo dental",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            }
        })
    }
</script>

