<div id="imc_referencial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="imc_referencial" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Crecimiento y desarrollo Valores referenciales IMC de 5 a 9 años</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body text-center py-0">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ns-59a" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="imc_referencial_fem-tab" data-toggle="tab" href="#imc_referencial_fem" role="tab" aria-controls="imc_referencial_fem" aria-selected="false">Femenino</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="imc_referencial_mas-tab" data-toggle="tab" href="#imc_referencial_mas" role="tab" aria-controls="imc_referencial_mas" aria-selected="false">Masculino</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    {{-- femenino --}}
                    <div class="tab-pane fade show active" id="imc_referencial_fem" role="tabpanel" aria-labelledby="imc_referencial_fem-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('images\imagenes_ped\tablas-ninosano\graf_niñas/Grafico_imc-5-19-años-niñas.png') }}" class="img-thumbnail">
                            </div>
                        </div>
                    </div>

                    {{-- masculino --}}
                    <div class="tab-pane fade" id="imc_referencial_mas" role="tabpanel" aria-labelledby="imc_referencial_mas-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('images\imagenes_ped\tablas-ninosano\graf_niños\graf_imc5-19años_varones.png') }}" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-12">
                        <button type="button" class="btn btn-xs btn-danger " onclick="cerrarprev_acc();">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function  imc_ref()
    {
        $('#imc_referencial').modal('show');
    }
    function cerrarprev_acc(){
        $('#imc_referencial').modal ('hide');
      }

</script>
