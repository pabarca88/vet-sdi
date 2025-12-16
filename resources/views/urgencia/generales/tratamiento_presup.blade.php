<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12">
                    <h5 class="text-c-blue mt-1 mb-1 f-16">Tratamiento según presupuesto</h5>
                    <hr>
                </div>
                <div class="col-sm-12">
                    <div class="dt-responsive table-responsive pb-4">
                        <table id="tratamiento_presupuesto"
                            class="display table table-striped table-hover dt-responsive nowrap table-sm"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Nº Presupuesto</th>
                                    <th class="text-center align-middle">Aprobado</th>
                                    <th class="text-center align-middle">Pieza</th>
                                    <th class="text-center align-middle">Boca</th>
                                    <th class="text-center align-middle">Presupuesto</th>
                                    <th class="text-center align-middle">Estado</th>
                                    <th class="text-center align-middle">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle">23/05/2021</td>
                                    <td class="text-center align-middle">782638</td>
                                    <td class="text-center align-middle">Si</td>
                                    <td class="text-center align-middle">Sector I</td>
                                    <td class="text-center align-middle">no</td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()";>
                                            <i class="fa fa-plus"></i> Cargar Presupuesto
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="form-group col-md-4">
                                            <div class="switch switch-success d-inline m-r-2">
                                                <input type="checkbox" id="info_finalizado" checked="">
                                                <label for="info_finalizado" class="cr"></label>
                                            </div>
                                            <label>Realizado?</label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        20/05/2022
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
@include('atencion_odontologica.modals.adulto.cargar_presupuesto')
