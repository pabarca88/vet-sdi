<!-- FICHA ATENCION GENERAL -->
<div class="tab-pane fade" id="fcc" role="tabpanel" aria-labelledby="fcc-tab">
    <div class="row bg-white shadow-none rounded mx-1">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mt-3 mb-0">
                    <h6 class="f-16 text-c-blue">Ficha de atención</h6>
                    <hr>
                </div>
            </div>
            <div class="row">
                <!--Formulario / Menor de edad-->
                @include('atencion_pediatrica.generales.seccion_menor')
                <!--Cierre: Formulario / Menor de edad-->

                <!--Formulario / Motivo de la Consulta-->
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header" id="mot-consulta">
                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                Motivo de la consulta
                            </button>
                        </div>
                        <div id="mot-consulta-c" class="collapse show" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                            <div class="card-body-aten shadow-none">
                                <div class="form-row">
                                    <div class="form-group col-md-8">

                                        @if (isset($fichaAtencion) && $fichaAtencion->motivo != null)
                                            <label class="floating-label-activo-sm">Descripción</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" data-input_igual="descripcion_consulta_orl" name="descripcion_consulta" id="descripcion_consulta" onchange="cargarIgual('descripcion_consulta')">{{ $fichaAtencion->motivo }}</textarea>
                                        @else
                                            <label class="floating-label-activo-sm">Descripción</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" data-input_igual="descripcion_consulta_orl" name="descripcion_consulta" id="descripcion_consulta" onchange="cargarIgual('descripcion_consulta')">{!! old('descripcion_consulta') !!}</textarea>
                                        @endif

                                    </div>
                                    <div class="form-group col-md-4">

                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Seleccione
                                                Consulta Control</label>
                                            <select class="form-control form-control-sm" id="id_consulta_control" name="id_consulta_control">
                                                <option>Seleccione</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Cierre: Formulario /Motivo de la Consulta-->

                <!--Formulario / Antecedentes-->
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header" id="antecedentes">
                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antecedentes-c" aria-expanded="false" aria-controls="antecedentes-c">
                                Antecedentes
                            </button>
                        </div>
                        <div id="antecedentes-c" class="collapse show" aria-labelledby="antecedentes" data-parent="#antecedentes">
                            <div class="card-body-aten shadow-none">
                                <div class="form-row">
                                    @if (isset($fichaAtencion) && $fichaAtencion->antecedentes != null)
                                    <div class="form-group col-md-12">
                                        <label class="floating-label-activo-sm">Antecedentes</label>
                                        <input type="text" class="form-control form-control-sm" name="descripcion_antecedentes" id="descripcion_antecedentes" value="{{ $fichaAtencion->antecedentes }}">
                                    </div>
                                    @else
                                    <div class="form-group col-md-12">
                                        <label class="floating-label-activo-sm">Antecedentes</label>
                                        <textarea class="form-control form-control-sm" name="descripcion_antecedentes" id="descripcion_antecedentes">{!! old('descripcion_antecedentes') !!}</textarea>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Cierre: Formulario / Antecedentes-->
                <!--Formulario / Examen Físico-->
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card">
                            <div class="card-header" id="examen-fisico">
                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#examen-fisico-c" aria-expanded="false" aria-controls="examen-fisico-c">
                                    Examen físico
                                </button>
                            </div>
                            <div id="examen-fisico-c" class="collapse show" aria-labelledby="examen-fisico" data-parent="#examen-fisico">
                                <div class="card-body-aten shadow-none">
                                    <div class="form-row">
                                        @if (isset($fichaAtencion) && $fichaAtencion->examen_fisico !=
                                        null)
                                        <div class="form-group col-md-12">
                                            <label class="floating-label-activo-sm">Descripción</label>
                                            <input class="form-control caja-texto form-control-sm" name="descripcion_examen_fisico" id="descripcion_examen_fisico" value="{{ $fichaAtencion->examen_fisico }}">
                                        </div>
                                        @else
                                        <div class="form-group col-md-12">
                                            <label class="floating-label-activo-sm">Descripción</label>
                                            <textarea class="form-control form-control-sm" name="descripcion_examen_fisico" id="descripcion_examen_fisico">{!! old('descripcion_examen_fisico') !!}</textarea>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Cierre: Formulario / Examen Físico-->
                <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header" id="exam_esp">
                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                Examen especialidad
                            </button>
                        </div>
                        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">

                            <div class="card-body-aten shadow-none">

                                <div id="form-pediatria">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="f-16 text-c-blue"> Crecimiento y Desarrollo</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Descripción Crecimiento y Desarrollo</label>
                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="antec_ped" id="antec_ped"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <form>
                                            <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="ant_parto ();"></i>Antecedentes Embarazo y Parto</button>
                                            <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="tunner();"></i>Grado de Tunner Femenino</button>
                                            <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="tunner_m();"></i>Grado de Tunner Masculino</button>
                                        </form>
                                    </div>

                                    <hr>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group col-md-12">
                                                <label class="floating-label-activo-sm">Carga Ficha Tipo45</label>
                                                <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                    <option value="">Seleccione</option>
                                                    @if(!empty($fichaTipo))
                                                        @foreach ($fichaTipo as $ft )
                                                            <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="descripcion_ficha_tipo_especialidad"></span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h6 class="f-16 text-c-blue">Estado Nutricional</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">

                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Estado Nutricional54</label>
                                                    <select name="e_nutricional" data-titulo="Examen_nutricional" id="e_nutricional" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_nutricional','div_examen_nutricional','obs_obs_e_nutricional',2);">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Normal</option>
                                                        <option value="2">Anormal</option>
                                                        <option value="3">No Realizada</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12" id="div_examen_nutricional" style="display:none;">
                                                    <label class="floating-label-activo-sm">Estado Nutricional(describir)</label>
                                                    <textarea class="form-control form-control-sm" data-titulo="Examen_nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_nutricional" id="obs_obs_e_nutricional"></textarea>
                                                </div>

                                        </div>
                                        <div class="form-group col-md-6">

                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Vacunas</label>
                                                    <select name="e_vacunas" id="e_vacunas" data-titulo="Vacunas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_vacunas','div_e_vacunas','obs_e_vacunas',2);">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Al día</option>
                                                        <option value="2">Atrasadas</option>
                                                        <option value="3">No Informadas</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12" id="div_e_vacunas" style="display:none;">
                                                    <label class="floating-label-activo-sm">Vacunas(describir)</label>
                                                    <textarea class="form-control form-control-sm"  data-titulo="Vacunas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_vacunas" id="obs_e_vacunas"></textarea>
                                                </div>

                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label-activo-sm">Obs. Estado nutricional y vacunas</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--Vestibular-->
                                    <div class="form-row mb-2">
                                        <div class="col-md-12">
                                            <h6 class="f-16 text-c-blue">Examen Segmentario</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Piel</label>
                                                    <select name="e_piel" id="e_piel" data-titulo="Piel" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_piel','div_e_piel','obs_e_piel',2)">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Normal</option>
                                                        <option value="2">Anormal Describir</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12" id="div_e_piel" style="display:none">
                                                    <label class="floating-label-activo-sm">Describir Examen de piel</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Piel" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Cabeza y Cuello</label>
                                                    <select name="e_cabcuello" id="e_cabcuello" data-titulo="Cabeza y Cuello" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_cabcuello','div_e_cabcuello','detalle_e_cabcuello',3)">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Normal</option>
                                                        <option value="2">No Examinado</option>
                                                        <option value="3">Otro Describir</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12" id="div_e_cabcuello" style="display:none">
                                                    <label class="floating-label-activo-sm">Describir Examen de Cuello</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Cabeza y Cuello" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_e_cabcuello" id="detalle_e_cabcuello"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Torax</label>
                                                    <select name="e_torax" id="e_torax" data-titulo="Torax" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_torax','div_e_torax','det_e_torax',2);">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Normal</option>
                                                        <option value="2">Alterado Describir</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12" id="div_e_torax" style="display:none">
                                                    <label class="floating-label-activo-sm">Describir Examen de Torax</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Torax" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_e_torax" id="det_e_torax"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Abdomen</label>
                                                    <select name="e_abdomen" id="e_abdomen" data-titulo="Abdomen" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_abdomen','div_e_abdomen','det_e_abdomen',2);">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Normal</option>
                                                        <option value="2">Anormal(describir)</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12" id="div_e_abdomen" style="display:none">
                                                    <label class="floating-label-activo-sm">Examen de Abdomen</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Abdomen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_e_abdomen" id="det_e_abdomen"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Musculo-Esquelético</label>
                                                    <select name="e_muscesq" id="e_muscesq" data-titulo="Musculo-Esquelético" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_muscesq','div_e_muscesq','det_e_muscesq',2);">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Normal</option>
                                                        <option value="2">Anormal</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12" id="div_e_muscesq" style="display:none">
                                                    <label class="floating-label-activo-sm">Examen Musculo-Esquelético</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Musculo-Esquelético" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_e_muscesq" id="det_e_muscesq"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Organos de los Sentidos</label>
                                                    <select name="e_o_sent" id="e_o_sent" data-titulo="O-Sentidos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_o_sent','div_e_o_sent','det_e_o_sent',2);">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Normal</option>
                                                        <option value="2">Anormal</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12" id="div_e_o_sent" style="display:none">
                                                    <label class="floating-label-activo-sm">Examen Organos de los Sentidos</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Musculo-Esquelético" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_e_o_sent" id="det_e_o_sent"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label-activo-sm">Observaciones Ex Segmentario</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen equilibrio" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_equilibrio" id="obs_equilibrio"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-9" style="margin-bottom: 0;">
                                            <label class="floating-label-activo-sm">Observaciones Examen Especialidad</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                        </div>
                                        <div class="form-group col-md-3 align-middle" style="margin:auto">
                                            <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo();"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Ficha Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Formulario / Signos vitales y otros-->
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header" id="signosvit-otros">
                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#signosvit-otros-c" aria-expanded="false" aria-controls="signosvit-otros-c">
                                Signos vitales y otros mas
                            </button>
                        </div>
                        <div id="signosvit-otros-c" class="collapse" aria-labelledby="signosvit-otros" data-parent="#signosvit-otros">
                            <div class="card-body-aten shadow-none">
                                <div class="form-row">
                                    <div class="form-group col-md-1">
                                        @if (isset($fichaAtencion) && $fichaAtencion->temperatura !=
                                        null)
                                        <label class="floating-label-activo-sm">Tº</label>
                                        <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{{ $fichaAtencion->temperatura }}">
                                        @else
                                        <label class="floating-label-activo-sm">Tº</label>
                                        <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{!! old('temperatura') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-1">
                                        @if (isset($fichaAtencion) && $fichaAtencion->pulso != null)
                                        <label class="floating-label-activo-sm">Pulso</label>
                                        <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{{ $fichaAtencion->pulso }}">
                                        @else
                                        <label class="floating-label-activo-sm">Pulso</label>
                                        <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{!! old('pulso') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-2">
                                        @if (isset($fichaAtencion) && $fichaAtencion->frecuencia_reposo
                                        != null)
                                        <label class="floating-label-activo-sm">Frec.
                                            Reposo</label>
                                        <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{{ $fichaAtencion->frecuencia_reposo }}">
                                        @else
                                        <label class="floating-label-activo-sm">Frec.
                                            Reposo</label>
                                        <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{!! old('frecuencia_reposo') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-2">
                                        @if (isset($fichaAtencion) && $fichaAtencion->peso != null)
                                        <label class="floating-label-activo-sm">Peso</label>
                                        <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{{ $fichaAtencion->peso }}">
                                        @else
                                        <label class="floating-label-activo-sm">Peso</label>
                                        <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{!! old('peso') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-2">
                                        @if (isset($fichaAtencion) && $fichaAtencion->talla != null)
                                        <label class="floating-label-activo-sm">Talla</label>
                                        <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{{ $fichaAtencion->talla }}">
                                        @else
                                        <label class="floating-label-activo-sm">Talla</label>
                                        <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{!! old('talla') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-2">
                                        @if (isset($fichaAtencion) && $fichaAtencion->imc != null)
                                        <label class="floating-label-activo-sm">IMC</label>
                                        <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{{ $fichaAtencion->imc }}">
                                        @else
                                        <label class="floating-label-activo-sm">IMC</label>
                                        <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{!! old('imc') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-2">
                                        @if (isset($fichaAtencion) && $fichaAtencion->estado_nutricional
                                        != null)
                                        <label class="floating-label-activo-sm">Estado
                                            Nutricional</label>
                                        <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">
                                        @else
                                        <label class="floating-label-activo-sm">Estado
                                            Nutricional</label>
                                        <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{!! old('estado_nutricional') !!}">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group mb-1">
                                        <label><strong>Presión Arterial</strong></label>
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="p_arterial" value="{!! old('p_arterial') !!}">
                                            <label for="p_arterial" class="cr"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="form_1" style="display:none">
                                    <div class="form-group col-md-3">
                                        @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                        null)
                                        <label class="floating-label-activo-sm">BI</label>
                                        <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}">
                                        @else
                                        <label class="floating-label-activo-sm">BI</label>
                                        <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{!! old('presion_bi') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        @if (isset($fichaAtencion) && $fichaAtencion->presion_bd !=
                                        null)
                                        <label class="floating-label-activo-sm">BD</label>
                                        <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{{ $fichaAtencion->presion_bd }}">
                                        @else
                                        <label class="floating-label-activo-sm">BD</label>
                                        <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{!! old('presion_bd') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        @if (isset($fichaAtencion) && $fichaAtencion->presion_de_pie !=
                                        null)
                                        <label class="floating-label-activo-sm">De pié</label>
                                        <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{{ $fichaAtencion->presion_de_pie }}">
                                        @else
                                        <label class="floating-label-activo-sm">De pié</label>
                                        <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{!! old('presion_de_pie') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        @if (isset($fichaAtencion) && $fichaAtencion->presion_sentado !=
                                        null)
                                        <label class="floating-label-activo-sm">Sentado</label>
                                        <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{{ $fichaAtencion->presion_sentado }}">
                                        @else
                                        <label class="floating-label-activo-sm">Sentado</label>
                                        <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{!! old('presion_sentado') !!}">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group mb-1">
                                        <label><strong>Comunicación y traslado</strong></label>
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="com_trasl" value="{!! old('com_trasl') !!}">
                                            <label for="com_trasl" class="cr"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="form_2" style="display:none">
                                    <div class="form-group col-md-4">
                                        @if (isset($fichaAtencion) &&
                                        $fichaAtencion->ct_estado_conciencia != null)
                                        <label class="floating-label-activo-sm">Estado de
                                            conciencia</label>
                                        <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{{ $fichaAtencion->ct_estado_conciencia }}">
                                        @else
                                        <label class="floating-label-activo-sm">Estado de
                                            conciencia</label>
                                        <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{!! old('ct_estado_conciencia') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        @if (isset($fichaAtencion) && $fichaAtencion->ct_lenguaje !=
                                        null)
                                        <label class="floating-label-activo-sm">Lenguaje</label>
                                        <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{{ $fichaAtencion->ct_lenguaje }}">
                                        @else
                                        <label class="floating-label-activo-sm">Lenguaje</label>
                                        <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{!! old('ct_lenguaje') !!}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        @if (isset($fichaAtencion) && $fichaAtencion->ct_traslado !=
                                        null)
                                        <label class="floating-label-activo-sm">Traslado</label>
                                        <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{{ $fichaAtencion->ct_traslado }}">
                                        @else
                                        <label class="floating-label-activo-sm">Traslado</label>
                                        <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{!! old('ct_traslado') !!}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Cierre: Formulario / Signos vitales y otros-->

                <!--Formulario / Diagnóstico-->
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header" id="diagnostico">
                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-c" aria-expanded="false" aria-controls="diagnostico-c">
                                Diagnóstico
                            </button>
                        </div>
                        <div id="diagnostico-c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                            <div class="card-body-aten shadow-none">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        @if (isset($fichaAtencion) &&
                                        $fichaAtencion->hipotesis_diagnostico != null)
                                        <label class="floating-label-activo-sm">Hipótesis
                                            Diagnóstica</label>
                                        <input type="text" class="form-control form-control-sm"  data-input_igual="hip-diag_spec,lic_descripcion_hipotesis" name="descripcion_hipotesis" id="descripcion_hipotesis" value="{{ $fichaAtencion->hipotesis_diagnostico }}" onchange="cargarIgual('descripcion_hipotesis')">
                                        @else
                                        <label class="floating-label-activo-sm">Hipótesis
                                            Diagnóstica</label>
                                        <input type="text" class="form-control form-control-sm" data-input_igual="hip-diag_spec,lic_descripcion_hipotesis"  name="descripcion_hipotesis" id="descripcion_hipotesis" value="{!! old('descripcion_hipotesis') !!}" onchange="cargarIgual('descripcion_hipotesis')">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        @if (isset($fichaAtencion) && $fichaAtencion->diagnostico_ce10
                                        != null)
                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                        <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie_esp,lic_descripcion_cie" name="descripcion_cie" id="descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie')">
                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie_esp,lic_descripcion_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie')">
                                        @else
                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                        <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie_esp,lic_descripcion_cie" name="descripcion_cie" id="descripcion_cie" value="{!! old('descripcion_cie') !!}" onchange="cargarIgual('descripcion_cie')">
                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie_esp,lic_descripcion_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="{!! old('id_descripcion_cie') !!}" onchange="cargarIgual('id_descripcion_cie')">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Cierre: Formulario / Diagnóstico-->
            </div>

            <!--Otros Formularios-->

            <!--ENFERMO CRÓNICO O GES-->
            <div class="row px-3 mt-3 mb-3">
                {{-- CRONICO --}}
                <div class="col-md-4 mx-auto">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" onchange="es_cronico();" id="enf_cronico" name="enf_cronico" data-toggle="modal" data-target="#form_enfermo_cronico" value="{!! old('enf_cronico') !!}">
                                    <label for="enf_cronico" class="cr"></label>
                                </div>
                                <label>¿Es enfermo crónico?</label>
                            </div>
                        </div>
                    </div>
                    <div class="row " hidden>
                        <div class="col-sm-12">
                            <div class="alert alert-warning mx-auto" role="alert">
                                <table class="table table-borderless mt-0 mb-0">
                                    <tbody>
                                        <tr id="tr_obesidad">
                                            <td class="align-middle pb-1 pt-1">Obesidad</td>
                                            <td class="align-middle pb-1 pt-1">
                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                    <i class="feather icon-x"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr id="tr_diabetes">
                                            <td class="align-middle pb-1 pt-1">Diabetes</td>
                                            <td class="align-middle pb-1 pt-1">
                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                    <i class="feather icon-x"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr id="tr_hipertesion">
                                            <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                            <td class="align-middle pb-1 pt-1">
                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                    <i class="feather icon-x"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- GES --}}
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="modal_ges" name="modal_ges" value="{!! old('modal_ges') !!}">
                                    {{-- <label for="modal_ges" class="cr" data-toggle="modal"
                                            data-target="#form_ges"></label> --}}
                                    <label for="modal_ges" class="cr"></label>
                                </div>
                                <label>Ges</label>
                            </div>
                        </div>
                    </div>
                    <div class="row" hidden>
                        <div class="alert alert-warning mx-auto my-0" role="alert">
                            <table class="table table-borderless mt-0 mb-0">
                                <tbody>
                                    <tr>
                                        <td class="align-middle pb-1 pt-1">Paciente GES<br>PS.02
                                        </td>
                                        <td class="align-middle pb-1 pt-1">
                                            <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="confidencial" name="confidencial" value="{!! old('confidencial') !!}" />
                                <label for="confidencial" class="cr"></label>
                            </div>
                            <label>Confidencial</label>
                        </div>
                    </div>
                    <div class="row" id="confidencial_descripcion" style="display: none">
                        <div class="col-sm-12">
                            <div class="alert alert-warning mx-auto" role="alert">
                                <p class="text-dark f-14 pb-1 pt-1 mt-0 mb-0">Este registro
                                    de atención médica es confidencial
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

        </div>
    </div>
</div>
<!--CIERRE: FICHA ATENCION GENERAL-->

@section('modal-ficha-general-espc')
    @include('atencion_medica.formularios.modal_atencion_general.modal_enfermedades_cronicas')
    {{--  modal de ges en resources\views\atencion_medica\modales.blade.php  --}}
@endsection

@section('js-ficha-general-espc')
    <script>
        $(document).ready(function() {
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

            /** autocomplete nombre GES */
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
                    envio_codigo_validacion_ges();
                    return false;
                }
            });

            /** abril modal de ges */
            $('#modal_ges').change(function()
            {
                if ($('#modal_ges').is(':checked'))
                {
                    $('#form_ges').modal('show');
                }
                else
                {
                    $('#form_ges').modal('hide');
                }
            });

            $('#confidencial').change(function()
            {
                if ($('#confidencial').is(':checked'))
                {
                    $('#confidencial_descripcion').show();
                }
                else
                {
                    $('#confidencial_descripcion').hide();
                }

            });
        });

        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
            {{--
            let actual = $('#'+input);
            let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            equivalente.val(actual.val());
            --}}
        }

        {{--  cronico  --}}
        function es_cronico() {
            if ($('#enf_cronico').prop('checked')) {
                $('#form_enfermedad_cronica').modal('show');
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

                $('#cronicos').val('n_C');
                ver_medicamento_cronico();
                $('.medicamento_cronico_div').show();
                $('#senal_med_cronico').removeClass('fa-angle-down');
                $('#senal_med_cronico').addClass('fa-angle-up');

                cambiar_enfermedad_cronica();

            }

        }

        function cambiar_enfermedad_cronica() {

            if($('#cronicos').val() != 'n_C')
            {
                var nombre_enfermedad = $("#cronicos option:selected").text();
                $('#titulo_med_patologia').html( ('Medicamentos '+nombre_enfermedad).toUpperCase());
                $('.medicamento_patologia').show();
                $('#btn_registro_med_patologia').attr('onclick','agregar_medicamento_cronico_patologia(\''+$('#cronicos').val()+'\')');
                ver_medicamento_cronico_patologia();

                $('.medicamento_cronico_div').hide();
                $('#senal_med_cronico').addClass('fa-angle-down');
                $('#senal_med_cronico').removeClass('fa-angle-up');

                switch ($('#cronicos').val()) {
                    case 'cpeso':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').show();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'chipertension':
                        $('#hipertension_div').show();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                        ver_control_hipertension();

                    break;
                    case 'cdiabet':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').show();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;

                    case 'cinsufren':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').show();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'cmtumorales':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').show();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'creumato':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').show();
                        $('#clitemia').hide();
                    break;
                    case 'clitemia':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').show();
                    break;

                    default:
                        break;
                }
            }
            else
            {
                $('.medicamento_patologia').hide();
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

                $('#titulo_med_patologia').html( 'Medicamentos' );
            }
        }

        function getDosis_cronico(id_medicamento, div_dosis) {

            console.log(id_medicamento);

            let url = "{{ route('dental.getDosis') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        id_medicamento: id_medicamento,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let dosis = $('#'+div_dosis);

                        dosis.find('option').remove();
                        dosis.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +
                                '</option>');
                        })

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function getCantCompCronica(div_dosis, div_comp) {

            var cant_comp = $('#'+div_dosis+' option:selected').attr('data-cant_comp');
            console.log(cant_comp);

            let url = "{{ route('presentacion.getCantComp') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        cant_comp: cant_comp,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let select_cant_comp = $('#'+div_comp);

                        select_cant_comp.find('option').remove();
                        select_cant_comp.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            select_cant_comp.append('<option value="' + v.id + '">' + v.cant +'</option>');
                        })
                        select_cant_comp.append('<option value="999">Otra Cantidad</option>');

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function agregar_medicamento_cronico()
        {

            {{--  let url = "https://www.med-sdi.cl/medicamento_cronico/registrar";  --}}
            let url = "{{ route('medicamento_cronico.registrar') }}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var nombre_medicamento = $('#nombre_medicamentocron').val();
            var id_medicamento = $('#id_medicamentocron').val();
            var cantidad = $('#med_cronicomes option:selected').text()
            var tipo_enfermedad = 'cronico';

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional:id_profesional,
                    id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    nombre_medicamento:nombre_medicamento,
                    id_medicamento:id_medicamento,
                    cantidad:cantidad,
                    tipo_enfermedad:tipo_enfermedad,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Registrado con exito.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#nombre_medicamentocron').val('');

                        $('#dosis_cronicomes').html('<option value="0">Seleccione</option>');
                        $('#med_cronicomes').html('<option value="0">Seleccione</option>');

                        ver_medicamento_cronico();


                    }
                    else{

                        swal({
                            title: "Problema al Registrar Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }


        function ver_medicamento_cronico()
        {

            {{--  let url = "https://www.med-sdi.cl/medicamento_cronico/getRegsitros";  --}}
            let url = "{{ route('medicamento_cronico.getRegsitros') }}";


            var _token = CSRF_TOKEN;
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    // id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    tipo_enfermedad:'cronico'
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                    html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                    html += '        <th class="text-center align-middle">Acción</th>';
                    html += '        <th class="text-center align-middle">Check</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            html += '<tr>';
                            html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                            html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                            html += '    </td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <input type="checkbox" name="medicamento_cronico_general" id="medicamento_cronico_general_'+value.id+'">';
                            html += '    </td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="3">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#tabla_medicamento_cronico').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function eliminar_med_cronico(id)
        {
            let url = "https://www.med-sdi.cl/medicamento_cronico/deleteRegsitro";


            var _token = CSRF_TOKEN;
            var id =id;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id:id
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Eliminado.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        ver_medicamento_cronico();
                    }
                    else{

                        swal({
                            title: "Problema al Eliminar Registro de Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
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

        {{--  MEDICAMENTOS CRONICOS PATOLOGIA  --}}
        function agregar_medicamento_cronico_patologia(tipo)
        {

            let url = "https://www.med-sdi.cl/medicamento_cronico/registrar";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var nombre_medicamento = $('#nombre_medicamentocron_patologia').val();
            var cantidad = $('#med_cronicomes_patologia option:selected').text();
            var tipo_enfermedad = tipo;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional:id_profesional,
                    id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    nombre_medicamento:nombre_medicamento,
                    cantidad:cantidad,
                    tipo_enfermedad:tipo_enfermedad,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Registrado con exito.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#nombre_medicamentocron_patologia').val('');
                        $('#id_medicamentocron_patologia').val('');

                        $('#dosis_medicamentocron_patologia').html('<option value="0">Seleccione</option>');
                        $('#med_cronicomes_patologia').html('<option value="0">Seleccione</option>');

                        ver_medicamento_cronico_patologia()
                    }
                    else{

                        swal({
                            title: "Problema al Registrar Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function ver_medicamento_cronico_patologia()
        {

            let url = "https://www.med-sdi.cl/medicamento_cronico/getRegsitros";


            var _token = CSRF_TOKEN;
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var tipo_enfermedad = $('#cronicos').val();
            $('#tabla_med_patologia').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    // id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    tipo_enfermedad:tipo_enfermedad
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                    html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                    html += '        <th class="text-center align-middle">Acción</th>';
                    html += '        <th class="text-center align-middle">Check</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            html += '<tr>';
                            html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                            html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico_patologia(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                            html += '    </td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <input type="checkbox" name="medicamento_cronico_patologia" id="medicamento_cronico_patologia_'+value.id+'">';
                            html += '    </td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="4">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#tabla_med_patologia').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function eliminar_med_cronico_patologia(id)
        {
            let url = "https://www.med-sdi.cl/medicamento_cronico/deleteRegsitro";


            var _token = CSRF_TOKEN;
            var id =id;
            var tipo_enfermedad = $('#cronicos').val();

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id:id
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Eliminado.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        ver_medicamento_cronico_patologia(tipo_enfermedad);
                    }
                    else{

                        swal({
                            title: "Problema al Eliminar Registro de Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
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


        {{--  mostrar div   --}}
        function mostrar_div(div)
        {
            if ($('.'+div).is(':visible')) {
                $('.'+div).hide();
                $('#senal_med_cronico').addClass('fa-angle-down');
                $('#senal_med_cronico').removeClass('fa-angle-up');
            } else {
                $('.'+div).show();
                $('#senal_med_cronico').removeClass('fa-angle-down');
                $('#senal_med_cronico').addClass('fa-angle-up');
            }
        }


        {{--  CRONICO VER CONTROL DE HIPERTENSION  --}}
        function ver_control_hipertension()
        {

            let url = "https://www.med-sdi.cl/hipertension/getHipertension";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_hipertension').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_paciente:id_paciente
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_control_hipertension-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '         <th class="text-center align-middle">Nº Control</th>';
                    html += '         <th class="text-center align-middle">Fecha</th>';
                    html += '         <th class="text-center align-middle">Presión Sistólica</th>';
                    html += '         <th class="text-center align-middle">Presión Diastólica</th>';
                    html += '         <th class="text-center align-middle">Presión Ideal</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                            html += '<tr>';
                            html += '    <td class="text-center align-middle">'+value.id+'</td>';
                            html += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html += '    <td class="text-center align-middle">'+value.sistolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.diastolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#control_hipertension').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        {{--  CRONICO VER CONTROL DE OBESIDAD  --}}
        function ver_control_obesidad()
        {

            {{--  let url = "https://www.med-sdi.cl/control_obesidad/getControlObesidad";  --}}
            let url = "{{ route('control_obesidad.getControlObesidad') }}";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_obesidad').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_paciente:id_paciente
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_control_hipertension-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '    <th class="text-center align-middle">Nº Control</th>';
                    html += '    <th class="text-center align-middle">Fecha</th>';
                    html += '    <th class="text-center align-middle">Peso</th>';
                    html += '    <th class="text-center align-middle">Variación</th>';
                    html += '    <th class="text-center align-middle">Peso Ideal</th>';
                    html += '    <!-- <th class="text-center align-middle">Acción</th>-->';
                    html += '</tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();


                            html += '<tr>';
                            html += '    <td class="text-center align-middle">'+value.id+'</td>';
                            html += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html += '    <td class="text-center align-middle">'+value.peso+'</td>';
                            html += '    <td class="text-center align-middle">'+value.variacion+'</td>';
                            html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                            html += '    <!--<td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>-->';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#control_obesidad').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function SelectConsultasAnteriores() {

            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional_fc').val();

            let url = "{{ route('ficha_clinica.get_fichas') }}";
            let select = $('#id_consulta_control');
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        id_paciente: id_paciente,
                        id_profesional: id_profesional,
                    },
                })
                .done(function(datos) {
                    console.log(datos);

                    if (datos.estado == 1)
                    {
                        let data = datos.registros
                        select.find('option').remove();
                        select.append('<option value="0">Seleccione</option>');
                        if(data.length>0)
                        {
                            $(data).each(function(i, v) { // indice, valor
                                var f_temp = (v.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                                var fecha = new Date(f_temp);
                                fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();
                                select.append('<option value="' + v.id + '" data-diagnostico="'+v.hipotesis_diagnostico+'">' + fecha + '</option>');
                            })
                        }
                        else
                        {
                            let data = datos.registros
                            select.find('option').remove();
                            select.append('<option value="0">Seleccione</option>');
                        }
                    } else {
                        select.find('option').remove();
                        select.append('<option value="0">Seleccione</option>');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function ver_control_hipertension()
        {

            let url = "https://www.med-sdi.cl/hipertension/getHipertension";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_hipertension').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_paciente:id_paciente
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_control_hipertension-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '         <th class="text-center align-middle">Nº Control</th>';
                    html += '         <th class="text-center align-middle">Fecha</th>';
                    html += '         <th class="text-center align-middle">Presión Sistólica</th>';
                    html += '         <th class="text-center align-middle">Presión Diastólica</th>';
                    html += '         <th class="text-center align-middle">Presión Ideal</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                            html += '<tr>';
                            html += '    <td class="text-center align-middle">'+value.id+'</td>';
                            html += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html += '    <td class="text-center align-middle">'+value.sistolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.diastolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#control_hipertension').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function registrar_control_obesidad() {

            let peso = $('#registro_peso').val();
            let variacion = $('#registro_peso_variacion').val();
            let ideal = $('#registro_peso_ideal').val();
            let url = "{{ route('ficha_medica.registrar_control_obesidad') }}";
            let hora_medica = $('#hora_medica').val();
            var validar = 0;
            var mensaje ='';

            if( peso == '' )
            {
                $('#registro_peso').focus();
                mensaje += 'Debe ingresar el Peso del Control Actual.\n';
                validar = 1;
            }
            if( variacion == '' )
            {
                $('#registro_peso_variacion').focus();
                mensaje += 'Debe ingresar la Variación.\n';
                validar = 1;
            }
            if( ideal == '' )
            {
                $('#registro_peso_ideal').focus();
                mensaje += 'Debe ingresar el Peso Ideal.\n';
                validar = 1;
            }

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        peso: peso,
                        variacion: variacion,
                        ideal: ideal,
                        hora_medica: hora_medica
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de obesidad correctamente');
                        $('#mensaje').show();
                        {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                        {{--  location.reload();  --}}
                        $('#registro_peso').val('');
                        $('#registro_peso_variacion').val('');
                        $('#registro_peso_ideal').val('');
                        ver_control_obesidad();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
            }
        };

        function registrar_hipertension() {

            let sistolica = $('#presion_sistolica_hipertension').val();
            let diastolica = $('#presion_diastolica_hipertension').val();
            let ideal = $('#ideal_hipertension').val();
            let url = "{{ route('ficha_medica.registrar_hipertension') }}";
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            var validar = 0;
            var mensaje ='';

            if( sistolica == '' )
            {
                $('#presion_sistolica_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Sistólica.\n';
                validar = 1;
            }
            if( diastolica == '' )
            {
                $('#presion_diastolica_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Diastólica.\n';
                validar = 1;
            }
            if( ideal == '' )
            {
                $('#ideal_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Ideal.\n';
                validar = 1;
            }

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        sistolica: sistolica,
                        diastolica: diastolica,
                        ideal: ideal,
                        hora_medica: hora_medica,
                        id_lugar_atencion: id_lugar_atencion
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregado control de Presión Arterial correctamente');
                        $('#mensaje').show();
                        {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                        $('#presion_sistolica_hipertension').val('');
                        $('#presion_diastolica_hipertension').val('');
                        $('#ideal_hipertension').val('');
                        ver_control_hipertension();

                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
            }
        };

        function registrar_diabetes() {

            let peso = $('#peso_diabetes').val();
            let pies = $('#pies_diabetes').val();
            let hgac1 = $('#hga1c_diabetes').val();
            let colesterol = $('#colesterol_diabetes').val();
            let creatina = $('#creatina_diabetes').val();
            let glicosilada_postprandial = $('#glicosilada_postprandial_diabetes').val();
            let glicosinada_ayuno = $('#glicosilada_ayuno_diabetes').val();
            let url = "{{ route('ficha_medica.registrar_diabetes') }}";
            let hora_medica = $('#hora_medica').val();

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        peso: peso,
                        pies: pies,
                        hgac1: hgac1,
                        colesterol: colesterol,
                        creatina: creatina,
                        glicosilada_postprandial: glicosilada_postprandial,
                        glicosinada_ayuno: glicosinada_ayuno,
                        hora_medica: hora_medica
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de diabetes correctamente');
                        $('#mensaje').show();
                        $('#form_enfermedad_cronica').modal('hide');
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };

        /** GES */
        function registrar_ges_ficha() {

            var validar = 0;
            var mensaje ='';
            let nombre_institucion_ficha_ges = $('#nombre_institucion_ficha_ges').val();
            let direccion_institucion_ficha_ges = $('#direccion_institucion_ficha_ges').val();
            let nombre_responsable_ficha_ges = $('#nombre_responsable_ficha_ges').val();
            let rut_responsable_ficha_ges = $('#rut_responsable_ficha_ges').val();
            let confirmacion_diagnostica_ficha_ges = $('#confirmacion_diagnostica_ficha_ges').val();
            let paciente_tratamiento_ficha_ges = $('#paciente_tratamiento_ficha_ges').val();
            let nombre_ges = $('#nombre_ges').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional').val();
            let id_ficha_atencion = $('#id_fc').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let hora_medica = $('#hora_medica').val();
            let codigo_validacion_informe_ges = $('#codigo_validacion_informe_ges').val();


            {{--  if(nombre_institucion_ficha_ges == '')
            {
                $('#nombre_institucion_ficha_ges').focus();
                validar = 1;

            }
            if(direccion_institucion_ficha_ges == '')
            {
                $('#direccion_institucion_ficha_ges').focus();
                validar = 1;

            }  --}}
            {{--
            if(nombre_responsable_ficha_ges == '')
            {
                $('#nombre_responsable_ficha_ges').focus();
                validar = 1;

            }
            if(rut_responsable_ficha_ges == '')
            {
                $('#rut_responsable_ficha_ges').focus();
                validar = 1;

            }
            --}}
            if(confirmacion_diagnostica_ficha_ges == '')
            {
                $('#confirmacion_diagnostica_ficha_ges').focus();
                mensaje += ' Debe ingresar Confirmación diagnóstica GES.\n' ;
                validar = 1;

            }
            if(paciente_tratamiento_ficha_ges == '')
            {
                $('#paciente_tratamiento_ficha_ges').focus();
                mensaje += ' Debe Confimar si el paciente se encuentra en tratamiento.\n' ;
                validar = 1;

            }
            if(nombre_ges == '')
            {
                $('#nombre_ges').focus();
                mensaje += ' Debe ingresar el Diagnóstico GES.\n' ;
                validar = 1;
            }
            {{--  if(id_paciente == '')
            {
                $('#id_paciente').focus();
                validar = 1;

            }
            if(id_profesional == '')
            {
                $('#id_profesional').focus();
                validar = 1;

            }
            if(id_ficha_atencion == '')
            {
                $('#id_ficha_atencion').focus();
                validar = 1;

            }
            if(id_lugar_atencion == '')
            {
                $('#id_lugar_atencion').focus();
                validar = 1;

            }
            if(hora_medica == '')
            {
                $('#hora_medica').focus();
                validar = 1;

            }  --}}

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {

                $.ajax({
                    url: "{{ route('ficha_atencion.registrar_diagnostico_ges') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {

                        nombre_institucion_ficha_ges :nombre_institucion_ficha_ges,
                        direccion_institucion_ficha_ges :direccion_institucion_ficha_ges,
                        nombre_responsable_ficha_ges :nombre_responsable_ficha_ges,
                        rut_responsable_ficha_ges :rut_responsable_ficha_ges,
                        confirmacion_diagnostica_ficha_ges :confirmacion_diagnostica_ficha_ges,
                        paciente_tratamiento_ficha_ges :paciente_tratamiento_ficha_ges,
                        nombre_ges :nombre_ges,
                        id_paciente :id_paciente,
                        id_profesional :id_profesional,
                        id_ficha_atencion :id_ficha_atencion,
                        id_lugar_atencion :id_lugar_atencion,
                        hora_medica :hora_medica,
                        codigo_verificacion :codigo_validacion_informe_ges,

                    },
                })
                .done(function(response) {
                    console.log(response);

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha creado Diagnostico GES de forma correcta');
                        $('#mensaje').show();
                        $('#form_ges').modal('hide');


                        swal({
                            title: "Constancia GES (Artículo 24 Ley 19.966).",
                            text: 'Registro Exitoso.\n El paciente ha sido Notificado\n La constancia puede ser recuperada desde su escritorio (Documentos).',
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }

                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })

            }



        };

        function validar_codigo_ges(){
            let codigo_validacion_informe_ges = $('#codigo_validacion_informe_ges').val();
            if(codigo_validacion_informe_ges!='')
            {
                var id_ficha_atencion = $('#id_fc').val();

                var valido = 1;
                var mensaje = '';


                let url = "{{ route('cod_autorizacion.validar_codigo') }}";

                var _token = CSRF_TOKEN;
                $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        codigo:codigo_validacion_informe_ges,
                        id_control:id_ficha_atencion,
                    },
                })
                .done(function(data)
                {

                    if (data !== 'null')
                    {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        if(data.estado == 1)
                        {
                            registrar_ges_ficha();
                        }
                        else{

                            swal({
                                title: "Problema solicitar Autorizacion.",
                                text: data.msj,
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });


            }
            else
            {
                swal({
					title: "Constancia GES (Artículo 24 Ley 19.966).",
					text:"Debe ingresar Código de notificación entrago por el Paciente.",
					icon: "error",
					// buttons: "Aceptar",
					//SuccessMode: true,
				});
            }
        }

        function envio_codigo_validacion_ges()
        {
            let url = "{{ route('cod_autorizacion.agregar') }}";

            var _token = CSRF_TOKEN;
            var id_profesional = 0;
            var id_ficha_atencion = 0;

            // Autorizacion Licencia
            id_profesional = '{{ Auth::user()->id }}';
            id_ficha_atencion = $('#id_fc').val();

            var id_tipo_autorizacion_acompanante = 7;
            @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
                var rut_acompanante = $('#rut_acompanante').val();
                var nombre_acompanante = $('#nombre_acompanante').val();
                var apell_acompanante = $('#apell_acompanante').val();
                var relacion_acompanante = $('#relacion_acompanante').val();
                var tipo_medio_acompanante = $('#tipo_medio_acompanante').val();
                var tel_acompanante = $('#tel_acompanante').val();
                var email_acompanante = $('#email_acompanante').val();
            @else
                var rut_acompanante = '{{ $paciente->rut }}';
                var nombre_acompanante = '{{ $paciente->nombres }}';
                var apell_acompanante = '{{ $paciente->apellido_uno }}';
                var relacion_acompanante = '99';
                var tipo_medio_acompanante = 3;
                var tel_acompanante = '{{ $paciente->telefono_uno}}';
                var email_acompanante = '{{ $paciente->email }}';
            @endif
            var medio = '';
            if(tipo_medio_acompanante == 1)
                medio = tel_acompanante;
            else
                medio = email_acompanante;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,

                    id_tipo_autorizacion:id_tipo_autorizacion_acompanante,
                    id_profesional:id_profesional,
                    id_control:id_ficha_atencion,
                    id_tipo_medio:tipo_medio_acompanante,
                    medio:medio,
                    nombre_autoriza:nombre_acompanante,
                    apellido_autoriza:apell_acompanante,
                    rut_autoriza:rut_acompanante,
                    id_parentezco_autoriza:relacion_acompanante,
                    telefono_autoriza:tel_acompanante,
                    email_autoriza:email_acompanante,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Código Autorizacion enviado al Paciente.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                    else{

                        swal({
                            title: "Problema al Registrar Codigo de autorizacion.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }



    </script>
@endsection
