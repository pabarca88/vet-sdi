<div id="ecoobstetrica_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ecoobstetrica_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="#"> Ecografía obstétrica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <form id="form_ecoobt">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                    <script>
                                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                        var f=new Date();
                                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
                                </div>
                                 <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                    <label class="floating-label-activo-sm">Tipo de Eco</label>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" id="tipo" name="tipo">
                                            <option>Seleccione</option>
                                            <option>Trans-vaginal</option>
                                            <option>Abdominal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">Derivada por</label>
                                  
                                        <select class="form-control form-control-sm" id="solicitante" name="solicitante">
                                            <option>Seleccione</option>
                                            <option>Propia</option>
                                            <option>Dr/a</option>
                                        </select>
                                    
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">Profesional solicitante</label>
                                    <input type="text" class="form-control form-control-sm" id="nombre_solicitante" name="nombre_solicitante">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">Motivo</label>
                                    
                                        <select class="form-control form-control-sm" id="motivo" name="motivo">
                                            <option>Seleccione</option>
                                            <option>Examen de Rutina</option>
                                            <option>Control Embarazo Normal</option>
                                            <option>Control Embarazo Patológico</option>
                                            <option>Otro</option>
                                        </select>
                                    
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">Otro motivo </label>
                                    <input type="text" class="form-control form-control-sm" name="desc_motivo" id="desc_motivo">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
									<label class="floating-label-activo-sm">FUR</label>
                                    <input type="date" class="form-control form-control-sm" name="fur" id="fur">
								</div>
								<div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">FPP</label>
                                    <input type="date" class="form-control form-control-sm" name="fpp" id="fpp">
								</div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">Edad gestacional</label>
                                    <input type="text" class="form-control form-control-sm" name="e_gest" id="e_gest">
								</div>
								<div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">Nº de gestación</label>
                                    <input type="text" class="form-control form-control-sm" name="num_gest" id="num_gest">
								</div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">Longitud Cráneo-Caudal</label>
                                    <input type="text" class="form-control form-control-sm" name="num_gest" id="num_gest">
								</div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">Diametro cefálico</label>
                                    <input type="text" class="form-control form-control-sm" name="Diametro_cef" id="Diametro_cef">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">Estimación del peso fetal</label>
                                    <input type="text" class="form-control form-control-sm" name="peso_fetal" id="peso_fetal">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                    <label class="floating-label-activo-sm">Edad gestacional por ecografía</label>
                                     <input type="text" class="form-control form-control-sm" name="edad_ecografia" id="edad_ecografia">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm">Placenta</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="placenta" id="placenta"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm">Liquido amniótico</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="liq_amniotico" id="liq_amniotico"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <label class="floating-label-activo-sm">Sexo</label>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" id="sexo" name="sexo">
                                            <option>Seleccione</option>
                                            <option>Femenino</option>
                                            <option>Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                    <label class="floating-label-activo-sm">Diagnóstico Ecográfico</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="dg_ecografico" id="dg_ecografico"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                    <label class="floating-label-activo-sm">Observaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_eco" id="obs_eco"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 mb-2">
                                    <h6>Subir imagenes</h6>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<!-- <input size="80" name="archivo_up" id="archivo_up" type="file" onchange="javascript: submit();"> -->
                                    <!-- [ Main Content ] start -->
                                    <div class="dropzone" id="mis-imagenes-eco-obstetricia" action="{{ route('profesional.imagen.carga') }}"></div>
                                    <!-- [ file-upload ] end -->
								</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm">Guardar</button>
                <button type="button" class="btn btn-primary btn-sm">Ver formulario PDF</button>
            </div>
        </div>
    </div>
</div>

