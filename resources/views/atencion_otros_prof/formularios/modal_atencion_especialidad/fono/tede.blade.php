<div id="modal_tede" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_tede" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="width:200%" role="document">
        <div class="modal-content" >
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">TEDE (ME FALTA ARREGLAR LAS IMAGENES)</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="tede" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="tede-uno-tab" data-toggle="tab" href="#tede-uno" role="tab" aria-controls="tede-uno" aria-selected="true">TITULO 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="tede-dos-tab" data-toggle="tab" href="#tede-dos" role="tab" aria-controls="tede-dos" aria-selected="false">TITULO 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="tede-tres-tab" data-toggle="tab" href="#tede-tres" role="tab" aria-controls="tede-tres" aria-selected="false">TITULO 4</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="tede-cuatro-tab" data-toggle="tab" href="#tede-cuatro" role="tab" aria-controls="tede-cuatro" aria-selected="false">TITULO 5</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="planificacion" class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <h6 class="">INDIQUE AL PACIENTE LOS SIGUIENTES EJERCICIOS</h6>
                    </div>
                    <div class="col-sm-12 col-md-6 float-right">
                            <script>
                                var f = new Date();
                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                            </script>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="tede_info">
                            <!--TEDE 1-->
                            <div class="tab-pane fade show active" id="tede-uno" role="tabpanel" aria-labelledby="tede-uno-tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img class="img-fluid w-60" src="{{ asset('images\fono\img\TEDE_1.png') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Número de Sesión</label>
                                        <input type="number" class="form-control form-control-sm" name="num_ses_uno" id="num_ses_uno">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obj_com_ses_uno" id="obj_com_ses_uno"></textarea>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <!--TEDE 2-->
                            <div class="tab-pane fade show" id="tede-dos" role="tabpanel" aria-labelledby="tede-dos-tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img class="img-fluid w-60" src="{{ asset('images\fono\img\TEDE_2.png') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Número de Sesión</label>
                                        <input type="number" class="form-control form-control-sm" name="num_ses_dos" id="num_ses_dos">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obj_com_ses_dos" id="obj_com_ses_dos"></textarea>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <!--TEDE 3-->
                            <div class="tab-pane fade show" id="tede-tres" role="tabpanel" aria-labelledby="tede-tres-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img class="img-fluid w-60" src="{{ asset('images\fono\img\TEDE_3.png') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Número de Sesión</label>
                                        <input type="number" class="form-control form-control-sm" name="num_ses_tres" id="num_ses_tres">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obj_com_ses_tres" id="obj_com_ses_tres"></textarea>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <!--TEDE 4-->
                            <div class="tab-pane fade show" id="tede-cuatro" role="tabpanel" aria-labelledby="tede-cuatro-tab">
                                <div class="form-row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <img class="img-fluid w-60" src="{{ asset('images\fono\img\TEDE_4.png') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-3 mt-2">
                                        <label  class="floating-label-activo-sm">Número de Sesión</label>
                                        <input type="number" class="form-control form-control-sm" name="num_ses_cuatro" id="num_ses_cuatro">
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <label  class="floating-label-activo-sm">Objetivos y Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obj_com_ses_cuatro" id="obj_com_ses_cuatro"></textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="submit" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function tede() {
        $('#modal_tede').modal('show');
    }
</script>
