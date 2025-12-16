<div id="coneccion_api" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="coneccion_api" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        {{--  <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">  --}}
        {{--  <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
        <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
        <input type="hidden" name="email_paciente_fc" value="{{ $paciente->email }}" id="email_paciente_fc">
        <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->nombre }}" id="apellido_uno_profesional_fc">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_uno }}" id="apellido_uno_profesional_fc">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_dos }}" id="apellido_uno_profesional_fc">
        @csrf  --}}
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Esperando autorización</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row">
                    <div class="form-group col-sm-6 col-md-12 col-lg-6 col-xl-6">
                        <img src="{{ asset('images\spinner.svg') }}" style="width:50%;text-align:center">
                    </div>
                    <div class="form-group col-sm-6 col-md-12 col-lg-3 col-xl-3">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block">Paciente</button>
                    </div>
                    <div class="form-group col-sm-6 col-md-12 col-lg-3 col-xl-3">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block">Previsión</button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block">Cancelar</button>
                    </div>
                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-info btn-sm btn-block">Continuar</button>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<script>
    function conectar_api()
    {
        $('#coneccion_api').modal('show');
    }
</script>


