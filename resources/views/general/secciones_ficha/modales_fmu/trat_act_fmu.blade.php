<div id="trat_act" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="trat_act" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Tratamientos activos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        @if (isset($datos->tratamientos_activos))
                            {!! $datos->tratamientos_activos !!}
                        @endif
                    </div>
                </div>

			</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" onclick="$('#trat_act').modal('hide');">Cerrar</button>
            </div>

		</div>
	</div>
</div>

<script>
    function trat_act_fmu() {
        $('#trat_act').modal('show');
    }
</script>
