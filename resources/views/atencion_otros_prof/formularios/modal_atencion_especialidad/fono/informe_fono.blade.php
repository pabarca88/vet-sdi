<div id="informe_fono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="informe_fono" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Informe Fonoaudiológico</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <script>
                               var f = new Date();
                               document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                            </script>
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label class="floating-label-activo-sm" for='med_tte'>Médico Tratante</label>
                            <input type="text" class="form-control form-control-sm" name="med_tte" id="med_tte">
                        </div>
						<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for='nombre_paciente'>Nombre del Paciente</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                        </div>
                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label class="floating-label-activo-sm" for='edad'>Edad</label>
                            <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                        </div>
                        <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                            <label class="floating-label-activo-sm" for='email'>Email</label>
                            <input type="text" class="form-control form-control-sm" name="email" id="email">
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label class="floating-label-activo-sm" for='dg_fono'>Diagnóstico Fonoaudiológico</label>
                            <input type="text" class="form-control form-control-sm" name="dg_fono" id="dg_fono">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm" for='ses_real'>Sesiones</label>
                            <input type="text" class="form-control form-control-sm" name="ses_real" id="ses_real">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for='ses_pend'>Sesiones pendientes</label>
                            <input type="text" class="form-control form-control-sm" name="ses_pend" id="ses_pend">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Tratamiento realizado</label>
                            <input type="text" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for='com_inf_fono'>Comentarios</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label class="floating-label-activo-sm" for='nomb_fono'>Nombre Fonoaudiólogo</label>
                            <input type="text" class="form-control form-control-sm" name="nomb_fono" id="nomb_fono">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm" for='prox_cont_fono'>Proximo Control</label>
                            <input type="date" class="form-control form-control-sm" name="prox_cont_fono" id="prox_cont_fono">
                        </div>
                    </div>
                </form>
			</div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary-light-c btn-sm"><i class="feather icon-file"></i>Ver PDF</button>
                    <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i>Cerrar</button>
                    <button type="button" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i>Guardar</button>
                </div>
		</div>
	</div>
</div>
