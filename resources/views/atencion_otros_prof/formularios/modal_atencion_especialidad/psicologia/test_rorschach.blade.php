<div id="test_rorsch" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="test_rorsch" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Test de Rorschach</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
					<div class="row">
					    <div class="col-md-12">
					        <ul class="nav nav-tabs-aten nav-fill mb-3" id="tablas_examenes" role="tablist">
					            <li class="nav-item">
					                <a class="nav-link-aten active" id="uno_tab" data-toggle="pill" href="#uno" role="tab" aria-controls="uno" aria-selected="true">LAM-1</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-aten" id="dos_tab" data-toggle="pill" href="#dos" role="tab" aria-controls="pills-home" aria-selected="true">LAM-2</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-aten" id="tres_tab" data-toggle="pill" href="#tres" role="tab" aria-controls="pills-home" aria-selected="true">LAM-3</a>
					            </li>
								 <li class="nav-item">
					                <a class="nav-link-aten" id="cuatro_tab" data-toggle="pill" href="#cuatro" role="tab" aria-controls="pills-home" aria-selected="true">LAM-4</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-aten" id="cinco_tab" data-toggle="pill" href="#cinco" role="tab" aria-controls="pills-home" aria-selected="true">LAM-5</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-aten" id="seis_tab" data-toggle="pill" href="#seis" role="tab" aria-controls="pills-home" aria-selected="true">LAM-6</a>
					            </li>
								 <li class="nav-item">
					                <a class="nav-link-aten" id="siete_tab" data-toggle="pill" href="#siete" role="tab" aria-controls="pills-home" aria-selected="true">LAM-7</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-aten" id="ocho_tab" data-toggle="pill" href="#ocho" role="tab" aria-controls="pills-home" aria-selected="true">LAM-8</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-aten" id="nueve_tab" data-toggle="pill" href="#nueve" role="tab" aria-controls="pills-home" aria-selected="true">LAM-9</a>
					            </li>
								<li class="nav-item">
					                <a class="nav-link-aten" id="diez_tab" data-toggle="pill" href="#diez" role="tab" aria-controls="pills-home" aria-selected="true">LAM-10</a>
					            </li>
                                <li class="nav-item">
					                <a class="nav-link-aten" id="c_gen_tab" data-toggle="pill" href="#c_gen" role="tab" aria-controls="pills-home" aria-selected="true">Comentarios</a>
					            </li>
					        </ul>
					    </div>
					</div>
					<div class="row">
					    <div class="col-md-12">
					        <div class="tab-content" id="pills-tablas_examenes">
					        	<!--TAB 1-->
					            <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="uno_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_1.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_uno_resp">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_uno_resp" id="lam_uno_resp">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_uno_com">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_uno_com" id="lam_uno_com"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
					            <!--TAB 2-->
					            <div class="tab-pane fade show" id="dos" role="tabpanel" aria-labelledby="dos_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_2.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_dos_resp">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_dos_psi_resp_ro" id="lam_dos_resp">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_dos_com">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_dos_psi_coment_ro" id="lam_dos_com"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
					            <!--TAB 3-->
					            <div class="tab-pane fade show" id="tres" role="tabpanel" aria-labelledby="tres_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_3.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_tres_resp">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_tres_resp" id="lam_tres_resp">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_tres_com">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_tres_com" id="lam_tres_com"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 4-->
					            <div class="tab-pane fade show" id="cuatro" role="tabpanel" aria-labelledby="cuatro_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_4.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_cuatro_resp">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_cuatro_resp" id="lam_cuatro_resp">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_cuatro_com">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_cuatro_com" id="lam_cuatro_com"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 5-->
					            <div class="tab-pane fade show" id="cinco" role="tabpanel" aria-labelledby="cinco_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_5.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_cinco_resp">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_cinco_resp" id="lam_cinco_resp">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_cinco_com">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_cinco_com" id="lam_cinco_com"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 6-->
					            <div class="tab-pane fade show" id="seis" role="tabpanel" aria-labelledby="seis_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_6.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_seis_resp">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_seis_resp" id="lam_seis_resp">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_seis_com">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_seis_com" id="lam_seis_com"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 7-->
					            <div class="tab-pane fade show" id="siete" role="tabpanel" aria-labelledby="siete_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_7.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_siete_resp">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_siete_resp" id="lam_siete_resp">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_siete_com">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_siete_com" id="lam_siete_com"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 8-->
					            <div class="tab-pane fade show" id="ocho" role="tabpanel" aria-labelledby="ocho_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_8.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_ocho_resp">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_ocho_resp" id="lam_ocho_resp">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_ocho_com">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_ocho_com" id="lam_ocho_com"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 9-->
					            <div class="tab-pane fade show" id="nueve" role="tabpanel" aria-labelledby="nueve_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_9.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_nueve_resp">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_nueve_resp" id="lam_nueve_resp">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="lam_nueve_com">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_nueve_com" id="lam_nueve_com"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 10-->
					            <div class="tab-pane fade show" id="diez" role="tabpanel" aria-labelledby="diez_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_10.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm"for="lam_diez_resp">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_diez_resp" id="lam_diez_resp">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm"for="lam_diez_com">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_diez_com" id="lam_diez_com"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
                                <!--TAB 10-->
					            <div class="tab-pane fade show" id="c_gen" role="tabpanel" aria-labelledby="c_gen_tab">
									<div class="form-row">
                                        <div class="col-sm-12 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm" for="comentarios_gen" >Comentarios Generales del test</label>
                                            <textarea class="form-control form-control-sm" rows="10" onfocus="this.rows=10" onblur="this.rows=10;" name="comentarios_gen" id="comentarios_gen"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
					        </div>
					    </div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="button" class="btn btn-info btn-sm" onclick="registrar_psi_rorsc();"><i class="feather icon-save"></i> Guardar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function psi_rorsch() {
        $('#test_rorsch').modal('show');
    }

    function registrar_psi_rorsc()
    {
        var mensaje = '';
        var valido = 1;

        let id_ficha_otros_prof = $('#id_fc').val();
        let id_profesional = $('#profesion_sq').val();
        let id_especialidad = '{{ $profesional->id_especialidad }}';
        let id_tipo_especialidad = '{{ $profesional->id_tipo_especialidad }}';
        let id_paciente = $('#id_paciente_fc').val();

        var lam_uno_resp = $('#lam_uno_resp').val();
        var lam_uno_com = $('#lam_uno_com').val();
        var lam_dos_resp = $('#lam_dos_resp').val();
        var lam_dos_com = $('#lam_dos_com').val();
        var lam_tres_resp = $('#lam_tres_resp').val();
        var lam_tres_com = $('#lam_tres_com').val();
        var lam_cuatro_resp = $('#lam_cuatro_resp').val();
        var lam_cuatro_com = $('#lam_cuatro_com').val();
        var lam_cinco_resp = $('#lam_cinco_resp').val();
        var lam_cinco_com = $('#lam_cinco_com').val();
        var lam_seis_resp = $('#lam_seis_resp').val();
        var lam_seis_com = $('#lam_seis_com').val();
        var lam_siete_resp = $('#lam_siete_resp').val();
        var lam_siete_com = $('#lam_siete_com').val();
        var lam_ocho_resp = $('#lam_ocho_resp').val();
        var lam_ocho_com = $('#lam_ocho_com').val();
        var lam_nueve_resp = $('#lam_nueve_resp').val();
        var lam_nueve_com = $('#lam_nueve_com').val();
        var lam_diez_resp = $('#lam_diez_resp').val();
        var lam_diez_com = $('#lam_diez_com').val();
        var comentarios_gen = $('#comentarios_gen').val();

        let url = "{{ route('ficha.otro.prof.test_rorshchach.registro') }}";

        // if(profesion == '') {
        //     mensaje += 'Debe ingresar Profesión\n';
        //     valido = 0;
        // }

        var token = CSRF_TOKEN;

        if(valido == 1)
        {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token:token,
                    id_ficha_atencion:id_ficha_otros_prof,
                    id_profesional:id_profesional,
                    id_especialidad:id_especialidad,
                    id_tipo_especialidad:id_tipo_especialidad,
                    id_paciente:id_paciente,
                    lam_uno_resp:lam_uno_resp,
                    lam_uno_com:lam_uno_com,
                    lam_dos_resp:lam_dos_resp,
                    lam_dos_com:lam_dos_com,
                    lam_tres_resp:lam_tres_resp,
                    lam_tres_com:lam_tres_com,
                    lam_cuatro_resp:lam_cuatro_resp,
                    lam_cuatro_com:lam_cuatro_com,
                    lam_cinco_resp:lam_cinco_resp,
                    lam_cinco_com:lam_cinco_com,
                    lam_seis_resp:lam_seis_resp,
                    lam_seis_com:lam_seis_com,
                    lam_siete_resp:lam_siete_resp,
                    lam_siete_com:lam_siete_com,
                    lam_ocho_resp:lam_ocho_resp,
                    lam_ocho_com:lam_ocho_com,
                    lam_nueve_resp:lam_nueve_resp,
                    lam_nueve_com:lam_nueve_com,
                    lam_diez_resp:lam_diez_resp,
                    lam_diez_com:lam_diez_com,
                    comentarios_gen:comentarios_gen,
                },
            })
            .done(function(response) {
                if (response.estado == 1) {
                    swal({
                        title: "Test de Rorschachdd" ,
                        text: "Registro exitoso",
                        icon: "success",
                    })
                    $('#test_rorsch').modal('hide');
                }
                else
                {
                    swal({
                        title: "Test de Rorschachdd" ,
                        text: "Falla en registro",
                        icon: "error",
                    });
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);

            });

        }
        else
        {
            swal({
                title: "Test de Rorschachdd, campos requeridos" ,
                text: mensaje,
                icon: "error",
            })
        }
    }
</script>
