<!--datos banco-->
<div id="dat_bancarios" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dat_bancarios" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Cuenta bancaria</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <!--Card Nav Pills-->
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-md-12">
                                    <ul class="nav nav-pills bg-white" id="liquidacion_pills" role="tablist">
                                        {{-- <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="liquidacion_1-tab" data-toggle="tab" href="#liquidacion_1" role="tab" aria-controls="liquidacion_1" aria-selected="false">banco 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="liquidacion_2-tab" data-toggle="tab" href="#liquidacion_2" role="tab" aria-controls="liquidacion_2" aria-selected="false">banco 2</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="liquidacion_3-tab" data-toggle="tab" href="#liquidacion_3" role="tab" aria-controls="liquidacion_3" aria-selected="false">banco 3</a>
                                        </li> --}}
                                    </ul>
                                </div>
                                <div class="col-md-12">
                                    <div class="tab-content" id="liquidaciones">
                                        {{-- tab1 --}}
                                        <div class="tab-pane fade active show" id="liquidacion_1" role="tabpanel" aria-labelledby="liquidacion_1-tab">
                                        </div>
                                        {{-- tab2 --}}
                                        <div class="tab-pane fade" id="liquidacion_2" role="tabpanel" aria-labelledby="liquidacion_2-tab">
                                        </div>
                                        {{-- tab3 --}}
                                        <div class="tab-pane fade" id="liquidacion_3" role="tabpanel" aria-labelledby="liquidacion_3-tab">
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
</div>
