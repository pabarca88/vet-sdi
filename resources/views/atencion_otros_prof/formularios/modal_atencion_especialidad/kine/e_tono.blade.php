<div id="tono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tono" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Evaluación Nervios Motores </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ex-inferior" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="n_motores-tab" data-toggle="tab" href="#n_motores" role="tab" aria-controls="n_motores" aria-selected="true">Examen Muscular</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="mov_inv-tab" data-toggle="tab" href="#mov_inv" role="tab" aria-controls="mov_inv" aria-selected="false">Movimientos Involuntarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="tono-inf-tab" data-toggle="tab" href="#tono-inf" role="tab" aria-controls="tono-inf" aria-selected="false">Tono Muscular</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="emg-tab" data-toggle="tab" href="#emg" role="tab" aria-controls="emg" aria-selected="false">EMG y Estudio Conducción Nerviosa</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ex-inferior">
                            <!--e muscular-->
                            <div class="tab-pane fade show active" id="n_motores" role="tabpanel" aria-labelledby="n_motores-tab">
                                <div id="contenedor_grupo_musc">
                                    <div id="grupo_musc">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                                <h6 class="t-aten d-inline mr-2">Ex.Muscular <span class="fecha-sm">
                                                (<script>
                                                    var f = new Date();
                                                    document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                                 </script>)
                                                </span></h6>
                                                 
                                                <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-musc d-inline float-right mb-2"><i class="feather icon-plus"></i> Añadir Grupo</button>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="floating-label-activo-sm" for="ex_musc_grupo_es" >Grupo Estudiado</label>
                                                        <input type="text" class="form-control form-control-sm" name="ex_musc_grupo_es" id="ex_musc_grupo_es">
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="est_masa_musc" >Masa Muscular</label>
                                                        <select name="est_masa_musc" id="est_masa_musc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_masa_musc','div_est_masa_musc','obs_est_masa_musc',5);">
                                                            <option selected  value="1">Normal</option>
                                                            <option value="2">Hipotrofia</option>
                                                            <option value="3">Atrofia</option>
                                                            <option value="4">Hipertrofia</option>
                                                            <option value="5">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_est_masa_musc" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_est_masa_musc">Otro<i> (Descripción)</i></label>
                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_masa_musc" id="obs_est_masa_musc"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="floating-label-activo-sm" for="obs_emm_ge">Obs. Grupo Estudiado</label>
                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_emm_ge" id="obs_emm_ge"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--mov_involuntarios-->
                            <div class="tab-pane fade show" id="mov_inv" role="tabpanel" aria-labelledby="mov_inv-tab">
                                <div id="contenedor_grupo_mov">
                                    <div id="grupo_mov">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                                    <h6 class="t-aten d-inline mr-2">Movimientos involuntarios <span class="fecha-sm">
                                                    (<script>
                                                        var f = new Date();
                                                        document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                                     </script>)
                                                    </span></h6>
                                                     
                                                    <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-mov d-inline float-right mb-2"><i class="feather icon-plus"></i> Añadir Grupo</button>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="mov_inv_grupo_es">Grupo Estudiado</label>
                                                        <input type="text" class="form-control form-control-sm" name="mov_inv_grupo_es" id="mov_inv_grupo_es">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="est_mov_inv">Tipo Movimiento</label>
                                                        <select name="est_mov_inv"  id="est_mov_inv" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_mov_inv','div_est_mov_invo','obs_est_mov_inv',9);">
                                                            <option selected  value="1">No</option>
                                                            <option value="2">Fasciculaciones</option>
                                                            <option value="3">Mioclonía</option>
                                                            <option value="4">Tics</option>
                                                            <option value="5">Hemibalismo</option>
                                                            <option value="6">Corea</option>
                                                            <option value="7">Atetosis</option>
                                                            <option value="8">Distonía</option>
                                                            <option value="9">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_est_mov_inv" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_est_mov_inv">Otro <i>(Descripción)</i></label>
                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_mov_inv" id="obs_est_mov_inv"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="obs_eminv">Obs. Grupo Estudiado</label>
                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_eminv" id="obs_eminv"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--tono-->
                            <div class="tab-pane fade show" id="tono-inf" role="tabpanel" aria-labelledby="tono-inf-tab">
                                <div id="contenedor_grupo_tono">
                                    <div id="grupo_tono">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                                    <h6 class="t-aten d-inline mr-2">Tono muscular <span class="fecha-sm">
                                                    (<script>
                                                        var f = new Date();
                                                        document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                                     </script>)
                                                    </span></h6>
                                                     
                                                    <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-tono d-inline float-right mb-2"><i class="feather icon-plus"></i> Añadir Grupo</button>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="tono_grupo_estudio">Grupo Estudiado</label>
                                                        <input type="text" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="est_tono">Tono Muscular</label>
                                                        <select name="est_tono"   id="est_tono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_tono','div_est_tono','obs_est_tono',6);">
                                                            <option selected  value="1">Normal</option>
                                                            <option value="2">Hipertonía</option>
                                                            <option value="3">Hipotonía</option>
                                                            <option value="4">Distonía</option>
                                                            <option value="5">Paratonía</option>
                                                            <option value="6">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_est_tono" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_est_tono">Descripción <i>Otro</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_tono" id="obs_est_tono"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="obs_tono_musc_grupo_es">Obs. Grupo Estudiado</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--estudio emg-->
                            <div class="tab-pane fade show" id="emg" role="tabpanel" aria-labelledby="emg-tab">
                                <div class="form-row">
                 
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">EMG y Est. Conducción Nerviosa</h6>
                                        </div>
                
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm" for="emg_grupo_es">Grupo Estudiado</label>
                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="emg_grupo_es" id="emg_grupo_es"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm" for="est_emg">EMG</label>
                                            <select name="est_emg" id="est_emg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_emg','div_est_emg','obs_est_emg',2);">
                                                <option selected  value="1">Normal</option>
                                                <option value="2">Anormal</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_est_emg" style="display:none;">
                                            <label class="floating-label-activo-sm" for="obs_est_emg">Descripción</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_emg" id="obs_est_emg"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm" for="Ex_cuello">Estudio Cond Nerviosa</label>
                                            <select name="ecn" data-titulo="Ex_cuello" data-seccion="Cuello"  id="ecn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ecn','div_ecn','obs_ecn',2);">
                                                <option selected  value="1">Normal</option>
                                                <option value="2">Anormal</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_ecn" style="display:none;">
                                            <label class="floating-label-activo-sm" for="obs_ecn">Descripción</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ecn" id="obs_ecn"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="emg_grupo_es">Obs. Eval eléctrica Masa Muscular</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="emg_grupo_es" id="emg_grupo_es"></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-row mt-7">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="eval_est_mmgral">Eval Masa Muscular en General</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_est_mmgral" id="eval_est_mmgral"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function tono() {
        $('#tono').modal('show');
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
    function agregarGrupoMusc(){
        var html = '';
            html += '<div id="contenedor_grupo_musc">';
            html += '<div id="grupo_musc">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Grupo Estudiado</label>';
            html += '               <input type="text" class="form-control form-control-sm" name="ex_musc_grupo_es" id="ex_musc_grupo_es">';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Masa Muscular</label>';
            html += '               <select name="est_masa_musc"   id="est_masa_musc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle("est_masa_musc","div_est_masa_musc","obs_est_masa_musc",5);">';
            html += '                   <option selected  value="1">Normal</option>';
            html += '                   <option value="2">Hipotrofia</option>';
            html += '                   <option value="3">Atrofia</option>';
            html += '                   <option value="4">Hipertrofia</option>';
            html += '                   <option value="5">Otro</option>';
            html += '               </select>';
            html += '           </div>';
            html += '           <div class="form-group" id="div_est_masa_musc" style="display:none;">';
            html += '               <label class="floating-label-activo-sm">Descripción <i>Otro</i></label>';
            html += '               <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_masa_musc" id="obs_est_masa_musc"></textarea>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Observaciones Grupo Estudiado</label>';
            html += '               <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_emm_ge" id="obs_emm_ge"></textarea>';
            html += '           </div>';
            html += '        </div>';
            html += '   </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_musc').append(html);
    }
    $(document).ready(function(){
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-grupo-musc').click(function(){
            agregarGrupoMusc()();
        });
    });

    function agregarGrupoMov(){
        var html = '';
            html += '<div id="contenedor_grupo_mov">';
            html += '<div id="grupo_mov">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Grupo Estudiado</label>';
            html += '               <input type="text" class="form-control form-control-sm" name="mov_inv_grupo_es" id="mov_inv_grupo_es">';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '              <label class="floating-label-activo-sm">Tipo Movimiento</label>';
            html += '               <select name="est_mov_inv"  id="est_mov_inv" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle("est_mov_inv","div_est_mov_invo","obs_est_mov_invo",9);">';
            html += '                   <option selected  value="1">No</option>';
            html += '                   <option value="2">Fasciculaciones</option>';
            html += '                   <option value="3">Mioclonía</option>';
            html += '                   <option value="4">Tics</option>';
            html += '                   <option value="5">Hemibalismo</option>';
            html += '                   <option value="6">Corea</option>';
            html += '                   <option value="7">Atetosis</option>';
            html += '                   <option value="8">Distonía</option>';
            html += '                   <option value="9">Otro</option>';
            html += '               </select>';
            html += '           </div>';
            html += '           <div class="form-group" id="div_est_mov_invo" style="display:none;">';
            html += '               <label class="floating-label-activo-sm">Descripción <i>Otro</i></label>';
            html += '               <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_mov_invo" id="obs_est_mov_invo"></textarea>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Observaciones Grupo Estudiado</label>';
            html += '               <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_eminv" id="obs_eminv"></textarea>';
            html += '           </div>';
            html += '        </div>';
            html += '   </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_mov').append(html);
    }
    $(document).ready(function(){
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-grupo-mov').click(function(){
            agregarGrupoMov()();
        });
    });

    function agregarGrupoTono(){
        var html = '';
            html += '<div id="contenedor_grupo_tono">';
            html += '<div id="grupo_tono">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Grupo Estudiado</label>';
            html += '               <input type="text" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Tono Muscular</label>';
            html += '               <select name="est_tono" id="est_tono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle("est_tono","div_est_ton","obs_est_tono",6);">';
            html += '                   <option selected  value="1">Normal</option>';
            html += '                   <option value="2">Hipertonía</option>';
            html += '                   <option value="3">Mioclonía</option>';
            html += '                   <option value="3">Hipotonía</option>';
            html += '                   <option value="4">Distonía</option>';
            html += '                   <option value="6">Otro</option>';
            html += '               </select>';
            html += '           </div>';
            html += '           <div class="form-group" id="div_est_mov_invo" style="display:none;">';
            html += '               <label class="floating-label-activo-sm">Descripción <i>Otro</i></label>';
            html += '               <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_tono" id="obs_est_tono"></textarea>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Observaciones Grupo Estudiado</label>';
            html += '               <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>';
            html += '           </div>';
            html += '        </div>';
            html += '   </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_tono').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-tono').click(function(){
            agregarGrupoTono()();
        });
    });
</script>
