<!--COMUNICACIÓN-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="eval_comunicacion">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left" type="button" data-toggle="collapse" data-target="#eval_comunicacion_c" aria-expanded="false" aria-controls="eval_comunicacion_c">
                Evaluación Psiconeurológica
            </button>
        </div>
        <div id="eval_comunicacion_c" class="collapse" aria-labelledby="eval_comunicacion" data-parent="#eval_comunicacion">
            <div class="card-body-aten-a shadow-none">

                <div class="form-row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="eval_con">Evalución Conciencia</label>
                            <select name="eval_con" id="eval_con" data-titulo="Evalución Conciencia" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_con','div_eval_con','eval_con_obs',4);">
                                <option value="0">Seleccione</option>
                                <option value="1" selected>Lúcido</option>
                                <option value="2">Obnubilado</option>
                                <option value="3">Desorientado</option>
                                <option value="4"> Observaciones (describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_eval_con" style="display:none">
                            <label class="floating-label-activo-sm" for="eval_con_obs">Detalle Conciencia</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Conciencia" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_con_obs" id="eval_con_obs"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="eval_ori">Orientación</label>
                            <select name="eval_ori" id="eval_ori" data-titulo="Orientación" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_ori','div_eval_ori','eval_ori_obs',4);">
                                <option value="0">Seleccione</option>
                                <option value="1" selected>Orientado en Tiempo y Espacio</option>
                                <option value="2">Perdido</option>
                                <option value="3">Dudosa</option>
                                <option value="4"> Observaciones (describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_eval_ori" style="display:none">
                            <label class="floating-label-activo-sm" for="eval_ori_obs">Detalle Orientación</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Orientación" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_ori_obs" id="eval_ori_obs"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="eval_comp">Comportamiento</label>
                            <select name="eval_comp" id="eval_comp" data-titulo="Comportamiento" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_comp','div_eval_comp','eval_comp_obs',3);">
                                <option value="0">Seleccione</option>
                                <option value="1" selected>Coherente</option>
                                <option value="2">Incoherente</option>
                                <option value="3"> Observaciones (describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_eval_comp" style="display:none">
                            <label class="floating-label-activo-sm" for="eval_comp_obs">Detalle Comportamiento</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Comportamiento" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_comp_obs" id="eval_comp_obs"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="eval_colab">Colaboración</label>
                            <select name="eval_colab" id="eval_colab" data-titulo="Colaboración" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_colab','div_eval_colab','eval_colab_obs',3);">
                                <option value="0">Seleccione</option>
                                <option value="1" selected>Si</option>
                                <option value="2">No</option>
                                <option value="3"> Observaciones (describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_eval_colab" style="display:none">
                            <label class="floating-label-activo-sm" for="eval_colab_obs">Colaboración</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Colaboración" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_colab_obs" id="eval_colab_obs"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="text-c-blue">Arrastre el archivo para adjuntar imágenes o archivos</h6>
                    </div>
                </div>
                <div class="form-row">
                    <!--DROPZONE PARA SUBIR DIBUJOS U OTRO ARCHIVO-->
                    <div class="col-md-12 mb-3">
                        <div class=" text-justify pt-3 pb-1" role="alert">
                            <input type="hidden" name="#" id="#" value="">
                            <!-- [ Main Content ] start -->
                            <div class="dropzone" id="#" action="{{ route('paciente.archivo.carga') }}"></div>
                            <!-- [ file-upload ] end -->
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="floating-label-activo-sm" for="eval_com_coment">Comentario de la Evaluación</label>
                        <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="eval_com_coment" id="eval_com_coment"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
