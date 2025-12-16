<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Ingreso de Paciente</h6>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12" style="margin-left: 30px">
                            <script>
                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                            var f=new Date();
                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                            </script>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 30px">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="info-ingreso-tab" data-toggle="tab" href="#info-ingreso" role="tab" aria-controls="info-ingreso" aria-selected="true">Info. Ingreso</a>
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
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-nutricional">
                            <!--INFO. INGRESO-->
                            <div class="tab-pane fade show active" id="info-ingreso" role="tabpanel" aria-labelledby="info-ingreso-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-2">
                                            <h6 class="text-c-blue">INFORMACION DE INGRESO</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="floating-label-activo-sm">Médico tratante</label>
                                            <input type="text" class="form-control form-control-sm" name="med_tratante" id="med_tratante">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="floating-label-activo-sm">Clínica - Hospital</label>
                                            <input type="text" class="form-control form-control-sm" id="hosp_en" name="hosp_en">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="floating-label-activo-sm">Diagnósticos </label>
                                            <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Servicio</label>
                                                <input type="text" class="form-control form-control-sm" name="serv_hosp" id="serv_hosp">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--INDICACIONES INGRESO-->
                            <div class="tab-pane fade show" id="indicaciones" role="tabpanel" aria-labelledby="indicaciones-tab">
                                <form>
                                    <div class="form-row mb-2">
                                        <div class="col-md-12 mb-2">
                                            <h6 class="text-c-blue">INDICACIONES DE INGRESO</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label class="floating-label-activo-sm">Indicaciones de ingreso</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ind_ingreso" id="ind_ingreso"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--CIRUGIA-->
                            <div class="tab-pane fade show" id="cirugia-pab" role="tabpanel" aria-labelledby="cirugia-pab-tab">
                                <form>
                                    <div class="form-row mb-2">
                                        <div class="col-md-12 mb-2">
                                            <h6 class="text-c-blue">CIRUGÍA</h6>
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
                                            <input type="text" class="form-control form-control-sm" name="tipo_anest" id="tipo_anest">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora de cirugía</label>
                                            <input type="time" class="form-control form-control-sm" name="hora_op" id="hora_op">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--EQUIPO-->
                            <div class="tab-pane fade show" id="equipo-pab" role="tabpanel" aria-labelledby="equipo-pab-tab">
                                <form>
                                    <div class="form-row mb-2">
                                        <div class="col-md-12 mb-2">
                                            <h6 class="text-c-blue">EQUIPO</h6>
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Cirujano</label>
                                            <input type="text" class="form-control form-control-sm" name="cirujano" id="cirujano">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Ayudantes</label>
                                            <input type="text" class="form-control form-control-sm" name="ayudante" id="ayudante">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Anestesista</label>
                                            <input type="text" class="form-control form-control-sm" name="anestesista" id="anestesista">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Arsenalero/a</label>
                                            <input type="text" class="form-control form-control-sm" name="arsenalera" id="arsenalera">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Instrumental especial</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="instrumental_especial" id="nstrumental_especial"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--ARCHIVO-->
                            <div class="tab-pane fade show" id="archivos-pab" role="tabpanel" aria-labelledby="archivos-pab-tab">
                                <form>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <h6 class="mb-2 text-c-blue">ARCHIVOS</h6>
                                        <input class="mb-2" size="80" name="archivo_up" id="archivo_up" type="file" onchange="javascript: submit();">
                                        <br>
                                        <!--IDEA DEL ARCHIVO ADJUNTO
                                        <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                                            <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> Nombre del archivo</a>
                                            <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                                            <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> Eco -Doppler- Nombre paciente.pdf</a>
                                            <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--COMENTARIOS-->
                            <div class="tab-pane fade show" id="comentarios-pab" role="tabpanel" aria-labelledby="comentarios-pab-tab">
                                <form>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <h6 class="mb-3 text-c-blue">COMENTARIOS</h6>
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Comentarios</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otros_hosp" id="otros_hosp"></textarea>
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









