<div id="modal_lam_praxias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_lam_praxias" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content" >
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">LAMINAS PRAXIAS</h5>
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
                    <div class="form-row text-center">
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias1.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Lengua a Izquierda</label>
                                <select class="form-control form-control-sm" name="li" id="li">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias2.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Lengua a Dererecha</label>
                                 <select class="form-control form-control-sm" name="ld" id="ld">
                                     <option value="1">Si</option>
                                    <option value="N2>No</option>
                                    <option value="D3>Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias3.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Inflar Mejilla Izq</label>
                                 <select class="form-control form-control-sm" name="imi" id="imi">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias4.png') }}">
                            <div class="form-group">
                                 <label class="floating-label-activo-sm">Inflar Mejilla Der</label>
                                 <select class="form-control form-control-sm" name="imd" id="imd">
                                     <option value="1">Si</option>
                                    <option value="N2>No</option>
                                    <option value="D3>Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias5.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Lengua a Arriba</label>
                                 <select class="form-control form-control-sm" name="larrib" id="larrib">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias6.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Lengua Abajo</label>
                                   <select class="form-control form-control-sm" name="labajo" id="labajo">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias7.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Inflar Ambas Mejillas</label>
                                  <select class="form-control form-control-sm" name="inf_amej" id="inf_amej">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias8.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Desinflar Ambas Mejillas</label>
                                  <select class="form-control form-control-sm" name="desammej" id="desammej">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias9.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Lengua Ancha</label>
                                <select class="form-control form-control-sm" name="leng_ancha" id="leng_ancha">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias10.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Lengua Angosta</label>
                                <select class="form-control form-control-sm" name="leng_ang" id="leng_ang">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias11.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Inflar Mejillas</label>
                                <select class="form-control form-control-sm" name="inf_mej" id="inf_mej">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Deficiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 mt-2">
                            <img class="w-60 img-fluid mb-3" src="{{ asset('images\fono\img\praxias12.png') }}">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Reventar con los Dedos</label>
                                <select class="form-control form-control-sm" name="rev_dedos" id="rev_dedos">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Deficiente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-3 mt-2">
                            <label class="floating-label-activo-sm">Nº de Sesiones</label>
                            <input type="text" class="form-control form-control-sm" name="praxias_lam_num_sesiones" id="praxias_lam_num_sesiones">
                        </div>
                        <div class="col-sm-9 mt-2">
                            <label class="floating-label-activo-sm">Objetivos</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obj" id="obj"></textarea>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="submit" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function l_praxias() {
        $('#modal_lam_praxias').modal('show');
    }
</script>
