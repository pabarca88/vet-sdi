<div id="modal_tede" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_tede" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="width:200%" role="document">
        <div class="modal-content" >
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">TEDE</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>

                    <div id="planificacion" class="form-row">
                        <div class="col-sm-8 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono">INDIQUE AL PACIENTE LOS SIGUIENTES EJERCICIOS</h6>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-2 floating right">
                            <div class="form-group fill">
                                <script>
                                    var f = new Date();
                                    document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="col-sm-12 mt-2" >
                            <div class="form-group fill">
                                <img src="{{ asset('images\fono\img\TEDE_1.png') }}" style="width:100%">
                            </div>
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="col-sm-12 mt-2" >
                            <div class="form-group fill">
                                <img src="{{ asset('images\fono\img\TEDE_2.png') }}" style="width:100%">
                            </div>
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="col-sm-12 mt-2" >
                            <div class="form-group fill">
                                <img src="{{ asset('images\fono\img\TEDE_3.png') }}" style="width:100%">
                            </div>
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="col-sm-12 mt-2" >
                            <div class="form-group fill">
                                <img src="{{ asset('images\fono\img\TEDE_4.png') }}" style="width:100%">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-3 mt-2">
                            <label id="" name="" class="floating-label-activo-sm">Número de Sesiones</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                        </div>
                        <div class="col-sm-9 mt-2">
                            <label id="" name="" class="floating-label-activo-sm">Objetivos</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="succion" id="succion"></textarea>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>
