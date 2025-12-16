<ul class="nav nav-tabs mb-3 mt-3" id="dental" role="tablist">
    <li class="nav-item">
        <a class="nav-atencion-medica active text-uppercase" id="ficha-dental-tab" data-toggle="tab" href="#ficha-dental" role="tab" aria-controls="ficha-dental" aria-selected="true">Atención dental</a>
    </li>
   
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="odonto-infantil-tab" data-toggle="tab" href="#odonto-infantil" role="tab" aria-controls="odonto-infantil" aria-selected="false">Odontograma</a>
    </li><!--
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="periodontogramainf-tab" data-toggle="tab" href="#periodontogramainf" role="tab" aria-controls="periodontogramainf" aria-selected="false">Periodontrograma</a>
    </li>-->
    
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="evaluacion-infantil-tab" data-toggle="tab" href="#evaluacion-infantil" role="tab" aria-controls="evaluacion-infantil" aria-selected="false">Evaluación</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="tratamiento-tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento</a>
    </li>
</ul>
<div class="row">
    <div class="col-md-12">
        <div class="tab-content" id="dental-contenido">
            <div class="tab-pane fade show active" id="ficha-dental" role="tabpanel" aria-labelledby="ficha-dental-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Ficha de atención dental Odontopediátra</h5>
                        <hr>
                    </div>
                    <hr>
                    <!--Formulario / Menor de edad-->
                    <div class="col-sm-12">
                        <div class="card">
                            <a class="label collapsed" data-toggle="collapse" href="#Acompañante" role="button" aria-expanded="false" aria-controls="Acompañante">
                                <div class="card mb-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1 has-ripple"><i class="fa fa-plus" aria-hidden="true"></i> Información del Acompañante y resp de Pago Presupuesto<span class="ripple ripple-animate" style="height: 749px; width: 749px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -360.453px; left: 104.5px;"></span></button></a>
                                    
                                </div>
                            </a>
                            <div class="collapse" id="Acompañante" style="">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row mb-1">
                                            <div class="col-md-12">
                                                <h6>Información del acompañente</h6>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="floating-label-activo-sm">Rut</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="floating-label-activo-sm">Nombre y Apellidos</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-4" id="form_0">
                                                <label class="floating-label-activo-sm">Relación</label>
                                                <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                            </div>
                                        </div>
                                        <div class="form-row mb-1">
                                            <div class="col-md-12">
                                                <h6>Información del responsable del pago</h6>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-3" id="form_0">
                                                <label class="floating-label-activo-sm">Rut</label>
                                                <input type="text" class="form-control form-control-sm" name="responsable_pago" id="responsable_pago">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Nombre y Apellidos</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Email</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                            </div>
                                            <div class="form-group col-md-3" id="form_0">
                                                <button type="button" class="btn btn-success btn-block btn-sm" onclick="respon_pago_dent();"><i class="fa fa-plus"></i> Aceptar Pago</button>
                                                <!--genera codigo de aceptación al teléfono del responsable del pago-->
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                                        <h6>Motivo de la consulta</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 mx-auto">
                                                    <label class="floating-label-activo-sm">Descripción</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" name="descripcion_antecedentes" id="descripcion_antecedentes"></textarea>
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
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Antecedentes</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 mx-auto">
                                                    <label class="floating-label-activo-sm">Descripción</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" name="descripcion_antecedentes" id="descripcion_antecedentes"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Antecedentes dentales</h6>
                                    </div>
                                    <div class="card-body pt-1 pb-1">
                                        <form>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" role="button" onclick="info_info1();" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                Problemas con la anestesia local
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" role="button" onclick="info_info2();" id="flexCheckDefault2">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                Hemorragias
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" role="button" onclick="info_info3();" id="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                Fracturas
                                                </label>
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
				        <div class="card">
                            <a class="label collapsed" data-toggle="collapse" href="#signos_vitales" role="button" aria-expanded="false" aria-controls="signos_vitales">
                                <div class="card mb-3">
                                    <div class="card-header align-middle">
                                        <h6 class="float-left d-inline">Signos vitales y otros</h6>
                                        <i id="signos_vitales" class="float-right f-18 d-inline fas fa-angle-down mb-0 collapse" style="cursor: pointer;" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </a>

					        <div class="collapse" id="signos_vitales" style="">
						        <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-1">
                                                <label class="floating-label-activo-sm">Tº</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label-activo-sm">Pulso</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </label></div>
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
                                                <label class="floating-label-activo-sm">Estado nutricional</label>
                                                <input type="text" class="form-control form-control-sm" name="re" id="re">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group mb-1">
                                                <label><strong>Presión arterial</strong></label>
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="p_arterial">
                                                    <label for="p_arterial" class="cr"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row" id="form_1">
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
                                        <div class="form-row" id="form_2">
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
                    <!--Cierre: Formulario / Diagnóstico-->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!--Botón Modal 01 / Indicar Medicamentos-->
                        <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                        <!--Cierre: Botón Modal 01 / Indicar Medicamentos-->
                    </div>
                    <div class="col-md-6">
                        <!--Botón Modal 02 / Indicar Exámenes-->
                        <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                        <!--Cierre: Botón Modal 02 / Indicar Exámenes-->
                    </div>
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
                        <button type="button" class="btn btn-info">Guardar ficha clínica</button>
                        <button type="button" class="btn btn-success">Imprimir</button>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="odonto-infantil" role="tabpanel" aria-labelledby="odonto-infantil-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Odontograma infantil</h5>
                        <hr>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dt-responsive table-responsive pb-4">
                            <table id="odontograma_inf" class="display table dt-responsive table-borderless" style="width:100%">
                                <!-- INFANTIL SUPERIOR -->
                                <tbody>
                                    <tr>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t55">
                                                <img src="i/dientes/d55.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="55" class="nav-label-dent">5.5</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t54">
                                                <img src="i/dientes/d54.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="54" class="nav-label-dent">5.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t53">
                                                <img src="i/dientes/d53.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="53" class="nav-label-dent">5.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t52">
                                                <img src="i/dientes/d52.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="52" class="nav-label-dent">5.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t51">
                                                <img src="i/dientes/d51.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="51" class="nav-label-dent">5.1</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t71">
                                                <img src="i/dientes/d61.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="61" class="nav-label-dent">6.1</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t62">
                                                <img src="i/dientes/d62.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="62" class="nav-label-dent">6.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t63">
                                                <img src="i/dientes/d63.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="63" class="nav-label-dent">6.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t64">
                                                <img src="i/dientes/d64.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="64" class="nav-label-dent">6.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t65">
                                                <img src="i/dientes/d65.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="65" class="nav-label-dent">6.5</label>
                                        </td>
                                    </tr>
                                    <!-- INFANTIL INFERIOR -->
                                    <tr>
                                        <td class="text-center px-0 py-0">
                                            <div class="#"  id="t85">
                                                <img src="i/dientes/d85.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndente="85" class="nav-label-dent">8.5</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="#" id="t84">
                                                <img src="i/dientes/d84.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="84" class="nav-label-dent">8.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t83">
                                                <img src="i/dientes/d83.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="83" class="nav-label-dent">8.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t82">
                                                <img src="i/dientes/d82.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="82" class="nav-label-dent">8.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t81">
                                                <img src="i/dientes/d81.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="81" class="nav-label-dent">8.1</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t71">
                                                <img src="i/dientes/d71.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="71" class="nav-label-dent">7.1</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t72">
                                                <img src="i/dientes/d72.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="72" class="nav-label-dent">7.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t73">
                                                <img src="i/dientes/d73.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="73" class="nav-label-dent">7.3</label>
                                        </td>
                                        <!--nnnn-->
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t74">
                                                <img src="i/dientes/d74.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="74" class="nav-label-dent">7.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t75">
                                                <img src="i/dientes/d75.png" class="wid-30" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="75" class="nav-label-dent">7.5</label>
                                        </td>
                                    </tr>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="evaluacion-infantil" role="tabpanel" aria-labelledby="evaluacion-infantil-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Evaluación infantil</h5>
                        <hr>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row mb-4">
                            <div class="col-md-4 px-1 py-1">
                                <button type="button" class="btn btn-secondary btn-sm btn-block" onclick="maxilar_superior_inf();"><i class="feather icon-file-plus"></i> Maxilar superior</button>
                            </div>
                            <div class="col-md-4 px-1 py-1">
                                <button type="button" class="btn btn-secondary btn-sm btn-block" onclick="maxilar_inferior_inf();"><i class="feather icon-file-plus"></i> Maxilar inferior</button>
                            </div>
                            <div class="col-md-4 px-1 py-1">
                                <button type="button" class="btn btn-secondary btn-sm btn-block" onclick="boca_completa_inf();"><i class="feather icon-file-plus"></i> Boca  Completa</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <h5 class="text-center text-c-blue">GRUPO I</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs"style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">Pieza</th>
                                                <th class="text-center align-middle px-1 py-1">Cara</th>
                                                <th class="text-center align-middle px-1 py-1">Diagnostico</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <!-- <select class="form-control form-control-sm" id="" name="">-->
                                                    <script type = "text / javascript" > 
                                                        $ ( '#example-multiple-optgroups' ). multiselect ();
                                                    </script>
                                                    <select class="form-control form-control-sm"> 
                                                            <option value = "5-5"> 5-5 </option>  
                                                            <option value = "5-4"> 5-4 </option> 
                                                            <option value = "5-3"> 5-3 </option> 
                                                            <option value = "5-2"> 5-2 </option>
                                                            <option value = "5-1"> 5-1</option>            
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1"> 
                                                    <select class="form-control form-control-sm" id="cara_g1" name="cara_g1"> 
                                                        <optgroup label = "cara" class = "cara"  >  
                                                            <option value = "c-1">Oclusal</option> 
                                                            <option value = "c-2">Vestibular</option>  
                                                            <option value = "c-3">Distal</option>
                                                            <option value = "c-4">Mesial</option>  
                                                            <option value = "c-4">Palatina</option> 
                                                        </optgroup>
                                                        <optgroup label = "Diente" class = "diente" id="diente_g1" name="diente_g1"  
                                                            <option value = "d-1" > Total </option> 
                                                            <option value = "d-2" > Raiz </option> 
                                                            <option value = "d-3" > Encia </option>
                                                            <option value = "d-4" > Endodoncia </option> 
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm" id="dgp_g1" name="dgp_g1">
                                                        <option value = "0">Diagnostico</option>
                                                        <option value = "01">Caries</option>
                                                        <option value = "02">Fractura</option>
                                                        <option value = "03">periodontopatia</option>
                                                        <option value = "04">profilaxis</option>
                                                        <option value = "05">Restos radiculares</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1"> 
                                                    <div id="t53">
                                                        <img src="i/dientes/d53.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1"> 
                                                    <div id="t17">
                                                        <img src="../assets/img_dental/caras.png" class="wid-70">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1"> 
                                                   <span>Pieza cara Diagnostico y Tratamiento</span> <!--esto se lleva al presupuesto-->
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1"colspan="3">
                                                    <select class="form-control form-control-sm" id="ttop_g1" name="ttop_g1">
                                                    <option>seleccione tratamiento</option>
                                                        <optgroup  label="Tratamiento Pediátrico">
                                                            <option value="dp_1">Examen inicial, plan de tratamiento y presupuesto</option>
                                                            <option value="dp_2">Instrucción y control de higiene y profilaxis</option>
                                                            <option value="dp_3">Aplicación flúor gel</option>
                                                            <option value="dp_4">Aplicación flúor barniz</option>
                                                            <option value="dp_5">Destartraje (por grupo, máximo dos) </option>
                                                            <option value="dp_6">Endodoncia pieza permanente</option>
                                                            <option value="dp_7">Exodoncia simple diente temporal</option>
                                                            <option value="dp_8">Mantenedor de espacio fijo o removible /valor no incluye laboratorio</option>
                                                            <option value="dp_9">Obturación v. ionómero pieza temporal anterior y posterior simple</option>
                                                            <option value="dp_10">Obturación v. ionómero pieza temporal anterior y posterior compuesto</option>
                                                            <option value="dp_11">Obturación resina fotocurado composite pieza permanente anterior y posterior simple</option>
                                                            <option value="dp_12">Obturación resina fotocurado composite pieza permanente anterior y posterior compuesto</option>
                                                            <option value="dp_13">Obturación resina fotocurado, reconstitución</option>
                                                            <option value="dp_14">Obturación resina fotocurado carillas anteriores</option>
                                                            <option value="dp_15">Pulpotomía</option>
                                                            <option value="dp_16">Pulpectomía anterior</option>
                                                            <option value="dp_17">Pulpectomía posterior</option>
                                                            <option value="dp_18">Recubrimiento pulpar directo</option>
                                                            <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                            <option value="dp_20">Sellantes pieza temporal y permanente</option>
                                                            <option value="dp_21">Sesión de adaptación</option>
                                                            <option value="dp_22">Trat. de conducto en pieza temporal anterior</option>
                                                            <option value="dp_23">Tratamiento de conducto en pieza temporal posterior</option>
                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                        </optgroup>
                                                    </select>
                                                </td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <h5 class="text-center text-c-blue">GRUPO II</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs"style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">Pieza</th>
                                                <th class="text-center align-middle px-1 py-1">Cara</th>
                                                <th class="text-center align-middle px-1 py-1">Diagnostico</th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <script type = "text / javascript" > 
                                                        $ ( '#example-multiple-optgroups' ). multiselect ();
                                                    </script>
                                                    <select class="form-control form-control-sm"> 
                                                        <option value = "6-1"> 6-1 </option>  
                                                        <option value = "6-2"> 6-2 </option> 
                                                        <option value = "6-3"> 6-3 </option>  
                                                        <option value = "6-4"> 6-4 </option>
                                                        <option value = "6-5"> 6-5 </option>  
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1"> 
                                                    <select class="form-control form-control-sm" id="cara_g2" name="cara_g2"> 
                                                        <optgroup label = "cara" class = "cara"  >  
                                                            <option value = "c-1">Oclusal</option> 
                                                            <option value = "c-2">Vestibular</option>  
                                                            <option value = "c-3">Distal</option>
                                                            <option value = "c-4">Mesial</option>  
                                                            <option value = "c-4">Palatina</option> 
                                                        </optgroup>
                                                        <optgroup label = "Diente" class = "diente" id="diente_g2" name="diente_g2"  
                                                            <option value = "d-1" > Total </option> 
                                                            <option value = "d-2" > Raiz </option> 
                                                            <option value = "d-3" > Encia </option>
                                                            <option value = "d-4" > Endodoncia </option> 
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm" id="dgp_g2" name="dgp_g2">
                                                        <option value = "0">Diagnostico</option>
                                                        <option value = "01">Caries</option>
                                                        <option value = "02">Fractura</option>
                                                        <option value = "03">periodontopatia</option>
                                                        <option value = "04">profilaxis</option>
                                                        <option value = "05">Restos radiculares</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t18">
                                                        <img src="i/dientes/d61.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="tcara">
                                                        <img src="../assets/img_dental/caras.png" class="wid-70">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                   <span>Pieza cara Diagnostico y Tratamiento</span> <!--esto se lleva al presupuesto-->
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1"colspan="3">
                                                    <select class="form-control form-control-sm" id="ttop_g2" name="ttop_g2">
                                                    <option>seleccione tratamiento</option>
                                                        <optgroup  label="Tratamiento Pediátrico">
                                                            <option value="dp_1">Examen inicial, plan de tratamiento y presupuesto</option>
                                                            <option value="dp_2">Instrucción y control de higiene y profilaxis</option>
                                                            <option value="dp_3">Aplicación flúor gel</option>
                                                            <option value="dp_4">Aplicación flúor barniz</option>
                                                            <option value="dp_5">Destartraje (por grupo, máximo dos) </option>
                                                            <option value="dp_6">Endodoncia pieza permanente</option>
                                                            <option value="dp_7">Exodoncia simple diente temporal</option>
                                                            <option value="dp_8">Mantenedor de espacio fijo o removible /valor no incluye laboratorio</option>
                                                            <option value="dp_9">Obturación v. ionómero pieza temporal anterior y posterior simple</option>
                                                            <option value="dp_10">Obturación v. ionómero pieza temporal anterior y posterior compuesto</option>
                                                            <option value="dp_11">Obturación resina fotocurado composite pieza permanente anterior y posterior simple</option>
                                                            <option value="dp_12">Obturación resina fotocurado composite pieza permanente anterior y posterior compuesto</option>
                                                            <option value="dp_13">Obturación resina fotocurado, reconstitución</option>
                                                            <option value="dp_14">Obturación resina fotocurado carillas anteriores</option>
                                                            <option value="dp_15">Pulpotomía</option>
                                                            <option value="dp_16">Pulpectomía anterior</option>
                                                            <option value="dp_17">Pulpectomía posterior</option>
                                                            <option value="dp_18">Recubrimiento pulpar directo</option>
                                                            <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                            <option value="dp_20">Sellantes pieza temporal y permanente</option>
                                                            <option value="dp_21">Sesión de adaptación</option>
                                                            <option value="dp_22">Trat. de conducto en pieza temporal anterior</option>
                                                            <option value="dp_23">Tratamiento de conducto en pieza temporal posterior</option>
                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                        </optgroup>
                                                    </select>
                                                </td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <h5 class="text-center text-c-blue">GRUPO III</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs"style="width:100% ;">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">Pieza</th>
                                                <th class="text-center align-middle px-1 py-1">Cara</th>
                                                <th class="text-center align-middle px-1 py-1">Diagnostico</th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <script type = "text / javascript" > 
                                                        $ ( '#example-multiple-optgroups' ). multiselect ();
                                                    </script>
                                                    <select class="form-control form-control-sm"> 
                                                        <option value = "8-5"> 8-5</option>  
                                                        <option value = "8-4"> 8-4 </option>
                                                        <option value = "8-3"> 8-3 </option>  
                                                        <option value = "8-2"> 8-2 </option>
                                                        <option value = "8-1"> 8-1</option>            
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1"> 
                                                    <select class="form-control form-control-sm" id="cara_g3" name="cara_g3"> 
                                                        <optgroup label = "cara" class = "cara"  >  
                                                            <option value = "c-1">Oclusal</option> 
                                                            <option value = "c-2">Vestibular</option>  
                                                            <option value = "c-3">Distal</option>
                                                            <option value = "c-4">Mesial</option>  
                                                            <option value = "c-4">Palatina</option> 
                                                        </optgroup>
                                                        <optgroup label = "Diente" class = "diente" id="diente_g3" name="diente_g3"  
                                                            <option value = "d-1" > Total </option> 
                                                            <option value = "d-2" > Raiz </option> 
                                                            <option value = "d-3" > Encia </option>
                                                            <option value = "d-4" > Endodoncia </option> 
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm" id="dgp_g3" name="dgp_g3">
                                                        <option value = "0">Diagnostico</option>
                                                        <option value = "01">Caries</option>
                                                        <option value = "02">Fractura</option>
                                                        <option value = "03">periodontopatia</option>
                                                        <option value = "04">profilaxis</option>
                                                        <option value = "05">Restos radiculares</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t26">
                                                        <img src="i/dientes/d84.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t17">
                                                        <img src="../assets/img_dental/caras.png" class="wid-70">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                   <span>Pieza cara Diagnostico y Tratamiento</span> <!--esto se lleva al presupuesto-->
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1"colspan="3">
                                                    <select class="form-control form-control-sm" id="ttop_g3" name="ttop_g3">
                                                    <option>seleccione tratamiento</option>
                                                        <optgroup  label="Tratamiento Pediátrico">
                                                            <option value="dp_1">Examen inicial, plan de tratamiento y presupuesto</option>
                                                            <option value="dp_2">Instrucción y control de higiene y profilaxis</option>
                                                            <option value="dp_3">Aplicación flúor gel</option>
                                                            <option value="dp_4">Aplicación flúor barniz</option>
                                                            <option value="dp_5">Destartraje (por grupo, máximo dos) </option>
                                                            <option value="dp_6">Endodoncia pieza permanente</option>
                                                            <option value="dp_7">Exodoncia simple diente temporal</option>
                                                            <option value="dp_8">Mantenedor de espacio fijo o removible /valor no incluye laboratorio</option>
                                                            <option value="dp_9">Obturación v. ionómero pieza temporal anterior y posterior simple</option>
                                                            <option value="dp_10">Obturación v. ionómero pieza temporal anterior y posterior compuesto</option>
                                                            <option value="dp_11">Obturación resina fotocurado composite pieza permanente anterior y posterior simple</option>
                                                            <option value="dp_12">Obturación resina fotocurado composite pieza permanente anterior y posterior compuesto</option>
                                                            <option value="dp_13">Obturación resina fotocurado, reconstitución</option>
                                                            <option value="dp_14">Obturación resina fotocurado carillas anteriores</option>
                                                            <option value="dp_15">Pulpotomía</option>
                                                            <option value="dp_16">Pulpectomía anterior</option>
                                                            <option value="dp_17">Pulpectomía posterior</option>
                                                            <option value="dp_18">Recubrimiento pulpar directo</option>
                                                            <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                            <option value="dp_20">Sellantes pieza temporal y permanente</option>
                                                            <option value="dp_21">Sesión de adaptación</option>
                                                            <option value="dp_22">Trat. de conducto en pieza temporal anterior</option>
                                                            <option value="dp_23">Tratamiento de conducto en pieza temporal posterior</option>
                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                        </optgroup>
                                                    </select>
                                                </td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <h5 class="text-center text-c-blue">GRUPO IV</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs"style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">Pieza</th>
                                                <th class="text-center align-middle px-1 py-1">Cara</th>
                                                <th class="text-center align-middle px-1 py-1">Diagnostico</th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <!-- <select class="form-control form-control-sm" id="" name="">-->
                                                    <script type = "text / javascript" > 
                                                        $ ( '#example-multiple-optgroups' ). multiselect ();
                                                    </script>
                                                    <select class="form-control form-control-sm"> 
                                                        <option value = "7-1"> 7-1 </option>  
                                                        <option value = "7-2"> 7-2 </option> 
                                                        <option value = "7-3"> 7-3 </option>  
                                                        <option value = "7-4"> 7-4 </option>
                                                        <option value = "7-5"> 7-5</option>            
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1"> 
                                                    <select class="form-control form-control-sm" id="cara_g4" name="cara_g4"> 
                                                        <optgroup label = "cara" class = "cara"  >  
                                                            <option value = "c-1">Oclusal</option> 
                                                            <option value = "c-2">Vestibular</option>  
                                                            <option value = "c-3">Distal</option>
                                                            <option value = "c-4">Mesial</option>  
                                                            <option value = "c-4">Palatina</option> 
                                                        </optgroup>
                                                        <optgroup label = "Diente" class = "diente" id="diente_g4" name="diente_g4"  
                                                            <option value = "d-1" > Total </option> 
                                                            <option value = "d-2" > Raiz </option> 
                                                            <option value = "d-3" > Encia </option>
                                                            <option value = "d-4" > Endodoncia </option> 
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm" id="dgp_g4" name="dgp_g4">
                                                        <option value = "0">Diagnostico</option>
                                                        <option value = "01">Caries</option>
                                                        <option value = "02">Fractura</option>
                                                        <option value = "03">periodontopatia</option>
                                                        <option value = "04">profilaxis</option>
                                                        <option value = "05">Restos radiculares</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t47">
                                                        <img src="i/dientes/d72.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="tcara">
                                                        <img src="../assets/img_dental/caras.png" class="wid-70">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <span>Pieza cara Diagnostico y Tratamiento</span> <!--esto se lleva al presupuesto-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1"colspan="3">
                                                    <select class="form-control form-control-sm" id="ttop_g4" name="ttop_g4">
                                                    <option>seleccione tratamiento</option>
                                                        <optgroup  label="Tratamiento Pediátrico">
                                                            <option value="dp_1">Examen inicial, plan de tratamiento y presupuesto</option>
                                                            <option value="dp_2">Instrucción y control de higiene y profilaxis</option>
                                                            <option value="dp_3">Aplicación flúor gel</option>
                                                            <option value="dp_4">Aplicación flúor barniz</option>
                                                            <option value="dp_5">Destartraje (por grupo, máximo dos) </option>
                                                            <option value="dp_6">Endodoncia pieza permanente</option>
                                                            <option value="dp_7">Exodoncia simple diente temporal</option>
                                                            <option value="dp_8">Mantenedor de espacio fijo o removible /valor no incluye laboratorio</option>
                                                            <option value="dp_9">Obturación v. ionómero pieza temporal anterior y posterior simple</option>
                                                            <option value="dp_10">Obturación v. ionómero pieza temporal anterior y posterior compuesto</option>
                                                            <option value="dp_11">Obturación resina fotocurado composite pieza permanente anterior y posterior simple</option>
                                                            <option value="dp_12">Obturación resina fotocurado composite pieza permanente anterior y posterior compuesto</option>
                                                            <option value="dp_13">Obturación resina fotocurado, reconstitución</option>
                                                            <option value="dp_14">Obturación resina fotocurado carillas anteriores</option>
                                                            <option value="dp_15">Pulpotomía</option>
                                                            <option value="dp_16">Pulpectomía anterior</option>
                                                            <option value="dp_17">Pulpectomía posterior</option>
                                                            <option value="dp_18">Recubrimiento pulpar directo</option>
                                                            <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                            <option value="dp_20">Sellantes pieza temporal y permanente</option>
                                                            <option value="dp_21">Sesión de adaptación</option>
                                                            <option value="dp_22">Trat. de conducto en pieza temporal anterior</option>
                                                            <option value="dp_23">Tratamiento de conducto en pieza temporal posterior</option>
                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                        </optgroup>
                                                    </select>
                                                </td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-12 text-center mx-auto">
                                <button type="reset" class="btn btn-danger">Limpiar formulario</button>
                                <button type="submit" class="btn btn-info">Enviar a presupuesto</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!--Simbología-->                        
                        <div class="card h-40" >
                            <div class="form-group col-md-12">
                                <div class="card-header text-center">
                                    <h6 class="text-center">SIMBOLOGIA ODONTOGRAMA</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">S</th>
                                                <th class="text-center align-middle px-0 py-1">Imagen</th>
                                                <th class="text-center align-middle px-0 py-1">Tipo</th>                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/sano.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Sano</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/ausente.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Ausente</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/carie.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Caries</label>
                                                </td>                
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/composite.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Composite</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/corona.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Corona</label>
                                                </td>           
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/endodoncia.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Endodoncia</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/fractura.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Fractura</label>
                                                </td>                 
                                            </tr>
                                            
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/incrustacion.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Incrustación</label>
                                                </td>               
                                            </tr>


                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/mantenedor_espacio.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Mantenedor de Espacio</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/pulpotomia.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Pulpotomía</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/pulpectomia.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Pulpectomía</label>
                                                </td>               
                                            </tr>


                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/obturacion.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Obturación</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/sellante.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Sellante</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/surco.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-left align-middle px-0 py-1">
                                                    <label class="lbl_od">Surco</label>
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
            <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Tratamiento según presupuesto</h5>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="dt-responsive table-responsive pb-4">
                            <table id="tratamiento_presupuesto" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
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
                                            <button type="button" class="btn btn-info btn-sm" onclick="presupuesto();">
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
</div>
<?php
include("modals/modal_presupuesto.php");
?>


