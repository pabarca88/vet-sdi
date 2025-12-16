<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="neonat_1-tab" data-toggle="tab" href="#neonat_1" role="tab" aria-controls="neonat_1" aria-selected="true">ANTECEDENTES PREPARTO</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="neonat_2-tab" data-toggle="tab" href="#neonat_2" role="tab" aria-controls="neonat_2" aria-selected="false">ANTECEDENTES PARTO</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="neonat_3-tab" data-toggle="tab" href="#neonat_3" role="tab" aria-controls="neonat_3" aria-selected="false">EXAMEN REC&Iacute;EN NAC&Iacute;DO</a>
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
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">

                    @csrf
                    <div class="tab-content" id="orl-contenido">
                        <!--PREPARTO-->
                        <div class="tab-pane fade show active" id="neonat_1" role="tabpanel" aria-labelledby="neonat_1-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="modal-body"><H5>ANTECEDENTES PREPARTO</H5>
                                    <div class="col-sm-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">SG </label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Hora inicio </label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Hora termino</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-3" id="">
                                                <label class="floating-label">Medicación</label>
                                                <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Examenes</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">evolución</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: PREPARTO-->
                        <!--PARTO-->
                        <div class="tab-pane fade" id="neonat_2" role="tabpanel" aria-labelledby="neonat_2-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="modal-body"><H5>ANTECEDENTES PARTO</H5>
                                    <div class="col-sm-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Obst&eacute;tra</label>
                                                <input type="text" class="form-control form-control-sm" id="Obstet" name="Obstet" >
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Matr&oacute;n/a </label>
                                                <input type="text" class="form-control form-control-sm" name="Matr" id="Matr">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Hora término</label>
                                                <input type="text" class="form-control form-control-sm" name="ec_hor" id="fec_hor">
                                            </div>
                                            <div class="form-group col-md-3" id="">
                                                <label class="floating-label">Tipo de anestésia</label>
                                                <input type="text" class="form-control form-control-sm" name="tipo_anest" id="tipo_anest">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">D&oacute;sis Total</label>
                                                <input type="text" class="form-control form-control-sm" name="dosis_anest" id="dosis_anest">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Placenta</label>
                                                <input type="text" class="form-control form-control-sm" name="placenta" id="placenta">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Cordón</label>
                                                <input type="text" class="form-control form-control-sm" name="cordón" id="cordón">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Otras Otras Observaciones</label>
                                                <input type="text" class="form-control form-control-sm" name="ot_observ" id="ot_observ">
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group fill" style="background-color:#F0F0F0; max-height:40px; border-radius:5 px;">
                                                            <h7 style="color:black;font-weight: bold;padding:10px;margin-right:25px">SUFRIMIENTO FETAL ?</h7> <input type="checkbox"  name="chksuffet" id="chksuffet"  value="1" onchange="javascript:showcontentsuffet()" style="margin-right:10px;margin-left:10px">SI
                                                            <h7 style="color:black;font-weight: bold;padding:10px;margin-right:85px;margin-left:100px"> <input type="checkbox"  name="chktrabparto" id="chktrabparto"  value="1"  style="margin-right:10px;margin-left:10px"> NO
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
                                                                                    <label class="form-control text-center"><H5>SUFRIMIENTO FETAL</H5></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group fill">
                                                                                    <label class="label" for="name"><h6>BRADICARDIA</h6></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label">Duraci&oacute;n</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="Obstet">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-3">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label">Frecuencia Cardiaca</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="Matr" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label">Variabilidad</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="fec_hor">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label">Desaceleraci&oacute;n</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="Obstet" placeholder="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-4">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label">Tard&iacute;a</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="Matr" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="form-group fill">
                                                                                    <label class="floating-label">monitoreo</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group fill">
                                                                                    <label class="label" for="name"><h6>Sin Lat&iacute;do CF</h6></label>
                                                                                        <input type="text" class="form-control form-control-sm" id="est_plac" placeholder="Sin Lat&iacute;do CF">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group fill">
                                                                                    <label class="label" for="name"><h6>Mec&oacute;nio</h6></label>
                                                                                        <input type="text" class="form-control form-control-sm" id="menarquia" placeholder="Mec&oacute;nio">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group fill">
                                                                                    <label class="label" for="name"><h6>Observaci&oacute;nes</h6></label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
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
                                <div class="modal-body"><h5>EXAMEN REC&Iacute;EN NAC&Iacute;DO</h5>
                                    <div class="col-sm-12">
                                        <div class="card mb-12">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">LLENAR DATOS GENERALES REC&Iacute;EN NAC&Iacute;DO</h6>
                                                <i id="datos_rn" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                            </div>
                                            <div class="card-body shadow-none" id="form_1_rn" style="display:none;">
                                                <div class="form-group fill">
                                                            <div class="col-sm-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group fill">
                                                                                        <label class="form-control text-center"><H5>REC&Iacute;EN NAC&Iacute;DO</H5></label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group fill">
                                                                                        <label class="floating-label">Fecha y Hora Parto</label>
                                                                                        <input type="date-local" class="form-control form-control-sm" id="fechayhora_nac">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group fill">
                                                                                        <label class="floating-label">Peso</label>
                                                                                        <input type="text" class="form-control form-control-sm" id="peso_nac">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group fill">
                                                                                        <label class="floating-label">Talla</label>
                                                                                        <input type="text" class="form-control form-control-sm" id="peso_nac">
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
                                                                                        <input type="text" class="form-control form-control-sm" id="circ_cran">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group fill">
                                                                                        <label class="floating-label">N° Brazalete</label>
                                                                                        <input type="text" class="form-control form-control-sm" id="circ_cran">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group fill">
                                                                                        <label class="label" for="name"><h6>Primera Impresi&oacute;n</h6></label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group fill">
                                                                                        <label class="label" for="name"><h6>Otros</h6></label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
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
                                    <div class="col-sm-12">
                                        <div class="card mb-12">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">APGAR</h6>
                                                <i id="apgar" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                            </div>
                                            <div class="card-body shadow-none" id="form_2_ped" style="display:none;">
                                                <div class="form-group fill">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group fill">
                                                                            <label class="form-control text-center"><H5>APGAR</H5></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:20px">Reanimaci&oacute;n Si
                                                                    </div>
                                                                    </div>
                                                                        <div class="col-sm-6">
                                                                        <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:20px">Reanimaci&oacute;n No
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group fill">
                                                                            <label class="floating-label">Frec. Cardíaca</label>
                                                                            <input type="text" class="form-control form-control-sm" id="frec_cardiaca">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group fill">
                                                                            <label class="floating-label">Frec. Respiratoria</label>
                                                                            <input type="text" class="form-control form-control-sm" id="frec_resp">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group fill">
                                                                            <label class="floating-label">Tono</label>
                                                                            <input type="text" class="form-control form-control-sm" id="tono">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group fill">
                                                                            <label class="floating-label">Reflejos</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group fill">
                                                                            <label class="floating-label">Color</label>
                                                                            <input type="text" class="form-control form-control-sm" id="color">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group fill">
                                                                            <label class="floating-label">Apgar</label>
                                                                            <input type="text" class="form-control form-control-sm" id="apgar">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="cal_apgar();"><i class="fa fa-plus"></i> Cálculo APGAR</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card mb-12">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">EX&Aacute;MEN F&Iacute;SICO</h6>
                                                <i id="ex_fis_rn" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                            </div>
                                            <div class="card-body shadow-none" id="form_3_rn" style="display:none;">
                                                <div class="form-group fill">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group fill">
                                                                        <label class="form-control text-center"><H5>EX&Aacute;MEN F&Iacute;SICO</H5></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Asp. General (madurez Llanto Color Nutrici&oacute;n)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_mad" name="campo_mad"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_mad);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Pi&eacute;l (Lesi&oacute;n Descarnac. Manchas Pan&iacute;culo)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_piel" name="campo_piel"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_piel);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Cabeza y Cuello (Def. Cefalo-hematoma)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_piel" name="campo_piel"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_piel);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Ojos (Anomal&iacute;as infecci&oacute;nes)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_piel" name="campo_piel"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_piel);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Boca Nar&iacute;z O&iacute;dos (Labio Enc&iacute;a Paladar)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_piel" name="campo_piel"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_piel);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Torax Clav&iacute;cula
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_piel" name="campo_piel"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_piel);"></textarea>
                                                                    </div>
                                                                </div>
                                                                                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Pulmones
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_pulmones" name="campo_pulmones"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_pulmones);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Coraz&oacute;n)
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_corazon" name="campo_corazon"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_corazon);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Abd&oacute;men
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_abdomen" name="campo_abdomen"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_abdomen);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Genitales
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_genitales" name="campo_genitales"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_genitales);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Columna
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_columna" name="campo_columna"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_columna);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;font-size:9px">Malformaci&oacute;nes
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_malf" name="campo_malf"  rows="1" onfocus="this.rows=2" placeholder="Describa" onblur="this.rows=1;guardar(campo_malf);"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group fill">
                                                                        <textarea class="form-control form-control-sm" id="campo_otros" name="campo_otros"  rows="1" onfocus="this.rows=2" placeholder="Otros" onblur="this.rows=1;guardar(campo_otros);"></textarea>
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
                                    <div class="col-sm-12">
                                        <div class="card mb-12">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">RESPIRACI&Oacute;N</h6>
                                                <i id="resp_rn" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                            </div>
                                            <div class="card-body shadow-none" id="form_4_rn" style="display:none;">
                                                <div class="form-group fill">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group fill">
                                                                        <label class="form-control text-center"><H5>RESPIRACI&Oacute;N</H5></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:20px">NORMAL
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:20px">ANORMAL
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group fill">
                                                                        <input type="text" class="form-control form-control-sm" id="frec_resp" placeholder="FRECUENCIA">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group fill">
                                                                            <textarea class="form-control form-control-sm" id="campo_otros" name="campo_otros"  rows="1" onfocus="this.rows=2" placeholder="Otras Observaciones" onblur="this.rows=1;guardar(campo_otros);"></textarea>
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
                                    <div class="col-sm-12">
                                        <div class="card mb-12">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">EX&Aacute;MEN NEUROL&Oacute;GICO</h6>
                                                <i id="neurol_rn" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                            </div>
                                            <div class="card-body shadow-none" id="form_5_rn" style="display:none;">
                                                    <div class="form-group fill">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group fill">
                                                                                <label class="form-control text-center"><H5>EX&Aacute;MEN NEUROL&Oacute;GICO</H5></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <label class="label" for="name"><h6>Actividad</h6></label>
                                                                                <select  class="form-control form-control-sm" id="campo_actividad" name="campo_432_500" onchange="guardar(campo_actividad)"><option value="xxx">Seleccione</option><option value="xxx">Hipo</option><option value="xxx">Normal</option><option value="xxx">Hiper</option></select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <label class="label" for="name"><h6>Tono</h6></label>
                                                                                <select  class="form-control form-control-sm" id="campo_tono" name="campo_432_500" onchange="guardar(campo_tono)"><option value="xxx">Seleccione</option><option value="xxx">Hipo</option><option value="xxx">Normal</option><option value="xxx">Hiper</option></select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group fill">
                                                                                <label class="label" for="name"><h6>Llanto</h6></label>
                                                                                <select  class="form-control form-control-sm" id="campo_llanto" name="campo_432_500" onchange="guardar(campo_llanto)"><option value="xxx">Seleccione</option><option value="xxx">Normal</option><option value="xxx">Debil</option><option value="xxx">Ausente</option></select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group fill">
                                                                                <h7 style="color:blue;font-weight: bold;margin-right:5px">Moro</h7> Si<input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:5px;margin-left:10px">No <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;margin-left:10px">
                                                                                <h7 style="color:blue;font-weight: bold;margin-right:5px"> Prehensi&oacute;n</h7> Si<input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:5px;margin-left:15px">No <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;margin-left:10px">
                                                                                <h7 style="color:blue;font-weight: bold;margin-right:5px"> Espina </h7>Si<input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:5px;margin-left:15px">No <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;margin-left:10px">
                                                                                <h7 style="color:blue;font-weight: bold;margin-right:5px"> Apoyo </h7>Si<input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:5px;margin-left:15px">No <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;margin-left:10px">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                                <div class="form-group fill">
                                                                                <h7 style="color:blue;font-weight: bold;margin-right:5px">Marcha</h7> Si<input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:5px;margin-left:5px">No <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;margin-left:10px">
                                                                                <h7 style="color:blue;font-weight: bold;margin-right:5px"> Busqueda</h7> Si<input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:5px;margin-left:5px">No <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;margin-left:10px">
                                                                                <h7 style="color:red;font-weight: bold;margin-right:5px"> Temblor </h7>Si<input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:5px;margin-left:5px">No <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;margin-left:10px">
                                                                                <h7 style="color:red;font-weight: bold;margin-right:5px"> Convulsi&oacute;n </h7>Si<input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:5px;margin-left:5px">No <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:10px;margin-left:10px">
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group fill">
                                                                                <textarea class="form-control form-control-sm" id="campo_otrosneuro" name="campo_otrosneuro"  rows="1" onfocus="this.rows=2" placeholder="Otros antec importantes" onblur="this.rows=1;guardar(campo_otrosneuro);"></textarea>
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
                                    <div class="col-sm-12">
                                        <div class="card mb-12">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">EDAD GESTACIONAL</h6>
                                                <i id="eg_rn" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                            </div>
                                            <div class="card-body shadow-none" id="form_6_rn" style="display:none;">
                                                    <div class="form-group fill">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group fill">
                                                                        <label class="form-control text-center"><H5>EDAD GESTACIONAL</H5></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:20px">RNT
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group fill">
                                                                            <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:20px">RNPRET
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:20px">RNPOSTT
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:20px">A.E.G
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:20px">P.E.G
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group fill">
                                                                        <input type="checkbox" name="chkaporte" id="chkaporte" value="0" onclick="actaporte();"style="margin-right:20px">G.E.G
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="text" class="form-control" id="menarquia" placeholder="Edad Gestacional por FUR">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group fill">
                                                                        <input type="text" class="form-control" id="drogas" placeholder="Edad Gestacional por Examen F&iacute;sico">
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
                                    <div class="col-sm-12">
                                        <div class="card mb-12">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">REFER&Iacute;DO A:</h6>
                                                <i id="referencia_rn" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                            </div>
                                            <div class="card-body shadow-none" id="form_7_rn" style="display:none;">
                                                <div class="form-group fill">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group fill">
                                                                            <label class="form-control text-center"><H5>REFER&Iacute;DO A:</H5></label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                            <div class="form-group fill">
                                                                                <input type="text" class="form-control" id="menarquia"rows="1" onfocus="this.rows=3" onblur="this.rows=1"; placeholder="Neonatologia">
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                            <div class="form-group fill">
                                                                                <input type="text" class="form-control" id="menarquia"rows="1" onfocus="this.rows=3" onblur="this.rows=1"; placeholder="Con su madre">
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                            <div class="form-group fill">
                                                                                <input type="text" class="form-control" id="menarquia"rows="1" onfocus="this.rows=3" onblur="this.rows=1"; placeholder="Traslado a:">
                                                                            </div>
                                                                    </div>

                                                                    <div class="col-sm-12">
                                                                            <div class="form-group fill">
                                                                                <input type="text" class="form-control" id="menarquia"rows="1" onfocus="this.rows=3" onblur="this.rows=1"; placeholder="Diagn&oacute;stico Neonatológico de Traslado">
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
                                    <br>
                                    <div class="col-md-12 text-center">
                                        <div class="row">
                                            <!--Medicamentos o Examen-->
                                            <div class="form-group col-md-6">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-info">Guardar</button>
                                        <button type="button" class="btn btn-success">Imprimir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: RECIEN NACIDO-->
                        @include('atencion_medica.secciones_especialidad.seccion_ficha_general')


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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

