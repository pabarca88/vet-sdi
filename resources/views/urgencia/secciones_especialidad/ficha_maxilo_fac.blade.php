<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">

            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="mf" role="tablist">
                   <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_dental_mf_tab" data-toggle="tab" href="#atencion_dental_mf" role="tab" aria-controls="atencion_dental_mf" aria-selected="true">Atención dental Maxilo-facial</a>
                    </li>

                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="est_rx-tab" data-toggle="tab" href="#est_rx" role="tab" aria-controls="est_rx" aria-selected="false">Estudio Radiológico</a>
                    </li>

                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="analisis_mf_tab" data-toggle="tab" href="#analisis_mf" role="tab" aria-controls="analisis_mf" aria-selected="false">Análisis De Modelos</a>
                    </li>

                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="evaluacion_general_tab" data-toggle="tab" href="#evaluacion_general" role="tab" aria-controls="evaluacion_general" aria-selected="false">Evaluación general</a>
                    </li>

                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="prueba_tab" data-toggle="tab" href="#prueba" role="tab" aria-controls="prueba" aria-selected="false">prueba</a>
                    </li>

                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tratamiento_orto-tab" data-toggle="tab" href="#tratamiento_orto" role="tab" aria-controls="tratamiento_orto" aria-selected="false">Controles</a>
                    </li>
                </ul>

            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('dental.registrar_ficha_atencion_dental') }}" method="POST">
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
                    @csrf
                    <div class="tab-content" id="od_mf_contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_dental_mf" role="tabpanel" aria-labelledby="atencion_dental_mf_tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                            <h6 class="f-18 text-c-blue mb-3">Ficha de atención general</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--FORMULARIOS-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                <!--Formulario / Menor de edad-->
                                @include('general.secciones_ficha.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                            </div>

                            <!--Motivo consulta-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="motivo">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                            Motivo de la consulta
                                        </button>
                                    </div>
                                    <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                        <div class="card-body-aten-a shadow-none">
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                    <input type="text" class="form-control form-control-sm" name="descripcion_consulta_orl" id="descripcion_consulta_orl">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Antecedentes Especialidad1</label>
                                                    <input type="text" class="form-control form-control-sm" name="antec_especialidado" id="antec_especialidad">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label class="floating-label-activo-sm">Agregar Antecedentes Nuevo</label>
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

                            <!--EXAMEN ODONT GENERAL - PARAMETROS DE CONTROL-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_esp">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                            Examen Odontológico General
                                        </button>
                                    </div>
                                    <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                        <div class="card-body-aten-a shadow-none">
                                            <div id="form-endo-adulto">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="examen_general_tab" data-toggle="tab" href="#examen_general" role="tab" aria-controls="examen_general" aria-selected="true">Dolor</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="ex_oral-tab" data-toggle="tab" href="#ex_oral" role="tab" aria-controls="ex_oral" aria-selected="true">Examen Oral</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="endo_pieza-tab" data-toggle="tab" href="#endo_pieza" role="tab" aria-controls="orl_flaringe" aria-selected="true">Examen Por Pieza</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="plan_endo-tab" data-toggle="tab" href="#plan_endo" role="tab" aria-controls="cuello" aria-selected="true">Planificación de tratamiento</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="hosp_endodoncia-tab" data-toggle="tab" href="#hosp_endodoncia" role="tab" aria-control="hosp_endodoncia" aria-selected="false">Hospitalización</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="endo_adulto">
                                                            <!--DOLOR-->
                                                            <div class="tab-pane fade show active" id="examen_general" role="tabpanel" aria-labelledby="examen_general_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label">Derivado por:</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label">Zona de Dolor</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label">Historia Anterior</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="" id=""></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="contenedor_pieza_dental_endodolor">
                                                                                    <div id="pieza_dental_dolor" class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Tipo de Dolor</label>
                                                                                                        <select name="tipo_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="tipo_dolor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_dolor','div_tipo_dolor','obs_tipo_dolor',3);">
                                                                                                            <option selected  value="1">Espontáneo</option>
                                                                                                            <option value="2">Provocado</option>
                                                                                                            <option value="3">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tipo_dolor" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Tipo de dolor</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor" id="obs_tipo_dolor"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Intensidad</label>
                                                                                                        <select name="intensidad" data-titulo="Ex_cuello" data-seccion="Cuello"  id="intensidad" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad','div_intensidad','obs_intensidad',4);">
                                                                                                            <option selected  value="1">Leve</option>
                                                                                                            <option value="2">Moderado</option>
                                                                                                            <option value="3">Intenso</option>
                                                                                                            <option value="4">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_intensidad" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Intensidad</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad" id="obs_intensidad"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Modo dolor</label>
                                                                                                        <select name="modo_dolor" data-titulo="Ex_cuello" data-seccion="Cuello"  id="modo_dolor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor','div_modo_dolor','obs_modo_dolor',3);">
                                                                                                            <option selected  value="1">Pulsátil</option>
                                                                                                            <option value="2">Permanente</option>
                                                                                                            <option value="3">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_modo_dolor" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Modo dolor</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor" id="obs_modo_dolor"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Localización</label>
                                                                                                        <select name="loc_dolor" data-titulo="Ex_cuello" data-seccion="Cuello"  id="loc_dolor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor','div_loc_dolor','obs_loc_dolor',3);">
                                                                                                            <option selected  value="1">Localizado</option>
                                                                                                            <option value="2">Referido</option>
                                                                                                            <option value="3">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_loc_dolor" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Localización</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor" id="obs_loc_dolor"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                                                        <select name="provocacion_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor','div_provocacion_dolor','obs_provocacion_dolor',5);">
                                                                                                            <option selected  value="1">Frío</option>
                                                                                                            <option value="2">Calor</option>
                                                                                                            <option value="3">Actividad</option>
                                                                                                            <option value="4">Masticación</option>
                                                                                                            <option value="5">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_provocacion_dolor" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor" id="obs_provocacion_dolor"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Cuando duele</label>
                                                                                                        <select name="cdo_duele" data-titulo="Ex_cuello" data-seccion="Cuello"  id="cdo_duele" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cdo_duele','div_cdo_duele','obs_cdo_duele',3);">
                                                                                                            <option selected  value="1">Palpación</option>
                                                                                                            <option value="2">Decubito</option>
                                                                                                            <option value="3">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_cdo_duele" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Cuando duele</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cdo_duele" id="obs_cdo_duele"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Tpo Evolución</label>
                                                                                                        <select name="tpo_evolucion" data-titulo="Ex_cuello" data-seccion="Cuello"  id="tpo_evolucion" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_evolucion','div_tpo_evolucion','obs_tpo_evolucion',3);">
                                                                                                            <option selected  value="1">Menos de 1 Semana</option>
                                                                                                            <option value="2">Más de 1 Semana</option>
                                                                                                            <option value="3">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tpo_evolucion" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Tpo Evolución</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_evolucionr" id="obs_tpo_evolucion"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Efecto Analgésicos</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor" id="obs_loc_dolor"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza1" ><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--EXAMEN  ORAL-->
                                                            <div class="tab-pane fade show" id="ex_oral" role="tabpanel" aria-labelledby="ex_oral_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="intraoral_tab" data-toggle="tab" href="#intraoral" role="tab" aria-controls="intraoral" aria-selected="true">Intra-Oral</a>
                                                                                            <a class="nav-link-aten text-reset" id="extra_oral_tab" data-toggle="tab" href="#extra_oral" role="tab" aria-controls="extra_oral" aria-selected="false">Extra Oral</a>
                                                                                            <a class="nav-link-aten text-reset" id="radiologia_endo_tab" data-toggle="tab" href="#radiologia_endo" role="tab" aria-controls="radiologia_endo" aria-selected="false">Ex. Radiológico</a>
                                                                                            <a class="nav-link-aten text-reset" id="imagenes_dent_tab" data-toggle="tab" href="#imagenes_dent" role="tab" aria-controls="imagenes_dent" aria-selected="false">Imagenes</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="intraoral" role="tabpanel" aria-labelledby="intraoral_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Aspecto General</label>
                                                                                                                <select name="intra_general" id="intra_general" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intra_general','div_detalle_intra_general','det_intra_general',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_intra_general" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Aspecto General<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_intra_general" id="det_intra_general"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Periodonto</label>
                                                                                                                <select name="periodonto" id="periodonto" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periodonto','div_detalle_periodonto','aprec_periodonto',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_periodonto" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Periodonto<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_periodonto" id="aprec_periodonto"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="extra_oral" role="tabpanel" aria-labelledby="extra_oral_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" style="color:#CE0909;">Aumento de Volumen</label>
                                                                                                                <select name="aum_vol" id="aum_vol" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aum_vol','div_detalle_aum_vol','ex_aum_vol',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si<i>(describir)</i></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_aum_vol" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Aumento de Volumen<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_aum_vol" id="ex_aum_vol"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);">Fístula</label>
                                                                                                                <select name="fistula_endo" id="fistula_endo" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('fistula_endo','div_detalle_fistula_endo','ex_fistula_endo',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_fistula_endo" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Fístula<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fistula_endo" id="ex_fistula_endo"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);">Adenopatías</label>
                                                                                                                <select name="adenopatias" id="adenopatias" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('adenopatias','div_detalle_adenopatias','ex_adenopatias',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_adenopatias" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Adenopatías<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_adenopatias" id="ex_adenopatias"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="radiologia_endo" role="tabpanel" aria-labelledby="radiologia_endo_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_pieza_dental_endorx">
                                                                                                                    <div id="pieza_dentalrx" class="row">
                                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                            <div class="form-row">
                                                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                                        <input class="form-control form-control-sm" type="text" name=""id="">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                                                                                                                                        <select name="rx_esp_peri_apical" id="rx_esp_peri_apical" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('rx_esp_peri_apical','div_detalle_rx_esp_peri_apical','det_rx_esp_peri_apical',4)">
                                                                                                                                            <option value="0">Seleccione</option>
                                                                                                                                            <option value="1">Normal</option>
                                                                                                                                            <option value="2">Engrosado</option>
                                                                                                                                            <option value="3">Ausente</option>
                                                                                                                                            <option value="4">Otro</option>
                                                                                                                                        </select>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group"   id="div_detalle_rx_esp_peri_apical" style="display:none">
                                                                                                                                        <label class="floating-label-activo-sm">Espacio Periodontal Apical<i>(describir)</i></label>
                                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_rx_esp_peri_apical" id="det_rx_esp_peri_apical"></textarea>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                                                                                                                                        <select name="h_apical" id="h_apical" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('h_apical','div_detalle_h_apical','aprec_h_apical',5)">
                                                                                                                                            <option value="0">Seleccione</option>
                                                                                                                                            <option value="1">Normal</option>
                                                                                                                                            <option value="2">Zona apical Difusa</option>
                                                                                                                                            <option value="3">Zona apical Corticalizada</option>
                                                                                                                                            <option value="4">Osteítis Condensante</option>
                                                                                                                                            <option value="5">Otro<i>(describir)</i></option>
                                                                                                                                        </select>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group"  id="div_detalle_h_apical" style="display:none">
                                                                                                                                        <label class="floating-label-activo-sm">Hueso Alveolar Apical<i>(describir)</i></label>
                                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical" id="aprec_h_apical"></textarea>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-row">
                                                                                                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                                                                    <div class="form-group">
                                                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Pieza</label>
                                                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza3" ><i class="fas fa-save"></i> Cargar Otra Pieza</button>
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
                                                                                            <div class="tab-pane fade show" id="imagenes_dent" role="tabpanel" aria-labelledby="imagenes_dent_tab">
                                                                                                <div class="row mb-1">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-4 mt-2">
                                                                                                                <div class="card">
                                                                                                                    <div class="card text-center" id="img">
                                                                                                                       <H6>Imagenes Pre</H6>
                                                                                                                    </div>
                                                                                                                    <div id="img_cons_dermato_pre-c" class="collapse show" aria-labelledby="img_cons_dermato_pre" data-parent="#img_cons_dermato_pre">
                                                                                                                        <div class="aten shadow-none">
                                                                                                                            <!-- [ Main Content ] start -->
                                                                                                                            <div class="dropzone" id="mis-imagenes-cons-dermato-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                                            <!-- [ file-upload ] end -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-4 mt-2">
                                                                                                                <div class="text-center" id="img">
                                                                                                                    <H6>Imagenes Post</H6>
                                                                                                                </div>
                                                                                                                <div id="img_cons_dermato_post-c" class="collapse show" aria-labelledby="img_cons_dermato_post" data-parent="#img_cons_dermato_post">
                                                                                                                    <div class="aten shadow-none">
                                                                                                                        <!-- [ Main Content ] start -->
                                                                                                                        <div class="dropzone" id="mis-imagenes-cons-dermato-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                                        <!-- [ file-upload ] end -->
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-4 mt-2">
                                                                                                                <div class="form-group fill">
                                                                                                                    <input type="hidden" name="biopsia_dermat" id="biopsia_dermat" value="">
                                                                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                                                                        <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                                                        <label for="biopsia_check_dermat" class="cr"></label>
                                                                                                                    </div>
                                                                                                                    <label>biopsia</label>
                                                                                                                    <hr>
                                                                                                                    <div class="form-group fill">
                                                                                                                        <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_cons" id="motivo_cons"></textarea>
                                                                                                                    </div>
                                                                                                                    <div class="form-group fill">
                                                                                                                        <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia" id="obs_result_biopsia"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <label class="floating-label-activo-sm">Observaciones Examen Oral</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>
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
                                                            <!--EXAMEN  POR PIEZA-->
                                                            <div class="tab-pane fade show" id="endo_pieza" role="tabpanel" aria-labelledby="endo_pieza-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_dental_endo">
                                                                                    <div id="pieza_dental" class="row">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Resp.Calor</label>
                                                                                                    <select id="sel_endo_resp_calor" name="sel_endo_resp_calor" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option><span>N/R </span> No realizada</option>
                                                                                                        <option><span>↑ </span> Aumentado</option>
                                                                                                        <option><span>↓ </span> Disminuido</option>
                                                                                                        <option><span>N </span> Normal</a></option>
                                                                                                        <option><span>(-) </span> No responde</a></option>
                                                                                                    </select>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Resp.Frio</label>
                                                                                                    <select id="sel_endo_resp_frio" name="sel_endo_resp_frio" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option><span>N/R </span> No realizada</option>
                                                                                                        <option><span>↑ </span> Aumentado</option>
                                                                                                        <option><span>↓ </span> Disminuido</option>
                                                                                                        <option><span>N </span> Normal</a></option>
                                                                                                        <option><span>(-) </span> No responde</a></option>
                                                                                                    </select>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Eléctrico</label>
                                                                                                    <select id="sel_endo_resp_elect" name="sel_endo_resp_elect" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option><span>N/R </span> No realizada</option>
                                                                                                        <option><span>↑ </span> Aumentado</option>
                                                                                                        <option><span>↓ </span> Disminuido</option>
                                                                                                        <option><span>N </span> Normal</a></option>
                                                                                                        <option><span>(-) </span> No responde</a></option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Percusión</label>
                                                                                                    <select id="sel_endo_resp_perc" name="sel_endo_resp_perc" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option><span>N/R </span> No realizada</option>
                                                                                                        <option><span>↑ </span> Aumentado</option>
                                                                                                        <option><span>↓ </span> Disminuido</option>
                                                                                                        <option><span>N </span> Normal</a></option>
                                                                                                        <option><span>(-) </span> No responde</a></option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Exploración</label>
                                                                                                    <select id="sel_endo_resp_expl" name="sel_endo_resp_expl" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option><span>N/R </span> No realizada</option>
                                                                                                        <option><span>↑ </span> Aumentado</option>
                                                                                                        <option><span>↓ </span> Disminuido</option>
                                                                                                        <option><span>N </span> Normal</a></option>
                                                                                                        <option><span>(-) </span> No responde</a></option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Cavitaria</label>
                                                                                                    <select id="sel_endo_cavitaria" name="sel_endo_cavitaria" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option><span>N/R </span> No realizada</option>
                                                                                                        <option><span>↑ </span> Aumentado</option>
                                                                                                        <option><span>↓ </span> Disminuido</option>
                                                                                                        <option><span>N </span> Normal</a></option>
                                                                                                        <option><span>(-) </span> No responde</a></option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza" ><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--PLANIFICACION TRATAMIENTO-->
                                                            <div class="tab-pane fade show" id="plan_endo" role="tabpanel" aria-labelledby="plan_endo-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_plan_endo">
                                                                                    <div id="pieza_dental" class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                                <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                    <input type="text" class="form-control form-control-sm">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                                        <option selected  value="1">Uniradicular</option>
                                                                                                                        <option value="2">Biradicular</option>
                                                                                                                        <option value="2">Triradicular</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                                                                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                                        <option selected  value="1">Convenio</option>
                                                                                                                        <option value="2">Sin Convenio</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> Cargar a presupuesto</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                        <div class="col-sm-4 col-md-4 col-xl-4">
                                                                                                <div class="form-row">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza2"><i class="fas fa-save"></i> Cargar otra pieza</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--HOSPITALIZACION-->
                                                            <div class="tab-pane fade show" id="hosp_endodoncia" role="tabpanel" aria-labelledby="hosp_endodoncia-tab">
                                                                @include('general.hospitalizacion.hospitalizar')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--EXAMEN MAXILO-FACIAL PARAMETROS DE CONTROL-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_esp1">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp1_c" aria-expanded="false" aria-controls="exam_esp1_c">
                                            Examen Odontológico Especialidad Maxilo-Facial
                                        </button>
                                    </div>
                                    <div id="exam_esp1_c" class="collapse" aria-labelledby="exam_esp1" data-parent="#exam_esp1">
                                        <div class="card-body-aten-a shadow-none">
                                            <div id="form-mf-adulto">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="mf_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="ficha_maxilo_tab" data-toggle="tab" href="#ficha_maxilo" role="tab" aria-controls="ficha_maxilo" aria-selected="true">Ficha Maxilo-Facial</a>
                                                            </li>
                                                            {{--  <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="est_rx_tab" data-toggle="tab" href="#est_rx" role="tab" aria-controls="est_rx" aria-selected="true">Estudio-rx</a>
                                                            </li>  --}}
                                                            {{--  <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="analisis_tab" data-toggle="tab" href="#analisis" role="tab" aria-controls="analisis" aria-selected="true">Analisis</a>
                                                            </li>  --}}
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="resumen_pat_orto_tab" data-toggle="tab" href="#resumen_pat_orto" role="tab" aria-controls="resumen_pat_orto" aria-selected="true">Resumen Patologias</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="mf_adulto">
                                                            <!--FICHA MAXILO-->
                                                            <div class="tab-pane fade show active" id="ficha_maxilo" role="tabpanel" aria-labelledby="ficha_maxilo_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active " id="mf_extra_oral_tab" data-toggle="tab" href="#mf_extra_oral" role="tab" aria-controls="mf_extra_oral" aria-selected="false">Extra Oral</a>
                                                                                            <a class="nav-link-aten text-reset" id="mf_ex_frente_tab" data-toggle="tab" href="#mf_ex_frente" role="tab" aria-controls="mf_ex_frente" aria-selected="true">Examen de Frente</a>
                                                                                            <a class="nav-link-aten text-reset" id="mf_ex_perfil_tab" data-toggle="tab" href="#mf_ex_perfil" role="tab" aria-controls="mf_ex_perfil" aria-selected="false">Examen de Perfil</a>
                                                                                            <a class="nav-link-aten text-reset" id="mf_nariz_tab" data-toggle="tab" href="#mf_nariz" role="tab" aria-controls="mf_nariz" aria-selected="false">Examen Nariz</a>
                                                                                            <a class="nav-link-aten text-reset" id="mf_ang_perfil_tab" data-toggle="tab" href="#mf_ang_perfil" role="tab" aria-controls="mf_ang_perfil" aria-selected="false">Angulos de Perfil</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="mf_extra_oral" role="tabpanel" aria-labelledby="mf_extra_oral_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Biotipo </label>
                                                                                                                <select id="" name="" class="form-control form-control-sm">
                                                                                                                    <option selected value="0">Seleccione </option>
                                                                                                                    <option>Biotipo Mesofacial</option>
                                                                                                                    <option>Biotipo Braquifacial</option>
                                                                                                                    <option>Biotipo Dólicofacial</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">

                                                                                                                <label class="floating-label-activo-sm">Tipo Esqueletal</label>
                                                                                                                <select id="" name="" class="form-control form-control-sm" >
                                                                                                                    <option>Tipo I</option>
                                                                                                                    <option>Tipo II Mandíbular</option>
                                                                                                                    <option>Tipo II Maxilar</option>
                                                                                                                    <option>Tipo III Mandíbular</option>
                                                                                                                    <option>Tipo III Maxilar</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Examen Clínico General</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="descripcion_antecedentes" id="descripcion_antecedentes" placeholder="Examen Clínico General"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Comentarios al examen extra-oral</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="descripcion_antecedentes" id="descripcion_antecedentes" placeholder="Comentarios al examen extra-oral"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>




                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="mf_ex_frente" role="tabpanel" aria-labelledby="mf_ex_frente_tab">
                                                                                                <div class="col-md-12">
                                                                                                    <div class="card">
                                                                                                        <div class="card-header bg-info">
                                                                                                            <h6 class="text-center">Examen De Frente</h6>
                                                                                                        </div>
                                                                                                        <div class="card-body col-md-12" >
                                                                                                            <div class="form-row">
                                                                                                                <div class="form-group col-md-6" >
                                                                                                                    <div class="imagen_ortognatica"style="background-image: url('{{ asset('img_dental/img_mod/especialidad/ortognatica_alineamiento_es.png') }}'); background-repeat: no-repeat; background-size: contain;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input input_ortognatica_1" id="input_1_ficha_ortognatica" name="ex_frontal_sup" data-toggle="tooltip" data-placement="left auto" data-title="Superior" data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input input_ortognatica_1" id="input_2_ficha_ortognatica" name="ex_frontal_med" data-toggle="tooltip" data-placement="left auto" data-title="Medio" data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input input_ortognatica_1" id="input_3_ficha_ortognatica" name="ex_frontal_inf" data-toggle="tooltip" data-placement="left auto" data-title="Inferior" data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_18_ficha_ortognatica" name="ex_frontal_nariz" data-toggle="tooltip" data-placement="right auto" data-title="Nariz" data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_19_ficha_ortognatica" name="ex_frontal_isup" data-toggle="tooltip" data-placement="right auto" data-title="Inc. Sup." data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_20_ficha_ortognatica" name="ex_frontal_iinf" data-toggle="tooltip" data-placement="right auto" data-title="Inc. Inf." data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_21_ficha_ortognatica" name="ex_frontal_menton" data-toggle="tooltip" data-placement="right auto" data-title="Mentón" data-original-title="" title="" style="background: transparent;">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-6">
                                                                                                                    <div class="imagen_ortognatica" style="background-image: url('{{ asset('img_dental/img_mod/especialidad/ortognatica_tercios_es.png') }}'); background-repeat: no-repeat; background-size: contain;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input input_ortognatica_2" id="input_4_ficha_ortognatica" name="ex_frontal_gn" data-toggle="tooltip" data-placement="top auto" data-title="Distancia de Tr hasta Gn" tabindex="-1" readonly="" data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input input_ortognatica_2" id="input_5_ficha_ortognatica" name="ex_frontal_ft" data-toggle="tooltip" data-placement="left auto" data-title="Ft" data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input input_ortognatica_2" id="input_6_ficha_ortognatica" name="ex_frontal_zy" data-toggle="tooltip" data-placement="left auto" data-title="Zy" data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input input_ortognatica_2" id="input_7_ficha_ortognatica" name="ex_frontal_go" data-toggle="tooltip" data-placement="left auto" data-title="Go" data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_8_ficha_ortognatica" tabindex="-1" readonly="" data-toggle="tooltip" data-placement="right auto" data-title="Proporción" data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_9_ficha_ortognatica" tabindex="-1" readonly="" data-toggle="tooltip" data-placement="right auto" data-title="Proporción" data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_10_ficha_ortognatica" tabindex="-1" readonly="" data-toggle="tooltip" data-placement="right auto" data-title="Proporción" data-original-title="" title="" style="background: transparent;">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="card-body col-md-12">
                                                                                                            <div class="form-row">
                                                                                                                <div class="form-group col-md-6" >
                                                                                                                    <div class="imagen_ortognatica_ancha" style="background-image: url('{{ asset('img_dental/img_mod/especialidad/ortognatica_canteo_es.png') }}'); background-repeat: no-repeat; background-size: contain;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_22_ficha_ortognatica" name="canteo_molar_1" data-toggle="tooltip" data-placement="bottom auto" data-title="Molar Der." data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_23_ficha_ortognatica" name="canteo_canino_1" data-toggle="tooltip" data-placement="bottom auto" data-title="Canino Der." data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_24_ficha_ortognatica" name="canteo_canino_2" data-toggle="tooltip" data-placement="bottom auto" data-title="Canino Izq." data-original-title="" title="" style="background: transparent;">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="input_25_ficha_ortognatica" name="canteo_molar_2" data-toggle="tooltip" data-placement="bottom auto" data-title="Molar Izq." data-original-title="" title="" style="background: transparent;">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-6">
                                                                                                                    <table class="table_full margin_bottom">
                                                                                                                        <tbody>
                                                                                                                            <tr><td colspan="2"><label class="margin_bottom"><h5>Relación Labio Diente</h5></label></td></tr>
                                                                                                                            <tr>
                                                                                                                                <td> <h6 style="margin-right:30px">Reposo:</h6></td>
                                                                                                                                <td style="width:140px;">
                                                                                                                                    <div class="input-group-prepend">
                                                                                                                                        <input type="text" id="labio_diente_reposo" name="labio_diente_reposo" class="form-control input-sm text-right">
                                                                                                                                        <span class="input-group-text"><font style="vertical-align: inherit;">mm.</font></span>
                                                                                                                                    </div>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td><h6>Sonrisa:</h6></td>
                                                                                                                                <td>
                                                                                                                                    <div class="input-group-prepend">
                                                                                                                                        <input type="text" id="labio_diente_sonrisa" name="labio_diente_sonrisa" class="form-control input-sm text-right">
                                                                                                                                        <span class="input-group-text"><font style="vertical-align: inherit;">mm.</font></span>
                                                                                                                                    </div>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td><h6>Risa:</h6></td>
                                                                                                                                <td>
                                                                                                                                    <div class="input-group-prepend">
                                                                                                                                        <input type="text" id="labio_diente_risa" name="labio_diente_risa" class="form-control input-sm text-right">
                                                                                                                                        <span class="input-group-text"><font style="vertical-align: inherit;">mm.</font></span>
                                                                                                                                    </div>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                            <tr><td colspan="2"><label class="margin_top margin_bottom"><h5 style="Margin-top:25px">Gradiente de Canteo</h5></label></td></tr>
                                                                                                                            <tr>
                                                                                                                                <td><h6>Molar:</h6></td>
                                                                                                                                <td>
                                                                                                                                    <div class="input-group-prepend">
                                                                                                                                        <input type="text" class="form-control input-sm text-right" name="canteo_gradiente_molar">
                                                                                                                                        <span class="input-group-text"><font style="vertical-align: inherit;">mm.</font></span>
                                                                                                                                    </div>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td><h6>Canino:</h6></td>
                                                                                                                                <td>
                                                                                                                                    <div class="input-group-prepend">
                                                                                                                                        <input type="text" class="form-control input-sm text-right" name="canteo_gradiente_canino">
                                                                                                                                        <span class="input-group-text"><font style="vertical-align: inherit;">mm.</font></span>
                                                                                                                                    </div>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="mf_ex_perfil" role="tabpanel" aria-labelledby="mf_ex_perfil_tab">
                                                                                                <div class="col-sm-12">
                                                                                                    <div class="card">
                                                                                                        <div class="#">
                                                                                                            <h6 class="text-center">Examen De Perfíl</h6>
                                                                                                            <br>
                                                                                                        </div>
                                                                                                        <div class="form-group row">
                                                                                                            <div class="col-md-6">
                                                                                                                <div class="imagen_ortognatica" style="background-image: url(i/especialidad/ortognatica_perfil.png);">
                                                                                                                    <input type="text" class="form-control input-sm ort_input" id="input_11_ficha_ortognatica" name="ex_perfil_ls" data-toggle="tooltip" data-placement="right" data-title="Ls" data-original-title="" title="">
                                                                                                                    <input type="text" class="form-control input-sm ort_input" id="input_12_ficha_ortognatica" name="ex_perfil_li" data-toggle="tooltip" data-placement="right" data-title="Li" data-original-title="" title="">
                                                                                                                    <input type="text" class="form-control input-sm ort_input" id="input_13_ficha_ortognatica" name="ex_perfil_pg" data-toggle="tooltip" data-placement="right" data-title="Pg" data-original-title="" title="">
                                                                                                                    <input type="text" class="form-control input-sm ort_input" id="input_14_ficha_ortognatica" name="ex_perfil_gn" data-toggle="tooltip" data-placement="right" data-title="Distancia de C hasta Gn" data-original-title="" title="">
                                                                                                                    <div id="cervico_prop">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="ang_cerv" name="ex_perfil_ac" data-toggle="tooltip" data-placement="bottom" data-title="Ángulo Cervicofacial" data-original-title="" title="">
                                                                                                                        <input type="text" class="form-control input-sm ort_input" id="prop_cerv" name="ex_perfil_pc" data-toggle="tooltip" data-placement="bottom" data-title="Proporción Cervicofacial" style="left:54px;" data-original-title="" title="">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-6">
                                                                                                                <div class="imagen_ortognatica_ancha" style="background-image: url(i/especialidad/ortognatica_nariz_inf.png);">
                                                                                                                    <input type="text" class="form-control input-sm ort_input" id="input_15_ficha_ortognatica" name="ex_perfil_c1" data-toggle="tooltip" data-placement="right" data-title="Sn-Prn" data-original-title="" title="">
                                                                                                                    <input type="text" class="form-control input-sm ort_input" id="input_16_ficha_ortognatica" name="ex_perfil_a1" data-toggle="tooltip" data-placement="right" data-title="Al" data-original-title="" title="">
                                                                                                                    <input type="text" class="form-control input-sm ort_input" id="input_17_ficha_ortognatica" name="ex_perfil_ac2" data-toggle="tooltip" data-placement="right" data-title="Ac" data-original-title="" title="">
                                                                                                                </div>
                                                                                                                <table class="col-md-6 col-md-offset-2 text-center margin_bottom">
                                                                                                                    <tbody>
                                                                                                                        <tr><td colspan="2"><label class="margin_bottom">Ancho Interalar en Cirugía</label></td></tr>
                                                                                                                        <tr>
                                                                                                                            <td width="50%">c/TNT:</td>
                                                                                                                            <td width="50%">
                                                                                                                                <div class="input-group margin_bottom">
                                                                                                                                    <input type="text" class="form-control input-sm text-right" name="ancho_interalar_con">
                                                                                                                                    <span class="input-group-addon">mm.</span>
                                                                                                                                </div>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td>s/TNT:</td>
                                                                                                                            <td>
                                                                                                                                <div class="input-group margin_bottom">
                                                                                                                                    <input type="text" class="form-control input-sm text-right" name="ancho_interalar_sin">
                                                                                                                                    <span class="input-group-addon">mm.</span>
                                                                                                                                </div>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="mf_nariz" role="tabpanel" aria-labelledby="mf_nariz_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="#">
                                                                                                                <h6 class="text-center">Examen nariz</h6>
                                                                                                            </div>
                                                                                                            <div class="card-body">
                                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                    <div class="form-row">
                                                                                                                        <div class="form-group col-md-6">

                                                                                                                            <div class="col-md-6">
                                                                                                                                <label class="floating-label-activo-sm" >Dorso:</label>
                                                                                                                                <input type="hidden" name="nariz_dorso" value="1">
                                                                                                                                <div id="nariz_dorso" class="nariz_img margin_bottom" data-toggle="popover" data-original-title="" title="" aria-describedby="popover_nariz"></div>

                                                                                                                                <div class="popover show right in" role="tooltip" id="popover_nariz" style="top: 119.562px; left: 137px; display: block;">
                                                                                                                                    <div class="arrow" style="top: 15.0179%;"><h3 class="popover-title" style="display: none;"></h3>
                                                                                                                                        <div class="popover-content">
                                                                                                                                            <ul class="menu_nariz">
                                                                                                                                                <li class="li_menu_nariz" onclick="cambiar_nariz(1);">
                                                                                                                                                    <a><img src="{{ asset('img_dental/img_mod/especialidad/nariz_1.png') }}" class="cuadro_nariz" alt="Nariz"></a>
                                                                                                                                                </li>
                                                                                                                                                <li class="li_menu_nariz" onclick="cambiar_nariz(2);">
                                                                                                                                                    <a><img src="{{ asset('img_dental/img_mod/especialidad/nariz_2.png') }}" class="cuadro_nariz" alt="Nariz"></a>
                                                                                                                                                </li>
                                                                                                                                                <li class="li_menu_nariz" onclick="cambiar_nariz(3);">
                                                                                                                                                    <a><img src="{{ asset('img_dental/img_mod/especialidad/nariz_3.png') }}" class="cuadro_nariz" alt="Nariz"></a>
                                                                                                                                                </li>
                                                                                                                                                <li class="li_menu_nariz" onclick="cambiar_nariz(4);">
                                                                                                                                                    <a><img src="{{ asset('img_dental/img_mod/especialidad/nariz_4.png') }}" class="cuadro_nariz" alt="Nariz"></a>
                                                                                                                                                </li>
                                                                                                                                            </ul>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6">
                                                                                                                                <label>Ángulo Columela Labio:</label>
                                                                                                                                <div class="input-group margin_bottom" style="width:50px;margin-left:15px;text-align:middle">
                                                                                                                                    <input type="text" class="form-control input-sm text-center" name="nariz_angulo">
                                                                                                                                    <span class="input-group-addon">Grados</span>
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                        <div class="form-group row">
                                                                                                                            <div class="col-md-12">
                                                                                                                                <label>Punta nasal:</label>
                                                                                                                                <textarea name="nariz_punta" class="form-control input-sm margin_bottom" placeholder="Descripción de la punta nasal"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="mf_ang_perfil" role="tabpanel" aria-labelledby="mf_ang_perfil_tab">
                                                                                                <div class="card">

                                                                                                    <div class="card-body">
                                                                                                        <div class="form-group row">
                                                                                                            <div class="col-md-12">
                                                                                                                <div class="card">
                                                                                                                    <div class="#">
                                                                                                                        <h6 class="text-center">Angulos de Perfil</h6>
                                                                                                                    </div>
                                                                                                                    <table id="tabla_ortog">
                                                                                                                        <thead>
                                                                                                                            <tr>
                                                                                                                                <th class="text-center align-middle">perfil_m1</th>
                                                                                                                                <th class="text-center align-middle">perfil_m2</th>
                                                                                                                                <th class="text-center align-middle">perfil_m21</th>
                                                                                                                                <th class="text-center align-middle">perfil_m22</th>
                                                                                                                                <th class="text-center align-middle">perfil_m3</th>
                                                                                                                                <th class="text-center align-middle">perfil_m4</th>
                                                                                                                                <th class="text-center align-middle">perfil_m5</th>
                                                                                                                            </tr>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m1" name="ex_perfil_m1"> </textarea>
                                                                                                                                </td>
                                                                                                                                <td >
                                                                                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m2" name="ex_perfil_m2"></textarea>
                                                                                                                                </td>
                                                                                                                                <td >
                                                                                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m21" name="ex_perfil_m21"></textarea>
                                                                                                                                </td>
                                                                                                                                <td >
                                                                                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m2" name="ex_perfil_m22"></textarea>
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m2" name="ex_perfil_m3"></textarea>
                                                                                                                                </td>
                                                                                                                                <td >
                                                                                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m2" name="ex_perfil_m4"></textarea>
                                                                                                                                </td>
                                                                                                                                <td >
                                                                                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m2" name="ex_perfil_m5"></textarea>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
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
                                                                </div>
                                                            </div>
                                                            <script>
                                                                function cambiar_nariz(numero) {
                                                                    if (numero == 1) {
                                                                        $('#nariz_dorso').css('background-image', 'url(\'{{ asset('img_dental/img_mod/especialidad/nariz_1.png') }}\'); background-repeat: no-repeat; background-size: contain;');
                                                                    } else if (numero == 2) {
                                                                        $('#nariz_dorso').css('background-image',  'url(\'{{ asset('img_dental/img_mod/especialidad/nariz_2.png') }}\'); background-repeat: no-repeat; background-size: contain;');
                                                                    } else if (numero == 3) {
                                                                        $('#nariz_dorso').css('background-image',  'url(\'{{ asset('img_dental/img_mod/especialidad/nariz_3.png') }}\'); background-repeat: no-repeat; background-size: contain;');
                                                                    } else if (numero == 4) {
                                                                        $('#nariz_dorso').css('background-image',  'url(\'{{ asset('img_dental/img_mod/especialidad/nariz_4.png') }}\'); background-repeat: no-repeat; background-size: contain;');
                                                                    }
                                                                    $('#form_ficha_ortognatica input[name=nariz_dorso]').val(numero);
                                                                    $('#nariz_dorso').click();
                                                                }
                                                            </script>
                                                            <!--RADIOLOGIAL-->
                                                            {{--  <div class="tab-pane fade show" id="est_rx" role="tabpanel" aria-labelledby="est_rx_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-12 mx-auto">
                                                                                                <label class="floating-label-activo-sm">rx</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="list_alt_ortod1" id="list_alt_ortod1"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="card">
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-md-12 mx-auto">
                                                                                                                <label class="floating-label">Listado de Anomalias del Examen Clínico</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="2" name="list_alt_ortod1" id="list_alt_ortod1"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12">
                                                                                                        <div class="dt-responsive table-responsive pb-4">
                                                                                                            <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                                                                                <thead>
                                                                                                                    <tr>
                                                                                                                        <th class="text-left align-middle">Análisis Esqueletales Sagitales</th>
                                                                                                                        <th class="text-left align-middle">Norma + - DS</th>
                                                                                                                        <th class="text-left align-middle">Valor T1</th>
                                                                                                                        <th class="text-left align-middle">Dif T1</th>
                                                                                                                        <th class="text-left align-middle">Valor T2</th>
                                                                                                                        <th class="text-left align-middle">Dif T2</th>
                                                                                                                    </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Ángulo SNA</td>
                                                                                                                        <td class="text-left align-middle">82 +/- 2°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Ángulo SNB</td>
                                                                                                                        <td class="text-left align-middle">82 +/- 2°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Ángulo ANB</td>
                                                                                                                        <td class="text-left align-middle">2 +/- 2°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Prof Facial</td>
                                                                                                                        <td class="text-left align-middle">87 +/- 3°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Convex. Facial</td>
                                                                                                                        <td class="text-left align-middle">2 +/- 2°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12">
                                                                                                        <div class="dt-responsive table-responsive pb-4">
                                                                                                            <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                                                                                <thead>
                                                                                                                    <tr>
                                                                                                                        <th class="text-left align-middle">Consideraciones Esqueletales Verticales</th>
                                                                                                                        <th class="text-left align-middle">Norma + - DS</th>
                                                                                                                        <th class="text-left align-middle">Valor T1</th>
                                                                                                                        <th class="text-left align-middle">Dif T1</th>
                                                                                                                        <th class="text-left align-middle">Valor T2</th>
                                                                                                                        <th class="text-left align-middle">Dif T2</th>
                                                                                                                    </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Relación de alturas faciales Harvold: N-ANS/ANS-Me</td>
                                                                                                                        <td class="text-left align-middle">0.8 +/- 0.05 mm.</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">% de alturas faciales P-A Jarabak: S-Go/ N-Me x 100</td>
                                                                                                                        <td class="text-left align-middle">59 - 63%</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Ángulo SN - GoGn</td>
                                                                                                                        <td class="text-left align-middle">32° +/- 2°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Ángulo PP-PM</td>
                                                                                                                        <td class="text-left align-middle">25° +/- 5°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Eje Facial</td>
                                                                                                                        <td class="text-left align-middle">90° +/- 3</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12">
                                                                                                        <div class="dt-responsive table-responsive pb-4">
                                                                                                            <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                                                                                <thead>
                                                                                                                    <tr>
                                                                                                                        <th class="text-left align-middle">Consideraciones Dentarias</th>
                                                                                                                        <th class="text-left align-middle">Norma + - DS</th>
                                                                                                                        <th class="text-left align-middle">Valor T1</th>
                                                                                                                        <th class="text-left align-middle">Dif T1</th>
                                                                                                                        <th class="text-left align-middle">Valor T2</th>
                                                                                                                        <th class="text-left align-middle">Dif T2</th>
                                                                                                                    </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Ángulo 1 - PP</td>
                                                                                                                        <td class="text-left align-middle">110° +/- 5°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">1 - Apo</td>
                                                                                                                        <td class="text-left align-middle">3.5 +/- 2 mm.</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Ángulo 1 inf - PM</td>
                                                                                                                        <td class="text-left align-middle">90° +/- 3°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Á1 inf - Apo</td>
                                                                                                                        <td class="text-left align-middle">1 +/- 2 mm</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Ángulo Intercisivo</td>
                                                                                                                        <td class="text-left align-middle">130° +/- 5°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12">
                                                                                                        <div class="dt-responsive table-responsive pb-4">
                                                                                                            <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                                                                                <thead>
                                                                                                                    <tr>
                                                                                                                        <th class="text-left align-middle">Consideraciones de Tejidos Blandos</th>
                                                                                                                        <th class="text-left align-middle">Norma + - DS</th>
                                                                                                                        <th class="text-left align-middle">Valor T1</th>
                                                                                                                        <th class="text-left align-middle">Dif T1</th>
                                                                                                                        <th class="text-left align-middle">Valor T2</th>
                                                                                                                        <th class="text-left align-middle">Dif T2</th>
                                                                                                                    </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Línea E (punta nasal-Pg blando) a labio superior</td>
                                                                                                                        <td class="text-left align-middle">- 4 +/- 2 mm.</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Línea E (punta nasal-Pg blando) a labio inferior</td>
                                                                                                                        <td class="text-left align-middle">- 2 +/- 2 mm.</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Ángulo Naso - Labial</td>
                                                                                                                        <td class="text-left align-middle">108° +/- 8°</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Gap Labial (perpendicular a Vert Sn)</td>
                                                                                                                        <td class="text-left align-middle">2 +/- 2 mm</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Exposición Incisiva (perpendicular a Vert Sn)</td>
                                                                                                                        <td class="text-left align-middle">2 +/- 2 mm</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Labio Superior - Vertical Subnasal</td>
                                                                                                                        <td class="text-left align-middle">2 +/- 2 mm</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Labio Inferior - Vertical Subnasal</td>
                                                                                                                        <td class="text-left align-middle">0 +/- 2 mm</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-left align-middle">Mentón - Vertical Subnasal</td>
                                                                                                                        <td class="text-left align-middle">4 +/- 2 mm</td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                        <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </div>
                                                                                                            <!--Formulario / diagnóstico rx-->
                                                                                                        <div class="col-sm-12">
                                                                                                            <div class="card">
                                                                                                                <a class="label" data-toggle="collapse" href="#Dg_rx" role="button" aria-expanded="false" aria-controls="Dg_rx">
                                                                                                                    <div class="card mb-3">
                                                                                                                        <div class="card-header bg-info align-middle">
                                                                                                                            <h6 class="float-left d-inline">Diagnóstico Radiológico</h6>
                                                                                                                            <i id="Dg_rx" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer"></i>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </a>
                                                                                                                <div class="collapse" id="Dg_rx" style="">
                                                                                                                    <div class="card-body">
                                                                                                                        <form>
                                                                                                                            <div class="form-row" id="form_dg_rx">
                                                                                                                                <div class="form-group col-md-6">
                                                                                                                                    <select class="form-control input-sm margin_bottom" id="diag_esqueletal" name="diag_esqueletal">
                                                                                                                                        <option value="0" disabled="" selected="">Tipo_esqueletal</option>
                                                                                                                                        <option value="1">Tipo I</option>
                                                                                                                                        <option value="2">Tipo II Mandíbula</option>
                                                                                                                                        <option value="3">Tipo II Maxilar</option>
                                                                                                                                        <option value="4">Tipo III Mandíbula</option>
                                                                                                                                        <option value="5">Tipo III Maxilar</option>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                                <div class="form-group col-md-6">
                                                                                                                                    <select class="form-control input-sm margin_bottom" id="diag_facial" name="tipo_facial">
                                                                                                                                        <option value="0" disabled="" selected="">Biotipo</option>
                                                                                                                                        <option value="1">Mesofacial</option>
                                                                                                                                        <option value="2">Braquifacial</option>
                                                                                                                                        <option value="3">Dólicofacial</option>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                                <div class="form-group col-md-12">
                                                                                                                                    <label class="floating-label">Diagnóstico</label>
                                                                                                                                    <textarea id="dg_rx_cefalometrico" class="form-control margin_bottom resize_vertical" rows="4"></textarea>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </form>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <!--Cierre: Formulario /diagnóstico rx-->
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
                                                            </div>  --}}

                                                            <!--ANALISIS DE MODELOS-->
                                                            {{--  <div class="tab-pane fade show" id="analisis" role="tabpanel" aria-labelledby="analisis_tab">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="#">
                                                                        <h6 class="text-center">Análisis de Modelos</h6>
                                                                        </div>
                                                                        <br>
                                                                        <br>
                                                                    <div class="barra_titulo">
                                                                        <h5 class="color_dd_title">Dientes y modelos</h5>
                                                                    </div>
                                                                        <table class="table table-condensed table_no_bg table_full align_middle no_margin">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Forma</th>
                                                                                    <th>Ausencias</th>
                                                                                    <th class="border_right">Discrepancia</th>
                                                                                    <th width="34%">Facetas de desgastes y Contactos prematuros</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>Arco Superior</th>
                                                                                    <td>
                                                                                        <select id="esp_tipo_porma_sup" class="form-control input-sm" name="arc_sup_f">
                                                                                            <option value="0">Tipo de forma</option>
                                                                                            <option value="1">Semicircular</option>
                                                                                            <option value="2">Cuadrangular</option>
                                                                                            <option value="3">Triangular</option>
                                                                                            <option value="4">Otra</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td><input type="text" class="form-control input-sm" name="arc_sup_a"></td>
                                                                                    <td class="border_right"><input type="text" class="form-control input-sm" name="arc_sup_d"></td>
                                                                                    <td>
                                                                                        <input type="text" id="facetas_desgastes" placeholder="Facetas de desgastes" class="form-control input-sm" name="faceta_desgaste">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Arco Inferior</th>
                                                                                    <td>
                                                                                        <select id="esp_tipo_porma_sup" class="form-control input-sm" name="arc_inf_f">
                                                                                            <option selected="" disabled="" value="0">Tipo de forma</option>
                                                                                            <option value="1">Semicircular</option>
                                                                                            <option value="2">Cuadrangular</option>
                                                                                            <option value="3">Triangular</option>
                                                                                            <option value="4">Otra</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td><input type="text" class="form-control input-sm" name="arc_inf_a"></td>
                                                                                    <td class="border_right"><input type="text" class="form-control input-sm" name="arc_inf_d"></td>
                                                                                    <td>
                                                                                        <input type="text" id="contactos_prematuros" placeholder="Contactos prematuros" class="form-control input-sm" name="contacto_prematuro">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="table table_full align_middle no_margin">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th width="33%" colspan="3" class="border_right">Modelos en oclusión</th>
                                                                                    <th width="33%" colspan="2">Modelos en ventaja</th>
                                                                                    <th width="34%">Modelos en ventaja</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Derecho</th>
                                                                                    <th class="border_right">Izquierdo</th>
                                                                                    <td width="15%">Over bite:</td>
                                                                                    <td class="border_right">
                                                                                        <div class="input-group margin_bottom">
                                                                                            <input type="text" name="ventaja_ob" class="form-control input-sm text-right">
                                                                                            <span class="input-group-addon">mm.</span>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="align_top" rowspan="5">
                                                                                        <div class="checkbox">
                                                                                            <label>
                                                                                                <input type="checkbox" id="ventaja_coordinacion" name="ventaja_coordinacion" class="ventaja_check"> Coordinación                    </label>
                                                                                        </div>
                                                                                        <input type="text" id="ventaja_coordinacion_txt" name="ventaja_coordinacion_txt" class="form-control input-sm hide">
                                                                                        <div class="checkbox">
                                                                                            <label>
                                                                                                <input type="checkbox" id="ventaja_competencia_a" name="ventaja_competencia_a" class="ventaja_check"> Competencia Trans. Ant.                    </label>
                                                                                        </div>
                                                                                        <input type="text" id="ventaja_competencia_a_txt" name="ventaja_competencia_a_txt" class="form-control input-sm hide">
                                                                                        <div class="checkbox">
                                                                                            <label>
                                                                                                <input type="checkbox" id="ventaja_competencia_p" name="ventaja_competencia_p" class="ventaja_check"> Competencia Trans. Post.                    </label>
                                                                                        </div>
                                                                                        <input type="text" id="ventaja_competencia_p_txt" name="ventaja_competencia_p_txt" class="form-control input-sm hide">
                                                                                        <div class="checkbox">
                                                                                            <label>
                                                                                                <input type="checkbox" id="ventaja_linea_dentaria" name="ventaja_linea_dentaria" class="ventaja_check"> Líneas Medias Dentarias                    </label>
                                                                                        </div>
                                                                                        <input type="text" id="ventaja_linea_dentaria_txt" name="ventaja_linea_dentaria_txt" class="form-control input-sm hide">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th class="no_border_top">Clase molar</th>
                                                                                    <td class="no_border_top">
                                                                                        <select class="form-control input-sm" name="clase_molar_d">
                                                                                            <option value="0">Tipo</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="no_border_top border_right">
                                                                                        <select class="form-control input-sm" name="clase_molar_i">
                                                                                            <option value="0">Tipo</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="no_border_top">Over jet:</td>
                                                                                    <td class="no_border_top border_right">
                                                                                        <div class="input-group margin_bottom">
                                                                                            <input type="text" name="ventaja_oj" class="form-control input-sm text-right">
                                                                                            <span class="input-group-addon">mm.</span>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th class="no_border_top">Clase canina</th>
                                                                                    <td class="no_border_top">
                                                                                        <select class="form-control input-sm" name="clase_canina_d">
                                                                                            <option value="0">Tipo</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="no_border_top border_right">
                                                                                        <select class="form-control input-sm" name="clase_canina_i">
                                                                                            <option value="0">Tipo</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="no_border_top">Periodo Ventana Derecha:</td>
                                                                                    <td class="no_border_top border_right">
                                                                                        <div class="input-group margin_bottom">
                                                                                            <input type="text" name="ventaja_d" class="form-control input-sm text-right">
                                                                                            <span class="input-group-addon">mm.</span>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th class="no_border_top">Mordida cruzada</th>
                                                                                    <td class="no_border_top">
                                                                                        <select class="form-control input-sm" name="clase_cruzada_d">
                                                                                            <option value="0">Tipo</option>
                                                                                            <option value="1">Posterior</option>
                                                                                            <option value="2">Anterior</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="no_border_top border_right">
                                                                                        <select class="form-control input-sm" name="clase_cruzada_i">
                                                                                            <option value="0">Tipo</option>
                                                                                            <option value="1">Posterior</option>
                                                                                            <option value="2">Anterior</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="no_border_top">Periodo Ventana Izquierda:</td>
                                                                                    <td class="no_border_top border_right">
                                                                                        <div class="input-group margin_bottom">
                                                                                            <input type="text" name="ventaja_i" class="form-control input-sm text-right">
                                                                                            <span class="input-group-addon">mm.</span>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="border_bottom">
                                                                                    <td class="no_border_top border_right" colspan="3"></td>
                                                                                    <td class="no_border_top">Necesidad de Segmentos:</td>
                                                                                    <td class="no_border_top border_right"><input type="text" name="necesidad_segmentos" class="form-control input-sm text-center"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th class="border_right" colspan="3">Oclusión Anterior</th>
                                                                                    <th colspan="2">
                                                                                        Modelo                <i class="glyphicon glyphicon-question-sign clickeable" id="help-modelo" data-content="Realizar marcas dentro del área de dibujo" rel="popover" data-placement="top" data-original-title="Dibujo" data-trigger="hover"></i>
                                                                                        <button type="button" class="btn btn-info btn-sm pull-right" id="clear-modelo">Limpiar</button>
                                                                                    </th>
                                                                                    <th></th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="no_border_top">Over bite:</td>
                                                                                    <td class="no_border_top border_right" colspan="2">
                                                                                        <div class="input-group margin_bottom" style="width:120px">
                                                                                            <input type="text" name="oclusion_ob" class="form-control input-sm text-right">
                                                                                            <span class="input-group-addon">mm.</span>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="no_border_top" colspan="3" rowspan="7">
                                                                                        {{--  <input type="hidden" name="modelo_imagen" value="{&quot;lines&quot;:[[[173.72,59.91],[173.72,60.91],[171.72,60.91],[168.72,62.91],[162.72,67.91],[150.72,73.91],[138.72,81.91],[123.72,88.91],[109.72,95.91],[96.72,101.91],[86.72,107.91],[83.72,108.91],[80.72,110.91],[80.72,111.91]],[[98.72,70.91],[100.72,70.91],[101.72,70.91],[107.72,73.91],[116.72,76.91],[122.72,80.91],[134.72,85.91],[149.72,95.91],[172.72,107.91],[180.72,114.91],[190.72,119.91],[192.72,121.91],[193.72,121.91]],[[245.72,30.91],[245.72,31.91],[243.72,32.91],[242.72,34.91],[239.72,38.91],[234.72,43.91],[229.72,48.91],[225.72,52.91],[221.72,56.91],[219.72,59.91],[215.72,63.91],[214.72,64.91]],[[233.72,30.91],[233.72,32.91],[233.72,40.91],[234.72,42.91],[235.72,49.91],[235.72,54.91],[235.72,57.91],[235.72,59.91],[235.72,60.91]]]}">
                                                                                        <input type="hidden" name="modelo_imagen" value="">
                                                                                        <div id="modelo_imagen" class="kbw-signature"><canvas width="318" height="215"></canvas></div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="no_border_top">Over jet:</td>
                                                                                    <td class="no_border_top border_right" colspan="2">
                                                                                        <div class="input-group margin_bottom" style="width:120px">
                                                                                            <input type="text" name="oclusion_oj" class="form-control input-sm text-right">
                                                                                            <span class="input-group-addon">mm.</span>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr><td class="no_border_top" colspan="3"></td></tr>
                                                                                <tr><td class="no_border_top" colspan="3"></td></tr>
                                                                                <tr><td class="no_border_top" colspan="3"></td></tr>
                                                                                <tr><td class="no_border_top" colspan="3"></td></tr>
                                                                                <tr><td class="no_border_top" colspan="3"></td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="barra_titulo">
                                                                            <h5 class="color_dd_title">Mucosas</h5>
                                                                        </div>
                                                                        <div class="col-md-12 padding_top padding_bottom">
                                                                            <div class="row">
                                                                                <div class="col-md-4">Biotipo Gingival</div>
                                                                                <div class="col-md-4">
                                                                                    <select name="biotipo_gingival" class="form-control input-sm margin_bottom">
                                                                                        <option value="0">Seleccione Biotipo Gingival</option>
                                                                                        <option value="1">Fino</option>
                                                                                        <option value="2">Mediano</option>
                                                                                        <option value="3">Grueso</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="checkbox">
                                                                                        <label><input type="checkbox" id="gingivitis" name="gingivitis" class="mucosas_check"> Gingivitis</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" id="gingivitis_txt" name="gingivitis_txt" class="form-control input-sm hide">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="checkbox">
                                                                                        <label><input type="checkbox" id="perio_inflamado" name="perio_inflamado" class="mucosas_check"> Enf. periodontal inflam.</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" id="perio_inflamado_txt" name="perio_inflamado_txt" class="form-control input-sm hide">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="checkbox">
                                                                                        <label><input type="checkbox" id="no_inflamado" name="no_inflamado" class="mucosas_check"> No inflam.</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" id="no_inflamado_txt" name="no_inflamado_txt" class="form-control input-sm hide">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="checkbox">
                                                                                        <label><input type="checkbox" id="ret_gingivales" name="ret_gingivales" class="mucosas_check"> Retracciones gingivales</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" id="ret_gingivales_txt" name="ret_gingivales_txt" class="form-control input-sm hide">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label>Comentarios:</label>
                                                                            <textarea name="comentarios" class="form-control input-sm margin_bottom" rows="3" placeholder="Comentarios"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  --}}

                                                            <!--PLANIFICACION TRATAMIENTO-->
                                                            <div class="tab-pane fade show" id="resumen_pat_orto" role="tabpanel" aria-labelledby="resumen_pat_orto_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <h6 class="text-center">Alteraciones Patológicas Generales</h6>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-12">
                                                                                                <label class="floating-label-activo-sm">Patologías En General</label>
                                                                                                <textarea id="pat_orto_grl" name="pat_orto_grl" class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"></textarea>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="#">
                                                                                <h6 class="text-center">Alteraciones Derivadas del Desarrollo</h6>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <hr>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label-activo-sm">alteraciones Faciales</label>
                                                                                            <textarea id="alt_ort_fac" name="alt_ort_fac" class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"></textarea>
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label-activo-sm">Hábitos</label>
                                                                                            <textarea id="alt_ort_hab" name="alt_ort_hab" class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"></textarea>
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label-activo-sm">Alteraciones Plano Vertical</label>
                                                                                            <textarea id="alt_ort_ejevert" name="alt_ort_ejevert" class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label-activo-sm">Alteraciones Plano Transversal</label>
                                                                                            <textarea id="alt_ort_ejetrans" name="alt_ort_ejetrans"class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"></textarea>
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label-activo-sm">Alteraciones Plano Sagital</label>
                                                                                            <textarea id="alt_ort_ejesag" name="alt_ort_ejesag"class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"></textarea>
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label-activo-sm">Alteraciones Intra-arcos</label>
                                                                                            <textarea id="alt_ort_intarc" name="alt_ort_intarc" class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="#">
                                                                                <h6 class="text-center">Diagnóstico y Plan de Tratamiento  Ortodóncico</h6>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-row" id="form_dg_rx">
                                                                                        <div class="form-group col-md-6">
                                                                                            <label class="floating-label-activo-sm">Tipo_esqueletal</label>
                                                                                            <select class="form-control form-control-sm" id="diag_esqueletal" name="diag_esqueletal">
                                                                                                <option value="0" disabled="" selected="">Seleccionel</option>
                                                                                                <option value="1">Tipo I</option>
                                                                                                <option value="2">Tipo II Mandíbula</option>
                                                                                                <option value="3">Tipo II Maxilar</option>
                                                                                                <option value="4">Tipo III Mandíbula</option>
                                                                                                <option value="5">Tipo III Maxilar</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group col-md-6">
                                                                                            <label class="floating-label-activo-sm">Biotipo</label>
                                                                                            <select class="form-control form-control-sm" id="diag_facial" name="tipo_facial">
                                                                                                <option value="0" disabled="" selected="">Seleccionel</option>
                                                                                                <option value="1">Mesofacial</option>
                                                                                                <option value="2">Braquifacial</option>
                                                                                                <option value="3">Dólicofacial</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-12">
                                                                                            <h6 class="text-center">Clase de Angle</h6>
                                                                                        </div>
                                                                                        <div class="form-group col-md-6">
                                                                                            <h7>Derecha</h7>
                                                                                        </div>
                                                                                        <div class="form-group col-md-6">
                                                                                            <h7>Izquierda</h7>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-row">

                                                                                        <div class="form-group col-md-6">
                                                                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                        </div>
                                                                                        <div class="form-group col-md-6">
                                                                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-6">
                                                                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                        </div>
                                                                                        <div class="form-group col-md-6">
                                                                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <hr>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label-activo-sm">Diagnóstico Ortodóncico</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="descripcion_antecedentes" id="descripcion_antecedentes" ></textarea>
                                                                                        </div>
                                                                                        <div class="form-group col-md-8">
                                                                                            <label class="floating-label-activo-sm"> Plan de Tratamiento</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="descripcion_antecedentes" id="descripcion_antecedentes" ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="descripcion_antecedentes" id="descripcion_antecedentes" ></textarea>
                                                                                        </div>
                                                                                        <div class="form-group col-md-8">
                                                                                            <label class="floating-label-activo-sm"> Aparatos</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="descripcion_antecedentes" id="descripcion_antecedentes" ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-6"style="text-align:center" id="form_0">

                                                                                        </div>
                                                                                        <div class="form-group col-md-6"style="text-align:center" id="form_derperi">
                                                                                            <button type="button" class="btn btn-success btn-sm btn-block" onclick="d_deriv_tto();"><i class="feather icon-file-plus"></i> Derivar a Otra Especialidad</button>
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
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--FORMULARIO / SIGNOS VITALES Y OTROS-->
                            @include('general.secciones_ficha.signos_vitales')

                            <!--CRONICOS / GES / CONFIDENCIAL -->
                            @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')

                            <!--Diagnóstico-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a " id="diagnostico">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                            Diagnóstico
                                        </button>
                                    </div>
                                    <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                        <div class="card-body-aten-a  shadow-none">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Indicaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="ind_oft" id="ind_oft">
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

                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        {{--  <button type="submit" class="btn btn-info-light-c mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); ">Guardar Ficha y Finalizar su Consulta</button>
                                        <button type="submit" class="btn btn-success-light-c mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); ">Guardar Ficha e ir a su Agenda</button>  --}}
                                        <input type="submit" class="btn btn-info-light-c mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                        <input type="submit" class="btn btn-success-light-c mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                    </div>
                                </div>
                            </div>
                            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        </div>
                        <div class="tab-pane fade show" id="est_rx" role="tabpanel" aria-labelledby="est_rx_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12 mx-auto">
                                                            <label class="floating-label-activo-sm">rx</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="list_alt_ortod1" id="list_alt_ortod1"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12 mx-auto">
                                                                            <label class="floating-label">Listado de Anomalias del Examen Clínico</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" name="list_alt_ortod1" id="list_alt_ortod1"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="dt-responsive table-responsive pb-4">
                                                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-left align-middle">Análisis Esqueletales Sagitales</th>
                                                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                                                    <th class="text-left align-middle">Valor T1</th>
                                                                                    <th class="text-left align-middle">Dif T1</th>
                                                                                    <th class="text-left align-middle">Valor T2</th>
                                                                                    <th class="text-left align-middle">Dif T2</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Ángulo SNA</td>
                                                                                    <td class="text-left align-middle">82 +/- 2°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Ángulo SNB</td>
                                                                                    <td class="text-left align-middle">82 +/- 2°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Ángulo ANB</td>
                                                                                    <td class="text-left align-middle">2 +/- 2°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Prof Facial</td>
                                                                                    <td class="text-left align-middle">87 +/- 3°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Convex. Facial</td>
                                                                                    <td class="text-left align-middle">2 +/- 2°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="dt-responsive table-responsive pb-4">
                                                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-left align-middle">Consideraciones Esqueletales Verticales</th>
                                                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                                                    <th class="text-left align-middle">Valor T1</th>
                                                                                    <th class="text-left align-middle">Dif T1</th>
                                                                                    <th class="text-left align-middle">Valor T2</th>
                                                                                    <th class="text-left align-middle">Dif T2</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Relación de alturas faciales Harvold: N-ANS/ANS-Me</td>
                                                                                    <td class="text-left align-middle">0.8 +/- 0.05 mm.</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">% de alturas faciales P-A Jarabak: S-Go/ N-Me x 100</td>
                                                                                    <td class="text-left align-middle">59 - 63%</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Ángulo SN - GoGn</td>
                                                                                    <td class="text-left align-middle">32° +/- 2°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Ángulo PP-PM</td>
                                                                                    <td class="text-left align-middle">25° +/- 5°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Eje Facial</td>
                                                                                    <td class="text-left align-middle">90° +/- 3</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="dt-responsive table-responsive pb-4">
                                                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-left align-middle">Consideraciones Dentarias</th>
                                                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                                                    <th class="text-left align-middle">Valor T1</th>
                                                                                    <th class="text-left align-middle">Dif T1</th>
                                                                                    <th class="text-left align-middle">Valor T2</th>
                                                                                    <th class="text-left align-middle">Dif T2</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Ángulo 1 - PP</td>
                                                                                    <td class="text-left align-middle">110° +/- 5°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">1 - Apo</td>
                                                                                    <td class="text-left align-middle">3.5 +/- 2 mm.</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Ángulo 1 inf - PM</td>
                                                                                    <td class="text-left align-middle">90° +/- 3°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Á1 inf - Apo</td>
                                                                                    <td class="text-left align-middle">1 +/- 2 mm</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Ángulo Intercisivo</td>
                                                                                    <td class="text-left align-middle">130° +/- 5°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="dt-responsive table-responsive pb-4">
                                                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-left align-middle">Consideraciones de Tejidos Blandos</th>
                                                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                                                    <th class="text-left align-middle">Valor T1</th>
                                                                                    <th class="text-left align-middle">Dif T1</th>
                                                                                    <th class="text-left align-middle">Valor T2</th>
                                                                                    <th class="text-left align-middle">Dif T2</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Línea E (punta nasal-Pg blando) a labio superior</td>
                                                                                    <td class="text-left align-middle">- 4 +/- 2 mm.</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Línea E (punta nasal-Pg blando) a labio inferior</td>
                                                                                    <td class="text-left align-middle">- 2 +/- 2 mm.</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Ángulo Naso - Labial</td>
                                                                                    <td class="text-left align-middle">108° +/- 8°</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Gap Labial (perpendicular a Vert Sn)</td>
                                                                                    <td class="text-left align-middle">2 +/- 2 mm</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Exposición Incisiva (perpendicular a Vert Sn)</td>
                                                                                    <td class="text-left align-middle">2 +/- 2 mm</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Labio Superior - Vertical Subnasal</td>
                                                                                    <td class="text-left align-middle">2 +/- 2 mm</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Labio Inferior - Vertical Subnasal</td>
                                                                                    <td class="text-left align-middle">0 +/- 2 mm</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-left align-middle">Mentón - Vertical Subnasal</td>
                                                                                    <td class="text-left align-middle">4 +/- 2 mm</td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                        <!--Formulario / diagnóstico rx-->
                                                                    <div class="col-sm-12">
                                                                        <div class="card">
                                                                            <a class="label" data-toggle="collapse" href="#Dg_rx" role="button" aria-expanded="false" aria-controls="Dg_rx">
                                                                                <div class="card mb-3">
                                                                                    <div class="card-header bg-info align-middle">
                                                                                        <h6 class="float-left d-inline">Diagnóstico Radiológico</h6>
                                                                                        <i id="Dg_rx" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                            <div class="collapse" id="Dg_rx" style="">
                                                                                <div class="card-body">
                                                                                    <form>
                                                                                        <div class="form-row" id="form_dg_rx">
                                                                                            <div class="form-group col-md-6">
                                                                                                <select class="form-control input-sm margin_bottom" id="diag_esqueletal" name="diag_esqueletal">
                                                                                                    <option value="0" disabled="" selected="">Tipo_esqueletal</option>
                                                                                                    <option value="1">Tipo I</option>
                                                                                                    <option value="2">Tipo II Mandíbula</option>
                                                                                                    <option value="3">Tipo II Maxilar</option>
                                                                                                    <option value="4">Tipo III Mandíbula</option>
                                                                                                    <option value="5">Tipo III Maxilar</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <select class="form-control input-sm margin_bottom" id="diag_facial" name="tipo_facial">
                                                                                                    <option value="0" disabled="" selected="">Biotipo</option>
                                                                                                    <option value="1">Mesofacial</option>
                                                                                                    <option value="2">Braquifacial</option>
                                                                                                    <option value="3">Dólicofacial</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group col-md-12">
                                                                                                <label class="floating-label">Diagnóstico</label>
                                                                                                <textarea id="dg_rx_cefalometrico" class="form-control margin_bottom resize_vertical" rows="4"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--Cierre: Formulario /diagnóstico rx-->
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
                        <div class="tab-pane fade show" id="analisis_mf" role="tabpanel" aria-labelledby="analisis_mf_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-row">
                                                        <h6 class="text-center">Análisis de Modelos</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <br>
                                            <div class="barra_titulo">
                                                <h5 class="color_dd_title">Dientes y modelos</h5>
                                            </div>
                                            <table class="table table-condensed table_no_bg table_full align_middle no_margin">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Forma</th>
                                                        <th>Ausencias</th>
                                                        <th class="border_right">Discrepancia</th>
                                                        <th width="34%">Facetas de desgastes y Contactos prematuros</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Arco Superior</th>
                                                        <td>
                                                            <select id="esp_tipo_porma_sup" class="form-control input-sm" name="arc_sup_f">
                                                                <option value="0">Tipo de forma</option>
                                                                <option value="1">Semicircular</option>
                                                                <option value="2">Cuadrangular</option>
                                                                <option value="3">Triangular</option>
                                                                <option value="4">Otra</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control input-sm" name="arc_sup_a"></td>
                                                        <td class="border_right"><input type="text" class="form-control input-sm" name="arc_sup_d"></td>
                                                        <td>
                                                            <input type="text" id="facetas_desgastes" placeholder="Facetas de desgastes" class="form-control input-sm" name="faceta_desgaste">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Arco Inferior</th>
                                                        <td>
                                                            <select id="esp_tipo_porma_sup" class="form-control input-sm" name="arc_inf_f">
                                                                <option selected="" disabled="" value="0">Tipo de forma</option>
                                                                <option value="1">Semicircular</option>
                                                                <option value="2">Cuadrangular</option>
                                                                <option value="3">Triangular</option>
                                                                <option value="4">Otra</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control input-sm" name="arc_inf_a"></td>
                                                        <td class="border_right"><input type="text" class="form-control input-sm" name="arc_inf_d"></td>
                                                        <td>
                                                            <input type="text" id="contactos_prematuros" placeholder="Contactos prematuros" class="form-control input-sm" name="contacto_prematuro">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table_full align_middle no_margin">
                                                <thead>
                                                    <tr>
                                                        <th width="33%" colspan="3" class="border_right">Modelos en oclusión</th>
                                                        <th width="33%" colspan="2">Modelos en ventaja</th>
                                                        <th width="34%">Modelos en ventaja</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th></th>
                                                        <th>Derecho</th>
                                                        <th class="border_right">Izquierdo</th>
                                                        <td width="15%">Over bite:</td>
                                                        <td class="border_right">
                                                            <div class="input-group margin_bottom">
                                                                <input type="text" name="ventaja_ob" class="form-control input-sm text-right">
                                                                <span class="input-group-addon">mm.</span>
                                                            </div>
                                                        </td>
                                                        <td class="align_top" rowspan="5">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="ventaja_coordinacion" name="ventaja_coordinacion" class="ventaja_check"> Coordinación                    </label>
                                                            </div>
                                                            <input type="text" id="ventaja_coordinacion_txt" name="ventaja_coordinacion_txt" class="form-control input-sm hide">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="ventaja_competencia_a" name="ventaja_competencia_a" class="ventaja_check"> Competencia Trans. Ant.                    </label>
                                                            </div>
                                                            <input type="text" id="ventaja_competencia_a_txt" name="ventaja_competencia_a_txt" class="form-control input-sm hide">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="ventaja_competencia_p" name="ventaja_competencia_p" class="ventaja_check"> Competencia Trans. Post.                    </label>
                                                            </div>
                                                            <input type="text" id="ventaja_competencia_p_txt" name="ventaja_competencia_p_txt" class="form-control input-sm hide">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="ventaja_linea_dentaria" name="ventaja_linea_dentaria" class="ventaja_check"> Líneas Medias Dentarias                    </label>
                                                            </div>
                                                            <input type="text" id="ventaja_linea_dentaria_txt" name="ventaja_linea_dentaria_txt" class="form-control input-sm hide">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="no_border_top">Clase molar</th>
                                                        <td class="no_border_top">
                                                            <select class="form-control input-sm" name="clase_molar_d">
                                                                <option value="0">Tipo</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                            </select>
                                                        </td>
                                                        <td class="no_border_top border_right">
                                                            <select class="form-control input-sm" name="clase_molar_i">
                                                                <option value="0">Tipo</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                            </select>
                                                        </td>
                                                        <td class="no_border_top">Over jet:</td>
                                                        <td class="no_border_top border_right">
                                                            <div class="input-group margin_bottom">
                                                                <input type="text" name="ventaja_oj" class="form-control input-sm text-right">
                                                                <span class="input-group-addon">mm.</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="no_border_top">Clase canina</th>
                                                        <td class="no_border_top">
                                                            <select class="form-control input-sm" name="clase_canina_d">
                                                                <option value="0">Tipo</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                            </select>
                                                        </td>
                                                        <td class="no_border_top border_right">
                                                            <select class="form-control input-sm" name="clase_canina_i">
                                                                <option value="0">Tipo</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                            </select>
                                                        </td>
                                                        <td class="no_border_top">Periodo Ventana Derecha:</td>
                                                        <td class="no_border_top border_right">
                                                            <div class="input-group margin_bottom">
                                                                <input type="text" name="ventaja_d" class="form-control input-sm text-right">
                                                                <span class="input-group-addon">mm.</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="no_border_top">Mordida cruzada</th>
                                                        <td class="no_border_top">
                                                            <select class="form-control input-sm" name="clase_cruzada_d">
                                                                <option value="0">Tipo</option>
                                                                <option value="1">Posterior</option>
                                                                <option value="2">Anterior</option>
                                                            </select>
                                                        </td>
                                                        <td class="no_border_top border_right">
                                                            <select class="form-control input-sm" name="clase_cruzada_i">
                                                                <option value="0">Tipo</option>
                                                                <option value="1">Posterior</option>
                                                                <option value="2">Anterior</option>
                                                            </select>
                                                        </td>
                                                        <td class="no_border_top">Periodo Ventana Izquierda:</td>
                                                        <td class="no_border_top border_right">
                                                            <div class="input-group margin_bottom">
                                                                <input type="text" name="ventaja_i" class="form-control input-sm text-right">
                                                                <span class="input-group-addon">mm.</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="border_bottom">
                                                        <td class="no_border_top border_right" colspan="3"></td>
                                                        <td class="no_border_top">Necesidad de Segmentos:</td>
                                                        <td class="no_border_top border_right"><input type="text" name="necesidad_segmentos" class="form-control input-sm text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="border_right" colspan="3">Oclusión Anterior</th>
                                                        <th colspan="2">Modelo
                                                       <i class="glyphicon glyphicon-question-sign clickeable" id="help-modelo" data-content="Realizar marcas dentro del área de dibujo" rel="popover" data-placement="top" data-original-title="Dibujo" data-trigger="hover"></i>
                                                                <button type="button" class="btn btn-info btn-sm pull-right" id="clear-modelo">Limpiar</button>
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td class="no_border_top">Over bite:</td>
                                                        <td class="no_border_top border_right" colspan="2">
                                                            <div class="input-group margin_bottom" style="width:120px">
                                                                <input type="text" name="oclusion_ob" class="form-control input-sm text-right">
                                                                <span class="input-group-addon">mm.</span>
                                                            </div>
                                                        </td>
                                                        <td class="no_border_top" colspan="3" rowspan="7">
                                                            {{--  <input type="hidden" name="modelo_imagen" value="{&quot;lines&quot;:[[[173.72,59.91],[173.72,60.91],[171.72,60.91],[168.72,62.91],[162.72,67.91],[150.72,73.91],[138.72,81.91],[123.72,88.91],[109.72,95.91],[96.72,101.91],[86.72,107.91],[83.72,108.91],[80.72,110.91],[80.72,111.91]],[[98.72,70.91],[100.72,70.91],[101.72,70.91],[107.72,73.91],[116.72,76.91],[122.72,80.91],[134.72,85.91],[149.72,95.91],[172.72,107.91],[180.72,114.91],[190.72,119.91],[192.72,121.91],[193.72,121.91]],[[245.72,30.91],[245.72,31.91],[243.72,32.91],[242.72,34.91],[239.72,38.91],[234.72,43.91],[229.72,48.91],[225.72,52.91],[221.72,56.91],[219.72,59.91],[215.72,63.91],[214.72,64.91]],[[233.72,30.91],[233.72,32.91],[233.72,40.91],[234.72,42.91],[235.72,49.91],[235.72,54.91],[235.72,57.91],[235.72,59.91],[235.72,60.91]]]}">  --}}
                                                            <input type="hidden" name="modelo_imagen" value="">
                                                            <div id="modelo_imagen" class="kbw-signature"><canvas width="318" height="215"></canvas></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no_border_top">Over jet:</td>
                                                        <td class="no_border_top border_right" colspan="2">
                                                            <div class="input-group margin_bottom" style="width:120px">
                                                                <input type="text" name="oclusion_oj" class="form-control input-sm text-right">
                                                                <span class="input-group-addon">mm.</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr><td class="no_border_top" colspan="3"></td></tr>
                                                    <tr><td class="no_border_top" colspan="3"></td></tr>
                                                    <tr><td class="no_border_top" colspan="3"></td></tr>
                                                    <tr><td class="no_border_top" colspan="3"></td></tr>
                                                    <tr><td class="no_border_top" colspan="3"></td></tr>
                                                </tbody>
                                            </table>
                                            <div class="barra_titulo">
                                                <h5 class="color_dd_title">Mucosas</h5>
                                            </div>
                                            <div class="col-md-12 padding_top padding_bottom">
                                                <div class="row">
                                                    <div class="col-md-4">Biotipo Gingival</div>
                                                    <div class="col-md-4">
                                                        <select name="biotipo_gingival" class="form-control input-sm margin_bottom">
                                                            <option value="0">Seleccione Biotipo Gingival</option>
                                                            <option value="1">Fino</option>
                                                            <option value="2">Mediano</option>
                                                            <option value="3">Grueso</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" id="gingivitis" name="gingivitis" class="mucosas_check"> Gingivitis</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" id="gingivitis_txt" name="gingivitis_txt" class="form-control input-sm hide">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" id="perio_inflamado" name="perio_inflamado" class="mucosas_check"> Enf. periodontal inflam.</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" id="perio_inflamado_txt" name="perio_inflamado_txt" class="form-control input-sm hide">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" id="no_inflamado" name="no_inflamado" class="mucosas_check"> No inflam.</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" id="no_inflamado_txt" name="no_inflamado_txt" class="form-control input-sm hide">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" id="ret_gingivales" name="ret_gingivales" class="mucosas_check"> Retracciones gingivales</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" id="ret_gingivales_txt" name="ret_gingivales_txt" class="form-control input-sm hide">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Comentarios:</label>
                                                <textarea name="comentarios" class="form-control input-sm margin_bottom" rows="3" placeholder="Comentarios"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ODONTOGRAMA-->
                        <div class="tab-pane fade" id="odonto_adulto" role="tabpanel" aria-labelledby="odonto_adulto-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="odon_adults_tab" data-toggle="tab" href="#odon_adults" role="tab" aria-controls="odon_adults" aria-selected="true">Odontograma Adulto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="odon_infts_tab" data-toggle="tab" href="#odon_infts" role="tab" aria-controls="odon_infts" aria-selected="false">Odontograma Infantil</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="gral_od_adulto">
                                                            <!-ADULTO-->
                                                            <div class="tab-pane fade active show " id="odon_adults" role="tabpanel" aria-labelledby="odon_adults_tab">
                                                                @include('atencion_odontologica.generales.odontograma_adulto')
                                                            </div>
                                                            <!-NIÑOS-->
                                                            <div class="tab-pane fade" id="odon_infts" role="tabpanel" aria-labelledby="odon_infts_tab">
                                                                @include('atencion_odontologica.generales.odontograma_infantil')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ODONTOGRAMA--->

                        <!-- PSR-->
                        <div class="tab-pane fade" id="psr_odonto" role="tabpanel" aria-labelledby="psr_odonto-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="periodon_adults_tab" data-toggle="tab" href="#periodon_adults" role="tab" aria-controls="periodon_adults" aria-selected="true">Periodontograma Adulto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="periodon_infts_tab" data-toggle="tab" href="#periodon_infts" role="tab" aria-controls="periodon_infts" aria-selected="false">Periodontograma Infantil</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="gral_od_adulto">
                                                            <!-ADULTO-->
                                                            <div class="tab-pane fade active show " id="periodon_adults" role="tabpanel" aria-labelledby="periodon_adults_tab">
                                                                @include('atencion_odontologica.generales.periodontograma_ad')
                                                            </div>
                                                            <!-NIÑOS-->
                                                            <div class="tab-pane fade" id="periodon_infts" role="tabpanel" aria-labelledby="periodon_infts_tab">
                                                                @include('atencion_odontologica.generales.periodontograma_inf')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="prueba" role="tabpanel" aria-labelledby="prueba_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">



                                                    </div>





                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  <div class="tab-pane fade" id="periodontograma" role="tabpanel" aria-labelledby="periodontograma_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="eval_adults_tab" data-toggle="tab" href="#eval_adults" role="tab" aria-controls="eval_adults" aria-selected="true">Grupo 1</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_infts_tab" data-toggle="tab" href="#eval_infts" role="tab" aria-controls="eval_infts" aria-selected="false">Grupo 2</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_infts_tab" data-toggle="tab" href="#eval_infts" role="tab" aria-controls="eval_infts" aria-selected="false">Grupo 3</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_infts_tab" data-toggle="tab" href="#eval_infts" role="tab" aria-controls="eval_infts" aria-selected="false">Grupo 4</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_infts_tab" data-toggle="tab" href="#eval_infts" role="tab" aria-controls="eval_infts" aria-selected="false">Grupo 5</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_infts_tab" data-toggle="tab" href="#eval_infts" role="tab" aria-controls="eval_infts" aria-selected="false">Grupo 6</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="periodontogramal_od_adulto">
                                                            <!-ADULTO-->
                                                            <div class="tab-pane fade active show " id="eval_adults" role="tabpanel" aria-labelledby="eval_adults_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">

                                                                                    <div class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                           <div class="form-row">
                                                                                                @include('atencion_odontologica.generales.periodontograma_grupo 1')
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-NIÑOS-->
                                                            <div class="tab-pane fade" id="eval_infts" role="tabpanel" aria-labelledby="eval_infts_tab">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  --}}

                        <!-- EVALUACION-->
                        <div class="tab-pane fade" id="evaluacion_general" role="tabpanel" aria-labelledby="evaluacion_general_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="eval_adults_tab" data-toggle="tab" href="#eval_adults" role="tab" aria-controls="eval_adults" aria-selected="true">Adulto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_infts_tab" data-toggle="tab" href="#eval_infts" role="tab" aria-controls="eval_infts" aria-selected="false">Evaluación  Infantil</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="gral_od_adulto">
                                                            <!-ADULTO-->
                                                            <div class="tab-pane fade active show " id="eval_adults" role="tabpanel" aria-labelledby="eval_adults_tab">
                                                                @include('atencion_odontologica.generales.evaluacion_adulto')
                                                            </div>
                                                            <!-NIÑOS-->
                                                            <div class="tab-pane fade" id="eval_infts" role="tabpanel" aria-labelledby="eval_infts_tab">
                                                                @include('atencion_odontologica.generales.evaluacion_infantil')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: EVALUACION--->

                        <!-- TRATAMIENTO-->
                        <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento_tab">
                            @include('atencion_odontologica.generales.tratamiento_presup')
                        </div>
                        <!--CIERRE: TRATAMIENTO--->

                        <!--CIERRE: PRESUPUESTO--->
                        <div class="tab-pane fade" id="presupuesto" role="tabpanel" aria-labelledby="presupuesto_tab">
                            @include('atencion_odontologica.generales.presupuesto')
                        </div>
                        <!--CIERRE: PRESUPUESTO--->
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@include('atencion_odontologica.modals.odontograma.tratamiento_boca_completa')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_inferior')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_superior')
@include('atencion_odontologica.modals.odontograma.tratamiento_laboratorio')
@include('atencion_odontologica.modals.odontograma.modal_odontograma')

@include('atencion_odontologica.modals.infantil.tratamiento_boca_completainf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_inferiorinf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_superiorinf')




<script>
    $(document).ready(function() {
        $('#tabla_odontologico_tratamiento').DataTable({
        responsive: true,
    });
    });

    $(document).ready(function() {
        $('#tabla_odontologicos_pieza').DataTable({
        responsive: true,
    });
    });

    $(document).ready(function () {
        $('#tabla_aranceles').DataTable({
            responsive: true,
        });
    });
</script>
@section('page-script-ficha-atencion')
    <script>
        $(document).ready(function() {

            /* formatear rut */
            $("#solicitado_por_rut_rfl").rut({
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
        var myDropzone ;
        Dropzone.options.misImagenes = {
            init:function()
            {
                myDropzone = this;
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
                cargar_lista_imagenes();

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
                cargar_lista_imagenes();
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };



        var lista_imagenes = [];
        function cargar_lista_imagenes()
        {
            // console.log('--------------cargar_lista_imagenes----------------------');
            lista_imagenes = [];
            let temp  = myDropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined)
                    {
                        var img_temp = JSON.parse(value.xhr.response);
                        lista_imagenes[index] = [
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

            // let actual = $('#'+input);
            // let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            // equivalente.val(actual.val());

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

        function abrir_modal_guardar_tipo()
        {
            $('#modal_registrar_ficha_tipo_orl').modal('show');
            cargarSeccion('registro_f_t_orl_detalle');
        }

        function cargarSeccion(div_destino)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            var seccion_actual = '';
            var seccion_previa = '';
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){


                html ='';

                // if(seccion_previa == '' && seccion_actual == '')
                if(key == 0)
                {
                    seccion_actual = $(elemento).data('seccion').trim();
                    seccion_previa = $(elemento).data('seccion').trim();

                    html +='<hr>';
                    html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                    html +='<hr>';
                }
                else
                {
                    if($(elemento).data('seccion'))
                    seccion_actual = $(elemento).data('seccion').trim();
                }

                if(seccion_actual == seccion_previa)
                {
                    html +='<hr>';
                    html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                    html +='<hr>';
                }

                html +='<div class="row" style="margin-top:10px;">';
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-5">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                    html +='<div class="col-md-2"></div>';
                }
                else if($(elemento).prop('nodeName') == 'TEXTAREA')
                {
                    if($(elemento).data('tipo'))
                        html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                    else
                        html +='<div class="col-md-5">Detalle</div>';
                    html +='<div class="col-md-5">';
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
                seccion_previa = $(elemento).data('seccion');
            });
        }

        function cambiar_div(mostrar, ocultar, label, textarea)
        {
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }

        function guardar_tipo_ficha_otorrino()
        {
            var registro_f_t_orl_nombre = $('#registro_f_t_orl_nombre').val();
            var registro_f_t_orl_descripcion = $('#registro_f_t_orl_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_orl_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_orl_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_orl_nombre = registro_f_t_orl_nombre;
            data.registro_f_t_orl_descripcion = registro_f_t_orl_descripcion;

            $('#registro_f_t_orl_detalle').find('input,textarea').each(function(key, elemento){
                //console.log($(elemento).attr('id'));
                //console.log($(elemento).val());
                //console.log($(elemento).prop('nodeName'));
                //console.log('*******');

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            console.log(data);

            url = "{{ route('profesional.ficha_tipo_otorrino') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional').val(),

                    modal_agregar_tipo_apreciacion_auditiva :  data.modal_agregar_tipo_apreciacion_auditiva,
                    modal_agregar_tipo_apreciacion_resp :  data.modal_agregar_tipo_apreciacion_resp,
                    modal_agregar_tipo_disfonia :  data.modal_agregar_tipo_disfonia,
                    modal_agregar_tipo_ex_boca :  data.modal_agregar_tipo_ex_boca,
                    modal_agregar_tipo_examen_bio_od :  data.modal_agregar_tipo_examen_bio_od,
                    modal_agregar_tipo_examen_bio_oi :  data.modal_agregar_tipo_examen_bio_oi,
                    modal_agregar_tipo_examen_faringe :  data.modal_agregar_tipo_examen_faringe,
                    modal_agregar_tipo_examen_fnd :  data.modal_agregar_tipo_examen_fnd,
                    modal_agregar_tipo_examen_fni :  data.modal_agregar_tipo_examen_fni,
                    modal_agregar_tipo_examen_laringe :  data.modal_agregar_tipo_examen_laringe,
                    modal_agregar_tipo_examen_od :  data.modal_agregar_tipo_examen_od,
                    modal_agregar_tipo_examen_oi :  data.modal_agregar_tipo_examen_oi,
                    modal_agregar_tipo_nariz_general :  data.modal_agregar_tipo_nariz_general,
                    modal_agregar_tipo_usa_audifono :  data.modal_agregar_tipo_usa_audifono,
                    observaciones_aprec_auditiva_def :  data.observaciones_aprec_auditiva_def,
                    observaciones_aprec_resp_def :  data.observaciones_aprec_resp_def,
                    observaciones_audifono :  data.observaciones_audifono,
                    observaciones_det_disfonia :  data.observaciones_det_disfonia,
                    observaciones_det_nariz_general :  data.observaciones_det_nariz_general,
                    observaciones_detalle_ex_boca :  data.observaciones_detalle_ex_boca,
                    observaciones_ex_farige_anormal :  data.observaciones_ex_farige_anormal,
                    observaciones_ex_fnd_anormal :  data.observaciones_ex_fnd_anormal,
                    observaciones_ex_fni_anormal :  data.observaciones_ex_fni_anormal,
                    observaciones_ex_larige_anormal :  data.observaciones_ex_larige_anormal,
                    observaciones_ex_od_anormal :  data.observaciones_ex_od_anormal,
                    observaciones_ex_oi_anormal :  data.observaciones_ex_oi_anormal,
                    observaciones_obs_ex_biom :  data.observaciones_obs_ex_biom,
                    observaciones_obs_ex_nasal :  data.observaciones_obs_ex_nasal,
                    observaciones_obs_ex_oidos :  data.observaciones_obs_ex_oidos,
                    observaciones_obs_ex_orl :  data.observaciones_obs_ex_orl,
                    observaciones_obs_examen_bio_od :  data.observaciones_obs_examen_bio_od,
                    observaciones_obs_examen_bio_oi :  data.observaciones_obs_examen_bio_oi,
                    observaciones_obs_examen_laringe :  data.observaciones_obs_examen_laringe,
                    registro_f_t_orl_descripcion :  data.registro_f_t_orl_descripcion,
                    registro_f_t_orl_nombre :  data.registro_f_t_orl_nombre,

                    modal_agregar_tipo_episodios: data.modal_agregar_tipo_episodios,
                    observaciones_detalle_episodios: data.observaciones_detalle_episodios,
                    modal_agregar_tipo_equilibrio: data.modal_agregar_tipo_equilibrio,
                    observaciones_detalle_equilibrio: data.observaciones_detalle_equilibrio,
                    modal_agregar_tipo_ng: data.modal_agregar_tipo_ng,
                    observaciones_detalle_ng: data.observaciones_detalle_ng,
                    modal_agregar_tipo_sint_acomp: data.modal_agregar_tipo_sint_acomp,
                    observaciones_detalle_sint_acompanantes: data.observaciones_detalle_sint_acompanantes,
                    modal_agregar_tipo_vertigo: data.modal_agregar_tipo_tipo_vertigo,
                    observaciones_detalle_tipo_vertigo: data.observaciones_detalle_tipo_vertigo,
                    observaciones_vestibular: data.observaciones_obs_vestibular,
                },
            })
            .done(function(data)
            {
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_orl').modal('hide');
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

        function cargar_info_ficha_tipo_orl(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-otorrino').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
                evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
                evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
                evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
                evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
                evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);
                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_otorrino') }}";
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
                        // console.log(index);
                        // console.log(value);
                        // console.log($('#'+index));

                        if(index == 'id_usa_audifono')
                            index = 'usa_audifono';

                        if(index == 'id_tipo_episodios')
                            index = 'episodios';

                        if(index == 'id_tipo_equilibrio')
                            index = 'equilibrio';

                        if(index == 'id_tipo_ng')
                            index = 'ng';

                        if(index == 'id_tipo_sint_acomp')
                            index = 'sint_acomp';

                        if(index == 'id_tipo_vertigo')
                            index = 'tipo_vertigo';

                        if(index == 'obs_tipo_vertigo')
                            index = 'detalle_tipo_vertigo';

                        if(index == 'obs_sint_acomp')
                            index = 'detalle_sint_acompanantes';

                        if(index == 'obs_ng')
                            index = 'detalle_ng';

                        if(index == 'obs_episodios')
                            index = 'detalle_episodios';

                        if(index == 'obs_equilibrio')
                            index = 'detalle_equilibrio';



                        $('#'+index).val(value);
                    });

                    evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                    evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                    evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                    evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                    evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                    evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                    evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
                    evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
                    evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
                    evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
                    evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
                    evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                    evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                    evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                    evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                    evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                    evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                    evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                    evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);

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

        /** PERVISUALIZACION DE EXAMEN */
        function visualizar_pdf_examen(tipo_examen)
        {
            if(tipo_examen!='')
            {
                var array_datos = {};
                $('.div_form_examen_'+tipo_examen).find('input,textarea,select').each(function (key, element){
                    array_datos[element.id] = element.value;
                });

                var imagenes = $('#input_lista_imagenes').val();
                if(imagenes != '')
                {
                    imagenes = JSON.stringify(imagenes);
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

    <script>
        /* Ponemos "agregarPieza" en el ámbito de toda la página */
        function agregarPieza(){
            var html = '';
            html += '<div id="pieza_dental" class="row">';
            html += '    <div class="form-row">';
            html += '        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Pieza N°</label>';
            html += '                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">';
            html += '            </div>';
            html += '        </div>';
            html += '    </div>';
            html += '    <div class="form-row">';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Resp.Calor</label>';
            html += '                <select id="sel_endo_resp_calor" name="sel_endo_resp_calor" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Resp.Frio</label>';
            html += '                <select id="sel_endo_resp_frio" name="sel_endo_resp_frio" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Eléctrico</label>';
            html += '                <select id="sel_endo_resp_elect" name="sel_endo_resp_elect" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Percusión</label>';
            html += '                <select id="sel_endo_resp_perc" name="sel_endo_resp_perc" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Exploración</label>';
            html += '                <select id="sel_endo_resp_expl" name="sel_endo_resp_expl" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Cavitaria</label>';
            html += '                <select id="sel_endo_cavitaria" name="sel_endo_cavitaria" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '       ';
            html += '    </div>';
            html += '</div>';

            $('#contenedor_pieza_dental_endo').append(html);
        } // agregarPieza

        $(document).ready(function(){
            /* Sacar la funcion "agregarPieza de este ámbito */
            $('.btn-agregar-pieza').click(function(){
                agregarPieza();
            });
        });
        function agregarPieza1(){
            var html = '';
            html += '<hr>';
            html += '<div id="pieza_dental_dolor" class="row">';
            html += '    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
            html += '    <div class="form-row">';
            html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '                <label class="floating-label-activo-sm">Pieza N°</label>';
            html += '                <input type="text" class="form-control form-control-sm" name="" id="">';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Tipo de Dolor</label>';
            html += '                    <select name="tipo_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="tipo_dolor" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Espontáneo</option>';
            html += '                        <option value="2">Provocado</option>';
            html += '                        <option value="3">Otro describir</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_tipo_dolor" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Tipo de dolor</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor" id="obs_tipo_dolor"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Intensidad</label>';
            html += '                    <select name="intensidad" data-titulo="Ex_cuello" data-seccion="Cuello"  id="intensidad" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Leve</option>';
            html += '                        <option value="2">Moderado</option>';
            html += '                        <option value="3">Intenso</option>';
            html += '                        <option value="4">Otro describir</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_intensidad" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Intensidad</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad" id="obs_intensidad"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Modo dolor</label>';
            html += '                    <select name="modo_dolor" data-titulo="Ex_cuello" data-seccion="Cuello"  id="modo_dolor" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Pulsátil</option>';
            html += '                        <option value="2">Permanente</option>';
            html += '                        <option value="3">Otro describir</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_modo_dolor" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Modo dolor</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor" id="obs_modo_dolor"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Localización</label>';
            html += '                    <select name="loc_dolor" data-titulo="Ex_cuello" data-seccion="Cuello"  id="loc_dolor" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Localizado</option>';
            html += '                        <option value="2">Referido</option>';
            html += '                        <option value="3">Otro describir</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_loc_dolor" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Localización</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor" id="obs_loc_dolor"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Provocación del Dolor</label>';
            html += '                    <select name="provocacion_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Frío</option>';
            html += '                        <option value="2">Calor</option>';
            html += '                        <option value="3">Actividad</option>';
            html += '                        <option value="4">Masticación</option>';
            html += '                        <option value="5">Otro describir</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_provocacion_dolor" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Provocación del Dolor</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor" id="obs_provocacion_dolor"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="form-row">';
            html += '            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Cuando duele</label>';
            html += '                    <select name="cdo_duele" data-titulo="Ex_cuello" data-seccion="Cuello"  id="cdo_duele" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Palpación</option>';
            html += '                        <option value="2">Decubito</option>';
            html += '                        <option value="3">Otro describir</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_cdo_duele" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Cuando duele</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cdo_duele" id="obs_cdo_duele"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Tpo Evolución</label>';
            html += '                    <select name="tpo_evolucion" data-titulo="Ex_cuello" data-seccion="Cuello"  id="tpo_evolucion" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Menos de 1 Semana</option>';
            html += '                        <option value="2">Más de 1 Semana</option>';
            html += '                        <option value="3">Otro describir</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_tpo_evolucion" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Tpo Evolución</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_evolucionr" id="obs_tpo_evolucion"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Efecto Analgésicos</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor" id="obs_loc_dolor"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '        </div>';
            html += '    </div>';
            html += '</div>';

            $('#contenedor_pieza_dental_endodolor').append(html);
        } // agregarPieza

        $(document).ready(function(){
            /* Sacar la funcion "agregarPieza de este ámbito */
            $('.btn-agregar-pieza1').click(function(){
                agregarPieza1();
            });
        });
        function agregarPieza2(){
            var html = '';
            html += '<hr>';
            html += '<div id="pieza_dental_dolor" class="row">';
            html += '    <div class="col-sm-12 col-md-12 col-xl-12">';
             html += '   <div class="tab-content" id="v-pills-tabContent">';
             html += '       <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>';
             html += '           <div class="col-sm-12 col-md-12">';
             html += '               <div class="form-row">';
             html += '                   <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
             html += '                       <div class="form-group">';
             html += '                           <label class="floating-label-activo-sm">Pieza N°</label>';
             html += '                           <input type="text" class="form-control form-control-sm">';
             html += '                       </div>';
             html += '                   </div>';
             html += '                   <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
             html += '                       <div class="form-group">';
             html += '                           <label class="floating-label-activo-sm">Tipo de Tratamiento</label>';
             html += '                           <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" >';
             html += '                               <option selected  value="1">Uniradicular</option>';
             html += '                               <option value="2">Biradicular</option>';
             html += '                               <option value="2">Triradicular</option>';
             html += '                           </select>';
             html += '                       </div>';
             html += '                       <div class="form-group" id="div_piel_tegumnto" style="display:none;">';
             html += '                           <label class="floating-label-activo-sm">Tipo de Tratamiento</label>';
             html += '                           <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>';
             html += '                       </div>';
             html += '                   </div>';
             html += '                   <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
             html += '                       <div class="form-group">';
             html += '                           <label class="floating-label-activo-sm">Convenio</label>';
             html += '                           <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">';
             html += '                               <option selected  value="1">Convenio</option>';
             html += '                               <option value="2">Sin Convenio</option>';
             html += '                           </select>';
             html += '                       </div>';
             html += '                   </div>';
             html += '                   <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
             html += '                       <div class="form-group">';
             html += '                           <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> Cargar a presupuesto</button>';
             html += '                       </div>';
             html += '                   </div>';
             html += '               </div>';
             html += '           </div>';
             html += '       </div>';
             html += '</div>';

                $('#contenedor_pieza_plan_endo').append(html);
            } // agregarPieza
        $(document).ready(function(){
            /* Sacar la funcion "agregarPieza de este ámbito */
            $('.btn-agregar-pieza2').click(function(){
                agregarPieza2();
            });
        });

        function agregarPieza3(){
            var html = '';
            html += '<hr>';
            html += ' <div id="pieza_dentalrx" class="row">';
            html += '     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
            html += '         <div class="form-row">';
            html += '             <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '                 <div class="form-group">';
            html += '                     <label class="floating-label-activo-sm">Pieza N°</label>';
            html += '                     <input class="form-control form-control-sm" type="text" name=""id="">';
            html += '                 </div>';
            html += '             </div>';
            html += '             <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">';
            html += '                 <div class="form-group">';
            html += '                     <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>';
            html += '                     <select name="rx_esp_peri_apical" id="rx_esp_peri_apical" data-titulo="Rx_endo" data-seccion="endo_rx" class="form-control form-control-sm" >';
            html += '                         <option value="0">Seleccione</option>';
            html += '                         <option value="1">Normal</option>';
            html += '                         <option value="2">Engrosado</option>';
            html += '                         <option value="3">Ausente</option>';
            html += '                         <option value="4">Otro</option>';
            html += '                     </select>';
            html += '                 </div>';
            html += '                 <div class="form-group"   id="div_detalle_rx_esp_peri_apical" style="display:none">';
            html += '                     <label class="floating-label-activo-sm">Espacio Periodontal Apical<i>(describir)</i></label>';
            html += '                     <select name="h_apical" id="h_apical" data-titulo="Rx endodoncia" data-seccion="endo_rx" class="form-control form-control-sm">';
            html += '                         <textarea class="form-control caja-texto form-control-sm" data-titulo="Rx endodoncia" data-seccion=endo_rx"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_rx_esp_peri_apical" id="det_rx_esp_peri_apical"></textarea>';
            html += '                 </div>';
            html += '             </div>';
            html += '             <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">';
            html += '                 <div class="form-group">';
            html += '                     <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>';
            html += '                     <select name="h_apical" id="h_apical" data-titulo="Rx endodoncia" data-seccion="endo_rx" class="form-control form-control-sm">';
            html += '                         <option value="0">Seleccione</option>';
            html += '                         <option value="1">Normal</option>';
            html += '                         <option value="2">Zona apical Difusa</option>';
            html += '                         <option value="3">Zona apical Corticalizada</option>';
            html += '                         <option value="4">Osteítis Condensante</option>';
            html += '                         <option value="5">Otro<i>(describir)</i></option>';
            html += '                     </select>';
            html += '                 </div>';
            html += '                 <div class="form-group"  id="div_detalle_h_apical" style="display:none">';
            html += '                     <label class="floating-label-activo-sm">Hueso Alveolar Apical<i>(describir)</i></label>';
            html += '                     <textarea class="form-control caja-texto form-control-sm" data-titulo="Rx endodoncia" data-seccion="endo_rx" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical" id="aprec_h_apical"></textarea>';
            html += '                 </div>';
            html += '             </div>';
            html += '         </div>';
            html += '         <div class="form-row">';
            html += '             <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">';
            html += '                 <div class="form-group">';
            html += '                         <label class="floating-label-activo-sm">Observaciones Examen Pieza</label>';
            html += '                         <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Rx endodoncia" data-seccion="endo_rx" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>';
            html += '                 </div>';
            html += '             </div>';
            html += '             <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '                 <div class="form-group">';
            html += '                     <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-rx_pieza" ><i class="fas fa-save"></i> Cargar Otra Pieza</button>';
            html += '                 </div>';
            html += '             </div>';
            html += '         </div>';
            html += '     </div>';
            html += ' </div>';

                $('#contenedor_pieza_dental_endorx').append(html);
            } // agregarPieza
        $(document).ready(function(){
            /* Sacar la funcion "agregarPieza de este ámbito */
            $('.btn-agregar-pieza3').click(function(){
                agregarPieza3();
            });
        });
    </script>

@endsection
