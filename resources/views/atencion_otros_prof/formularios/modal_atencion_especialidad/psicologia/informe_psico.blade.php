<div id="informe_psi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="informe_psi" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Informe sicológico</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
                    <div class="form-group col-sm-6">
                        <script>
                            var f = new Date();
                            document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                        </script>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Médico tratante</label>
                        <input type="text" class="form-control form-control-sm" name="psi_infor_med_tte" id="psi_infor_med_tte">
                    </div>
                    {{--  <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Nombre del Paciente</label>
                        <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="floating-label-activo-sm">Edad</label>
                        <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="floating-label-activo-sm">Correo electrónico</label>
                        <input type="text" class="form-control form-control-sm" name="email" id="email">
                    </div>  --}}

                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <label class="floating-label-activo-sm">Diagnóstico Sicológico</label>
                        <input type="text" class="form-control form-control-sm" name="psi_dg_sico" id="psi_dg_sico">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                        <label class="floating-label-activo-sm">N° Sesiones</label>
                        <input type="text" class="form-control form-control-sm" name="psi_ses_real" id="psi_ses_real">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <label class="floating-label-activo-sm">Sesiones pendientes</label>
                        <input type="text" class="form-control form-control-sm" name="psi_ses_pend" id="psi_ses_pend">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <label class="floating-label-activo-sm">Tratamiento realizado</label>
                        <input type="text" class="form-control form-control-sm" name="psi_tto_realizado" id="psi_tto_realizado">
                    </div>
                    <div class="form-group col-sm-12 col-md-8">
                        <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="psi_infor_coment" id="psi_infor_coment"></textarea>
                    </div>
                    {{--  <div class="form-group col-md-8">
                        <label class="floating-label">Nombre Sicólogo</label>
                        <input type="text" class="form-control form-control-sm" name="nomb_fono" id="nomb_fono">
                    </div>  --}}
                    <div class="form-group col-md-4">
                        <label class="floating-label-activo-sm">Próximo control</label>
                        <input type="date" class="form-control form-control-sm" name="psi_prox_cont" id="psi_prox_cont">
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm"><i class="feather icon-file-text"></i>  Ver PDF</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i>  Cerrar</button>
                <button type="button" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
		</div>
	</div>
</div>
<script>
    function informe_psi() {
        $('#informe_psi').modal('show');
    }
</script>
