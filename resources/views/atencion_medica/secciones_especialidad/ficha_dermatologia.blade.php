<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="dermato" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_derma-tab" data-toggle="tab" href="#atencion_derma" role="tab" aria-controls="atencion_derma" aria-selected="true">Atención Especialidad</a>
                    </li>
                    {{-- <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="in-ven-dermo-tab" data-toggle="tab" href="#in-ven-dermo" role="tab" aria-controls="in-ven-dermo" aria-selected="false">Venéreas</a>
                    </li> --}}
                </ul>
            </div>

            <!--ALERTA-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row mb-1">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="alert-atencion alert alert-success-b alert-dismissible fade show"  role="alert" id="mensaje_historias"></div>
                    </div>
                </div>
            </div>
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_dermo') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">

                    @csrf


                    <div class="tab-content" id="derma-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_derma" role="tabpanel" aria-labelledby="atencion_derma-tab">
                            <div class="row">

								<!--Formulario / Menor de edad-->
								@include('general.secciones_ficha.seccion_menor', ['tipo_ficha' => "1"])
								<!--Cierre: Formulario / Menor de edad-->

                                <!--Motivo consulta-->
                                @include('general.secciones_ficha.motivo')
                                <!--Motivo consulta-->
                                {{-- Imagenes Toma de Biópsia --}}
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="imagenes">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_c" aria-expanded="false" aria-controls="imagenes_c">
                                                Imagenes Toma de Biopsia
                                            </button>
                                        </div>
                                        <div id="imagenes_c" class="collapse show" aria-labelledby="motivo" data-parent="#imagenes">
                                            <div class="card-body-aten-a pb-1">
                                                <div class="form-row">
                                                    <!--IMAGENES-->
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
															<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2">
                                                                <label class="f-12 mb-0 font-weight-bold text-center" for="img_cons_dermato_pre">Imagenes Pre</label>
                                                                <div id="img_cons_dermato_pre-c" class="collapse show" aria-labelledby="img_cons_dermato_pre" data-parent="#img_cons_dermato_pre">
                                                                    <div class="dropzone" id="mis-imagenes-cons-dermato-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4 mt-2">
                                                                <label class="f-12 mb-0 font-weight-bold text-center" for="img_cons_dermato_post">Imagenes Post</label>
                                                                <div id="img_cons_dermato_post-c" class="collapse show" aria-labelledby="img_cons_dermato_post" data-parent="#img_cons_dermato_post">
                                                                    <div class="dropzone" id="mis-imagenes-cons-dermato-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group mt-3">
                                                                    <input type="hidden" name="biopsia_dermat" id="biopsia_dermat" value="">
                                                                    <div class="custom-control custom-switch mb-3">
                                                                        <input type="checkbox" class="custom-control-input" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                        <label for="biopsia_check_dermat" class="custom-control-label">Biopsia</label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="mot_zona_bp"> Zona y Motivo</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="mot_zona_bp" id="mot_zona_bp"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="floating-label-activo-sm" for="obs_result_biopsia"> Observaciones y Resultado</label>
                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia" id="obs_result_biopsia"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="exam_esp">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                Examenes y Procedimientos de la especialidad
                                            </button>
                                        </div>
                                        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                            <div class="card-body-aten-a pb-2">
                                                <div id="form-dermato">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="cg_adulto" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="derma_cicatriz_tab" data-toggle="tab" href="#derma_cicatriz" role="tab" aria-controls="derma_cicatriz" aria-selected="true">Cicatrices</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="derma_piel_dantab" data-toggle="tab" href="#derma_piel_dan" role="tab" aria-controls="derma_piel_dan" aria-selected="true">Piel Dañada</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="derma_exfol_tab" data-toggle="tab" href="#derma_exfol" role="tab" aria-controls="derma_exfol" aria-selected="true">Exfoliación Quimica</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="derma_derma_tab" data-toggle="tab" href="#derma_derma" role="tab" aria-controls="derma_derma" aria-selected="false">Dermabración Dermoplaning</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="derma_laser_tab" data-toggle="tab" href="#derma_laser" role="tab" aria-control="derma_laser" aria-selected="false">Cirugia Láser</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="derma_otro_tab" data-toggle="tab" href="#derma_otro" role="tab" aria-control="derma_otro" aria-selected="false">Otro tratamiento</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="dermato_adulto">
                                                                <!--ELIMINACIÓN DE CICATRICES-->
                                                                <div class="tab-pane fade show active" id="derma_cicatriz" role="tabpanel" aria-labelledby="derma_cicatriz_tab">
                                                                    <div  id="formulario_tto_dermico">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten"> ELIMINACIÓN DE CICATRICES </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="elim_cicat">Tipo de Procedimiento</label>
                                                                                <select class="form-control form-control-sm" name="elim_cicat" id="elim_cicat">
                                                                                    <option value = "0">Seleccione una opción</option>
                                                                                    <option value = "Dermoabrasión">Dermoabrasión</option>
                                                                                    <option value = "Exfoliacion quimica">Exfoliacion quimica</option>
                                                                                    <option value = "Inyecciones de relleno dérmico">Inyecciones de relleno dérmico</option>
                                                                                    <option value = "Exfoliación por láser y fototerapias">Exfoliación por láser y fototerapias</option>
                                                                                    <option value = "Microinjertos">Microinjertos</option>
                                                                                    <option value = "Incisión subcutánea. ">Incisión subcutánea. </option>
                                                                                    <option value = "Transferencia de grasa autóloga">Transferencia de grasa autóloga</option>
                                                                                    <option value = "Inyecciones  intralesionales">Inyecciones  intralesionales</option>
                                                                                    <option value = "Crioterapia">Crioterapia</option>
                                                                                    <option value = "Cremas tópicas">Cremas tópicas </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="desc_elim_cicat">Descripción </label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="desc_elim_cicat" id="desc_elim_cicat"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm"for="obs_elim_cica"> Observaciones</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_elim_cica" id="obs_elim_cica"></textarea>
                                                                            </div>
                                                                            <!--IMAGENES-->
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="f-12 mb-0 font-weight-bold text-center">Imagenes Pre</label>
                                                                                <div id="imagenes_elim_cicat_pre-c" class="collapse show" aria-labelledby="imagenes_elim_cicat_pre" data-parent="#imagenes_elim_cicat_pre">
                                                                                    <div class="dropzone" id="mis-imagenes-elim_cicar_pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <p class="f-12 mb-0 font-weight-bold text-center">Imagenes Post</p>
                                                                                <div id="imagenes_elim_cicat_post-c" class="collapse show" aria-labelledby="imagenes_elim_cicat_post" data-parent="#imagenes_elim_cicat_post">
                                                                                    <div class="dropzone" id="mis-imagenes-elim-cicat-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--TTO PIEL DAÑADA-->
                                                                <div class="tab-pane fade show" id="derma_piel_dan" role="tabpanel" aria-labelledby="derma_piel_dan_tab">
                                                                    <div id="formulario_piel_danada">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">TRATAMIENTO DE PIEL DAÑADA</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="proc_piel_danada"> Tipo de Procedimiento </label>
                                                                                <select class="form-control form-control-sm" name="proc_piel_danada" id="proc_piel_danada">
                                                                                    <option value = "0">Seleccione una opción</option>
                                                                                    <option value = "Toxina botulínica tipo A">Toxina botulínica tipo A</option>
                                                                                    <option value = "Exfoliacion quimica.">Exfoliacion quimica. </option>
                                                                                    <option value = "Aumento del tejido blando/inyecciones de relleno dérmico">Aumento del tejido blando/inyecciones de relleno dérmico</option>
                                                                                    <option value = "Dermoabrasión">Dermoabrasión</option>
                                                                                    <option value = "Rejuvenecimiento de la piel con láser. ">Rejuvenecimiento de la piel con láser. </option>
                                                                                    <option value = "Luz pulsada intensa">Luz pulsada intensa</option>
                                                                                    <option value = "Tratamiento con tretinoína">Tratamiento con tretinoína</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="proc_piel_danada_desc">Descripción </label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="proc_piel_danada_desc" id="proc_piel_danada_desc"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="proc_piel_danada_obs">Observaciones</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="proc_piel_danada_obs" id="proc_piel_danada_obs"></textarea>
                                                                            </div>
                                                                            <!--IMAGENES-->
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <p class="f-12 mb-0 font-weight-bold text-center">Imagenes Pre</p>
                                                                                <div id="proc_piel_danada_img_pre-c" class="collapse show" aria-labelledby="proc_piel_danada_img_pre" data-parent="#proc_piel_danada_obs_img_pre">
                                                                                    <div class="dropzone" id="mis-imagenes-proc-piel-danada-img-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <p class="f-12 mb-0 font-weight-bold text-center">Imagenes Post</p>
                                                                                <div id="proc_piel_danada_img_post-c" class="collapse show" aria-labelledby="proc_piel_danada_img_post" data-parent="#proc_piel_danada_img_post">
                                                                                    <div class="dropzone" id="mis-imagenes-proc-piel-danada-img-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--EXFOLIACIÓN QUIMÍCA-->
                                                                <div class="tab-pane fade show" id="derma_exfol" role="tabpanel" aria-labelledby="derma_exfol_tab">
                                                                    <div id="formulario_rinofibro">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">EXFOLIACIÓN QUÍMICA</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                <label class="floating-label-activo-sm" for="exfoliacion_proc">Motivo Procedimiento </label>
                                                                                <select class="form-control form-control-sm" name="exfoliacion_proc" id="exfoliacion_proc">
                                                                                    <option value = "0">Seleccione una opción</option>
                                                                                    <option value = "Corregir el color (pigmento) desigual de la piel">Corregir el color (pigmento) desigual de la piel</option>
                                                                                    <option value = "Eliminar masas precancerosas de la piel">Eliminar masas precancerosas de la piel</option>
                                                                                    <option value = "Suavizar el acné o tratar las cicatrices que producen">Suavizar el acné o tratar las cicatrices que producen</option>
                                                                                    <option value = "Tratar las arrugas que producen el sol, así como daños y tejido cicatricial">Tratar las arrugas que producen el sol, así como daños y tejido cicatricial</option>
                                                                                    <option value = "Tratar las imperfecciones de la piel que se deben a la edad ya la herencia">Tratar las imperfecciones de la piel que se deben a la edad ya la herencia</option>
                                                                                    <option value = "6">Otro</option>
                                                                                </select>
                                                                            </div>
                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                <label class="floating-label-activo-sm" for="exfoliacion_comp">Compuesto</label>
                                                                                <select class="form-control form-control-sm" name="exfoliacion_comp" id="exfoliacion_comp">
                                                                                    <option value = "0">Seleccione una opción</option>
                                                                                    <option value = "Alfahidroxiácidos">Alfahidroxiácidos</option>
                                                                                    <option value = "ácido tricloroacético">ácido tricloroacético</option>
                                                                                    <option value = "fenol">fenol</option>
                                                                                </select>
                                                                            </div>
                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                <label class="floating-label-activo-sm" for="exfoliacion_desc">Descripción </label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="exfoliacion_desc" id="exfoliacion_desc"></textarea>
                                                                            </div>
                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                <label class="floating-label-activo-sm" for="exfoliacion_obs">Observaciones</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="exfoliacion_obs" id="exfoliacion_obs"></textarea>
                                                                            </div>
                                                                            <!--IMAGENES-->
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="f-12 mb-0 font-weight-bold text-center">Imagenes Pre</label>
                                                                                <div id="imagenes_exfoliacion_pre-c" class="collapse show" aria-labelledby="imagenes_exfoliacion_pre" data-parent="#imagenes_exfoliacion_pre">
                                                                                    <div class="dropzone" id="mis-imagenes-imagenes-exfoliacion-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="f-12 mb-0 font-weight-bold text-center">Imagenes Post</label>
                                                                                <div id="imagenes_exfoliacion_post-c" class="collapse show" aria-labelledby="imagenes_exfoliacion_post" data-parent="#imagenes_exfoliacion_post">
                                                                                    <div class="dropzone" id="mis-imagenes-imagenes-exfoliacion-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--DERMABRASIÓN / DERMOPLANING-->
                                                                <div class="tab-pane fade show" id="derma_derma" role="tabpanel" aria-labelledby="derma_derma_tab">
                                                                    <div id="formulario_rinofibro">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">DERMABRASIÓN / DERMOPLANING</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="dermabras_proc">Tipo de Procedimiento </label>
                                                                                <select class="form-control form-control-sm" name="dermabras_proc" id="dermabras_proc">
                                                                                    <option value = "0">Seleccione una opción</option>
                                                                                    <option value = "DERMABRASIÓN">DERMABRASIÓN</option>
                                                                                    <option value = "DERMOPLANING">DERMOPLANING</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="dermabras_desc">Descripción </label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="dermabras_desc" id="dermabras_desc"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="dermabras_obs">Observaciones</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="dermabras_obs" id="dermabras_obs"></textarea>
                                                                            </div>
                                                                            <!--IMAGENES-->
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="f-12 mb-0 font-weight-bold text-center">Imagenes Pre</label>
                                                                                <div id="imagenes_dermabras_pre-c" class="collapse show" aria-labelledby="imagenes_dermabras_pre" data-parent="#imagenes_dermabras_pre">
                                                                                    <div class="dropzone" id="mis-imagenes-imagenes-dermabras-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="f-12 mb-0 font-weight-bold text-center">Imagenes Post</label>
                                                                                <div id="imagenes_dermabras_post-c" class="collapse show" aria-labelledby="imagenes_dermabras_post" data-parent="#imagenes_dermabras_post">
                                                                                    <div class="dropzone" id="mis-imagenes-imagenes-dermabras-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--CIRUGIA LÁSER-->
                                                                <div class="tab-pane fade show" id="derma_laser" role="tabpanel" aria-labelledby="derma_laser_tab">
                                                                    <div id="formulario_rinofibro">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">CIRUGÍA LÁSER</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                    <label class="floating-label-activo-sm" for="laser_motivo">Motivo Procedimiento</label>
                                                                                <input type="text" class="form-control form-control-sm" name="laser_motivo" id="laser_motivo">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="laser_desc">Descripción </label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="laser_desc" id="laser_desc"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="laser_obs">Observaciones</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="laser_obs" id="laser_obs"></textarea>
                                                                            </div>
                                                                            <!--IMAGENES-->
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="f-12 mb-0 font-weight-bold text-center">Imagenes Pre</label>
                                                                                <div id="imagenes_laser_pre-c" class="collapse show" aria-labelledby="imagenes_laser_pre" data-parent="#imagenes_laser_pre">
                                                                                    <div class="dropzone" id="mis-imagenes-imagenes-laser-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="f-12 mb-0 font-weight-bold text-center">Imagenes Post</label>
                                                                                <div id="imagenes_laser_post-c" class="collapse show" aria-labelledby="imagenes_laser_post" data-parent="#imagenes_laser_post">
                                                                                    <div class="dropzone" id="mis-imagenes-imagenes-laser-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--OTRO PROCEDIMIENTO-->
                                                                <div class="tab-pane fade show" id="derma_otro" role="tabpanel" aria-labelledby="derma_otro_tab">
                                                                    <div id="formulario_rinofibro">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">OTRO PROCEDIMIENTO</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="nombre_otro_proced">Procedimiento</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_otro_proced" id="nombre_otro_proced"/>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="desc_otro_proced">Descripción </label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="desc_otro_proced" id="desc_otro_proced"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <label  class="floating-label-activo-sm" for="obs_otro_proced">Observaciones</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_otro_proced" id="obs_otro_proced"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- control post qx -->
                                @include('general.secciones_ficha.cirugia_control.control_cirugia_general')
                                <!--ENFERMO CRÓNICO O GES-->
                                @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')
                                <!--Diagnóstico-->
                                @include('general.secciones_ficha.diagnostico')
                            </div>
                        </div>

                        @php
                            $seccion_tipo = 'dermo';
                        @endphp
                        @include('general.venereas.venereas')

                    </div>

                    {{--  div de botones  --}}
                    <div class="card">
                        <div class="card-body">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                        </div>
                    </div>

                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
                                <input type="submit" class="btn btn-info mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--MODALES modal_enfermedades_cronicas-->
@include('atencion_medica.formularios.modal_atencion_general.modal_enfermedades_cronicas')
@include("general.modal.modal_no_disponible")

@section('page-script-ficha-atencion')
    <script>
        $(document).ready(function() {

            /** MENSAJE*/
            /** CARGAR mensaje */
            $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio el resto es opcional.');
            $('#mensaje_ficha').show();
            setTimeout(function(){
                $('#mensaje_ficha').hide();
            }, 5000);

            @if($fichas->count()>0)
                $('#mensaje_historias').html(' El paciente posee historia medica previa. ');
            @else
                $('#mensaje_historias').html(' Primera consulta del paciente. ');
            @endif
                $('#mensaje_historias').show();
                setTimeout(function(){
                    $('#mensaje_historias').hide();
                }, 6000);


            /* formatear rut */
            $("#solicitado_por_rut_rfl").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            $("#descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $("#lic_descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#lic_descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_lic_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            /** cronico */
            /** autocomplete de medicamentos generales */
            $("#nombre_medicamentocron").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron').val(ui.item.label);
                    $('#id_medicamento_cronico').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_cronicomes');
                    return false;
                }
            });

            /** autocomplete de medicamentos patologia */
            $("#nombre_medicamentocron_patologia").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron_patologia').val(ui.item.label);
                    $('#id_medicamentocron_patologia').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_medicamentocron_patologia');
                    return false;
                }
            });

            /** accion check confidencial */
            $('#confidencial').change(function() {
                if ($('#confidencial').is(':checked')) {
                    $('#confidencial_descripcion').show();
                } else {
                    $('#confidencial_descripcion').hide();
                }
            });

            /** accion check ges */
            $('#modal_ges').change(function() {
                if ($('#modal_ges').is(':checked')) {
                    $('#form_ges').modal('show');
                } else {
                    $('#form_ges').modal('hide');
                }
            });

            /** busqueda de diagnostico GES */
            $("#nombre_ges").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('ges.ver') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#nombre_ges').val(ui.item.label); // display the selected text
                    $('#id_ges').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

        })

        /** MANEJO DE IMAGENES */

        var myDropzoneConsDermatoPre;
        Dropzone.options.misImagenesConsDermatoPre  = {
            init:function()
            {
                myDropzoneConsDermatoPre = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneConsDermatoPre, 'img_cons_dermato_pre');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneConsDermatoPre, 'img_cons_dermato_pre');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneConsDermatoPre, 'img_cons_dermato_pre');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneConsDermatoPost;
        Dropzone.options.misImagenesConsDermatoPost  = {
            init:function()
            {
                myDropzoneConsDermatoPost = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneConsDermatoPost, 'img_cons_dermato_post');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneConsDermatoPost, 'img_cons_dermato_post');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneConsDermatoPost, 'img_cons_dermato_post');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneElimCicarPre;
        Dropzone.options.misImagenesElimCicarPre  = {
            init:function()
            {
                myDropzoneElimCicarPre = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneElimCicarPre, 'imagenes_elim_cicat_pre');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneElimCicarPre, 'imagenes_elim_cicat_pre');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneElimCicarPre, 'imagenes_elim_cicat_pre');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneElimCicatPost;
        Dropzone.options.misImagenesElimCicatPost  = {
            init:function()
            {
                myDropzoneElimCicatPost = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneElimCicatPost, 'imagenes_elim_cicat_post');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneElimCicatPost, 'imagenes_elim_cicat_post');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneElimCicatPost, 'imagenes_elim_cicat_post');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneProcPielDanadaImgPre;
        Dropzone.options.misImagenesProcPielDanadaImgPre  = {
            init:function()
            {
                myDropzoneProcPielDanadaImgPre = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_pre');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_pre');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_pre');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneProcPielDanadaImgPost;
        Dropzone.options.misImagenesProcPielDanadaImgPost  = {
            init:function()
            {
                myDropzoneProcPielDanadaImgPost = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneProcPielDanadaImgPost, 'proc_piel_danada_img_post');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneProcPielDanadaImgPost, 'proc_piel_danada_img_post');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_post');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneImagenesExfoliacionPre;
        Dropzone.options.misImagenesImagenesExfoliacionPre  = {
            init:function()
            {
                myDropzoneImagenesExfoliacionPre = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesExfoliacionPre, 'imagenes_exfoliacion_pre');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesExfoliacionPre, 'imagenes_exfoliacion_pre');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneImagenesExfoliacionPre, 'imagenes_exfoliacion_pre');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneImagenesExfoliacionPost;
        Dropzone.options.misImagenesImagenesExfoliacionPost  = {
            init:function()
            {
                myDropzoneImagenesExfoliacionPost = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesExfoliacionPost, 'imagenes_exfoliacion_post');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesExfoliacionPost, 'imagenes_exfoliacion_post');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneImagenesExfoliacionPost, 'imagenes_exfoliacion_post');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneImagenesDermabrasPre;
        Dropzone.options.misImagenesImagenesDermabrasPre  = {
            init:function()
            {
                myDropzoneImagenesDermabrasPre = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesDermabrasPre, 'imagenes_dermabras_pre');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesDermabrasPre, 'imagenes_dermabras_pre');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneImagenesDermabrasPre, 'imagenes_dermabras_pre');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneImagenesDermabrasPost;
        Dropzone.options.misImagenesImagenesDermabrasPost  = {
            init:function()
            {
                myDropzoneImagenesDermabrasPost = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesDermabrasPost, 'imagenes_dermabras_post');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesDermabrasPost, 'imagenes_dermabras_post');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneImagenesDermabrasPost, 'imagenes_dermabras_post');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneImagenesLaserPre;
        Dropzone.options.misImagenesImagenesLaserPre  = {
            init:function()
            {
                myDropzoneImagenesLaserPre = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesLaserPre, 'imagenes_laser_pre');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesLaserPre, 'imagenes_laser_pre');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneImagenesLaserPre, 'imagenes_laser_pre');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzoneImagenesLaserPost;
        Dropzone.options.misImagenesImagenesLaserPost  = {
            init:function()
            {
                myDropzoneImagenesLaserPost = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesLaserPost, 'imagenes_laser_post');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes(myDropzoneImagenesLaserPost, 'imagenes_laser_post');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzoneImagenesLaserPost, 'imagenes_laser_post');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var lista_imagenes = [];
        var lista_imagenes = {};
        function cargar_lista_imagenes(obj_dropzone, alias_examen)
        {
            // console.log('--------------cargar_lista_imagenes----------------------');
            lista_imagenes[alias_examen] = [];
            let temp  = obj_dropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined)
                    {
                        var img_temp = JSON.parse(value.xhr.response);
                        lista_imagenes[alias_examen][index] = [
                            url=img_temp.img.url,
                            nombre_origian= img_temp.img.original_file_name,
                            nombre_img = img_temp.img.nombre_img,
                            file_extension = img_temp.img.file_extension,
                        ];
                        $('#input_lista_imagenes').val('');
                        $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
                    }
                }
            });
        }

        /** MANEJO DE IMAGENES */

        /** REGISTO ANTECEDENTES */
        function carga_campos_antecedente_nuevo()
        {
            if($('#tipo_antecedente').val()!='')
            {
                $('#div_campos_antecedente_nuevo').html('');
                var html = '';
                if($('#tipo_antecedente').val() == 'alergia')
                {
                    html +='';

                    html += '<div class="form-row">';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '        <label class="floating-label-activo-sm">Seleccione</label>';
                    html += '        <input type="text" id="alergia_paciente" name="alergia_paciente" class="form-control form-control-sm"  value="">';
                    html += '        <input type="hidden" name="id_alergia_paciente" id="id_alergia_paciente" value=""/>';
                    html += '    </div>';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '        <label class="floating-label-activo-sm">Detalle</label>';
                    html += '        <input type="text" name="alergia_comentario_paciente" id="alergia_comentario_paciente"  class="form-control form-control-sm"  value="">';
                    html += '    </div>';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '       <button type="button" class="btn btn-success btn-sm" onclick="agregar_alergia_paciente();">Guardar</button>';
                    html += '    </div>';
                    html += '</div>';

                    $('#div_campos_antecedente_nuevo').show();
                    $('#div_campos_antecedente_nuevo').html(html);

                     /** autocompletado de alergias */
                    $("#alergia_paciente").autocomplete({
                        source: function(request, response) {
                            // Fetch data
                            $.ajax({
                                url: "{{ route('alergias.ver_autocomplete') }}",
                                type: 'get',
                                dataType: "json",
                                data: {
                                    search: request.term
                                },
                                success: function(data) {
                                    console.log(data);
                                    response(data);
                                }
                            });
                        },
                        select: function(event, ui) {
                            // Set selection
                            $('#alergia_paciente').val(ui.item.label); // display the selected text
                            $('#id_alergia_paciente').val(ui.item.value); // save selected id to input

                            return false;
                        }
                    });

                }
                if($('#tipo_antecedente').val() == 'enfermedades_cronicas')
                {
                    html +='';
                }
                if($('#tipo_antecedente').val() == 'anestesias')
                {
                    html +='';
                }
                if($('#tipo_antecedente').val() == 'cirugia')
                {
                    html +='';
                }
            }
            else
            {
                $('#div_campos_antecedente_nuevo').hide();
                $('#div_campos_antecedente_nuevo').html('');
            }
        }

        function agregar_alergia_paciente() {

            let alergia = $('#alergia_paciente').val();
            let id_alergia = $('#id_alergia_paciente').val();
            let comentario = $('#alergia_comentario_paciente').val();
            let paciente = $('#id_paciente_fc').val();
            let token = CSRF_TOKEN;
            var mensaje = '';
            var valido = 0;

            if(alergia=="")
            {
                mensaje +='Campo requerido alergia\n';
                valido = 1;
            }
            // if(id_alergia=="")
            // {
            //     mensaje +='Campo requerido id alergia\n';
            //     valido = 1;
            // }
            if(comentario=="")
            {
                mensaje +='Campo requerido Detalle\n';
                valido = 1;
            }
            if(paciente=="")
            {
                mensaje +='Campo requerido paciente\n';
                valido = 1;
            }

            if(valido == 0)
            {
                swal({
                    title: "Alergia agregada correctamente. ***PENDIDENTE POR HACER***",
                    icon: "success",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
            else
            {
                swal({
                    title: "Campo Requerido en registro de Alergia. ***PENDIDENTE POR HACER***",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        }
        /** FIN REGISTRO ANTECEDENTES  */


        function cargarIgual(input)
        {
            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
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

        function biopsia(alias_examen)
        {
            if($('#biopsia_check_'+alias_examen).prop('checked'))
			{
				$('#m_biopsia_cir').modal('show');
                $('#biopsia_'+alias_examen).val(1);
			}
            else
            {
                $('#biopsia_'+alias_examen).val(0);
                $('#m_biopsia_cir').modal('hide');
            }
        }

        function cambio_select_biopsia(alias_examen, select, div, input, valor)
        {
            if($('#biopsia_check_'+alias_examen).prop('checked'))
			{
				$('#'+select).attr('disabled',false).val(1);
			}
            else
            {
                $('#'+select).attr('disabled','disabled').val(0);
            }
            // evaluar_para_carga_detalle(select,div,input,valor);
            evaluar_para_carga_detalle('biopsia_uro','div_biopsia_uro','obs_biopsia_uro',2);
        }

        function agregar_medicamentos_ficha()
		{
            var rows1 = [];
            $('#tabla_medicamento_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["id_producto"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["uso_cronico"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["medicamento"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["presentacion"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["posologia"] = $.trim($(data[4]).text().split("\n").join(""));
                    rol["via_administracion"] = $.trim($(data[5]).text().split("\n").join(""));
                    rol["periodo"] = $.trim($(data[6]).text().split("\n").join(""));
                    rol["compra"] = $.trim($(data[7]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });

            $('#medicamentos').val(JSON.stringify(rows1));
        }

        function agregar_examenes_ficha() {
            var rows = [];
            $('#tabla_examen_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    console.log(i);
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                    // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["con_contraste"] = $.trim($(data[3]).text().split("\n").join(""));
                    rows.push(rol);
                }
            });
            $('#examenes').val(JSON.stringify(rows));
        }

        function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
        {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if(rut.length>5)
            {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre).attr('readonly', true);
                            $('#'+input_nombre).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#div_mensaje').hide();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_rfl').val('');
                            $('#solicitado_por_apellido_rfl').val('');
                            $('#solicitado_por_telefono_rfl').val('');
                            $('#solicitado_por_email_rfl').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_rfl').val('');
                            $('#solicitado_por_apellido_rfl').val('');
                            $('#solicitado_por_telefono_rfl').val('');
                            $('#solicitado_por_email_rfl').val('');
                            // $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        // $('#'+input_nombre).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        {
            var nombre = $('#'+input_nombre).val();
            var apellido = $('#'+input_apellido).val();
            if(nombre != '' || apellido != '')
            {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
            }
            else
            {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#'+input_solitado_por).val();
            }
        }

    </script>

    <!--ALERTA DE ATENCION-->
    <script>
        window.setTimeout(function() {
            $(".alert-atencion").fadeTo(500, 0).slideUp(600, function(){
                $(this).remove();
            });
        }, 5000);
    </script>
@endsection


