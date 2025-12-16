<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-3 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="fcc-tab" data-toggle="tab" href="#fcc" role="tab" aria-controls="fcc" aria-selected="false">Ficha de atención básica</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="atencion_uro-tab" data-toggle="tab" href="#atencion_uro" role="tab" aria-controls="atencion_uro" aria-selected="true">Ficha de atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="cisto-tab" data-toggle="tab" href="#cisto" role="tab" aria-controls="cisto" aria-selected="false">Cistoscopía</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="pros-tab" data-toggle="tab" href="#pros" role="tab" aria-controls="pros" aria-selected="false">Prostata</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="tab-content" id="uro-contenido">
                    <!--FICHA BÁSICA-->
                    <div class="tab-pane fade show active" id="fcc" role="tabpanel" aria-labelledby="fcc-tab">
                        <div class="row bg-white shadow-none rounded mx-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Ficha de atención básica</h6>
                                        <hr>
                                    </div>
                                </div>
                                <!--FORMULARIOS-->
                                <div class="row">
                                    <!--INFO MENOR DE EDAD-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="menor_edad">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#menor_edad_c" aria-expanded="false" aria-controls="menor_edad_c">
                                                  Info. Acompañante del menor de edad
                                                </button>
                                            </div>
                                            <div id="menor_edad_c" class="collapse show" aria-labelledby="menor_edad" data-parent="#menor_edad">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Rut</label>
                                                                <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Nombres</label>
                                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Apellidos</label>
                                                                <input type="text" class="form-control form-control-sm" name="apellido_acompañante" id="apellido_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Relación</label>
                                                                <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Teléfono</label>
                                                                <input type="tel" class="form-control form-control-sm" name="tel_acompañante" id="tel_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Email</label>
                                                                <input type="email" class="form-control form-control-sm" name="email_acompañante" id="email_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Ingrese código</label>
                                                                <input type="number" class="form-control form-control-sm" name="codigo" id="codigo">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <button type="button" class="btn btn-info btn-block btn-sm" onclick="solicitar_autorizacion();"><i class="fa fa-plus"></i> Autoriza el examen</button>
                                                                <!--genera codigo de aceptación al teléfono del responsable -->
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--MOTIVO CONSULTA-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="mot-consulta">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                                  Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-c" class="collapse show" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--ANTECEDENTES-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="antecedentes">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antecedentes-c" aria-expanded="false" aria-controls="antecedentes-c">
                                                  Antecedentes
                                                </button>
                                            </div>
                                            <div id="antecedentes-c" class="collapse show" aria-labelledby="antecedentes" data-parent="#antecedentes">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="antecedentes" id="antecedentes"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--EXAMEN FÍSICO-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="examen-fisico">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#examen-fisico-c" aria-expanded="false" aria-controls="examen-fisico-c">
                                                  Examen físico
                                                </button>
                                            </div>
                                            <div id="examen-fisico-c" class="collapse show" aria-labelledby="examen-fisico" data-parent="#examen-fisico">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label">Examen general</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ex_fisc_gral" id="ex_fisc_gral"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--SIGNOS VITALES Y OTROS-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="signosvit-otros">
                                                <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#signosvit-otros-c" aria-expanded="false" aria-controls="signosvit-otros-c">
                                                Signos vitales y otros
                                                </button>
                                            </div>
                                            <div id="signosvit-otros-c" class="collapse" aria-labelledby="signosvit-otros" data-parent="#signosvit-otros">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-1">
                                                                <label class="floating-label">Tº</label>
                                                                <input type="text" class="form-control form-control-sm" name="temp" id="temp">
                                                            </div>
                                                            <div class="form-group col-md-1">
                                                                <label class="floating-label">Pulso</label>
                                                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Frec. Reposo</label>
                                                                <input type="text" class="form-control form-control-sm" name="fc_reposo" id="fc_reposo">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Peso</label>
                                                                <input type="text" class="form-control form-control-sm" name="peso" id="peso">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Talla</label>
                                                                <input type="text" class="form-control form-control-sm" name="talla" id="talla">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">IMC</label>
                                                                <input type="text" class="form-control form-control-sm" name="imc" id="imc">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Estado nutricional</label>
                                                                <input type="text" class="form-control form-control-sm" name="est_nut" id="est_nut">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Presión arterial</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="p_arterial_esp">
                                                                    <label for="p_arterial_esp" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form_1_esp" style="display:none">
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">BI</label>
                                                                <input type="text" class="form-control form-control-sm" name="pa_bi" id="pa_bi">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">BD</label>
                                                                <input type="text" class="form-control form-control-sm" name="pa_bd" id="pa_bd">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">De pié</label>
                                                                <input type="text" class="form-control form-control-sm" name="pa_pie" id="pa_pie">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Sentado</label>
                                                                <input type="text" class="form-control form-control-sm" name="pa_sent" id="pa_sent">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Comunicación y traslado</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="com_trasl_esp">
                                                                    <label for="com_trasl_esp" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form_2_esp" style="display:none">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label">Estado de conciencia</label>
                                                                <input type="text" class="form-control form-control-sm" name="conc" id="conc">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label">Lenguaje</label>
                                                                <input type="text" class="form-control form-control-sm" name="leng" id="leng">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label">Traslado</label>
                                                                <input type="text" class="form-control form-control-sm" name="trasl" id="trasl">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="diagnostico">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-c" aria-expanded="false" aria-controls="diagnostico-c">
                                                  Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagnostico-c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Hipótesis diagnóstica</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="hip_diag" id="hip_diag"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Indicaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="cie-10" id="cie-10"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                         <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                    </div>
                                </div>
                                <!--ENFERMO CRÓNICO O GES-->
                                <div class="row px-3 mb-3 mt-3">
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
                                <!--GUARDAR O IMPRIMIR FICHA-->
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-info">Guardar</button>
                                        <button type="button" class="btn btn-success">Imprimir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: FICHA BÁSICA-->
                    <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                    <div class="tab-pane fade" id="atencion_uro" role="tabpanel" aria-labelledby="atencion_uro-tab">
                        <div class="row bg-white shadow-none rounded mx-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Ficha de atención especialidad (Urología)</h6>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--INFO MENOR DE EDAD-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="menor_edad_esp">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#menor_edad_esp_c" aria-expanded="false" aria-controls="menor_edad_esp_c">
                                                  Info. Acompañante del menor de edad
                                                </button>
                                            </div>
                                            <div id="menor_edad_esp_c" class="collapse show" aria-labelledby="menor_edad_esp" data-parent="#menor_edad_esp">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Rut</label>
                                                                <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Nombres</label>
                                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Apellidos</label>
                                                                <input type="text" class="form-control form-control-sm" name="apellido_acompañante" id="apellido_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Relación</label>
                                                                <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Teléfono</label>
                                                                <input type="tel" class="form-control form-control-sm" name="tel_acompañante" id="tel_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Email</label>
                                                                <input type="email" class="form-control form-control-sm" name="email_acompañante" id="email_acompañante">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Ingrese código</label>
                                                                <input type="number" class="form-control form-control-sm" name="codigo" id="codigo">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <button type="button" class="btn btn-info btn-block btn-sm" onclick="solicitar_autorizacion();"><i class="fa fa-plus"></i> Autoriza el examen</button>
                                                                <!--genera codigo de aceptación al teléfono del responsable -->
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--MOTIVO CONSULTA-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="mot-consulta-esp">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-esp-c" aria-expanded="false" aria-controls="mot-consulta-esp-c">
                                                  Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-esp-c" class="collapse show" aria-labelledby="mot-consulta-esp" data-parent="#mot-consulta-esp">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--EXAMEN ESPECIALIDAD-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="exam-esp">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exam-esp-c" aria-expanded="false" aria-controls="exam-esp-c">
                                                  Examen de especialidad
                                                </button>
                                            </div>
                                            <div id="exam-esp-c" class="collapse show" aria-labelledby="exam-espec" data-parent="#exam-esp">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="exam_esp" id="exam_esp"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="diagnostico-esp">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-esp-c" aria-expanded="false" aria-controls="diagnostico-esp-c">
                                                  Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagnostico-esp-c" class="collapse show" aria-labelledby="diagnostico-esp" data-parent="#diagnostico-esp">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Hipótesis diagnóstica</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="hip_diag" id="hip_diag"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Indicaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="cie-10" id="cie-10"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                         <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_examen_espuro();"><i class="fa fa-plus"></i> Indicar examen especialidad</button>
                                    </div>
                                </div>
                                <hr>
                                <!--Guardar o imprimir ficha-->
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-info">Guardar</button>
                                        <button type="button" class="btn btn-success">Imprimir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                    <!-- CISTOSCOPÍA-->
                    <div class="tab-pane fade" id="cisto" role="tabpanel" aria-labelledby="cisto-tab">
                        <div class="row bg-white shadow-none rounded mx-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Citoscopía</h6>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--INFORME CITOSCOPIA-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="infor-citoscopia">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#infor-citoscopia-c" aria-expanded="false" aria-controls="infor-citoscopia-c">
                                                  Informe
                                                </button>
                                            </div>
                                            <div id="infor-citoscopia-c" class="collapse show" aria-labelledby="infor-citoscopia" data-parent="#infor-citoscopia">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Uretra</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="uretra" id="uretra"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Vejiga</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="vejiga" id="vejiga"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Biópsias</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="biopsias" id="biopsias"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Tratamientos</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="tratamientos" id="tratamientos"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Comentarios</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comentrarios" id="comentrarios"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="diagn-citoscopia">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagn-citoscopia-c" aria-expanded="false" aria-controls="diagn-citoscopia-c">
                                                  Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagn-citoscopia-c" class="collapse show" aria-labelledby="diagn-citoscopia" data-parent="#diagn-citoscopia">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Diagnóstico endoscópico</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="diag_endo" id="hip_diag"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs" id="obs"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                         <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_examen_espuro();"><i class="fa fa-plus"></i> Indicar examen especialidad</button>
                                    </div>
                                </div>
                                <hr>
                                <!--Guardar o imprimir ficha-->
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="button" class="btn btn-info">Guardar</button>
                                        <button type="button" class="btn btn-success">Imprimir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: CISTOSCOPÍA-->
                    <!--PRÓSTATA-->
                    <div class="tab-pane fade" id="pros" role="tabpanel" aria-labelledby="pros-tab">
                        <div class="row bg-white shadow-none rounded mx-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Prostata</h6>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--INFORME PROSTATA-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="infor-prostata">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#infor-prostata-c" aria-expanded="false" aria-controls="infor-prostata-c">
                                                  Informe
                                                </button>
                                            </div>
                                            <div id="infor-prostata-c" class="collapse show" aria-labelledby="infor-prostata" data-parent="#infor-prostata">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Tacto</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="tacto" id="tacto"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Antígenos</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="antigenos" id="antigenos"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Biópsias</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="biopsias" id="biopsias"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Comentarios</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comentrarios" id="comentrarios"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="diagn-prostata">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagn-prostata-c" aria-expanded="false" aria-controls="diagn-prostata-c">
                                                  Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagn-prostata-c" class="collapse show" aria-labelledby="diagn-prostata" data-parent="#diagn-prostata">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Diagnóstico endoscópico</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="diag_endo" id="diag_endo"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs" id="obs"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                         <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen_espuro();"><i class="fa fa-plus"></i> Indicar examen especialidad</button>
                                    </div>
                                </div>
                                <hr>
                                <!--Guardar o imprimir ficha-->
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="button" class="btn btn-info">Guardar</button>
                                        <button type="button" class="btn btn-success">Imprimir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CIERRE:PRÓSTATA-->
                </div>
            </div>
        </div>
    </div>
</div>




<!--Modals de especialidad -->
<?php

include("../modals_generales/autorizacion_acompa.php");
?>



