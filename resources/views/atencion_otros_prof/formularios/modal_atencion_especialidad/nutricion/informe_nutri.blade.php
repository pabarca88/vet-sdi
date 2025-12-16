<div id="informe_nutri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="informe_nutri" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">INFORME NUTRICIÓN</h5>
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
                                    <label class="floating-label">Procedencia del Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="med_tte" id="med_tte" value="">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="floating-label">Diagnóstico Nutrición</label>
                                    <input type="text" class="form-control form-control-sm" name="dg_fono" id="dg_fono">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label">Sesiones</label>
                                    <input type="text" class="form-control form-control-sm" name="ses_real" id="ses_real">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Sesiones Pendientes</label>
                                    <input type="text" class="form-control form-control-sm" name="ses_pend" id="ses_pend">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label">Tratamiento Realizado</label>
                                    <input type="text" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                                </div>
                                <div class="form-group col-md-12">
                                    <label id="" name="" class="floating-label-activo-sm">Informe</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                    <!-- Botón para grabar voz -->
                                    <button type="button" class="btn btn-outline-primary btn-sm mt-1" id="btnGrabarvoz">
                                        🎤 Dictar descripción
                                    </button>
                                    <span id="estado_voz_voz" class="text-muted ml-2"></span>
                                </div>

                                <div class="form-group col-md-8">
                                    <label class="floating-label">Nombre Profesional</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre_nutri" id="nombre_nutri" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Proximo Control</label>
                                    <input type="text" class="form-control form-control-sm" name="prox_cont_nutri" id="prox_cont_nutri">
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
