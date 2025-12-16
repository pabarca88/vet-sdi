<div id="m_lic_autor_compin" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_lic_autor_compin" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Solicita autorización a Compin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="#">Empleadores informados</h6>
                    </div>
                </div>

                <div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p>Estimado paciente.<strong style="text-transform:uppercase"> {{ $paciente->rut }}  </strong>.</p>
                        <p>S.D.I Le solicita a usted: Confirmar mediante su aplicación la autorización a COMPIN ,para notificar por email,app o celular, la resolución dela licencia y acceder a sus datos previsionales de acuerdo al articulo 10 de la ley 19.628 de la república de Chile.</p>
                    </div>
                </div>

                <div class="row">
					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="m_lic_autor_compin_imagen">
					</div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="m_lic_autor_compin_mensaje">
					</div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button class="btn btn-danger btn-sm btn-block" id="btn_m_lic_autor_compin_cancel" onclick="cancelar_autorizacion_paciente_licencia();">Cancelar</a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        {{-- @php
                            $url_temp_2 = ('Profesional/Paciente/Ficha_consulta?_token='.request('_token').'&id_hora_realizar='.request('id_hora_realizar').'&lugar_atencion_id='.request('lugar_atencion_id').'');
                            $ruta = ROUTE('check_sdi', ['id_recept' => $paciente->id_usuario,'urla'=> $url_temp_2.'&lic='.request('lic').'&compin=0','urln' => $url_temp_2.'&lic='.request('lic').'&compin=1&tab=licencia-tab', 'id_tipo' => 11]);
                        @endphp
                        <a href="{{ $ruta }}" class="btn btn-info btn-sm btn-block">Solicitar</a> --}}

                        <button class="btn btn-success btn-sm btn-block" id="btn_m_lic_autor_compin_solicitar" onclick="solicitar_autorizacion_paciente_licencia();">Solicitar</a>

                    </div>
                </div>

            </div>
		</div>
	</div>
</div>

<script>

    /** seccion paciente licencia */
    var lic_pac_token = '{{  session('lic_pac_token') }}';
    var lic_pac_estado = '{{  session('lic_pac_estado') }}';

    function solicitar_autorizacion_paciente_licencia()
    {
        $('#btn_m_lic_autor_compin_solicitar').attr('disabled', true);
        $('#btn_m_lic_autor_compin_cancel').attr('disabled', true);

        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_paciente = $('#id_paciente_fc').val();
        let url = "{{ route('profesional.paciente.licencia.solicitar') }}";
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_lugar_atencion : id_lugar_atencion,
                id_paciente : id_paciente
            },
            success:function(data){
                if (data !== 'null')
                {
                    console.log(data);
                    if(data.estado == 1)
                    {
                        $('#m_lic_autor_compin_imagen').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                        $('#m_lic_autor_compin_mensaje').html('<h3>En espera de Aprobación</h3>');

                        validar_autorizacion_paciente_licencia(data.log_users_devices.token);
                    }
                    else
                    {
                        $('#m_lic_autor_compin_imagen').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                        $('#m_lic_autor_compin_mensaje').html('<h3>Problema al solicitar Aprobación.</h3>');
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

    function validar_autorizacion_paciente_licencia(token)
    {
        let url = "{{ route('profesional.paciente.licencia.validar') }}";
        $.ajax({
            url: url,
            type: "GET",
            data: {
                token : token,
            },
            success:function(data){

                $('#m_lic_autor_compin_mensaje').html('<h3>'+data.msj+'</h3>');

                if(data.estado == 0)
                {
                    setTimeout(function(){
                        validar_autorizacion_paciente_licencia(token);
                    }, 2000);

                    lic_pac_token = '';
                    lic_pac_estado = '';
                    if($("#descripcion_hipotesis"))
                    {
                        $("#descripcion_hipotesis").trigger("keyup");
                    }
                }
                else if(data.estado == 1)
                {
                    $('#m_lic_autor_compin_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/aprobacion.svg') }}" alt="Aprobado">');

                    $('#btn_m_lic_autor_compin_solicitar').attr('disabled', true);
                    $('#btn_m_lic_autor_compin_cancel').attr('disabled', false);


                    $('#btn_lic_auto_compim').removeClass('btn-success-light');
                    $('#btn_lic_auto_compim').addClass('btn-primary-light');
                    $('#btn_lic_auto_compim').attr('onclick', '');
                    $('#btn_lic_auto_compim').html('Autorizado');
                    $('#div_cuerpo_lic').show();

                    setTimeout(function(){
                        $('#m_lic_autor_compin').modal('hide');
                    }, 3000);


                    lic_pac_token = data.lic_pac_token;
                    lic_pac_estado = data.lic_pac_estado;
                    if($("#descripcion_hipotesis"))
                    {
                        $("#descripcion_hipotesis").trigger("keyup");
                    }
                }
                else if(data.estado == 2)
                {
                    $('#m_lic_autor_compin_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Rechazado">');

                    $('#btn_lic_auto_compim').addClass('btn-success-light');
                    $('#btn_lic_auto_compim').removeClass('btn-primary-light');
                    $('#btn_lic_auto_compim').attr('onclick', 'l_autoriz_compin();');
                    $('#btn_lic_auto_compim').html('Solicitar autorización');
                    $('#div_cuerpo_lic').hide();

                    setTimeout(function(){
                        $('#m_lic_autor_compin').modal('hide');
                    }, 3000);

                    lic_pac_token = '';
                    lic_pac_estado = '';
                    if($("#descripcion_hipotesis"))
                    {
                        $("#descripcion_hipotesis").trigger("keyup");
                    }
                }
                else if(data.estado == 3)
                {
                    $('#m_lic_autor_compin_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Cancelado">');

                    $('#btn_lic_auto_compim').addClass('btn-success-light');
                    $('#btn_lic_auto_compim').removeClass('btn-primary-light');
                    $('#btn_lic_auto_compim').attr('onclick', 'l_autoriz_compin();');
                    $('#btn_lic_auto_compim').html('Solicitar autorización');
                    $('#div_cuerpo_lic').hide();

                    setTimeout(function(){
                        $('#m_lic_autor_compin').modal('hide');
                    }, 3000);

                    lic_pac_token = '';
                    lic_pac_estado = '';
                    if($("#descripcion_hipotesis"))
                    {
                        $("#descripcion_hipotesis").trigger("keyup");
                    }
                }
                else if(data.estado == 4)
                {
                    $('#m_lic_autor_compin_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Aprobado Expirado">');

                    $('#btn_lic_auto_compim').addClass('btn-success-light');
                    $('#btn_lic_auto_compim').removeClass('btn-primary-light');
                    $('#btn_lic_auto_compim').attr('onclick', 'l_autoriz_compin();');
                    $('#btn_lic_auto_compim').html('Solicitar autorización');
                    $('#div_cuerpo_lic').hide();

                    setTimeout(function(){
                        $('#m_lic_autor_compin').modal('hide');
                    }, 3000);

                    lic_pac_token = '';
                    lic_pac_estado = '';
                    if($("#descripcion_hipotesis"))
                    {
                        $("#descripcion_hipotesis").trigger("keyup");
                    }
                }
                else
                {
                    setTimeout(function(){
                        validar_autorizacion_paciente_licencia(token);
                    }, 3000);

                    lic_pac_token = '';
                    lic_pac_estado = '';
                    if($("#descripcion_hipotesis"))
                    {
                        $("#descripcion_hipotesis").trigger("keyup");
                    }
                }
            }
        });
    }
</script>
