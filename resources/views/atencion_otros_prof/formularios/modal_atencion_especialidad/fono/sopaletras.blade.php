<div id="sopa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sopa" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white">Sopa de letras</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2" >
					<h6 class="form_fono_center">IDENTIFIQUE LOS NOMBRES DE LAS FIGURAS DE LA IZQUIERDA </h6>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2 text-center" >
                       <img src="{{ asset('images\fono\img\sopa_letras.png') }}" style="width:90%">
				</div>
                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <label  class="floating-label-activo-sm">Comentarios Generales</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="com_gral_slet" id="com_gral_slet"></textarea>
                    </div>
                </div>
                    <hr>
                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <label  class="floating-label-activo-sm">Objetivos Logrados</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="com_gral_slet" id="com_gral_slet"></textarea>
                    </div>
                </div>
                    <hr>
                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <label  class="floating-label-activo-sm">Plan en proximas Sesiones</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="plan_slet" id="plan_slet"></textarea>
                    </div>
                    <br>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
		</div>
	</div>
</div>
<script>
    function sopa_l() {
        $('#sopa').modal('show');
    }
</script>
