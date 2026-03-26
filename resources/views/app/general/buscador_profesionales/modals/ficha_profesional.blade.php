<div class="modal fade" id="ficha_profesional" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ficha_profesional" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header pt-auto">
                <!--Cargar foto del profesional-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="media">
                            <img class="img-radius img-fluid wid-80 mr-2" id="modal_info_pro_foto" src="{{ asset('images/img_perfil/6187674.png') }}" alt="Nombre del Médico">
                                <div class="media-body pt-4">
                                <h5 class="text-white my-auto text-uppercase" id="modal_info_pro_nombre"></h5>
                                <p class="text-white my-auto text-uppercase p-12" id="modal_info_pro_especialidad"><strong><span id="modal_info_pro_tipo_especialidad">Especialidad</span><span id="modalinfo_pro_sub_tipo_especialidad"></span></strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#ficha_profesional').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ficha_profesional">
                    <div class="row mx-2">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="p-14 text-c-blue text-uppercase pl-0">DATOS DEL VETERINARIO/A</h6>
                            <div class="card-informacion">
                                <div class="card-body px-0">
                                    <div class="row mx-0">
                                        <div class="col-md-6 mb-2"><strong>Rut:</strong> <span id="modal_info_pro_rut">No informado</span></div>
                                        <div class="col-md-6 mb-2"><strong>Correo:</strong> <span id="modal_info_pro_email">No informado</span></div>
                                        <div class="col-md-6 mb-2"><strong>Teléfono:</strong> <span id="modal_info_pro_telefono">No informado</span></div>
                                        <div class="col-md-6 mb-2"><strong>Comuna:</strong> <span id="modal_info_pro_ciudad">No informado</span></div>
                                        <div class="col-md-12 mb-2"><strong>Dirección:</strong> <span id="modal_info_pro_direccion">No informado</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="p-14 text-c-blue text-uppercase pl-0">LUGARES DE ATENCIÓN</h6>
                            <div class="card-informacion">
                                <div class="card-body px-0">
                                    <div class="col-md-12 ">
                                        <table class="display table dt-responsive table-xs" style="width:100%" id="modal_info_pro_lugar_atencion">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Convenios</th>
                                                    <th>Contacto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{--    --}}
                                            </tbody>
                                        </table>
                                        <div class="text-muted p-2" id="modal_info_pro_lugares_vacio" style="display:none;">Sin lugares de atención registrados.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="p-14 text-c-blue text-uppercase pl-0">INFORMACIÓN PROFESIONAL</h6>
                            <div class="card-informacion">
                                <div class="card-body px-0">
                                    <div id="modal_info_pro_academicos"></div>
                                    <div class="text-muted p-2" id="modal_info_pro_academicos_vacio" style="display:none;">Sin antecedentes profesionales registrados.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
