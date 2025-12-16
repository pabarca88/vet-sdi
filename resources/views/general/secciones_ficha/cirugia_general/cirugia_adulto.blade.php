<!--cirugia general-->
<div class="col-sm-12 col-md-12" style="background-color: #ecf0f5!important;">
    <div class="card-a">
        <div class="card-header-a" id="exam_esp">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                Examen especialidad Cirugía General
            </button>
        </div>
        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
            <div class="card-body-aten-a shadow-none">
                <div id="form-cg-adulto">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-10" id="cir_dig" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="examen_fisico_cg_tab" data-toggle="tab" href="#examen_fisico_cg" role="tab" aria-controls="examen_fisico_cg" aria-selected="true">Motivo de consulta Sintomas Generales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="plan_cg-tab" data-toggle="tab" href="#plan_cg" role="tab" aria-controls="plan_cg" aria-selected="true">Plan de Tratamiento</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{--  <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="cg_adulto" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active " id="examen_fisico_cg-tab" data-toggle="tab" href="#examen_fisico_cg" role="tab" aria-controls="examen_fisico_cg" aria-selected="true">Consulta y Examen físico</a>
                                    <a class="nav-link-aten text-reset active " id="plan_cg-tab" data-toggle="tab" href="#plan_cg" role="tab" aria-controls="plan_cg" aria-selected="true"> Plan de Tratamiento</a>
                                </li>
                            </ul>
                        </div>
                    </div>  --}}
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="cg_adulto">
                                <!--EXAMEN FISICO CIR GEN-->
                                <div class="tab-pane fade show active" id="examen_fisico_cg" role="tabpanel" aria-labelledby="examen_fisico_cg-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">Examen General</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group" id="div_detalle_ex_grl" >
                                                <label class="floating-label-activo-sm" for="est_grl">Estado General del Paciente</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Estado General del Paciente" data-seccion="Cirugia General" data-tipo="cirugia general" onfocus="this.rows=3" onblur="this.rows=2;" name="est_grl" id="est_grl" placeholder=" CEG,DOLOR, OTROS SINTOMAS Y SIGNOS ETC "></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group" id="div_detalle_ex_seg">
                                                <label class="floating-label-activo-sm" for="ex_seg"> Examen Segmentario sospecha de Organo</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Examen Segmentario sospecha de Organo" data-seccion="Cirugia General" data-tipo="cirugia general" onfocus="this.rows=3" onblur="this.rows=2;" name="ex_seg" id="ex_seg" placeholder="PRESENCIA DE MASAS PALPABLES,SOSPECHA ORGANO COMPROMETIDO"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm" for="cir_grl_urgencia"> Es Urgencia Qx.?</label>
                                                <select name="cir_grl_urgencia" id="cir_grl_urgencia" data-titulo="Es Urgencia Qx.?" data-seccion="Cirugia General" data-tipo="cirugia general" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cir_grl_urgencia','div_detalle_cir_grl_urgencia','obs_cir_grl_urgencia',2);">
                                                    <option value="0" >Seleccione</option>
                                                    <option value="1" >No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12" id="div_detalle_cir_grl_urgencia" style="display:none">
                                                <button type="button" class="btn btn-outline-primary btn-sm btn-block" onclick="ingresohosp()";><i class="feather icon-edit-1"></i> Orden de Hospitalización </button>
                                                <button type="button" class="btn btn-outline-primary btn-sm btn-block" onclick="sol_pabellon()";><i class="feather icon-edit-1"></i> Solicitar Pabellón</button>
                                            </div>
                                        </div>
                                        <div class=" col-md-8">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm" for="obs_est_grl"> Observaciones Estado General Paciente</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Estado General del Paciente" data-seccion="Cirugia General" data-tipo="cirugia general" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_grl" id="obs_est_grl" placeholder=" ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="plan_cg" role="tabpanel" aria-labelledby="plan_cg-tab">
                                    <script type="text/javascript">
                                           $(document).ready(function() {
                                            });
                                    </script>
                                    <div class="form-row mt-2">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0">
                                            <h6 class="t-aten">Plan de Tratamiento</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 mt-0">
                                            <label class="ml-0" for="tto_med_cg"><strong>Tratamiento médico</strong></label>
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="tto_med_cg" name="tto_med_cg" value="1" onchange="javascript:showContentTmcg()" />
                                                <label for="tto_med_cg" class="cr"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div id="contentTto_cg" style="display: none;">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 mt-1">
                                                        <label class="floating-label-activo-sm" for="rec_tto_cg">Recomendaciones</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan de Tratamiento" data-tipo="recomendaciones médicas"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_cg" id="rec_tto_cg"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 mt-0">
                                            <label class="ml-0"><strong>Procedimiento</strong></label>
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="pr_cg" name="pr_cg" value="1" onchange="javascript: showContentProc_cg()" />
                                                <label for="pr_cg" class="cr"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div id="contentProc_cg" style="display: none;">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm" for="tipo_proc_cg"> Tipo</label>
                                                        <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_cg" id="tipo_proc_cg">
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <label class="floating-label-activo-sm" for="plan_proc_cg"> Plan</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_cg" id="plan_proc_cg"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0">
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">

                                                    <label class="ml-0"><strong>Cirugía (Hospitalizar)</strong></label>
                                                    <input type="checkbox" class="custom-control-input" id="plan_cirugia" name="plan_cirugia" value="1" onchange="javascript: showContentCir_cg()" />
                                                    <label class="cr" for="plan_cirugia"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div id="contentCir_cg" style="display: none;">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="ingresohosp();"><i class="feather icon-save"></i> Orden de Hospitalización </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div id="contentTto_cg" style="display: none;">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <h6 class="text-center">Tratamiento médico</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm" for="obs_gen_plan_tto">Obs. Plan de tratamiento</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_gen_plan_tto" id="obs_gen_plan_tto"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-md-12">
                                        <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_cg" data-no_mostrar="1" onchange="cargar_info_ficha_tipo_cg('select_ficha_tipo_especialidad_cg','descripcion_ficha_tipo_especialidad_cg');">
                                            <option value="">Seleccione</option>
                                            @if(!empty($fichaTipo['cg']))
                                                @foreach ($fichaTipo['cg'] as $ft )
                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl46">
                                        <span id="descripcion_ficha_tipo_especialidad_cg"></span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="abrir_modal_guardar_tipo_cg('form-cg-adulto','registro_f_t_cg_detalle','cg');"><i class="feather icon-save"></i> Guardar nueva ficha tipo</button>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function showContentTmcg() {
        element = document.getElementById("contentTto_cg");
        check = document.getElementById("tto_med_cg");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }


    function showContentProc_cg() {
        element = document.getElementById("contentProc_cg");
        check = document.getElementById("pr_cg");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
    function showContentCir_cg() {
        element = document.getElementById("contentCir_cg");
        check = document.getElementById("plan_cirugia");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

    function ingresomedico() {
        $('#ingreso_m_modal').modal('show');
    }

    function cargar_info_ficha_tipo_cg(select, div_descripcion)
    {
        let id_ft = $('#'+select).val();
        if(id_ft == '')
        {
            $('#'+div_descripcion).html('');
            $('#form-cg').find('select,textarea').each(function(key, elemento){
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    $(elemento).val(1);
                }
                else
                {
                    $(elemento).val('');
                }
            });

            evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
            evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
            evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
            evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
            evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

            return false;
        }
        $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

        url = "{{ route('profesional.buscar_ficha_tipo_cg') }}";
        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_profesional : $('#id_profesional_fc').val(),
                id_ficha_tipo :  id_ft,
            },
        })
        .done(function(data)
        {
            {{--  console.log('-----------------------');  --}}
            {{--  console.log(data);  --}}
            {{--  console.log('-----------------------');  --}}
            if(data.estado == 1)
            {
                $.each(data.registros, function(index, value)
                {
                    {{--  console.log(index);  --}}
                    {{--  console.log(value);  --}}
                    {{--  console.log($('#'+index));  --}}

                    $('#'+index).val(value);
                });
                evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
                evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
                evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
                evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
                evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

            }
            else{

                swal({
                    title: "Problema al Cargar Tipo Ficha.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }



    function abrir_modal_guardar_tipo_cg(div_id_data, div_id_detalle,tipo)
    {
        $('#btn_modal_registrar_ficha_tipo_dg').unbind('click');
        var titulo = 'Registre Su Ficha Tipo';
        if(tipo == 'cg')
        {
            $('#btn_modal_registrar_ficha_tipo_dg').click(function(){
                guardar_tipo_ficha_cg();
            });
        }
        else if(tipo == 'cg')
        {
            $('#btn_modal_registrar_ficha_tipo_dg').click(function(){

                guardar_tipo_ficha_cg();
            });
        }
        $('#modal_registrar_ficha_tipo_dg').find('.modal-title').html(titulo);
        $('#modal_registrar_ficha_tipo_dg').modal('show');

        cargarSeccion_cg(div_id_detalle,div_id_data);
    }

    function cargarSeccion_cg(div_destino, div_data)
    {
        console.log(div_data);
        // var tipo = $('#'+select+'').val();
        $('#'+div_destino).html('');
        $('#'+div_data).find('select,textarea').each(function(key, elemento){
            html ='';
            html +='<div class="row" style="margin-top:10px;">';
            if($(elemento).prop('nodeName') == 'SELECT')
            {
                if($(elemento).data('no_mostrar') != 1)
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-4">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                }
            }
            else if($(elemento).prop('nodeName') == 'TEXTAREA')
            {
                if($(elemento).data('no_mostrar') != 1)
                {
                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-6">';
                    html +='    <textarea class="form-control caja-texto form-control-sm '+$(elemento).attr('id')+'_editar" style="display:none;" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_'+$(elemento).attr('id')+'" id="observaciones_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</textarea>';
                    html +='    <label class="'+$(elemento).attr('id')+'_mostrar" id="label_observacion_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</label>';
                    html +='</div>';
                    html +='<div class="col-md-2">';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_mostrar"  onclick="cambiar_div(\''+$(elemento).attr('id')+'_editar'+'\',\''+$(elemento).attr('id')+'_mostrar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Editar</button>';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_editar" style="display:none;" onclick="cambiar_div(\''+$(elemento).attr('id')+'_mostrar'+'\',\''+$(elemento).attr('id')+'_editar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Guardar</button>';
                    html +='</div>';
                }

            }
            html +='</div>';
            $('#'+div_destino).append(html);
        });
    }

    function guardar_tipo_ficha_cg()
    {
        var registro_f_t_cg_nombre = $('#registro_f_t_cg_nombre').val();
        var registro_f_t_cg_descripcion = $('#registro_f_t_cg_descripcion').val();
        var _token = CSRF_TOKEN;
        if(registro_f_t_cg_nombre == ''){
            swal({
                    title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                return false;
        }
        if(registro_f_t_cg_descripcion == ''){
            swal({
                    title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                return false;
        }


        var data = [];
        data.registro_f_t_cg_nombre = registro_f_t_cg_nombre;
        data.registro_f_t_cg_descripcion = registro_f_t_cg_descripcion;

        $('#registro_f_t_cg_detalle').find('input,textarea').each(function(key, elemento){
            {{--  console.log($(elemento).attr('id'));  --}}
            {{--  console.log($(elemento).val());  --}}
            {{--  console.log($(elemento).prop('nodeName'));  --}}
            {{--  console.log('*******');  --}}

            data[$(elemento).attr('id')] = $(elemento).val();

        });

        console.log(data);
        url = "{{ route('profesional.ficha_tipo_cg') }}";
        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_profesional : $('#id_profesional_fc').val(),
                ind_esp_cirugia : '',
                nombre : data.registro_f_t_cg_nombre,
                descripcion : data.registro_f_t_cg_descripcion,
                e_general : data.modal_agregar_tipo_e_general,
                obs_e_general : data.observaciones_obs_e_general,
                e_signos_vit : data.modal_agregar_tipo_e_signos_vit,
                obs_e_signos_vit : data.observaciones_obs_e_signos_vit,
                e_dolor_loc : data.modal_agregar_tipo_e_dolor_loc,
                obs_e_dolor_loc : data.observaciones_obs_e_dolor_loc,
                masas_pal : data.modal_agregar_tipo_masas_pal,
                obs_masas_pal : data.observaciones_obs_masas_pal,
                e_piel_fan : data.modal_agregar_tipo_e_piel_fan,
                obs_e_piel_fan : data.observaciones_obs_e_piel_fan,
                ex_cabcuello : data.modal_agregar_tipo_ex_cabcuello,
                obs_ex_cabcuello : data.observaciones_obs_ex_cabcuello,
                ex_torax : data.modal_agregar_tipo_ex_torax,
                obs_ex_torax : data.observaciones_obs_ex_torax,
                ex_abdomen : data.modal_agregar_tipo_ex_abdomen,
                obs_ex_abdomen : data.observaciones_obs_ex_abdomen,
                ex_muscesq : data.modal_agregar_tipo_ex_muscesq,
                obs_ex_muscesq : data.observaciones_obs_ex_muscesq,
                ex_o_sent : data.modal_agregar_tipo_ex_o_sent,
                obs_ex_o_sent : data.observaciones_obs_ex_o_sent,
                obs_ex_segmentario : data.observaciones_obs_ex_segmentario,
                urgencia_cg : data.modal_agregar_tipo_urgencia_cg,
                obs_urgencia_cg : data.observaciones_obs_urgencia_cg,
                hosp_cg : data.modal_agregar_tipo_hosp_cg,
                obs_hosp_cg : data.observaciones_obs_hosp_cg,
                otrotto_cg : data.modal_agregar_tipo_otrotto_cg,
                obs_otrotto_cg : data.observaciones_obs_otrotto_cg,
                obs_plan_tratamiento : data.observaciones_obs_plan_tratamiento,
                hospen_cg : data.modal_agregar_tipo_hospen_cg,
                obs_hospen_cg : data.observaciones_obs_hospen_cg,
                hosp_enserv_cg : data.modal_agregar_tipo_hosp_enserv_cg,
                obs_hosp_enserv_cg : data.observaciones_obs_hosp_enserv_cg,
                otro_tto_cg : data.modal_agregar_tipo_otro_tto_cg,
                obs_otro_tto_cg : data.observaciones_obs_otro_tto_cg,
                obs_hospitalizacion_cg : data.observaciones_obs_hospitalizacion_cg,
            },
        })
        .done(function(data)
        {
            {{--  console.log('-----------------------');  --}}
            {{--  console.log(data);  --}}
            {{--  console.log('-----------------------');  --}}
            if(data.estado == 1)
            {
                cargar_lista_tipo_cg();
                $('#modal_registrar_ficha_tipo_dg').modal('hide');
                swal({
                    title: "Tipo Ficha Registrado",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }
            else
            {
                cargar_lista_tipo_cg();
                swal({
                    title: "Problema al Registrar Tipo Ficha.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function cargar_lista_tipo_cg()
    {
        $('#select_ficha_tipo_especialidad_cg').html('<option value="">Seleccione</option>');

        url = "{{ route('profesional.cargar_fichas_tipo_cg') }}";
        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_profesional : $('#id_profesional_fc').val(),
            },
        })
        .done(function(data)
        {
            if(data.estado == 1)
            {
                $.each(data.registros, function(index, value)
                {
                    $('#select_ficha_tipo_especialidad_cg').append('<option value="'+value.id+'" data-descripcion="'+value.descripcion+'">'+value.nombre+'</option>');
                });
                cargar_info_ficha_tipo_cg('select_ficha_tipo_especialidad_cg','descripcion_ficha_tipo_especialidad_cg');
            }
            else{

                swal({
                    title: "Problema al Cargar Tipo Ficha.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>
