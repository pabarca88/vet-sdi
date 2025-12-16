<div id="m_responsables_fmu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_responsables_fmu" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-light">
				<h5 class="modal-title text-c-blue mt-1">Responsables</h5>
				<button type="button" class="btn btn-primary btn-icon" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        @if(isset($datos->responsables))
                           {!! $datos->responsables !!}
                        @endif
                    </div>
                </div>
			</div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" onclick="$('#m_responsables_fmu').modal('hide');">Cerrar</button>
            </div>-->
		</div>
	</div>
</div>
<script>
    function responsables_fmu() {
        $('#m_responsables_fmu').modal('show');
    }
</script>
