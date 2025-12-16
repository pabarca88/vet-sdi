<div id="info_academica_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info_academica" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Antecendente académico</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_info_academica_m();"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Tipo antecedente académico</label>
                        <select class="form-control form-control-sm" name="id_tipo_antecedente_academico" id="id_tipo_antecedente_academico">
                            <option value="0">Seleccionar</option>
                            @foreach($tipo_ant_academico as $key_t_ant_acade => $value_t_ant_acade)
                                <option value="{{ $value_t_ant_acade->id }}">{{ $value_t_ant_acade->nombre }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Profesión</label>
                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion" value="">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Universidad</label>
                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_universidad" value="">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Año de Titulo</label>
                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_anio" value="">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Ciudad y País</label>
                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_ciudad_pais" value="">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">N° SUPERSALUD</label>
                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_supersalud" value="">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">N° Colegio Profesional</label>
                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_numero_colegio" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger btn-sm mr-2" data-dismiss="modal" onclick="cerrar_info_academica_m();"><i class="feather icon-x"></i> Cancelar</button>
                        <button type="button" class="btn btn-sm btn-info" onclick="agregar_registro_academico();"><i class="feather icon-save"></i> Guardar</button>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

<script>

    function info_academica_m()
    {
        $('#info_academica_modal').modal('show');
    }

    function cerrar_info_academica_m()
    {
        $('#info_academica_modal').modal('hide');
        $('#id_tipo_antecedente_academico').val('0');
        $('#agregar_ant_academico_profesion').val('');
        $('#agregar_ant_academico_universidad').val('');
        $('#agregar_ant_academico_anio').val('');
        $('#agregar_ant_academico_ciudad_pais').val('');
        $('#agregar_ant_academico_supersalud').val('');
        $('#agregar_ant_academico_numero_colegio').val('');
    }

    function agregar_registro_academico()
    {
        var id_tipo_antecedente_academico = $('#id_tipo_antecedente_academico').val();
        var profesion = $('#agregar_ant_academico_profesion').val();
        var universidad = $('#agregar_ant_academico_universidad').val();
        var anio = $('#agregar_ant_academico_anio').val();
        var ciudad_pais = $('#agregar_ant_academico_ciudad_pais').val();
        var supersalud = $('#agregar_ant_academico_supersalud').val();
        var numero_colegio = $('#agregar_ant_academico_numero_colegio').val();

        let url = "{{ route('profesional.agregar_antecedente_academico') }}";
        let token = CSRF_TOKEN;

        $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    id_tipo_antecedente_academico: id_tipo_antecedente_academico,
                    nombre: profesion,
                    universidad: universidad,
                    anio: anio,
                    ciudad_pais: ciudad_pais,
                    supersalud: supersalud,
                    numero_colegio: numero_colegio,
                },
            })
            .done(function(data) {

                if (data.estado == 1) {

                    swal({
                        title: "se a agregado antecedentes académicos",
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 100);
                    // alert('se modifico antecedentes del paciente');
                    // location.reload();

                } else {
                    swal({
                        title: "Error al agregar los antecedentes académicos",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('Error al modificar los antecedentes');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

</script>

