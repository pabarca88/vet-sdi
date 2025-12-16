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
