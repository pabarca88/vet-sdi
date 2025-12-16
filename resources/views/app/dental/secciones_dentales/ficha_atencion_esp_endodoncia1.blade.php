<ul class="nav nav-tabs mb-3 mt-3" id="dental" role="tablist">
    <li class="nav-item">
        <a class="nav-atencion-medica active text-uppercase" id="ficha-dental-tab" data-toggle="tab" href="#ficha-dental" role="tab" aria-controls="ficha-dental" aria-selected="true">Atención dental Endodoncia</a>
    </li>
   
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="cont_endo-tab" data-toggle="tab" href="#cont_endo" role="tab" aria-controls="cont_endo" aria-selected="false">Control</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="Dgplantto-tab" data-toggle="tab" href="#Dgplantto" role="tab" aria-controls="Dgplantto" aria-selected="false">Plan de tratamiento</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="tratamiento_endo-tab" data-toggle="tab" href="#tratamiento_endo" role="tab" aria-controls="tratamiento_endo" aria-selected="false">Tratamiento</a>
    </li>
</ul>
<div class="row pb-3">
    <div class="col-md-12">
        <div class="tab-content" id="dental-contenido">
            <div class="tab-pane fade show active" id="ficha-dental" role="tabpanel" aria-labelledby="ficha-dental-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Ficha de atención dental de endodoncia</h5>
                        <hr>
                    </div>
                    <hr>
                    <!--Formulario / Menor de edad-->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h6>Paciente menor de edad</h6>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row mb-1">
                                        <div class="col-md-12">
                                            <h6>Información del acompañente</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Rut</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Nombre y Apellidos</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                        </div>
                                        <div class="form-group col-md-4" id="form_0">
                                            <label class="floating-label">Relación</label>
                                            <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                        </div>
                                    </div>
                                    <div class="form-row mb-1">
                                        <div class="col-md-12">
                                            <h6>Información del responsable del pago</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3" id="form_0">
                                            <label class="floating-label">Rut</label>
                                            <input type="text" class="form-control form-control-sm" name="responsable_pago" id="responsable_pago">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Nombre y Apellidos</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Email</label>
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
                                                    <label class="floating-label">Descripción</label>
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
                                                    <label class="floating-label">Descripción</label>
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
                            <div class="card mb-3">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Signos vitales y Otros</h6>
                                    <i id="signos_vitales" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer"></i>
                                </div>
                                <div class="card-body" id="form_3" style="display:none">
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
                                                <label class="floating-label">Estado Nutricional</label>
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
                                                    <input type="checkbox" id="com_trasl">
                                                    <label for="com_trasl" class="cr"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row" id="form_2" style="display:none">
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
                    <!--Cierre: Formulario / Signos vitales y otros-->
                    <!--Formulario / endodoncia-->
                    <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-header bg-info align-middle">
                                <h6 class="float-left d-inline">Ficha endodoncia</h6>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Pieza N°</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Derivado por:</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Zona de Dolor</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Historia Anterior</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="" id=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Tipo de dolor</h6>
                                                </div>
                                                <div class="card-body pt-1">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <form >
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                    Espontáneo
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Provocado
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Pulsátil
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Ocacional
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Constante
                                                                    </label>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <form>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                    Leve
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Moderado
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Intenso
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Localizado
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Referido
                                                                    </label>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Que provoca el dolor</h6>
                                                </div>
                                                <div class="card-body pt-1">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <form>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                    Calor
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Frio
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Actividad
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Masticación
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Otro
                                                                    </label>
                                                                </div>
                                                            </form>      
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <form>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                    Palpación
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Decúbito
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Diurno
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                    Nocturno
                                                                    </label>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Tiempo y evolución</h6>
                                                </div>
                                                <div class="card-body pt-1">
                                                    <form>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                            Menos de una semana
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                            <label class="form-check-label" for="flexCheckChecked">
                                                            Más de una semana
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                            <label class="form-check-label" for="flexCheckChecked">
                                                            Efecto de analgésicos
                                                            </label>
                                                        </div>
                                                    </form>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Examen extra-oral</h6>
                                                </div>
                                                <div class="card-body pt-1">
                                                    <form>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="extra_aum_vol">
                                                            <label class="form-check-label" for="extra_aum_vol">
                                                            Aumento de Volumen
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="extra_fist">
                                                            <label class="form-check-label" for="extra_fist">
                                                            Fístula
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="padding-bottom:12px">
                                                            <input class="form-check-input" type="checkbox" value="" id="extra_adeno" >
                                                            <label class="form-check-label" for="extra_adeno">
                                                            Adenopatías
                                                            </label>
                                                        </div>
                                                    </form> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Examen intra-oral</h6>
                                                </div>
                                                <div class="card-body pt-3">
                                                    <form>
                                                        <div class="form-group">
                                                            <label class="floating-label">Examen del Periodonto</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="" id=""></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="floating-label">Examen Intra Oral </label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="" id=""></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Radiología</h6>
                                                </div>
                                                <div class="card-body pt-3">
                                                    <form>
                                                        <div class="form-group">
                                                            <label class="floating-label"></label>
                                                            <select id="" name="" class="form-control form-control-sm">
                                                                <option selected value="0">Espacio Periodontal Apical </option>
                                                                <option>Normal</option> 
                                                                <option>Engrosado</option> 
                                                                <option>Ausente</option>
                                                            </select>
                                                        </div>
                                               
                                                        <div class="form-group">
                                                            <label class="floating-label"></label>
                                                            <select id="" name="" class="form-control form-control-sm"  >
                                                                <option selected value="0">Hueso Alveolar Apical </option>
                                                                <option>Normal</option> 
                                                                <option>Zona Apical Difusa</option> 
                                                                <option>Zona Apical Corticalizada</option>
                                                                <option>Osteítis Condensante</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12">
                                            <div class="card mb-3">
                                                <div class="card-header bg-info align-middle pt-1">
                                                    <h6 class="float-left d-inline">Examen por pieza</h6>
                                                    <i id="examen_pieza" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer"></i>
                                                </div>
                                                <div class="card-body pb-2" id="form_4" style="display:none">
                                                    <div class="table-responsive">
                                                        <table class="table table-xs w-100 table-bordered mb-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width:12%">Fecha</th>
                                                                <th class="text-center" style="width:12%">Nº Pieza</th>
                                                                <th class="text-center" style="width:16%">Resp Calor</th>
                                                                <th class="text-center" style="width:16%">Resp Frio</th>
                                                                <th class="text-center" style="width:16%">Eléctrico</th>
                                                                <th class="text-center" style="width:16%">Percución</th>
                                                                <th class="text-center" style="width:16%">Exploración</th>
                                                                <th class="text-center" style="width:16%">Cavitaria</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                               <td class="text-center text-wrap">
                                                                   <input  type="date" class="form-control form-control-sm f-12" name="" id="">
                                                               </td>
                                                               <td class="text-center text-wrap">
                                                                   <input  type="number" class="form-control form-control-sm f-12" name="" id="">
                                                               </td>
                                                               <td class="text-center text-wrap">
                                                                   <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                                        <option><span>N/R </span> No realizada</option>
                                                                        <option><span>↑ </span> Aumentado</option> 
                                                                        <option><span>↓ </span> Disminuido</option> 
                                                                        <option><span>N </span> Normal</a></option> 
                                                                        <option><span>(-) </span> No responde</a></option>
                                                                    </select>
                                                               </td>
                                                               <td class="text-center text-wrap">
                                                                   <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                                        <option><span>N/R </span> No realizada</option>
                                                                        <option><span>↑ </span> Aumentado</option> 
                                                                        <option><span>↓ </span> Disminuido</option> 
                                                                        <option><span>N </span> Normal</a></option> 
                                                                        <option><span>(-) </span> No responde</a></option>
                                                                    </select>
                                                               </td>
                                                               <td class="text-center text-wrap">
                                                                   <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                                        <option><span>N/R </span> No realizada</option>
                                                                        <option><span>↑ </span> Aumentado</option> 
                                                                        <option><span>↓ </span> Disminuido</option> 
                                                                        <option><span>N </span> Normal</a></option> 
                                                                        <option><span>(-) </span> No responde</a></option>
                                                                    </select>
                                                               </td>
                                                               <td class="text-center text-wrap">
                                                                   <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                                        <option><span>N/R </span> No realizada</option>
                                                                        <option><span>↑ </span> Aumentado</option> 
                                                                        <option><span>↓ </span> Disminuido</option> 
                                                                        <option><span>N </span> Normal</a></option> 
                                                                        <option><span>(-) </span> No responde</a></option>
                                                                    </select>
                                                               </td>
                                                               <td class="text-center text-wrap">
                                                                   <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                                        <option><span>N/R </span> No realizada</option>
                                                                        <option><span>↑ </span> Aumentado</option> 
                                                                        <option><span>↓ </span> Disminuido</option> 
                                                                        <option><span>N </span> Normal</a></option> 
                                                                        <option><span>(-) </span> No responde</a></option>
                                                                    </select>
                                                               </td>
                                                               <td class="text-center text-wrap">
                                                                   <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                                        <option><span>N/R </span> No realizada</option>
                                                                        <option><span>↑ </span> Aumentado</option> 
                                                                        <option><span>↓ </span> Disminuido</option> 
                                                                        <option><span>N </span> Normal</a></option> 
                                                                        <option><span>(-) </span> No responde</a></option>
                                                                    </select>
                                                               </td>
                                                            </tr>

                                                        </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row py-1">
                                                        <div class="col-md-12 py-0">
                                                            <button type="button" class="btn btn-sm btn-info">Agregar fila</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Formulario / endodoncia-->
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
                                            <label class="floating-label">Hipótesis diagnóstica</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Diagnóstico CIE-10</label>
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
                    
                    <div class="col-sm-12 mt-3">
                        <hr>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-info">Guardar ficha clínica</button>
                            <button type="button" class="btn btn-success">Imprimir</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="cont_endo" role="tabpanel" aria-labelledby="cont_endo-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Control</h5>
                        <hr>
                    </div>
                    <hr>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-xs w-100 table-bordered mb-1">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:12%">Fecha</th>
                                        <th class="text-center" style="width:12%">Nº Pieza</th>
                                        <th class="text-center" style="width:16%">Resp Calor</th>
                                        <th class="text-center" style="width:16%">Resp Frio</th>
                                        <th class="text-center" style="width:16%">Eléctrico</th>
                                        <th class="text-center" style="width:16%">Percución</th>
                                        <th class="text-center" style="width:16%">Exploración</th>
                                        <th class="text-center" style="width:16%">Cavitaria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                       <td class="text-center text-wrap">
                                           <input  type="date" class="form-control form-control-sm f-12" name="" id="">
                                       </td>
                                       <td class="text-center text-wrap">
                                           <input  type="number" class="form-control form-control-sm f-12" name="" id="">
                                       </td>
                                       <td class="text-center text-wrap">
                                           <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                <option><span>N/R </span> No realizada</option>
                                                <option><span>↑ </span> Aumentado</option> 
                                                <option><span>↓ </span> Disminuido</option> 
                                                <option><span>N </span> Normal</a></option> 
                                                <option><span>(-) </span> No responde</a></option>
                                            </select>
                                       </td>
                                       <td class="text-center text-wrap">
                                           <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                <option><span>N/R </span> No realizada</option>
                                                <option><span>↑ </span> Aumentado</option> 
                                                <option><span>↓ </span> Disminuido</option> 
                                                <option><span>N </span> Normal</a></option> 
                                                <option><span>(-) </span> No responde</a></option>
                                            </select>
                                       </td>
                                       <td class="text-center text-wrap">
                                           <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                <option><span>N/R </span> No realizada</option>
                                                <option><span>↑ </span> Aumentado</option> 
                                                <option><span>↓ </span> Disminuido</option> 
                                                <option><span>N </span> Normal</a></option> 
                                                <option><span>(-) </span> No responde</a></option>
                                            </select>
                                       </td>
                                       <td class="text-center text-wrap">
                                           <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                <option><span>N/R </span> No realizada</option>
                                                <option><span>↑ </span> Aumentado</option> 
                                                <option><span>↓ </span> Disminuido</option> 
                                                <option><span>N </span> Normal</a></option> 
                                                <option><span>(-) </span> No responde</a></option>
                                            </select>
                                       </td>
                                       <td class="text-center text-wrap">
                                           <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                <option><span>N/R </span> No realizada</option>
                                                <option><span>↑ </span> Aumentado</option> 
                                                <option><span>↓ </span> Disminuido</option> 
                                                <option><span>N </span> Normal</a></option> 
                                                <option><span>(-) </span> No responde</a></option>
                                            </select>
                                       </td>
                                       <td class="text-center text-wrap">
                                           <select id="sel_endo" name="sel_endo" class="form-control form-control-sm f-12 text-danger">
                                                <option><span>N/R </span> No realizada</option>
                                                <option><span>↑ </span> Aumentado</option> 
                                                <option><span>↓ </span> Disminuido</option> 
                                                <option><span>N </span> Normal</a></option> 
                                                <option><span>(-) </span> No responde</a></option>
                                            </select>
                                       </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row py-1">
                            <div class="col-md-12 py-0">
                                <button type="button" class="btn btn-sm btn-info">Agregar fila</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="Dgplantto" role="tabpanel" aria-labelledby="Dgplantto-tab">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Plan de tratamiento</h5>
                        <hr>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="floating-label">Diagnóstico endodóntico</label>
                        <textarea id="diagnostico_endodoncico" name="diagnostico_endodoncico" class="form-control input-sm resize_vertical" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Fundamentación diagnóstica</label>
                        <textarea id="fund_diag_endodoncico" name="fund_diag_endodoncico" class="form-control input-sm resize_vertical" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Plan de trabajo y tratamiento</label>
                        <textarea id="plan_endodoncico" name="plan_endodoncico" class="form-control input-sm resize_vertical" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 float-right" id="form_derperi">
                        <button type="button" class="btn btn-success btn-sm float-right" onclick="d_deriv_tto();"><i class="feather icon-file-plus"></i> Derivar a Otra Especialidad</button>
                    </div>
                </div> 
            </div>
            <div class="tab-pane fade" id="tratamiento_endo" role="tabpanel" aria-labelledby="tratamiento_endo-tab">
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
include("modals_especialidad/modal_presupuesto.php");
include("modals_especialidad/derivacion_a_tratamiento.php");
?>
