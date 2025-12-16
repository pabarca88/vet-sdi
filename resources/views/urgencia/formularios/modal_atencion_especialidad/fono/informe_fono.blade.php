<div id="informe_fono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="informe_fono" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">INFORME FONOAUDIOLÓGICO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="card" href="#"><!--Inicio de Card-->
				    <div class="card-body shadow-none" id="form_0_orl">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <script>
                                       var f = new Date();
                                       document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                    </script>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="floating-label">Médico Tratante</label>
                                    <input type="text" class="form-control form-control-sm" name="med_tte" id="med_tte">
                                </div>
								<div class="form-group col-md-6">
                                    <label class="floating-label">Nombre del Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Edad</label>
                                    <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Email</label>
                                    <input type="text" class="form-control form-control-sm" name="email" id="email">
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Diagnóstico Fonoaudiológico</label>
                                    <input type="text" class="form-control form-control-sm" name="dg_fono" id="dg_fono">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label">Sesiones</label>
                                    <input type="text" class="form-control form-control-sm" name="ses_real" id="ses_real">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">sesiones Pendientes</label>
                                    <input type="text" class="form-control form-control-sm" name="ses_pend" id="ses_pend">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Tratamiento Realizado</label>
                                    <input type="text" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                                </div>
                                <div class="form-group col-md-12">
                                    <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="floating-label">Nombre Fonoaudiólogo</label>
                                    <input type="text" class="form-control form-control-sm" name="nomb_fono" id="nomb_fono">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Proximo Control</label>
                                    <input type="text" class="form-control form-control-sm" name="prox_cont_fono" id="prox_cont_fono">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
					
				
				<div class="modal-footer">
                    <button type="button" class="btn btn-secondary has-ripple" data-dismiss="modal">Ver PDF</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-success">Guardar</button>
				</div>
			</div>	
		</div>
	</div>
</div>
	