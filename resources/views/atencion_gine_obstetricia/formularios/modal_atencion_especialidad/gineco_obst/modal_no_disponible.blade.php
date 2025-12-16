<div id="no_disponible" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="no_disponible" aria-hidden="true">
	<div class="modal-dialog modal-mg" role="document">
		<div class="modal-content ">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white">DOCUMENTO NO DISPONIBLE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_acomp1').modal('hide');">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-md-11 text-center mx-auto">
                        <!--autorización responsabilidad-->
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="alert alert-danger pt-1 pb-1 px-1 p-13" role="alert">
                                    Lo sentimos documento no disponible en los archivos de salud digital Integrada
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <img src="{{ asset('images\pages\discount.svg') }}" alt="" class="img-fluid mb-4 wid-100">
                                <p class="f-w-400 mb-4">Solicite a su paciente que lo suba en la sección mis documentos de recetaonline</p>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<script>
    function no_disponible() {
        $('#no_disponible').modal('show');
    }
</script>
