<!--ANTECEDENTES FAMILIARES-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="antec_fam">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#antec_fam_c" aria-expanded="false" aria-controls="antec_fam_c">
                Antecedentes patológicos propios y familiares de la especialidad
            </button>
        </div>
        <div id="antec_fam_c" class="collapse" aria-labelledby="antec_fam" data-parent="#antec_fam">
            <div class="card-body-aten-a">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="ant-familiares-tab" data-toggle="tab" href="#ant-familiares" role="tab" aria-controls="ant-familiares" aria-selected="true">Antecedentes familiares</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="hab-pat-tab" data-toggle="tab" href="#hab-pat" role="tab" aria-controls="hab-pat" aria-selected="false">Antecedentes patológicos propios</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-kinesiologica">
                            <!--ANTECEDENTES FAMILIARES-->
                            <div class="tab-pane fade show active" id="ant-familiares" role="tabpanel" aria-labelledby="ant-familiares-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten">ANTECEDENTES FAMILIARES</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm" for="pat_pat">Seleccionar patologías paternas</label>
                                        <select class="form-control form-control-sm" name="pat_pat" id="pat_pat" multiple="multiple">
                                            <option value="1">Hipertensión</option>
                                            <option value="2">Diabetes</option>
                                            <option value="3">Hipercolesterolemia</option>
                                            <option value="4">Hiperlipidemia</option>
                                            <option value="5">Cancer</option>
                                            <option value="6">Obesidad</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm" for="pat_mat">Seleccionar patologías maternas</label>
                                        <select class="form-control form-control-sm" name="pat_mat" id="pat_mat" multiple="multiple">
                                            <option value="1">Hipertensión</option>
                                            <option value="2">Diabetes</option>
                                            <option value="3">Hipercolesterolemia</option>
                                            <option value="4">Hiperlipidemia</option>
                                            <option value="5">Cancer</option>
                                            <option value="6">Obesidad</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm" for="pat_fam">Seleccionar patologías familiares</label>
                                        <select class="form-control form-control-sm" name="pat_fam" id="pat_fam" multiple="multiple">
                                            <option value="1">Hipertensión</option>
                                            <option value="2">Diabetes</option>
                                            <option value="3">Hipercolesterolemia</option>
                                            <option value="4">Hiperlipidemia</option>
                                            <option value="5">Cancer</option>
                                            <option value="6">Obesidad</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--ANTECEDENTES PATOLÓGICOS PROPIOS-->
                            <div class="tab-pane fade show" id="hab-pat" role="tabpanel" aria-labelledby="hab-pat-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten">ANTECEDENTES PATOLÓGICOS PROPIOS</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm" for="pat_prop">Seleccionar enfermedad actual</label>
                                        <select class="form-control form-control-sm" name="pat_prop" id="pat_prop" multiple="multiple">
                                            <option value="1">Hipertensión</option>
                                            <option value="2">Diabetes</option>
                                            <option value="3">Hipercolesterolemia</option>
                                            <option value="4">Hiperlipidemia</option>
                                            <option value="5">Cancer</option>
                                            <option value="6">Obesidad</option>
                                            <option value="7">Hipertiroidismo</option>
                                            <option value="8">Hipotiroidismo</option>
                                            <option value="9">Cirugías</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm" for="sint_act">Seleccionar síntomas actuales</label>
                                        <select class="form-control form-control-sm" name="sint_act" id="sint_act" multiple="multiple">
                                            <option value="1">Diarrea</option>
                                            <option value="2">Estreñimiento</option>
                                            <option value="3">Gastritis</option>
                                            <option value="4">Náusea</option>
                                            <option value="">Reflujo</option>
                                            <option value="">Colitis</option>
                                            <option value="">Otros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm" for="gin_obt">Antecedentes ginecológicos</label>
                                        <select class="form-control form-control-sm" name="gin_obt" id="gin_obt" multiple="multiple">
                                            <option value="1">Embarazo Actúal</option>
                                            <option value="2">Anticonceptivos Orales</option>
                                            <option value="3">Climatério</option>
                                            <option value="4">Otros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm" for="ot_pat_act">Otras patologías actuales</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm" for="ot_sint_act">Otros síntomas actuales</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_sint_act" id="ot_sint_act"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm" for="ot_ant_gine">Otros antecedentes ginecológicos</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_ant_gine" id="ot_ant_gine"></textarea>
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
    $(document).ready(function() {
        $('#pat_pat').select2();
        $('#pat_mat').select2();
        $('#pat_fam').select2();
        $('#pat_prop').select2();
        $('#sint_act').select2();
        $('#gin_obt').select2();
    });
</script>
