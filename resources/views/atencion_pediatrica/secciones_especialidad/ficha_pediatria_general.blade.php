<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="pediatria_general" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_ped_gen-tab" data-toggle="tab" href="#atencion_ped_gen" role="tab" aria-controls="atencion_ped_gen" aria-selected="false">Ficha Atención</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ns-tab" data-toggle="tab" href="#ns" role="tab" aria-controls="ns" aria-selected="false">Control Niño Sano</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="vac-tab" data-toggle="tab" href="#vac" role="tab" aria-controls="vac" aria-selected="false">Vacunas</a>
                    </li>
                    {{--  <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="neo-tab" data-toggle="tab" href="#neo" role="tab" aria-controls="neo" aria-selected="false">Neonatología</a>
                    </li>  --}}
                </ul>
            </div>
			<!--ALERTA-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert"><strong>Solo el campo diagnóstico es obligatorio el resto es opcional</strong>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_ped_gen') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <!-- <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}"> -->
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    @if ($responsable)
                        <input type="hidden" name="id_responsable_fc" id="id_responsable_fc" value="{{ $responsable->id }}">
                        <input type="hidden" name="rut_responsable_fc" id="rut_responsable_fc" value="{{ $responsable->rut }}">
                    @else
                        <input type="hidden" name="id_responsable_fc" id="id_responsable_fc" value="{{ $paciente->id }}">
                        <input type="hidden" name="rut_responsable_fc" id="rut_responsable_fc" value="{{ $paciente->rut }}">
                    @endif
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">

                    @csrf

                    <div class="tab-content" id="ped-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_ped_gen" role="tabpanel" aria-labelledby="atencion_ped_gen-tab">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <h6 class="f-20 text-c-blue">Ficha de atención general</h6>
                                </div>
                            </div>
                            <!--FORMULARIOS-->
                            <div class="row">
                                <!--Formulario / Menor de edad-->
                                @include('atencion_pediatrica.generales.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                                <!--Motivo consulta-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="motivop">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivop_c" aria-expanded="false" aria-controls="motivop_c">
                                                Motivo de la consulta
                                            </button>
                                        </div>
                                        <div id="motivop_c" class="collapse show" aria-labelledby="motivop" data-parent="#motivop">
                                            <div class="card-body-aten-a shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                        <input type="text" class="form-control form-control-sm" name="descripcion_consulta" id="descripcion_consulta">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label-activo-sm">Antecedentes especialidad</label>
                                                        <input type="text" class="form-control form-control-sm" name="antec_especialidad_ped" id="antec_especialidad_ped">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--FIN MOTIVO CONSULTA-->
                                <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                <div class="col-sm-12 col-md-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="exam_esp">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                Examen especialidad
                                            </button>
                                        </div>
                                        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                            <div class="card-body-aten-a shadow-none">
                                                <div id="form-pediatria">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                                                {{-- <li class="nav-item"> --}}
                                                                    {{-- <a class="nav-link-aten text-reset active" id="exam-esp-tab" data-toggle="tab" href="#exam-esp-ft" role="tab" aria-controls="exam-esp-ft" aria-selected="true">Ficha tipo</a> --}}
                                                                {{-- </li> --}}
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="crec-des-tab" data-toggle="tab" href="#crec-des" role="tab" aria-controls="crec-des" aria-selected="true">Crecimiento y desarrollo</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="e-nut-tab" data-toggle="tab" href="#e-nut" role="tab" aria-controls="e-nut" aria-selected="false">Estado nutricional</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="e-segment-tab" data-toggle="tab" href="#e-segment" role="tab" aria-controls="e-segment" aria-selected="false">Exámen segmentario</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="in-obs-gen-tab" data-toggle="tab" href="#in-obs-gen" role="tab" aria-control="in-obs-gen" aria-selected="false">Observaciones generales</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="ev-nutricional">

                                                                <!--FICHA TIPO-->
                                                                {{-- <div class="tab-pane fade show active" id="exam-esp-ft" role="tabpanel" aria-labelledby="exam-esp-ft-tab"> --}}
                                                                    {{-- <div class="row"> --}}
                                                                        {{-- <div class="col-md-12"> --}}
                                                                            {{-- <h6 class="t-aten">Ficha tipo</h6> --}}
                                                                        {{-- </div> --}}
                                                                    {{-- </div> --}}
                                                                    {{-- <div class="form-row"> --}}
                                                                        {{-- <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6"> --}}
                                                                            {{-- <label class="floating-label-activo-sm">Carga ficha tipo</label> --}}
                                                                            {{-- <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');"> --}}
                                                                                {{-- <option value="">Seleccione</option> --}}
                                                                                {{-- @if(!empty($fichaTipo['ped_gen'])) --}}
                                                                                    {{-- @foreach ($fichaTipo['ped_gen'] as $ft ) --}}
                                                                                        {{-- <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option> --}}
                                                                                    {{-- @endforeach --}}
                                                                                {{-- @endif --}}
                                                                            {{-- </select> --}}
                                                                        {{-- </div> --}}
                                                                        {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> --}}
                                                                            {{-- <span id="descripcion_ficha_tipo_especialidad"></span> --}}
                                                                        {{-- </div> --}}
                                                                    {{-- </div> --}}
                                                                {{-- </div> --}}

                                                                <!--CRECIMIENTO Y DESARROLLO-->
                                                                <div class="tab-pane fade show active" id="crec-des" role="tabpanel" aria-labelledby="crec-des-tab">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">Crecimiento y desarrollo</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm">Descripción crecimiento y desarrollo</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_gral_crec_desarr" id="obs_gral_crec_desarr"></textarea>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                            {{-- descomentar cuando se tengan antecedentes de embarazon en gine obstetricia --}}
                                                                            {{-- <button type="button" class="btn btn-primary-light btn-sm mb-4" onclick="ant_parto ();"></i>Antec. Embarazo y Parto</button> --}}
                                                                            <button type="button" class="btn btn-primary-light btn-sm mb-4" onclick="tunner();"></i>G. de Tunner Femenino</button>
                                                                            <button type="button" class="btn btn-primary-light btn-sm mb-4" onclick="tunner_m();"></i>G. de Tunner Masculino</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--ESTADO NUTRICIONAL-->
                                                                <div class="tab-pane fade show" id="e-nut" role="tabpanel" aria-labelledby="e-nut-tab">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">Estado nutricional</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Estado nutricional</label>
                                                                                <select name="e_nutricional" data-titulo="Examen_nutricional" data-seccion="Estado Nutricional" id="e_nutricional" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_nutricional','div_examen_nutricional','obs_e_nutricional',2);">
                                                                                    <option selected  value="1">Normal</option>
                                                                                    <option value="2">Anormal</option>
                                                                                    <option value="3">Ex. No Realizado</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_examen_nutricional" style="display:none;">
                                                                                <label class="floating-label-activo-sm">Estado nutricional <i>(describir)</i></label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="obs. Examen_nutricional" data-seccion="Estado nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_nutricional" id="obs_e_nutricional"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Vacunas</label>
                                                                                <select name="e_vacunas" id="e_vacunas" data-titulo="Vacunas" data-seccion="Estado Nutricional" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_vacunas','div_e_vacunas','obs_e_vacunas',2);">
                                                                                    <option selected value="1">Al día</option>
                                                                                    <option value="2">Atrasadas</option>
                                                                                    <option value="3">No Informadas</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_e_vacunas" style="display:none;">
                                                                                <label class="floating-label-activo-sm">Vacunas <i>(describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  data-titulo="obs. Vacunas" data-seccion="Estado nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_vacunas" id="obs_e_vacunas"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Obs. Estado nutricional y vacunas</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Estado nutricional y vacunas" data-seccion="Estado nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_nutricional_vacunas" id="obs_ex_nutricional_vacunas"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--EXÁMEN SEGMENTARIO-->
                                                                <div class="tab-pane fade show" id="e-segment" role="tabpanel" aria-labelledby="e-segment-tab">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">Examen segmentario</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Piel</label>
                                                                                <select name="e_piel" id="e_piel" data-titulo="Piel" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_piel','div_e_piel','obs_e_piel',2)">
                                                                                    <option selected value="1">Normal</option>
                                                                                    <option value="2">Anormal Describir</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_e_piel" style="display:none">
                                                                                <label class="floating-label-activo-sm">Describir examen de piel</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Cabeza y cuello</label>
                                                                                <select name="e_cabcuello" id="e_cabcuello" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_cabcuello','div_e_cabcuello','obs_e_cabcuello',3)">
                                                                                    <option selected value="1">Normal</option>
                                                                                    <option value="2">No Examinado</option>
                                                                                    <option value="3">Otro Describir</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_e_cabcuello" style="display:none">
                                                                                <label class="floating-label-activo-sm">Describir examen de cuello</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Cabeza y Cuello" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_cabcuello" id="obs_e_cabcuello"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Tórax</label>
                                                                                <select name="e_torax" id="e_torax" data-titulo="Torax" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_torax','div_e_torax','obs_e_torax',2);">
                                                                                    <option selected value="1">Normal</option>
                                                                                    <option value="2">Alterado Describir</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_e_torax" style="display:none">
                                                                                <label class="floating-label-activo-sm">Describir examen de tórax</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Torax" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_torax" id="obs_e_torax"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Abdomen</label>
                                                                                <select name="e_abdomen" id="e_abdomen" data-titulo="Abdomen" data-seccion="Examen Segmentario"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_abdomen','div_e_abdomen','obs_e_abdomen',2);">
                                                                                    <option selected value="1">Normal</option>
                                                                                    <option value="2">Anormal(describir)</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_e_abdomen" style="display:none">
                                                                                <label class="floating-label-activo-sm">Examen de abdomen</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Abdomen" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_abdomen" id="obs_e_abdomen"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Musculo-Esquelético</label>
                                                                                <select name="e_muscesq" id="e_muscesq" data-titulo="Musculo-Esquelético" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_muscesq','div_e_muscesq','obs_e_muscesq',2);">
                                                                                    <option selected value="1">Normal</option>
                                                                                    <option value="2">Anormal</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_e_muscesq" style="display:none">
                                                                                <label class="floating-label-activo-sm">Examen Musculo-Esquelético</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Musculo-Esquelético" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_muscesq" id="obs_e_muscesq"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Órganos de los sentidos</label>
                                                                                <select name="e_o_sent" id="e_o_sent" data-titulo="O-Sentidos" class="form-control form-control-sm"data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('e_o_sent','div_e_o_sent','obs_e_o_sent',2);">
                                                                                    <option selected value="1">Normal</option>
                                                                                    <option value="2">Anormal</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_e_o_sent" style="display:none">
                                                                                <label class="floating-label-activo-sm">Examen órganos de los sentidos</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. O-Sentidos" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_o_sent" id="obs_e_o_sent"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Observaciones Ex. Segmentario</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Ex Segmentario" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_segmentario" id="obs_ex_segmentario"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--OBSERVACIONES GENERALES-->
                                                                <div class="tab-pane fade show" id="in-obs-gen" role="tabpanel" aria-labelledby="in-obs-gen-tab">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">Observaciones generales</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-9">
                                                                            <label class="floating-label-activo-sm">Observaciones examen especialidad</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ex_pedgen" id="obs_ex_pedgen"></textarea>
                                                                        </div>
                                                                        {{-- <div class="form-group col-md-3"> --}}
                                                                            {{-- <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="abrir_modal_guardar_tipo('form-ped_gen','registro_f_t_detalle','ped_gen');"><i class="feather icon-save"></i> Guardar nueva ficha tipo</button> --}}
                                                                        {{-- </div> --}}
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

                                <!--SIGNOS VITALES Y OTROS-->
                                        @include('general.secciones_ficha.signos_vitales')
										<!--CRONICOS / GES / CONFIDENCIAL -->
                                        @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')
                                <!--DIAGNÓSTICO-->
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
                                                            <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado,eno_diagnositico_confirmado" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Indicaciones</label>
                                                        <input type="text" class="form-control form-control-sm" name="ind_orl" id="ind_orl">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,descripcion_cie_esp,eno_diagnostico_cie" name="descripcion_cie" id="descripcion_cie" value="" onchange="cargarIgual('descripcion_cie')">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,id_descripcion_cie_esp,eno_id_diagnostico_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="" onchange="cargarIgual('id_descripcion_cie')">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->

                        <!--ATENCIÓN NIÑO SANO-->
                        @include('general.secciones_ficha.pediatria.controlninosano')

                        <!--ATENCIÓN VACUNAS-->
                        @include('general.secciones_ficha.pediatria.vacunas')

                        {{--  div de botones  --}}
                        <div class="card">
                            <div class="card-body">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                            </div>
                        </div>

                        <!--GUARDAR O IMPRIMIR FICHA-->
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                               <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
								<input type="submit" class="btn btn-purple mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script>

        $('#btn_recien_nacido').click(function () {
            $('#recien_nacido').toggle();
        });

        /** Datos recien nacido **/
        $('#btn_vac_part_puerp').click(function () {
            $('#vac_part_puerp').toggle();
        });

        /** Datos recien nacido **/
        $('#btn_extamiz').click(function () {
            $('#extamiz').toggle();
        });
		/** CARGAR mensaje */
		$('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es  opcional');
		$('#mensaje_ficha').show();
		setTimeout(function(){
			$('#mensaje_ficha').hide();
		}, 5000);
        $(document).ready(function() {

            $("#descripcion_cie_esp").autocomplete({
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
                    $('#descripcion_cie_esp').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie_esp').val(ui.item.value); // save selected id to input
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

        })

        function cargarIgual(input){

            var actual = $('#'+input);
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
            $("#btn_registro_ficha_tipo").unbind();

            if(tipo == 'ped_gen')
            {
                $('#btn_registro_ficha_tipo').click(function(){
                    guardar_tipo_ficha_ped_gen();
                });
            }
            $('#modal_registrar_ficha_tipo').modal('show');

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

        function cambiar_div(mostrar, ocultar, label, textarea){
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }

        function guardar_tipo_ficha_ped_gen()
        {
            var registro_f_t_nombre = $('#registro_f_t_nombre').val();
            var registro_f_t_descripcion = $('#registro_f_t_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_nombre = registro_f_t_nombre;
            data.registro_f_t_descripcion = registro_f_t_descripcion;

            $('#registro_f_t_detalle').find('input,textarea').each(function(key, elemento){
                // console.log($(elemento).attr('id'));
                // console.log($(elemento).val());
                // console.log($(elemento).prop('nodeName'));
                // console.log('*******');

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_ped_gen') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    nombre : data.registro_f_t_nombre,
                    descripcion : data.registro_f_t_descripcion,
                    e_nutricional : data.modal_agregar_tipo_e_nutricional,
                    obs_e_nutricional : data.observaciones_obs_e_nutricional,
                    e_vacunas : data.modal_agregar_tipo_e_vacunas,
                    obs_e_vacunas : data.observaciones_obs_e_vacunas,
                    obs_ex_nutricional_vacunas : data.observaciones_obs_ex_nutricional_vacunas,
                    e_piel : data.modal_agregar_tipo_e_piel,
                    obs_e_piel : data.observaciones_obs_e_piel,
                    e_cabcuello : data.modal_agregar_tipo_e_cabcuello,
                    obs_e_cabcuello : data.observaciones_obs_e_cabcuello,
                    e_torax : data.modal_agregar_tipo_e_torax,
                    obs_e_torax : data.observaciones_obs_e_torax,
                    e_abdomen : data.modal_agregar_tipo_e_abdomen,
                    obs_e_abdomen : data.observaciones_obs_e_abdomen,
                    e_muscesq : data.modal_agregar_tipo_e_muscesq,
                    obs_e_muscesq : data.observaciones_obs_e_muscesq,
                    e_o_sent : data.modal_agregar_tipo_e_o_sent,
                    obs_e_o_sent : data.observaciones_obs_e_o_sent,
                    obs_ex_segmentario : data.observaciones_obs_ex_segmentario,
                    obs_ex_pedgen : data.observaciones_obs_ex_pedgen,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#registro_f_t_nombre').val('');
                    $('#registro_f_t_descripcion').val('')
                    $('#registro_f_t_detalle').html('');
                    $('#modal_registrar_ficha_tipo').modal('hide');
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

        function cargar_info_ficha_tipo_ped_gen(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-ped_gen').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('e_nutricional','div_examen_nutricional','obs_e_nutricional',2);
                evaluar_para_carga_detalle('e_vacunas','div_e_vacunas','obs_e_vacunas',2);
                evaluar_para_carga_detalle('e_piel','div_e_piel','obs_e_piel',2);
                evaluar_para_carga_detalle('e_cabcuello','div_e_cabcuello','obs_e_cabcuello',3);
                evaluar_para_carga_detalle('e_torax','div_e_torax','obs_e_torax',2);
                evaluar_para_carga_detalle('e_abdomen','div_e_abdomen','obs_e_abdomen',2);
                evaluar_para_carga_detalle('e_muscesq','div_e_muscesq','obs_e_muscesq',2);
                evaluar_para_carga_detalle('e_o_sent','div_e_o_sent','obs_e_o_sent',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_ped_gen') }}";
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
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        $('#'+index).val(value);
                    });

                    evaluar_para_carga_detalle('e_nutricional','div_examen_nutricional','obs_e_nutricional',2);
                    evaluar_para_carga_detalle('e_vacunas','div_e_vacunas','obs_e_vacunas',2);
                    evaluar_para_carga_detalle('e_piel','div_e_piel','obs_e_piel',2);
                    evaluar_para_carga_detalle('e_cabcuello','div_e_cabcuello','obs_e_cabcuello',3);
                    evaluar_para_carga_detalle('e_torax','div_e_torax','obs_e_torax',2);
                    evaluar_para_carga_detalle('e_abdomen','div_e_abdomen','obs_e_abdomen',2);
                    evaluar_para_carga_detalle('e_muscesq','div_e_muscesq','obs_e_muscesq',2);
                    evaluar_para_carga_detalle('e_o_sent','div_e_o_sent','obs_e_o_sent',2);

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
    </script>

    <!--ALERTA DE ATENCION-->
    <script>
        window.setTimeout(function() {
            $(".alert-atencion").fadeTo(500, 0).slideUp(600, function(){
                $(this).remove();
            });
        }, 5000);
     </script>
