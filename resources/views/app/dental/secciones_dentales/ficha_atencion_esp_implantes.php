<ul class="nav nav-tabs mb-3 mt-3" id="dental" role="tablist">
    <li class="nav-item">
        <a class="nav-atencion-medica active text-uppercase" id="ficha-dental-tab" data-toggle="tab" href="#ficha-dental" role="tab" aria-controls="ficha-dental" aria-selected="true">Atención dental Implantología</a>
    </li>
   
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="est_rx-tab" data-toggle="tab" href="#est_rx" role="tab" aria-controls="est_rx" aria-selected="false">Estudio Radiológico</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="analisis-tab" data-toggle="tab" href="#analisis" role="tab" aria-controls="analisis" aria-selected="false">Análisis De Modelos</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="resumen_pat-tab" data-toggle="tab" href="#resumen_pat" role="tab" aria-controls="resumen_pat" aria-selected="false">Análisis General</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="cirugia-tab" data-toggle="tab" href="#cirugia" role="tab" aria-controls="cirugia" aria-selected="false">Tratamiento Quirúrgico</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="tratamiento_orto-tab" data-toggle="tab" href="#tratamiento_orto" role="tab" aria-controls="tratamiento_orto" aria-selected="false">Controles</a>
    </li>
</ul>
<div class="row">
    <div class="col-md-12">
        <div class="tab-content" id="dental-contenido">
            <div class="tab-pane fade show active" id="ficha-dental" role="tabpanel" aria-labelledby="ficha-dental-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Ficha de atención dental especialidad implantología</h5>
                        <hr>
                    </div>
                    <hr>
                    <!--Formulario / Menor de edad-->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
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
                                    <div class="card-header">
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
                                    <div class="card-header">
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
                                    <div class="card-header">
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
                            <div class="card-header align-middle">
                                <h6 class="float-left d-inline">Signos vitales y otros</h6>
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
                    <!--Formulario / implantes-->
                    <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-header align-middle">
                                <h6 class="float-left d-inline">Ficha de implantología para estudio clínico</h6>
                                <i id="signos_vitales" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer"></i>
                            </div>
                            <div class="card-body pt-2"><!--id="form_5" style="display:none"-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 pb-2">
                                        <h6>Examen extra-oral</h6>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label"></label>
                                            <select id="" name="" class="form-control form-control-sm">
                                                <option selected value="0">Biotipo </option>
                                                <option>Biotipo Mesofacial</option> 
                                                <option>Biotipo Braquifacial</option> 
                                                <option>Biotipo Dólicofacial</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label"></label>
                                            <select id="" name="" class="form-control form-control-sm"  >
                                                <option selected value="0">Adenopatías Palpables </option>
                                                <option>Lado Derecho</option> 
                                                <option>Lado Izquierdo</option> 
                                                <option>Ambos Lados</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label"></label>
                                            <select id="" name="" class="form-control form-control-sm">
                                                <option selected value="0">Examen Frontal</option>
                                                <option>Ex- Front Simétrico</option> 
                                                <option>Ex- Front Asimétrico Der.</option> 
                                                <option>Ex- Front Asimétrico Izq.</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label"></label>
                                            <select id="" name="" class="form-control form-control-sm">
                                                <option selected value="0">Perfíl</option>
                                                <option>Perfíl Cóncavo</option> 
                                                <option>Perfíl Convexo</option> 
                                                <option>Perfíl Rectilínio</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label"></label>
                                            <select id="" name="" class="form-control form-control-sm">
                                                <option selected value="0">Maxilar Superior</option>
                                                <option>Ortognático</option> 
                                                <option>Prognático</option> 
                                                <option>Retrognático</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label"></label>
                                            <select id="" name="" class="form-control form-control-sm">
                                                <option selected value="0">Maxilar Inferior</option>
                                                <option>M.I Ortognático</option> 
                                                <option>M.I Retrognático</option> 
                                                <option>M.I Prognático</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label"></label>
                                            <select id="" name="" class="form-control form-control-sm">
                                                <option selected value="0">Labio Superior</option>
                                                <option>LS Normal</option> 
                                                <option>LS Corto</option> 
                                                <option>LS Protruído</option>
                                                <option>LS Retruído</option>
                                                <option>LS Hipertónico</option>
                                                <option>LS Hipotónico</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label"></label>
                                            <select id="" name="" class="form-control form-control-sm">
                                                <option selected value="0">Labio Inferior</option>
                                                <option>L.I. Normal</option> 
                                                <option>L.I. Evertido</option> 
                                                <option>L.I. Hipertónico</option>
                                                <option>L.I. Hipotónico</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label"></label>
                                            <select id="" name="" class="form-control form-control-sm">
                                                <option selected value="0">Cierre Labial</option>
                                                <option>cierre Normal</option> 
                                                <option>Cierre Forzado</option> 
                                                <option>Cierre Incompetente</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 pb-2">
                                        <h6>Articulación Temporo-Mandibular / Transtorno Temporo-Mandibular</h6>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="col-sm-12">
				        <div class="card">
                            <a class="label" data-toggle="collapse" href="#f_orto" role="button" aria-expanded="false" aria-controls="f_orto">
                            <div class="card mb-3">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="#" style="color:white;text-align:center">FICHA IMPLANTOLOGÍA <br>Estudio Clínico</h6>
                                    <i id="f_orto" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer;color:white"></i>
                                </div>
                            </div>
                            </a>
					        <div class="collapse" id="f_orto" style="">
						        <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12">
                                                <!--<div class="card">
                                                    <div class="card-header">
                                                        <h6 class="text-center">Examen Extra-Oral</h6>
                                                    </div>
                                                    <div class="card-body pt-1 pb-1" >
                                                        <div class="form-row">
                                                            <form>
                                                                <div class="form-group col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm">
                                                                            <option selected value="0">Biotipo </option>
                                                                            <option>Biotipo Mesofacial</option> 
                                                                            <option>Biotipo Braquifacial</option> 
                                                                            <option>Biotipo Dólicofacial</option>
                                                                        </select>
                                                                    </div>
                                               
                                                                    <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm"  >
                                                                            <option selected value="0">Perfíl </option>
                                                                            <option>Perfíl Cóncavo</option> 
                                                                            <option>Perfíl Convexo</option> 
                                                                            <option>Perfíl Rectilínio</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm"  >
                                                                            <option selected value="0">Labio Superior </option>
                                                                            <option>LS Normal</option> 
                                                                            <option>LS Corto</option> 
                                                                            <option>LS Protruído</option>
                                                                            <option>LS Retruído</option>
                                                                            <option>LS Hipertónico</option>
                                                                            <option>LS Hipotónico</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm"  >
                                                                            <option selected value="0">Adenopatías Palpables </option>
                                                                            <option>Lado Derecho</option> 
                                                                            <option>Lado Izquierdo</option> 
                                                                            <option>Ambos Lados</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm"  >
                                                                            <option selected value="0">Maxilar Superior </option>
                                                                            <option>Ortognático</option> 
                                                                            <option>Prognático</option> 
                                                                            <option>Retrognático</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm">
                                                                            <option selected value="0">Labio Inferior </option>
                                                                            <option>L.I. Normal</option> 
                                                                            <option>L.I. Evertido</option> 
                                                                            <option>L.I. Hipertónico</option>
                                                                            <option>L.I. Hipotónico</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm">
                                                                            <option selected value="0">Examen Frontal</option>
                                                                            <option>Ex- Front Simétrico</option> 
                                                                            <option>Ex- Front Asimétrico Der.</option> 
                                                                            <option>Ex- Front Asimétrico Izq.</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm"  >
                                                                            <option selected value="0">Maxilar Inferior </option>
                                                                            <option>M.I Ortognático</option> 
                                                                            <option>M.I Retrognático</option> 
                                                                            <option>M.I Prognático</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm"  >
                                                                            <option selected value="0">Cierre Labial </option>
                                                                            <option>cierre Normal</option> 
                                                                            <option>Cierre Forzado</option> 
                                                                            <option>Cierre Incompetente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>-->
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6 class="text-center">Articulación Temporo-Mandibular    /    Transtorno Temporo-Mandibular</h6>
                                                    </div>
                                            
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <div class="card-body">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12 mx-auto">
                                                                            <label class="floating-label">Articulacíon (Describir ruidos, saltos, hipomovilidad o hipermovilidad)</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" name="" id=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="card-body">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12 mx-auto">
                                                                            <label class="floating-label">Otros (Describir)</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" name="" id=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6 class="text-center">Examen de Oclusión - Eje Sagital</h6>
                                                    </div>
                                            
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <div class="card-body">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4 mx-auto" style=" font-size: small;" >
                                                                            <h5 style="color: red;">Zona Anterior</h5>
                                                                        </div>
                                                                        <div class="form-group col-md-4 mx-auto">
                                                                                <h6 style="color: #808080">Overjet (Resalte)</h6>
                                                                        </div>
                                                                        <div class="form-group col-md-4 mx-auto">
                                                                            <label class="floating-label">En mm.</label>
                                                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4 mx-auto" style="width:760px;height:40px; font-size: small;" >
                                                                            <h5 style="color: #6666FF; ">Zonas Laterales</h5>
                                                                        </div>
                                                                        <div class="form-group col-md-4 mx-auto">
                                                                                <h5 style="color: #6666FF; ">Lateral Derecha</h5>
                                                                        </div>
                                                                        <div class="form-group col-md-4 mx-auto">
                                                                                <h5 style="color: #6666FF; ">Lateral Izquierda</h5>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4 mx-auto" style="width:760px;height:40px; font-size: small;" >
                                                                            <h6 style="color: #808080">Relación Canina</h6>
                                                                        </div>
                                                                        <div class="form-group col-md-4 mx-auto">
                                                                                <label class="floating-label">Relación Canina Derecha</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                        </div>
                                                                        <div class="form-group col-md-4 mx-auto">
                                                                                <label class="floating-label">Relación Canina Izquierda</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4 mx-auto" style="width:760px;height:40px; font-size: small;" >
                                                                            <h6 style="color: #808080">Relación Molar Temporal</h6>
                                                                        </div>
                                                                        <div class="form-group col-md-4 mx-auto">
                                                                            <label class="floating-label"></label>
                                                                            <select id="" name="" class="form-control form-control-sm">
                                                                                <option selected value="0">Plano Postlácteo</option>
                                                                                <option>Escalón Mesial</option> 
                                                                                <option>Escalón Distal</option> 
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4 mx-auto">
                                                                            <label class="floating-label"></label>
                                                                            <select id="" name="" class="form-control form-control-sm">
                                                                                <option selected value="0">Plano Postlácteo</option>
                                                                                <option>Escalón Mesial</option> 
                                                                                <option>Escalón Distal</option> 
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4 mx-auto" style="width:760px;height:40px; font-size: small;" >
                                                                            <h6 style="color: #808080">Relación Molar Permanente</h6>
                                                                        </div>
                                                                        <div class="form-group col-md-4 mx-auto">
                                                                                <label class="floating-label">Relación Molar Permanente Derecha</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                        </div>
                                                                        <div class="form-group col-md-4 mx-auto">
                                                                                <label class="floating-label">Relación Molar Permanente Izquierda</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6 class="text-center">Examen de Oclusión - Eje Transversal </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6 class="text-center">Zona Anterior</h6>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <div class="card">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-3 mx-auto" style=" font-size: small;" >
                                                                                <h7 style="color: #33CC33;">Linea Media Superior</h7>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mx-auto">
                                                                                    <h7 style="color: #33CC33;">Linea Media Inferior</h7>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mx-auto">
                                                                                    <h7 style="color: #33CC33;">Linea Media Derecha</h7>
                                                                       
                                                                            </div>
                                                                            <div class="form-group col-md-3 mx-auto">
                                                                                    <h7 style="color: #33CC33;">Linea Media Izquierda</h7>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-3">
                                                                        <form>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Centrada
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Desviada Der.
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Desviada Izq.
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                            
                                                                    <div class="col-sm-3">
                                                                        <form>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Centrada
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                    Desviada Der.
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Desviada Izq.
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Normal
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Vis a Vis
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Cruzada
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form> 
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Normal
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Vis a Vis
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Cruzada
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6 class="text-center">Examen de Oclusión - Eje Vertical  </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <div class="card">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-3 mx-auto">
                                                                                <h7 style="color: #33CC33;">Zona Anterior</h7>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mx-auto">
                                                                                    <h7 style="color: #33CC33;">Zona Lateral Derecha</h7>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mx-auto">
                                                                                    <h7 style="color: #33CC33;">Zona Lateral Izquierda</h7>
                                                                       
                                                                            </div>
                                                                            <div class="form-group col-md-3 mx-auto">
                                                                                    <h7 style="color: #33CC33;">Examen Funcional Desviación Mandibular</h7>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-3 mx-auto">
                                                                                <label class="floating-label">Overbite (Escalón)En mm.</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Normal
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                    Abierta
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Normal
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                    Abierta
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <form> 
                                                                            <div class="form-group ">
                                                                                <label class="floating-label">Desviación Mandibular en mm.</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Sin Desviación
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Derecha
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Izquierda
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6 class="text-center">Alteraciones Funcionales y Habitos del Paciente </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <div class="card">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-3 mx-auto" style=" font-size: small;" >
                                                                                <h7 style="color: #33CC33;">Respiración</h7>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mx-auto">
                                                                                    <h7 style="color: #33CC33;">Interposición</h7>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mx-auto">
                                                                                    <h7 style="color: #33CC33;">Succión</h7>
                                                                       
                                                                            </div>
                                                                            <div class="form-group col-md-3 mx-auto">
                                                                                    <h7 style="color: #33CC33;">Otros</h7>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-3">
                                                                        <form>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Nasal
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Bucal
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Mixta
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Ronquido
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Labial
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                    Lingual en Reposo
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Lingual en Deglución
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Lingual en Fono-articulación
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Dedo
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Chupete
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Mejilla
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Labio
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Lapiz/Otro Objeto
                                                                                </label>
                                                                            </div>
                                                                            <br>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form> 
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                Bruxismo
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Onicofagia
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                Alteraciones Posturales
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12 mx-auto">
                                                                                <label class="floating-label">Otras Alteraciones (Describir)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="2" name="" id=""></textarea>
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
                                                <div class="card">
                                                    <a class="label" data-toggle="collapse" href="#ex_resumen_orto" role="button" aria-expanded="false" aria-controls="ex_resumen_orto">
                                                        <div class="card mb-3">
                                                            <div class="card-header bg-info align-middle"><!-- acá se carga automaticamente los check-->
                                                                <h5 class="float-left d-inline" style="color:white">Resumen del Examen Clínico</h5>
                                                                <i id="signos_vitales" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer;color:white"></i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
					                            <div class="collapse" id="ex_resumen_orto" style="">
						                            <div class="card-body">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12 mx-auto">
                                                                        <label class="floating-label">Examen Periodontal</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2" name="res_period" id="res_period"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12 mx-auto">
                                                                        <label class="floating-label">Listado de Anomalias del Examen Clínico</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2" name="list_alt_ortod" id="list_alt_ortod"></textarea>
                                                                    </div>
                                                                </div>
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
                    </div>
                    <!--Cierre: Formulario / endodoncia-->
                    <!--Formulario / Diagnóstico-->
                    <div class="col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-header ">
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
                    <div class="col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                             <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Formulario / Diagnóstico-->
                    <hr>
                    <div class="col-sm-12 mt-3">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-info">Guardar ficha clínica</button>
                            <button type="button" class="btn btn-success">Imprimir</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="est_rx" role="tabpanel" aria-labelledby="est_rx-tab">
                <div class="col-sm-12">
                    <div class="card">  
						<div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mx-auto">
                                            <label class="floating-label">Listado de Anomalias del Examen Clínico</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="2" name="list_alt_ortod1" id="list_alt_ortod1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-left align-middle">Análisis Esqueletales Sagitales</th>
                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                    <th class="text-left align-middle">Valor T1</th>
                                                    <th class="text-left align-middle">Dif T1</th>
                                                    <th class="text-left align-middle">Valor T2</th>
                                                    <th class="text-left align-middle">Dif T2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo SNA</td>
                                                    <td class="text-left align-middle">82 +/- 2°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo SNB</td>
                                                    <td class="text-left align-middle">82 +/- 2°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo ANB</td>
                                                    <td class="text-left align-middle">2 +/- 2°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Prof Facial</td>
                                                    <td class="text-left align-middle">87 +/- 3°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Convex. Facial</td>
                                                    <td class="text-left align-middle">2 +/- 2°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-left align-middle">Consideraciones Esqueletales Verticales</th>
                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                    <th class="text-left align-middle">Valor T1</th>
                                                    <th class="text-left align-middle">Dif T1</th>
                                                    <th class="text-left align-middle">Valor T2</th>
                                                    <th class="text-left align-middle">Dif T2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">Relación de alturas faciales Harvold: N-ANS/ANS-Me</td>
                                                    <td class="text-left align-middle">0.8 +/- 0.05 mm.</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">% de alturas faciales P-A Jarabak: S-Go/ N-Me x 100</td>
                                                    <td class="text-left align-middle">59 - 63%</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo SN - GoGn</td>
                                                    <td class="text-left align-middle">32° +/- 2°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo PP-PM</td>
                                                    <td class="text-left align-middle">25° +/- 5°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Eje Facial</td>
                                                    <td class="text-left align-middle">90° +/- 3</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-left align-middle">Consideraciones Dentarias</th>
                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                    <th class="text-left align-middle">Valor T1</th>
                                                    <th class="text-left align-middle">Dif T1</th>
                                                    <th class="text-left align-middle">Valor T2</th>
                                                    <th class="text-left align-middle">Dif T2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo 1 - PP</td>
                                                    <td class="text-left align-middle">110° +/- 5°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">1 - Apo</td>
                                                    <td class="text-left align-middle">3.5 +/- 2 mm.</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo 1 inf - PM</td>
                                                    <td class="text-left align-middle">90° +/- 3°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Á1 inf - Apo</td>
                                                    <td class="text-left align-middle">1 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo Intercisivo</td>
                                                    <td class="text-left align-middle">130° +/- 5°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-left align-middle">Consideraciones de Tejidos Blandos</th>
                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                    <th class="text-left align-middle">Valor T1</th>
                                                    <th class="text-left align-middle">Dif T1</th>
                                                    <th class="text-left align-middle">Valor T2</th>
                                                    <th class="text-left align-middle">Dif T2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">Línea E (punta nasal-Pg blando) a labio superior</td>
                                                    <td class="text-left align-middle">- 4 +/- 2 mm.</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Línea E (punta nasal-Pg blando) a labio inferior</td>
                                                    <td class="text-left align-middle">- 2 +/- 2 mm.</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo Naso - Labial</td>
                                                    <td class="text-left align-middle">108° +/- 8°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Gap Labial (perpendicular a Vert Sn)</td>
                                                    <td class="text-left align-middle">2 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Exposición Incisiva (perpendicular a Vert Sn)</td>
                                                    <td class="text-left align-middle">2 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Labio Superior - Vertical Subnasal</td>
                                                    <td class="text-left align-middle">2 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Labio Inferior - Vertical Subnasal</td>
                                                    <td class="text-left align-middle">0 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Mentón - Vertical Subnasal</td>
                                                    <td class="text-left align-middle">4 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                     <!--Formulario / diagnóstico rx-->
                                    <div class="col-sm-12">
				                        <div class="card">
                                            <a class="label" data-toggle="collapse" href="#Dg_rx" role="button" aria-expanded="false" aria-controls="Dg_rx">
                                                <div class="card mb-3">
                                                    <div class="card-header bg-info align-middle">
                                                        <h6 class="float-left d-inline">Diagnóstico Radiológico</h6>
                                                        <i id="Dg_rx" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer"></i>
                                                    </div>
                                                </div>
                                            </a>
					                        <div class="collapse" id="Dg_rx" style="">
						                        <div class="card-body">
                                                    <form>
                                                        <div class="form-row" id="form_dg_rx">
                                                            <div class="form-group col-md-6">
                                                                <select class="form-control input-sm margin_bottom" id="diag_esqueletal" name="diag_esqueletal">
                                                                    <option value="0" disabled="" selected="">Tipo_esqueletal</option>
                                                                    <option value="1">Tipo I</option>
                                                                    <option value="2">Tipo II Mandíbula</option>
                                                                    <option value="3">Tipo II Maxilar</option>
                                                                    <option value="4">Tipo III Mandíbula</option>
                                                                    <option value="5">Tipo III Maxilar</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <select class="form-control input-sm margin_bottom" id="diag_facial" name="tipo_facial">
                                                                    <option value="0" disabled="" selected="">Biotipo</option>
                                                                    <option value="1">Mesofacial</option>
                                                                    <option value="2">Braquifacial</option>
                                                                    <option value="3">Dólicofacial</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label">Diagnóstico</label>
                                                                <textarea id="dg_rx_cefalometrico" class="form-control margin_bottom resize_vertical" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
					                        </div>
				                        </div>
			                        </div>
                                    <!--Cierre: Formulario /diagnóstico rx-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="analisis" role="tabpanel" aria-labelledby="analisis-tab">
                <hr>
                <div class="card-header bg-info">
                   <h6 class="text-center">Análisis de Modelos</h6>
                </div>
                    <br>
                <div class="row" style="border-style: solid; border-width: 1px; border-top-color: #C0C0C0; border-right-color: #C0C0C0; border-bottom-color: #C0C0C0; border-left-color: #C0C0C0; margin: 0px 5px 5px 5px; padding: 8px 0px 0px 0px">
                    <div class="col-md-8">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h6>Transversal</h6>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Derecha</h6>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Izquierda</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Línea Media Superior</h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Línea Media sup der mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Línea Media sup Izq mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Línea Media Inferior</h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Línea Media inf der mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Línea Media inf Izq mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Mordida Cruzada</h7>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Si
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Si
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Non-Oclusión</h7>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Si
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Si
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7></h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <h6>Superior</h6>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <h6>Inferior</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Ancho Intermolar</h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Distancia Intermolar Sup mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Distancia Intermolar Inf mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Ancho Intercaninos</h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Distancia Intercaninos Sup mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Distancia Intercaninos Inf mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style=" border-left-style: solid; border-left-width: 1px; border-left-color: #C0C0C0">
                        <div class="form-row" >
                            <div class="form-group col-md-4">
                                <h6>Sagital</h6>
                            </div>
                            <div class="form-group col-md-4">
                                <h6></h6>
                            </div>
                            <div class="form-group col-md-4">
                                <h6></h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Overjet</h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Overjet</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>  
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Mordida Invertida</h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Mordida Invertida</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <hr><h6>Vertical</h6>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Overbite</h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Overbite</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Mordida Abierta</h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Mordida Abierta</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                            
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Sobremordida</h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Sobremordida</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Curva Spee</h7>
                            </div>
                            <div class="form-group col-md-4 mx-auto">
                                <label class="floating-label">Curva Spee</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                    </div>
                </div>
                 <hr>
                <div class="card-header bg-info">
                   <h6 class="text-center">Análisis del Espacio Necesario Vs Disponible</h6>
                </div>
                <div class="row" style="border-style: solid; border-width: 1px; border-top-color: #C0C0C0; border-right-color: #C0C0C0; border-bottom-color: #C0C0C0; border-left-color: #C0C0C0; margin: 0px 5px 5px 5px; padding: 8px 0px 0px 0px">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <h6></h6>
                            </div>
                            <div class="form-group col-md-2">
                                <img src="i/modelo_maxilar.png" alt="Modelo Maxilar">
                            </div>
                            <div class="form-group col-md-2">
                                <h6></h6>
                            </div>
                            <div class="form-group col-md-2">
                                <h6></h6>
                            </div>
                            <div class="form-group col-md-2">
                               <img src="i/modelo_mandibula.png" alt="Modelo Mandíbular">
                            </div>
                            <div class="form-group col-md-2">
                                <h6></h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <h6>Espacio Disponible</h6>
                            </div>
                            <div class="form-group col-md-2">
                                <h6>P</h6>
                            </div>
                            <div class="form-group col-md-2">
                                <h6>Q</h6>
                            </div>
                            <div class="form-group col-md-2">
                                <h6>R</h6>
                            </div>
                            <div class="form-group col-md-2">
                                <h6>S</h6>
                            </div>
                            <div class="form-group col-md-2">
                                <h6>Total</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <p>Maxilar</p>
                            </div>
                            <div class="form-group col-md-2">
                               <label class="floating-label">P mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label">Q mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label">R mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-2">
                               <label class="floating-label">S mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-2">
                               <label class="floating-label">Total mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <p>Mandíbula</p>
                            </div>
                            <div class="form-group col-md-2">
                               <label class="floating-label">P mm</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label">Q mm</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label">R mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label">S mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-2">
                               <label class="floating-label">Total mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h5>Cálcular Espacio Necesario</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <table class="table table-bordered table-condensed table_no_bg table_full align_middle margin_bottom">
                                    <tbody>
                                        <tr>
                                            <th class="text-center">1.5</th>
                                            <th class="text-center">1.4</th>
                                            <th class="text-center">1.3</th>
                                            <th class="text-center">1.2</th>
                                            <th class="text-center">1.1</th>
                                            <th class="text-center">2.1</th>
                                            <th class="text-center">2.2</th>
                                            <th class="text-center">2.3</th>
                                            <th class="text-center">2.4</th>
                                            <th class="text-center">2.5</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" id="necesario_15" class="form-control input-sm valida_numerico text-center suma_superior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_14" class="form-control input-sm valida_numerico text-center suma_superior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_13" class="form-control input-sm valida_numerico text-center suma_superior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_12" class="form-control input-sm valida_numerico text-center suma_superior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_11" class="form-control input-sm valida_numerico text-center suma_superior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_21" class="form-control input-sm valida_numerico text-center suma_superior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_22" class="form-control input-sm valida_numerico text-center suma_superior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_23" class="form-control input-sm valida_numerico text-center suma_superior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_24" class="form-control input-sm valida_numerico text-center suma_superior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_25" class="form-control input-sm valida_numerico text-center suma_superior" placeholder="0"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">4.5</th>
                                            <th class="text-center">4.4</th>
                                            <th class="text-center">4.3</th>
                                            <th class="text-center">4.2</th>
                                            <th class="text-center">4.1</th>
                                            <th class="text-center">3.1</th>
                                            <th class="text-center">3.2</th>
                                            <th class="text-center">3.3</th>
                                            <th class="text-center">3.4</th>
                                            <th class="text-center">3.5</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" id="necesario_45" class="form-control input-sm valida_numerico text-center suma_inferior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_44" class="form-control input-sm valida_numerico text-center suma_inferior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_43" class="form-control input-sm valida_numerico text-center suma_inferior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_42" class="form-control input-sm valida_numerico text-center suma_inferior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_41" class="form-control input-sm valida_numerico text-center suma_inferior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_31" class="form-control input-sm valida_numerico text-center suma_inferior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_32" class="form-control input-sm valida_numerico text-center suma_inferior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_33" class="form-control input-sm valida_numerico text-center suma_inferior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_34" class="form-control input-sm valida_numerico text-center suma_inferior" placeholder="0"></td>
                                            <td><input type="text" id="necesario_35" class="form-control input-sm valida_numerico text-center suma_inferior" placeholder="0"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <h7>Suma Incisiva Maxilar</h7>
                            </div>
                            <div class="form-group col-md-3">
                                <h7>Suma Maxilar</h7>
                            </div>
                            <div class="form-group col-md-3">
                                <h7>Suma Suma Incisiva Mandibular</h7>
                            </div>
                            <div class="form-group col-md-3">
                                <h7>Suma Mandibular</h7>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                               <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-3">
                               <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h5>Cálculo Espacio Disponible menos Espacio Necesario</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <h7></h7>
                            </div>
                            <div class="form-group col-md-3">
                                <h7>Espacio Disponible</h7>
                            </div>
                            <div class="form-group col-md-3">
                                <h7>Espacio Necesario</h7>
                            </div>
                            <div class="form-group col-md-3">
                                <h7>Diferencia Total</h7>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-3 mx-auto">
                                <label class="label">Maxilar</label>
                                
                            </div>
                            <div class="form-group col-md-3 mx-auto">
                                <label class="floating-label">Distancia Intermolar Inf mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-3 mx-auto">
                                <label class="floating-label">Distancia Intermolar Sup mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-3 mx-auto">
                                <label class="floating-label">Distancia Intermolar Inf mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3 mx-auto">
                                <label class="label">Mandíbula</label>
                                
                            </div>
                            <div class="form-group col-md-3 mx-auto">
                                <label class="floating-label">Distancia Intermolar Inf mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-3 mx-auto">
                                <label class="floating-label">Distancia Intermolar Sup mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-3 mx-auto">
                                <label class="floating-label">Distancia Intermolar Inf mm.</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h5>Clasificación de Angle</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h7>Clase de Angle</h7>
                            </div>
                            <div class="form-group col-md-4">
                                <h7>Derecha</h7>
                            </div>
                            <div class="form-group col-md-4">
                                <h7>Izquierda</h7>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <p>Molar</p>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <p>Canina</p>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <h5>Alteraciones en el estudio de Modelo</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                 <textarea id="resultado_analisis_modelo" class="form-control margin_bottom" rows="2" placeholder="Problemas encontrados en el Análisis de Modelo"></textarea>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="tab-pane fade" id="resumen_pat" role="tabpanel" aria-labelledby="resumen_pat-tab">
                <hr>
                <div class="card-header bg-info">
                   <h6 class="text-center">Alteraciones Patológicas Generales</h6>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="floating-label">Patologías En General</label>
                        <textarea id="pat_orto_grl" name="pat_orto_grl" class="form-control input-sm resize_vertical" rows="2"></textarea>
                    </div>
                </div>
                <hr>
                <div class="card-header bg-info">
                   <h6 class="text-center">Alteraciones Derivadas del Desarrollo</h6>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="floating-label">alteraciones Faciales</label>
                        <textarea id="alt_ort_fac" name="alt_ort_fac" class="form-control input-sm resize_vertical" rows="2"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Hábitos</label>
                        <textarea id="alt_ort_hab" name="alt_ort_hab" class="form-control input-sm resize_vertical" rows="2"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Alteraciones Plano Vertical</label>
                        <textarea id="alt_ort_ejevert" name="alt_ort_ejevert" class="form-control input-sm resize_vertical" rows="2"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="floating-label">Alteraciones Plano Transversal</label>
                        <textarea id="alt_ort_ejetrans" name="alt_ort_ejetrans" class="form-control input-sm resize_vertical" rows="2"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Alteraciones Plano Sagital</label>
                        <textarea id="alt_ort_ejesag" name="alt_ort_ejesag" class="form-control input-sm resize_vertical" rows="2"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Alteraciones Intra-arcos</label>
                        <textarea id="alt_ort_intarc" name="alt_ort_intarc" class="form-control input-sm resize_vertical" rows="2"></textarea>
                    </div>
                </div>
                <div class="card-header bg-info">
                   <h6 class="text-center">Diagnóstico y Plan de Tratamiento  Ortodóncico</h6>
                </div>
                <hr>
                <div class="form-row" id="form_dg_rx">
                    <div class="form-group col-md-6">
                        <select class="form-control input-sm margin_bottom" id="diag_esqueletal" name="diag_esqueletal">
                            <option value="0" disabled="" selected="">Tipo_esqueletal</option>
                            <option value="1">Tipo I</option>
                            <option value="2">Tipo II Mandíbula</option>
                            <option value="3">Tipo II Maxilar</option>
                            <option value="4">Tipo III Mandíbula</option>
                            <option value="5">Tipo III Maxilar</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control input-sm margin_bottom" id="diag_facial" name="tipo_facial">
                            <option value="0" disabled="" selected="">Biotipo</option>
                            <option value="1">Mesofacial</option>
                            <option value="2">Braquifacial</option>
                            <option value="3">Dólicofacial</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <h6 class="text-center">Clase de Angle</h6>
                    </div>
                    <div class="form-group col-md-6">
                        <h7>Derecha</h7>
                    </div>
                    <div class="form-group col-md-6">
                        <h7>Izquierda</h7>
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control form-control-sm" name="" id="">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control form-control-sm" name="" id="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control form-control-sm" name="" id="">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control form-control-sm" name="" id="">
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="label">Diagnóstico</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="2" name="descripcion_antecedentes" id="descripcion_antecedentes" placeholder="Diagnóstico Ortodóncico"></textarea>
                    </div>
                    <div class="form-group col-md-8">
                        <label class="label"> Plan de Tratamiento</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="2" name="descripcion_antecedentes" id="descripcion_antecedentes" placeholder="Plan de tratamiento"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="label">Pronóstico</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="2" name="descripcion_antecedentes" id="descripcion_antecedentes" placeholder="Pronóstico"></textarea>
                    </div>
                    <div class="form-group col-md-8">
                        <label class="label"> Aparatos</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="2" name="descripcion_antecedentes" id="descripcion_antecedentes" placeholder="Aparatos"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6"style="text-align:center" id="form_0">
                       
                    </div>
                    <div class="form-group col-md-6"style="text-align:center" id="form_derperi">
                        <button type="button" class="btn btn-success btn-sm btn-block" onclick="d_deriv_tto();"><i class="feather icon-file-plus"></i> Derivar a Otra Especialidad</button>
                    </div>
                </div> 
            </div>
            <div class="tab-pane fade" id="cirugia" role="tabpanel" aria-labelledby="cirugia-tab">
				<ul class="nav nav-tabs mb-2 mt-2" id="dental" role="tablist">
					<li class="nav-item">
						<a class="nav-atencion-medica active text-uppercase"  id="pills-SolP-tab" data-toggle="pill" href="#pills-SolP" role="tab" aria-controls="pills-SolP" aria-selected="false">Sol. Pabellón<span class="ripple ripple-animate" style="height: 71.6719px; width: 71.6719px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -16.8359px; left: 0.16405px;"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-atencion-medica text-uppercase"id="pills-ingreso-tab" data-toggle="pill" href="#pills-ingreso" role="tab" aria-controls="pills-ingreso" aria-selected="false">Ingreso<span class="ripple ripple-animate" style="height: 71.6719px; width: 71.6719px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -16.8359px; left: 0.16405px;"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-atencion-medica text-uppercase"id="pills-protQx-tab" data-toggle="pill" href="#pills-protQx" role="tab" aria-controls="pills-protQx" aria-selected="false">Protocólo<span class="ripple ripple-animate" style="height: 71.6719px; width: 71.6719px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -16.8359px; left: 0.16405px;"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-atencion-medica text-uppercase" id="pills-Recup-tab" data-toggle="pill" href="#pills-Recup" role="tab" aria-controls="pills-Recup" aria-selected="false">Recuperación<span class="ripple ripple-animate" style="height: 71.6719px; width: 71.6719px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -16.8359px; left: 0.16405px;"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-atencion-medica text-uppercase" id="pills-evol-tab" data-toggle="pill" href="#pills-evol" role="tab" aria-controls="pills-evol" aria-selected="false">Sala<span class="ripple ripple-animate" style="height: 71.6719px; width: 71.6719px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -16.8359px; left: 0.16405px;"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-atencion-medica text-uppercase" id="epicrisis-tab" data-toggle="pill" href="#epicrisis" role="tab" aria-controls="epicrisis" aria-selected="false">Epicrisis<span class="ripple ripple-animate" style="height: 71.6719px; width: 71.6719px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -16.8359px; left: 0.16405px;"></span></a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-SolP" role="tabpanel" aria-labelledby="pills-SolP-tab" style="border: 1px solid #6699FF">
						<div class="modal-header bg-info">
							<h5 class="modal-title text-white" id="m_sol_pab" style="font-size: 1.3rem; color: #3366CC;">SOLICITUD DE PABELLÓN QUIRÚRGICO</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
                            <div class="card-header">
                                <h6>Información General</h6>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Clínica Hospital</label>
                                    <input type="text" class="form-control form-control-sm" name="sol_clinica" id="sol_clinica">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Nombre y Apellidos/Edad</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre_edad_pcte" id="nombre_edad_pcte">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Teléfono Contacto</label>
                                    <input type="text" class="form-control form-control-sm" name="tel_pcte" id="tel_pcte">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Previsión</label>
                                    <input type="text" class="form-control form-control-sm" name="prev_pcte" id="prev_pcte">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Email</label>
                                    <input type="email" class="form-control form-control-sm" name="email_pcte" id="email_pcte">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Patologías Crónicas</label>
                                    <input type="text" class="form-control form-control-sm" name="patcr_pcte" id="patcr_pcte">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Diagnóstico Pre-Operatorio</label>
                                    <input type="text" class="form-control form-control-sm" name="dg_pcte" id="dg_pcte">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Operación</label>
                                    <input type="text" class="form-control form-control-sm" name="operacion" id="operacion">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Código Cirugía</label>
                                    <input type="email" class="form-control form-control-sm" name="cod_operacion" id="cod_operacion">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Anestesia</label>
                                    <input type="text" class="form-control form-control-sm" name="patcr_pcte" id="patcr_pcte">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Tipo de Hospitalización</label>
                                    <input type="text" class="form-control form-control-sm" name="tpo_hosp" id="tpo_hosp">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Grado de Urgencia</label>
                                    <input type="text" class="form-control form-control-sm" name="urgenc" id="urgenc">
                                </div>
                            </div>
                            <div class="card-header">
                                <h6>Equipo</h6>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Cirujano</label>
                                    <input type="email" class="form-control form-control-sm" name="ciruj" id="ciruj">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Ayudante 1</label>
                                    <input type="text" class="form-control form-control-sm" name="Ayudante1" id="Ayudante1">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Ayudante 2</label>
                                    <input type="text" class="form-control form-control-sm" name="Ayudante2" id="Ayudante2">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Anestesista</label>
                                    <input type="text" class="form-control form-control-sm" name="dr_anest" id="dr_anest">
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Arsenalería</label>
                                    <input type="email" class="form-control form-control-sm" name="arsen" id="arsen">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Equipamiento especial</label>
                                    <input type="text" class="form-control form-control-sm" name="equip_esp" id="equip_esp">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Instrumental especial</label>
                                    <input type="text" class="form-control form-control-sm" name="inst" id="inst">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Insumos especiales</label>
                                    <input type="text" class="form-control form-control-sm" name="insumos" id="insumos">
                                </div>
                            </div>
                            <div class="card-header">
                                <h6>Otros profesionales</h6>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="floating-label-activo-sm">Especialidad 1</label>
                                    <input type="email" class="form-control form-control-sm" name="esp1" id="esp1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="floating-label-activo-sm">Especialidad 2</label>
                                    <input type="text" class="form-control form-control-sm" name="esp2" id="esp2">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" id="com_solpab">
									    <textarea id="com_solpab" name="com_solpab" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;"placeholder="Comentarios" ></textarea>
							    </div>
                            </div>
						    <div class="col-sm-12 mt-3">
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="();"><i class="fa fa-plus"></i>Borrar formulario</button>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="();"><i class="fa fa-plus"></i> Enviar formulario</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
					<div class="tab-pane fade" id="pills-ingreso" role="tabpanel" aria-labelledby="pills-ingreso-tab" style="border: 1px solid #6699FF">  
						<div class="modal-header bg-info">
						<h5 class="modal-title text-white" id="m_sol_ing" style="font-size: 1.3rem; color: #3366CC;">FICHA DE INGRESO</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>									
						<div class="card-body">
                            <div class="card-header">
                                <h6>Anamnesis</h6>
                            </div>
                            <br>
                             <br>
                            <div class="form-row">
                                <div class="form-group col-md-3">
									<div class="form-group fill">
										<label class="mb-3 label">
                                        <script>
                                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                                            var f=new Date();
                                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                        </script>
                                        </label>
									</div>
								</div>
								<div class="col-md-9"> 
									<div class="form-group fill">
										<textarea id="mot_ingreso" name="mot_ingreso" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;" ></textarea>
									</div>
								</div>
							</div>
                            <div class="card-header">
                                <h6>Antecedentes y Examen Físico</h6>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-12">
								    <div class="col-md-12"> 
									    <div class="form-group fill">
										    <textarea id="ant_pcte" name="ant_pcte" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;"placeholder=" Descripción Antecedentes y Examen Físico" ></textarea>
									    </div>
								    </div>
							    </div>
                            </div>
							<div class="col-sm-12 mt-3">
                                <div class="card">
                                    <div class="card-header ">
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
							<div class="card-header">
                                <h6>Indicaciones de Ingreso</h6>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-12" id="ind_ingreso">
									<textarea id="ind_ingreso" name="ind_ingreso" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;"placeholder="Indicaciones de Ingreso" ></textarea>
								</div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Preparar para Operar a las:</label>
                                    <input type="text" class="form-control form-control-sm" name="hora_op" id="hora_op">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Hospitalizar en:</label>
                                    <input type="text" class="form-control form-control-sm" name="hosp_en" id="hosp_en">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Tipo de Sala</label>
                                    <input type="text" class="form-control form-control-sm" name="t_sala" id="t_sala">
                                </div>
                            </div>
							<div class="col-sm-12 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="();"><i class="fa fa-plus"></i> Borrar</button>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="();"><i class="fa fa-plus"></i> Enviar Ingreso</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>			
							
						</div>
					</div>
					<div class="tab-pane fade" id="pills-protQx" role="tabpanel" aria-labelledby="pills-protQx-tab" style="border: 1px solid #6699FF" >
						<div class="modal-header bg-info">
						<h5 class="modal-title text-white" id="m_sol_pab" style="font-size: 1.3rem; color: #3366CC;">PROTOCOLO OPERATORIO </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>							   	
						<div class="card-body">
							<div class="card-header">
                                <h6>Información General</h6>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="text" class="form-control form-control-sm" name="Rut_pcte" id="Rut_pcte">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Nombre y Apellidos/Edad</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre_edad_pcte" id="nombre_edad_pcte">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Teléfono Contacto</label>
                                    <input type="text" class="form-control form-control-sm" name="tel_pcte" id="tel_pcte">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Previsión</label>
                                    <input type="text" class="form-control form-control-sm" name="prev_pcte" id="prev_pcte">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Hospital o Clínica</label>
                                    <input type="text" class="form-control form-control-sm" name="hosp" id="hosp">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Nº de Pabellón</label>
                                    <input type="text" class="form-control form-control-sm" name="pabellón" id="pabellón">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Hora Comienzo Operación</label>
                                    <input type="text" class="form-control form-control-sm" name="hora_com" id="hora_com">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Hora Término Operación</label>
                                    <input type="text" class="form-control form-control-sm" name="hora_fin" id="hora_fin">
                                </div>
                            </div>
							<div class="card-header">
                                <h6>Información Cirugía</h6>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Diag. Pre operatorio</label>
                                    <input type="text" class="form-control form-control-sm" name="dg_pre" id="dg_pr">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Diagn.Post operatorio</label>
                                    <input type="text" class="form-control form-control-sm" name="dg_post" id="dg_post">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Código Cirugía</label>
                                    <input type="text" class="form-control form-control-sm" name="cod_cirugía" id="cod_cirugía">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Anestesia</label>
                                    <input type="text" class="form-control form-control-sm" name="tpo_anestesia" id="tpo_anestesia">
                                </div>
                            </div>
							<div class="card-header">
                                <h6>Equipo</h6>
                            </div>
                            <br>
							<div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Cirujano</label>
                                    <input type="text" class="form-control form-control-sm" name="cirujano" id="cirujano">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Ayudantes</label>
                                    <input type="text" class="form-control form-control-sm" name="ayudantes" id="ayudantes">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Anestesista y Asistente-anestesia</label>
                                    <input type="text" class="form-control form-control-sm" name="anest" id="anest">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Arsenalería</label>
                                    <input type="text" class="form-control form-control-sm" name="arsenaler" id="arsenaler">
                                </div>
                            </div>
							<div class="card-header">
                                <h6>Biopsia</h6>
                            </div>
                            <br>
							<div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Rápida</label>
                                    <input type="text" class="form-control form-control-sm" name="bp_rapida" id="bp_rapida">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Diferída</label>
                                    <input type="text" class="form-control form-control-sm" name="bp_difer" id="bp_difer">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Nº Muestras</label>
                                    <input type="text" class="form-control form-control-sm" name="n_muestras" id="n_muestras">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Patólogo</label>
                                    <input type="text" class="form-control form-control-sm" name="patol" id="patol">
                                </div>
                            </div>
							<div class="card-header">
                                <h6>CIRUGÍA</h6>
                            </div>
                            <br>
							<div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Operación</label>
                                    <input type="text" class="form-control form-control-sm" name="n_peración" id="n_peración">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Mat.de Hemostasia</label>
                                    <input type="text" class="form-control form-control-sm" name="m_hemost" id="m_hemost">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Material de Cierre</label>
                                    <input type="text" class="form-control form-control-sm" name="m_cierre" id="m_cierre">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Otros(implantes,aséo)</label>
                                    <input type="text" class="form-control form-control-sm" name="Ot_mat" id="Ot_mat">
                                </div>
                                <div class="form-group col-md-12" id="desc_cirugia">
									<textarea id="campo_" name="campo" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;"placeholder="Descripción de la Cirugía" ></textarea>
								</div>
                            </div>
							<div class="card-header">
                                <h6>Anestesia</h6>
                            </div>
                            <br>
							<div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Fármacos</label>
                                    <input type="text" class="form-control form-control-sm" name="farmac" id="farmac">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Pulso y Presión Arterial</label>
                                    <input type="text" class="form-control form-control-sm" name="e_pulso_pres" id="e_pulso_pres">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Incidentes</label>
                                    <input type="text" class="form-control form-control-sm" name="inc_anest" id="inc_anest">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Recuperación Anestésia</label>
                                    <input type="text" class="form-control form-control-sm" name="Ot_mat" id="Ot_mat">
                                </div>
                                <div class="form-group col-md-12" id="Otros Anest">
									<textarea id="campo_" name="campo" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;"placeholder="Descripción de Anestesia" ></textarea>
								</div>
                            </div>
							<div class="card-header">
                                <h6>Incidencias</h6>
                            </div>
                            <br>
							<div class="form-row">
                                <div class="form-group col-md-12" id="Incidencia_qx">
									<textarea name="Incidencia_qx" id="Incidencia_qx" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;"placeholder="Descripción Incidencias de la cirugía" ></textarea>
								</div>
                            </div>
                            <div class="card-header">
                                <h6>Destino Post Operatório</h6>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Destino paciente (sala uti recuperación alta etc.)</label>
                                    <input type="text" class="form-control form-control-sm" name="dest_postop" id="dest_postopx">
                                </div>
                                <div class="form-group col-md-9" id="ind´post_op">
									<textarea id="campo_" name="ind´post_op" id="ind´post_op" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;"placeholder="Indicaciones Post-Operatorias" ></textarea>
								</div>
                            </div>													
							<div class="form-group row"  Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-12">
									<div class="form-group fill">
									<button type="button" class="btn btn-success btn-block btn-sm" align:center>Guardar y Enviar formulario</button> <!--envia a recetaonline de  cirujano, clínica, equipo médico,arsenalera,paciente etc.-->
									</div>
								</div>
							</div>
						</div>       
					</div>
					<div class="tab-pane fade " id="pills-Recup" role="tabpanel" aria-labelledby="pills-Recup-tab" style="border: 1px solid #6699FF" >
						<div class="modal-header bg-info">
							<h5 class="modal-title text-white" id="m_sol_pab" style="font-size: 1.3rem; color: #3366CC;">SALA DE RECUPERACIÓN</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<label>Evoluciones</label>
							<div class="form-group row">
								<div class="col-md-4"> 												    
									<input type="checkbox" name="check" id="checkformsala" value="1" onchange="javascript:showContentformulariosala()" />
									<label class="label" for="formularios">Activar formularios </label> <!-- activa los modal- pero creo que hay que hacer un scrip especial?-->
								</div>
								<div id="contentformsala" style="display: none;">
									<div class="form-group row">
										<div class="col-md-6">
											<button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
										</div>
									    <div class="col-md-6">
										     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Recetario</button>													
									    </div>
									    <div class="col-md-6">
										     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="d_deriv_tto()"><i class="fa fa-plus"></i> Interconsulta</button>			
									    </div>
								     </div>
								</div>																							
							</div>
							<div class="form-group row" Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-3"> 
									<div class="form-group fill">
										<label class="mb-3 label">
                                        <script>
                                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                                            var f=new Date();
                                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                        </script>
									</div>
								</div>
								<div class="col-md-9"> 
									<div class="form-group fill">
										<textarea id="campo_" name="campo" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;" ></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row" Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-3"> 
									<div class="form-group fill">
										<label class="mb-3 label">
                                        <script>
                                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                                            var f=new Date();
                                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                        </script>
									</div>
								</div>
								<div class="col-md-9"> 
									<div class="form-group fill">
										<textarea id="campo_" name="campo" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;" ></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row" Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-3"> 
									<div class="form-group fill">
										<label class="mb-3 label">
                                        <script>
                                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                                            var f=new Date();
                                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                        </script>
									</div>
								</div>

								<div class="col-md-9"> 
									<div class="form-group fill">
										<textarea id="campo_" name="campo" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;" ></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row" Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-3"> 
									<div class="form-group fill">
										<input class="mb-3 form-control" type="text" placeholder="resumen evoluciones"><!--queda guardado epicrisis del pcte.-->
									</div>
								</div>

								<div class="col-md-9"> 
									<div class="form-group fill">
										<textarea id="campo_" name="campo" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" ></textarea>
									</div>
								</div>
							</div>										
							<div class="form-group row" Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-12">
									<div class="row">
                                        <div class="col-md-6">
											<button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="();"><i class="fa fa-plus"></i>Agregar nueva línea</button>
										</div>
                                        <div class="col-md-6">
											<button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="();"><i class="fa fa-plus"></i>  cerrar y guardar formulario al traslado</button> <!--queda guardado en historia Hospitalización del pcte.-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="pills-evol" role="tabpanel" aria-labelledby="pills-evol-tab" style="border: 1px solid #6699FF" >
						<div class="modal-header bg-info">
							<h5 class="modal-title text-white" id="m_sol_pab" style="font-size: 1.3rem; color: #3366CC;">SALA DE HOSPITALIZACIÓN /</h5> <h6><span style="color:white;text-align:center" id="id_servico" class="label-floating right">Servicio de:</span><h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>								    
						<div class="card-body">
							<label>Evoluciones</label>
							<div class="form-group row">
								<div class="col-md-4"> 												    
									<input type="checkbox" name="check" id="checkformsala" value="1" onchange="javascript:showContentformulariosala()" />
									<label class="label" for="formularios">Activar formularios </label> <!-- activa los modal- pero creo que hay que hacer un scrip especial?-->
								</div>
								<div id="contentformsala" style="display: none;">
									<div class="form-group row">
										<div class="col-md-6">
											<button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
										</div>
									    <div class="col-md-6">
										     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Recetario</button>													
									    </div>
									    <div class="col-md-6">
										     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="d_deriv_tto()"><i class="fa fa-plus"></i> Interconsulta</button>			
									    </div>
								     </div>
								</div>																							
							</div>
							<div class="form-group row" Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-3"> 
									<div class="form-group fill">
										<label class="mb-3 label">
                                        <script>
                                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                                            var f=new Date();
                                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                        </script>
									</div>
								</div>

								<div class="col-md-9"> 
									<div class="form-group fill">
										<textarea id="campo_" name="campo" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;" ></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row" Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-3"> 
									<div class="form-group fill">
										<label class="mb-3 label">
                                        <script>
                                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                                            var f=new Date();
                                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                        </script>
									</div>
								</div>

								<div class="col-md-9"> 
									<div class="form-group fill">
										<textarea id="campo_" name="campo" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;" ></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row" Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-3"> 
									<div class="form-group fill">
										<label class="mb-3 label">
                                        <script>
                                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                                            var f=new Date();
                                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                        </script>
									</div>
								</div>

								<div class="col-md-9"> 
									<div class="form-group fill">
										<textarea id="campo_" name="campo" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" onblur="this.rows=3;" ></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row" Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-3"> 
									<div class="form-group fill">
										<input class="mb-3 form-control" type="text" placeholder="resumen evoluciones"><!--queda guardado epicrisis del pcte.-->
									</div>
								</div>

								<div class="col-md-9"> 
									<div class="form-group fill">
										<textarea id="campo_" name="campo" class="form-control" style="width:100%;font:13px monospace;" rows="2" onfocus="this.rows=5" ></textarea>
									</div>
								</div>
							</div>										
							<div class="form-group row" Style="padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px">
								<div class="col-md-12">
									<div class="row">
                                        <div class="col-md-6">
											<button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="();"><i class="fa fa-plus"></i>Agregar nueva línea</button>
										</div>
                                        <div class="col-md-6">
											<button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="();"><i class="fa fa-plus"></i>  cerrar y guardar formulario al traslado</button> <!--queda guardado en historia Hospitalización del pcte.-->
										</div>
									
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="epicrisis" class="tab-pane fade"  role="tabpanel" aria-labelledby="epicrisis-tab">
						<div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h6>Epicrisis</h6>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-row mb-1">
                                            <div class="col-md-12">
                                                <h6>I.- Datos de Hospitalización</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="label">Desde</label>
                                                <input type="date" class="form-control form-control-sm" name="hosp_desde" id="hosp_desde">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="label">Hasta</label>
                                                <input type="date" class="form-control form-control-sm" name="hosp_hasta" id="hosp_hasta">
                                            </div>
                                            <div class="form-group col-md-4" id="form_0">
                                                <label class="label">Total de Días</label>
                                                <input type="number" class="form-control form-control-sm" name="hosp_total" id="hosp_total">
                                            </div>
                                        </div>
                                        <div class="form-row mb-1">
                                            <div class="col-md-12">
                                                <h6>II.- Diagnósticos</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                      
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="dg_ingreso" id="dg_ingreso" placeholder="Diagnósticos de Ingreso"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="dg_alta" id="dg_alta"placeholder="Diagnósticos de Alta"></textarea>
                                            </div> <!--poner boton agregar filas por si necesita mas espacio-->
                                        </div>
                                        <div class="form-row mb-1">
                                            <div class="col-md-12">
                                                <h6>III.- Tratamientos y cirugías realizadas</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                      
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="epi_tratamiento" id="epi_tratamiento" placeholder="Tratamientos"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="epi_cirug" id="epi_cirug"placeholder="Procedimientos Quirúrgicos"></textarea>
                                            </div> <!--poner boton agregar filas por si necesita mas espacio-->
                                        </div>
                                        <div class="form-row mb-1">
                                            <div class="col-md-12">
                                                <textarea class="form-control caja-texto form-control-sm" rows="1" name="epi_otros" id="epi_otros"placeholder="Otros Procedimientos y/o tratamientos "></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row mb-1">
                                            <div class="col-md-12">
                                                <h6>III.- Exámenes y evolución Intrahospitalaria</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                      
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="epi_tratamiento" id="epi_tratamiento" placeholder="Tratamientos"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="epi_cirug" id="epi_cirug"placeholder="Procedimientos Quirúrgicos"></textarea>
                                            </div> <!--poner boton agregar filas por si necesita mas espacio-->
                                        </div>
                                        <div class="form-row mb-1">
                                            <div class="col-md-12">
                                                <h6>IV.- Controles e Indicaciones al alta</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <input type="date" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante" title="control"> 
                                            </div>
                                            <div class="form-group col-md-6">
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="epi_cirug" id="epi_cirug"placeholder="Indicaciones al alta"></textarea>
                                            </div> <!--poner boton agregar filas por si necesita mas espacio-->
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
                                                <button type="button" class="btn btn-success btn-block btn-sm"><i class="fa fa-plus"></i> Guardar Epicrísis</button>
                                                <!--genera codigo de aceptación al teléfono del responsable del pago-->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div> 
				</div>									
            </div>
            <div class="tab-pane fade" id="tratamiento_orto" role="tabpanel" aria-labelledby="tratamiento_orto-tab">
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
                                            <button type="button" class="btn btn-info btn-sm" onclick="presupuesto_orto();">
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
<script type="text/javascript">
	function showContentformulariosala() {
		element = document.getElementById("contentformsala");
		check = document.getElementById("checkformsala");
		if (check.checked) {
			element.style.display='block';
		}
		else {
			element.style.display='none';
		}
	}
</script>
<?php
include("modals_especialidad/modal_presupuesto.php");
include("modals_especialidad/derivacion_a_tratamiento.php");
?>
