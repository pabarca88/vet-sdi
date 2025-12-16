<div id="c_mod" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_mod" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title text-c-blue mt-1">Modalidad de trabajo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form>
                    <div class="form-row">
                        <p>Esta modalidad estará visible en los motores de búsquedas de asistentes pertenecientes a Medichile</p>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="mod_1">
                                <label class="custom-control-label" for="mod_1">Presencial</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="mod_2">
                                <label class="custom-control-label" for="mod_2">Online</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    		<button type="button" class="btn btn-info">Guardar</button>
                    	</div>
                    </div>
                </form>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    function modalidad() {
        $('#c_mod').modal('show');
    }
</script>
