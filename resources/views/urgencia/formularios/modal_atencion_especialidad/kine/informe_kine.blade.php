<div id="informe_kine" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="informe_kine" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Informe kinesiológico</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <script>
                               var f = new Date();
                               document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                            </script>
                        </div>
                        <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                            <label class="floating-label">Médico Tratante</label>
                            <input type="text" class="form-control form-control-sm" name="med_tte" id="med_tte">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label">Nombre del Paciente</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                        </div>
                        <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label class="floating-label-activo-sm">Edad</label>
                            <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm">Email</label>
                            <input type="text" class="form-control form-control-sm" name="email" id="email">
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label class="floating-label-activo-sm">Diagnóstico kinesiológico</label>
                            <input type="text" class="form-control form-control-sm" name="dg_fono" id="dg_fono">
                        </div>
                        <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label class="floating-label-activo-sm">Sesiones</label>
                            <input type="text" class="form-control form-control-sm" name="ses_real" id="ses_real">
                        </div>
                        <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label class="floating-label-activo-sm">sesiones pendientes</label>
                            <input type="text" class="form-control form-control-sm" name="ses_pend" id="ses_pend">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Tratamiento realizado</label>
                            <input type="text" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Comentarios</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label class="floating-label-activo-sm">Nombre kinesiólogo</label>
                            <input type="text" class="form-control form-control-sm" name="nomb_fono" id="nomb_fono">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm">Proximo control</label>
                            <input type="text" class="form-control form-control-sm btn-block" name="prox_cont_fono" id="prox_cont_fono">
                        </div>
                    </div>
                </form>
            </div>
			<div class="modal-footer">
                <button type="button" class="btn btn-outline-primary btn-sm"><i class="feather icon-file-text"></i> Ver PDF</button>
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
				<button type="button" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
			</div>
		</div>	
	</div>
</div>
	