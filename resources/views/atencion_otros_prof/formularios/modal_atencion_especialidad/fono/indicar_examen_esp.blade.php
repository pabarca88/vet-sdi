<div id="indicar_examen_fono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_examen_fono" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Exámenes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo del Examen Lab Otorrinolaringología</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="AL">Seleccione</option>
                                    <optgroup label="OÌDOS">
                                        <option value="AL">Audiometría Niños</option>
                                        <option value="LA">Audiometría Adultos</option>
                                        <option value="LA">Impedanciometría</option>
                                        <option value="LA">Examen Funcional 8º Par Completo</option>
                                        <option value="LA">Emisioones Oto-Acústicas</option>
                                        <option value="LA">BERA</option>
                                    </optgroup>
                                    <optgroup label="NARIZ">
                                        <option value="AL">Rinomanometría</option>
                                    </optgroup>
                                    <optgroup label="FARINGO-LARÍNGE">
                                        <option value="AL">Nasofibrolaringoscopía</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Prioridad</label>
                                <select class="form-control form-control-sm">
                                    <option>Urgencia regular</option>
                                    <option>Urgente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_examen_orl" id="obs_examen_orl"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Nombre Examen</th>
                                            <th class="text-center align-middle">Prioridad</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>Audiometria</span></td>
                                            <td class="text-center align-middle">Urgente</td>
                                            <td class="text-center align-middle">
                                                <button href="#!" class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--Cierre Tabla-->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">
                Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function examenes_fono() {
        $('#indicar_examen_fono').modal('show');
    }
</script>
