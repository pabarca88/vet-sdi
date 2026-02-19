<div id="ingreso_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ingreso_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> ORDEN DE INGRESO HOSPITALIZACIÓN</h5>
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
                                        <div class="form-group col-md-5" id="">
                                            <label class="floating-label-activo-sm">Médico Tratante:</label>
                                            <div class="form-group fill">
                                                <input type="text" class="form-control form-control-sm" name="med_tratante" id="med_tratante">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5" id="">
                                            <label class="floating-label-activo-sm">Hospitalizar en (Clínica Hospital):</label>
                                            <input type="text" class="form-control form-control-sm" id="hosp_en" name="hosp_en">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        
                                        <div class="form-group col-md-6" id="">
                                            <label class="floating-label-activo-sm">Diagnósticos </label>
                                           <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso"></textarea>
                                        </div>
                                        <div class="form-group col-md-6" id="">
                                            <label class="floating-label-activo-sm">Servicio </label>
                                            <div class="form-group fill">
                                                <input type="text" class="form-control form-control-sm" name="serv_hosp" id="serv_hosp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <h6 class="float-left d-inline">INDICACIONES DE INGRESO</h6>
                                        <div class="form-group col-md-12"> 
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="2"  onfocus="this.rows=6" onblur="this.rows=2;" name="ind_ingreso" id="ind_ingreso"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                            <h6 class="float-left d-inline">CIRUGÍA</h6>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Órgano</label>
                                            <input type="text" class="form-control form-control-sm" name="organo_op" id="organo_op">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Tipo Cirugía</label>
                                           <input type="text" class="form-control form-control-sm" name="tipo_op" id="tipo_op">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Anestésia</label>
                                            <input type="text" class="form-control form-control-sm" name="tipo_anest" id="tipo_anest">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Hora de Cirugía</label>
                                            <input type="text" class="form-control form-control-sm" name="hora_op" id="hora_op">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                            <h6 class="float-left d-inline">EQUIPO</h6>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Cirujano</label>
                                            <input type="text" class="form-control form-control-sm" name="cirujano" id="cirujano">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Ayudantes</label>
                                           <input type="text" class="form-control form-control-sm" name="ayudante" id="ayudante">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Anestesista</label>
                                            <input type="text" class="form-control form-control-sm" name="anestesista" id="anestesista">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Arsenalero/a</label>
                                            <input type="text" class="form-control form-control-sm" name="arsenalera" id="arsenalera">
                                        </div>
                                        <div class="form-group col-md-8">
                                           <label class="floating-label-activo-sm">Instrumental especial</label>
                                           <input type="text" class="form-control form-control-sm" name="instr_esp" id="instr_esp">
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <h6 class="float-left d-inline">OTROS</h6>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otros_hosp" id="otros_hosp"></textarea>
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
											<button type="button" class="btn btn-success has-ripple">Guardar y enviar <span class="ripple ripple-animate" style="height: 94.375px; width: 94.375px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -33.6875px; left: -14.3125px;"></span></button>
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