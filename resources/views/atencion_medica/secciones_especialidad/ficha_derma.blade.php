<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-3 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_dermo-tab" data-toggle="tab" href="#atencion_dermo" role="tab" aria-controls="atencion_dermo" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="fcc-tab" data-toggle="tab" href="#fcc" role="tab" aria-controls="fcc" aria-selected="false">Ficha Tradicional</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="cir_m-tab" data-toggle="tab" href="#cir_m" role="tab" aria-controls="cir_m" aria-selected="false">Tratamientos Dermatológicos</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="biop-tab" data-toggle="tab" href="#biop" role="tab" aria-controls="biop" aria-selected="false">Biopsias</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pediat-contenido">
                <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                <div class="tab-pane fade show active" id="atencion_dermo" role="tabpanel" aria-labelledby="atencion_dermo-tab">
                    <div class="row bg-white shadow-none rounded mx-1">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 mt-3 mb-0">
                                    <h6 class="f-16 text-c-blue">Ficha de atención DERMATOLOGÍA</h6>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <!--RESPONSABLE-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info align-middle">

                                            <h6 class="float-left d-inline">Registro Obligatorio para el Paciente menor de edad</h6>
                                            <i id="menor_edad_esp" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                        </div>
                                        <div class="card-body shadow-none" id="form_esp" style="display:none;">
                                            <form>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>Información del acompañente</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Rut</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Nombres</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Apellidos</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3" id="">
                                                        <label class="floating-label">Relación</label>
                                                        <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Teléfono</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Email</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Ingrese código</label>
                                                        <input type="text" class="form-control form-control-sm" name="codigo" id="codigo">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <button type="button" class="btn btn-success btn-block btn-sm" onclick="solicitar_autorizacion();"><i class="fa fa-plus"></i> Autoriza el examen</button>
                                                        <!--genera codigo de aceptación al teléfono del responsable -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Motivo consulta-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Motivo de la consulta</h6>
                                        </div>
                                        <div class="card-body shadow-none">
                                           <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Motivo de Consulta</label>
                                                        <input type="text" class="form-control form-control-sm" name="hip-diag" id="hip-diag">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Examen Especialidad</label>
                                                        <input type="text" class="form-control form-control-sm" name="cie-10" id="cie-10">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Diagnóstico-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Diagnóstico</h6>
                                        </div>
                                        <div class="card-body shadow-none">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm" name="hip-diag" id="hip-diag">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Indicaciones</label>
                                                        <input type="text" class="form-control form-control-sm" name="cie-10" id="cie-10">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Medicamentos o Examen-->
                                <div class="form-group col-md-4">
                                     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen_derm();"><i class="fa fa-plus"></i> Indicar examen Especialidad</button>
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
                <!--ficha tradicional-->
                <div class="tab-pane fade" id="fcc" role="tabpanel" aria-labelledby="fcc-tab">
                    <div class="row bg-white shadow-none rounded mx-1">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 mt-3 mb-0">
                                    <h6 class="f-16 text-c-blue">Ficha de atención</h6>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <!--RESPONSABLE-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info align-middle">
                                            <h6 class="float-left d-inline">Registro Obligatorio para el Paciente menor de edad</h6>
                                            <i id="menor_edad_esp1" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                        </div>
                                        <div class="card-body shadow-none" id="form_esp1" style="display:none;">
                                            <form>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>Información del acompañente</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Rut</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Nombres</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Apellidos</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3" id="">
                                                        <label class="floating-label">Relación</label>
                                                        <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Teléfono</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Email</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Ingrese código</label>
                                                        <input type="text" class="form-control form-control-sm" name="codigo" id="codigo">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <button type="button" class="btn btn-success btn-block btn-sm" onclick="solicitar_autorizacion();"><i class="fa fa-plus"></i> Autoriza el examen</button>
                                                        <!--genera codigo de aceptación al teléfono del responsable -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Motivo consulta-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Motivo de la consulta</h6>
                                        </div>
                                        <div class="card-body shadow-none">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 mx-auto">
                                                        <label class="floating-label">Descripción</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Antecedentes-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Antecedentes</h6>
                                        </div>
                                        <div class="card-body shadow-none">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 mx-auto">
                                                        <label class="floating-label">Descripción</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;"name="descripcion_antecedentes" id="descripcion_antecedentes"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Examen ginecológico y mamas-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Examen Físico</h6>
                                        </div>
                                        <div class="card-body shadow-none">
                                            <form>
                                                <div class="form-row">

                                                    <div class="form-group col-md-12">
                                                        <label class="floating-label">Examen General</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="exter_ginecológico" id="exter_ginecológico"></textarea>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!--Signos vitales y otros-->
                                <div class="col-sm-12">
                                    <div class="card mb-3">
                                        <div class="card-header bg-info align-middle">
                                            <h6 class="float-left d-inline">Signos vitales y otros</h6>
                                            <i id="signos_vitales_esp" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                        </div>
                                        <div class="card-body shadow-none" id="form_sv_esp" style="display:none;">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-1">
                                                        <label class="floating-label">Tº</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label class="floating-label">Pulso</label>
                                                        <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Frec. Reposo</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Peso</label>
                                                        <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Talla</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">IMC</label>
                                                        <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Estado nutricional</label>
                                                        <input type="text" class="form-control form-control-sm" name="re" id="re">
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
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">BD</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">De pié</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Sentado</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
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
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Lenguaje</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Traslado</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Diagnóstico-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Diagnóstico</h6>
                                        </div>
                                        <div class="card-body shadow-none">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm" name="hip-diag" id="hip-diag">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" name="cie-10" id="cie-10">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Medicamentos o Examen-->
                                 <div class="form-group col-md-4">
                                     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen_derm();"><i class="fa fa-plus"></i> Indicar examen Especialidad</button>
                                </div>
                            </div>
                            <!--Enfermo crónico o GES-->
                            <div class="row px-3 mb-3">
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
                <!--CIERRE: ATENCIÓN NIÑO SANO-->
                <!-- proc-->
                <div class="tab-pane fade" id="cir_m" role="tabpanel" aria-labelledby="cir_m-tab">
                    <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                        <div class="col-md-12">

                            <hr class="mt-1">
                            <div class="row">
                                <!--Formulario / Menor de edad-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body shadow-none" id="formulario_tto_dermico">
                                            <form>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>  ELIMINACIÓN DE CICATRICES </h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Tipo de Procedimiento </label>
                                                            <select class="form-control form-control-sm" name="" id="">
                                                                <option>Seleccione una opción</option>
                                                                <option value = "1-1">•	Dermoabrasión</option>
                                                                <option value = "1-2">•	Exfoliacion quimica</option>
                                                                <option value = "1-1">•	Inyecciones de relleno dérmico</option>
                                                                <option value = "1-1">•	Exfoliación por láser y fototerapias</option>
                                                                <option value = "1-2">•	Microinjertos</option>
                                                                <option value = "1-1">•	Incisión subcutánea. </option>
                                                                <option value = "1-2">•	Transferencia de grasa autóloga</option>
                                                                <option value = "1-1">•	Inyecciones  intralesionales</option>
                                                                <option value = "1-1">•	Crioterapia</option>
                                                                <option value = "1-3">•	Cremas tópicas </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Descripción </label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                            </div>
                                                        </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                        </div>
                                                     </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body shadow-none" id="formulario_rinofibro">
                                            <form>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>TRATAMIENTO DE PIEL DAÑADA</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Tipo de Procedimiento </label>
                                                            <select class="form-control form-control-sm" name="" id="">
                                                                <option>Seleccione una opción</option>
                                                                <option value = "1-1">•	Toxina botulínica tipo A</option>
                                                                <option value = "1-2">•	Exfoliacion quimica. </option>
                                                                <option value = "1-1">•	Aumento del tejido blando/inyecciones de relleno dérmico</option>
                                                                <option value = "1-1">•	Dermoabrasión</option>
                                                                <option value = "1-2">•	Rejuvenecimiento de la piel con láser. </option>
                                                                <option value = "1-1">•	Luz pulsada intensa</option>
                                                                <option value = "1-2">•	Tratamiento con tretinoína</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Descripción </label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body shadow-none" id="formulario_rinofibro">
                                            <form>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>EXFOLIACIÓN QUÍMICA</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-3 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Motivo Procedimiento </label>
                                                            <select class="form-control form-control-sm" name="" id="">
                                                                <option>Seleccione una opción</option>
                                                                <option value = "1-1">Corregir el color (pigmento) desigual de la piel</option>
                                                                <option value = "1-2">Eliminar masas precancerosas de la piel</option>
                                                                <option value = "1-1">Suavizar el acné o tratar las cicatrices que producen</option>
                                                                <option value = "1-1">Tratar las arrugas que producen el sol, así como daños y tejido cicatricial</option>
                                                                <option value = "1-2">Tratar las imperfecciones de la piel que se deben a la edad ya la herencia</option>
                                                                <option value = "1-1">Otro</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Compuesto</label>
                                                            <select class="form-control form-control-sm" name="" id="">
                                                                <option>Seleccione una opción</option>
                                                                <option value = "1-1">Alfahidroxiácidos</option>
                                                                <option value = "1-2">ácido tricloroacético</option>
                                                                <option value = "1-1">fenol</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 mt-2">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Descripción </label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                            </div>
                                                        </div>
                                                    <div class="col-sm-3 mt-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                        </div>
                                                     </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body shadow-none" id="formulario_rinofibro">
                                            <form>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>DERMABRASIÓN / DERMOPLANING</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Tipo de Procedimiento </label>
                                                            <select class="form-control form-control-sm" name="" id="">
                                                                <option>Seleccione una opción</option>
                                                                <option value = "1-1">DERMABRASIÓN</option>
                                                                <option value = "1-2">DERMOPLANING</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Descripción </label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                            </div>
                                                        </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                        </div>
                                                     </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body shadow-none" id="formulario_rinofibro">
                                            <form>

                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>CIRUGÍA LASER</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                             <label class="floating-label">Motivo Procedimiento</label>
                                                            <input type="text" class="form-control form-control-sm" name="obs_rinofibro" id="obs_rinofibro">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Descripción </label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                            </div>
                                                        </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                        </div>
                                                     </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body shadow-none" id="formulario_rinofibro">
                                            <form>

                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>OTRO PROCEDIMIENTO</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Procedimiento</label>
                                                            <input type="text" class="form-control form-control-sm" name="obs_rinofibro" id="obs_rinofibro">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Descripción </label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                            </div>
                                                        </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                        </div>
                                                     </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--V-->


                                <!--Medicamentos o Examen-->
                                <div class="form-group col-md-3">
                                     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen_derm() ;"><i class="fa fa-plus"></i> Indicar examen Especialidad</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_indic_derm();"><i class="fa fa-plus"></i> Indicaciones Post Procedimiento</button>
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
                            <hr>
                            <div class="jumbotron text-center" style="padding: 2rem 2rem;">
                              <h5>Cargar  múltiples imágenes del Examen </h5>
                            </div>

                            <div class="container">
                                <form id="submitForm">
                                    <div class="row">
                                          <div class="col-md-6">
                                              <div class="input-group">
 		                                         <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" name="multipleFile[]" id="multipleFile" required="" multiple>
                                                    <label class="custom-file-label" for="multipleFile">Elija varias imágenes para cargar</label>
                                                  </div>
	                                          </div>
                                          </div>
                                          <div class="col-md-2">
                                          <button type="submit" name="upload" class="btn btn-primary">Cargar Archivos</button>
                                          </div>
                                    </div>
                                </form>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible" id="success" style="display: none;">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                El archivo se ha cargado correctamente
                                        </div>
                                    </div>
                                </div>
                            </div>

                              <!-- view of uploaded images -->
                            <div class="container" id="gallery"></div>

                            <!--Edit Multiple image form -->
                            <div class='modal' id='exampleModal'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                          <h4 class='modal-title'>Actualizar imagen</h4>
                                          <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                        </div>
                                        <div id="editForm">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <iframe>
                             <div style="widh:100%"></div>
                            </iframe>


                            <script type="text/javascript">
                                $(document).ready(function(){
	                                $("#submitForm").on("submit", function(e){
                                    e.preventDefault();
                                    $.ajax({
                                      url  :"upload.php",
                                      type :"POST",
                                      cache:false,
                                      contentType : false, // you can also use multipart/form-data replace of false
                                      processData : false,
                                      data: new FormData(this),
                                      success:function(response){
                                        $("#success").show();
                                        $("#multipleFile").val("");
                                        fetchData();
                                      }
                                    });
	                                });

                                  // Fetch Data from Database
                                  function fetchData(){
                                    $.ajax({
                                      url  : "fetch_data.php",
                                      type : "POST",
                                      cache: false,
                                      success:function(data){
                                        $("#gallery").html(data);
                                      }
                                    });
                                  }
                                  fetchData();

                                  // Edit Data from Database
                                  $(document).on("click",".btn-success", function(){
                                    var editId = $(this).data('id');
                                    $.ajax({
                                      url : "edit.php",
                                      type : "POST",
                                      cache: false,
                                      data : {editId:editId},
                                      success:function(data){
                                        $("#editForm").html(data);
                                      }
                                    });
                                  });

                                  // Delete Data from database

                                  $(document).on('click','.delete-btn', function(){
                                    var deleteId = $(this).data('id');
                                    if (confirm("¿Está seguro de que desea eliminar esta imagen?")) {
                                      $.ajax({
                                        url  : "delete.php",
                                        type : "POST",
                                        cache:false,
                                        data:{deleteId:deleteId},
                                        success:function(data){
			                                $("#success").show();
                                          fetchData();
                                          //alert("La imagen eliminada correctamente");
                                        }
                                      });
                                    }
                                  });

                                  // Update Data from database
                                  $(document).on("submit", "#editForm", function(e){
                                  e.preventDefault();
                                  var formData = new FormData(this);
                                  $.ajax({
                                      url  : "update.php",
                                      type : "POST",
                                      cache: false,
                                      contentType : false, // you can also use multipart/form-data replace of false
                                      processData : false,
                                      data: formData,
                                      success:function(response){
                                        $("#exampleModal").modal('hide');
                                        alert("Imagen actualizada correctamente");
                                        fetchData();
                                      }
                                    });
                                  });
                                });

                            </script>
                        </div>
                    </div>
                </div>
                <!--CIERRE: proc-->
                <!--ATENCIÓN biopsias-->
                <div class="tab-pane fade" id="biop" role="tabpanel" aria-labelledby="biop-tab">
                    <div class="row bg-white shadow-sm rounded mx-3 mt-4">

                        <div class="col-md-12">
                            <hr class="mt-1">
                            <div class="row">
                                <!--Formulario / Menor de edad-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body shadow-none" id="formulario_rinofibro">
                                            <form>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>BIOPSIA</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Motivo Procedimiento</label>
                                                            <input type="text" class="form-control form-control-sm" name="obs_rinofibro" id="obs_rinofibro">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Descripción </label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                        </div>
                                                     </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body shadow-none" id="formulario_rinofibro">
                                            <form>

                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>RESULTADO</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">INFORME</label>
                                                            <input type="text" class="form-control form-control-sm" name="obs_rinofibro" id="obs_rinofibro">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Comentarios </label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                            </div>
                                                        </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                        </div>
                                                     </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--V-->


                                <!--Medicamentos o Examen-->
                                <div class="form-group col-md-3">
                                     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen_derm() ;"><i class="fa fa-plus"></i> Indicar examen Especialidad</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_indic_derm();"><i class="fa fa-plus"></i> Indicaciones Post Procedimiento</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









<!--Modals de especialidad -->
<?php
include("../modals_generales/autorizacion_acompa.php");
?>

