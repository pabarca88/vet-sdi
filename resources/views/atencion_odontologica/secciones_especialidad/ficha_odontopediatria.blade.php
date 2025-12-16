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
                    {{--  <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="periodontograma_tab" data-toggle="tab" href="#periodontograma" role="tab" aria-controls="periodontograma" aria-selected="false">PSR</a>
                    </li>  --}}
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="eva_ped_tab" data-toggle="tab" href="#eva_ped" role="tab" aria-controls="eva_ped" aria-selected="false">Caras y cuadrantes</a>
                    </li>
                    {{--  <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tratamiento_tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento/Presupuesto</a>
                    </li>  --}}
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="presupuesto_tab" data-toggle="tab" href="#presupuesto" role="tab" aria-controls="presupuesto" aria-selected="false">Presupuesto</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('dental.registrar_ficha_atencion_dental_odontopediatria') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_especialidad" id="id_especialidad" value="{{$profesional->id_especialidad}}">
                    <input type="hidden" name="id_paciente" value="{{ $paciente->id }}" id="id_paciente">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                    <input type="hidden" name="tipo_examen_especial" id="tipo_examen_especial" value="{{ $lista_examen_especial }}">
                    <input type="hidden" name="id_presupuesto" id="id_presupuesto" value="{{ isset($presupuesto) ? $presupuesto->id : '' }}">
                    <input type="hidden" name="id_tratamiento_urgencia" id="id_tratamiento_urgencia" value="" />
                    <input type="hidden" name="id_tratamiento" id="id_tratamiento" value="" />
                    @csrf
                    <div class="tab-content" id="od_endo-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_dent_endo" role="tabpanel" aria-labelledby="atencion_dent_endo_tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-1 mb-0">
                                            <h6 class="f-18 text-c-blue">Ficha de atención general</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <!--FORMULARIOS-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                <!--Formulario / Menor de edad-->
                                @include('general.secciones_ficha.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                            </div>
                            <!--Motivo consulta-->
                                 @include('atencion_odontologica.generales.motivo_consulta')
                            <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_od_ped">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_od_ped_c" aria-expanded="false" aria-controls="exam_od_ped_c">
                                            Examen Especialidad Odontopediatría
                                        </button>
                                    </div>
                                    <div id="exam_od_ped_c" class="collapse" aria-labelledby="exam_od_ped" data-parent="#exam_od_ped">
                                        <div class="card-body-aten-a shadow-none">
                                            <div id="form-od-ped">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_od_ped" role="tablist">
                                                            {{--  <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="examen_od_ped_general_tab" data-toggle="tab" href="#examen_od_ped_general" role="tab" aria-controls="examen_od_ped_general" aria-selected="true">Dolor y urgencia</a>
                                                            </li>  --}}
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active " id="ex_oral_oped_morfologico-tab" data-toggle="tab" href="#ex_oral_oped_morfologico" role="tab" aria-controls="ex_oral_oped_morfologico" aria-selected="true">Examen Morfológico</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="ex_oral_od_ped-tab" data-toggle="tab" href="#ex_oral_od_ped" role="tab" aria-controls="ex_oral_od_ped" aria-selected="true">Examen Oral</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="endo_od_ped_pieza-tab" data-toggle="tab" href="#endo_od_ped_pieza" role="tab" aria-controls="endo_od_ped_pieza" aria-selected="true">Examen Por Pieza</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="plan_od_ped-tab" data-toggle="tab" href="#plan_od_ped" role="tab" aria-controls="plan_od_ped" aria-selected="true" onclick="$('#table_piezas_presupuesto_odped').DataTable(); $('#table_insumos_odped').DataTable();">Planificación de tratamiento</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="control_ped-tab" onclick="proxima_atencion_paciente()" data-toggle="tab" href="#control_ped" role="tab" aria-controls="control_ped" aria-selected="true">Control e indicaciones</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="endo_adulto">
                                                            <div class="tab-pane fade show active " id="ex_oral_oped_morfologico" role="tabpanel" aria-labelledby="ex_oral_oped_morfologico_tab">
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
                                                                                            <a class="nav-link-aten text-reset" id="fotos_oped_tab" data-toggle="tab" href="#fotos_oped" role="tab" aria-controls="fotos_oped" aria-selected="false" onclick="recargar_imagenes_rx('odontop')">Fotos</a>
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
                                                                                                                    <option value="1">No</option>
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
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm w-100">Rx de cavum Rinofaríngeo</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm w-100" onclick="abrir_ic_otorrino()">IC a Otorrinolaringólogo</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm w-100" onclick="abrir_ic_fono()">IC a Fonoaudiólogo</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm w-100" onclick="abrir_ic_dental()">IC a Otra Especialidad Dental</button>
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
                                                                                                                                <select name="tpo_oclusion_dent_temp" id="tpo_oclusion_dent_temp" data-titulo="Escalón" data-seccion="Oclusión Temporal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_oclusion_dent_temp','div_detalle_tpo_oclusion_dent_temp','det_tpo_oclusion_dent_temp',4)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">plano terminal recto</option>
                                                                                                                                    <option value="2">escalón mesial</option>
                                                                                                                                    <option value="3">escalón distal</option>
                                                                                                                                    <option value="4">Otras Observaciones</option>
                                                                                                                                </select>

                                                                                                                            </div>
                                                                                                                            <div class="form-group"   id="div_detalle_tpo_oclusion_dent_temp" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Detalle Escalón<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Escalón" data-seccion="Oclusión Temporal"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_tpo_oclusion_dent_temp" id="det_tpo_oclusion_dent_temp"></textarea>
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
                                                                                                                                <select name="tpo_oclusion_dent_permanente" id="tpo_oclusion_dent_permanente" data-titulo="Tipo Oclusión" data-seccion="Dentición Permanente" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_oclusion_dent_permanente','div_detalle_tpo_oclusion_dent_permanente','det_tpo_oclusion_dent_permanente',2)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">Clase I de Angle</option>
                                                                                                                                    <option value="2">Clase II de Angle</option>
                                                                                                                                    <option value="3">Clase III de Angle</option>
                                                                                                                                    <option value="4">Observaciones</option>
                                                                                                                                </select>

                                                                                                                            </div>
                                                                                                                            <div class="form-group"   id="div_detalle_tpo_oclusion_dent_permanente" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Observaciones<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_tpo_oclusion_dent_permanente" id="det_tpo_oclusion_dent_permanente"></textarea>
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
                                                                                                                <select name="tipo_radio" id="tipo_radio" data-titulo="radiología" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_radio','div_detalle_tipo_radio','ex_tipo_radio',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Panorámica</option>
                                                                                                                    <option value="2">Dental Simple<i>(describir pieza)</i></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_tipo_radio" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Aumento de Volumen<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_tipo_radio" id="ex_tipo_radio"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Resultado radiología</label>
                                                                                                                <select name="result_radio" id="result_radio" data-titulo="radiología" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('result_radio','div_detalle_result_radio','ex_result_radio',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si<i>(describir)</i></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_result_radio" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Aumento de Volumen<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_result_radio" id="ex_result_radio"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <button type="button" class="btn btn-success btn-sm btn-block" onclick="d_periodoncista1();"><i class="feather icon-file-plus"></i> Solicitar Estudio Radiológico</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="fotos_oped" role="tabpanel" aria-labelledby="fotos_oped_tab" >
                                                                                                <div id="contenedor_imagenes_odontop">Aqui iran las imagenes</div>
                                                                                                <div class="row mb-1">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <div class="card-informacion">
                                                                                                            <div class="card-body">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                                        <div class="card-informacion p-2">
                                                                                                                            <div class="card-top" id="img">
                                                                                                                                <h6 class="text-c-blue">Imagenes Pre</h6>
                                                                                                                                <div class="dropzone" id="mis-imagenes-odontop-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group fill mt-3">
                                                                                                                                <label for="" class="floating-label-activo-sm">Identificación de imagen</label>
                                                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="iden_image_pre" id="iden_image_pre"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                                        <div class="card-informacion p-2">
                                                                                                                            <div class="card-top" id="img">
                                                                                                                                <h6 class="text-c-blue">Imagenes Post</h6>
                                                                                                                                <div class="dropzone" id="mis-imagenes-odontop-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                                            </div>
                                                                                                                            <div>
                                                                                                                                <div class="form-group fill mt-3">
                                                                                                                                    <label for="" class="floating-label-activo-sm">Identificación de imagen</label>
                                                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="iden_image_post" id="iden_image_post"></textarea>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
                                                                                                                        <div class="form-group fill">
                                                                                                                            <input type="hidden" name="biopsia_odont" id="biopsia_odont" value="">

                                                                                                                            <div class="form-group fill">
                                                                                                                                <label id="" name="" class="floating-label-activo-sm">Observaciones / Comentarios</label>
                                                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia" id="obs_result_biopsia"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="card-footer">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12">
                                                                                                                        <button type="button" class="btn btn-icon btn-info" onclick="guardar_pieza_imagenes_rx()" ><i class="feather icon-save"></i></button>
                                                                                                                    </div>
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
                                                            <!--DOLOR URGENCIA-->
                                                            {{--  <div class="tab-pane fade show active" id="examen_od_ped_general" role="tabpanel" aria-labelledby="examen_od_ped_general-tab">
                                                                <div class="form-row mt-4">

                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 ">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Derivado por:</label>
                                                                            <select name="derivado_por_odontop" id="derivado_por_odontop" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('derivado_por_odontop','div_derivado_por_odontop','obs_derivado_por_odontop',3);">
                                                                                <option value="1">Consulta espontánea</option>
                                                                                <option value="2">Servicio de urgencia</option>
                                                                                <option value="3">Otro Profesional</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_derivado_por_odontop" style="display:none;">
                                                                            <label class="floating-label-activo-sm">Nombre otro profesional<i>(nombre)</i></label>
                                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_derivado_por_odontop" id="obs_derivado_por_odontop"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                        <div class="form-group">
                                                                           <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Piezas N°</label><!--USAR SELECT 2 ?-->
                                                                                <select class="js-example-basic-multiple select2-dental" name="pzas_odp_urg" id="pzas_op_urg" multiple="multiple">
                                                                                    @foreach (['1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8','3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '4.1', '4.2', '4.3', '4.4', '4.5', '4.6', '4.7', '4.8'] as $pieza)
                                                                                        <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="est_ct_prisma">Diagnóstico de Urgencia</label>
                                                                            <select class="form-control form-control-sm" id="diag_urg_odped"  name="diag_urg_odped"  onchange="evaluar_para_carga_detalle('diag_urg_odped','div_diag_urg_odped','obs_diag_urg_odped',6);">
                                                                                <option value="0">Elija Diagnóstico</option>
                                                                                <option value="1">Caries</option>
                                                                                <option value="2">Fractura</option>
                                                                                <option value="3">periodontopatia leve</option>
                                                                                <option value="4">periodontopatia severa</option>
                                                                                <option value="5">Restos radiculares</option>
                                                                                <option value="6">Otro Diagnóstico</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_diag_urg_odped" style="display:none;">
                                                                            <label class="floating-label-activo-sm" for="obs_diag_urg_odped">Otro diagnóstico<i>(describir)</i></label>
                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_diag_urg_odped" id="obs_diag_urg_odped"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label class="floating-label-activo-sm">Historia Anterior de la/s piezas</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1" name="historia_anterior_odontop" id="historia_anterior_odontop"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mt-1">
                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 ">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="tto_urg_odped">Tratamiento</label>
                                                                            <select class="form-control form-control-sm" id="tto_urg_odped" name="tto_urg_odped" onchange="evaluar_para_carga_detalle('tto_urg_odped','div_tto_urg_odped','obs_tto_urg_odped',25);">
                                                                                <optgroup label="Tratamiento Pediátrico">
                                                                                    <option value="1 ">Examen inicial, plan de tratamiento y  presupuesto </option>
                                                                                    <option value="2 ">Instrucción y control de higiene y profilaxis </option>
                                                                                    <option value="3 ">Aplicación flúor gel</option>
                                                                                    <option value="4 ">Aplicación flúor barniz</option>
                                                                                    <option value="5 ">Destartraje (por grupo, máximo dos) </option>
                                                                                    <option value="6 ">Endodoncia pieza permanente</option>
                                                                                    <option value="7 ">Exodoncia simple diente temporal</option>
                                                                                    <option value="8 ">Mantenedor de espacio fijo o removible /valor no incluye laboratorio</option>
                                                                                    <option value="9">Obturación v. ionómero pieza temporal anterior y posterior simple</option>
                                                                                    <option value="10">Obturación v. ionómero pieza temporal anterior y posterior compuesto</option>
                                                                                    <option value="11">Obturación resina fotocurado composite  pieza  permanente anterior y posterior simple</option>
                                                                                    <option value="12">Obturación resina fotocurado composite pieza permanente anterior y posterior compuesto</option>
                                                                                    <option value="13">Obturación resina fotocurado, reconstitución </option>
                                                                                    <option value="14">Obturación resina fotocurado carillas  anteriores </option>
                                                                                    <option value="15">Pulpotomía</option>
                                                                                    <option value="16">Pulpectomía anterior</option>
                                                                                    <option value="17">Pulpectomía posterior</option>
                                                                                    <option value="18">Recubrimiento pulpar directo</option>
                                                                                    <option value="19">Recubrimiento pulpar indirecto</option>
                                                                                    <option value="20">Sellantes pieza temporal y permanente  </option>
                                                                                    <option value="21">Sesión de adaptación</option>
                                                                                    <option value="22">Trat. de conducto en pieza temporal anterior </option>
                                                                                    <option value="23">Tratamiento de conducto en pieza temporal posterior</option>
                                                                                    <option value="24">Tratamiento diente gangrenado</option>
                                                                                    <option value="25">Otro diagnóstico anotar</option>
                                                                                </optgroup>
                                                                            </select>
                                                                        </div>
                                                                          <div class="form-group" id="div_tto_urg_odped" style="display:none;">
                                                                            <label class="floating-label-activo-sm" for="obs_tto_urg_odped">Otro tratamiento<i>(describir)</i></label>
                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tto_urg_odped" id="obs_tto_urg_odped"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 ">
                                                                         <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="est_ct_prisma">Medidas especiales</label>
                                                                            <select class="form-control form-control-sm" id="me_urg_odped"  name="me_urg_odped"  onchange="evaluar_para_carga_detalle('me_urg_odped','div_me_urg_odped','obs_me_urg_odped',6);">>
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Hospitalizar</option>
                                                                                <option value="2">Profilaxis Infección derivado a su casa</option>
                                                                                <option value="3">Antibiótico + analgesicos derivado a su casa</option>
                                                                                <option value="4">Examenes de sangre</option>
                                                                                <option value="5">Examenes Radiológicos</option>
                                                                                <option value="6">Derivado a otro especiaqlista</option>
                                                                                <option value="6">Otras medidas(describir)</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_me_urg_odped" style="display:none;">
                                                                            <label class="floating-label-activo-sm" for="obs_me_urg_odped">Otras medidas<i>(describir) Tipo</i></label>
                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_me_urg_odped" id="obs_me_urg_odped"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                                                        <div id="pieza_dentalrx" class="form-row">
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <button type="button" class="btn btn-outline-primary btn-block" onclick="hora_medica_pedir({{ $profesional->id }}, {{ $id_lugar_atencion }})"><i class="feather icon-calendar"></i> Agendar hora</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8 mx-auto">
                                                                                <div class="card-informacion" style="border: 1px solid #6c9bd5;">
                                                                                    <div class="card-top text-center">
                                                                                        <h5 class="text-c-blue">PRÓXIMO CONTROL</h5>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <div  class="form-row">
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                                <h5 class="text-c-blue"><i class="fas fa-calendar"></i> Fecha:</h5><h5 class="font-weight-bold">{{ isset($proxima_fecha_atencion) ? $proxima_fecha_atencion : '' }}</h5>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                                <h5 class="text-c-blue"><i class="fas fa-clock"></i> Horario:</h5><p>  <strong>{{ isset($hora_inicio_atencion) ? $hora_inicio_atencion : '--:--' }}</strong> a <strong>{{ isset($hora_fin_atencion) ? $hora_fin_atencion : '--:--' }}</strong></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  --}}

                                                            <!--EXAMEN  ORAL-->
                                                            <div class="tab-pane fade show" id="ex_oral_od_ped" role="tabpanel" aria-labelledby="ex_oral_od_ped_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="intraoral_odontop_tab" data-toggle="tab" href="#intraoral_odontop" role="tab" aria-controls="intraoral_odontop" aria-selected="true">Intra-Oral</a>
                                                                                            <a class="nav-link-aten text-reset" id="extraoral_odontop_tab" data-toggle="tab" href="#extraoral_odontop" role="tab" aria-controls="extraoral_odontop" aria-selected="false">Extra Oral</a>
                                                                                            <a class="nav-link-aten text-reset" id="radiologia_odontop_tab" data-toggle="tab" href="#radiologia_odontop" role="tab" aria-controls="radiologia_odontop" aria-selected="false" onclick="mostrar_nueva_pieza_oral_rx_odontop()">Ex. Radiológico por pieza</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="intraoral_odontop" role="tabpanel" aria-labelledby="intraoral_odontop_tab">
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
                                                                                            <div class="tab-pane fade show" id="extraoral_odontop" role="tabpanel" aria-labelledby="extraoral_odontop_tab">
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
                                                                                            <div class="tab-pane fade show" id="radiologia_odontop" role="tabpanel" aria-labelledby="radiologia_odontop_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="nueva_pieza_dental_odontop_"></div>
                                                                                                                <div id="contenedor_pieza_dental_odontop">


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
                                                            <div class="tab-pane fade show" id="endo_od_ped_pieza" role="tabpanel" aria-labelledby="endo_od_ped_pieza-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="nueva_pieza_dental_odontop_examen"></div>
                                                                                <div id="contenedor_pieza_dental_odontop_examen">
                                                                                    @php $counter = 123; @endphp

                                                                                    @foreach ($examenes_dental_odontopediatria as $examen)
                                                                                        <div class="card-informacion">
                                                                                            <div class="card-body">
                                                                                                <div class="mb-3">
                                                                                                    <div class="form-row">
                                                                                                        <div
                                                                                                            class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label
                                                                                                                    class="floating-label-activo-sm">Pieza
                                                                                                                    N°</label>
                                                                                                                <input type="text"
                                                                                                                    class="form-control form-control-sm"
                                                                                                                    name="n_pieza_ex_pp{{ $counter }}"
                                                                                                                    id="n_pieza_ex_pp{{ $counter }}"
                                                                                                                    value="{{ $examen->numero_pieza }}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                                            <div class="form-group">
                                                                                                                <label
                                                                                                                    class="floating-label-activo-sm">Zona
                                                                                                                    de dolor</label>
                                                                                                                <input type="text"
                                                                                                                    class="form-control form-control-sm"
                                                                                                                    name="n_pieza_zona_dolor_pp{{ $counter }}"
                                                                                                                    id="n_pieza_zona_dolor_pp{{ $counter }}"
                                                                                                                    value="{{ $examen->zona_dolor }}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                                            <div class="form-group">
                                                                                                                <label
                                                                                                                    class="floating-label-activo-sm">Historia
                                                                                                                    anterior</label>
                                                                                                                <input type="text"
                                                                                                                    class="form-control form-control-sm"
                                                                                                                    name="n_pieza_historia_anterior_pp{{ $counter }}"
                                                                                                                    id="n_pieza_historia_anterior_pp{{ $counter }}"
                                                                                                                    value="{{ $examen->historia_anterior }}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row my-2">
                                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Intensidad</label>
                                                                                                                <select name="intensidad_odontop1" id="intensidad_odontop1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad_odontop1','div_intensidad_odontop1','obs_intensidad_odontop1',4);">
                                                                                                                    <option value="1" @if($examen->intensidad == 1) selected @endif>Leve</option>
                                                                                                                    <option value="2" @if($examen->intensidad == 2) selected @endif>Moderada</option>
                                                                                                                    <option value="3" @if($examen->intensidad == 3) selected @endif>Severa</option>
                                                                                                                    <option value="4" @if($examen->intensidad == 4) selected @endif>Intensa</option>
                                                                                                                    <option value="5" @if($examen->intensidad == 5) selected @endif>Otro (Describir)</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_intensidad_odontop1" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Intensidad</label>
                                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad_odontop1" id="obs_intensidad_odontop1"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Modo dolor</label>
                                                                                                                <select name="modo_dolor_odontop1" id="modo_dolor_odontop1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor_odontop1','div_modo_dolor_odontop1','obs_modo_dolor_odontop1',3);">
                                                                                                                    <option value="1" @if($examen->modo_dolor == 1) selected @endif>Pulsátil</option>
                                                                                                                    <option value="2" @if($examen->modo_dolor == 2) selected @endif>Permanente</option>
                                                                                                                    <option value="3" @if($examen->modo_dolor == 3) selected @endif>Otro (Describir)</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_modo_dolor_odontop1" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Modo dolor</label>
                                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor_odontop1" id="obs_modo_dolor_odontop1"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Localización</label>
                                                                                                                <select name="loc_dolor_odontop1" id="loc_dolor_odontop1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor_odontop1','div_loc_dolor_odontop1','obs_loc_dolor_odontop1',3);">
                                                                                                                    <option value="1" @if($examen->localizacion == 1) selected @endif>Localizado</option>
                                                                                                                    <option value="2" @if($examen->localizacion == 2) selected @endif>Referido</option>
                                                                                                                    <option value="3" @if($examen->localizacion == 3) selected @endif>Otro (Describir)</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_loc_dolor_odontop1" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Localización</label>
                                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor_odontop1" id="obs_loc_dolor_odontop1"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                                                                <select name="provocacion_dolor_odontop1" data-titulo="Odontopediatria" data-seccion="Odontopediatria" id="provocacion_dolor_odontop1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor_odontop1','div_provocacion_dolor_odontop1','obs_provocacion_dolor_odontop1',5);">
                                                                                                                    <option value="1" @if($examen->provocacion_dolor == 1) selected @endif>Frío</option>
                                                                                                                    <option value="2" @if($examen->provocacion_dolor == 2) selected @endif>Calor</option>
                                                                                                                    <option value="3" @if($examen->provocacion_dolor == 3) selected @endif>Actividad</option>
                                                                                                                    <option value="4" @if($examen->provocacion_dolor == 4) selected @endif>Masticación</option>
                                                                                                                    <option value="5" @if($examen->provocacion_dolor == 5) selected @endif>Otro (Describir)</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_provocacion_dolor_odontop1" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                                                                <textarea class="form-control form-control-sm" data-titulo="Odontopediatria" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor_odontop1" id="obs_provocacion_dolor_odontop1"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                                <textarea class="form-control form-control-sm" data-titulo="Odontopediatria" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_observaciones_odontop1" id="obs_observaciones_odontop1">{{ $examen->observaciones }}</textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div
                                                                                                            class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label
                                                                                                                    class="floating-label-activo-sm">Resp.Calor</label>
                                                                                                                <select
                                                                                                                    id="sel_endo_resp_calor{{ $counter }}"
                                                                                                                    name="sel_endo_resp_calor{{ $counter }}"
                                                                                                                    class="form-control form-control-sm"
                                                                                                                    style=" font-size: 14px; color: #232020">
                                                                                                                    <option
                                                                                                                        @if ($examen->resp_calor == 'N/R No realizada') selected @endif>
                                                                                                                        <span>N/R </span> No
                                                                                                                        realizada</option>
                                                                                                                    <option
                                                                                                                        @if ($examen->resp_calor == '↑ Aumentado') selected @endif>
                                                                                                                        <span>↑ </span> Aumentado
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->resp_calor == '↓ Disminuido') selected @endif>
                                                                                                                        <span>↓ </span> Disminuido
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->resp_calor == 'N Normal') selected @endif>
                                                                                                                        <span>N </span> Normal</a>
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->resp_calor == '(-) No responde') selected @endif>
                                                                                                                        <span>(-) </span> No
                                                                                                                        responde</a></option>
                                                                                                                </select>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label
                                                                                                                    class="floating-label-activo-sm">Resp.Frio</label>
                                                                                                                <select
                                                                                                                    id="sel_endo_resp_frio{{ $counter }}"
                                                                                                                    name="sel_endo_resp_frio{{ $counter }}"
                                                                                                                    class="form-control form-control-sm"
                                                                                                                    style=" font-size: 14px; color: #232020">
                                                                                                                    <option
                                                                                                                        @if ($examen->resp_frio == 'N/R No realizada') selected @endif>
                                                                                                                        <span>N/R </span> No
                                                                                                                        realizada</option>
                                                                                                                    <option
                                                                                                                        @if ($examen->resp_frio == '↑ Aumentado') selected @endif>
                                                                                                                        <span>↑ </span> Aumentado
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->resp_frio == '↓ Disminuido') selected @endif>
                                                                                                                        <span>↓ </span> Disminuido
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->resp_frio == 'N Normal') selected @endif>
                                                                                                                        <span>N </span> Normal</a>
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->resp_frio == '(-) No responde') selected @endif>
                                                                                                                        <span>(-) </span> No
                                                                                                                        responde</a></option>
                                                                                                                </select>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label
                                                                                                                    class="floating-label-activo-sm">Eléctrico</label>
                                                                                                                <select
                                                                                                                    id="sel_endo_resp_elect{{ $counter }}"
                                                                                                                    name="sel_endo_resp_elect{{ $counter }}"
                                                                                                                    class="form-control form-control-sm"
                                                                                                                    style=" font-size: 14px; color: #232020">
                                                                                                                    <option
                                                                                                                        @if ($examen->electrico == 'N/R No realizada') selected @endif>
                                                                                                                        <span>N/R </span> No
                                                                                                                        realizada</option>
                                                                                                                    <option
                                                                                                                        @if ($examen->electrico == '↑ Aumentado') selected @endif>
                                                                                                                        <span>↑ </span> Aumentado
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->electrico == '↓ Disminuido') selected @endif>
                                                                                                                        <span>↓ </span> Disminuido
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->electrico == 'N Normal') selected @endif>
                                                                                                                        <span>N </span> Normal</a>
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->electrico == '(-) No responde') selected @endif>
                                                                                                                        <span>(-) </span> No
                                                                                                                        responde</a></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label
                                                                                                                    class="floating-label-activo-sm">Percusión</label>
                                                                                                                <select
                                                                                                                    id="sel_endo_resp_perc{{ $counter }}"
                                                                                                                    name="sel_endo_resp_perc{{ $counter }}"
                                                                                                                    class="form-control form-control-sm"
                                                                                                                    style=" font-size: 14px; color: #232020">
                                                                                                                    <option
                                                                                                                        @if ($examen->percusion == 'N/R No realizada') selected @endif>
                                                                                                                        <span>N/R </span> No
                                                                                                                        realizada</option>
                                                                                                                    <option
                                                                                                                        @if ($examen->percusion == '↑ Aumentado') selected @endif>
                                                                                                                        <span>↑ </span> Aumentado
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->percusion == '↓ Disminuido') selected @endif>
                                                                                                                        <span>↓ </span> Disminuido
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->percusion == 'N Normal') selected @endif>
                                                                                                                        <span>N </span> Normal</a>
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->percusion == '(-) No responde') selected @endif>
                                                                                                                        <span>(-) </span> No
                                                                                                                        responde</a></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label
                                                                                                                    class="floating-label-activo-sm">Exploración</label>
                                                                                                                <select
                                                                                                                    id="sel_endo_resp_expl{{ $counter }}"
                                                                                                                    name="sel_endo_resp_expl{{ $counter }}"
                                                                                                                    class="form-control form-control-sm"
                                                                                                                    style=" font-size: 14px; color: #232020">
                                                                                                                    <option
                                                                                                                        @if ($examen->exploracion == 'N/R No realizada') selected @endif>
                                                                                                                        <span>N/R </span> No
                                                                                                                        realizada</option>
                                                                                                                    <option
                                                                                                                        @if ($examen->exploracion == '↑ Aumentado') selected @endif>
                                                                                                                        <span>↑ </span> Aumentado
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->exploracion == '↓ Disminuido') selected @endif>
                                                                                                                        <span>↓ </span> Disminuido
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->exploracion == 'N Normal') selected @endif>
                                                                                                                        <span>N </span> Normal</a>
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->exploracion == '(-) No responde') selected @endif>
                                                                                                                        <span>(-) </span> No
                                                                                                                        responde</a></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label
                                                                                                                    class="floating-label-activo-sm">Cavitaria</label>
                                                                                                                <select
                                                                                                                    id="sel_endo_cavitaria{{ $counter }}"
                                                                                                                    name="sel_endo_cavitaria{{ $counter }}"
                                                                                                                    class="form-control form-control-sm"
                                                                                                                    style=" font-size: 14px; color: #232020">
                                                                                                                    <option
                                                                                                                        @if ($examen->cavitaria == 'N/R No realizada') selected @endif>
                                                                                                                        <span>N/R </span> No
                                                                                                                        realizada</option>
                                                                                                                    <option
                                                                                                                        @if ($examen->cavitaria == '↑ Aumentado') selected @endif>
                                                                                                                        <span>↑ </span> Aumentado
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->cavitaria == '↓ Disminuido') selected @endif>
                                                                                                                        <span>↓ </span> Disminuido
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->cavitaria == 'N Normal') selected @endif>
                                                                                                                        <span>N </span> Normal</a>
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        @if ($examen->cavitaria == '(-) No responde') selected @endif>
                                                                                                                        <span>(-) </span> No
                                                                                                                        responde</a></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-danger-light-c"
                                                                                                    onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'odontop')">X</button>
                                                                                            </div>
                                                                                            @php $counter++; @endphp
                                                                                        </div>
                                                                                    @endforeach

                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--PLANIFICACION TRATAMIENTO-->
                                                            <div class="tab-pane fade show" id="plan_od_ped" role="tabpanel" aria-labelledby="plan_od_ped-tab">
                                                                 <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                        <div class="card-informacion">
                                                                            <div class="card-top">
                                                                                <h6 class="text-uppercase text-c-blue">Presupuesto por pieza</h6>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="dt-responsive table-responsive pb-4">
                                                                                            <table id="table_piezas_presupuesto_odped" class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Pieza o Grupo</th>
                                                                                                        <th>Diagnóstico</th>
                                                                                                        <th>Tratamiento</th>
                                                                                                        <th>Valor</th>

                                                                                                        <th>Accion</th>
                                                                                                        <th>Estado</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    @foreach ($odontograma as $o)
                                                                                                    @if($o->urgencia == 0 && $o->presupuesto == 1)
                                                                                                        <tr>
                                                                                                            <td>{{ $o->pieza }}</td>
                                                                                                            <td class="text-uppercase">{{ $o->diagnostico }}</td>
                                                                                                            <td>{{ $o->descripcion }}</td>
                                                                                                            <td>${{ number_format($o->valor,0,',','.') }}</td>

                                                                                                            <td>
                                                                                                                <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma({{ $o->id }})"><i class="feather icon-x"></i></button>
                                                                                                                <button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza({{ $o->id }})"><i class="feather icon-repeat"></i> </button>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                @if($o->estado == 0)
                                                                                                                    <span class="text-uppercase">Pendiente</span>
                                                                                                                @elseif($o->estado == 1)
                                                                                                                    <span class="text-uppercase">Realizado</span>
                                                                                                                @elseif($o->estado == 2)
                                                                                                                    <span class="text-uppercase">Cancelado</span>
                                                                                                                @elseif($o->estado == 3)
                                                                                                                    <span class="text-uppercase">Citado a Control</span>
                                                                                                                @endif
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    @endif
                                                                                                    @endforeach
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                        <div class="card-informacion">
                                                                            <div class="card-top">
                                                                            <h6 class="text-uppercase text-c-blue">Seleccione por pieza o grupo de piezas</h6>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                    <div class="row my-2">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                                            <div class="custom-control custom-switch">
                                                                                                <input type="checkbox" class="custom-control-input" id="max_sup_odped" onclick="seleccionar_maxilar_superior_odped()">
                                                                                                <label class="custom-control-label" for="max_sup_odped">Seleccione maxilar superior</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                                            <div class="custom-control custom-switch">
                                                                                                <input type="checkbox" class="custom-control-input" id="max_inf_odped" onclick="seleccionar_maxilar_inferior_odped()">
                                                                                                <label class="custom-control-label" for="max_inf_odped">Seleccione maxilar inferior</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                                            <div class="custom-control custom-switch">
                                                                                                <input type="checkbox" class="custom-control-input" id="piezas_presup_odped" onclick="seleccionar_piezas_presup()">
                                                                                                <label class="custom-control-label" for="piezas_presup_odped">Piezas presupuesto</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                                                                                        @include('atencion_odontologica.generales.odontograma_ped_grupos_odped')
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6 mt-2">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="" class="floating-label-activo-sm">Grupos</label>
                                                                                                    <select class="js-example-basic-multiple" name="paciente_piezas_dentales_ex_odped" id="paciente_piezas_dentales_ex_odped" multiple="multiple">
                                                                                                        <option value="5.1">5.1</option>
                                                                                                        <option value="5.2">5.2</option>
                                                                                                        <option value="5.3">5.3</option>
                                                                                                        <option value="5.4">5.4</option>
                                                                                                        <option value="5.5">5.5</option>
                                                                                                        <option value="6.1">6.1</option>
                                                                                                        <option value="6.2">6.2</option>
                                                                                                        <option value="6.3">6.3</option>
                                                                                                        <option value="6.4">6.4</option>
                                                                                                        <option value="6.5">6.5</option>
                                                                                                        <option value="8.5">8.5</option>
                                                                                                        <option value="8.4">8.4</option>
                                                                                                        <option value="8.3">8.3</option>
                                                                                                        <option value="8.2">8.2</option>
                                                                                                        <option value="8.1">8.1</option>
                                                                                                        <option value="7.1">7.1</option>
                                                                                                        <option value="7.2">7.2</option>
                                                                                                        <option value="7.3">7.3</option>
                                                                                                        <option value="7.4">7.4</option>
                                                                                                        <option value="7.5">7.5</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Diagnostico</label>
                                                                                                    <select class="form-control form-control-sm" id="diagnostico_combo_g">
                                                                                                        <option value="0">Seleccione</option>
                                                                                                        @foreach ($diagnosticos as $d)
                                                                                                            <option value="{{ $d->id }}">{{ $d->descripcion }}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Tratamiento</label>
                                                                                                    <input type="text" name="diag_presupuesto_pieza_g_odped" id="diag_presupuesto_pieza_g_odped" placeholder="DESCRIBA EL TRATAMIENTO POR PIEZA O GRUPO DE PIEZAS" class="form-control form-control-sm tratamiento-autocomplete ui-autocomplete-input" autocomplete="off">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <button type="button" class="btn btn-primary btn-sm btn-block" onclick="cargar_a_presupuesto_odped_g()"><i class="feather icon-save"></i> Guardar piezas</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--TABLA SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->

                                                                    <!--TABLA INSUMOS-->
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                        <div class="card-informacion">
                                                                            <div class="card-top">
                                                                                <h6 class="text-uppercase text-c-blue d-inline">Insumos</h6>
                                                                                <button type="button" class="btn btn-info btn-xxs float-md-right d-inline d-inline"  onclick="abrir_modal_insumos()"><i class="fas fa-plus"></i> Agregar Insumos</button>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="table-responsive">
                                                                                            <table id="table_insumos_odped" class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <td>Insumo</td>
                                                                                                        <td>Observaciones</td>
                                                                                                        <td>Cantidad</td>
                                                                                                        <td>Valor</td>
                                                                                                        <td>Total</td>
                                                                                                        <td>Acciones</td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    @foreach ($insumos_tratamientos as $t)
                                                                                                        @php $total = $t->cantidad * $t->valor @endphp
                                                                                                        <tr>
                                                                                                            <td>{{ $t->insumos }} {{ $t->nombre_marca }}</td>
                                                                                                            <td>{{ $t->observaciones }}</td>
                                                                                                            <td>{{ $t->cantidad }}</td>
                                                                                                            <td>{{ number_format($t->valor)  }}</td>
                                                                                                            <td>{{ number_format($total)  }}</td>
                                                                                                            <td>
                                                                                                                @if($t->presupuesto == 0 || $t->presupuesto == null)
                                                                                                                <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo({{ $t->id }})"><i class="feather icon-shopping-cart"></i></button>
                                                                                                                @else
                                                                                                                <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo({{ $t->id }})"><i class="fas fa-minus"></i></button>
                                                                                                                @endif
                                                                                                                <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo({{ $t->id }})"><i class="feather icon-edit"></i></button>
                                                                                                                <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo({{ $t->id }})"><i class="feather icon-x"></i></button>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    @endforeach
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row mt-2">
                                                                                    <div class="col-12 d-flex justify-content-end">
                                                                                        <button type="button" class="btn btn-success btn-xxs" onclick="abrirModalCorreo()"><i class="fas fa-email"></i> Enviar por correo</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_plan_odontop">
                                                                                    <div id="pieza_dental" class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-xl-12" >
                                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                                <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                                                    <div class="col-sm-12 col-md-12" id="planificacion_examenes_odontop">
                                                                                                        @foreach ($examenes_dental_odontopediatria as $examen)
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                    <input type="text" class="form-control form-control-sm" value="{{ $examen->numero_pieza }}">
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
                                                                                                        </div>
                                                                                                        @endforeach
                                                                                                        <div class="col-sm-12 col-md-12">
                                                                                                            <button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('odontop')">Cargar a presupuesto</button>
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
                                                                </div> --}}
                                                            </div>
                                                            <!-- CONTROL E INDICACIONES -->
                                                            <div class="tab-pane fade" id="control_ped" role="tabpanel" aria-labelledby="control_ped-tab">
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-row mt-3">
                                                                        <div
                                                                            class="col-sm-10 col-md-6 col-lg-6 col-xl-6 ">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm" for="est_ct_prisma">Medidas especiales</label>
                                                                                <select class="form-control form-control-sm" id="me_urg_odped" name="me_urg_odped" onchange="evaluar_para_carga_detalle('me_urg_odped','div_me_urg_odped','obs_me_urg_odped',6);">>
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">Hospitalizar</option>
                                                                                    <option value="2">Profilaxis Infección derivado a su casa</option>
                                                                                    <option value="3">Antibiótico + analgesicos derivado a su casa</option>
                                                                                    <option value="4">Examenes de sangre</option>
                                                                                    <option value="5">Examenes Radiológicos</option>
                                                                                    <option value="6">Derivado a otro especialista</option>
                                                                                    <option value="7">Otras medidas(describir)</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_me_urg_odped" style="display:none;">
                                                                                <label class="floating-label-activo-sm" for="obs_me_urg_odped">Otras medidas<i>(describir) Tipo</i></label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                    name="obs_me_urg_odped" id="obs_me_urg_odped"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-10 col-md-6 col-lg-6 col-xl-6 ">
                                                                            <div id="ind_urg"
                                                                                class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                    <div
                                                                                        class="form-group">
                                                                                        <button
                                                                                            type="button"
                                                                                            class="btn btn-outline-primary btn-block"
                                                                                            onclick="hora_medica_pedir({{ $profesional->id }}, {{ $id_lugar_atencion }})"><i
                                                                                                class="feather icon-calendar"></i>
                                                                                            Agendar
                                                                                            hora</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mx-auto">
                                                                                    <div class="card-informacion"
                                                                                        style="border: 1px solid #6c9bd5;">
                                                                                        <div
                                                                                            class="card-top text-center">
                                                                                            <h5
                                                                                                class="text-c-blue">
                                                                                                PRÓXIMO
                                                                                                CONTROL
                                                                                            </h5>
                                                                                        </div>
                                                                                        <div
                                                                                            class="card-body">
                                                                                            <div
                                                                                                class="form-row">
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                                    <h5
                                                                                                        class="text-c-blue">
                                                                                                        <i
                                                                                                            class="fas fa-calendar"></i>
                                                                                                        Fecha:
                                                                                                    </h5>
                                                                                                    <h5
                                                                                                        class="font-weight-bold">
                                                                                                        <span id="proxima_fecha_atencion_od_ped"> {{ isset($proxima_fecha_atencion) ? $proxima_fecha_atencion : '' }} </span>
                                                                                                    </h5>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                                    <h5
                                                                                                        class="text-c-blue">
                                                                                                        <i
                                                                                                            class="fas fa-clock"></i>
                                                                                                        Horario:
                                                                                                    </h5>
                                                                                                    <p id="proxima_hora_atencion_od_ped"> <strong>{{ isset($hora_inicio_atencion) ? $hora_inicio_atencion : '--:--' }}</strong>
                                                                                                        a
                                                                                                        <strong>{{ isset($hora_fin_atencion) ? $hora_fin_atencion : '--:--' }}</strong>
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-612 col-lg-12 col-xl-12 mb-4 ">
                                                                            <label
                                                                                class="floating-label-activo-sm"
                                                                                for="obs_me_urg_odped">Observaciones</i></label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                name="obs_ind_urgencia" id="obs_ind_urgencia"></textarea>
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
                            <!--ODONTOLOGIA URGENCIA-->
                             @include('atencion_odontologica.generales.control_urgencias')
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

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                        <input type="submit" class="btn btn-info mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                    </div>
                                </div>
                            </div>
                    </div>
                            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        </div>
                        <!-- ODONTOGRAMA-->
                        <div class="tab-pane fade" id="odontograma_ped" role="tabpanel" aria-labelledby="odontograma_ped-tab">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                    <h1 class="text-c-blue mt-1 mb-1 f-22 d-inline">Odontograma Pediátrico</h1>
                                    <button type="button" class="btn btn-purple d-inline float-md-right mr-3" data-target="#simbologia-infantil" data-toggle="modal">Ver simbología</button>
                                </div>
                                <div class="row w-100" id="odontograma_ped_completo">
                                    @include('atencion_odontologica.generales.odontograma_pediatrico_completo')
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
                                                                {{--  <a href="periodontograma/perio.php" target="_blank"><button type="button"> --}}
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
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">


                                                    <div id="contenedor_examenes_grupos_dentales_odontop">
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
                                                                <div class="tab-content" >
                                                                    <!--GRUPO 5-->
                                                                    <div class="tab-pane fade show active" id="grupo_5" role="tabpanel" aria-labelledby="grupo_5_tab">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="text-center text-c-blue mb-2">CUADRANTE 5</h6>
                                                                                                    @if(isset($quinto_cuadrante_infantil))
                                                                                                        @foreach($quinto_cuadrante_infantil as $cuadrante)
                                                                                                            <div class="table-responsive">

                                                                                                                    <input type="hidden" name="ficha_id_atencion_dental_odon1"
                                                                                                                        id="ficha_id_atencion_dental_odon1">
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
                                                                                                                                <select id="pieza_odontograma_{{ $loop->index + 1  }}_5" name="pieza_odontograma_{{ $loop->index + 1  }}_5"
                                                                                                                                    class="form-control form-control-sm">
                                                                                                                                    <option value="{{ $cuadrante->numero_pieza }}">{{ $cuadrante->numero_pieza }}</option>
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
                                                                                                                                                <div class="circulo-v" id="caraV{{ $loop->index + 1  }}5"
                                                                                                                                                    onclick="cambiar_color({{ $loop->index + 1  }}, 5)">
                                                                                                                                                    V
                                                                                                                                                </div>

                                                                                                                                            </td>
                                                                                                                                            <td class="padding-caras"></td>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                            <td class="padding-caras">
                                                                                                                                                <div class="circulo-d" id="caraD{{ $loop->index + 1  }}5"
                                                                                                                                                    onclick="cambiar_colorD({{ $loop->index + 1  }}, 5)">D</div>
                                                                                                                                            </td>
                                                                                                                                            <td class="padding-caras">
                                                                                                                                                <div class="circulo-o" id="caraO{{ $loop->index + 1  }}5"
                                                                                                                                                    onclick="cambiar_colorO({{ $loop->index + 1  }}, 5)">O</div>

                                                                                                                                            </td>
                                                                                                                                            <td class="padding-caras">
                                                                                                                                                <div class="circulo-m" id="caraM{{ $loop->index + 1  }}5"
                                                                                                                                                    onclick="cambiar_colorM({{ $loop->index + 1  }}, 5)">M</div>

                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                            <td class="padding-caras"></td>
                                                                                                                                            <td class="padding-caras">
                                                                                                                                                <div class="circulo-p" id="caraP{{ $loop->index + 1  }}5"
                                                                                                                                                    onclick="cambiar_colorP({{ $loop->index + 1  }}, 5)">P</div>

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
                                                                                                                                <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_5"
                                                                                                                                    name="diagnostico_{{ $loop->index + 1 }}_5">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    @foreach($diagnosticos as $diagnostico)
                                                                                                                                        <option value="{{$diagnostico->id}}">{{$diagnostico->descripcion}} </option>
                                                                                                                                    @endforeach
                                                                                                                                </select>
                                                                                                                            </td>
                                                                                                                            <td class="px-2 py-2">
                                                                                                                                <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_{{ $loop->index + 1 }}_5" />

                                                                                                                                <input type="hidden" name="odontograma_{{ $loop->index + 1 }}_5" id="odontograma_{{ $loop->index + 1 }}_5" value="{{ $loop->index }}">
                                                                                                                                <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_5" id="caraM_check_{{ $loop->index + 1 }}_5" value="0">
                                                                                                                                <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_5" id="caraO_check_{{ $loop->index + 1 }}_5" value="0">
                                                                                                                                <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_5" id="caraD_check_{{ $loop->index + 1 }}_5" value="0">
                                                                                                                                <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_5" id="caraV_check_{{ $loop->index + 1 }}_5" value="0">
                                                                                                                                <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_5" id="caraP_check_{{ $loop->index + 1 }}_5" value="0">
                                                                                                                                <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_quinto_cuadrante({{ $loop->index + 1 }})">
                                                                                                                                    Registrar
                                                                                                                                </button>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                            </div>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                    @if($quinto_cuadrante_infantil->count() == 0)
                                                                                                        <div class="col-md-12">
                                                                                                            <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--GRUPO 6-->
                                                                    <div class="tab-pane fade show" id="grupo_6" role="tabpanel" aria-labelledby="grupo_6_tab">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="text-center text-c-blue mb-2">CUADRANTE 6</h6>
                                                                                                    @if(isset($sexto_cuadrante_infantil))
                                                                                                        @foreach($sexto_cuadrante_infantil as $pieza)
                                                                                                        <div class="table-responsive">

                                                                                                                <input type="hidden" name="ficha_id_atencion_dental_odon2"
                                                                                                                    id="ficha_id_atencion_dental_odon2">
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
                                                                                                                            <select id="pieza_odontograma_{{ $loop->index + 1  }}_6" name="pieza_odontograma_{{ $loop->index + 1  }}_6"
                                                                                                                                class="form-control form-control-sm">
                                                                                                                                <option value="{{ $pieza->numero_pieza }}">{{ $pieza->numero_pieza }}</option>
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
                                                                                                                                            <div class="circulo-v" id="caraV{{ $loop->index + 1 }}6"
                                                                                                                                                onclick="cambiar_color({{ $loop->index + 1 }},6)">V</div>
                                                                                                                                        </td>
                                                                                                                                        <td class="padding-caras"></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-d" id="caraD{{ $loop->index + 1 }}6"
                                                                                                                                                onclick="cambiar_colorD({{ $loop->index + 1 }},6)">D</div>
                                                                                                                                        </td>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-o" id="caraO{{ $loop->index + 1 }}6"
                                                                                                                                                onclick="cambiar_colorO({{ $loop->index + 1 }},6)">O</div>
                                                                                                                                        </td>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-m" id="caraM{{ $loop->index + 1 }}6"
                                                                                                                                                onclick="cambiar_colorM({{ $loop->index + 1 }},6)">M</div>
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                        <td class="padding-caras"></td>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-p" id="caraP{{ $loop->index + 1 }}6"
                                                                                                                                                onclick="cambiar_colorP({{ $loop->index + 1 }},6)">P</div>
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
                                                                                                                            <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1  }}_6"
                                                                                                                                name="diagnostico_{{ $loop->index + 1  }}_6">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                @foreach($diagnosticos as $diagnostico)
                                                                                                                                    <option value="{{$diagnostico->id}}">{{$diagnostico->descripcion}} </option>
                                                                                                                                @endforeach
                                                                                                                            </select>
                                                                                                                        </td>
                                                                                                                        <td class="px-1 py-1">
                                                                                                                            <input type="text" name="tratamiento_{{ $loop->index + 1  }}_6" id="tratamiento_{{ $loop->index + 1  }}_6" class="form-control form-control-sm tratamiento-autocomplete" />

                                                                                                                            <input type="hidden" name="odontograma{{ $loop->index + 1 }}_6" id="odontograma{{ $loop->index + 1 }}_6" value="1">
                                                                                                                            <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_6" id="caraM_check_{{ $loop->index + 1 }}_6" value="0">
                                                                                                                            <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_6" id="caraO_check_{{ $loop->index + 1 }}_6" value="0">
                                                                                                                            <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_6" id="caraD_check_{{ $loop->index + 1 }}_6" value="0">
                                                                                                                            <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_6" id="caraV_check_{{ $loop->index + 1 }}_6" value="0">
                                                                                                                            <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_6" id="caraP_check_{{ $loop->index + 1 }}_6" value="0">
                                                                                                                            <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_sexto_cuadrante({{ $loop->index + 1 }})">
                                                                                                                                Registrar
                                                                                                                            </button>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </table>
                                                                                                        </div>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                    @if($sexto_cuadrante_infantil->count() == 0)
                                                                                                        <div class="col-md-12">
                                                                                                            <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--GRUPO 7-->
                                                                    <div class="tab-pane fade show" id="grupo_7" role="tabpanel" aria-labelledby="grupo_7-tab">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="text-center text-c-blue mb-2">CUADRANTE 7</h6>
                                                                                                    @if(isset($septimo_cuadrante_infantil))
                                                                                                        @foreach($septimo_cuadrante_infantil as $cuadrante)
                                                                                                        <div class="table-responsive">

                                                                                                                <input type="hidden" name="ficha_id_atencion_dental_odon3"
                                                                                                                    id="ficha_id_atencion_dental_odon3">
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
                                                                                                                            <select id="pieza_odontograma_{{ $loop->index + 1 }}_7" name="pieza_odontograma_{{ $loop->index + 1 }}_7"
                                                                                                                                class="form-control form-control-sm">
                                                                                                                                <option value="{{ $cuadrante->numero_pieza }}">{{ $cuadrante->numero_pieza }}</option>
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
                                                                                                                                            <div class="circulo-v" id="caraV{{ $loop->index + 1 }}7"
                                                                                                                                                onclick="cambiar_color({{ $loop->index + 1 }}, 7)">V</div>
                                                                                                                                        </td>
                                                                                                                                        <td class="padding-caras"></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-d" id="caraD{{ $loop->index + 1 }}7"
                                                                                                                                                onclick="cambiar_colorD({{ $loop->index + 1 }}, 7)">D</div>
                                                                                                                                        </td>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-o" id="caraO{{ $loop->index + 1 }}7"
                                                                                                                                                onclick="cambiar_colorO({{ $loop->index + 1 }}, 7)">O</div>
                                                                                                                                        </td>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-m" id="caraM{{ $loop->index + 1 }}7"
                                                                                                                                                onclick="cambiar_colorM({{ $loop->index + 1 }}, 7)">M</div>
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                        <td class="padding-caras"></td>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-p" id="caraP{{ $loop->index + 1 }}7"
                                                                                                                                                onclick="cambiar_colorP({{ $loop->index + 1 }}, 7)">P</div>
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
                                                                                                                            <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_7"
                                                                                                                                name="diagnostico_{{ $loop->index + 1 }}_7">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                @foreach($diagnosticos as $diagnostico)
                                                                                                                                    <option value="{{$diagnostico->id}}">{{$diagnostico->descripcion}} </option>
                                                                                                                                @endforeach
                                                                                                                            </select>
                                                                                                                        </td>
                                                                                                                        <td class="px-1 py-1">
                                                                                                                            <input type="text" name="tratamiento_{{ $loop->index + 1 }}_7" id="tratamiento_{{ $loop->index + 1 }}_7" class="form-control form-control-sm tratamiento-autocomplete" />

                                                                                                                            <input type="hidden" name="odontograma{{ $loop->index + 1 }}_7" id="odontograma{{ $loop->index + 1 }}_7" value="1">
                                                                                                                            <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_7" id="caraM_check_{{ $loop->index + 1 }}_7" value="0">
                                                                                                                            <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_7" id="caraO_check_{{ $loop->index + 1 }}_7" value="0">
                                                                                                                            <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_7" id="caraD_check_{{ $loop->index + 1 }}_7" value="0">
                                                                                                                            <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_7" id="caraV_check_{{ $loop->index + 1 }}_7" value="0">
                                                                                                                            <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_7" id="caraP_check_{{ $loop->index + 1 }}_7" value="0">
                                                                                                                            <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_septimo_cuadrante({{ $loop->index + 1 }})">
                                                                                                                                Registrar
                                                                                                                            </button>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </table>
                                                                                                        </div>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                    @if($septimo_cuadrante_infantil->count() == 0)
                                                                                                        <div class="col-md-12">
                                                                                                            <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--GRUPO 8-->
                                                                    <div class="tab-pane fade show" id="grupo_8" role="tabpanel" aria-labelledby="grupo_8-tab">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="text-center text-c-blue mb-2">CUADRANTE 8</h6>
                                                                                                    @if(isset($octavo_cuadrante_infantil))
                                                                                                        @foreach($octavo_cuadrante_infantil as $cuadrante)
                                                                                                        <div class="table-responsive">

                                                                                                                <input type="hidden" name="ficha_id_atencion_dental_odon4"
                                                                                                                    id="ficha_id_atencion_dental_odon4">
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
                                                                                                                            <select id="pieza_odontograma_{{ $loop->index + 1 }}_8" name="pieza_odontograma_{{ $loop->index + 1 }}_8"
                                                                                                                                class="form-control form-control-sm">
                                                                                                                                <option value="{{ $cuadrante->numero_pieza }}">{{ $cuadrante->numero_pieza }}</option>
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
                                                                                                                                            <div class="circulo-v" id="caraV{{ $loop->index + 1 }}8"
                                                                                                                                                onclick="cambiar_color({{ $loop->index + 1 }}, 8)">V</div>
                                                                                                                                        </td>
                                                                                                                                        <td class="padding-caras"></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-d" id="caraD{{ $loop->index + 1 }}8"
                                                                                                                                                onclick="cambiar_colorD({{ $loop->index + 1 }}, 8)">D</div>
                                                                                                                                        </td>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-o" id="caraO{{ $loop->index + 1 }}8"
                                                                                                                                                onclick="cambiar_colorO({{ $loop->index + 1 }}, 8)">O</div>
                                                                                                                                        </td>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-m" id="caraM{{ $loop->index + 1 }}8"
                                                                                                                                                onclick="cambiar_colorM({{ $loop->index + 1 }}, 8)">M</div>
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                        <td class="padding-caras"></td>
                                                                                                                                        <td class="padding-caras">
                                                                                                                                            <div class="circulo-p" id="caraP{{ $loop->index + 1 }}8"
                                                                                                                                                onclick="cambiar_colorP({{ $loop->index + 1 }}, 8)">P</div>
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
                                                                                                                            <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_8"
                                                                                                                                name="diagnostico_{{ $loop->index + 1 }}_8">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                @foreach($diagnosticos as $diagnostico)
                                                                                                                                    <option value="{{$diagnostico->id}}">{{$diagnostico->descripcion}} </option>
                                                                                                                                @endforeach
                                                                                                                            </select>
                                                                                                                        </td>
                                                                                                                        <td class="px-1 py-1">
                                                                                                                            <input type="text" name="tratamiento_{{ $loop->index + 1 }}_8" id="tratamiento_{{ $loop->index + 1 }}_8" class="form-control form-control-sm tratamiento-autocomplete" />

                                                                                                                            <input type="hidden" name="odontograma{{ $loop->index + 1 }}_8" id="odontograma{{ $loop->index + 1 }}_8" value="1">
                                                                                                                            <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_8" id="caraM_check_{{ $loop->index + 1 }}_8" value="0">
                                                                                                                            <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_8" id="caraO_check_{{ $loop->index + 1 }}_8" value="0">
                                                                                                                            <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_8" id="caraD_check_{{ $loop->index + 1 }}_8" value="0">
                                                                                                                            <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_8" id="caraV_check_{{ $loop->index + 1 }}_8" value="0">
                                                                                                                            <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_8" id="caraP_check_{{ $loop->index + 1 }}_8" value="0">
                                                                                                                            <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_octavo_cuadrante({{ $loop->index + 1 }})">
                                                                                                                                Registrar
                                                                                                                            </button>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </table>
                                                                                                        </div>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                    @if($octavo_cuadrante_infantil->count() == 0)
                                                                                                        <div class="col-md-12">
                                                                                                            <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                                                                                        </div>
                                                                                                    @endif
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
                                                    <table class="table table-xs" id="table_odontograma">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha</th>
                                                                <th>Prestación</th>
                                                                <th>Caras</th>
                                                                <th>Pieza</th>
                                                                <th>Diagnóstico</th>
                                                                <th>Valor</th>
                                                                <th>Presupuesto</th>
                                                                <th class="text-center">
                                                                    Seleccionar
                                                                    <button
                                                                        type="button"
                                                                        class="btn btn-outline-danger btn-sm ml-2"
                                                                        onclick="eliminar_seleccionados()"
                                                                        title="Eliminar tratamientos seleccionados">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($odontograma))
                                    @foreach ($odontograma as $odonto)
                                    @if($odonto->urgencia == 0)
                                    <tr>
                                        <td>{{ $odonto->fecha }}</td>
                                        <td>{{ $odonto->tratamiento }}</td>
                                        <td>{{ $odonto->caras }}</td>
                                        <td>{{ $odonto->pieza }}</td>
                                        <td>{{ $odonto->diagnostico }}</td>
                                        <td>{{ number_format($odonto->valor,0,',','.') }}</td>
                                        {{-- <td>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma({{ $odonto->id }})"><i class="feather icon-x"></i>Eliminar</button>
                                            @if($odonto->presupuesto == 0)
                                                <button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto({{ $odonto->id }})"><i class="fas fa-save"></i>Cargar a presupuesto</button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto({{ $odonto->id }})"><i class="fas fa-trash"></i>Sacar de presupuesto</button>
                                            @endif
                                        </td> --}}
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input checkbox-presupuesto"
                                                    id="presupuestoCheck{{ $odonto->id }}"
                                                    value="{{ $odonto->id }}"
                                                    {{ $odonto->presupuesto == 1 ? 'checked' : '' }}
                                                    onchange="togglePresupuesto({{ $odonto->id }}, this.checked)">

                                                <label class="custom-control-label" for="presupuestoCheck{{ $odonto->id }}"></label>
                                            </div>

                                        </td>

                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input checkbox-seleccion"
                                                    id="seleccionCheck{{ $odonto->id }}"
                                                    value="{{ $odonto->id }}"
                                                    onchange="toggleSeleccion({{ $odonto->id }}, this.checked)">
                                                <label class="custom-control-label" for="seleccionCheck{{ $odonto->id }}"></label>
                                            </div>
                                        </td>

                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
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
@include('atencion_odontologica.modals.odontograma.modal_insumos_urgencias')
@include('atencion_odontologica.modals.odontograma.modal_insumos_editar')
@include('atencion_odontologica.modals.atencion_general.formularios_generales.interconsulta_odped')
<!--Modal reservar hora -->
<div class="modal fade" id="reservar_hora" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="reservar_hora" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h6 class="modal-title text-white f-18">Agendar nueva cita</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#reservar_hora').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_reserva_hora_id_profesional" id="modal_reserva_hora_id_profesional" value="">
                <input type="hidden" name="modal_reserva_hora_tipo_agenda" id="modal_reserva_hora_tipo_agenda" value="1">

                <div id="contenedor_agendar_hora">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                    <label class="floating-label-activo-sm mb-0">Lugar de atención</label>
                                    <select class="form-control form-control-sm" id="modal_reserva_hora_lugar_atencion" name="modal_reserva_hora_lugar_atencion" onchange="carga_calendario_profesional();">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="mt-4">Usted atiende los dias <span id="modal_reserva_dias_atencion" class="hljs-strong"></span></label>
                            {{--  <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                </div>
                            </div>  --}}
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                    <label class="floating-label-activo-sm mb-0">Seleccione una fecha</label>
                                    {{-- <input class="form-control form-control-sm" type="date" name="modal_reserva_fecha" onchange="cargar_horas_disponibles_calendario_profesion(this.value);" id="modal_reserva_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?>  disabled="disabled"/> --}}
                                    <input class="form-control form-control-sm" type="date" name="modal_reserva_fecha" onchange="cargar_horas_disponibles_calendario_profesion(this.value);" id="modal_reserva_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?>  />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h6 class="text-petroleo" id="modal_reserva_fecha_seleccionada"></h6>
                        </div>
                        <div class="col-md-12">
                            <div class="row pl-3" id="modal_reserva_hora_lista_horas">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{--  <button type="button" class="btn btn-info"><i class="feather icon-check-circle"></i>
                                Reservar hora</button>  --}}
                            <h6>Seleccione  Lugar de Atención, Día en el calendario y haga click en la Hora Disponible.</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- MODAL AGREGAR HORA MEDICA -->
<div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info pt-3 pb-2">
                <h5 class="modal-title text-white text-center">Tomar hora</h5>
                <button id="cerrar_tomar_hora" type="button" class="close text-white close_agenda_agregar_paciente" onclick="$('#agenda_agregar_paciente').modal('hide');" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                {{--  BUSCADOR DE RUT  --}}
                <div class="row div_rut_buscar">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <h6 class="text-c-blue ml-2 mb-3">Ingrese el rut del paciente</h6>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8 mb-3">
                        <form id="validacion_rut_form">
                            <div class="form-group" id="validacion_rut_div">
                                <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <button class="btn btn-info" onclick="buscar_paciente();" type="button" id="button-addon2">
                            Buscar
                        </button>
                    </div>
                </div>



                <form id="form_reseva_de_horas">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="reserva_hora_id_profesional" name="reserva_hora_id_profesional" value="">
                    <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">
                    <input type="hidden" id="reserva_hora_id_lugar_atencion" name="reserva_hora_id_lugar_atencion" value="">
                    <input type="hidden" id="reserva_hora_fecha_consulta" name="reserva_hora_fecha_consulta" value="">
                    <input type="hidden" id="reserva_hora_hora_consulta" name="reserva_hora_hora_consulta" value="">
                    <input type="hidden" id="reserva_hora_origen" name="reserva_hora_origen" value="escritorio_paciente">
                    <input type="hidden" id="reserva_hora_id_asistente" name="reserva_hora_id_asistente" value="2">

                    {{--  VISUALIZACION DE DATOS DEL PACIENTE  --}}
                    <div id="reserva_datos_paciente" class="row mx-3">
                        <table class="table table-borderless table-xs">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <strong>Rut</strong>
                                    </th>
                                    <td><span id="reserva_rut_paciente"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Nombre</strong>
                                    </th>
                                    <td><span id="reserva_hora_nombre"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Fecha Nacimiento</strong>
                                    </th>
                                    <td><span id="reserva_fecha_nacimiento"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Sexo</strong>
                                    </th>
                                    <td><span id="reserva_sexo"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Convenio</strong>
                                    </th>
                                    <td><span id="reserva_convenio"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Dirección</strong>
                                    </th>
                                    <td><span id="reserva_direccion"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Correo Electrónico</strong>
                                    </th>
                                    <td id="reserva_hora_email"></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Teléfono</strong>
                                    </th>
                                    <td><span id="reserva_hora_telefono"></span></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Descripción Reserva</label>
                                <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                            </div>
                        </div>
                       <hr>

                               <div class="col-12 text-center">
                                    <!--<button type="button" class="btn btn-danger close_agenda_agregar_paciente" onclick="$('#agenda_agregar_paciente').modal('hide');" data-dismiss="modal">Cancelar</button>-->
                                    <button type="button" onclick="agendar_hora();" class="btn btn-info"><i class="feather icon-check"></i> Agendar Hora</button>
                                </div>

                    </div>

                    {{--  FORMULARIO DE PACIENTE NUEVO  --}}
                    <div id="reserva_agregar_paciente_hora">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    Paciente no registrado, complete los datos para registrar al paciente
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombres</label>
                                    <input type="text" required class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Primer Apellido</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Segundo Apellido</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">F. Nacimiento</label>
                                    <input type="date" class="form-control form-control-sm" name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sexo</label>
                                    <select id="reserva_hora_sexo" name="reserva_hora_sexo" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                    <select id="reserva_hora_profesion" name="reserva_hora_profesion" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($profesion_oficio))
                                            @foreach ($profesion_oficio as $prof_ofic)
                                                <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                    <select id="reserva_hora_convenio" name="reserva_hora_convenio" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($prevision))
                                            @foreach ($prevision as $p)
                                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-9 col-md-9">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                    <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                                </div>
                            </div>

                            <div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N&uacute;mero</label>
                                    <input type="address" class="form-control form-control-sm" name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Region</label>
                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control" required>
                                        <option value="0">Seleccione Regi&oacute;n</option>
                                        @if (isset($region))
                                            @foreach ($region as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                        <option value="0">Seleccione Ciudad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                    <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda()" name="reserva_hora_correo" id="reserva_hora_correo">
                                    <span id="mensaje_email_reserva" style="display:none"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                    <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Descrici&oacute;n Reserva</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="text-c-blue ml-2 mb-3">Enviar confirmaci&oacute;n</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                        <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                        <label class="custom-control-label" for="sms">SMS</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger close_agenda_agregar_paciente"  onclick="$('#agenda_agregar_paciente').modal('hide');">Cancelar</button>
                            <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();" class="btn btn-info">
                                Tomar Hora
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal Enviar Presupuesto -->
<div class="modal fade" id="modalEnviarPresupuesto" tabindex="-1" role="dialog" aria-labelledby="modalEnviarPresupuestoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formEnviarPresupuesto">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEnviarPresupuestoLabel">Enviar presupuesto de insumos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="floating-label-activo-sm" for="selectDestinatarios">Selecciona destinatarios:</label>
                <select id="selectDestinatarios" class="form-control form-control-sm" multiple="multiple" style="width:100%">

                    <option value="{{ $paciente->email }}">{{$paciente->nombres}} {{ $paciente->apellido_uno }} (Paciente)</option>
                    <option value="{{ $profesional->email }}">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} (Profesional)</option>
                    <option value="bodega@gmail.com">Bodega</option>
                    <option value="ejemplo@gmail.com">Dirección de presupuestos</option>
                </select>
            </div>


          <small class="text-muted">Puedes seleccionar varios o escribir correos manualmente.</small>
          <hr>
          <div class="form-group">
            <label class="floating-label-activo-sm">Correo adicional (opcional):</label>
            <input type="email" class="form-control form-control-sm" id="correoLibre" placeholder="ejemplo@correo.com">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="enviar_email_presupuesto_insumos()" class="btn btn-primary">Enviar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!--SIMBOLOGÍA ODONTOGRAMA INFANTIL-->
<div class="modal fade" id="simbologia-infantil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Simbología del odontograma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/odontopediatria/diente-sano/diente-sano53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Diente sano</h6>
                  </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/odontopediatria/diente-ausente/dau53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Diente ausente</h6>
                  </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/extraccion/extraccion53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Extracción</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/fractura/fractura53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Fractura</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/impactado/impactado53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Diente Impactado</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/carie/carie53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Carie</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/pulpotomia/pulpotomia53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Pulpotomía</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/pulpectomia/pulpectomia53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Pulpectomía</h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/sellante/sellante53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Sellante</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/surco/surco53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Surco</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/obturacion/obturacion53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Obturación</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/sin-erupcionar/sin-erupcionar53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Sin Erupcionar</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/diente-erupcion/en-erupcion53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Diente en Erupción</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/ortodoncia/ortodoncia53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Ortodoncia</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/fluor/fluor53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Fluor</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                    <div class="media align-middle">
                    <img src="{{ asset('images/dental/odontopediatria/otro-tto/otro-tto53.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                    <div class="media-body">
                        <h6 class="pt-5">Otro Tratamiento</h6>
                    </div>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>
</div>
{{-- @include('atencion_odontologica.modals.odontograma.modal_insumos')
@include('atencion_odontologica.modals.odontograma.modal_insumos_editar') --}}
<script>
    function abrir_modal_insumos(){
        $('#modal_insumos').modal('show');
    }
    function enviar_email_presupuesto_insumos(){
        let destinatarios = $('#selectDestinatarios').val();
        let correoLibre = $('#correoLibre').val();
        let idPaciente = $('#id_paciente_fc').val();
        let idFichaAtencion = $('#id_fc').val();

        if(destinatarios.length == 0 && correoLibre == ''){
            swal({
                title: "Debe seleccionar al menos un destinatario",
                icon: "warning",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return;
        }

        let data = {
            destinatarios: destinatarios,
            correoLibre: correoLibre,
            idPaciente: idPaciente,
            idFichaAtencion: idFichaAtencion,
            _token: CSRF_TOKEN
        };

        $.ajax({
            url: '{{ ROUTE("enviar.presupuesto.insumos.email") }}',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if(response.mensaje == 'ok'){
                    swal({
                        title: "Presupuesto enviado correctamente",
                        icon: "success",
                        buttons: "Aceptar"
                    });
                    $('#modalEnviarPresupuesto').modal('hide');
                }else{
                    swal({
                        title: "Error al enviar el presupuesto",
                        text: response.detalle,
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }
            },
            error: function(error) {
                console.error("Error al enviar el presupuesto:", error);
                swal({
                    title: "Error al enviar el presupuesto",
                    text: "Por favor, intente nuevamente.",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        });
    }
    $(document).ready(function() {
        $('#tabla_odontologico_tratamiento').DataTable({
            responsive: true,
        });

    });


    const piezasSelect_odontop = $('#paciente_piezas_dentales_ex_odped');
    // Control de selección de piezas en el odontograma
    $('.pieza_odped').on('click', function () {

        const piezaNumero = $(this).data('pieza_odpediat').toString(); // Convertir a string por seguridad
        console.log(piezaNumero);
        if ($(this).hasClass('seleccionada')) {
            // Si ya está seleccionada, deseleccionarla
            $(this).removeClass('seleccionada');
            const options = $('#paciente_piezas_dentales_ex_odped').val().filter(item => item !== piezaNumero); // Filtra el elemento a eliminar
            $('#paciente_piezas_dentales_ex_odped').val(options).trigger('change');
        } else {
            // Si no está seleccionada, agregarla
            $(this).addClass('seleccionada');

            let opcionesSeleccionadas = $('#paciente_piezas_dentales_ex_odped').val() || [];
            if (!opcionesSeleccionadas.includes(piezaNumero)) {
                opcionesSeleccionadas.push(piezaNumero);
            }

            console.log(opcionesSeleccionadas);
            $('#paciente_piezas_dentales_ex_odped').val(opcionesSeleccionadas).trigger('change');
        }
    });

    $('.pieza_odped_urg').on('click', function () {

        const piezaNumero = $(this).data('pieza_odpediat_urg').toString(); // Convertir a string por seguridad
        console.log(piezaNumero);
        if ($(this).hasClass('seleccionada')) {
            // Si ya está seleccionada, deseleccionarla
            $(this).removeClass('seleccionada');
            const options = $('#paciente_piezas_dentales_ex_odped_urg').val().filter(item => item !== piezaNumero); // Filtra el elemento a eliminar
            $('#paciente_piezas_dentales_ex_odped_urg').val(options).trigger('change');
        } else {
            // Si no está seleccionada, agregarla
            $(this).addClass('seleccionada');

            let opcionesSeleccionadas = $('#paciente_piezas_dentales_ex_odped_urg').val() || [];
            if (!opcionesSeleccionadas.includes(piezaNumero)) {
                opcionesSeleccionadas.push(piezaNumero);
            }

            console.log(opcionesSeleccionadas);
            $('#paciente_piezas_dentales_ex_odped_urg').val(opcionesSeleccionadas).trigger('change');
        }
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
            $('#pzas_od_urg').select2();
             $('#pzas_odp_urg').select2();
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
        var myDropzonePre;
        var myDropzonePost;

        Dropzone.options.misImagenesOdontopPre = {
            init:function()
            {
                myDropzonePre = this; // ✅ Variable específica para PRE
                myDropzone = this;    // Mantener compatibilidad
            },
            url: "{{ route('profesional.imagenes.guardar_dental') }}",
            method: 'post',
            autoProcessQueue: false,  // 🔧 Desactivar procesamiento automático
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },
            paramName: "file[]",  // 🔧 Usar array para múltiples archivos
            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "📷 Arrastre las imágenes PRE-tratamiento aquí o haz clic para seleccionar<br><small>Máximo 12 archivos, 4MB cada uno</small>",

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

            // 🔧 Evento sending para agregar datos adicionales
            sending: function (file, xhr, formData) {
                const idExamenRx = document.querySelector('#id_imagenes_dental')?.value;
                const idImagePre = document.querySelector('#id_image_pre')?.value;
                const detalle = "Pre";

                if (idExamenRx) {
                    formData.append("id_examen", idExamenRx);
                    formData.append("id_image_pre", idImagePre);
                    formData.append("detalle", detalle);

                    console.log("✅ Datos adicionales enviados PRE:", {
                        id_examen: idExamenRx,
                        id_image_pre: idImagePre,
                        detalle: detalle
                    });
                } else {
                    console.error("❌ id_imagenes_dental no encontrado en el DOM.");
                }
            },

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                console.log('✅ SUCCESS PRE-tratamiento:', response);
                cargar_lista_imagenes();

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                console.error('❌ ERROR PRE-tratamiento:', message);
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

        Dropzone.options.misImagenesOdontopPost = {
            init:function()
            {
                myDropzonePost = this; // ✅ Variable específica para POST
                myDropzone = this;     // Mantener compatibilidad
            },
            url: "{{ route('profesional.imagenes.guardar_dental') }}",
            method: 'post',
            autoProcessQueue: false,  // 🔧 Desactivar procesamiento automático
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },
            paramName: "file[]",  // 🔧 Usar array para múltiples archivos
            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            // Y para el POST-tratamiento:
            dictDefaultMessage: "📷 Arrastre las imágenes POST-tratamiento aquí o haz clic para seleccionar<br><small>Máximo 12 archivos, 4MB cada uno</small>",

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

            // 🔧 Evento sending para agregar datos adicionales
            sending: function (file, xhr, formData) {
                const idExamenRx = document.querySelector('#id_imagenes_dental')?.value;
                const idImagePost = document.querySelector('#id_image_post')?.value;
                const detalle = "Post";

                if (idExamenRx) {
                    formData.append("id_examen", idExamenRx);
                    formData.append("id_image_post", idImagePost);
                    formData.append("detalle", detalle);

                    console.log("✅ Datos adicionales enviados POST:", {
                        id_examen: idExamenRx,
                        id_image_post: idImagePost,
                        detalle: detalle
                    });
                } else {
                    console.error("❌ id_imagenes_dental no encontrado en el DOM.");
                }
            },

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                console.log('✅ SUCCESS POST-tratamiento:', response);
                cargar_lista_imagenes();

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                console.error('❌ ERROR POST-tratamiento:', message);
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
            console.log('--------------cargar_lista_imagenes----------------------');
            lista_imagenes = [];

            // 🔍 Verificar cuál dropzone tiene archivos
            let tempPre = myDropzonePre ? myDropzonePre.getAcceptedFiles() : [];
            let tempPost = myDropzonePost ? myDropzonePost.getAcceptedFiles() : [];
            let temp = myDropzone ? myDropzone.getAcceptedFiles() : [];

            console.log('myDropzonePre files:', tempPre.length);
            console.log('myDropzonePost files:', tempPost.length);
            console.log('myDropzone files (current):', temp.length);

            // Usar los archivos del dropzone actual o combinar ambos
            let allFiles = temp;
            if (tempPre.length > 0 && tempPost.length > 0) {
                allFiles = [...tempPre, ...tempPost];
                console.log('🔄 Combinando archivos de PRE y POST:', allFiles.length);
            } else if (tempPre.length > 0) {
                allFiles = tempPre;
                console.log('📷 Usando archivos de PRE:', allFiles.length);
            } else if (tempPost.length > 0) {
                allFiles = tempPost;
                console.log('📷 Usando archivos de POST:', allFiles.length);
            }

            console.log('Total archivos a procesar:', allFiles.length);

            $.each(allFiles, function(index, value) {
                console.log(`Archivo ${index}:`, {
                    name: value.name,
                    status: value.status,
                    xhr: value.xhr !== undefined,
                    size: value.size
                });

                if(value.status == "success") {
                    console.log('✅ Archivo exitoso encontrado');
                    if(value.xhr !== undefined) {
                        try {
                            var img_temp = JSON.parse(value.xhr.response);
                            console.log('✅ Respuesta del servidor:', img_temp);

                            lista_imagenes[index] = {
                                url: img_temp.img.url,
                                nombre_original: img_temp.img.original_file_name,
                                nombre_img: img_temp.img.nombre_img,
                                file_extension: img_temp.img.file_extension
                            };
                        } catch(e) {
                            console.error('❌ Error parsing JSON:', e);
                            console.log('Raw response:', value.xhr.response);
                        }
                    } else {
                        console.log('⚠️ xhr es undefined para archivo exitoso');
                    }
                } else {
                    console.log(`❌ Archivo con estado: "${value.status}" (esperado: "success")`);
                }
            });

            console.log('📋 Lista final de imágenes:', lista_imagenes);
            $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
            console.log('💾 Valor guardado en input:', $('#input_lista_imagenes').val());
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
            html += '<div id="pieza_dental_dolor" class="row">';
            html += '    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
            html += '    <div class="card-informacion">';
            html += '    <div class="card-body">';
            html += '    <div class="form-row">';
            html += '            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-2">';
            html += '                <label class="floating-label-activo-sm">Pieza N°</label>';
            html += '                <input type="text" class="form-control form-control-sm" name="" id="">';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-2">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Tipo de Dolor</label>';
            html += '                    <select name="tipo_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="tipo_dolor" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Espontáneo</option>';
            html += '                        <option value="2">Provocado</option>';
            html += '                        <option value="3">Otro (Describir)</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_tipo_dolor" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Tipo de dolor</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor" id="obs_tipo_dolor"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-2">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Intensidad</label>';
            html += '                    <select name="intensidad" data-titulo="Ex_cuello" data-seccion="Cuello"  id="intensidad" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Leve</option>';
            html += '                        <option value="2">Moderado</option>';
            html += '                        <option value="3">Intenso</option>';
            html += '                        <option value="4">Otro (Describir)</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_intensidad" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Intensidad</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad" id="obs_intensidad"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-2">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Modo dolor</label>';
            html += '                    <select name="modo_dolor" data-titulo="Ex_cuello" data-seccion="Cuello"  id="modo_dolor" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Pulsátil</option>';
            html += '                        <option value="2">Permanente</option>';
            html += '                        <option value="3">Otro (Describir)</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_modo_dolor" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Modo dolor</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor" id="obs_modo_dolor"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-2">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Localización</label>';
            html += '                    <select name="loc_dolor" data-titulo="Ex_cuello" data-seccion="Cuello"  id="loc_dolor" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Localizado</option>';
            html += '                        <option value="2">Referido</option>';
            html += '                        <option value="3">Otro (Describir)</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_loc_dolor" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Localización</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor" id="obs_loc_dolor"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-2">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Provocación del dolor</label>';
            html += '                    <select name="provocacion_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Frío</option>';
            html += '                        <option value="2">Calor</option>';
            html += '                        <option value="3">Actividad</option>';
            html += '                        <option value="4">Masticación</option>';
            html += '                        <option value="5">Otro (Describir)</option>';
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
            html += '                        <option value="3">Otro (Describir)</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_cdo_duele" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Cuando duele</label>';
            html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cdo_duele" id="obs_cdo_duele"></textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '                <div class="form-group">';
            html += '                    <label class="floating-label-activo-sm">Tipo evolución</label>';
            html += '                    <select name="tpo_evolucion" data-titulo="Ex_cuello" data-seccion="Cuello"  id="tpo_evolucion" class="form-control form-control-sm">';
            html += '                        <option selected  value="1">Menos de 1 Semana</option>';
            html += '                        <option value="2">Más de 1 Semana</option>';
            html += '                        <option value="3">Otro (Describir)</option>';
            html += '                    </select>';
            html += '                </div>';
            html += '                <div class="form-group" id="div_tpo_evolucion" style="display:none;">';
            html += '                    <label class="floating-label-activo-sm">Tipo evolución</label>';
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
             html += '                           <label class="floating-label-activo-sm">Tipo de Tratamiento (Describir)</label>';
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
             html += '                           <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus"></i> Cargar a presupuesto</button>';
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
            html += ' <div id="pieza_dentalrx" class="row">';
            html += ' <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
            html += ' <div class="card-informacion">';
            html += ' <div class="card-body">';
            html += ' <div class="row">';
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
            html += '                         <label class="floating-label-activo-sm">Obs. Examen Pieza</label>';
            html += '                         <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Rx endodoncia" data-seccion="endo_rx" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>';
            html += '                 </div>';
            html += '             </div>';
            html += '             <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '                 <div class="form-group">';
            html += '                     <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-rx_pieza" ><i class="fas fa-plus"></i> Cargar otra pieza</button>';
            html += '                 </div>';
            html += '             </div>';
            html += '         </div>';
            html += '     </div>';
            html += ' </div>';

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
<script>
    function seleccionar_maxilar_superior_odped() {
        const superiorActivo = document.getElementById("max_sup_odped").checked;
         document.getElementById('piezas_presup_odped').checked = false;
        const piezas = document.querySelectorAll('.pieza_odped');
        const select = $('#paciente_piezas_dentales_ex_odped');

        piezas.forEach(pieza => {
            const codigo = pieza.getAttribute('data-pieza_odpediat');

            if (codigo.startsWith('5.') || codigo.startsWith('6.')) {
                if (superiorActivo) {
                    pieza.classList.add('seleccionada');

                    // Selecciona en el Select2 si existe la opción
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", true);
                    }
                } else {
                    pieza.classList.remove('seleccionada');

                    // Deselecciona en el Select2
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", false);
                    }
                }
            }
        });

        // Refresca el select2 para que se vea reflejado el cambio
        select.trigger('change');
    }
    function seleccionar_maxilar_inferior_odped(){
        const inferiorActivo = document.getElementById("max_inf_odped").checked;
        document.getElementById('piezas_presup_odped').checked = false;
        const piezas = document.querySelectorAll('.pieza_odped');
        const select = $('#paciente_piezas_dentales_ex_odped');

        piezas.forEach(pieza => {
            const codigo = pieza.getAttribute('data-pieza_odpediat');

            if (codigo.startsWith('7.') || codigo.startsWith('8.')) {
                if (inferiorActivo) {
                    pieza.classList.add('seleccionada');

                    // Selecciona en el Select2 si existe la opción
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", true);
                    }
                } else {
                    pieza.classList.remove('seleccionada');

                    // Deselecciona en el Select2
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", false);
                    }
                }
            }
        });

        // Refresca el select2 para que se vea reflejado el cambio
        select.trigger('change');
    }

     var odontograma_global = @json($odontograma);

    function seleccionar_piezas_presup() {
            const checkbox = document.getElementById('piezas_presup_odped');
            // Seleccionar el <select> y actualizar sus valores
            const piezasSelect = $('#paciente_piezas_dentales_ex_odped');
            // Si está desmarcado
            if (!checkbox.checked) {
                // 1. Limpiar select2
                piezasSelect.val(null).trigger('change');

                // 2. Quitar clase seleccionada a todas las piezas
                $('.pieza_odped').removeClass('seleccionada');

                return; // Salimos de la función
            }
            // Desmarcar los switches de maxilares
            document.getElementById('max_sup_odped').checked = false;
            document.getElementById('max_inf_odped').checked = false;

            // Aquí puedes agregar lógica para seleccionar solo piezas de presupuesto si lo necesitas
            // Supongamos que ya tienes este JSON cargado
            const odontograma = odontograma_global;

            // Filtrar solo las piezas donde urgencia es igual a 0, que el presupuesto sea igual a 1 y obtener piezas únicas
            const piezasTto = odontograma.filter(item => item.urgencia === 0 && item.presupuesto === 1);
            const piezasUnicas = [...new Set(piezasTto.map(item => item.pieza))];


            piezasSelect.val(piezasUnicas).trigger('change');

            // Marcar visualmente las piezas en el odontograma
            piezasUnicas.forEach(pieza => {
                $(`.pieza_odped[data-pieza_odpediat="${pieza}"]`).addClass('seleccionada');
            });
            // Escuchar cambios en el Select2 para actualizar el odontograma visual
            piezasSelect.on('change', function () {
                const piezasSeleccionadas = $(this).val() || [];

                // Recorre todas las piezas visuales
                $('.pieza_odped').each(function () {
                    const piezaNumero = $(this).data('pieza_odpediat').toString();

                    if (piezasSeleccionadas.includes(piezaNumero)) {
                        $(this).addClass('seleccionada');
                    } else {
                        $(this).removeClass('seleccionada');
                    }
                });
            });
    }

    function abrirModalCorreo() {
        $('#modalEnviarPresupuesto').modal('show');
    }

        function dame_insumos_tratamiento() {
            let id_ficha_atencion = $('#id_fc').val();
            let id_paciente = $('#id_paciente_fc').val();

            let url = "{{ route('dental.dame_insumos_tratamiento') }}";
            if (id_paciente == '' || id_paciente == null) {
                id_paciente = $('#id_paciente').val();
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id_ficha_atencion: id_ficha_atencion,
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    swal({
                        title: 'info',
                        text: 'Cargando ...',
                        icon: 'info'
                    });
                },
                success: function(response) {
                    swal.close();
                    console.log(response);
                    if (response.mensaje == 'ok') {
                        $('#prot_implante').empty();
                        let insumos = response.insumos;
                        // Agrega las nuevas opciones desde la respuesta
                        insumos.forEach(function(item) {
                            $('#prot_implante').append(
                                $('<option>', {
                                    value: item.id,
                                    text: item.insumos + ' ' + item.nombre_marca
                                })
                            );
                        });

                        // Refresca select2 para mostrar los nuevos datos
                        $('#prot_implante').trigger('change');
                    } else {
                        swal({
                            title: 'Error',
                            text: response.mensaje,
                            icon: 'error'
                        });
                    }

                }
            });
        }

        /*-Agendar hora medica-*/
        function hora_medica_pedir(id_profesional, id_lugar_atencion, tipo_agenda = null){

            $('#modal_reserva_hora_lugar_atencion').val('');
            $('#modal_reserva_dias_atencion').val('');
            $('#modal_reserva_fecha').val('');
            $('#modal_reserva_hora_lista_horas').html('');
            // asigno id profesioanl
            $('#modal_reserva_hora_id_profesional').val(id_profesional);
            $('#modal_reserva_hora_tipo_agenda').val(tipo_agenda);

            carga_calendario_profesional_pedir();

            // cargo lugares de atencion  y asigno lugar con hora mas proxima
            lugar_atencion_profesional($('#modal_reserva_hora_id_profesional'), 'modal_reserva_hora_lugar_atencion', id_lugar_atencion)
            $('#reservar_hora').modal('show');
        }

        function carga_calendario_profesional_pedir()
        {
            $('#modal_reserva_fecha').val('');
            $('#modal_reserva_fecha').attr('disabled',true);
            $('#modal_reserva_hora_lista_horas').html('');

            let id_profesional = $('#modal_reserva_hora_id_profesional').val();
            let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
            let url = "{{ route('profesional.DiasLaboralesProfesionaLugarAtencionBuscador') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_profesional: id_profesional,
                    lugar_atencion: id_lugar_atencion,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {


                    {{--  calendario(data.registros.horario_agenda_laboral, data.registros.horario_agenda_no_laboral);  --}}

                    if(data.registros.horario_agenda_laboral != '')
                    {
                        console.log(data);
                        let dias = ['','LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                        var dias_activos = data.registros.horario_agenda_laboral.split(',');
                        var dias_texto = '';
                        var cant = 0;

                        $.each(dias_activos, function(index, value)
                        {
                            if(cant>0)
                                dias_texto += ' - '+dias[value];
                            else
                                dias_texto += dias[value];

                            cant++;
                        });

                        $('#modal_reserva_dias_atencion').html(dias_texto);

                        /** calendario */
                        $('#modal_reserva_fecha').attr('disabled',false);

                        $("#modal_reserva_fecha").flatpickr({
                            "disable": [
                                function(date) {
                                    return !dias_activos.includes(String(date.getDay()));
                                }
                            ],
                            minDate: "today",
                            maxDate: new Date(Date.now() + 60 * 24 * 60 * 60 * 1000), // 60 días desde hoy
                            locale: {
                                firstDayOfWeek: 1,
                                weekdays: {
                                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                                },
                                months: {
                                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                                longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                },
                            },
                        });
                        /** fin calendario */

                    }
                    else
                    {
                        $('#modal_reserva_dias_atencion').html('NO INFORMADOS');
                        $('#modal_reserva_fecha').attr('disabled',true);
                        $('#modal_reserva_fecha_seleccionada').html('');
                    }

                } else {
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        /** FIN METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
        function lugar_atencion_profesional(element, div_destino, value_init = '')
        {
            let id_profesional = $(element).val();
            let url = "{{ route('profesional.lugaresAtencionProfesionalBuscador') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_profesional: id_profesional,
                    },
                })
                .done(function(data) {
                    if (data.estado == 1) {
                        {{--  console.log(data);  --}}
                        let input_lugar_atencion = $('#'+div_destino);

                        input_lugar_atencion.find('option').remove();
                        input_lugar_atencion.append('<option value="">Seleccione</option>');
                        $(data.registros).each(function(i, v) { // indice, valor
                            input_lugar_atencion.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })

                        if(value_init != '')
                        {
                            input_lugar_atencion.val(value_init);
                            carga_calendario_profesional_pedir();
                        }

                    } else {
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cargar_horas_disponibles_calendario_profesion(dia)
        {

            let id_profesional = $('#modal_reserva_hora_id_profesional').val();
            let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
            console.log('cargar_horas_disponibles_calendario_profesion');
            console.log(dia);

            let url = "{{ route('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    dia: dia,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1) {
                    $('#modal_reserva_fecha_seleccionada').html('Horas disponibles para el dia: '+data.text_fecha);

                    $('#modal_reserva_hora_lista_horas').html('');
                    $.each(data.registros, function(index, value)
                    {
                        var hr1 = moment(value.hora,'HH:mm:ss').format('HH:mm');
                        var html = '';
                        html += '<div class="col-md-2 btn btn-outline-primary btn-sm my-1 mx-1" data-hora="'+value.hora+'" onclick="generar_reserva_cita(\''+value.hora+'\');">';
                        html += ''+hr1;
                        html += '</div>';

                        $('#modal_reserva_hora_lista_horas').append(html);
                    });

                } else {
                    // alert('No se pudo Cargar las ciudades');
                    $('#modal_reserva_hora_lista_horas').html('<span style="font-weight: bold; text-align: center;">"Sin disponibilidad de Horas"</span>');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function generar_reserva_cita(hora)
    {
        console.log('generar_reserva_cita');
        $('.div_rut_buscar').hide();
        $('#form_reseva_de_horas').hide();
        $('#reserva_datos_paciente').hide();
        $('#reserva_agregar_paciente_hora').hide();

        $('#reservar_hora').modal('hide');

        let id_profesional = $('#modal_reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
        let fecha_consulta = $('#modal_reserva_fecha').val();
        $('#reserva_hora_id_profesional').val('');
        $('#reserva_hora_id_lugar_atencion').val('');
        $('#reserva_hora_fecha_consulta').val('');
        $('#reserva_hora_hora_consulta').val('');

        let url = "{{ route('paciente.get.informacion') }}";
        var datos = {};
        var id_dependiente_activo = '{{ $paciente->id }}';

        if(id_dependiente_activo != '')
            datos.id_dependiente_activo = id_dependiente_activo;

        $.ajax({
            url: url,
            type: "get",
            data: datos,
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                $('.div_rut_buscar').hide();
                $('#form_reseva_de_horas').show();
                $('#reserva_datos_paciente').show();
                $('#reserva_agregar_paciente_hora').hide();

                $('#agenda_agregar_paciente').modal('show');

                $('#reserva_hora_id_profesional').val(id_profesional);
                $('#reserva_hora_id_lugar_atencion').val(id_lugar_atencion);
                $('#reserva_hora_fecha_consulta').val(fecha_consulta);
                $('#reserva_hora_hora_consulta').val(hora);

                $('#reserva_hora_id_paciente').val(data.registro.id);

                $('#reserva_rut_paciente').html(data.registro.rut);
                $('#reserva_hora_nombre').html(data.registro.nombres + ' ' + data.registro.apellido_uno + ' ' + data.registro.apellido_dos);
                $('#reserva_fecha_nacimiento').html(data.registro.fecha_nac);
                if (data.registro.sexo == 'M') {
                    $('#reserva_sexo').text('Masculino');
                } else {
                    $('#reserva_sexo').text('Femenino');
                }
                $('#reserva_convenio').html(data.registro.prevision.nombre);
                $('#reserva_direccion').html(data.registro.direccion.direccion+' '+data.registro.direccion.numero_dir+', '+data.registro.direccion.ciudad.nombre);
                $('#reserva_hora_email').html(data.registro.email);
                $('#reserva_hora_telefono').html(data.registro.telefono_uno);



            }
            else
            {
                swal({
                    title: "Debe completar los datos de inscripción",
                    text: error,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{--  GENERAR HORA USUARIO EXISTENTE  --}}
    function agendar_hora() {

        let url = "{{ route('paciente.solicitar.hora') }}";
        let _token = $('#_token').val();
        let fecha_consulta = $('#reserva_hora_fecha_consulta').val()+' '+$('#reserva_hora_hora_consulta').val();
        let reserva_hora_id = $('#reserva_hora_id_paciente').val();
        let id_profesional = $('#reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#reserva_hora_id_lugar_atencion').val();
        let id_asistente = $('#reserva_hora_id_asistente').val();
        let origen = $('#reserva_hora_origen').val();

        let tipo_agenda = $('#modal_reserva_hora_tipo_agenda').val();
        var tipo_agenda_text = 'C';

        console.log(tipo_agenda);
        console.log(tipo_agenda_text);

        switch (tipo_agenda) {
            case '1':
                tipo_agenda_text = 'C';//CONSULTA
                break;
            case '2':
                tipo_agenda_text = 'D';//DENTAL
                break;
            case '3':
                tipo_agenda_text = 'T';//TELEMEDICINA
                break;
            case '4':
                tipo_agenda_text = 'E';//EXAMEN
                break;
        }

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                fecha_consulta: fecha_consulta,
                reserva_hora_id: reserva_hora_id,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
                id_asistente: id_asistente,
                origen: origen,
                tipo_hora_medica: tipo_agenda_text,
            }
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {

                data = JSON.parse(data);
                if(data.estado == 'error')
                {
                    swal({
                        title: "Error!",
                        text: data.msj,
                        icon: "error",
                        type: "error",
                        buttons: "Cerrar",
                    });
                }
                else
                {
                    swal({
                        title: "Hora Agendada Correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    });
                    $('#hora_agendada').val(1);
                    let esUltimaSesion = false;
                    if($('#finalizando_sesiones').val() == 1){
                        esUltimaSesion = true;
                    }
                    console.log(esUltimaSesion);
                }
                $('#agenda_agregar_paciente').modal('hide');

                    $('#reserva_hora_id_profesional').val('');
                    $('#reserva_hora_id_lugar_atencion').val('');
                    $('#reserva_hora_fecha_consulta').val('');
                    $('#reserva_hora_hora_consulta').val('');
                    $('#reserva_hora_id_paciente').val('');
                    $('#reserva_rut_paciente').html('');
                    $('#reserva_hora_nombre').html('');
                    $('#reserva_fecha_nacimiento').html('');
                    $('#reserva_sexo').text('');
                    $('#reserva_convenio').html('');
                    $('#reserva_direccion').html('');
                    $('#reserva_hora_email').html('');
                    $('#reserva_hora_telefono').html('');

                    proxima_atencion_paciente();


            } else {

                swal({
                    title: "Error!",
                    text: "Problema en la solicitud de la hora",
                    icon: "error",
                    type: "error",
                    buttons: "Cerrar",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function cargar_a_presupuesto_odped_g(){
            swal({
                title: "Cargar Piezas",
                text: "¿Está seguro que desea cargar el grupo de piezas?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willLoad) => {
                if (willLoad) {
                    cargar_a_presupuesto_odped_g_confirmar();
                }
            });
        }

        function cargar_a_presupuesto_odped_g_confirmar(){
            console.log('cargando');
            // Obtener los valores seleccionados en el select
            var piezasSeleccionadas = $('#paciente_piezas_dentales_ex_odped').val();
            var ttoPiezas = $('#diag_presupuesto_pieza_g_odped').val();
            var diagnostico = $('#diagnostico_combo_g').val();

            let valido = 1;
            let mensaje = '';

            if (piezasSeleccionadas.length == 0) {
                valido = 0;
                mensaje += '<li>Piezas seleccionadas </li>'
            }
            if (ttoPiezas == '') {
                valido = 0;
                mensaje += '<li>Tratamiento </li>';
            }

            if(diagnostico == 0){
                valido = 0;
                mensaje += '<li>Diagnóstico </li>';
            }

            if (valido == 0) {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "ul",
                        attributes: {
                            innerHTML: mensaje
                        }
                    },
                    icon: "error",
                });
                return false;
            }

            console.log(piezasSeleccionadas, ttoPiezas);

            let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_period') }}";
            let data = {
                piezas: piezasSeleccionadas,
                tto: ttoPiezas,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                urgencia: 0,
                diagnostico: diagnostico,
                tipo: 'odped',
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == 1) {
                        swal({
                            icon: 'success',
                            title: 'Info',
                            text: resp.mensaje
                        });
                        let odontograma = resp.odontograma_paciente;
                        odontograma_global = resp.odontograma_paciente;
                        let table_odp = $('#table_odontograma').DataTable();

                        // Vacía la tabla
                        table_odp.clear();

                        // Genera los datos (array de arrays o de objetos si usas columns)
                        let data = [];

                        odontograma.forEach(function(odonto) {
                            let switchPresupuesto = `
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                        value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                        onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                    <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                                </div>
                            `;

                            let switchSeleccion = `
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                        id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                        onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                    <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                                </div>
                            `;

                            data.push([
                                odonto.fecha,
                                odonto.tratamiento,
                                odonto.caras,
                                odonto.pieza,
                                odonto.diagnostico,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                switchPresupuesto,
                                switchSeleccion
                            ]);
                        });

                        // Agrega las nuevas filas
                        table_odp.rows.add(data).draw();
                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);

                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        $('#numero_pieza_post_impl2000').empty();
                        // id que representa el select de piezas pre implante
                        $('#numero_pieza_tto_impl1000').empty();
                        // Este array almacenará solo las piezas únicas
                        let piezasUnicas = [];

                        // Este Set sirve para verificar si ya existe una pieza (más rápido que indexOf)
                        let piezasAgregadas = new Set();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                $('#contenedor_piezas_dentales_presupuesto').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                        <label class="floating-label-activo-sm">Pieza</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                        <label class="floating-label-activo-sm">Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                        <label class="floating-label-activo-sm">Total prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                                $('#table_trabajos_presupuesto tbody').append(`
                                    <tr>
                                        <td>${odonto.fecha}</td>
                                        <td>${odonto.diagnostico} </td>
                                        <td>${odonto.caras} </td>
                                        <td>${odonto.pieza} </td>
                                        <td>${odonto.tratamiento} </td>
                                        <td>${formatoMoneda(odonto.valor)} </td>
                                        <td> </td>
                                        <td>
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                        </td>
                                    </tr>
                                `);
                                // ✅ Si la pieza no se ha agregado aún, la incluimos en el array
                                if (!piezasAgregadas.has(odonto.pieza)) {
                                    piezasAgregadas.add(odonto.pieza);
                                    piezasUnicas.push(odonto.pieza);
                                }
                            }
                        });
                        console.log(resp.valores);
                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let valores_lab = resp.valores[3];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos +
                            valores_lab;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                        $('#total_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                        $('#total_presupuesto_dental').val(total_general);
                        $('#total_presupuesto').val(formatoMoneda(total_general));

                        let table_urg = $('#table_piezas_odonto_urg_ped').DataTable();
                        table_urg.clear().draw();

                        odontograma.forEach(function(pieza) {
                                if(pieza.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(pieza.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(pieza.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                if (pieza.presupuesto == 1 && pieza.urgencia == 1) {
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_urg.row.add([
                                        pieza.pieza,
                                        pieza.descripcion,
                                        formatoMoneda(formatoMoneda(pieza.valor)),
                                        '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg(' +
                                        pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                        '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg(' +
                                        pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                        estado

                                    ]).draw(false).node(); // Obtener el nodo de la fila
                                }
                        });

                        let table_urg_gral = $('#table_piezas_odonto_urg').DataTable();
                        table_urg_gral.clear().draw();

                        odontograma.forEach(function(pieza) {
                                if(pieza.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(pieza.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(pieza.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                if (pieza.presupuesto == 1 && pieza.urgencia == 1) {
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_urg_gral.row.add([
                                        pieza.pieza,
                                        pieza.diagnostico,
                                        pieza.descripcion,
                                        formatoMoneda(formatoMoneda(pieza.valor)),
                                        '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg(' +
                                        pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                        '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg(' +
                                        pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                        estado

                                    ]).draw(false).node(); // Obtener el nodo de la fila
                                }
                        });


                        $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                            valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                            total_general));

                        let table = $('#presup_estado_pago').DataTable();
                        table.clear().draw();

                        // Recorrer el odontograma y agregar nuevas filas
                        odontograma.forEach(function(odonto) {

                            if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                if (odonto.estado_pago == 'ok') {
                                    var clase = 'bg-success';
                                } else if (odonto.estado_pago == 'incompleto') {
                                    var clase = 'bg-warning';
                                } else {
                                    var clase = 'bg-danger';
                                }

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(odonto.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(odonto.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
                                    odonto.descripcion,
                                    odonto.pieza,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    0,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    '<div class="circle ' + clase + '"></div>',
                                    estado, // Columna vacía

                                ]).draw(false).node(); // Obtener el nodo de la fila

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }
                        });
                        //limpiar_formulario_cargar_presupuesto_g();
                        $('#table_pagos_reasignar_odontograma tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                let fila = `<tr>
                            <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                            <td>${odonto.pieza}</td>
                            <td>${formatoMoneda(odonto.valor)}</td>
                            <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                        </tr>`;
                                $('#table_pagos_reasignar_odontograma tbody').append(fila);
                            }
                        });
                        // $('#paciente_piezas_dentales_ex').val(null).trigger('change');
                        // $('#odon_adults').empty();
                        // $('#odon_adults').append(resp.odontograma_paciente_vista);
                        $('#odontograma_ped_completo').empty();
                        $('#odontograma_ped_completo').append(resp.odontograma_paciente_vista);

                        let table_odontop = $('#table_piezas_presupuesto_odped').DataTable();
                        table_odontop.clear();
                        odontograma.forEach(function(pieza) {
                                if(pieza.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(pieza.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(pieza.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                if (pieza.urgencia == 0) {
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_odontop.row.add([
                                        pieza.pieza,
                                        pieza.diagnostico,
                                        pieza.descripcion,
                                        formatoMoneda(formatoMoneda(pieza.valor)),
                                        '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                        pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                        '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza(' +
                                        pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                        estado

                                    ]).draw(false).node(); // Obtener el nodo de la fila
                                }
                        });
                    } else {
                        swal({
                            icon: 'error',
                            title: 'info',
                            text: resp.mensaje
                        });
                    }


                    $('#tratamiento_presupuesto tbody').empty();
                    let presupuesto = resp.presupuesto;
                    console.log(presupuesto);
                    $('#tratamiento_presupuesto tbody').append(`
            <tr>
                <td class="text-center align-middle">${presupuesto.fecha}</td>
                <td class="text-center align-middle">${presupuesto.id}</td>
                <td class="text-center align-middle">${presupuesto.aprobado}</td>
                <td class="text-center align-middle">Sector I</td>
                <td class="text-center align-middle">${presupuesto.boca}</td>

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
                    ${presupuesto.fecha}
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                        <i class="fa fa-plus"></i> Trabajar en pieza
                    </button>
                </td>
            </tr>
            `);

                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        function mostrar_pieza_dental_examen_odontop_(count){
        let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen_end') }}";
        let data = {
            count: count,
            id_paciente: $('#id_paciente_fc').val(),
            tipo_examen:'odontop',
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    $('#nueva_pieza_dental_odontop_examen').empty();
                    $('#nueva_pieza_dental_odontop_examen').append(resp.v);

                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

        function proxima_atencion_paciente(){
            let id_ficha_atencion = $('#id_fc').val();
            let id_paciente = $('#id_paciente').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_profesional = $('#id_profesional_fc').val();
            let id_hora_medica = $('#hora_medica').val();

            let url = "{{ ROUTE('dental.proxima_atencion_paciente')}}";

            let data = {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
                id_hora_medica: id_hora_medica,
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    if(response.estado == 'ok'){
                        let fecha = response.fecha_atencion;
                        $('#proxima_fecha_atencion').html(fecha.fecha_consulta);
                        $('#proxima_hora_atencion').html(fecha.hora_inicio+' a '+fecha.hora_termino);
                        $('#proxima_fecha_atencion_od_ped').html(fecha.fecha_consulta);
                        $('#proxima_hora_atencion_od_ped').html(fecha.hora_inicio+' a '+fecha.hora_termino);
                    }else{
                        $('#proxima_fecha_atencion').html('');
                        $('#proxima_hora_atencion').html('');
                        $('#proxima_fecha_atencion_od_ped').html('');
                        $('#proxima_hora_atencion_od_ped').html('');
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function guardarCambiosTratamiento(){
            let id_tratamiento = $('#id_tratamiento').val();

            if(id_tratamiento == 0){
                swal({
                    title: "Error",
                    text: "Debe seleccionar un tratamiento",
                    icon: "error",
                    button: "Aceptar",
                });
                return;
            }

            let estado = $('#estado_tto').val();
            let data = {
                id_tratamiento: id_tratamiento,
                estado: estado,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_profesional: $('#id_profesional').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                observaciones: $('#observaciones_tto').val(),
                _token: CSRF_TOKEN
            }

            console.log(data);

            let url = "{{ route('dental.guardarCambiosTratamientoUrgencia') }}";
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if(resp.mensaje == 'OK'){
                        swal({
                            title: "Pieza guardada",
                            text: "Pieza guardada correctamente",
                            icon: "success",
                            button: "Aceptar",
                        });
                    }

                    $('#modal_cambio_estado_tto').modal('hide');

                    let odontograma = resp.odontograma;
                    odontograma_global = resp.odontograma;

                    let table = $('#presup_estado_pago').DataTable();
                    // Limpiar la tabla antes de agregar nuevas filas
                    table.clear().draw();

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {

                        if (odonto.urgencia == 0) {
                            if(odonto.estado_pago == 'ok'){
                                var clase = 'bg-success';
                            }else if(odonto.estado_pago == 'incompleto'){
                                var clase = 'bg-warning';
                            }else{
                                var clase = 'bg-danger';
                            }

                            if(odonto.estado == 0){
                                var estado = 'PENDIENTE';
                            }else if(odonto.estado == 1){
                                var estado = 'TERMINADO';
                            }else if(odonto.estado == 2){
                                var estado = 'EN PROCESO';
                            }else{
                                var estado = 'CITADO A CONTROL';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table.row.add([
                                odonto.descripcion,
                                odonto.pieza,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                '<div class="circle '+clase+'"></div>',
                                estado, // Columna vacía

                            ]).draw(false).node(); // Obtener el nodo de la fila

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }
                    });

                    let table_urg = $('#table_piezas_presupuesto_odonto').DataTable();
                    table_urg.clear().draw();

                    odontograma.forEach(function(pieza) {
                            if(pieza.estado == 0){
                                var estado = 'PENDIENTE';
                            }else if(pieza.estado == 1){
                                var estado = 'TERMINADO';
                            }else if(pieza.estado == 2){
                                var estado = 'EN PROCESO';
                            }else{
                                var estado = 'CITADO A CONTROL';
                            }
                            if (pieza.presupuesto == 1 && pieza.urgencia == 0) {
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_urg.row.add([
                                    pieza.pieza,
                                    pieza.diagnostico,
                                    pieza.descripcion,
                                    formatoMoneda(formatoMoneda(pieza.valor)),
                                    '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                    pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                    '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza(' +
                                    pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                    estado

                                ]).draw(false).node(); // Obtener el nodo de la fila
                            }
                    });
                    // dame_evoluciones_od_gral();

                    let table_odped = $('#table_piezas_presupuesto_odped').DataTable();
                    table_odped.clear().draw();
                    odontograma.forEach(function(pieza) {
                            if(pieza.estado == 0){
                                var estado = 'PENDIENTE';
                            }else if(pieza.estado == 1){
                                var estado = 'TERMINADO';
                            }else if(pieza.estado == 2){
                                var estado = 'EN PROCESO';
                            }else{
                                var estado = 'CITADO A CONTROL';
                            }
                            if (pieza.presupuesto == 1 && pieza.urgencia == 0) {
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_odped.row.add([
                                    pieza.pieza,
                                    pieza.diagnostico,
                                    pieza.descripcion,
                                    formatoMoneda(formatoMoneda(pieza.valor)),
                                    '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                    pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                    '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza(' +
                                    pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                    estado

                                ]).draw(false).node(); // Obtener el nodo de la fila
                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }
                    });
                }
            });
        }

         function actualizar_presupuesto(){
            // Obtener valores del formulario

            const id_dcto = $('#tiene_dcto').val();

            // Crear objeto JSON con los datos del formulario
            const data = {
                _token: '{{ csrf_token() }}', // Token CSRF
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                id_dcto: id_dcto
            };

            $.ajax({
                type:'post',
                url: '{{ ROUTE("dental.actualizar_presupuesto") }}',
                data: data,
                success: function(response){
                    console.log('Éxito:', response);
                    if (response.estado == 1) {
                        let tiene_dcto = $('#tiene_dcto').val();
                        if(tiene_dcto != 0){
                            confirmar_aplicar_convenio_tratamiento(tiene_dcto);
                        }else{
                            let pagos = response.pagos;
                            let table = $('#table_pagos_presupuesto').DataTable();
                            let presupuesto = response.presupuesto;
                            $('#id_presupuesto').val(presupuesto.id);
                            // Limpiar la tabla antes de agregar nuevas filas
                            table.clear().draw();
                            pagos.forEach(function(pago) {
                                let rowNode = table.row.add([
                                    pago.fecha_pago,
                                    pago.metodo_pago,
                                    formatoMoneda(pago.total),
                                    `<td>
                                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-search"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_pago_dental(${pago.id})"><i class="feather icon-x"></i></button>
                                    </td>`
                                ]).draw(false).node();

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            });
                            let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table_piezas_odontograma.clear().draw();

                            let odontograma = response.odontograma;

                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {

                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }

                                    if (odonto.estado == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_piezas_odontograma.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle ' + clase + '"></div>',
                                        estado, // Columna vacía

                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }
                            });

                            let insumos = response.insumos;
                            console.log(insumos);
                            let table_insumos = $('#table_insumos_preimplante').DataTable();

                            //Limpiar la tabla sin perder la configuración de DataTables
                            table_insumos.clear();

                            //Recorrer el array de insumos y agregarlos a la tabla
                            insumos.forEach(insumo => {
                                let total = insumo.cantidad * insumo.valor;
                                if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                            // Botones de acción
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                                <i class="feather icon-shopping-cart"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="editar_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>`;
                                }else{
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="editar_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>`;
                                }

                                table_insumos.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca, // Nombre del insumo
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    insumo.valor, // Unidad de medida
                                    total,
                                    botones
                                ]);
                            });
                            let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                            table_insumos_pagos.clear();
                            console.log(insumos);
                            insumos.forEach(insumo => {
                                let total = insumo.cantidad * insumo.valor;
                                if (insumo.presupuesto == 1 && insumo.urgencia == 0) {
                                    if (insumo.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (insumo.estado_pago == 'intermedio') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    let rowNode = table_insumos_pagos.row.add([
                                        insumo.insumos + ' ' + insumo.nombre_marca,
                                        insumo.observaciones,
                                        insumo.cantidad, // Nombre del insumo
                                        formatoMoneda(insumo.valor), // Cantidad utilizada
                                        0, // Unidad de medida
                                        formatoMoneda(total),
                                        ' <div class="circle ' + clase + '"></div>',

                                    ]).draw(false).node();

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }

                            });
                            table_insumos_pagos.draw();
                            $('#montoAbonado').val(formatoMoneda(parseInt(response.suma_pagado)));
                            $('#valores_abonado_presupuesto').html(formatoMoneda(parseInt(response.suma_pagado)));
                            $('#valores_total_abonado_presupuesto_conf').html(formatoMoneda(parseInt(response
                                .suma_pagado)));
                            $('#total_abonado_presupuesto').val(parseInt(response.suma_pagado));
                            $('#total_adeudado_presupuesto').val(parseInt(response.suma_adeudado));
                            $('#valores_laboratorio').html(formatoMoneda(parseInt(response.total_lab)));
                            $('#valores_laboratorio_conf').html(formatoMoneda(parseInt(response.total_lab)));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(parseInt(response.suma_adeudado)));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(parseInt(response.suma_adeudado)));
                            $('#abonos_presup').val(formatoMoneda(response.suma_pagado));
                            $('#subtotal_presup').val(formatoMoneda(response.suma_adeudado));
                            $('#subtotal_lab').val(formatoMoneda(response.total_lab));
                            $('#descuento_lab').val(0);
                            let total = parseInt(response.suma_presupuesto) +  parseInt(response.total_lab);
                            $('#total_presupuesto').val(formatoMoneda(total));
                            $('#total_presupuesto_dental').val(total);
                            let todos = response.todos;

                            let table_ = $('#presup_estado_pago_gral').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table_.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            todos.forEach(function(odonto) {

                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    if (odonto.atendido == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_.row.add([
                                        odonto.localizacion,
                                        odonto.diagnostico_tratamiento,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(odonto.valor),
                                        ' <div class="circle ' + clase + '"></div>',
                                        estado
                                    ]).draw(false).node();

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }

                            });
                        }

                    } else {
                        console.log('Error:', response.mensaje);
                    }
                },
                error: function(error){
                    console.log(error);
                }
            })
        }

        function guardar_insumo() {
            let nombreInsumo = $('#nombreInsumo option:selected').text();
            let tipoInsumo = $('#tipoInsumo').val();
            if (tipoInsumo == 1) {
                var marcaInsumo = $('#marcasImplantes option:selected').text();
            } else {
                var marcaInsumo = '';
            }
            var idMarcaInsumo = $('#marcasImplantes').val();
            console.log(idMarcaInsumo);
            let tipoInsumo_text = $('#tipoInsumo option:selected').text();
            let cantidad = $('#cantidad').val();
            let precio = $('#precio').val();
            let total = $('#total').val();

            console.log(tipoInsumo);

            let mensaje = '';
            let valido = 1;

            if (nombreInsumo == '') {
                valido = 0;
                mensaje += '<li>Nombre insumo </li>';
            }
            if (tipoInsumo == 0) {
                valido = 0;
                mensaje += '<li>Tipo de Insumo </li>';
            }
            if (cantidad == '' || cantidad <= 0) {
                valido = 0;
                mensaje += '<li>Cantidad </li>';
            }
            if (precio == '' || cantidad <= 0) {
                valido = 0;
                mensaje += '<li>Precio </li>';
            }

            if (valido == 1) {
                let data = {
                    insumos: nombreInsumo,
                    idTipoInsumo: tipoInsumo,
                    tipoInsumo: tipoInsumo_text,
                    marcaInsumo: marcaInsumo,
                    idMarcaInsumo: idMarcaInsumo,
                    cantidad: cantidad,
                    valor: precio,
                    total: total,
                    id_paciente: $('#id_paciente_fc').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    observaciones: $('#insumos_obs_tto').val(),
                    _token: CSRF_TOKEN
                }

                console.log(data);
                let url = '{{ ROUTE('dental.agregar_insumos_tto') }}';
                $.ajax({
                    url: url,
                    type: 'post',
                    data: data,
                    success: function(resp) {
                        console.log(resp);
                        if (resp.mensaje == 'ok') {
                            swal({
                                icon: 'success',
                                text: 'Se a agregado los insumos correctamente',
                                title: 'Exito'
                            });
                            let nuevo_insumo = resp.insumo;
                            cargar_a_presupuesto_insumo(nuevo_insumo.id);
                            $('#modal_insumos').modal('hide');
                            //limpiar_formulario_insumo();
                            let insumos = resp.insumos;
                            console.log(insumos);
                            let table = $('#table_insumos_odped').DataTable();

                            //Limpiar la tabla sin perder la configuración de DataTables
                            table.clear();



                            //Recorrer el array de insumos y agregarlos a la tabla
                            insumos.forEach(insumo => {
                                let total = insumo.cantidad * insumo.valor;
                                // Botones de acción
                                if (insumo.presupuesto == 0 || insumo.presupuesto == null) {
                                    // Botones de acción
                                    var botones = `
                                    <td>
                                        <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="feather icon-shopping-cart"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                                } else {
                                    var botones = `
                                    <td>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                                }
                                table.row.add([
                                    insumo.insumos + ' ' + insumo
                                    .nombre_marca, // Nombre del insumo
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    formatoMoneda(insumo.valor), // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                            });

                            //Dibujar la tabla nuevamente con los nuevos datos
                            table.draw();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            } else {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje,
                        },
                    },
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }



        }




        function eliminar_insumo(id) {
            swal({
                    title: "¿Esta seguro que desea ELIMINAR el insumo dental?",
                    text: "Favor confirme o cancele la solicitud",
                    icon: "warning",
                    buttons: ["Cancelar", "Solicitar"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        confirmar_eliminar_insumo(id);
                    }
                });
        }

        function confirmar_eliminar_insumo(id) {
            console.log(id);
            let data = {
                id: id,
                id_paciente: $('#id_paciente').val(),
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                _token: CSRF_TOKEN
            }
            let url = '{{ ROUTE('dental.eliminar_insumos_tto') }}';
            $.ajax({
                url: url,
                type: 'post',
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'ok') {
                        swal({
                            icon: 'success',
                            text: 'Se a eliminado insumos correctamente',
                            title: 'Exito'
                        });
                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let valores_lab = resp.valores[3];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos + valores_lab;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_insumos_presupuesto').html(formatoMoneda(valores_insumos));
                        $('#valores_insumos_presupuesto_conf').html(formatoMoneda(valores_insumos));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto').val(formatoMoneda(total_general));
                        $('#total_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto_dental').val(total_general);
                        $('#subtotal_presup').val(formatoMoneda(total_general));
                        $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                            valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                            total_general));
                        $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));


                        let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_odon_gral').DataTable();
                        let table_urg = $('#table_insumos_urg').DataTable();
                        let table_odped_urg = $('#table_insumos_odped_urg').DataTable();
                        //Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();
                        table_urg.clear();
                        table_odped_urg.clear();

                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if (insumo.presupuesto == 0 || insumo.presupuesto == null) {
                                    // Botones de acción
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                                <i class="feather icon-shopping-cart"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id},'urg')"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>`;
                                } else {
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                                <i class="feather icon-shopping-cart"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id},'urg')"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>`;
                                }
                            if (insumo.urgencia == 1) {
                                table_urg.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca,
                                    insumo.observaciones,
                                    insumo.cantidad,
                                    formatoMoneda(insumo.valor),
                                    formatoMoneda(total),
                                    botones
                                ]);
                            } else {
                                table.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca,
                                    insumo.observaciones,
                                    insumo.cantidad,
                                    formatoMoneda(insumo.valor),
                                    formatoMoneda(total),
                                    botones
                                ]);
                                table_odped_urg.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca,
                                    insumo.observaciones,
                                    insumo.cantidad,
                                    formatoMoneda(insumo.valor),
                                    formatoMoneda(total),
                                    botones
                                ]);
                            }
                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();
                        table_urg.draw();
                        table_odped_urg.draw();
                        $('#contenedor_insumos').empty();
                        insumos.forEach(insumo => {
                            if (insumo.presupuesto == 1) {
                                let total = insumo.cantidad * insumo.valor;
                                $('#contenedor_insumos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 col-lg-4 fill">
                                                        <label class="floating-label-activo-sm">Insumo</label>
                                                        <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-1 fill">
                                                        <label class="floating-label-activo-sm">Cantidad</label>
                                                        <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-2 fill">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-2 fill">
                                                        <label class="floating-label-activo-sm">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-md-1 col-lg-1 d-flex">

                                                        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            }

                        });

                        let table_insumos = $('#presup_insumos_pago').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table_insumos.clear();

                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if (insumo.presupuesto == 1) {
                                if (insumo.estado_pago == 'ok') {
                                    var clase = 'bg-success';
                                } else if (insumo.estado_pago == 'intermedio') {
                                    var clase = 'bg-warning';
                                } else {
                                    var clase = 'bg-danger';
                                }
                                let rowNode = table_insumos.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Nombre del insumo
                                    formatoMoneda(insumo.valor), // Cantidad utilizada
                                    0, // Unidad de medida
                                    formatoMoneda(total),
                                    ' <div class="circle ' + clase + '"></div>',
                                    ''

                                ]).draw(false).node();
                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }

                        });

                        table_insumos.draw();

                        $('#table_pagos_reasignar_insumos tbody').empty();
                        insumos.forEach(insumo => {
                            if (insumo.presupuesto == 1) {
                                let total = insumo.cantidad * insumo.valor;
                                $('#table_pagos_reasignar_insumos tbody').append(`
                                <tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${total}" data-id="${insumo.id}" data-info="insumo"></td>
                                    <td>${insumo.insumos} ${insumo.nombre_marca}</td>
                                    <td>${insumo.cantidad}</td>
                                    <td>${formatoMoneda(insumo.valor)}</td>
                                    <td>${formatoMoneda(total)}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>
                                </tr>
                            `);
                            }

                        });
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function abrir_ic_otorrino(){
            $('#m_interconsulta_otorrino').modal('show');
        }

        function abrir_ic_fono(){
            $('#m_interconsulta_fono').modal('show');
        }

        function abrir_ic_dental(){
            $('#m_interconsulta_dental').modal('show');
        }

        function eliminar_pieza_dental_pieza(id, tipo) {
            swal({
                    title: 'Advertencia',
                    text: '¿Está seguro de eliminar esta pieza?',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Aceptar'],
                    dangerMode: true
                })
                .then((aceptar) => {
                    if (aceptar) {
                        confirmar_eliminar_pieza_dental_pieza(id, tipo);
                    }
                });
        }

        function confirmar_eliminar_pieza_dental_pieza(id, tipo) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_pieza') }}";
            let data = {
                _token: CSRF_TOKEN,
                id_paciente: $('#id_paciente_fc').val(),
                id: id,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                tipo: tipo
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        let examenes = resp.examenes;
                        if (tipo == 'gral') {
                            $('#contenedor_pieza_dental_endo_gral').empty();
                            $('#contenedor_pieza_dental_endo_gral').append(resp.v);
                            $
                            $('#planificacion_examenes_gral').empty();
                            examenes.forEach(examen => {
                                $('#planificacion_examenes_gral').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        `);
                            });
                        } else if (tipo == 'endo') {
                            $('#contenedor_pieza_dental_endo').empty();
                            $('#contenedor_pieza_dental_endo').append(resp.v);
                            $('#planificacion_examenes_endo').empty();
                            examenes.forEach(examen => {
                                $('#planificacion_examenes_endo').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        `);
                            });
                        } else {
                            $('#contenedor_pieza_dental_odontop_examen').empty();
                            $('#contenedor_pieza_dental_odontop_examen').append(resp.v);
                            $('#contenedor_examenes_grupos_dentales_odontop').empty();
                            $('#contenedor_examenes_grupos_dentales_odontop').append(resp.vista_presupuestos);
                            $('#planificacion_examenes_odontop').empty();
                            examenes.forEach(examen => {
                                $('#planificacion_examenes_odontop').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                    <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                        <option selected="" value="1">Uniradicular</option>
                                        <option value="2">Biradicular</option>
                                        <option value="2">Triradicular</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                        <option selected="" value="1">Convenio</option>
                                        <option value="2">Sin Convenio</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        `);
                            });
                        }
                        swal({
                            title: 'Exito',
                            text: 'Se ha eliminado con éxito',
                            icon: 'success'
                        });

                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

    function registrar_odontograma_quinto_cuadrante(count){
        var id_ficha_atencion = $('#id_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_paciente = $('#id_paciente').val();

        var cuadrante = 5;
        var posicion_pieza = count;

        var caraM = $('#caraM_check_'+count+'_5').val();
        var caraO = $('#caraO_check_'+count+'_5').val();
        var caraD = $('#caraD_check_'+count+'_5').val();
        var caraV = $('#caraV_check_'+count+'_5').val();
        var caraP = $('#caraP_check_'+count+'_5').val();
        var diagnostico = $('#diagnostico_'+count+'_5').val();
        var tratamiento = $('#tratamiento_'+count+'_5').val();
        var pieza = $('#pieza_odontograma_'+count+'_5').val();


        let data = {
            id_ficha_atencion: id_ficha_atencion,
            id_lugar_atencion: id_lugar_atencion,
            id_paciente: id_paciente,
            pieza: pieza,
            cuadrante: cuadrante,
            posicion_pieza: posicion_pieza,
            caraM: caraM,
            caraO: caraO,
            caraD: caraD,
            caraV: caraV,
            caraP: caraP,
            diagnostico: diagnostico,
            tratamiento: tratamiento,
            _token: "{{ csrf_token() }}"
        }

        console.log(data);

        let url = "{{ route('dental.registrar_odontograma') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.status == 1){
                    swal({
                        title: 'Odontograma',
                        text: response.mensaje,
                        icon: 'success'
                    });

                    let odontograma = response.odontograma_paciente;
                    let table = $('#table_odontograma').DataTable();

                    // Vacía la tabla
                    table.clear();

                    // Genera los datos (array de arrays o de objetos si usas columns)
                    let data = [];

                    odontograma.forEach(function(odonto) {
                        let switchPresupuesto = `
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                    value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                    onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                            </div>
                        `;

                        let switchSeleccion = `
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                    id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                    onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                            </div>
                        `;

                        data.push([
                            odonto.fecha,
                            odonto.tratamiento,
                            odonto.caras,
                            odonto.pieza,
                            odonto.diagnostico,
                            formatoMoneda(formatoMoneda(odonto.valor)),
                            switchPresupuesto,
                            switchSeleccion
                        ]);
                    });

                    // Agrega las nuevas filas
                    table.rows.add(data).draw();

                    $('#table_trabajos_presupuesto tbody').empty();
                    odontograma.forEach(function(odonto){
                        if(odonto.presupuesto == 1){
                            $('#table_trabajos_presupuesto tbody').append(`
                                <tr>
                                    <td>${odonto.fecha}</td>
                                    <td>${odonto.diagnostico} </td>
                                    <td>${odonto.caras} </td>
                                    <td>${odonto.pieza} </td>
                                    <td>${odonto.tratamiento} </td>
                                    <td>${formatoMoneda(formatoMoneda(odonto.valor))} </td>
                                    <td> </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                    </td>
                                </tr>
                            `);
                        }
                    });

                    let valores_boca_general = response.valores[0];
                        let valores_odontograma = response.valores[1];
                        let total_general = valores_boca_general + valores_odontograma;
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#odon_adults').empty();
                    $('#odon_adults').append(response.odontograma_paciente_vista);
                    $('#odonto_adulto').empty();
                    $('#odonto_adulto').append(response.odontograma_paciente_vista);

                }else{
                    swal({
                        title: 'Odontograma',
                        text: response.mensaje,
                        icon: 'error'
                    });
                }
            }
        })

    }

    function registrar_odontograma_sexto_cuadrante(count){
        let id_ficha_atencion = $('#id_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_paciente = $('#id_paciente').val();

        var pieza = $('#pieza_odontograma_'+count+'_6').val();
        var cuadrante = 6;
        var posicion_pieza = count;
        var caraM = $('#caraM_check_'+count+'_6').val();
        var caraO = $('#caraO_check_'+count+'_6').val();
        var caraD = $('#caraD_check_'+count+'_6').val();
        var caraV = $('#caraV_check_'+count+'_6').val();
        var caraP = $('#caraP_check_'+count+'_6').val();

        var diagnostico = $('#diagnostico_'+count+'_6').val();
        var tratamiento = $('#tratamiento_'+count+'_6').val();



        let data = {
            id_ficha_atencion: id_ficha_atencion,
            id_lugar_atencion: id_lugar_atencion,
            id_paciente: id_paciente,
            pieza: pieza,
            cuadrante: cuadrante,
            posicion_pieza: posicion_pieza,
            caraM: caraM,
            caraO: caraO,
            caraD: caraD,
            caraV: caraV,
            caraP: caraP,
            diagnostico: diagnostico,
            tratamiento: tratamiento,
            _token: "{{ csrf_token() }}"
        }


        let url = "{{ route('dental.registrar_odontograma') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.status == 1){
                    swal({
                        title: 'Odontograma',
                        text: response.mensaje,
                        icon: 'success'
                    });

                    let odontograma = response.odontograma_paciente;
                    let table = $('#table_odontograma').DataTable();

                    // Vacía la tabla
                    table.clear();

                    // Genera los datos (array de arrays o de objetos si usas columns)
                    let data = [];

                    odontograma.forEach(function(odonto) {
                        let switchPresupuesto = `
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                    value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                    onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                            </div>
                        `;

                        let switchSeleccion = `
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                    id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                    onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                            </div>
                        `;

                        data.push([
                            odonto.fecha,
                            odonto.tratamiento,
                            odonto.caras,
                            odonto.pieza,
                            odonto.diagnostico,
                            formatoMoneda(formatoMoneda(odonto.valor)),
                            switchPresupuesto,
                            switchSeleccion
                        ]);
                    });

                    // Agrega las nuevas filas
                    table.rows.add(data).draw();


                    $('#table_trabajos_presupuesto tbody').empty();
                    odontograma.forEach(function(odonto){

                        $('#table_trabajos_presupuesto tbody').append(`
                            <tr>
                                <td>${odonto.fecha}</td>
                                <td>${odonto.diagnostico} </td>
                                <td>${odonto.caras} </td>
                                <td>${odonto.pieza} </td>
                                <td>${odonto.tratamiento} </td>
                                <td>${formatoMoneda(formatoMoneda(odonto.valor))} </td>
                                <td> </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                </td>
                            </tr>
                        `);
                    });
                    let valores_boca_general = response.valores[0];
                        let valores_odontograma = response.valores[1];
                        let total_general = valores_boca_general + valores_odontograma;
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#odon_adults').empty();
                    $('#odon_adults').append(response.odontograma_paciente_vista);
                    $('#odonto_adulto').empty();
                    $('#odonto_adulto').append(response.odontograma_paciente_vista);

                }else{
                    swal({
                        title: 'Odontograma',
                        text: response.mensaje,
                        icon: 'error'
                    });
                }
            }
        });
    }

    function registrar_odontograma_septimo_cuadrante(count){
        let id_ficha_atencion = $('#id_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_paciente = $('#id_paciente').val();

        var pieza = $('#pieza_odontograma_'+count+'_7').val();
        var cuadrante = 7;
        var posicion_pieza = count;
        var caraM = $('#caraM_check_'+count+'_7').val();
        var caraO = $('#caraO_check_'+count+'_7').val();
        var caraD = $('#caraD_check_'+count+'_7').val();
        var caraV = $('#caraV_check_'+count+'_7').val();
        var caraP = $('#caraP_check_'+count+'_7').val();

        var diagnostico = $('#diagnostico_'+count+'_7').val();
        var tratamiento = $('#tratamiento_'+count+'_7').val();


        let data = {
            id_ficha_atencion: id_ficha_atencion,
            id_lugar_atencion: id_lugar_atencion,
            id_paciente: id_paciente,
            pieza: pieza,
            cuadrante: cuadrante,
            posicion_pieza: posicion_pieza,
            caraM: caraM,
            caraO: caraO,
            caraD: caraD,
            caraV: caraV,
            caraP: caraP,
            diagnostico: diagnostico,
            tratamiento: tratamiento,
            _token: "{{ csrf_token() }}"
        }

         console.log(data);

        let url = "{{ route('dental.registrar_odontograma') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.status == 1){
                    swal({
                        title: 'Odontograma',
                        text: response.mensaje,
                        icon: 'success'
                    });

                    let odontograma = response.odontograma_paciente;
                    let table = $('#table_odontograma').DataTable();

                    // Vacía la tabla
                    table.clear();

                    // Genera los datos (array de arrays o de objetos si usas columns)
                    let data = [];

                    odontograma.forEach(function(odonto) {
                        let switchPresupuesto = `
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                    value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                    onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                            </div>
                        `;

                        let switchSeleccion = `
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                    id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                    onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                            </div>
                        `;

                        data.push([
                            odonto.fecha,
                            odonto.tratamiento,
                            odonto.caras,
                            odonto.pieza,
                            odonto.diagnostico,
                            formatoMoneda(formatoMoneda(odonto.valor)),
                            switchPresupuesto,
                            switchSeleccion
                        ]);
                    });

                    // Agrega las nuevas filas
                    table.rows.add(data).draw();


                    $('#table_trabajos_presupuesto tbody').empty();
                    odontograma.forEach(function(odonto){
                        if(odonto.presupuesto == 1){

                            $('#table_trabajos_presupuesto tbody').append(`
                                <tr>
                                    <td>${odonto.fecha}</td>
                                    <td>${odonto.diagnostico} </td>
                                    <td>${odonto.caras} </td>
                                    <td>${odonto.pieza} </td>
                                    <td>${odonto.tratamiento} </td>
                                    <td>${formatoMoneda(formatoMoneda(odonto.valor))} </td>
                                    <td> </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                    </td>
                                </tr>
                            `);
                        }
                    });
                        let valores_boca_general = response.valores[0];
                        let valores_odontograma = response.valores[1];
                        let total_general = valores_boca_general + valores_odontograma;
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#odon_adults').empty();
                    $('#odon_adults').append(response.odontograma_paciente_vista);
                    $('#odonto_adulto').empty();
                    $('#odonto_adulto').append(response.odontograma_paciente_vista);

                }else{
                    swal({
                        title: 'Odontograma',
                        text: response.mensaje,
                        icon: 'error'
                    });
                }
            }
        });
    }

    function registrar_odontograma_octavo_cuadrante(count){
        let id_ficha_atencion = $('#id_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_paciente = $('#id_paciente').val();

        var pieza = $('#pieza_odontograma_'+count+'_8').val();
        var cuadrante = 8;
        var posicion_pieza = count;
        var caraM = $('#caraM_check_'+count+'_8').val();
        var caraO = $('#caraO_check_'+count+'_8').val();
        var caraD = $('#caraD_check_'+count+'_8').val();
        var caraV = $('#caraV_check_'+count+'_8').val();
        var caraP = $('#caraP_check_'+count+'_8').val();

        var diagnostico = $('#diagnostico_'+count+'_8').val();
        var tratamiento = $('#tratamiento_'+count+'_8').val();


        let data = {
            id_ficha_atencion: id_ficha_atencion,
            id_lugar_atencion: id_lugar_atencion,
            id_paciente: id_paciente,
            pieza: pieza,
            cuadrante: cuadrante,
            posicion_pieza: posicion_pieza,
            caraM: caraM,
            caraO: caraO,
            caraD: caraD,
            caraV: caraV,
            caraP: caraP,
            diagnostico: diagnostico,
            tratamiento: tratamiento,
            _token: "{{ csrf_token() }}"
        }

        console.log(data);

        let url = "{{ route('dental.registrar_odontograma') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.status == 1){
                    swal({
                        title: 'Odontograma',
                        text: response.mensaje,
                        icon: 'success'
                    });

                    let odontograma = response.odontograma_paciente;
                    let table = $('#table_odontograma').DataTable();

                    // Vacía la tabla
                    table.clear();

                    // Genera los datos (array de arrays o de objetos si usas columns)
                    let data = [];

                    odontograma.forEach(function(odonto) {
                        let switchPresupuesto = `
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                    value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                    onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                            </div>
                        `;

                        let switchSeleccion = `
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                    id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                    onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                            </div>
                        `;

                        data.push([
                            odonto.fecha,
                            odonto.tratamiento,
                            odonto.caras,
                            odonto.pieza,
                            odonto.diagnostico,
                            formatoMoneda(formatoMoneda(odonto.valor)),
                            switchPresupuesto,
                            switchSeleccion
                        ]);
                    });

                    // Agrega las nuevas filas
                    table.rows.add(data).draw();


                    $('#table_trabajos_presupuesto tbody').empty();
                    odontograma.forEach(function(odonto){
                        if(odonto.presupuesto == 1){

                            $('#table_trabajos_presupuesto tbody').append(`
                                <tr>
                                    <td>${odonto.fecha}</td>
                                    <td>${odonto.diagnostico} </td>
                                    <td>${odonto.caras} </td>
                                    <td>${odonto.pieza} </td>
                                    <td>${odonto.tratamiento} </td>
                                    <td>${formatoMoneda(formatoMoneda(odonto.valor))} </td>
                                    <td> </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                    </td>
                                </tr>
                            `);
                        }
                    });
                    let valores_boca_general = response.valores[0];
                        let valores_odontograma = response.valores[1];
                        let total_general = valores_boca_general + valores_odontograma;
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#odon_adults').empty();
                    $('#odon_adults').append(response.odontograma_paciente_vista);
                    $('#odonto_adulto').empty();
                    $('#odonto_adulto').append(response.odontograma_paciente_vista);


                }else{
                    swal({
                        title: 'Odontograma',
                        text: response.mensaje,
                        icon: 'error'
                    });
                }
            }
        });
    }

    function togglePresupuesto(id, estaSeleccionado) {
        if (estaSeleccionado) {
            cargar_a_presupuesto(id);
        } else {
            sacar_de_presupuesto(id);
        }
    }

    function toggleSeleccion(id, estaSeleccionado) {
        if (estaSeleccionado) {
            console.log(`Odontograma ${id} seleccionado para acción en bloque.`);
        } else {
            console.log(`Odontograma ${id} deseleccionado.`);
        }
    }

    function eliminar_seleccionados() {
        // Obtener todos los checkboxes seleccionados
        const seleccionados = [];
        document.querySelectorAll('.checkbox-seleccion:checked').forEach((checkbox) => {
            seleccionados.push(checkbox.value);
        });

        // Validar que haya elementos seleccionados
        if (seleccionados.length === 0) {
            swal({
                title: 'Error',
                text: 'No hay elementos seleccionados para eliminar.',
                icon: 'error'
            })
            return;
        }

        swal({
            title: 'Confirmar eliminación',
            text: `¿Estás seguro de que deseas eliminar ${seleccionados.length} elemento(s) seleccionado(s)?`,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Llamar a la función para eliminar los elementos seleccionados
                eliminar_odontograma_seleccionados(seleccionados);
            } else {
                swal('Acción cancelada', {
                    icon: 'info',
                });
            }
        })


    }

    function eliminar_odontograma_seleccionados(seleccionados){
        // Enviar los IDs por AJAX
        $.ajax({
            type: 'POST',
            url: "{{ route('dental.eliminar_odontograma') }}",  // Ruta del backend para eliminar
            data: {
                ids: seleccionados,  // Array de IDs seleccionados
                id_paciente: $('#id_paciente').val(),
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                _token: "{{ csrf_token() }}"  // CSRF token para seguridad
            },
            success: function (response) {
                console.log(response);
                        if(response.status == 1){
                            swal({
                                title: 'Odontograma',
                                text: response.mensaje,
                                icon: 'success'
                            });

                            let odontograma = response.odontograma_paciente;
                            odontograma_global = odontograma; // Actualiza la variable global
                            let table_odonto = $('#table_odontograma').DataTable();

                            // Vacía la tabla
                            table_odonto.clear();

                            // Genera los datos (array de arrays o de objetos si usas columns)
                            let data = [];

                            odontograma.forEach(function(odonto) {
                                let switchPresupuesto = `
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                            value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                            onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                        <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                                    </div>
                                `;

                                let switchSeleccion = `
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                            id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                            onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                        <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                                    </div>
                                `;

                                data.push([
                                    odonto.fecha,
                                    odonto.tratamiento,
                                    odonto.caras,
                                    odonto.pieza,
                                    odonto.diagnostico,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    switchPresupuesto,
                                    switchSeleccion
                                ]);
                            });

                            // Agrega las nuevas filas
                            table_odonto.rows.add(data).draw();

                            $('#table_trabajos_presupuesto tbody').empty();
                            odontograma.forEach(function(odonto){
                                if(odonto.presupuesto == 1){

                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(formatoMoneda(odonto.valor))} </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                            </td>
                                        </tr>
                                    `);
                                }
                            });
                            let valores_boca_general = response.valores[0];
                            let valores_odontograma = response.valores[1];
                            let total_general = valores_boca_general + valores_odontograma;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_presup').val(formatoMoneda(total_general));
                            $('#odon_adults').empty();
                            $('#odon_adults').append(response.odontograma_paciente_vista);
                            let table = $('#presup_estado_pago').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1) {
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '',
                                        '', // Columna vacía
                                        `<button type="button" class="btn btn-success btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-plus"></i> Pagar</button>`
                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle');
                                }
                            });
                            $('#contenedor_piezas_dentales_presupuesto').empty();
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(formatoMoneda(odonto.valor)) } </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Cargar</button>
                                            </td>
                                        </tr>
                                    `);
                                }
                            });

                            let table_odontop = $('#table_piezas_presupuesto_odped').DataTable();
                            table_odontop.clear();
                            odontograma.forEach(function(pieza) {
                                    if(pieza.estado == 0){
                                        var estado = 'PENDIENTE';
                                    }else if(pieza.estado == 1){
                                        var estado = 'TERMINADO';
                                    }else if(pieza.estado == 2){
                                        var estado = 'EN PROCESO';
                                    }else{
                                        var estado = 'CITADO A CONTROL';
                                    }
                                    if (pieza.urgencia == 0) {
                                        // Agregar una nueva fila a la tabla
                                        let rowNode = table_odontop.row.add([
                                            pieza.pieza,
                                            pieza.diagnostico,
                                            pieza.descripcion,
                                            formatoMoneda(formatoMoneda(pieza.valor)),
                                            '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg(' +
                                            pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                            '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg(' +
                                            pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                            estado

                                        ]).draw(false).node(); // Obtener el nodo de la fila
                                    }
                            });
                            $('#odontograma_ped_completo').empty();
                            $('#odontograma_ped_completo').append(response.odontograma_paciente_vista);
                        }
            },
            error: function (error) {
                alert("Hubo un error al eliminar los elementos.");
                console.error(error);
            }
        });
    }

    function cargar_a_presupuesto(id, tipo = null, elemento = null) {
            let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto') }}";
            let data = {
                id: id,
                tipo: tipo,
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (tipo == null) {
                        if (resp.status == 1) {
                            swal({
                                icon: 'success',
                                title: 'Info',
                                text: resp.mensaje
                            });
                            let odontograma = resp.odontograma_paciente;
                            odontograma_global = odontograma;
                            let table = $('#table_odontograma').DataTable();

                            // Vacía la tabla
                            table.clear();

                            // Genera los datos (array de arrays o de objetos si usas columns)
                            let data = [];

                            odontograma.forEach(function(odonto) {
                                let switchPresupuesto = `
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                            value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                            onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                        <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                                    </div>
                                `;

                                let switchSeleccion = `
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                            id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                            onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                        <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                                    </div>
                                `;

                                data.push([
                                    odonto.fecha,
                                    odonto.tratamiento,
                                    odonto.caras,
                                    odonto.pieza,
                                    odonto.diagnostico,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    switchPresupuesto,
                                    switchSeleccion
                                ]);
                            });

                            // Agrega las nuevas filas
                            table.rows.add(data).draw();

                            $('#contenedor_piezas_dentales_presupuesto').empty();
                            $('#table_trabajos_presupuesto tbody').empty();
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(formatoMoneda(odonto.valor)) } </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Cargar</button>
                                            </td>
                                        </tr>
                                    `);
                                }
                            });
                            let valores_boca_general = resp.valores[0];
                            let valores_odontograma = resp.valores[1];
                            let valores_insumos = resp.valores[2];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(total_general));
                            $('#total_clinico').val(formatoMoneda(total_general));
                            // guardamos el total en un input hidden
                            $('#total_presupuesto_dental').val(total_general);
                            let table_presup_estado_pago = $('#presup_estado_pago').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table_presup_estado_pago.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {

                                if (odonto.presupuesto == 1) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }

                                    if (odonto.estado == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_presup_estado_pago.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle ' + clase + '"></div>',
                                        estado, // Columna vacía

                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }
                            });
                            // se cargan las piezas seleccionadas en tabla con id table_piezas_presupuesto_odonto
                            let table_odon_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                            table_odon_gral.clear().draw();

                            odontograma.forEach(function(pieza){
                                        // Agregar una nueva fila a la tabla
                                        let rowNode = table_odon_gral.row.add([
                                            pieza.pieza,
                                            pieza.descripcion,
                                            formatoMoneda(formatoMoneda(pieza.valor)),
                                            '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma('+pieza.id+')"><i class="feather icon-x"> </i> </button>'

                                        ]).draw(false).node(); // Obtener el nodo de la fila


                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'info',
                                text: resp.mensaje
                            });
                        }
                    } else {
                        swal({
                            icon: 'success',
                            title: 'Info',
                            text: 'Examen cargado a presupuesto con éxito.'
                        });

                        if (elemento) {
                            // Cambiar clase
                            $(elemento).removeClass('btn-primary btn-sm btn-icon has-ripple')
                                .addClass('btn-danger btn-icon');

                            // Cambiar contenido (ícono)
                            $(elemento).html('<i class="feather icon-log-out"></i>');

                            // Cambiar función onclick al vuelo
                            $(elemento).attr('onclick', `sacar_de_presupuesto(${id}, 'gral', this)`);
                        }

                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_clinico').val(formatoMoneda(total_general));
                        $('#total_clinico').val(formatoMoneda(total_general));
                        let todos = resp.todos;

                        let table = $('#presup_estado_pago_gral').DataTable();

                        // Limpiar la tabla antes de agregar nuevas filas
                        table.clear().draw();

                        // Recorrer el odontograma y agregar nuevas filas
                        todos.forEach(function(odonto) {

                            if (odonto.presupuesto == 1) {
                                if (odonto.estado_pago == 'ok') {
                                    var clase = 'bg-success';
                                } else if (odonto.estado_pago == 'intermedio') {
                                    var clase = 'bg-warning';
                                } else {
                                    var clase = 'bg-danger';
                                }
                                if (odonto.estado == 0) {
                                    var estado = 'TERMINADO';
                                } else {
                                    var estado = 'PENDIENTE';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
                                    odonto.localizacion,
                                    odonto.diagnostico_tratamiento,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    0,
                                    formatoMoneda(odonto.valor),
                                    ' <div class="circle ' + clase + '"></div>',
                                    estado
                                ]).draw(false).node();

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }

                        });

                        $('#contenedor_todos').empty();
                        todos.forEach(t => {
                            if (t.presupuesto == 1) {
                                $('#contenedor_todos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">${t.localizacion}</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-md-6 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                                        </div>
                                                        <div class="form-group col-md-4 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-md-4 fill">
                                                            <label class="floating-label-activo-sm">Total
                                                                prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                        </div>
                                                        <div class="form-group col-md-1 fill">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral')"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>`);
                            }
                        });
                        $('#table_pagos_reasignar_grupos tbody').empty();
                        todos.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.diagnostico_tratamiento}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-danger" onclick="eliminar_diagnostico(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                $('#table_pagos_reasignar_grupos tbody').append(fila);
                            }
                        });
                    }

                    $('#tratamiento_presupuesto tbody').empty();
                    let presupuesto = resp.presupuesto;
                    console.log(presupuesto);
                    $('#tratamiento_presupuesto tbody').append(`
                        <tr>
                            <td class="text-center align-middle">${presupuesto.fecha}</td>
                            <td class="text-center align-middle">${presupuesto.id}</td>
                            <td class="text-center align-middle">${presupuesto.aprobado}</td>
                            <td class="text-center align-middle">Sector I</td>
                            <td class="text-center align-middle">${presupuesto.boca}</td>

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
                            ${presupuesto.fecha}
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                                    <i class="fa fa-plus"></i> Trabajar en pieza
                                </button>
                            </td>
                        </tr>
                    `);

                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        var formatoMoneda = (valor) => {
            return valor.toLocaleString('es-CL', {
                style: 'currency',
                currency: 'CLP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).replace(/\./g, ',').replace(/,/g, '.');
        };

        function sacar_de_presupuesto(id, tipo = null, elemento = null) {
            let url = "{{ ROUTE('dental.sacar_tratamiento_presupuesto') }}";
            let data = {
                id: id,
                tipo: tipo,
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (tipo == null) {
                        if (resp.status == 1) {
                            swal({
                                icon: 'success',
                                title: 'Info',
                                text: resp.mensaje
                            });
                            let odontograma = resp.odontograma_paciente;
                            odontograma_global = odontograma;
                            let table_odonto = $('#table_odontograma').DataTable();

                            // Vacía la tabla
                            table_odonto.clear();

                            // Genera los datos (array de arrays o de objetos si usas columns)
                            let data = [];

                            odontograma.forEach(function(odonto) {
                                let switchPresupuesto = `
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                            value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                            onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                        <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                                    </div>
                                `;

                                let switchSeleccion = `
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                            id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                            onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                        <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                                    </div>
                                `;

                                data.push([
                                    odonto.fecha,
                                    odonto.tratamiento,
                                    odonto.caras,
                                    odonto.pieza,
                                    odonto.diagnostico,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    switchPresupuesto,
                                    switchSeleccion
                                ]);
                            });

                            // Agrega las nuevas filas
                            table_odonto.rows.add(data).draw();

                            $('#contenedor_piezas_dentales_presupuesto').empty();
                            $('#table_trabajos_presupuesto tbody').empty();
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1) {
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(formatoMoneda(odonto.valor)) } </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Cargar</button>
                                            </td>
                                        </tr>
                                    `);
                                }
                            });
                            let valores_boca_general = resp.valores[0];
                            let valores_odontograma = resp.valores[1];
                            let valores_insumos = resp.valores[2];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(total_general));
                            $('#total_clinico').val(formatoMoneda(total_general));
                            $('#total_presupuesto_dental').val(total_general);
                            // Limpiar la tabla antes de agregar nuevas filas
                            let table_presup = $('#presup_estado_pago').DataTable();
                            table_presup.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    if (odonto.estado == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_presup.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle ' + clase + '"></div>',
                                        estado, // Columna vacía

                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }
                            });
                            // se cargan las piezas seleccionadas en tabla con id table_piezas_presupuesto_odonto
                            let table_odon_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                            table_odon_gral.clear().draw();

                            odontograma.forEach(function(pieza){
                                        // Agregar una nueva fila a la tabla
                                        let rowNode = table_odon_gral.row.add([
                                            pieza.pieza,
                                            pieza.descripcion,
                                            formatoMoneda(formatoMoneda(pieza.valor)),
                                            '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma('+pieza.id+')"><i class="feather icon-x"> </i> </button>'

                                        ]).draw(false).node(); // Obtener el nodo de la fila


                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'info',
                                text: resp.mensaje
                            });
                        }
                    } else {
                        if (resp.status == 1) {

                            swal({
                                icon: 'success',
                                title: 'Info',
                                text: 'Examen retirado con éxito.'
                            });

                            if(elemento){
                                $(elemento).removeClass('btn-danger btn-icon').addClass('btn-primary btn-sm btn-icon has-ripple');
                                $(elemento).html('<i class="feather icon-shopping-cart"></i>');
                                $(elemento).attr('onclick', `cargar_a_presupuesto(${id}, '${tipo}', this)`);
                            }

                            let valores_boca_general = resp.valores[0];
                            let valores_odontograma = resp.valores[1];
                            let valores_insumos = resp.valores[2];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(total_general));
                            $('#total_clinico').val(formatoMoneda(total_general));
                            let todos = resp.todos;

                            let table_presup = $('#presup_estado_pago_gral').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table_presup.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            todos.forEach(function(odonto) {

                                if (odonto.presupuesto == 1) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'intermedio') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    if (odonto.estado == 0) {
                                        var estado = 'TERMINADO';
                                    } else {
                                        var estado = 'PENDIENTE';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_presup.row.add([
                                        odonto.localizacion,
                                        odonto.diagnostico_tratamiento,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(odonto.valor),
                                        ' <div class="circle ' + clase + '"></div>',
                                        estado
                                    ]).draw(false).node();

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }

                            });
                            $('#contenedor_todos').empty();
                            todos.forEach(t => {
                                if (t.presupuesto == 1) {
                                    $('#contenedor_todos').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-informacion">
                                                    <div class="card-body pb-0">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">${t.localizacion}</label>
                                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                            </div>
                                                            <div class="form-group col-md-6 fill">
                                                                <label class="floating-label-activo-sm">Prestación</label>
                                                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                                            </div>
                                                            <div class="form-group col-md-4 fill">
                                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-3">
                                                                <label class="floating-label-activo-sm">Descuento</label>
                                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                            </div>
                                                            <div class="form-group col-md-4 fill">
                                                                <label class="floating-label-activo-sm">Total
                                                                    prestación</label>
                                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                            </div>
                                                            <div class="form-group col-md-1 fill">
                                                                <button type="button" class="btn btn-danger btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral')"><i class="feather icon-x"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>`
                                    );
                                }
                            });

                            $('#table_pagos_reasignar_grupos tbody').empty();
                            todos.forEach(function(odonto) {
                                if (odonto.presupuesto == 1) {
                                    let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.pieza}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-danger" onclick="eliminar_diagnostico(${odonto.id},'gral')"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                    $('#table_pagos_reasignar_grupos tbody').append(fila);
                                }
                            });
                            let table_boca = $('#table_tto_boca_gral').DataTable();
                            // Limpiar la tabla completamente
                            table_boca.clear().draw();

                            // Agregar cada fila nuevamente
                            todos.forEach(function(diagnostico) {
                                    table_boca.row.add([
                                        diagnostico.fecha,
                                        diagnostico.localizacion,
                                        diagnostico.descripcion,
                                        diagnostico.diagnostico_tratamiento,
                                        diagnostico.comentario,
                                        formatoMoneda(diagnostico.valor),
                                        `
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_tratamiento_inf(${diagnostico.id}, 'gral')">
                                            <i class="feather icon-x"></i>
                                        </button>
                                        ${diagnostico.presupuesto == 0
                                            ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id}, 'gral', this)"><i class="feather icon-shopping-cart"></i></button>`
                                            : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id}, 'gral', this)"><i class="feather icon-log-out"></i></button>`
                                        }
                                        `
                                    ]).draw(false);
                            });
                    }

                }

            },
            error: function(error){
                console.log(error.responseText);
            }
            });
        }

        function eliminarExamenAgregadoRxOdontop(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar este examen?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmarEliminarExamenAgregadoRxOdontop(id);
                }
            })
        }

        function confirmarEliminarExamenAgregadoRxOdontop(id) {
            let url = "{{ route('profesional.eliminar_nueva_pieza_dental_rx_odontop') }}";
            var idPaciente = $('#id_paciente_fc').val();
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id: id,
                    id_paciente: idPaciente,
                    tipo_examen: 'odontop',
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    let mensaje = resp.mensaje;
                    let vista = resp.v;
                    if (mensaje == 'OK') {
                        swal({
                            title: 'Éxito',
                            text: 'Evolución eliminada correctamente',
                            icon: 'success',
                            button: 'Aceptar'
                        });
                        $('#contenedor_pieza_dental_odontop').empty();
                        $('#contenedor_pieza_dental_odontop').append(vista);
                    } else {
                        swal({
                            title: 'Error',
                            text: 'mensaje',
                            icon: 'error',
                            button: 'Aceptar'
                        })
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function mostrar_nueva_pieza_oral_rx_odontop(count) {
            let url = "{{ route('profesional.mostrar_nueva_pieza_dental_rx_end') }}";
            let odontop_numero_pieza = $('#odontop_numero_pieza_' + count).val();
            let odontop_rx_esp_peri_apical = $('#odontop_rx_esp_peri_apical_' + count).val();
            let odontop_h_apical = $('#odontop_h_apical' + count).val();
            let odontop_obs_ex_oral = $('#odontop_obs_ex_oral_' + count).val();
            let data = {
                numero_pieza: odontop_numero_pieza,
                odontop_rx_esp_peri_apical: odontop_rx_esp_peri_apical,
                odontop_h_apical: odontop_h_apical,
                odontop_obs_ex_oral: odontop_obs_ex_oral,
                count: count,
                id_paciente: $('#id_paciente_fc').val(),
                tipo_examen: 'odontop',
                _token: '{{ csrf_token() }}'
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                beforeSend: function(){
                    swal({
                        title: 'Cargando',
                        text: 'Por favor espere...',
                        icon: 'info',
                        buttons: false,
                        closeOnClickOutside: false
                    });
                },
                success: function(resp) {
                    swal.close();
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#nueva_pieza_dental_odontop_').empty();
                        $('#nueva_pieza_dental_odontop_').append(resp.v);
                        $('#contenedor_pieza_dental_odontop').empty();
                        $('#contenedor_pieza_dental_odontop').append(resp.vista_piezas);
                    }
                },
                error: function(error) {
                    swal.close();
                    console.log(error);
                }
            })
        }

        function mostrar_pieza_dental_examen_odontop_(count) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen_end') }}";
            let data = {
                count: count,
                id_paciente: $('#id_paciente_fc').val(),
                tipo_examen: 'odontop',
                _token: CSRF_TOKEN
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#nueva_pieza_dental_odontop_examen').empty();
                        $('#nueva_pieza_dental_odontop_examen').append(resp.v);

                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function eliminar_rx(id){
    swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta RX?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmarEliminarImagenRx(id);
            }
        })
}

function confirmarEliminarImagenRx(id){
    let url = "{{ ROUTE('profesional.eliminar_imagen_rx_paciente') }}";
    let data = {
        _token: CSRF_TOKEN,
        id:id,
        id_paciente: dame_id_paciente()
    }

    $.ajax({
        type:'post',
        data: data,
        url: url,
        success: function(resp){
            if(resp.mensaje == 'OK'){
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.v);
            }else{
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.mensaje);
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}



        // Función para amplificar imagen en modal
        function amplificar_imagen(imagePath) {
            // Crear el modal si no existe
            let modalId = 'modalAmplificarImagen';
            let existingModal = document.getElementById(modalId);

            if (existingModal) {
                existingModal.remove();
            }

            // Crear el HTML del modal
            const modalHTML = `
                <div class="modal fade" id="${modalId}" tabindex="-1" role="dialog" aria-labelledby="modalAmplificarImagenLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAmplificarImagenLabel">
                                    <i class="fas fa-search-plus mr-2"></i>Vista Ampliada de Imagen
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center p-0">
                                <div class="position-relative">
                                    <img id="imagenAmpliada"
                                         src="${"{{ asset('storage') }}" + "/" + imagePath}"
                                         alt="Imagen ampliada"
                                         class="img-fluid w-100"
                                         style="max-height: 70vh; object-fit: contain; background: #f8f9fa;">
                                    <div class="position-absolute" style="top: 10px; right: 10px;">
                                        <button type="button" class="btn btn-sm btn-dark btn-zoom" onclick="toggleZoom()">
                                            <i class="fas fa-expand-arrows-alt" id="zoomIcon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <small class="text-muted mr-auto">
                                    <i class="fas fa-info-circle"></i>
                                    Click en la imagen o usa el botón de zoom para ver en tamaño completo
                                </small>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    <i class="fas fa-times mr-1"></i>Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Agregar el modal al DOM
            document.body.insertAdjacentHTML('beforeend', modalHTML);

            // Mostrar el modal
            $('#' + modalId).modal('show');

            // Función para alternar zoom
            window.toggleZoom = function() {
                const img = document.getElementById('imagenAmpliada');
                const icon = document.getElementById('zoomIcon');

                if (img.classList.contains('zoomed')) {
                    img.style.maxHeight = '70vh';
                    img.style.width = '100%';
                    img.style.cursor = 'zoom-in';
                    icon.className = 'fas fa-expand-arrows-alt';
                    img.classList.remove('zoomed');
                } else {
                    img.style.maxHeight = 'none';
                    img.style.width = 'auto';
                    img.style.cursor = 'zoom-out';
                    icon.className = 'fas fa-compress-arrows-alt';
                    img.classList.add('zoomed');
                }
            };

            // Permitir zoom al hacer click en la imagen
            document.getElementById('imagenAmpliada').onclick = function() {
                toggleZoom();
            };

            // Limpiar el modal cuando se cierre
            $('#' + modalId).on('hidden.bs.modal', function () {
                this.remove();
                delete window.toggleZoom;
            });
        }

        function mostrar_nuevas_imagenes_dent() {
            let url = "{{ ROUTE('profesional.mostrar_nuevas_imagenes_dental') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: 1000,
                    id_ficha_atencion: $('#id_fc').val(),
                    tipo:'odontop',
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#fotos_oped').empty();
                    $('#fotos_oped').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    function guardar_pieza_imagenes_rx(){

        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_especialidad = $('#id_especialidad').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_image_pre = $('#iden_image_pre').val();
        let id_image_post = $('#iden_image_post').val();
        let observaciones = $('#obs_result_biopsia').val();
        let seccion = 'odontop';

        let data = {
            _token: CSRF_TOKEN,
            observaciones:observaciones,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_especialidad: id_especialidad,
            id_ficha_atencion: id_ficha_atencion,
            id_image_pre: id_image_pre,
            id_image_post: id_image_post,
            seccion: seccion
        };

        let url = "{{ ROUTE('profesional.guardar_imagenes_dental_paciente') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    $('#contenedor_imagenes_odontop').empty();
                    $('#contenedor_imagenes_odontop').append(resp.v);
                    $('#id_imagenes_dental').val(resp.rx.id);
                    $('#id_image_pre').val(id_image_pre);
                    $('#id_image_post').val(id_image_post);

                    // ✅ Una vez que el envío de datos ha sido exitoso, procesamos la cola de imágenes PRE
                    if (myDropzonePre && myDropzonePre.getQueuedFiles().length > 0) {
                        console.log("🚀 Iniciando carga de imágenes PRE-tratamiento...");
                        // Desvinculamos el evento "queuecomplete" antes de procesar la cola
                        myDropzonePre.off("queuecomplete");

                        // Procesar la cola de imágenes
                        myDropzonePre.processQueue();  // Esto procesará la cola y subirá las imágenes

                        // Usamos un evento para esperar a que se complete la carga de imágenes
                        myDropzonePre.on("queuecomplete", function() {
                            // Una vez que la cola esté completa, podemos realizar más acciones si es necesario
                            console.log("✅ Carga de imágenes PRE completada.");
                        });
                    } else {
                        console.log("⚠️ No hay imágenes PRE para cargar o Dropzone no está inicializado.");
                    }

                    // ✅ Una vez que el envío de datos ha sido exitoso, procesamos la cola de imágenes POST
                    if (myDropzonePost && myDropzonePost.getQueuedFiles().length > 0) {
                        console.log("🚀 Iniciando carga de imágenes POST-tratamiento...");
                        // Desvinculamos el evento "queuecomplete" antes de procesar la cola
                        myDropzonePost.off("queuecomplete");

                        // Procesar la cola de imágenes
                        myDropzonePost.processQueue();  // Esto procesará la cola y subirá las imágenes

                        // Usamos un evento para esperar a que se complete la carga de imágenes
                        myDropzonePost.on("queuecomplete", function() {
                            // Una vez que la cola esté completa, podemos realizar más acciones si es necesario
                            console.log("✅ Carga de imágenes POST completada.");
                        });
                    } else {
                        console.log("⚠️ No hay imágenes POST para cargar o Dropzone no está inicializado.");
                    }
                }
            },
            error: function(error){
                console.log(error);
            }
        })


    }

     function recargar_imagenes_rx(seccion){
        let url = "{{ ROUTE('profesional.recargar_imagenes_dental_paciente') }}";
        let id_paciente = $('#id_paciente_fc').val();

        let data = {
            _token: CSRF_TOKEN,
            id_paciente: id_paciente,
            seccion: seccion
        }

        $.ajax({
            type:'post',
            data: data,
            url: url,
            success: function(resp){
                console.log(resp);
                $('#contenedor_imagenes_odontop').empty();
                $('#contenedor_imagenes_odontop').append(resp.v);


            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function eliminar_imagen_dental(id, path) {
            swal({
                    title: 'Advertencia',
                    text: '¿Está seguro de eliminar esta imagen?',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Aceptar'],
                    dangerMode: true,
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',

                })
                .then((confirm) => {
                    if (confirm) {
                        confirmar_eliminar_imagen_dental(id, path);
                    } else {
                        swal('Cancelado', 'La imagen no fue eliminada :(', 'error');
                    }
                });

        }

        function confirmar_eliminar_imagen_dental(id, path) {
            let url = "{{ route('profesional.eliminar_imagen_dental_paciente') }}";
            let data = {
                _token: CSRF_TOKEN,
                id: id,
                path: path,
                id_paciente: $('#id_paciente_fc').val()
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);

                    if (resp.mensaje == 'OK') {
                        let seccion = resp.seccion;

                        $('#contenedor_imagenes_odontop').empty();
                        $('#contenedor_imagenes_odontop').append(resp.v);


                    } else {
                        // $('#contenedor_imagenes_dent').empty();
                        // $('#contenedor_imagenes_dent').append(resp.mensaje);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }
</script>



@endsection
