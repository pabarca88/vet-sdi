<div id="a_area_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_area_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar área Centro médico</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
				<form>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group fill">
								<!--Cargar áreas-->
								<label class="floating-label">Área</label>
								<select class="form-control form-control-sm" id="tipo_area">
									<option value="0">Seleccione</option>
									@foreach ($tipos_areas_cm as $tipo_area_cm)
                                        <option value="{{ $tipo_area_cm->id }}">{{ $tipo_area_cm->nombre }}</option>
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group fill">
								<label class="floating-label">Responsable</label>
								<select class="form-control form-control-sm" id="responsable_cargo_area">
                                        <option value="0">Seleccione</option>
										@foreach ($profesionales as $profesional)
                                            <option value="{{ $profesional->id_profesional }}">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</option>
                                        @endforeach
								</select>
							</div>
						</div>

					</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group fill">
							<label class="floating-label-activo">Contacto (email)</label>
							<input type="text" class="form-control form-control-sm" name="e_cont" id="e_cont">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group fill">
							<label class="floating-label-activo">Teléfono</label>
							<input type="number" class="form-control form-control-sm" name="tel_c" id="tel_c">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group fill">
							<label class="floating-label-activo">N°/pers a cargo</label>
							<input type="number" class="form-control form-control-sm" name="n_pers" id="n_pers">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_area_cm();">Agregar</button>
			</div>

			</form>
		</div>
	</div>
</div>

<script>
 function ag_area_cm() {
            $('#a_area_cm').modal('show');
        }

function guardar_area_cm(){
    var tipo_area = $('#tipo_area').val();
    // var area = $('#area').val();
    var responsable_cargo = $('#responsable_cargo_area').val();
    var e_cont = $('#e_cont').val();
    var tel_c = $('#tel_c').val();
    var n_pers = $('#n_pers').val();
    var token = '{{csrf_token()}}';

    var valido = 1;
    var mensaje = '';

    if (tipo_area == 0) {
        valido = 0;
        mensaje += '<li>Debe seleccionar un tipo de área</li>';
    }

    // if (area == '') {
    //     valido = 0;
    //     mensaje += '<li>Debe seleccionar un área</li>';
    // }

    if (responsable_cargo == 0) {
        valido = 0;
        mensaje += '<li>Debe seleccionar un responsable</li>';
    }

    if (e_cont == '') {
        valido = 0;
        mensaje += '<li>Debe ingresar un email de contacto</li>';
    }

    if (tel_c == '') {
        valido = 0;
        mensaje += '<li>Debe ingresar un teléfono de contacto</li>';
    }

    if (n_pers == '') {
        valido = 0;
        mensaje += '<li>Debe ingresar un número de personas a cargo</li>';
    }

    if(valido == 0){
        $('#mensaje').html('<div class="alert alert-danger"><ul>'+mensaje+'</ul></div>');
        swal({
            title: "Error",
            content:{
                element: "div",
                attributes:{
                    innerHTML: mensaje
                }
            },
            icon: "error",
        })
        return false;
    }

    $.ajax({
        url: '{{ ROUTE("adm_cm.agregar_area_cm") }}',
        type: 'POST',
        data: {
            // area: area,
            responsable_cargo: responsable_cargo,
            e_cont: e_cont,
            tel_c: tel_c,
            n_pers: n_pers,
            tipo_area: tipo_area,
            _token: token
        },
        success: function (data) {
            console.log(data);
            if (data.estado == 1) {
                $('#a_area_cm').modal('hide');
                $('#area').val('');
                $('#responsable_cargo_area').val('');
                $('#e_cont').val('');
                $('#tel_c').val('');
                $('#n_pers').val('');
                $('#tabla_area_cm').load('/adm_cm/tabla_area_cm');
                $('#contenedor_areas_cm').empty();
                $('#contenedor_areas_cm').append(data.v);
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
</script>
