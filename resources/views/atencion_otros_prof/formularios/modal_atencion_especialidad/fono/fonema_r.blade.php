<div id="fonema_r" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fonema_r" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Fonema R</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten active" id="uno_tab" data-toggle="pill" href="#uno" role="tab" aria-controls="uno" aria-selected="true">Rana</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="dos_tab" data-toggle="pill" href="#dos" role="tab" aria-controls="pills-home" aria-selected="true">Regalo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="tres_tab" data-toggle="pill" href="#tres" role="tab" aria-controls="pills-home" aria-selected="true">Ratón</a>
                            </li>
                                <li class="nav-item">
                                <a class="nav-link-aten" id="cuatro_tab" data-toggle="pill" href="#cuatro" role="tab" aria-controls="pills-home" aria-selected="true">Robot</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="cinco_tab" data-toggle="pill" href="#cinco" role="tab" aria-controls="pills-home" aria-selected="true">Rey</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="seis_tab" data-toggle="pill" href="#seis" role="tab" aria-controls="pills-home" aria-selected="true">Parrilla</a>
                            </li>
                                <li class="nav-item">
                                <a class="nav-link-aten" id="siete_tab" data-toggle="pill" href="#siete" role="tab" aria-controls="pills-home" aria-selected="true">Carretilla</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="ocho_tab" data-toggle="pill" href="#ocho" role="tab" aria-controls="pills-home" aria-selected="true">Carretera</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="nueve_tab" data-toggle="pill" href="#nueve" role="tab" aria-controls="pills-home" aria-selected="true">Serrucho</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="diez_tab" data-toggle="pill" href="#diez" role="tab" aria-controls="pills-home" aria-selected="true">Tierra</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="once_tab" data-toggle="pill" href="#once" role="tab" aria-controls="pills-home" aria-selected="true">Resultados</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="pills-tablas_examenes">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="uno_tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemas\rana.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Rana</label>
                                        <input type="text" class="form-control form-control-sm" name="uno_com" id="uno_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="uno_logros" id="uno_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 2-->
                            <div class="tab-pane fade show" id="dos" role="tabpanel" aria-labelledby="dos_tab">
                                <div class="form-row" >
                                   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemas\regalo.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Regalo</label>
                                        <input type="text" class="form-control form-control-sm" name="dos_com" id="dos_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="dos_logros" id="dos_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 3-->
                            <div class="tab-pane fade show" id="tres" role="tabpanel" aria-labelledby="tres_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemas\raton.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Ratón</label>
                                        <input type="text" class="form-control form-control-sm" name="tres_com" id="tres_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tres_logros" id="tres_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 4-->
                            <div class="tab-pane fade show" id="cuatro" role="tabpanel" aria-labelledby="cuatro_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemas\robot.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Robot</label>
                                        <input type="text" class="form-control form-control-sm" name="cuatro_com" id="cuatro_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cuatro_logros" id="cuatro_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 5-->
                            <div class="tab-pane fade show" id="cinco" role="tabpanel" aria-labelledby="cinco_tab">
                                <div class="form-row">
                                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemas\rey.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Rey</label>
                                        <input type="text" class="form-control form-control-sm" name="cinco_com" id="cinco_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cinco_logros" id="cinco_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 6-->
                            <div class="tab-pane fade show" id="seis" role="tabpanel" aria-labelledby="seis_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemas\parrilla.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Parrilla</label>
                                        <input type="text" class="form-control form-control-sm" name="seis_com" id="seis_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="seis_logros" id="seis_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 7-->
                            <div class="tab-pane fade show" id="siete" role="tabpanel" aria-labelledby="siete_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemas\carretilla.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Carretilla</label>
                                        <input type="text" class="form-control form-control-sm" name="siete_com" id="siete_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="siete_logros" id="siete_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 8-->
                            <div class="tab-pane fade show" id="ocho" role="tabpanel" aria-labelledby="ocho_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemas\carretera.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Carretera</label>
                                        <input type="text" class="form-control form-control-sm" name="ocho_com" id="ocho_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ocho_logros" id="ocho_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 9-->
                            <div class="tab-pane fade show" id="nueve" role="tabpanel" aria-labelledby="nueve_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemas\serrucho.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Serrucho</label>
                                        <input type="text" class="form-control form-control-sm" name="nueve_com" id="nueve_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="nueve_logros" id="nueve_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!--TAB 10-->
                            <div class="tab-pane fade show" id="diez" role="tabpanel" aria-labelledby="diez_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img src="{{ asset('images\fono\fonemas\tierra.png') }}" style="width:80%">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Tierra</label>
                                        <input type="text" class="form-control form-control-sm" name="diez_com" id="diez_com">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Logros</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="diez_logros" id="diez_logros"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="once" role="tabpanel" aria-labelledby="once_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <label  class="floating-label-activo-sm">Comentarios Generales</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="com_gral_r" id="com_gral_r"></textarea>
                                    </div>
                                </div>
                                    <hr>
                                <div class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos Logrados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="com_gral_r" id="com_gral_r"></textarea>
                                    </div>
                                </div>
                                    <hr>
                                <div class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <label  class="floating-label-activo-sm">Plan en proximas Sesiones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="plan_r" id="plan_r"></textarea>
                                    </div>
                                    <br>
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
</div>
<script>
    function fon_r() {
        $('#fonema_r').modal('show');
    }
</script>
