<div id="test_otros" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="test_otros" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Otros test practicados</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
    			<div class="form-row">
    			    <div class="col-md-12">
    			        <ul class="nav nav-tabs-aten nav-fill mb-3" id="tablas_examenes" role="tablist">
    			            <li class="nav-item">
    			                <a class="nav-link-aten active" id="test_uno_tab" data-toggle="pill" href="#test_uno" role="tab" aria-controls="test_uno" aria-selected="true">Test</a>
    			            </li>
    			            {{-- <li class="nav-item">
    			                <a class="nav-link-aten" id="test_dos_tab" data-toggle="pill" href="#test_dos" role="tab" aria-controls="test_dos" aria-selected="true">Test Dos</a>
    			            </li>
    			            <li class="nav-item">
    			                <a class="nav-link-aten" id="test_tres_tab" data-toggle="pill" href="#test_tres" role="tab" aria-controls="test_tres" aria-selected="true">Test Tres</a>
    			            </li>
    						<li class="nav-item">
    			                <a class="nav-link-aten" id="test_cuatro_tab" data-toggle="pill" href="#test_cuatro" role="tab" aria-controls="test_cuatro" aria-selected="true">Test Cuatro</a>
    			            </li>
                            <li class="nav-item">
    			                <a class="nav-link-aten" id="test_cinco_tab" data-toggle="pill" href="#test_cinco" role="tab" aria-controls="test_cinco" aria-selected="true">Test Cuatro</a>
    			            </li> --}}
                            <li class="nav-item">
    			                <a class="nav-link-aten" id="c-gen-tab" data-toggle="pill" href="#c-gen" role="tab" aria-controls="c-gen" aria-selected="true">Comentarios generales</a>
    			            </li>
    			        </ul>
    			    </div>
    			</div>
    			<div class="form-row">
    			    <div class="col-md-12">
    			        <div class="tab-content" id="pills-tablas_examenes">
    			        	<!--TAB 1-->
    			            <div class="tab-pane fade show active" id="test_uno" role="tabpanel" aria-labelledby="test_uno_tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="nomb_test_uno">Nombre Del Test</label>
                                        <input type="text" class="form-control form-control-sm" name="nomb_test_uno" id="nomb_test_uno">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="test_uno_resp">Respuesta</label>
                                        <input type="text" class="form-control form-control-sm" name="test_uno_resp" id="test_uno_resp">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm" for="test_uno_com">Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="test_uno_com" id="test_uno_com"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="test_uno_ind">Indicaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="test_uno_ind" id="test_uno_ind"></textarea>
                                    </div>
                                </div>
    			            </div>
    			            {{-- <!--TAB 2-->
    			            <div class="tab-pane fade show" id="test_dos" role="tabpanel" aria-labelledby="test_dos_tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="nomb_test_dos">Nombre Del Test</label>
                                        <input type="text" class="form-control form-control-sm" name="nomb_test_dos" id="nomb_test_dos">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="test_dos_resp">Respuesta</label>
                                        <input type="text" class="form-control form-control-sm" name="test_dos_resp" id="test_dos_resp">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm" for="test_dos_com">Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="test_dos_com" id="test_dos_com"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label  class="floating-label-activo-sm" for="test_dos_ind">Indicaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="test_dos_ind" id="test_dos_ind"></textarea>
                                    </div>
                                </div>
    			            </div>
    			            <!--TAB 3-->
    			            <div class="tab-pane fade show" id="test_tres" role="tabpanel" aria-labelledby="test_tres_tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="nomb_test_tres">Nombre Del Test</label>
                                        <input type="text" class="form-control form-control-sm" name="nomb_test_tres" id="nomb_test_tres">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label  class="floating-label-activo-sm" for="test_tres_resp">Respuesta</label>
                                        <input type="text" class="form-control form-control-sm" name="test_tres_resp" id="test_tres_resp">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm" for="test_tres_com">Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="test_tres_com" id="test_tres_com"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="test_tres_ind">Indicaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="test_tres_ind" id="test_tres_ind"></textarea>
                                    </div>
                                </div>
    			            </div>
    						<!--TAB 4-->
                            <div class="tab-pane fade show" id="test_cuatro" role="tabpanel" aria-labelledby="test_cuatro_tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="nomb_test_cuatro">Nombre Del Test</label>
                                        <input type="text" class="form-control form-control-sm" name="nomb_test_cuatro" id="nomb_test_cuatro">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="test_cuatro_resp">Respuesta</label>
                                        <input type="text" class="form-control form-control-sm" name="test_cuatro_resp" id="test_cuatro_resp">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm" for="test_cuatro_com">Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="test_cuatro_com" id="test_cuatro_com"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="test_cuatro_ind">Indicaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="test_cuatro_ind" id="test_cuatro_ind"></textarea>
                                    </div>
                                </div>
    			            </div>
    						<!--TAB 5-->
    			            <div class="tab-pane fade show" id="test_cinco" role="tabpanel" aria-labelledby="test_cinco_tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="nomb_test_cinco">Nombre Del Test</label>
                                        <input type="text" class="form-control form-control-sm" name="nomb_test_cinco" id="nomb_test_cinco">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="test_cinco_resp">Respuesta</label>
                                        <input type="text" class="form-control form-control-sm" name="test_cinco_resp" id="test_cinco_resp">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm" for="test_cinco_com">Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="test_cinco_com" id="test_cinco_com"></textarea>
                                    </div>
                                    <br>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="test_cinco_ind">Indicaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="test_cinco_ind" id="test_cinco_ind"></textarea>
                                    </div>
                                </div>
    			            </div> --}}
                            <!--TAB 10-->
    			            <div class="tab-pane fade show" id="c-gen" role="tabpanel" aria-labelledby="c-gen-tab">
    							<div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="comentarios_gen">Comentarios generales del test</label>
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
                <button type="button" class="btn btn-info btn-sm" onclick="registrar_psi_ot_test();"><i class="feather icon-save"></i> Guardar</button>
            </div>
		</div>
	</div>
</div>
<script>
    function psi_ot_test() {
        $('#test_otros').modal('show');
    }

    function registrar_psi_ot_test()
    {
        var mensaje = '';
        var valido = 1;

        let id_ficha_otros_prof = $('#id_fc').val();
        let id_profesional = $('#profesion_sq').val();
        let id_especialidad = '{{ $profesional->id_especialidad }}';
        let id_tipo_especialidad = '{{ $profesional->id_tipo_especialidad }}';
        let id_paciente = $('#id_paciente_fc').val();

        var nomb_test = $('#nomb_test_uno').val();
        var resp = $('#test_uno_resp').val();
        var com = $('#test_uno_com').val();
        var ind = $('#test_uno_ind').val();
        var comentarios_gen = $('#comentarios_gen').val();


        let url = "{{ route('ficha.otro.prof.otros_test.registro') }}";

        if(nomb_test == '') {
            mensaje += 'Debe ingresar Nombre\n';
            valido = 0;
        }

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
                    nomb_test:nomb_test,
                    resp:resp,
                    com:com,
                    ind:ind,
                    comentarios_gen:comentarios_gen,
                },
            })
            .done(function(response) {
                if (response.estado == 1) {
                    swal({
                        title: "Otros test practicados" ,
                        text: "Registro exitoso",
                        icon: "success",
                    })
                    $('#test_otros').modal('hide');
                }
                else
                {
                    swal({
                        title: "Otros test practicados" ,
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
                title: "Otros test practicados, campos requeridos" ,
                text: mensaje,
                icon: "error",
            })
        }
    }
</script>
