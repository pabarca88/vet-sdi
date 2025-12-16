<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_matrona-tab" data-toggle="tab" href="#atencion_matrona" role="tab" aria-controls="atencion_matrona" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ns-tab" data-toggle="tab" href="#ns" role="tab" aria-controls="ns" aria-selected="false">Control Niño Sano</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="atencion_fert-tab" data-toggle="tab" href="#atencion_fert" role="tab" aria-controls="atencion_fert" aria-selected="false">Control Fertilidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="atencion-obst-tab" data-toggle="tab" href="#atencion-obst" role="tab" aria-controls="atencion-obst" aria-selected="false">Control Embarazo</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="puerperio-tab" data-toggle="tab" href="#puerperio" role="tab" aria-controls="puerperio" aria-selected="false">Puerperio</a>
                    </li>
                    {{--  <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="bio-tab" data-toggle="tab" href="#bio" role="tab" aria-controls="bio" aria-selected="false">Biomicroscopía</a>
                    </li>  --}}
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
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    @csrf
                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_matrona" role="tabpanel" aria-labelledby="atencion_matrona-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Ficha de atención general</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->
                                        <!--Motivo consulta-->
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="motivo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3" id="">
                                                                <label class="floating-label-activo-sm">Motivo</label>
                                                                <div class="form-group">
                                                                    <select class="form-control form-control-sm" id="motivo" name="motivo">
                                                                        <option>Seleccione</option>
                                                                        <option>Control Fertilidad</option>
                                                                        <option>Examen de Diagnóstico Embarazo</option>
                                                                        <option>Control Embarazo Normal</option>
                                                                        <option>Control Embarazo Patológico</option>
                                                                        <option>Otra</option>
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
                                        <!--EXAMEN ESPECIALIDAD MATRONA - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                        Examen especialidad
                                                    </button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
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
                                                        <div id="form-gineco_obst">
                                                            <div class="form-row">
                                                                <div class="row bg-white shadow-sm rounded mx-1">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 mt-3 mb-0">
                                                                                <h6 class="f-16 text-c-blue">Ficha de atención Obstétrica</h6>
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <!--Formulario / Antecedentes-->
                                                                            <div class="col-md-12">

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-4">
                                                                                        <div class="col-sm-12" style="text-align:center">
                                                                                            <h6>Antecedentes Generales</h6>
                                                                                        </div>
                                                                                        <div class="card-body">
                                                                                            <form>
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-md-12 mx-auto">
                                                                                                        <label class="floating-label-activo-sm">Descripción</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="descripcion_antecedentes" id="descripcion_antecedentes"placeholder="Ingrese Nuevo Antecedente"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-sm-8">

                                                                                            <div class="col-sm-12" style="text-align:center">
                                                                                                <h6>Antecedentes Obst&eacute;tricos</h6>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <form>
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="embarazos();"></i>Emb. Anteriores</button>
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="riesgo_emb();"></i>Fact.de Riesgo</button>
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="mamas_ant();"></i>Mamas</button>
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="hormonas();"></i>Ex.Hormonales</button>
                                                                                                </form>
                                                                                            </div>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group row">

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="card">
                                                                                            <div class="card-header bg-info">
                                                                                                <h6>Examen Ginecol&oacute;gico</h6>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                                <form>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-md-3">
                                                                                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1"  onclick="pap();">PAP</button>
                                                                                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" data-toggle="modal" data-target="#ecoobstetricacons_modal">Ecografía</button>
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-4">
                                                                                                            <label class="floating-label-activo-sm">Examen Externo</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-5">
                                                                                                            <label class="floating-label-activo-sm">Tacto Ginecológico</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="tacto_ginecológico" id="tacto_ginecológico"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="ecoobstetricacons_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ecoecoobstetricacons_modal" aria-hidden="true">
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
                                                                                                                    <h6 id="eco_gine"</h6>
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
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="card">
                                                                                            <div class="card-header bg-info">
                                                                                                <h6>Mamas</h6>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <form>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-md-3">
                                                                                                        <button type="button" class="btn btn-success btn-block btn-sm mt-1" data-toggle="modal" data-target="#modal_mamas">Ex. mamas</button>
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-9">
                                                                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--Cierre: Formulario / Antecedentes-->


                                                                        </div>

                                                                        <hr>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen </label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
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
                                                        Signos vitales y otros
                                                    </button>
                                                </div>
                                                <div id="signosvit-otros-c" class="collapse" aria-labelledby="signosvit-otros" data-parent="#signosvit-otros">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-1">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->temperatura != null)
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
                                                                @if (isset($fichaAtencion) && $fichaAtencion->frecuencia_reposo != null)
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
                                                                @if (isset($fichaAtencion) && $fichaAtencion->estado_nutricional != null)
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
                                        <!--Diagnóstico-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header" id="diagnostico">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                        Diagnóstico
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
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
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        <!--ATENCIÓN NIÑO SANO-->
                        @include('atencion_pediatrica.secciones_especialidad.control_ninosano_matrona')
                        <!--CIERRE: ATENCIÓN NIÑO SANO-->
                        <div class="tab-pane fade" id="atencion_fert" role="tabpanel" aria-labelledby="atencion_fert-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Ficha de atención fertilidad</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->
                                        <!--Motivo consulta-->
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="motivo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Motivo de Consulta</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_consulta" name="descripcion_consulta_orl" id="descripcion_consulta_orl" onchange="cargarIgual('descripcion_consulta_orl');">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                                <input type="text" class="form-control form-control-sm" name="antec_especialidad_orl" id="antec_especialidad_orl">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
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
                                                        <div id="form-Ficha Control fertilidad">
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Ficha Control fertilidad</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Usa Método</label>
                                                                        <select name="usa_metodo" id="usa_metodo" data-titulo="Usa Método" data-seccion="Ficha Control fertilidad"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_metodo','div_detalle_usa_metodo',obs_tolerancia_usa_metodo',2)">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="1">No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_detalle_usa_metodo" style="display:none">
                                                                        <label class="floating-label-activo-sm">Tolerancia</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="obs. Tolerancia" data-seccion="Ficha Control fertilidad" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tolerancia_usa_metodo" id="obs_tolerancia_usa_metodo"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
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
                                                                <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">otro</label>
                                                                            <select name="otro" id="otro" data-titulo="Otro" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otro','div_detalle_otro','obs_otro',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_detalle_otro" style="display:none">
                                                                            <label class="floating-label-activo-sm">Detalle Otro método</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otro" id="obs_otro"></textarea>
                                                                        </div>
                                                                    </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Otro_1</label>
                                                                        <select name="otro_1" id="otro_1" data-titulo="Otro_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otro_1','div_detalle_otro_1','obs_otro_1',2);">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="1">No</option>
                                                                            <option value="2">si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_detalle_otro_1" style="display:none">
                                                                        <label class="floating-label-activo-sm">obs_otro_1</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro_1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otro_1" id="obs_otro_1"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <div class="card">
                                                                                <div class="card-header bg-info">
                                                                                    <h6>Examen Ginecol&oacute;gico</h6>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <form>
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-3">
                                                                                                <button type="button" class="btn btn-success btn-block btn-sm mt-1" data-toggle="modal" data-target="#ecoobstetricacons_modal">Ecografía</button>
                                                                                            </div>
                                                                                            <div class="form-group col-md-4">
                                                                                                <label class="floating-label-activo-sm">Examen Externo</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                                                            </div>
                                                                                            <div class="form-group col-md-5">
                                                                                                <label class="floating-label-activo-sm">Tacto Ginecológico</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="tacto_ginecológico" id="tacto_ginecológico"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            <div id="ecoobstetricacons_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ecoecoobstetricacons_modal" aria-hidden="true">
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
                                                                                                    <h6 id="eco_gine"</h6>
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
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="card">
                                                                                <div class="card-header bg-info">
                                                                                    <h6>Mamas</h6>
                                                                                </div>
                                                                                <div class="card-body text-center">
                                                                                    <form>
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-3">
                                                                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" data-toggle="modal" data-target="#modal_mamas">Ex. mamas</button>
                                                                                            </div>
                                                                                            <div class="form-group col-md-9">
                                                                                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                        @include("atencion_pediatrica.generales.signos_vitales")
                                        <!--Diagnóstico-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header" id="diagnostico">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                        Diagnóstico
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
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
                        <div class="tab-pane fade " id="atencion-obst" role="tabpanel" aria-labelledby="atencion-obst-tab">
                            <div class="row bg-white shadow-sm rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Ficha de atención Obstétrica</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header bg-info align-middle" onclick="abrir_menor_obt();">
                                                    <h6 class="float-left d-inline">Paciente menor de edad</h6>
                                                    <i id="menor_obt" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                                </div>
                                                <div class="card-body" id="form_menorobt" style="display:none">
                                                    <form>
                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6>Información del acompañente</h6>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Rut</label>
                                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Nombre y Apellidos</label>
                                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3" id="">
                                                                <label class="floating-label-activo-sm">Relación</label>
                                                                <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Teléfono</label>
                                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Email</label>
                                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3" id="">
                                                                <label class="floating-label-activo-sm">Ingrese Código</label>
                                                                <input type="text" class="form-control form-control-sm" name="codigo" id="codigo">
                                                            </div>
                                                            <div class="form-group col-md-3" id="">
                                                                <button type="button" class="btn btn-success btn-block btn-sm" onclick="respon();"><i class="fa fa-plus"></i> Autoriza el examen</button>
                                                                <!--genera codigo de aceptación al teléfono del responsable del pago-->
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Cierre: Formulario / Menor de edad-->
                                        <!--Formulario / Motivo consulta-->
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-header bg-info">
                                                            <h6>Motivo Consulta</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-3" id="">
                                                                        <label class="floating-label-activo-sm">Motivo</label>
                                                                        <div class="form-group fill">
                                                                            <select class="form-control form-control-sm" id="motivo" name="motivo">
                                                                                <option>Seleccione</option>
                                                                                <option>Examen de Diagnóstico Embarazo</option>
                                                                                <option>Control Embarazo Normal</option>
                                                                                <option>Control Embarazo Patológico</option>
                                                                                <option>Otra</option>
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
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Cierre: Formulario / Motivo consulta-->
                                        <!--Formulario / Antecedentes-->

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <div class="card">
                                                        <div class="card-header bg-info">
                                                            <h6>Antecedentes Generales</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12 mx-auto">
                                                                        <label class="floating-label-activo-sm">Descripción</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1" name="descripcion_antecedentes" id="descripcion_antecedentes"placeholder="Ingrese Nuevo Antecedente"></textarea>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="card">
                                                        <div class="card-header bg-info">
                                                             <h6>Antecedentes Obst&eacute;tricos</h6>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <form>
                                                                <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="embarazos();"></i>Emb. Anteriores</button>
                                                                <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="riesgo_emb();"></i>Fact.de Riesgo</button>
                                                                <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="mamas_ant();"></i>Mamas</button>
                                                                <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="hormonas();"></i>Ex.Hormonales</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-header bg-info">
                                                            <h6>Examen Ginecol&oacute;gico</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-3">
                                                                        <button type="button" class="btn btn-success btn-block btn-sm mt-1" data-toggle="modal" data-target="#ecoobstetricacons_modal">Ecografía</button>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Examen Externo</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                                    </div>
                                                                    <div class="form-group col-md-5">
                                                                        <label class="floating-label-activo-sm">Tacto Ginecológico</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="tacto_ginecológico" id="tacto_ginecológico"></textarea>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div id="ecoobstetricacons_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ecoecoobstetricacons_modal" aria-hidden="true">
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
                                                                                <h6 id="eco_gine"</h6>
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
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-header bg-info">
                                                            <h6>Mamas</h6>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-3">
                                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" data-toggle="modal" data-target="#modal_mamas">Ex. mamas</button>
                                                                    </div>
                                                                    <div class="form-group col-md-9">
                                                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Cierre: Formulario / Antecedentes-->
                                        <!--Formulario / Signos vitales y otros-->
                                        <div class="col-sm-12">
                                            <div class="card mb-3">
                                                <div class="card-header bg-info align-middle" onclick="abrir_svitales_obt();">
                                                    <h6 class="float-left d-inline">Signos vitales y otros</h6>
                                                    <i id="signos_vitales" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer;"></i>
                                                </div>
                                                <div class="card-body" id="formulario_9" style="display:none;">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-1">
                                                                <label class="floating-label-activo-sm">Tº</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                            <div class="form-group col-md-1">
                                                                <label class="floating-label-activo-sm">Pulso</label>
                                                                <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label-activo-sm">Frec. Reposo</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label-activo-sm">Peso</label>
                                                                <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label-activo-sm">Talla</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label-activo-sm">IMC</label>
                                                                <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label-activo-sm">Estado Nutricional</label>
                                                                <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Presión Arterial</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="p_arterial">
                                                                    <label for="p_arterial" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form_1" style="display:none">
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">BI</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">BD</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">De pié</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Sentado</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Comunicación y traslado</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="com_trasl">
                                                                    <label for="com_trasl" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form_2" style="display:none">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Estado de conciencia</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Lenguaje</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Traslado</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Cierre: Formulario / Signos vitales y otros-->
                                        <!--Formulario / Diagnóstico-->
                                        <div class="col-sm-12 mt-3">
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <h6>Diagnóstico</h6>
                                                </div>
                                                <div class="card-body">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-1">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Cierre: Formulario / Diagnóstico-->
                                    </div>
                                    <div class="row px-3 mt-3 mb-3">
                                        <div class="col-md-6 mx-auto">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="switch switch-success d-inline m-r-10">
                                                            <input type="checkbox" id="enf_cronico" name="check_1" data-toggle="modal" data-target="#form_enfermo_cronico">
                                                            <label for="enf_cronico" class="cr"></label>
                                                        </div>
                                                        <label>¿Es enfermo crónico?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="alert alert-warning" role="alert">
                                                        <table class="table table-borderless mt-0 mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                                    <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                                    <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                                    <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="switch switch-success d-inline m-r-10">
                                                            <input type="checkbox" id="modal_ges">
                                                            <label for="modal_ges" class="cr" data-toggle="modal" data-target="#form_ges"></label>
                                                        </div>
                                                        <label>Ges</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="alert alert-warning my-0" role="alert">
                                                        <table class="table table-borderless mt-0 mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="align-middle pb-1 pt-1">Paciente GES PS.02</td>
                                                                    <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-info">Guardar</button>
                                            <button type="button" class="btn btn-success">Imprimir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="puerperio" role="tabpanel" aria-labelledby="puerperio-tab">
                            <div class="row bg-white shadow-sm rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Ficha de atención Puérpera</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <h6>Motivo Consulta</h6>
                                                </div>
                                                <div class="card-body">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-2" id="">
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
                                                            <div class="form-group col-md-2" id="">
                                                                <label class="floating-label-activo-sm">Tipo De Parto</label>
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
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label-activo-sm">Fecha Parto</label>
                                                                <input type="text" class="form-control form-control-sm" name="f_parto" id="f_parto">
                                                            </div>
                                                            <div class="form-group col-md-6" id="">
                                                                <label class="floating-label-activo-sm">Anmnésis</label>
                                                                <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="anamnesis" id="anamnesis"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6" id="">
                                                                <label class="floating-label-activo-sm">Estado Emocional</label>
                                                                <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="anamnesis" id="anamnesis"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6" id="">
                                                                <label class="floating-label-activo-sm">Lactancia</label>
                                                                <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="anamnesis" id="anamnesis"></textarea>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h6>Control Puerperal</h6>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-sm-6 mt-3 mb-2">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="tipo_de_parto_cesarea">
                                                                <label class="custom-control-label text-primary" for="tipo_de_parto_cesarea"><strong><u>Parto Vía Cesárea</u></strong></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 mt-3 mb-2">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="tipo_de_parto_normal">
                                                                <label class="custom-control-label text-primary" for="tipo_de_parto_normal"><strong><u>Parto Vaginal</u></strong></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Herida operatória</label>
                                                            <input type="text" class="form-control form-control-sm" name="hda_cesarea" id="hda_cesarea">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Retiro de Puntos Curación</label>
                                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                        </div>
                                                        <div class="form-group col-md-4" id="form_0">
                                                            <label class="floating-label">Inspección Abdominal</label>
                                                            <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Tacto Vaginal</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Mamas</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-3" id="form_0">
                                                            <button type="button" class="btn btn-success btn-block btn-sm" onclick="protocolo();"><i class="fa fa-plus"></i> Ver Protocólo Operatorio</button>
                                                        </div>
                                                        <div class="form-group col-md-6" id="form_0">

                                                        </div>
                                                        <div class="form-group col-md-3" id="form_0">
                                                            <button type="button" class="btn btn-success btn-block btn-sm" onclick="carne_alta();"><i class="fa fa-plus"></i> Ver Carne de Alta</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <h6>Antecedentes Gineco_Obst&eacute;tricos</h6>
                                                </div>
                                                <div class="card-body text-center">
                                                    <form>
                                                        <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="ciclo();"></i>Ciclo Menstrual</button>
                                                        <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="anticoncep();"></i>Met Anticonceptivos</button>
                                                        <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="embarazos();"></i>Embarazos</button>
                                                        <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="mamas_ant();"></i>Mamas</button>
                                                        <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="hormonas();"></i>Ex. Hormonales</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @include("atencion_pediatrica.generales.signos_vitales")
                                <!--Diagnóstico-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header" id="diagnostico">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                Diagnóstico
                                            </button>
                                        </div>
                                        <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
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
                    {{--  div de botones  --}}
                    <div class="bg-white shadow-none rounded mx-1 p-15">
                        <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                        @include('atencion_medica.generales.seccion_receta_examen_comunes')
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
                </form>
            </div>
        </div>
    </div>
</div>
<div id="modal_mamas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_mamas" aria-hidden="true">
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

                                <img src="{{ asset('images\ex.mamas.png') }}" class="img-thumbnail">
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
</div>
<div id="m_exesppap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_exesppap" aria-hidden="true">
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
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
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
                            <!--Cierre Tabla-->
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
</div>
<div id="mamas_ant_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mamas_ant_modal" aria-hidden="true">
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
</div>

@section('page-script-ficha-atencion')
<script>
    function pap() {
        $('#m_exesppap').modal('show');
    }
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

</script>
@endsection


