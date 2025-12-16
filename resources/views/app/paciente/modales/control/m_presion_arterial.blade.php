<div id="c_presion_arterial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_presion_arterial" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Control presión arterial</h5>
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

				    <div class="form-group col-sm-12 col-md-3">
				        <label class="floating-label-activo">P.Sistólica</label>
				        <input type="text" class="form-control form-control-sm" name="c_presion_sistolica" id="c_presion_sistolica"/>
				    </div>
				    <div class="form-group col-sm-12 col-md-3">
				        <label class="floating-label-activo">P.Diastólica</label>
				        <input type="text" class="form-control form-control-sm" name="c_presion_diastólica" id="c_presion_diastólica"/>
				    </div>
				    <div class="form-group col-sm-12 col-md-3">
				        <label class="floating-label-activo">Pulso</label>
				        <input type="text" class="form-control form-control-sm" name="c_presion_pulso" id="c_presion_pulso"/>
				    </div>
				    <div class="form-group col-sm-12 col-md-6">
				        <label class="floating-label-activo">Comentarios</label>
				        <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="c_presion_coment" id="c_presion_coment"></textarea>
				    </div>
				    <div class="form-group col-sm-12 col-md-3">
                        <button type="button" class="btn btn-sm btn-block btn-primary" onclick="registro_c_presion();">Agregar</button>
				    </div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<h6 class="text-c-blue"> REGISTRO DE CONTROLES</h6>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<table id="reg-c-presion" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
						    <thead>
						        <tr>
						            <th>Fecha</th>
						            <th>Sistólica</th>
						            <th>Diastólica</th>
						            <th>Pulso</th>
						            <th>Comentarios</th>
                                    <th>Eliminar</th>
						        </tr>
						    </thead>
						    <tbody>
						        {{--  --}}
						    </tbody>
						</table>
					</div>
                    <div class="col-12 mb-3">
                        <canvas id="grafico_presion_control" height="100"></canvas>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    function ctrl_presion()
    {
        ver_registros_c_presion('reg-c-presion');
        $('#c_presion_arterial').modal('show');
    }

    function registro_c_presion()
    {

        let sistolica= $('#c_presion_sistolica').val();
        let diastólica = $('#c_presion_diastólica').val();
        let  pulso = $('#c_presion_pulso').val();
        let  coment= $('#c_presion_coment').val();
        let _token = CSRF_TOKEN;

        let url = "{{ route('paciente.registro_c_presion') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                sistolica : sistolica,
                diastólica : diastólica,
                pulso : pulso,
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
                        title: "Ingreso de Control de Presión.",
                        text: 'Control registrado con Exito.',
                        icon: "success",
                    });
                }
                else
                {
                    swal({
                        title: "Ingreso de Control de Presión.",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                    });
                }
            }
            else
            {
                swal({
                    title: "Ingreso de Control de Presión.",
                    text: 'Sin Retorno de Registro, Intente nuevamente.',
                    icon: "error",
                });
            }
            ver_registros_c_presion('reg-c-presion');

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function ver_registros_c_presion(tabla)
{
    $('#'+tabla+' tbody').html('');

    let url = "{{ route('paciente.ver_registros_c_presion') }}";
    $.ajax({
        url: url,
        type: "get",
        data: {},
    })
    .done(function(data) {
        console.log(data)

        // Arrays para el gráfico
        const fechas = [];
        const sistolica = [];
        const diastolica = [];
        const pulso = [];

        if (data != null && data.estado == 1) {
            $.each(data.registros, function (key, value) {
                fechas.push(value.fecha);
                sistolica.push(value.sistolica);
                diastolica.push(value.diastólica);
                pulso.push(value.pulso);

                var html = '';
                html += '<tr>';
                html += '    <td>'+value.fecha+'</td>';
                html += '    <td>'+value.sistolica+'</td>';
                html += '    <td>'+value.diastólica+'</td>';
                html += '    <td>'+value.pulso+'</td>';
                if(value.coment != null) html += '    <td>'+value.coment+'</td>';
                else html += '    <td> </td>';
                html += '    <td> <button type="button" class="btn btn-xs btn-block btn-danger" onclick="eliminar_c_presion(\''+value.id+'\');">Eliminar</button> </td>';
                html += '</tr>';
                $('#'+tabla+' tbody').append(html);
            });
        } else {
            var html = '';
            html += '<tr>';
            html += '    <td colspan="5">Sin Registros</td>';
            html += '</tr>';
            $('#'+tabla+' tbody').html(html);
        }

        // Destruye el gráfico anterior si existe
        if (window.chartPresionControl) {
            window.chartPresionControl.destroy();
        }

        // Crea el gráfico solo si hay datos
        if (fechas.length > 0) {
            const ctx = document.getElementById('grafico_presion_control').getContext('2d');
            window.chartPresionControl = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: fechas,
                    datasets: [
                        {
                            label: 'Sistólica',
                            data: sistolica,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Diastólica',
                            data: diastolica,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Pulso',
                            data: pulso,
                            borderColor: 'rgba(255, 206, 86, 1)',
                            backgroundColor: 'rgba(255, 206, 86, 0.2)',
                            fill: false,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        title: { display: true, text: 'Historial de Presión Arterial' }
                    }
                }
            });
        }
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });
}

    function eliminar_c_presion(id)
    {
        let url = "{{ route('paciente.eliminar_registro_c_presion') }}";
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
                        title: "Eliminar  Control de Presión.",
                        text: 'Control eliminado con Exito.',
                        icon: "success",
                    });
                    ver_registros_c_presion('reg-c-presion');
                }
                else
                {
                    swal({
                        title: "Eliminar de Control de Presión.",
                        text: 'Control No eliminado.',
                        icon: "danger",
                    });
                }
            }
            else
            {
                swal({
                    title: "Eliminar de Control de Presión.",
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
