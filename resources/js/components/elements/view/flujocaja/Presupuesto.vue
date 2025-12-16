<template>
    <div class="tab-pane fade show active" id="presupuesto" role="tabpanel" aria-labelledby="presupuesto-tab">
        <div class="card">
            <div class="card-header pt-3 pb-2">
                <h6 class="f-18">Gestión de presupuestos</h6>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="g-pres-dental" class="display table table-striped  dt-responsive nowrap table-xs" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th class="align-middle">Nº presupuesto</th>
                                <th class="align-middle">Fecha</th>
                                <th class="align-middle">Paciente</th>
                                <th class="align-middle">Valor total</th>
                                <th class="align-middle">Abonos</th>
                                <th class="align-middle">Monto</th>
                                <th class="align-middle">Asistente<br>responsable</th>
                                <th class="align-middle">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--
                            <tr class="text-center">
                                <td class="align-middle"><span>1232343</span></td>
                                <td class="align-middle"><span>12/12/2021</span></td>
                                <td class="align-middle"><span>Jose Garrido</span><br><span>12.234.222-K</span></td>
                                <td class="align-middle">$1.234.234</td>
                                <td class="align-middle">$400.244</td>
                                <td class="align-middle">$500.000</td>
                                <td class="align-middle"><span>Pepita Sanchez</span><br>
                                <span>8.223.344-1</span></td>
                                <td class="align-middle"><span class="badge badge-pill badge-warning">Pendiente</span></td>
                            </tr>
                            -->
                        </tbody>
                        <tfoot class="bg-tfoot">
                            <tr>
                                <th class="align-middle text-center" colspan="2" rowspan="1">Total</th>
                                <th class="align-middle text-center" colspan="1" rowspan="1">$0</th>
                                <th class="align-middle text-center" colspan="1" rowspan="1">$0</th>
                                <th class="align-middle text-left" colspan="4" rowspan="1">$0</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-info">Recibo abonos conforme</button>
            </div>
        </div>
    </div>
</template>