<div class="tab-pane fade" id="neo" role="tabpanel" aria-labelledby="neo-tab">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5  class="text-c-blue f-20">Neonatología</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ul class="nav nav-tabs-secciones mb-2" id="orl" role="tablist">
                <li class="nav-item-secciones">
                    <a class="nav-secciones active text-uppercase" id="neonat_1-tab" data-toggle="tab" href="#neonat_1" role="tab" aria-controls="neonat_1" aria-selected="true">Antecedentes preparto</a>
                </li>
                <li class="nav-item-secciones">
                    <a class="nav-secciones text-uppercase" id="neonat_2-tab" data-toggle="tab" href="#neonat_2" role="tab" aria-controls="neonat_2" aria-selected="false">Antecedentes parto</a>
                </li>
                <li class="nav-item-secciones">
                    <a class="nav-secciones text-uppercase" id="neonat_3-tab" data-toggle="tab" href="#neonat_3" role="tab" aria-controls="neonat_3" aria-selected="false">Examen recién nacido</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                    <!--PREPARTO-->
                    <div class="tab-pane fade show active" id="neonat_1" role="tabpanel" aria-labelledby="neonat_1-tab">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a">
                                        <h6 class="text-c-blue py-2">Antecedentes preparto</h6>
                                    </div>
                                    <div class="card-body-aten-a">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">Semanas gestación</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">Hora inicio </label>
                                                <input type="time" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">Hora termino</label>
                                                <input type="time" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Medicación</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="info_rn_primera impresion" id="info_rn_primera impresion"></textarea>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Exámenes</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="info_rn_primera impresion" id="info_rn_primera impresion"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Monitoreo</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="info_rn_primera impresion" id="info_rn_primera impresion"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Evolución</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="info_rn_primera impresion" id="info_rn_primera impresion"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="floating-label-activo-sm">Diagnóstico Preparto</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <!--CIERRE: PREPARTO-->
                    <!--PARTO-->
                    <div class="tab-pane fade" id="neonat_2" role="tabpanel" aria-labelledby="neonat_2-tab">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a">
                                        <h6 class="text-c-blue py-2">Antecedentes parto</h6>
                                    </div>
                                    <div class="card-body-aten-a">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Tipo de parto</label>
                                                    <input type="text" class="form-control form-control-sm" name="tipo_parto" id="tipo_parto">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Obst&eacute;tra</label>
                                                    <input type="text" class="form-control form-control-sm" id="Obstet" name="Obstet" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Matr&oacute;n/a </label>
                                                    <input type="time" class="form-control form-control-sm" name="Matr" id="Matr">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Hora Inicio</label>
                                                    <input type="time" class="form-control form-control-sm" name="ec_hor" id="fec_hor">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Hora término</label>
                                                    <input type="time" class="form-control form-control-sm" name="ec_hor" id="fec_hor">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Tipo de anestésia</label>
                                                    <input type="text" class="form-control form-control-sm" name="tipo_anest" id="tipo_anest">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">D&oacute;sis Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="dosis_anest" id="dosis_anest">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Incidentes en anestesia</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="incidentes_anest" id="incidentes_anest"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Presentación</label>
                                                    <input type="text" class="form-control form-control-sm" name="presentacion" id="presentacion">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Placenta</label>
                                                    <input type="text" class="form-control form-control-sm" name="placenta" id="placenta">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Cordón</label>
                                                    <input type="text" class="form-control form-control-sm" name="cordón" id="cordón">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Otras observaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="ot_observ" id="ot_observ">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4"> <h6 >SUFRIMIENTO FETAL ?</h6>
                                                        </div>
                                                        <div class="form-group col-md-4"> <h6 >NO</h6> <input type="checkbox"  name="chktrabparto" id="chktrabparto"  value="1" >
                                                        </div>
                                                        <div class="form-group col-md-4"> <h6 >SI</h6> <input type="checkbox"  name="chksuffet" id="chksuffet"  value="1" onchange="javascript:showcontentsuffet()" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div id="contentsuffet" style="display: none;">
                                                        <div class="form-group fill">
                                                            <div class="col-sm-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group fill">
                                                                                    <H6>SUFRIMIENTO FETAL</H6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group fill">
                                                                                    <label class="label" for="name"><h6>BRADICARDIA</h6></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label-activo-sm">Duraci&oacute;n</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="dur_brad">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-3">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label-activo-sm">Frecuencia Cardiaca</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="fec_card" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label-activo-sm">Variabilidad</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="variab_fc">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label-activo-sm">Desaceleraci&oacute;n</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="desaceleracion" >
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-4">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label-activo-sm">Tard&iacute;a</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="des_tardia" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label-activo-sm">monitoreo</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="monitoreo" id="monitoreo"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label-activo-sm">Sin Lat&iacute;do CF</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="sin_lat" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label-activo-sm">Mec&oacute;nio</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="meconio" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label-activo-sm">Observaci&oacute;nes</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_suf_fetal" id="obs_suf_fetal"></textarea>
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
                
                    <!--CIERRE: PARTO-->
                    <!--RECIEN NACIDO-->
                    <div class="tab-pane fade" id="neonat_3" role="tabpanel" aria-labelledby="neonat_3-tab">
                        <div class="row bg-white shadow-none rounded mx-1">
                            <div class="modal-body">
                                <div class="row" id="datos_generales">
                                    <div class="col-md-12">
                                        <div class="card">

                                            <div class="card-header" id="datos_generales_rn">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#datos_generales_rnd" aria-expanded="false" aria-controls="datos_generales_rnd">
                                                        Llenar datos Generales del RN
                                                </button>
                                            </div>
                                            <div id="datos_generales_rnd" class="collapse" aria-labelledby="datos_generales_rn" data-parent="#datos_generales_rn" style="">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="card-body">
                                                            <div class="form-group row">

                                                                <div class="col-sm-3">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Fecha y Hora Parto</label>
                                                                        <input type="date-local" class="form-control form-control-sm" id="fechayhora_nac">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Peso</label>
                                                                        <input type="text" class="form-control form-control-sm" id="peso_nac">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Talla</label>
                                                                        <input type="text" class="form-control form-control-sm" id="talla_nac">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Circunfer&eacute;ncia cran&eacute;ana</label>
                                                                        <input type="text" class="form-control form-control-sm" id="circ_cran">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Sexo</label>
                                                                        <input type="text" class="form-control form-control-sm" id="sexo">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">N° Brazalete</label>
                                                                        <input type="text" class="form-control form-control-sm" id="n_brazalete">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Rasgo_distintivo</label>
                                                                        <input type="text" class="form-control form-control-sm" id="rasgo_dist">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Primera Impresi&oacute;n</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="info_rn_primera impresion" id="info_rn_primera impresion"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Otros</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="info_rn_otro" id="info_rn_otro"></textarea>
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
                                <div class="row" id="apgar_neo">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="apgar_rn">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#apgar_rnd" aria-expanded="false" aria-controls="apgar_rnd">
                                                    APGAR
                                                </button>
                                            </div>
                                            <div id="apgar_rnd" class="collapse" aria-labelledby="apgar_rn" data-parent="#apgar_rn">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="col-sm-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <label class="floating-label">Frec. Cardíaca</label>
                                                                                <input type="text" class="form-control form-control-sm" id="frec_cardiaca">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <label class="floating-label">Frec. Respiratoria</label>
                                                                                <input type="text" class="form-control form-control-sm" id="frec_resp">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <label class="floating-label">Tono</label>
                                                                                <input type="text" class="form-control form-control-sm" id="tono">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <label class="floating-label">Reflejos</label>
                                                                                <textarea class="form-control form-control-sm " rows= "1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <label class="floating-label">Color</label>
                                                                                <input type="text" class="form-control form-control-sm" id="color">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <label class="floating-label">Apgar</label>
                                                                                <input type="text" class="form-control form-control-sm" id="apgar">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="cal_apgar();"><i class="fa fa-plus"></i> Cálculo APGAR</button>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <div class="form-group fill">
                                                                                <input type="checkbox" name="chknoreanimacion" id="chknoreanimacion" value="0" style="margin-right:20px">Reanimaci&oacute;n No
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-header" id="reanimacion">
                                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#datos_generales_rnd" aria-expanded="false" aria-controls="reanimacion_c">
                                                                                    REANIMACIÓN SI (Llenar datos)
                                                                            </button>
                                                                        </div>
                                                                        <div id="reanimacion_c" class="collapse" aria-labelledby="reanimacion" data-parent="#reanimacion" style="">
                                                                            <div class="card-body-aten shadow-none">
                                                                                <div class="form-row">
                                                                                    <div class="card-body">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12">
                                                                                                <div class="form-group fill">
                                                                                                    <label class="label" for="name"><h6>Primera Impresi&oacute;n</h6></label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="primera_impresion" id="primera_impresion"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12">
                                                                                                <div class="form-group fill">
                                                                                                    <label class="label" for="name"><h6>Otros</h6></label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="otros_apgar" id="otros_apgar"></textarea>
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
                                </div>
                                <div class="row" id="ex_fisico">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="ex_fisico_rn">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#ex_fisico_rnd" aria-expanded="false" aria-controls="ex_fisico_rnd">
                                                    Examen Físico del RN
                                                </button>
                                            </div>
                                            <div id="ex_fisico_rnd" class="collapse" aria-labelledby="ex_fisico_rn" data-parent="#ex_fisico_rn" style="">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="card-body">
                                                            <div class="form-group row">

                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkgen" id="chkgen" value="0" style="margin-right:10px;font-size:9px">Asp. General (madurez Llanto Color Nutrici&oacute;n)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_mad" name="campo_mad"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_mad);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chklesiones" id="chklesiones" value="0" style="margin-right:10px;font-size:9px">Pi&eacute;l (Lesi&oacute;n Descarnac. Manchas Pan&iacute;culo)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_piel" name="campo_piel"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_piel);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkcab_cuello" id="chkcab_cuello" value="0" style="margin-right:10px;font-size:9px">Cabeza y Cuello (Def. Cefalo-hematoma)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_piel" name="campo_piel"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_piel);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkanom_infec" id="chkanom_infec" value="0" style="margin-right:10px;font-size:9px">Ojos (Anomal&iacute;as infecci&oacute;nes)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_piel" name="campo_piel"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_piel);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkboca" id="chkboca" value="0" style="margin-right:10px;font-size:9px">Boca Nar&iacute;z O&iacute;dos (Labio Enc&iacute;a Paladar)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_piel" name="campo_piel"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_piel);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chktorax" id="chktorax" value="0" style="margin-right:10px;font-size:9px">Torax Clav&iacute;cula
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_piel" name="campo_piel"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_piel);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkpulm" id="chkpulm" value="0" style="margin-right:10px;font-size:9px">Pulmones
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_pulmones" name="campo_pulmones"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_pulmones);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkcorazon" id="chkcorazon" value="0" style="margin-right:10px;font-size:9px">Coraz&oacute;n)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_corazon" name="campo_corazon"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_corazon);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">

                                                                        <input type="checkbox" name="chkabdomen" id="chkabdomen" value="0" style="margin-right:10px;font-size:9px">Abd&oacute;men
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_abdomen" name="campo_abdomen"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_abdomen);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkgenitales" id="chkgenitales" value="0" style="margin-right:10px;font-size:9px">Genitales
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_genitales" name="campo_genitales"  rows="1" onfocus="this.rows=2" onblur="this.rows=1;guardar(campo_genitales);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkcolumna" id="chkcolumna" value="0" style="margin-right:10px;font-size:9px">Columna
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_columna" name="campo_columna"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_columna);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkmalformaciones" id="chkmalformaciones" value="0" style="margin-right:10px;font-size:9px">Malformaci&oacute;nes
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_malf" name="campo_malf"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_malf);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label">Observaciones Describa</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_observaciones_exfis" name="campo_observaciones_exfis"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_observaciones_exfis);"></textarea>
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
                                <div class="row" id="respiracion">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="respiracion_rn">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#respiracion_rnd" aria-expanded="false" aria-controls="respiracion_rnd">
                                                    Respiración
                                                </button>
                                            </div>
                                            <div id="respiracion_rnd" class="collapse" aria-labelledby="respiracion_rn" data-parent="#respiracion_rn" style="">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Respiración</label>
                                                                <select name="respiracion_neo" data-titulo="Respiracion" id="respiracion_neo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('respiracion_neo','div_respiracion_neo','obs_respiracion_neo',2);">
                                                                    <option selected  value="1">Normal</option>
                                                                    <option value="2">Alterada</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_respiracion_neo" style="display:none;">
                                                                <label class="floating-label-activo-sm">Respiración (describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Respiracion" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_respiracion_neo" id="obs_respiracion_neo"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Frecuencia</label>
                                                                <input type="text" class="form-control form-control-sm" id="frecuencia_resp_rn">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label-activo-sm">Otro Antecedentes Importantes</label>
                                                                        <textarea class="form-control form-control-sm" id="campo_otrosresp_neo" name="campo_otrosresp_neo"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_otrosresp_neo);"></textarea>
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
                                <div class="row" id="neurologico">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="neurologico_rn">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#neurologico_rnd" aria-expanded="false" aria-controls="neurologico_rnd">
                                                    Neurológico
                                                </button>
                                            </div>
                                            <div id="neurologico_rnd" class="collapse" aria-labelledby="neurologico_rn" data-parent="#neurologico_rn" style="">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Actividad</label>
                                                                <select name="actividad" data-titulo="Actividad" id="actividad" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('actividad','div_actividad','obs_actividad',3);">
                                                                    <option selected  value="1">Activo Vigoroso</option>
                                                                    <option value="2">deprimido</option>
                                                                    <option value="3">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_actividad" style="display:none;">
                                                                <label class="floating-label-activo-sm">Actividad (describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Actividad" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_actividad" id="obs_actividad"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Tono</label>
                                                                <select name="tono_rn" data-titulo="Tono" id="tono_rn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tono_rn','div_tono_rn','obs_tono_rn',3);">
                                                                    <option selected  value="1">Adecuado</option>
                                                                    <option value="2">Hipotonico</option>
                                                                    <option value="3">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_tono_rn" style="display:none;">
                                                                <label class="floating-label-activo-sm">Tono (describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Tono" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_rn" id="obs_tono_rn"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Llanto</label>
                                                                <select name="llant_rn" data-titulo="Llanto" id="llant_rn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('llant_rn','div_llant_rn','obs_llant_rn',3);">
                                                                    <option selected  value="1">Activo Vigoroso</option>
                                                                    <option value="2">deprimido</option>
                                                                    <option value="3">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_llant_rn" style="display:none;">
                                                                <label class="floating-label-activo-sm">Llanto(describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Llanto" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_llant_rn" id="obs_llant_rn"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h6>Reflejos</h6>
                                                        </div>
                                                        <hr>
                                                        <div class="col-sm-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Moro</label>
                                                                <select name="moro" data-titulo="Moro" id="moro" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('moro','div_moro','obs_moro',2);">
                                                                    <option selected  value="1">Normal</option>
                                                                    <option value="2">Anormal</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_moro" style="display:none;">
                                                                <label class="floating-label-activo-sm">Moro(describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Moro" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_moro" id="obs_moro"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Prehensi&oacute;n</label>
                                                                <select name="prehension_rn" data-titulo="Prehensión" id="prehension_rn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prehension_rn','div_prehension_rn','obs_prehension_rn',2);">
                                                                    <option selected  value="1">Normal</option>
                                                                    <option value="2">Anormal</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_prehension_rn" style="display:none;">
                                                                <label class="floating-label-activo-sm">Prehensi&oacute;n(describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Prehensión" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prehension_rn" id="obs_prehension_rn"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Espina</label>
                                                                <select name="espina_rn" data-titulo="Espina" id="espina_rn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('espina_rn','div_espina_rn','obs_espina_rn',2);">
                                                                    <option selected  value="1">Normal</option>
                                                                    <option value="2">Anormal</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_espina_rn" style="display:none;">
                                                                <label class="floating-label-activo-sm">Espina(describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Espina" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_espina_rn" id="obs_espina_rn"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Apoyo</label>
                                                                <select name="apoyo_rn" data-titulo="Apoyo" id="apoyo_rn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apoyo_rn','div_apoyo_rn','obs_apoyo_rn',2);">
                                                                    <option selected  value="1">Normal</option>
                                                                    <option value="2">Anormal</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_apoyo_rn" style="display:none;">
                                                                <label class="floating-label-activo-sm">Apoyo(describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Apoyo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_apoyo_rn" id="obs_apoyo_rn"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Marcha</label>
                                                                <select name="marcha_rn" data-titulo="Marcha" id="marcha_rn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('marcha_rn','div_marcha_rn','obs_marcha_rn',3);">
                                                                    <option selected  value="1">Presente</option>
                                                                    <option value="2">ausente</option>
                                                                    <option value="3">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_marcha_rn" style="display:none;">
                                                                <label class="floating-label-activo-sm">Marcha (describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Marcha" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_marcha_rn" id="obs_marcha_rn"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Busqueda</label>
                                                                <select name="busqueda_rn" data-titulo="Busqueda" id="busqueda_rn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('busqueda_rn','div_busqueda_rn','obs_busqueda_rn',2);">
                                                                    <option selected  value="1">Presente</option>
                                                                    <option value="2">ausente</option>
                                                                    <option value="3">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_busqueda_rn" style="display:none;">
                                                                <label class="floating-label-activo-sm">Busqueda (describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Busqueda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_rn" id="obs_busqueda_rn"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" style="color:red;font-weight: bold;">Temblor</label>
                                                                <select name="temblor_rn" data-titulo="Temblor" id="temblor_rn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('temblor_rn','div_temblor_rn','obs_temblor_rn',2);">
                                                                    <option selected  value="1">Ausente</option>
                                                                    <option value="2">Si</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_temblor_rn" style="display:none;">
                                                                <label class="floating-label-activo-sm">Llanto(describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Temblor" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_temblor_rn" id="obs_temblor_rn"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" style="color:red;font-weight: bold;" >Convulsión</label>
                                                                <select name="convulsion_rn" data-titulo="Convulsion" id="convulsion_rn"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('convulsion_rn','div_convulsion_rn','obs_convulsion_rn',3);">
                                                                    <option selected  value="1">Ausente</option>
                                                                    <option value="2">Si</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_convulsion_rn" style="display:none;">
                                                                <label class="floating-label-activo-sm"  style="font-color:red;font-weight: bold;"> >Llanto(describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Convulsion" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_convulsion_rn" id="obs_convulsion_rn"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Otro Antecedentes Importantes</label>
                                                                <textarea class="form-control form-control-sm" id="campo_otrosneuro" name="campo_otrosneuro"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;guardar(campo_otrosneuro);"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="edad_gestacional">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="edad_gestacional_rn">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#edad_gestacional_rnd" aria-expanded="false" aria-controls="edad_gestacional_rnd">
                                                    Edad Gestacional
                                                </button>
                                            </div>
                                            <div id="edad_gestacional_rnd" class="collapse" aria-labelledby="edad_gestacional_rn" data-parent="#edad_gestacional_rn" style="">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="col-sm-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-group row">

                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                    <input type="checkbox" name="chrn_termino" id="chrn_termino" value="0" onclick="rnterm();"style="margin-right:20px">Recién Nacido Término
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                    <input type="checkbox" name="chrn_pretermino" id="chrn_pretermino" value="0" onclick="rnpreterm();"style="margin-right:20px">Recién Nacido Pre-Término
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <input type="checkbox" name="chrn_posttermino" id="chrn_posttermino" value="0" onclick="rnposterm();"style="margin-right:20px">Recién Nacido Post-Término
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <input type="checkbox" name="chkaedad" id="chkaedad" value="0" onclick="a_edad();"style="margin-right:20px">Adecuado a Edad Gestacional
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <input type="checkbox" name="chkpedad" id="chkpedad" value="0" onclick="p_edad();"style="margin-right:20px">Pequeño a Edad Gestacional
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <input type="checkbox" name="chkgedad" id="chkgedad" value="0" onclick="g_edad();"style="margin-right:20px">Grande a Edad Gestacional
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Edad Gestacional por FUR</label>
                                                                            <input type="text" class="form-control form-control-sm" name="edad_gestacional_fur" id="edad_gestacional_fur">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Edad Gestacional por Examen F&iacute;sico</label>
                                                                            <input type="text" class="form-control form-control-sm" name="edad_gestacional_examen" id="edad_gestacional_examen">
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
                                <div class="row" id="referido">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="referido_rn">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#referido_rnd" aria-expanded="false" aria-controls="referido_rnd">
                                                    Referido a:
                                                </button>
                                            </div>
                                            <div id="referido_rnd" class="collapse" aria-labelledby="referido_rn" data-parent="#referido_rn" style="">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Referido a:</label>
                                                                <select name="referido_a" data-titulo="Referido" id="referido_a" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('referido_a','div_referido_a','obs_referido_a',3);">
                                                                    <option selected  value="1">Con su madre</option>
                                                                    <option value="2">Neonatología</option>
                                                                    <option value="3">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_referido_a" style="display:none;">
                                                                <label class="floating-label-activo-sm">Otro (describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Referido" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_referido_a" id="obs_referido_a"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Estado de Salud</label>
                                                                <select name="salud" data-titulo="Salud" id="salud" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('salud','div_salud','obs_salud',2);">
                                                                    <option selected  value="1">RN sano</option>
                                                                    <option value="2">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_salud" style="display:none;">
                                                                <label class="floating-label-activo-sm">Otro (describir)</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Salud" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_salud" id="obs_salud"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Diagnósticos de Traslado</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="dg_traslado_neo" id="dg_traslado_neo"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Indicaciones </label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="indicaciones_neo" id="indicaciones_neo"></textarea>
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
                    <!--CIERRE: RECIEN NACIDO-->
                        {{-- @include('atencion_medica.secciones_especialidad.seccion_ficha_general')


                    {{--  div de botones  --}}
                        {{-- <div class="bg-white shadow-none rounded mx-1 p-15">
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
                    </div>--}}
                </div>
            </form>
        </div>
    </div>

</div>

