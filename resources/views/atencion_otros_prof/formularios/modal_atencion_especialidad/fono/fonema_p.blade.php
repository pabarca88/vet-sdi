<div id="fonema_p" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fonema_p" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Fonema P</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten" id="unop_tab" data-toggle="pill" href="#unop" role="tab" aria-controls="pills-home" aria-selected="true">Pato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="dosp_tab" data-toggle="pill" href="#dosp" role="tab" aria-controls="pills-home" aria-selected="true">Payaso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="tresp_tab" data-toggle="pill" href="#tresp" role="tab" aria-controls="pills-home" aria-selected="true">Pelota</a>
                            </li>
                                <li class="nav-item">
                                <a class="nav-link-aten" id="cuatrop_tab" data-toggle="pill" href="#cuatrop" role="tab" aria-controls="pills-home" aria-selected="true">Pera</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="cincop_tab" data-toggle="pill" href="#cincop" role="tab" aria-controls="pills-home" aria-selected="true">Palmera</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="seisp_tab" data-toggle="pill" href="#seisp" role="tab" aria-controls="pills-home" aria-selected="true">Cepillo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="sietep_tab" data-toggle="pill" href="#sietep" role="tab" aria-controls="pills-home" aria-selected="true">Chupete</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="ochop_tab" data-toggle="pill" href="#ochop" role="tab" aria-controls="pills-home" aria-selected="true">Lápiz</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="nuevep_tab" data-toggle="pill" href="#nuevep" role="tab" aria-controls="pills-home" aria-selected="true">Zapato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="diezp_tab" data-toggle="pill" href="#diezp" role="tab" aria-controls="pills-home" aria-selected="true">Zapallo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="oncep_tab" data-toggle="pill" href="#oncep" role="tab" aria-controls="pills-home" aria-selected="true">Resultados</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="pills-tablas_examenes">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="unop" role="tabpanel" aria-labelledby="unop_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemap\pato.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Pato</label>
                                        <input type="text" class="form-control form-control-sm" name="unop_com" id="unop_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="unop_logros" id="unop_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 2-->
                            <div class="tab-pane fade show" id="dosp" role="tabpanel" aria-labelledby="dosp_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <img src="{{ asset('images\fono\fonemap\payaso.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Payaso</label>
                                        <input type="text" class="form-control form-control-sm" name="dosp_com" id="dosp_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="dosp_logros" id="dosp_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 3-->
                            <div class="tab-pane fade show" id="tresp" role="tabpanel" aria-labelledby="tresp_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemap\pelota.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Pelota</label>
                                        <input type="text" class="form-control form-control-sm" name="tresp_com" id="tresp_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tresp_logros" id="tresp_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 4-->
                            <div class="tab-pane fade show" id="cuatrop" role="tabpanel" aria-labelledby="cuatrop_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemap\pera.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Pera</label>
                                        <input type="text" class="form-control form-control-sm" name="cuatrop_com" id="cuatrop_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cuatrop_logros" id="cuatrop_logros"></textarea>
                                    </div>
                                    <br>
                                </div>

                            </div>
                            <!--TAB 5-->
                            <div class="tab-pane fade show" id="cincop" role="tabpanel" aria-labelledby="cincop_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemap\palmera.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Palmera</label>
                                        <input type="text" class="form-control form-control-sm" name="cincop_com" id="cincop_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cincop_logros" id="cincop_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 6-->
                            <div class="tab-pane fade show" id="seisp" role="tabpanel" aria-labelledby="seisp_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemap\cepillo.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Cepillo</label>
                                        <input type="text" class="form-control form-control-sm" name="seisp_com" id="seisp_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="seisp_logros" id="seisp_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 7-->
                            <div class="tab-pane fade show" id="sietep" role="tabpanel" aria-labelledby="sietep_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemap\chupete.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Chupete</label>
                                        <input type="text" class="form-control form-control-sm" name="sietep_com" id="sietep_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="sietep_logros" id="sietep_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 8-->
                            <div class="tab-pane fade show" id="ochop" role="tabpanel" aria-labelledby="ochop_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemap\lapiz.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Lápiz</label>
                                        <input type="text" class="form-control form-control-sm" name="ochop_com" id="ochop_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ochop_logros" id="ochop_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 9-->
                            <div class="tab-pane fade show" id="nuevep" role="tabpanel" aria-labelledby="nuevep_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemap\zapato.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Zapato</label>
                                        <input type="text" class="form-control form-control-sm" name="nuevep_com" id="nuevep_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="nuevep_logros" id="nuevep_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 10-->
                            <div class="tab-pane fade show" id="diezp" role="tabpanel" aria-labelledby="diezp_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemap\zapallo.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Zapallo</label>
                                        <input type="text" class="form-control form-control-sm" name="diezp_com" id="diezp_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="diezp_logros" id="diezp_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="oncep" role="tabpanel" aria-labelledby="oncep_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Generales</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="com_gral_p" id="com_gral_p"></textarea>
                                    </div>
                                </div>
                                    <hr>
                                <div class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos Logrados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="com_gral_p" id="com_gral_p"></textarea>
                                    </div>
                                </div>
                                    <hr>
                                <div class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <label  class="floating-label-activo-sm">Plan en proximas Sesiones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="plan_p" id="plan_p"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
	</div>
</div>
<script>
    function fon_p() {
        $('#fonema_p').modal('show');
    }
</script>
