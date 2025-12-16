<div id="ffaltante" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="ffaltante" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        {{--  <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
        @csrf  --}}
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Solicitud de Inclusión  de Formulario Faltante </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row" hidden>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">profesional</label>
			            <input type="text" class="form-control form-control-sm" name="Prof_sol_form" id="Prof_sol_form">
			        </div>

					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">Fecha</label>
			            <input type="text" class="form-control form-control-sm" name="Prof_sol_form_fecha" id="Prof_sol_form_fecha">
			        </div>

				</div>
                <div class="form-row">
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Procedimiento o Formulario Faltante</label>
						<input type="text" class="form-control form-control-sm" id="form_faltante"name="form_faltante" value="">
					</div>
                   <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <input type="hidden" name="form_faltante_especialidad" id="form_faltante_especialidad" value="@if($profesional->SubTipoEspecialidad()->first()) {{ $profesional->SubTipoEspecialidad()->first()->id }} @else {{ $profesional->TipoEspecialidad()->first()->id }}  @endif">
                    <label class="label"><strong>Especialidad: </strong>@if($profesional->SubTipoEspecialidad()->first()) {{ $profesional->SubTipoEspecialidad()->first()->nombre }} @else {{ $profesional->TipoEspecialidad()->first()->nombre }}  @endif </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm">Observaciones</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_sol_form_formulario" id="obs_sol_form_formulario"></textarea>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" onclick="registrar_sol_formulario();" class="btn btn-info">Solicitar incorporación Formulario</button>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-info btn-sm btn-block">Cerrar</button>
                    </div>
                </div>

            </div>
		</div>
	</div>
</div>

<script>
    function f_faltante() {
		$('#ffaltante').modal('show');
		}
    function registrar_sol_formulario() {
        let id_prof_sol_form= $('#id_profesional_fc').val();
        {{--  let prof_sol_cons_fecha= $('#prof_sol_cons_fecha').val();  --}}
        let form_faltante = $('#form_faltante').val();
        let form_faltante_especialidad = $('#form_faltante_especialidad').val();
        let obs_sol_form_formulario = $('#obs_sol_form_formulario').val();

        let url = "{{ route('ficha_medica.registrar_formulario_faltante') }}";
        let hora_medica = $('#hora_medica').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();

        $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id_prof_sol_form: id_prof_sol_form,
                    form_faltante: form_faltante,
                    form_faltante_especialidad: form_faltante_especialidad,
                    obs_sol_form_formulario: obs_sol_form_formulario,
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    if(response['estado'] == '1')
                    {
                        swal({
                            title: "Registro de Solicitud Formulario." ,
                            text: response['msj'],
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#ffaltante').modal('hide');


                    }
                    else
                    {
                        {{--  $('#mensaje').removeClass('alert-success');
                        $('#mensaje').addClass('alert-danger');
                        $('#mensaje').html('Certificado de reposo. Intente nuevamente<i class="fas fa-times"></i>');
                        $('#mensaje').show();  --}}

                        swal({
                            title: "Registro de Solicitud Formulario." ,
                            text: response['msj'],
                            icon: "error",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
        };
</script>
