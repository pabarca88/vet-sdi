<div id="c_glicemia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_glicemia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Control glicemia</h5>
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
				    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
				        <label class="floating-label-activo">Alimentación</label>
				        <select class="form-control form-control-sm" name="c_glicemia_alimento" id="c_glicemia_alimento">
					        <option value="0">Seleccione</option>
					        <option value="1">Desayuno</option>
					        <option value="2">Almuerzo</option>
					        <option value="3">Cena</option>
					        <option value="4">Nocturno</option>
				        </select>
				    </div>
				    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
				        <label class="floating-label-activo">Post-prandial</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_sistolica" id="c_glicemia_postprandial"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
				        <label class="floating-label-activo">Pre-prandial</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_diastólica" id="c_glicemia_preprandial"></input>
				    </div>
				    <div class='form-group col-sm-12 col-md-2 col-lg-2 col-xl-2'>
				        <label class="floating-label-activo">Glicemia nocturna</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_noche" id="c_glicemia_noche"></input>
				    </div>

				    <div class="form-group col-sm-12 col-md-7 col-lg-7 col-xl-7">
				        <label class="floating-label-activo">Comentarios</label>
				        <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="c_glicemia_observacion" id="c_glicemia_observacion"></textarea>
				    </div>
				    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
				        <button type="button" class="btn btn-sm btn-block btn-primary" onclick="registro_c_glicemia();">Agregar</button>
				    </div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<h6 class="text-c-blue"> REGISTRO DE CONTROLES</h6>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<table id="reg-c-glic" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
						    <thead>
						        <tr>
						            <th>Fecha</th>
						            <th>Momento</th>
						            <th>Post-prandial</th>
						            <th>Pre-prandial</th>
						            <th>Nocturno</th>
						            <th>Comentarios</th>
						            <th>Eliminar</th>
						        </tr>
						    </thead>
						    <tbody>
						        {{--    --}}
						    </tbody>
						</table>
					</div>
                    <div class="col-12 mb-3">
                        <canvas id="grafico_glicemia_control" height="100"></canvas>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function ctrl_glicemia()
    {
        ver_registros_c_glicemia('reg-c-glic');
        $('#c_glicemia').modal('show');
    }

    function registro_c_glicemia()
    {

        let alimento = $('#c_glicemia_alimento').val();
        let postprandial = $('#c_glicemia_postprandial').val();
        let preprandial = $('#c_glicemia_preprandial').val();
        let noche = $('#c_glicemia_noche').val();
        let observacion = $('#c_glicemia_observacion').val();
        let _token = CSRF_TOKEN;

        let url = "{{ route('paciente.registro_c_glicemia') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                alimento : alimento,
                postprandial : postprandial,
                preprandial : preprandial,
                noche : noche,
                observacion : observacion,
            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Ingreso de Control de Glicemia.",
                        text: 'Control registrado con Exito.',
                        icon: "success",
                    });
                }
                else
                {
                    swal({
                        title: "Ingreso de Control de Glicemia.",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                    });
                }
            }
            else
            {
                swal({
                    title: "Ingreso de Control de Glicemia.",
                    text: 'Sin Retorno de Registro, Intente nuevamente.',
                    icon: "error",
                });
            }
            ver_registros_c_glicemia('reg-c-glic');

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function ver_registros_c_glicemia(tabla)
{
    $('#'+tabla+' tbody').html('');

    let url = "{{ route('paciente.ver_registros_c_glicemia') }}";
    $.ajax({
        url: url,
        type: "get",
        data: {},
    })
    .done(function(data) {
        console.log(data)

        // Arrays para el gráfico
        const fechas = [];
        const postprandial = [];
        const preprandial = [];
        const nocturno = [];

        if (data != null && data.estado == 1) {
            let alimento = ['', 'Desayuno', 'Almuerzo', 'Cena', 'Nocturno']
            $.each(data.registros, function (key, value) {
                fechas.push(value.fecha);
                postprandial.push(value.postprandial);
                preprandial.push(value.preprandial);
                nocturno.push(value.noche);

                var html = '';
                html += '<tr>';
                html += '    <td>'+value.fecha+'</td>';
                html += '    <td>'+alimento[value.alimento]+'</td>';
                html += '    <td>'+value.postprandial+'</td>';
                html += '    <td>'+value.preprandial+'</td>';
                if(value.noche != null) html += '    <td>'+value.noche+'</td>';
                else html += '    <td> </td>';
                if(value.observacion != null) html += '    <td>'+value.observacion+'</td>';
                else html += '    <td> </td>';
                html += '    <td> <button type=\"button\" class=\"btn btn-xs btn-block btn-danger\" onclick=\"eliminar_c_glicemia(\\''+value.id+'\\');\">Eliminar</button> </td>';
                html += '</tr>';
                $('#'+tabla+' tbody').append(html);
            });
        } else {
            var html = '';
            html += '<tr>';
            html += '    <td colspan=\"5\">Sin Registros</td>';
            html += '</tr>';
            $('#'+tabla+' tbody').html(html);
        }

        // Destruye el gráfico anterior si existe
        if (window.chartGlicemiaControl) {
            window.chartGlicemiaControl.destroy();
        }

        // Crea el gráfico solo si hay datos
        if (fechas.length > 0) {
            const ctx = document.getElementById('grafico_glicemia_control').getContext('2d');
            window.chartGlicemiaControl = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: fechas,
                    datasets: [
                        {
                            label: 'Post-prandial',
                            data: postprandial,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Pre-prandial',
                            data: preprandial,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Nocturno',
                            data: nocturno,
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
                        title: { display: true, text: 'Historial de Glicemia' }
                    }
                }
            });
        }
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });
}

    function eliminar_c_glicemia(id)
    {
        let url = "{{ route('paciente.eliminar_registro_c_glicemia') }}";
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
                        title: "Eliminar de Control de Glicemia.",
                        text: 'Control eliminado con Exito.',
                        icon: "success",
                    });
                    ver_registros_c_glicemia('reg-c-glic');
                }
                else
                {
                    swal({
                        title: "Eliminar de Control de Glicemia.",
                        text: 'Control No eliminado.',
                        icon: "danger",
                    });
                }
            }
            else
            {
                swal({
                    title: "Eliminar de Control de Glicemia.",
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
