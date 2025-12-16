<div id="ingreso_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ingreso_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Orden de ingreso hospitalización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <script>
                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                        var f=new Date();
                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                        </script>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <label class="floating-label-activo-sm">Médico tratante</label>
                        <div class="form-group fill">
                            <input type="text" class="form-control form-control-sm" name="med_tratante" id="med_tratante">
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <label class="floating-label-activo-sm">Hospitalizar en <i>(Clínica - Hospital)</i></label>
                        <input type="text" class="form-control form-control-sm" id="hosp_en" name="hosp_en">
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <label class="floating-label-activo-sm">Diagnósticos </label>
                        <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <label class="floating-label-activo-sm">Servicio</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" name="serv_hosp" id="serv_hosp">
                        </div>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col-md-12 mb-3">
                        <h6>Ingreso</h6>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label class="floating-label-activo-sm">Indicaciones de ingreso</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ind_ingreso" id="ind_ingreso"></textarea>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col-md-12 mb-3">
                        <h6>Cirugía</h6>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <label class="floating-label-activo-sm">Órgano</label>
                        <input type="text" class="form-control form-control-sm" name="organo_op" id="organo_op">
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <label class="floating-label-activo-sm">Tipo de cirugía</label>
                        <input type="text" class="form-control form-control-sm" name="tipo_op" id="tipo_op">
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <label class="floating-label-activo-sm">Anestésia</label>
                        <input type="text" class="form-control form-control-sm" name="tipo_anest" id="tipo_anest">
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <label class="floating-label-activo-sm">Hora de cirugía</label>
                        <input type="time" class="form-control form-control-sm" name="hora_op" id="hora_op">
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col-md-12 mb-3">
                        <h6>Equipo</h6>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label-activo-sm">Cirujano</label>
                        <input type="text" class="form-control form-control-sm" name="cirujano" id="cirujano">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label-activo-sm">Ayudantes</label>
                       <input type="text" class="form-control form-control-sm" name="ayudante" id="ayudante">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label-activo-sm">Anestesista</label>
                        <input type="text" class="form-control form-control-sm" name="anestesista" id="anestesista">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label-activo-sm">Arsenalero/a</label>
                        <input type="text" class="form-control form-control-sm" name="arsenalera" id="arsenalera">
                    </div>
                    <div class="form-group col-md-8">
                       <label class="floating-label-activo-sm">Instrumental especial</label>
                       <input type="text" class="form-control form-control-sm" name="instr_esp" id="instr_esp">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h6 class="mb-3">Otros</h6>
                        <div class="form-group">
                        <label class="floating-label-activo-sm">Comentarios</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otros_hosp" id="otros_hosp"></textarea>
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h6 class="mb-3">Agregar archivos</h6>
                        <input class="mb-2" size="80" name="archivo_up" id="archivo_up" type="file" onchange="javascript: submit();">
                        <br>
                        <!--IDEA DEL ARCHIVO ADJUNTO-->
                        <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                            <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> Nombre del archivo</a>
                            <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                            <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> Eco -Doppler- Nombre paciente.pdf</a>
                            <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info">Guardar y enviar</button>
                <button type="button" class="btn btn-primary">Ver formulario (PDF)</button>
                </form>
            </div>
        </div>
    </div>
</div>