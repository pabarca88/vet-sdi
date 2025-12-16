<div id="m_aconsentcir" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_aconsentcir" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Consentimiento Informado Cirugía Menor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row">
					<div class="form-group fill col-sm-6">
			            <label class="floating-label">Rut</label>
			            <input type="text" class="form-control form-control-sm" name="nom_pcte" id="rut">
			        </div>
					<div class="form-group fill col-sm-6">
			            <label class="floating-label">Nombre del paciente</label>
			            <input type="text" class="form-control form-control-sm" name="nom_pcte" id="nom_pcte">
			        </div>
					<div class="form-group fill col-sm-2">
			            <label class="floating-label">Edad</label>
			            <input type="text" class="form-control form-control-sm" name="edad_pcte" id="edad_pcte">
			        </div>
					<div class="form-group fill col-sm-5">
			            <label class="floating-label">Email paciente</label>
			            <input type="text" class="form-control form-control-sm" name="email_pcte" id="email_pcte">
			        </div>
					<div class="form-group fill col-sm-5">
			            <label class="floating-label">Dirección</label>
			            <input type="text" class="form-control form-control-sm" name="dir_pcte" id="dir_pcte">
			        </div>
				</div>
				<h6 class="mb-2">Paciente menor de edad o imposibilitada</h6>
				<div class="form-row">
					<div class="form-group fill col-sm-4">
			            <label class="floating-label">Rut responsable</label>
			            <input type="text" class="form-control form-control-sm" name="rut_resp" id="rut_resp">
			        </div>
					<div class="form-group fill col-sm-4">
			            <label class="floating-label">Nombre del responsable</label>
			            <input type="text" class="form-control form-control-sm" name="nom_resp" id="nom_resp">
			        </div>
					<div class="form-group fill col-sm-4">
			            <label class="floating-label">Parentezco</label>
			            <input type="text" class="form-control form-control-sm" name="pariente_pcte" id="pariente_pcte">
			        </div>
					<div class="form-group fill col-sm-6">
			            <label class="floating-label">Teléfono</label>
			            <input type="tel" class="form-control form-control-sm" name="tel_responsable" id="tel_responsable">
			        </div>
					<div class="form-group fill col-sm-6">
			            <label class="floating-label">Email responsable</label>
			            <input type="text" class="form-control form-control-sm" name="email_rep" id="email_rep">
			        </div>
				</div>
				<div class="form-row">
					<div class="form-group fill col-sm-12">
						<label class="floating-label">Nombre del profesional</label>
						<input type="text" class="form-control form-control-sm" id="prof"name="prof"> <p>Médico.<p>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<p>1. He consultado con el profesional <strong>(NOMBRE DEL PROFESIONAL)</strong> quien me ha explicado e informado,sobre el motivo, los objetivos y potenciales riesgos para mi salud , que este procedimiento conlleva.</p>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group fill col-sm-12">
						<label class="floating-label">Nombre del procedimiento</label>
						<input  type="text" class="form-control form-control-sm" id="prof"name="prof">
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<p>2. Al entregar mi código de verificación, doy mi consentimiento para lo enunciado precedentemente</p>
					</div>
					<div class="col-md-12 mb-3">
						<button type="button" class="btn btn-success btn-block btn-sm mt-1" data-toggle="modal" data-target="#modal_aut">Solicitar código de consentimiento</button>
						<!--este botón pide código que le llega al teléfono o mail del paciente-->
					</div>
				</div>																		
				<div class="form-row">
					<div class="form-group fill col-sm-6">
			            <label class="floating-label">Código</label>
			            <input type="text" class="form-control form-control-sm" name="cod_aut" id="cod_aut">
			        </div>
					<div class="form-group fill col-sm-6">
			            <label class="floating-label">Comentarios</label>
			            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="comentarios" id="comentarios"></textarea>
			        </div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						Lo Saluda Atte. firma digital certificado de comprobación del certificado y codigo QR
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn  btn-danger btn-sm" data-dismiss="modal">Cerrar </button>
				<button type="button" class="btn  btn-info btn-sm">Guardar </button><!--le llega al paciente y profesional a Recetaonline en certificados-->
			</div>
		</div>
	</div>
</div>

