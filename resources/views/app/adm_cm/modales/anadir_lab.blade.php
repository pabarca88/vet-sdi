<div id="a_laboratorio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_laboratorio" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Laboratorios</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1 active"  id="pills-instalac-tab" data-toggle="pill" href="#pills-instalac" role="tab" aria-controls="pills-instalac" aria-selected="true">Boxes de Vacunación</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-equipamiento-tab" data-toggle="pill" href="#pills-equipamiento" role="tab" aria-controls="pills-equipamiento" aria-selected="false">Equipamiento</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-instalac" role="tabpanel" aria-labelledby="pills-instalac-tab">
                                <div class="row mb-n4">
                                <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <div class="row">
                                                    <div class="col-md-12 align-botton">
                                                        <h4 class="text-white f-20 d-inline ml-4 mt-3">Boxes</h4>
                                                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-outline-light btn-sm" onclick="box();"><i class="feather icon-plus"></i>Agregar Nuevo Box</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                    </div>
                                                </div>
                                                <div style="overflow-x:auto;">
                                                    <table id="box_vacunas" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">Nº Box</th>
                                                                <th class="text-center align-middle">Fecha de Habilitación</th>
                                                                <th class="text-center align-middle">Destino</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <span>box 1</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span>02/02/2022</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span>Vacunas Infantiles</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <span>box 2</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span>13/02/2022</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span>Vacunas Adultos</span>
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
                            <div class="tab-pane fade" id="pills-equipamiento" role="tabpanel" aria-labelledby="pills-equipamiento-tab">
                                <div class="row mb-n4">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <div class="row">
                                                    <div class="col-md-12 align-botton">
                                                        <h4 class="text-white f-20 d-inline ml-4 mt-3">Boxes</h4>
                                                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-outline-light btn-sm" onclick="equipo();"><i class="feather icon-plus"></i>Agregar Nuevo Equipamiento</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                    </div>
                                                </div>
                                                <div style="overflow-x:auto;">
                                                <table id="equipos_vacunas" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Nombre Equipo</th>
                                                            <th class="text-center align-middle">Fecha Incorporación</th>
                                                            <th class="text-center align-middle">Uso</th>
                                                            <th class="text-center align-middle">Proveedor</th>
                                                            <th class="text-center align-middle">Sucursal/Servicio</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span>Carro de Paro</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>02/02/2022</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>Urgencias</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>Equipos medicos ltda.</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>Nombre servicio</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span>Desfibrilador</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>02/02/2022</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>Urgencias</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>Equipos medicos ltda.</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>Nombre servicio</span>
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
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm mx-auto" >Añadir</button>
            </div>

        </div>
    </div>
</div>

<script>
    function a_laboratorio() {
               $('#a_laboratorio').modal('show');
           }
   </script>
