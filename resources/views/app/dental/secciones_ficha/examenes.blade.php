<div class="row">
    <div class="col-sm-6">
        <h5 class="text-c-blue mt-4 mb-1 f-16 float-left d-inline">Resultado de ex�menes</h5>
    </div>
    <div class="col-sm-6 d-inline float-right">
        <!--Bot�n modal agregar examen-->
        <button type="button" class="btn btn-success btn-sm float-right mt-4" data-toggle="modal"
            data-target="#modal_adjuntar_examen"><i class="fa fa-plus"></i> Agregar Examen</button>
        <!--Cierre: Bot�n modal agregar examen-->
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
            <li class="nav-item">
                <a class="nav-link-wizard active" id="examenes_general_tab" data-toggle="pill"
                    href="#pills_bandeja_entrada" role="tab" aria-controls="pills-home" aria-selected="true">Bandeja de
                    entrada</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-wizard" id="pills_bandeja_rx_tab" data-toggle="pill" href="#pills_bandeja_rx"
                    role="tab" aria-controls="pills-home" aria-selected="true">Ex�menes radiol�gicos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-wizard" id="examenes_general_tab" data-toggle="pill" href="#pills_examenes_general"
                    role="tab" aria-controls="pills-profile" aria-selected="false">Ex�menes en general</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tablas_examenes">
            <div class="tab-pane fade show active" id="pills_bandeja_entrada" role="tabpanel"
                aria-labelledby="examenes_general_tab">
                <div class="dt-responsive table-responsive pb-4">
                    <table id="examenes-1" class="display table table-striped table-hover dt-responsive nowrap table-sm"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">N� de Orden</th>
                                <th class="text-center align-middle">Nombre del Examen</th>
                                <th class="text-center align-middle">TIpo de Examen</th>
                                <th class="text-center align-middle">Examen</th>
                                <th class="text-center align-middle">Acci�n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">23/05/2019</td>
                                <td class="text-center align-middle">782638</td>
                                <td class="text-center align-middle">Hemograma completo</td>
                                <td class="text-center align-middle">Examen Sangre</td>
                                <td class="text-center align-middle">
                                    <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i>
                                        Ver Examen</button>
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
            <div class="tab-pane fade show " id="pills_bandeja_rx" role="tabpanel" aria-labelledby="examenes_rx_tab">
                <div class="dt-responsive table-responsive pb-4">
                    <table id="examenes-2" class="display table table-striped table-hover dt-responsive nowrap table-sm"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">N� de Orden</th>
                                <th class="text-center align-middle">Nombre del Examen</th>
                                <th class="text-center align-middle">TIpo de Examen</th>
                                <th class="text-center align-middle">Examen</th>
                                <th class="text-center align-middle">Acci�n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">23/05/2019</td>
                                <td class="text-center align-middle">782638</td>
                                <td class="text-center align-middle">Hemograma completo</td>
                                <td class="text-center align-middle">Examen Sangre</td>
                                <td class="text-center align-middle">
                                    <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i>
                                        Ver Examen</button>
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
            <div class="tab-pane fade" id="pills_examenes_general" role="tabpanel"
                aria-labelledby="examenes_general_tab">
                <div class="dt-responsive table-responsive pb-4">
                    <table id="examenes-3" class="display table table-striped table-hover dt-responsive nowrap table-sm"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">N� de Orden</th>
                                <th class="text-center align-middle">Nombre del Examen</th>
                                <th class="text-center align-middle">Tipo de Examen</th>
                                <th class="text-center align-middle">Examen</th>
                                <th class="text-center align-middle">Acci�n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">23/05/2019</td>
                                <td class="text-center align-middle">782638</td>
                                <td class="text-center align-middle">Hemograma completo</td>
                                <td class="text-center align-middle">Examen Sangre</td>
                                <td class="text-center align-middle">
                                    <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i>
                                        Ver Examen</button>
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
</div>
