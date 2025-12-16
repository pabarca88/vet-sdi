<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="gine" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="eco_gine_tab" data-toggle="tab" href="#eco_gine" role="tab" aria-controls="eco_gine" aria-selected="true">Eco Ginecológica</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="eco_obst_tab" data-toggle="tab" href="#eco_obst" role="tab" aria-controls="eco_obst" aria-selected="false">Eco Obstétrica</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="procedimientos_tab" data-toggle="tab" href="#procedimientos" role="tab" aria-controls="procedimientos" aria-selected="false">Procedimientos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="tab-content" id="gine-contenido">
    <!--ECO GINECOLÓGICA-->
    <div class="tab-pane fade show active" id="eco_gine" role="tabpanel" aria-labelledby="eco_gine_tab">
        <div class="row bg-white shadow-sm rounded mx-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Ecografía ginecológica</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <script>
                                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                        var f=new Date();
                                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
                                </div>
                                <div class="form-group col-md-2" id="">
                                    <label class="floating-label-activo-sm" for="tipo">Tipo de Eco</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="tipo" name="tipo">
                                            <option>Seleccione</option>
                                            <option>Trans-vaginal</option>
                                            <option>Abdominal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="sol_por">Derivada por:</label>
                                        <select name="sol_por" id="sol_por" class="form-control form-control-sm"   onchange="evaluar_para_carga_detalle('sol_por','div_sol_por','sol_por_obs',2)">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Propia</option>
                                            <option value="2">Dr/a</option>
                                        </select>
                                    </div>
                                    <div class="form-group"  id="div_sol_por" style="display:none">
                                        <label class="floating-label-activo-sm" for="sol_por_nom">Profesional solicitante <i>(Anote Nombre)</i> </label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"   onfocus="this.rows=3" onblur="this.rows=1;" name="sol_por_nom" id="sol_por_nom"></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="motivo">Motivo</label>
                                        <select class="form-control form-control-sm" id="mot_examen" name="mot_examen" class="form-control form-control-sm"  onchange="evaluar_para_carga_detalle('mot_examen','div_mot_examen','mot_examen',4)">>
                                            <option value="0">Seleccione</option>
                                            <option value="1">Examen de Rutina</option>
                                            <option value="2">Control Embarazo Normal</option>
                                            <option value="3">Control Embarazo Patológico</option>
                                            <option value="4">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group"  id="div_mot_examen" style="display:none">
                                        <label class="floating-label-activo-sm" for="mot_examen">Motivo Examen <i>(Anote Motivo)</i> </label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="mot_examen" id="mot_examen"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline">UTERO</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label-activo-sm" for="ex_utero">En General</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_utero" id="ex_utero"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label-activo-sm" for="endometrio">Endometrio</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="endometrio" id="endometrio"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline">OVARIOS</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label-activo-sm" for="ovario_der">Ovario Derecho</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ovario_der" id="ovario_der"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label-activo-sm" for="ovario_izq">Ovario Izquierdo</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ovario_izq" id="ovario_izq"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline">TROMPAS</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label-activo-sm" for="trompa_der">Trompa Derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="trompa_der" id="trompa_der"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label-activo-sm" for="trompa_izq">Trompa Izquierda</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="trompa_izq" id="trompa_izq"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline">FONDO DE SACO</h6>
                                </div>
                                <div class="form-group col-md-10">
                                    <label class="floating-label-activo-sm" for="fondo_saco">Trompa Derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="fondo_saco" id="fondo_saco"></textarea>
                                </div>
                                {{--  <div class="form-group col-md-5">
                                    <label class="floating-label-activo-sm" for="desc_motivo">Trompa Izquierda</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>  --}}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline">CONCLUSIÓN</h6>
                                </div>
                                <div class="form-group col-md-10">
                                    <label class="floating-label-activo-sm" for="dg_ecografico">Diagnóstico Ecográfico</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="dg_ecografico" id="dg_ecografico"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm" for="obs_eco">Observaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_eco" id="obs_eco"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <p class="f-12 mb-0 font-weight-bold text-center">Imagenes</p>
                                    <div id="imagenes_eco_gine" class="collapse show" aria-labelledby="eco_gine" data-parent="#eco_gine">
                                        <div class="dropzone" id="mis-imagenes-eco_gine" action="{{ route('profesional.imagen.carga') }}"></div>
                                    </div>
                                </div>
                                {{--  <div class="form-row">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-success has-ripple">Guardar<span class="ripple ripple-animate" style="height: 94.375px; width: 94.375px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -33.6875px; left: -14.3125px;"></span></button>
                                        <button class="btn btn-primary" align:center>Ver formulario PDF</button>
                                    </div>
                                </div>  --}}
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--ECO OBSTÉTRICA-->
    <div class="tab-pane fade" id="eco_obst" role="tabpanel" aria-labelledby="eco_obst_tab">
        <div class="row bg-white shadow-sm rounded mx-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Ecografía obstétrica</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form id="form_ecoobt">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                    <script>
                                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                        var f=new Date();
                                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm" for="tipo">Tipo de Eco</label>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" id="tipo" name="tipo">
                                            <option>Seleccione</option>
                                            <option>Trans-vaginal</option>
                                            <option>Abdominal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="sol_por">Derivada por</label>
                                        <select name="sol_por" id="sol_por" class="form-control form-control-sm"   onchange="evaluar_para_carga_detalle('sol_por','div_sol_por','sol_por_obs',2)">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Propia</option>
                                            <option value="2">Dr/a</option>
                                        </select>
                                    </div>
                                    <div class="form-group"  id="div_sol_por" style="display:none">
                                        <label class="floating-label-activo-sm" for="sol_por_nom">Profesional solicitante <i>(Anote Nombre)</i> </label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"   onfocus="this.rows=3" onblur="this.rows=1;" name="sol_por_nom" id="sol_por_nom"></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="motivo">Motivo</label>
                                        <select class="form-control form-control-sm" id="motivo" name="motivo" class="form-control form-control-sm"  onchange="evaluar_para_carga_detalle('motivo','div_mot_examen','mot_examen',4)">>
                                            <option value="0">Seleccione</option>
                                            <option value="1">Examen de Rutina</option>
                                            <option value="2">Control Embarazo Normal</option>
                                            <option value="3">Control Embarazo Patológico</option>
                                            <option value="4">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group"  id="div_mot_examen" style="display:none">
                                        <label class="floating-label-activo-sm" for="mot_examen">Motivo Examen <i>(Anote Motivo)</i> </label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"   onfocus="this.rows=3" onblur="this.rows=1;" name="mot_examen" id="mot_examen"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm" for="fur">FUR</label>
                                    <input type="date" class="form-control form-control-sm" name="fur" id="fur">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm" for="fpp">FPP</label>
                                    <input type="date" class="form-control form-control-sm" name="fpp" id="fpp">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm" for="e_gest">Edad gestacional</label>
                                    <input type="text" class="form-control form-control-sm" name="e_gest" id="e_gest">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm" for="num_gest">Nº de gestación</label>
                                    <input type="text" class="form-control form-control-sm" name="num_gest" id="num_gest">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm" for="lcc">Longitud Cráneo-Caudal</label>
                                    <input type="text" class="form-control form-control-sm" name="lcc" id="lcc">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm" for="Diametro_cef">Diametro cefálico</label>
                                    <input type="text" class="form-control form-control-sm" name="Diametro_cef" id="Diametro_cef">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm" for="peso_fetal">Estimación del peso fetal</label>
                                    <input type="text" class="form-control form-control-sm" name="peso_fetal" id="peso_fetal">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm" for="edad_ecografia">Edad gestacional por ecografía</label>
                                     <input type="text" class="form-control form-control-sm" name="edad_ecografia" id="edad_ecografia">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm" for="placenta">Placenta</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="placenta" id="placenta"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm" for="liq_amniotico">Liquido amniótico</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="liq_amniotico" id="liq_amniotico"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <label class="floating-label-activo-sm" for="sexo">Sexo</label>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" id="sexo" name="sexo">
                                            <option>Seleccione</option>
                                            <option>Femenino</option>
                                            <option>Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                    <label class="floating-label-activo-sm" for="dg_ecografico">Diagnóstico Ecográfico</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="dg_ecografico" id="dg_ecografico"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                    <label class="floating-label-activo-sm" for="obs_eco">Observaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_eco" id="obs_eco"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <p class="f-12 mb-0 font-weight-bold text-center">Imagenes</p>
                                    <div id="imagenes_eco_obstetrica" class="collapse show" aria-labelledby="eco_obstetrica" data-parent="#eco_obstetrica">
                                        <div class="dropzone" id="mis-imagenes-eco_obstetrica" action="{{ route('profesional.imagen.carga') }}"></div>
                                    </div>
                                </div>
                                {{--  <div class="form-row">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success has-ripple">Guardar<span class="ripple ripple-animate" style="height: 94.375px; width: 94.375px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -33.6875px; left: -14.3125px;"></span></button>
                                        <button class="btn btn-primary" align:center>Ver formulario PDF</button>
                                    </div>
                                </div>  --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--PROCEDIMIENTOS-->
    <div class="tab-pane fade" id="procedimientos" role="tabpanel" aria-labelledby="procedimientos_tab">
        <div class="row bg-white shadow-sm rounded mx-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Procedimientos</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-3 font-weight-bolder">
                                <script>
                                    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                    var f=new Date();
                                    document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                </script>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                                    <select class="form-control form-control-sm" id="tipo_proc_go" name="tipo_proc_go"data-titulo="Tipo de Procedimiento"  data-seccion="Procedimientos"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_proc_go','div_detalle_tipo_proc_go','otro_tipo_proc_go',5);">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Instalación DIU</option>
                                        <option value="2">Cambio DIU</option>
                                        <option value="3">Toma de Muestra PAP</option>
                                        <option value="4">Electro-Cauterio o Radiofrecuencia</option>
                                        <option value="5">Otro</option>
                                    </select>
                                </div>
                                <div class="form-group"  id="div_detalle_tipo_proc_go" style="display:none">
                                    <label class="floating-label-activo-sm">Otro Procedimiento <i>Describa</i> </label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs.Ex. mamas"  data-seccion="Madre mamas"   onfocus="this.rows=3" onblur="this.rows=1;" name="otro_tipo_proc_go" id="otro_tipo_proc_go"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Derivación</label>
                                    <select name="proc_go_derivacion" id="proc_go_derivacion" data-titulo="Examen Ginecológico"  data-seccion="Madre mamas"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('proc_go_derivacion','div_detalle_proc_go_derivacion','go_derivacion_por',2);">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Propia</option>
                                        <option value="2">Dr/a</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_detalle_proc_go_derivacion" style="display:none">
                                    <label class="floating-label-activo-sm">Nombre Profesional</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Obs.Examen Ginecológico"  data-seccion="Madre mamas"  onfocus="this.rows=3" onblur="this.rows=1;" name="go_derivacion_por" id="go_derivacion_por"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Motivo</label>
                                    <select name="proc_go_derivacion_motivo" id="proc_go_derivacion_motivo" data-titulo="Examen Ginecológico"  data-seccion="Madre mamas"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('proc_go_derivacion_motivo','div_detalle_proc_go_derivacion_motivo','go_derivacion_por',3);">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Control Rutinario</option>
                                        <option value="2">Sospecha de Patología</option>
                                        <option value="3">Otro</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_detalle_proc_go_derivacion_motivo" style="display:none">
                                    <label class="floating-label-activo-sm">Otra Sospecha <i>Describa</i> </label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Obs.Examen Ginecológico"  data-seccion="Madre mamas"  onfocus="this.rows=3" onblur="this.rows=1;" name="proc_go_derivacion_motivo_desc" id="proc_go_derivacion_motivo_desc"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12">

                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">BIÓPSIA</h6>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm mb-2"  onclick="sol_biopsia_go();">Tomar Biópsia</button>
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="floating-label">Observaciones Procedimiento</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">PAP</h6>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm mb-2"  onclick="sol_pap();">Tomar PAP</button>
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="floating-label">Observaciones Procedimiento</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">DIU</h6>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm mb-2"  onclick="anticonc();">Antec diu</button>
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="floating-label">Observaciones Procedimiento</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">Otro Procedimiento</h6>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm mb-2"  onclick="otros_proc();">Antec Otros Procedimientos</button>
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="floating-label">Describa Procedimiento y Observaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="3"  onfocus="this.rows=5" onblur="this.rows=3;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.m_biopsia_go')
                            @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.modal_anticonceptivo')
                            @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.otros_procedimientos')

                            {{--  <div class="form-row">
                                <div class="form-group col-md-12 text-center mx-auto">
                                    <button type="button" class="btn btn-danger">Cancelar</button>
                                    <button type="button" class="btn btn-info">Guardar</button>
                                </div>
                            </div>  --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



