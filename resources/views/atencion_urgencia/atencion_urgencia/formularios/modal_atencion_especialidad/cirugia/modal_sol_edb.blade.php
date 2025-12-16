<div id="m_edb" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_edb" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Examen de Endoscopía Digestiva Baja </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                                </input>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label">Nº de orden</label>
                                <input type="number" type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Rut Paciente</label>
                                <input type="text" name="rut_pcte" id="rut_pcte" type="text" class="form-control form-control-sm"  value="{{ $paciente->rut }}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre</label>
                                <input type="text" name="zona" id="zona" type="text" class="form-control form-control-sm"  value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                            </div>
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                            <textarea type="text" class="form-control form-control-sm" rows="2" name="hipotesis_certificado"
                                id="hipotesis_certificado"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biopsia_orl" id="obs_biopsia_orl"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-plus"></i> Agregar examen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº Orden</th>
                                            <th class="text-center align-middle">Rut</th>
                                            <th class="text-center align-middle">Nombre</th>
                                            <th class="text-center align-middle">Diagnóstico</th>
                                            <th class="text-center align-middle">Observaciones</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                            <td class="text-center align-middle">7217821</td>
                                            <td class="text-center align-middle">fulano de tal</td>
                                            <td class="text-center align-middle">6598895-k</td>
                                            <td class="text-center align-middle">rectorragia</td>
                                            <td class="text-center align-middle">se solicita estudio HP</td>
                                            <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" onclick="cerrarsol_examen_endosc_edb();" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>

    function sol_examen_endosc_edb()
    {
        $('#m_edb').modal('show');
    }
    function cerrarsol_examen_endosc_edb() {
        $('#m_edb').modal ('hide');
      }

</script>

