<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="gine" role="tablist">
                    <li class="nav-item-secciones">
                    <a class="nav-secciones active text-uppercase" id="eco_gine-tab" data-toggle="tab" href="#eco_gine" role="tab" aria-controls="eco_gine" aria-selected="true">Eco Ginecológica</a>
                    </li>
                    <li class="nav-item-secciones">
                    <a class="nav-secciones text-uppercase" id="eco_obst-tab" data-toggle="tab" href="#eco_obst" role="tab" aria-controls="eco_obst" aria-selected="false">Eco Obstétrica</a>
                    </li>
                    <li class="nav-item-secciones">
                     <a class="nav-secciones text-uppercase" id="procedimientos-tab" data-toggle="tab" href="#procedimientos" role="tab" aria-controls="procedimientos" aria-selected="false">Procedimientos</a>
                    </li>
                    <li class="nav-item-secciones">
                    <a class="nav-secciones text-uppercase" id="biopsia-tab" data-toggle="tab" href="#biopsia" role="tab" aria-controls="biopsia" aria-selected="false">Biopsia</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="tab-content" id="gine-contenido">
    <!--ECO GINECOLÓGICA-->
    <div class="tab-pane fade show active" id="eco_gine" role="tabpanel" aria-labelledby="eco_gine-tab">
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
                                <div class="form-group col-md-6 font-weight-bolder">
                                    <script>
                                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                        var f=new Date();
                                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="floating-label-activo-sm">Tipo de ecografía</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="tipo" name="tipo">
                                            <option>Seleccione</option>
                                            <option>Transvaginal</option>
                                            <option>Abdominal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Derivada por</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="solicitante" name="solicitante">
                                            <option>Seleccione</option>
                                            <option>Propia</option>
                                            <option>Dr/a</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Profesional solicitante</label>
                                    <input type="text" class="form-control form-control-sm" id="nombre_solicitante" name="nombre_solicitante">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Motivo</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="motivo" name="motivo">
                                            <option>Seleccione</option>
                                            <option>Examen de rutina</option>
                                            <option>Estudio fertilidad</option>
                                            <option>Alteración ovario</option>
                                                <option>Otra</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Motivo</label>
                                    <input type="text" class="form-control form-control-sm" name="desc_motivo" id="desc_motivo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">ÚTERO</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">En general</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Endometrio</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="endomentrio" id="endomentrio"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">OVARIOS</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Ovario derecho</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="o_derecho" id="o_derecho"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Ovario izquierdo</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="o_izquierdo" id="o_izquierdo"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">TROMPAS</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="t_derecha" id="t_derecha"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa izquierda</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="t_izquierda" id="t_izquierda"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">FONDO DE SACO</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="t_derecha" id="t_derecha"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa izquierda</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="t_izquierda" id="t_izquierda"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">CONCLUSIÓN</h6>
                                </div>
                                <div class="form-group col-md-10">
                                    <label class="floating-label">Trompa derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="t_derecha" id="t_derecha"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bolder" for="subir_imagen">Subir imagen</label>
                                    <input type="file" class="form-control-file" id="subir_imagen">
                                </div>
                            </div>
                            <div class="form-row">
                                <hr>
                                <div class="form-group col-md-12 text-center mx-auto">
                                    <button type="button" class="btn btn-danger btn-sm">Cancelar</button>
                                    <button type="button" class="btn btn-success btn-sm">Guardar</button>
                                    <button type="button" class="btn btn-primary btn-sm">Ver en PDF</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--ECO OBSTÉTRICA-->
    <div class="tab-pane fade" id="eco_obst" role="tabpanel" aria-labelledby="eco_obst-tab">
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
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6 font-weight-bolder">
                                    <script>
                                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                        var f=new Date();
                                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label class="floating-label-activo-sm">Tipo de ecografía</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="tipo" name="tipo">
                                            <option>Seleccione</option>
                                            <option>Transvaginal</option>
                                            <option>Abdominal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Derivada por</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="solicitante" name="solicitante">
                                            <option>Seleccione</option>
                                            <option>Propia</option>
                                            <option>Dr/a</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Profesional solicitante</label>
                                    <input type="text" class="form-control form-control-sm" id="nombre_solicitante" name="nombre_solicitante">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Motivo</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="motivo" name="motivo">
                                            <option>Seleccione</option>
                                            <option>Examen de rutina</option>
                                            <option>Control embarazo normal</option>
                                            <option>Control embarazo patológico</option>
                                            <option>Otra</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Motivo</label>
                                    <input type="text" class="form-control form-control-sm" name="desc_motivo" id="desc_motivo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">FUR</label>
                                    <input type="date" class="form-control form-control-sm" name="fur" id="fur">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">FPP</label>
                                    <input type="date" class="form-control form-control-sm" name="fpp" id="fpp">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Edad gestacional</label>
                                    <input type="number" class="form-control form-control-sm" name="e_gest" id="e_gest">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Nº de gestación</label>
                                    <input type="number" class="form-control form-control-sm" name="num_gest" id="num_gest">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Longitud cráneo caudal</label>
                                    <input type="number" class="form-control form-control-sm" name="num_gest" id="num_gest">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Diametro cefálico</label>
                                    <input type="number" class="form-control form-control-sm" name="Diametro_cef" id="Diametro_cef">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Estimación del peso fetal</label>
                                    <input type="number" class="form-control form-control-sm" name="peso_fetal" id="peso_fetal">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Edad gestacional por ecografía</label>
                                     <input type="number" class="form-control form-control-sm" name="edad_ecografia" id="edad_ecografia">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="floating-label">Placenta</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="placenta" id="placenta"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="floating-label">Liquido amniótico</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="liq_amniotico" id="liq_amniotico"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label class="floating-label">Sexo</label>
                                    <input type="text" class="form-control form-control-sm" name="sexo" id="sexo">
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Diagnóstico ecográfico</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="dg_ecografico" id="dg_ecografico"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Observaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_eco" id="obs_eco"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bolder" for="subir_imagen">Subir imagen</label>
                                    <input type="file" class="form-control-file" id="subir_imagen">
                                </div>
                            </div>
                            <div class="form-row">
                                <hr>
                                <div class="form-group col-md-12 text-center mx-auto">
                                    <button type="button" class="btn btn-danger btn-sm">Cancelar</button>
                                    <button type="button" class="btn btn-success btn-sm">Guardar</button>
                                    <button type="button" class="btn btn-primary btn-sm">Ver en PDF</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--PROCEDIMIENTOS-->
    <div class="tab-pane fade" id="procedimientos" role="tabpanel" aria-labelledby="procedimientos-tab">
        <div class="row bg-white shadow-sm rounded mx-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Procedimientos</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6 font-weight-bolder">
                                    <script>
                                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                        var f=new Date();
                                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="floating-label-activo-sm">Tipo de ecografía</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="tipo" name="tipo">
                                            <option>Seleccione</option>
                                            <option>Transvaginal</option>
                                            <option>Abdominal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Derivada por</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="solicitante" name="solicitante">
                                            <option>Seleccione</option>
                                            <option>Propia</option>
                                            <option>Dr/a</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Profesional solicitante</label>
                                    <input type="text" class="form-control form-control-sm" id="nombre_solicitante" name="nombre_solicitante">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Motivo</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="motivo" name="motivo">
                                            <option>Seleccione</option>
                                            <option>Examen de rutina</option>
                                            <option>Estudio fertilidad</option>
                                            <option>Alteración Ovario</option>
                                            <option>Otra</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Motivo</label>
                                    <input type="text" class="form-control form-control-sm" name="desc_motivo" id="desc_motivo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">UTERO</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">En general</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Endometrio</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">OVARIOS</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Ovario derecho</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Ovario izquierdo</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">TROMPAS</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa izquierda</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">FONDO DE SACO</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa izquierda</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">CONCLUSIÓN</h6>
                                </div>
                                <div class="form-group col-md-10">
                                    <label class="floating-label">Trompa Derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bolder" for="subir_imagen">Subir imagen</label>
                                    <input type="file" class="form-control-file" id="subir_imagen">
                                </div>
                            </div>
                            <div class="form-row">
                                <hr>
                                <div class="form-group col-md-12 text-center mx-auto">
                                    <button type="button" class="btn btn-danger btn-sm">Cancelar</button>
                                    <button type="button" class="btn btn-success btn-sm">Guardar</button>
                                    <button type="button" class="btn btn-primary btn-sm">Ver en PDF</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--BIOPSIA-->
    <div class="tab-pane fade" id="biopsia" role="tabpanel" aria-labelledby="biopsia-tab">
        <div class="row bg-white shadow-sm rounded mx-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Biopsias</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6 font-weight-bolder">
                                    <script>
                                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                        var f=new Date();
                                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="floating-label-activo-sm">Tipo de ecografía</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="tipo" name="tipo">
                                            <option>Seleccione</option>
                                            <option>Trans-vaginal</option>
                                            <option>Abdominal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Derivada por</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="solicitante" name="solicitante">
                                            <option>Seleccione</option>
                                            <option>Propia</option>
                                            <option>Dr/a</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Profesional solicitante</label>
                                    <input type="text" class="form-control form-control-sm" id="nombre_solicitante" name="nombre_solicitante">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Motivo</label>
                                    <div class="form-group fill">
                                        <select class="form-control form-control-sm" id="motivo" name="motivo">
                                            <option>Seleccione</option>
                                            <option>Examen de rutina</option>
                                            <option>Estudio fertilidad</option>
                                            <option>Alteración ovario</option>
                                            <option>Otra</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Motivo</label>
                                    <input type="text" class="form-control form-control-sm" name="desc_motivo" id="desc_motivo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">ÚTERO</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">En general</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Endometrio</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">OVARIOS</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Ovario derecho</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Ovario izquierdo</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">TROMPAS</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa izquierda</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">FONDO DE SACO</h6>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="floating-label">Trompa izquierda</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="float-left d-inline mt-2">CONCLUSIÓN</h6>
                                </div>
                                <div class="form-group col-md-10">
                                    <label class="floating-label">Trompa derecha</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bolder" for="subir_imagen">Subir imagen</label>
                                    <input type="file" class="form-control-file" id="subir_imagen">
                                </div>
                            </div>
                            <div class="form-row">
                                <hr>
                                <div class="form-group col-md-12 text-center mx-auto">
                                    <button type="button" class="btn btn-danger btn-sm">Cancelar</button>
                                    <button type="button" class="btn btn-success btn-sm">Guardar</button>
                                    <button type="button" class="btn btn-primary btn-sm">Ver en PDF</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



