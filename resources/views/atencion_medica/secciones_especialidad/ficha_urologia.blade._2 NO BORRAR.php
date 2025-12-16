<div class="user-profile user-card mt-0 px-1"style="background-color: #ecf0f5!important;">
    <div class="row mx-0">
        <div class="col-sm-12 col-md-12">
            <ul class="nav nav-tabs-secciones mb-3 mt-3" id="uro" role="tablist">
                <li class="nav-item-secciones">
                    <a class="nav-secciones active text-uppercase" id="atencion_uro-tab" data-toggle="tab" href="#atencion_uro" role="tab" aria-controls="atencion_uro" aria-selected="true">Atención Especialidad</a>
                </li>
                <li class="nav-item-secciones">
                    <a class="nav-secciones text-uppercase" id="cisto-tab" data-toggle="tab" href="#cisto" role="tab" aria-controls="cisto" aria-selected="false">Cistoscopía</a>
                </li>
                <li class="nav-item-secciones">
                    <a class="nav-secciones text-uppercase" id="uroflujo-tab" data-toggle="tab" href="#uroflujo" role="tab" aria-controls="uroflujo" aria-selected="false">Uroflujometría</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="{{ route('fichaAtencion.registrar_ficha_uro') }}" method="POST">
                <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                <input type="hidden" name="tipo_examen_especial" id="tipo_examen_especial" value="{{ $lista_examen_especial }}">

                @php
                    /** carga de id examen de espcialidad tipo  */
                    $temp = $lista_examen_especial;

                    $array_temp = explode('|',$temp);
                    //var_dump($array_temp);
                    $array_temp2 = array();
                    foreach($array_temp as $key=>$value)
                    {
                        $array_temp2[] = explode(',',$value);
                    }
                    $array_examen_especialidad_tipo = array();
                    foreach($array_temp2 as $key=>$value)
                    {
                        $array_examen_especialidad_tipo[$value[0]] = $value[1];
                    }
                    // var_dump($array_examen_especialidad_tipo);
                @endphp

                @csrf
                <div class="tab-content" id="uro-contenido">
                    <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                    <div class="tab-pane fade show active" id="atencion_uro" role="tabpanel" aria-labelledby="atencion_uro-tab">
                        <div class="row">
                            <div class="col-md-12 mt-1 mb-2">
                                <h6 class="f-20 text-c-blue">Ficha de atención general</h6>
                            </div>
                            <!--FORMULARIOS-->
                            <!--Formulario / Menor de edad-->
                            @include('atencion_medica.generales.seccion_menor')
                            <!--Cierre: Formulario / Menor de edad-->
                            <!--Motivo consulta-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header-a" id="motivo">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                            Motivo de la consulta
                                        </button>
                                    </div>
                                    <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                        <div class="card-body-aten-a shadow-none">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label-activo-sm">Motivo de Consulta</label>
                                                    <input type="text" class="form-control form-control-sm" name="descripcion_consulta_uro" id="descripcion_consulta_uro">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                    <!-- visualizar antecedentes actuales -->
                                                    <input type="text" class="form-control form-control-sm" name="antec_especialidad_uro" id="antec_especialidad_uro" readonly="readonly">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label class="floating-label-activo-sm">Agregar antecedentes nuevo</label>
                                                            <select class="form-control form-control-sm" name="tipo_antecedente" id="tipo_antecedente" onchange="carga_campos_antecedente_nuevo();">
                                                                <option value="">Selecciones</option>
                                                                <option value="alergia">Alergia Medicamento</option>
                                                                <option value="enfermedades_cronicas">Enfermedad Crónica</option>
                                                                <option value="anestesias">Incidente Anestesia</option>
                                                                <option value="cirugia">Incidente Cirugia</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 m-t-10" style="display:none" id="div_campos_antecedente_nuevo">
                                                            <!-- campos antecedentes nuevos -->
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
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                            Examen especialidad Urología
                                        </button>
                                    </div>
                                    <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                        <div class="card-body-aten-a shadow-none">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_ex_especialidad_uro" onchange="cargar_info_ficha_tipo_uro('select_ficha_tipo_ex_especialidad_uro','descripcion_ficha_tipo_ex_especialidad_uro');">
                                                            <option value="">Seleccione</option>
                                                            @if(!empty($fichaTipo['uro']))
                                                                @foreach ($fichaTipo['uro'] as $ft )
                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <span id="descripcion_ficha_tipo_ex_especialidad_uro"></span>
                                                </div>
                                            </div>
                                            <div id="form-uro">
                                                <!-- A. Costovertebral -->
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6>A. Costovertebral</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Examen Lado derecho</label>
                                                            <select name="costo_vert_ld" id="costo_vert_ld" data-titulo="Examen Lado derecho" data-seccion="Ángulo costovertebral" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('costo_vert_ld','div_detalle_costo_vert_ld','obs_costo_vert_ld',2)">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_detalle_costo_vert_ld" style="display:none">
                                                            <label class="floating-label-activo-sm">Examen Lado derecho</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Examen Lado derecho" data-seccion="Ángulo costovertebral" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_costo_vert_ld" id="obs_costo_vert_ld"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Examen Lado izquierdo</label>
                                                            <select name="costo_vert_li" id="costo_vert_li" data-titulo="Examen Lado izquierdo" data-seccion="Ángulo costovertebral" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('costo_vert_li','div_costo_vert_li','obs_costo_vert_li',2)">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_costo_vert_li" style="display:none">
                                                            <label class="floating-label-activo-sm">Examen Lado izquierdo</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Examen Lado izquierdo" data-seccion="Ángulo costovertebral" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_costo_vert_li" id="obs_costo_vert_li"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Abdomen -->
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6>Abdomen</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Examen Abdominal</label>
                                                            <select name="examen_abd" data-titulo="Examen Abdominal" id="examen_abd" data-seccion="Abdomen" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_abd','div_obs_examen_abd','obs_examen_abd',2);">
                                                                <option  selected value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                                <option value="3">No Realizada</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group" id="div_obs_examen_abd" style="display:none;">
                                                            <label class="floating-label-activo-sm"> Observaciones Examen Abdominal</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Examen Abdominal" data-seccion="Abdomen" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_abd" id="obs_examen_abd"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!--Tacto Rectal Prostata-->
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6>Tacto Rectal Prostata</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tacto Rectal</label>
                                                            <select name="tacto_rec" id="tacto_rec" data-titulo="Tacto Rectal" data-seccion="Tacto Rectal Prostata" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tacto_rec','div_detalle_tacto_rec','obs_tacto_rec',2)">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_detalle_tacto_rec" style="display:none">
                                                            <label class="floating-label-activo-sm">Tacto Rectal</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Tacto Rectal" data-seccion="Tacto Rectal Prostata" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tacto_rec" id="obs_tacto_rec"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Antigeno Prostático</label>
                                                            <select name="antigeno_prost" id="antigeno_prost" data-titulo="Antigeno Prostático" data-seccion="Tacto Rectal Prostata" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('antigeno_prost','div_antigeno_prost','obs_antigeno_prost',2)">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_antigeno_prost" style="display:none">
                                                            <label class="floating-label-activo-sm">Antigeno Prostático</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Antigeno Prostático" data-seccion="Tacto Rectal Prostata" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_antigeno_prost" id="obs_antigeno_prost"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="hidden" id="biopsia_" name="biopsia_" value="0">
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" onchange="biopsia('');cambio_select_biopsia('','biopsia_uro','biopsia_uro','div_biopsia_uro','obs_biopsia_uro',2);" id="biopsia_check_" name="biopsia_check_" value="">
                                                                <label for="biopsia_check_" class="cr"></label>
                                                            </div>
                                                            <label>Biópsia</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Biópsia</label>
                                                            <select name="biopsia_uro" id="biopsia_uro" data-titulo="Biópsia Uro" data-seccion="Tacto Rectal Prostata" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('biopsia_uro','div_biopsia_uro','obs_biopsia_uro',2)" disabled="disabled">
                                                                <option value="0" selected="selected">No Solicitada</option>
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_biopsia_uro" style="display:none">
                                                            <label class="floating-label-activo-sm">Biópsia</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Biópsia Uro" data-seccion="Tacto Rectal Prostata" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biopsia_uro" id="obs_biopsia_uro"></textarea>
                                                        </div>
                                                    </div>


                                                </div>
                                                <hr>
												<!--Ingle-->
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6>Ingle</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Examen de la Ingle</label>
                                                            <select name="ingle" id="ingle" data-titulo="Examen de la Ingle" data-seccion="Ingle" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ingle','div_detalle_ingle','obs_detalle_ingle',2)">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                                <option value="3">No Examinada</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group" id="div_detalle_ingle" style="display:none">
                                                            <label class="floating-label-activo-sm">Observaciones Ingle</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="obs. Examen de la Ingle" data-seccion="Examen_ingle" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_detalle_ingle" id="obs_detalle_ingle"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Funcionalidad -->
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6> Funcionalidad</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Habitos Miccionales</label>
                                                            <select name="habitos_micionales" id="habitos_micionales" class="form-control form-control-sm" data-titulo="Habitos Miccionales" data-seccion="Funcionalidad" onchange="evaluar_para_carga_detalle('habitos_micionales','div_detalle_habitos_micionales','obs_habitos_micionales',2)">
                                                                <option value="1">Normales</option>
                                                                <option value="2">Anormales</option>
                                                                <option value="3">No Informado</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_detalle_habitos_micionales" style="display:none">
                                                            <label class="floating-label-activo-sm">Observaciones Uretra</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs. Habitos Miccionales" data-seccion="Funcionalidad" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_habitos_micionales" id="obs_habitos_micionales"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Función Pene</label>
                                                            <select name="funcion_pene" id="funcion_pene" data-titulo="Función Pene" data-seccion="Funcionalidad" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('funcion_pene','div_detalle_funcion_pene','obs_funcion_pene',2);">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                                <option value="3">No Informado</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_detalle_funcion_pene" style="display:none">
                                                            <label class="floating-label-activo-sm">Observaciónes Func Pene</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Observaciónes Func Pene" data-seccion="Funcionalidad" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_funcion_pene" id="obs_funcion_pene"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Otros sintomas_funcionales</label>
                                                            <select name="sintomas_funcionales" id="sintomas_funcionales" data-titulo="Otros sintomas_funcionales" data-seccion="Funcionalidad" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sintomas_funcionales','div_detalle_sintomas_funcionales','obs_sintomas_funcionales',2);">
                                                                <option value="1">No</option>
                                                                <option value="2">Si</option>
                                                                <option value="3">No Examinados</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_detalle_sintomas_funcionales" style="display:none">
                                                            <label class="floating-label-activo-sm">Observaciónes sintomas funcionales</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Otros sintomas_funcionales" data-seccion="Funcionalidad" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sintomas_funcionales" id="obs_sintomas_funcionales"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Genitales Masculinos -->
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6> Genitales Masculinos</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Uretra</label>
                                                            <select name="uretra_masc" id="uretra_masc" class="form-control form-control-sm" data-titulo="Uretra" data-seccion="Genitales_Masculinos" onchange="evaluar_para_carga_detalle('uretra_masc','div_detalle_uretra_masc','obs_detalle_uretra_masc',2)">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                                <option value="3">No Examinada</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_detalle_uretra_masc" style="display:none">
                                                            <label class="floating-label-activo-sm">Observaciones Uretra</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs. Uretra Masc" data-seccion="Genitales_Masculinos" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_detalle_uretra_masc" id="obs_detalle_uretra_masc"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Pene</label>
                                                            <select name="examen_pene" id="examen_pene" data-titulo="Pene" data-seccion="Genitales_Masculinos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_pene','div_detalle_examen_pene','obs_pene_anormal',2);">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                                <option value="3">No Examinado</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_detalle_examen_pene" style="display:none">
                                                            <label class="floating-label-activo-sm">Observaciónes Pene</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Pene" data-seccion="Genitales_Masculinos" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pene_anormal" id="obs_pene_anormal"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Testículos</label>
                                                            <select name="examen_test" id="examen_test" data-titulo="Testículos" data-seccion="Genitales_Masculinos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_test','div_detalle_examen_test','obs_test_anormal',2);">
                                                                <option value="1">Normales</option>
                                                                <option value="2">Anormales</option>
                                                                <option value="3">No Examinados</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_detalle_examen_test" style="display:none">
                                                            <label class="floating-label-activo-sm">Observaciónes Testículos</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Testículos" data-seccion="Genitales_Masculinos" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_test_anormal" id="obs_test_anormal"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Genitales Femeninos -->
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6> Genitales Femeninos</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Vulva y Glandulas_anexas</label>
                                                            <select name="vulva" id="vulva" class="form-control form-control-sm" data-titulo="Vulva y Glandulas_anexas" data-seccion="Genitales Femeninos" onchange="evaluar_para_carga_detalle('vulva','div_vulva','det_vulva',2)">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                                <option value="3">No Examinada</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_vulva" style="display:none">
                                                            <label class="floating-label-activo-sm">Observaciones Vulva y Glandulas_anexas</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs. Observaciones Vulva y Glandulas_anexas" data-seccion="Genitales Femeninos" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_det_vulva" id="obs_det_vulva"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Vagina</label>
                                                            <select name="vagina" id="vagina" class="form-control form-control-sm" data-titulo="Vagina" data-seccion="Genitales Femeninos" onchange="evaluar_para_carga_detalle('vagina','div_vagina','det_vagina',2)">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                                <option value="3">No Examinada</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_vagina" style="display:none">
                                                            <label class="floating-label-activo-sm">Observaciones Vagina</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs. Observaciones Vagina" data-seccion="Genitales Femeninos" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_det_vagina" id="obs_det_vagina"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Uretra</label>
                                                            <select name="uretra_fem" id="uretra_fem" class="form-control form-control-sm" data-titulo="Uretra" data-seccion="Genitales Femeninos" onchange="evaluar_para_carga_detalle('uretra_fem','div_detalle_uretra_fem','obs_det_vagina',2)">
                                                                <option value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                                <option value="3">No Examinada</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12" id="div_detalle_uretra_fem" style="display:none">
                                                            <label class="floating-label-activo-sm">Observaciones Uretra</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs. Observaciones Uretra" data-seccion="Genitales Femeninos" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_det_vagina" id="obs_det_vagina"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <hr>
                                                <!-- Hormonas -->
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6>Hormonas</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Estudio Hormonal</label>
                                                            <select name="examen_horm" data-titulo="Estudio Hormonal" id="examen_horm" data-seccion="Hormonas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_horm','div_examen_horm','obs_examen_horm',2);">
                                                                <option  selected value="1">Normal</option>
                                                                <option value="2">Anormal</option>
                                                                <option value="3">No Realizada</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group" id="div_examen_horm" style="display:none;">
                                                            <label class="floating-label-activo-sm"> Observaciones Estudio Hormonal</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Estudio Hormonal" data-seccion="Hormonas" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_horm" id="obs_examen_horm"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-9" style="margin-bottom: 0;">
                                                        <label class="floating-label-activo-sm">Resumen Examen Especialidad</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Resumen Examen Especialidad" data-seccion="Resumen Examen Especialidad_uro" data-tipo="general" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="bs_ex_uro" id="obs_ex_uro"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3 align-middle" style="margin:auto">
                                                        <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo('form-uro','registro_f_t_uro_detalle','uro');"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Ficha Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Formulario / Signos vitales y otros-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="signosvit-otros">
                                        <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#signosvit-otros-c" aria-expanded="false" aria-controls="signosvit-otros-c">
                                            Signos vitales y otros
                                        </button>
                                    </div>
                                    <div id="signosvit-otros-c" class="collapse" aria-labelledby="signosvit-otros" data-parent="#signosvit-otros">
                                        <div class="card-body-aten-a shadow-none">
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
                            <!--ENFERMO CRÓNICO O GES-->
                            @include('atencion_medica.generales.seccion_cronicos_ges_confidencial')
                            <!--Diagnóstico-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="diagnostico">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                            Diagnóstico
                                        </button>
                                    </div>
                                    <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                        <div class="card-body-aten-a shadow-none">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" data-input_igual="lic_descripcion_hipotesis,sospecha_diagnostica_cisto" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" ></textarea>

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Indicaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="ind_uro" id="ind_uro">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                    <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="descripcion_cie" id="descripcion_cie" value="" onchange="cargarIgual('descripcion_cie')">
                                                    <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="" onchange="cargarIgual('id_descripcion_cie')">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  div de botones  --}}
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-body">
                                <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                @include('atencion_medica.generales.seccion_receta_examen_comunes')
                                <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                                <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->
                                {{--  @include('atencion_medica.secciones_especialidad.seccion_receta_examen_esp_orl')  --}}
                                <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD FIN  -->
                                    </div>
                                </div>

                                <!--GUARDAR O IMPRIMIR FICHA-->
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                        <input type="submit" class="btn btn-purple mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->

                    <!-- CISTOSCOPÍA-->
					<div class="tab-pane fade" id="cisto" role="tabpanel" aria-labelledby="cisto-tab">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="row">
								<div class="col-md-12 mt-3 mb-0">
									<h6 class="f-20 text-c-blue">Citoscopía</h6>
								</div>
							</div>
							<div class="row div_form_examen_cisto">
                                <input type="hidden" class="form-control" name="id_examen_especialidad_tipo_cisto" id="id_examen_especialidad_tipo_cisto" value="{{ $array_examen_especialidad_tipo['cisto'] }}">
								{!! $examen['cisto'] !!}
							</div>
                            <!--GUARDAR EXAMEN-->
                            <div class="row">
                                <div class="col-md-12 text-center mb-3">
                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Examen e ir a su Agenda">
                                    <bottom type="bottom" class="btn btn-success mt-1" onclick="visualizar_pdf_examen('cisto');">Ver Examen PDF</bottom>
                                </div>
                            </div>
						</div>
					</div>
					<!--CIERRE: CISTOSCOPÍA-->

					<!--UROFLUJO-->
					<div class="tab-pane fade" id="uroflujo" role="tabpanel" aria-labelledby="uroflujo-tab">
						<div class="row bg-white shadow-none rounded mx-1">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12 mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Uroflujometría</h6>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row div_form_examen_uro_flujo">
                                    <input type="hidden" class="form-control" name="id_examen_especialidad_tipo_uro_flujo" id="id_examen_especialidad_tipo_uro_flujo" value="{{ $array_examen_especialidad_tipo['uro_flujo'] }}">
                                    {!! $examen['uro_flujo'] !!}
                                </div>
                                <!--GUARDAR EXAMEN-->
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3">
                                        <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Examen e ir a su Agenda">
                                        <bottom type="bottom" class="btn btn-success mt-1" onclick="visualizar_pdf_examen('uro_flujo');">Ver examen PDF</bottom>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
					<!--CIERRE:UROFLUJO-->

                </div>
            </form>
        </div>
    </div>

</div>
<!--MODALES modal_enfermedades_cronicas-->
@include('atencion_medica.formularios.modal_atencion_general.modal_enfermedades_cronicas')

<!-- MODAL DE BIOPSIA -->
@include("atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_biopsia_cirugia")

@section('page-script-ficha-atencion')
    <script>

        $(document).ready(function() {

            {{--  mensaje de exito al registrar ficha clinica  --}}
             @if(session('mensaje'))
                swal({
                    title: "Registro de Ficha Clínica.",
                    text:"{{ session('mensaje') }}",
                    icon: "info",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif
            {{--  mensaje de exito al registrar ficha clinica  --}}
            @if(session('success'))
                swal({
                    title: "Registro de Ficha Clínica.",
                    text:"{{ session('success') }}",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif

			{{--  mensaje de erro al registrar ficha clinica  --}}
			@if(session('error'))
				swal({
					title: "Registro de Ficha Clínica.",
					text:"{{ session('error') }}",
					icon: "error",
					// buttons: "Aceptar",
					//SuccessMode: true,
				});
			@endif

			{{--  mensaje de warning al registrar ficha clinica  --}}
			@if(session('warning'))
				swal({
					title: "Registro de Ficha Clínica.",
					text:"{{ session('warning') }}",
					icon: "warning",
					// buttons: "Aceptar",
					//SuccessMode: true,
				});
			@endif

            /* formatear rut */
            $("#solicitado_por_rut_cisto").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
            $("#solicitado_por_rut_uroflujo").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            $('#descripcion_hipotesis').keyup(function(){
                if($.trim(this.value) != ''){
                    $('.btn_agregar_medicamento').removeAttr("disabled");
                    $('.btn_medicamento_pdf').removeAttr("disabled");
                    $('.btn_agregar_examen').removeAttr("disabled");
                    $('.btn_examenes_pdf').removeAttr("disabled");
                }
                else
                {
                    $('.btn_agregar_medicamento').attr('disabled','disabled');
                    $('.btn_medicamento_pdf').attr('disabled','disabled');
                    $('.btn_agregar_examen').attr('disabled','disabled');
                    $('.btn_examenes_pdf').attr('disabled','disabled');
                }
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
        var myDropzone_cisto ;
        Dropzone.options.misImagenesCisto = {
            init:function()
            {
                myDropzone_cisto = this;
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
            maxFiles: 6,
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
                cargar_lista_imagenes(myDropzone_cisto,'cisto');

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
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                cargar_lista_imagenes(myDropzone_cisto,'cisto');
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzone_cisto,'cisto');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzone_uro_flujo ;
        Dropzone.options.misImagenesUroFlujo = {
            init:function()
            {
                myDropzone_uro_flujo = this;
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
            maxFiles: 2,
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
                cargar_lista_imagenes(myDropzone_uro_flujo, 'uro_flujo');

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
                console.log('-------------removedfile-----------------------');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                cargar_lista_imagenes(myDropzone_uro_flujo, 'uro_flujo');
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzone_uro_flujo, 'uro_flujo');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };


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
        /** CIERRE MANEJO DE IMAGENES */


        function cargar_profesional(rut, input_nombre_completo, input_id, div_solicitar, input_nombre, input_apellido, input_tel, input_email, div_mensaje, text_mensaje)
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
                            $('#'+input_nombre_completo).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#'.div_mensaje).hide();
                            $('#'+text_mensaje).html(mensaje);
                            $('#'+input_nombre).val('');
                            $('#'+input_apellido).val('');
                            $('#'+input_tel).val('');
                            $('#'+input_email).val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre_completo).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#'.div_mensaje).show();
                            $('#'+text_mensaje).html(mensaje);
                            $('#'.input_nombre).val('');
                            $('#'.input_apellido).val('');
                            $('#'.input_tel).val('');
                            $('#'.input_email).val('');
                            // $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#'.div_mensaje).show();
                        $('#'+text_mensaje).html(mensaje);
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


            // let url = "{{ route('profesional.agregar_alergia_paciente') }}";

            // $.ajax({
            //     url: url,
            //     type: 'POST',
            //     dataType: 'json',
            //     data: {
            //         _token: CSRF_TOKEN,
            //         alergia: alergia,
            //         id_alergia: id_alergia,
            //         comentario: comentario,
            //         paciente: paciente
            //     },
            // })
            // .done(function(response) {

            //     if (response.success) {
            //         swal({
            //             title: "Alergia agregada correctamente",
            //             icon: "success",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         });

            //         $('#alergia_paciente').val('');
            //         $('#id_alergia_paciente').val('');

            //     }
            //     else
            //     {
            //         swal({
            //             title: "Error al agregar alergia",
            //             icon: "error",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         })
            //     }

            //     return response;
            // })
            // .fail(function() {
            //     console.log("error");
            // });

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

        function cargarCompletar(input)
        {
            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            let seccion = $('#'+input).attr('data-input_seccion');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                var valor_prev = equivalente.val();
                equivalente.val(valor_prev + ' - ' + seccion + ': ' + actual.val());
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

        function abrir_modal_guardar_tipo(div_id_data, div_id_detalle,tipo)
        {
            $("#btn_modal_registrar_ficha_tipo_uro").unbind();

            if(tipo == 'uro')
            {
                $('#btn_modal_registrar_ficha_tipo_uro').click(function(){
                    guardar_tipo_ficha_uro();
                });
            }
            $('#modal_registrar_ficha_tipo_uro').modal('show');

            cargarSeccion(div_id_detalle,div_id_data);
        }

        function cargarSeccion(div_destino, div_data)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            $('#'+div_data).find('select,textarea,input').each(function(key, elemento){
                html ='';
                html +='<div class="row" style="margin-top:10px;">';
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-4">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                }
                else if($(elemento).prop('nodeName') == 'TEXTAREA')
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
                html +='</div>';
                $('#'+div_destino).append(html);
            });
        }

        function cambiar_div(mostrar, ocultar, label, textarea)
        {
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }

        function guardar_tipo_ficha_uro()
        {
            var registro_f_t_uro_nombre = $('#registro_f_t_uro_nombre').val();
            var registro_f_t_uro_descripcion = $('#registro_f_t_uro_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_uro_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_uro_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_uro_nombre = registro_f_t_uro_nombre;
            data.registro_f_t_uro_descripcion = registro_f_t_uro_descripcion;

            $('#registro_f_t_uro_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_uro') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    nombre : data.registro_f_t_uro_nombre,
                    descripcion : data.registro_f_t_uro_descripcion,
                    costo_vert_ld : data.modal_agregar_tipo_costo_vert_ld,
                    obs_costo_vert_ld : data.observaciones_obs_costo_vert_ld,
                    costo_vert_li : data.modal_agregar_tipo_costo_vert_li,
                    obs_costo_vert_li : data.observaciones_obs_costo_vert_li,
                    examen_abd : data.modal_agregar_tipo_examen_abd,
                    obs_examen_abd : data.observaciones_obs_examen_abd,
                    tacto_rec : data.modal_agregar_tipo_tacto_rec,
                    obs_tacto_rec : data.observaciones_obs_tacto_rec,
                    antigeno_prost : data.modal_agregar_tipo_antigeno_prost,
                    obs_antigeno_prost : data.observaciones_obs_antigeno_prost,
                    biopsia_uro : data.modal_agregar_tipo_biopsia_uro,
                    obs_biopsia_uro : data.observaciones_obs_biopsia_uro,
                    ingle : data.modal_agregar_tipo_ingle,
                    obs_detalle_ingle : data.observaciones_obs_detalle_ingle,
                    habitos_micionales : data.modal_agregar_tipo_habitos_micionales,
                    obs_habitos_micionales : data.observaciones_obs_habitos_micionales,
                    funcion_pene : data.modal_agregar_tipo_funcion_pene,
                    obs_funcion_pene : data.observaciones_obs_funcion_pene,
                    sintomas_funcionales : data.modal_agregar_tipo_sintomas_funcionales,
                    obs_sintomas_funcionales : data.observaciones_obs_sintomas_funcionales,
                    uretra_masc : data.modal_agregar_tipo_uretra_masc,
                    obs_detalle_uretra_masc : data.observaciones_obs_detalle_uretra_masc,
                    examen_pene : data.modal_agregar_tipo_examen_pene,
                    obs_pene_anormal : data.observaciones_obs_pene_anormal,
                    examen_test : data.modal_agregar_tipo_examen_test,
                    obs_test_anormal : data.observaciones_obs_test_anormal,
                    vulva : data.modal_agregar_tipo_vulva,
                    obs_det_vulva : data.observaciones_obs_det_vulva,
                    vagina : data.modal_agregar_tipo_vagina,
                    obs_det_vagina : data.observaciones_obs_det_vagina,
                    examen_horm : data.modal_agregar_tipo_examen_horm,
                    obs_examen_horm : data.observaciones_obs_examen_horm,
                    obs_ex_uro : data.observaciones_obs_ex_uro,


                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_uro').modal('hide');
                    swal({
                        title: "Tipo Ficha Registrado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
                else{

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

        function cargar_info_ficha_tipo_uro(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-uro').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });


                if($('#biopsia_uro').val() == 0)
                {
                    // Uncheck
                    $("#biopsia_check_").prop("checked", false);
                    $('#biopsia_uro').attr('disabled','disabled').val(0);
                }
                else
                {
                    // Check
                    $("#biopsia_check_").prop("checked", true);
                    $('#biopsia_uro').attr('disabled',false).val(1);
                }


                evaluar_para_carga_detalle('costo_vert_ld','div_detalle_costo_vert_ld','obs_costo_vert_ld',2);
                evaluar_para_carga_detalle('costo_vert_li','div_costo_vert_li','obs_costo_vert_li',2);
                evaluar_para_carga_detalle('examen_abd','div_obs_examen_abd','obs_examen_abd',2);
                evaluar_para_carga_detalle('tacto_rec','div_detalle_tacto_rec','obs_tacto_rec',2);
                evaluar_para_carga_detalle('antigeno_prost','div_antigeno_prost','obs_antigeno_prost',2);
                evaluar_para_carga_detalle('biopsia_uro','div_biopsia_uro','obs_biopsia_uro',2);
                evaluar_para_carga_detalle('ingle','div_detalle_ingle','obs_detalle_ingle',2);
                evaluar_para_carga_detalle('habitos_micionales','div_detalle_habitos_micionales','obs_habitos_micionales',2);
                evaluar_para_carga_detalle('funcion_pene','div_detalle_funcion_pene','obs_funcion_pene',2);
                evaluar_para_carga_detalle('sintomas_funcionales','div_detalle_sintomas_funcionales','obs_sintomas_funcionales',2);
                evaluar_para_carga_detalle('uretra_masc','div_detalle_uretra_masc','obs_detalle_uretra_masc',2);
                evaluar_para_carga_detalle('examen_pene','div_detalle_examen_pene','obs_pene_anormal',2);
                evaluar_para_carga_detalle('examen_test','div_detalle_examen_test','obs_test_anormal',2);
                evaluar_para_carga_detalle('vulva','div_vulva','det_vulva',2);
                evaluar_para_carga_detalle('vagina','div_vagina','det_vagina',2);
                evaluar_para_carga_detalle('uretra_fem','div_detalle_uretra_fem','obs_det_vagina',2);
                evaluar_para_carga_detalle('examen_horm','div_examen_horm','obs_examen_horm',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_uro') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        $('#'+index).val(value);
                        if(index == 'biopsia_uro')
                        {
                            if($('#biopsia_uro').val() == 0)
                            {
                                // Uncheck
                                $("#biopsia_check_").prop("checked", false);
                                $('#biopsia_uro').attr('disabled','disabled').val(0);
                            }
                            else
                            {
                                // Check
                                $("#biopsia_check_").prop("checked", true);
                                $('#biopsia_uro').attr('disabled',false).val(1);
                            }
                        }
                    });

                    evaluar_para_carga_detalle('costo_vert_ld','div_detalle_costo_vert_ld','obs_costo_vert_ld',2);
                    evaluar_para_carga_detalle('costo_vert_li','div_costo_vert_li','obs_costo_vert_li',2);
                    evaluar_para_carga_detalle('examen_abd','div_obs_examen_abd','obs_examen_abd',2);
                    evaluar_para_carga_detalle('tacto_rec','div_detalle_tacto_rec','obs_tacto_rec',2);
                    evaluar_para_carga_detalle('antigeno_prost','div_antigeno_prost','obs_antigeno_prost',2);
                    evaluar_para_carga_detalle('biopsia_uro','div_biopsia_uro','obs_biopsia_uro',2);
                    evaluar_para_carga_detalle('ingle','div_detalle_ingle','obs_detalle_ingle',2);
                    evaluar_para_carga_detalle('habitos_micionales','div_detalle_habitos_micionales','obs_habitos_micionales',2);
                    evaluar_para_carga_detalle('funcion_pene','div_detalle_funcion_pene','obs_funcion_pene',2);
                    evaluar_para_carga_detalle('sintomas_funcionales','div_detalle_sintomas_funcionales','obs_sintomas_funcionales',2);
                    evaluar_para_carga_detalle('uretra_masc','div_detalle_uretra_masc','obs_detalle_uretra_masc',2);
                    evaluar_para_carga_detalle('examen_pene','div_detalle_examen_pene','obs_pene_anormal',2);
                    evaluar_para_carga_detalle('examen_test','div_detalle_examen_test','obs_test_anormal',2);
                    evaluar_para_carga_detalle('vulva','div_vulva','det_vulva',2);
                    evaluar_para_carga_detalle('vagina','div_vagina','det_vagina',2);
                    evaluar_para_carga_detalle('uretra_fem','div_detalle_uretra_fem','obs_det_vagina',2);
                    evaluar_para_carga_detalle('examen_horm','div_examen_horm','obs_examen_horm',2);

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

        function agregar_medicamentos_ficha() {


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



        /** CRONICO */
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
                        location.reload();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };

        function agregar_medicamento_cronico()
        {

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
            let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


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

            let url = "{{ route('medicamento_cronico.registrar') }}";


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

            let url = "{{ route('medicamento_cronico.getRegsitros') }}";


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
            let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


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

            let url = "{{ route('hipertension.getHipertension') }}";


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
        /** FIN CRONICO */

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

        /** PERVISUALIZACION DE EXAMEN */
        function visualizar_pdf_examen(tipo_examen)
        {
            if(tipo_examen!='')
            {
                var array_datos = {};
                $('.div_form_examen_'+tipo_examen).find('input,textarea,select').each(function (key, element){
                    var key_temp = element.id.replace('_'+tipo_examen,'');

                    if(key_temp == 'biopsia')
                    {
                        if(element.value == 1)
                        {
                            array_datos[key_temp] = 'SI';
                        }
                        else
                        {
                            array_datos[key_temp] = 'NO';
                        }
                    }
                    else
                    {
                        array_datos[key_temp] = element.value;
                    }
                });

                var imagenes = $('#input_lista_imagenes').val();
                if(imagenes != '')
                {
                    imagenes = JSON.parse(imagenes);
                    imagenes = JSON.stringify(JSON.stringify(imagenes[tipo_examen]));
                    console.log(imagenes );
                }

                var data ='id_ficha='+$('#id_fc').val()+'&contenido='+JSON.stringify(array_datos)+'&imagenes='+imagenes;
                Fancybox.show(
                    [
                        {
                        src: '{{ route("pdf.visualizar.examen") }}?'+data,
                        type: "iframe",
                        preload: false,
                        },
                    ]
                );
            }
            else
            {
                console.log('tipo examen no especificado');
            }
        }
    </script>
@endsection


