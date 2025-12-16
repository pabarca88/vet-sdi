<div id="m_aconsentcirm" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_aconsentcirm" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
        <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
        <input type="hidden" name="email_paciente_fc" value="{{ $paciente->email }}" id="email_paciente_fc">
        <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->nombre }}" id="apellido_uno_profesional_fc">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_uno }}" id="apellido_uno_profesional_fc">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_dos }}" id="apellido_uno_profesional_fc">

        @csrf
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Consentimiento Informado Cirugía Mayor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row" hidden>
					<div class="form-group fill col-sm-4">
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

				</div>
                <!--Formulario / Menor de edad-->

                <!--Cierre: Formulario / Menor de edad-->
				<h6 class="mb-2" hidden>Paciente menor de edad o imposibilitado/a</h6>
				<div class="form-row">
                    @include('atencion_medica.generales.seccion_menor')
				</div>
				<div class="form-row" hidden>
					<div class="form-group fill col-sm-12">
						<label class="floating-label">Nombre del profesional</label>
						<input type="text" class="form-control form-control-sm" id="prof"name="prof" value="{{ $profesional->apellido_uno }}">
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<p>1. He consultado con el profesional <strong>Dr.{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong> quien me ha explicado e informado,sobre el motivo, los objetivos y potenciales riesgos para mi salud , que este procedimiento conlleva.</p>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group fill col-sm-6">
						<label class="floating-label">Nombre del procedimiento</label>
						<input  type="text" class="form-control form-control-sm" id="prof"name="prof" value="autocomplete">
					</div>
                    <div class="form-group fill col-sm-6">
						<button type="button" class="btn btn-success btn-block btn-sm " data-toggle="modal" data-target="#modal_aut">Envío de consentimiento</button>
						<!--este botón pide código que le llega al teléfono y mail del paciente además de rescatarlo en recetaonline(profesional y paciente)}-->
					</div>
                    <div class="form-group fill col-sm-12">
			            <label class="floating-label">Texto</label>
			            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="comentarios" id="comentarios" value="ac´va el texto del consentimiento"></textarea>
			        </div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<p>2. Al autorizar mediante email o por la app.,Me doy por informado y doy mi consentimiento para el procedimiento enunciado precedentemente</p>
					</div>

				</div>
				<div class="form-row">
					<div class="form-group fill col-sm-6">
			            <label class="floating-label" hidden>Código</label>
			            <input type="hidden" class="form-control form-control-sm" name="cod_aut" id="cod_aut" value="Código">
			        </div>
					<div class="form-group fill col-sm-12">
			            <label class="floating-label">Comentarios</label>
			            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="comentarios" id="comentarios"></textarea>
			        </div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						Lo Saluda Atte.{{ $profesional->apellido_uno }} <br>firma digital certificado de comprobación del certificado y codigo QR
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

