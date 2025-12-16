<div id="vol_orina" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vol_orina" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Control Volumen de Orina Diario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
				    <div class="form-group col-sm-12 col-md-4">
				        <p class="font-italic mt-0 mb-0 text-black">
                            @php
                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            $fecha = \Carbon\Carbon::parse(now());
                            $mes = $meses[($fecha->format('n')) - 1];
                            $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y') .'a las '. $fecha->format('H');
                            @endphp
                            {{ $fecha }}
                        </p>
				    </div>
				    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
				        <label class="floating-label-activo">Cantidad en ml.</label>
				        <input type="text" class="form-control form-control-sm" name="c_orina_lectura" id="c_orina_lectura"></input>
				    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
				        <label class="floating-label-activo">Comentarios</label>
				        <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="c_orina_coment" id="c_orina_coment"></textarea>
				    </div>
				    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">

				    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
				        <button type="button" class="btn btn-sm btn-block btn-success" onclick="registro_c_orina();">Agregar</button>
				    </div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<h6 class="text-c-blue"> REGISTRO DE CONTROLES ORINA</h6>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<table id="reg_c_orina" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
						    <thead>
						        <tr>
						            <th>Fecha</th>
						            <th>Hora</th>
						            <th>Cantidad en ml.</th>
						            <th>Comentarios</th>
						        </tr>
						    </thead>
						    <tbody>
						        {{--    --}}
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

    function ctrl_orina()
    {
        ver_registros_c_orina('reg_c_orina');
        $('#vol_orina').modal('show');
    }



    function registro_c_orina()
    {


        let  lectura = $('#c_orina_lectura').val();
        let  coment= $('#c_orina_coment').val();
        let _token = CSRF_TOKEN;

        let url = "{{ route('paciente.registro_c_orina') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                lectura : lectura,
                coment : coment,

            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Ingreso de Control de Volumen de Orina diaria.",
                        text: 'Control registrado con Exito.',
                        icon: "success",
                    });
                }
                else
                {
                    swal({
                        title: "Ingreso de Control de Volumen de Orina diaria.",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                    });
                }
            }
            else
            {
                swal({
                    title: "Ingreso de Control de Volumen de Orina diaria.",
                    text: 'Sin Retorno de Registro, Intente nuevamente.',
                    icon: "error",
                });
            }
            ver_registros_c_orina('reg_c_orina');

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function ver_registros_c_orina(tabla)
    {
        $('#'+tabla+' tbody').html('');

        let url = "{{ route('paciente.ver_registros_c_orina') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {},
        })
        .done(function(data) {
            console.log(data)

            if (data != null)
            {
                if(data.estado == 1)
                {
                    $.each(data.registros, function (key, value)
                    {
                        var html = '';
                        html += '<tr>';
                        html += '    <td>'+value.fecha+'</td>';
                        html += '    <td>'+value.lectura+'</td>';
                        if(value.coment != null) html += '    <td>'+value.coment+'</td>';
                        else html += '    <td> </td>';
                        html += '    <td> <button type="button" class="btn btn-xs btn-block btn-danger" onclick="eliminar_c_orina(\''+value.id+'\');">Eliminar</button> </td>';
                        html += '</tr>';
                        $('#'+tabla+' tbody').append(html);
                    });
                }
                else
                {
                    var html = '';
                    html += '<tr>';
                    html += '    <td colspan="5">Sin Registros</td>';
                    html += '</tr>';
                    $('#'+tabla+' tbody').html(html);
                }
            }
            else
            {
                var html = '';
                html += '<tr>';
                html += '    <td colspan="5">Sin Registros</td>';
                html += '</tr>';
                $('#'+tabla+' tbody').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function eliminar_c_orina(id)
    {
        let url = "{{ route('paciente.eliminar_registro_c_orina') }}";
        let _token = CSRF_TOKEN;
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token : _token,
                id : id,
            },
        })
        .done(function(data) {
            console.log(data)
            if (data != null)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Eliminar  Control de Volumen de Orina.",
                        text: 'Control eliminado con Exito.',
                        icon: "success",
                    });
                    ver_registros_c_orina('reg_c_orina');
                }
                else
                {
                    swal({
                        title: "Eliminar de Control de Volumen de Orina.",
                        text: 'Control No eliminado.',
                        icon: "danger",
                    });
                }
            }
            else
            {
                swal({
                    title: "Eliminar de Control de Volumen de Orina.",
                    text: 'Control No eliminado.',
                    icon: "danger",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }


</script>
