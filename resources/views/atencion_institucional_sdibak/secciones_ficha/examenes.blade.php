<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-0 pt-3">
                        <h6 class="f-16 text-c-blue d-inline">Exámenes</h6>
                        <button type="button" class="btn btn-sm btn-success d-inline float-md-right float-md-right ml-4" onclick="añadir_examen();">
                            <i class="feather icon-plus"></i> Añadir
                        </button>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-wizard active" id="examenes_general_tab" data-toggle="pill" href="#pills_bandeja_entrada" role="tab" aria-controls="pills-home" aria-selected="true">Bandeja de entrada</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-wizard" id="pills_bandeja_rx_tab" data-toggle="pill" href="#pills_bandeja_rx" role="tab" aria-controls="pills-home" aria-selected="true">Exámenes radiológicos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-wizard" id="examenes_general_tab" data-toggle="pill" href="#pills_examenes_general" role="tab" aria-controls="pills-profile" aria-selected="false">Exámenes generales</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tablas_examenes">
                            <div class="tab-pane fade show active" id="pills_bandeja_entrada" role="tabpanel" aria-labelledby="examenes_general_tab">
                                <div class="dt-responsive table-responsive pb-4">
                                    <table id="bandeja_entrada" class="display table dt-responsive nowrap table-xs" style="width:100%">
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
                                                <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver Examen</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show " id="pills_bandeja_rx" role="tabpanel" aria-labelledby="examenes_rx_tab">
                                <div class="dt-responsive table-responsive pb-4">
                                    <table id="exam_radiologicos" class="display table dt-responsive nowrap table-xs" style="width:100%">
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
                                                <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver Examen</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills_examenes_general" role="tabpanel" aria-labelledby="examenes_general_tab">
                                <div class="dt-responsive table-responsive pb-4">
                                    <table id="exam_general" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº de Orden</th>
                                            <th class="text-center align-middle">Nombre del Examen</th>
                                            <th class="text-center align-middle">Tipo de Examen</th>
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
                                                    <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver Examen</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>