<div id="ecogine_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ecogine_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Ecografía Ginecológica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="eco_gine"</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body" id="form_ecogine">
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
                                            <label class="floating-label-activo-sm">Derivada por:</label>
                                            <div class="form-group fill">
                                                <select class="form-control form-control-sm" id="solicitante" name="solicitante">
                                                    <option>Seleccione</option>
                                                    <option>Propia</option>
                                                    <option>Dr/a</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2" id="">
                                            <label class="floating-label-activo-sm">Profesional solicitante</label>
                                            <input type="text" class="form-control form-control-sm" id="nombre_solicitante" name="nombre_solicitante">
                                        </div>
                                        <div class="form-group col-md-2" id="">
                                            <label class="floating-label-activo-sm">Motivo</label>
                                            <div class="form-group fill">
                                                <select class="form-control form-control-sm" id="motivo" name="motivo">
                                                    <option>Seleccione</option>
                                                    <option>Examen de Rutina</option>
                                                    <option>Estudio Fertilidad</option>
                                                    <option>Alteración Ovario</option>
                                                        <option>Otra</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2" id="">
                                            <label class="floating-label-activo-sm">Motivo </label>
                                            <input type="text" class="form-control form-control-sm" name="desc_motivo" id="desc_motivo">
                                        </div>
                                        <div class="form-group col-md-2" id="">
                                            <label class="floating-label-activo-sm">Tipo de Eco</label>
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
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">UTERO</h6>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">En General</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Endometrio</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">OVARIOS</h6>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Ovario Derecho</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Ovario Izquierdo</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">TROMPAS</h6>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Trompa Derecha</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Trompa Izquierda</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">FONDO DE SACO</h6>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Trompa Derecha</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Trompa Izquierda</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">CONCLUSIÓN</h6>
                                        </div>
                                        <div class="form-group col-md-10">
                                            <label class="floating-label-activo-sm">Trompa Derecha</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">SUBIR IMAGENES</h6>
                                        </div>
                                        <div class="form-group col-md-10">
											<input size="80" name="archivo_up" id="archivo_up" type="file" onchange="javascript: submit();">
										</div>
										<div class="col-md-6">
											<div class="image">
											</div>
                                        </div>	
                                    </div>
                                    <div class="form-row">
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
											<button type="button" class="btn btn-success has-ripple">Guardar<span class="ripple ripple-animate" style="height: 94.375px; width: 94.375px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -33.6875px; left: -14.3125px;"></span></button>
											<button class="btn btn-primary" align:center>Ver formulario PDF</button>
										</div>
									</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>