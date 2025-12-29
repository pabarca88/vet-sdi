<style type="text/css">
    .ng_esp {
        /* Common */
    font : 13px 'Wingdings 3';
        color : #0000ff;
        width: 60px; background-color: #f6faf9; color: #FF0000;text-align:center; font-weight: bold; font-size: x-large;
        background-color: #f6faf9;
        text-align:center;
        font-weight: bold;
        display: block;
        width: 100%;
        padding: 0.4rem 0.5rem 0.3rem 0.5rem!important;
        font-size: 1.0rem;
        font-weight: 400;
        line-height: 1.5;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 3px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    @font-face {
        font-family: 'Wingdings 3';

    }
</style>


<div style=" display: flex; flex-direction: row;">

    @include('general.secciones_ficha.video_llamada.seccion_jaas_container')

    <div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
        <div class="col-md-12 py-0 px-2">
            <div class="row mx-0">
                <div class="col-sm-12 col-md-12">
                    <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                        <li class="nav-item-secciones">
                            <a class="nav-secciones active text-uppercase" id="atencion_orl-tab" data-toggle="tab" href="#atencion_orl" role="tab" aria-controls="atencion_orl" aria-selected="true">Atención especialidad</a>
                        </li>
                        <li class="nav-item-secciones">
                            <a class="nav-secciones text-uppercase" id="rinofibro-tab" data-toggle="tab" href="#rinofibro" role="tab" aria-controls="rinofibro" aria-selected="false">Rinofibrolaringoscopía</a>
                        </li>
                        <li class="nav-item-secciones">
                            <a class="nav-secciones text-uppercase" id="presupuesto-mascota-tab" data-toggle="tab" href="#presupuesto-mascota" role="tab" aria-controls="presupuesto-mascota" aria-selected="false">Presupuestos</a>
                        </li>
                        {{--  <li class="nav-item-secciones">
                            <a class="nav-secciones text-uppercase" id="ocho_par-tab" data-toggle="tab" href="#ocho_par" role="tab" aria-controls="ocho_par" aria-selected="false">8° par</a>
                        </li>  --}}
                    </ul>
                </div>
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
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <form action="{{ route('fichaAtencion.registrar_ficha_orl') }}" method="POST">
                        <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                        <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                        <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                        <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                        <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                        <input type="hidden" name="mostrarpdf" id="mostrarpdf" value="0">
                        <input type="hidden" name="tipopdf" id="tipopdf" value="0">
                        <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                        @csrf
                        <div class="tab-content" id="orl-contenido">
                            <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                            <div class="tab-pane fade show active" id="atencion_orl" role="tabpanel" aria-labelledby="atencion_orl-tab">
                                {{--  <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-20 text-c-blue mb-2">Ficha de atención general</h6>
                                    </div>
                                </div>  --}}
                                <div class="row">
                                    <!--FORMULARIOS-->

                                    <!--Formulario / Menor de edad-->
                                    @include('general.secciones_ficha.seccion_menor', ['tipo_ficha' => "1"])
                                    <!--Cierre: Formulario / Menor de edad-->
                                    @include('general.secciones_ficha.motivo')
                                    <!--MOTIVO CONSULTA-->
                                    {{-- <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="motivo">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                    Motivo de la consulta y Examen físico general
                                                </button>
                                            </div>
                                            <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                                <div class="card-body-aten-a">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                            <input type="text" class="form-control form-control-sm" name="motivo" id="motivo" placeholder="{{ $placeholder_motivo_consulta }}">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                            <input type="text" class="form-control form-control-sm" name="antecedentes" id="antecedentes">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                            <label class="floating-label-activo-sm">Examen de la Especialidad</label>
                                                            <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="{{ $placeholder_examen_fisico }}"></textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!--EXAMEN ESPECIALIDAD - DETALLES-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="exam_esp_orl">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_orl_c" aria-expanded="false" aria-controls="exam_esp_orl_c">
                                                    Detalle Examen Especialidad
                                                </button>
                                            </div>
                                            <div id="exam_esp_orl_c" class="collapse" aria-labelledby="exam_esp_orl" data-parent="#exam_esp_orl">
                                                <div class="card-body-aten-a">
                                                    <div id="form-orl-adulto">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-2" id="orl_adulto" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active" id="orl_oido_tab" data-toggle="tab" href="#orl_oido" role="tab" aria-controls="orl_oido" aria-selected="true">Oídos</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="ex_nariz-tab" data-toggle="tab" href="#orl_ex_nariz" role="tab" aria-controls="orl_ex_nariz" aria-selected="true">Nariz</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="orl_flaringe-tab" data-toggle="tab" href="#orl_flaringe" role="tab" aria-controls="orl_flaringe" aria-selected="true">Faringo-laringe</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="cuello-tab" data-toggle="tab" href="#cuello" role="tab" aria-controls="cuello" aria-selected="true">Cuello-Gl.anexas-otros</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="tab-content" id="orl_adulto">
                                                                    <!--OIDO-->
                                                                    <div class="tab-pane fade show active" id="orl_oido" role="tabpanel" aria-labelledby="orl_oido_tab">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                    <div class="tab-pane fade show active" id="audicion_gen" role="tabpanel" aria-labelledby="audicion_gen-tab">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <h6 class="t-aten">Oídos</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="obs_ex_audicion">Audición</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Audición" data-seccion="Oídos" data-tipo="oido" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="audicion" id="audicion" placeholder="USO DE AUDÍFONOS, APRECIACIÓN SUBJETIVA DE AUDICIÓN"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="ex_oido">Examen Físico de oídos</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Físico de oídos" data-seccion="Oídos" data-tipo="oido" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="ex_oido" id="ex_oido"placeholder="EXAMEN CLÍNICO DE OÍDOS" ></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="biomicroscopia">Biomicroscopía</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Biomicroscopía" data-seccion="Oídos" data-tipo="oido" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="biomicroscopia" id="biomicroscopia" placeholder="BIOMICROSCOPÍA"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="vestibular">Examen Vestibular</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Vestibular" data-seccion="Oídos" data-tipo="oido" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="vestibular" id="vestibular" placeholder="EXAMEN VESTIBULAR" ></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="o_resultado_ex"> Resultado Exámenes</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Exámenes" data-seccion="Oídos" data-tipo="oido" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="o_resultado_ex" id="o_resultado_ex" placeholder="RESULTADO DE EXAMENES"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="mt-1">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Cargar ficha tipo oído</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_oido" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad_oido','descripcion_ficha_tipo_especialidad_oido', 'form-orl-oido');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['oido']))
                                                                                            @foreach ($fichaTipo['oido'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                                                <span id="descripcion_ficha_tipo_especialidad_oido"></span>
                                                                            </div>

                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mb-3">
                                                                                <button type="button" class="btn btn-outline-primary btn-xs btn-block" onclick="abrir_modal_guardar_tipo('form-orl-oido','registro_f_t_orl_detalle','oido');"><i class="feather icon-save"></i> Guardar nueva ficha tipo Oído</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--EXAMEN  NARIZ-->
                                                                    <div class="tab-pane fade show" id="orl_ex_nariz" role="tabpanel" aria-labelledby="orl_ex_nariz_tab">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">Nariz</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                    <div class="tab-pane fade show active" id="exnasal_grl" role="tabpanel" aria-labelledby="exnasal_grl-tab">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="nariz_ext"> Examen Externo</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Externo" data-seccion="Nariz" data-tipo="nariz" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="nariz_ext" id="nariz_ext" placeholder="FORMA, PIÉL DESVIACIONES, APRECIACIÓN RESPIRATORIA"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="f_nasales">Examen Fosas Nasales</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosas Nasales" data-seccion="Nariz" data-tipo="nariz"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="f_nasales" id="f_nasales"placeholder="EXAMEN CLÍNICO DE FOSAS NASALES" ></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="n_resultado_ex"> Resultado Examenes</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examenes" data-seccion="Nariz" data-tipo="nariz"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="n_resultado_ex" id="n_resultado_ex" placeholder="RESULTADO DE EXAMENES"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                   </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="mt-1">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Cargar ficha tipo Nariz</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_nariz" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad_nariz','descripcion_ficha_tipo_especialidad_nariz', 'form-orl-nariz');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['nariz']))
                                                                                            @foreach ($fichaTipo['nariz'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                                                <span id="descripcion_ficha_tipo_especialidad_nariz"></span>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                                                                <button type="button" class="btn btn-outline-primary btn-xs btn-block mb-3" onclick="abrir_modal_guardar_tipo('form-orl-nariz','registro_f_t_orl_detalle','nariz');"><i class="feather icon-save"></i> Guardar nueva ficha tipo Nariz</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--EXAMEN  FARIGO-LARIGE-->
                                                                    <div class="tab-pane fade show" id="orl_flaringe" role="tabpanel" aria-labelledby="orl_flaringe-tab">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">Faringo - Laringe</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                    <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="boca"> Boca en general</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Boca" data-seccion="Boca-Faringo-laringe" data-tipo="boca_far_laringe" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="boca" id="boca" placeholder="BOCA,LENGUA DENTADURA ENCIAS,ETC"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="faringe"> Examen Faríngeo</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Faríngeo" data-seccion="Boca-Faringo-laringe" data-tipo="boca_far_laringe" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="faringe" id="faringe"placeholder="EXAMEN CLÍNICO DE FOSAS FARINGE" ></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="laringe">Examen Laríngeo</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Laríngeo" data-seccion="Boca-Faringo-laringe" data-tipo="boca_far_laringe"rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="laringe" id="laringe"placeholder="EXAMEN CLÍNICO DE LARIGE DISFONÍA" ></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="fl_resultado_ex">Resultado Exámenes</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examenes" data-seccion="Boca-Faringo-laringe" data-tipo="boca_far_laringe" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="fl_resultado_ex" id="fl_resultado_ex" placeholder="RESULTADO DE EXAMENES"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="mt-1">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Cargar ficha tipo Faringo-Laringe</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_of" onchange="cargar_info_ficha_tipo_oft_fo('select_ficha_tipo_especialidad_of','descripcion_ficha_tipo_especialidad_of');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['faringe']))
                                                                                            @foreach ($fichaTipo['faringe'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                                                <span id="descripcion_ficha_tipo_especialidad_faringe"></span>
                                                                            </div>

                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                                                                <button type="button" class="btn btn-outline-primary btn-xs btn-block mb-3" onclick="abrir_modal_guardar_tipo('form-orl-faringe','registro_f_t_orl_detalle','faringe');"><i class="feather icon-save"></i> Guardar nueva ficha tipo Faringo-Laringe</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--EXAMEN CUELLO-->
                                                                    <div class="tab-pane fade show" id="cuello" role="tabpanel" aria-labelledby="cuello-tab">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">Cuello Glándulas Anexas y otros</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                    <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="cuello_grl"> Examen general del cuello</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen general del cuello" data-seccion="Cuello" data-tipo="cuello" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="cuello_grl" id="cuello_grl" placeholder="PIÉL ADENOPATÍAS PUNTOS DOLOROSOS COL CERVICAL"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="masas"> Examen Masas </label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Masas" data-seccion="Cuello" data-tipo="cuello"rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="masas" id="masas"placeholder="EXAMEN CLÍNICO DE MASAS CERVICALES" ></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="glandulas">Examen Glándulas Anexas</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Glándulas Anexas" data-seccion="Cuello" data-tipo="cuello" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="glandulas" id="glandulas"placeholder="EXAMEN CLÍNICO DE GLANDULAS" ></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm"for="c_resultado_ex"> Resultado Exámenes</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Exámenes" data-seccion="Cuello" data-tipo="cuello" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="c_resultado_ex" id="c_resultado_ex" placeholder="RESULTADO DE EXAMENES"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="mt-1">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo Cuello y otros</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_cuello" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad_cuello','descripcion_ficha_tipo_especialidad_cuello', 'form-orl-cuello');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['cuello']))
                                                                                            @foreach ($fichaTipo['cuello'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                                                <span id="descripcion_ficha_tipo_especialidad_cuello"></span>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                                                                <button type="button" class="btn btn-outline-primary btn-xs btn-block mb-3" onclick="abrir_modal_guardar_tipo('form-orl-cuello','registro_f_t_orl_detalle','cuello');"><i class="feather icon-save"></i> Guardar nueva ficha tipo Cuello y otros</button>
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

                                    <!--Formulario / Signos vitales y otros-->
                                    {{--  @include('general.secciones_ficha.signos_vitales')  --}}
                                    <!--Cierre: Formulario / Signos vitales y otros-->

                                     <!--CRONICOS / GES / CONFIDENCIAL -->
                                    @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')
                                    <!--Diagnóstico-->

                                    <!--HOSPITALIZACION-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="hospitalizar_paciente">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#hospitalizar_paciente-c" aria-expanded="false" aria-controls="hospitalizar_paciente-c">
                                                   Hospitalizar paciente y Control post quirúrgico
                                                </button>
                                            </div>
                                            <div id="hospitalizar_paciente-c" class="collapse" aria-labelledby="hospitalizar_paciente" data-parent="#hospitalizar_paciente">
                                                <div class="card-body-aten-a shadow-none">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="pcte_qx" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="hosp_pcte_tab" data-toggle="tab" href="#hosp_pcte" role="tab" aria-controls="hosp_pcte" aria-selected="true">Hospitalizar</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="cont_operatorio-tab" data-toggle="tab" href="#cont_operatorio" role="tab" aria-controls="cont_operatorio" aria-selected="true">Control Post Quirúrgico</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="pcte_qx">
                                                                <div class="tab-pane fade show active" id="hosp_pcte" role="tabpanel" aria-labelledby="hosp_pcte_tab">
                                                                    @include('general.hospitalizacion.hospitalizar')
                                                                </div>
                                                                <div class="tab-pane fade show" id="cont_operatorio" role="tabpanel" aria-labelledby="cont_operatorio_tab">
                                                                    @include('general.secciones_ficha.cirugia_control.control_cirugia_general1')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Diagnóstico-->
                                    @include('general.secciones_ficha.diagnostico')
                                    <!--Diagnóstico-->

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
                                </div>
                                <div class="row">
                                    <!--GUARDAR O IMPRIMIR FICHA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="row mb-3">
                                            <div class="col-md-12 text-center">
                                                <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                                <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->

                            </div>
                            <!--INFORME RINOFIBROLARINGOSCOPÍA-->
                            <div class="tab-pane fade" id="rinofibro" role="tabpanel" aria-labelledby="rinofibro-tab">
                                <div class="row">
                                    <div class="col-md-12 mb-0">
                                        <h6 class="f-18 text-c-blue mb-2">Informe Rinofibrolaringoscopía</h6>
                                    </div>
                                </div>
                                <div class="div_form_examen_rfl">
                                    {!! $examen !!}
                                </div>
                                <!-- GUARDAR EXAMEN -->
                                <div class="col-md-12 text-center mb-3">
                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Examen e ir a su Agenda">
                                    <button type="button" class="btn btn-danger mt-1" onclick="visualizar_pdf_examen('rfl');">Ver Examen PDF</button>
                                </div>
                                <!-- CIERRE: GUARDAR EXAMEN -->
                            </div>
                            <div class="tab-pane fade" id="presupuesto-mascota" role="tabpanel" aria-labelledby="presupuesto-mascota-tab">
                                <div class="row">
                                    <div class="col-md-12 mb-0">
                                        <h6 class="f-18 text-c-blue mb-2">Presupuesto mascota (ejemplo)</h6>
                                    </div>
                                </div>
                                <div class="card-a">
                                    <div class="card-body-aten-a">
                                        <input type="hidden" id="presupuesto_mascota_id_paciente" value="{{ $paciente->id }}">
                                        <input type="hidden" id="presupuesto_mascota_id_profesional" value="{{ $profesional->id }}">
                                        <input type="hidden" id="presupuesto_mascota_id_ficha_atencion" value="{{ $id_ficha_atencion }}">
                                        <input type="hidden" id="presupuesto_mascota_id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Fecha</label>
                                                <input type="date" class="form-control form-control-sm" id="presupuesto_mascota_fecha">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Fecha control</label>
                                                <input type="date" class="form-control form-control-sm" id="presupuesto_mascota_fecha_control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">Estado</label>
                                                <input type="number" class="form-control form-control-sm" id="presupuesto_mascota_estado">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">Aprobado</label>
                                                <input type="number" class="form-control form-control-sm" id="presupuesto_mascota_aprobado">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="floating-label-activo-sm">Datos de atención</label>
                                                <textarea class="form-control form-control-sm" rows="3" id="presupuesto_mascota_datos"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Otros</label>
                                                <input type="text" class="form-control form-control-sm" id="presupuesto_mascota_otros">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                <input type="text" class="form-control form-control-sm" id="presupuesto_mascota_observaciones">
                                            </div>
                                            <div class="col-md-12 text-center mb-3">
                                                <button type="button" class="btn btn-info" id="btn_guardar_presupuesto_mascota">Guardar presupuesto</button>
                                            </div>
                                            <div class="col-md-12">
                                                <div id="presupuesto_mascota_resultado" class="text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--INFORME EXAMEN DEL 8° PAR CRANEANO-->
                            {{--  <div class="tab-pane fade" id="ocho_par" role="tabpanel" aria-labelledby="ocho_par-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                         <h6 class="f-18 text-c-blue mb-2">Informe examen del 8° par craneano</h6>
                                    </div>
                                </div>
                                <div class="row div_form_examen_ocho_par">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="id_general">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#id_general_c" aria-expanded="false" aria-controls="id_general_c">
                                                    Identificación del paciente
                                                </button>
                                            </div>
                                            <div id="id_general_c" class="collapse show" aria-labelledby="id_general" data-parent="#id_general">
                                                <div class="card-body-aten-a">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Fecha de examen</label>
                                                            <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                                            <label class="floating-label-activo-sm">Examinador</label>
                                                            <input type="text" class="form-control form-control-sm" name="profesional" id="profesional">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                                            <label class="floating-label-activo-sm">Derivado por:</label>
                                                            <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Nombre paciente</label>
                                                            <input type="text" class="form-control form-control-sm" name="Nombre_pcte" id="Nombre_pcte">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Edad</label>
                                                            <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Rut</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                        </div>
                                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Dirección</label>
                                                            <input type="text" class="form-control form-control-sm" name="direccion" id="direccion">
                                                        </div>
                                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Email</label>
                                                            <input type="text" class="form-control form-control-sm" name="email" id="email">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                            <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                            <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="ex_equilibrio">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ex_equilibrio_c" aria-expanded="false" aria-controls="ex_equilibrio_c">
                                                    Examen del equilibrio
                                                </button>
                                            </div>
                                            <div id="ex_equilibrio_c" class="collapse show" aria-labelledby="ex_equilibrio" data-parent="#ex_equilibrio">
                                                <div class="card-body-aten-a">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <!--Equilibrio estático-->
                                                            <div class="card-informacion">
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                            <h6 class="t-aten">Equilibrio estático</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label-activo-sm">Prueba de Romberg</label>
                                                                            <input type="text" class="form-control form-control-sm" name="romberg" id="romberg">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label-activo-sm">Prueba de Romberg Sensibilizada</label>
                                                                            <input type="text" class="form-control form-control-sm" name="romberg_sens" id="romberg_sens">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Equilibrio cinético-->
                                                            <div class="card-informacion">
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                            <h6 class="t-aten">Equilibrio Cinético</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">Marcha con ojos abiertos</label>
                                                                            <input type="text" class="form-control form-control-sm" name="marcha_ojo_ab" id="marcha_ojo_ab">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">Prueba de Babinsky-weil </label>
                                                                            <input type="text" class="form-control form-control-sm" name="babinsky" id="babinsky">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">Prueba de Romberg Barre</label>
                                                                            <input type="text" class="form-control form-control-sm" name="romberg_barre" id="romberg_barre">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">Prueba de Untenberg-Fakuda</label>
                                                                            <input type="text" class="form-control form-control-sm" name="untenberg_fak" id="untenberg_fak">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Equilibrio segmentario-->
                                                            <div class="card-informacion">
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                            <h6 class="t-aten">Equilibrio Segmentário</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm">Prueba de la Indicación</label>
                                                                            <input type="text" class="form-control form-control-sm" name="indicacion" id="indicacion">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Equilibrio cerebelo-->
                                                            <div class="card-informacion">
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                            <h6 class="t-aten">Cerebelo</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm">Temblor intencional</label>
                                                                            <input type="text" class="form-control form-control-sm" name="temblor" id="temblor">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm">Dismetría</label>
                                                                            <input type="text" class="form-control form-control-sm" name="dismetria" id="dismetria">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm">Disinergia</label>
                                                                            <input type="text" class="form-control form-control-sm" name="discinergia" id="discinergia">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm">Disdiadococinesia</label>
                                                                            <input type="text" class="form-control form-control-sm" name="disdiadoco" id="disdiadoco">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm">Hipotonía</label>
                                                                            <input type="text" class="form-control form-control-sm" name="hipotonia" id="hipotonia">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm">Otras pruebas</label>
                                                                            <input type="text" class="form-control form-control-sm" name="otras_pruebas" id="otras_pruebas">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                            <label class="floating-label-activo-sm">Observaciones a las pruebas de equilibrio</label>
                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="observaciones_equilibrio" id="observaciones_equilibrio" placeholder="OBSERVACIONES GENERALES, SINTOMATOLOGIA REACCIONES, ETC."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Nistagmo espontáneo-->
                                                            <div class="card-informacion">
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                            <h6 class="t-aten">Nistagmo espontáneo</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                            <table class="rounded" style="border: 1px solid #ced4da; width:100%; padding-bottom: 10px;">
                                                                                <tr>
                                                                                    <td class="text_center" colspan="3">Sin Fijación Ocular</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="text_center">
                                                                                        <select id="ng_1" class="ng_esp" size="1" name="ng_1">
                                                                                            <option value="1"> p</option>
                                                                                            <option value="2"> g</option>
                                                                                            <option value="3"> f</option>
                                                                                            <option value="4"> i</option>
                                                                                            <option value="5"> h</option>
                                                                                            <option value="6"> j</option>
                                                                                            <option value="7"> k</option>
                                                                                            <option value="8"> m</option>
                                                                                            <option value="9"> l</option>
                                                                                            <option value="10"> n</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <select id="ng_2" class="ng_esp" size="1" name="ng_2">
                                                                                            <option value="1"> t</option>
                                                                                            <option value="2"> g</option>
                                                                                            <option value="3"> f</option>
                                                                                            <option value="4"> i</option>
                                                                                            <option value="5"> h</option>
                                                                                            <option value="6"> j</option>
                                                                                            <option value="7"> k</option>
                                                                                            <option value="8"> m</option>
                                                                                            <option value="9"> l</option>
                                                                                            <option value="10"> n</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="text_center">
                                                                                        <select id="ng_3" class="ng_esp" size="1" name="ng_3">
                                                                                            <option value="1"> </option>
                                                                                            <option value="2"> g</option>
                                                                                            <option value="3"> f</option>
                                                                                            <option value="4"> i</option>
                                                                                            <option value="5"> h</option>
                                                                                            <option value="6"> j</option>
                                                                                            <option value="7"> k</option>
                                                                                            <option value="8"> m</option>
                                                                                            <option value="9"> l</option>
                                                                                            <option value="10"> n</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="text_left">
                                                                                        <select id="ng_4" class="ng_esp" size="1" name="ng_4">
                                                                                            <option value="1"> u</option>
                                                                                            <option value="2"> g</option>
                                                                                            <option value="3"> f</option>
                                                                                            <option value="4"> i</option>
                                                                                            <option value="5"> h</option>
                                                                                            <option value="6"> j</option>
                                                                                            <option value="7"> k</option>
                                                                                            <option value="8"> m</option>
                                                                                            <option value="9"> l</option>
                                                                                            <option value="10"> n</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                    <td class="text_center">
                                                                                        <select id="ng_5" class="ng_esp" size="1" name="ng_5">
                                                                                            <option value="1"> q</option>
                                                                                            <option value="2"> g</option>
                                                                                            <option value="3"> f</option>
                                                                                            <option value="4"> i</option>
                                                                                            <option value="5"> h</option>
                                                                                            <option value="6">j</option>
                                                                                            <option value="7"> k</option>
                                                                                            <option value="8"> m</option>
                                                                                            <option value="9"> l</option>
                                                                                            <option value="10"> n</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                            <table class="pb-2 rounded" style="border: 1px solid  #ced4da; width:100%">
                                                                                <tr>
                                                                                    <td class="text_center" colspan="3">Con fijación Ocular</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="text_center">
                                                                                        <select id="ng_6" class="ng_esp" size="1" name="ng_6">
                                                                                            <option value="1"> p</option>
                                                                                            <option value="2"> g</option>
                                                                                            <option value="3"> f</option>
                                                                                            <option value="4"> i</option>
                                                                                            <option value="5"> h</option>
                                                                                            <option value="6"> j</option>
                                                                                            <option value="7"> k</option>
                                                                                            <option value="8"> m</option>
                                                                                            <option value="9">l</option>
                                                                                            <option value="10"> n</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <select id="ng_7" class="ng_esp" size="1" name="ng_7">
                                                                                           <option value="1">t</option>
                                                                                           <option value="2"> g</option>
                                                                                           <option value="3"> f</option>
                                                                                           <option value="4"> i</option>
                                                                                           <option value="5"> h</option>
                                                                                           <option value="6"> j</option>
                                                                                           <option value="7"> k</option>
                                                                                           <option value="8"> m</option>
                                                                                           <option value="9"> l</option>
                                                                                           <option value="10"> n</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="text_center">
                                                                                        <select id="ng_8" class="ng_esp" size="1" name="ng_8">
                                                                                            <option value="1"> </option>
                                                                                            <option value="2"> g</option>
                                                                                            <option value="3"> f</option>
                                                                                            <option value="4">i</option>
                                                                                            <option value="5"> h</option>
                                                                                            <option value="6"> j</option>
                                                                                            <option value="7"> k</option>
                                                                                            <option value="8"> m</option>
                                                                                            <option value="9"> l</option>
                                                                                            <option value="10"> n</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="tib_left">
                                                                                        <select id="ng_9" class="ng_esp" size="1" name="ng_9">
                                                                                            <option value="1"> u</option>
                                                                                            <option value="2"> g</option>
                                                                                            <option value="3"> f</option>
                                                                                            <option value="4"> i</option>
                                                                                            <option value="5"> h</option>
                                                                                            <option value="6"> j</option>
                                                                                            <option value="7"> k</option>
                                                                                            <option value="8"> m</option>
                                                                                            <option value="9"> l</option>
                                                                                            <option value="10"> n</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                    <td class="text_center">
                                                                                        <select id="ng_10" class="ng_esp" size="1" name="ng_10">
                                                                                            <option value="1"> q</option>
                                                                                            <option value="2"> g</option>
                                                                                            <option value="3"> f</option>
                                                                                            <option value="4"> i</option>
                                                                                            <option value="5"> h</option>
                                                                                            <option value="6"> j</option>
                                                                                            <option value="7"> k</option>
                                                                                            <option value="8"> m</option>
                                                                                            <option value="9"> l</option>
                                                                                            <option value="10"> n</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                            <label class="floating-label-activo-sm">Mov. oculares involuntarios y persecución</label>
                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="6"  name="mov_oculares" id="mov_oculares" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                            <label class="floating-label-activo-sm">Dismetría Ocular</label>
                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="6"  name="dismetria_ocular" id="dismetria_ocular" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                            <label class="floating-label-activo-sm">Comentarios</label>
                                                                            <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_comentarios" id="obs_comentarios" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
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
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="ex_ng_provocado">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ex_ng_provocado_c" aria-expanded="false" aria-controls="ex_ng_provocado_c">
                                                NISTAGMO PROVOCADO
                                            </button>
                                        </div>
                                        <div id="ex_ng_provocado_c" class="collapse show" aria-labelledby="ex_ng_provocado" data-parent="#ex_ng_provocado">
                                            <div class="card-body-aten-a">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div style="overflow-x:auto;">
                                                            <div class="table-responsive">
                                                                <table id="tabla_registros_ng" class="table table-striped table-xs table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                          <th>POSICIÓN</th>
                                                                          <th>DIRECCIÓN</th>
                                                                          <th>LATENCIA</th>
                                                                          <th>PAROXISMO</th>
                                                                          <th>FATIGA</th>
                                                                          <th>DURACIÓN</th>
                                                                          <th>VÉRTIGO</th>
                                                                          <th>NAUSEAS</th>
                                                                          <th>VÓMITO</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>EaS</td>
                                                                            <td>
                                                                                <select id="EaS" class="ng_esp" size="1" name="EaS" title="EaS">
                                                                                    <option value="1"> 0 </option>
                                                                                     <option value="2"> g</option>
                                                                                     <option value="3"> f</option>
                                                                                     <option value="4"> i</option>
                                                                                     <option value="5"> h</option>
                                                                                     <option value="6"> j</option>
                                                                                     <option value="7"> k</option>
                                                                                     <option value="8"> m</option>
                                                                                     <option value="9"> l</option>
                                                                                     <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatEaS" class="form-control form-control-sm" type="text" name="LatEaS" title="LatEaS" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="e415" class="form-control form-control-sm" size="1" name="par1" title="par1">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="e308" class="form-control form-control-sm" size="1" name="fat1" title="fat1">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurEaS" class="form-control form-control-sm" type="text" name="DurEaS" title="DurEaS" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="verEaS" class="form-control form-control-sm" name="verEaS" size="1" title="verEaS">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="NauEaS" class="form-control form-control-sm" name="NauEaS" size="1" title="NAUSEAS">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="VomEaS" class="form-control form-control-sm" name="VomEaS" size="1" title="VOMITOS">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>SaD</td>
                                                                            <td>
                                                                                <select id="SaD" class="ng_esp" size="1" name="SaD" title="SaD">
                                                                                   <option value="1"> 0 </option>
                                                                                   <option value="2"> G</option>
                                                                                   <option value="3"> F</option>
                                                                                   <option value="4"> I</option>
                                                                                   <option value="5"> H</option>
                                                                                   <option value="6"> J</option>
                                                                                   <option value="7"> K</option>
                                                                                   <option value="8"> M</option>
                                                                                   <option value="9"> L</option>
                                                                                   <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <input id="LatSaD" class="form-control form-control-sm" type="text" name="LatSaD" title="LatSaD" size="9">
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <select id="sad_1" class="form-control form-control-sm" size="1" name="sad_1" title="par2">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <select id="sad_2" class="form-control form-control-sm" size="1" name="sad_2" title="fat2">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurSaD" class="form-control form-control-sm" type="text" name="DurSaD" title="DurSaD" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="sad_3" class="form-control form-control-sm" name="sad_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="sad_4" class="form-control form-control-sm" name="sad_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="sad_5" class="form-control form-control-sm" name="sad_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>DaS</td>
                                                                            <td>
                                                                                <select id="DaS" class="ng_esp" size="1" name="DaS" title="DaS">
                                                                                    <option value="1"> 0 </option>
                                                                                     <option value="2"> g</option>
                                                                                     <option value="3"> f</option>
                                                                                     <option value="4"> i</option>
                                                                                    <option value="5"> h</option>
                                                                                     <option value="6"> j</option>
                                                                                     <option value="7"> k</option>
                                                                                     <option value="8"> m</option>
                                                                                     <option value="9"> l</option>
                                                                                     <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatDaS" class="form-control form-control-sm" type="text" name="LatDaS" title="LatDaS" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="DaS_1" class="form-control form-control-sm" size="1" name="DaS_1" title="par3">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="DaS_2" class="form-control form-control-sm" size="1" name="DaS_2" title="fat3">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurDaS" class="form-control form-control-sm" type="text" name="DurDaS" title="DurDaS" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="DaS_3" class="form-control form-control-sm" name="DaS_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="DaS_4" class="form-control form-control-sm" name="DaS_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="DaS_5" class="form-control form-control-sm" name="DaS_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>SaL</td>
                                                                            <td>
                                                                                <select id="SaL" class="ng_esp" size="1" name="SaL" title="SaL">
                                                                                    <option value="1"> 0 </option>
                                                                                     <option value="2"> g</option>
                                                                                     <option value="3"> f</option>
                                                                                     <option value="4"> i</option>
                                                                                    <option value="5"> h</option>
                                                                                     <option value="6"> j</option>
                                                                                     <option value="7"> k</option>
                                                                                     <option value="8"> m</option>
                                                                                     <option value="9"> l</option>
                                                                                     <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatSal" class="form-control form-control-sm" type="text" name="LatSal" title="LatSal" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaL_1" class="form-control form-control-sm" size="1" name="SaL_1" title="par4">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaL_2" class="form-control form-control-sm" size="1" name="SaL_2" title="fat4">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurSal" class="form-control form-control-sm" type="text" name="DurSal" title="DurSal" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaL_3" class="form-control form-control-sm" name="SaL_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select></td>
                                                                            <td>
                                                                                <select id="SaL_4" class="form-control form-control-sm" name="SaL_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaL_5" class="form-control form-control-sm" name="SaL_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> LaS</td>
                                                                            <td>
                                                                                <select id="LaS" class="ng_esp" size="1" name="LaS" title="LaS">
                                                                                    <option value="1"> 0 </option>
                                                                                     <option value="2"> g</option>
                                                                                     <option value="3"> f</option>
                                                                                     <option value="4"> i</option>
                                                                                    <option value="5"> h</option>
                                                                                     <option value="6"> j</option>
                                                                                     <option value="7"> k</option>
                                                                                     <option value="8"> m</option>
                                                                                     <option value="9"> l</option>
                                                                                     <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatLas" class="form-control form-control-sm" type="text" name="LatLas" title="LatLas" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="LaS_1" class="form-control form-control-sm" size="1" name="LaS_1" title="par5">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="LaS_2" class="form-control form-control-sm" size="1" name="LaS_2" title="fat5">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurLaS" class="form-control form-control-sm" type="text" name="DurLaS" title="DurLaS" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="LaS_3" class="form-control form-control-sm" name="LaS_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="LaS_4" class="form-control form-control-sm" name="LaS_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="LaS_5" class="form-control form-control-sm" name="LaS_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                SaE
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE" class="ng_esp" size="1" name="SaE" title="SaE">
                                                                                    <option value="1"> 0 </option>
                                                                                     <option value="2"> g</option>
                                                                                     <option value="3"> f</option>
                                                                                     <option value="4">i</option>
                                                                                    <option value="5"> h</option>
                                                                                     <option value="6"> j</option>
                                                                                     <option value="7"> k</option>
                                                                                     <option value="8"> m</option>
                                                                                     <option value="9"> l</option>
                                                                                     <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatSaE" class="form-control form-control-sm" type="text" name="LatSaE" title="LatSaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE_1" class="form-control form-control-sm" size="1" name="SaE_1" title="par6">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE_2" class="form-control form-control-sm" size="1" name="SaE_2" title="fat6">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurSaE" class="form-control form-control-sm" type="text" name="DurSaE" title="DurSaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE_3" class="form-control form-control-sm" name="SaE_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE_4" class="form-control form-control-sm" name="SaE_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE_5" class="form-control form-control-sm" name="SaE_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                EaCC
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC" class="ng_esp" size="1" name="EaCC" title="EaCC">
                                                                                     <option value="1"> 0 </option>
                                                                                     <option value="2"> g</option>
                                                                                     <option value="3"> f</option>
                                                                                     <option value="4"> i</option>
                                                                                     <option value="5"> h</option>
                                                                                     <option value="6"> j</option>
                                                                                     <option value="7"> k</option>
                                                                                     <option value="8"> m</option>
                                                                                     <option value="9"> l</option>
                                                                                     <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatEaCC" class="form-control form-control-sm" type="text" name="LatEaCC" title="LatEaCC" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC_1" class="form-control form-control-sm" size="1" name="EaCC_1" title="par7">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC_2" class="form-control form-control-sm" size="1" name="EaCC_2" title="fat7">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurEaCC" class="form-control form-control-sm" type="text" name="DurEaCC" title="DurEaCC" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC_3" class="form-control form-control-sm" name="EaCC_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC_4" class="form-control form-control-sm" name="EaCC_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC_5" class="form-control form-control-sm" name="EaCC_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                CCaE
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE" class="ng_esp" size="1" name="CCaE" title="CCaE">
                                                                                    <option value="1"> 0 </option>
                                                                                     <option value="2"> g</option>
                                                                                     <option value="3"> f</option>
                                                                                     <option value="4"> i</option>
                                                                                     <option value="5"> h</option>
                                                                                     <option value="6"> j</option>
                                                                                     <option value="7"> k</option>
                                                                                     <option value="8"> m</option>
                                                                                     <option value="9"> l</option>
                                                                                     <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatCCaE" class="form-control form-control-sm" type="text" name="LatCCaE" title="LatCCaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE_1" class="form-control form-control-sm" size="1" name="CCaE_1" title="par8">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE_2" class="form-control form-control-sm" size="1" name="CCaE_2" title="fat8">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurCCaE" class="form-control form-control-sm" type="text" name="DurCCaE" title="DurCCaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE_3" class="form-control form-control-sm" name="CCaE_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE_4" class="form-control form-control-sm" name="CCaE_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE_5" class="form-control form-control-sm" name="CCaE_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                EaCCd
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd" class="ng_esp" size="1" name="EaCCd" title="EaCCd">
                                                                                    <option value="1"> 0 </option>
                                                                                     <option value="2"> g</option>
                                                                                     <option value="3"> f</option>
                                                                                     <option value="4"> i</option>
                                                                                     <option value="5"> h</option>
                                                                                     <option value="6"> j</option>
                                                                                     <option value="7"> k</option>
                                                                                     <option value="8"> m</option>
                                                                                     <option value="9"> l</option>
                                                                                     <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatEaCCd" class="form-control form-control-sm" type="text" name="LatEaCCd" title="LatEaCCd" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd_1" class="form-control form-control-sm" size="1" name="EaCCd_1" title="par9">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd_2" class="form-control form-control-sm" size="1" name="EaCCd_2" title="fat9">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurEaCCd" class="form-control form-control-sm" type="text" name="DurEaCCd" title="DurEaCCd" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd_3" class="form-control form-control-sm" name="EaCCd_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd_4" class="form-control form-control-sm" name="EaCCd_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd_5" class="form-control form-control-sm" name="EaCCd_55" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                CCdaE
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE" class="ng_esp" size="1" name="CCdaE" title="CCdaE">
                                                                                    <option value="1"> 0 </option>
                                                                                     <option value="2"> g</option>
                                                                                     <option value="3"> f</option>
                                                                                     <option value="4"> i</option>
                                                                                     <option value="5"> h</option>
                                                                                     <option value="6"> j</option>
                                                                                     <option value="7"> k</option>
                                                                                     <option value="8"> m</option>
                                                                                     <option value="9"> l</option>
                                                                                     <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatCCdaE" class="form-control form-control-sm" type="text" name="LatCCdaE" title="LatCCdaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE_1" class="form-control form-control-sm" size="1" name="CCdaE_1" title="par10">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE_2" class="form-control form-control-sm" size="1" name="CCdaE_2" title="fat10">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurCCdaE" class="form-control form-control-sm" type="text" name="DurCCdaE" title="DurCCdaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE_3" class="form-control form-control-sm" name="CCdaE_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE_4" class="form-control form-control-sm" name="CCdaE_42" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE_5" class="form-control form-control-sm" name="CCdaE_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                EaCCi</td>
                                                                            <td>
                                                                                <select id="EaCCi" class="ng_esp" size="1" name="EaCCi" title="EaCCi">
                                                                                    <option value="1"> 0 </option>
                                                                                    <option value="2"> g</option>
                                                                                    <option value="3"> f</option>
                                                                                    <option value="4"> i</option>
                                                                                    <option value="5"> h</option>
                                                                                    <option value="6"> j</option>
                                                                                    <option value="7"> k</option>
                                                                                    <option value="8"> m</option>
                                                                                    <option value="9"> l</option>
                                                                                    <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatEaCCi" class="form-control form-control-sm" type="text" name="LatEaCCi" title="LatEaCCi" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCi_1" class="form-control form-control-sm" size="1" name="EaCCi_1" title="par11">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCi_2" class="form-control form-control-sm" size="1" name="EaCCi_2" title="fat11">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurEaCCi" class="form-control form-control-sm" type="text" name="DurEaCCi" title="DurEaCCi" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCi_3" class="form-control form-control-sm" name="EaCCi_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCi_4" class="form-control form-control-sm" name="EaCCi_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCi_5" class="form-control form-control-sm" name="EaCCi_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>CCiaE</td>
                                                                            <td>
                                                                                <select id="CCiaE" class="ng_esp" size="1" name="CCiaE" title="CCiaE">
                                                                                     <option value="1"> 0 </option>
                                                                                     <option value="2"> g</option>
                                                                                     <option value="3"> f</option>
                                                                                     <option value="4"> i</option>
                                                                                     <option value="5"> h</option>
                                                                                     <option value="6"> j</option>
                                                                                     <option value="7"> k</option>
                                                                                     <option value="8"> m</option>
                                                                                     <option value="9"> l</option>
                                                                                     <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatCCiaE" class="form-control form-control-sm" type="text" name="LatCCiaE" title="LatCCiaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCiaE_1" class="form-control form-control-sm" size="1" name="CCiaE_1" title="par12">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCiaE_2" class="form-control form-control-sm" size="1" name="CCiaE_2" title="fat12">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurCCiaE" class="form-control form-control-sm" type="text" name="DurCCiaE" title="DurCCiaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCiaE_3" class="form-control form-control-sm" name="CCiaE_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCiaE_4" class="form-control form-control-sm" name="CCiaE_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCiaE_5" class="form-control form-control-sm" name="CCiaE_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
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
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="ex_p_calorica">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ex_p_calorica_c" aria-expanded="false" aria-controls="ex_p_calorica_c">
                                                    PRUEBA CALÓRICA
                                                </button>
                                            </div>
                                            <div id="ex_p_calorica_c" class="collapse show" aria-labelledby="ex_p_calorica" data-parent="#ex_p_calorica">
                                                <div class="card-body-aten-a">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div style="overflow-x:auto;">
                                                                <div class="table-responsive">
                                                                    <table id="tabla_registros_pc" class="display table table-striped  table-bordered dt-responsive nowrap table-xs">
                                                                        <thead>
                                                                            <tr>
                                                                              <th scope="col"></th>
                                                                              <th scope="col">DURACIÓN</th>
                                                                              <th scope="col">FRECUENCIA</th>
                                                                              <th scope="col">AMPLITUD</th>
                                                                              <th scope="col">VÉRTIGO</th>
                                                                              <th scope="col">NAUSEAS</th>
                                                                              <th scope="col">VÓMITO</th>
                                                                              <th scope="col">VCL</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-c-blue font-weight-bold">
                                                                                    OI a 30°C
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="DUR_30OI" class="form-control form-control-sm text-c-blue" type="text" name="DUR_30OI" title="OIa30°C" size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_30OI" class="form-control form-control-sm"  type="text" name="FR_30OI" title="Nombre" size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_30OI" class="form-control form-control-sm" type="text" name="AM_30OI" title="Nombre" size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="30OI_1" class="form-control form-control-sm"  name="30OI_1" size="1" title="VERT" style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="30OI_2" class="form-control form-control-sm" name="30OI_2" size="1" title="NAUSEAS" style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="30OI_3" class="form-control form-control-sm"  name="30OI_3" size="1" title="VOM" style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="VCL_30OI" class="form-control form-control-sm"  type="text" name="VCL_30OI" title="VCL" size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-danger font-weight-bold">
                                                                                    OD a 30°C
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="DUR_30OD" class="form-control form-control-sm"  type="text" name="DUR_30OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_30OD" class="form-control form-control-sm"  type="text" name="FR_30OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_30OD" class="form-control form-control-sm"  type="text" name="AM_30OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="30OD_1" class="form-control form-control-sm"   name="30OD_1" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="30OD_2" class="form-control form-control-sm" name="30OD_2" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="30OD_3" class="form-control form-control-sm" name="30OD_3" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="VCL_30OD"class="form-control form-control-sm"type="text" name="VCL_30OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-c-blue font-weight-bold">
                                                                                    OI a 44°C
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="DUR_44OI"class="form-control form-control-sm"type="text" name="DUR_44OI"  size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_44OI"class="form-control form-control-sm"type="text" name="FR_44OI"  size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_44OI"class="form-control form-control-sm"type="text" name="AM_44OI"  size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="44OI_1" class="form-control form-control-sm"name="44OI_1" size="1"  style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select></td>
                                                                                <td class="#">
                                                                                    <select id="44OI_2" class="form-control form-control-sm" name="44OI_2" size="1"  style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="44OI_3" class="form-control form-control-sm" name="44OI_3" size="1" style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="VCL_44OI"class="form-control form-control-sm"type="text" name="VCL_44OI" t size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-danger font-weight-bold">
                                                                                    OD a 44°C</td>
                                                                                <td class="#">
                                                                                    <input id="DUR_44OD" class="form-control form-control-sm" type="text" name="DUR_44OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_44OD" class="form-control form-control-sm" type="text" name="FR_44OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_44OD" class="form-control form-control-sm" type="text" name="AM_44OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="44OD_1" class="form-control form-control-sm"  name="44OD_1" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select></td>
                                                                                <td class="#">
                                                                                    <select id="44OD_2" class="form-control form-control-sm"  name="44OD_2" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select></td>
                                                                                <td class="#">
                                                                                    <select id="44OD_3" class="form-control form-control-sm"  name="44OD_3" size="1"  style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select></td>
                                                                                <td class="#">
                                                                                    <input id="VCL_44OD" class="form-control form-control-sm" type="text" name="VCL_44OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-c-blue font-weight-bold">
                                                                                    OI a 18°C</td>
                                                                                <td class="#">
                                                                                    <input id="DUR_18OI" class="form-control form-control-sm" type="text" name="DUR_18OI"  size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_18OI" class="form-control form-control-sm" type="text" name="FR_18OI"  size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_18OI" class="form-control form-control-sm" type="text" name="AM_18OI" size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="18OI_1" class="form-control form-control-sm" name="18OI_1" size="1"  style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select></td>
                                                                                <td class="#">
                                                                                    <select id="18OI_2" class="form-control form-control-sm" name="18OI_2" size="1" style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="18OI_3" class="form-control form-control-sm" name="18OI_3" size="1"  style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="VCL_18OI"class="form-control form-control-sm"type="text" name="VCL_18OI" size="9" style="color:#1a49a3;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-danger font-weight-bold">
                                                                                    OD a 18°C</td>
                                                                                <td class="#">
                                                                                    <input id="DUR_18OD"class="form-control form-control-sm"type="text" name="DUR_18OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_18OD"class="form-control form-control-sm"type="text" name="FR_18OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_18OD"class="form-control form-control-sm"type="text" name="AM_18OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="18OD_1" class="form-control form-control-sm" name="18OD_1" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="18OD_2" class="form-control form-control-sm" name="18OD_2" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="18OD_3" class="form-control form-control-sm"name="18OD_3" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="VCL_18OD"class="form-control form-control-sm"type="text" name="VCL_18OD"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                            <label class="floating-label-activo-sm">Comentarios</label>
                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="comentarios_pc" id="comentarios_pc" placeholder="Observaciones generales, sintomatologia reacciones, etc."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                            <label class="floating-label-activo-sm">Conclusiones Examen</label>
                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="concluciones_examen" id="concluciones_examen" placeholder="Observaciones generales, sintomatologia reacciones, etc."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@section('page-script-ficha-atencion')
    <script>
        $(document).ready(function() {
            $('#btn_guardar_presupuesto_mascota').on('click', function() {
                var payload = {
                    _token: '{{ csrf_token() }}',
                    id_paciente: $('#presupuesto_mascota_id_paciente').val(),
                    id_profesional: $('#presupuesto_mascota_id_profesional').val(),
                    id_ficha_atencion: $('#presupuesto_mascota_id_ficha_atencion').val(),
                    id_lugar_atencion: $('#presupuesto_mascota_id_lugar_atencion').val(),
                    fecha: $('#presupuesto_mascota_fecha').val(),
                    fecha_control: $('#presupuesto_mascota_fecha_control').val(),
                    estado: $('#presupuesto_mascota_estado').val(),
                    aprobado: $('#presupuesto_mascota_aprobado').val(),
                    datos_atencion: $('#presupuesto_mascota_datos').val(),
                    otros: $('#presupuesto_mascota_otros').val(),
                    observaciones: $('#presupuesto_mascota_observaciones').val()
                };

                $.ajax({
                    url: '{{ route('profesional.presupuesto_mascota.guardar') }}',
                    type: 'POST',
                    data: payload
                })
                .done(function(resp) {
                    $('#presupuesto_mascota_resultado')
                        .removeClass('text-danger')
                        .addClass('text-success')
                        .text(resp.msj || 'Presupuesto guardado.');
                })
                .fail(function(xhr) {
                    var mensaje = 'Error al guardar presupuesto.';
                    if (xhr.responseJSON && xhr.responseJSON.msj) {
                        mensaje = xhr.responseJSON.msj;
                    }
                    $('#presupuesto_mascota_resultado')
                        .removeClass('text-success')
                        .addClass('text-danger')
                        .text(mensaje);
                });
            });
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
                    $('#id_descripcion_cie').trigger('onchange');
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
                    $('#id_lic_descripcion_cie').trigger('onchange');
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
                console.log(value);
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

        // function abrir_modal_guardar_tipo()
        // {
        //     $('#modal_registrar_ficha_tipo_orl').modal('show');
        //     cargarSeccion('registro_f_t_orl_detalle');
        // }

        function abrir_modal_guardar_tipo(div_id_data, div_id_detalle, tipo)
        {
            $('#f_t_orl_tipo').val(tipo);
            $("#btn_modal_registrar_ficha_tipo_orl").unbind();

            $('#modal_registrar_ficha_tipo_orl').modal('show');

            cargarSeccion(div_id_detalle, div_id_data);
        }

        function cargarSeccion(div_destino, div_id_data)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            var seccion_actual = '';
            var seccion_previa = '';
            $('#'+div_id_data).find('select,textarea').each(function(key, elemento)
            {
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

                if(seccion_actual !== seccion_previa)
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
            var f_t_orl_tipo = $('#f_t_orl_tipo').val();
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

                    tipo : f_t_orl_tipo,

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

                    modal_agregar_tipo_piel_tegumnto: data.modal_agregar_tipo_piel_tegumnto,
                    observaciones_obs_piel_tegumnto: data.observaciones_obs_piel_tegumnto,
                    modal_agregar_tipo_adenopatias: data.modal_agregar_tipo_adenopatias,
                    observaciones_obs_adenopatias: data.observaciones_obs_adenopatias,
                    modal_agregar_tipo_tumores_masas: data.modal_agregar_tipo_tumores_masas,
                    observaciones_obs_tumores_masas: data.observaciones_obs_tumores_masas,
                    modal_agregar_tipo_gland_anexas: data.modal_agregar_tipo_gland_anexas,
                    observaciones_obs_gland_anexas: data.observaciones_obs_gland_anexas,
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

        function cargar_info_ficha_tipo_orl(select, div_descripcion, seccion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#'+seccion).find('select,textarea').each(function(key, elemento){
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

                evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);
                evaluar_para_carga_detalle('adenopatias','div_adenopatias','obs_adenopatias',2);
                evaluar_para_carga_detalle('tumores_masas','div_tumores_masas','obs_tumores_masas',2);
                evaluar_para_carga_detalle('gland_anexas','div_gland_anexas','obs_gland_anexas',2);
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
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
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

                    evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);
                    evaluar_para_carga_detalle('adenopatias','div_adenopatias','obs_adenopatias',2);
                    evaluar_para_carga_detalle('tumores_masas','div_tumores_masas','obs_tumores_masas',2);
                    evaluar_para_carga_detalle('gland_anexas','div_gland_anexas','obs_gland_anexas',2);

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

        // ALERTA DE ATENCION
        // window.setTimeout(function() {
        //     $(".alert-atencion").fadeTo(500, 0).slideUp(600, function(){
        //         $(this).remove();
        //     });
        // }, 5000);

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
