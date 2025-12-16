<div class="tab-pane fade" id="pills-examenes" role="tabpanel" aria-labelledby="pills-examenes-tab">
    <div class="row px-3">
        <div class="col-sm-6 mt-5">
            <h5 class="text-c-blue" style="font-size: 1.1rem;">
                Resultado de Exámenes
            </h5>
        </div>
        <div class="col-sm-6 mt-5">
            <!--Modal 04 / Subir Examen-->
            <div id="modal_adjuntar_examen" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="modal_adjuntar_examen" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">
                                Adjuntar Examen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="" id="" />

                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label">Nº de Orden</label>
                                            <input type="number" name="" id="" type="text"
                                                class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label">Nombre del Examen</label>
                                            <select class="form-control form-control-sm" name="" id="">
                                                <option>Seleccione una opción</option>
                                                <option>..</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Tipo de Examen</label>
                                            <select class="form-control form-control-sm" name="" id="">
                                                <option>Seleccione una opción</option>
                                                <option>..</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <form action="../assets/json/file-upload.php" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-success btn-sm float-right">
                                            <i class="fa fa-plus"></i> Agregar Examen</button>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                        <!--Tabla-->
                                        <div class="">
                                            <table class="table table-bordered table-sm">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Nº Orden</th>
                                                        <th class="text-center align-middle">Nombre del Examen</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Examen</th>
                                                        <th class="text-center align-middle">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle"><span>03/12/20</span></td>
                                                        <td class="text-center align-middle">7217821</td>
                                                        <td class="text-center align-middle">Ecografia Doppler</td>
                                                        <td class="text-center align-middle">Imagenología</td>
                                                        <td class="text-center align-middle"><button href="#!"
                                                                class="btn btn-info btn-sm btn-icon"><i
                                                                    class="feather icon-file-text"></i></button></td>
                                                        <td class="text-center align-middle">
                                                            <button class="btn btn-danger btn-sm btn-icon"><i
                                                                    class="feather icon-x"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--Cierre Tabla-->
                                        </div>
                                    </div>
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
            <!--Cierre: Modal 04 / Subir Examen-->
            <!--Botón Modal 04 / Subir Examen-->
            <button type="button" class="btn btn-success btn-sm float-right mt-1" data-toggle="modal"
                data-target="#modal_adjuntar_examen"><i class="fa fa-plus"></i> Agregar Examen</button>
            <!--Cierre: Botón Modal 04 / Subir Examen-->
        </div>
    </div>
    <hr>
    <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
        <li class="nav-item">
            <a class="nav-link-wizard active" id="examenes_general_tab" data-toggle="pill" href="#pills_bandeja_entrada"
                role="tab" aria-controls="pills-home" aria-selected="true">Bandeja de entrada</a>
        </li>
        <li class="nav-item">
            <a class="nav-link-wizard" id="examenes_general_tab" data-toggle="pill" href="#pills_examenes_general"
                role="tab" aria-controls="pills-profile" aria-selected="false">Exámenes en general</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tablas_examenes">
        <div class="tab-pane fade show active" id="pills_bandeja_entrada" role="tabpanel"
            aria-labelledby="examenes_general_tab">
            <div class="dt-responsive table-responsive pb-4">
                <table id="" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Fecha</th>
                            <th class="text-center align-middle">Nº de Orden</th>
                            <th class="text-center align-middle">Nombre del Examen</th>
                            <th class="text-center align-middle">TIpo de Examen</th>
                            <th class="text-center align-middle">Examen</th>
                            <th class="text-center align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle">23/05/2019</td>
                            <td class="text-center align-middle">782638</td>
                            <td class="text-center align-middle">Hemograma completo</td>
                            <td class="text-center align-middle">Examen Sangre</td>
                            <td class="text-center align-middle">
                                <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver
                                    Examen</button>
                            </td>
                            <td class="text-center align-middle">
                                <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"
                                    data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="pills_examenes_general" role="tabpanel" aria-labelledby="examenes_general_tab">
            <div class="dt-responsive table-responsive pb-4">
                <table id="" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Fecha</th>
                            <th class="text-center align-middle">Nº de Orden</th>
                            <th class="text-center align-middle">Nombre del Examen</th>
                            <th class="text-center align-middle">TIpo de Examen</th>
                            <th class="text-center align-middle">Examen</th>
                            <th class="text-center align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle">23/05/2019</td>
                            <td class="text-center align-middle">782638</td>
                            <td class="text-center align-middle">Hemograma completo</td>
                            <td class="text-center align-middle">Examen Sangre</td>
                            <td class="text-center align-middle">
                                <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver
                                    Examen</button>
                            </td>
                            <td class="text-center align-middle">
                                <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"
                                    data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
