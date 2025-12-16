<div id="cfaltante" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="cfaltante" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        {{--  <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
        @csrf  --}}
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Solicitud de Inclusión Consentimiento Faltante </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row" hidden>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">profesional</label>
			            <input type="text" class="form-control form-control-sm" name="Prof_sol_cons" id="Prof_sol_cons">
			        </div>

					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">Fecha</label>
			            <input type="text" class="form-control form-control-sm" name="Prof_sol_cons_fecha" id="Prof_sol_cons_fecha">
			        </div>

				</div>


                <div class="form-row">
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Consentimiento Faltante</label>
						<input type="text" class="form-control form-control-sm" id="form_cons_faltante"name="form_cons_faltante" value="">
					</div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="hidden" name="form_cons_faltante_especialidad" id="form_cons_faltante_especialidad" value="@if($profesional->SubTipoEspecialidad()->first()) {{ $profesional->SubTipoEspecialidad()->first()->id }} @else {{ $profesional->TipoEspecialidad()->first()->id }}  @endif">
						<label class="label"><strong>Especialidad: </strong>@if($profesional->SubTipoEspecialidad()->first()) {{ $profesional->SubTipoEspecialidad()->first()->nombre }} @else {{ $profesional->TipoEspecialidad()->first()->nombre }}  @endif </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm">Observaciones</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_sol_cons_formulario" id="obs_sol_cons_formulario"></textarea>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" onclick="registrar_sol_consentimiento();" class="btn btn-info">Solicitar incorporación</button>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>


            </div>
		</div>
	</div>
</div>

<script>
    function c_faltante() {
		$('#cfaltante').modal('show');
		}
    function registrar_sol_consentimiento() {
        let id_prof_sol_cons= $('#id_profesional_fc').val();
        {{--  let prof_sol_cons_fecha= $('#prof_sol_cons_fecha').val();  --}}
        let form_cons_faltante = $('#form_cons_faltante').val();
        let form_cons_faltante_especialidad = $('#form_cons_faltante_especialidad').val();
        let obs_sol_cons_formulario = $('#obs_sol_cons_formulario').val();

        let url = "{{ route('ficha_medica.registrar_consentimiento_faltante') }}";
        let hora_medica = $('#hora_medica').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();

        $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id_prof_sol_cons: id_prof_sol_cons,
                    form_cons_faltante: form_cons_faltante,
                    form_cons_faltante_especialidad: form_cons_faltante_especialidad,
                    obs_sol_cons_formulario: obs_sol_cons_formulario,
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    if(response['estado'] == '1')
                    {
                        swal({
                            title: "Registro de Solicitud Consentimiento." ,
                            text: response['msj'],
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#cfaltante').modal('hide');


                    }
                    else
                    {
                        swal({
                            title: "Registro de Solicitud Consentimiento." ,
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





