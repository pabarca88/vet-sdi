<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-4 shadow-none">
 
        <div class="row mb-2">
            <div class="col-md-12">
                <h6 class="f-20 text-c-blue d-inline">Ingreso de Paciente</h6>
                <div class=" d-inline">
                     <script>
                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                            "Octubre", "Noviembre", "Diciembre");

                        var f = new Date();
                        document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>
                </div>
            </div>
        </div>    
		<div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="hospitalizacion" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="info-ingreso-tab" data-toggle="tab" href="#info-ingreso" role="tab" aria-controls="info-ingreso"  aria-selected="true">Info. Ingreso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="indicaciones-tab" data-toggle="tab" href="#indicaciones" role="tab" aria-controls="indicaciones" aria-selected="false">Indicaciones Ingreso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="cirugia-pab-tab" data-toggle="tab" href="#cirugia-pab" role="tab" aria-controls="cirugia-pab" aria-selected="false">Cirugía</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="equipo-pab-tab" data-toggle="tab" href="#equipo-pab" role="tab" aria-controls="equipo-pab" aria-selected="false">Equipo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="archivos-pab-tab" data-toggle="tab" href="#archivos-pab" role="tab" aria-controls="archivos-pab" aria-selected="false">Archivos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="comentarios-pab-tab" data-toggle="tab" href="#comentarios-pab" role="tab" aria-controls="comentarios-pab" aria-selected="false">Comentarios</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="hospitalizar_ingreso">
                            <!--INFO. INGRESO-->
                            <div class="tab-pane fade show active" id="info-ingreso" role="tabpanel"
                                aria-labelledby="info-ingreso-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">INFORMACION DE INGRESO</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="floating-label-activo-sm">Médico tratante</label>
                                            <input type="text" class="form-control form-control-sm" name="med_tratante" id="med_tratante">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="floating-label-activo-sm">Urgencia</label>
                                            <input type="text" class="form-control form-control-sm" id="hosp_en" name="hosp_en">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="floating-label-activo-sm">Diagnósticos</label>
                                            <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=8" onblur="this.rows=1;"name="dg_ingreso" id="dg_ingreso"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Motivo de Hospitalizaciòn</label>
                                                <input type="text" class="form-control form-control-sm" name="serv_hosp" id="serv_hosp">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--INDICACIONES INGRESO-->
                            <div class="tab-pane fade show" id="indicaciones" role="tabpanel"
                                aria-labelledby="indicaciones-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">INDICACIONES DE INGRESO</h6>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Indicaciones medicamentos</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"name="ind_ingreso" id="ind_ingreso"></textarea>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Indicaciones de exámenes</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"name="ind_ingreso" id="ind_ingreso"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Indicaciones generales</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"name="ind_ingreso" id="ind_ingreso"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <input type="hidden" id="biopsia_cisto" name="biopsia_cisto" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="biopsia('cisto');" id="biopsia_check_cisto" name="biopsia_check_cisto" value="">
                                                    <label for="biopsia_check_cisto" class="cr"></label>
                                                </div>
                                                <label>¿Cirugía?</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--CIRUGIA-->
                            <div class="tab-pane fade show" id="cirugia-pab" role="tabpanel"
                                aria-labelledby="cirugia-pab-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">CIRUGÍA</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Órgano</label>
                                            <input type="text" class="form-control form-control-sm" name="organo_op" id="organo_op">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Tipo de cirugía <i>(nombre)</i></label>
                                            <input type="text" class="form-control form-control-sm" name="tipo_op" id="tipo_op">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Anestésia</label>
                                            <input type="text" class="form-control form-control-sm"name="tipo_anest" id="tipo_anest">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora de cirugía</label>
                                            <input type="time" class="form-control form-control-sm" name="hora_op"id="hora_op">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--EQUIPO-->
                            <div class="tab-pane fade show" id="equipo-pab" role="tabpanel"
                                aria-labelledby="equipo-pab-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">EQUIPO</h6>
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Cirujano</label>
                                            <textarea class="form-control caja-texto form-control-sm" name="cirujano" id="cirujano"></textarea>
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Ayudantes</label>
                                            <textarea class="form-control caja-texto form-control-sm" name="ayudante" id="ayudante"></textarea>
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Anestesista</label>
                                            <textarea class="form-control caja-texto form-control-sm" name="anestesista" id="anestesista"></textarea>
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Arsenalero/a</label>
                                            <textarea class="form-control caja-texto form-control-sm" name="arsenalera" id="arsenalera"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Instrumental especial</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"name="instrumental_especial" id="nstrumental_especial"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--ARCHIVO-->
                            <div class="tab-pane fade show" id="archivos-pab" role="tabpanel"
                                aria-labelledby="archivos-pab-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">ARCHIVOS</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <!-- [ Main Content ] start -->
                                            <div class="dropzone" id="mis-imagenes" action="">
                                            </div>
                                            <!-- [ file-upload ] end -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--COMENTARIOS-->
                            <div class="tab-pane fade show" id="comentarios-pab" role="tabpanel"
                                aria-labelledby="comentarios-pab-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">COMENTARIOS</h6>
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Comentarios</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="otros_hosp" id="otros_hosp"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
