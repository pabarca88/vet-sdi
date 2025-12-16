<div id="m_acomp1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_acomp1" aria-hidden="true">
	<div class="modal-dialog modal-mg" role="document">
		<div class="modal-content ">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white">Autorización de Examen Menor de Edad</h5>
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
                                        Esta autorización certifica la presencia de un adulto
									</div>
								</div>
								<div class="col-sm-12 text-center">
									<img src="{{ asset('images/iconos/candado.svg') }}" alt="" class="img-fluid mb-4 wid-50">
									<p class="f-w-400 mb-4">Ingrese el código de seguridad que se le ha enviado a su correo electrónico</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label class="floating-label-activo-sm" for="text">Código de seguridad</label>
										<input type="text" class="form-control form-control-sm" name="codigo_autorizacion" id="codigo_autorizacion" placeholder="">
									</div>
									<div class="btn btn-sm btn-block btn-success mb-2" onclick="recibir_codigo_autorizacion();">Autorizar examen</div>
									<!--en todos los modals poner un alert de guardar si no lo ha guardado-->
									<p class="mb-2 text-muted text-center">¿No has recibido los códigos de seguridad?<br> podemos <a href="#" class="f-w-400 text-dark" onclick="$('#m_acomp1').modal('hide');solicitar_autorizacion();"> volver a enviarlos</a></p>
								</div>
							</div>
							<!-- Cierre: autorización responsabilidad-->
						</div>
					</div>

			</div>
		</div>
	</div>
</div>
