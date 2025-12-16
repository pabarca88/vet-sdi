<div id="ecoobstetrica_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ecoobstetrica_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="#"> Ecografía Obstétrica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="#"</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card"> 
                            <div class="card-body" id="form_ecoobt">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <script>
                                                var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                                                var f=new Date();
                                                document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                            </script>
                                        </div>
                                         <div class="form-group col-md-6" id="">
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
                                        <div class="form-group col-md-3" id="">
                                            <label class="floating-label-activo-sm">Derivada por:</label>
                                            <div class="form-group fill">
                                                <select class="form-control form-control-sm" id="solicitante" name="solicitante">
                                                    <option>Seleccione</option>
                                                    <option>Propia</option>
                                                    <option>Dr/a</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3" id="">
                                            <label class="floating-label-activo-sm">Profesional solicitante</label>
                                            <input type="text" class="form-control form-control-sm" id="nombre_solicitante" name="nombre_solicitante">
                                        </div>
                                        <div class="form-group col-md-3" id="">
                                            <label class="floating-label-activo-sm">Motivo</label>
                                            <div class="form-group fill">
                                                <select class="form-control form-control-sm" id="motivo" name="motivo">
                                                    <option>Seleccione</option>
                                                    <option>Examen de Rutina</option>
                                                    <option>Control Embarazo Normal</option>
                                                    <option>Control Embarazo Patológico</option>
                                                    <option>Otra</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3" id="">
                                            <label class="floating-label-activo-sm">Motivo </label>
                                            <input type="text" class="form-control form-control-sm" name="desc_motivo" id="desc_motivo">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
											<label class="floating-label-activo-sm">FUR</label>
                                            <input type="date" class="form-control form-control-sm" name="fur" id="fur">
										</div>
										<div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">FPP:</label>
                                            <input type="date" class="form-control form-control-sm" name="fpp" id="fpp">
										</div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Edad Gestacional</label>
                                            <input type="text" class="form-control form-control-sm" name="e_gest" id="e_gest">
										</div>
										<div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Nº de Gestación:</label>
                                            <input type="text" class="form-control form-control-sm" name="num_gest" id="num_gest">
										</div>	
                                    </div>	
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Longitud Cráneo-Caudal:</label>
                                            <input type="text" class="form-control form-control-sm" name="num_gest" id="num_gest">
										</div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Diametro Cefálico:</label>
                                            <input type="text" class="form-control form-control-sm" name="Diametro_cef" id="Diametro_cef">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Estimación del peso Fetal</label>
                                            <input type="text" class="form-control form-control-sm" name="peso_fetal" id="peso_fetal">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Edad Gestacional por Ecografía</label>
                                             <input type="text" class="form-control form-control-sm" name="edad_ecografia" id="edad_ecografia">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Placenta</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="placenta" id="placenta"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Liquido Amniótico</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="liq_amniotico" id="liq_amniotico"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Sexo</label>
                                            <input type="text" class="form-control form-control-sm" name="sexo" id="sexo">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Diagnóstico Ecográfico</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="dg_ecografico" id="dg_ecografico"></textarea>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Observaciones</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_eco" id="obs_eco"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h6 class="float-left d-inline">SUBIR IMAGENES</h6>
                                        </div>
                                        <div class="form-group col-md-12">
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