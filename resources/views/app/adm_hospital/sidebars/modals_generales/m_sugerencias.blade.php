<div id="fsugerencias" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="fsugerencias" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        {{--  <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
        @csrf  --}}
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Sugerencias al Software</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row" hidden>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">profesional</label>
			            <input type="text" class="form-control form-control-sm" name="Prof_sugerencias" id="Prof_sugerencias">
			        </div>

					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">Fecha</label>
			            <input type="text" class="form-control form-control-sm" name="Prof_sugerencias_fecha" id="Prof_sugerencias_fecha">
			        </div>

				</div>
                <div class="form-row">
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Sugerencias</label>
						<input type="text" class="form-control form-control-sm" id="form_sugerencia"name="form_sugerencia" value="">
					</div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="label"><strong>Especialidad: </strong>@if($profesional->SubTipoEspecialidad()->first()) {{ $profesional->SubTipoEspecialidad()->first()->nombre }} @else {{ $profesional->TipoEspecialidad()->first()->nombre }}  @endif </label>
                        <input type="hidden" name="form_sugerencias_especialidad" id="form_sugerencias_especialidad" value="@if($profesional->SubTipoEspecialidad()->first()) {{ $profesional->SubTipoEspecialidad()->first()->id }} @else {{ $profesional->TipoEspecialidad()->first()->id }}  @endif">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm">Observaciones</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_sugerencias" id="obs_sugerencias"></textarea>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" onclick="registrar_sugerencia();" class="btn btn-info">Enviar Sugerencia</button>
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
    function sugerencias() {
		$('#fsugerencias').modal('show');
    }
    function registrar_sugerencia() {
            let id_prof_sugerencias= $('#id_profesional_fc').val();
            {{--  let prof_sol_cons_fecha= $('#prof_sol_cons_fecha').val();  --}}
            let form_sugerencia = $('#form_sugerencia').val();
            let form_sugerencias_especialidad = $('#form_sugerencias_especialidad').val();
            let obs_sugerencias = $('#obs_sugerencias').val();

            let url = "{{ route('ficha_medica.registrar_sugerencias') }}";
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_prof_sugerencias: id_prof_sugerencias,
                        form_sugerencia: form_sugerencia,
                        form_sugerencias_especialidad: form_sugerencias_especialidad,
                        obs_sugerencias: obs_sugerencias,
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        if(response['estado'] == '1')
                        {
                            swal({
                                title: "Registro de Sugerencia." ,
                                text: response['msj'],
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                            $('#fsugerencias').modal('hide');


                        }
                        else
                        {
                            swal({
                                title: "Registro de Sugerencia." ,
                                text: response['msj'],
                                icon: "error",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
            };
</script>


