<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_matrona-tab" data-toggle="tab" href="#atencion_matrona" role="tab" aria-controls="atencion_matrona" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ns-tab" data-toggle="tab" href="#ns" role="tab" aria-controls="ns" aria-selected="false">Control Niño Sano</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_orl') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    @csrf
                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_matrona" role="tabpanel" aria-labelledby="atencion_matrona-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                            <!--Formulario / Menor de edad-->
                                            @include('general.secciones_ficha.seccion_menor')
                                            <!--Cierre: Formulario / Menor de edad-->
                                        </div>
                                        <!--Motivo consulta-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="motivo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3" id="">
                                                                <label class="floating-label-activo-sm">Motivo</label>
                                                                <div class="form-group">
                                                                    <select class="form-control form-control-sm" id="motivo" name="motivo">
                                                                        <option>Seleccione</option>
                                                                        <option value="1">Control Preventivo</option>
                                                                        <option value="2">Control Fertilidad</option>
                                                                        <option value="3">Examen de Diagnóstico Embarazo</option>
                                                                        <option value="4">Control Embarazo Normal</option>
                                                                        <option value="5">Control Embarazo Patológico</option>
                                                                        <option value="6">Otra</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label-activo-sm">FUR</label>
                                                                <input type="text" class="form-control form-control-sm" name="fur" id="fur">
                                                            </div>
                                                            <div class="form-group col-md-7" id="">
                                                                <label class="floating-label-activo-sm">Anmnésis</label>
                                                                <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="anamnesis" id="anamnesis"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--EXAMEN ESPECIALIDAD GINECO - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_gin">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_gin_c" aria-expanded="false" aria-controls="exam_esp_gin_c">
                                                        Examen Ginecológico
                                                    </button>
                                                </div>
                                                <div id="exam_esp_gin_c" class="collapse" aria-labelledby="exam_esp_gin" data-parent="#exam_esp_gin">
                                                    <div class="card-body-aten-a">
                                                        <div id="form-orl-adulto">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-10" id="matron" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="gine-gen_tab" data-toggle="tab" href="#gine-gen" role="tab" aria-controls="gine-gen" aria-selected="true">Examen Ginecológico General</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="fertil-gen-tab" data-toggle="tab" href="#fertil-gen" role="tab" aria-controls="fertil-gen" aria-selected="false">Control de Natalidad</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="matron">
                                                                        <!--GINECOLOGIA-->
                                                                        <div class="tab-pane fade show active" id="gine-gen" role="tabpanel" aria-labelledby="gine-gen_tab">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-2">
                                                                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                                        <a class="nav-link-aten text-reset active " id="ginecol_gen-tab" data-toggle="tab" href="#ginecol_gen" role="tab" aria-controls="ginecol_gen" aria-selected="false">Examen Ginecológico</a>
                                                                                                        <a class="nav-link-aten text-reset" id="mamas_gen-tab" data-toggle="tab" href="#mamas_gen" role="tab" aria-controls="mamas_gen" aria-selected="false">Examen de mamas</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-10">
                                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                                        <div class="tab-pane fade show active" id="ginecol_gen" role="tabpanel" aria-labelledby="ginecol_gen-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">

                                                                                                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                                                                                                            <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Examen externo</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                                                                                                        <div class="form-group ">
                                                                                                                            <label class="floating-label-activo-sm">Tacto ginecológico</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="tacto_ginecológico" id="tacto_ginecológico"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                                                                                                        <div class="form-group">
                                                                                                                        <button type="button" class="btn btn-outline-primary btn-block btn-sm mb-2"  onclick="ma_sol_examenes();">Solicitar Examenes</button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    {{--  <div class="col-sm-12 col-md-6 col-lg-6">
                                                                                                                        <div class="form-group">
                                                                                                                            <button type="button" class="btn btn-outline-primary btn-block btn-sm mb-2" onclick="eco_obst()">Ecografía</button>
                                                                                                                        </div>
                                                                                                                    </div>  --}}
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="form-group col-md-12">
                                                                                                                        <label class="floating-label-activo-sm">Observaciones examen Ginecológico </label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="examen Ginecológico " rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ex_gine_gral" id="obs_ex_gine_gral"></textarea>
                                                                                                                    </div>


                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Resultado Examenes</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examenes" data-seccion="Ginecologia General" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_ex_audicion" id="resultado_ex_audicion"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="tab-pane fade show" id="mamas_gen" role="tabpanel" aria-labelledby="mamas_gen-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <!--MAMAS-->
                                                                                                                <div class="form-row">

                                                                                                                    <div class="col-sm-12 col-md-9 col-lg-9">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Descripción examen de Mamas</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm mt-2" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="ex_mamas_obs" id="ex_mamas_obs"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <button type="button" class="btn btn-outline-primary btn-block btn-sm mt-2" onclick="ex_mamas();">Ex. mamas</button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen y control</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Resultado Examenes</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examenes" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_ex_audicion" id="resultado_ex_audicion"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            {{--  <div class="row">
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Cargar ficha tipo</label>
                                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_oft('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            @if(!empty($fichaTipo['oft']))
                                                                                                                @foreach ($fichaTipo['oft'] as $ft )
                                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                </div>

                                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo ex.Ginecológico</button>
                                                                                                </div>
                                                                                            </div>  --}}

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--EXAMEN  CONTROL NATALIDAD-->
                                                                        <div class="tab-pane fade show" id="fertil-gen" role="tabpanel" aria-labelledby="fertil-gen-tab">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12">
                                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                                        <div class="tab-pane fade show active" id="gine_gen" role="tabpanel" aria-labelledby="gine_gen-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row" id="form-Ficha Control fertilidad">
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                                                         <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Usa método</label>
                                                                                                                            <select name="usa_metodo" id="usa_metodo" data-titulo="Usa Método" data-seccion="Ficha Control fertilidad"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_metodo','div_detalle_usa_metodo','obs_tolerancia_usa_metodo',2)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">No</option>
                                                                                                                                <option value="2">Si</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_usa_metodo" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Tolerancia</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="obs. Tolerancia" data-seccion="Ficha Control fertilidad" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tolerancia_usa_metodo" id="obs_tolerancia_usa_metodo"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Método usado</label>
                                                                                                                            <select name="metodo_usado" id="metodo_usado" data-titulo="metodo_usado" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('metodo_usado','div_detalle_metodo_usado','nombre_metodo_usado',2,1,3)">
                                                                                                                                <option value="1">Seleccione</option>
                                                                                                                                <option value="2">Natural</option>
                                                                                                                                <option value="2">Mecánico</option>
                                                                                                                                <option value="2">Farmacológico</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_metodo_usado" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Nombre </label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="metodo_usado" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nombre_metodo_usado" id="nombre_metodo_usado"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">0tro</label>
                                                                                                                            <select name="otro" id="otro" data-titulo="Otro" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otro','div_detalle_otro','obs_otro',2);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">No</option>
                                                                                                                                <option value="2">Si</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_otro" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Detalle otro método</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otro" id="obs_otro"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                                                         <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Otro 1</label>
                                                                                                                            <select name="otro_1" id="otro_1" data-titulo="Otro_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otro_1','div_detalle_otro_1','obs_otro_1',2);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">No</option>
                                                                                                                                <option value="2">si</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_otro_1" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Obs otro 1</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro_1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otro_1" id="obs_otro_1"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Anticoncepción" data-seccion="Anticoncepción" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Resultado Examenes</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examen Anticoncepción" data-seccion="Anticoncepción" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_ex_audicion" id="resultado_ex_audicion"></textarea>
                                                                                                                         </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="tab-pane fade show" id="fertil_gen" role="tabpanel" aria-labelledby="fertil_gen-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row" id="form-Ficha Control fertilidad">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                                                        <h5 class="text-c-blue mb-3">FICHA CONTROL FERTILIDAD</h5>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                                                         <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Usa método</label>
                                                                                                                            <select name="usa_metodo" id="usa_metodo" data-titulo="Usa Método" data-seccion="Ficha Control fertilidad"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_metodo','div_detalle_usa_metodo','obs_tolerancia_usa_metodo',2)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">No</option>
                                                                                                                                <option value="2">Si</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_usa_metodo" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Tolerancia</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="obs. Tolerancia" data-seccion="Ficha Control fertilidad" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tolerancia_usa_metodo" id="obs_tolerancia_usa_metodo"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Método usado</label>
                                                                                                                            <select name="metodo_usado" id="metodo_usado" data-titulo="metodo_usado" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('metodo_usado','div_detalle_metodo_usado','nombre_metodo_usado',2,1,3)">
                                                                                                                                <option value="1">Seleccione</option>
                                                                                                                                <option value="2">Natural</option>
                                                                                                                                <option value="2">Mecánico</option>
                                                                                                                                <option value="2">Farmacológico</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_metodo_usado" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Nombre </label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="metodo_usado" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nombre_metodo_usado" id="nombre_metodo_usado"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">0tro</label>
                                                                                                                            <select name="otro" id="otro" data-titulo="Otro" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otro','div_detalle_otro','obs_otro',2);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">No</option>
                                                                                                                                <option value="2">Si</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_otro" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Detalle otro método</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otro" id="obs_otro"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                                                         <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Otro 1</label>
                                                                                                                            <select name="otro_1" id="otro_1" data-titulo="Otro_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otro_1','div_detalle_otro_1','obs_otro_1',2);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">No</option>
                                                                                                                                <option value="2">si</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_otro_1" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Obs otro 1</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro_1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otro_1" id="obs_otro_1"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Observaciones Examenes</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen " data-seccion="Anticoncepción" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Resultado Examenes</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examen" data-seccion="Anticoncepción" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_ex_audicion" id="resultado_ex_audicion"></textarea>
                                                                                                                         </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br>
                                                                                            {{--  <div class="row">
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Cargar ficha tipo Oído</label>
                                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_oft('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            @if(!empty($fichaTipo['oft']))
                                                                                                                @foreach ($fichaTipo['oft'] as $ft )
                                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                </div>

                                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Oído</button>
                                                                                                </div>
                                                                                            </div>  --}}
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
                                        <!--EXAMEN ESPECIALIDAD OBSTETRICO - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_obst">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_obst_c" aria-expanded="false" aria-controls="exam_esp_obst_c">
                                                        Examen Obstétrico
                                                    </button>
                                                </div>
                                                <div id="exam_esp_obst_c" class="collapse" aria-labelledby="exam_esp_obst" data-parent="#exam_esp_obst">
                                                    <div class="card-body-aten-a">
                                                        <div id="form-orl-adulto">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="ant_obst_tab" data-toggle="tab" href="#ant_obst" role="tab" aria-controls="ant_obst" aria-selected="true">Antecedentes obstétricos</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="obst_fact-riesgo-tab" data-toggle="tab" href="#obst_fact-riesgo" role="tab" aria-controls="obst_fact-riesgo" aria-selected="true">Factores de Riesgo</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="emb_actual-tab" data-toggle="tab" href="#emb_actual" role="tab" aria-controls="emb_actual" aria-selected="true">Embarazo Actuál</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="plan_obst-tab" data-toggle="tab" href="#plan_obst" role="tab" aria-controls="plan_obst" aria-selected="true">Planificación</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="in-hosp-tab" data-toggle="tab" href="#in-hosp" role="tab" aria-control="in-hosp" aria-selected="false">Hospitalización</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="orl_adulto">
                                                                        <div class="tab-pane fade show active" id="ant_obst" role="tabpanel" aria-labelledby="ant_obst_tab">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-2">
                                                                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                                        <a class="nav-link-aten text-reset active " id="abort_obst-tab" data-toggle="tab" href="#abort_obst" role="tab" aria-controls="abort_obst" aria-selected="true">Abortos</a>
                                                                                                        <a class="nav-link-aten text-reset" id="emb-term-norm-tab" data-toggle="tab" href="#emb-term-norm" role="tab" aria-controls="emb-term-norm" aria-selected="false">Embarazos término </a>
                                                                                                        <a class="nav-link-aten text-reset" id="emb-term-antec-tab" data-toggle="tab" href="#emb-term-antec" role="tab" aria-controls="emb-term-antec" aria-selected="false">Antec del Parto</a>
                                                                                                        <a class="nav-link-aten text-reset" id="emb-otros-tab" data-toggle="tab" href="#emb-otros" role="tab" aria-controls="emb-otros" aria-selected="false">Vías de Parto</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-10">
                                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                                        <div class="tab-pane fade show active" id="abort_obst" role="tabpanel" aria-labelledby="abort_obst-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Abortos</label>
                                                                                                                            <select name="abort" id="abort" data-titulo="Abortos" data-seccion="Abortos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('abort','div_detalle_abort','abort',2)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">No</option>
                                                                                                                                <option value="2">Si</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"  id="div_detalle_abort" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Observaciones Abortos</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Abortos" data-seccion="Abortos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="abort" id="abort"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">N° de Abortos</label>
                                                                                                                            <select name="det_n_abort" id="det_n_abort" data-titulo="N°Abortos" data-seccion="Abortos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('det_n_abort','div_detalle_det_n_abort','aprec_det_n_abort',4)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">1</option>
                                                                                                                                <option value="2">2</option>
                                                                                                                                <option value="3">3</option>
                                                                                                                                <option value="4">+ de 3 anote</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_det_n_abort" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Detalle abortos múltiples</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Abortos Múltiples" data-seccion="Abortos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_det_n_abort" id="aprec_det_n_abort"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Generales Abortos" data-seccion="Abortos" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="tab-pane fade show" id="emb-term-norm" role="tabpanel" aria-labelledby="emb-term-norm-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">N° Embarazos previos</label>
                                                                                                                            <select name="emb_previos" id="emb_previos" data-titulo="N° Embarazos previos" data-seccion="Embarazos previos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('emb_previos','div_detalle_emb_previos','det_emb_previos',4);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">1</option>
                                                                                                                                <option value="2">2</option>
                                                                                                                                <option value="3">3</option>
                                                                                                                                <option value="4"> + de 3</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_emb_previos" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm t-red">Embarazos previos <i>(describir)</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Embarazos previos" data-seccion="Embarazos previos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_emb_previos" id="det_emb_previos"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Patologías del Embarazo</label>
                                                                                                                            <select name="pat_emb" id="pat_emb" data-titulo="Patologías  Embarazos previos" data-seccion="Embarazos previos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pat_emb','div_detalle_pat_emb','ex_pat_emb',2);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">NO</option>
                                                                                                                                <option value="2">SI</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"  id="div_detalle_pat_emb" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm t-red">Patologías del Embarazo <i>(describir)</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Patologías del Embarazo " data-seccion="Embarazos previos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_pat_emb" id="ex_pat_emb"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <label class="floating-label-activo-sm">Observaciones Antecedentes Embarazo</label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Antecedentes Embarazos previo" data-seccion="Embarazos previos" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="tab-pane fade" id="emb-term-antec" role="tabpanel" aria-labelledby="emb-term-antec-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Embarazos Múltiples</label>
                                                                                                                            <select name="n_emb_mult" id="n_emb_mult" data-titulo="Embarazos Múltiples" data-seccion="Embarazos previos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('n_emb_mult','div_obs_n_emb_mult','obs_n_emb_mult',2);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">NO</option>
                                                                                                                                <option value="2">SI</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_obs_n_emb_mult" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm t-red">Embarazos Múltiples<i>(describir)</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm"  data-titulo="Biomicroscopía OD" data-seccion="Embarazos previos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_n_emb_mult" id="obs_n_emb_mult"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm"> N° Nacidos Vivos</label>
                                                                                                                            <select name="nac_vivos_num" data-titulo="N° Nacidos Vivos" id="nac_vivos_num" data-seccion="Embarazos previos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('nac_vivos_num','div_obs_nac_vivos_num','obs_nac_vivos_num',4);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">1</option>
                                                                                                                                <option value="2">2</option>
                                                                                                                                <option value="3">3</option>
                                                                                                                                <option value="4">+ de 3 </option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"  id="div_obs_nac_vivos_num" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm t-red">N° nacidos vivos<i>(describir)</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm"  data-titulo="Obs. N° nacidos vivos" data-seccion="Embarazos previos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_nac_vivos_num" id="obs_nac_vivos_num"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm"> Salud Nacidos Vivos</label>
                                                                                                                            <select name="salud_nac_vivos" data-titulo="Salud Nacidos Vivos" id="salud_nac_vivos" data-seccion="Embarazos previos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('salud_nac_vivos','div_obs_salud_nac_vivos','obs_salud_nac_vivos',2);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">Si todos vivos y Bien</option>
                                                                                                                                <option value="2">No Todos bién describir</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"  id="div_obs_salud_nac_vivos" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm t-red">Salud Nacidos Vivos<i>(describir)</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm"  data-titulo="Observaciones Salud Nacidos Vivos" data-seccion="Embarazos previos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_salud_nac_vivos" id="obs_salud_nac_vivos"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <label class="floating-label-activo-sm">Observaciones Antecedentes de parto</label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Antecedentes de parto" data-seccion="Embarazos previos" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="tab-pane fade" id="emb-otros" role="tabpanel" aria-labelledby="emb-otros-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Parto uno</label>
                                                                                                                            <select name="parto_uno" id="parto_uno" data-titulo="Tipo Vertigo" data-seccion="Otros" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('parto_uno','div_detalle_parto_uno','detalle_parto_uno',4)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">Parto normal inducido</option>
                                                                                                                                <option value="2">Parto normal espontáneo</option>
                                                                                                                                <option value="3">Cesárea electiva</option>
                                                                                                                                <option value="4">Cesárea Urgencia</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_parto_uno" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Parto uno <i>detalle</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Parto uno" data-seccion="Otros" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_parto_uno" id="detalle_parto_uno"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Parto dos</label>
                                                                                                                            <select name="parto_dos" id="parto_dos" data-titulo="Parto dos" data-seccion="Otros" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('parto_dos','div_detalle_parto_dos','detalle_parto_dos',4)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">Parto normal inducido</option>
                                                                                                                                <option value="2">Parto normal espontáneo</option>
                                                                                                                                <option value="3">Cesárea electiva</option>
                                                                                                                                <option value="4">Cesárea Urgencia</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_parto_dos" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Parto dos <i>detalle</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Parto tres" data-seccion="Otros" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_parto_dos" id="detalle_parto_dos"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Parto tres</label>
                                                                                                                            <select name="parto_tres" id="parto_tres" data-titulo="Parto tres" data-seccion="Otros" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('parto_tres','div_detalle_parto_tres','detalle_parto_tres',4)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">Parto normal inducido</option>
                                                                                                                                <option value="2">Parto normal espontáneo</option>
                                                                                                                                <option value="3">Cesárea electiva</option>
                                                                                                                                <option value="4">Cesárea Urgencia</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_parto_tres" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Parto tres <i>detalle</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Tipo Vertigo" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_parto_tres" id="detalle_parto_tres"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Cargar mas partos</button>
                                                                                                                    </div>

                                                                                                                </div>

                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <label class="floating-label-activo-sm">Observaciones </label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Generales" data-seccion="Otros" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br>
                                                                                            {{--  <div class="row">
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Cargar ficha tipo Oído</label>
                                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_oft('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            @if(!empty($fichaTipo['oft']))
                                                                                                                @foreach ($fichaTipo['oft'] as $ft )
                                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                </div>

                                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Oído</button>
                                                                                                </div>
                                                                                            </div>  --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade show" id="obst_fact-riesgo" role="tabpanel" aria-labelledby="obst_fact-riesgo_tab">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-2">
                                                                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                                        <a class="nav-link-aten text-reset active" id="ant-ant-tab" data-toggle="tab" href="#ant-ant" role="tab" aria-controls="ant-ant" aria-selected="true">Ant Anteriores</a>
                                                                                                        <a class="nav-link-aten text-reset" id="fact-act-tab" data-toggle="tab" href="#fact-act" role="tab" aria-controls="fact-act" aria-selected="false">Factores Actuales</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                                        <div class="tab-pane fade show active" id="ant-ant" role="tabpanel" aria-labelledby="ant-ant-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Patologías generales</label>
                                                                                                                            <select name="ant_pat_gen_emb_previos" id="ant_pat_gen_emb_previos" data-titulo="Apreciación Respiratoria" data-seccion="Riesgo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ant_pat_gen_emb_previos','div_detalle_ant_pat_gen_emb_previos','det_ant_pat_gen_emb_previos',2)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">NO</option>
                                                                                                                                <option value="2">SI</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"   id="div_detalle_ant_pat_gen_emb_previos" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Detalle Patologías generales</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Patologías generales" data-seccion="Riesgo"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_ant_pat_gen_emb_previos" id="det_ant_pat_gen_emb_previos"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Patologías del Embarazo</label>
                                                                                                                            <select name="pat_emb_prev" id="pat_emb_prev" data-titulo="Patologías del Embarazo" data-seccion="Riesgo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pat_emb_prev','div_detalle_pat_emb_prev','obs_pat_emb_prev',2)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">NO</option>
                                                                                                                                <option value="2">SI</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"  id="div_detalle_pat_emb_prev" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Detalle  Patologías del Embarazo</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Patologías del Embarazo" data-seccion="Riesgo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pat_emb_prev" id="obs_pat_emb_prev"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Generales Patologías del Embarazo" data-seccion="Riesgo" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_general_nariz" id="obs_ex_general_nariz"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="tab-pane fade" id="fact-act" role="tabpanel" aria-labelledby="fact-act-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Patologías generales</label>
                                                                                                                            <select name="ant_pat_gen_emb_act" id="ant_pat_gen_emb_act" data-titulo="Patologías generales" data-seccion="Riesgo Actuál" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ant_pat_gen_emb_act','div_detalle_ant_pat_gen_emb_act','obs_ant_pat_gen_emb_act',2)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">NO</option>
                                                                                                                                <option value="2">SI</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"   id="div_detalle_ant_pat_gen_emb_act" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Detalle Patologías generales</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Patologías generales" data-seccion="Riesgo Actuál"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ant_pat_gen_emb_act" id="obs_ant_pat_gen_emb_act"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Patologías del Embarazo</label>
                                                                                                                            <select name="pat_emb_act" id="pat_emb_act" data-titulo="Apreciación Respiratoria" data-seccion="Riesgo Actuál" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pat_emb_act','div_detalle_pat_emb_act','obs_pat_emb_act',2)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">NO</option>
                                                                                                                                <option value="2">SI</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"  id="div_detalle_pat_emb_act" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Detalle  Patologías del Embarazo</label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Riesgo Actuál" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pat_emb_act" id="obs_pat_emb_act"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-row">
                                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                    <label class="floating-label-activo-sm">Observaciones </label>
                                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Riesgo Actuál" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_nasal" id="obs_ex_nasal"></textarea>
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
                                                                        <div class="tab-pane fade show" id="emb_actual" role="tabpanel" aria-labelledby="emb_actual-tab">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-2">
                                                                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                                        <a class="nav-link-aten text-reset active" id="emb_fpp-tab" data-toggle="tab" href="#emb_fpp" role="tab" aria-controls="emb_fpp" aria-selected="false"> Semanas y FPP</a>
                                                                                                        <a class="nav-link-aten text-reset" id="emb_madre-tab" data-toggle="tab" href="#emb_madre" role="tab" aria-controls="emb_madre" aria-selected="true">Madre</a>
                                                                                                        <a class="nav-link-aten text-reset" id="emb_feto-tab" data-toggle="tab" href="#emb_feto" role="tab" aria-controls="emb_feto" aria-selected="false">Gestación</a>

                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                                        <div class="tab-pane fade" id="emb_madre" role="tabpanel" aria-labelledby="emb_madre-tab"><br>
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Ex. mamas</label>
                                                                                                                            <select name="emb_mad_mamas" id="emb_mad_mamas" class="form-control form-control-sm" data-titulo="Ex. mamas"  data-seccion="Madre mamas"  onchange="evaluar_para_carga_detalle('emb_mad_mamas','div_detalle_emb_mad_mamas','detalle_emb_mad_mamas',2)">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">Normales</option>
                                                                                                                                <option value="2">Alteradas</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group"  id="div_detalle_emb_mad_mamas" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Obs.Ex. mamas <i>Describa</i> </label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs.Ex. mamas"  data-seccion="Madre mamas"   onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_emb_mad_mamas" id="detalle_emb_mad_mamas"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Examen Ginecológico</label>
                                                                                                                            <select name="emb_mater_ginecologico" id="emb_mater_ginecologico" data-titulo="Examen Ginecológico"  data-seccion="Madre mamas"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('emb_mater_ginecologico','div_detalle_emb_mater_ginecologico','obs_emb_mater_ginecologico',2);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">Normal</option>
                                                                                                                                <option value="2">Anormal</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_emb_mater_ginecologico" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Obs.Examen Ginecológico <i>Describa</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Obs.Examen Ginecológico"  data-seccion="Madre mamas"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_emb_mater_ginecologico" id="obs_emb_mater_ginecologico"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Altura Uterina</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="alt_uter_emb" id="alt_uter_emb">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl36">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Otros</label>
                                                                                                                            <select name="emb_mater_otros" id="emb_mater_otros" data-titulo="Otros"  data-seccion="Madre mamas"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('emb_mater_otros','div_detalle_emb_mater_otros','obs_emb_mater_otros',2);">
                                                                                                                                <option value="0">Seleccione</option>
                                                                                                                                <option value="1">No</option>
                                                                                                                                <option value="2">Si</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="form-group" id="div_detalle_emb_mater_otros" style="display:none">
                                                                                                                            <label class="floating-label-activo-sm">Otros <i>Describa</i></label>
                                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Otros"  data-seccion="Madre mamas"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_emb_mater_otros" id="obs_emb_mater_otros"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="tab-pane fade " id="emb_feto" role="tabpanel" aria-labelledby="emb_feto-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">LCF</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="fur_fpp" id="fur_fpp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Contracciones</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="fur_fpp" id="fur_fpp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Tamaño</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="fur_fpp" id="fur_fpp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">Alt uterina</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="fur_fpp" id="fur_fpp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                        <label class="floating-label-activo-sm">Observaciones Examen Fetal</label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Fetal" data-seccion="Feto" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_laringeo" id="obs_ex_laringeo"></textarea>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="tab-pane fade show active" id="emb_fpp" role="tabpanel" aria-labelledby="emb_fpp-tab">
                                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">FUR</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="fur_fpp" id="fur_fpp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">FPP por FUR</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="fur_fpp" id="fur_fpp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">FPP por ECO</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="fur_fpp" id="fur_fpp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <label class="floating-label-activo-sm">FPP por Alt uterina</label>
                                                                                                                            <input type="text" class="form-control form-control-sm" name="fur_fpp" id="fur_fpp">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-row">
                                                                                                                    <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                                                        <label class="floating-label-activo-sm">Observaciones FPP</label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones FPP" data-seccion="Feto" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_laringeo" id="obs_ex_laringeo"></textarea>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="ind_eco_control();"><i class="feather icon-plus"></i> Solicitar Ecografía</button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div><br>
                                                                                            {{--  <div class="row">
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Cargar ficha tipo Faringo-Laringe</label>
                                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_of" onchange="cargar_info_ficha_tipo_oft_fo('select_ficha_tipo_especialidad_of','descripcion_ficha_tipo_especialidad_of');">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            @if(!empty($fichaTipo['fo']))
                                                                                                                @foreach ($fichaTipo['fo'] as $ft )
                                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 col-md-4">
                                                                                                    <span id="descripcion_ficha_tipo_especialidad_of"></span>
                                                                                                </div>

                                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-fo','registro_f_t_oft_detalle','fo');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Faringo-Laringe</button>
                                                                                                </div>
                                                                                            </div>  --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade show" id="plan_obst" role="tabpanel" aria-labelledby="plan_obst-tab">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                                    <form>
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-md-4">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <input type="hidden" name="tratamiento" id="tratamiento" value="">
                                                                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                                                                <input type="checkbox" id="tratamiento_check" name="tratamiento_check" value="" />
                                                                                                                                <label for="tratamiento_check" class="cr"></label>
                                                                                                                            </div>
                                                                                                                            <label>Solo Control rutinario</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-4">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <input type="hidden" name="lentes" id="lentes" value="">
                                                                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                                                                <input type="checkbox" id="lentes_check" name="lentes_check" value="" />
                                                                                                                                <label for="lentes_check" class="cr"></label>
                                                                                                                            </div>
                                                                                                                            <label>Envia a embarazo alto riesgo</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="form-group col-md-4">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <input type="hidden" name="cirugia" id="cirugia" value="">
                                                                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                                                                <input type="checkbox" id="cirugia_check" name="cirugia_check" value="" />
                                                                                                                                <label for="cirugia_check" class="cr"></label>
                                                                                                                            </div>
                                                                                                                            <label>Solicitar Hospitalización</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Obs. Plan de tratamiento</label>
                                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tratamiento" id="obs_plan_tratamiento"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-md-4">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="ind_terapia();"><i class="feather icon-plus"></i> Plan de tratamiento</button>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="ind_ic_psi();"><i class="feather icon-plus"></i> Indicar Interconsulta Siquiatría</button>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="informe_psi();"><i class="feather icon-plus"></i> Enviar Informe</button>
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
                                                                        @include('general.hospitalizacion.hospitalizar')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--EXAMEN ESPECIALIDAD PUERPERIO - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                        Examen Puerpério
                                                    </button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                                    <div class="card-body-aten-a">

                                                        <!--FICHA DE ATENCIÓN OBSTÉTRICA-->
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-2">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="tipo_de_parto_cesarea">
                                                                    <label class="custom-control-label text-primary" for="tipo_de_parto_cesarea"><strong><u>Parto Vía Cesárea</u></strong></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-2">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="tipo_de_parto_normal">
                                                                    <label class="custom-control-label text-primary" for="tipo_de_parto_normal"><strong><u>Parto Vaginal</u></strong></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                <label class="floating-label">Herida operatória</label>
                                                                <input type="text" class="form-control form-control-sm" name="hda_cesarea" id="hda_cesarea">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                <label class="floating-label">Retiro de puntos curación</label>
                                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                <label class="floating-label">Inspección abdominal</label>
                                                                <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                <label class="floating-label">Tacto vaginal</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                <label class="floating-label">Mamas</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="no_disponible();"><i class="fa fa-plus"></i> Ver protocólo operatorio</button>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="no_disponible();"><i class="fa fa-plus"></i> Ver carne de alta</button>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="ma_sol_examenes();"><i class="fa fa-plus"></i> Solicitar examenes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Formulario / Signos vitales y otros-->
                                        @include('general.secciones_ficha.signos_vitales')
                                        <!--Cierre: Formulario / Signos vitales y otros-->
                                        <!--Diagnóstico-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="diagnostico">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                        Diagnóstico
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis" name="hip-diag_spec" id="hip-diag_spec" onchange="cargarIgual('hip-diag_spec')" >
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Indicaciones</label>
                                                                <input type="text" class="form-control form-control-sm" name="ind_orl" id="ind_orl">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,lic_descripcion_cie" name="descripcion_cie_esp" id="descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie_esp')">
                                                                <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,lic_descripcion_cie" name="id_descripcion_cie_esp" id="id_descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie_esp')">
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
                        <!--ATENCIÓN NIÑO SANO-->
                        @include('general.secciones_ficha.pediatria.controlninosano')

                        <!-- FICHA ATENCIÓN PUÉRPERA-->
                        <div class="tab-pane fade " id="puerperio" role="tabpanel" aria-labelledby="puerperio-tab">
                            <div class="row bg-white shadow-sm rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Ficha de atención Puérpera</h6>
                                            <hr>
                                        </div>
                                    </div>
                                   <!--MOTIVO DE CONSULTA-->
                                     <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="motcon-puer">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#motcon-puer-c" aria-expanded="false" aria-controls="motcon-puer-c">
                                                        Motivo de consulta
                                                    </button>
                                                </div>
                                                <div id="motcon-puer-c" class="collapse" aria-labelledby="motcon-puer" data-parent="#motcon-puer">
                                                    <div class="card-body-aten shadow-none">
                                                        <form>
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                    <label class="floating-label-activo-sm">Embarazo</label>
                                                                    <div class="form-group fill">
                                                                        <select class="form-control form-control-sm" id="embarazo" name="embarazo">
                                                                            <option>Seleccione</option>
                                                                            <option>Embarazo Controlado Normal</option>
                                                                            <option>Embarazo Controlado Patológico</option>
                                                                            <option>Embarazo No Controlado</option>
                                                                            <option>Otra</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                    <label class="floating-label-activo-sm">Tipo de parto</label>
                                                                    <div class="form-group fill">
                                                                        <select class="form-control form-control-sm" id="tipo_parto" name="tipo_parto">
                                                                            <option>Seleccione</option>
                                                                            <option>Parto Normal</option>
                                                                            <option>Cesarea Electiva</option>
                                                                            <option>Cesarea Urgencia</option>
                                                                            <option>Fórceps</option>
                                                                            <option>Otra</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                    <label class="floating-label-activo-sm">Fecha Parto</label>
                                                                    <input type="date" class="form-control form-control-sm" name="f_parto" id="f_parto">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                    <label class="floating-label-activo-sm">Anmnésis</label>
                                                                    <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="anamnesis" id="anamnesis"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                    <label class="floating-label-activo-sm">Estado Emocional</label>
                                                                    <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="anamnesis" id="anamnesis"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                    <label class="floating-label-activo-sm">Lactancia</label>
                                                                    <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="anamnesis" id="anamnesis"></textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--ANTECEDETES GINECO-OBSTÉTRICOS-->
                                     <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="ago-puer">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#ago-puer-c" aria-expanded="false" aria-controls="ago-puer-c">
                                                        Antecedetes Gineco-obstétricos
                                                    </button>
                                                </div>
                                                <div id="ago-puer-c" class="collapse" aria-labelledby="ago-puer" data-parent="#ago-puer">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-block mb-2" onclick="ciclo();"></i>Ciclo menstrual</button>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-block mb-2" onclick="anticoncep();"></i>Met. Anticonceptivos</button>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-block mb-2" onclick="embarazos();"></i>Embarazos</button>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-block mb-2" onclick="mamas_ant();"></i>Mamas</button>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-block mb-2" onclick="hormonas();"></i>Ex. Hormonales</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--CONTROL PERPUERAL-->
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="control-puer">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#control-puer-c" aria-expanded="false" aria-controls="control-puer-c">
                                                        Control perpueral
                                                    </button>
                                                </div>
                                                <div id="control-puer-c" class="collapse" aria-labelledby="control-puer" data-parent="#control-puer">
                                                    <div class="card-body-aten shadow-none">
                                                        <form>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-2">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="tipo_de_parto_cesarea">
                                                                        <label class="custom-control-label text-primary" for="tipo_de_parto_cesarea"><strong><u>Parto Vía Cesárea</u></strong></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-2">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="tipo_de_parto_normal">
                                                                        <label class="custom-control-label text-primary" for="tipo_de_parto_normal"><strong><u>Parto Vaginal</u></strong></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                    <label class="floating-label">Herida operatória</label>
                                                                    <input type="text" class="form-control form-control-sm" name="hda_cesarea" id="hda_cesarea">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                    <label class="floating-label">Retiro de puntos curación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                    <label class="floating-label">Inspección abdominal</label>
                                                                    <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                    <label class="floating-label">Tacto vaginal</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                    <label class="floating-label">Mamas</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="protocolo();"><i class="fa fa-plus"></i> Ver protocólo operatorio</button>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="carne_alta();"><i class="fa fa-plus"></i> Ver carne de alta</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Signos vitales-->
                                    <div class="row">
                                        <!--Formulario / Signos vitales y otros-->
                                        @include('general.secciones_ficha.signos_vitales')
                                        <!--Cierre: Formulario / Signos vitales y otros-->
                                    </div>

                                    <!--Diagnóstico-->
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <div class="card-header" id="diagno">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#diagno_c" aria-expanded="false" aria-controls="diagno_c">
                                                    Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagno_c" class="collapse" aria-labelledby="diagno" data-parent="#diagno">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                            <input type="text" class="form-control form-control-sm"  data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis" name="hip-diag_spec" id="hip-diag_spec" onchange="cargarIgual('hip-diag_spec')" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm">Indicaciones</label>
                                                            <input type="text" class="form-control form-control-sm" name="ind_orl" id="ind_orl">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                            <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,lic_descripcion_cie" name="descripcion_cie_esp" id="descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie_esp')">
                                                            <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,lic_descripcion_cie" name="id_descripcion_cie_esp" id="id_descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie_esp')">
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
                        <div class="bg-white shadow-none rounded mx-1 p-15">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                            <hr>
                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Ecografía Obstétrica-->
<!-- <div id="ecoobstetricacons_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ecoecoobstetricacons_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Ecografía Obstétrica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="eco_gine"></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body" id="form_ecoobt">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <script>
                                                var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                                var f=new Date();
                                                document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                            </script>
                                        </div>
                                            <div class="form-group col-md-6" id="">
                                            <label class="floating-label-activo-sm">Tipo de Eco</label>
                                            <div class="form-group fill">
                                                <select class="form-control form-control-sm" id="tipo" name="tipo">
                                                    <option>Seleccione</option>
                                                    <option>Trans-vaginal</option>
                                                    <option>Abdominal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3" id="">
                                            <label class="floating-label-activo-sm">Derivada por:</label>
                                            <div class="form-group fill">
                                                <select class="form-control form-control-sm" id="solicitante" name="solicitante">
                                                    <option>Seleccione</option>
                                                    <option>Propia</option>
                                                    <option>Dr/a</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3" id="">
                                            <label class="floating-label-activo-sm">Profesional solicitante</label>
                                            <input type="text" class="form-control form-control-sm" id="nombre_solicitante" name="nombre_solicitante">
                                        </div>
                                        <div class="form-group col-md-3" id="">
                                            <label class="floating-label-activo-sm">Motivo</label>
                                            <div class="form-group fill">
                                                <select class="form-control form-control-sm" id="motivo" name="motivo">
                                                    <option>Seleccione</option>
                                                    <option>Examen de Rutina</option>
                                                    <option>Control Embarazo Normal</option>
                                                    <option>Control Embarazo Patológico</option>
                                                    <option>Otra</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3" id="">
                                            <label class="floating-label-activo-sm">Motivo </label>
                                            <input type="text" class="form-control form-control-sm" name="desc_motivo" id="desc_motivo">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">FUR</label>
                                            <input type="date" class="form-control form-control-sm" name="fur" id="fur">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">FPP:</label>
                                            <input type="date" class="form-control form-control-sm" name="fpp" id="fpp">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Edad Gestacional</label>
                                            <input type="text" class="form-control form-control-sm" name="e_gest" id="e_gest">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Nº de Gestación:</label>
                                            <input type="text" class="form-control form-control-sm" name="num_gest" id="num_gest">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Longitud Cráneo-Caudal:</label>
                                            <input type="text" class="form-control form-control-sm" name="num_gest" id="num_gest">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Diametro Cefálico:</label>
                                            <input type="text" class="form-control form-control-sm" name="Diametro_cef" id="Diametro_cef">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Estimación del peso Fetal</label>
                                            <input type="text" class="form-control form-control-sm" name="peso_fetal" id="peso_fetal">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Edad Gestacional por Ecografía</label>
                                                <input type="text" class="form-control form-control-sm" name="edad_ecografia" id="edad_ecografia">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Placenta</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="placenta" id="placenta"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Liquido Amniótico</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="liq_amniotico" id="liq_amniotico"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Sexo</label>
                                            <input type="text" class="form-control form-control-sm" name="sexo" id="sexo">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Diagnóstico Ecográfico</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="dg_ecografico" id="dg_ecografico"></textarea>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Observaciones</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_eco" id="obs_eco"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h6 class="float-left d-inline">SUBIR IMAGENES</h6>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input size="80" name="archivo_up" id="archivo_up" type="file" onchange="javascript: submit();">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-success has-ripple">Guardar<span class="ripple ripple-animate" style="height: 94.375px; width: 94.375px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -33.6875px; left: -14.3125px;"></span></button>
                                            <button class="btn btn-primary" align:center>Ver formulario PDF</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal Examen Clínico de mamas -->
<!-- <div id="modal_mamas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_mamas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_mamas">Examen Clínico de mamas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">

                                <img src="{{ asset('images/gineco_obst/ex.mamas.png') }}" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-sm-8 mt-2">
                            <div class="row">
                                <div class="col-sm-12 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Seleccione lado</label>
                                        <select class="form-control form-control-sm" id="" name="">
                                            <option>Seleccione </option>
                                            <option>Mama Derecha</option>
                                            <option>Mama Izquierda</option>
                                            <option>Ambas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Descripción del Examen</label>
                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamas" id="des_ex_mamas"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Seleccione lado</label>
                                        <select class="form-control form-control-sm" id="" name="">
                                            <option>Seleccione </option>
                                            <option>Mama Derecha</option>
                                            <option>Mama Izquierda</option>
                                            <option>Ambas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Descripción del Examen</label>
                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamas1" id="des_ex_mamas1"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-2">
                            <div class="form-group">
                                <label id="" name="" class="floating-label-activo-sm">Descripción General del Examen</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamasgen" id="des_ex_mamasgen"></textarea>
                            </div>
                        </div>

                            <div class="col-sm-12 mt-2">
                                <h6>Solicitar Examen</h6>
                            </div>

                        <hr>

                            <div class="col-sm-4 mt-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Seleccione lado</label>
                                    <select class="form-control form-control-sm" id="" name="">
                                        <option>Seleccione </option>
                                        <option>Mama Derecha</option>
                                        <option>Mama Izquierda</option>
                                        <option>Ambas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-2">
                                <div class="form-group">
                                    <label id="" name="" class="floating-label-activo-sm">Tipo de Examen</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione opción</option>
                                        <option>Mamografía</option>
                                        <option>Mamografía Digital con contraste</option>
                                        <option>Mamografía Tridimensional</option>
                                        <option>Ecografía mamaria</option>
                                        <option>Resonancia Magnética de Mama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-2">
                                <div class="form-group">
                                    <label id="" name="" class="floating-label-activo-sm">Énfasis Cuadrante o Zona</label>
                                    <select class="form-control form-control-sm" id="" name="">
                                        <option>Seleccione</option>
                                        <option>Cola</option>
                                        <option>S. Interno</option>
                                        <option>S. Externo</option>
                                        <option>S. Interno</option>
                                        <option>S. Externo</option>
                                        <option>Areola</option>
                                        <option>Pezón</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-12 mt-2">
                                <h6>Sospecha Diagnóstica</h6>
                            </div>

                        <hr>

                            <div class="col-sm-4 mt-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sospecha Diagnóstica</label>
                                    <select class="form-control form-control-sm" id="" name="">
                                        <option>Seleccione </option>
                                        <option>Examen de Rutina</option>
                                        <option>Estudio de lesión</option>
                                        <option>Seguimiento de lesión</option>
                                        <option>Otra</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8 mt-1">
                                <div class="form-group">
                                    <label id="" name="" class="floating-label-activo-sm">Solicitud Especial</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="sol_ex_mamasgen" id="sol_ex_mamasgen"></textarea>
                                </div>
                            </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info"> Guardar</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal EXAMEN P-A-P -->
<!-- <div id="m_exesppap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_exesppap" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">
                EXAMEN P-A-P</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                                </input>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm>Nº de Orden"</label>
                                <input type="number" name="" id="" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Examen de PAP</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option>Examen de PAP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Sospecha Clínica</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option>Examen de rutina</option>
                                    <option>Lesión Cervical Pequeña</option>
                                    <option>Lesión Cervical grande</option>
                                    <option>Papilomatosis</option>
                                    <option>Ca Cervico-Uterino</option>
                                     <option>Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Urgencia</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option>Urgente</option>
                                    <option>Urgencia prioridad</option>
                                    <option>Urgencia normal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pap" id="obs_pap"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-12 mt-3">
                        <!- -**** Al agregar un examen, se debe cargar la tabla *****- ->
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº Orden</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">sospecha</th>
                                         <th class="text-center align-middle">Urgencia</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                            <td class="text-center align-middle">7217821</td>
                                            <td class="text-center align-middle">pap</td>
                                            <td class="text-center align-middle">Ca Cervico-uterino</td>
                                            <td class="text-center align-middle">Urgente</td>
                                            <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal Antecedentes  Mamas -->
<!-- <div id="mamas_ant_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mamas_ant_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes  Mamas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_2" class="text-primary" style="cursor: pointer;">Añadir Nuevo Antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_2" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Tipo de Examen</label>
                                    <input type="text" class="form-control form-control-sm" name="proc_ant" id="proc_ant">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Resultado</label>
                                    <input type="text" class="form-control form-control-sm" name="proc_ant" id="proc_ant">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Indicaciones</label>
                                    <input type="text" class="form-control form-control-sm" name="proc_ant" id="proc_ant">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group fill col-sm-8">
                                    <label class="floating-label-activo-sm">Tratamientos o complicaciones</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" name="otros_ant" id="otros_ant"></textarea>
                                </div>
                                <div class="form-group fill col-sm-4">
                                    <button type="button" class="btn btn-success btn-sm btn-block">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="hemorragias_dental" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Tipo de Examen</th>
                                        <th class="text-center align-middle">Resultado</th>
                                        <th class="text-center align-middle">Indicaciones</th>
                                        <th class="text-center align-middle">Tratamientos complicaciones - otros</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">00/00/0000</td>
                                        <td class="text-center align-middle">Mamografía</td>
                                        <td class="text-center align-middle">Normal</td>
                                        <td class="text-center align-middle">Control Anual
                                        </td>
                                        <td class="text-center align-middle">No</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

@include('atencion_otros_prof.formularios.modal_atencion_especialidad.matrona.sol_exam_matrona')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.matrona.m_examen_mamas')
@include('general.modal.modal_no_disponible')
{{--  @include('atencion_pediatrica.formularios.modal_atencion_especialidad.gineco_obst.modal_embriesgo')  --}}
{{--  @include('atencion_pediatrica.formularios.modal_atencion_especialidad.gineco_obst.modal_mamas_ant')  --}}
{{--  @include('atencion_pediatrica.formularios.modal_atencion_especialidad.gineco_obst.modal_hormonas')  --}}

{{--  @include('atencion_pediatrica.formularios.modal_atencion_especialidad.gineco_obst.m_exesppap')  --}}
{{--  @include('atencion_pediatrica.formularios.modal_atencion_especialidad.gineco_obst.eco_obstetrica')  --}}
{{--  @include('atencion_pediatrica.formularios.modal_atencion_especialidad.gineco_obst.modal_mamas')  --}}

{{--  @include('atencion_pediatrica.formularios.modal_atencion_especialidad.gineco_obst.modal_ciclo')  --}}
{{--  @include('atencion_pediatrica.formularios.modal_atencion_especialidad.gineco_obst.modal_anticonceptivo')  --}}


@section('page-script-ficha-atencion')
<script>
    // function pap() {
    //     $('#m_exesppap').modal('show');
    // }
</script>
<script>
        $(document).ready(function() {

            $('#hip-diag_spec').keyup(function(){
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
            {{--  var tipo = $('#'+select+'').val();  --}}
            $('#'+div_destino).html('');
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){
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
                    html +='<div class="col-md-4">Detalle</div>';
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
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
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
                    registro_f_t_orl_descripcion :  data.registro_f_t_orl_descripcion,
                    registro_f_t_orl_nombre :  data.registro_f_t_orl_nombre,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
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
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}
                        if(index == 'id_usa_audifono')
                            index = 'usa_audifono';

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                    evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                    evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                    evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                    evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                    evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
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

        var myDropzone_eco_obstetricia ;
    Dropzone.options.misImagenesEcoObstetricia = {
        init:function()
        {
            myDropzone_eco_obstetricia = this;
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
            cargar_lista_imagenes(myDropzone_eco_obstetricia, 'eco_obst');

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
            cargar_lista_imagenes(myDropzone_eco_obstetricia, 'eco_obst');
            return this._updateMaxFilesReachedClass();
        },
        canceled: function canceled(file) {
            cargar_lista_imagenes(myDropzone_eco_obstetricia, 'eco_obst');
            return this.emit("error", file, this.options.dictUploadCanceled);
        },
    };

</script>
@endsection


