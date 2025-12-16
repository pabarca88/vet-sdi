<div id="c_peso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_peso" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Control Peso</h5>
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

				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Peso inicial</label>
				        <input type="text" class="form-control form-control-sm" name="c_peso_inicial" id="c_peso_inicial"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Peso actual</label>
				        <input type="text" class="form-control form-control-sm" name="c_peso_actual" id="c_peso_actual"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Estatura</label>
				        <input type="text" class="form-control form-control-sm" name="c_peso_estatura" id="c_peso_estatura"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <button class="btn btn-sm btn-block btn-primary" onclick="imc_c_peso();">Calcular</button>
				    </div>
				     <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">IMC</label>
				        <input type="text" class="form-control form-control-sm" name="c_peso_imc" id="c_peso_imc"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Variación</label>
				        <input type="text" class="form-control form-control-sm" name="c_peso_variacion" id="c_peso_variacion"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Peso ideal</label>
				        <input type="text" class="form-control form-control-sm" name="c_peso_ideal" id="c_peso_ideal"></input>
				    </div>

				    <div class="form-group col-sm-12 col-md-6">
                        <button type="button" class="btn btn-sm btn-block btn-success" onclick="registro_c_peso();">Agregar</button>
				    </div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<h6 class="text-c-blue"> REGISTRO DE CONTROLES</h6>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<table id="reg-c-peso" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
						    <thead>
						        <tr>
						            <th>Fecha</th>
						            <th>Peso<br> inicial</th>
						            <th>Peso<br> actual</th>
						            <th>Estatura</th>
						            <th>IMC</th>
                                    <th>Variación</th>
						            <th>Peso ideal</th>
                                    <th>Eliminar</th>
						        </tr>
						    </thead>
						    <tbody>
						        {{--   --}}
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function ctrl_peso()
    {
        ver_registros_c_peso('reg-c-peso');
        $('#c_peso').modal('show');
    }


    function registro_c_peso()
    {

        let inicial = $('#c_peso_inicial').val();
        let actual = $('#c_peso_actual').val();
        let estatura = $('#c_peso_estatura').val();
        let imc = $('#c_peso_imc').val();
        let variacion = $('#c_peso_variacion').val();
        let ideal = $('#c_peso_ideal').val();
        let _token = CSRF_TOKEN;

        let url = "{{ route('paciente.registro_c_peso') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                inicial : inicial,
                actual : actual,
                estatura : estatura,
                imc : imc,
                variacion : variacion,
                ideal : ideal,
            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Ingreso de Control de Peso.",
                        text: 'Control registrado con Exito.',
                        icon: "success",
                    });
                }
                else
                {
                    swal({
                        title: "Ingreso de Control de Peso.",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                    });
                }
            }
            else
            {
                swal({
                    title: "Ingreso de Control de Peso.",
                    text: 'Sin Retorno de Registro, Intente nuevamente.',
                    icon: "error",
                });
            }
            ver_registros_c_peso('reg-c-peso');

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function ver_registros_c_peso(tabla)
    {
        $('#'+tabla+' tbody').html('');

        let url = "{{ route('paciente.ver_registros_c_peso') }}";
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
                        html += '    <td>'+value.inicial+'</td>';
                        html += '    <td>'+value.actual+'</td>';
                        html += '    <td>'+value.estatura+'</td>';
                        if(value.imc != null) html += '    <td>'+value.imc+'</td>';
                        else html += '    <td> </td>';
                        if(value.variacion != null) html += '    <td>'+value.variacion+'</td>';
                        else html += '    <td> </td>';
                        html += '    <td>'+value.ideal+'</td>';
                        html += '    <td> <button type="button" class="btn btn-xs btn-block btn-danger" onclick="eliminar_c_peso(\''+value.id+'\');">Eliminar</button> </td>';
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

    function eliminar_c_peso(id)
    {
        let url = "{{ route('paciente.eliminar_registro_c_peso') }}";
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
                        title: "Eliminar Control de Peso.",
                        text: 'Control eliminado con Exito.',
                        icon: "success",
                    });
                    ver_registros_c_peso('reg-c-peso');
                }
                else
                {
                    swal({
                        title: "Eliminar  Control de Peso.",
                        text: 'Control No eliminado.',
                        icon: "danger",
                    });
                }
            }
            else
            {
                swal({
                    title: "Eliminar  Control de Peso.",
                    text: 'Control No eliminado.',
                    icon: "danger",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }



    function imc_c_peso()
    {
        var peso = $('#c_peso_actual').val();
        var altura = $('#c_peso_estatura').val();
        var valido = 1;
        var mensaje = '';
        if(peso == 0 || peso == '')
        {
            mensaje += 'Campo Peso Requerido\n';
            valido = 0;
        }
        if(altura == 0 || altura == '')
        {
            mensaje += 'Campo Altura Requerido\n';
            valido = 0;
        }

        if(valido == 1)
        {
            var alturaMetro = altura/100;
            var imc = Math.round(peso / (alturaMetro + alturaMetro));
            var leyenda = '';

            if (imc <= 21)
            {
                {{--  leyenda = "Está delgado. Debe engordar " + Math.round(alturaMetro * alturaMetro * 20.5 - peso) + " kilos";  --}}
            }
            else if(imc >= 26)
            {
                {{--  leyenda = "Tiene sobrepeso. Debe adelgazar " + Math.round(peso - alturaMetro * alturaMetro * 25.5) + " kilos";  --}}
            }
            else
            {
                {{--  leyenda = "Esta en  peso ideal";  --}}
            }
            $('#c_peso_imc').val(imc);
        }
        else
        {
            swal({
                title: "Calculo de IMC",
                text: mensaje,
                icon: "warning",
            });
        }

    }
</script>
