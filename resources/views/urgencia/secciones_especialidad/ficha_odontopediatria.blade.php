<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">

            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_dent_endo_tab" data-toggle="tab" href="#atencion_dent_endo" role="tab" aria-controls="atencion_dent_endo" aria-selected="true">Atención especialidad</a>
                    </li>

                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="odontograma_ped_tab" data-toggle="tab" href="#odontograma_ped" role="tab" aria-controls="odontograma_ped" aria-selected="false">Odontograma Pediátrico</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="periodontograma_tab" data-toggle="tab" href="#periodontograma" role="tab" aria-controls="periodontograma" aria-selected="false">PSR</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="eva_ped_tab" data-toggle="tab" href="#eva_ped" role="tab" aria-controls="eva_ped" aria-selected="false">Caras y cuadrantes</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tratamiento_tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento/Presupuesto</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="presupuesto_tab" data-toggle="tab" href="#presupuesto" role="tab" aria-controls="presupuesto" aria-selected="false">Presupuesto</a>
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
                    <div class="tab-content" id="od_endo-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_dent_endo" role="tabpanel" aria-labelledby="atencion_dent_endo_tab">
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
                            <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_esp">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                            Examen especialidad Odontopediatría
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
                                                                <a class="nav-link-aten text-reset" id="ex_oral_ex_morfologico-tab" data-toggle="tab" href="#ex_oral_ex_morfologico" role="tab" aria-controls="ex_oral_ex_morfologico" aria-selected="true">Examen Morfológico</a>
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
                                                            <div class="tab-pane fade show" id="ex_oral_ex_morfologico" role="tabpanel" aria-labelledby="ex_oral_ex_morfologico_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset backdrop:active" id="morf_habitos_tab" data-toggle="tab" href="#morf_habitos" role="tab" aria-controls="morf_habitos" aria-selected="false">Habitos</a>
                                                                                            <a class="nav-link-aten text-reset " id="atm_tab" data-toggle="tab" href="#atm" role="tab" aria-controls="atm" aria-selected="true">ATM</a>
                                                                                            <a class="nav-link-aten text-reset" id="oclusion_tab" data-toggle="tab" href="#oclusion" role="tab" aria-controls="oclusion" aria-selected="false">Oclusión</a>
                                                                                            <a class="nav-link-aten text-reset" id="radiologia_oped_tab" data-toggle="tab" href="#radiologia_oped" role="tab" aria-controls="radiologia_oped" aria-selected="false">Ex. Rx. Panorámico</a>
                                                                                            <a class="nav-link-aten text-reset" id="fotos_oped_tab" data-toggle="tab" href="#fotos_oped" role="tab" aria-controls="fotos_oped" aria-selected="false">Fotos</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="morf_habitos" role="tabpanel" aria-labelledby="morf_habitos_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Bruxismo</label>
                                                                                                                <select name="op_bruxismo" id="op_bruxismo" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_bruxismo','div_detalle_op_bruxismo','det_op_bruxismo',4)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">SI</option>
                                                                                                                    <option value="2">NO</option>
                                                                                                                    <option value="3">NO SABE</option>
                                                                                                                    <option value="4">OTRO<label><i>(describir)</i></label></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_op_bruxismo" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otro General<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_op_bruxismo" id="det_op_bruxismo"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Sueño</label>
                                                                                                                <select name="op_sueno" id="op_sueno" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_sueno','div_detalle_op_sueno','aprec_op_sueno',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_op_sueno" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Sueño<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_op_sueno" id="aprec_op_sueno"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Respiración</label>
                                                                                                                <select name="op_resp" id="op_resp" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_resp','div_detalle_op_resp','det_op_resp',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_op_resp" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Deficiencia<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_op_resp" id="det_op_resp"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Interposición Lingual</label>
                                                                                                                <select name="op_interpling" id="op_interpling" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_interpling','div_detalle_op_interpling','aprec_op_interpling',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Noe</option>
                                                                                                                    <option value="2">Si</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_op_interpling" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Interposición Lingual<i>(describir) Tipo</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_op_interpling" id="aprec_op_interpling"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> + Solicitar Rx de cavum Rinofaríngeo</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> + Solicitar ic a Otorrinolaringólogo</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> + Solicitar ic a Fonoaudiólogo</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> + Solicitar ic a Otra Especialidad Dental</button>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show " id="atm" role="tabpanel" aria-labelledby="atm_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">ATM (Función)</label>
                                                                                                                <select name="op_atm" id="op_atm" data-titulo="ATM" data-seccion="ATM" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_atm','div_detalle_op_atm','det_op_atm',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Función Normal</option>
                                                                                                                    <option value="2">Función Alterada</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_op_atm" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Función Alterada <i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="ATM (Función)" data-seccion="ATM"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_op_atm" id="det_op_atm"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Asimetrías</label>
                                                                                                                <select name="op_asim_atm" id="op_asim_atm" data-titulo="Asimetrías" data-seccion="ATM" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_asim_atm','div_detalle_op_asim_atm','aprec_op_asim_atm',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">NO</option>
                                                                                                                    <option value="2">SI</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_op_asim_atm" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Asimetrías<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Asimetrías<i>(describir)" data-seccion="ATM" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_op_asim_atm" id="aprec_op_asim_atm"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Resalte</label>
                                                                                                                <select name="op_resalte_atm" id="op_resalte_atm" data-titulo="Resalte" data-seccion="ATM" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_resalte_atm','div_detalle_op_resalte_atm','det_op_resalte_atm',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">NO</option>
                                                                                                                    <option value="2">SI</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_op_resalte_atm" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Resalte<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Resalte<i>(describir)" data-seccion="ATM"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_op_resalte_atm" id="det_op_resalte_atm"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Dolor</label>
                                                                                                                <select name="op_dolor_atm" id="op_dolor_atm" data-titulo="Dolor" data-seccion="ATM" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_dolor_atm','div_detalle_op_dolor_atm','aprec_op_dolor_atm',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">NO</option>
                                                                                                                    <option value="2">SI</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_op_dolor_atm" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Dolor<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Dolor Descripción" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_op_dolor_atm" id="aprec_op_dolor_atm"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show " id="oclusion" role="tabpanel" aria-labelledby="oclusion_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-6 col-md-6 col-xl-6">
                                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" >
                                                                                                            <a class="nav-link-aten text-reset backdrop:active" id="dent_temp_tab" data-toggle="tab" href="#dent_temp" role="tab" aria-controls="dent_temp" aria-selected="false">Dentición Temporal</a>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6 col-md-6 col-xl-6">
                                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" >
                                                                                                            {{--  <a class="nav-link-aten text-reset backdrop:active" id="dent_temp_tab" data-toggle="tab" href="#dent_temp" role="tab" aria-controls="dent_temp" aria-selected="false">Dentición Temporal</a>  --}}
                                                                                                            <a class="nav-link-aten text-reset " id="dent_permanente_tab" data-toggle="tab" href="#dent_permanente" role="tab" aria-controls="dent_permanente" aria-selected="true">Dentición Permanente</a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                                            <div class="tab-pane fade show active" id="dent_temp" role="tabpanel" aria-labelledby="dent_temp_tab">
                                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                                    <div class="form-row">
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Tipo Oclusión</label>
                                                                                                                                <select name="escalon" id="escalon" data-titulo="Escalón" data-seccion="Oclusión Temporal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('escalon','div_detalle_escalon','det_escalon',4)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">plano terminal recto</option>
                                                                                                                                    <option value="2">escalón mesial</option>
                                                                                                                                    <option value="3">escalón distal</option>
                                                                                                                                    <option value="4">Otras Observaciones</option>
                                                                                                                                </select>

                                                                                                                            </div>
                                                                                                                            <div class="form-group"   id="div_detalle_escalon" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Detalle Escalón<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Escalón" data-seccion="Oclusión Temporal"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_escalon" id="det_escalon"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Tipo de Mordída</label>
                                                                                                                                <select name="tpo_mord" id="tpo_mord" data-titulo="Tipo mordida" data-seccion="Oclusión Temporal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_mord','div_detalle_tpo_mord','aprec_tpo_mord',5)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">Normal</option>
                                                                                                                                    <option value="2">Invertida</option>
                                                                                                                                    <option value="3">Mordida cruzada Derecha </option>
                                                                                                                                    <option value="4">Mordida cruzada Izquierda </option>
                                                                                                                                    <option value="5">Otras Observaciones</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"  id="div_detalle_tpo_mord" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Tipo de Mordída<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Tipo mordida" data-seccion="Oclusión Temporal" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_tpo_mord" id="aprec_tpo_mord"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Piezas supernumerarias</label>
                                                                                                                                <select name="supernum" id="supernum" data-titulo="supernumerarias" data-seccion="Oclusión Temporal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('supernum','div_detalle_supernum','det_supernum',2)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">NO</option>
                                                                                                                                    <option value="2">SI</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"   id="div_detalle_supernum" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">supernumerarias<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.supernumerarias" data-seccion="Oclusión Temporal"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_supernum" id="det_supernum"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Otras Anomalías</label>
                                                                                                                                <select name="ot_anomalias" id="ot_anomalias" data-titulo="Otras Anomalías" data-seccion="Oclusión Temporal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ot_anomalias','div_detalle_ot_anomalias','aprec_ot_anomalias',2)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">NO</option>
                                                                                                                                    <option value="2">SI</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"  id="div_detalle_ot_anomalias" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Otras Anomalías<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo=" Obs.Otras Anomalías" data-seccion="Oclusión Temporal" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_ot_anomalias" id="aprec_ot_anomalias"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="tab-pane fade show " id="dent_permanente" role="tabpanel" aria-labelledby="dent_permanente_tab">
                                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                                    <div class="form-row">
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Tipo Oclusión</label>
                                                                                                                                <select name="intra_general" id="intra_general" data-titulo="Tipo Oclusión" data-seccion="Dentición Permanente" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intra_general','div_detalle_intra_general','det_intra_general',2)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">Clase I de Angle</option>
                                                                                                                                    <option value="2">Clase II de Angle</option>
                                                                                                                                    <option value="3">Clase III de Angle</option>
                                                                                                                                    <option value="4">Observaciones</option>
                                                                                                                                </select>

                                                                                                                            </div>
                                                                                                                            <div class="form-group"   id="div_detalle_intra_general" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Observaciones<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_intra_general" id="det_intra_general"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Asimetrías</label>
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
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Otro</label>
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
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Otro</label>
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

                                                                                                            <div class="form-row">
                                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                    <label class="floating-label-activo-sm">Observaciones Examen Oclusión</label>
                                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="radiologia_oped" role="tabpanel" aria-labelledby="radiologia_oped_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Tipo radiología</label>
                                                                                                                <select name="aum_vol" id="aum_vol" data-titulo="radiología" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aum_vol','div_detalle_aum_vol','ex_aum_vol',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Panorámica</option>
                                                                                                                    <option value="2">Dental Simple<i>(describir pieza)</i></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_aum_vol" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Aumento de Volumen<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_aum_vol" id="ex_aum_vol"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Resultado radiología</label>
                                                                                                                <select name="aum_vol" id="aum_vol" data-titulo="radiología" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aum_vol','div_detalle_aum_vol','ex_aum_vol',2);">
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
                                                                                                            <button type="button" class="btn btn-success btn-sm btn-block" onclick="d_periodoncista1();"><i class="feather icon-file-plus"></i> Solicitar Estudio Radiológico</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="fotos_oped" role="tabpanel" aria-labelledby="fotos_oped_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-6 col-md-6">
                                                                                                                <div class="card-a">
                                                                                                                    <div class="card-header-a" id="img">
                                                                                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_uro_post" aria-expanded="false" aria-controls="imagenes_uro_pre">
                                                                                                                            Imagenes Pre tratamiento
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div id="imagenes_uro_pre-c" class="collapse show" aria-labelledby="imagenes_uro_pre" data-parent="#imagenes_uro_pre">
                                                                                                                        <div class="card-body-aten shadow-none">
                                                                                                                            <!-- [ Main Content ] start -->
                                                                                                                            <div class="dropzone" id="mis-imagenes-imagenes-uro-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                                            <!-- [ file-upload ] end -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-6 col-md-6">
                                                                                                                <div class="card-a">
                                                                                                                    <div class="card-header-a" id="img">
                                                                                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_uro_post" aria-expanded="false" aria-controls="imagenes_uro_post">
                                                                                                                            Imagenes Post Tratamiento
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div id="imagenes_uro_post-c" class="collapse show" aria-labelledby="imagenes_uro_post" data-parent="#imagenes_uro_post">
                                                                                                                        <div class="card-body-aten shadow-none">
                                                                                                                            <!-- [ Main Content ] start -->
                                                                                                                            <div class="dropzone" id="mis-imagenes-imagenes-uro-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                                            <!-- [ file-upload ] end -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-12 col-lg-11 col-xl-11 mb-10 pb-10">
                                                                                                                <label class="floating-label-activo-sm">Comentarios Fotos</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Fotos" data-seccion=" Fotos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_fotos_ven" id="obs_fotos_ven"></textarea>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1 mb-10 pb-10">
                                                                                                                <label class="floating-label-activo-sm">Acciones</label>
                                                                                                                <div class="d-flex">
                                                                                                                    <button type="button" class="btn btn-success btn-icon" onclick="guardarFoto('mis-imagenes-imagenes-uro-post')"><i class="fas fa-save"></i></button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-10 pt-10">
                                                                                        <div class="form-row mb-10 pb-10 ">
                                                                                            <hr><hr>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-10 pt-10">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <label class="floating-label-activo-sm">Observaciones Examen Morfológico</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Morfológico" data-seccion="Ex morfológico" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_op_morfologico" id="obs_ex_op_morfologico"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                                            <a class="nav-link-aten text-reset" id="radiologia_endo_tab" data-toggle="tab" href="#radiologia_endo" role="tab" aria-controls="radiologia_endo" aria-selected="false">Ex. Radiológico por pieza</a>
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

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->
                                            @include('atencion_medica.secciones_especialidad.seccion_receta_examen_esp_orl')
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD FIN  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-info-light-c mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                        <input type="submit" class="btn btn-success-light-c mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                    </div>
                                </div>
                            </div>
                            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        </div>
                        <!-- ODONTOGRAMA-->
                        <div class="tab-pane fade" id="odontograma_ped" role="tabpanel" aria-labelledby="odontograma_ped-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <h5 class="text-c-blue mt-1 mb-1 f-16">Odontograma Pediátrico</h5>
                                            </div>
                                            <hr>
                                            <div class="col-md-12">
                                                <div class="dt-responsive table-responsive table-borderless">
                                                    <table id="odontograma_adulto" class="display table dt-responsive nowrap"
                                                        style="width:100%">
                                                        <!-- INFANTE-->
                                                                                <input type="hidden" name="paciente_odontograma" id="paciente_odontograma"
                                                            value="{{ $paciente->id }}">
                                                        <!-- INFANTIL SUPERIOR -->
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center py-0 mb-3">
                                                                    <div id="t55">
                                                                        <img src="{{ asset('images/dientes/d55.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('5-5');">
                                                                    </div>
                                                                    <label data-ndiente="55" class="font-weight-bolder">5.5</label>
                                                                </td>
                                                                <td class="text-center py-0 mb-3">
                                                                    <div id="t54">
                                                                        <img src="{{ asset('images/dientes/d54.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('5-4');">
                                                                    </div>
                                                                    <label data-ndiente="54" class="font-weight-bolder">5.4</label>
                                                                </td>
                                                                <td class="text-center py-0 mb-3">
                                                                    <div id="t53">
                                                                        <img src="{{ asset('images/dientes/d53.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('5-3');">
                                                                    </div>
                                                                    <label data-ndiente="53" class="font-weight-bolder">5.3</label>
                                                                </td>
                                                                <td class="text-center py-0 mb-3">
                                                                    <div id="t52">
                                                                        <img src="{{ asset('images/dientes/d52.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('5-2');">
                                                                    </div>
                                                                    <label data-ndiente="52" class="font-weight-bolder">5.2</label>
                                                                </td>
                                                                <td class="text-center py-0 mb-3">
                                                                    <div id="t51">
                                                                        <img src="{{ asset('images/dientes/d51.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('5-1');">
                                                                    </div>
                                                                    <label data-ndiente="51" class="font-weight-bolder">5.1</label>
                                                                </td>
                                                                <td class="text-center py-0 mb-3">
                                                                    <div id="t71">
                                                                        <img src="{{ asset('images/dientes/d61.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('6-1');">
                                                                    </div>
                                                                    <label data-ndiente="61" class="font-weight-bolder">6.1</label>
                                                                </td>
                                                                <td class="text-center py-0 mb-3">
                                                                    <div id="t62">
                                                                        <img src="{{ asset('images/dientes/d62.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('6-2');">
                                                                    </div>
                                                                    <label data-ndiente="62" class="font-weight-bolder">6.2</label>
                                                                </td>
                                                                <td class="text-center py-0 mb-3">
                                                                    <div id="t63">
                                                                        <img src="{{ asset('images/dientes/d63.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('6-3');">
                                                                    </div>
                                                                    <label data-ndiente="63" class="font-weight-bolder">6.3</label>
                                                                </td>
                                                                <td class="text-center py-0 mb-3">
                                                                    <div id="t64">
                                                                        <img src="{{ asset('images/dientes/d64.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('6-4');">
                                                                    </div>
                                                                    <label data-ndiente="64" class="font-weight-bolder">6.4</label>
                                                                </td>
                                                                <td class="text-center py-0 mb-3">
                                                                    <div id="t65">
                                                                        <img src="{{ asset('images/dientes/d65.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('6-5');">
                                                                    </div>
                                                                    <label data-ndiente="65" class="font-weight-bolder">6.5</label>
                                                                </td>
                                                            </tr>
                                                            <!-- INFANTIL INFERIOR -->
                                                            <tr class="mt-4">
                                                                <td class="text-center py-0">
                                                                    <label data-ndente="85" class="font-weight-bolder">8.5</label>
                                                                    <div class="#" id="t85">
                                                                        <img src="{{ asset('images/dientes/d85.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('8-5');">
                                                                    </div>
                                                                </td>
                                                                <td class="text-center py-0">
                                                                    <label data-ndiente="84" class="font-weight-bolder">8.4</label>
                                                                    <div class="#" id="t84">
                                                                        <img src="{{ asset('images/dientes/d84.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('8-4');">
                                                                    </div>
                                                                </td>
                                                                <td class="text-center py-0">
                                                                    <label data-ndiente="83" class="font-weight-bolder">8.3</label>
                                                                    <div id="t83">
                                                                        <img src="{{ asset('images/dientes/d83.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('8-3');">
                                                                    </div>
                                                                </td>
                                                                <td class="text-center py-0">
                                                                    <label data-ndiente="82" class="font-weight-bolder">8.2</label>
                                                                    <div id="t82">
                                                                        <img src="{{ asset('images/dientes/d82.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('8-2');">
                                                                    </div>
                                                                </td>
                                                                <td class="text-center py-0">
                                                                    <label data-ndiente="81" class="font-weight-bolder">8.1</label>
                                                                    <div id="t81">
                                                                        <img src="{{ asset('images/dientes/d81.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('8-1');">
                                                                    </div>
                                                                </td>
                                                                <td class="text-center py-0">
                                                                    <label data-ndiente="71" class="font-weight-bolder">7.1</label>
                                                                    <div id="t71">
                                                                        <img src="{{ asset('images/dientes/d71.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('7-1');">
                                                                    </div>
                                                                </td>
                                                                <td class="text-center py-0">
                                                                    <label data-ndiente="72" class="font-weight-bolder">7.2</label>
                                                                    <div id="t72">
                                                                        <img src="{{ asset('images/dientes/d72.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('7-2');">
                                                                    </div>
                                                                </td>
                                                                <td class="text-center py-0">
                                                                    <label data-ndiente="73" class="font-weight-bolder">7.3</label>
                                                                    <div id="t73">
                                                                        <img src="{{ asset('images/dientes/d73.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('7-3');">
                                                                    </div>
                                                                </td>
                                                                <td class="text-center py-0">
                                                                    <label data-ndiente="74" class="font-weight-bolder">7.4</label>
                                                                    <div id="t74">
                                                                        <img src="{{ asset('images/dientes/d74.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('7-4');">
                                                                    </div>
                                                                </td>
                                                                <td class="text-center py-0">
                                                                    <label data-ndiente="75" class="font-weight-bolder">7.5</label>
                                                                    <div id="t75">
                                                                        <img src="{{ asset('images/dientes/d75.png') }}"
                                                                            class="wid-30" role="button"
                                                                            onclick="info_odontograma('7-5');">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ODONTOGRAMA--->
                        <!-- PERIODONTOGRAMA-->
                        <div class="tab-pane fade" id="periodontograma" role="tabpanel" aria-labelledby="periodontograma-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-md-12 mt-3 mb-0">
                                                <h6 class="f-16 text-c-blue">PSR</h6>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6 text-center">
                                                                <label class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">CUADRANTE 5</label>
                                                                <input  class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-3 pl-2" type="text" name="" id="">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-xs">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center align-middle px-1 py-1">5.5</th>
                                                                                <th class="text-center align-middle px-1 py-1">5.4</th>
                                                                                <th class="text-center align-middle px-1 py-1">5.3</th>
                                                                                <th class="text-center align-middle px-1 py-1">5.2</th>
                                                                                <th class="text-center align-middle px-1 py-1">5.1</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 text-center">
                                                                <label class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0"> CUADRANTE 6</label>
                                                                <input class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-3 pl-2"  type="text" name="" id="">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-xs">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center align-middle px-1 py-1">6.1</th>
                                                                                <th class="text-center align-middle px-1 py-1">6.2</th>
                                                                                <th class="text-center align-middle px-1 py-1">6.3</th>
                                                                                <th class="text-center align-middle px-1 py-1">6.4</th>
                                                                                <th class="text-center align-middle px-1 py-1">6.5</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6 text-center">
                                                                <label  class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">CUADRANTE 7</label>
                                                                <input  class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-3 pl-2" type="text" name="" id="">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-xs">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center align-middle px-1 py-1">7.5</th>
                                                                                <th class="text-center align-middle px-1 py-1">7.4</th>
                                                                                <th class="text-center align-middle px-1 py-1">7.3</th>
                                                                                <th class="text-center align-middle px-1 py-1">7.2</th>
                                                                                <th class="text-center align-middle px-1 py-1">7.1</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 text-center">
                                                                <label  class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">CUADRANTE 8</label>
                                                                <input  class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-3 pl-2"type="text" name="" id="">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-xs">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center align-middle px-1 py-1">8.1</th>
                                                                                <th class="text-center align-middle px-1 py-1">8.2</th>
                                                                                <th class="text-center align-middle px-1 py-1">8.3</th>
                                                                                <th class="text-center align-middle px-1 py-1">8.4</th>
                                                                                <th class="text-center align-middle px-1 py-1">8.5</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text-center align-middle px-1 py-1">
                                                                                    <select class="form-control form-control-sm" id=""
                                                                                        name="">
                                                                                        <option>0</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>1*</option>
                                                                                        <option>2*</option>
                                                                                        <option>3*</option>
                                                                                        <option>4*</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label">PSR</label>
                                                                <input type="text" class="form-control form-control-sm" name="pct_t"
                                                                    id="pcr_t">
                                                            </div>
                                                            <div class="form-group col-md-4" style="text-align:center" id="form_0">
                                                                {{--  <a href="periodontograma/perio.php" target="_blank"><button type="button"  --}}
                                                                <a href="{{ route('periodontograma.ver') }}" target="_blank"><button type="button"
                                                                        class="btn btn-primary btn-sm btn-block"> Abrir
                                                                        periodontograma</button></a>
                                                            </div>
                                                            <div class="form-group col-md-4" style="text-align:center" id="form_derperi">
                                                                <button type="button" class="btn btn-success btn-sm btn-block"
                                                                    onclick="d_periodoncista1();"><i class="feather icon-file-plus"></i>
                                                                    Derivar a Periodoncista</button>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 text-center mx-auto">
                                                                <button type="reset" class="btn btn-danger">Limpiar formulario</button>
                                                                <button type="submit" class="btn btn-info">Guardar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: PERIODONTOGRAMA--->
                        <!-- EVALUACION--->
                        <div class="tab-pane fade" id="eva_ped" role="tabpanel" aria-labelledby="eva_ped_tab">
                            <div class="row bg-white shadow-sm rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Evaluación Pediátrica</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3 px-1 py-1">
                                            <button type="button" class="btn btn-info btn-sm btn-block"
                                                onclick="tto_max_sup()";><i class="feather icon-file-plus"></i> Maxilar
                                                superior</button>
                                        </div>
                                        <div class="col-md-3 px-1 py-1">
                                            <button type="button" class="btn btn-info btn-sm btn-block"
                                                onclick="tto_max_inf_ped()";><i class="feather icon-file-plus"></i> Maxilar
                                                inferior</button>
                                        </div>
                                        <div class="col-md-3 px-1 py-1">
                                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="tto_boca()";><i
                                                    class="feather icon-file-plus"></i> Boca
                                                Completa</button>
                                        </div>
                                        <div class="col-md-3 px-1 py-1">
                                            <button type="button" class="btn btn-primary btn-sm btn-block" onclick="prest_lab();"><i
                                                    class="feather icon-file-plus"></i>Solicitud en
                                                laboratorio</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="exam_esp">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" style="background-color: #a077e8" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                    Examen por Cuadrantres Dentales
                                                </button>
                                            </div>
                                            <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                                <div class="card-body-aten-a shadow-none">
                                                    <div id="form-endo-adulto">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active" id="grupo_5_tab" data-toggle="tab" href="#grupo_5" role="tab" aria-controls="grupo_5" aria-selected="true">CUADRANTE 5</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="grupo_6-tab" data-toggle="tab" href="#grupo_6" role="tab" aria-controls="grupo_6" aria-selected="true">CUADRANTE 6</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="grupo_7-tab" data-toggle="tab" href="#grupo_7" role="tab" aria-controls="grupo_7" aria-selected="true">CUADRANTE 7</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="grupo_8-tab" data-toggle="tab" href="#grupo_8" role="tab" aria-controls="grupo_8" aria-selected="true">CUADRANTE 8</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="tab-content" id="endo_eval_ped">
                                                                    <!--GRUPO 1-->
                                                                    <div class="tab-pane fade show active" id="grupo_5" role="tabpanel" aria-labelledby="grupo_5_tab">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="text-center text-c-blue mb-2">CUADRANTE 5</h6>
                                                                                                    <div class="table-responsive">
                                                                                                        <form id="form_6_5"
                                                                                                            action="{{ route('dental_infantil.registrar_odontograma_infantil') }}" method="POST">

                                                                                                            @csrf
                                                                                                            <input type="hidden" name="ficha_id_atencion_dental_odon1"
                                                                                                                id="ficha_id_atencion_dental_odon1"
                                                                                                               {{-- value=" @if ($ficha != null) {{ $ficha->id }} @endif">  --}}
                                                                                                            <input type="hidden" name="paciente_atencion_dental_odon1"
                                                                                                                id="paciente_atencion_dental_odon1" value="{{ $paciente->id }}">


                                                                                                            <table class="table table-bordered table-xs" style="width:100%;">
                                                                                                                <tr class="bg-encabezado">
                                                                                                                    <th class="text-center align-middle">PIEZA</th>
                                                                                                                    <th class="text-center align-middle">CARA</th>
                                                                                                                    <th class="text-center align-middle">CUADRANTE</th>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="px-1 py-1 text-center align-middle">
                                                                                                                        <select id="pieza_odontograma_1" name="pieza_odontograma_1"
                                                                                                                            class="form-control form-control-sm">
                                                                                                                            <option value="5-5"> 5-5 </option>
                                                                                                                            <option value="5-4"> 5-4 </option>
                                                                                                                            <option value="5-3"> 5-3 </option>
                                                                                                                            <option value="5-2"> 5-2 </option>
                                                                                                                            <option value="5-1"> 5-1</option>
                                                                                                                        </select>
                                                                                                                        <div id="t53">
                                                                                                                            <img src="{{ asset('images/dientes/d53.png') }}"
                                                                                                                                class="wid-40 py-1">
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                    <td class="align-middle text-center">
                                                                                                                        <table class="table-borderless" style="align-content:center">
                                                                                                                            <tbody>
                                                                                                                                <tr>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-v" id="caraV1"
                                                                                                                                            onclick="cambiar_color(1)">
                                                                                                                                            V
                                                                                                                                        </div>

                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-d" id="caraD1"
                                                                                                                                            onclick="cambiar_colorD(1)">D</div>
                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-o" id="caraO1"
                                                                                                                                            onclick="cambiar_colorO(1)">O</div>

                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-m" id="caraM1"
                                                                                                                                            onclick="cambiar_colorM(1)">M</div>

                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-p" id="caraP1"
                                                                                                                                            onclick="cambiar_colorP(1)">P</div>

                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                    <td class="text-center align-middle">
                                                                                                                        <div id="t53" style="width:100%;">
                                                                                                                            <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                                                                                class="wid-100">
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="px-1 py-1"><button type="button"
                                                                                                                            class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                                                                            title="Historia" data-content="cargar historia del diente">Ver
                                                                                                                            historia</button></td>
                                                                                                                    <td class="px-1 py-1">
                                                                                                                        <select class="form-control form-control-sm" id="diagnostico_1"
                                                                                                                            name="diagnostico_1">
                                                                                                                            <option value="0">Diagnóstico</option>
                                                                                                                            <option value="1">Caries</option>
                                                                                                                            <option value="2">Fractura</option>
                                                                                                                            <option value="3">periodontopatia</option>
                                                                                                                            <option value="4">profilaxis</option>
                                                                                                                            <option value="5">Restos radiculares</option>
                                                                                                                        </select>
                                                                                                                    </td>
                                                                                                                    <td class="px-2 py-2">
                                                                                                                        <select class="form-control form-control-sm" id="tratamiento_1"
                                                                                                                            name="tratamiento_1">
                                                                                                                            <option>Tratamiento</option>
                                                                                                                            <optgroup label="Tratamiento Pediátrico">
                                                                                                                                <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                                                                                    presupuesto
                                                                                                                                </option>
                                                                                                                                <option value="dp_2">Instrucción y control de higiene y
                                                                                                                                    profilaxis
                                                                                                                                </option>
                                                                                                                                <option value="dp_3">Aplicación flúor gel</option>
                                                                                                                                <option value="dp_4">Aplicación flúor barniz</option>
                                                                                                                                <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                                                                                </option>
                                                                                                                                <option value="dp_6">Endodoncia pieza permanente</option>
                                                                                                                                <option value="dp_7">Exodoncia simple diente temporal</option>
                                                                                                                                <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                                                                                    /valor no
                                                                                                                                    incluye laboratorio</option>
                                                                                                                                <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                                                                                    anterior y
                                                                                                                                    posterior simple</option>
                                                                                                                                <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                                                                                    anterior y
                                                                                                                                    posterior compuesto</option>
                                                                                                                                <option value="dp_11">Obturación resina fotocurado composite
                                                                                                                                    pieza
                                                                                                                                    permanente anterior y posterior simple</option>
                                                                                                                                <option value="dp_12">Obturación resina fotocurado composite
                                                                                                                                    pieza
                                                                                                                                    permanente anterior y posterior compuesto</option>
                                                                                                                                <option value="dp_13">Obturación resina fotocurado,
                                                                                                                                    reconstitución
                                                                                                                                </option>
                                                                                                                                <option value="dp_14">Obturación resina fotocurado carillas
                                                                                                                                    anteriores
                                                                                                                                </option>
                                                                                                                                <option value="dp_15">Pulpotomía</option>
                                                                                                                                <option value="dp_16">Pulpectomía anterior</option>
                                                                                                                                <option value="dp_17">Pulpectomía posterior</option>
                                                                                                                                <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                                                                                <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                                                                                                <option value="dp_20">Sellantes pieza temporal y permanente
                                                                                                                                </option>
                                                                                                                                <option value="dp_21">Sesión de adaptación</option>
                                                                                                                                <option value="dp_22">Trat. de conducto en pieza temporal
                                                                                                                                    anterior
                                                                                                                                </option>
                                                                                                                                <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                                                                                                    posterior</option>
                                                                                                                                <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                                                                                <option value="dp_25">Urgencia odontopediátrica</option>
                                                                                                                            </optgroup>
                                                                                                                        </select>
                                                                                                                        <input type="hidden" name="odontograma1" id="odontograma1" value="1">
                                                                                                                        <input type="hidden" name="caraM_check_1" id="caraM_check_1" value="0">
                                                                                                                        <input type="hidden" name="caraO_check_1" id="caraO_check_1" value="0">
                                                                                                                        <input type="hidden" name="caraD_check_1" id="caraD_check_1" value="0">
                                                                                                                        <input type="hidden" name="carav_check_1" id="carav_check_1" value="0">
                                                                                                                        <input type="hidden" name="caraP_check_1" id="caraP_check_1" value="0">
                                                                                                                        <button type="submit" class="btn btn-info btn-sm">
                                                                                                                            Registrar
                                                                                                                        </button>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </table>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--GRUPO 2-->
                                                                    <div class="tab-pane fade show" id="grupo_6" role="tabpanel" aria-labelledby="grupo_6_tab">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="text-center text-c-blue mb-2">CUADRANTE 6</h6>
                                                                                                    <div class="table-responsive">
                                                                                                        <form id="form_5_5"
                                                                                                            action="{{ route('dental_infantil.registrar_odontograma_infantil') }}" method="POST">

                                                                                                            @csrf
                                                                                                            <input type="hidden" name="ficha_id_atencion_dental_odon2"
                                                                                                                id="ficha_id_atencion_dental_odon2"
                                                                                                               {{-- value=" @if ($ficha != null) {{ $ficha->id }} @endif">  --}}
                                                                                                            <input type="hidden" name="paciente_atencion_dental_odon2"
                                                                                                                id="paciente_atencion_dental_odon2" value="{{ $paciente->id }}">
                                                                                                            <table class="table table-bordered table-xs" style="width:100%;">
                                                                                                                <tr class="bg-encabezado">
                                                                                                                    <th class="text-center align-middle">PIEZA</th>
                                                                                                                    <th class="text-center align-middle">CARA</th>
                                                                                                                    <th class="text-center align-middle">CUADRANTE</th>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="px-1 py-1 text-center align-middle">
                                                                                                                        <select id="pieza_odontograma_2" name="pieza_odontograma_2"
                                                                                                                            class="form-control form-control-sm">
                                                                                                                            <option value="6-1"> 6-1 </option>
                                                                                                                            <option value="6-2"> 6-2 </option>
                                                                                                                            <option value="6-3"> 6-3 </option>
                                                                                                                            <option value="6-4"> 6-4 </option>
                                                                                                                            <option value="6-5"> 6-5</option>
                                                                                                                        </select>
                                                                                                                        <div id="t53">
                                                                                                                            <img src="{{ asset('images/dientes/d53.png') }}"
                                                                                                                                class="wid-40 py-1">
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                    <td class="align-middle text-center">
                                                                                                                        <table class="table-borderless" style="align-content:center">
                                                                                                                            <tbody>
                                                                                                                                <tr>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-v" id="caraV2"
                                                                                                                                            onclick="cambiar_color(2)">V</div>
                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-d" id="caraD2"
                                                                                                                                            onclick="cambiar_colorD(2)">D</div>
                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-o" id="caraO2"
                                                                                                                                            onclick="cambiar_colorO(2)">O</div>
                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-m" id="caraM2"
                                                                                                                                            onclick="cambiar_colorM(2)">M</div>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-p" id="caraP2"
                                                                                                                                            onclick="cambiar_colorP(2)">P</div>
                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                    <td class="text-center align-middle">
                                                                                                                        <div id="t53" style="width:100%;">
                                                                                                                            <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                                                                                class="wid-100">
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="px-1 py-1"><button type="button"
                                                                                                                            class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                                                                            title="Historia" data-content="cargar historia del diente">Ver
                                                                                                                            historia</button></td>
                                                                                                                    <td class="px-1 py-1">
                                                                                                                        <select class="form-control form-control-sm" id="diagnostico_2"
                                                                                                                            name="diagnostico_2">
                                                                                                                            <option value="0">Diagnóstico</option>
                                                                                                                            <option value="1">Caries</option>
                                                                                                                            <option value="2">Fractura</option>
                                                                                                                            <option value="3">periodontopatia</option>
                                                                                                                            <option value="4">profilaxis</option>
                                                                                                                            <option value="5">Restos radiculares</option>
                                                                                                                        </select>
                                                                                                                    </td>
                                                                                                                    <td class="px-1 py-1">
                                                                                                                        <select class="form-control form-control-sm" id="tratamiento_2"
                                                                                                                            name="tratamiento_2">
                                                                                                                            <option>Tratamiento</option>
                                                                                                                            <optgroup label="Tratamiento Pediátrico">
                                                                                                                                <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                                                                                    presupuesto
                                                                                                                                </option>
                                                                                                                                <option value="dp_2">Instrucción y control de higiene y
                                                                                                                                    profilaxis
                                                                                                                                </option>
                                                                                                                                <option value="dp_3">Aplicación flúor gel</option>
                                                                                                                                <option value="dp_4">Aplicación flúor barniz</option>
                                                                                                                                <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                                                                                </option>
                                                                                                                                <option value="dp_6">Endodoncia pieza permanente</option>
                                                                                                                                <option value="dp_7">Exodoncia simple diente temporal</option>
                                                                                                                                <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                                                                                    /valor no
                                                                                                                                    incluye laboratorio</option>
                                                                                                                                <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                                                                                    anterior y
                                                                                                                                    posterior simple</option>
                                                                                                                                <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                                                                                    anterior y
                                                                                                                                    posterior compuesto</option>
                                                                                                                                <option value="dp_11">Obturación resina fotocurado composite
                                                                                                                                    pieza
                                                                                                                                    permanente anterior y posterior simple</option>
                                                                                                                                <option value="dp_12">Obturación resina fotocurado composite
                                                                                                                                    pieza
                                                                                                                                    permanente anterior y posterior compuesto</option>
                                                                                                                                <option value="dp_13">Obturación resina fotocurado,
                                                                                                                                    reconstitución
                                                                                                                                </option>
                                                                                                                                <option value="dp_14">Obturación resina fotocurado carillas
                                                                                                                                    anteriores
                                                                                                                                </option>
                                                                                                                                <option value="dp_15">Pulpotomía</option>
                                                                                                                                <option value="dp_16">Pulpectomía anterior</option>
                                                                                                                                <option value="dp_17">Pulpectomía posterior</option>
                                                                                                                                <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                                                                                <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                                                                                                <option value="dp_20">Sellantes pieza temporal y permanente
                                                                                                                                </option>
                                                                                                                                <option value="dp_21">Sesión de adaptación</option>
                                                                                                                                <option value="dp_22">Trat. de conducto en pieza temporal
                                                                                                                                    anterior
                                                                                                                                </option>
                                                                                                                                <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                                                                                                    posterior</option>
                                                                                                                                <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                                                                                <option value="dp_25">Urgencia odontopediátrica</option>
                                                                                                                            </optgroup>
                                                                                                                        </select>
                                                                                                                        <input type="hidden" name="odontograma2" id="odontograma2" value="1">
                                                                                                                        <input type="hidden" name="caraM_check_2" id="caraM_check_2" value="0">
                                                                                                                        <input type="hidden" name="caraO_check_2" id="caraO_check_2" value="0">
                                                                                                                        <input type="hidden" name="caraD_check_2" id="caraD_check_2" value="0">
                                                                                                                        <input type="hidden" name="carav_check_2" id="carav_check_2" value="0">
                                                                                                                        <input type="hidden" name="caraP_check_2" id="caraP_check_2" value="0">
                                                                                                                        <button type="submit" class="btn btn-info btn-sm">
                                                                                                                            Registrar
                                                                                                                        </button>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </table>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--GRUPO 3-->
                                                                    <div class="tab-pane fade show" id="grupo_7" role="tabpanel" aria-labelledby="grupo_7-tab">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="text-center text-c-blue mb-2">CUADRANTE 7</h6>
                                                                                                    <div class="table-responsive">
                                                                                                        <form id="form_7_5"
                                                                                                            action="{{ route('dental_infantil.registrar_odontograma_infantil') }}" method="POST">

                                                                                                            @csrf
                                                                                                            <input type="hidden" name="ficha_id_atencion_dental_odon3"
                                                                                                                id="ficha_id_atencion_dental_odon3"
                                                                                                            {{--  value=" @if ($ficha != null) {{ $ficha->id }} @endif"> --}}
                                                                                                            <input type="hidden" name="paciente_atencion_dental_odon3"
                                                                                                                id="paciente_atencion_dental_odon3" value="{{ $paciente->id }}">
                                                                                                            <table class="table table-bordered table-xs" style="width:100%;">
                                                                                                                <tr class="bg-encabezado">
                                                                                                                    <th class="text-center align-middle">PIEZA</th>
                                                                                                                    <th class="text-center align-middle">CARA</th>
                                                                                                                    <th class="text-center align-middle">CUADRANTE</th>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="px-1 py-1 text-center align-middle">
                                                                                                                        <select id="pieza_odontograma_3" name="pieza_odontograma_3"
                                                                                                                            class="form-control form-control-sm">
                                                                                                                            <option value="7-1"> 7-1 </option>
                                                                                                                            <option value="7-2"> 7-2 </option>
                                                                                                                            <option value="7-3"> 7-3 </option>
                                                                                                                            <option value="7-4"> 7-4 </option>
                                                                                                                            <option value="7-5"> 7-5</option>
                                                                                                                        </select>
                                                                                                                        <div id="t53">
                                                                                                                            <img src="{{ asset('images/dientes/d53.png') }}"
                                                                                                                                class="wid-40 py-1">
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                    <td class="align-middle text-center">
                                                                                                                        <table class="table-borderless" style="align-content:center">
                                                                                                                            <tbody>
                                                                                                                                <tr>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-v" id="caraV3"
                                                                                                                                            onclick="cambiar_color(3)">V</div>
                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-d" id="caraD3"
                                                                                                                                            onclick="cambiar_colorD(3)">D</div>
                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-o" id="caraO3"
                                                                                                                                            onclick="cambiar_colorO(3)">O</div>
                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-m" id="caraM3"
                                                                                                                                            onclick="cambiar_colorM(3)">M</div>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                    <td class="padding-caras">
                                                                                                                                        <div class="circulo-p" id="caraP3"
                                                                                                                                            onclick="cambiar_colorP(3)">P</div>
                                                                                                                                    </td>
                                                                                                                                    <td class="padding-caras"></td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                    <td class="text-center align-middle">
                                                                                                                        <div id="t53" style="width:100%;">
                                                                                                                            <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                                                                                class="wid-100">
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="px-1 py-1"><button type="button"
                                                                                                                            class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                                                                            title="Historia" data-content="cargar historia del diente">Ver
                                                                                                                            historia</button></td>
                                                                                                                    <td class="px-1 py-1">
                                                                                                                        <select class="form-control form-control-sm" id="diagnostico_3"
                                                                                                                            name="diagnostico_3">
                                                                                                                            <option value="0">Diagnóstico</option>
                                                                                                                            <option value="01">Caries</option>
                                                                                                                            <option value="02">Fractura</option>
                                                                                                                            <option value="03">Periodontopatia</option>
                                                                                                                            <option value="04">Profilaxis</option>
                                                                                                                            <option value="05">Restos radiculares</option>
                                                                                                                        </select>
                                                                                                                    </td>
                                                                                                                    <td class="px-1 py-1">
                                                                                                                        <select class="form-control form-control-sm" id="tratamiento_3"
                                                                                                                            name="tratamiento_3">
                                                                                                                            <option>Tratamiento</option>
                                                                                                                            <optgroup label="Tratamiento Pediátrico">
                                                                                                                                <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                                                                                    presupuesto
                                                                                                                                </option>
                                                                                                                                <option value="dp_2">Instrucción y control de higiene y
                                                                                                                                    profilaxis
                                                                                                                                </option>
                                                                                                                                <option value="dp_3">Aplicación flúor gel</option>
                                                                                                                                <option value="dp_4">Aplicación flúor barniz</option>
                                                                                                                                <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                                                                                </option>
                                                                                                                                <option value="dp_6">Endodoncia pieza permanente</option>
                                                                                                                                <option value="dp_7">Exodoncia simple diente temporal</option>
                                                                                                                                <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                                                                                    /valor no
                                                                                                                                    incluye laboratorio</option>
                                                                                                                                <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                                                                                    anterior y
                                                                                                                                    posterior simple</option>
                                                                                                                                <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                                                                                    anterior y
                                                                                                                                    posterior compuesto</option>
                                                                                                                                <option value="dp_11">Obturación resina fotocurado composite
                                                                                                                                    pieza
                                                                                                                                    permanente anterior y posterior simple</option>
                                                                                                                                <option value="dp_12">Obturación resina fotocurado composite
                                                                                                                                    pieza
                                                                                                                                    permanente anterior y posterior compuesto</option>
                                                                                                                                <option value="dp_13">Obturación resina fotocurado,
                                                                                                                                    reconstitución
                                                                                                                                </option>
                                                                                                                                <option value="dp_14">Obturación resina fotocurado carillas
                                                                                                                                    anteriores
                                                                                                                                </option>
                                                                                                                                <option value="dp_15">Pulpotomía</option>
                                                                                                                                <option value="dp_16">Pulpectomía anterior</option>
                                                                                                                                <option value="dp_17">Pulpectomía posterior</option>
                                                                                                                                <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                                                                                <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                                                                                                <option value="dp_20">Sellantes pieza temporal y permanente
                                                                                                                                </option>
                                                                                                                                <option value="dp_21">Sesión de adaptación</option>
                                                                                                                                <option value="dp_22">Trat. de conducto en pieza temporal
                                                                                                                                    anterior
                                                                                                                                </option>
                                                                                                                                <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                                                                                                    posterior</option>
                                                                                                                                <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                                                                                <option value="dp_25">Urgencia odontopediátrica</option>
                                                                                                                            </optgroup>
                                                                                                                        </select>
                                                                                                                        <input type="hidden" name="odontograma3" id="odontograma3" value="1">
                                                                                                                        <input type="hidden" name="caraM_check_3" id="caraM_check_3" value="0">
                                                                                                                        <input type="hidden" name="caraO_check_3" id="caraO_check_3" value="0">
                                                                                                                        <input type="hidden" name="caraD_check_3" id="caraD_check_3" value="0">
                                                                                                                        <input type="hidden" name="carav_check_3" id="carav_check_3" value="0">
                                                                                                                        <input type="hidden" name="caraP_check_3" id="caraP_check_3" value="0">
                                                                                                                        <button type="submit" class="btn btn-info btn-sm">
                                                                                                                            Registrar
                                                                                                                        </button>

                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </table>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--GRUPO 4-->
                                                                    <div class="tab-pane fade show" id="grupo_8" role="tabpanel" aria-labelledby="grupo_8-tab">
                                                                        <div class="col-md-12">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-row">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="text-center text-c-blue mb-2">CUADRANTE 8</h6>
                                                                                                <div class="table-responsive">
                                                                                                    <form id="form_6_5"
                                                                                                        action="{{ route('dental_infantil.registrar_odontograma_infantil') }}" method="POST">

                                                                                                        @csrf
                                                                                                        <input type="hidden" name="ficha_id_atencion_dental_odon4"
                                                                                                            id="ficha_id_atencion_dental_odon4"
                                                                                                           >{{--  value=" @if ($ficha != null) {{ $ficha->id }} @endif" --}}
                                                                                                        <input type="hidden" name="paciente_atencion_dental_odon4"
                                                                                                            id="paciente_atencion_dental_odon4" value="{{ $paciente->id }}">
                                                                                                        <table class="table table-bordered table-xs" style="width:100%;">
                                                                                                            <tr class="bg-encabezado">
                                                                                                                <th class="text-center align-middle">PIEZA</th>
                                                                                                                <th class="text-center align-middle">CARA</th>
                                                                                                                <th class="text-center align-middle">CUADRANTE</th>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="px-1 py-1 text-center align-middle">
                                                                                                                    <select id="pieza_odontograma_4" name="pieza_odontograma_4"
                                                                                                                        class="form-control form-control-sm">
                                                                                                                        <option value="8-5"> 8-5 </option>
                                                                                                                        <option value="8-4"> 8-4 </option>
                                                                                                                        <option value="8-3"> 8-3 </option>
                                                                                                                        <option value="8-2"> 8-2 </option>
                                                                                                                        <option value="8-1"> 8-1</option>
                                                                                                                    </select>
                                                                                                                    <div id="t53">
                                                                                                                        <img src="{{ asset('images/dientes/d53.png') }}"
                                                                                                                            class="wid-40 py-1">
                                                                                                                    </div>
                                                                                                                </td>
                                                                                                                <td class="align-middle text-center">
                                                                                                                    <table class="table-borderless" style="align-content:center">
                                                                                                                        <tbody>
                                                                                                                            <tr>
                                                                                                                                <td class="padding-caras"></td>
                                                                                                                                <td class="padding-caras">
                                                                                                                                    <div class="circulo-v" id="caraV4"
                                                                                                                                        onclick="cambiar_color(4)">V</div>
                                                                                                                                </td>
                                                                                                                                <td class="padding-caras"></td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td class="padding-caras">
                                                                                                                                    <div class="circulo-d" id="caraD4"
                                                                                                                                        onclick="cambiar_colorD(4)">D</div>
                                                                                                                                </td>
                                                                                                                                <td class="padding-caras">
                                                                                                                                    <div class="circulo-o" id="caraO4"
                                                                                                                                        onclick="cambiar_colorO(4)">O</div>
                                                                                                                                </td>
                                                                                                                                <td class="padding-caras">
                                                                                                                                    <div class="circulo-m" id="caraM4"
                                                                                                                                        onclick="cambiar_colorM(4)">M</div>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td class="padding-caras"></td>
                                                                                                                                <td class="padding-caras">
                                                                                                                                    <div class="circulo-p" id="caraP4"
                                                                                                                                        onclick="cambiar_colorP(4)">P</div>
                                                                                                                                </td>
                                                                                                                                <td class="padding-caras"></td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                                <td class="text-center align-middle">
                                                                                                                    <div id="t53" style="width:100%;">
                                                                                                                        <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                                                                            class="wid-100">
                                                                                                                    </div>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="px-1 py-1"><button type="button"
                                                                                                                        class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                                                                        title="Historia" data-content="cargar historia del diente">Ver
                                                                                                                        historia</button></td>
                                                                                                                <td class="px-1 py-1">
                                                                                                                    <select class="form-control form-control-sm" id="diagnostico_4"
                                                                                                                        name="diagnostico_4">
                                                                                                                        <option value="0">Diagnóstico</option>
                                                                                                                        <option value="01">Caries</option>
                                                                                                                        <option value="02">Fractura</option>
                                                                                                                        <option value="03">periodontopatia</option>
                                                                                                                        <option value="04">profilaxis</option>
                                                                                                                        <option value="05">Restos radiculares</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                                <td class="px-1 py-1">
                                                                                                                    <select class="form-control form-control-sm" id="tratamiento_4"
                                                                                                                        name="tratamiento_4">
                                                                                                                        <option>Tratamiento</option>
                                                                                                                        <optgroup label="Tratamiento Pediátrico">
                                                                                                                            <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                                                                                presupuesto
                                                                                                                            </option>
                                                                                                                            <option value="dp_2">Instrucción y control de higiene y
                                                                                                                                profilaxis
                                                                                                                            </option>
                                                                                                                            <option value="dp_3">Aplicación flúor gel</option>
                                                                                                                            <option value="dp_4">Aplicación flúor barniz</option>
                                                                                                                            <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                                                                            </option>
                                                                                                                            <option value="dp_6">Endodoncia pieza permanente</option>
                                                                                                                            <option value="dp_7">Exodoncia simple diente temporal</option>
                                                                                                                            <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                                                                                /valor no
                                                                                                                                incluye laboratorio</option>
                                                                                                                            <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                                                                                anterior y
                                                                                                                                posterior simple</option>
                                                                                                                            <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                                                                                anterior y
                                                                                                                                posterior compuesto</option>
                                                                                                                            <option value="dp_11">Obturación resina fotocurado composite
                                                                                                                                pieza
                                                                                                                                permanente anterior y posterior simple</option>
                                                                                                                            <option value="dp_12">Obturación resina fotocurado composite
                                                                                                                                pieza
                                                                                                                                permanente anterior y posterior compuesto</option>
                                                                                                                            <option value="dp_13">Obturación resina fotocurado,
                                                                                                                                reconstitución
                                                                                                                            </option>
                                                                                                                            <option value="dp_14">Obturación resina fotocurado carillas
                                                                                                                                anteriores
                                                                                                                            </option>
                                                                                                                            <option value="dp_15">Pulpotomía</option>
                                                                                                                            <option value="dp_16">Pulpectomía anterior</option>
                                                                                                                            <option value="dp_17">Pulpectomía posterior</option>
                                                                                                                            <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                                                                            <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                                                                                            <option value="dp_20">Sellantes pieza temporal y permanente
                                                                                                                            </option>
                                                                                                                            <option value="dp_21">Sesión de adaptación</option>
                                                                                                                            <option value="dp_22">Trat. de conducto en pieza temporal
                                                                                                                                anterior
                                                                                                                            </option>
                                                                                                                            <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                                                                                                posterior</option>
                                                                                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                                                                                        </optgroup>
                                                                                                                    </select>
                                                                                                                    <input type="hidden" name="odontograma4" id="odontograma4" value="1">
                                                                                                                    <input type="hidden" name="caraM_check_4" id="caraM_check_4" value="0">
                                                                                                                    <input type="hidden" name="caraO_check_4" id="caraO_check_4" value="0">
                                                                                                                    <input type="hidden" name="caraD_check_4" id="caraD_check_4" value="0">
                                                                                                                    <input type="hidden" name="carav_check_4" id="carav_check_4" value="0">
                                                                                                                    <input type="hidden" name="caraP_check_4" id="caraP_check_4" value="0">
                                                                                                                    <button type="submit" class="btn btn-info btn-sm">
                                                                                                                        Registrar
                                                                                                                    </button>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </form>
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
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Plan de tratamiento y presupuesto</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <div class="table-responsive">
                                                    <table class="table table-xs">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha</th>
                                                                <th>Prestación</th>
                                                                <th>Caras</th>
                                                                <th>Pieza</th>
                                                                <th>Diagnóstico</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>00/00/000</td>
                                                                <td>Sellado</td>
                                                                <td>12</td>
                                                                <td>Vestibular, Distal</td>
                                                                <td>Caries</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger btn-sm"><i
                                                                            class="feather icon-x"></i>Eliminar</button>
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
                        <!--CIERRE: EVALUACION--->


                        <!-- TRATAMIENTO-->
                        <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <h5 class="text-c-blue mt-1 mb-1 f-16">Tratamiento según presupuesto</h5>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="dt-responsive table-responsive pb-4">
                                                    <table id="tratamiento_presupuesto"
                                                        class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                        style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">Fecha</th>
                                                                <th class="text-center align-middle">Nº Presupuesto</th>
                                                                <th class="text-center align-middle">Aprobado</th>
                                                                <th class="text-center align-middle">Pieza</th>
                                                                <th class="text-center align-middle">Boca</th>
                                                                <th class="text-center align-middle">Presupuesto</th>
                                                                <th class="text-center align-middle">Estado</th>
                                                                <th class="text-center align-middle">Control</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center align-middle">23/05/2021</td>
                                                                <td class="text-center align-middle">782638</td>
                                                                <td class="text-center align-middle">Si</td>
                                                                <td class="text-center align-middle">Sector I</td>
                                                                <td class="text-center align-middle">no</td>
                                                                <td class="text-center align-middle">
                                                                    <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()";>
                                                                        <i class="fa fa-plus"></i> Cargar Presupuesto
                                                                    </button>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <div class="form-group col-md-4">
                                                                        <div class="switch switch-success d-inline m-r-2">
                                                                            <input type="checkbox" id="info_finalizado" checked="">
                                                                            <label for="info_finalizado" class="cr"></label>
                                                                        </div>
                                                                        <label>Realizado?</label>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    20/05/2022
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
                            @include('atencion_odontologica.modals.adulto.cargar_presupuesto')
                        </div>
                        <!--CIERRE: TRATAMIENTO--->
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
@include('atencion_odontologica.modals.infantil.tratamiento_boca_completainf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_inferiorinf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_superiorinf')
@include('atencion_odontologica.modals.infantil.tratamiento_laboratorio')
@include('atencion_odontologica.modals.infantil.modal_odontograma')
@include('atencion_odontologica.modals.infantil.cargar_presupuesto')



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
