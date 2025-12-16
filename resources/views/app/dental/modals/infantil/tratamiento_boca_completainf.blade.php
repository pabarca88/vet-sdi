<div id="tratamiento_boca_completainf" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="tratamiento_boca_completa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_tratamiento_dental">Tratamiento Boca Infantil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dental_infantil.registrar_boca_completa_infantil') }}">
                    @csrf
                    <input type="hidden" name="id_paciente_boca_completa" id="id_paciente_boca_completa"
                        value="{{ $paciente->id }}">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha procedimiento</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_proc"
                                    id="fecha_proc">
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Procedimiento</label>
                                <select class="form-control form-control-sm" id="procedimiento_infantil_boca_completa"
                                    name="procedimiento_infantil_boca_completa">
                                    <option value="-1">Seleccione Procedimiento</option>
                                    <option value="proc_p_01">Educación Cuidado</option>
                                    <option value="proc_p_02">Profilaxis boca completa</option>
                                    <option value="proc_p_03">Fluoración tópica (gel) total niños y adultos</option>
                                    <option value="proc_p_04">Destartraje boca completa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Comentarios</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="2"
                                    name="comentarios_infantil_boca_completa"
                                    id="comentarios_infantil_boca_completa"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        id="terminado_infantil_boca_completa" name="terminado_infantil_boca_completa">
                                    <label class="form-check-label" for="terminado_infantil_boca_completa">Trabajo
                                        terminado</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        id="agendar_hora_infantil_boca_completa"
                                        name="agendar_hora_infantil_boca_completa">
                                    <label class="form-check-label" for="agendar_hora_infantil_boca_completa">Nueva
                                        Cita Agendar
                                        control</label>
                                    <!--lo lleva a la agenda-->
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-sm  btn-block"><i
                                        class="fa fa-plus"></i> Agregar Tratamiento</button>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <img class="img-fluid" src="{{ asset('images/dientes/boca_infantil.png') }}">
                        </div>
                    </div>
                </form>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Procedimiento</th>
                                        <th class="text-center align-middle">Avance</th>
                                        <th class="text-center align-middle">Comentarios</th>
                                        <th class="text-center align-middle">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">02/12/2021</td>
                                        <td class="text-center align-middle">blanqueamiento</td>
                                        <td class="text-center align-middle">terminado</td>
                                        <td class="text-center align-middle">-</td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i
                                                    class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--Cierre: Tabla-->
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-sm btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>
