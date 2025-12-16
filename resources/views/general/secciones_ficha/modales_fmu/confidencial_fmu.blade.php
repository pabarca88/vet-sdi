<div id="confidencial_fmu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confidencial_fmu" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-light">
				<h5 class="modal-title text-c-blue mt-1">Información Confidencial</h5>
				<button type="button" class="btn btn-primary btn-icon" data-dismiss="modal" aria-label="Close" onclick="confidencia_fmu_cancelar();"><span aria-hidden="true">×</span></button>
                <input type="hidden" id="confidencial_fmu_id_paciente" value="{{ $paciente->id }}">
			</div>
			<div class="modal-body">
                <div class="row mr-0 ml-0">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-info" id="modal_confidencial_fmu_btn_solicitar" onclick="solicitar_autorizacion_confidencial();">Solicitar permiso para visualizar</button>
                    </div>

                    <!--<div class="col-md-6 text-center">
                        <button class="btn btn-danger" id="modal_confidencial_fmu_btn_cancelar" onclick="confidencia_fmu_cancelar();">Cancelar</button>
                    </div>-->
                </div>
			</div>
		</div>
	</div>
</div>
<script>
    function confidencial_fmu()
    {
        $('#confidencial_fmu').find('.modal-body').html('');
        var html = '';
        html += '<div class="row mr-0 ml-0">';
        html += '    <div class="col-md-12 text-center">';
        html += '        <button class="btn btn-info btn-lg" id="modal_confidencial_fmu_btn_solicitar" onclick="solicitar_autorizacion_confidencial();">Solicitar permiso para visualizar</button>';
        html += '    </div>';
        html += '    ';
  

        html += '</div>';
        $('#confidencial_fmu').find('.modal-body').html(html);

        $('#confidencial_fmu').modal('show');
    }


    function confidencia_fmu_cancelar()
    {
        $('#confidencial_fmu').find('.modal-body').html('');
        var html = '';
        html += '<div class="row mr-0 ml-0">';
        html += '    <div class="col-md-12 text-center">';
        html += '        <button class="btn btn-info btn-lg" id="modal_confidencial_fmu_btn_solicitar" onclick="solicitar_autorizacion_confidencial();">Solicitar permiso para visualizar</button>';
        html += '    </div>';
        html += '    ';
        html += '</div>';
        $('#confidencial_fmu').find('.modal-body').html(html);
        $('#confidencial_fmu').modal('hide');
    }

    function solicitar_autorizacion_confidencial()
    {
        $('#modal_confidencial_fmu_btn_solicitar').attr('disabled', true);
        $('#modal_confidencial_fmu_btn_cancelar').attr('disabled', true);

        var url = "{{ route('solicitud.aprobacion.fmu.confidencial') }}";
        var id_paciente = $('#confidencial_fmu_id_paciente').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();

        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_lugar_atencion : id_lugar_atencion,
            },
            success:function(data){
                if (data !== 'null')
                {
                    console.log(data);
                    if(data.estado == 1)
                    {
                        // $('#modal_autorizacion_fmu_imagen').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                        // $('#modal_autorizacion_fmu_mensaje').html('<h3>En espera de Aprobación</h3>');

                        var html = '';
                        html += '<div class="row mr-0 ml-0">';
                        html += '    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">';
                        html += '<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">';
                        html += '<h4>En espera de aprobación</h4>';
                        html += '    </div>';
                        html += '    </div>';

                        $('#confidencial_fmu').find('.modal-body').html('');
                        $('#confidencial_fmu').find('.modal-body').html(html);

                        validar_autorizacion_fmu_confidencial(data.log_users_devices.token);
                    }
                    else
                    {
                        // $('#modal_autorizacion_fmu_imagen').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                        // $('#modal_autorizacion_fmu_mensaje').html('<h3>Problema al solicitar Aprobación.</h3>');

                        var html = '';
                        html += '<div class="row mr-0 ml-0">';
                        html += '    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">';
                        html += '<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">';
                        html += '<h4>Problema al solicitar aprobación.</h4>';
                        html += '    </div>';
                        html += '    </div>';

                        $('#confidencial_fmu').find('.modal-body').html('');
                        $('#confidencial_fmu').find('.modal-body').html(html);

                        setTimeout(function () {
                            $('#confidencial_fmu').find('.modal-body').html('');
                            var html = '';
                            html += '<div class="row mr-0 ml-0">';
                            html += '    <div class="col-md-6 text-center">';
                            html += '        <button class="btn btn-info btn-lg" id="modal_confidencial_fmu_btn_solicitar" onclick="solicitar_autorizacion_confidencial();">Solicitar permiso para visualizar</button>';
                            html += '    </div>';
                            html += '    ';

                            html += '</div>';
                            $('#confidencial_fmu').find('.modal-body').html(html);
                        }, 5000);
                    }
                }
                else
                {
                    console.log('error');
                    console.log(data);
                }
            }
        });
    }

    function validar_autorizacion_fmu_confidencial(token)
    {
        let url = "{{ route('validar.aprobacion.fmu.confidencial') }}";
        $.ajax({
            url: url,
            type: "GET",
            data: {
                token : token,
            },
            success:function(data){

                var html = '';
                html += '<h3>'+data.msj+'</h3>';

                $('#confidencial_fmu').find('.modal-body').html('');
                $('#confidencial_fmu').find('.modal-body').html(html);

                if(data.estado == 0)
                {
                    setTimeout(function(){
                        validar_autorizacion_fmu_confidencial(token);
                    }, 2000);
                    var html = '';
                    html += '<div class="row mr-0 ml-0">';
                    html += '    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">';
                    html += '<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">';
                    html += '<h4>En espera de aprobación</h4>';
                    html += '    </div>';
                    html += '    </div>';

                    $('#confidencial_fmu').find('.modal-body').html('');
                    $('#confidencial_fmu').find('.modal-body').html(html);
                    fmu_autorizacion_token = '';
                    fmu_autorizacion_estado = '';

                }
                else if(data.estado == 1)
                {
                    var html = '';
                    html += '<img class="img-fluid w-50" src="{{ asset('images/iconos/aprobacion.svg') }}" alt="Aprobado">';
                    html += '<h3>Cargando registros</h3>';

                    $('#confidencial_fmu').find('.modal-body').html('');
                    $('#confidencial_fmu').find('.modal-body').html(html);

                    fmu_autorizacion_token = data.fmu_autorizacion_token;
                    fmu_autorizacion_estado = data.fmu_autorizacion_estado;

                    buscar_registros_conf();

                }
                else if(data.estado == 2)
                {
                    $('#modal_autorizacion_fmu_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Rechazado">');

                    $('.btn-agenda-autorizacion-fmu').addClass('btn-danger');
                    $('.btn-agenda-autorizacion-fmu').removeClass('btn-info');

                    setTimeout(function(){
                        $('#modal_autorizacion_fmu').modal('hide');
                    }, 3000);

                    $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                    fmu_autorizacion_token = '';
                    fmu_autorizacion_estado = '';

                }
                else if(data.estado == 3)
                {
                    $('#modal_autorizacion_fmu_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Cancelado">');

                    $('.btn-agenda-autorizacion-fmu').addClass('btn-danger');
                    $('.btn-agenda-autorizacion-fmu').removeClass('btn-info');

                    setTimeout(function(){
                        $('#modal_autorizacion_fmu').modal('hide');
                    }, 3000);

                    $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                    fmu_autorizacion_token = '';
                    fmu_autorizacion_estado = '';

                }
                else if(data.estado == 4)
                {
                    $('#modal_autorizacion_fmu_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Aprobado Expirado">');

                    $('.btn-agenda-autorizacion-fmu').addClass('btn-danger');
                    $('.btn-agenda-autorizacion-fmu').removeClass('btn-info');

                    setTimeout(function(){
                        $('#modal_autorizacion_fmu').modal('hide');
                    }, 3000);

                    $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                    fmu_autorizacion_token = '';
                    fmu_autorizacion_estado = '';

                }
                else
                {
                    setTimeout(function(){
                        validar_autorizacion_fmu(token);
                    }, 3000);

                    $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                    fmu_autorizacion_token = '';
                    fmu_autorizacion_estado = '';

                }
            }
        });
    }

    function buscar_registros_conf()
    {
        var id_paciente = $('#confidencial_fmu_id_paciente').val();

        let url = "{{ route('paciente.consultas.confidenciales') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                id_paciente : id_paciente
            },
            success:function(data){

                var html = '';


                html += '<table id="table_confidencial" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">';
                html += '    <thead>';
                html += '        <tr>';
                html += '            <th>FECHA</th>';
                html += '            <th>PROFESIONAL</th>';
                html += '            <th>DIAGNOSTICO</th>';
                html += '        </tr>';
                html += '    </thead>';
                html += '    <tbody>';
                $.each(data.registros, function (key, val) {
                    html += '                <tr>';
                    html += '                    <td>'+val.created_at+'</td>';
                    html += '                    <td>Dr. '+val.profesional.apellido_uno+'</td>';
                    html += '                    <td>'+val.hipotesis_diagnostico+'</td>';
                    html += '                </tr>';
                });

                html += '    </tbody>';
                html += '</table>';

                $('#confidencial_fmu').find('.modal-body').html('');
                $('#confidencial_fmu').find('.modal-body').html(html);

                $('#table_confidencial').DataTable({
                        responsive: true,
                        "columnDefs": [
                            { "type": "date", "targets": 0 }
                        ]
                });

            }
        });
    }
</script>
